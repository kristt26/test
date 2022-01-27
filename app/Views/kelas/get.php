<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <a href="<?= site_url('admin/kelas/add')?>" class="btn btn-primary"><i class="fas fa-database"></i>
                Tambah
                Data</a>
        </div>
    </div>

    <div class="section-body">
        <div class="card"><br>
            <h4 align="center">Data Kelas Kursus</h4>
            <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Instruktur</th>
                            <th>Kelas Kursus</th>
                            <th>Jam Kursus</th>
                            <th>Program Kursus</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                        <?php foreach ($kelaskursus as $key => $value) :?>
                        <tr>
                            <td><?= $key +1?></td>
                            <td><?= $value->nm_instruktur?></td>
                            <td><?= $value->waktu?></td>
                            <td><?= $value->jam_mulai?> - <?= $value->jam_selesai?></td>
                            <td><?= $value->program_kursus?></td>
                            <td class="text-center" style="width:15%">
                                <a href="<?= base_url('admin/Kelas/edit/'.$value->id)?>"
                                    class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection()?>