<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'kereta_api');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
