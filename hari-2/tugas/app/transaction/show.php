<!DOCTYPE html>
<html lang="en">

<!-- code php -->
<?php
$titleTab = 'Traksaksi Peminjaman';

?>

<!-- head -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $titleTab ?? 'Perpustakaan' ?>
    </title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
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
            <div class="text-right mb-3">
                <a href="./create.php" class="button mb-2">Tambah</a>
            </div>

            <!-- content -->
            <table id="myTable" class="display mt-5">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Buku</th>
                        <th>Jumlah dipinjam</th>
                        <th>Waktu Peminjaman</th>
                        <th>Peminjam</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Matematika</td>
                        <td>1</td>
                        <td><?= date('d-m-Y') ?></td>
                        <td>M. BAHRIL ILMI</td>
                        <td>
                            <a href="./update.php" class="button">Edit</a>
                            <a href="./delete.php" class="button bg-red">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="paragraph-right mt-2">
                <p id="locationFileUrl">location file</p>
            </div>
        </main>

    </div>

    <!-- Footer -->
    <?php include "../../assets/template/footer.php"; ?>
</body>


<!-- jquery for data table if used -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<!-- code javascript -->
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById("locationFileUrl").innerHTML = 'File location : ' + window.location.pathname;
        let table = new DataTable('#myTable', {
            responsive: true
        });
    });
</script>

</html>