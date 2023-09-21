<?php
if ($_SERVER['REQUEST_URI'] == '/tugas/index.php') {
    $path = '';
} else {
    $path = '../../';
}

// cek session
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../../app/auth/login.php");
    exit;
}
?>

<section class="sidebar">
    <div class="mb-2">
        <h2 class="mb-1">Home</h2>
        <a href="<?= $path ?>index.php" class="text-black hide-underline text-green-hover">
            <li class="sidebar-card">
                Dashboard
            </li>
        </a>
    </div>
    <div class="mb-2">
        <h2 class="mb-1">Data</h2>
        <ul>
            <a href="<?= $path ?>app/user/show.php" class="text-black hide-underline text-green-hover">
                <li class="sidebar-card">
                    Anggota
                </li>
            </a>
            <a href="<?= $path ?>app/book/show.php" class="text-black hide-underline text-green-hover">
                <li class="sidebar-card">
                    Data Buku
                </li>
            </a>
            <a href="<?= $path ?>app/transaction/show.php" class="text-black hide-underline text-green-hover">
                <li class="sidebar-card">
                    Transaksi Peminjaman
                </li>
            </a>
        </ul>
    </div>
    <div class="mb-2">
        <h2 class="mb-1">Laporan</h2>
        <ul>
            <a href="<?= $path ?>app/user/report.php" target="_blank" class="text-black hide-underline text-green-hover">
                <li class="sidebar-card">
                    Anggota
                </li>
            </a>
            <a href="<?= $path ?>app/book/report.php" target="_blank" class="text-black hide-underline text-green-hover">
                <li class="sidebar-card">
                    Data Buku
                </li>
            </a>
            <a href="#" target="_blank" class="text-black hide-underline text-green-hover">
                <li class="sidebar-card">
                    Transaksi Peminjaman
                </li>
            </a>
        </ul>
    </div>
    <div class="mb-2">
        <h2 class="mb-1">Login</h2>
        <ul>
            <a href="<?= $path ?>app/auth/logout.php" class="text-black hide-underline text-green-hover">
                <li class="sidebar-card">
                    Logout
                </li>
            </a>
        </ul>
    </div>
    <div class="mb-2">
        <h4>Selamat Datang: <?= $_SESSION["username"] ?></h4>
    </div>
</section>