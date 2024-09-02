<?php
include 'layout/header.php';
include 'koneksi.php';


$laki = mysqli_query($conn, "SELECT COUNT(jenis_kelamin) as L FROM data_mahasiswa where jenis_kelamin = 'L';");

$perempuan = mysqli_query($conn, "SELECT COUNT(jenis_kelamin) as P FROM data_mahasiswa where jenis_kelamin = 'P';");

$jml_jurusan = mysqli_query($conn, "SELECT COUNT(*) as jurusan FROM data_jurusan;");

$jurusan = mysqli_query($conn, "SELECT dj.nama_jurusan, (SELECT COUNT(*) FROM data_mahasiswa dm WHERE dm.id_jurusan = dj.id_jurusan) AS jumlah_mahasiswa FROM data_jurusan dj;");

$jum_mahasiswa = mysqli_query($conn, "SELECT id_mahasiswa from data_mahasiswa ");

$tot = mysqli_query($conn, "SELECT COUNT(*) as admin FROM operator_sistem");
$jumlah = mysqli_fetch_array($tot);

?>

<div class="row">
    <div class="col-xl-6 col-xxl-12">
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card avtivity-card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="activity-icon bgl-success me-md-4 me-3">
                                        <i class="bi bi-book-half text-success" style="font-size:30px;"></i>
                                    </span>
                                    <div class="media-body">
                                        <p class="fs-14 mb-2">Jumlah Jurusan</p>
                                        <span class="title text-black font-w600"> <?php while ($row4 = $jml_jurusan->fetch_assoc()) {
                                                                                        echo $row4['jurusan'] . "<br>";
                                                                                    } ?></span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-success" style="width: 100%; height:5px;" aria-label="Progess-success" role="progressbar">

                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-success" style="top: 73px; left: 322px;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card avtivity-card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="activity-icon bgl-secondary  me-md-4 me-3">
                                        <i class="bi bi-send-check text-secondary" style="font-size: 30px;"></i>
                                    </span>
                                    <div class="media-body">
                                        <p class="fs-14 mb-2">Akses Admin</p>
                                        <span class="title text-black font-w600"><?= $jumlah['admin'] ?></span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-secondary" style="width: 100%; height:5px;" aria-label="Progess-secondary" role="progressbar">

                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-secondary" style="top: -3px; left: 55.7875px;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card avtivity-card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="activity-icon bgl-danger me-md-4 me-3">
                                        <i class="bi bi-pencil-square text-danger" style="font-size: 30px;"></i>
                                    </span>
                                    <div class="media-body">
                                        <p class="fs-14 mb-2">Total L/P</p>
                                        <span class="title text-black font-w600">L: <?php echo $laki->fetch_assoc()['L']; ?></span>
                                        <span class="title text-black font-w600">P: <?php echo $perempuan->fetch_assoc()['P']; ?></span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-danger" style="width: 100%; height:5px;" aria-label="Progess-danger" role="progressbar">

                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-danger" style="top: -24px; left: 157px;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card avtivity-card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="activity-icon bgl-warning  me-md-4 me-3">
                                        <svg width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 30.5H22.75C23.7442 30.4989 24.6974 30.1035 25.4004 29.4004C26.1035 28.6974 26.4989 27.7442 26.5 26.75V16.75C26.5 16.4185 26.3683 16.1005 26.1339 15.8661C25.8995 15.6317 25.5815 15.5 25.25 15.5C24.9185 15.5 24.6005 15.6317 24.3661 15.8661C24.1317 16.1005 24 16.4185 24 16.75V26.75C23.9997 27.0814 23.8679 27.3992 23.6336 27.6336C23.3992 27.8679 23.0814 27.9997 22.75 28H4C3.66857 27.9997 3.3508 27.8679 3.11645 27.6336C2.88209 27.3992 2.7503 27.0814 2.75 26.75V9.25C2.7503 8.91857 2.88209 8.6008 3.11645 8.36645C3.3508 8.13209 3.66857 8.0003 4 8H15.25C15.5815 8 15.8995 7.8683 16.1339 7.63388C16.3683 7.39946 16.5 7.08152 16.5 6.75C16.5 6.41848 16.3683 6.10054 16.1339 5.86612C15.8995 5.6317 15.5815 5.5 15.25 5.5H4C3.00577 5.50109 2.05258 5.89653 1.34956 6.59956C0.646531 7.30258 0.251092 8.25577 0.25 9.25V26.75C0.251092 27.7442 0.646531 28.6974 1.34956 29.4004C2.05258 30.1035 3.00577 30.4989 4 30.5Z" fill="#EA4989"></path>
                                            <path d="M25.25 0.5C24.0138 0.5 22.8055 0.866556 21.7777 1.55331C20.7498 2.24007 19.9488 3.21619 19.4757 4.35823C19.0027 5.50027 18.8789 6.75693 19.1201 7.96931C19.3612 9.1817 19.9565 10.2953 20.8306 11.1694C21.7046 12.0435 22.8183 12.6388 24.0307 12.8799C25.243 13.1211 26.4997 12.9973 27.6417 12.5242C28.7838 12.0512 29.7599 11.2501 30.4466 10.2223C31.1334 9.19451 31.5 7.98613 31.5 6.75C31.498 5.093 30.8389 3.50442 29.6672 2.33274C28.4955 1.16106 26.907 0.501952 25.25 0.5ZM25.25 10.5C24.5083 10.5 23.7833 10.2801 23.1666 9.86801C22.5499 9.45596 22.0692 8.87029 21.7854 8.18506C21.5016 7.49984 21.4273 6.74584 21.572 6.01841C21.7167 5.29098 22.0739 4.6228 22.5983 4.09835C23.1228 3.5739 23.7909 3.21675 24.5184 3.07206C25.2458 2.92736 25.9998 3.00162 26.685 3.28545C27.3702 3.56928 27.9559 4.04993 28.368 4.66661C28.78 5.2833 29 6.00832 29 6.75C28.9989 7.74423 28.6034 8.69742 27.9004 9.40044C27.1974 10.1035 26.2442 10.4989 25.25 10.5Z" fill="#EA4989"></path>
                                            <path d="M6.5 13H12.75C13.0815 13 13.3995 12.8683 13.6339 12.6339C13.8683 12.3995 14 12.0815 14 11.75C14 11.4185 13.8683 11.1005 13.6339 10.8661C13.3995 10.6317 13.0815 10.5 12.75 10.5H6.5C6.16848 10.5 5.85054 10.6317 5.61612 10.8661C5.3817 11.1005 5.25 11.4185 5.25 11.75C5.25 12.0815 5.3817 12.3995 5.61612 12.6339C5.85054 12.8683 6.16848 13 6.5 13Z" fill="#EA4989"></path>
                                            <path d="M5.25 16.75C5.25 17.0815 5.3817 17.3995 5.61612 17.6339C5.85054 17.8683 6.16848 18 6.5 18H17.75C18.0815 18 18.3995 17.8683 18.6339 17.6339C18.8683 17.3995 19 17.0815 19 16.75C19 16.4185 18.8683 16.1005 18.6339 15.8661C18.3995 15.6317 18.0815 15.5 17.75 15.5H6.5C6.16848 15.5 5.85054 15.6317 5.61612 15.8661C5.3817 16.1005 5.25 16.4185 5.25 16.75Z" fill="#EA4989"></path>
                                        </svg>
                                    </span>
                                    <div class="media-body">
                                        <p class="fs-14 mb-2">Total Mahasiswa</p>
                                        <span class="title text-black font-w600"><?= mysqli_num_rows($jum_mahasiswa) ?></span></span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-warning" style="width: 100%; height:5px;" role="progressbar">

                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-warning" style="top: -9.00001px; left: 291.787px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Dokumen Mahasiswa Jurusan</th>
                                        <th width="10" class="text-center">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row5 = $jurusan->fetch_assoc()) {
                                        echo '<tr>
                                    <td>
                                    ' . $row5['nama_jurusan'] . '</td>
                                    <td class="text-center">' .
                                            $row5['jumlah_mahasiswa'] . '</td>
                                     </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bg-gra" style=" box-shadow: 0 1px 8px rgb(153 153 153 / 20%), 0 3px 4px rgb(255 255 255 / 14%), 0 3px 3px -2px rgb(255 255 255 / 12%);">
                            <div class="card-body">
                                <div class="row d-flex">
                                    <div class="col-md-8">
                                        <h4 class="text-bold text-weight-bolder" style="color: #000; text-shadow: #fff 1px 2px 2px; margin-bottom:2px;">
                                            <img src="https://unibamadura.ac.id/page/images/profil/1.png" width="28" alt="" style="margin-top: -3px">
                                            Informatika<span style="font-size: 14px;"> Uniba
                                                Madura</span>
                                        </h4>
                                        <span class="mb-5">December 28,
                                            2023</span>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="assets/bg/student.png" width="100%" alt="">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h5 class="mb-0" style="color: #008eff"><?php if (isset($_SESSION['id_operator'])) : ?>
                                            <p class="mt-3">Selamat Datang, <?php echo $_SESSION['nama_operator']; ?>!</p>
                                        <?php endif; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-4 text-primary"><i class="bi bi-activity"></i> Aktifitas
                                </h5>
                                <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                                    <li class="me-3 mb-2"><i class="las la-clock scale5 me-2"></i><span class="fs-14 text-black">Last Login </span></li>
                                    <li class="mb-2"><span class="fs-14 text-black font-w500">2023-12-28
                                            10:07:38</span>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                                    <li class="me-3 mb-2"><i class="bi bi-gear scale4 me-2"></i><span class="fs-14 text-black">IP
                                            Address
                                        </span></li>
                                    <li class="mb-2"><span class="fs-14 text-black font-w500">192.168.1.1</span>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                                    <li class="me-3 mb-2"><i class="bi bi-browser-chrome"></i> <span class="fs-14 text-black">Browser
                                        </span></li>
                                    <li class="mb-2"><span class="fs-14 text-black font-w500">Chrome</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'layout/footer.php'; ?>