<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['mahasiswa_id'])) {
    header("Location: login.php");
    exit;
}

$mahasiswa_id = $_SESSION['mahasiswa_id'];

// Ambil semua data kriteria
$kriteria = mysqli_query($koneksi, "SELECT * FROM kriteria");

// Ambil semua perbandingan yang pernah diinput mahasiswa
$penilaian = [];
$result = mysqli_query($koneksi, "SELECT * FROM penilaian_kriteria WHERE mahasiswa_id = '$mahasiswa_id'");
while ($row = mysqli_fetch_assoc($result)) {
    $key = $row['kriteria1_id'] . '-' . $row['kriteria2_id'];
    $penilaian[$key] = $row['nilai_perbandingan'];
}
?>

<h2>Edit Kustomisasi Kriteria</h2>
<form action="update_kustomisasi_kriteria.php" method="POST">
    <input type="hidden" name="mahasiswa_id" value="<?= $mahasiswa_id ?>">

    <?php
    // Tampilkan semua kombinasi kriteria unik
    $kriteria_array = [];
    while ($row = mysqli_fetch_assoc($kriteria)) {
        $kriteria_array[] = $row;
    }

    for ($i = 0; $i < count($kriteria_array) - 1; $i++) {
        for ($j = $i + 1; $j < count($kriteria_array); $j++) {
            $k1 = $kriteria_array[$i];
            $k2 = $kriteria_array[$j];
            $key = $k1['id_kriteria'] . '-' . $k2['id_kriteria'];
            $nilai = isset($penilaian[$key]) ? $penilaian[$key] : 1;
            ?>

            <label>
                Seberapa penting <strong><?= $k1['nama_kriteria'] ?></strong> dibanding <strong><?= $k2['nama_kriteria'] ?></strong>?
            </label><br>
            <input type="hidden" name="kriteria1_id[]" value="<?= $k1['id_kriteria'] ?>">
            <input type="hidden" name="kriteria2_id[]" value="<?= $k2['id_kriteria'] ?>">
            <input type="number" step="0.01" min="0.11" max="5" name="nilai_perbandingan[]" value="<?= $nilai ?>" required>
            <br><br>
            <?php
        }
    }
    ?>

    <button type="submit">Simpan Perubahan</button>
</form>
