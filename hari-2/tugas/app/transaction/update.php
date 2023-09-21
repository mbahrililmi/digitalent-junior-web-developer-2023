<!DOCTYPE html>
<html lang="en">

<!-- code php -->
<?php
$titleTab = 'Ubah Transaksi';
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
                    <label for="book">Nama Buku:</label>
                    <select id="book" class="select mb-2" name="book" required>
                        <option value=""><strong>Pilih Buku yg dipinjam</strong></option>
                        <option value="1">Matematika</option>
                        <option value="2">fisika</option>
                    </select>

                    <label for="count">Jumlah Dipinjam:</label>
                    <input type="text" id="count" name="count" required>

                    <label for="date">Waktu Peminjaman:</label>
                    <input type="date" id="date" name="date" required>

                    <label for="name">Nama Peminjam:</label>
                    <select id="name" class="select mb-2" name="name" required>
                        <option value=""><strong>Pilih Nama Peminjam</strong></option>
                        <option value="1">M. BAHRIL ILMI</option>
                        <option value="2">M. HAFI MAULANI</option>
                    </select>

                    <div class="text-right">
                        <button type="submit">Ubah</button>
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