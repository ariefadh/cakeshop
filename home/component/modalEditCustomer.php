<div class="modal fade" id="editCustomer<?= $row['id_customer']; ?>" tabindex="-1" aria-labelledby="editCustomerLabel<?= $row['id_customer']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="editCustomerLabel<?= $row['id_customer']; ?>">Edit Customer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id_customer" value="<?= $row['id_customer']; ?>">
                    <div class="mb-5">
                        <label for="nama_customer" class="col-form-label">Nama Customer</label>
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?= $row['nama_customer']; ?>" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="customerEdit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>