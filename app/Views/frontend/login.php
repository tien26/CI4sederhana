<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>
<div class="container content">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Halaman Login</h5>
                </div>
                <?php if(session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif ?>
                <div class="card-body">
                    <form action="/frontend/prosesLogin" method="POST">
                        <?php csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Masukan Username Akun...">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="mb-3">
                                    <label for="pass" class="form-label">Password</label>
                                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="pass" name="pass" placeholder="Masukan Password Akun...">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary" type="submit">Masuk</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>