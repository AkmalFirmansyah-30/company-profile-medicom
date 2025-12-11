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
    # =========================
    #       HOME & PAGES
    # =========================
    public function index()
    {
        $heroModel = new HeroModel();
        $partnerModel = new PartnerModel();
        $programModel = new ProgramModel();
        $achievementModel = new AchievementModel();
        $galleryModel = new GalleryModel();
        $divisionModel = new DivisionModel();

        $data = [
            'hero' => $heroModel->first(),
            'partners' => $partnerModel->findAll(),
            'programs' => $programModel->findAll(),
            'gallery' => $galleryModel->findAll(),
            'divisions' => $divisionModel->findAll(),
            'achievements_by_year' => $achievementModel->orderBy('year', 'DESC')->findAll(),
        ];

        return view('users/beranda', $data);
    }

    public function prestasi()
    {
        $pageModel = new PageModel();
        $achieveModel = new AchievementModel();

        $data = [
            'page' => $pageModel->find('prestasi'),
            'achievements_by_year' => $achieveModel->orderBy('year', 'DESC')->findAll()
        ];
        return view('users/prestasi', $data);
    }

    public function about()
    {
        $pageModel = new PageModel();
        $objectiveModel = new ObjectiveModel();

        $data = [
            'page' => $pageModel->find('about'),
            'objectives' => $objectiveModel->findAll(),
        ];
        return view('users/about', $data);
    }

    public function pengurus()
    {
        $divModel = new DivisionModel();
        $memModel = new MemberModel();

        $data = [
            'divisions' => $divModel->findAll(),
            'members' => $memModel->findAll()
        ];
        return view('users/pengurus', $data);
    }

    public function proker1() {
        return view('users/program-kerja/1', [
            'title' => 'Proker1'
        ]);
    }

    public function proker2() {
        return view('users/program-kerja/2', [
            'title' => 'Proker2'
        ]);
    }

    public function proker3() {
        return view('users/program-kerja/3', [
            'title' => 'Proker3'
        ]);
    }

    public function laporan()
    {
        $reportModel = new ReportModel();

        $year = $this->request->getGet('year') ?? date('Y');

        $reports = $reportModel->where('year', $year)->findAll();

        $mappedReports = [];
        foreach ($reports as $r) {
            $mappedReports[$r['month']] = $r['url'];
        }

        $data = [
            'selected_year' => $year,
            'reports' => $mappedReports
        ];
        return view('users/laporan', $data);
    }

    # =========================
    #          QUIZ
    # =========================

    
}
