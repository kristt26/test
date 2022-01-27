<?php

namespace App\Controllers\Siswa;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Biodata extends BaseController
{
    use ResponseTrait;
    public function __construct() {
        $this->siswa = new \App\Models\SiswaModel();
        $this->decode = new \App\Libraries\Decode();
        $this->db =  \Config\Database::connect();
    }
    public function index()
    {
        return view('siswa/biodata');
    }

    public function read()
    {
        $data = $this->siswa->where('id_user', session()->get('uid'))->get()->getRowObject();
        return $this->respond($data);
    }

    public function save()
    {
        $data = $this->request->getJSON();
        try {
            $this->db->transBegin();
            $data->upload_foto3x4 = $this->decode->decodebase64($data->upload_foto3x4->base64);
            $data->upload_ijazah = $this->decode->decodebase64($data->upload_ijazah->base64);
            $data->upload_ktp = $this->decode->decodebase64($data->upload_ktp->base64);
            $this->siswa->save($data);
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
}