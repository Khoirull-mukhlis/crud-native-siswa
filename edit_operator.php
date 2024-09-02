<?php
include 'layout/header.php';
include 'koneksi.php';

$id = $_GET['id'];
$operator = mysqli_query($conn, "SELECT * FROM data_operator where id_operator = '$id'");
$get = mysqli_fetch_array($operator);

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="data_operator.php">Data operator</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit operator</li>
    </ol>
</nav>
<form method="POST" action="" class="card">
    <div class="card-header">
        Form Edit operator
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="">nama operator</label>
            </div>
            <div class="col-lg-9">
                <input type="text" required class="form-control" value="<?= $get['nama_operator'] ?>" name="nama_operator" placeholder="Masukkan nomor induk mahasiswa...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">email operator</label>
            </div>
            <div class="col-lg-9">
                <input type="text" required value="<?= $get['email_operator'] ?>" class="form-control" name="email_operator" placeholder="Masukkan email operator...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">pasword operator</label>
            </div>
            <div class="col-lg-9">
                <input type="password" required value="<?= $get['password_operator'] ?>" class="form-control" name="password_operator" placeholder="Masukkan pasword operator...">
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button name="edit" class="btn btn-success">Edit Data</button>
        <a href="data_operator.php" class="btn btn-danger">Kembali</a>
    </div>
</form>

<?php

include 'layout/footer.php';

if (isset($_POST['edit'])) {
    $nama_operator = $_POST['nama_operator'];
    $email_operator = $_POST['email_operator'];
    $pasword_operator = $_POST['password_operator'];

    $simpan = mysqli_query($conn, "UPDATE data_operator SET nama_operator = '$nama_operator', email_operator = '$email_operator', password_operator = '$pasword_operator' where id_operator = '$id'");

    if ($simpan) {
        echo '<script>
        alert("data berhasil diedit");
        window.location.href="data_operator.php";
        </script>';
    }
}

?>