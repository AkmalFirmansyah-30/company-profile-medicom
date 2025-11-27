<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="text-white py-12 px-8" style="background: linear-gradient(to right, #0a67b4, #0a2fa3);">
    <div class="container mx-auto max-w-5xl">
        <h1 class="text-3xl font-bold mb-2">Program Kerja</h1>
        <p class="text-gray-100 text-lg leading-relaxed">
            Program kerja UKM Mediacom Politeknik Negeri Cilacap (PNC) bertujuan untuk
            menciptakan media promosi kampus yang kreatif dan informatif, serta
            mengembangkan potensi mahasiswa di bidang multimedia dan komunikasi.
        </p>
    </div>
</section>

<section class="py-16 px-8 bg-white">
    <div class="container mx-auto max-w-5xl">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Pembelajaran Rutin</h2>
        
        <p class="text-gray-700 text-justify leading-relaxed mb-10">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu
            sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra,
            tincidunt metus a, scelerisque nunc. Etiam convallis a lorem in finibus. Ut
            dignissim velit quis augue pellentesque, hendrerit accumsan massa ultrices.
        </p>

        <p class="text-gray-700 text-justify leading-relaxed mb-10">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu
            sollicitudin, pellentesque eros vel, molestie velit. Nulla
        </p>
        
        <div class="grid grid-cols-3 gap-4">
            <?php for ($i = 0; $i < 9; $i++): ?>
                <div class="w-full aspect-square bg-gray-200 flex items-center justify-center border border-gray-400">
                    <svg class="w-1/3 h-1/3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            <?php endfor; ?>
        </div>
        
    </div>
</section>

<?= $this->endSection() ?>