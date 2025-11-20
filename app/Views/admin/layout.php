<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Medicom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 flex h-screen overflow-hidden">

    <aside class="w-64 bg-white shadow-lg flex flex-col flex-shrink-0">
        <div class="p-6 border-b">
            <h1 class="text-2xl font-bold text-blue-800">Medicom Admin</h1>
        </div>
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <?php 
                // Logika untuk mendeteksi halaman aktif
                $uri = service('uri');
                $segment = $uri->getSegment(2) ?? 'hero'; // Halaman default
                
                // Helper function untuk kelas aktif
                $isActive = function($page) use ($segment) {
                    return $segment == $page ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-600';
                };
            ?>
            <div class="px-4 py-2 mt-4 text-xs font-bold text-gray-400 uppercase">Halaman Website</div>

            <a href="/admin/about" class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 <?= ($segment == 'about') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-600' ?>">
                📄 Halaman About
            </a>
                        
            <a href="/admin/prestasiPage" class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 <?= ($segment == 'prestasiPage') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-600' ?>">
                📄 Halaman Prestasi (Header)
            </a>

            <a href="/admin/pengurus" class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 <?= ($segment == 'pengurus') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-600' ?>">
                👔 Struktur Pengurus
            </a>
            
            <a href="/admin/laporan" class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 <?= ($segment == 'laporan') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-600' ?>">
                📊 Laporan Kinerja
            </a>
            
            <a href="/admin/hero" class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 <?= $isActive('hero') ?>">
                🖼️ Hero Image
            </a>
            <a href="/admin/partners" class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 <?= $isActive('partners') ?>">
                🤝 Partner
            </a>
            <a href="/admin/programs" class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 <?= $isActive('programs') ?>">
                📋 Program Kerja
            </a>
            <a href="/admin/achievements" class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 <?= $isActive('achievements') ?>">
                🏆 Prestasi
            </a>
            <a href="/admin/divisions" class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 <?= $isActive('divisions') ?>">
                👥 Divisi
            </a>
            <a href="/admin/gallery" class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 <?= $isActive('gallery') ?>">
                📸 Galeri
            </a>
        </nav>
        <div class="p-4 border-t">
            <a href="/logout" class="block w-full text-center bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">Logout</a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <header class="bg-white shadow-sm p-4 flex justify-end items-center">
            <div class="flex items-center gap-4">
                <span class="text-gray-600 text-sm">Halo, <strong><?= session()->get('username') ?></strong></span>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            
            <?php if (session()->getFlashdata('msg')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <?= session()->getFlashdata('msg') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
            
        </div>
    </main>

</body>
</html>