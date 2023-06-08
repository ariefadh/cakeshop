<div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahUserModalLabel">Tambah User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">

          <div class="mb-3">
            <label for="id_akun" class="col-form-label">ID Akun</label>
            <input type="number" class="form-control" id="id_akun" name="id_akun" required>
          </div>

          <div class="mb-3">
            <label for="nama_staff" class="col-form-label">Nama</label>
            <select class="form-select" name="nama_staff" required>
              <?php
              $sql = "SELECT staff.id_staff, staff.nama_staff FROM staff";
              $result = mysqli_query($koneksi, $sql);

              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_staff'] . "'>" . $row['nama_staff'] . "</option>";
              }
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="username" class="col-form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>

          <div class="mb-3">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>

          <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="passw" name="pass">
              <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()" id="togglePass">
                <i class="ti ti-eye"></i>
              </button>
            </div>
          </div>

          <div class="mb-5">
            <label for="level" class="col-form-label">Level</label>
            <select class="form-select" name="level" required>
              <option disabled selected>Pilih Level</option>
              <option value="1">Level 1</option>
              <option value="2">Level 2</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" name="userAdd">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
