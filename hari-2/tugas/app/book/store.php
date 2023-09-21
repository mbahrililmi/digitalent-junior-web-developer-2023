<?php 
// koneksi database
include '../../database/koneksi.php';

if (isset($_POST["submit"])) {

    $name_book = $_POST["name_book"];
    $number_of_book = $_POST["number_of_book"];
    $publisher = $_POST["publisher"];

    $query = "INSERT INTO book VALUES(NULL, '$name_book', '$number_of_book', '$publisher')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<script>alert("Data berhasil ditambahkan!");
        window.location.href="./show.php";
        </script>';
        exit();
    } else {
        echo '<script>alert("Data gagal ditambahkan!");
        window.location.href="./create.php";
        </script>';
        exit();
    }
}