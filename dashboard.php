<?php
include 'partials/header.php';
include 'koneksi.php';

$q_menu = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_menu");
$tot_menu = mysqli_fetch_assoc($q_menu)['total'];
?>
<div class="main-content mt-5 pt-4">
    <div class="container-fluid">
        <h2 class="mb-4">Dashboard Admin Restoran</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        <h5>Total Menu Aktif</h5>
                        <h1 class="display-4 fw-bold"><?= $tot_menu ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>