<?php 
include 'partials/header.php'; 
include 'koneksi.php';

$id = $_GET['id'];
$query_data = mysqli_query($koneksi, "SELECT * FROM tb_menu WHERE id_menu='$id'");
$menu = mysqli_fetch_assoc($query_data);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode_menu'];
    $nama = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    
    $foto = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    
    if (!empty($foto)) {
        // Jika admin ganti foto
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);
        move_uploaded_file($tmp, $target_file);
        
        $query = "UPDATE tb_menu SET kode_menu='$kode', nama_menu='$nama', kategori='$kategori', harga='$harga', deskripsi='$deskripsi', gambar='$foto' WHERE id_menu='$id'";
    } else {
        // Jika foto tidak diganti
        $query = "UPDATE tb_menu SET kode_menu='$kode', nama_menu='$nama', kategori='$kategori', harga='$harga', deskripsi='$deskripsi' WHERE id_menu='$id'";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data menu berhasil diupdate!'); window.location.href='menu.php';</script>";
    }
}
?>
<div class="main-content mt-5 pt-4">
    <div class="container-fluid">
        <div class="card shadow border-0 w-75">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Edit Data Menu</h4>
            </div>
            <div class="card-body bg-light">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Kode Menu</label>
                            <input type="text" name="kode_menu" class="form-control" value="<?= $menu['kode_menu'] ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Nama Menu</label>
                            <input type="text" name="nama_menu" class="form-control" value="<?= $menu['nama_menu'] ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Kategori</label>
                            <select name="kategori" class="form-select" required>
                                <option value="Makanan" <?= ($menu['kategori'] == 'Makanan') ? 'selected' : '' ?>>Makanan</option>
                                <option value="Minuman" <?= ($menu['kategori'] == 'Minuman') ? 'selected' : '' ?>>Minuman</option>
                                <option value="Dessert" <?= ($menu['kategori'] == 'Dessert') ? 'selected' : '' ?>>Dessert</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" value="<?= $menu['harga'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="2"><?= $menu['deskripsi'] ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="fw-bold">Ganti Foto <small class="text-primary">(Kosongkan jika tidak ingin ganti)</small></label>
                        <input type="file" name="file" class="form-control mb-2">
                        <img src="uploads/<?= $menu['gambar'] ?>" width="100" class="rounded shadow-sm">
                    </div>
                    <button type="submit" class="btn btn-success px-4 fw-bold">Update Menu</button>
                    <a href="menu.php" class="btn btn-secondary px-4 fw-bold">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>