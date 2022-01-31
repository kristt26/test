<?php

namespace App\Controllers\Instruktur;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Kelas extends BaseController
{
    use ResponseTrait;
    public function __construct() {
        $this->kelas = new \App\Models\KelasModel();
        $this->absen = new \App\Models\AbsenModel();
        $this->db =  \Config\Database::connect();
    }
    public function index()
    {
        return view('instruktur/kelas');
    }

    public function read()
    {
        $data['kursus'] = $this->kelas->getKelas(session()->get('uid'));
        return $this->respond($data);
    }

    public function post()
    {
        $data = $this->request->getJSON();
        $data->tanggal = date('Y-m-d');
        try {
            $this->db->transBegin();
            $this->absen->insert($data);
            $data->id = $this->absen->getInsertID();
            if($this->db->transStatus()){
                $this->db->transCommit();
                return $this->respondCreated($data);
            }else{
                $this->db->transRollback();
                return $this->fail(false);
            }
        } catch (\Throwable $th) {
            $this->db->transRollback();
            return $this->fail($th->getMessage());
        }
    }
    public function put()
    {
        $data = $this->request->getJSON();
        try {
            $this->db->transBegin();
            $this->absen->save($data);
            if($this->db->transStatus()){
                $this->db->transCommit();
                return $this->respondUpdated(true);
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