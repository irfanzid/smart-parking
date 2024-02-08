<?php
// Konfigurasi Database
$host = "localhost"; // Ganti sesuai dengan host MySQL Anda
$username = "root"; // Ganti sesuai dengan username MySQL Anda
$password = ""; // Ganti sesuai dengan password MySQL Anda
$database = "skripsi_db"; // Ganti sesuai dengan nama database Anda

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
