<?php 
 
 include 'crud/koneksi.php';

error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: halamanUtama.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];   
        echo '<script>alert("Selamat Datang, '.$data['Nama'].'");" </script>';
        header("Location: halamanUtama.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
 
    <title>
        Login</title>
</head>
<body>
 
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn" type="submit">Login</button>
            </div>
            <p class="login-register-text">Anda belum punya akun? <a href="registrasi.php">registrasi</a></p>
        </form>
    </div>
</body>
</html>





<!-- 
// Memeriksa apakah ada hasil dari query,jika ada berrti  email&pasword benar
// Mengambil data hasil query
// Menyimpan username di sesi -->

<!-- Jika num_rows lebih dari 0, berarti ada baris dalam tabel login yang memiliki email dan password yang cocok dengan input pengguna -->