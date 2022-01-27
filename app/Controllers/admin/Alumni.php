<?php

namespace App\Controllers\Admin;
use App\Models\AlumniModel;
use App\Models\SiswaModel;
use App\Controllers\BaseController;

class Alumni extends BaseController
{
    function __construct()
    {
        $this->alumni = new AlumniModel();
        $this->siswa = new SiswaModel();
        helper('form');
    }
    public function index()
    {
        $data['alumni'] = $this->alumni->getAll();
        return view('alumni/get',$data);
    }

    public function create()
    {
        
        $data =array(
            'alumni' => $this->alumni->getAll(),
            // 'siswa' => $this->siswa->findAll() 
        );
        // dd($data);
        return view('alumni/add',$data);
        
    }

    public function save(){
        
        $data = $this->request->getPost();
        // dd($data);
        $this->alumni->insert($data);


        return redirect()->to(site_url('siswa'))->with('success', 'Data Alumni Berhasil Di Tambahkan');
    }
}