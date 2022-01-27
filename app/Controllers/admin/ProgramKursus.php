<?php

namespace App\Controllers\Admin;
use App\Models\ProgramKursusModel;
use App\Controllers\BaseController;

class ProgramKursus extends BaseController
{
    function __construct()
    {
        $this->programkursus = new ProgramKursusModel();
        session()->set(['active' => 'programkursus']);
        helper('form');
    }
    public function index()
    {
        $data['programkursus'] = $this->programkursus->findAll();
        return view('Programkursus/get',$data);
    }

    public function create()
    {
        $data['programkursus'] = $this->programkursus->findAll();
        return view('Programkursus/add',$data);
        
    }

    public function save()
    {
        $data = [
            'program_kursus' => $this->request->getPost(),
        ];
        // $data = $this->request->getPost();
        $this->programkursus->insert($data);
        return redirect()->to(site_url('programkursus'))->with('success', 'Data Program Kursus Berhasil Di Tambah');
       

    }

    public function edit($id_program = null){
        $data['programkursus'] = $this->programkursus->where('id_program',$id_program)->first();
        if (empty($data['programkursus'])) {
            return view('errors/404');
        }
        return view('Programkursus/edit', $data);

    }

    public function update($id_program = null){
        $data = $this->request->getPost();
        $this->programkursus->update($id_program,$data);
        return redirect()->to(site_url('programkursus'))->with('success', 'Data programkursus Berhasil Di Ubah');
    }
}