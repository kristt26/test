        <div class="section-body">
            </div>
            <div class="card-header">
                <table align="right">
                    <tbody align="center">
                        <?php foreach ($siswa as $value) :?>
                        <tr>
                            <td>Nomor Induks Siswa</td>
                        </tr>
                        <tr>
                            <td><?= $value->NIS?></td>
                        </tr>
                    </tbody>
                    </table>
            <div class="card">
                    <h1 align="center">BIODATA SISWA</h1>
                    <h3 align="center">YAYASAN SENTRA ANUGRAH MANDIRI</h3>
                  <br>
                  <div class="card-body ">
                     
                    <label><b> A. DATA SISWA</b></label>
                 
                    <table>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?= $value->NIK?></td>
                            <td align="right">Foto></td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>:</td>
                            <td><?= $value->nm_siswa?></td>
                        </tr>
                        <tr>
                            <td>Tempat Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= $value->tmpt_lhr?>, <?= $value->tgl_lahir?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?= $value->agama?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= $value->jns_kelamin?></td>
                        </tr>
                        <tr>
                            <td>Transportasi</td>
                            <td>:</td>
                            <td><?= $value->transportasi?></td>
                        </tr>
                        <tr>
                            <td>Nomor HP</td>
                            <td>:</td>
                            <td><?= $value->nmr_telp?></td>
                        </tr>
                    </table><br>
                    <label><b>B. DATA ALAMAT</b></label>
                    <table>
                        <tr>
                            <td style="width: 150px;">Jenis Tinggal</td>
                            <td>:</td>
                            <td style="width: 400px;"><?= $value->jns_tinggl?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $value->alamat?></td>
                        </tr>
                        <tr>
                            <td>Nama Dusun</td>
                            <td>:</td>
                            <td><?= $value->nm_dusun?></td>
                        </tr>
                        <tr>
                            <td>Wilaya</td>
                            <td>:</td>
                            <td><?= $value->wilaya?></td>
                        </tr>
                        <tr>
                            <td>Kabupaten / Kota</td>
                            <td>:</td>
                            <td><?= $value->kabupaten_kota?></td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td><?= $value->kecamatan?></td>
                        </tr>
                        <tr>
                            <td>Kelurahan</td>
                            <td>:</td>
                            <td><?= $value->kelurahan?></td>
                        </tr>
                    </table><br>
                    <label><b>C. DATA ORANG TUA</b></label>
                    <table>
                        <tr>
                            <td style="width: 150px;">Nama Ayah</td>
                            <td>:</td>
                            <td style="width: 400px;"><?= $value->nm_ayah?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ayah</td>
                            <td>:</td>
                            <td><?= $value->pekerjaan_ayah?></td>
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td><?= $value->nm_ibu?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ibu</td>
                            <td>:</td>
                            <td><?= $value->pekerjaan_ibu?></td>
                        </tr>
                    </table><br>
                    <label><b>D. DATA KELAS</b></label>
                    <table>
                        <tr>
                            <td style="width: 150px;">Program Kursus</td>
                            <td>:</td>
                            <td style="width: 400px;"><?= $value->kelas_kursus?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?= $value->kelas_masuk?></td>
                        </tr>
                        <tr>
                            <td>Tahun Masuk</td>
                            <td>:</td>
                            <td><?= $value->tahun_masuk?></td>
                        </tr>
                    <?php endforeach;?>

                    </table>
               
                   
                  </div>
                         
            </div>
        </div>
        <script type="text/javascript">
                        window.print();
                    </script>