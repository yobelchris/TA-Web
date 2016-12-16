<?php
session_start();
require_once 'connect.php';

$username = $_POST['user'];
function set()
{
    $_SESSION['user'] = $_POST['user'];
}

$pass = sha1($_POST['pass']);
$sql = "SELECT * FROM tb_user WHERE username='$username' AND pass_user = '$pass'";
$result = mysqli_query($connect, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        set();
        header("location: index.php?status=berhasil");
    } else {
        echo "<script>alert('Login Gagal');</script>";
        header("location: index.php?status=gagal");
    }
} else {
    echo "<script>alert('Login Gagal');</script>";
    header("location: index.php?status=gagal");
}

?>