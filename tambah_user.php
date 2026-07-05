<?php 
include 'partials/header.php'; 
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $query = "INSERT INTO tb_user (nama_lengkap, username, password) VALUES ('$nama', '$username', '$password')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('User berhasil ditambahkan'); window.location.href='user.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan user!');</script>";
    }
}
?>
<div class="container mt-5">
    <div class="card bg-dark text-white shadow">
        <div class="card-header border-secondary">
            <h4>Tambah User Baru</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan User</button>
                <a href="user.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>