<?php
$host = "localhost";
$user = "root";     // Default XAMPP
$pass = "";         // Default XAMPP kosong
$db   = "db_sekolah"; // Pastikan ini nama database yang kamu buat di phpMyAdmin

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi jika gagal
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>