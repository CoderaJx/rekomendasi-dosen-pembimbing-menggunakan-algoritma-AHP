<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID dosen tidak ditemukan!";
    exit;
}

$id = $_GET['id'];
$query = "DELETE FROM dosen WHERE id_dosen = $id";

if (mysqli_query($koneksi, $query)) {
    // setelah hapus, kembali ke list dosen
    header("Location: data_dosen.php");
    exit;
} else {
    echo "❌ Gagal menghapus dosen: " . mysqli_error($koneksi);
}
?>
