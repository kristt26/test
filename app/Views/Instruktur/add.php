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
                <form action="<?= base_url('admin/Instruktur/save')?>" method="post" autocomplete="off">
                    <?= csrf_field()?>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nama Instruktur</label>
                                <input type="text" class="form-control" name="nm_instruktur">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" name="nohp" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
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