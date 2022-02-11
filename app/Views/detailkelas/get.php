<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <h4 align="center">Data Kelas Siswa</h4>

        </div>
    </div>

    <div class="section-body">
        <div class="card"><br>
            <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Program Kursus</th>
                            <th>Kelas</th>
                            <th>Jam Kursus</th>
                            <th>Status</th>
                            <th class="text-center"><i class="fas fa-cogs"></i>
                            </th>
                            <th class="text-center"><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1
                    
                        ?>
                        <?php foreach ($detailkelas as $key => $value) :?>

                        <?php if ($value->status!='Lulus') :?>

                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $value->nis?></td>
                            <td><?= $value->nama_siswa?></td>
                            <td><?= $value->program_kursus?></td>
                            <td><?= $value->waktu?></td>
                            <td><?= $value->jam_mulai?> - <?= $value->jam_selesai?></td>
                            <td>
                                <?= $value->status?>
                            </td>


                            <td class="text-center" style="width: 45px;">
                                <?php if($value->status == 'Registrasi'): ?>
                                <form action="<?= base_url('admin/detailkelas/updateaktif/' . $value->id)?>"
                                    method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="idsiswa" value="<?=  $value->id_siswa ?>">
                                    <input type="hidden" name="nislama" value="<?=  $value->nis ?>">
                                    <button type="submit" class="btn btn-success btn-sm"><i
                                            class="fas fa-check"></i></button>
                                </form>
                                <!-- <a href="< base_url('admin/detailkelas/updateaktif/' . $value->id_siswa)?>"
                                    class="btn btn-success btn-sm"><i class="fas fa-check"></i></a> -->
                                <?php endif ?>
                                <?php if($value->status == 'Aktif'): ?>
                                <a href="<?= base_url('admin/detailkelas/updatestatus?status=Lulus&id=').$value->id ?>"
                                    class="btn btn-info btn-sm"><i class="fas fa-graduation-cap"></i></a>
                                <?php endif ?>
                            </td>
                            <td class="text-center" style="width: 45px;">
                                <a href="<?= base_url('admin/detailkelas/updatestatus?status=Registrasi&id=').$value->id ?>"
                                    class="btn btn-danger btn-sm"><i class="fas fa-sign-in-alt"></i></a>
                            </td>
                        </tr>
                        <?php endif?>
                        <?php endforeach;?>


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection()?>