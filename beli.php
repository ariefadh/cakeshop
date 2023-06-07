<?php
session_start();
$id_produk = $_GET['id'];

// Jika produk dikeranjang berjumlah +1
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
} else {
    // Jika produk dikeranjang belum ada, set jumlahnya menjadi 1
    $_SESSION['keranjang'][$id_produk] = 1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='shoping-cart.php';</script>";
?>
