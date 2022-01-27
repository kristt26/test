<?php

namespace App\Controllers\Siswa;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Daftar extends BaseController
{
    use ResponseTrait;
    public function __construct() {
        $this->program = new \App\Models\ProgramKursusModel();
        $this->kelas = new \App\Models\KelasModel();
        $this->siswa = new \App\Models\SiswaModel();
        $this->detail = new \App\Models\DetailkelasModel();
        $this->db =  \Config\Database::connect();
    }
    public function index()
    {
        return view('siswa/daftar');
    }

    public function read()
    {
        $data['program'] = $this->program->asObject()->findAll();
        foreach ($data['program'] as $key => $item) {
            $item->kelas = $this->kelas->where('id_program', $item->id_program)->findAll();
        }
        $data['siswa'] = $this->siswa->where('id_user', session()->get('uid'))->get()->getRow();
        $data['kursus'] = $this->detail->kursusSiswa(session()->get('uid'));
        return $this->respond($data);
    }

    public function post()
    {
        $item = $this->request->getJSON();
        try {
            $this->db->transBegin();
            $this->detail->save($item);
            if($this->db->transStatus()){
                $this->db->transCommit();
                $data['program'] = $this->program->asObject()->findAll();
                foreach ($data['program'] as $key => $item) {
                    $item->kelas = $this->kelas->where('id_program', $item->id_program)->findAll();
                }
                $data['siswa'] = $this->siswa->where('id_user', session()->get('uid'))->get()->getRow();
                $data['kursus'] = $this->detail->kursusSiswa(session()->get('uid'));
                return $this->respond($data);
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