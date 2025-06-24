<?php 
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM penilaian_kriteria WHERE mahasiswa_id = 3");
$matrix = [
    5 => [5 => 1, 6 => 0, 7 => 0, 8 => 0], // Keahlian (ID=5)
    6 => [5 => 0, 6 => 1, 7 => 0, 8 => 0], // Komunikasi (ID=6)
    7 => [5 => 0, 6 => 0, 7 => 1, 8 => 0], // Waktu (ID=7)
    8 => [5 => 0, 6 => 0, 7 => 0, 8 => 1]  // Pendidikan (ID=8)
];

while ($row = mysqli_fetch_assoc($query)) {
    $matrix[$row['kriteria1_id']][$row['kriteria2_id']] = $row['nilai_perbandingan'];
}

echo "<pre>Matriks Sistem Anda:\n";
print_r($matrix);




 ?>