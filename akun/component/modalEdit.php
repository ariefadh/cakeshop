<div class="modal fade" id="editUser<?= $row['id_akun']; ?>" tabindex="-1" aria-labelledby="editUser<?= $row['id_akun']; ?>Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editUserModal<?= $row['id_akun']; ?>Label">Edit User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input type="hidden" class="form-control" id="id_akun" name="id_akun" value="<?= $row['id_akun']; ?>">

          <div class="mb-3">
            <label for="nama_staff" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="nama_staff" name="nama_staff" value="<?= $row['nama_staff']; ?>" disabled>
          </div>

          <div class="mb-3">
            <label for="username" class="col-form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $row['username']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $row['email']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control password-field" id="passwd" name="pass" value="<?= $row['pass']; ?>" required>
              <button class="btn btn-outline-secondary toggle-password" type="button" onclick="togglePassword()" id="toggle-Pass">
                <i class="ti ti-eye"></i>
              </button>
            </div>
          </div>

          <div class="mb-5">
            <label for="level" class="col-form-label">Level</label>
            <select class="form-select" name="level" required>
              <option disabled selected>Pilih Level</option>
              <option value="1" <?php if ($row['level'] == '1') echo 'selected'; ?>>Level 1</option>
              <option value="2" <?php if ($row['level'] == '2') echo 'selected'; ?>>Level 2</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" name="userEdit">Simpan Perubahan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>