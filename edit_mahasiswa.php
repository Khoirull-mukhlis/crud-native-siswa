<?php include 'layout/header.php';
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM data_mahasiswa where id_mahasiswa = '$id'");
$get = mysqli_fetch_array($query);

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="data_mahasiswa.php">Data Mahasiswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Mahasiswa</li>
    </ol>
</nav>

<form method="POST" action="" class="card">
    <div class="card-header">
        Form Mahasiswa
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="">NIM Mahasiswa</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="from-control" value="<?= $get['nim_mahasiswa'] ?>" name="nim_mahasiswa" placeholder="Masukkan nomor induk mahasiswa....">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Nama Mahasiswa</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['nama_mahasiswa'] ?>" name="nama_mahasiswa" placeholder="Masukkan nama lengkap mahasiswa....">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Tanggal Lahir</label>
            </div>
            <div class="col-lg-9">
                <input type="date" class="form-control" value="<?= $get['tgl_lahir'] ?>" name="tgl_lahir">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Jenis Kelamin</label>
            </div>
            <div class="col-lg-9">
                <div class="form-check-control">
                    <label>
                        <input type="radio" name="jenis_kelamin" id="laki-laki" value="L" <?php echo ($get['jenis_kelamin'] == 'L') ? 'checked' : ''; ?> />
                        <div class="radio-box"></div>
                        <label for="laki-laki">Laki-laki</label>
                    </label>
                </div>
                <label>
                    <input type="radio" name="jenis_kelamin" id="laki-laki" value="P" <?php echo ($get['jenis_kelamin'] == 'P') ? 'checked' : ''; ?> />
                    <div class="radio-box"></div>
                    <label for="perempuan">perempuan</label>
                </label>
            </div>
            </ <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Jurusan</label>
            </div>
            <div class="col-lg-9">
                <select class="form-select" id="jurusan" aria-label="Default select example" name="jurusan">
                    <option value="" disabled selected>Pilih Jurusan</option>
                    <?php
                    include "koneksi.php";

                    $query = mysqli_query($conn, "SELECT * FROM data_jurusan");

                    while ($data = mysqli_fetch_array($query)) {
                        $selected = ($data['id_jurusan'] == $get['id_jurusan']) ? 'selected' : '';
                        echo "<option value='{$data['id_jurusan']}' $selected>{$data['nama_jurusan']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button name="edit" class="btn btn-success">Edit Data</button>
        <a href="data_mahasiswa.php" class="btn btn-danger">Kembali</a>
    </div>
</form>

<?php

include 'layout/footer.php';

if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $nim_mahasiswa = $_POST['nim_mahasiswa'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan = $_POST['jurusan'];

    $simpan = mysqli_query($conn, "UPDATE data_mahasiswa
    SET nim_mahasiswa = '$nim_mahasiswa', nama_mahasiswa = '$nama_mahasiswa', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', id_jurusan = '$jurusan'
    where id_mahasiswa = '$id'");

    if ($simpan) {
        echo '<script>1
    alert("data berhasil diedit");
    window.location.href="data_mahasiswa.php";
    </script>';
    }
}

?>