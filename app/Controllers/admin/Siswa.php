<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\UserModel;
use App\Models\ProgramKursusModel;
use App\Models\KelasModel;

class Siswa extends BaseController
{
    function __construct()
    {
        $this->siswa = new SiswaModel();
        $this->user = new UserModel();
        $this->programkursus = new ProgramKursusModel();
        $this->kelas = new KelasModel();
        session()->set(['active' => 'siswa']);
        helper('form');
    }

    public function index()
    {
        
        $data = [

            'siswa' => $this->siswa->getUser(),
        ];
        return view('siswa/get',$data);
    }

    public function detail($id_siswa= null)
    {
        $data=[
            'siswa' => 
            $this->siswa->detail($id_siswa),
        ];
        // dd($data);  
        return view('siswa/detail',$data);
    }
   

    public function registrasi(){
        $data['user']= $this->user->findAll();
        $data['siswa']= $this->siswa->getUser();
        return view('registrasi',$data);
    }
    
    public function save(){
        $user = [
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'email' =>  $this->request->getVar('email'),
            'akses' => 'Siswa',
        ];
        $this->user->insert($user);
        $iduser = $this->user->getInsertID();
        $data = [
            'NIK' => $this->request->getVar('NIK'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'id_user'=> $iduser,
        ];
        $this->siswa->insert($data);
        $data['id'] = $iduser;
        $data['username'] = $user['username'];
        $data['email'] = $user['email'];
        $data['akses'] = $user['akses'];
        session()->set($data);
        return redirect()->to(base_url('home'))->with('success', 'Silahkan Lengkapi Biodata');
        
    }

   
    // public function create()
    // {

    //     $data['kelas'] = $this->kelas->findAll();
    //     return view('siswa/add',$data);
    // }
    // public function save()
    // {
    //     $data = $this->request->getPost();
    //     $this->siswa->insert($data);
    //     return redirect()->to(site_url('siswa'))->with('success', 'Data Siswa Berhasil Di Registrasi');
    // }

    
    // public function edit($NIS = null){
    //     $data['kelas'] = $this->kelas->findAll();
    //     $data['siswa'] = $this->siswa->where('NIS',$NIS)->first();
    //     return view('siswa/edit',$data);
    //     }

    // public function update($NIS = null){

    //     $data = $this->request->getPost();
    //     $this->siswa->update($NIS,$data);
    //     return redirect()->to(site_url('siswa'))->with('success', 'Data Siswa Berhasil DiUbah');
    // }

    // public function print(){
    //     $data['siswa'] = $this->siswa->getAll; 
    //     return view('siswa/print',$data);
    // }

   
    
}