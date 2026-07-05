<?php
session_start();

if (!isset($_SESSION['username'])) { 
    header("Location: login.php"); 
    exit(); 
}


$base_url = "http://localhost/uas_susulan"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Resto 622</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/datatables.min.css">
    <script src="assets/jquery-3.6.1.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/datatables.min.js"></script>
    
    <style>
        html, body { height: 100%; margin: 0; display: flex; flex-direction: column; }
        .sidebar { position: fixed; top: 56px; left: 0; width: 200px; height: calc(100% - 56px); background-color: #1a1a1a; padding-top: 20px; }
        .sidebar a { display: block; padding: 10px 20px; color: #fff; text-decoration: none; border-bottom: 1px solid #333;}
        .sidebar a:hover { background-color: #333; }
        .main-content { margin-left: 200px; padding: 20px; flex: 1; background-color: #f4f6f9; }
        
        .bg-latte { background-color: #A07855 !important; }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-latte fixed-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="dashboard.php">RESTO ADMIN</a>
            <div class="collapse navbar-collapse justify-content-end">
                <span class="nav-link text-white fw-bold">Admin: <?= $_SESSION['username']; ?></span>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <ul class="nav flex-column text-white w-100">
            <li class="nav-item"><a href="<?= $base_url ?>/dashboard.php">Dashboard</a></li>
            <li class="nav-item"><a href="<?= $base_url ?>/menu.php">Kelola Menu</a></li>
            <li class="nav-item"><a href="<?= $base_url ?>/user.php">Data Pengguna</a></li>
            <li class="nav-item"><a href="<?= $base_url ?>/index.php" target="_blank">Lihat Web Depan</a></li>
            <li class="nav-item mt-4"><a href="<?= $base_url ?>/login/logout.php" class="text-danger fw-bold">Logout</a></li>
        </ul>
    </div>