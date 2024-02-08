-- Membuat Database
CREATE DATABASE IF NOT EXISTS skripsi_db;

-- Menggunakan Database skripsi_db
USE skripsi_db;

-- Membuat Tabel log_masuk
CREATE TABLE IF NOT EXISTS log_masuk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uid VARCHAR(255),
    plat VARCHAR(20),
    waktu_masuk DATETIME
);

-- Membuat Tabel log_keluar
CREATE TABLE IF NOT EXISTS log_keluar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uid VARCHAR(255),
    plat VARCHAR(20),
    waktu_keluar DATETIME
);

-- Membuat Tabel user
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS mahasiswa (
    npm BIGINT PRIMARY KEY,
    nama VARCHAR(255),
    email VARCHAR(255),
    jurusan VARCHAR(50),
    gambar VARCHAR(255)
);