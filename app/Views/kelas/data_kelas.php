<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h3 class="my-4">Daftar Kelas</h3>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table id="datatable_01" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Kelas</th>
                        <th scope="col">Nama Kelas</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kelas as $kelas) : ?>

                    <tr>
                        <th scope="row"><?= $i++; ?></th>

                        <td><?= $kelas['id_kelas']; ?></td>
                        <td><?= $kelas['nama_kelas']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>