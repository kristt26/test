<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class HomeModel extends Model
{
   
    public function tot_siswa(){
        $query = $this->db->query('SELECT * FROM tb_detailkelas WHERE status="Aktif"');
        $tot_siswa =$query->getNumRows();
        return $tot_siswa;
      }
 
   function tot_alumni(){
    $query['tot_alumni'] =  $this->db->query("SELECT
    `tb_detailkelas`.`status`,
    `tb_detailkelas`.`id_siswa`
  FROM
    `tb_detailkelas` WHERE status='Lulus'");
    $status = count($query);
    return $status;
   }

  
 
   public function total(){
       return $this->db->table('tb_detailkelas')->countAll();
   }
   public function tot_registrasi(){
      $query = $this->db->query('SELECT * FROM tb_detailkelas WHERE status="Registrasi"');
      $tot_registrasi =$query->getNumRows();
      return $tot_registrasi;
    }
}