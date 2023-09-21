<?php

// koneksi database
include '../../database/koneksi.php';

$id = $_GET["id"];

$query = "DELETE FROM book WHERE id = $id";
$result = mysqli_query($connection, $query);

if ($result) {
    header("Location: ./show.php");
}