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
    <title>Register</title>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="./to-register.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit">Register</button>
        </form>

        <!-- go login -->
        <p>Sudah punya akun? <a href="./login.php">Login</a></p>
    </div>
</body>

</html>