<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "db";

// Membuat koneksi
$connect = mysqli_connect($host, $user, $password, $db);

// Mengecek koneksi
if (!$connect) {
    // die("Koneksi ke database gagal: " . mysqli_connect_error());
} else {
    // echo "Koneksi ke database berhasil!";
}
