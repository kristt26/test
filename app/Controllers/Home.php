<?php

namespace App\Controllers;
use App\Models\HomeModel;


class Home extends BaseController
{
    function __construct()
    {
        $this->home = new HomeModel();
        session()->set(['active' => 'home']);
        helper('form');
    }
    public function index()
    {
        $data['tot_siswa'] = $this->home->tot_siswa();
        // $data['tot_alumni'] = $this->home->tot_alumni();
        $data['tot_kelas'] = $this->home->tot_kelas();
        return view('home',$data);
    }
}