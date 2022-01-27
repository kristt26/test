<?php

namespace App\Controllers;


class Login extends BaseController
{
    
    public function index()
    {
        $AuthModel = new \App\Models\AuthModel();
        $login = $this->request->getPost('login');
        if ($login) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($username == '' or $password == '') {
                $err =  redirect()->back()->with('error', 'Username tidak di temukan');
            }
            if (empty($err)) {
                $datausername = $AuthModel->where("username", $username)->first();
                if ($datausername['password'] != md5($password)
                ) {
                    $err = redirect()->back()->with('error', 'Password tidak ditemukan');
                }
            }

            if (empty($err)) {
                $dataSesi = [
                    'Id' => $datausername['Id'],
                    'username' =>$datausername['username'],
                    'password' => $datausername['password'],
                ];
                session()->set($dataSesi);
                return redirect()->to(site_url('home'))->with('success', 'Berhasil Login');
            }
                
        }
       return view('login');
    }
}