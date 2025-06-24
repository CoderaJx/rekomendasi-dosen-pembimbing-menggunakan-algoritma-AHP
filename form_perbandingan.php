<?php
session_start();
if (!isset($_SESSION['mahasiswa_id'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

// Ambil semua kriteria dari DB
$kriteria = mysqli_query($koneksi, "SELECT * FROM kriteria");
$list_kriteria = [];
while ($row = mysqli_fetch_assoc($kriteria)) {
    $list_kriteria[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Perbandingan</title>
</head>
<body>

<p><strong>Petunjuk Pengisian:</strong><br>
1 = Kedua kriteria sama penting<br>
3 = Kriteria A cukup lebih penting dari B<br>
5 = Kriteria A mutlak lebih penting dari B<br>
(Nilai 2 dan 4 untuk tingkat antara)
</p>


<h2>Input Perbandingan Kriteria AHP</h2>
<form action="simpan_perbandingan.php" method="post">
    <table border="1" cellpadding="8">
        <tr>
            <th>Kriteria A</th>
            <th>vs</th>
            <th>Kriteria B</th>
            <th>Nilai (1–5)</th>
        </tr>

        <?php
        // Loop semua kombinasi unik pasangan kriteria (tanpa duplikat dan A ≠ B)
        // Di bagian loop kombinasi kriteria, tambahkan input hidden untuk nilai kebalikan
for ($i = 0; $i < count($list_kriteria); $i++) {
    for ($j = $i + 1; $j < count($list_kriteria); $j++) {
        $k1 = $list_kriteria[$i];
        $k2 = $list_kriteria[$j];
        echo "<tr>";
        echo "<td>{$k1['nama_kriteria']}</td>";
        echo "<td>dibanding</td>";
        echo "<td>{$k2['nama_kriteria']}</td>";
        echo "<td>
                <input type='hidden' name='kriteria1_id[]' value='{$k1['id_kriteria']}'>
                <input type='hidden' name='kriteria2_id[]' value='{$k2['id_kriteria']}'>
                <select name='nilai_perbandingan[]' required>
                    <option value=''>--Pilih--</option>
                    <option value='1'>1 - Sama penting</option>
                    <option value='2'>2 - Sedikit lebih penting</option>
                    <option value='3'>3 - Cukup lebih penting</option>
                    <option value='4'>4 - Sangat lebih penting</option>
                    <option value='5'>5 - Mutlak lebih penting</option>
                </select>
              </td>";
        echo "</tr>";
    }
}
        ?>
    </table>
    <br>
    <button type="submit">Simpan Semua Perbandingan</button> <br>
    <a href="dashboard.php">Kembali</a>
</form>
</body>
</html>