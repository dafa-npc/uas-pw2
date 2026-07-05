<?php include 'partials/header.php'; ?>
<div class="main-content mt-5 pt-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-3">
            <h2>Manajemen Menu Restoran</h2>
            <div>
                <a href="tambah_menu.php" class="btn btn-primary">Tambah Menu</a>
                <a href="report_menu.php" target="_blank" class="btn btn-danger">Cetak Katalog (PDF)</a>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped" id="tabel_menu">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kode</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_menu ORDER BY id_menu DESC");
                        $no = 1;
                        while($row = mysqli_fetch_assoc($query)){
                            echo "<tr>";
                            echo "<td>".$no++."</td>";
                            echo "<td><img src='uploads/".$row['gambar']."' width='70' class='rounded'></td>";
                            echo "<td>".$row['kode_menu']."</td>";
                            echo "<td>".$row['nama_menu']."</td>";
                            echo "<td><span class='badge bg-info text-dark'>".$row['kategori']."</span></td>";
                            echo "<td>Rp ".number_format($row['harga'],0,',','.')."</td>";
                            echo "<td>
                                <a href='edit_menu.php?id=".$row['id_menu']."' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='hapus_menu.php?id=".$row['id_menu']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus menu?\")'>Hapus</a>
                            </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script> $(document).ready(function() { $('#tabel_menu').DataTable(); }); </script>
<?php include 'partials/footer.php'; ?>