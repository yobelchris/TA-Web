<?php
session_start();
$username = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
}

require "js/dibutuhkan.php";
require_once "connect.php";

$cat = $_GET['kat'];
$sql = "SELECT * FROM tb_olshopp WHERE jk='$cat'";
if (isset($_GET['do']) && $_GET['do'] == 'sort') {
    if (isset($_POST['jen']) && $_POST['jen'] != '') {
        $jenis = $_POST['jen'];
        if (isset($_POST['jk']) && $_POST['jk'] != '') {
            if ($_POST['jk'] == 'murah') {
                $sql = "SELECT * FROM tb_olshopp WHERE jenis_brg='$jenis' AND jk='$cat' ORDER BY harga_brg ASC ";
            } else {
                $sql = "SELECT * FROM tb_olshopp WHERE jenis_brg='$jenis' AND jk='$cat' ORDER BY harga_brg DESC ";
            }
        } else {
            $sql = "SELECT * FROM tb_olshopp WHERE jenis_brg='$jenis'  AND jk='$cat' ";
        }
    } elseif (isset($_POST['jk']) && $_POST['jk'] != '') {
        if ($_POST['jk'] == 'murah') {
            $sql = "SELECT * FROM tb_olshopp WHERE jk='$cat' ORDER BY harga_brg ASC ";
        } else {
            $sql = "SELECT * FROM tb_olshopp WHERE jk='$cat' ORDER BY harga_brg DESC ";
        }
    }
}
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo ndas(); ?>
</head>
<body>
<?php echo navbarCoy($username); ?>
<div class="col-xs-12">
    <h1 class="h1" style="padding-left: 20px"><?php echo $cat; ?></h1>
</div>
<div class="col-xs-12">
    <hr>
</div>
<?php echo sidebarCoy(); ?>
<div class="col-xs-12 col-sm-10">
    <?php
    if ($result) {
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-xs-12 col-sm-2 brg">
                    <a href="detail.php?id=<?php echo $row['id']; ?>"><img src="img/<?php echo $row['gbr_brg']; ?>"
                                                                           class="img-responsive barg"></a>
                    <h5 style="text-align: center; font-family: Calibri; font-weight: bold"><a
                            href="detail.php?id=<?php echo $row['id']; ?>"
                            class="judul"><?php echo $row['nama_brg']; ?></a></h5>
                    <h6 style="text-align: center">Rp<?php echo $row['harga_brg'] ?></h6>
                    <button class="btn btn-success beli"
                            onclick="location.href='detail.php?id=<?php echo $row['id']; ?>'">Beli
                    </button>
                </div>
            <?php }
        }
    }
    ?>
</div>
</body>
</html>
