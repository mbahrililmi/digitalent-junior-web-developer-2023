<?php

// konek ke database
include '../../database/koneksi.php';

if (isset($_POST['submit'])) {
    // ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek apakah username sudah ada di database
    $query = "SELECT * FROM auth WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    // jika username sudah ada
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]) {
            // set session
            session_start();

            $_SESSION["username"] = $row["username"];

            // jika password benar maka redirect ke index.php
            echo "<script>
                var message = 'Login success';
                alert(message);
                window.location.href = './login.php';
            </script>";
            exit();
        }
    } else {
        // jika username belum ada maka tampilkan pesan error
        echo "<script>
                var message = 'Username not found';
                alert(message);
                window.location.href = './login.php';
            </script>";
        exit();
    }

    // jika username belum ada
    header("Location: ./login.php");
}
