<!DOCTYPE html>
<html lang="en">

<!-- code php -->
<?php
$title = 'Daftar Beasiswa';
$ipk = 2.9;
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

    // cek apakah $row ada isinya atau tidak
    if ($row) {
        // cek apakah data berhasil diambil
        if ($row['verifikasi'] == 1) {
            echo "<script>
            var message = 'Anda anda sudah mendaftar beasiswa dan sudah diverifikasi, anda tidak bisa melakukan perubahan data';
            alert(message);
            window.location.href = '../hasil/show.php';
        </script>";
            exit();
        } else if ($row['verifikasi'] == 0) {
            echo "<script>
            var message = 'Anda anda sudah mendaftar beasiswa dan belum diverifikasi anda bisa melakukan perubahan data';
            alert(message);
            window.location.href = './edit.php';
        </script>";
            exit();
        }
    }
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
                <div class="card-header text-body-secondary">
                    Daftar Beasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title">Registrasi Beasiswa</h5>
                    <form action="./store.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Masukan Nama <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Masukan Email <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-2 col-form-label">Nomor HP <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="phone" id="phone" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="semester" class="col-sm-2 col-form-label">Semester <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="semester" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ipk" class="col-sm-2 col-form-label">IPK <span class="text-danger fw-bold">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control hidden" name="ipk" id="ipk" value="<?= $ipk ?? '' ?>" readonly required max="4.0">
                            </div>
                        </div>

                        <!-- buat if jika register true maka bisa mengisi data -->
                        <?php if ($register) : ?>
                            <div class="row mb-3">
                                <label for="type_of_scholarship" class="col-sm-2 col-form-label">Pilihan Beasiswa <span class="text-danger fw-bold">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="type_of_scholarship" required>
                                        <option value="1">Beasiswa Akademik</option>
                                        <option value="2">Beasiswa Non Akademik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-sm-2 col-form-label">Upload Berkas Syarat <span class="text-danger fw-bold">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control hidden" name="file" accept=".pdf, .jpg, .zip" id="file" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="submit">Simpan</button>
                        <?php else : ?>
                            <h4 class="text-danger">Maaf anda tidak bisa mendaftar dikarenakan IPK anda dibawah 3</h4>
                        <?php endif; ?>
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