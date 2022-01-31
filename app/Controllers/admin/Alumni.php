<?php

namespace App\Controllers\Admin;
use App\Models\DetailkelasModel;
use App\Controllers\BaseController;

class Alumni extends BaseController
{
    function __construct()
    {
        $this->detailkelas = new DetailkelasModel();
        session()->set(['active' => 'alumni']);
        helper('form');
    }
    public function index()
    {
        $data['detailkelas'] = $this->detailkelas->getAlumni();
        return view('alumni/get',$data);
    }
    
}