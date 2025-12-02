<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Hero Section: Latar Belakang Biru Tua -->
<section class="min-h-[80vh] py-20 px-8 text-white flex flex-col items-center justify-center" style="background: linear-gradient(to bottom, #0a67b4, #0a2fa3);">
    <div class="container mx-auto max-w-4xl text-center">
        
        <!-- Judul Halaman -->
        <h1 class="text-5xl font-extrabold mb-10">ANALISIS HASIL QUIZ</h1>
        
        <!-- Kotak Rekomendasi (Card Putih Tengah) -->
        <div id="result-box" class="bg-white text-gray-800 p-8 md:p-12 rounded-xl shadow-2xl relative">
            
            <!-- Keterangan Skor/Rekomendasi Kecil di Atas -->
            <div id="result-info" class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-blue-600 text-white text-sm px-6 py-2 rounded-full shadow-lg font-semibold">
                Rekomendasi Divisi Terbaik Anda
            </div>

            <!-- Konten Utama Hasil -->
            <div class="pt-4 pb-8">

                <!-- Box Divisi Hasil (Dinamis dari Controller) -->
                <div class="bg-gray-100 border border-gray-300 p-6 rounded-lg shadow-inner">
                    <h2 class="text-5xl md:text-6xl font-black text-center text-blue-800 tracking-tight leading-none uppercase">
                        <?= esc($rekomendasi['nama']) ?>
                    </h2>
                </div>

                <!-- Deskripsi Singkat/Keterangan (Dinamis dari Controller) -->
                <div class="mt-8 bg-blue-50 p-4 rounded-lg text-left text-sm text-gray-700">
                    <h3 class="font-bold text-blue-800 mb-2">Keterangan Analisis:</h3>
                    <p>
                        <?= esc($rekomendasi['keterangan']) ?>
                    </p>
                </div>
            </div>

            <!-- Tombol Lanjut/Kembali ke Beranda -->
            <div class="mt-8">
                <a href="<?= base_url('/') ?>" class="inline-block py-3 px-8 bg-[#0a67b4] text-white font-semibold text-lg rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
                    Kembali ke Beranda →
                </a>
            </div>

        </div>

    </div>
</section>

<!-- Section Keterangan di Bawah -->
<section class="py-16 px-8 bg-white">
    <div class="container mx-auto max-w-5xl">
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Keterangan :</h3>
        <p class="text-gray-700 text-justify leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu
            sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra,
            tincidunt metus a, scelerisque nunc. Etiam convallis a lorem in finibus. Ut
            dignissim velit quis augue pellentesque, hendrerit accumsan massa ultrices.
        </p>
    </div>
</section>

<?= $this->endSection() ?>