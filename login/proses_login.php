<?php
session_start();

include '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($query);
    
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
    
    echo "<script>alert('Login Berhasil! Selamat datang, ".$data['nama_lengkap']."'); window.location.href='../dashboard.php';</script>";
} else {
    echo "<script>alert('Username atau Password salah!'); window.location.href='../login.php';</script>";
}
?>