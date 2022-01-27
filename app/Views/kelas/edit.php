<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin/kelas')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Kelas Kursus</h1>

    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body" col-md>
                <form action="<?= base_url('admin/Kelas/update/'. $kelaskursus->id)?>" method="post" autocomplete="off">
                    <?= csrf_field()?>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nama Instruktur</label>
                                <select class="form-control select2 " name="id_instruktur" required>
                                    <?php foreach ($instruktur as $key => $value)  : ?>
                                    <option value="<?= $value->id_instruktur?>"><?= $value->nm_instruktur?></option>
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
                                <select class="form-control" name="waktu">
                                    <option></option>
                                    <option>Pagi</option>
                                    <option>Siang</option>
                                    <option>Sore</option>
                                    <option>Malam</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Jam Mulai</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" name="jam_mulai"
                                        value="<?= $kelaskursus->jam_mulai?>">
                                </div>
                            </div>
                            <div class=" form-group col-md-4">
                                <label>Jam Selesai</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" name="jam_selesai"
                                        value="<?= $kelaskursus->jam_selesai?>">
                                </div>
                            </div>

                        </div>

                        <div>
                            <button type=" submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>
                                Ubah Data</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>