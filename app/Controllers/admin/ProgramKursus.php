<?php

namespace App\Controllers\Admin;
use App\Models\ProgramKursusModel;
use App\Controllers\BaseController;
use CodeIgniter\Validation\Validation;

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
        $data = [
            'programkursus' => $this->programkursus->findAll(),
           
        ];
        return view('Programkursus/get',$data);
    }

    public function create()
    {
        $data=[
            'programkursus' =>  $this->programkursus->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('Programkursus/add',$data);
        
    }

    public function save()
    {
        if (!$this->validate([
            'program_kursus' => [
               'rules'	=> 'required|is_unique[tb_program.program_kursus]',
               'errors'	=> [
                   'required'	=> 'Tidak Boleh Kosong',
                   'is_unique'	=> 'Program Kursus Sudah Ada'
               ]
           ],
       ])) {
            return redirect()->back()->withInput();
        }
        
        $data = [
            'program_kursus' => $this->request->getVar('program_kursus')
        ];
        
        // $data = $this->request->getPost();
        $this->programkursus->insert($data);
        return redirect()->to(base_url('admin/programkursus'))->with('success', 'Data Program Kursus Berhasil Di Tambah');
       

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
        return redirect()->to(base_url('admin/programkursus'))->with('success', 'Data programkursus Berhasil Di Ubah');
    }
}