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
        $cek = $this->user->find();
        if(count($cek)==0){
            $user=[
              'username'=>'Administrasi',
              'password'=>md5('admin'),
              'email'=>'admin@mail.com',
              'akses'=>'Admin'
            ];
            $this->user->save($user);
        }
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
                        'login'=>true
                    ];
                    session()->set($item);
                    session()->setFlashdata('pesan', 'Success,Berhasil Login');
                    return redirect()->to(base_url('admin'));
                }else if($user->akses=='Instruktur'){
                    $ins = new \App\Models\InstrukturModel();
                    $instruktur = $ins->where('id_user', $user->id)->get()->getRowObject();
                    $item = [
                        'uid'=> $user->id,
                        'nama'=> $instruktur->nm_instruktur,
                        'username'=> $user->username,
                        'email'=> $user->email,
                        'akses'=> $user->akses,
                    ];
                    session()->set($item);
                    return redirect()->to(base_url('instruktur'));
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
                session()->setFlashdata('pesan', 'Error,Silahkan cek kembali Password anda');
                return redirect()->back();
            //    return redirect()->back()->with('error', 'Password tidak ditemukan');
            }
        }else{
            session()->setFlashdata('pesan', 'Error,Silahkan cek kembali Username anda');
            return redirect()->back();
        }
        
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('');
    }
}