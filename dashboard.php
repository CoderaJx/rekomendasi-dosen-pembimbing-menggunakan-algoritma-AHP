<?php
session_start();
if (!isset($_SESSION['mahasiswa_id'])) {
    header("Location: login.php");
    exit;
}

echo "Selamat datang, " . $_SESSION['nama'];
echo "<br><a href='form_perbandingan.php'>Input Perbandingan Kriteria</a>";
echo "<br><a href='logout.php'>Logout</a>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>

</body>
</html>