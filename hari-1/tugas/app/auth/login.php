<?php
//jika sudah login
session_start();
if (isset($_SESSION["username"])) {
    header("Location: ../../index.php");
    exit;
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style-auth.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="./to-login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit">Login</button>

            <!-- go registrasi -->
            <p>Belum punya akun? <a href="./register.php">Register</a></p>
        </form>
    </div>
</body>

</html>