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
        echo "<script>
                var message = 'Username already exist';
                alert(message);
                window.location.href = './register.php';
            </script>";
        exit;
    } else {
        // jika username belum ada
        $query = "INSERT INTO auth VALUES (null, '$username', '$password')";
        $result = mysqli_query($connection, $query);

        // set session
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $row["id"];

        if ($result) {
            // make alert for 2 second
            echo "<script>
                var message = 'Register success';
                alert(message);
                window.location.href = '../../index.php';
            </script>";
            exit();

            header("Location: ../../index.php");
        }
    }
}
