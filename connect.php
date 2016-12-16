<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ta';

$connect = mysqli_connect($host, $user, $pass, $db);

if (!$connect) {
    echo "<script>alert('Koneksi ke database gagal');</script>";
}
?>