<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <a href="<?= site_url('detailkelas/add')?>" class="btn btn-primary"><i class="fas fa-database"></i> Tambah
                Kelas Kursus</a>
        </div>
    </div>

    <div class="section-body">
        <div class="card"><br>
            <h4 align="center">Data Peserta Kursus</h4>
            <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Program Kursus</th>
                            <th>Kelas</th>
                            <th>Jam Kursus</th>
                            <th>Status</th>
                            <th class="text-center">Opsi</th>
                            <th class="text-center">Opsi Status</th>
                        </tr>

                        <?php foreach ($detailkelas as $key => $value) :?>
                        <tr>
                            <td><?= $value->id_siswa?></td>
                            <td><?= $value->nama_siswa?></td>
                            <td><?= $value->program_kursus?></td>
                            <td><?= $value->waktu?></td>
                            <td><?= $value->jam_mulai?> - <?= $value->jam_selesai?></td>
                            <td>
                                <?= $value->status?>
                            </td>
                            <td class="text-center" style="width: 95px;">
                                <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>


                            </td>

                            <td class="text-center" style="width: 189px;">

                                <a href="<?= base_url('admin/detailkelas/updatestatus?status=Aktif&id=').$value->id?>"
                                    class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                <a href="<?= base_url('admin/detailkelas/updatestatus?status=Lulus&id=').$value->id ?>"
                                    class="btn btn-info btn-sm"><i class="fas fa-graduation-cap"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection()?>