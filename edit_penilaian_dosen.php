<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];

// Ambil data penilaian berdasarkan ID
$query = "SELECT * FROM penilaian_dosen WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

// Ambil nama dosen dan kriteria
$queryDosen = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id_dosen = " . $data['dosen_id']);
$dosen = mysqli_fetch_assoc($queryDosen);

$queryKriteria = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE id_kriteria = " . $data['kriteria_id']);
$kriteria = mysqli_fetch_assoc($queryKriteria);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Penilaian Dosen</title>
</head>
<body>

<h2>Edit Nilai Penilaian</h2>
<form method="POST" action="proses_edit_penilaian.php">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <p>Dosen: <strong><?= $dosen['nama_dosen'] ?></strong></p>
    <p>Kriteria: <strong><?= $kriteria['nama_kriteria'] ?></strong></p>
    <label>Nilai:</label>
    <input type="number" name="nilai" step="0.01" value="<?= $data['nilai'] ?>" required>
    <br><br>
    <button type="submit">Simpan Perubahan</button>
</form>

</body>
</html>
