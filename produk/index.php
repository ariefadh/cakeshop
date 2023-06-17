<?php
$page = 'produk';

session_start();
if (!isset($_SESSION['userweb'])) {
  header("Location: ..\login\index.php");
}

require 'unit.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Dara Bakery | Produk</title>
  <link rel="icon" type="image/png" href="../img/icon/profile.png" />
  <!-- CSS files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

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
                Produk
              </h2>
            </div>

            <!-- Page title actions -->
            <div class="col-auto ms-auto">
              <a href="tambah.php" class="btn btn-primary">
                <span><i class="ti ti-plus"></i> Tambah Produk</span>
              </a>
            </div>


          </div>
        </div>
      </div>


      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <div class="card p-5">

            <table id="tabelProduk" class="hover display tabelProduk" style="width:100%; ">
              <thead>
                <tr>
                  <th class="m-0">#</th>
                  <th>ID Produk</th>
                  <th>Foto Produk</th>
                  <th>Nama Produk</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Tgl. Prod.</th>
                  <th>Tgl. Exp.</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT  * FROM produk";

                if (!$result = mysqli_query($koneksi, $sql)) {
                  die('Error: ' . mysqli_error($koneksi));
                }

                if (mysqli_num_rows($result) > 0) {
                  $count = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                      <td><?= $count; ?></td>
                      <td><?= $row['id_produk']; ?></td>
                      <td>
                        <button class="btn border-0" type="button" data-bs-target="#viewImage<?= $row['id_produk']; ?>" data-bs-toggle="modal">
                          <img src="../img/shop/<?= $row['foto_produk']; ?>" alt="<?= $row['foto_produk']; ?>" class="" width="70">
                        </button>
                      </td>
                      <td><?= $row['nama_produk']; ?></td>
                      <td><?= $row['stok_produk']; ?></td>
                      <td>Rp <?= number_format($row['harga_produk'], 0, ",", "."); ?></td>
                      <td><?= $row['tgl_prod']; ?></td>
                      <td><?= $row['tgl_exp']; ?></td>
                      <td>
                        <a href="edit.php?id_produk=<?= $row['id_produk']; ?>" class="bg-warning badge text-decoration-none">
                          <span><i class="ti ti-edit"></i></span>
                        </a>
                        <form action="delete.php" method="post" class="d-inline">
                          <input type="hidden" name="id" value="<?= $row['id_produk']; ?>">
                          <button type="submit" class="badge bg-danger" onclick="return confirm('Are you sure?')">
                            <span><i class="ti ti-trash"></i></span>
                          </button>
                        </form>
                      </td>
                    </tr>

                <?php
                    $count++;
                    include '../produk/component/modalImage.php';
                  }
                } else {
                  echo '';
                }

                ?>
              </tbody>
            </table>

          </div>
        </div> <!-- body page -->
      </div>

      <?php include '../partials/footer.php' ?>
    </div>

  </div>

  <!-- Libs JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $("#tabelProduk").DataTable({
        scrollY: 400,
        scrollX: true,
        scrollCollapse: true,
        responsive: true,
        columnDefs: [{
            orderable: false,
            targets: [2, 8]
          },
          {
            targets: [6, 7],
            render: DataTable.render.datetime('YYYY-MM-DD', 'D MMM YY', 'en'),
          },
        ],
      });
    });
  </script>
  <script src="../public/js/tabler.min.js?1684106062" defer></script>

</body>

</html>