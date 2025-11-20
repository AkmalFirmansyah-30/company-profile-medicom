<?php

namespace App\Controllers;

use App\Models\HeroModel;
use App\Models\PageModel;
use App\Models\ReportModel;
use App\Models\MemberModel;
use App\Models\PartnerModel;
use App\Models\ProgramModel;
use App\Models\GalleryModel;
use App\Models\DivisionModel;
use App\Models\ObjectiveModel;
use App\Models\AchievementModel;

class MainUsers extends BaseController
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
            
            // sorting DARI TAHUN BARU
            'achievements_by_year' => $achievementModel->orderBy('year', 'DESC')->findAll(),
        ];

        return view('users/beranda', $data);
    }

    public function prestasi() {
        $pageModel = new PageModel();
        $achieveModel = new AchievementModel();
        
        // Logic pengelompokan tahun (sama seperti di homepage)
        $achievements = $achieveModel->orderBy('year', 'DESC')->findAll();
        
        $data = [
            'page' => $pageModel->find('prestasi'), // Data Header
            'achievements_by_year' => $achievements // Data Grid
        ];
        return view('users/prestasi', $data);
    }

    public function about() {
        $pageModel = new PageModel();
        $objectiveModel = new ObjectiveModel();

        $data = [
            'page' => $pageModel->find('about'),
            'objectives' => $objectiveModel->findAll(),
        ];
        return view('users/about', $data);
    }
    
    public function quiz() {
        return view('users/quiz', [
            'title' => 'Quiz'
        ]);
    }

    public function startQuiz() {
        return view('users/quiz_start_view');
    }

    public function pengurus() {
        $divModel = new DivisionModel();
        $memModel = new MemberModel();

        $data = [
            'divisions' => $divModel->findAll(),
            'members'   => $memModel->findAll()
        ];
        return view('users/pengurus', $data);
    }

    public function laporan() {
        $reportModel = new ReportModel();
        
        $year = $this->request->getGet('year') ?? date('Y');
        
        $reports = $reportModel->where('year', $year)->findAll();
        
        $mappedReports = [];
        foreach($reports as $r) {
            $mappedReports[$r['month']] = $r['url'];
        }

        $data = [
            'selected_year' => $year,
            'reports' => $mappedReports
        ];
        return view('users/laporan', $data);
    }
}