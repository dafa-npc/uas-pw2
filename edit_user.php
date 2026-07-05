<?php 
include 'partials/header.php'; 
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$id'");
$user = mysqli_fetch_assoc($data);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
        $query = "UPDATE tb_user SET nama_lengkap='$nama', username='$username', password='$password' WHERE id_user='$id'";
    } else {
        $query = "UPDATE tb_user SET nama_lengkap='$nama', username='$username' WHERE id_user='$id'";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data user berhasil diupdate'); window.location.href='user.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate user!');</script>";
    }
}
?>
<div class="container mt-5">
    <div class="card bg-dark text-white shadow">
        <div class="card-header border-secondary">
            <h4>Update Data User</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="<?= $user['nama_lengkap'] ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label>Password Baru (Kosongkan jika tidak ingin mengubah password)</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Update User</button>
                <a href="user.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>