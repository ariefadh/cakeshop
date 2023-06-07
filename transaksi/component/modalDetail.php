<div class="modal fade" id="detailTransaksi<?= $row['id_keranjang']; ?>" tabindex="-1" aria-labelledby="detailTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailTransaksiLabel">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                        <p class="fw-bold fs-3">ID Transaksi</p>
                        <p>Tanggal Order</p>
                        <p>Customer</p>
                        <p>No. Telepon</p>
                        <p>Alamat</p>
                    </div>
                    <div class="col">
                        <p class="fw-bold fs-3">: <span class=" text-success"><?= $row['id_keranjang']; ?></span></p>
                        <p>: <?= $row['tgl_order'] ? date("d F Y", strtotime($row['tgl_order'])) : ''; ?></p>
                        <p>: <?= $row['nama_customer']; ?></p>
                        <p>: <?= isset($row['telepon']) ? $row['telepon'] : ''; ?></p>
                        <p>: <?= isset($row['alamat']) ? $row['alamat'] : ''; ?>, <?= isset($row['kota']) ? $row['kota'] : ''; ?>, <?= isset($row['provinsi']) ? $row['provinsi'] : ''; ?>, <?= isset($row['kode_pos']) ? $row['kode_pos'] : ''; ?></p>
                    </div>
                    <hr class="mt-0 mb-2 border border-3 border-dark">
                    <div class="row">
                        <div class="col">
                            <h3 class="mt-0 mb-2">Info Produk</h3>
                        </div>
                        <div class="col">
                            <h3 class="mt-0 mb-2 text-end">Jumlah</h3>
                        </div>
                        <div class="col">
                            <h3 class="mt-0 mb-2 text-end">Harga Produk</h3>
                        </div>
                        <div class="col">
                            <h3 class="mt-0 mb-2 text-end">Subtotal Harga</h3>
                        </div>
                    </div>
                    <hr class="mt-0 mb-3 border border-3 border-dark">
                    <?php
                    // Ambil data dari tabel keranjang_detail berdasarkan id_keranjang
                    $produk_result = $koneksi->query("SELECT * FROM keranjang_detail WHERE id_keranjang = " . $row['id_keranjang']);
                    while ($produk_row = $produk_result->fetch_assoc()) {
                    ?>
                        <div class="row">
                            <div class="col">
                                <p class='text-success fw-bold'><?= $produk_row['nama_produk']; ?></p>
                            </div>
                            <div class="col">
                                <p class='text-end'><?= $produk_row['jumlah']; ?></p>
                            </div>
                            <div class="col">
                                <p class='text-end'><?= number_format($produk_row['harga_produk'], 0, ",", "."); ?></p>
                            </div>
                            <div class="col">
                                <p class='text-end'><?= number_format($produk_row['subtotal_harga'], 0, ",", "."); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <hr class="mt-0 mb-3">
                    <?php
                    // Menginisialisasi variabel total harga
                    $total_harga = 0;
                    // Ambil data dari tabel keranjang_detail berdasarkan id_keranjang
                    $produk_result = $koneksi->query("SELECT * FROM keranjang_detail WHERE id_keranjang = " . $row['id_keranjang']);
                    // Perulangan untuk menjumlahkan subtotal harga
                    while ($produk_row = $produk_result->fetch_assoc()) {
                        $subtotal_harga = $produk_row['subtotal_harga'];
                        $total_harga += $subtotal_harga;
                    }
                    ?>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col">
                            <p class="fw-bold text-end">Total Harga</p>
                        </div>
                        <div class="col">
                            <p class="fw-bold text-end">Rp <?= number_format($total_harga, 0, ",", "."); ?></p>
                        </div>
                    </div>
                    <hr class="mt-0 mb-2">
                    <h3 class="mt-0 mb-2">Catatan:</h3>
                    <p><?= isset($row['catatan']) ? $row['catatan'] : ''; ?></p>
                    <h3 class="mt-0 mb-2">Metode Pembayaran:</h3>
                    <p class="mb-0  mb-2"><?= isset($row['paymethod']) ? $row['paymethod'] : ''; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>