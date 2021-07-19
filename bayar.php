<?php
require 'config.php';
session_start();
global $conn;
$namaBelak = 'asasasas';
//$id_payment = $_POST['id_payment'];
//$id_payment = $_POST['id_payment'];
date_default_timezone_set("Asia/Jakarta");
$date = date("Y/m/d H:i:s");
// $id_paket = $_GET['id_paket'];

$transaksi = mysqli_query($conn, "INSERT INTO transaksi VALUES('', '1', '1', '$namaBelak', '$date')");
$referer = $_SERVER['HTTP_REFERER'];
if ($transaksi) {
    echo "<script>alert('Pembayaran berhasil');</script>";
    if (strpos($referer, '?') === false) {
        $referer .= "?";
    }

    header("Location: $referer&$errcode");
} else {
    echo "<script>alert('Pembayaran gagal');</script>";
}