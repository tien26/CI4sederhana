<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

    <div class="container content">
        <div class="row justify-content-center">
            
            <div class="col-md-3">
                <div class="card border-secondary mb-3">
                    <div class="card-header">Data Product</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Jumlah Data : <?= $product; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-secondary mb-3">
                    <div class="card-header">Data User</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Jumlah Data : <?= $user; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-secondary mb-3">
                    <div class="card-header">Data Payment</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Jumlah Data : 12</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?= $this->endSection(); ?>