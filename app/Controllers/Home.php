<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home', [
            'title' => 'Beranda'
        ]);
    }

    // public function about() {
    //     return view('layout/template', [
    //         'title' => 'About Us'
    //     ]);
    // }
}
