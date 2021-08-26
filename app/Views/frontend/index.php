<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<div class="container content">
  <div class="row">
    <div class="col mt-3">
      <h1>Menu Makanan</h1>
    </div>
  </div>
  <div class="row">
    <?php 
    foreach ($product as $p) :
    ?>
    <div class="col-md-3 my-3 text-center">
      <div class="card" style="width: 15rem;">
        <img src="/img/<?= $p['gambar']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $p['nm_product']; ?></h5>
          <p>Rp. <?= $p['harga']; ?> || <span>Stok <b><?= $p['stok']; ?></b> Porsi</span></p>
          <a href="/frontend/login" class="btn btn-primary">Pesen</a>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>
  
</div>

<?= $this->endSection(); ?>