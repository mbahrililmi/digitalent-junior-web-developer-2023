<?php
include '../../database/koneksi.php';

$id = $_GET["id"];

$query = "DELETE FROM user WHERE id = $id";
$result = mysqli_query($connection, $query);

if ($result) {
    header("Location: ./show.php");
}
