<?php 
// koneksi database
include '../../database/koneksi.php';

// ambil data dari form
$id = $_GET['id'];

if (isset($_POST["submit"])) {

    $name_book = $_POST["name_book"];
    $number_of_book = $_POST["number_of_book"];
    $publisher = $_POST["publisher"];

    $query = "UPDATE book SET name_book = '$name_book', number_of_book = '$number_of_book', publisher = '$publisher' WHERE id = '$id'";

    $result = mysqli_query($connection, $query);

    if ($result) {
        echo '<script>alert("Data berhasil diubah!");
        window.location.href="./show.php";
        </script>';
        exit();
    } else {
        echo '<script>alert("Data gagal diubah!");
        window.location.href="./create.php";
        </script>';
        exit(); 
    }

}