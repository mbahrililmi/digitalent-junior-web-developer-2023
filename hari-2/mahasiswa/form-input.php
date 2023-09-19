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
                    <input type="number" name="nim">
                </td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>
                    <input type="text" name="nama">
                </td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="L">Laki Laki
                    <input type="radio" name="jenis_kelamin" value="P">Perempuan
                </td>
            </tr>
            <tr>
                <td>JURUSAN</td>
                <td>
                    <select name="jurusan" id="">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                        <option value="Teknik Perencanaan">Teknik Perencanaan</option>
                        <option value="Teknik Perkapalan">Teknik Perkapalan</option>
                        <option value="Teknik Kelautan">Teknik Kelautan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td>
                    <textarea name="alamat" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="submit">Simpan</button>
                </td>
        </table>
    </form>
</body>

</html>