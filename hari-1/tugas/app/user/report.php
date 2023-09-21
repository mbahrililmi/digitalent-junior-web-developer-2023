<?php
// koneksi database
include '../../database/koneksi.php';

// ambil data semua user
$query = "SELECT * FROM user";
$result = mysqli_query($connection, $query);
$counter = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Anggota</title>
</head>

<body>
    <table align="center" border="1" style="width: 100%;">
        <thead>
            <tr bgcolor="lightgrey">
                <th>No</th>
                <th>Id Anggota</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) {
                $counter++; ?>
                <tr>
                    <td><?= $counter ?></td>
                    <td><?= $row['id_anggota'] ?></td>
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