<?php

namespace App\Controllers;

class Authentication extends BaseController
{
    public function __construct() {
        $this->user = new \App\Models\UserModel();
        helper('form');
    }
    public function index()
    {
        return view('login');
    }

    public function saveRegister(){


    }

    public function loginproses(){
        $data = $this->request->getPost();
        $user = $this->user->asObject()->where('username', $data['username'])->get()->getRowObject();
        if($user){
            if(md5($data['password'])==$user->password){
                if($user->akses=='Admin'){
                    $item = [
                        'uid'=> $user->id,
                        'nama'=> 'Administrator',
                        'username'=> $user->username,
                        'email'=> $user->email,
                        'akses'=> $user->akses,
                    ];
                    session()->set($item);
                    return redirect()->to(base_url('admin'));
                }else if($user->akses=='Instruktur'){
                    $ins = new \App\Models\InstrukturModel();
                    $instruktur = $ins->where('tb_user_id', $user->id)->get()->getRowObject();
                    $item = [
                        'uid'=> $user->id,
                        'nama'=> $instruktur->nm_instruktur,
                        'username'=> $user->username,
                        'email'=> $user->email,
                        'akses'=> $user->akses,
                    ];
                    session()->set($item);
                    return redirect()->to(base_url('siswa'));
                }else{
                    $sis = new \App\Models\SiswaModel();
                    $siswa = $sis->where('id_user', $user->id)->get()->getRowObject();
                    $item = [
                        'uid'=> $user->id,
                        'nama'=> $siswa->nama_siswa,
                        'username'=> $user->username,
                        'email'=> $user->email,
                        'akses'=> $user->akses,
                    ];
                    session()->set($item);
                    return redirect()->to(base_url('siswa'));
                }
            }else{
               echo "password tidka di kenali";
            }
        }
        
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}