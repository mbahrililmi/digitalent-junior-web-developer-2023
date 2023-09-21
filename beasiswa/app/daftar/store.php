<?php
// include koneksi
include('../../database/koneksi.php');

// start session
session_start();

if (isset($_POST['submit'])) {
    
    $auth_id = $_SESSION["id"];
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

        $target = "../../files/" . basename($file_name);
        if (move_uploaded_file($location, $target)) {
            $query = "INSERT INTO list_of_scholarships (auth_id, name, email, phone, semester, ipk, type_of_scholarship, file) VALUES ('$auth_id', '$name', '$email', '$phone', '$semester', '$ipk', '$type_of_scholarship', '$file_name')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                echo "<script>alert('Data berhasil ditambahkan!');window.location.href='../hasil/show.php';</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan, gagal insert!');window.location.href='./show.php';</script>";
            }
        } else {
            echo "<script>alert('Data gagal ditambahkan, file gagal ditambahkan!');window.location.href='./show.php';</script>";
        }
    }

}