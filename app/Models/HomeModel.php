<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
   public function tot_siswa(){
       return $this->db->table('tb_siswa')->countAll();
   }
//    public function tot_alumni(){
//        return $this->db->table('tb_alumni')->countAll();
//    }
   public function tot_kelas(){
       return $this->db->table('tb_kelas')->countAll();
   }
}