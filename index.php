<?php 
session_start();
include 'koneksi.php'; 

$search = isset($_GET['search']) ? $_GET['search'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Menu - Resto 622</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <style>
        body {
            background-color: #FAF6F0; /* Krem  */
            color: #4A3B32; /* Cokelat */
        }
        
        /* Navigasi  */
        .navbar-latte {
            background-color: #3C2A21 !important; 
        }
        
        /* Tombol */
        .btn-latte {
            background-color: #C49A6C;
            color: #fff;
            border: none;
            transition: 0.3s;
        }
        .btn-latte:hover {
            background-color: #A87E54;
            color: #fff;
        }
        .text-latte { color: #8B5E34; }
        
        /* Card Menu */
        .menu-card { 
            background-color: #FFFFFF;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease; 
        }
        .menu-card:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 12px 24px rgba(60, 42, 33, 0.15) !important;
        }
        
        .badge-kategori {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 0.8rem;
            padding: 6px 12px;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            font-weight: 600;
        }
        .bg-cat-makanan { background-color: #A07855; color: white; }
        .bg-cat-minuman { background-color: #D4A373; color: white; }
        .bg-cat-dessert { background-color: #E6BE8A; color: #4A3B32; }
        
        /* Search Bar */
        .search-box {
            border: 2px solid #E8D8CE;
            border-radius: 50px;
            overflow: hidden;
            background: white;
        }
        .search-box input {
            border: none;
            box-shadow: none;
            padding-left: 25px;
        }
        .search-box input:focus {
            outline: none;
            box-shadow: none;
        }
        .search-box button {
            border-radius: 0 50px 50px 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-latte py-3 shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold fs-5 tracking-wide" href="index.php">
                <span style="color: #D4A373;">RESTO</span> 622
            </a>
            <div class="d-flex">
                <?php if(isset($_SESSION['username'])) { ?>
                    <a href="dashboard.php" class="btn btn-outline-light rounded-pill px-4 btn-sm">Dashboard Admin</a>
                <?php } else { ?>
                    <a href="login.php" class="btn btn-latte fw-bold rounded-pill px-4 btn-sm shadow-sm">Login Admin</a>
                <?php } ?>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="index.php" method="GET">
                    <div class="input-group input-group-lg search-box shadow-sm">
                        <input type="text" name="search" class="form-control fs-6" placeholder="Cari menu, kopi, atau dessert favoritmu..." value="<?= htmlspecialchars($search) ?>">
                        <button class="btn btn-latte px-4 fs-6 fw-bold" type="submit">CARI MENU</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mb-5 pb-5">
        <div class="text-center mb-5">
            <h4 class="fw-bold mb-2">Daftar Menu</h4>
            <div style="width: 50px; height: 3px; background-color: #C49A6C; margin: 0 auto; border-radius: 2px;"></div>
        </div>

        <div class="row g-4">
            <?php
            if ($search != '') {
                $query = mysqli_query($koneksi, "SELECT * FROM tb_menu WHERE nama_menu LIKE '%$search%' OR kategori LIKE '%$search%' ORDER BY id_menu DESC");
            } else {
                $query = mysqli_query($koneksi, "SELECT * FROM tb_menu ORDER BY id_menu DESC");
            }
            
            if(mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_assoc($query)) {
                    

                    $badge_class = 'bg-cat-makanan';
                    if($row['kategori'] == 'Minuman') { $badge_class = 'bg-cat-minuman'; }
                    if($row['kategori'] == 'Dessert') { $badge_class = 'bg-cat-dessert'; }
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card menu-card shadow-sm h-100 position-relative">
                    <span class="badge <?= $badge_class ?> badge-kategori"><?= $row['kategori'] ?></span>
                    
                    <img src="uploads/<?= $row['gambar'] ?>" class="card-img-top" style="height: 220px; object-fit: cover;" alt="<?= $row['nama_menu'] ?>">
                    
                    <div class="card-body text-center p-4">
                        <h6 class="card-title fw-bold mb-2"><?= $row['nama_menu'] ?></h6>
                        <p class="card-text text-muted small mb-3" style="min-height: 40px;">
                            <?= substr($row['deskripsi'], 0, 60) ?><?= strlen($row['deskripsi']) > 60 ? '...' : '' ?>
                        </p>
                        <h5 class="fw-bold mb-0 text-latte">Rp <?= number_format($row['harga'], 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
            <?php 
                }
            } else {

                echo "
                <div class='col-12 text-center'>
                    <div class='p-5 bg-white rounded-3 shadow-sm border border-light'>
                        <h5 class='fw-bold mb-2' style='color: #8B5E34;'>Menu tidak ditemukan ☕</h5>
                        <p class='text-muted small mb-0'>Maaf, menu dengan kata kunci <strong>'".htmlspecialchars($search)."'</strong> belum ada di daftar kami.</p>
                        <a href='index.php' class='btn btn-outline-secondary btn-sm mt-3 rounded-pill px-4'>Tampilkan Semua Menu</a>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>

    <footer class="text-center py-4 mt-auto" style="background-color: #E8D8CE; color: #8B5E34;">
        <p class="mb-0 small fw-bold">&copy; 2026 Resto 622. All rights reserved.</p>
    </footer>

</body>
</html>