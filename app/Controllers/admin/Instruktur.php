<?php

namespace App\Controllers\Admin;
use App\Models\InstrukturModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Instruktur extends BaseController
{
    function __construct()
    {
        $this->instruktur = new InstrukturModel();
        $this->user = new UserModel();
        session()->set(['active' => 'instruktur']);
        helper('form');
    }
    public function index()
    {
       $data ['instruktur'] = $this->instruktur->getUser();

        return view('Instruktur/get',$data);
    }

    public function create()
    {
        
        $data['user'] = $this->user->findAll();
        $data['instruktur'] = $this->instruktur->getUser();
        return view('Instruktur/add',$data);
    }
    public function save()
    {  
       
            $user = [
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password') ,
                'email' => $this->request->getVar('email'),
                'akses' => 'Instruktur',
            ];
            $this->user->insert($user);
            $iduser = $this->user->getInsertID();
            $data = [
                'nm_instruktur' => $this->request->getVar('nm_instruktur'),
                'alamat' => $this->request->getVar('alamat'),
                'nohp' => $this->request->getVar('nohp'),
                'id_user'=> $iduser,
            ];
            $this->instruktur->insert($data);
            return redirect()->to(site_url('instruktur'))->with('success', 'Data Instruktur Berhasil Di Registrasi');
    }

    public function edit($id_instruktur = null){
      
        $data = [
            'instruktur' => $this->instruktur->where('id_instruktur',$id_instruktur)->first()
            
        ];
        if (empty($data['instruktur'])) {
            return view('errors/404');
        }
        
        return view('Instruktur/edit',$data);
        }
        
    public function update($id_instruktur=null){  
        $data = $this->request->getPost();
        $this->instruktur->update($id_instruktur,$data);
        // $this->user->update($data);
        return redirect()->to(site_url('instruktur'))->with('success', 'Data Instruktur Di Berhasil Ubah');
    }

    
    
      
    
}