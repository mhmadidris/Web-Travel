<?php
require 'config.php';
session_start();
global $conn;
$id_users = $_SESSION['id_users'];
$full_name = $_SESSION['full_name'];
$noKTP = $_POST['no_ktp'];
$namaBelakang = $_POST['namaBelakang'];
$namaDepan = $_POST['namaDepan'];
$jenisKelamin = $_POST['jenisKelamin'];
$email = $_POST['email'];
$noTelepon = $_POST['noTelepon'];
$tempatLahir = $_POST['tempatLahir'];
$tanggalLahir = $_POST['tanggalLahir'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];
$status = $_POST['status'];
$namaDarurat = $_POST['namaDarurat'];
$noTeleponDarurat = $_POST['noTeleponDarurat'];
$penyakit = $_POST['gender'];
$jenisPenyakit = $_POST['jenisPenyakit'];
$id_paket = $_POST['idPaket'];

$pesanPaket = mysqli_query($conn, "INSERT INTO pemesanan VALUES('', '$noKTP', '$namaBelakang', '$namaDepan', '$jenisKelamin', '$email', '$noTelepon', '$tempatLahir', '$tanggalLahir', '$pekerjaan', '$alamat', '$status', '$namaDarurat', '$noTeleponDarurat', '$penyakit', '$jenisPenyakit', '$id_users', '$full_name', '$id_paket')");

$referer = $_SERVER['HTTP_REFERER'];

if ($pesanPaket) {
    echo "<script>alert('Pemesanan berhasil');</script>";
    if (strpos($referer, '?') === false) {
        $referer .= "?";
    }

    header("Location: $referer&$errcode");
} else {
    echo "<script>alert('Pemesanan gagal');</script>";
}