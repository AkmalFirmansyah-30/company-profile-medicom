<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'UKM Medicom PNC') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<body>
    <nav class="w-full border-b border-gray-200 flex items-center justify-between px-8 py-3 bg-white fixed top-0 left-0 right-0 z-50 shadow-md">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <a href="<?= base_url('/') ?>">
                <!-- Ganti path gambar sesuai struktur project Anda -->
                <img src="/src/img/logo/Logo Navbar.png" alt="Logo UKM Medicom" class="h-10">
            </a>
        </div>

        <!-- Navigation Menu -->
        <!-- Hidden on small screens to show hamburger/menu icon (implementasi opsional untuk responsif) -->
        <ul class="hidden md:flex items-center space-x-8 font-semibold text-gray-800">
            <li><a href="<?= base_url('/') ?>" class="hover:text-blue-600">Beranda</a></li>
            <li><a href="<?= base_url('/about') ?>" class="hover:text-blue-600">Tentang Kami</a></li>
            
            <!-- Dropdown Profil -->
            <li class="relative group">
                <button class="flex items-center hover:text-blue-600 focus:outline-none">
                    Profil
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                
                <!-- Dropdown Content -->
                <ul class="bg-white absolute opacity-0 invisible group-hover:opacity-100 group-hover:visible 
                    transition-all duration-300 ease-in-out
                    shadow-xl rounded-md mt-2 py-2 w-48 border border-gray-100 z-50">
                    
                    <!-- Program Kerja (utama) -->
                    <li class="relative group/program">
                        <button class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100">
                            Program Kerja
                            <svg class="w-4 h-4 ml-2 text-gray-600 group-hover/program:text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <!-- Submenu Program Kerja -->
                        <ul class="absolute left-full top-0 mt-0 ml-1 bg-white opacity-0 invisible 
                            group-hover/program:opacity-100 group-hover/program:visible
                            shadow-xl rounded-md border border-gray-100 w-48 py-2 transition-all duration-300 z-50">
                            <li><a href="<?= base_url('/program-kerja/1') ?>" class="block px-4 py-2 hover:bg-gray-100">Program Kerja 1</a></li>
                            <li><a href="<?= base_url('/program-kerja/2') ?>" class="block px-4 py-2 hover:bg-gray-100">Program Kerja 2</a></li>
                            <li><a href="<?= base_url('/program-kerja/3') ?>" class="block px-4 py-2 hover:bg-gray-100">Program Kerja 3</a></li>
                        </ul>
                    </li>

                    <!-- Lainnya -->
                    <li><a href="<?= base_url('/pengurus') ?>" class="block px-4 py-2 hover:bg-gray-100">Pengurus</a></li>
                    <li><a href="<?= base_url('/prestasi') ?>" class="block px-4 py-2 hover:bg-gray-100">Prestasi</a></li>
                </ul>
            </li>

            <li><a href="<?= base_url('/laporan') ?>" class="hover:text-blue-600">Laporan Kinerja</a></li>
        </ul>

        <!-- Quiz Button (Link telah diperbarui) -->
        <a href="<?= base_url('/quiz') ?>" 
            class="flex items-center gap-2 text-white font-semibold px-4 py-2 rounded-md transition duration-300 transform hover:scale-105"
            style="background: linear-gradient(to right, #007BFF, #0026FF);">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h4l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2z" />
            </svg>
            Quiz
        </a>
    </nav>
    <div class="pt-[70px]"></div> <!-- Spacer agar konten tidak tertutup fixed header -->