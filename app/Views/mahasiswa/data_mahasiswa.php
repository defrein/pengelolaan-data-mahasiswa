<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/mahasiswa/create" class="btn btn-primary mt-3">+ Tambah Data</a>
            <h3 class="mt-2">Daftar Mahasiswa</h3>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <table id="datatable_01" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Tahun Angkatan</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $m) : ?>

                    <tr>
                        <th scope="row"><?= $i++; ?></th>

                        <td><?= $m['nim']; ?></td>
                        <td><?= $m['nama_mhs']; ?></td>
                        <td><?= $m['nama_semester']; ?></td>
                        <td><?= $m['nama_kelas']; ?></td>
                        <td><?= $m['nama_prodi']; ?></td>
                        <td><?= $m['tahun']; ?></td>
                        <td>
                            <a href="/mahasiswa/<?= $m['nim']; ?>" class="btn btn-secondary">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>