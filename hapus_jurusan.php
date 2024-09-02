<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT j.id_jurusan, j.nama_jurusan, COUNT(m.id_mahasiswa) AS jumlah_mahasiswa FROM data_jurusan j LEFT JOIN data_mahasiswa m ON j.id_jurusan = m.id_jurusan WHERE j.id_jurusan = '$id' GROUP BY j.id_jurusan");

$data = mysqli_fetch_array($query);

if ($data['jumlah_mahasiswa'] == 0) {
    $delete = mysqli_query($conn, "DELETE FROM data_jurusan where id_jurusan = '$id'");
    if ($delete) {
        echo '<script>
        alert("Data berhasil dihapus");
        window.location.href="data_jurusan.php";
        </script>';
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo '<script>
    alert("Jurusan tidak bisa dihapus. Data jurusan masih terisi");
    window.location.href="data_jurusan.php";
    </script>';
}

mysqli_close($conn);
