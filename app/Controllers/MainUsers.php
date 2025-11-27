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
            
            'achievements_by_year' => $achievementModel->orderBy('year', 'DESC')->findAll(),
        ];

        return view('users/beranda', $data);
    }

    public function prestasi() {
        $pageModel = new PageModel();
        $achieveModel = new AchievementModel();
        
        $achievements = $achieveModel->orderBy('year', 'DESC')->findAll();
        
        $data = [
            'page' => $pageModel->find('prestasi'),
            'achievements_by_year' => $achievements
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
        $divisi = [
            "Divisi Fotografi" => "Group_284.png",
            "Divisi Videografi" => "Group_285.png",
            "Divisi Humas" => "Group_290.png",
            "Divisi Desain Grafis" => "Group_287.png",
            "Divisi Video Editing" => "Group_291.png",
            "Divisi Jurnalistik" => "Group_286.png",
            "Divisi Publikasi" => "Group_288.png",
            "Divisi Pemrograman" => "Group_289.png"
        ];
        $displayed_divisi = array_slice($divisi, 0, 7, true); 

        return view('users/quiz', [
            'title' => 'Quiz',
            'divisi' => $displayed_divisi
        ]);
    }
    
    public function startQuiz() {
        return view('users/quiz_start_view');
    }
    
    public function isiDataQuiz() {
        return view('users/quiz_isi_data', [
            'title' => 'Isi Data Kuis'
        ]);
    }
    public function startQuizProcess() {
        if ($this->request->getMethod() === 'post') {
            
            $namaPeserta = $this->request->getPost('nama_peserta');

            if (empty($namaPeserta)) {
                session()->setFlashdata('error', 'Nama peserta harus diisi.');
                return redirect()->back();
            }
            session()->set('quiz_nama', $namaPeserta);
            session()->set('quiz_jawaban', []);
            session()->set('quiz_skor', 0);
            return redirect()->to(base_url('quiz/pertanyaan/1')); 

        } else {
            return redirect()->to(base_url('quiz/isi-data'));
        }
    }
    public function prosesJawaban($nomorSoal) {
        if ($this->request->getMethod() === 'post') {
            if (!session()->has('quiz_nama')) {
                return redirect()->to(base_url('quiz/isi-data'));
            }

            $jawabanTerpilih = $this->request->getPost('jawaban');
            if (empty($jawabanTerpilih)) {
                session()->setFlashdata('error', 'Silakan pilih satu jawaban.');
                return redirect()->to(base_url('quiz/pertanyaan/' . $nomorSoal))->withInput();
            }
            $jawabanSebelumnya = session()->get('quiz_jawaban') ?? [];
            $jawabanSebelumnya[$nomorSoal] = $jawabanTerpilih;
            session()->set('quiz_jawaban', $jawabanSebelumnya);
            
            $nomorSoalBerikutnya = $nomorSoal + 1;
            $totalSoal = 5;

            if ($nomorSoalBerikutnya <= $totalSoal) {
                return redirect()->to(base_url('quiz/pertanyaan/' . $nomorSoalBerikutnya));
            } else {
                return redirect()->to(base_url('quiz/hasil')); 
            }

        } else {
            return redirect()->to(base_url('quiz/pertanyaan/1'));
        }
    }
    public function tampilkanPertanyaan($nomorSoal) {
//         if (!session()->has('quiz_nama')) {
//             session()->setFlashdata('error', 'Anda harus mengisi data peserta terlebih dahulu.');
//             return redirect()->to(base_url('quiz/isi-data'));
//         }

        $totalSoal = 5;
        $pertanyaanData = [
            1 => [
                'soal' => 'Bagaimana Anda mendefinisikan "kepemimpinan yang transformasional" dalam konteks organisasi non-profit?',
                'opsi' => ['A. Fokus pada aturan dan prosedur', 'B. Memotivasi anggota untuk mencapai visi bersama', 'C. Menghindari risiko konflik internal', 'D. Mengambil keputusan secara otoriter']
            ],
            2 => [
                'soal' => 'Apa peran utama Divisi Humas dalam sebuah UKM Jurnalistik dan Multimedia?',
                'opsi' => ['A. Menulis dan menerbitkan berita harian', 'B. Mengelola citra publik dan komunikasi eksternal', 'C. Bertanggung jawab penuh atas anggaran UKM', 'D. Melakukan pelatihan teknis videografi']
            ],
            3 => [
                'soal' => 'Dalam desain grafis, apa fungsi dari prinsip "Hierarchy" (Hierarki)?',
                'opsi' => ['A. Membuat semua elemen memiliki ukuran yang sama', 'B. Menarik perhatian ke elemen paling penting melalui ukuran dan kontras', 'C. Menggunakan hanya dua jenis font', 'D. Memastikan semua warna adalah gradien']
            ],
            4 => [
                'soal' => 'Proses apa yang harus dilakukan sebelum memulai pengeditan video yang efektif?',
                'opsi' => ['A. Langsung menambahkan musik latar yang populer', 'B. Membuat log footage dan menyusun storyboard awal', 'C. Menghapus semua file asli untuk menghemat ruang disk', 'D. Mengubah semua warna menjadi hitam putih']
            ],
            5 => [
                'soal' => 'Jika Anda menemukan bug pada sistem website UKM, apa tindakan pertama yang harus dilakukan?',
                'opsi' => ['A. Menginformasikan kepada semua pengguna melalui media sosial', 'B. Mencari bantuan di forum online tanpa menjelaskan detail', 'C. Melaporkan, mereplikasi, dan mendokumentasikan bug tersebut', 'D. Mengganti seluruh sistem dengan yang baru']
            ],
        ];

        if ($nomorSoal < 1 || $nomorSoal > $totalSoal || !isset($pertanyaanData[$nomorSoal])) {
            return redirect()->to(base_url('quiz'));
        }

        $viewName = 'users/quiz_pertanyaan_1'; 
        $jawabanTersimpan = session()->get('quiz_jawaban')[$nomorSoal] ?? null;

        $data = [
            'title' => 'Quiz Soal ' . $nomorSoal,
            'nomorSoal' => $nomorSoal,
            'totalSoal' => $totalSoal,
            'soal' => $pertanyaanData[$nomorSoal]['soal'],
            'opsiJawaban' => $pertanyaanData[$nomorSoal]['opsi'],
            'progressPercent' => ($nomorSoal / $totalSoal) * 100,
            'jawabanTersimpan' => $jawabanTersimpan,
        ];
        return view($viewName, $data); 
    }

    public function hasilQuiz() {
        if (!session()->has('quiz_nama') || !session()->has('quiz_jawaban')) {
            return redirect()->to(base_url('quiz/isidata'));
        }
        
        $nama = session()->get('quiz_nama');
        // Skor sementara dihitung berdasarkan jumlah jawaban yang diisi.
        // Asumsi: Setiap jawaban yang diisi (5 soal) bernilai 10 poin, total 50.
        // Jika Anda memiliki kunci jawaban, Anda harus menambahkan logika penilaian di sini.
        $skor = count(session()->get('quiz_jawaban')) * 10; 

        $data = [
            'title' => 'Hasil Kuis',
            'namaPeserta' => $nama,
            'skor' => $skor
        ];
        
        return view('users/quiz_hasil', $data);
    }
    // public function tampilkanPertanyaan($nomorSoal) {
    //     // if (!session()->has('quiz_nama')) {
    //     //     session()->setFlashdata('error', 'Anda harus mengisi data peserta terlebih dahulu.');
    //     //     return redirect()->to(base_url('quiz/isidata'));
    //     // }
    //     $totalSoal = 5;
    //     $pertanyaanData = [
    //         1 => [
    //             'soal' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    //             'opsi' => ['Opsi A', 'Opsi B', 'Opsi C', 'Opsi D']
    //         ],
    //         2 => [
    //             'soal' => 'Ini adalah soal nomor dua. Bagaimana cara kerja CodeIgniter?',
    //             'opsi' => ['Jawaban 2A', 'Jawaban 2B', 'Jawaban 2C', 'Jawaban 2D']
    //         ],
    //     ];
    //     if ($nomorSoal < 1 || $nomorSoal > $totalSoal || !isset($pertanyaanData[$nomorSoal])) {
    //         return redirect()->to(base_url('quiz'));
    //     }

    //     $data = [
    //         'title' => 'Quiz Soal ' . $nomorSoal,
    //         'nomorSoal' => $nomorSoal,
    //         'totalSoal' => $totalSoal,
    //         'soal' => $pertanyaanData[$nomorSoal]['soal'],
    //         'opsiJawaban' => $pertanyaanData[$nomorSoal]['opsi'],
    //         'progressPercent' => ($nomorSoal / $totalSoal) * 100 
    //     ];
    //     return view('users/quiz_pertanyaan_1', $data); 
    // }
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
    
}