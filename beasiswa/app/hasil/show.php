<!DOCTYPE html>
<html lang="en">

<?php include('../../assets/template/head.php'); ?>

<body class="bg-grey">

    <?php include('../../assets/template/navbar.php'); ?>

    <!-- code php -->
    <?php
    $title = 'Daftar Beasiswa';

    // get id from session
    $auth_id = $_SESSION["id"];

    // konek ke database
    include '../../database/koneksi.php';

    // ambil data dari database
    $query = "SELECT * FROM list_of_scholarships WHERE auth_id = '$auth_id'";

    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    // cek apakah data berhasil diambil
    if (!$row) {
        echo "<script>
            var message = 'Anda belum mendaftar beasiswa';
            alert(message);
            window.location.href = '../../index.php';
        </script>";
        exit();
    }
    ?>

    <!-- progress -->
    <section class="container mb-4">
        <div class="progress w-100" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-green" style="width: 100%">100%</div>
        </div>
    </section>

    <!-- card form -->
    <section class="bg-grey d-flex align-items-center p-5" id="this-card">
        <div class="container">
            <div class="card text-center">
                <div class="card-header text-body-secondary bg-green">
                    <h5 class="text-light mb-0">Hasil</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Hasil Registrasi Beasiswa</h5>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Masukan Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="<?= $row['name'] ?>" readonly require>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Masukan Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" value="<?= $row['email'] ?>" readonly require>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-2 col-form-label">Nomor HP</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="phone" id="phone" value="<?= $row['phone'] ?>" readonly require>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="semester" id="semester" value="<?= $row['semester'] ?>" readonly require>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ipk" class="col-sm-2 col-form-label">IPK</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control hidden" name="ipk" id="ipk" value="<?= $row['ipk'] ?>" readonly require>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="type_of_scholarship" class="col-sm-2 col-form-label">Pilihan Beasiswa</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="type_of_scholarship" disabled require>
                                <option <?= $row['type_of_scholarship'] == '1' ? 'selected' : '' ?> value="1">Beasiswa Akademik</option>
                                <option <?= $row['type_of_scholarship'] == '2' ? 'selected' : '' ?> value="2">Beasiswa Non Akademik</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="file" class="col-sm-2 col-form-label">Upload Berkas Syarat</label>
                        <div class="col-sm-10">
                            <!-- show file -->
                            <?php if ($row['file'] != '') : ?>
                                <a href="../../files/<?= $row['file'] ?>" target="_blank" class="btn btn-success">Lihat Berkas</a>
                            <?php else : ?>
                                <h5 class="text-danger">Belum Upload Berkas</h5>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <label for="verifikasi" class="col-sm-2 col-form-label">Status Pengajuan</label>
                        <div class="col-sm-10">
                            <?php if ($row['verifikasi'] == '1') : ?>
                                <h5 class="text-success">Terverifikasi</h5>
                            <?php else : ?>
                                <h5 class="text-warning">Belum Terverifikasi</h5>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-body-secondary">
                    <p class="text-green mb-0 fw-bold">Tunggu info dari admin ya</p>
                </div>
            </div>
        </div>
    </section>

</body>

<script src="../../assets/js/bootstrap.min.js"></script>

</html>