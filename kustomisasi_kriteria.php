<?php 

include 'koneksi.php';

if (!isset($_SESSION['mahasiswa_id'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['nama'];

$queryCek = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM penilaian_kriteria WHERE mahasiswa_id = '$user'");
$dataCek = mysqli_fetch_assoc($queryCek);

if ($dataCek['total'] > 0) {
    // Sudah pernah isi → tampilkan form edit
    include 'edit_kustomisasi_kriteria.php';
} else {
    // Belum pernah isi → tampilkan form input
    include 'form_perbandingan.php';
}


 ?>