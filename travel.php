<?php
session_start();
if (isset($_SESSION["login"])) {
    if ($_SESSION["login"] == "true") {
        $_SESSION["login"] == true;
    }
}
require 'config.php';
if (isset($_GET['id_paket'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id_paket']);
    $sql = "SELECT * FROM paket WHERE id_paket= $id";
    $result = mysqli_query($conn, $sql);
    $paket = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BransKuy | <?php echo $paket["judul"]; ?></title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/travel.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <script src="js/all.min.js"></script>
    <script src="js/number.js"></script>
    <script>
    $(document).ready(function() {
        $('#icon').click(function() {
            $('ul').toggleClass('show');
        });
    });
    </script>
</head>

<body>
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

    <div class="contaainer">
        <div class="tujuan">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><i class="fas fa-caret-right"></i></li>
                <li><a href="explore.php">Explore</a></li>
                <li><i class="fas fa-caret-right"></i></li>
                <li>
                    <a href="explore/<?php $at = strtolower($paket["provinsi"]);
echo $ag = str_replace(" ", "-", $at)?>.php"><?php echo $paket["provinsi"]; ?></a>
                </li>
                <li><i class="fas fa-caret-right"></i></li>
                <li><a href=""><?php echo $paket["judul"]; ?></a></li>
            </ul>
        </div>

        <div class="wrap-center">
            <div class="detail-travel">
                <div class="bookmark">
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="image-header">
                    <div class="foto-header">
                        <img src="img/foto travel/<?php echo $paket["foto_utama"]; ?>" alt="" id="imgDisp">
                    </div>
                    <div class="nav-center-carousel">
                        <div class="header-testimonials">
                            <div id="customers-testimonials" class="owl-carousel">
                                <?php
$paket_count = $paket["foto_tambahan"];
$imageArray = explode(', ', $paket_count);
foreach ($imageArray as $key => $value) {
    ?>
                                <div class="item">
                                    <img onclick="changeImage('img/foto travel/<?php echo $value ?>')"
                                        src="img/foto travel/<?php echo $value ?>" alt="" />
                                </div>
                                <?php
}
?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="travel-title">
                    <div class="map">
                        <i class="fas fa-map-pin"></i>
                        <p><?php echo $paket["lokasi"]; ?></p>
                    </div>
                    <h2 class="judul-travel"><?php echo $paket["judul"]; ?></h2>
                    <div class="flex-header-text">
                        <div class="flex-header-title">
                            <i class="fas fa-star"></i>
                            <p> 4.7 (20 ulasan)</p>
                        </div>
                        <div class="flex-header-title">
                            <i class="fas fa-clock"></i>
                            <p><?php echo $paket["durasi"]; ?> days</p>
                        </div>
                        <div class="flex-header-title">
                            <i class="fas fa-clipboard-check"></i>
                            <p> Available</p>
                        </div>
                    </div>
                    <!-- <form action="" method="get"> -->
                    <div class="check-column">
                        <div class="check">
                            <div class="date">
                                <h4>Date</h4>
                                <select name="" id="">
                                    <?php
$paket_count = $paket["tanggal"];
$imageArray = explode(', ', $paket_count);
foreach ($imageArray as $key => $value) {
    ?>
                                    <option value=""><?php echo date("d F Y", strtotime($value)) ?></option>
                                    <?php
}?>
                                </select>
                            </div>
                            <div class="meet">
                                <h4>Meeting Point</h4>
                                <select name="" id="">
                                    <?php
$paket_count = $paket["meepo"];
$imageArray = explode('. ', $paket_count);
foreach ($imageArray as $key => $value) {
    ?>
                                    <option value=""><?php echo $value ?></option>
                                    <!-- <option value="">Stasiun Malang Kota Lama, Malang</option> -->
                                    <?php
}
?>
                                </select>
                            </div>
                            <div class="person">
                                <h4>Person</h4>
                                <div class="input-number-wrapper">
                                    <div class="decrease">
                                        <i class="fas fa-minus-circle"></i>
                                    </div>
                                    <input type="text" value="1" class="number-input" />
                                    <div class="increase">
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="ava">
                                <p>Available</p>
                            </div> -->
                        </div>
                        <button>Check Now</button>
                    </div>
                    <!-- </form> -->
                    <div class="chat-btn">
                        <button>
                            <i class="fas fa-comment-dots"></i>
                            <p>Chat Hoster</p>
                        </button>
                    </div>
                    <h3 class="price">Rp.<?php echo $paket["harga"]; ?>/person</h3>
                </div>
            </div>
        </div>

        <div class="travel-center">
            <div class="travel">
                <div class="detail-description">
                    <div class="description-nav" id="desc-nav">
                        <h3 onclick="information()" class="tombol aktif">Description</h3>
                        <h3 onclick="schedule()" class="tombol">Terms & Conditions</h3>
                        <h3 onclick="facility()" class="tombol">Facility</h3>
                        <h3 onclick="jadwal()" class="tombol">Itinerary</h3>
                        <h3 onclick="review()" class="tombol">Reviews</h3>
                    </div>
                    <hr>
                    <div id="div1">
                        <div class="information">
                            <div class="information-text">
                                <?php echo $paket["deskripsi"]; ?>
                            </div>
                            <div class="include">
                                <div class="schedule-title">
                                    <i class="fas fa-calendar-plus"></i>
                                    <p>Schedule</p>
                                </div>
                                <div class="include-container">
                                    <ul>
                                        <?php
$paket_count = $paket["tanggal"];
$imageArray = explode(', ', $paket_count);
foreach ($imageArray as $key => $value) {
    ?>
                                        <li><?php echo date("d F Y", strtotime($value)) ?></li>
                                        <?php
}?>
                                    </ul>
                                </div>
                            </div>
                            <div class="exclude">
                                <div class="include-title">
                                    <i class="fas fa-map-marked-alt"></i>
                                    <p>Meeting Point</p>
                                </div>
                                <div class="exclude-container">
                                    <ul>
                                        <?php
$paket_count = $paket["meepo"];
$imageArray = explode('. ', $paket_count);
foreach ($imageArray as $key => $value) {
    ?>
                                        <li><?php echo $value; ?></li>
                                        <?php
}?>
                                    </ul>
                                </div>
                            </div>
                            <?php echo $paket["lokasi_iframe"]; ?>
                        </div>
                    </div>
                    <div id="div7">
                        <div class="include-exclude">
                            <div class="include">
                                <div class="schedule-title">
                                    <i class="fas fa-clipboard-list"></i>
                                    <p>Ketentuan Umum</p>
                                </div>
                                <div class="include-container">
                                    <?php echo $paket["peraturan"]; ?>
                                </div>
                            </div>
                            <div class="exclude">
                                <div class="include-title">
                                    <i class="fas fa-shield-virus"></i>
                                    <p>Ketentuan Tambahan COVID 19</p>
                                </div>
                                <div class="exclude-container">
                                    <ol>
                                        <li>Wajib mematuhi Protokol Kesehatan new normal</li>
                                        <li>Memakai masker dan membawa masker tambahan</li>
                                        <li>Membawa hand sanitizer</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="div2">
                        <div class="include-exclude">
                            <div class="include">
                                <div class="include-title">
                                    <i class="fas fa-check" style="margin: 0px 5px; font-size: 18px;"></i>
                                    <p>Include</p>
                                </div>
                                <div class="include-container">
                                    <?php echo $paket["include"]; ?>
                                </div>
                            </div>
                            <div class="exclude">
                                <div class="include-title">
                                    <i class="fas fa-times" style="margin: 0px 5px; font-size: 18px;"></i>
                                    <p>Exclude</p>
                                </div>
                                <div class="exclude-container">
                                    <?php echo $paket["exclude"]; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="div3">
                        <div class="review-column">
                            <div class="containeer">
                                <div class="inner">
                                    <div class="rating">
                                        <span class="rating-num">4.0</span>
                                        <div class="rating-stars">
                                            <span><i class="active icon-star"></i></span>
                                            <span><i class="active icon-star"></i></span>
                                            <span><i class="active icon-star"></i></span>
                                            <span><i class="active icon-star"></i></span>
                                            <span><i class="icon-star"></i></span>
                                        </div>
                                        <div class="rating-users">
                                            <i class="icon-user"></i> 1230 total
                                        </div>
                                    </div>

                                    <div class="histo">
                                        <div class="five histo-rate">
                                            <span class="histo-star">
                                                <i class="active icon-star"></i> 5 </span>
                                            <span class="bar-block">
                                                <span id="bar-five" class="bar">
                                                </span>
                                            </span>
                                        </div>

                                        <div class="four histo-rate">
                                            <span class="histo-star">
                                                <i class="active icon-star"></i> 4 </span>
                                            <span class="bar-block">
                                                <span id="bar-four" class="bar">
                                                </span>
                                            </span>
                                        </div>

                                        <div class="three histo-rate">
                                            <span class="histo-star">
                                                <i class="active icon-star"></i> 3 </span>
                                            <span class="bar-block">
                                                <span id="bar-three" class="bar">
                                                </span>
                                            </span>
                                        </div>

                                        <div class="two histo-rate">
                                            <span class="histo-star">
                                                <i class="active icon-star"></i> 2 </span>
                                            <span class="bar-block">
                                                <span id="bar-two" class="bar">
                                                </span>
                                            </span>
                                        </div>

                                        <div class="one histo-rate">
                                            <span class="histo-star">
                                                <i class="active icon-star"></i> 1 </span>
                                            <span class="bar-block">
                                                <span id="bar-one" class="bar">
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review-content">
                                <div class="review-title">
                                    <div class="review-title-flex">
                                        <h4 class="title">John Smith</h4>
                                        <p class="date">21/04/2022</p>
                                    </div>
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                    </div>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Ducimus commodi
                                        deserunt iure tempore ut voluptatum voluptatem voluptas iste
                                        non quasi
                                        consectetur exercitationem, consequatur cum quas et sapiente
                                        illo similique
                                        aliquam?</p>
                                </div>
                            </div>
                            <div class="review-content">
                                <div class="review-title">
                                    <div class="review-title-flex">
                                        <h4 class="title">John Smith</h4>
                                        <p class="date">21/04/2022</p>
                                    </div>
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                    </div>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Explicabo sed
                                        laudantium odio, impedit nostrum voluptatibus eaque
                                        blanditiis facilis natus
                                        provident dolor esse sint voluptates, possimus vero itaque.
                                        Sint,
                                        consequuntur officiis. Lorem ipsum dolor sit amet
                                        consectetur adipisicing
                                        elit. Nam voluptatem assumenda praesentium illum explicabo
                                        eligendi, modi
                                        facere a deleniti, nisi quo est iure sapiente suscipit sint
                                        doloremque atque
                                        architecto sit? Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit.
                                        Deleniti error nobis quae dolore, impedit voluptatem aliquam
                                        dicta
                                        cupiditate laborum atque ex reprehenderit blanditiis
                                        perferendis dolores
                                        officiis culpa nostrum odit molestias? Lorem ipsum dolor sit
                                        amet
                                        consectetur adipisicing elit. Consectetur itaque eos
                                        officiis delectus
                                        expedita a impedit maxime et ratione, hic sequi, ad nostrum.
                                        Consequuntur
                                        tempora labore eaque aperiam. Illum, ut? Lorem ipsum dolor
                                        sit amet
                                        consectetur adipisicing elit. Voluptatibus labore est qui
                                        doloribus,
                                        sapiente nostrum dolore tempore cupiditate, architecto
                                        asperiores fugit. Eum
                                        odit mollitia unde maxime perspiciatis assumenda quae
                                        inventore!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="div4">
                        <div class="information">
                            <div class="box">
                                <?php
$paket_count = $paket["itinerary"];
$imageArray = explode(', ', $paket_count);
foreach ($imageArray as $key => $value) {
    ?>
                                <div class="wrapper">
                                    <button class="toggle">
                                        <?php echo $value; ?><i class="fas fa-plus icon"></i>
                                    </button>
                                    <div class="content">
                                        <?php
$paket_count = $paket["itinerary_text"];
    $imageArray = explode(', ', $paket_count);
    foreach ($imageArray as $key => $value) {
        ?>
                                        <p><?php echo $value; ?></p>
                                        <?php
}?>
                                        <!-- <li>15:00 - 08:00 = Perjalanan ke stasiun malang</li> -->
                                    </div>
                                </div>
                                <?php
}?>
                                <!-- <div class="wrapper">
                                    <button class="toggle">
                                        Day 2<i class="fas fa-plus icon"></i>
                                    </button>
                                    <div class="content">
                                        <ul>
                                            <li>08:00 - 10:00 = Perjalanan menuju basecamp & ishoma</li>
                                            <li>10:00 - 12:00 = Perjalanan menuju ranupane</li>
                                            <li>12:00 - 14:00 = Briefing oleh pihak basecamp dan pemanasan
                                            </li>
                                            <li>14:00 - 19:00 = trekking menuju ranukumbolo</li>
                                            <li>19:00 - 05:00 = Makan, tidur, istirahat di ranukumbolo</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="wrapper">
                                    <button class="toggle">
                                        Day 3<i class="fas fa-plus icon"></i>
                                    </button>
                                    <div class="content">
                                        <ul>
                                            <li>05:00 - 09:00 = Sarapan, free, persiapan packing</li>
                                            <li>09:00 - 14:00 = trekking menuju kalimati</li>
                                            <li>14:00 - 23:00 = makan, istirahat</li>
                                            <li>23:00 - 07:00 = bangun, prepare summit puncak mahameru</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="wrapper">
                                    <button class="toggle">
                                        Day 4<i class="fas fa-plus icon"></i>
                                    </button>
                                    <div class="content">
                                        <ul>
                                            <li>09:00 - 12:00 = Turun kembali menuju kalimati</li>
                                            <li>12:00 - 18:00 = istirahat, packing, menuju ranukumbolo</li>
                                            <li>18:00 - 05:00 = acara bebas, makan, dan camp di ranukumbolo
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="wrapper">
                                    <button class="toggle">
                                        Day 5<i class="fas fa-plus icon"></i>
                                    </button>
                                    <div class="content">
                                        <ul>
                                            <li>09:00 - 12:00 = Turun kembali menuju kalimati</li>
                                            <li>12:00 - 18:00 = istirahat, packing, menuju ranukumbolo</li>
                                            <li>18:00 - 05:00 = acara bebas, makan, dan camp di ranukumbolo
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="wrapper">
                                    <button class="toggle">
                                        Day 6<i class="fas fa-plus icon"></i>
                                    </button>
                                    <div class="content">
                                        <ul>
                                            <li>09:00 - 12:00 = Turun kembali menuju kalimati</li>
                                            <li>12:00 - 18:00 = istirahat, packing, menuju ranukumbolo</li>
                                            <li>18:00 - 05:00 = acara bebas, makan, dan camp di ranukumbolo
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kanan">
                    <div class="kanan-bar1">
                        <div>
                            <div class="kanan-container">
                                <h4>Date</h4>
                                <div class="input-option">
                                    <select name="" id="">
                                        <?php
$paket_count = $paket["tanggal"];
$imageArray = explode(', ', $paket_count);
foreach ($imageArray as $key => $value) {
    ?>
                                        <option value=""><?php echo date("d F Y", strtotime($value)) ?></option>
                                        <?php
}?>
                                    </select>
                                </div>
                                <h4>Meeting Point</h4>
                                <div class="input-option">
                                    <select name="" id="">
                                        <?php
$paket_count = $paket["meepo"];
$imageArray = explode('. ', $paket_count);
foreach ($imageArray as $key => $value) {
    ?>
                                        <option value=""><?php echo $value ?></option>
                                        <?php
}?>
                                    </select>
                                </div>
                                <h4>Person</h4>
                                <div class="input-number-wrapper">
                                    <div class="decrease">
                                        <i class="fas fa-minus-circle"></i>
                                    </div>
                                    <input type="text" value="1" class="number-input" />
                                    <div class="increase">
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="biaya">Total: Rp.<?php echo $paket["harga"]; ?></p>
                            <?php if (isset($_SESSION["masuk_user"])): ?>
                            <div class="tombol-book">
                                <button id="button">
                                    <i class="fas fa-walking" style="margin: 0px 2.5px; font-size: 18px;"></i>
                                    BOOK NOW
                                </button>
                            </div>
                            <?php endif;?>
                            <?php if (isset($_SESSION["masuk_hoster"])): ?>
                            <div class="tombol-book">
                                <button id="">
                                    <i class="fas fa-edit" style="margin: 0px 2.5px; font-size: 18px;"></i>
                                    Edit Package
                                </button>
                            </div>
                            <?php endif;?>
                        </div>
                        <div class="kanan-bawah-flex">
                            <div class="flex-bawah">
                                <i class="fas fa-share-alt"></i>
                                <p>Share Trip</p>
                            </div>
                            <hr class="flex-garis">
                            <div class="flex-bawah">
                                <i class="fas fa-exclamation-circle"></i>
                                <p>Laporkan Trip</p>
                            </div>
                        </div>
                    </div>
                    <div class="kanan-bar2">
                        <div class="kanan-profile">
                            <div class="profile-kiri">
                                <div class="foto">
                                    <img src="img/logo-mitra.JPG" alt="">
                                </div>
                                <div class="profile-title">
                                    <h5><?php echo $paket["nama_hoster"]; ?></h5>
                                    <p>1200 followers</p>
                                </div>
                            </div>
                            <div class="profile-tombol">
                                <button><i class="fas fa-plus" aria-hidden="true"
                                        style="margin: 0px 2.5px;"></i>Follow</button>
                            </div>
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
                    <li><a href="">Jawa</a></li>
                    <li><a href="">Sumatra</a></li>
                    <li><a href="">Kalimantan</a></li>
                    <li><a href="">Sulawesi</a></li>
                </ul>
            </div>
            <div class="link">
                <h1 class="text">Link</h1>
                <ul>
                    <li><a href="../about.php">About</a></li>
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
    <?php
// if (isset($_POST['pesanan'])) {
//     pemesanan($_POST['pesanan']);
// }
// $usersTimezone = 'America/New_York';
// $date = new DateTime(new DateTimeZone($usersTimezone));
// echo $date->format('Y-m-d H:i:s');

// date_default_timezone_set("Asia/Jakarta");
// $dada = date("d-m-Y H:i:s");
// echo $dada;
?>
    <div data-pop="pop-in" id="popup">
        <div class="popupcontrols">
            <div class="flex-popup">
                <h5><?php echo $paket["judul"]; ?></h5>
                <div class="coumn-flex">
                    <p>Jumlah Peserta : 1 Orang</p>
                    <p>Meeting Point : Stasiun Pasar Senen, Jakarta</p>
                </div>
            </div>
            <span id="popupclose"><i class="fas fa-times"></i></span>
        </div>
        <form action="pesan.php" method="post" class="form-pesan">
            <div class="pop">
                <div class="nama-column">
                    <h3 class="nama-title">Data peserta</h3>
                    <div class="nama">
                        <div class="nama-container">
                            <input style="display: none;" type="text" name="idPaket" id="idPaket"
                                value="<?php echo $paket["id_paket"]; ?>">
                            <label for="no_ktp">
                                Nomor KTP
                            </label>
                            <input type="number" placeholder="Nomor KTP" name="no_ktp" id="no_ktp" class="nama-input"
                                required>
                        </div>
                        <div class="nama-container">
                            <label for="namaBelakang">
                                Nama Belakang
                            </label>
                            <input type="text" placeholder="Nama Belakang" name="namaBelakang" id="namaBelakang"
                                class="nama-input" required>
                        </div>
                        <div class="nama-container">
                            <label for="namaDepan">
                                Nama Depan
                            </label>
                            <input type="text" name="namaDepan" id="namaDepan" placeholder="Nama Depan"
                                class="nama-input" required>
                        </div>
                    </div>
                    <div class="nama">
                        <div class="nama-container">
                            <label for="jenisKelamin">
                                Jenis Kelamin
                            </label>
                            <select name="jenisKelamin" id="jenisKelamin" required>
                                <option disabled selected value>-- Pilih Gender --</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="nama-container">
                            <label for="email">
                                Email
                            </label>
                            <input type="text" placeholder="Email" class="nama-input" name="email" id="email" required>
                        </div>
                        <div class="nama-container">
                            <label for="noTelepon">
                                Nomor Telepon
                            </label>
                            <input type="text" placeholder="Nomor Telepon" class="nama-input" name="noTelepon"
                                id="noTelepon" required>
                        </div>
                    </div>
                    <div class="nama">
                        <div class="nama-container">
                            <label for="tempatLahir">
                                Tempat Lahir
                            </label>
                            <input type="text" name="tempatLahir" id="tempatLahir" placeholder="Tempat Lahir"
                                class="nama-input" required>
                        </div>
                        <div class="nama-container">
                            <label for="tanggalLahir">
                                Tanggal Lahir
                            </label>
                            <input type="date" name="tanggalLahir" id="tanggalLahir" class="nama-input" required>
                        </div>
                        <div class="nama-container">
                            <label for="pekerjaan">
                                Pekerjaan
                            </label>
                            <select name="pekerjaan" id="pekerjaan" required>
                                <option disabled selected value>-- None --</option>
                                <option value="Pegawai">Pegawai</option>
                                <option value="Penggiat Wisata">Penggiat Wisata</option>
                                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Dokter">Dokter</option>
                            </select>
                        </div>
                    </div>
                    <div class="alamat-container">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="20" rows="10" required></textarea>
                    </div>
                    <div class="darurat">
                        <h3>Kontak darurat</h3>
                        <div class="darurat-container">
                            <div class="nama-container">
                                <label for="status">
                                    Status
                                </label>
                                <select name="status" id="status" required>
                                    <option disabled selected value>-- Pilih Status --</option>
                                    <option value="Ayah">Ayah</option>
                                    <option value="Ibu">Ibu</option>
                                    <option value="Kakak">Kakak</option>
                                    <option value="Adik">Adik</option>
                                </select>
                            </div>
                            <div class="nama-container">
                                <label for="namaDarurat">
                                    Nama
                                </label>
                                <input type="text" name="namaDarurat" id="namaDarurat" placeholder="Nama kontak darurat"
                                    class="nama-input" required>
                            </div>
                            <div class="nama-container">
                                <label for="noTeleponDarurat">
                                    Nomor telepon
                                </label>
                                <input type="number" name="noTeleponDarurat" id="noTeleponDarurat"
                                    placeholder="Nomor telepon darurat" class="nama-input" required>
                            </div>
                        </div>
                        <div class="penyakit">
                            <h3>Riwayat Penyakit</h3>
                            <div class="penyakit-row">
                                <div class="penyakit-content">
                                    <div class="penyakit-container">
                                        <input type="radio" id="Tidak Ada" name="gender" value="Tidak Ada">
                                        <label for="Tidak Ada" onclick="tidakada()">Tidak Ada</label>
                                    </div>
                                    <div class="penyakit-container">
                                        <input type="radio" id="Ada" name="gender" value="Ada">
                                        <label for="Ada" onclick="ada()">Ada</label>
                                    </div>
                                </div>
                                <div class="penyakit-text">
                                    <div id="div5">
                                        <input type="text" class="penyakit-input" name="jenisPenyakit"
                                            placeholder="Masukkan jenis penyakit anda">
                                    </div>
                                    <div id="div6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="popup-tombol"> -->
                <button type="submit" name="pesanan" id="pesanan" class="popup-tombol">Submit</button>
                <!-- </div> -->
            </div>
        </form>
    </div>

    <div id="overlay"></div>
    <script type="text/javascript">
    // Initialize Variables
    var closePopup = document.getElementById("popupclose");
    var overlay = document.getElementById("overlay");
    var popup = document.getElementById("popup");
    var button = document.getElementById("button");
    // Close Popup Event
    overlay.onclick = function() {
        overlay.className = '';
        popup.className = '';
    };
    // Close Popup Event
    closePopup.onclick = function() {
        overlay.className = '';
        popup.className = '';
    };
    // Show Overlay and Popup
    button.onclick = function() {
        overlay.className = 'show';
        popup.className = 'show';
    }
    </script>
    <script>
    function changeImage(imgName) {
        image = document.getElementById('imgDisp');
        image.src = imgName;
    }
    </script>
    <!-- script back to top -->
    <script src="js/back-to-top.js"></script>
    <script>
    function information() {
        document.getElementById('div1').style.display = "block";
        document.getElementById('div2').style.display = "none";
        document.getElementById('div3').style.display = "none";
        document.getElementById('div4').style.display = "none";
        document.getElementById('div5').style.display = "none";
        document.getElementById('div6').style.display = "none";
        document.getElementById('div7').style.display = "none";
    }

    function schedule() {
        document.getElementById('div7').style.display = "block";
        document.getElementById('div2').style.display = "none";
        document.getElementById('div3').style.display = "none";
        document.getElementById('div4').style.display = "none";
        document.getElementById('div5').style.display = "none";
        document.getElementById('div6').style.display = "none";
        document.getElementById('div1').style.display = "none";
    }

    function meepo() {
        document.getElementById('div8').style.display = "block";
        document.getElementById('div2').style.display = "none";
        document.getElementById('div3').style.display = "none";
        document.getElementById('div4').style.display = "none";
        document.getElementById('div5').style.display = "none";
        document.getElementById('div6').style.display = "none";
        document.getElementById('div7').style.display = "none";
        document.getElementById('div1').style.display = "none";
    }

    function facility() {
        document.getElementById('div2').style.display = "block";
        document.getElementById('div1').style.display = "none";
        document.getElementById('div3').style.display = "none";
        document.getElementById('div4').style.display = "none";
        document.getElementById('div5').style.display = "none";
        document.getElementById('div6').style.display = "none";
        document.getElementById('div7').style.display = "none";
    }

    function review() {
        document.getElementById('div3').style.display = "block";
        document.getElementById('div1').style.display = "none";
        document.getElementById('div2').style.display = "none";
        document.getElementById('div4').style.display = "none";
        document.getElementById('div5').style.display = "none";
        document.getElementById('div6').style.display = "none";
        document.getElementById('div7').style.display = "none";
    }

    function jadwal() {
        document.getElementById('div4').style.display = "block";
        document.getElementById('div1').style.display = "none";
        document.getElementById('div2').style.display = "none";
        document.getElementById('div3').style.display = "none";
        document.getElementById('div5').style.display = "none";
        document.getElementById('div6').style.display = "none";
        document.getElementById('div7').style.display = "none";
    }

    function ada() {
        document.getElementById('div5').style.display = "block";
        document.getElementById('div6').style.display = "none";
    }

    function tidakada() {
        document.getElementById('div6').style.display = "block";
        document.getElementById('div5').style.display = "none";
    }
    </script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function(jQuery) {
        "use strict";
        jQuery("#customers-testimonials").owlCarousel({
            items: 3,
            margin: 10,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>',
            ],
        });
    });
    </script>
    <script type="text/javascript" src="js/active.js"></script>
    <script>
    $(document).ready(function() {
        $('.bar span').hide();
        $('#bar-five').animate({
            width: '75%'
        }, 1000);
        $('#bar-four').animate({
            width: '65%'
        }, 1000);
        $('#bar-three').animate({
            width: '30%'
        }, 1000);
        $('#bar-two').animate({
            width: '15%'
        }, 1000);
        $('#bar-one').animate({
            width: '20%'
        }, 1000);

        setTimeout(function() {
            $('.bar span').fadeIn('slow');
        }, 1000);

    });
    </script>
    <script>
    $(function() {
        $('#contact').click(function() {
            $('#contactForm').fadeToggle();
        })
        $(document).mouseup(function(e) {
            var container = $("#contactForm");

            if (!container.is(e.target) &&
                container.has(e.target).length === 0) {
                container.fadeOut();
            }
        });

    });
    </script>
    <script type="text/javascript">
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    });
    </script>
    <script>
    let toggles = document.getElementsByClassName("toggle");
    let contentDiv = document.getElementsByClassName("content");
    let icons = document.getElementsByClassName("icon");
    for (let i = 0; i < toggles.length; i++) {
        toggles[i].addEventListener("click", () => {
            if (parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight) {
                contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
                toggles[i].style.color = "red";
                icons[i].classList.remove("fa-plus");
                icons[i].classList.add("fa-times");
            } else {
                contentDiv[i].style.height = "0px";
                toggles[i].style.color = "#111130";
                icons[i].classList.remove("fa-times");
                icons[i].classList.add("fa-plus");
            }

            for (let j = 0; j < contentDiv.length; j++) {
                if (j !== i) {
                    contentDiv[j].style.height = 0;
                    toggles[j].style.color = "#111130";
                    icons[j].classList.remove("fa-times");
                    icons[j].classList.add("fa-plus");
                }
            }
        });
    }
    </script>
</body>

</html>