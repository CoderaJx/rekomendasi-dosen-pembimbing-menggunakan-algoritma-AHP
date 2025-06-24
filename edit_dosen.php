<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID dosen tidak ditemukan!";
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM dosen WHERE id_dosen = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data dosen tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Dosen</title>
</head>
<body>

<h2>Edit Dosen</h2>
<form action="proses_edit_dosen.php" method="post">
  <input type="hidden" name="id_dosen" value="<?= $data['id_dosen'] ?>">

  <label>Nama:</label><br>
  <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>

  <label>NIK:</label><br>
  <input type="text" name="nik" value="<?= $data['nik'] ?>" required><br><br>

  <label>Keahlian:</label><br>
  <input type="text" name="keahlian" value="<?= $data['keahlian'] ?>"><br><br>

  <input type="submit" value="Update">
</form>

</body>
</html>
