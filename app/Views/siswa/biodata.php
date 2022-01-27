<?= $this->extend('layout/template1')?>
<?= $this->section('content')?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('siswa')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Form Biodata</h1>
    </div>
    <div class="section-body">
        <ui-view></ui-view>
    </div>
</section>
<?= $this->endSection()?>