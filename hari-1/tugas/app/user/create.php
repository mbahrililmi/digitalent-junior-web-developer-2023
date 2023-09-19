<!DOCTYPE html>
<html lang="en">

<!-- code php -->
<?php
$titleTab = 'Buat Anggota';
?>

<!-- head -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $titleTab ?? 'Perpustakaan' ?>
    </title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<!-- body -->

<body>
    <!-- Header -->
    <?php include("../../assets/template/header.php"); ?>

    <!-- Main Content -->
    <div class="container">
        <!-- Sidebar -->
        <?php include "../../assets/template/sidebar.php"; ?>

        <!-- Content -->
        <main class="content">
            <h2 class="mb-1"><?= $titleTab ?? 'Judul' ?></h2>
            <p class="mb-3">This is the main content area.</p>
            <div class="text-right">
                <a href="./show.php" class="button mb-2">Kembali</a>
            </div>

            <div class="mt-3">
                <form action="" method="POST" onsubmit="return validation();">
                    <label for="id_anggota">ID Anggota:</label>
                    <input type="text" id="id_anggota" name="id_anggota" required>

                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>

                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select id="jenis_kelamin" class="select mb-2" name="jenis_kelamin" required>
                        <option value=""><strong>Pilih Jenis Kelamin</strong></option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label for="alamat">Alamat:</label>
                    <textarea type="text" id="alamat" name="alamat" rows="5" class="mb-2" style="width: 100%;" required></textarea>

                    <div class="text-right">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>

            <div class="paragraph-right mt-2">
                <p id="locationFileUrl">location file</p>
            </div>
        </main>

    </div>

    <!-- Footer -->
    <?php include "../../assets/template/footer.php"; ?>
</body>

<!-- code javascript -->
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById("locationFileUrl").innerHTML = 'File location : ' + window.location.pathname;
    });

    function validation() {
        let id_anggota = document.getElementById('id_anggota').value;
        let nama = document.getElementById('nama').value;
        let jenis_kelamin = document.getElementById('jenis_kelamin').value;
        let alamat = document.getElementById('alamat').value;

        if (id_anggota == '' || nama == '' || jenis_kelamin == '' || alamat == '') {
            alert('Data tidak boleh kosong');
            return false;
        }

        return true;
    }
</script>


</html>