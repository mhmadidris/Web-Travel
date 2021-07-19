<?php
session_start();
if (isset($_COOKIE["login"])) {
    if ($_COOKIE["login"] == "true") {
        $_SESSION["login"] == true;
    }
}
require '../config.php';
$paket = query("SELECT * FROM paket WHERE provinsi='Jawa Timur'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BransKuy | Jawa Timur</title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/explore-province.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../css/owl.theme.default.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Kaushan Script' rel='stylesheet'>
    <script src="../js/all.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#icon').click(function() {
            $('ul').toggleClass('show');
        });
    });
    </script>
</head>

<body>
    <div class="header-bawah-jatim">
        <div class="body">
            <header class="header">
                <div class="foto-logo">
                    <a href="../index.php"><img src="../img/logo-branskuy.png" alt=""></a>
                </div>
                <div class="navbar-nav">
                    <div class="navbar-brand">
                        <a href="../index.php">Home</a>
                        <a href="../explore.php">Explore</a>
                        <a href="../about.php">About</a>
                    </div>
                </div>
                <?php
if (isset($_SESSION["masuk_user"])) {
    echo '<div class="profile-drop">
                    <h5><a href="#">' . $_SESSION["full_name"] . '</a></h5>
                    <div>
                    <div class="sub-menu-1">
            <a href="../profile.php">
                <div class="profile-flex">
                    <i class="fas fa-user"></i>
                    <p>Profile</p>
                </div>
            </a>
            <hr>
            <a href="../logout.php">
                <div class="profile-flex">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </div>
            </a>
        </div>';
    if ($_SESSION["foto"] == null) {
        echo
            '<div class="foto"><img src="../img/profile.png" alt=""></div>';
    } else {
        echo '<div class="foto"><img src="../img/' . $_SESSION["foto"] . '"></div>';
    }
} elseif (isset($_SESSION["masuk_hoster"])) {
    echo '<div class="profile-drop">
                    <h5><a href="#">' . $_SESSION["full_name"] . '</a></h5>
                    <div>
                    <div class="sub-menu-1">
            <a href="../myprofile.php">
                <div class="profile-flex">
                    <i class="fas fa-user"></i>
                    <p>Profile</p>
                </div>
            </a>
            <hr>
            <a href="../tambahpaket.php">
                <div class="profile-flex">
                <i class="fas fa-plus-square"></i>
                    <p>Tambah Paket</p>
                </div>
            </a>
            <hr>
            <a href="../logout.php">
                <div class="profile-flex">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </div>
            </a>
        </div>';
    if ($_SESSION["foto_logo"] == null) {
        echo
            '<div class="foto"><img src="../img/profile.png" alt=""></div>';
    } else {
        echo '<div class="foto"><img src="../img/' . $_SESSION["foto_logo"] . '"></div>';
    }
} else {
    echo '<h5><a href="../login-signup.php">Login / Signup</a></h5>';
}
?>
                <label id="icon">
                    <i class="fas fa-bars"></i>
                </label>
            </header>
        </div>
        <div class="overlay">
            <div class="flex">
                <div class="kiri">
                    <h1>Jawa Timur</h1>
                </div>
                <div class="kanan">
                    <p>East Java (Indonesian: Jawa Timur) is a province of Indonesia. It has a land border only with the
                        province of
                        Central Java to the west; the Java Sea and the Indian Ocean border its northern and southern
                        coasts, respectively,
                        while the narrow Bali Strait to the east separates Java from Bali. Located in eastern Java, it
                        also includes the island of
                        Madura, which is connected to Java by the longest bridge in Indonesia, the Suramadu Bridge, as
                        well as the Kangean
                        islands located further east (in the northern Bali Sea) and Masalembu archipelagos in the north.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="tujuan">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><i class="fas fa-caret-right"></i></li>
            <li><a href="explore.php">Explore</a></li>
            <li><i class="fas fa-caret-right"></i></li>
            <li><a href="explore/jawa-timur.php">Jawa Timur</a></li>
        </ul>
    </div>
    <!-- start search -->
    <div class="boxSearch">
        <form class="cari-box" method="post">
            <div class="cari-back">
                <input type="search" name="search" placeholder="Search destinations" autocomplete="off">
                <button type="submit" name="submit" class="icon">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <?php
// if (isset($_POST['submit'])) {
//     $searchValue = $_POST['search'];
//     $sql = "SELECT * FROM paket WHERE judul LIKE '%$searchValue%'";

//     $result = $conn->query($sql);
//     while ($row = $result->fetch_assoc()) {
//         echo $row['judul'] . "<br>";
//     }
// }
?>
    <!-- end search -->
    <div class="container-back">
        <div class="container-container">
            <div class="container-travel">
                <aside>
                    <div class="aside-container">
                        <div class="filter-header">
                            <h4>Price</h4>
                        </div>
                        <div class="filter">
                            <input type="number" class="filter-input" placeholder="Minimum">
                            <input type="number" class="filter-input" placeholder="Maximum">
                        </div>
                    </div>
                    <hr class="garis-pembatas">
                    <div class="aside-container">
                        <div class="filter-header">
                            <h4>Rating</h4>
                        </div>
                        <div class="layout">
                            <div class="column-check">
                                <input type="checkbox" id="star5">
                                <label for="star5">
                                    <div class="stars-filter">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                </label>
                            </div>
                            <div class="column-check">
                                <input type="checkbox" id="star4">
                                <label for="star4">
                                    <div class="stars-filter">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                    </div>
                                </label>
                            </div>
                            <div class="column-check">
                                <input type="checkbox" id="star3">
                                <label for="star3">
                                    <div class="stars-filter">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                    </div>
                                </label>
                            </div>
                            <div class="column-check">
                                <input type="checkbox" id="star2">
                                <label for="star2">
                                    <div class="stars-filter">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                    </div>
                                </label>
                            </div>
                            <div class="column-check">
                                <input type="checkbox" id="star1">
                                <label for="star1">
                                    <div class="stars-filter">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr class="garis-pembatas">
                    <div class="aside-container">
                        <div class="filter-header">
                            <h4>Date</h4>
                        </div>
                        <div>
                            <input type="date" class="date">
                        </div>
                    </div>
                    <div class="aside-container">
                        <div class="terapkan">
                            <button>Apply</button>
                        </div>
                    </div>
                </aside>
                <hr class="vertikal">
                <div class="container-header">
                    <div class="travel-header">
                        <h2>Jawa Timur</h2>
                        <div id="desc-nav">
                            <div class="tombol aktif" onclick="row()">
                                <i class="fas fa-columns"></i>
                            </div>
                            <div class="tombol" onclick="column()">
                                <i class="fas fa-list"></i>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="div1">
                        <div class="travel">
                            <?php foreach ($paket as $row): ?>
                            <div class="content-travel">
                                <a href="../travel.php?id_paket=<?php echo $row["id_paket"]; ?>">
                                    <div class="foto-travel">
                                        <img src="../img/foto travel/<?php echo $row["foto_utama"]; ?>" alt="">
                                    </div>
                                    <div class="title-travel">
                                        <div class="lok">
                                            <i class="fas fa-map-pin"></i>
                                            <p><?php echo $row["lokasi"]; ?></p>
                                        </div>
                                        <div class="title">
                                            <h5><?php echo $row["judul"]; ?></h5>
                                        </div>
                                        <div class="review-flex">
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star unchecked"></span>
                                            </div>
                                            <p>3 Reviewers</p>
                                        </div>
                                        <h5 class="hoster"><?php echo $row["nama_hoster"]; ?></h5>
                                        <h5 class="harga">Rp.<?php echo $row["harga"]; ?></h5>
                                    </div>
                                    <i class="far fa-bookmark" title="Add to Bookmark"></i>
                                </a>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div id="div2">
                        <div class="travel-column">
                            <?php foreach ($paket as $row): ?>
                            <div class="content-travel-column">
                                <a href="../travel.php?id_paket=<?php echo $row["id_paket"]; ?>">
                                    <div class="column-row-travel">
                                        <i class="far fa-bookmark" title="Add to Bookmark"></i>
                                        <div class="foto-travel-column">
                                            <img src="../img/foto travel/<?php echo $row["foto_utama"]; ?>" alt="">
                                        </div>
                                        <div class="title-travel-column">
                                            <div class="lok">
                                                <i class="fas fa-map-pin"></i>
                                                <p><?php echo $row["lokasi"]; ?></p>
                                            </div>
                                            <h5 class="title"><?php echo $row["judul"]; ?></h5>
                                            <div class="review-flex-column">
                                                <div class="stars">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star unchecked"></span>
                                                </div>
                                                <p>3 Reviewers</p>
                                            </div>
                                            <h5 class="hoster"><?php echo $row["nama_hoster"]; ?></h5>
                                            <h5 class="harga">Rp.<?php echo $row["harga"]; ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- start carousel -->
    <div class="carousel-container">
        <h1 class="title">Explore</h1>
        <div class="carousel-header">
            <div class="container-center">
                <div id="owl-one" class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/sumatra-carousel.jpg" alt="" />
                                <p class="explore-title">Sumatra</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/banten-carousel.jpg" alt="" />
                                <p class="explore-title">Banten</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="jawa-barat.php">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/jawa-barat-carousel.jpeg" alt="" />
                                <p class="explore-title">Jawa Barat</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/jawa-tengah-carousel.jpg" alt="" />
                                <p class="explore-title">Jawa Tengah</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="jawa-timur.php">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/jawa-timur-carousel.jpg" alt="" />
                                <p class="explore-title">Jawa Timur</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="bali.php">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/bali-carousel.jpg" alt="" />
                                <p class="explore-title">Bali</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/kalimantan-carousel.jpg" alt="" />
                                <p class="explore-title">Kalimantan</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/nusa-tenggara-carousel.jpg" alt="" />
                                <p class="explore-title">Nusa Tenggara</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/sulawesi-carousel.jpg" alt="" />
                                <p class="explore-title">Sulawesi</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/maluku-carousel.jpg" alt="" />
                                <p class="explore-title">Maluku</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="shadow-effect">
                                <img class="img-responsive" src="../img/carousel/papua-carousel.jpg" alt="" />
                                <p class="explore-title">Papua</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end carousel -->


    <footer>
        <a href="#">
            <div class="arrow-up" icon="button" id="scroll">
                <img src="../img/arrow-up-solid.svg" alt="">
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
                    <img src="../img/instagram.png" alt="instagram">
                </a>
                <a href="">
                    <img src="../img/twitter.png" alt="twitter">
                </a>
                <a href="">
                    <img src="../img/youtube.png" alt="youtube">
                </a>
                <a href="">
                    <img src="../img/facebook.png" alt="facebook">
                </a>
            </div>
        </div>
    </footer>


    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/owl.carousel.js"></script>
    <script type="text/javascript" src="../js/active.js"></script>
    <script>
    function row() {
        document.getElementById('div1').style.display = "block";
        document.getElementById('div2').style.display = "none";
    }

    function column() {
        document.getElementById('div2').style.display = "block";
        document.getElementById('div1').style.display = "none";
    }
    </script>
    <script type="text/javascript">
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    });
    </script>
    <!-- script back to top -->
    <script type="text/javascript" src="../js/back-to-top.js"></script>
    <!-- start carousel -->
    <script>
    var owlHeader = $("#owl-one");
    owlHeader.owlCarousel({
        items: 3,
        margin: 5,
        nav: true,
        loop: true,
        dots: false,
        autoplay: true,
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
    owlHeader.on("mousewheel", ".owl-stage", function(e) {
        e.preventDefault();
    });
    </script>
</body>

</html>