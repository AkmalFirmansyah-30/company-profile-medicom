<!-- Header Navbar -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'UKM Medicom PNC') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="w-full border border-gray-300 flex items-center justify-between px-8 py-3 bg-white">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="/src/img/logo/logo_Medicom_2_1.png" alt="Logo" class="h-10">
            <div class="text-xs leading-tight">
                <span class="block font-medium text-blue-900">MediCom</span>
                <span class="block text-[10px] text-gray-500">Politeknik Negeri Cilacap</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <ul class="flex items-center space-x-8 font-semibold text-gray-800">
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
                
                <!-- Dropdown -->
                <ul class="bg-white absolute opacity-0 invisible group-hover:opacity-100 group-hover:visible 
                    transition-all duration-300 ease-in-out
                    shadow-md rounded-md mt-2 py-2 w-48 border border-gray-100">
                    
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
                            shadow-md rounded-md border border-gray-100 w-48 py-2 transition-all duration-300">
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

        <!-- Quiz Button -->
        <a href="<?= base_url('#') ?>" 
           class="flex items-center gap-2 text-white font-semibold px-4 py-2 rounded-md"
           style="background: linear-gradient(to right, #007BFF, #0026FF);">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h4l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2z" />
            </svg>
            Quiz
        </a>
    </nav>
</body>
</html>
