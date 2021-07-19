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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BransKuy | Travel will be easier with us!</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script type="text/javascript" src="js/all.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Kaushan Script' rel='stylesheet'>
    <script>
    $(document).ready(function() {
        $('#icon').click(function() {
            $('ul').toggleClass('show');
        });
    });
    </script>
</head>

<body>
    <div class="body-back">
        <!-- start nav -->
        <div class="body">
            <header class="header">
                <a href="index.php" class="foto-logo">
                    <img src="img/logo-branskuy.png" alt="">
                </a>
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
    echo '<h5 class="login-button"><a href="login-signup.php">Login / Signup</a></h5>';
}
?>
                <label id="icon">
                    <i class="fas fa-bars"></i>
                </label>
            </header>
            <div class="cover">
                <div class="flex-center">
                    <h1>Welcome,
                        <?php
if (isset($_SESSION["masuk_user"])) {
    echo $_SESSION["full_name"];
} elseif (isset($_SESSION["masuk_hoster"])) {
    echo $_SESSION["full_name"];
} else {
    echo "Guest";
}

?>.</h1>
                    <form class="form-header" action="" method="">
                        <div class="form-back">
                            <div class="form-lok">
                                <div class="logo-form">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="form-lok-header">
                                    <p>Location</p>
                                    <input type="text" placeholder="Search destination" class="lok">
                                </div>
                            </div>
                            <div class="form-lok">
                                <div class="logo-form">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="form-lok-header">
                                    <p>Date</p>
                                    <input type="date" placeholder="Search destination" class="lok">
                                </div>
                            </div>
                            <div class="form-atas-tombol">
                                <button>Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="logo-flex">
                <div class="logo-header">
                    <i class="fas fa-globe-asia"></i>
                    <div class="logo-title">
                        <h5>Places</h5>
                        <p>Best Destination</p>
                    </div>
                </div>
                <div class="logo-header">
                    <i class="fas fa-hand-holding-usd"></i>
                    <div class="logo-title">
                        <h5>Price</h5>
                        <p>Guaranteed Price</p>
                    </div>
                </div>
                <div class="logo-header">
                    <i class="fas fa-hiking"></i>
                    <div class="logo-title">
                        <h5>Experience</h5>
                        <p>Try New Experience</p>
                    </div>
                </div>
                <div class="logo-header">
                    <i class="fas fa-users"></i>
                    <div class="logo-title">
                        <h5>Users</h5>
                        <p>Friendly Users</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end nav -->

        <!-- start carousel -->
        <div class="carousel-container">
            <h1 class="title">Explore</h1>
            <div class="carousel-header">
                <div class="container-center">
                    <div id="owl-one" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/sumatra-carousel.jpg" alt="" />
                                    <p class="explore-title">Sumatra</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/banten-carousel.jpg" alt="" />
                                    <p class="explore-title">Banten</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="explore/jawa-barat.php">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/jawa-barat-carousel.jpeg" alt="" />
                                    <p class="explore-title">Jawa Barat</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/jawa-tengah-carousel.jpg" alt="" />
                                    <p class="explore-title">Jawa Tengah</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="explore/jawa-timur.php">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/jawa-timur-carousel.jpg" alt="" />
                                    <p class="explore-title">Jawa Timur</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="explore/bali.php">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/bali-carousel.jpg" alt="" />
                                    <p class="explore-title">Bali</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/kalimantan-carousel.jpg" alt="" />
                                    <p class="explore-title">Kalimantan</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/nusa-tenggara-carousel.jpg" alt="" />
                                    <p class="explore-title">Nusa Tenggara</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/sulawesi-carousel.jpg" alt="" />
                                    <p class="explore-title">Sulawesi</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/maluku-carousel.jpg" alt="" />
                                    <p class="explore-title">Maluku</p>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="">
                                <div class="shadow-effect">
                                    <img class="img-responsive" src="img/carousel/papua-carousel.jpg" alt="" />
                                    <p class="explore-title">Papua</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end carousel -->


        <!-- start iklan carousel -->
        <div class="iklan-container">
            <div class="iklan-judul-header">
                <img src="img/discount.png" alt="">
                <h1>Travel Promo</h1>
            </div>
            <div id="owl-iklan" class="owl-carousel owl-theme">
                <div class="item-iklan">
                    <a href="">
                        <div class="iklan-content">
                            <img src="img/leuwi-hejo.jpg" alt="">
                            <div class="iklan-back">
                                <div class="iklan-stiker">
                                    <p>Promo</p>
                                </div>
                            </div>
                            <div class="title-iklan">
                                <p class="judul">Leuwi Hejo</p>
                                <p class="hoster">Shelter Garut</p>
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star unchecked"></span>
                                </div>
                                <div class="iklan-row">
                                    <p class="price-iklan">Rp.200.000</p>
                                    <p class="diskon-iklan">Rp.100.000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item-iklan">
                    <a href="">
                        <div class="iklan-content">
                            <img src="img//ranca-upas.jpeg" alt="">
                            <div class="iklan-back">
                                <div class="iklan-stiker">
                                    <p>Promo</p>
                                </div>
                            </div>
                            <div class="title-iklan">
                                <p class="judul">Camping Ranca Upas</p>
                                <p class="hoster">Shelter Garut</p>
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star unchecked"></span>
                                </div>
                                <div class="iklan-row">
                                    <p class="price-iklan">Rp.300.000</p>
                                    <p class="diskon-iklan">Rp.200.000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="">
                        <div class="iklan-content">
                            <img src="img/dieng.jpg" alt="">
                            <div class="iklan-back">
                                <div class="iklan-stiker">
                                    <p>Promo</p>
                                </div>
                            </div>
                            <div class="title-iklan">
                                <p class="judul">Dieng Plateu</p>
                                <p class="hoster">Shelter Garut</p>
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star unchecked"></span>
                                </div>
                                <div class="iklan-row">
                                    <p class="price-iklan">Rp.550.000</p>
                                    <p class="diskon-iklan">Rp.300.000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="">
                        <div class="iklan-content">
                            <img src="img/jawa-timur-bg.png" alt="">
                            <div class="iklan-back">
                                <div class="iklan-stiker">
                                    <p>Promo</p>
                                </div>
                            </div>
                            <div class="title-iklan">
                                <p class="judul">Bromo Mountain</p>
                                <p class="hoster">Shelter Garut</p>
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star unchecked"></span>
                                </div>
                                <div class="iklan-row">
                                    <p class="price-iklan">Rp.900.000</p>
                                    <p class="diskon-iklan">Rp.830.000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="">
                        <div class="iklan-content">
                            <img src="img/jawa-barat-travel.jpeg" alt="">
                            <div class="iklan-back">
                                <div class="iklan-stiker">
                                    <p>Promo</p>
                                </div>
                            </div>
                            <div class="title-iklan">
                                <p class="judul">Desa Ciptagelar</p>
                                <p class="hoster">Shelter Garut</p>
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star unchecked"></span>
                                </div>
                                <div class="iklan-row">
                                    <p class="price-iklan">Rp.600.000</p>
                                    <p class="diskon-iklan">Rp.200.000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- end iklan carousel -->


        <!-- start travel carousel -->
        <div class="travel-back">
            <div class="travel">
                <div class="travel-container">
                    <div class="travel-title">
                        <h3>Top Destinations</h3>
                        <!-- <a href="">
                            <p>See more</p>
                        </a> -->
                    </div>
                    <hr class="garis">
                    <div class="carousel-content">
                        <div id="owl-two" class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="">
                                    <div class="item-container">
                                        <div class="image-travel">
                                            <img src="img//ranca-upas.jpeg" alt="">
                                        </div>
                                        <div class="travel-slider-title">
                                            <div class="map">
                                                <i class="fas fa-map-pin"></i>
                                                <p> Ciwidey, Jawa Barat, Indonesia</p>
                                            </div>
                                            <p class="judul">Camping Ranca Upas</p>
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star unchecked"></span>
                                            </div>
                                            <p class="hoster">Shelter Garut</p>
                                            <p class="price">Rp.300.000</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <div class="item-container">
                                        <div class="image-travel">
                                            <img src="img/jawa-timur-bg.png" alt="">
                                        </div>
                                        <div class="travel-slider-title">
                                            <div class="map">
                                                <i class="fas fa-map-pin"></i>
                                                <p>Lumajang, Jawa Timur, Indonesia</p>
                                            </div>
                                            <p class="judul">Bromo Mountain</p>
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star unchecked"></span>
                                            </div>
                                            <p class="hoster">Shelter Garut</p>
                                            <p class="price">Rp.900.000</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <div class="item-container">
                                        <div class="image-travel">
                                            <img src="img/kawah-ijen.jpg" alt="">
                                        </div>
                                        <div class="travel-slider-title">
                                            <div class="map">
                                                <i class="fas fa-map-pin"></i>
                                                <p>Banyuwangi, Jawa Timur, Indonesia</p>
                                            </div>
                                            <p class="judul">Kawah Ijen</p>
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star unchecked"></span>
                                            </div>
                                            <p class="hoster">Shelter Garut</p>
                                            <p class="price">Rp.800.000</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <div class="item-container">
                                        <div class="image-travel">
                                            <img src="img/dieng.jpg" alt="">
                                        </div>
                                        <div class="travel-slider-title">
                                            <div class="map">
                                                <i class="fas fa-map-pin"></i>
                                                <p>Dieng, Jawa Tengah, Indonesia</p>
                                            </div>
                                            <p class="judul">Dieng Plateu</p>
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star unchecked"></span>
                                            </div>
                                            <p class="hoster">Shelter Garut</p>
                                            <p class="price">Rp.550.000</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <div class="item-container">
                                        <div class="image-travel">
                                            <img src="img/baluran.jpg" alt="">
                                        </div>
                                        <div class="travel-slider-title">
                                            <div class="map">
                                                <i class="fas fa-map-pin"></i>
                                                <p>Banyuwangi, Jawa Timur, Indonesia</p>
                                            </div>
                                            <p class="judul">Baluran National Park</p>
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star unchecked"></span>
                                            </div>
                                            <p class="hoster">Shelter Garut</p>
                                            <p class="price">Rp.870.000</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <div class="item-container">
                                        <div class="image-travel">
                                            <img src="img/karimunjawa.jpg" alt="">
                                        </div>
                                        <div class="travel-slider-title">
                                            <div class="map">
                                                <i class="fas fa-map-pin"></i>
                                                <p>Jepara, Jawa Tengah, Indonesia</p>
                                            </div>
                                            <p class="judul">Karimun Jawa</p>
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star unchecked"></span>
                                            </div>
                                            <p class="hoster">Shelter Garut</p>
                                            <p class="price">Rp.600.000</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
                        <li><a href="">Sumatra</a></li>
                        <li><a href="">Jawa Barat</a></li>
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
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <!-- script back to top -->
    <script type="text/javascript" src="js/back-to-top.js"></script>
    <!-- start carousel -->
    <script type="text/javascript" src="js/carousel.js"></script>
    <script type="text/javascript">
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    });
    </script>
    <script src="js/jquery-3.6.0.slim.js"></script>
    <script src="js/owl.carousel.js"></script>

    <script>
    var owlHeader = $("#owl-one");
    owlHeader.owlCarousel({
        items: 3,
        margin: 10,
        nav: true,
        loop: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 6000,
        navText: [
            '<div class="nav-carousel-left"><i class="fa fa-angle-left"></i></div>',
            '<div class="nav-carousel-right"><i class="fa fa-angle-right"></i></div>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            960: {
                items: 5,
            },
            1200: {
                items: 3,
            },
        },
    });
    var owlHeader = $("#owl-two");
    owlHeader.owlCarousel({
        items: 3,
        margin: 10,
        nav: false,
        loop: false,
        dots: true,
        autoplay: false,
        autoplayTimeout: 3500,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            960: {
                items: 5,
            },
            1200: {
                items: 4,
            },
        },
    });
    var owlHeader = $("#owl-iklan");
    owlHeader.owlCarousel({
        items: 3,
        margin: 50,
        nav: false,
        loop: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5500,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            960: {
                items: 5,
            },
            1200: {
                items: 4,
            },
        },
    });
    owlHeader.on("mousewheel", ".owl-stage", function(e) {
        e.preventDefault();
    });
    </script>
</body>

</html>