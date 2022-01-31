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
                            <th>Keterangan</th>
                        </tr>
                        <?php 
                        $no=0
                        ?>
                        <?php foreach ($detailkelas as $key => $value) :?>
                        <?php if ($value->status=='Lulus'):?>
                        <?php $no++?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= $value->nama_siswa?></td>
                            <td><?= $value->alamat?></td>
                            <td><?= $value->nohp?></td>
                            <td><?= $value->tahun_masuk?></td>
                            <td><?= $value->status?></td>


                        </tr>
                        <?php endif?>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection()?>