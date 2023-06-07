<?php
session_start();
include 'unit.php';
if (isset($_GET['total_harga'])) {
    $total_harga = $_GET['total_harga'];
} else {
    // Redirect atau tindakan lain jika total_harga tidak tersedia
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dara Bakery</title>
    <link rel="icon" type="image/png" href="img/logodara.png" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__item">
                <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            </div>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="img/header-logodara.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                            </div>
                            <div class="header__logo">
                                <a href="./index.php"><img src="img/header-logodara.png" alt=""></a>
                            </div>
                            <div class="header__top__right">
                                <div class="header__top__right__cart">
                                    <a href="./shoping-cart.php"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li><a href="./about.html">About</a></li>
                            <li class="active"><a href="./shop.php">Shop</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Detail pemesanan</h6>
                            <div class="form-group">
                                <label for="nama_customer"></br>Nama Customer:</label>
                                <input type="text" name="nama_customer" class="form-control" placeholder="Masukan nama terlebih dahulu" required value="<?php echo isset($_SESSION['nama_customer']) ? $_SESSION['nama_customer'] : ''; ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Tanggal Order<span>*</span></p>
                                <input type="date" name="tanggal_order" required>
                            </div>
                            <div class="checkout__input">
                                <p>Alamat<span>*</span></p>
                                <input type="text" name="alamat" placeholder="Jalan, RT/RW dan nomor" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Kota<span>*</span></p>
                                <input type="text" name="kota">
                            </div>
                            <div class="checkout__input">
                                <p>Provinsi<span>*</span></p>
                                <input type="text" name="provinsi">
                            </div>
                            <div class="checkout__input">
                                <p>Kode POS<span>*</span></p>
                                <input type="number" name="kode_pos">
                            </div>
                            <div class="checkout__input">
                                <p>Telepon<span>*</span></p>
                                <input type="text" name="telepon">
                            </div>
                            <div class="checkout__input">
                                <p>Catatan<span>*</span></p>
                                <input type="text" name="catatan" placeholder="catatan untuk pesanan Anda, misalnya catatan khusus untuk pengiriman.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Metode pembayaran</h6>
                                <div class="checkout__input__checkbox">
                                    <label for="ovo">
                                        OVO (089923822174)
                                        <input type="checkbox" id="ovo" name="paymethod" value="OVO" onclick="uncheckOther('ovo')">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="gopay">
                                        GOPAY (089923822174)
                                        <input type="checkbox" id="gopay" name="paymethod" value="GOPAY" onclick="uncheckOther('gopay')">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="bankdki">
                                        Bank DKI (17267126799)
                                        <input type="checkbox" id="bankdki" name="paymethod" value="Bank DKI" onclick="uncheckOther('bankdki')">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <script>
                                    function uncheckOther(checkedId) {
                                        const checkboxes = document.getElementsByName("paymethod");
                                        checkboxes.forEach(function(checkbox) {
                                            if (checkbox.id !== checkedId) {
                                                checkbox.checked = false;
                                            }
                                        });
                                    }
                                </script>
                                <p>Silahkan hubungi kami untuk konfirmasi pesanan , Kontak : 082233445500</p>
                                <!-- Bagian HTML sebelum form checkout -->
                                <!-- Bagian HTML sebelum form checkout -->
                                <!-- ...kode HTML sebelum form checkout -->
                                <form action="" method="post">
                                    <!-- ...kode HTML untuk menampilkan informasi keranjang belanja -->
                                    <button type="submit" class="primary-btn" name="checkout" onclick="return konfirmasiPesanan()">ORDER</button>
                                </form>
                                <!-- Bagian HTML setelah form checkout -->
                                <!-- Script untuk menampilkan konfirmasi sebelum submit form -->
                                <script>
                                    function konfirmasiPesanan() {
                                        var r = confirm("Apakah Anda yakin ingin melakukan pesanan?");
                                        if (r == true) {
                                            // Lakukan operasi penyimpanan data atau proses yang diinginkan
                                            // Redirect ke halaman terima kasih atau halaman lainnya
                                            window.location.href = "index.php"; // Ganti dengan URL halaman tujuan
                                        } else {
                                            return false; // Menghentikan submit form jika pengguna memilih untuk membatalkan pesanan
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['checkout'])) {
                    // Ambil data dari form
                    $nama_customer = $_POST['nama_customer'];
                    $tanggal_order = $_POST['tanggal_order'];
                    $alamat = $_POST['alamat'];
                    $kota = $_POST['kota'];
                    $provinsi = $_POST['provinsi'];
                    $kode_pos = $_POST['kode_pos'];
                    $telepon = $_POST['telepon'];
                    $catatan = $_POST['catatan'];
                    $paymethod = isset($_POST['paymethod']) ? $_POST['paymethod'] : '';

                    // Memasukkan data ke dalam tabel customer
                    $koneksi->query("INSERT INTO customer (nama_customer) VALUES ('$nama_customer')");
                    $id_customer = $koneksi->insert_id; // Mendapatkan ID customer terakhir yang di-generate

                    // Memasukkan data ke dalam tabel keranjang
                    $koneksi->query("INSERT INTO keranjang (id_customer, nama_customer, tgl_order, alamat, kota, provinsi, kode_pos, telepon, catatan, paymethod) 
        VALUES ('$id_customer', '$nama_customer', '$tanggal_order', '$alamat', '$kota', '$provinsi', '$kode_pos', '$telepon', '$catatan', '$paymethod')");

                    $id_keranjang = $koneksi->insert_id; // Mendapatkan ID keranjang terakhir yang di-generate
                    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                        // Ambil detail produk dari database berdasarkan ID
                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk=$id_produk");
                        $pecah = $ambil->fetch_assoc();
                        $nama_produk = $pecah["nama_produk"];
                        $harga_produk = $pecah["harga_produk"];
                        $subtotal_harga = $harga_produk * $jumlah;
                        $total_harga += $subtotal_harga;

                        // Memasukkan data ke dalam tabel keranjang_detail
                        $koneksi->query("INSERT INTO keranjang_detail (id_keranjang, nama_produk, harga_produk, jumlah, subtotal_harga) 
            VALUES ('$id_keranjang', '$nama_produk', '$harga_produk','$jumlah', '$subtotal_harga')");

                        // Kurangi stok produk berdasarkan jumlah yang dipesan
                        $stok_produk = $pecah["stok_produk"];
                        $stok_produk -= $jumlah;

                        // Update stok produk di database
                        $koneksi->query("UPDATE produk SET stok_produk=$stok_produk WHERE id_produk=$id_produk");
                    }

                    echo '<script>alert("Pesanan Anda telah diterima. Terima kasih atas pesanan Anda!");</script>';
                    echo '<script>window.location.href = "index.php";</script>';
                    // Clear the shopping cart
                    $_SESSION["keranjang"] = array(); // Set the shopping cart array to an empty array
                    exit();
                }
                ?>

            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="img/bg-footer.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6 style="color: #333;"><b>Jam Kerja</b></h6>
                        <ul>
                            <p style="color: #333;"><b>Senin - Jumat: 08:00 am – 08:30 pm</b></p>
                            <p style="color: #333;"><b>Sabtu: 10:00 am – 04:30 pm</b></p>
                            <p style="color: #333;"><b>Minggu: 10:00 am – 04:30 pm</b></p>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logodara.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <p style="color: #333;"><b>Jalan Tanjung Duren Barat 2 No.1, Grogol Petamburan, Jakarta Barat</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="col-lg-5">
                </div>
            </div>
        </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>