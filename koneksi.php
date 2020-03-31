<?php
$databaseHost = "localhost";
$databaseName = "db_hr";
$username = "root";
$password = "";

$koneksi = mysqli_connect($databaseHost, $username, $password, $databaseName);

// mengecek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// echo "Koneksi berhasil";
?>