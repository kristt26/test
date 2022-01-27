<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table            = 'tb_alumni';
    protected $primaryKey       = 'id_alumni';
    protected $returnType       = 'object';
    protected $allowedFields    = ['NIS','keterangan','tahun_keluar'];

    
    
    
    
    public function getAll(){
      $builder = $this->db->table('tb_alumni');
      $builder->join('tb_siswa', 'tb_siswa.id_siswa = tb_alumni.id_siswa');
      // $builder->join('tb_program', 'tb_program.id_program = tb_kelas.id_program');
      $query = $builder->get();
      return $query->getResult();

  }

  public function getSiswa(){
    $data = $this->db->query("SELECT
    `tb_siswa`.`nama_siswa`,
    `tb_siswa`.`alamat`,
    `tb_siswa`.`nohp`,
    `tb_siswa`.`tahun_masuk`,
    `tb_alumni`.`id_alumni`,
    `tb_alumni`.`keterangan`,
    `tb_alumni`.`tahun_keluar`
  FROM
    `tb_siswa`
    LEFT JOIN `tb_alumni` ON `tb_siswa`.`id_siswa` = `tb_alumni`.`id_siswa`")->getResult();
    return $data;
  }

    
    
}