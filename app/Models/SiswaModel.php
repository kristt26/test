<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'tb_siswa';
    protected $primaryKey       = 'id_siswa';
    protected $returnType       = 'object';
    protected $allowedFields    = ['NIK','nama_siswa','jenis_kelamin','tempat_lahir','tanggal_lahir','agama','alamat',
                                'dusun','wilaya','kabupaten_kota','kecamatan','kelurahan','jenis_tinggal','transportasi',
                                'nohp','nama_ayah','pekerjaan_ayah','nama_ibu','pekerjaan_ibu','upload_foto3x4',
                                'upload_ktp','tahun_masuk','id_user'];
  
  
    public function getUser(){
       $data = $this->db->query("SELECT
       `tb_siswa`.*,
       `tb_user`.`username`,
       `tb_user`.`password`,
       `tb_user`.`email`,
       `tb_user`.`akses`,
       `tb_user`.`id`
     FROM
       `tb_siswa`
       INNER JOIN `tb_user` ON `tb_user`.`id` = `tb_siswa`.`id_user`")->getResult();
        return $data;
    }
   
   public function detail($id_siswa= null){
     $data = $this->db->query("SELECT
     `tb_siswa`.*
   FROM
     `tb_siswa` WHERE id_siswa = $id_siswa")->getResultArray();
     return $data;
   }
 
    
    
    
    
    
    


}