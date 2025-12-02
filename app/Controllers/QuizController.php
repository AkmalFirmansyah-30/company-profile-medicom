<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class QuizController extends BaseController
{
    public $maxSoal = 5;
    public $currentSoal;

    public $point;

    public function quiz()
    {
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

    public function startQuiz()
    {
        return view('users/quiz_start_view');
    }

    public function isiDataQuiz()
    {
        return view('users/quiz_isi_data', [
            'title' => 'Isi Data Kuis'
        ]);
    }

    public function saveDataQuiz()
    {
        $namaPeserta = $this->request->getPost('nama_peserta');
        session()->set('quiz_name', $namaPeserta);
        $data = $this->tampilkanPertanyaan(1);
        return view('users/quiz_pertanyaan_' . 1, $data);
    }

    public function startQuizProcess()
    {

        if (!session()->has('quiz_nama')) {
            return redirect()->to('/quiz/isidata');
        }

        session()->set('quiz_jawaban', []);
        return redirect()->to('/quiz/pertanyaan/1');
    }

    public function tampilkanPertanyaan($nomorSoal)
    {
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
            return redirect()->to('/quiz');
        }

        $jawabanTersimpan = session()->get('quiz_jawaban')[$nomorSoal] ?? null;

        $data = [
            'title' => 'Soal ' . $nomorSoal,
            'nomorSoal' => $nomorSoal,
            'totalSoal' => $totalSoal,
            'soal' => $pertanyaanData[$nomorSoal]['soal'],
            'opsi' => $pertanyaanData[$nomorSoal]['opsi'],
            'progressPercent' => ($nomorSoal / $totalSoal) * 100,
            'jawabanTersimpan' => $jawabanTersimpan
        ];

        return $data;
    }

    public function prosesJawaban($nomorSoal)
    {
        $jawabanTerpilih = $this->request->getPost('jawaban');

        $this->currentSoal = $nomorSoal;
        $percentage = ($this->currentSoal / $this->maxSoal) * 100;

        if ($this->currentSoal > $this->maxSoal) {
            return redirect()->to('/quiz/hasil');
        }
        $this->currentSoal++;
        $this->point++;
        $data = $this->tampilkanPertanyaan($this->currentSoal);
        session()->set([
            'quiz_jawaban' => $this->point
        ]);


        if (!is_array($data)) {
            return redirect()->to('/quiz/hasil');
        }

        return view('users/quiz_pertanyaan_' . $this->currentSoal, $data);

    }



    public function hasilQuiz()
    {
        $rekomendasi = [
            'nama' => [
                'DIVISI PUBLIKASI',
                'DIVISI FOTOGRAFI',
                'DIVISI VIDEOGRAFI',
                'DIVISI VIDEOEDITING',
                'DIVISI DESAIN GRAFIS',
                'DIVISI JURNALISTIK',
                'DIVISI PEMROGRAMAN'
            ],
            'keterangan' => [
                'Kelola konten dan jadwal posting media sosial.',
                'Ambil dan edit foto kegiatan.',
                'Rekam video dan atur teknis pengambilan gambar.',
                'Edit video siap unggah untuk semua platform.',
                'Buat desain visual poster dan feed.',
                'Tulis berita dan caption kegiatan.',
                'Bangun dan rawat website atau sistem.'
            ]
        ];

        $seed = session()->get('quiz_nama') ?? time();
        srand(crc32($seed));

        $index = array_rand($rekomendasi['nama']);

        $rekomendasiTerpilih = [
            'nama' => $rekomendasi['nama'][$index],
            'keterangan' => $rekomendasi['keterangan'][$index]
        ];

        $data = [
            'title' => 'Hasil Kuis',
            'rekomendasi' => $rekomendasiTerpilih,
            'namaPeserta' => session()->get('quiz_nama')
        ];

        return view('users/quiz_hasil', $data);
    }
}
