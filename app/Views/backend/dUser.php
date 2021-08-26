<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center">Data User</h1>
                <table class="table table-dark table-striped mt-3">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Username</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $no =1; 
                        foreach ($user as $u) :
                        ?>
                        <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $u['nama']; ?></td>
                        <td><?= $u['username']; ?></td>
                        <td><?= $u['alamat']; ?></td>
                        <td>
                            <form action="/backend/deleteUser/<?= $u['id']; ?>" method="POST" class="d-inline">
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