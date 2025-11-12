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

    public function prestasi() {
        return view('prestasi', [
            'title' => 'Prestasi'
        ]);
    }

    public function about() {
        return view('about', [
            'title' => 'About Us'
        ]);
    }
    
    public function quiz() {
        return view('quiz', [
            'title' => 'Quiz'
        ]);
    }

    public function startQuiz()
    {
        return view('quiz_start_view');
    }

        public function pengurus() {
        return view('pengurus', [
            'title' => 'Pengurus'
        ]);
    }

            public function laporan() {
        return view('laporan', [
            'title' => 'Laporan Kinerja'
        ]);
    }
}
