<?php

// koneksi database
include '../../database/koneksi.php';

$id = $_GET["id"];

$query = "DELETE FROM book WHERE id = $id";
$result = mysqli_query($connection, $query);

if ($result) {
    echo '<script>alert("Data berhasil dihapus!");
    window.location.href="./show.php";
    </script>';
} else {
    echo '<script>alert("Data gagal dihapus!");
    window.location.href="./show.php";
    </script>';
}