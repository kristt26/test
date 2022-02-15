<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\UserModel;
use App\Models\ProgramKursusModel;
use App\Models\KelasModel;
use App\Models\DetailkelasModel;

class Siswa extends BaseController
{
    function __construct()
    {
        $this->siswa = new SiswaModel();
        $this->user = new UserModel();
        $this->programkursus = new ProgramKursusModel();
        $this->kelas = new KelasModel();
        $this->detailkelas = new DetailkelasModel();
        session()->set(['active' => 'siswa']);
        helper('form');
    }

    public function index()
    {
        
        $data = [
            'siswa' => $this->siswa->getUser(),
        ];
        // dd($data);      
        return view('siswa/get',$data);
    }

    public function detail($id_siswa= null)
    {
        $data=[
            'detailkelas'=> $this->detailkelas->getDetail(),
            'siswa' => $this->siswa->detail($id_siswa),
        ];
        // dd($data);  
        return view('siswa/detail',$data);
    }
   

    public function registrasi(){
        $data=[
            'user' => $this->user->findAll(),
            'siswa' => $this->siswa->getUser(),
            'validation' => \Config\Services::validation()
        ];
        return view('registrasi',$data);
    }
    
    public function save(){

        if (!$this->validate([
            'nik' => [
               'rules'	=> 'required|is_unique[tb_siswa.nik]|numeric|max_length[16]|min_length[16]',
               'errors'	=> [
                   'required'	=> 'Tidak Boleh Kosong',
                   'is_unique'	=> 'Program Kursus Sudah Ada',
                   'max_length'	=> 'Maksimal 16 Digit',
                   'min_length'	=> 'Minimal 16 Digit',
                   'numeric'	=> 'NIK Harus Berisi Angka'
               ]
           ],
            'nama_siswa' => [
               'rules'	=> 'required|alpha_space',
               'errors'	=> [
                   'required'	=> 'Tidak Boleh Kosong',
                   'alpha_space'	=> 'Nama Harus Berisi Karakter/Huruf',
               ]
           ],
            'username' => [
               'rules'	=> 'required|is_unique[tb_user.username]|alpha_numeric',
               'errors'	=> [
                   'required'	=> 'Tidak Boleh Kosong',
                   'is_unique'	=> 'Username Sudah Ada',
                   'alpha_numeric'	=> 'Username Harus Berisi Karakter dan Angka'
               ]    
           ],
       ])) {
            return redirect()->back()->withInput();
        }
        $user = [
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'email' =>  $this->request->getVar('email'),
            'akses' => 'Siswa',
        ];
        $this->user->insert($user);
        $iduser = $this->user->getInsertID();
        $data = [
            'nik' => $this->request->getVar('nik'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'id_user'=> $iduser,
        ];
        $this->siswa->insert($data);
        $data['uid'] = $iduser;
        $data['username'] = $user['username'];
        $data['email'] = $user['email'];
        $data['akses'] = $user['akses'];
        $data['nama'] = $data['nama_siswa'];
        session()->set($data);
        // dd($data);
        return redirect()->to(base_url('siswa'))->with('success', 'Silahkan Lengkapi Biodata');
        
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

  
    
}