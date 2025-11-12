<?= $this->extend('layout/template'); ?>

<?= $this->section('content')?>
<!-- Hero Section -->
<section class="text-center pt-12 pb-12">
    <h2 class="text-2xl font-semibold">Unit Kegiatan Mahasiswa <span class="text-blue-600">Medicom</span></h2>
    <p class="text-gray-700">Politeknik Negeri Cilacap</p>
    <div class="flex justify-center my-6">
        <div class="w-[90%] h-[380px] bg-gray-200 rounded-lg">
            <!-- <img src="/src/img/main.jpg" alt=""> -->
        </div>
    </div>
</section>

<!-- Tentang Kami -->
<section id="tentang" class="text-center py-2">
    <h3 class="text-2xl font-bold mb-2">Tentang Kami</h3>
    <p class="max-w-3xl mx-auto text-gray-600">
        UKM MEDICOM Politeknik Negeri Cilacap adalah komunitas mahasiswa yang bergerak di bidang multimedia dan komunikasi.
    </p>
    <div class="flex justify-center gap-8 mt-8">
        <div><p class="text-3xl font-bold text-blue-600">2023</p><p>Tahun Berdiri</p></div>
        <div><p class="text-3xl font-bold text-blue-600">200+</p><p>Total Anggota</p></div>
        <div><p class="text-3xl font-bold text-blue-600">7</p><p>Divisi</p></div>
    </div>
    <button class="mt-6 px-6 py-2 bg-blue-600 text-white rounded-lg">
        <a href="/about">Selengkapnya</a>
    </button>
</section>

<!-- Parther Kami -->
<section id="partner" class="text-center pt-2 pb-10">
    <h3 class="text-2xl font-bold mb-6">Partner Kami</h3>
    <div class="flex justify-center gap-8">
        <div class="w-32 h-32 bg-gray-200 rounded-lg"></div>
        <div class="w-32 h-32 bg-gray-200 rounded-lg"></div>
        <div class="w-32 h-32 bg-gray-200 rounded-lg"></div>
        <div class="w-32 h-32 bg-gray-200 rounded-lg"></div>
    </div>
</section>

<!-- Divisi Kami -->
<section id="divisi" class="text-center py-10 bg-gray-50 w-full text-white py-16 px-8 bg-gradient-to-br from-[#0468BF] via-[#034C8C] to-[#030A8C]">
    <h3 class="text-2xl font-bold mb-6">Divisi Kami</h3>
    <p class="max-w-3xl mx-auto text-gray-600 mb-6 text-white">
        Kami memiliki divisi teknis yang menaungi spesifik keilmuan dalam bidang multimedia dan komunikasi
    </p>
    <div class="grid grid-cols-8 gap-y-8 max-w-4xl mx-auto mb-8 justify-items-center">
        <div class="w-40 h-40 p-4 bg-white rounded-lg shadow-md col-span-2">
            </div>
        <div class="w-40 h-40 p-4 bg-white rounded-lg shadow-md col-span-2">
            </div>
        <div class="w-40 h-40 p-4 bg-white rounded-lg shadow-md col-span-2">
            </div>
        <div class="w-40 h-40 p-4 bg-white rounded-lg shadow-md col-span-2">
            </div>
        <div class="w-40 h-40 p-4 bg-blue-500 rounded-lg shadow-md col-start-2 col-span-2">
            </div>
        <div class="w-40 h-40 p-4 bg-red-500 rounded-lg shadow-md col-start-4 col-span-2">
        </div>
        <div class="w-40 h-40 p-4 bg-red-500 rounded-lg shadow-md col-start-6 col-span-2">
        </div>
    </div>
</section>

<!-- Program Kerja -->
<section id="program" class="text-center py-10">
    <h3 class="text-2xl font-bold mb-6">Program Kerja</h3>
    <p class="max-w-3xl mx-auto text-gray-600 mb-6">
        Kergiatan tahunan yang rutin diselemggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi
    </p>
    <div class="grid grid-cols-3 gap-6 max-w-5xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="w-full h-56 bg-gray-200 rounded-lg mb-4"></div>
            <h4 class="font-semibold mb-2">Program Kerja</h4>
            <p class="text-gray-600">Deskripsi singkat</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="w-full h-56 bg-gray-200 rounded-lg mb-4"></div>
            <h4 class="font-semibold mb-2">Program Kerja</h4>
            <p class="text-gray-600">Deskripsi singkat</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="w-full h-56 bg-gray-200 rounded-lg mb-4"></div>
            <h4 class="font-semibold mb-2">Program Kerja</h4>
            <p class="text-gray-600">Deskripsi singkat</p>
        </div>
    </div>
</section>

<!-- Prestasi Kami -->
 <section id="prestasi" class="text-center py-10 bg-gray-50 w-full text-white py-16 px-8 bg-gradient-to-br from-[#0468BF] via-[#034C8C] to-[#030A8C]">
    <div class= "grid grid-cols-1 grid-rows-2 max-w-5xl mx-auto text-left pl-8">
        <div class= "">
            <h3 class="text-2xl font-bold mb-6">Prestasi Kami</h3>
        </div>
        <div class= "text-lg">
            <a>2023</a>
            <a>2024</a>
            <a>2025</a>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-6 max-w-5xl mx-auto text-left">
        <div class="rounded-lg p-6">
            <div class= "h-40 rounded-lg mb-4">
                <img src="https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75" alt="">
            </div>
            <h4 class="font-semibold mb-2 text-lg">Nama Prestasi</h4>
            <p class="">Tahun - Tingkat</p>
        </div>
        <div class="rounded-lg p-6">
            <div class= "h-40 rounded-lg mb-4">
                <img src="https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75" alt="">
            </div>
            <h4 class="font-semibold mb-2 text-lg">Nama Prestasi</h4>
            <p class="">Tahun - Tingkat</p>
        </div>
        <div class="rounded-lg p-6">
            <div class= "h-40 rounded-lg mb-4">
                <img src="https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75" alt="">
            </div>
            <h4 class="font-semibold mb-2 text-lg">Nama Prestasi</h4>
            <p class="">Tahun - Tingkat</p>
        </div>
    </div>
</section>

<!-- Galeri Kegiatan -->
 <section id="prestasi" class="text-center py-10">
    <h3 class="text-xl font-bold mb-6">Galeri Kegiatan</h3>
    <div class="grid grid-cols-4 gap-4 max-w-5xl mx-auto">
        <div class="w-full bg-gray-200 rounded-lg col-span-2 row-span-2"></div>
        <div class="w-full h-40 bg-gray-200 rounded-lg"></div>
        <div class="w-full h-40 bg-gray-200 rounded-lg"></div>
        <div class="w-full h-40 bg-gray-200 rounded-lg"></div>
        <div class="w-full h-40 bg-gray-200 rounded-lg"></div>
        <div class="w-full h-40 bg-gray-200 rounded-lg"></div>
        <div class="w-full h-40 bg-gray-200 rounded-lg"></div>
        <div class="w-full h-40 bg-gray-200 rounded-lg"></div>
        <div class="w-full h-40 bg-gray-200 rounded-lg"></div>
    </div>
</section>
<!-- Tambahkan section lain seperti Partner, Divisi, Program, Prestasi, Galeri -->
<!-- ... -->

<?= $this->endsection()?>