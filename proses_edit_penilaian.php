<?php
include 'koneksi.php';

$id = $_POST['id'];
$nilai = $_POST['nilai'];

$query = "UPDATE penilaian_dosen SET nilai = $nilai WHERE id = $id";

if (mysqli_query($koneksi, $query)) {
    header("Location: daftar_penilaian_dosen.php");
    exit;
} else {
    echo "Gagal memperbarui nilai: " . mysqli_error($koneksi);
}
