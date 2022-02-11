<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<script>
$.LoadingOverlay("show");
</script>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div id="flash" data-flash="<?= session()->getFlashdata('success'); ?>"></div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Peserta Registrasi </h4>
                        </div>
                        <div class="card-body">
                            <?= $tot_registrasi;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-restroom"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Peserta Didik</h4>
                        </div>
                        <div class="card-body">
                            <?= $tot_siswa;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Alumni</h4>
                        </div>
                        <div class="card-body">
                            <?=$tot_alumni;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total</h4>
                        </div>
                        <div class="card-body">
                            <?=$tot_siswa+$tot_alumni;?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>
<script>
$.LoadingOverlay("hide");
</script>
<?= $this->endSection()?>