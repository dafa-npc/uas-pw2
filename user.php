<?php include 'partials/header.php'; ?>

<div class="main-content mt-5 pt-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Manajemen Data Pengguna</h2>
            <a href="tambah_user.php" class="btn btn-primary fw-bold">Tambah User</a>
        </div>
        
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover" id="tabel_user">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_user ORDER BY id_user DESC");
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . $no++ . "</td>";
                            echo "<td>" . $row['nama_lengkap'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td class='text-center'>";
                            echo "<a href='edit_user.php?id=" . $row['id_user'] . "' class='btn btn-sm btn-warning fw-bold'>Edit</a> ";
                            echo "<a href='hapus_user.php?id=" . $row['id_user'] . "' class='btn btn-sm btn-danger fw-bold' onclick='return confirm(\"Yakin ingin menghapus akses admin ini?\")'>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#tabel_user').DataTable();
});
</script>

<?php include 'partials/footer.php'; ?>