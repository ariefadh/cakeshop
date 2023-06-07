<?php
$page = 'transaksi';

session_start();
if (!isset($_SESSION['userweb'])) {
  header("Location: ..\login\index.php");
}

include 'unit.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Dara Bakery | Transaksi</title>
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
                Transaksi
              </h2>
            </div>
          </div>
        </div>
      </div>


      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <div class="card p-5">
            <table id="tabelTransaksi" class="hover display nowrap" style="width:100%">
              <thead>
                <tr>
                  <th class="m-0">#</th>
                  <th>ID Transaksi</th>
                  <th>Tgl. Order</th>
                  <th>Customer</th>
                  <th>Kota</th>
                  <th>Metode Bayar</th>
                  <th>Catatan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT DISTINCT keranjang.*, customer.*, keranjang_detail.*
                  FROM keranjang
                  JOIN customer ON keranjang.nama_customer = customer.nama_customer
                  JOIN keranjang_detail ON keranjang.id_keranjang = keranjang_detail.id_keranjang";

                if (!$result = mysqli_query($koneksi, $sql)) {
                  die('Error: ' . mysqli_error($koneksi));
                } else {
                  $keranjang_ids = array(); // Track unique shopping cart IDs

                  $total_harga = 0;
                  if (mysqli_num_rows($result) > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $id_keranjang = $row['id_keranjang'];

                      // Check if shopping cart ID has been processed before
                      if (in_array($id_keranjang, $keranjang_ids)) {
                        continue; // Skip the row if ID has been processed
                      } else {
                        $keranjang_ids[] = $id_keranjang; // Add ID to the tracked list
                      }

                      $tgl_order = isset($row['tgl_order']) ? $row['tgl_order'] : '';
                      $nama_customer = isset($row['nama_customer']) ? $row['nama_customer'] : '';
                      $kota = isset($row['kota']) ? $row['kota'] : '';
                      $paymethod = isset($row['paymethod']) ? $row['paymethod'] : '';
                      $catatan = isset($row['catatan']) ? $row['catatan'] : '';
                      $total_harga += $row['subtotal_harga'];
                ?>
                      <tr data-bs-toggle="modal" data-bs-target="#detailTransaksi<?= $id_keranjang; ?>">
                        <td><?= $count; ?></td>
                        <td><?= $id_keranjang; ?></td>
                        <td><?= $tgl_order; ?></td>
                        <td><?= $nama_customer; ?></td>
                        <td><?= $kota; ?></td>
                        <td><?= $paymethod; ?></td>
                        <td><?= $catatan; ?></td>
                        <td>
                          <form action="" method="post" class="d-inline">
                            <input type="hidden" name="id_keranjang" value="<?= $row['id_keranjang']; ?>">
                            <button type="submit" name="transaksiDelete" class="badge bg-danger" onclick="return confirm('Are you sure?')">
                              <span><i class="ti ti-trash"></i></span>
                            </button>
                          </form>
                        </td>
                      </tr>
                <?php
                      $count++;
                      include '../transaksi/component/modalDetail.php';
                    }
                  } else {
                    echo '<tr><td colspan="4">No data available</td></tr>';
                  }
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
      $("#tabelTransaksi").DataTable({
        scrollY: 200,
        scrollX: true,
        columnDefs: [{
            targets: 2,
            render: DataTable.render.datetime('YYYY-MM-DD', 'D MMM YY', 'en'),
          },
          {
            orderable: false,
            targets: 7,
          },
        ],
      });
    });
  </script>
  <script src="../public/js/tabler.min.js?1684106062" defer></script>

</body>

</html>