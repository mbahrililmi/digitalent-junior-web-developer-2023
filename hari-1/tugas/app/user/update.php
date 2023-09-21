<?php 
// koneksi ke database
include '../../database/koneksi.php';

// ambil data dari form
$id = $_GET['id'];

if (isset($_POST["submit"])) {

    $id_anggota = $_POST["id_anggota"];
    $name = $_POST["nama"];
    $gender = $_POST["jenis_kelamin"];
    $address = $_POST["alamat"];

    $query = "UPDATE user SET id_anggota = '$id_anggota', name = '$name', gender = '$gender', address = '$address' WHERE id = '$id'";

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: ./show.php");
    } else {
        header("Location: ./update.php");
    }
    
}
