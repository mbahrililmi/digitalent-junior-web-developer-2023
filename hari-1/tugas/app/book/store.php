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
        header("Location: ./show.php");
    } else {
        header("Location: ./create.php");
    }
}