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
    <title>Form Anggota</title>
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
                <form action="proses.php" method="POST">
                    <label for="id_anggota">ID Anggota:</label>
                    <input type="text" id="id_anggota" name="id_anggota" required>

                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>

                    <label>Jenis Kelamin:</label>
                    <input type="radio" id="jenis_kelamin_l" name="jenis_kelamin" value="Laki-Laki" required>
                    <label for="jenis_kelamin_l">Laki-Laki</label>
                    <input type="radio" id="jenis_kelamin_p" name="jenis_kelamin" value="Perempuan" required>
                    <label for="jenis_kelamin_p">Perempuan</label>

                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" required>

                    <button type="submit">Submit</button>
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
</script>


</html>