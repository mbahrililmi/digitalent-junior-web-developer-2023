<?php
include './koneksi.php';

$id = $_GET["id"];

$query = "DELETE FROM mahasiswa WHERE id = $id";
$result = mysqli_query($connection, $query);

if ($result) {
    header("Location: index.php");
}else{
    header("Location: form-input.php");
}
