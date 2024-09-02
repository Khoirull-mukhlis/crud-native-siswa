<?php

include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM data_mahasiswa where id_mahasiswa = '$id'");

if ($hapus) {
    echo '<script>
    alert("Data Berhasil Dihapus");
    window.location.href="data_mahasiswa.php";
    </script>';
}
