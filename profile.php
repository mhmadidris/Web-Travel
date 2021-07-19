<?php
session_start();
if (isset($_SESSION["login"])) {
    if ($_SESSION["login"] == "true") {
        $_SESSION["masuk_user"] == true;
    }
}
if (!isset($_SESSION["masuk_user"])) {
    header("Location: login-signup.php");
}
require 'config.php';
$bayar = query("SELECT * FROM payment");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BransKuy | My Profile</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script type="text/javascript" src="js/all.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <div class="body">
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
if ($_SESSION["foto"] != null) {
    echo
        '<img src="img/' . $_SESSION['foto'] . '" alt="avatar">';
} else {
    echo '<img src="img/profile.png" alt=""avatar>';
}
?>
                        </div>
                        <div class="profile-title">
                            <div class="nama">
                                <h4><?php echo $_SESSION["full_name"]; ?></h4>
                            </div>
                            <p class="username"><?php echo "@" . $_SESSION["username"]; ?></p>
                        </div>
                    </div>
                    <div class="profile-kanan-atas">
                        <!-- <div class="tombol-flex">
                        <button>
                            <i class="fas fa-comment-dots"></i>
                            Chat
                        </button>
                        <button>
                            <i class="fas fa-bell"></i>
                            Notifications
                        </button>
                    </div> -->
                        <div class="user-hoster">
                            <p>You're a user</p>
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
                        <div onclick="history()" class="tombol">
                            <i class="fas fa-history"></i>
                            <p>History</p>
                        </div>
                        <hr>
                        <div onclick="cart()" class="tombol">
                            <i class="fas fa-shopping-cart"></i>
                            <p>Cart</p>
                        </div>
                        <hr>
                        <div onclick="bookmark()" class="tombol">
                            <i class="fas fa-bookmark"></i>
                            <p>Bookmark</p>
                        </div>
                        <hr>
                        <div onclick="togglePopup()" class="tombol-keluar">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </div>
                    </div>
                </div>
                <div class="profile-kanan">
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
                                    <h5>
                                        <?php
if ($_SESSION["phone"] == null) {
    echo "none";
} else {
    echo $_SESSION["phone"];
}
?>
                                    </h5>
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
                                                <h6>Shelter Garut</h6>
                                                <p>21 Mei 2021</p>
                                            </div>
                                            <h6 class="hoster-chat">Hoster</h6>
                                            <div class="isi-chat">
                                                <p>Hai, bagaimana cara memesan paket perjalanan?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-profile">
                                        <img src="img/profile.png" alt="">
                                        <div class="profile-title">
                                            <div class="profile-chat-flex">
                                                <h6>Shelter Garut</h6>
                                                <p>21 Mei 2021</p>
                                            </div>
                                            <h6 class="hoster-chat">Hoster</h6>
                                            <div class="isi-chat">
                                                <p>Hai, bagaimana cara memesan paket perjalanan?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-profile">
                                        <img src="img/profile.png" alt="">
                                        <div class="profile-title">
                                            <div class="profile-chat-flex">
                                                <h6>Shelter Garut</h6>
                                                <p>21 Mei 2021</p>
                                            </div>
                                            <h6 class="hoster-chat">Hoster</h6>
                                            <div class="isi-chat">
                                                <p>Hai, bagaimana cara memesan paket perjalanan?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-profile">
                                        <img src="img/profile.png" alt="">
                                        <div class="profile-title">
                                            <div class="profile-chat-flex">
                                                <h6>Shelter Garut</h6>
                                                <p>21 Mei 2021</p>
                                            </div>
                                            <h6 class="hoster-chat">Hoster</h6>
                                            <div class="isi-chat">
                                                <p>Hai, bagaimana cara memesan paket perjalanan?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-profile">
                                        <img src="img/profile.png" alt="">
                                        <div class="profile-title">
                                            <div class="profile-chat-flex">
                                                <h6>Shelter Garut</h6>
                                                <p>21 Mei 2021</p>
                                            </div>
                                            <h6 class="hoster-chat">Hoster</h6>
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
                                <input type="search" placeholder="Cari history">
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
                                <?php
$id = $_SESSION["id_users"];
$transaksi = query("SELECT * FROM transaksi
INNER JOIN payment ON transaksi.id_payment = payment.id_payment
INNER JOIN pemesanan ON pemesanan.id_pesan = transaksi.id_pesan
INNER JOIN paket ON paket.id_paket = pemesanan.id_paket
WHERE id_users = '$id' AND status = 'Belum'");
foreach ($transaksi as $rowTransaksi):
    if ($transaksi != null) {
        ?>
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
                                                        <td>: <strong><?php echo $rowTransaksi['judul'] ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah</td>
                                                        <td>: <strong>1 orang</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Pembayaran</td>
                                                        <td>: <strong><?php
    $oDate = strtotime($rowTransaksi['tanggal_transaksi']);
        $sDate = date("d F Y", $oDate);
        echo $sDate;?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Metode Pembayaran</td>
                                                        <td>: <strong><?php echo $rowTransaksi['metode']; ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Virtual Account</td>
                                                        <td>:
                                                            <strong><?php echo $rowTransaksi['no_rekening']; ?></strong>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="kanan">
                                                <button id="button" onclick="caraPembayaran()">Cara Pembayaran</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php }?>
                                <?php endforeach;?>
                                <?php
$id = $_SESSION["id_users"];
$transaksi = query("SELECT * FROM transaksi
INNER JOIN payment ON transaksi.id_payment = payment.id_payment
INNER JOIN pemesanan ON pemesanan.id_pesan = transaksi.id_pesan
INNER JOIN paket ON paket.id_paket = pemesanan.id_paket
WHERE id_users = '$id' AND status = 'Sukses'");
if ($transaksi != null) {
    foreach ($transaksi as $rowTransaksi): ?>
                                <li>
                                    <div class="tagihan-content">
                                        <h5>Pembayaran Selesai</h5>
                                        <hr class="pembatas-content">
                                        <div class="flex-content">
                                            <div class="kiri">
                                                <table>
                                                    <tr>
                                                        <td>Destinasi</td>
                                                        <td>: <strong><?php echo $rowTransaksi['judul']; ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah</td>
                                                        <td>: <strong>1 orang</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Pembayaran</td>
                                                        <td>: <strong><?php
$oDate = strtotime($rowTransaksi['tanggal_transaksi']);
    $sDate = date("d F Y", $oDate);
    echo $sDate;?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Metode Pembayaran</td>
                                                        <td>: <strong><?php echo $rowTransaksi['metode']; ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Virtual Account</td>
                                                        <td>:
                                                            <strong><?php echo $rowTransaksi['no_rekening']; ?></strong>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="kanan">
                                                <button onclick="selesai()">Selesai</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;
}?>
                            </ul>
                        </div>
                        <div class="history-container" id="belumLunas">
                            <ul>
                                <?php
$id = $_SESSION["id_users"];
$transaksi = query("SELECT * FROM transaksi
INNER JOIN payment ON transaksi.id_payment = payment.id_payment
INNER JOIN pemesanan ON pemesanan.id_pesan = transaksi.id_pesan
INNER JOIN paket ON paket.id_paket = pemesanan.id_paket
WHERE id_users = '$id' AND status = 'Belum'");
if ($transaksi != null) {
    foreach ($transaksi as $rowTransaksi): ?>
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
                                                        <td>: <strong><?php echo $rowTransaksi['judul']; ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah</td>
                                                        <td>: <strong>1 orang</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Pembayaran</td>
                                                        <td>: <strong><?php
$oDate = strtotime($rowTransaksi['tanggal_transaksi']);
    $sDate = date("d F Y", $oDate);
    echo $sDate;?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Metode Pembayaran</td>
                                                        <td>: <strong><?php echo $rowTransaksi['metode']; ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Virtual Account</td>
                                                        <td>:
                                                            <strong><?php echo $rowTransaksi['no_rekening']; ?></strong>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="kanan">
                                                <button>Cara Pembayaran</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;
}?>
                                <?php if ($transaksi == null) {
    echo '
                                <div class="kiri-content-null">
                                <i class="fas fa-map-marked-alt"></i>
                                <h5>Maaf, anda belum memesan paket!!!</h5>
                                </div>';
}?>
                            </ul>
                        </div>
                        <div class="history-container" id="sudahLunas">
                            <ul>
                                <?php
$id = $_SESSION["id_users"];
$transaksi = query("SELECT * FROM transaksi
INNER JOIN payment ON transaksi.id_payment = payment.id_payment
INNER JOIN pemesanan ON pemesanan.id_pesan = transaksi.id_pesan
INNER JOIN paket ON paket.id_paket = pemesanan.id_paket
WHERE id_users = '$id' AND status = 'Sukses'");
if ($transaksi != null) {
    foreach ($transaksi as $rowTransaksi): ?>
                                <li>
                                    <div class="tagihan-content">
                                        <h5>Pembayaran Selesai</h5>
                                        <hr class="pembatas-content">
                                        <div class="flex-content">
                                            <div class="kiri">
                                                <table>
                                                    <tr>
                                                        <td>Destinasi</td>
                                                        <td>: <strong><?php echo $rowTransaksi['judul']; ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah</td>
                                                        <td>: <strong>1 orang</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Pembayaran</td>
                                                        <td>: <strong><?php
$oDate = strtotime($rowTransaksi['tanggal_transaksi']);
    $sDate = date("d F Y", $oDate);
    echo $sDate;?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Metode Pembayaran</td>
                                                        <td>: <strong><?php echo $rowTransaksi['metode']; ?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Virtual Account</td>
                                                        <td>:
                                                            <strong><?php echo $rowTransaksi['no_rekening']; ?></strong>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="kanan">
                                                <button>Selesai</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;
}?>
                                <?php if ($transaksi == null) {
    echo '
                                <div class="kiri-content-null">
                                <i class="fas fa-map-marked-alt"></i>
                                <h5>Maaf, anda belum memesan paket!!!</h5>
                                </div>';
}?>
                            </ul>
                        </div>
                    </div>
                    <div id="cart">
                        <div class="cart">
                            <div class="cart-kiri">
                                <?php
$id = $_SESSION["id_users"];
$pemesanan = query("SELECT * FROM pemesanan INNER JOIN paket
ON pemesanan.id_paket = paket.id_paket WHERE id_users=$id");
foreach ($pemesanan as $rowPemesanan):
?>
                                <?php if ($rowPemesanan > 0): ?>
                                <div class="kiri-content">
                                    <img src="img/foto travel/<?php echo $rowPemesanan["foto_utama"]; ?>" alt="">
                                    <div class="kiri-content-title">
                                        <p class="judul"><?php echo $rowPemesanan["judul"]; ?></p>
                                        <p class="hoster">Shelter Garut</p>
                                        <p class="harga">Rp.<?php echo $rowPemesanan["harga"]; ?></p>
                                        <div class="travel-detail">
                                            <ol>
                                                <li>
                                                    <div class="box-flex">
                                                        <div class="travel-peserta">
                                                            <p>
                                                                <?php echo $rowPemesanan["nama_belakang"]; ?>
                                                                <?php echo $rowPemesanan["nama_depan"]; ?>
                                                            </p>
                                                        </div>
                                                        <p><?php echo $rowPemesanan["jenis_kelamin"]; ?></p>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="flex-cart-kiri">
                                            <p>Move to bookmark</p>
                                            <hr class="pembatas-vertikal">
                                            <a href="delete.php?id=<?php echo $rowPemesanan['id_pesan']; ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php endif;?>
                                <?php endforeach;?>
                                <?php if ($pemesanan == null) {
    echo '
                                <div class="kiri-content-null">
                                <i class="fas fa-map-marked-alt"></i>
                                <h5>Maaf, anda belum memesan paket!!!</h5>
                                </div>';
}?>

                            </div>
                            <div class="cart-kanan">
                                <div class="cart-kanan-content">
                                    <input type="text" placeholder="Masukkan kode promo">
                                </div>
                                <hr class="cart-kanan-pembatas">
                                <div class="rincian-content">
                                    <p>Total harga:</p>
                                    <p>Rp.200.000</p>
                                </div>
                                <div class="rincian-content">
                                    <p>Total diskon:</p>
                                    <p>-Rp.100.000</p>
                                </div>
                                <hr class="cart-kanan-pembatas">
                                <div class="rincian-content">
                                    <p>Total biaya:</p>
                                    <p class="total">Rp.200.000</p>
                                </div>
                                <div class="cart-tombol">
                                    <button onclick="payment()">
                                        <i class="fas fa-money-bill-wave-alt"
                                            style="margin: 0px 2.5px; font-size: 18px;"></i>
                                        Payment
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="bookmark">
                        <div class="travel">
                            <div class="content-travel">
                                <a href="">
                                    <div class="stiker-bookmark">
                                        <i class="fas fa-bookmark"></i>
                                    </div>
                                    <img src="img/jawa-barat-travel.jpeg" alt="">
                                    <div class="title-travel">
                                        <h5 class="title">Desa Cipta Gelar</h5>
                                        <div class="stars">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star unchecked"></span>
                                        </div>
                                        <h5 class="hoster">Shelter Garut</h5>
                                        <h5 class="harga">Rp.350.000</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="content-travel">
                                <a href="">
                                    <div class="stiker-bookmark">
                                        <i class="fas fa-bookmark"></i>
                                    </div>
                                    <img src="img/foto travel/semeru (1).jpg" alt="">
                                    <div class="title-travel">
                                        <h5 class="title">Pendakian Gunung Semeru</h5>
                                        <div class="stars">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star unchecked"></span>
                                        </div>
                                        <h5 class="hoster">Shelter Garut</h5>
                                        <h5 class="harga">Rp.900.000</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="content-travel">
                                <a href="">
                                    <div class="stiker-bookmark">
                                        <i class="fas fa-bookmark"></i>
                                    </div>
                                    <img src="img/baluran.jpg" alt="">
                                    <div class="title-travel">
                                        <h5 class="title">Baluran National Park</h5>
                                        <div class="stars">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star unchecked"></span>
                                        </div>
                                        <h5 class="hoster">Shelter Garut</h5>
                                        <h5 class="harga">Rp.870.000</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="content-travel">
                                <a href="">
                                    <div class="stiker-bookmark">
                                        <i class="fas fa-bookmark"></i>
                                    </div>
                                    <img src="img/madakaripura.jpg" alt="">
                                    <div class="title-travel">
                                        <h5 class="title">Air Terjun Madakaripura</h5>
                                        <div class="stars">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star unchecked"></span>
                                        </div>
                                        <h5 class="hoster">Shelter Garut</h5>
                                        <h5 class="harga">Rp.400.000</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="content-travel">
                                <a href="">
                                    <div class="stiker-bookmark">
                                        <i class="fas fa-bookmark"></i>
                                    </div>
                                    <img src="img/jawa-timur-bg.png" alt="">
                                    <div class="title-travel">
                                        <h5 class="title">Bromo Mountain</h5>
                                        <div class="stars">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star unchecked"></span>
                                        </div>
                                        <h5 class="hoster">Shelter Garut</h5>
                                        <h5 class="harga">Rp.900.000</h5>
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
        <?php
if (isset($_POST['bayar'])) {
    global $conn;
    $id_payment = $_POST['id_payment'];

    $checkbox1 = $_POST['idPaket'];
    $id_paket = ".";
    foreach ($checkbox1 as $chk1) {
        $id_paket .= $chk1 . $id_paket;
    }
//$id_payment = $_POST['id_payment'];
//$id_payment = $_POST['id_payment'];
    date_default_timezone_set("Asia/Jakarta");
    $date = date("Y/m/d H:i:s");
// $id_paket = $_GET['id_paket'];

    $transaksi = mysqli_query($conn, "INSERT INTO transaksi VALUES('', '$id_payment','$id_paket', 'Belum', '$date')");
    if ($transaksi) {
        echo "<script>alert('Pembayaran berhasil');</script>";
    } else {
        echo "<script>alert('Pembayaran gagal');</script>";
    }
}
// $date1 = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
// echo $date = format('d-m-Y H:i', $date1);
?>

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
                <form id="regForm" action="" method="post">
                    <div class="tab">
                        <div class="popup-content">
                            <h6>Pilih metode pembayaran</h6>
                            <input type="text" name="idPaket[]" style="display: none;"
                                value="<?php echo $rowPemesanan["id_pesan"]; ?>">
                            <?php foreach ($bayar as $rowPay): ?>
                            <a href="#id=<?php echo $rowPay["id_payment"]; ?>">
                                <input type="text" name="id_payment" style="display: none;"
                                    value="<?php echo $rowPay['id_payment']; ?>">
                                <div class="payment" onclick="nextPrev(1)">
                                    <div class="payment-container-metode">
                                        <div class="payment-kiri">
                                            <img src="img/<?php echo $rowPay["logo_bank"]; ?>" style="width: 2.5rem;"
                                                alt="" />
                                            <p><?php echo $rowPay["metode"]; ?></p>
                                        </div>
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="popup-content">
                            <h6>Pembayaran</h6>
                            <?php
// $url = 'http://www.geeksforgeeks.org?name=Tonny';

// // Use parse_url() function to parse the URL
// // and return an associative array which
// // contains its various components
// $url_components = parse_url($url);

// // Use parse_str() function to parse the
// // string passed via URL
// parse_str($url_components['query'], $params);

// // Display result
// echo ' Hi ' . $params['name'];
?>
                            <div class="detail">
                                <div class="detail-container">
                                    <div class="detail-kiri">
                                        <p>Total tagihan</p>
                                        <p class="harga">Rp1.900.000</p>
                                    </div>
                                    <div class="detail-btn">
                                        <div onclick="fungsi()" id="myBtn">DETAIL</div>
                                    </div>
                                </div>
                                <span id="dots"></span>
                                <div id="more">
                                    <div class="travel-detail">
                                        <ol>
                                            <?php
$id = $_SESSION["id_users"];
$pemesanan = query("SELECT * FROM pemesanan
INNER JOIN paket ON pemesanan.id_paket = paket.id_paket
WHERE id_users=$id");
foreach ($pemesanan as $rowPemesanan):
?>
                                            <li>
                                                <div class="box-flex">
                                                    <div class="travel-peserta">
                                                        <p><?php echo $rowPemesanan['judul'] ?></p>
                                                    </div>
                                                    <p>5</p>
                                                </div>
                                            </li>
                                            <?php endforeach;?>
                                            <!-- <li>
                                                <div class="box-flex">
                                                    <div class="travel-peserta">
                                                        <p>Baluran National Park</p>
                                                    </div>
                                                    <p>5</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-flex">
                                                    <div class="travel-peserta">
                                                        <p>Kawah Ijen</p>
                                                    </div>
                                                    <p>5</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-flex">
                                                    <div class="travel-peserta">
                                                        <p>Bromo Mountain</p>
                                                    </div>
                                                    <p>5</p>
                                                </div>
                                            </li> -->
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-container">
                                <p>BCA Virtual Account</p>
                                <img src="img/bca.svg" style="width: 46px; height: 28px" alt="" />
                            </div>
                            <ul>
                                <li>
                                    Transaksi ini akan otomatis menggantikan tagihan BCA Virtual Account yang belum
                                    dibayar.
                                </li>
                                <li>Dapatkan kode pembayaran setelah klik “Bayar”.</li>
                            </ul>
                            <div class="tombol-apa">
                                <button type="button" onclick="nextPrev(-1)">
                                    Kembali
                                </button>
                                <button type="submit" name="bayar" id="bayar" onclick="nextPrev(1)">
                                    Bayar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <div class="tab">
                    <div class="popup-content">
                        <h6>Pembayaran</h6>
                        <div class="payment-container">
                            <p>BCA Virtual Account</p>
                            <img src="img/bca.svg" style="width: 46px; height: 28px" alt="" />
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
                                    <button id="myBtn">DETAIL</button>
                                </div>
                            </div>
                            <span id="dots"></span>
                            <div id="more">
                                <div class="detail-more">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. At asperiores porro
                                        dolores quidem dolorum deleniti consequatur maxime minima accusantium. Enim
                                        laborum suscipit quos modi qui facilis nesciunt explicabo dignissimos
                                        mollitia. Lorem ipsum dolor
                                        sit, amet consectetur adipisicing elit. Ipsum ipsam consectetur eum,
                                        consequatur a praesentium veritatis, ut beatae aliquid delectus rerum fugit
                                        excepturi vero nihil omnis, rem labore iusto laboriosam?
                                    </p>
                                </div>
                            </div>
                            <div class="detail-kiri">
                                <p>Batas Akhir Pembayaran</p>
                                <p class="harga">Kamis, 1 April 2021, 23:55</p>
                            </div>
                            <div class="tombol-apa">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">
                                    Kembali
                                </button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">
                                    Cek Pembayaran
                                </button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div style="overflow: auto">
            <div style="float: right">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">
            Previous
          </button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div> -->
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align: center; margin-top: 40px" class="step-container">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </div>
        </div>
        <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == x.length - 1) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n);
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x,
                y,
                i,
                valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className +=
                    " finish";
            }
            return valid; // return the valid status
        }
        </script>
        <script>
        function fungsi() {
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
                                <li>Masukkan 5 angka kode perusahaan untuk BransKuy (80777) dan Nomor HP yang terdaftar
                                    di akun BransKuy Anda (Contoh: 80777100152781934)</li>
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
        document.getElementById('cart').style.display = "none";
        document.getElementById('bookmark').style.display = "none";
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
        document.getElementById('cart').style.display = "none";
        document.getElementById('account').style.display = "none";
        document.getElementById('bookmark').style.display = "none";
        document.getElementById('chat').style.display = "none";
    }

    function cart() {
        document.getElementById('cart').style.display = "block";
        document.getElementById('account').style.display = "none";
        document.getElementById('history').style.display = "none";
        document.getElementById('bookmark').style.display = "none";
        document.getElementById('chat').style.display = "none";
    }

    function bookmark() {
        document.getElementById('bookmark').style.display = "block";
        document.getElementById('account').style.display = "none";
        document.getElementById('history').style.display = "none";
        document.getElementById('cart').style.display = "none";
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
</body>

</html>