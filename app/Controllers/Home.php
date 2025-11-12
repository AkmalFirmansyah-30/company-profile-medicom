<?php

namespace App\Controllers;

use App\Models\HeroModel;
use App\Models\PartnerModel;
use App\Models\ProgramModel;
use App\Models\AchievementModel;
use App\Models\GalleryModel;
use App\Models\DivisionModel;

class Home extends BaseController
{
    public function index() {
        $heroModel        = new HeroModel();
        $partnerModel     = new PartnerModel();
        $programModel     = new ProgramModel();
        $achievementModel = new AchievementModel();
        $galleryModel     = new GalleryModel();
        $divisionModel    = new DivisionModel();

        $data = [
            'hero'       => $heroModel->first(), 
            'partners'   => $partnerModel->findAll(),
            'programs'   => $programModel->findAll(),
            'gallery'    => $galleryModel->findAll(),
            'divisions' => $divisionModel->findAll(),
            
            // sorting by terbaru
            'achievements_by_year' => $achievementModel->orderBy('year', 'DESC')->findAll(),
        ];

        return view('home', $data);
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