<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['customers'] = [
            [
                'full_name' => 'Jeon Jungkook',
                'email'     => 'jungkook@yahoo.com',
                'phone'     => '09171234567',
            ],
            [
                'full_name' => 'Kim Taehyung',
                'email'     => 'taehyung@yahoo.com',
                'phone'     => '09181234567',
            ],
            [
                'full_name' => 'Park Jimin',
                'email'     => 'jimin@yahoo.com',
                'phone'     => '09191234567',
            ],
            [
                'full_name' => 'Kim Seokjin',
                'email'     => 'seokjin@yahoo.com',
                'phone'     => '09201234567',
            ],
            [
                'full_name' => 'Kim Namjoon',
                'email'     => 'namjoon@yahoo.com',
                'phone'     => '09211234567',
            ],
        ];

        return view('customers', $data);
    }
}