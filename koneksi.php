<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "tugaswebsite";

// Membuat koneksi
$conn = mysqli_connect($server, $user, $pass, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>