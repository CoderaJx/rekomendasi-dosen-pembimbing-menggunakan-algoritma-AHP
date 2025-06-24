<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
if (isset($_GET['status']) && $_GET['status'] == 'berhasil') {
    echo "<script>alert('Penilaian berhasil disimpan!');</script>";
}
?>
<?php

// Ambil semua dosen dan kriteria
$dosen = mysqli_query($koneksi, "SELECT * FROM dosen");
$kriteria = mysqli_query($koneksi, "SELECT * FROM kriteria");

// Simpan penilaian
if (isset($_POST['simpan'])) {
    foreach ($_POST['nilai'] as $id_dosen => $kriteria_nilai) {
        foreach ($kriteria_nilai as $id_kriteria => $nilai) {
            // Cek apakah sudah ada sebelumnya
            $cek = mysqli_query($koneksi, "SELECT * FROM penilaian_dosen 
                WHERE dosen_id='$id_dosen' AND kriteria_id='$id_kriteria'");
            if (mysqli_num_rows($cek) > 0) {
                mysqli_query($koneksi, "UPDATE penilaian_dosen 
                    SET nilai='$nilai' 
                    WHERE dosen_id='$id_dosen' AND kriteria_id='$id_kriteria'");
            } else {
                mysqli_query($koneksi, "INSERT INTO penilaian_dosen (dosen_id, kriteria_id, nilai) 
                    VALUES ('$id_dosen', '$id_kriteria', '$nilai')");
            }
        }
    }

   header("Location: admin_penilaian_dosen.php?status=berhasil");
exit;

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penilaian Dosen</title>
</head>
<body>

<h2>Input Penilaian Dosen</h2>
<form method="post">
    <table border="1" cellpadding="8">
        <tr>
            <th>Nama Dosen</th>
            <?php 
            $arrKriteria = [];
            while ($k = mysqli_fetch_assoc($kriteria)) {
                $arrKriteria[] = $k;
                echo "<th>{$k['nama_kriteria']} (1–5)</th>";
            }
            ?>
        </tr>
        <?php while ($d = mysqli_fetch_assoc($dosen)) : ?>
            <tr>
                <td><?= $d['nama_dosen'] ?></td>
                <?php foreach ($arrKriteria as $k) : ?>
                    <td>
                        <input type="number" name="nilai[<?= $d['id_dosen'] ?>][<?= $k['id_kriteria'] ?>]" min="1" max="5" required>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <button type="submit" name="simpan">💾 Simpan Penilaian</button>
</form>

<br>
<a href="admin_dashboard.php">⬅️ Kembali ke Dashboard</a>

</body>
</html>