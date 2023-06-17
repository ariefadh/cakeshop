<?php
$page = 'produk';

session_start();
if (!isset($_SESSION['userweb'])) {
    header("Location: ..\login\index.php");
}

require 'unit.php';

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Query to get product details
    $sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Process form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $id_produk = $_POST['id_produk'];
            $nama_produk = $_POST['nama_produk'];
            $stok_produk = $_POST['stok_produk'];
            $harga_produk = $_POST['harga_produk'];
            $tgl_prod = $_POST['tgl_prod'];
            $tgl_exp = $_POST['tgl_exp'];

            // Check if a new image is uploaded
            if ($_FILES['foto_produk']['error'] != 4) {
                $foto_produk = $_FILES['foto_produk']['name'];
                $targetDir = '../img/shop/';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                $targetFile = $targetDir . $foto_produk;

                // Move uploaded file to the target directory
                if (move_uploaded_file($_FILES['foto_produk']['tmp_name'], $targetFile)) {
                    // Delete previous image file
                    if (!empty($row['foto_produk'])) {
                        unlink($targetDir . $row['foto_produk']);
                    }
                } else {
                    // Error uploading the file
                    $error = "Failed to upload the image.";
                }
            } else {
                // No new image uploaded, use the existing image
                $foto_produk = $row['foto_produk'];
            }

            // Update product in database
            $updateSql = "UPDATE produk SET foto_produk='$foto_produk', nama_produk='$nama_produk', stok_produk='$stok_produk', harga_produk='$harga_produk', tgl_prod='$tgl_prod', tgl_exp='$tgl_exp' WHERE id_produk='$id_produk'";

            if (mysqli_query($koneksi, $updateSql)) {
                // Redirect back to product page with success message
                header("Location: index.php?success=1");
                exit;
            } else {
                // Show error message
                $error = "Failed to update product: " . mysqli_error($koneksi);
            }
        }
    } else {
        // No product found with the given ID, redirect back to product page
        header("Location: index.php");
        exit;
    }
} else {
    // No product ID provided, redirect back to product page
    header("Location: index.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dara Bakery | Edit Produk</title>

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
                                Edit Produk
                            </h2>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="card p-5">
                        <div class="col-4 mb-3">
                            <a href="index.php" class="btn btn-secondary"><i class="ti ti-arrow-left"></i> Kembali</a>
                        </div>

                        <!-- Display error message if exists -->
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        <?php } ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">ID Produk</label>
                                <input type="number" class="form-control" id="id_produk" name="id_produk" value="<?= $row['id_produk'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $row['nama_produk'] ?>" required>
                            </div>
                            <div class="row g-4 mb-3">
                                <div class="col-md-3">
                                    <label for="stok_produk" class="form-label">Stok Produk</label>
                                    <input type="number" class="form-control" id="stok_produk" name="stok_produk" value="<?= $row['stok_produk'] ?>" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="harga_produk" class="form-label">Harga Produk</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-harga_produk">Rp</span>
                                        <input type="number" class="form-control" id="harga_produk" name="harga_produk" value="<?= $row['harga_produk'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="tgl_prod" class="form-label">Tanggal Produksi</label>
                                    <input type="date" class="form-control" id="tgl_prod" name="tgl_prod" value="<?= $row['tgl_prod'] ?>" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="tgl_exp" class="form-label">Tanggal Kadaluarsa</label>
                                    <input type="date" class="form-control" id="tgl_exp" name="tgl_exp" value="<?= $row['tgl_exp'] ?>" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="foto_produk" class="form-label">Upload Foto</label>
                                <input type="file" class="form-control" id="foto_produk" name="foto_produk" accept="image/*">
                                <?php if (!empty($row['foto_produk'])) { ?>
                                    <span class="file-name text-danger">*<?= $row['foto_produk']; ?></span>
                                <?php } ?>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary col-md-4">Simpan Perubahan</button>
                            </div>

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