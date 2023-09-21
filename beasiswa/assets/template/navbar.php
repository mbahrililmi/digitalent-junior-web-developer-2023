<?php
// cek session
session_start();
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
}

if ($_SERVER['REQUEST_URI'] == '/index.php') {
    $path = '';
} else {
    $path = '../../';
    // jika tidak ada sesion maka redirect ke login.php
    if (!isset($user)) {
        echo "<script>
                var message = 'Login first';
                alert(message);
                window.location.href = '../../app/auth/login.php';
            </script>";
        exit();
    }
}

?>
<!-- make navbar boostrap -->
<nav class="navbar mb-4 p-3" style="background-color: #9cbf13;">
    <div class="container-fluid justify-content-center gap-4">
        <?php if (isset($_SESSION['username'])) : ?>
            <h4 class="text-light">Hi <?= strtoupper($_SESSION['username']) ?></h4>
        <?php endif; ?>
        <a href="<?= $path ?>index.php" class="btn btn-outline-light border-3 me-2 w-25">
            Pilih Beasiswa
        </a>
        <a href="<?= $path ?>app/daftar/show.php" class="btn btn-outline-light border-3 me-2 w-25">
            Daftar
        </a>
        <a href="<?= $path ?>app/hasil/show.php" class="btn btn-outline-light border-3 me-2 w-25">
            Hasil
        </a>
        <?php if (isset($user)) : ?>
            <a href="<?= $path ?>app/auth/logout.php" class="btn btn-outline-light border-3 me-2">
                Logout
            </a>
        <?php else : ?>
            <a href="<?= $path ?>app/auth/login.php" class="btn btn-outline-light border-3 me-2">
                Login
            </a>
        <?php endif; ?>

    </div>
</nav>