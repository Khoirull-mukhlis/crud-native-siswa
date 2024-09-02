<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "praktikum";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "Database Gagal tersambung, cek koneksi database anda";
}
