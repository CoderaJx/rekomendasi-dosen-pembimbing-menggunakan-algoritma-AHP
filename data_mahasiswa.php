<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
</head>
<body>

<h2>Data Mahasiswa</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
    </tr>
    <?php
    $no = 1;
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
    while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>";
        echo "<td>{$no}</td>";
        echo "<td>{$row['nama']}</td>";
        echo "<td>{$row['username']}</td>";
        echo "</tr>";
        $no++;
    }
    ?>
</table>
<a href="admin_dashboard.php">⬅️ Kembali</a>
</body>
</html>