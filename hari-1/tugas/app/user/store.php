<?php
// koneksi database
include '../../database/koneksi.php';

if (isset($_POST["submit"])) {

    $id_anggota = $_POST["id_anggota"];
    $name = $_POST["nama"];
    $gender = $_POST["jenis_kelamin"];
    $address = $_POST["alamat"];

    $query = "INSERT INTO user VALUES(NULL, '$id_anggota', '$name', '$gender', '$address')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: ./show.php");
    } else {
        header("Location: ./create.php");
    }
}
