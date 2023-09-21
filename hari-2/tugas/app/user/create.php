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
                <form action="./store.php" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
                    <label for="image">Foto:</label>
                    <input type="file" id="image" name="image" required>
                    <div id="output"></div>
                    
                    <label for="id_anggota">ID Anggota:</label>
                    <input type="number" id="id_anggota" name="id_anggota" required>

                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>

                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select id="jenis_kelamin" class="select mb-2" name="jenis_kelamin" required>
                        <option value=""><strong>Pilih Jenis Kelamin</strong></option>
                        <option value="l">Laki-Laki</option>
                        <option value="p">Perempuan</option>
                    </select>

                    <label for="alamat">Alamat:</label>
                    <textarea type="text" id="alamat" name="alamat" rows="5" class="mb-2" style="width: 100%;" required></textarea>

                    <div class="text-right">
                        <button type="submit" name="submit">Submit</button>
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

    // show image before upload
    var input = document.getElementById('image');
    var output = document.getElementById('output');

    input.addEventListener('change', function() {
        var file = input.files[0];
        var url = URL.createObjectURL(file);

        output.innerHTML = '<img src="' + url + '" alt="preview image" style="width: 200px; height: 200px;">';
    });
</script>


</html>