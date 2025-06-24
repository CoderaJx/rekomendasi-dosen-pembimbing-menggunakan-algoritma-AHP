<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$nik = $_POST['nik'];
$keahlian = $_POST['keahlian'];

$query = "INSERT INTO dosen (nama, nik, keahlian) VALUES ('$nama', '$nik', '$keahlian')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Berhasil menambahkan dosen!.'); window.location='data_dosen.php';</script>";
} else {
    echo "<script>alert('Gagal menambahkan dosen!.'); window.location='tambah_dosen.php';</script>";
}
?>
