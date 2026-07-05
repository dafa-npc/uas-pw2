<?php
include 'koneksi.php';
$id = $_GET['id'];

// Hapus user berdasarkan ID
$query = "DELETE FROM tb_user WHERE id_user='$id'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data user berhasil dihapus!'); window.location.href='user.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus user!'); window.location.href='user.php';</script>";
}
?>