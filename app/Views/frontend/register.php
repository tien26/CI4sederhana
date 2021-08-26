<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>
<div class="container content">
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">Halaman Registrasi Akun</h5>
                </div>
                <?php if(session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif ?>
                <div class="card-body">
                    <form action="/frontend/saveRegister" method="POST">
                    <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Masukan Nama Lengkap Anda..." value="<?= old('nama'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Buat Username Akun..." value="<?= old('username'); ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pass" class="form-label">Password</label>
                                    <input type="password" class="form-control <?= ($validation->hasError('pass')) ? 'is-invalid' : ''; ?>" id="pass" name="pass" placeholder="Buat Password Akun...">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('pass'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kpass" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control <?= ($validation->hasError('kpass')) ? 'is-invalid' : ''; ?>" id="kpass" name="kpass" placeholder="Buat Ulangi Password Akun...">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('kpass'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 text-center">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea type="password" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="Masukan Alamat Anda..."><?= old('alamat'); ?></textarea>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="submit">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                <div class="row mt-3">
                    <div class="col text-center">
                        <a href="/frontend/login" class="link-secondary">Login</a>
                    </div>
                </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>