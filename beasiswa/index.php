<!DOCTYPE html>
<html lang="en">

<?php include('./assets/template/head.php'); ?>

<body class="bg-grey">

    <?php include('./assets/template/navbar.php'); ?>

    <!-- code php -->
    <?php
    $title = 'Pilih Jenis Beasiswa';

    if (isset($_SESSION['username'])) {
        // include koneksi
        include './database/koneksi.php';

        // ambil data list of scholarships berdasarkan auth_id
        $auth_id = $_SESSION['id'];
        $query = "SELECT * FROM list_of_scholarships WHERE auth_id = '$auth_id'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);

        // cek apakah sudah mendaftar beasiswa
        if ($row) {
            $percent = 100;
        }
    }
    ?>

    <!-- progress -->
    <section class="container mb-1">
        <div class="progress w-100" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-green" style="width: <?= $percent ?? "33" ?>%"><?= $percent ?? "33" ?>%</div>
        </div>
    </section>

    <!-- card form -->
    <section class="bg-grey d-flex align-items-center p-5" id="this-card">
        <div class="container">
            <section class="mb-4">
                <h4 class="mb-4">Selamat Datang di Website Beasiswa Akademik dan Non Akademik</h4>
                <p>Selamat datang di portal beasiswa kami yang bertujuan untuk membantu siswa dan mahasiswa dalam mencari informasi tentang berbagai jenis beasiswa, baik beasiswa akademik maupun non-akademik. Kami berkomitmen untuk menyediakan informasi yang akurat, relevan, dan bermanfaat untuk membantu Anda dalam meraih pendidikan yang lebih baik.</p>
            </section>
            <div class="card text-center mb-4">
                <div class="card-header text-body-secondary">
                    Pilih Jenis Beasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title">Beasiswa</h5>
                    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="jenis_beasiswa" onchange="getValue(this.value)" required>
                        <option selected>
                            <p class="text-warning">Pilih Jenis Beasiswa !!!</p>
                        </option>
                        <option value="1">Beasiswa Akademik</option>
                        <option value="2">Beasiswa Non Akademik</option>
                    </select>
                </div>
                <div class="card-footer text-body-secondary">
                    <p class="text-danger mb-0 fw-bold">Pilih jenis beasiswa untuk informasi lebih lanjut</p>
                </div>
            </div>
            <section id="akademik" hidden>
                <h4 class="mb-4">Apa Itu Beasiswa Akademik?</h4>
                <p>Beasiswa akademik adalah jenis beasiswa yang diberikan kepada siswa atau mahasiswa berdasarkan prestasi akademik mereka. Ini bisa mencakup beasiswa berdasarkan nilai-nilai akademis, tes, atau pencapaian akademik lainnya. Beasiswa akademik biasanya digunakan untuk mendukung biaya pendidikan, buku, dan kebutuhan lainnya yang terkait dengan pendidikan.</p>
            </section>
            <section id="nonAkademik" hidden>
                <h4 class="mb-4">Apa Itu Beasiswa Non Akademik?</h4>
                <p>Beasiswa non akademik adalah beasiswa yang diberikan berdasarkan kriteria selain prestasi akademik. Ini dapat mencakup kriteria seperti keterlibatan dalam kegiatan sosial, keterampilan khusus, atau latar belakang sosial. Beasiswa non akademik dapat membantu siswa yang memiliki minat atau bakat khusus dalam bidang tertentu.</p>
            </section>

        </div>
    </section>

</body>

<script src="./assets/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // get value from select option
        let select = document.querySelector('select');
        select.addEventListener('change', function() {
            getValue(this.value);
        });
    });

    // get value from select option
    function getValue(value) {
        let akademik = document.getElementById('akademik');
        let nonAkademik = document.getElementById('nonAkademik');
        if (value == 1) {
            akademik.removeAttribute('hidden');
            nonAkademik.setAttribute('hidden', '');
        } else if (value == 2) {
            nonAkademik.removeAttribute('hidden');
            akademik.setAttribute('hidden', '');
        } else {
            akademik.setAttribute('hidden', '');
            nonAkademik.setAttribute('hidden', '');
        }
    }
</script>

</html>