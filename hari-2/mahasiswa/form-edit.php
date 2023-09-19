<?php
// get koneksi database
include './koneksi.php';

// get id from url
$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <form action="./simpan.php" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td>
                    <input type="number" name="nim" value="<?= $row['nim'] ?>">
                </td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <input type="text" name="nama" value="<?= $row['nama'] ?>">
                </td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td>
                    <input type="radio" name="jenis_kelamin" <?= $row['jenis_kelamin'] == 'L' ? 'checked' : '' ?> value="L">Laki Laki
                    <input type="radio" name="jenis_kelamin" <?= $row['jenis_kelamin'] == 'P' ? 'checked' : '' ?> value="P">Perempuan
                </td>
            </tr>
            <tr>
                <td>JURUSAN</td>
                <td>
                    <select name="jurusan" id="">
                        <option value="Teknik Informatika" <?= $row['jurusan'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                        <option value="Teknik Mesin" <?= $row['jurusan'] == 'Teknik Mesin' ? 'selected' : '' ?>>Teknik Mesin</option>
                        <option value="Teknik Elektro" <?= $row['jurusan'] == 'Teknik Elektro' ? 'selected' : '' ?>>Teknik Elektro</option>
                        <option value="Teknik Industri" <?= $row['jurusan'] == 'Teknik Industri' ? 'selected' : '' ?>>Teknik Industri</option>
                        <option value="Teknik Sipil" <?= $row['jurusan'] == 'Teknik Sipil' ? 'selected' : '' ?>>Teknik Sipil</option>
                        <option value="Teknik Lingkungan" <?= $row['jurusan'] == 'Teknik Lingkungan' ? 'selected' : '' ?>>Teknik Lingkungan</option>
                        <option value="Teknik Perencanaan" <?= $row['jurusan'] == 'Teknik Perencanaan' ? 'selected' : '' ?>>Teknik Perencanaan</option>
                        <option value="Teknik Perkapalan" <?= $row['jurusan'] == 'Teknik Perkapalan' ? 'selected' : '' ?>>Teknik Perkapalan</option>
                        <option value="Teknik Kelautan" <?= $row['jurusan'] == 'Teknik Kelautan' ? 'selected' : '' ?>>Teknik Kelautan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td>
                    <textarea name="alamat" id="" cols="30" rows="10"><?= $row['alamat'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="submit">Ubah</button>
                </td>
        </table>
    </form>
</body>

</html>