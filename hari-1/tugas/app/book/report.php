<?php
// koneksi database
include '../../database/koneksi.php';

// ambil data semua buku
$query = "SELECT * FROM book";
$result = mysqli_query($connection, $query);
$counter = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Buku</title>
</head>

<body>
    <table align="center" border="1" style="width: 100%;">
        <thead>
            <tr bgcolor="lightgrey">
                <th>No</th>
                <th>Nama Buku</th>
                <th>Jumlah Buku</th>
                <th>Penerbit</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) {
                $counter++; ?>
                <tr>
                    <td><?= $counter ?></td>
                    <td><?= $row['name_book'] ?></td>
                    <td><?= $row['number_of_book'] ?></td>
                    <td><?= $row['publisher'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        window.print();
    });

    // jika di close maka tab di tutup
    window.onafterprint = function() {
        window.close();
    };
</script>

</html>