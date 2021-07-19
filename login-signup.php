<?php
require 'config.php';
session_start();
if (isset($_SESSION["masuk_user"])) {
    header("Location: index.php");
} elseif (isset($_SESSION["masuk_hoster"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Signup | Branskuy</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/masuk.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script type="text/javascript" src="js/all.min.js"></script>
</head>

<body>
    <video autoplay muted id="myVideo">
        <source src="img/wonderful-video.mp4" type="video/mp4">
    </video>
    <div class="overlay-form">
        <div class="container-login">
            <div class="foto">
                <a href="index.php"><img src="img/logo-branskuy.png" alt=""></a>
            </div>
            <div class="login-content">
                <div class="desc-nav" id="desc-nav">
                    <div class="tombol aktif">
                        <h5 onclick="login()">Login</h5>
                    </div>
                    <div class="tombol">
                        <h5 onclick="signup()">Sign up</h5>
                    </div>
                </div>

                <?php
if (isset($_POST["masuk"])) {
    ceklogin($_POST["masuk"]);
}
?>
                <div id="div1">
                    <form action="" method="post">
                        <label for="usernameLogin">
                            <?php if (isset($error)): ?>
                            <p style="color: red; font-style: italic;">Username / password salah</p>
                            <?php endif;?>
                            <h4>Username</h4>
                        </label>
                        <input type="text" name="usernameLogin" id="usernameLogin" placeholder="Username"
                            class="input-masuk" required>
                        <label for="passwordLogin">
                            <h4>Password</h4>
                        </label>
                        <input type="password" name="passwordLogin" id="passwordLogin" placeholder="Password"
                            class="input-masuk" required>
                        <div class="flex-bawah">
                            <div class="remember">
                                <input type="checkbox" name="rememberMe" id="rememberMe"> <label
                                    for="rememberMe">Remember
                                    me</label>
                            </div>
                            <a href="">
                                <h5>Forgot Password</h5>
                            </a>
                        </div>
                        <div class="tombol-div">
                            <button type="submit" name="masuk" class="button">Login</button>
                            <div class="pembatas-or">
                                <hr class="pembatas">
                                <p>or</p>
                                <hr class="pembatas">
                            </div>
                            <button class="btnn">
                                <i class="fab fa-google"></i>
                                <p>Continue with Google</p>
                            </button>
                        </div>
                    </form>
                </div>

                <?php
if (isset($_POST["register"])) {
    registrasi($_POST["register"]);
}
?>
                <div id="div2">
                    <form action="" method="post">
                        <!-- <input type="file" name="gambar"> -->
                        <label for="fullName">
                            <h4>Full Name</h4>
                        </label>
                        <input type="text" placeholder="Full Name" name="fullName" id="fullName" class="input-masuk"
                            required>
                        <label for="username">
                            <h4>Username</h4>
                        </label>
                        <input type="text" placeholder="Username" name="username" id="username" class="input-masuk"
                            required>
                        <label for="password">
                            <h4>Password</h4>
                        </label>
                        <input type="password" name="password" id="password" placeholder="Password" class="input-masuk"
                            required>
                        <label for="cpassword">
                            <h4>Re-type Password</h4>
                        </label>
                        <input type="password" name="cpassword" id="cpassword" placeholder="Re-type Password"
                            class="input-masuk" required>
                        <div class="tombol-div">
                            <button type="submit" name="register" class="button">Sign up</button>
                            <div class="pembatas-or">
                                <hr class="pembatas">
                                <p>or</p>
                                <hr class="pembatas">
                            </div>
                            <button class="btnn">
                                <i class="fab fa-google"></i>
                                <p>Continue with Google</p>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <h5>Copyright <i class="far fa-copyright"></i> BransKuy <?php echo date("Y"); ?></h5>
            <div class="flex-row">
                <a href="hoster.php">
                    <p>Become a hoster</p>
                </a>
                <a href="about.php">
                    <p>About</p>
                </a>
            </div>
        </div>
    </footer>

    <script>
    function login() {
        document.getElementById('div1').style.display = "block";
        document.getElementById('div2').style.display = "none";
    }

    function signup() {
        document.getElementById('div2').style.display = "block";
        document.getElementById('div1').style.display = "none";
    }
    </script>
    <script type="text/javascript" src="js/active.js"></script>
</body>

</html>