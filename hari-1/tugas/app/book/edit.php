<!DOCTYPE html>
<html lang="en">

<!-- code php -->
<?php
$titleTab = 'Ubah Buku';

// include koneksi
include "../../database/koneksi.php";

$id = $_GET["id"];
$query = "SELECT * FROM book WHERE id = $id";
$result = mysqli_query($connection, $query);
$book = mysqli_fetch_assoc($result);
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
                <form action="./update.php?id=<?= $book["id"] ?>" method="POST" onsubmit="return validation();">
                    <label for="name_book">Nama Buku:</label>
                    <input type="text" id="name_book" name="name_book" value="<?= $book['name_book']; ?>" required>

                    <label for="number_of_book">Jumlah:</label>
                    <input type="number" id="number_of_book" name="number_of_book" value="<?= $book['number_of_book']; ?>" required>

                    <label for="publisher">Penerbit:</label>
                    <input type="text" id="publisher" name="publisher" value="<?= $book['publisher']; ?>" required>

                    <div class="text-right">
                        <button type="submit" name="submit">Ubah</button>
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
        let name_book = document.getElementById('name_book').value;
        let number_of_book = document.getElementById('number_of_book').value;
        let publisher = document.getElementById('publisher').value;

        if (name_book == '' || number_of_book == '' || publisher == '') {
            alert('Data tidak boleh kosong');
            return false;
        }

        return true;
    }
</script>


</html>