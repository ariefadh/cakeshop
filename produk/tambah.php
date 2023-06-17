<?php
$page = 'produk';

session_start();
if (!isset($_SESSION['userweb'])) {
    header("Location: ../login/index.php");
}

require 'unit.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $stok_produk = $_POST['stok_produk'];
    $harga_produk = $_POST['harga_produk'];
    $tgl_prod = $_POST['tgl_prod'];
    $tgl_exp = $_POST['tgl_exp'];

    if ($_FILES['foto_produk']['error'] == 4) {
        echo "<script>
                alert('Harap pilih gambar terlebih dahulu!');
                document.location.href = 'tambah.php';
            </script>";
        return false;
    }

    $targetDir = '../img/shop/';
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $ekstensiGambar = explode('.', $_FILES['foto_produk']['name']);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    $nama_file_baru = uniqid() . '.' . $ekstensiGambar;
    $gambar = $nama_file_baru;

    // Pengecekan gambar
    $ukuran = $_FILES["foto_produk"]["size"];
    $tipeGambarAman = ['jpg', 'jpeg', 'png', 'gif'];
    $tipe = $_FILES["foto_produk"]["type"];

    if ($ukuran > 5000000) {
        echo "<script>
                alert('Ukuran file terlalu besar! Maksimal 5MB');
                document.location.href = 'tambah.php';
            </script>";
        return false;
    }

    if (!in_array($ekstensiGambar, $tipeGambarAman)) {
        echo "<script>
                alert('Tipe file tidak didukung! Hanya dapat mengunggah file gambar (jpg, jpeg, png, gif)');
                document.location.href = 'tambah.php';
            </script>";
        return false;
    }

    move_uploaded_file($_FILES['foto_produk']['tmp_name'], $targetDir . $gambar);

    // Simpan data ke database
    $sql = "INSERT INTO produk (id_produk, foto_produk, nama_produk, stok_produk, harga_produk, tgl_prod, tgl_exp) VALUES ('$id_produk', '$gambar', '$nama_produk', '$stok_produk', '$harga_produk', '$tgl_prod', '$tgl_exp')";

    if (mysqli_query($koneksi, $sql)) {
        // Redirect ke halaman produk setelah berhasil menambahkan produk
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dara Bakery | Tambah Produk</title>

    <!-- CSS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />

    <link href="../public/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="../public/css/style.css" rel="stylesheet" />

</head>

<body>
    <div class="page">

        <!-- Navbar -->
        <?php include '../partials/header.php'; ?>
        <?php include '../partials/navbar.php'; ?>

        <div class="page-wrapper">

            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            <h2 class="page-title">
                                Tambah Produk
                            </h2>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="card p-5">

                        <!-- Display error message if exists -->
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        <?php } ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="id_produk" class="form-label">ID Produk</label>
                                <input type="text" class="form-control" id="id_produk" name="id_produk" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto_produk" class="form-label">Upload Foto</label>
                                <input type="file" class="form-control" id="foto_produk" name="foto_produk" accept="image/*" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                            </div>
                            <div class="mb-3">
                                <label for="stok_produk" class="form-label">Stok Produk</label>
                                <input type="number" class="form-control" id="stok_produk" name="stok_produk" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga_produk" class="form-label">Harga Produk</label>
                                <input type="number" class="form-control" id="harga_produk" name="harga_produk" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_prod" class="form-label">Tanggal Produksi</label>
                                <input type="date" class="form-control" id="tgl_prod" name="tgl_prod" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_exp" class="form-label">Tanggal Kadaluarsa</label>
                                <input type="date" class="form-control" id="tgl_exp" name="tgl_exp" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                </div> <!-- body page -->
            </div>

            <?php include '../partials/footer.php' ?>
        </div>

    </div>

    <!-- Libs JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../public/js/tabler.min.js?1684106062" defer></script>


</body>

</html>