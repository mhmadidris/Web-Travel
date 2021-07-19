<?php
session_start();
if (isset($_COOKIE["login"])) {
    if ($_COOKIE["login"] == "true") {
        $_SESSION["login"] == true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BransKuy | About</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script type="text/javascript" src="js/all.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#icon').click(function() {
            $('ul').toggleClass('show');
        });
    });
    </script>
</head>

<body class="body">
    <!-- start navbar -->
    <div class="body">
        <header class="header">
            <div class="foto-logo">
                <a href="index.php"><img src="img/logo-branskuy.png" alt=""></a>
            </div>
            <div class="navbar-nav">
                <div class="navbar-brand">
                    <a href="index.php">Home</a>
                    <a href="explore.php">Explore</a>
                    <a href="about.php">About</a>
                </div>
            </div>
            <?php
if (isset($_SESSION["masuk_user"])) {
    echo '<div class="profile-drop">
                    <h5><a href="#">' . $_SESSION["full_name"] . '</a></h5>
                    <div>
                    <div class="sub-menu-1">
            <a href="profile.php">
                <div class="profile-flex">
                    <i class="fas fa-user"></i>
                    <p>Profile</p>
                </div>
            </a>
            <hr>
            <a href="logout.php">
                <div class="profile-flex">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </div>
            </a>
        </div>';
    if ($_SESSION["foto"] == null) {
        echo
            '<div class="foto"><img src="img/profile.png" alt=""></div>';
    } else {
        echo '<div class="foto"><img src="img/' . $_SESSION["foto"] . '"></div>';
    }
} elseif (isset($_SESSION["masuk_hoster"])) {
    echo '<div class="profile-drop">
                    <h5><a href="#">' . $_SESSION["full_name"] . '</a></h5>
                    <div>
                    <div class="sub-menu-1">
            <a href="myprofile.php">
                <div class="profile-flex">
                    <i class="fas fa-user"></i>
                    <p>Profile</p>
                </div>
            </a>
            <hr>
            <a href="tambahpaket.php">
                <div class="profile-flex">
                <i class="fas fa-plus-square"></i>
                    <p>Tambah Paket</p>
                </div>
            </a>
            <hr>
            <a href="logout.php">
                <div class="profile-flex">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </div>
            </a>
        </div>';
    if ($_SESSION["foto_logo"] == null) {
        echo
            '<div class="foto"><img src="img/profile.png" alt=""></div>';
    } else {
        echo '<div class="foto"><img src="img/' . $_SESSION["foto_logo"] . '"></div>';
    }
} else {
    echo '<h5><a href="login-signup.php">Login / Signup</a></h5>';
}
?>
            <label id="icon">
                <i class="fas fa-bars"></i>
            </label>
        </header>
    </div>
    <!-- end navbar -->

    <div class="company">
        <div class="company-title">
            <h2>Travel will be easier with us!</h2>
            <a href="hoster.php">
                <button>Become a hoster now</button>
            </a>
        </div>
    </div>


    <!-- start container -->
    <div class="container">
        <div class="container-about-atas">
            <div class="container-about-content">
                <h1>About</h1>
                <p>BransKuy adalah sikatan dari bahasa gaul yang artinya “Berangkats Kuy” yang apabila diterjemahkan ke
                    Bahasa Indonesia artinya menjadi “Berangkat Yuk”. Melalui BransKuy ini hoster dapat mempromosikan
                    paket wisatanya dan pelancong dapat memesan paket perjalanan dengan mudah.</p>
            </div>
        </div>
        <hr class="pembatas-container">
        <div class="container-about">
            <h1>Why us?</h1>
            <div class="flex-about">
                <div class="card-about">
                    <div class="foto-about">
                        <img src="img/place.png" alt="">
                    </div>
                    <p>Best destination you need.</p>
                </div>
                <div class="card-about">
                    <div class="foto-about">
                        <img src="img/money-transfer.png" alt="">
                    </div>
                    <p>Easy and safe transactions.</p>
                </div>
                <div class="card-about">
                    <div class="foto-about">
                        <img src="img/together.png" alt="">
                    </div>
                    <p>Professional and friendly hoster.</p>
                </div>
                <div class="card-about">
                    <div class="foto-about">
                        <img src="img/wallet.png" alt="">
                    </div>
                    <p>Reasonable price.</p>
                </div>
            </div>
        </div>
        <hr class="pembatas-container">
        <div class="container-team">
            <h1>Meet our team</h1>
            <div class="flex-team">
                <div class="card-team">
                    <div class="foto-team">
                        <img src="img/programmer.png" alt="">
                    </div>
                    <div class="title-team">
                        <h4>Muhammad Idris</h4>
                        <p>Front End Developer</p>
                    </div>
                    <div class="flip-card-back">
                        <div class="sosial-title">
                            <h5>Muhammad Idris</h5>
                            <h6>Indonesia, 19</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas deserunt explicabo
                                voluptates illo reiciendis sit eligendi sapiente magnam illum unde nulla tenetur
                                deleniti, laboriosam maiores eveniet eaque amet porro velit?.</p>
                            <div class="sosial-media">
                                <a href="asas" target="_blank">
                                    <div class="sosial-media-container-instagram">
                                        <i class="fab fa-instagram"></i>
                                    </div>
                                </a>
                                <a href="asasa" target="_blank">
                                    <div class="sosial-media-container-facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                </a>
                                <a href="asasas" target="_blank">
                                    <div class="sosial-media-container-linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                    </div>
                                </a>
                                <a href="asasas" target="_blank">
                                    <div class="sosial-media-container-github">
                                        <i class="fab fa-github"></i>
                                    </div>
                                </a>
                                <a href="htasa" target="_blank">
                                    <div class="sosial-media-container-twitter">
                                        <i class="fab fa-twitter"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-team">
                    <div class="foto-team">
                        <img src="img/developer.png" alt="">
                    </div>
                    <div class="title-team">
                        <h4>Thresya Christina S</h4>
                        <p>Back End Developer</p>
                    </div>
                    <div class="flip-card-back">
                        <div class="sosial-title">
                            <h5>Thresya Christina</h5>
                            <h6>Indonesia, 19</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas deserunt explicabo
                                voluptates illo reiciendis sit eligendi sapiente magnam illum unde nulla tenetur
                                deleniti, laboriosam maiores eveniet eaque amet porro velit?.</p>
                            <div class="sosial-media">
                                <a href="asas" target="_blank">
                                    <div class="sosial-media-container-instagram">
                                        <i class="fab fa-instagram"></i>
                                    </div>
                                </a>
                                <a href="asasa" target="_blank">
                                    <div class="sosial-media-container-facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                </a>
                                <a href="asasas" target="_blank">
                                    <div class="sosial-media-container-linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                    </div>
                                </a>
                                <a href="asasas" target="_blank">
                                    <div class="sosial-media-container-github">
                                        <i class="fab fa-github"></i>
                                    </div>
                                </a>
                                <a href="htasa" target="_blank">
                                    <div class="sosial-media-container-twitter">
                                        <i class="fab fa-twitter"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-team">
                    <div class="foto-team">
                        <img src="img/programmer1.png" alt="">
                    </div>
                    <div class="title-team">
                        <h4>Ilham Nur Ilmi</h4>
                        <p>UI/UX Designer</p>
                    </div>
                    <div class="flip-card-back">
                        <div class="sosial-title">
                            <h5>Ilham Nur Ilmi</h5>
                            <h6>Indonesia, 19</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas deserunt explicabo
                                voluptates illo reiciendis sit eligendi sapiente magnam illum unde nulla tenetur
                                deleniti, laboriosam maiores eveniet eaque amet porro velit?.</p>
                            <div class="sosial-media">
                                <a href="asas" target="_blank">
                                    <div class="sosial-media-container-instagram">
                                        <i class="fab fa-instagram"></i>
                                    </div>
                                </a>
                                <a href="asasa" target="_blank">
                                    <div class="sosial-media-container-facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                </a>
                                <a href="asasas" target="_blank">
                                    <div class="sosial-media-container-linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                    </div>
                                </a>
                                <a href="asasas" target="_blank">
                                    <div class="sosial-media-container-github">
                                        <i class="fab fa-github"></i>
                                    </div>
                                </a>
                                <a href="htasa" target="_blank">
                                    <div class="sosial-media-container-twitter">
                                        <i class="fab fa-twitter"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="pembatas-container">
        <div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d65334052.59731062!2d78.05561483728009!3d-1.8785136045360042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1621918683440!5m2!1sid!2sid"
                width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <!-- end container -->

    <!-- start footer -->
    <footer>
        <a href="#">
            <div class="arrow-up" icon="button" id="scroll">
                <img src="img/arrow-up-solid.svg" alt="">
            </div>
        </a>
        <div class="footer">
            <div class="about">
                <h1 class="text">Contact</h1>
                <p>Customer Service : (+62) 85812345678</p>
                <p>Email : branskuy.business@gmail.com</p>
                <p>Address : Jl.asmara 12, Gedung 1, lt.3, Jakarta Pusat, Indonesia</p>
            </div>
            <div class="category">
                <h1 class="text">Explore</h1>
                <ul>
                    <li><a href="">Jawa</a></li>
                    <li><a href="">Sumatra</a></li>
                    <li><a href="">Kalimantan</a></li>
                    <li><a href="">Sulawesi</a></li>
                </ul>
            </div>
            <div class="link">
                <h1 class="text">Link</h1>
                <ul>
                    <li><a href="about.php">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Settings</a></li>
                    <li><a href="">Profile</a></li>
                </ul>
            </div>
        </div>
        <hr class="garis">
        <div class="copyright">
            <div class="copyright-title">
                <h5>Copyright © <?php echo date("Y"); ?> All Rights BransKuy</h5>
            </div>
            <div class="copyright-sosmed">
                <a href="">
                    <img src="img/instagram.png" alt="instagram">
                </a>
                <a href="">
                    <img src="img/twitter.png" alt="twitter">
                </a>
                <a href="">
                    <img src="img/youtube.png" alt="youtube">
                </a>
                <a href="">
                    <img src="img/facebook.png" alt="facebook">
                </a>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- script back to top -->
    <script type="text/javascript" src="js/back-to-top.js"></script>
    <script type="text/javascript">
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    });
    </script>
</body>

</html>