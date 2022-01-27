<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">

        <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
        <div class="section-header-breadcrumb">
            <a href="<?= site_url('alumni/add')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Alumni Peserta
                Didik </a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4 align="center">Data Siswa</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="myTable">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Akses</th>
                            <th>Opsi</th>

                        </tr>
                        <?php foreach ($siswa as $key => $value) :?>
                        <tr>
                            <td><?= $key +1?></td>
                            <td><?= $value->NIK?></td>
                            <td><?= $value->nama_siswa?></td>
                            <td><?= $value->username?></td>
                            <td><?= $value->password?></td>
                            <td><?= $value->email?></td>
                            <td><?= $value->akses?></td>

                            <td>
                                <a href="<?= base_url('admin/siswa/detail/'. $value->id_siswa)?>"
                                    class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    </div>
</section>
<?= $this->endSection()?>