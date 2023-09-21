<!DOCTYPE html>
<html lang="en">

<!-- code php -->
<?php
$titleTab = 'List Anggota';

// include koneksi
include "../../database/koneksi.php";

$query = "SELECT * FROM user";
$result = mysqli_query($connection, $query);
$counter = 0;
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
                        <th>Id Anggota</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        $counter++; ?>
                        <tr>
                            <td><?= $counter ?></td>
                            <td><?= $row['id_anggota'] ?></td>
                            <td><img src="../../images/<?= $row['image'] ?>" alt="<?= $row['image'] ?>" width="100px"></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['gender'] == 'l' ? 'Laki-laki' : 'Perempuan' ?></td>
                            <td><?= $row['address'] ?></td>
                            <td>
                                <a href="./edit.php?id=<?= $row["id"] ?>" class="button">Edit</a>
                                <a href="./delete.php?id=<?= $row["id"] ?>" class="button bg-red" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
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