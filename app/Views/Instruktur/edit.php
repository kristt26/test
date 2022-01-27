<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin/instruktur')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Instruktur</h1>

    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body" col-md>
                <form action="<?= base_url('admin/instruktur/update/' . $instruktur->id_instruktur)?>" method="post"
                    autocomplete="off">
                    <?= csrf_field()?>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nama Instruktur</label>
                                <input type="text" class="form-control" name="nm_instruktur"
                                    value="<?= $instruktur->nm_instruktur?>">
                            </div>
                            <div class=" form-group col-md-4">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $instruktur->alamat?>"
                                    required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" name="nohp" value="<?= $instruktur->nohp?>"
                                    required>
                            </div>

                        </div>


                        <div class="">
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