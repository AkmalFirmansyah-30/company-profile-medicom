<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'Beranda | UKM Medicom PNC'
        ]);
    }
}
