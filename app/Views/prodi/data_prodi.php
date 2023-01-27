<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h3 class="my-4">Daftar Prodi</h3>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table id="datatable_01" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Prodi</th>
                        <th scope="col">Nama Prodi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($prodi as $p) : ?>

                    <tr>
                        <th scope="row"><?= $i++; ?></th>

                        <td><?= $p['id_prodi']; ?></td>
                        <td><?= $p['nama_prodi']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>