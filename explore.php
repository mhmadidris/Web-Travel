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
    <title>BransKuy | Explore</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/explore.css">
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/all.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body class="body">
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

    <div class="container">
        <div class="explore">
            <h1>Explore</h1>
            <main class="content">
                <div class="card-container">
                    <section class="card">
                        <img src="img/jawa-barat-bg.png" alt="" />
                        <div class="card-title">
                            <h3>Jawa Barat</h3>
                            <p>West Java is a province of Indonesia on
                                the western
                                part of the island of Java, with its provincial capital in Bandung. West Java is
                                bordered by the province of
                                Banten and the country's capital region of Jakarta to the west, the Java Sea to the
                                north, the province of
                                Central Java to the east and the Indian Ocean to the south.
                            </p>
                            <a href="explore/jawa-barat.php"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                    <section class="card" data-AOS="fade-right">
                        <img src="img/jawa-tengah-bg.png" alt="" />
                        <div class="card-title">
                            <h3>Jawa Tengah</h3>
                            <p>Central Java is a
                                province of Indonesia,
                                located in the middle of the island of Java. Its administrative capital is Semarang.
                                It
                                is bordered by West Java in the west, the
                                Indian Ocean and the Special Region of Yogyakarta in the south, East Java in the
                                east,
                                and the Java Sea in the north.
                                It has a total area of 32,548 km², with a population of 34,552,500 in mid 2019.
                            </p>
                            <a href="#"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                    <section class="card" data-AOS="fade-left">
                        <img src="img/jawa-timur-bg.png" alt="" />
                        <div class="card-title">
                            <h3>Jawa Timur</h3>
                            <p>East Java is a province of Indonesia. It has a land border only
                                with the province of
                                Central Java to the west; the Java Sea and the Indian Ocean border its northern and
                                southern coasts, respectively,
                                while the narrow Bali Strait to the east separates Java from Bali. Located in
                                eastern
                                Java, it also includes the island of
                                Madura, which is connected to Java by the longest bridge in Indonesia, the Suramadu
                                Bridge, as well as the Kangean
                                islands located further east (in the northern Bali Sea) and Masalembu archipelagos
                                in
                                the north.
                            </p>
                            <a href="explore/jawa-timur.php"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                    <section class="card" data-AOS="fade-right">
                        <img src="img/carousel/bali-carousel.jpg" alt="" />
                        <div class="card-title">
                            <h3>Bali</h3>
                            <p>Bali is a province of Indonesia and the westernmost of the Lesser Sunda Islands. East
                                of
                                Java and west of Lombok,
                                the province includes the island of Bali and a few smaller neighbouring islands,
                                notably
                                Nusa Penida, Nusa Lembongan, and Nusa Ceningan.
                                The provincial capital, Denpasar, is the most populous city in the Lesser Sunda
                                Islands
                                and the second-largest, after Makassar, in Eastern
                                Indonesia. Bali is Indonesia's main tourist destination, with a significant rise in
                                tourism since the 1980s.
                            </p>
                            <a href="explore/bali.php"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                    <section class="card" data-AOS="fade-left">
                        <img src="img/carousel/kalimantan-carousel.jpg" alt="" />
                        <div class="card-title">
                            <h3>Kalimantan</h3>
                            <p>Kalimantan is the Indonesian portion of the island of Borneo. It comprises 73% of the
                                island's area.
                                The non-Indonesian parts of Borneo are Brunei and East Malaysia. In Indonesia,
                                "Kalimantan" refers to the whole island of Borneo.
                                In 2019, the Indonesian President Joko Widodo proposed that Indonesia's capital be
                                moved
                                to Kalimantan.
                            </p>
                            <a href="#"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                    <section class="card" data-AOS="fade-right">
                        <img src="img/carousel/sulawesi-carousel.jpg" alt="" />
                        <div class="card-title">
                            <h3>Sulawesi</h3>
                            <p>Sulawesi is a province in Eastern Indonesia with Makassar as its capital. Amongst any
                                other region, this district is the most populated province with various tradition,
                                rite,
                                and ethnicities. Which is why, this area that divided into three ethnicities —
                                Bugis,
                                Makassar, and Toraja — is a wondrous destination for tourists.
                            </p>
                            <a href="#"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                    <section class="card" data-AOS="fade-left">
                        <img src="img/carousel/banten-carousel.jpg" alt="" />
                        <div class="card-title">
                            <h3>Banten</h3>
                            <p>Banten is the westernmost province on the island
                                of Java, in Indonesia. Its provincial capital city is Serang. The province borders
                                West
                                Java and the Special Capital Region of Jakarta to the east, the Java Sea to the
                                north,
                                the Indian Ocean to the south, and the Sunda Strait to the west, which separates
                                Java
                                from the neighbouring island of Sumatra. The area of the povince is 9,662.82 km2,
                                and it
                                had a population of over 11.9 million at the 2020 Census, up from over 10.6 million
                                during the 2010 census.
                            </p>
                            <a href="#"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                    <section class="card" data-AOS="fade-right">
                        <img src="img/carousel/maluku-carousel.jpg" alt="" />
                        <div class="card-title">
                            <h3>Maluku</h3>
                            <p>Maluku is a province of Indonesia. It comprises the central and southern regions of
                                the
                                Maluku Islands. The main city and capital of Maluku province is Ambon on the small
                                Ambon
                                Island. The land area is 62,946 km2, and the total population of this province at
                                the
                                2010 census was 1,533,506 people, rising to 1,848,923 at the 2020 Census.Maluku is
                                located in Eastern Indonesia. It is directly adjacent to North Maluku and West Papua
                                in
                                the north, Central Sulawesi, and Southeast Sulawesi in the west, Banda Sea, East
                                Timor
                                and East Nusa Tenggara in the south and Arafura Sea and Papua in the east.
                            </p>
                            <a href="#"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                    <section class="card" data-AOS="fade-left">
                        <img src="img/carousel/nusa-tenggara-carousel.jpg" alt="" />
                        <div class="card-title">
                            <h3>Nusa Tenggara</h3>
                            <p>East Nusa Tenggara is the southernmost province of Indonesia. It comprises the
                                eastern
                                portion of the Lesser Sunda Islands, facing the Indian Ocean in the south and the
                                Flores
                                Sea in the north. It consists of more than 500 islands, with the largest ones being
                                Sumba, Flores, and the western part of Timor; the latter shares a land border with
                                the
                                separate nation of East Timor. The province is subdivided into twenty-one regencies
                                and
                                the regency-level city of Kupang, which is the capital and largest city.
                            </p>
                            <a href="#"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                    <section class="card" data-AOS="fade-right">
                        <img src="img/carousel/sumatra-carousel.jpg" alt="" />
                        <div class="card-title">
                            <h3>Sumatra</h3>
                            <p>Sumatra is one of the Sunda Islands of western Indonesia. It is the largest island
                                that
                                is fully within Indonesian territory, as well as the sixth-largest island in the
                                world
                                at 473,481 km2 (182,812 mi.2), not including adjacent islands such as the Simeulue,
                                Nias, Mentawai, Enggano, Riau Islands, Bangka Belitung and Krakatoa archipelago.
                            </p>
                            <a href="#"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                    <section class="card" data-AOS="fade-left">
                        <img src="img/carousel/papua-carousel.jpg" alt="" />
                        <div class="card-title">
                            <h3>Papua</h3>
                            <p>Papua, formerly Irian Jaya, is the largest and easternmost province of Indonesia,
                                comprising most of Western New Guinea. The province is located on the island of New
                                Guinea. It is bordered by the state of Papua New Guinea to the east, the province of
                                West Papua to the west, the Pacific Ocean to the north, and the Arafura Sea to the
                                south. The
                                province is divided into twenty-eight regencies and one city. Its capital and
                                largest
                                city is Jayapura. The province has a large potential in natural resources, such as
                                gold,
                                nickel, petroleum, etc.
                            </p>
                            <a href="#"><button class="btn">Explore</button></a>
                        </div>
                    </section>
                </div>
            </main>
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

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="js/aos.js"></script>
    <script type="text/javascript" src="js/back-to-top.js"></script>
    <script>
    AOS.init({
        offset: 250,
        delay: 0,
        duration: 700
    });
    </script>
    <script type="text/javascript">
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    });
    </script>
    <!-- script back to top -->
    <script type="text/javascript" src="../js/back-to-top.js"></script>
</body>

</html>