<?php
session_start();
include 'koneksi.php';

$mahasiswa_id = $_SESSION['mahasiswa_id'];
$kriteria1_ids = $_POST['kriteria1_id'];
$kriteria2_ids = $_POST['kriteria2_id'];
$nilai_perbandingans = $_POST['nilai_perbandingan'];

// Hapus perbandingan lama mahasiswa ini
mysqli_query($koneksi, "DELETE FROM penilaian_kriteria WHERE mahasiswa_id = $mahasiswa_id");

// Simpan perbandingan baru + nilai kebalikan
for ($i = 0; $i < count($kriteria1_ids); $i++) {
    $k1 = $kriteria1_ids[$i];
    $k2 = $kriteria2_ids[$i];
    $nilai = floatval($nilai_perbandingans[$i]);

    //cek input
    if ($nilai < 1 || $nilai > 5) {
        die("Nilai perbandingan harus antara 1-5");
    }  
    // Simpan A vs B
    $sql = "INSERT INTO penilaian_kriteria 
            (mahasiswa_id, kriteria1_id, kriteria2_id, nilai_perbandingan) 
            VALUES ($mahasiswa_id, $k1, $k2, $nilai)";
    mysqli_query($koneksi, $sql);
    
    // Simpan B vs A (nilai kebalikan)
    $sql = "INSERT INTO penilaian_kriteria 
            (mahasiswa_id, kriteria1_id, kriteria2_id, nilai_perbandingan) 
            VALUES ($mahasiswa_id, $k2, $k1, 1/$nilai)";
    mysqli_query($koneksi, $sql);
}

header("Location: ranking.php"); // Redirect dengan notifikasi
exit;
?>