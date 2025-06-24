<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if ($role == 'mahasiswa') {
    $sql = "SELECT * FROM mahasiswa WHERE username='$username'";
} else {
    $sql = "SELECT * FROM admin WHERE username='$username'";
}

$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $role;

    if ($role == 'admin') {
        header("Location: admin_dashboard.php");
    } else {
        $_SESSION['mahasiswa_id'] = $data['id']; // buat AHP
        header("Location: dashboard.php");
    }
} else {
    echo "Login gagal!";
}
?>
