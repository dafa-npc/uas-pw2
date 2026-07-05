<?php
include 'koneksi.php';
$id = $_GET['id'];

$query_gambar = mysqli_query($koneksi, "SELECT gambar FROM tb_menu WHERE id_menu='$id'");
$data = mysqli_fetch_assoc($query_gambar);
$file_gambar = "uploads/" . $data['gambar'];

if (file_exists($file_gambar)) {
    unlink($file_gambar);
}

$query = "DELETE FROM tb_menu WHERE id_menu='$id'";
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Menu berhasil dihapus!'); window.location.href='menu.php';</script>";
}
?>