<?php
if ($_SERVER['REQUEST_URI'] == '/beasiswa/index.php') {
    $path = '';
} else {
    $path = '../../';
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Beasiswa' ?></title>
    <link rel="stylesheet" href="<?= $path ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $path ?>assets/css/style.css">
</head>