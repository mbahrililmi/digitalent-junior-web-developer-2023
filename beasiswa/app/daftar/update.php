<?php
// include koneksi
include('../../database/koneksi.php');

// start session
session_start();

// update
if (isset($_POST['submit'])) {
    $auth_id = $_SESSION['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $semester = $_POST['semester'];
    $ipk = $_POST['ipk'];
    $type_of_scholarship = $_POST['type_of_scholarship'];

    // Check if an image file is uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // penamaan file
        $file_name = $_FILES['file']['name'];
        $file_name = date('dmYHis') . str_replace(" ", "", basename($file_name));
        
        // penamaan file sementara
        $location = $_FILES['file']['tmp_name'];
        $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $file = $file_name . "." . $file_ext;

        // hapus file lama
        $query = "SELECT file FROM list_of_scholarships WHERE auth_id = '$auth_id'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $file_lama = $row['file'];
        unlink("../../files/" . $file_lama);

        $target = "../../files/" . basename($file_name);
        if (move_uploaded_file($location, $target)) {
            $query = "UPDATE list_of_scholarships SET name = '$name', email = '$email', phone = '$phone', semester = '$semester', ipk = '$ipk', type_of_scholarship = '$type_of_scholarship', file = '$file_name' WHERE auth_id = '$auth_id'";
            $result = mysqli_query($connection, $query);

            if ($result) {
                echo "<script>alert('Data berhasil diubah!');window.location.href='../hasil/show.php';</script>";
            } else {
                echo "<script>alert('Data gagal diubah, gagal update!');window.location.href='./show.php';</script>";
            }
        } else {
            echo "<script>alert('Data gagal diubah, file gagal ditambahkan!');window.location.href='./show.php';</script>";
        }
    } else {
        $query = "UPDATE list_of_scholarships SET name = '$name', email = '$email', phone = '$phone', semester = '$semester', ipk = '$ipk', type_of_scholarship = '$type_of_scholarship' WHERE auth_id = '$auth_id'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<script>alert('Data berhasil diubah!');window.location.href='../hasil/show.php';</script>";
        } else {
            echo "<script>alert('Data gagal diubah, gagal update!');window.location.href='./show.php';</script>";
        }
    }
}