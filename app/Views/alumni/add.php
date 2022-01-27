<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('siswa')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Peserta didik</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Alumni / Peserta Didik</h4>
            </div>
            <div class="card-body" col-md-5>
                <form action="<?= site_url('admin/alumni/save')?>" method="post" autocomplete="off">
                    <?= csrf_field()?>
                    <div class="form-group">
                        <label>Nama siswa</label>
                        <select class="form-control select2 " name="id_siswa" required>
                            <?php foreach ($siswa as $key => $value)  : ?>
                            <option value="<?= $value->id_siswa?>"><?= $value->nama_siswa?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Keluar</label>
                        <input type="date" name="tahun_keluar" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <select class="form-control" name="keterangan">
                            <option></option>
                            <option>Lulus</option>
                            <option>Cuti</option>
                            <option>Keluar</option>
                            <option>Tanpa Keterangan</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>