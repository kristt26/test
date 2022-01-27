<?php

namespace App\Controllers\Admin;
use App\Models\KelasModel;
use App\Models\ProgramKursusModel;
use App\Models\InstrukturModel;
use App\Controllers\BaseController;

class Kelas extends BaseController
{
    function __construct()
    {
        $this->kelaskursus = new KelasModel();
        $this->instruktur = new InstrukturModel();
        $this->programkursus = new ProgramKursusModel();
        session()->set(['active' => 'kelaskursus']);
        helper('form');
    }
    public function index()
    {
       $data ['kelaskursus'] = $this->kelaskursus->getAll();

        return view('Kelas/get',$data);
    }

    public function create()
    {
        $data = [
            'kelaskursus' => $this->kelaskursus->getAll(),
            'instruktur' => $this->instruktur->findAll(),
            'programkursus' => $this->programkursus->findAll(),
        ];
        return view('Kelas/add',$data);
    }
    
    public function save()
    {  
       
           $data = $this->request->getPost();
           $this->kelaskursus->insert($data);
     
           return redirect()->to(site_url('admin/kelas'))->with('success', 'Data Kelas Kursus Berhasil Di Tambahkan');
    }
    public function edit($id = null){
        $data['instruktur'] = $this->instruktur->findAll();
        $data['programkursus'] = $this->programkursus->findAll();
        $data['kelaskursus'] = $this->kelaskursus->where('id',$id)->first();

        if (empty($data['kelaskursus'])) {
            return view('errors/404');
        }
        return view('Kelas/edit', $data);
    }

    public function update($id = null){ 
        $data = $this->request->getPost();
        $this->kelaskursus->update($id,$data);
        return redirect()->to(site_url('admin/kelas'))->with('success', 'Data kelaskursus Berhasil Di Ubah');
    }
}