<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{ 
    protected $table            = 'tb_kelas';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = ['id_program','waktu','jam_mulai','jam_selesai','id_instruktur'];

  
    public function getAll(){
        $builder = $this->db->table('tb_kelas');
        $builder->join('tb_instruktur', 'tb_instruktur.id_instruktur = tb_kelas.id_instruktur');
        $builder->join('tb_program', 'tb_program.id_program = tb_kelas.id_program');
        $query = $builder->get();
        return $query->getResult();

    }
    
}