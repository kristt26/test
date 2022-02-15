<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin/siswa') ?>" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i>
                Kembali</a>
        </div>

    </div>

    <div class="section-body">
        <div class="card">
            <br>
            <h4 align="center">BIODATA PESERTA DIDIK</h4>
            <h6 align="center">YAYASAN SENTRA ANUGRAH MANDIRI</h6>

            <div class="card-body ">
                <form>
                    <table>
                        <tr>
                            <td>
                                <a href="<?= site_url('siswa/print') ?>" class="btn btn-success btn-sm"><i
                                        class="fas fa-print"> Print</i></a>
                            </td>
                        </tr>
                    </table><br>
                    <label><b> A. DATA SISWA</b></label>
                    <table>
                        <tr>
                            <td style="width: 150px;">NIS</td>
                            <td>:</td>
                            <td style="width: 400px;"><?= $siswa['nis'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>:</td>
                            <td><?= $siswa['nama_siswa'] ?></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?= $siswa['nik'] ?></td>
                        </tr>
                        <tr>
                            <td>Tempat Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= $siswa['tempat_lahir'] ?>,
                                <?= $siswa['tanggal_lahir'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?= $siswa['agama'] ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= $siswa['jenis_kelamin'] ?></td>
                        </tr>
                        <tr>
                            <td>Transportasi</td>
                            <td>:</td>
                            <td><?= $siswa['transportasi'] ?></td>
                        </tr>
                        <tr>
                            <td>Nomor HP</td>
                            <td>:</td>
                            <td><?= $siswa['nohp'] ?></td>
                        </tr>
                    </table><br>
                    <label><b>B. DATA ALAMAT</b></label>
                    <table>
                        <tr>
                            <td style="width: 150px;">Jenis Tinggal</td>
                            <td>:</td>
                            <td style="width: 400px;"><?= $siswa['jenis_tinggal'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $siswa['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Dusun</td>
                            <td>:</td>
                            <td><?= $siswa['dusun'] ?></td>
                        </tr>
                        <tr>
                            <td>Wilaya</td>
                            <td>:</td>
                            <td><?= $siswa['wilaya'] ?></td>
                        </tr>
                        <tr>
                            <td>Kabupaten / Kota</td>
                            <td>:</td>
                            <td><?= $siswa['kabupaten_kota'] ?></td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td><?= $siswa['kecamatan'] ?></td>
                        </tr>
                        <tr>
                            <td>Kelurahan</td>
                            <td>:</td>
                            <td><?= $siswa['kelurahan'] ?></td>
                        </tr>
                    </table><br>
                    <label><b>C. DATA ORANG TUA</b></label>
                    <table>
                        <tr>
                            <td style="width: 150px;">Nama Ayah</td>
                            <td>:</td>
                            <td style="width: 400px;"><?= $siswa['nama_ayah'] ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ayah</td>
                            <td>:</td>
                            <td><?= $siswa['pekerjaan_ayah'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td><?= $siswa['nama_ibu'] ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ibu</td>
                            <td>:</td>
                            <td><?= $siswa['pekerjaan_ibu'] ?></td>
                        </tr>
                    </table><br>
                    <label><b>C. DATA KURSUS</b></label>


                </form>

            </div>

        </div>
    </div>
    <div class="section-body">
        <div class="card">

            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Program Kursus</th>
                            <th>Jam Kursus</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no=1;
                        ?>
                        <?php foreach ($detailkelas as $key => $value) :?>
                        <?php if ($value->id_siswa == $siswa['id_siswa']):?>

                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $value->program_kursus?></td>
                            <td><?= $value->jam_mulai?> - <?= $value->jam_selesai?></td>
                            <td><?= $value->waktu?> </td>
                            <td><?= $value->status?></td>
                        </tr>
                        <?php endif?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</section>
<?= $this->endSection() ?>