<?php

include './koneksi.php';

if (isset($_POST["submit"])) {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $jurusan = $_POST["jurusan"];
    $alamat = $_POST["alamat"];

    $query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', alamat = '$alamat' WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: index.php");
    } else {
        header("Location: form-input.php");
    }
}