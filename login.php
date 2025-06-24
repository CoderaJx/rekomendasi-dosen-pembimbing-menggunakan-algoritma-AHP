<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
</head>
<body>

  <form action="proses_login.php" method="post">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  Login sebagai:
  <select name="role">
    <option value="mahasiswa">Mahasiswa</option>
    <option value="admin">Admin</option>
  </select><br>
  <button type="submit">Login</button>
  <p>Belum punya akun? <a href="register_mahasiswa.php">Daftar disini</a></p>
</form>



</body>
</html>