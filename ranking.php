<?php
session_start();
include 'koneksi.php';

$id_mahasiswa = $_SESSION['mahasiswa_id'];

// 1. Ambil data perbandingan kriteria dari mahasiswa
$query = mysqli_query($koneksi, "SELECT * FROM penilaian_kriteria WHERE mahasiswa_id = '$id_mahasiswa'");
$kriteria = [];
$matrix = [];

// Ambil semua id kriteria
$kr_query = mysqli_query($koneksi, "SELECT * FROM kriteria");
while ($kr = mysqli_fetch_assoc($kr_query)) {
    $kriteria[] = $kr['id_kriteria'];
}

// Buat matriks kosong
foreach ($kriteria as $i) {
    foreach ($kriteria as $j) {
        $matrix[$i][$j] = ($i == $j) ? 1 : null;
    }
}

// Isi nilai perbandingan
while ($row = mysqli_fetch_assoc($query)) {
    $i = $row['kriteria1_id'];
    $j = $row['kriteria2_id'];
    $nilai = $row['nilai_perbandingan'];
    $matrix[$i][$j] = $nilai;
    $matrix[$j][$i] = 1 / $nilai;
}

// Hitung jumlah kolom
$jumlahKolom = [];
foreach ($kriteria as $j) {
    $jumlahKolom[$j] = 0;
    foreach ($kriteria as $i) {
        $jumlahKolom[$j] += $matrix[$i][$j];
    }
}

// Normalisasi dan hitung bobot
$bobot = [];
foreach ($kriteria as $i) {
    $bobot[$i] = 0;
    foreach ($kriteria as $j) {
        $nilai_norm = $matrix[$i][$j] / $jumlahKolom[$j];
        $bobot[$i] += $nilai_norm;
    }
    $bobot[$i] /= count($kriteria); // rata-rata baris
}

// Cek konsistensi
$lambda_max = 0;
foreach ($kriteria as $i) {
    $sum = 0;
    foreach ($kriteria as $j) {
        $sum += $matrix[$i][$j] * $bobot[$j];
    }
    $lambda_max += $sum / $bobot[$i];
}
$lambda_max /= count($kriteria);

$CI = ($lambda_max - count($kriteria)) / (count($kriteria) - 1);
$RI = [0, 0, 0.58, 0.9, 1.12][count($kriteria)]; // RI untuk n=4
$CR = $CI / $RI;

if ($CR >= 0.1) {
    echo "<script>alert('Perbandingan tidak konsisten (CR = " . number_format($CR, 2) . "). Harap ulangi input!');</script>";
}

// 2. Ambil nilai dosen dari database dan hitung skor
$dosen_query = mysqli_query($koneksi, "SELECT * FROM dosen");
$ranking = [];

while ($d = mysqli_fetch_assoc($dosen_query)) {
    $id_dosen = $d['id_dosen'];
    $total = 0;

    foreach ($kriteria as $id_kriteria) {
        $nilai_query = mysqli_query($koneksi, "SELECT * FROM penilaian_dosen 
            WHERE dosen_id = '$id_dosen' AND kriteria_id = '$id_kriteria'");

        if ($n = mysqli_fetch_assoc($nilai_query)) {
            $nilai = $n['nilai'];
            $total += $nilai * $bobot[$id_kriteria];
        }
    }

    // Normalisasi range 0-100
    $total = ($total / array_sum($bobot)) * 100;  // Normalisasi

    $ranking[] = [
        'nama_dosen' => $d['nama_dosen'],
        'skor' => $total
    ];
}

// Urutkan ranking
usort($ranking, function($a, $b) {
    if ($a['skor'] == $b['skor']) return 0;
    return ($a['skor'] < $b['skor']) ? 1 : -1;
});


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perankingan Dosen</title>
</head>
<body>

<h2>Hasil Rekomendasi Dosen Pembimbing</h2>

<!-- Tampilkan Bobot Kriteria Terlebih Dahulu -->
<h3>Bobot Kriteria</h3>
<ul>
    <?php 
    foreach ($kriteria as $id) {
        $nama = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_kriteria FROM kriteria WHERE id_kriteria = $id"))['nama_kriteria'];
        echo "<li>$nama: " . number_format($bobot[$id] * 100, 2) . "%</li>";
    }
    ?>
</ul>

<!-- Tabel Ranking -->
<table border="1" cellpadding="8">
    <tr>
        <th>Peringkat</th>
        <th>Nama Dosen</th>
        <th>Skor</th>
    </tr>
    <?php
    $no = 1;
    foreach ($ranking as $r) {
        echo "<tr>
            <td>$no</td>
            <td>{$r['nama_dosen']}</td>
            <td>" . number_format($r['skor'], 4) . "</td>
        </tr>";
        $no++;
    }
    ?>
</table>

<a href="form_perbandingan.php">Kembali kustomisasi kriteria?</a></p>

</body>
</html>