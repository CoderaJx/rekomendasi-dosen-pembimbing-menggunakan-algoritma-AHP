<?php
include 'koneksi.php';

$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT); // hash otomatis di sini
$nama = 'Fabio';

mysqli_query($koneksi, "INSERT INTO admin (username, password, nama) 
                        VALUES ('$username', '$password', '$nama')");

echo "Berhasil tambah admin!";
?>
