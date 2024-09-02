<?php
include 'layout/header.php';
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT 
        data_mahasiswa.id_mahasiswa,
        data_mahasiswa.nama_mahasiswa,
        data_mahasiswa.nim_mahasiswa,
        data_mahasiswa.tgl_lahir,
        data_mahasiswa.jenis_kelamin,
        data_jurusan.nama_jurusan AS jurusan
        FROM data_mahasiswa 
        INNER JOIN data_jurusan ON data_mahasiswa.id_jurusan = data_jurusan.id_jurusan");
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
    </ol>
</nav>
<div class="card">
    <div class="card-header">
        List Mahasiswa
    </div>
    <div class="card-body">
        <a href="tambah_mahasiswa.php" class="btn btn-primary btn-sm mb-3">+ Tambah Data Mahasiswa</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($get = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $get['nim_mahasiswa'] ?></td>
                            <td><?= $get['nama_mahasiswa'] ?></td>
                            <td><?= $get['tgl_lahir'] ?></td>
                            <td><?= $get['jenis_kelamin'] ?></td>
                            <td><?= $get['jurusan'] ?></td>
                            <td>
                                <a href="edit_mahasiswa.php?id=<?= $get['id_mahasiswa'] ?>" class="badge bg-primary">
                                    Edit
                                </a>
                                <a onclick="return confirm('Hapus Data?')" href="hapus_mahasiswa.php?id=<?= $get['id_mahasiswa'] ?>" class="badge bg-danger">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'layout/footer.php'; ?>