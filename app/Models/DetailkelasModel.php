<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailkelasModel extends Model
{
    protected $table            = 'tb_detailkelas';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_siswa','id_kelas','status'];

 



    public function getDetail(){
    $data = $this->db->query("SELECT
    `tb_kelas`.`waktu`,
    `tb_kelas`.`jam_mulai`,
    `tb_kelas`.`jam_selesai`,
    `tb_detailkelas`.*,
    `tb_siswa`.`nama_siswa`,
    `tb_program`.`program_kursus`
  FROM
    `tb_detailkelas`
    RIGHT JOIN `tb_kelas` ON `tb_kelas`.`id` = `tb_detailkelas`.`id_kelas`
    RIGHT JOIN `tb_program` ON `tb_program`.`id_program` = `tb_kelas`.`id_program`
    RIGHT JOIN `tb_siswa` ON `tb_siswa`.`id_siswa` = `tb_detailkelas`.`id_siswa`")->getResult();
    return $data;
  
    }

    
   

   




}