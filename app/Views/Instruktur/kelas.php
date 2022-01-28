<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<section class="section" ng-controller="kelasController">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('siswa')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Kelas kursus</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Daftar Kelas</h4>
                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Daftar</button> -->
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
                                <th><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="item in datas.kursus">
                                <td>{{$index+1}}</td>
                                <td>{{item.program_kursus}}</td>
                                <td>{{item.waktu}}</td>
                                <td>{{item.jam_mulai}}</td>
                                <td>{{item.jam_selesai}}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                        ng-click="setAbsen(item)">Absen</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-prymary">
                    <h5 class="modal-title">Absen {{model.program_kursus}} kelas {{model.waktu}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" width="10%">No</th>
                                    <th rowspan="2">Nama Siswa</th>
                                    <th colspan="4" width="25%" class="text-center">Absen</th>
                                </tr>
                                <tr>
                                    <th class="text-center">H</th>
                                    <th class="text-center">A</th>
                                    <th class="text-center">I</th>
                                    <th class="text-center">S</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in model.siswa">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.nama_siswa}}</td>
                                    <td class="text-center">
                                        <div class="form-check form-check-inline" style="margin-right: 0rem">
                                            <input class="form-check-input" type="radio"
                                                name="inlineRadioOptions{{$index}}" id="inlineRadio1{{$index}}"
                                                value="H" ng-model="item.keterangan" ng-change="save(item)">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline" style="margin-right: 0rem">
                                            <input class="form-check-input" type="radio"
                                                name="inlineRadioOptions{{$index}}" id="inlineRadio1{{$index}}"
                                                value="A" ng-model="item.keterangan" ng-change="save(item)">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline" style="margin-right: 0rem">
                                            <input class="form-check-input" type="radio"
                                                name="inlineRadioOptions{{$index}}" id="inlineRadio1{{$index}}"
                                                value="I" ng-model="item.keterangan" ng-change="save(item)">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline" style="margin-right: 0rem">
                                            <input class="form-check-input" type="radio"
                                                name="inlineRadioOptions{{$index}}" id="inlineRadio1{{$index}}"
                                                value="S" ng-model="item.keterangan" ng-change="save(item)">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class=" modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$.LoadingOverlay("hide");
</script>
<?= $this->endSection()?>