<?php
function ndas()
{
    ?>
    <title>Online Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <script src="js/anyar.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/custom.js"></script>
    <?php
}

function navbarCoy($username)
{
    ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navb">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navb">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategori<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="cat.php?kat=Laki-laki">Laki-laki</a></li>
                            <li><a href="cat.php?kat=Perempuan">Perempuan</a></li>
                        </ul>
                    </li>
                    <?php if ($username != 'admin') { ?>
                        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                    <?php }
                    if (isset($username) && $username != '' && $username != null) {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $username; ?><span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li>
                            <button type="button" class="btn btn-primary" style="margin: 10px" data-toggle="modal"
                                    data-target="#myModal">Login
                            </button>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            <h2 class="modal-title" style="text-align: center"><b>Login</b></h2>
                                        </div>
                                        <div class="modal-body">
                                            <form action="login.php" method="post" style="margin: 0 auto; width: 75%">
                                                <div class="form-group">
                                                    <label for="user">Username</label><br>
                                                    <input type="text" name="user" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pass">Password</label><br>
                                                    <input type="password" name="pass" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-success" value="Login">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <p>Tidak mempunyai akun? <a href="signup.php">Sign Up</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button type="button" class="btn btn-danger" style="margin: 10px"
                                    onclick="location.href='signup.php'">Sign Up
                            </button>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php
}

function sidebarCoy()
{
    ?>
    <div class="col-xs-12 col-sm-2 barside">
        <div class="sidebar">
            <h4><b>Harga</b></h4>
            <form action="<?php
            if (preg_match('/\?/', $_SERVER['REQUEST_URI']) && preg_match('/do=sort/', $_SERVER['REQUEST_URI']) == false) {
                echo $_SERVER['REQUEST_URI'] . '&do=sort';
            } elseif (preg_match('/do=sort/', $_SERVER['REQUEST_URI'])) {
                echo $_SERVER['REQUEST_URI'];
            } else {
                echo $_SERVER['REQUEST_URI'] . '?do=sort';
            }
            ?>" method="post">
                <ul class="side">
                    <li>
                        <input type="radio" name="jk" value="murah"> Termurah
                    </li>
                    <li>
                        <input type="radio" name="jk" value="mahal"> Termahal
                    </li>
                </ul>
                <h4><b>Jenis</b></h4>
                <ul class="side">
                    <li>
                        <input type="radio" name="jen" value="baju"> Baju
                    </li>
                    <li>
                        <input type="radio" name="jen" value="celana"> Celana
                    </li>
                </ul>
                <input type="submit" class="btn btn-info" value="OK">
            </form>
        </div>
    </div>
    <?php
}

?>