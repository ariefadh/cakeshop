<?php
session_start();
include 'unit.php';
$_SESSION['nama_customer'] = '';

// Cek apakah form sudah disubmit
if (isset($_POST['submit_nama_customer'])) {
    if (isset($_POST['nama_customer'])) {
        $nama_customer = $_POST['nama_customer'];
        $_SESSION['nama_customer'] = $nama_customer;
    }
}

if (isset($_SESSION['nama_customer'])) {
    $nama_customer = $_SESSION['nama_customer'];
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
                <div class="col-lg-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Keranjang Belanja</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Keranjang Belanja</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Form Nama Customer -->
    <div class="col-lg-6">
        <div class="breadcrumb__links">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama_customer"></br>Nama Customer:</label>
                    <input type="text" name="nama_customer" class="form-control" placeholder="Masukan nama terlebih dahulu" required value="<?php echo isset($_SESSION['nama_customer']) ? $_SESSION['nama_customer'] : ''; ?>">
                </div>
                <div class="breadcrumb__text text-left">
                    <button type="submit" name="submit_nama_customer" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- End Form Nama Customer -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_harga = 0;
                                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) :
                                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk=$id_produk");
                                    $pecah = $ambil->fetch_assoc();
                                    $harga_produk = $pecah["harga_produk"];
                                    $subtotal_harga = $pecah["harga_produk"] * $jumlah;
                                    $total_harga += $subtotal_harga;
                                    $stok_produk = $pecah["stok_produk"]; // Menambahkan variabel stok_produk
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $pecah["nama_produk"]; ?>
                                            <br>
                                            <small>(Stok: <?php echo $stok_produk; ?>)</small> <!-- Menampilkan stok produk -->
                                        </td>
                                        <td><?php echo $jumlah ?></td>
                                        <td>Rp<?php echo number_format($pecah["harga_produk"]); ?> X <?php echo $jumlah; ?></td>
                                        <td>Rp<?php echo number_format($subtotal_harga); ?></td>
                                        <td>
                                            <a href="delcart.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Total Belanja</h6>
                        <td class="text-justify">Nama customer : <?php echo $_SESSION['nama_customer']; ?></td>
                        <ul class="text-justify">
                            <ul>
                                <li>Total <span>Rp<?php echo number_format($total_harga) ?></span></li>
                            </ul>
                        </ul>
                        <a href="#" class="primary-btn" onclick="document.getElementById('checkout-form').submit();">Checkout</a>
                        <form id="checkout-form" action="checkout.php" method="post" style="display: none;">
                            <input type="hidden" name="total_harga" value="<?php echo $total_harga; ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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