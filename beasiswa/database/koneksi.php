<!-- membuat koneksi -->
<?php
$connection = mysqli_connect('localhost', 'root', 'root', 'jwd_beasiswa');

if (mysqli_connect_errno()) {
    echo "Connection failed : " . mysqli_connect_error();
}
