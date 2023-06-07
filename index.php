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
                                    <a href="shoping-cart.php"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
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
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./about.html">About</a></li>
                            <li><a href="./shop.php">Shop</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about__text">
                        <div class="section-title">
                            <span>Tentang Dara Bakery</span>
                            <h2>Dari lidah turun ke hati!</h2>
                        </div>
                    </div>
                </div>
            </div>
            <p style="text-align:justify">".Dara Bakery adalah toko roti populer yang terletak di Jalan Tanjung Duren Barat 2 No.1, Grogol Petamburan, Jakarta Barat., berdiri sejak tahun 2023. Dalam suasananya yang menawan dan rangkaian makanan yang baru dipanggang yang lezat, tempat ini telah menjadi tempat favorit bagi pecinta roti. Toko roti ini terkenal dengan berbagai macam roti, kue kering, dan kue basah, semuanya dibuat dengan bahan terbaik dan oleh tenaga ahli.

                </br>Di Dara Bakery, Anda bisa menemukan berbagai macam roti mulai dari roti croissant dan roti bagel. Setiap roti dipanggang dengan sempurna, dengan kerak yang renyah dan keemasan, serta bagian dalam yang lembut dan halus yang meleleh di mulut Anda. Aroma roti yang baru dipanggang memenuhi udara begitu Anda memasuki toko, menciptakan godaan yang tak tertahankan.

                </br>Selain pilihan rotinya, Dara Bakery juga menawarkan berbagai kue yang enak. Apakah Anda sedang ingin kue lapis, kue cucur , atau kue serabi, Anda pasti akan menemukan sesuatu untuk memuaskan hasrat Anda. Toko roti kami menggunakan bahan-bahan berkualitas tinggi dan teknik memanggang tradisional untuk membuat suguhan roti dan kue yang lezat.

                </br>Staff yang ramah di Dara Bakery selalu siap membantu Anda dalam memilih roti atau kue yang sempurna sesuai selera Anda. Mereka bersemangat dengan kerajinan mereka dan berdedikasi untuk memberikan pengalaman yang menyenangkan bagi setiap pelanggan. </br>Baik Anda berkunjung untuk sarapan cepat, kudapan sore santai, atau membeli kue spesial untuk perayaan, Dara Bakery pasti akan memberikan pengalaman mensajikan roti yang tak terlupakan."</p>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Categories Section Begin -->
    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__item" style="text-align: center;">
                    <div class="categories__item__icon">
                        <span class="flaticon-034-chocolate-roll"></span>
                        <h5>Roti</h5>
                    </div>
                </div>
                <div class="categories__item" style="text-align: center;">
                    <div class="categories__item__icon">
                        <span class="flaticon-029-cupcake-3"></span>
                        <h5>Kue</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Section End -->
    <!--konek db cart-->
    <?php
    include "unit.php";
    ?>
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <?php
                $ambil = $koneksi->query("SELECT * FROM produk");
                while ($perproduk = $ambil->fetch_assoc()) {
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="thumbnail" style="overflow: hidden; padding: 0; max-width: 350px;">
                            <img src="img/shop/<?= $perproduk['foto_produk']; ?>" alt="<?php echo $perproduk['foto_produk']; ?>" class="img-thumbnail img-fluid rounded product-image" style="height: 200px; display: block; margin: auto; width: 100%;">
                        </div>

                        <div class="caption">
                            <h6><b><?php echo $perproduk['nama_produk'] ?></b></h6>
                            <div class="product__item__price">Rp<?php echo number_format($perproduk['harga_produk']); ?></div>
                            <div class="cart_add  mb-3">
                                <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Product Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Testimonial</span>
                        <h2>Our client say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial__slider owl-carousel">
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="img/testimonial/tes-1.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Denny Fadilah</h5>
                                    <span>Jakarta Utara</span>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                            </div>
                            <p>Saya telah menjadi pelanggan setia Dara Bakery dan dengan yakin saya dapat mengatakan bahwa ini adalah toko roti terbaik di kota Jakarta Barat. Roti mereka selalu segar, beraroma, dan dipanggang dengan sempurna. Aroma yang menyapa Anda saat Anda melangkah masuk benar-benar tak tertahankan. Dari kue-kue mereka yang lembut, membuat setiap gigitannya menyenangkan. Staff ramah dan membantu, membuat Anda merasa seperti bagian dari keluarga. Saya sangat merekomendasikan Toko Roti Dara Bakery kepada siapa pun yang mencari makanan panggang terbaik dan suasana yang hangat dan ramah.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="img/testimonial/tes-2.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Reza Purnomo</h5>
                                    <span>Bogor</span>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star-half_alt"></span>
                            </div>
                            <p>Saya baru-baru ini menemukan Toko Dara Bakery, dan saya benar-benar terpesona oleh makanan panggang mereka yang luar biasa. Saat saya melangkah ke toko roti, saya disambut oleh aroma surgawi dari roti yang baru dipanggang. Pilihannya luar biasa, dengan berbagai macam roti, kue kering, dan kue untuk dipilih.

                                Roti di Toko Dara Bakery sangat luar biasa. Setiap roti dipanggang dengan sempurna, dengan kerak yang memiliki keseimbangan kerenyahan dan kekenyalan yang ideal. Interiornya lembut, halus, dan penuh rasa. Baik itu kue atau roti gulung spesial, setiap gigitan benar-benar menyenangkan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

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