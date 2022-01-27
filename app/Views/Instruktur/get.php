<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <a href="<?= site_url('instruktur/add')?>" class="btn btn-primary"><i class="fas fa-database"></i> Tambah
                Instruktur</a>
        </div>
    </div>

    <div class="section-body">
        <div class="card"><br>
            <h4 align="center">Data Instruktur</h4>
            <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Instruktur</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Akses</th>
                            <th class="text-center">Opsi</th>
                        </tr>

                        <?php foreach ($instruktur as $key => $value):?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $value->nm_instruktur ?></td>
                            <td><?= $value->alamat ?></td>
                            <td><?= $value->nohp ?></td>
                            <td><?= $value->username ?></td>
                            <td><?= $value->email ?></td>
                            <td><?= $value->akses ?></td>

                            <td class="text-center" style="width: 95px;">
                                <a href="<?= base_url('admin/instruktur/edit/'.$value->id_instruktur)?>"
                                    class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
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