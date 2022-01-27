<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin/programkursus')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Program Kursus</h1>

    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Kelas / Kursus</h4>
            </div>
            <div class="card-body" col-md-5>
                <form action="<?= base_url('admin/ProgramKursus/save')?>" method="post" autocomplete="off">
                    <?= csrf_field()?>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" name="program_kursus" class="form-control" required autofocus>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>