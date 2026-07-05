<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Resto 622</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a1a1a, #333333);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: white;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 15px 25px rgba(0,0,0,0.5);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-danger">RESTO 622</h2>
            <p class="text-muted small">Silakan login untuk mengelola menu</p>
        </div>
        <form action="login/proses_login.php" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Username</label>
                <input type="text" name="username" class="form-control" required placeholder="Masukkan username">
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn btn-danger w-100 fw-bold mb-3 py-2">LOGIN SEKARANG</button>
            <div class="text-center">
                <a href="index.php" class="text-decoration-none text-secondary small">← Kembali ke Halaman Depan</a>
            </div>
        </form>
    </div>

</body>
</html>