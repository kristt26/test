<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin/detailkelas')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Kelas Kursus</h1>

    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body" col-md>
                <form action="<?= base_url('admin/detailkelas/save')?>" method="post" autocomplete="off">
                    <?= csrf_field()?>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nama Siswa</label>
                                <select class="form-control select2 " name="id_siswa" required>
                                    <?php foreach ($siswa as $key => $value)  : ?>
                                    <option value="<?= $value->id_siswa?>"><?= $value->nama_siswa?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Program Kursus</label>
                                <select class="form-control select2 " name="id_program" required>
                                    <?php foreach ($programkursus as $key => $value)  : ?>
                                    <option value="<?= $value->id_program?>"><?= $value->program_kursus?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Kelas Kursus</label>
                                <select class="form-control select2 " name="id_kelas" required>
                                    <?php foreach ($kelas as $key => $value)  : ?>
                                    <option value="<?= $value->id?>"><?= $value->waktu?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Jam Kursus</label>
                                <select class="form-control select2 " name="id_kelas" required>
                                    <?php foreach ($kelas as $key => $value)  : ?>
                                    <option value="<?= $value->id?>"><?= $value->jam_mulai?> -
                                        <?= $value->jam_selesai?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Status</label>
                                <select class="form-control" name="status" disabled>
                                    <option>Registrasi</option>

                                </select>
                            </div>

                        </div>

                        <div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>
                                Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>