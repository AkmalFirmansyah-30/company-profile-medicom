<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Hero Section: Mini Quiz UKM Medicom (Tampilan Awal) -->
<section class="py-32 px-8 text-white text-center" style="background: linear-gradient(to bottom, #0a67b4, #0a2fa3);">
    <div class="container mx-auto max-w-4xl">
        
        <!-- Judul Quiz -->
        <h1 class="text-4xl font-extrabold mb-4">MINI QUIZ</h1>
        <h2 class="text-6xl font-extrabold mb-8">UKM MEDICOM</h2>
        
        <!-- Deskripsi Quiz -->
        <p class="text-blue-100 text-lg mb-12 max-w-2xl mx-auto leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Suspendisse semper dignissim bibendum. Sed venenatis
            volutpat eleifend
        </p>

        <!-- Kotak Placeholder (Progress/Soal) -->
        <div class="flex justify-center space-x-4 mb-16">
            <?php for ($i = 0; $i < 7; $i++): ?>
                <div class="w-16 h-10 bg-white/30 border border-white rounded-lg"></div>
            <?php endfor; ?>
        </div>
        
        <!-- Tombol Mulai Quiz (Mengarahkan ke halaman /quiz/start) -->
        <!-- Catatan: Pastikan Rute /quiz/start sudah didefinisikan di Routes.php dan MainUsers::startQuiz() -->
        <a href="<?= base_url('quiz/start') ?>" class="inline-block py-3 px-8 bg-white text-[#0a67b4] font-semibold text-lg rounded-full shadow-lg hover:bg-gray-100 transition duration-300">
            Mainkan Quiz →
        </a>

    </div>
</section>

<!-- Section Keterangan -->
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