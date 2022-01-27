<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramKursusModel extends Model
{ 
    protected $table            = 'tb_program';
    protected $primaryKey       = 'id_program';
    protected $returnType       = 'object';
    protected $allowedFields = ['program_kursus'];
}