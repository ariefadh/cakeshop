<?php $page = 'home'; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Dara Bakery | Home</title>
  <link rel="icon" type="image/png" href="../img/icon/profile.png" />
  <!-- CSS -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

  <link href="../public/css/tabler.min.css?1684106062" rel="stylesheet" />

</head>

<body>

  <div class="page">
    <?php
    session_start();
    if (!isset($_SESSION['userweb'])) {
      header("Location: ..\login\index.php");
    }

    include 'unit.php'; ?>

    <!-- Navbar -->
    <?php
    include '../partials/header.php';
    include '../partials/navbar.php';
    ?>

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
                Home
              </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">

            </div>
          </div>
        </div>
      </div>

      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">

          <!-- Card 1 -->
          <div class="row d-flex">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <div class="align-items-center">
                    <div class="subheader mb-2">
                      Jumlah Produk
                    </div>
                  </div>
                  <div class="h1">

                    <?php
                    $sql = " SELECT COUNT(*) AS total_produk FROM produk";
                    $result = mysqli_query($koneksi, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $jumlah_produk = $row['total_produk'];
                    ?>

                    <center><span class="text-success "><?= $row['total_produk']; ?>+</span></center>

                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <div class="align-items-center">
                    <div class="subheader mb-2">
                      Produk terjual
                    </div>
                  </div>
                  <div class="h1">
                    <?php
                    $sql = "SELECT COUNT(*) AS total_data FROM keranjang_detail";
                    $result = mysqli_query($koneksi, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total_data = $row['total_data'];
                    ?>

                    <center><span class="text-success"><?= $total_data; ?>+</span></center>

                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <div class="align-items-center">
                    <div class="subheader mb-2">
                      Jumlah Customer
                    </div>
                  </div>
                  <div class="h1">

                    <?php
                    $sql = " SELECT COUNT(*) AS total_customer FROM customer";
                    $result = mysqli_query($koneksi, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total_customer = $row['total_customer'];
                    ?>

                    <center><span class="text-success"><?= $row['total_customer']; ?>+</span></center>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="row mt-3">

            <!-- Table Staff -->
            <div class="col-7">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <div class="subheader">Staff</div>
                    <div class="ms-auto lh-1">
                      <a href="" class="btn btn-outline btn-sm rounded text-decoration-none text-dark" role="button" data-bs-toggle="modal" data-bs-target="#tambahStaff">
                        <i class="ti ti-plus"></i>
                      </a>
                    </div>
                  </div>

                  <table id="tabelStaff" class="hover display" style="width:100%">
                    <thead>
                      <tr>
                        <th class="col-1">#</th>
                        <th class="m-0">ID Staff</th>
                        <th>Nama Staff</th>
                        <th>Posisi</th>
                        <th class="m-0">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT  * FROM staff";

                      if (!$result =  mysqli_query($koneksi, $sql)) {
                        die('Error:' . mysqli_error($koneksi));
                      } else {
                        if (mysqli_num_rows($result) > 0) {
                          $count = 1;
                          while ($row =  mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>
                          <td><?= $count; ?></td>
                          <td><?= $row['id_staff']; ?></td>
                          <td><?= $row['nama_staff']; ?></td>
                          <td><?= $row['posisi']; ?></td>
                          <td>
                            <button type="button" class="bg-warning badge text-decoration-none" role="button" data-bs-toggle="modal" data-bs-target="#editStaff<?= $row['id_staff']; ?>">
                              <span><i class="ti ti-edit"></i> Edit</span>
                            </button>

                            <form action="" method="post" class="d-inline">
                              <input type="hidden" name="id_staff" value="<?= $row['id_staff']; ?>">
                              <button type="submit" class="badge bg-danger " onclick="return confirm('Are your sure?')" name="staffDelete">
                                <span><i class="ti ti-trash"></i> Delete</span>
                              </button>
                            </form>
                          </td>
                        </tr>
                      <?php
                            $count++;
                            include '../home/component/modalEditStaff.php';
                          }
                        } else {
                          echo '';
                        }
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Tabel Customer -->
            <div class="col">
              <div class="card">
                <div class="card-body">

                  <div class="d-flex align-items-center mb-3">
                    <div class="subheader">Customer</div>
                    <div class="ms-auto lh-1">
                      <button type="button" class="btn btn-outline btn-sm rounded text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#tambahCustomer">
                        <i class="ti ti-plus"></i>
                      </button>
                    </div>
                  </div>

                  <table id="tabelCustomer" class="hover display" style="width:100%">
                    <thead>
                      <tr>
                        <th class="col-1">#</th>
                        <th>Nama Customer</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT  * FROM customer";

                      if (!$result =  mysqli_query($koneksi, $sql)) {
                        die('Error:' . mysqli_error($koneksi));
                      } else {
                        if (mysqli_num_rows($result) > 0) {
                          $count = 1;
                          while ($row =  mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>
                          <td><?php echo $row['id_customer']; ?></td>
                          <td><?php echo $row['nama_customer']; ?></td>
                          <td>
                            <button type="button" class="bg-warning badge text-decoration-none" data-bs-toggle="modal" data-bs-target="#editCustomer<?= $row['id_customer']; ?>">
                              <span><i class="ti ti-edit"></i> Edit</span>
                            </button>

                            <form action="" method="post" class="d-inline">
                              <input type="hidden" name="id_customer" value="<?= $row['id_customer']; ?>">
                              <button type="submit" class="badge bg-danger " onclick="return confirm('Are your sure?')" name="customerDelete">
                                <span><i class="ti ti-trash"></i> Delete</span>
                              </button>
                            </form>
                          </td>
                        </tr>
                      <?php
                            include '../home/component/modalEditCustomer.php';
                            $count++;
                          }
                        } else {
                          echo '';
                        }
                      } ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- body page -->
  </div>

  <?php include '../partials/footer.php' ?>
  </div>

  </div>

  <?php
  include '../home/component/modalTambahCustomer.php';
  include '../home/component/modalTambahStaff.php';
  ?>

  <!-- Libs JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script>
    $('#tambahCustomer').on('shown.bs.modal', function() {
      $('#nama_customer').focus();
    });
  </script>
  <script src="../public/js/dashboard-home.js"></script>
  <script src="../public/js/tabler.min.js?1684106062" defer></script>
</body>

</html>