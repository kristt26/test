<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <a href="<?= site_url('kelas/add')?>" class="btn btn-primary"><i class="fas fa-database"></i> Tambah
                Instruktur</a>
        </div>
    </div>

    <div class="section-body">
        <div class="card"><br>
            <h4 align="center">Data User</h4>
            <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Akses</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                        <?php foreach ($user as $key => $value):?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $value->username ?></td>
                            <td><?= $value->password ?></td>
                            <td><?= $value->email ?></td>
                            <td><?= $value->akses ?></td>
                            <td class="text-center" style="width: 95px;">
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