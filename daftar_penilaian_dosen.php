<?php
include 'koneksi.php';

$query = "
    SELECT
        p.id AS id, 
        d.nama_dosen AS nama_dosen,
        k.nama_kriteria AS nama_kriteria,
        p.nilai
    FROM penilaian_dosen p
    JOIN dosen d ON p.dosen_id = d.id_dosen
    JOIN kriteria k ON p.kriteria_id = k.id_kriteria
    ORDER BY d.nama_dosen ASC, k.nama_kriteria ASC
";

$result = mysqli_query($koneksi, $query) or die("Query error: " . mysqli_error($koneksi));
$no = 1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Penilaian Dosen</title>
</head>
<body>

<h2>Data Penilaian Dosen</h2>
<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Nama Dosen</th>
    <th>Nama Kriteria</th>
    <th>Nilai</th>
    <th>Opsi</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama_dosen'] ?></td>
    <td><?= $row['nama_kriteria'] ?></td>
    <td><?= $row['nilai'] ?></td>
    <td>
  <a href="edit_penilaian_dosen.php?id=<?= $row['id'] ?>">Edit</a>
</td>

  </tr>
  <?php endwhile; ?>
</table>
<a href="admin_dashboard.php">Kembali</a>

</body>
</html>
