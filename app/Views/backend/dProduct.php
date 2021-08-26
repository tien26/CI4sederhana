<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center">Data Product</h1>
                <?php if(session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif ?>
                <a href="/backend/addProduct" class="btn btn-sm btn-outline-primary">Tambah Data Product</a>
                <table class="table table-dark table-striped mt-3">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Product</th>
                        <th scope="col">Nama Product</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $no = 1; 
                            foreach ($product as $p) :
                        ?>
                        <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $p['kd_product']; ?></td>
                        <td><?= $p['nm_product']; ?></td>
                        <td><?= $p['stok']; ?></td>
                        <td><?= $p['kategori']; ?></td>
                        <td><?= $p['harga']; ?></td>
                        <td><img src="/img/<?= $p['gambar']; ?>" width="50"></td>
                        <td>
                            <a href="/backend/editProduct/<?= $p['id']; ?>" class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="/backend/deleteproduct/<?= $p['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda Yakkin ? ');">Hapus</button>
                            </form>
                        </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>