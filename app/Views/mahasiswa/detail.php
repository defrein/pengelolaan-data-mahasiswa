<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mt-2">Detail Mahasiswa</h3>
            <div class="card mb-3" style="max-width: 520px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <table border="0">
                                <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td><?= $mahasiswa['nim']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $mahasiswa['nama_mhs']; ?></td>
                                </tr>
                                <tr>
                                    <td>Prodi</td>
                                    <td>:</td>
                                    <td><?= $mahasiswa['nama_prodi']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td><?= $mahasiswa['nama_kelas']; ?></td>
                                </tr>
                                <tr>
                                    <td>Semester</td>
                                    <td>:</td>
                                    <td><?= $mahasiswa['nama_semester']; ?></td>
                                </tr>
                                <tr>
                                    <td>Angkatan</td>
                                    <td>:</td>
                                    <td><?= $mahasiswa['tahun']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $mahasiswa['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>:</td>
                                    <td><?= $mahasiswa['telepon']; ?></td>
                                </tr>
                            </table>
                            <a href="/mahasiswa/edit/<?= $mahasiswa['nim']; ?>" class="my-3 btn btn-warning">Edit</a>
                            <form action="/mahasiswa/<?= $mahasiswa['nim']; ?>" method="post" class="mt-3 d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                            </form>
                            <a href="/mahasiswa/" class="mt-3 d-inline btn btn-secondary">Kembali</a>
                            <br><br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>