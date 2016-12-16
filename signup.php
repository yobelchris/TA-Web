<?php
session_start();
$username = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
}

require "js/dibutuhkan.php";
require_once "connect.php";
if (isset($_GET['do']) && $_GET['do'] == 'daftar') {
    $nama = $_POST['firstname'] . ' ' . $_POST['lastname'];
    $pass = sha1($_POST['password']);
    $no = $_POST['phonenumber'];
    $email = $_POST['email'];
    $user = $_POST['username'];
    $sql = "INSERT INTO tb_user VALUES ('$pass','$nama',$no,'$email','$user')";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        echo "<script>alert('Pendaftaran Berhasil');</script>";
    } else {
        echo "<script>alert('Pendaftaran Gagal');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo ndas(); ?>
</head>
<body>
<?php echo navbarCoy($username); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?do=daftar" method="post" id="fileForm" role="form">
                <fieldset>

                    <div class="form-group">
                        <label for="phonenumber"><span class="req">* </span> Nomor Telepon: </label>
                        <input required type="text" name="phonenumber" id="phone" class="form-control phone"
                               maxlength="28" onkeyup="validatephone(this);"/>
                    </div>

                    <div class="form-group">
                        <label for="firstname"><span class="req">* </span> Nama Depan: </label>
                        <input class="form-control" type="text" name="firstname" id="txt" onkeyup="Validate(this)"
                               required/>
                        <div id="errFirst"></div>
                    </div>

                    <div class="form-group">
                        <label for="lastname"><span class="req">* </span> Nama Belakang: </label>
                        <input class="form-control" type="text" name="lastname" id="txt" onkeyup="Validate(this)"
                               required/>
                        <div id="errLast"></div>
                    </div>

                    <div class="form-group">
                        <label for="email"><span class="req">* </span> Email : </label>
                        <input class="form-control" required type="text" name="email" id="email"
                               onchange="email_validate(this.value);"/>
                        <div class="status" id="status"></div>
                    </div>

                    <div class="form-group">
                        <label for="username"><span class="req">* </span> User name: </label>
                        <input class="form-control" type="text" name="username" id="txt" onkeyup="Validate(this)"
                               placeholder="minimum 6 huruf" required/>
                        <div id="errLast"></div>
                    </div>

                    <div class="form-group">
                        <label for="password"><span class="req">* </span> Password: </label>
                        <input required name="password" type="password" class="form-control inputpass" minlength="4"
                               maxlength="16" id="pass1"/> </p>

                        <label for="password"><span class="req">* </span> Konfirmasi Password: </label>
                        <input required name="password" type="password" class="form-control inputpass" minlength="4"
                               maxlength="16" id="pass2" onkeyup="checkPass(); return false;"/>
                        <span id="confirmMessage" class="confirmMessage"></span>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" required name="terms"
                               onchange="this.setCustomValidity(validity.valueMissing ? 'Pastikan anda setuju dengan aturan yang ada' : '');"
                               id="field_terms">   <label for="terms">Saya setuju dengan <a href="#"
                                                                                            title="terms and conditions">terms
                                and conditions</a> untuk pendaftaran.</label><span class="req">* </span>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="submit_reg" value="Register">
                    </div>
                </fieldset>
            </form><!-- ends register form -->

            <script type="text/javascript">
                document.getElementById("field_terms").setCustomValidity("Pastikan anda setuju dengan aturan yang ada");
            </script>
        </div><!-- ends col-6 -->
    </div>
</div>
</body>
</html>