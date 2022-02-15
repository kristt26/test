<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <h4 align="center">Data Siswa Registrasi</h4>
        <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
    </div>
    <div class="section-body">
        <div class="card">

            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $key => $value) :?>
                        <?php if ($value->nis != null):?>
                        <tr>
                            <td><?= $key +1?></td>
                            <td><?= $value->nis?></td>
                            <td><?= $value->nama_siswa?></td>
                            <td><?= $value->tempat_lahir?>, <?= $value->tanggal_lahir?></td>
                            <td><?= $value->jenis_kelamin?></td>
                            <td><?= $value->alamat?></td>

                            <td>
                                <a href="<?= base_url('admin/siswa/detail/'. $value->id_siswa)?>"
                                    class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <?php endif?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    </div>
</section>
<?= $this->endSection()?>