<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{ 
    protected $table            = 'tb_user';
   //  protected $primaryKey       = 'Id';
   //  protected $returnType       = 'array';
   //  protected $allowedFields = ['username','password'];

   // public function get_data($username,$password){
   //    return $this->db->table('tb_user')
   //    ->where(array('username'=>$username,'password'=>$password))
   //    ->get()->getRowArray();
   // }
}