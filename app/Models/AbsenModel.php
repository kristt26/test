<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenModel extends Model
{ 
    protected $table            = 'absen';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = ['detail_id','tanggal','keterangan'];
    
}