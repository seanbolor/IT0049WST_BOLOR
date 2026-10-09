<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        $data['customers'] = $customerModel
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('customers', $data);
    }
}