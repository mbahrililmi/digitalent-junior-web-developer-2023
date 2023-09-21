<?php
// koneksi database
include '../../database/koneksi.php';

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
        // penamaan file gambar sementara
        $location = $_FILES['image']['tmp_name'];
        $typeFile = pathinfo($image, PATHINFO_EXTENSION);
        $fileFoto = $id_anggota . "." . $typeFile;

        // Folder tempat menyimpan file
        $target = "../../images/" . basename($image);
        if (move_uploaded_file($location, $target)) {
            // Jika pengunggahan berhasil, lakukan penyisipan data ke database
            $query = "INSERT INTO user VALUES(NULL, '$id_anggota', '$name', '$gender', '$address', '$image')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                echo '<script>alert("Data berhasil ditambahkan beserta gambar!");
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
        echo '<script>alert("Gambar tidak boleh kosong!");
            window.location.href="./create.php";
        </script>';
        exit();
    }
}
