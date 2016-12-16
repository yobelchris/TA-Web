<?php
session_start();
$username = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
}

require "js/dibutuhkan.php";
require_once "connect.php";

$idSum = $_GET['id'];
$sql = "SELECT * FROM tb_olshopp WHERE id='$idSum'";
$result = mysqli_query($connect, $sql);

if ($result) {
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo ndas(); ?>
</head>
<body>
<?php echo navbarCoy($username); ?>
<div class="container-fluid" style="margin-top: 10px">
    <div class="col-xs-12 col-sm-3">
        <img src="img/<?php echo $row['gbr_brg']; ?>" class="img-responsive">
    </div>
    <div class="col-xs-12 col-sm-9">
        <h1><?php echo $row['nama_brg']; ?></h1>
        <br><br><br>
        <h3 class="h3 text-muted">Rp<?php echo $row['harga_brg'] ?></h3>
        <br><br>
        <button class="btn btn-danger">Tambah ke Cart</button>
    </div>
    <div class="col-xs-12" style="margin-top: 50px">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><h4>Deskripsi</h4></a></li>
            <li><a data-toggle="tab" href="#menu1"><h4>Spesifikasi</h4></a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <p><?php echo $row['detail_brg'] ?></p>
            </div>
            <div id="menu1" class="tab-pane fade">
                <p><?php echo $row['spek_brg'] ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>