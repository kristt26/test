<?php

namespace App\Controllers\Admin;
use App\Models\UserModel;
use App\Controllers\BaseController;

class User extends BaseController
{
    function __construct()
    {
        $this->user = new UserModel();
        helper('form');
    }
    public function index()
    {
       $data ['user'] = $this->user->findAll();

        return view('User/get',$data);
    }
}