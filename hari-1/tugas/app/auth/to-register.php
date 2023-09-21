<?php

// koneksi database
include '../../database/koneksi.php';

if (isset($_POST["submit"])) {
    // ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek apakah username sudah ada di database
    $query = "SELECT * FROM auth WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    // jika username sudah ada tidak bisa register
    if (mysqli_num_rows($result) === 1) {
        header("Location: ./register.php");
        exit;
    } else {
        // jika username belum ada
        $query = "INSERT INTO auth VALUES (null, '$username', '$password')";
        $result = mysqli_query($connection, $query);

        // set session
        session_start();
        $_SESSION["username"] = $username;

        if ($result) {
            header("Location: ../../index.php");
        }
    }
}
