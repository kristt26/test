<html>

<head>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #000000;
        text-align: center;
        height: 20px;
        margin: 8px;
    }
    </style>
</head>

<body>
    <?php if($key==1):?>
    <h5 style="font-size:12px; text-align: center;">DAFTAR HADIR PESERTA PELATIHAN KOMPUTER
        <br>KEGIATAN PELAKSANAAN PELATIHAN BERDARKAN UNIT KOMPETENSI
        <br>PROGRAM PELATIHAN KERJA DAN PRODUKTIVITAS TENAGA KERJA
        <br>DINAS TENAGA KERJA KOTA JAYAPURA TAHUN ANGGARAN 2021
        <br>KELAS <?= strtoupper($kelas->program_kursus)?>
    </h5><br>
    <hr>
    <h4>LOKASI: LPK. SENTRA ANUGERAH MANDIRI</h4>
    <?php endif;?>
    <table cellpadding="6">
        <thead>
            <tr>
                <th rowspan="3">No</th>
                <th rowspan="3">Nama Peserta</th>
                <th colspan="<?= count($tanggal)?>">Keterangan Kehadiran</th>
            </tr>
            <tr>
                <?php foreach($tanggal as $key=>$value):?>
                <th><?= $value->hari?></th>
                <?php endforeach;?>
            </tr>
            <tr>
                <?php foreach($tanggal as $key=>$value):?>
                <th><?= $value->tanggal?></th>
                <?php endforeach;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($siswa as $key=>$value):?>
                <tr>
                    <td><?= $key+1?></td>
                    <td><?= $value->nama_siswa?></td>
                    <?php foreach($value->absen as $key1=>$ab):?>
                    <td><?= $ab['status']?></td>
                    <?php endforeach;?>
                </tr>
            <?php endforeach;?>
        </tbody>
        <!--  -->
    </table>
</body>

</html>