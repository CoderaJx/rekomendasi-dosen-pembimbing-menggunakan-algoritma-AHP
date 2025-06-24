<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah NIM sudah terdaftar
    $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username = '$nim'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('NIM sudah terdaftar!');</script>";
    } else {
        // Hash password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke DB
        $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, username, password) 
                                         VALUES ('$nama', '$nim', '$password_hash')");

        if ($query) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Gagal mendaftar!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran</title>
</head>
<body>

<h2>Form Registrasi Mahasiswa</h2>
<form method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>NIM:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="register">Daftar</button>
</form>

<p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

</body>
</html>