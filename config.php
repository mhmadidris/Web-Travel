<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "branskuy";

$conn = mysqli_connect("$servername", "$username", "$password", "$dbname");
if (!$conn) {
    die('Database tidak terhubung' . mysqli_error());
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// registrasi untuk user
function registrasi()
{
    global $conn;
    // $gambar = $_POST['gambar'];
    $full_name = $_POST['fullName'];
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah terdaftar')</script>";
        return false;
    }

    if ($password != $cpassword) {
        echo "<script>alert('Password tidak sama');</script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $tambahuser = mysqli_query($conn, "INSERT INTO users VALUES('', '$full_name', '$username', '$password', '', '', '')");
    if ($tambahuser == 1) {
        echo "<script>alert('Registrasi berhasil')</script>";
    } else {
        echo "<script>alert('Registrasi gagal')</script>";
    }
    return mysqli_affected_rows($conn);
}

// registrasi untuk hoster
function registrasi_hoster()
{
    global $conn;
    $full_name = $_POST['fullname'];
    $username = strtolower(stripslashes($_POST['username']));
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipCode = $_POST['zipCode'];
    $idCard = $_POST['idCard'];
    $photo = $_POST['photo'];
    $bank = $_POST['bank'];
    $accountNumber = $_POST['accountNumber'];
    $accountBook = $_POST['accountBook'];

    $result = mysqli_query($conn, "SELECT username FROM hosters WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah terdaftar')</script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    $tambahHoster = mysqli_query($conn, "INSERT INTO hosters VALUES('', '$full_name', '$username', '$email', '$password', '$phoneNumber', '$address', '$country', '$city', '$province', '$zipCode', '$idCard', '$photo', '$bank', '$accountNumber', '$accountBook', '')");
    if ($tambahHoster == 1) {
        echo "<script>alert('Registrasi hoster berhasil')</script>";
    } else {
        echo "<script>alert('Registrasi hoster gagal')</script>";
    }
    return mysqli_affected_rows($conn);
}

// login
function ceklogin()
{
    global $conn;
    $username = $_POST["usernameLogin"];
    $password = $_POST["passwordLogin"];

    $cekuser = mysqli_query($conn, "SELECT * FROM users WHERE BINARY username='$username'");
    $cekuser1 = mysqli_query($conn, "SELECT * FROM hosters WHERE BINARY username='$username'");

    if (mysqli_num_rows($cekuser) === 1) {
        $hasil = mysqli_fetch_assoc($cekuser);

        if (password_verify($password, $hasil["password"])) {
            $_SESSION['id_users'] = $hasil["id_users"];
            $_SESSION["username"] = $hasil["username"];
            $_SESSION["email"] = $hasil["email"];
            $_SESSION["foto"] = $hasil["foto"];
            $_SESSION["phone"] = $hasil["phone"];
            $_SESSION["password"] = $password;
            $_SESSION["full_name"] = $hasil["full_name"];
            $_SESSION["masuk_user"] = true;

            if (isset($_POST["rememberMe"])) {
                setcookie("login", "true", time() + 30);
            } else {
                echo "Cookie belum dibuat";
            }
            header("Location: index.php");
        }
    } elseif (mysqli_num_rows($cekuser1) == 1) {
        $hasil = mysqli_fetch_assoc($cekuser1);

        if (password_verify($password, $hasil["password"])) {
            $_SESSION['id_hoster'] = $hasil["id_hoster"];
            $_SESSION["username"] = $hasil["username"];
            $_SESSION["email"] = $hasil["email"];
            $_SESSION["foto_logo"] = $hasil["foto_logo"];
            $_SESSION["phone"] = $hasil["phone"];
            $_SESSION["password"] = $password;
            $_SESSION["full_name"] = $hasil["full_name"];
            $_SESSION["masuk_hoster"] = true;

            if (isset($_POST["rememberMe"])) {
                setcookie("login", "true", time() + 30);
            } else {
                echo "Cookie belum dibuat";
            }
            header("Location: index.php");
        }
    }
}

// tambah paket
function tambah()
{
    global $conn;
    $fullName = $_SESSION['full_name'];
    $fotoUtama = $_POST['fotoUtama'];
    $judul = $_POST['judul'];
    $lokasi = $_POST['lokasi'];
    $lokasi_iframe = $_POST['lokasi_iframe'];
    $biaya = $_POST['biaya'];
    $provinsi = $_POST['provinsi'];
    $group = $_POST['group'];
    $kuota = $_POST['kuota'];
    $durasi = $_POST['durasi'];
    $date = $_POST['myrosterdate'];
    $meepo = implode('. ', $_POST['meepo']);
    $jadwal_input = implode('. ', $_POST['jadwal']);
    $jadwal_input_text = implode('. ', $_POST['jadwal_text']);
    $targetDir = "img/foto travel";
    $image = $_POST['file'];
    $fotoTambahan = implode(", ", $image);
    foreach ($image as $key => $val) {
        $targetFilePath = $targetDir . $val;
        move_uploaded_file($_POST['file'][$key], $targetFilePath);
    }
    $include = addslashes($_POST['include']);
    $exclude = addslashes($_POST['exclude']);
    $deskripsi = addslashes($_POST['deskripsi']);
    $peraturan = addslashes($_POST['peraturan']);
    $id_hoster = $_SESSION['id_hoster'];

    $qry = mysqli_query($conn, "INSERT INTO paket VALUES('', '$fotoUtama', '$fotoTambahan', '$judul', '$lokasi', '$lokasi_iframe', '$biaya', '$provinsi', '$group', '$kuota', '$durasi', '$date', '$meepo', '$include', '$exclude', '$deskripsi', '$peraturan', '$jadwal_input', '$jadwal_input_text', '$fullName', '$id_hoster')");

    if ($qry) {
        echo '<div class="alert alert-success" role="alert">
        <strong>Success!</strong> paket berhasil ditambah!
      </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
        <strong>Fail!</strong> paket gagal ditambah!
      </div>';
    }
    $conn->close();
}

//pesan
function pemesanan()
{
    // require 'config.php';
    // session_start();
    //session_start();
    global $conn;
    //$id_users = $_GET["id_users"];
    $id_users = $_POST['id_users'];
    $full_name = $_POST['full_name'];
    //$id_paket = $_GET['id_paket'];
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
    $id_paket = $_POST['id_paket'];

    $pesanPaket = mysqli_query($conn, "INSERT INTO pemesanan VALUES('', '$noKTP', '$namaBelakang', '$namaDepan', '$jenisKelamin', '$email', '$noTelepon', '$tempatLahir', '$tanggalLahir', '$pekerjaan', '$alamat', '$status', '$namaDarurat', '$noTeleponDarurat', '$penyakit', '$jenisPenyakit', '$id_users', '$full_name', '$id_paket')");

    $referer = $_SERVER['HTTP_REFERER'];

    if ($pesanPaket) {
        echo "<script>alert('user baru berhasil');</script>";
        if (strpos($referer, '?') === false) {
            $referer .= "?";
        }

        header("Location: $referer&$errcode");
    } else {
        echo "<script>alert('user baru gagal');</script>";
    }
    // session_start();
    // global $conn;
    // $id_users = $_SESSION['id_users'];
    // //$id_paket = $_GET['id_paket'];
    // $noKTP = $_POST['no_ktp'];
    // $namaBelakang = $_POST['namaBelakang'];

    // $pesanPaket = mysqli_query($conn, "INSERT INTO pemesanan VALUES('', '$noKTP', '$namaBelakang', '', '', '', '', '', '', '', '', '', '', '', '', '', '$id_users', '')");

    // if ($pesanPaket) {
    //     echo "<script>alert('user baru berhasil');</script>";
    // } else {
    //     echo "<script>alert('user baru gagal');</script>";
    // }
    // $pesanPaket->close();
}

//transaksi
function transaksi()
{
    // global $conn;
    // $namaBelak = 'asasasas';
    // $id_payment = $_POST['id_payment'];
    // $date = date('Y-m-d H:M:S');

    // $transaksi = mysqli_query($conn, "INSERT INTO transaksi VALUES('', '', '', '$namaBelak', '$date', '$id_payment')");

    // if ($transaksi) {
    //     echo "<script>alert('user baru berhasil');</script>";
    // } else {
    //     echo "<script>alert('user baru gagal');</script>";
    // }
    // $transaksi->close();
}