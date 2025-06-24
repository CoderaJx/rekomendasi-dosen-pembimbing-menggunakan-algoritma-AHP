<?php
include 'koneksi.php';

$id_dosen = $_POST['id_dosen'];
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$keahlian = $_POST['keahlian'];

$query = "UPDATE dosen SET nama = '$nama', nik = '$nik', keahlian = '$keahlian' WHERE id_dosen = $id_dosen";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Berhasil update dosen!.'); window.location='data_dosen.php';</script>";
} else {
    echo "<script>alert('Gagal update dosen!.'); window.location='data_dosen.php';</script>";
}
?>
