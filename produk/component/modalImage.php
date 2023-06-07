<div class="modal modal-sm fade" id="viewImage<?= $row['id_produk']; ?>" tabindex="-1" aria-labelledby="viewImageLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="viewImageModalLabel"><?= $row['nama_produk']; ?></h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="../img/shop/<?= $row['foto_produk']; ?>" alt="<?= $row['foto_produk']; ?>" width="100%" max-height="300">
      </div>
    </div>
  </div>
</div>