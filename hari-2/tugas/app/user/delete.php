<?php
include '../../database/koneksi.php';

$id = $_GET["id"];

// delete image in folder
$query = "SELECT image FROM user WHERE id = '$id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$oldImage = $row['image'];
unlink("../../images/" . $oldImage);

// delete data from database
$query = "DELETE FROM user WHERE id = $id";
$result = mysqli_query($connection, $query);


if ($result) {
    echo '<script>alert("Data berhasil dihapus!");
    window.location.href="./show.php";
    </script>';
}else{
    echo '<script>alert("Data gagal dihapus!");
    window.location.href="./show.php";
    </script>';
}
