<?php
session_start();
$username = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
}

require "js/dibutuhkan.php";
if (isset($_GET['do']) && $_GET['do'] == 'bayar') {
    $valProg = 60;
    $icon = 'glyphicon-envelope';
} elseif (isset($_GET['do']) && $_GET['do'] == 'berhasil') {
    $valProg = 100;
    $icon = 'glyphicon-ok';
} else {
    $valProg = 30;
    $icon = 'glyphicon-shopping-cart';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo ndas(); ?>
</head>
<body>
<?php echo navbarCoy($username); ?>
<div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
         aria-valuenow="<?php echo $valProg; ?>" aria-valuemin="0" aria-valuemax="100"
         style="width:<?php echo $valProg; ?>%">
        <span class="glyphicon <?php echo $icon; ?>"></span>
    </div>
</div>
<?php
if (isset($_GET['do']) && $_GET['do'] == 'bayar') {
    ?>
    <div class="col-xs-12">
        <form action="cart.php?do=berhasil" method="post">
            <h1>Pembayaran</h1>
            <div class="col-xs-12">
                <hr>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label>Via</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <label for="numcard"><span class="req">* </span>Nomor Kartu</label><br>
                    <input type="text" name="numcard" class="form-control" maxlength="20" onkeyup="validatephone(this);"
                           required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <label for="numsec"><span class="req">* </span>Nomor Keamanan</label><br>
                    <input type="text" name="numsec" class="form-control" maxlength="6" onkeyup="validatephone(this);"
                           style="width: 40%" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <label for="namecard"><span class="req">* </span>Nama di Kartu</label><br>
                    <input type="text" name="namecard" class="form-control" onkeyup="Validate(this);" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <label for="date1"><span class="req">* </span>Tanggal kadaluarsa</label><br>
                    <select name="date1" class="form-control" style="width: 63px">
                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                            <option><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="date2" class="form-control" style="width: 63px">
                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                            <option><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="date2" class="form-control" style="width: 78px">
                        <?php for ($i = 2017; $i <= 2030; $i++) { ?>
                            <option><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <hr>
            </div>
            <h1>Pengiriman</h1>
            <div class="col-xs-12">
                <hr>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label><span class="req">* </span>Melalui</label><br>
                    <select name="melalui" class="form-control" style="width: 150px;">
                        <option>JNE</option>
                        <option>TIKI</option>
                        <option>POS</option>
                        <option>GOJEK</option>
                        <option>GOFOOD</option>
                        <option>Jawa Pos</option>
                        <option>Radar Malang</option>
                        <option>Radar Jombang</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label><span class="req">* </span>Alamat</label><br>
                    <textarea class="form-control" name="alamat" style="width: 150px"></textarea>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Selesai" required>
                </div>
            </div>
        </form>
    </div>
    <?php
} elseif (isset($_GET['do']) && $_GET['do'] == 'berhasil') {
    ?>
    <div class="alert alert-success">
        <strong class="text-center">Pembayaran Berhasil</strong>
    </div>
    <?php
} else {
    ?>
    <div class="col-xs-12" style="margin-top: 10px">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Your Cart</h4>
            </div>
            <div class="panel-body">
                <div class="col-xs-12 cartitm">
                    <div class="col-xs-4">
                        <img src="http://placehold.it/200x200/42bdc2/FFFFFF" class="img-responsive">
                    </div>
                    <div class="col-xs-4">
                        <h5 class="h5">Judul Barang</h5>
                    </div>
                    <div class="col-xs-4">
                        <h5 class="h5 text-center text-muted">Harga</h5>
                    </div>
                </div>
                <div class="col-xs-12">
                    <hr>
                </div>
            </div>
            <div class="panel-footer">
                <h3>Total : </h3>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="container" style="margin: 0 auto">
            <button class="btn btn-success" style="float: right"
                    onclick="location.href='<?php echo $_SERVER['PHP_SELF']; ?>?do=bayar'">Lanjut
            </button>
        </div>
    </div>
    <?php
}
?>
</body>
</html>
