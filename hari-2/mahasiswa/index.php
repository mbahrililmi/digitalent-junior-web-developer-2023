<!-- php code -->
<?php
include './koneksi.php';
$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($connection, $sql);
$counter = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mahasiswa</title>
</head>

<body>
    <a href="./form-input.php">Tambah Data</a>
    <h2>List Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>GENDER</th>
            <th>JURUSAN</th>
            <th>ALAMAT</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) {
            $counter++; ?>
            <tr>
                <td><?= $counter ?></td>
                <td><?= $row["nim"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["jenis_kelamin"] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                <td><?= $row["jurusan"] ?></td>
                <td><?= $row["alamat"] ?></td>
                <td>
                    <a href="./form-edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="./delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>