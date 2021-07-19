<?php
session_start();
if (isset($_COOKIE["login"])) {
    if ($_COOKIE["login"] == "true") {
        $_SESSION["masuk_hoster"] == true;
    }
}
if (!isset($_SESSION["masuk_hoster"])) {
    header("Location: login-signup.php");
}
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BransKuy | My Dashboard</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script type="text/javascript" src="js/all.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <!-- start nav -->
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
    <!-- end nav -->

    <div class="container">
        <div class="container-atas">
            <div class="header-profile">
                <div class="profile-kiri-atas">
                    <div class="foto-profile">
                        <?php
if ($_SESSION["foto_logo"] != null) {
    echo
        '<img src="img/' . $_SESSION['foto_logo'] . '" alt="avatar">';
} else {
    echo '<img src="img/profile.png" alt=""avatar>';
}
?>
                    </div>
                    <div class="profile-title">
                        <h4 class="nama"><?php echo $_SESSION["full_name"]; ?></h4>
                        <p class="username"><?php echo "@" . $_SESSION["username"]; ?></p>
                    </div>
                </div>
                <div class="profile-kanan-atas">
                    <div class="user-hoster">
                        <p>You're a hoster</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-bawah">
            <div class="profile-kiri">
                <div class="profile-nav" id="desc-nav">
                    <div onclick="account()" class="tombol aktif">
                        <i class="fas fa-user"></i>
                        <p>Account</p>
                    </div>
                    <hr>
                    <div onclick="chat()" class="tombol">
                        <i class="fas fa-comment-dots"></i>
                        <p>Chat</p>
                    </div>
                    <hr>
                    <!-- <div onclick="history()" class="tombol">
                        <i class="fas fa-bell"></i>
                        <p>Notifications</p>
                    </div>
                    <hr> -->
                    <div onclick="package()" class="tombol">
                        <i class="fas fa-suitcase"></i>
                        <p>Package</p>
                    </div>
                    <hr>
                    <div onclick="togglePopup()" class="tombol-keluar">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </div>
                </div>
            </div>
            <div class="profile-kanan">
                <a href="tambahpaket.php">
                    <div class="logo-tambah" title="Tambah Paket">
                        <i class="fas fa-plus"></i>
                    </div>
                </a>
                <div id="account">
                    <div class="account">
                        <div class="account-header">
                            <h5>Your account information</h5>
                            <a href="#">
                                <button>
                                    <i class="fas fa-edit"></i>
                                    <p>Edit Profile</p>
                                </button>
                            </a>
                        </div>
                        <form action="" class="form">
                            <div class="account-container">
                                <div class="logo">
                                    <i class="fas fa-user"></i>
                                </div>
                                <h5><?php echo $_SESSION["full_name"]; ?></h5>
                            </div>
                            <div class="account-container">
                                <div class="logo">
                                    <i class="fas fa-at"></i>
                                </div>
                                <h5><?php echo "@" . $_SESSION["username"]; ?></h5>
                            </div>
                            <div class="account-container">
                                <div class="logo">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <h5><?php
if ($_SESSION["email"] == null) {
    echo "none";
} else {
    echo $_SESSION["email"];
}
?></h5>
                            </div>
                            <div class="account-container">
                                <div class="logo">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <h5><?php
if ($_SESSION["phone"] == null) {
    echo "none";
} else {
    echo $_SESSION["phone"];
}
?></h5>
                            </div>
                            <div class="account-container">
                                <div class="logo">
                                    <i class="fas fa-unlock-alt"></i>
                                </div>
                                <?php echo
'<input type="password" value="' . $_SESSION["password"] . '">'
?>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="chat">
                    <div class="chat">
                        <div class="chat-kiri">
                            <div class="chat-search">
                                <div class="chat-search-box">
                                    <input type="search" placeholder="Cari chat">
                                    <button class="icon">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="chat-column">
                                <div class="chat-profile">
                                    <img src="img/profile.png" alt="">
                                    <div class="profile-title">
                                        <div class="profile-chat-flex">
                                            <h6>Ini User</h6>
                                            <p>21 Mei 2021</p>
                                        </div>
                                        <h6 class="hoster-chat">User</h6>
                                        <div class="isi-chat">
                                            <p>Hai, bagaimana cara memesan paket perjalanan?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-profile">
                                    <img src="img/profile.png" alt="">
                                    <div class="profile-title">
                                        <div class="profile-chat-flex">
                                            <h6>Ini User</h6>
                                            <p>21 Mei 2021</p>
                                        </div>
                                        <h6 class="hoster-chat">User</h6>
                                        <div class="isi-chat">
                                            <p>Hai, bagaimana cara memesan paket perjalanan?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-profile">
                                    <img src="img/profile.png" alt="">
                                    <div class="profile-title">
                                        <div class="profile-chat-flex">
                                            <h6>Ini User</h6>
                                            <p>21 Mei 2021</p>
                                        </div>
                                        <h6 class="hoster-chat">User</h6>
                                        <div class="isi-chat">
                                            <p>Hai, bagaimana cara memesan paket perjalanan?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-profile">
                                    <img src="img/profile.png" alt="">
                                    <div class="profile-title">
                                        <div class="profile-chat-flex">
                                            <h6>Ini User</h6>
                                            <p>21 Mei 2021</p>
                                        </div>
                                        <h6 class="hoster-chat">User</h6>
                                        <div class="isi-chat">
                                            <p>Hai, bagaimana cara memesan paket perjalanan?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-profile">
                                    <img src="img/profile.png" alt="">
                                    <div class="profile-title">
                                        <div class="profile-chat-flex">
                                            <h6>Ini User</h6>
                                            <p>21 Mei 2021</p>
                                        </div>
                                        <h6 class="hoster-chat">User</h6>
                                        <div class="isi-chat">
                                            <p>Hai, bagaimana cara memesan paket perjalanan?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-kanan">
                            <div class="chat-default">
                                <i class="fas fa-comment-slash"></i>
                                <p>Mulai obrolan dengan hoster</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="history">
                    <div class="history-header">
                        <div class="cari-tagihan">
                            <input type="text" placeholder="Cari history">
                            <button class="icon">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="history-kanan" id="tagihan-nav">
                            <p onclick="semua()" class="tomboll aktiff">Semua</p>
                            <p onclick="belumLunas()" class="tomboll">Belum lunas</p>
                            <p onclick="sudahLunas()" class="tomboll">Sudah lunas</p>
                        </div>
                    </div>
                    <hr>
                    <div class="history-container" id="semua">
                        <ul>
                            <li>
                                <div class="tagihan-content">
                                    <div class="content-header">
                                        <h5>Menunggu Pembayaran</h5>
                                        <p>Batalkan Pembayaran</p>
                                    </div>
                                    <hr class="pembatas-content">
                                    <div class="flex-content">
                                        <div class="kiri">
                                            <table>
                                                <tr>
                                                    <td>Destinasi</td>
                                                    <td>: <strong>Pendakian Gunung Semeru</strong> </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td>: <strong>4 orang</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pembayaran</td>
                                                    <td>: <strong>21 April 2021</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Metode Pembayaran</td>
                                                    <td>: <strong>BCA</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Virtual Account</td>
                                                    <td>: <strong>12345678910</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="kanan">
                                            <button id="button" onclick="caraPembayaran()">Cara Pembayaran</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tagihan-content">
                                    <h5>Pembayaran Selesai</h5>
                                    <hr class="pembatas-content">
                                    <div class="flex-content">
                                        <div class="kiri">
                                            <table>
                                                <tr>
                                                    <td>Destinasi</td>
                                                    <td>: <strong>Pendakian Gunung Semeru</strong> </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td>: <strong>4 orang</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pembayaran</td>
                                                    <td>: <strong>21 April 2021</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Metode Pembayaran</td>
                                                    <td>: <strong>BCA</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Virtual Account</td>
                                                    <td>: <strong>12345678910</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="kanan">
                                            <button onclick="selesai()">Selesai</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="history-container" id="belumLunas">
                        <ul>
                            <li>
                                <div class="tagihan-content">
                                    <div class="content-header">
                                        <h5>Menunggu Pembayaran</h5>
                                        <p>Batalkan Pembayaran</p>
                                    </div>
                                    <hr class="pembatas-content">
                                    <div class="flex-content">
                                        <div class="kiri">
                                            <table>
                                                <tr>
                                                    <td>Destinasi</td>
                                                    <td>: <strong>Pendakian Gunung Semeru</strong> </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td>: <strong>4 orang</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pembayaran</td>
                                                    <td>: <strong>21 April 2021</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Metode Pembayaran</td>
                                                    <td>: <strong>BCA</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Virtual Account</td>
                                                    <td>: <strong>12345678910</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="kanan">
                                            <button>Cara Pembayaran</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tagihan-content">
                                    <div class="content-header">
                                        <h5>Menunggu Pembayaran</h5>
                                        <p>Batalkan Pembayaran</p>
                                    </div>
                                    <hr class="pembatas-content">
                                    <div class="flex-content">
                                        <div class="kiri">
                                            <table>
                                                <tr>
                                                    <td>Destinasi</td>
                                                    <td>: <strong>Pendakian Gunung Semeru</strong> </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td>: <strong>4 orang</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pembayaran</td>
                                                    <td>: <strong>21 April 2021</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Metode Pembayaran</td>
                                                    <td>: <strong>BCA</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Virtual Account</td>
                                                    <td>: <strong>12345678910</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="kanan">
                                            <button>Cara Pembayaran</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tagihan-content">
                                    <div class="content-header">
                                        <h5>Menunggu Pembayaran</h5>
                                        <p>Batalkan Pembayaran</p>
                                    </div>
                                    <hr class="pembatas-content">
                                    <div class="flex-content">
                                        <div class="kiri">
                                            <table>
                                                <tr>
                                                    <td>Destinasi</td>
                                                    <td>: <strong>Pendakian Gunung Semeru</strong> </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td>: <strong>4 orang</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pembayaran</td>
                                                    <td>: <strong>21 April 2021</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Metode Pembayaran</td>
                                                    <td>: <strong>BCA</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Virtual Account</td>
                                                    <td>: <strong>12345678910</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="kanan">
                                            <button>Cara Pembayaran</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="history-container" id="sudahLunas">
                        <ul>
                            <li>
                                <div class="tagihan-content">
                                    <h5>Pembayaran Selesai</h5>
                                    <hr class="pembatas-content">
                                    <div class="flex-content">
                                        <div class="kiri">
                                            <table>
                                                <tr>
                                                    <td>Destinasi</td>
                                                    <td>: <strong>Pendakian Gunung Semeru</strong> </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td>: <strong>4 orang</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pembayaran</td>
                                                    <td>: <strong>21 April 2021</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Metode Pembayaran</td>
                                                    <td>: <strong>BCA</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Virtual Account</td>
                                                    <td>: <strong>12345678910</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="kanan">
                                            <button>Selesai</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tagihan-content">
                                    <h5>Pembayaran Selesai</h5>
                                    <hr class="pembatas-content">
                                    <div class="flex-content">
                                        <div class="kiri">
                                            <table>
                                                <tr>
                                                    <td>Destinasi</td>
                                                    <td>: <strong>Pendakian Gunung Semeru</strong> </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td>: <strong>4 orang</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pembayaran</td>
                                                    <td>: <strong>21 April 2021</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Metode Pembayaran</td>
                                                    <td>: <strong>BCA</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Virtual Account</td>
                                                    <td>: <strong>12345678910</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="kanan">
                                            <button>Selesai</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tagihan-content">
                                    <h5>Pembayaran Selesai</h5>
                                    <hr class="pembatas-content">
                                    <div class="flex-content">
                                        <div class="kiri">
                                            <table>
                                                <tr>
                                                    <td>Destinasi</td>
                                                    <td>: <strong>Pendakian Gunung Semeru</strong> </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td>: <strong>4 orang</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pembayaran</td>
                                                    <td>: <strong>21 April 2021</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Metode Pembayaran</td>
                                                    <td>: <strong>BCA</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Virtual Account</td>
                                                    <td>: <strong>12345678910</strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="kanan">
                                            <button>Selesai</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="package">
                    <div class="history-header">
                        <div class="cari-tagihan">
                            <input type="text" placeholder="Cari paket">
                            <button class="icon">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="package-kanan">
                            <a href="tambahpaket.php">
                                <button>
                                    <i class="fas fa-plus-square"></i>
                                    <p>Create Package</p>
                                </button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="travel">
                        <?php
$id = $_SESSION["id_hoster"];
$paketData = query("SELECT * FROM paket WHERE id_hoster=$id");
foreach ($paketData as $rowPaket): ?>
                        <div class="content-travel">
                            <a name="id_payment" href="travel.php?id_paket=<?php echo $rowPaket["id_paket"]; ?>">
                                <div class="stiker-setting">
                                    <i class="fas fa-ellipsis-h"></i>
                                </div>
                                <img src="img/foto travel/<?php echo $rowPaket["foto_utama"]; ?>" alt="">
                                <div class="title-travel">
                                    <h5 class="title"><?php echo $rowPaket["judul"]; ?></h5>
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star unchecked"></span>
                                    </div>
                                    <h5 class="hoster"><?php echo $rowPaket["nama_hoster"]; ?></h5>
                                    <h5 class="harga">Rp.<?php echo $rowPaket["harga"]; ?></h5>
                                </div>
                            </a>
                        </div>
                        <?php endforeach;?>
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


    <!-- start popup -->

    <div class="popup" id="logout">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup()">
                <i class="fas fa-times"></i>
            </div>
            <div class="popup-content">
                <p>Are you sure want to logout?</p>
                <div class="tombol-popup">
                    <a href="logout.php">
                        <button class="yes">Yes</button>
                    </a>
                    <button class="cancel" onclick="togglePopup()">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="payment">
        <div class="overlay"></div>
        <div class="content-payment">
            <div class="close-btn" onclick="payment()">
                <i class="fas fa-times"></i>
            </div>
            <!-- step 1 -->
            <!-- <div class="popup-content">
                <h6>Pilih metode pembayaran</h6>
                <div class="payment">
                    <div class="payment-container">
                        <div class="payment-kiri">
                            <img src="img/bni.svg" style="width: 48px; height: 35px;" alt="">
                            <p>Tranfer Bank BNI</p>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="payment">
                    <div class="payment-container">
                        <div class="payment-kiri">
                            <img src="img/mandiri.svg" style="width: 48px; height: 35px;" alt="">
                            <p>Tranfer Bank Mandiri</p>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="payment">
                    <div class="payment-container">
                        <div class="payment-kiri">
                            <img src="img/bri.svg" style="width: 48px; height: 28px;" alt="">
                            <p>Tranfer Bank BRI</p>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
                <div class="payment">
                    <div class="payment-container">
                        <div class="payment-kiri">
                            <img src="img/bca.svg" style="width: 46px; height: 28px;" alt="">
                            <p>Tranfer Bank BCA</p>
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div> -->
            <!-- step 2 -->
            <!-- <div class="popup-content">
                <h6>Pembayaran</h6>
                <div class="detail">
                    <div class="detail-container">
                        <div class="detail-kiri">
                            <p>Total tagihan</p>
                            <p class="harga">Rp1.900.000</p>
                        </div>
                        <div class="detail-btn">
                            <button onclick="myFunction()" id="myBtn">DETAIL</button>
                        </div>
                    </div>
                    <span id="dots"></span>
                    <div id="more">
                        <div class="detail-more">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. At asperiores
                                porro dolores quidem dolorum deleniti consequatur maxime minima
                                accusantium. Enim laborum suscipit quos modi qui facilis nesciunt
                                explicabo dignissimos mollitia.
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum ipsam consectetur eum,
                                consequatur a praesentium veritatis, ut beatae aliquid delectus rerum fugit excepturi
                                vero nihil omnis, rem labore iusto laboriosam?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="payment-container">
                    <p>BCA Virtual Account</p>
                    <img src="img/bca.svg" style="width: 46px; height: 28px;" alt="">
                </div>
                <ul>
                    <li>Transaksi ini akan otomatis menggantikan tagihan
                        BCA Virtual Account yang belum dibayar.</li>
                    <li>Dapatkan kode pembayaran setelah klik “Bayar”.</li>
                </ul>
                <div class="tombol-detail-popup">
                    <button>Kembali</button>
                    <button><a href="">Bayar</a></button>
                </div>
            </div> -->
            <!-- step 3 -->
            <div class="popup-content">
                <h6>Pembayaran</h6>
                <div class="payment-container">
                    <p>BCA Virtual Account</p>
                    <img src="img/bca.svg" style="width: 46px; height: 28px;" alt="">
                </div>
                <div class="detail-2">
                    <div class="detail-container-2">
                        <div class="detail-kiri">
                            <p>Nomor Virtual Account</p>
                            <p class="harga">12312312345678999666</p>
                        </div>
                        <button class="btn-copy">Copy</button>
                    </div>
                    <div class="detail-container-2">
                        <div class="detail-kiri">
                            <p>Total biaya</p>
                            <p class="harga">Rp1.900.000</p>
                        </div>
                        <div class="detail-btn">
                            <button onclick="myFunction()" id="myBtn">DETAIL</button>
                        </div>
                    </div>
                    <span id="dots"></span>
                    <div id="more">
                        <div class="detail-more">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. At asperiores
                                porro dolores quidem dolorum deleniti consequatur maxime minima
                                accusantium. Enim laborum suscipit quos modi qui facilis nesciunt
                                explicabo dignissimos mollitia.
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum ipsam consectetur eum,
                                consequatur a praesentium veritatis, ut beatae aliquid delectus rerum fugit excepturi
                                vero nihil omnis, rem labore iusto laboriosam?
                            </p>
                        </div>
                    </div>
                    <div class="detail-kiri">
                        <p>Batas Akhir Pembayaran</p>
                        <p class="harga">Kamis, 1 April 2021, 23:55</p>
                    </div>
                    <div class="tombol-detail-popup">
                        <button>Kembali</button>
                        <button><a href="">Cek Pembayaran</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "DETAIL";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
    </script>
    <div class="popup" id="caraPembayaran">
        <div class="overlay"></div>
        <div class="content-caraPembayaran">
            <div class="close-btn" onclick="caraPembayaran()">
                <i class="fas fa-times"></i>
            </div>
            <div class="cara-content">
                <div class="pembayaran-center">
                    <h5>Tata cara pembayaran</h5>
                    <img src="img/bca.svg" alt="logo pembayaran" style="width: 128px; margin: 5px 0;">
                    <p>Nomor Virtual Account</p>
                    <br>
                    <p>Nomor Virtual Account : <strong>12345678910</strong></p>
                    <p>Jumlah Pembayaran : <strong>Rp.1.900.000</strong></p>
                    <br>
                </div>
                <div class="pembayaran-container">
                    <div class="pembayaran-navbar" id="pembayaran-navbar">
                        <p class="tombol-nav aktifff">ATM BCA</p>
                        <p class="tombol-nav">m-BCA</p>
                        <p class="tombol-nav">Internet Banking</p>
                        <p class="tombol-nav">Kantor Bank BCA</p>
                    </div>
                    <hr>
                    <div class="pembayaran-atm">
                        <ol>
                            <li>Masukkan Kartu ATM BCA & PIN</li>
                            <li>Pilih menu Transaksi Lainnya > Transfer > ke Rekening BCA Virtual Account</li>
                            <li>Masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang terdaftar
                                di akun Tokopedia Anda (Contoh: 80777100152781934)</li>
                            <li>Di halaman konfirmasi, pastikan detil pembayaran sudah sesuai seperti No VA, Nama,
                                Perus/Produk
                                dan Total Tagihan</li>
                            <li>Masukkan Jumlah Transfer sesuai dengan Total Tagihan</li>
                            <li>Ikuti instruksi untuk menyelesaikan transaksi</li>
                            <li>Simpan struk transaksi sebagai bukti pembayaran</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="selesai">
        <div class="overlay"></div>
        <div class="content-caraPembayaran">
            <div class="close-btn" onclick="selesai()">
                <i class="fas fa-times"></i>
            </div>
            <div class="cara-content">
                <div class="pembayaran-center">
                    <h5>Pembayaran Selesai</h5>
                    <img src="img/bca.svg" alt="logo pembayaran" style="width: 128px; margin: 5px 0;">
                    <p>Virtual Account BCA</p>
                    <br>
                    <p>Nomor Virtual Account : <strong>12345678910</strong></p>
                    <p>Jumlah Pembayaran : <strong>Rp.1.900.000</strong></p>
                </div>
                <hr>
                <div class="pembayaran-center">
                    <h5>Pembayaran anda telah selesai di konfirmasi</h5>
                    <p>Silahkan masuk grup yang telah ditentukan pada link di bawah</p>
                    <a href="" target="_blank">
                        <p>https://Whatsappgrup.com</p>
                    </a>
                    <i class="fas fa-arrow-up"></i>
                    <h4>KLIK LINK DI ATAS</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- end popup -->
    <script type="text/javascript">
    function togglePopup() {
        document.getElementById("logout").classList.toggle("active");
    }

    function payment() {
        document.getElementById("payment").classList.toggle("active");
    }

    function caraPembayaran() {
        document.getElementById("caraPembayaran").classList.toggle("active");
    }

    function selesai() {
        document.getElementById("selesai").classList.toggle("active");
    }
    </script>
    <!-- script back to top -->
    <script type="text/javascript" src="js/back-to-top.js"></script>
    <script>
    function account() {
        document.getElementById('account').style.display = "block";
        document.getElementById('history').style.display = "none";
        document.getElementById('package').style.display = "none";
        document.getElementById('chat').style.display = "none";
    }

    function chat() {
        document.getElementById('chat').style.display = "block";
        document.getElementById('history').style.display = "none";
        document.getElementById('account').style.display = "none";
        document.getElementById('cart').style.display = "none";
        document.getElementById('bookmark').style.display = "none";
    }

    function history() {
        document.getElementById('history').style.display = "block";
        document.getElementById('package').style.display = "none";
        document.getElementById('account').style.display = "none";
        document.getElementById('chat').style.display = "none";
    }

    function package() {
        document.getElementById('package').style.display = "block";
        document.getElementById('account').style.display = "none";
        document.getElementById('history').style.display = "none";
        document.getElementById('chat').style.display = "none";
    }

    function semua() {
        document.getElementById('semua').style.display = "block";
        document.getElementById('belumLunas').style.display = "none";
        document.getElementById('sudahLunas').style.display = "none";
    }

    function belumLunas() {
        document.getElementById('belumLunas').style.display = "block";
        document.getElementById('sudahLunas').style.display = "none";
        document.getElementById('semua').style.display = "none";
    }

    function sudahLunas() {
        document.getElementById('sudahLunas').style.display = "block";
        document.getElementById('semua').style.display = "none";
        document.getElementById('belumLunas').style.display = "none";
    }
    </script>
    <script type="text/javascript" src="js/active.js"></script>
    <script type="text/javascript" src="js/number.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"],
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            [
                "Element",
                "Density", {
                    role: "style",
                },
            ],
            ["Copper", 8.94, "#b87333"],
            ["Silver", 16.49, "silver"],
            ["Gold", 19.3, "gold"],
            ["Platinum", 21.45, "color: #e5e4e2"],
            ["Platinum", 21.45, "color: #e5e4e2"],
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([
            0,
            1, {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation",
            },
            2,
        ]);

        var options = {
            title: "Density of Precious Metals, in g/cm^3",
            width: 600,
            height: 400,
            bar: {
                groupWidth: "95%",
            },
            legend: {
                position: "none",
            },
        };
        var chart = new google.visualization.ColumnChart(
            document.getElementById("columnchart_values")
        );
        chart.draw(view, options);
    }
    </script>
</body>

</html>