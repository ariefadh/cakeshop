<?php
/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/
$koneksi = mysqli_connect("localhost", "root", "","cakeshop");
    
    function deleteDataTransaksi($koneksi, $id_keranjang){
        $sql = "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'";

        if (mysqli_query($koneksi, $sql)) {
            return true; // Berhasil menghapus data
        } else {
            return false; // Gagal menghapus data
        }
    }

    if (isset($_POST['transaksiDelete'])) {
        $id_keranjang = $_POST['id_keranjang'];
    
        if (deleteDataTransaksi($koneksi, $id_keranjang)) {
            header("Location: ../transaksi");
            exit();
        } else {
            $error = "Gagal menghapus data!";
        }
    }
?>
