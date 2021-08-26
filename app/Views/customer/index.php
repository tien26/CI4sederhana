<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<div class="container content">
  <div class="row">
    <div class="col mt-3">
      <h1>Menu Makanan</h1>
    </div>
  </div>
    <?php if(session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
    <?php endif ?>
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
          <a href="#" class="btn btn-primary">Pesen</a>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>
  
  <!-- modal profil -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Profil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card text-center">
                  <div class="card-header">
                    <?= session('nama'); ?>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Username : <?= session('username'); ?></li>
                    <li class="list-group-item">Alamat : <?= session('alamat'); ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Edit</button>
          </div>
        </div>
      </div>
    </div>

<?= $this->endSection(); ?>