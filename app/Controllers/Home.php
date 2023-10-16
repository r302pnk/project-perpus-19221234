<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        $p = session()->get('pengguna'); 
        return view('home/dashboard', [
            'pengguna' => $p
        ]);
    }
}
