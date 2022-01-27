<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <h4 align="center">Data Alumni Siswa</h4>

        </div>
    </div>

    <div class="section-body">
        <div class="card"><br>

            <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Keluar</th>
                            <th>Keterangan</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                        <?php foreach ($alumni as $key => $value) :?>
                        <tr>
                            <td><?= $key+1?></td>
                            <td><?= $value->nama_siswa?></td>
                            <td><?= $value->alamat?></td>
                            <td><?= $value->nohp?></td>
                            <td><?= $value->tahun_masuk?></td>
                            <td><?= $value->tahun_keluar?></td>
                            <td><?= $value->keterangan?></td>

                            <td class="text-center" style="width: 2px;">
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection()?>