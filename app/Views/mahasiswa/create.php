<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h3 class="my-3">Form Tambah Data Mahasiswa</h3>

            <form action="/mahasiswa/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama_mhs" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= validation_show_error('nama_mhs') ? 'is-invalid' : ''; ?>"
                            id="nama_mhs" name="nama_mhs" autofocus value="<?= old('nama_mhs'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('nama_mhs') ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_prodi" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                        <select id="id_prodi" name="id_prodi" class="custom-select" aria-describedby="prodiHelpBlock">
                            <?php foreach($prodi as $p): ?>
                            <option value="<?= $p['id_prodi'] ?>"><?= $p['nama_prodi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span id="prodiHelpBlock" class="form-text text-muted">Pilih Prodi</span>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select id="id_kelas" name="id_kelas" class="custom-select" aria-describedby="kelasHelpBlock">
                            <?php foreach($kelas as $k): ?>
                            <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span id="kelasHelpBlock" class="form-text text-muted">Pilih kelas</span>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_semester" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                        <select id="id_semester" name="id_semester" class="custom-select"
                            aria-describedby="semesterHelpBlock">
                            <?php foreach($semester as $s): ?>
                            <option value="<?= $s['id_semester'] ?>"><?= $s['nama_semester'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span id="semesterHelpBlock" class="form-text text-muted">Pilih semester</span>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                    <div class="col-sm-10">
                        <select id="id_angkatan" name="id_angkatan" class="custom-select"
                            aria-describedby="angkatanHelpBlock">
                            <?php foreach($angkatan as $a): ?>
                            <option value="<?= $a['id_angkatan'] ?>"><?= $a['tahun'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span id="angkatanHelpBlock" class="form-text text-muted">Pilih angkatan</span>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">

                        <input type="text"
                            class="form-control <?= validation_show_error('alamat') ? 'is-invalid' : ''; ?>" id="alamat"
                            name="alamat" autofocus value="<?= old('alamat'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('alamat') ?>

                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                    <div class="col-sm-10">

                        <input type="number"
                            class="form-control <?= validation_show_error('telepon') ? 'is-invalid' : ''; ?>"
                            id="telepon" name="telepon" autofocus value="<?= old('telepon'); ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('telepon') ?>

                        </div>
                    </div>
                </div>

                <a href="/mahasiswa" class="btn btn-danger my-2">Batal</a>
                <button type="submit" class="btn btn-primary my-2">Tambah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>