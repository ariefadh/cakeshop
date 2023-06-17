<?php
// Pastikan file ini berada di direktori yang benar sesuai dengan path yang Anda berikan di aksi form pada halaman produk

// Periksa apakah ada data yang dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Periksa apakah input "id" ada dalam request POST
  if (isset($_POST["id"])) {
    // Mendapatkan nilai ID produk yang akan dihapus
    $id_produk = $_POST["id"];

    // Lakukan koneksi ke database, pastikan variabel $koneksi sudah diinisialisasi sebelumnya
    require 'unit.php';

    // Ambil informasi produk sebelum dihapus
    $sql = "SELECT foto_produk FROM produk WHERE id_produk = '$id_produk'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);

    // Hapus produk dari database
    $sql = "DELETE FROM produk WHERE id_produk = '$id_produk'";
    if (mysqli_query($koneksi, $sql)) {
      // Jika penghapusan berhasil, hapus juga file gambar terkait
      if (!empty($row['foto_produk'])) {
        $targetDir = '../img/shop/';
        unlink($targetDir . $row['foto_produk']);
      }
      // Jika penghapusan berhasil, redirect ke halaman produk dengan pesan sukses
      header("Location: index.php?status=success");
      exit();
    } else {
      // Jika terjadi kesalahan saat penghapusan, redirect ke halaman produk dengan pesan error
      header("Location: index.php?status=error");
      exit();
    }
  }
}

// Jika tidak ada data yang dikirim melalui metode POST atau tidak ada input "id" dalam request POST, maka redirect ke halaman produk dengan pesan error
header("Location: index.php?status=error");
exit();
