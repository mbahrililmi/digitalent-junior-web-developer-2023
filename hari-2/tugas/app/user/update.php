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

    // Check if an image file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // penamaan file gambar
        $image = $_FILES['image']['name'];
        $image = date('dmYHis') . str_replace(" ", "", basename($image));
        
        // nama sementara file gambar
        $location = $_FILES['image']['tmp_name'];
        $typeFile = pathinfo($image, PATHINFO_EXTENSION);
        $fileFoto = $id_anggota . "." . $typeFile;

        // delete old image in folder
        $query = "SELECT image FROM user WHERE id = '$id'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $oldImage = $row['image'];
        unlink("../../images/" . $oldImage);

        // Folder tempat menyimpan file
        $target = "../../images/" . basename($image);
        if (move_uploaded_file($location, $target)) {
            // Jika pengunggahan berhasil, lakukan penyisipan data ke database
            $query = "UPDATE user SET id_anggota = '$id_anggota', name = '$name', gender = '$gender', address = '$address', image = '$image' WHERE id = '$id'";
            $result = mysqli_query($connection, $query);

            if ($result) {
                echo '<script>alert("Data berhasil diubah beserta gambar!");
                window.location.href="./show.php";
                </script>';
                exit();
            } else {
                echo '<script>alert("Gagal mengunggah gambar!");
                window.location.href="./create.php";
                </script>';
                exit();
            }
        } else {
            echo '<script>alert("Gagal mengunggah gambar!");
            window.location.href="./create.php";
            </script>';
            exit();
        }
    } else {
        $query = "UPDATE user SET id_anggota = '$id_anggota', name = '$name', gender = '$gender', address = '$address' WHERE id = '$id'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo '<script>alert("Data berhasil diubah!");
            window.location.href="./show.php";
            </script>';
            exit();
        } else {
            echo '<script>alert("Data gagal diubah!");
            window.location.href="./update.php";
            </script>';
            exit();
        }
    }
}
