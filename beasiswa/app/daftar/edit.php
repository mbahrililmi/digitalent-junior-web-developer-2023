<!DOCTYPE html>
<html lang="en">

<!-- code php -->
<?php
$title = 'Daftar Beasiswa';
$ipk = 3.5;
$register = false;

if ($ipk >= 3) {
    $register = true;
}
?>

<?php include('../../assets/template/head.php'); ?>

<body class="bg-grey">

    <?php include('../../assets/template/navbar.php'); ?>

    <?php
    // get id from session
    $auth_id = $_SESSION["id"];

    // konek ke database
    include '../../database/koneksi.php';

    // ambil data dari database
    $query = "SELECT * FROM list_of_scholarships WHERE auth_id = '$auth_id'";

    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    ?>

    <!-- progress -->
    <section class="container mb-1">
        <div class="progress w-100" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-green" style="width: 66%">66%</div>
        </div>
    </section>

    <!-- card form -->
    <section class="bg-grey d-flex align-items-center p-5" id="this-card">
        <div class="container">
            <div class="card text-center">
                <div class="card-header text-body-secondary ">
                    <span class="text-warning">Ubah Data Beasiswa</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Perubahan Data Beasiswa</h5>
                    <form action="./update.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Masukan Nama <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value="<?= $row['name'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Masukan Email <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" value="<?= $row['email'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Nomor HP <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="phone" id="phone" value="<?= $row['phone'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="semester" class="col-sm-2 col-form-label">Semester <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="semester" required>
                                    <option <?= $row['semester'] == '1' ? 'selected' : '' ?> value="1">1</option>
                                    <option <?= $row['semester'] == '2' ? 'selected' : '' ?> value="2">2</option>
                                    <option <?= $row['semester'] == '3' ? 'selected' : '' ?> value="3">3</option>
                                    <option <?= $row['semester'] == '4' ? 'selected' : '' ?> value="4">4</option>
                                    <option <?= $row['semester'] == '5' ? 'selected' : '' ?> value="5">5</option>
                                    <option <?= $row['semester'] == '6' ? 'selected' : '' ?> value="6">6</option>
                                    <option <?= $row['semester'] == '7' ? 'selected' : '' ?> value="6">6</option>
                                    <option <?= $row['semester'] == '8' ? 'selected' : '' ?> value="8">8</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ipk" class="col-sm-2 col-form-label">IPK <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control hidden" name="ipk" id="ipk" value="<?= $row['ipk'] ?>" max="4.0" readonly required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type_of_scholarship" class="col-sm-2 col-form-label">Pilihan Beasiswa <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="type_of_scholarship" required>
                                    <option <?= $row['type_of_scholarship'] == '1' ? 'selected' : '' ?> value="1">Beasiswa Akademik</option>
                                    <option <?= $row['type_of_scholarship'] == '2' ? 'selected' : '' ?> value="2">Beasiswa Non Akademik</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="file" class="col-sm-2 col-form-label">Upload Berkas Syarat <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control hidden mb-4" name="file" accept=".pdf, .jpg, .zip" id="file" required>
                                <!-- show file -->
                                <?php if ($row['file'] != '') : ?>
                                    <a href="../../files/<?= $row['file'] ?>" target="_blank" class="btn btn-success w-100">Lihat Berkas</a>
                                <?php else : ?>
                                    <h5 class="text-danger">Belum Upload Berkas</h5>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="submit">Ubah Data</button>
                    </form>
                </div>
                <div class="card-footer text-body-secondary">
                    <p class="text-warning mb-0 fw-bold">Isi semua data, jangan ada yg kosong</p>
                </div>
            </div>
        </div>
    </section>

</body>

<script src="../../assets/js/bootstrap.min.js"></script>

</html>