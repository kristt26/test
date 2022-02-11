<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenModel extends Model
{ 
    protected $table            = 'absen';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = ['detail_id','tanggal','keterangan'];

    public function get_tanggal($id)
    {
      $data = $this->db->query("SELECT DISTINCT
        `absen`.`tanggal`
        FROM
        `absen`
        LEFT JOIN `tb_detailkelas` ON `absen`.`detail_id` = `tb_detailkelas`.`id`
        LEFT JOIN `tb_kelas` ON `tb_detailkelas`.`id_kelas` = `tb_kelas`.`id` WHERE `tb_kelas`.`id`='$id'")->getResult();
      return $data;
    }

    public function get_absen($id, $tanggal)
    {
        dd($tanggal->tanggal);
        $data = $this->db->query("SELECT
            *
        FROM
            `absen` WHERE detail_id='$id' AND tanggal ='$tanggal'")->getRow();
            return $data;
    }
    
}