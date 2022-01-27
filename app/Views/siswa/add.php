<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('siswa')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Registrasi Siswa</h1>

    </div>
    <div class="section-body">

        <form action="<?= site_url('siswa')?>" method="post" autocomplete="off">
            <?= csrf_field()?>
            <div class="card">
                <div class="card-header">
                    <h4>Data Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>NIS</label>
                            <input type="text" class="form-control" value="OTOMATIS" readonly=:"block">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Lengkap"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>NIK</label>
                            <input type="text" class="form-control" name="NIK" placeholder="NIK" required>
                        </div>

                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tmpt_lhr">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control datepicker" name="tgl_lahir">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Agama</label>
                            <select class="form-control" name="agama">
                                <option></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Jenis kelamin</label>
                            <select class="form-control" name="jns_kelamin">
                                <option></option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Transportasi</label>
                            <input type="text" class="form-control" name="transportasi">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nomor Telepon</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control phone-number" name="nmr_telp">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-header">
                    <h4>Data Alamat</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Jenis Tinggal</label>
                            <input type="text" class="form-control" name="jns_tinggl">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Nama Dusun</label>
                            <input type="text" class="form-control" name="nm_dusun">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Wilayah</label>
                            <input type="text" class="form-control" name="wilaya">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Kabupaten/Kota</label>
                            <input type="text" class="form-control" name="kabupaten_kota">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Kelurahan</label>
                            <input type="text" class="form-control" name="kelurahan">
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h4>Data Orang Tua</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Nama Ayah</label>
                            <input type="text" class="form-control" name="nm_ayah">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Pekerjaan Ayah</label>
                            <input type="text" class="form-control" name="pekerjaan_ayah">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Nama Ibu</label>
                            <input type="text" class="form-control" name="nm_ibu">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Pekerjaan Ibu</label>
                            <input type="text" class="form-control" name="pekerjaan_ibu">
                        </div>

                    </div>
                </div>
                <div class="card-header">
                    <h4>Data Kelas</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Program Kursus</label>
                            <select class="form-control" name="id_kelas" required>
                                <option value=""></option>
                                <?php foreach ($kelas as $key => $value)  : ?>
                                <option value="<?= $value->id_kelas?>"><?= $value->kelas_kursus?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas_masuk">
                                <option></option>
                                <option>Pagi</option>
                                <option>Siang</option>
                                <option>Sore</option>
                                <option>Malam</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tahun Masuk</label>
                            <input type="date" class="form-control" name="tahun_masuk">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= site_url('siswa')?>" type="submit" class="btn btn-danger"><i
                            class="fas fa-arrow-left"></i></a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Simpan</button>
                </div>
            </div>
    </div>
    </form>
</section>
<?= $this->endSection()?>