<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\DetailkelasModel;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Models\ProgramKursusModel;


class Detailkelas extends BaseController
{
    function __construct()
    {
        $this->detailkelas = new DetailkelasModel();
        $this->siswa = new SiswaModel();
        $this->kelas = new KelasModel();
        $this->programkursus = new ProgramKursusModel();
        session()->set(['active' => 'detailkelas']);
        helper('form');
    }
    public function index()
    {
        $data =[
            'detailkelas' => $this->detailkelas->getDetail(),
        ];
        // dd($data);
        return view('detailkelas/get',$data);
    }
    
    

    public function updatestatus(){
        $data = $this->request->getGet();
        // dd($data);
        $this->detailkelas->update($data['id'],['status'=>$data['status']]);
        return redirect()->to(base_url('admin/detailkelas'))->with('success', 'Status Peserta Kursus Berhasil Di Ubah');
    }

    public function detail($id_siswa){
        
        $data['detailkelas'] = $this->detailkelas->detail($id_siswa);
        // dd($data['detailkelas']['nm_siswa']);
        return view('admin/detailkelas/detail',$data);

    }
   
        
}