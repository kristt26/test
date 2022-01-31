<?php

namespace App\Controllers\Instruktur;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Absen extends BaseController
{
    use ResponseTrait;
    public function __construct() {
        $this->siswa = new \App\Models\SiswaModel();
        $this->decode = new \App\Libraries\Decode();
        $this->detail = new \App\Models\DetailkelasModel();
        $this->absen = new \App\Models\AbsenModel();
        $this->db =  \Config\Database::connect();
    }
    public function index()
    {
        return view('instruktur/kelas');
    }

    public function read($tanggal)
    {
        $data['kursus'] = $this->detail->kursusAbsen(session()->get('uid'), $tanggal);
        return $this->respond($data);
    }

    public function post()
    {
        $data = $this->request->getJSON();
        try {
            $this->db->transBegin();
            $item = [
                'detail_id'=>$data->id,
                'tanggal'=>date('Y-m-d'),
                'keterangan'=>'H'
            ];
            $this->absen->insert($item);
            $item['id'] = $this->absen->getInsertID();
            if($this->db->transStatus()){
                $this->db->transCommit();
                return $this->respondCreated($item);
            }else{
                $this->db->transRollback();
                return $this->fail(false);
            }
        } catch (\Throwable $th) {
            $this->db->transRollback();
            return $this->fail($th->getMessage());
        }
    }
}