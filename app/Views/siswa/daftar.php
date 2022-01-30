<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section" ng-controller="daftarController">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('siswa')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Daftar Program kursus</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Daftar Kursus</h4>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Daftar</button>
            </div>
            <div class="card-body">
                <div class="table-respinsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Program Kursus</th>
                                <th>Waktu Kursus</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Instruktur</th>
                                <th>Status</th>
                                <!-- <th><i class="fa fa-cog"></i></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas.kursus">
                                <td>{{$index+1}}</td>
                                <td>{{item.program_kursus}}</td>
                                <td>{{item.waktu}}</td>
                                <td>{{item.jam_mulai}}</td>
                                <td>{{item.jam_selesai}}</td>
                                <td>{{item.nm_instruktur}}</td>
                                <td>{{item.status}}</td>
                                <!-- <td></td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-prymary">
                    <h5 class="modal-title">Daftar Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form ng-submit="save()">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    ng-model="datas.siswa.nik">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Siswa</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="nama"
                                    ng-model="datas.siswa.nama_siswa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="program" class="col-sm-4 col-form-label">Program Kursus</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="program"
                                    ng-options="item as item.program_kursus for item in datas.program"
                                    ng-model="program"></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="kelas"
                                    ng-options="item as item.waktu for item in program.kelas"
                                    ng-change="model.id_kelas=kelas.id; model.id_siswa=datas.siswa.id_siswa"
                                    ng-model="kelas"></select>
                            </div>
                        </div>
                    </div>
                    <div class=" modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
$.LoadingOverlay("hide");
</script>
<?= $this->endSection()?>