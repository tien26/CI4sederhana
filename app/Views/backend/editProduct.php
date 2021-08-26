<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>
<div class="container content">
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">Halaman Edit Data Product</h5>
                </div>
                <?php if(session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif ?>
                <div class="card-body">
                    <form action="/backend/updateProduct/<?= $product['id']; ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $product['id']; ?>">
                    <input type="hidden" name="gambarlama" value="<?= $product['gambar']; ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kd_product" class="form-label">Kode Product</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('kd_product')) ? 'is-invalid' : ''; ?>" id="kd_product" name="kd_product" placeholder="Masukan Kode Product .." value="<?= (old('kd_product')) ? old('kd_product') : $product['kd_product']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('kd_product'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nm_product" class="form-label">Nama Product</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nm_product')) ? 'is-invalid' : ''; ?>" id="nm_product" name="nm_product" placeholder="Masukan Nama Product.." value="<?= (old('nm_product')) ? old('nm_product') : $product['nm_product']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('nm_product'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" placeholder="Masukan Stok Product.." value="<?= (old('stok')) ? old('stok') : $product['stok']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('stok'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" placeholder="Masukan Kategori Product.." value="<?= (old('kategori')) ? old('kategori') : $product['kategori']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('kategori'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" placeholder="Masukan Harga Product.." value="<?= (old('harga')) ? old('harga') : $product['harga']; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('harga'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" value="<?= old('gambar'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('gambar'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="submit">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>