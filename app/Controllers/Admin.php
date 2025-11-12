<?php

namespace App\Controllers;

use App\Models\HeroModel;
use App\Models\PartnerModel;
use App\Models\ProgramModel;
use App\Models\GalleryModel;
use App\Models\DivisionModel;
use App\Models\AchievementModel;

class Admin extends BaseController
{
    protected $heroModel, $partnerModel, $programModel, $achievementModel, $galleryModel;

    public function __construct()
    {
        $this->heroModel = new HeroModel();
        $this->partnerModel = new PartnerModel();
        $this->programModel = new ProgramModel();
        $this->achievementModel = new AchievementModel();
        $this->galleryModel = new GalleryModel();
        $this->divisionModel = new DivisionModel();
    }

    public function index()
    {
        $data = [
            'hero' => $this->heroModel->first(),
            'partners' => $this->partnerModel->findAll(),
            'programs' => $this->programModel->findAll(),
            'achievements' => $this->achievementModel->orderBy('year', 'DESC')->findAll(),
            'gallery' => $this->galleryModel->findAll(),
            'divisions' => $this->divisionModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/dashboard', $data);
    }

    // --- Logic Upload Gambar ---
    private function uploadImage($file, $subfolder = '')
    {
        if ($file->isValid() && !$file->hasMoved()) {
            // Pindah ke public/src/img
            $newName = $file->getName();
            $path = 'src/img' . $subfolder;
            $file->move(FCPATH . $path, $newName);
            return '/' . $path . '/' . $newName; // Return path relative untuk DB
        }
        return null;
    }

    // --- Update Hero ---
    public function updateHero()
    {
        $file = $this->request->getFile('hero_image');
        if ($path = $this->uploadImage($file)) {
            $id = $this->request->getPost('id');
            $this->heroModel->save(['id' => $id, 'image_path' => $path]);
        }
        return redirect()->to('/admin')->with('msg', 'Hero updated');
    }

    // --- Add Achievement (Contoh, lakukan hal serupa untuk Partner/Program/Gallery) ---
    public function addAchievement()
    {
        if (!$this->validate([
            'name' => 'required',
            'year' => 'required|numeric',
            'level' => 'required',
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Harus ada gambar prestasi yang diupload.',
                    'max_size' => 'Ukuran gambar terlalu besar (maks 1MB).',
                    'is_image' => 'File yang diupload bukan gambar.',
                    'mime_in' => 'Format gambar harus JPG/JPEG/PNG.'
                ]
            ]
        ])) {
            return redirect()->to('/admin')->withInput()->with('validation', \Config\Services::validation());
        }
        
        $file = $this->request->getFile('image');
        $path = $this->uploadImage($file, '/prestasi'); // masuk folder src/img/prestasi

        $this->achievementModel->save([
            'name' => $this->request->getPost('name'),
            'year' => $this->request->getPost('year'),
            'level' => $this->request->getPost('level'),
            'image_path' => $path ?? '/src/img/default.jpg'
        ]);
        return redirect()->to('/admin')->with('msg', 'Tambah Prestasi Berhasil');
    }
    
    // Hapus Data
    public function deleteAchievement($id)
    {
        // Idealnya hapus juga file fisiknya menggunakan unlink()
        $this->achievementModel->delete($id);
        return redirect()->to('/admin')->with('msg', 'Hapus Prestasi Berhasil');
    }

    public function addGallery()
    {
        // Validasi: Maksimal 9 galeri
        $currentGalleryCount = $this->galleryModel->countAllResults();
        if ($currentGalleryCount >= 9) {
            return redirect()->to('/admin')->with('error', 'Maksimal 9 gambar galeri telah tercapai.');
        }

        // Validasi input
        if (!$this->validate([
            'gallery_image' => [
                'rules' => 'uploaded[gallery_image]|max_size[gallery_image,2048]|is_image[gallery_image]|mime_in[gallery_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Harus ada gambar galeri yang diupload.',
                    'max_size' => 'Ukuran gambar terlalu besar (maks 2MB).',
                    'is_image' => 'File yang diupload bukan gambar.',
                    'mime_in' => 'Format gambar harus JPG/JPEG/PNG.'
                ]
            ],
            'caption' => 'permit_empty|max_length[100]' // Caption opsional
        ])) {
            return redirect()->to('/admin')->withInput()->with('validation', \Config\Services::validation());
        }

        $file = $this->request->getFile('gallery_image');
        $path = $this->uploadImage($file, '/galeri'); // Subfolder /galeri

        if ($path) {
            $this->galleryModel->save([
                'image_path' => $path,
                'caption' => $this->request->getPost('caption')
            ]);
            return redirect()->to('/admin')->with('msg', 'Gambar galeri berhasil ditambahkan.');
        } else {
            return redirect()->to('/admin')->with('error', 'Gagal mengupload gambar galeri.');
        }
    }

    // Menampilkan Form Edit Galeri (jika diperlukan halaman terpisah)
    // Untuk simplicity, kita bisa edit langsung di dashboard dengan modal/dropdown
    // Tapi jika butuh halaman terpisah:
    public function editGallery($id)
    {
        $galleryItem = $this->galleryModel->find($id);
        if (!$galleryItem) {
            return redirect()->to('/admin')->with('error', 'Galeri tidak ditemukan.');
        }
        $data = [
            'galleryItem' => $galleryItem,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/edit_gallery', $data); // Buat file view ini jika perlu
    }

    // Update Galeri (mengganti gambar atau caption)
    public function updateGallery()
    {
        $id = $this->request->getPost('id');
        $oldItem = $this->galleryModel->find($id);

        if (!$oldItem) {
            return redirect()->to('/admin')->with('error', 'Galeri tidak ditemukan.');
        }

        // Validasi input
        if (!$this->validate([
            'gallery_image' => [
                'rules' => 'max_size[gallery_image,2048]|is_image[gallery_image]|mime_in[gallery_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (maks 2MB).',
                    'is_image' => 'File yang diupload bukan gambar.',
                    'mime_in' => 'Format gambar harus JPG/JPEG/PNG.'
                ]
            ],
            'caption' => 'permit_empty|max_length[100]'
        ])) {
            return redirect()->to('/admin')->withInput()->with('validation', \Config\Services::validation());
        }

        $file = $this->request->getFile('gallery_image');
        $path = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $path = $this->uploadImage($file, '/galeri');
            // Hapus gambar lama jika ada
            if ($oldItem['image_path'] && file_exists(FCPATH . $oldItem['image_path'])) {
                unlink(FCPATH . $oldItem['image_path']);
            }
        }

        $dataToUpdate = [
            'id' => $id,
            'caption' => $this->request->getPost('caption')
        ];
        if ($path) { // Hanya update path jika ada gambar baru diupload
            $dataToUpdate['image_path'] = $path;
        }

        $this->galleryModel->save($dataToUpdate);
        return redirect()->to('/admin')->with('msg', 'Galeri berhasil diperbarui.');
    }

    // Hapus Galeri
    public function deleteGallery($id)
    {
        $galleryItem = $this->galleryModel->find($id);
        if ($galleryItem) {
            // Hapus file fisik jika ada
            if ($galleryItem['image_path'] && file_exists(FCPATH . $galleryItem['image_path'])) {
                unlink(FCPATH . $galleryItem['image_path']);
            }
            $this->galleryModel->delete($id);
        }
        return redirect()->to('/admin')->with('msg', 'Gambar galeri berhasil dihapus.');
    }

    public function addDivision()
    {
        if (!$this->validate([
            'name' => 'required',
            'color' => 'required',
            'division_image' => [
                'rules' => 'uploaded[division_image]|max_size[division_image,1024]|is_image[division_image]|mime_in[division_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Logo divisi wajib diupload.',
                    'max_size' => 'Ukuran terlalu besar (max 1MB).',
                    'is_image' => 'File bukan gambar.',
                ]
            ]
        ])) {
            return redirect()->to('/admin')->withInput()->with('validation', \Config\Services::validation());
        }

        $file = $this->request->getFile('division_image');
        $path = $this->uploadImage($file, '/divisi');

        // Mapping warna dari Dropdown ke Class Tailwind
        $colorClass = 'bg-white text-gray-800'; // Default
        $selectedColor = $this->request->getPost('color');
        
        if ($selectedColor == 'blue') {
            $colorClass = 'bg-blue-500 text-white';
        } elseif ($selectedColor == 'red') {
            $colorClass = 'bg-red-500 text-white';
        }

        $this->divisionModel->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'image_path' => $path,
            'color_class' => $colorClass
        ]);

        return redirect()->to('/admin')->with('msg', 'Divisi berhasil ditambahkan');
    }

    // --- FUNGSI BARU: Hapus Divisi ---
    public function deleteDivision($id)
    {
        $item = $this->divisionModel->find($id);
        if ($item) {
            if ($item['image_path'] && file_exists(FCPATH . $item['image_path'])) {
                unlink(FCPATH . $item['image_path']);
            }
            $this->divisionModel->delete($id);
        }
        return redirect()->to('/admin')->with('msg', 'Divisi berhasil dihapus');
    }
}
