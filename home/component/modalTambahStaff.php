<div class="modal fade" id="tambahStaff" tabindex="-1" aria-labelledby="tambahStaffLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Staff</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="id_staff" class="col-form-label">ID Staff</label>
                        <input type="number" class="form-control" id="id_staff" name="id_staff" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_staff" class="col-form-label">Nama Staff</label>
                        <input type="text" class="form-control" id="nama_staff" name="nama_staff" required>
                    </div>
                    <div class="mb-5">
                        <label for="posisi" class="col-form-label">Posisi</label>
                        <select class="form-select" id="posisi" name="posisi" required>
                            <option selected disabled>Pilih posisi</option>
                            <option value="IT">IT</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Waiiters">Waiiters</option>
                            <option value="Head Store">Head Store</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="staffAdd">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>