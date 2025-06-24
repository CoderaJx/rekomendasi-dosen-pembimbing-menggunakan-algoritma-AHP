<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Selamat datang, <?= $_SESSION['nama'] ?> (Admin)</h2>

    <ul>
        <li><a href="data_mahasiswa.php">📋 Data Mahasiswa</a></li>
        <li><a href="data_dosen.php">👨‍🏫 Data Dosen</a></li>
        <li><a href="admin_penilaian_dosen.php">📝 Penilaian Dosen</a></li>
        <li><a href="daftar_penilaian_dosen.php">📝 Daftar Penilaian Dosen</a></li>
        <li><a href="logout.php">🚪 Logout</a></li>
    </ul>
</body>
</html>
