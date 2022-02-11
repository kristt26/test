<?= $this->extend('layout/template')?>
<?= $this->section('content')?>

<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <a href="<?= base_url('admin/programkursus/add')?>" class="btn btn-primary"><i class="fas fa-database"></i>
                Tambah
                Data</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Program Kursus</th>
                                    <th class=" text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($programkursus as $key => $value) :?>
                                <tr>
                                    <td><?= $key +1?></td>
                                    <td><?= $value->program_kursus?></td>
                                    <td class="text-center" style="width:15%">
                                        <a href="<?= base_url('admin/programkursus/edit/'.$value->id_program)?>"
                                            class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection()?>