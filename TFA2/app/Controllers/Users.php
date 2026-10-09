<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data['users'] = $userModel
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('users', $data);
    }
}