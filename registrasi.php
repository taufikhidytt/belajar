<?php 
require 'function.php';

if (isset($_POST["submit"])) {
    if (registrasi($_POST) > 0) {
        ?>
            <script type="text/javascript">
                alert('Anda Berhasil Menambahkan Akun Baru');
                document.location.href='index.php';
            </script>
        <?php
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/registrasi.css">
</head>
<body>
    <h1>Registrasi</h1>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Masukan Username Anda" autocomplete="off" required>
        <br><br>
        <input type="password" name="password" placeholder="Masukan Password Anda" autocomplete="off" required>
        <br><br>
        <input type="password" name="password2" placeholder="Konfirmasi Password Anda" autocomplete="off" required>
        <br><br>
        <button type="submit" name="submit">Registrasi</button>
    </form><br><br>
    <a href="login.php">Anda Sudah Mempunyai Akun? Silahkan Login</a>
</body>
</html>