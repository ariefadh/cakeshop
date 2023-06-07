<div class="modal fade" id="editStaff<?= $row['id_staff']; ?>" tabindex="-1" aria-labelledby="editStaffLabel<?= $row['id_staff']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editStaffLabel<?= $row['id_staff']; ?>">Edit Staff</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" class="form-control" id="id_staff" name="id_staff" value="<?= $row['id_staff']; ?>" required>
                    <div class="mb-3">
                        <label for="nama_staff" class="col-form-label">Nama Staff</label>
                        <input type="text" class="form-control" id="nama_staff" name="nama_staff" value="<?= $row['nama_staff']; ?>" required>
                    </div>
                    <div class="mb-5">
                        <label for="posisi" class="col-form-label">Posisi</label>
                        <select class="form-select" id="posisi" name="posisi" required>
                            <option selected disabled>Pilih posisi</option>
                            <option value="IT" <?php if ($row['posisi'] == 'IT') echo 'selected'; ?>>IT</option>
                            <option value="Marketing" <?php if ($row['posisi'] == 'Marketing') echo 'selected'; ?>>Marketing</option>
                            <option value="Waiters" <?php if ($row['posisi'] == 'Waiters') echo 'selected'; ?>>Waiters</option>
                            <option value="Head Store" <?php if ($row['posisi'] == 'Head Store') echo 'selected'; ?>>Head Store</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="staffEdit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>