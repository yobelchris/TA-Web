<?php
session_start();
$username = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
}
if (isset($_GET['status']) && $_GET['status'] == 'gagal') {
    echo "<script>alert('Login Gagal');</script>";
}
require_once "js/dibutuhkan.php";
require_once "connect.php";
$sql = "SELECT * FROM tb_promo";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo ndas(); ?>

</head>
<body>
<?php echo navbarCoy($username); ?>

<div id="slidermen" class="owl-carousel">
    <?php
    if ($result) {
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div><img src="img/<?php echo $row['gbr']; ?>"></div>
                <?php
            }
        }
    }
    mysqli_close($connect);
    ?>
</div>
<?php echo sidebarCoy() ?>
<div class="col-xs-12 col-sm-10">
    <?php
    $connect = mysqli_connect($host, $user, $pass, $db);
    if ($connect) {
        $sql = "SELECT * FROM tb_olshopp";
        if (isset($_GET['do']) && $_GET['do'] == 'sort') {
            if (isset($_POST['jen']) && $_POST['jen'] != '') {
                $jenis = $_POST['jen'];
                if (isset($_POST['jk']) && $_POST['jk'] != '') {
                    if ($_POST['jk'] == 'murah') {
                        $sql = "SELECT * FROM tb_olshopp WHERE jenis_brg='$jenis' ORDER BY harga_brg ASC ";
                    } else {
                        $sql = "SELECT * FROM tb_olshopp WHERE jenis_brg='$jenis' ORDER BY harga_brg DESC ";
                    }
                } else {
                    $sql = "SELECT * FROM tb_olshopp WHERE jenis_brg='$jenis' ";
                }
            } elseif (isset($_POST['jk']) && $_POST['jk'] != '') {
                if ($_POST['jk'] == 'murah') {
                    $sql = "SELECT * FROM tb_olshopp ORDER BY harga_brg ASC ";
                } else {
                    $sql = "SELECT * FROM tb_olshopp ORDER BY harga_brg DESC ";
                }
            }
        }
        $result = mysqli_query($connect, $sql);
    } else {
        echo "<script>alert('Koneksi ke database gagal');</script>";
    }
    if ($result) {
        if (mysqli_num_rows($result)) {
            $check = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($check == 0) {
                    ?>
                    <div class="col-sm-6 brg ut">
                        <div class="col-xs-12 col-sm-5">
                            <a href="detail.php?id=<?php echo $row['id']; ?>"><img
                                    src="img/<?php echo $row['gbr_brg']; ?>" class="img-responsive gede"></a>
                        </div>
                        <div class="col-xs-12 col-sm-7">
                            <h2 style="text-align: center; font-family: Calibri; font-weight: bold"><a
                                    href="detail.php?id=<?php echo $row['id']; ?>"
                                    class="judul"><?php echo $row['nama_brg']; ?></a></h2>
                            <h4 style="text-align: center">Rp<?php echo $row['harga_brg'] ?></h4><br><br>
                            <button class="btn btn-success btn-lg beli"
                                    onclick="location.href='detail.php?id=<?php echo $row['id']; ?>'">Beli
                            </button>
                        </div>
                    </div>
                <?php } else { ?>
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
                    <?php
                }
                $check++;
            }
        }
    }
    ?>
</div>
</body>
</html>