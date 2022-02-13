<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <h4 align="center">PENOMORAN NIS</h4>

        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body table-responsive">
                <?php foreach ($idsiswa as $s => $value):?>
                <form action="<?= base_url('admin/detailkelas/savenis/'.$value['id_siswa'])?>" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text"
                                class="form-control  <?= ($validation->hasError('nis'))?'is-invalid' : '' ?>" name="nis"
                                value="<?= $PenomoranNis?>" readonly>
                            <div id=" validationServer03Feedback" class="invalid-feedback">
                                <?= ($validation->getError('nis'))?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control datepicker" value="<?= $value['nama_siswa']?>"
                                disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-success  float-right"><i
                                    class="fas fa-paper-plane"></i>
                                Simpan</button>
                        </div>
                    </div>
                </form>
                <?php endforeach?>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>NIK</th>
                            <th>Nama</th>

                            <th>Opsi</th>

                        </tr>

                    </thead>
                    <tbody>
                        <?php $no=1?>
                        <?php foreach ($siswa as $key => $value) :?>
                        <?php if($value->nis != null) : ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $value->nis?></td>
                            <td><?= $value->nik?></td>
                            <td><?= $value->nama_siswa?></td>
                            <td>
                                <a href="<?= base_url('admin/siswa/detail/'. $value->id_siswa)?>"
                                    class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</section>
<?= $this->endSection()?>