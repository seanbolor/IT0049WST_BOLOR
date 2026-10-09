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

    public function new()
    {
        helper(['form', 'url']);

        return view('customer_new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $customerModel = new CustomerModel();

        $customerModel->insert([
            'full_name'  => trim($this->request->getPost('full_name')),
            'email'      => trim($this->request->getPost('email')),
            'phone'      => trim($this->request->getPost('phone')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->to('/customers')
            ->with('success', 'Customer added successfully.');
    }

    public function edit($id)
{
    helper(['form', 'url']);

    $customerModel = new CustomerModel();
    $customer = $customerModel->find($id);

    if (! $customer) {
        return redirect()->to('/customers');
    }

    return view('customer_edit', [
        'customer' => $customer,
    ]);
}

public function update($id)
{
    $rules = [
        'full_name' => 'required|max_length[100]',
        'email'     => 'required|valid_email|max_length[100]',
        'phone'     => 'permit_empty|max_length[20]',
    ];

    if (! $this->validate($rules)) {
        return redirect()->back()->withInput();
    }

    $customerModel = new CustomerModel();

    $customerModel->update($id, [
        'full_name' => trim($this->request->getPost('full_name')),
        'email'     => trim($this->request->getPost('email')),
        'phone'     => trim($this->request->getPost('phone')),
    ]);

    return redirect()
        ->to('/customers')
        ->with('success', 'Customer updated successfully.');
}

}