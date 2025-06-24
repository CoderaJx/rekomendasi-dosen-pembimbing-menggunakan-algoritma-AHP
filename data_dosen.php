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
    <title>Data Dosen</title>
</head>
<body>

<h2>Data Dosen</h2>
<a href="tambah_dosen.php">+ Tambah Dosen</a>
<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIK</th>
        <th>Keahlian</th>
        <th>Opsi</th>
    </tr>
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM dosen");
    $no = 1;
    while ($row = mysqli_fetch_assoc($query)) { ?>
         <tr>
         <td><?php echo $no++ ?></td>
         <td><?php echo$row['nama_dosen']?></td>
         <td><?php echo$row['nik']?></td>
         <td><?php echo$row['keahlian']?></td>
         <td><a href="edit_dosen.php?id=<?= $row['id_dosen'] ?>">Edit</a> |
          <a href="hapus_dosen.php?id=<?= $row['id_dosen'] ?>" onclick="return confirm('Yakin ingin menghapus dosen ini?')">Hapus</a>
      </td>
         </tr>
    <?php
    }
    ?>
</table>
<a href="admin_dashboard.php">⬅️ Kembali</a>

</body>
</html>