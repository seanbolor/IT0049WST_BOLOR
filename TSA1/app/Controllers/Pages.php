<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about()
    {
        $data = [
            'title' => 'About',
            'developer' => 'Sean Liam A. Bolor',
        ];

        return view('about', $data);
    }
}