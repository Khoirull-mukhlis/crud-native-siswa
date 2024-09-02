<?php include 'layout/header.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="data_operator.php">Data operator</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah operator</li>
    </ol>
</nav>

<form method="POST" action="" class="card">
    <div class="card-header">
        Form Jurusan
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nama operator</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="nama_operator" placeholder="Masukkan Nama operator...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">email operator</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="email_operator" placeholder="Masukkan email operator...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">password operator</label>
            </div>
            <div class="col-lg-9">
                <input type="password" class="form-control" name="password_operator" placeholder="Masukkan password operator...">
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button name="simpan" class="btn btn-success">Simpan Data</button>
        <a href="data_operator.php" class="btn btn-danger">Kembali</a>
    </div>
</form>

<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_operator = $_POST['nama_operator'];
    $email_operator = $_POST['email_operator'];
    $password_operator = $_POST['password_operator'];

    $simpan = mysqli_query($conn, "INSERT INTO data_operator (nama_operator, email_operator, password_operator) VALUES ('$nama_operator', '$email_operator', '$password_operator')");

    if ($simpan) {
        echo '<script>
        alert("data berhasil disimpan");
        window.location.href="data_operator.php";
        </script>';
    }
}
?>