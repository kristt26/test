<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'tb_siswa';
    protected $primaryKey       = 'id_siswa';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nik','nama_siswa','jenis_kelamin','tempat_lahir','tanggal_lahir','agama','alamat',
                                'dusun','wilaya','kabupaten_kota','kecamatan','kelurahan','jenis_tinggal','transportasi',
                                'nohp','nama_ayah','pekerjaan_ayah','nama_ibu','pekerjaan_ibu','upload_foto3x4',
                                'upload_ijazah','upload_ktp','tahun_masuk','id_user','nis'];
  
  
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
      if($id_siswa === null){
        return  $this->db->query("SELECT
        `tb_siswa`.*
      FROM
        `tb_siswa` ")->getResult();
      }
      $data = $this->db->query("SELECT
      `tb_siswa`.*
    FROM
      `tb_siswa` WHERE id_siswa = $id_siswa ORDER BY nis DESC")->getRowArray();
      return $data;
    }
 
    public function siswa($id_siswa = false)
    {
      # code...
      if($id_siswa == false){
        return $this->findAll();
      }
     //  return $this->where([$id_siswa => 'id_siswa'])->find();
     return   $this->db->query("SELECT
     `tb_siswa`.*
   FROM
     `tb_siswa` WHERE id_siswa = $id_siswa")->getResultArray();
    }
    
    public function PenomoranNis(){
      $kode = $this->db->table('tb_siswa')
      ->select('RIGHT(nis,4) as nis', false)
      ->orderBy('nis','DESC')
      ->limit(1)->get()->getRowArray();
 
      if ($kode['nis']==null) {
        $no=3000;
      }else{
        $no = intval($kode['nis'])+ 1;
      }
 
      $batas= str_pad($no, 4, "0", STR_PAD_LEFT);
      $nis = $batas;
      return $nis;
    } 
 
    
    
    
    
    
    


}