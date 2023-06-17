<?php
// Koneksi ke database (sesuaikan dengan konfigurasi database Anda)
include 'unit.php';

// Ambil data dari form checkout
$nama_customer = $_POST['nama_customer'];
$tanggal_order = $_POST['tanggal_order'];
$alamat = $_POST['checkout__input__add'];
$kota = $_POST['kota'];
$provinsi = $_POST['provinsi'];
$kode_pos = $_POST['kode_pos'];
$telepon = $_POST['telepon'];
$catatan = $_POST['catatan'];
$metode_pembayaran = "";
if (isset($_POST['paymentMethod'])) {
    $metode_pembayaran = $_POST['paymentMethod'];
} elseif (isset($_POST['paymethod'])) {
    $metode_pembayaran = $_POST['paymethod'];
}

// Simpan data transaksi ke tabel transaksi
$sql = "INSERT INTO transaksi (nama_customer, tgl_order, alamat, kota, provinsi, kode_pos, telepon, catatan, metode_pembayaran) VALUES ('$nama_customer', '$tanggal_order', '$alamat', '$kota', '$provinsi', '$kode_pos', '$telepon', '$catatan', '$metode_pembayaran')";

if ($koneksi->query($sql) === TRUE) {
    // Ambil ID transaksi yang baru saja di-generate
    $id_transaksi = $koneksi->insert_id;

    // Ambil data dari keranjang belanja
    $keranjang = $_SESSION["keranjang"];

    // Simpan setiap item keranjang belanja ke dalam tabel detail_transaksi
    foreach ($keranjang as $id_produk => $jumlah) {
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = $id_produk");
        $pecah = $ambil->fetch_assoc();
        $nama_produk = $pecah["nama_produk"];
        $harga_produk = $pecah["harga_produk"];
        $subtotal_harga = $harga_produk * $jumlah;

        // Simpan item ke dalam tabel detail_transaksi
        $sql_detail = "INSERT INTO detail_transaksi (id_transaksi, nama_produk, harga_produk, subtotal_harga) VALUES ($id_transaksi, '$nama_produk', $harga_produk, $subtotal_harga)";
        $koneksi->query($sql_detail);
    }

    // Setelah data transaksi berhasil disimpan, hapus keranjang belanja
    unset($_SESSION["keranjang"]);

    // Redirect ke halaman terima kasih atau halaman lainnya
    header("Location: terima-kasih.php?id_transaksi=$id_transaksi"); // Ganti dengan URL halaman terima kasih
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
