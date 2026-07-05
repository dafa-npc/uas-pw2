<?php 
include 'partials/header.php'; 
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode_menu'];
    $nama = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    
    $foto = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $target_dir = "uploads/";
    
    if(!file_exists($target_dir)) { mkdir($target_dir, 0777, true); }
    $target_file = $target_dir . basename($foto);

    if (move_uploaded_file($tmp, $target_file)) {
        $query = "INSERT INTO tb_menu (kode_menu, nama_menu, kategori, harga, deskripsi, gambar) 
                  VALUES ('$kode', '$nama', '$kategori', '$harga', '$deskripsi', '$foto')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Menu ditambahkan!'); window.location.href='menu.php';</script>";
        }
    }
}
?>
<div class="main-content mt-5 pt-4">
    <div class="container-fluid">
        <div class="card shadow w-75">
            <div class="card-header bg-dark text-white"><h4>Tambah Menu Baru</h4></div>
            <div class="card-body bg-light">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Kode Menu</label>
                        <input type="text" name="kode_menu" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Dessert">Dessert</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi Singkat</label>
                        <textarea name="deskripsi" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Foto Produk</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Menu</button>
                    <a href="menu.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>