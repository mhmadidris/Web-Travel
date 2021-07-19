<?php
require 'config.php';
$id = $_GET['id'];

$sql = "DELETE FROM pemesanan WHERE id_pesan = $id";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    echo '<div class="alert alert-success" role="alert">
    <strong>Success!</strong> paket berhasil ditambah!
  </div>';
    header('Location: profile.php');
} else {
    echo '<div class="alert alert-warning" role="alert">
    <strong>Fauil!</strong> gagal menghapus paket!
  </div>';
    header('Location: profile.php');
}