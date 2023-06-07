<?php
$page = 'akun';

session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['userweb'])) {
  header("Location: ..\login\index.php");
  exit();
}

// Cek level pengguna
if ($_SESSION['level'] != 1) {
  header("Location: unauthorized.php"); // Redirect ke halaman unauthorized jika bukan level 1
  exit();
}

// Lanjutkan kode halaman
// ...
include 'unit.php';

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Dara Bakery | User</title>
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
                User
              </h2>
            </div>

            <!-- Page title actions -->
            <div class="col-auto ms-auto ">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUser">
                <span><i class="ti ti-plus"></i> Tambah User</span>
              </button>
            </div>

          </div>
        </div>
      </div>

      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <div class="card p-5">

            <table id="tabelAkun" class="hover display" style="width:100%">
              <thead>
                <tr>
                  <th class="m-0">#</th>
                  <th>ID Akun</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT staff.*, akun.* From staff
                    INNER JOIN akun ON staff.id_staff = akun.id_staff";

                if (!$result = mysqli_query($koneksi, $sql)) {
                  die('Error: ' . mysqli_error($koneksi));
                } else {
                  if (mysqli_num_rows($result) > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                      <tr>
                        <td><?= $count; ?></td>
                        <td><?= $row['id_akun']; ?></td>
                        <td><?= $row['nama_staff']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td>
                          <div class="row">
                            <div class="col-sm-4 col-md-3">
                              <button class="border-0 toggle-password">
                                <i class="ti ti-eye"></i>
                              </button>
                            </div>
                            <input type="password" class="form-control password-field" value="<?= $row['pass']; ?>" readonly>
                          </div>
                        </td>
                        <td><?= $row['level']; ?></td>
                        <td>
                          <button type="button" class="bg-warning badge text-decoration-none mb-sm-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#editUser<?= $row['id_akun']; ?>">
                            <span><i class="ti ti-edit"></i></span>
                          </button>

                          <form action="" method="post" class="d-inline">
                            <input type="hidden" name="id_akun" value="<?= $row['id_akun']; ?>">
                            <button type="submit" class="badge bg-danger " onclick="return confirm('Are your sure?')" name="userDelete">
                              <span><i class="ti ti-trash"></i></span>
                            </button>
                          </form>
                        </td>
                      </tr>
                <?php
                      include '../akun/component/modalEdit.php';
                      $count++;
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

      <?php include '../partials/footer.php' ?> <!-- Footer -->

    </div>
  </div>

  <?php include '../akun/component/modalTambah.php' ?>

  <!-- Libs JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $(document).on('click', '.toggle-password', function() {
        var passwordField = $(this).closest('.row').find('input[type="password"]');
        var eyeIcon = $(this).find('i');

        if (passwordField.attr('type') === 'password') {
          passwordField.attr('type', 'text');
          eyeIcon.removeClass('ti-eye').addClass('ti-eye-off');
        } else {
          passwordField.attr('type', 'password');
          eyeIcon.removeClass('ti-eye-off').addClass('ti-eye');
        }
      });
    });
  </script>

  <script src="../public/js/dashboard-user.js"></script>
  <script src="../public/js/tabler.min.js?1684106062" defer></script>

</body>

</html>