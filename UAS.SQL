CREATE DATABASE db_uas_622;
USE db_uas_622;

CREATE TABLE tb_user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    PASSWORD VARCHAR(255) NOT NULL
);

CREATE TABLE tb_menu (
    id_menu INT AUTO_INCREMENT PRIMARY KEY,
    kode_menu VARCHAR(20) NOT NULL,
    nama_menu VARCHAR(100) NOT NULL,
    kategori ENUM('Makanan', 'Minuman', 'Dessert') NOT NULL,
    harga INT NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(255) NOT NULL
);

-- dummy acc
INSERT INTO tb_user (nama_lengkap, username, PASSWORD) VALUES ('Administrator Resto', 'admin', 'admin123');