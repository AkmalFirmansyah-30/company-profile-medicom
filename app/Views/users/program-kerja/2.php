<p>Test</p>
<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="text-white py-12 px-8" style="background: linear-gradient(to right, #0a67b4, #0a2fa3);">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-2">Program Kerja</h1>
        <p class="text-gray-100 text-lg max-w-2xl">
            Program kerja UKM Medicom Politeknik Negeri Cilacap (PNC)
            bertujuan untuk menciptakan media promosi kampus yang kreatif dan inovatif,
            serta untuk meningkatkan potensi mahasiswa di bidang
            multimedia dan komunikasi.
        </p>
    </div>
</section>

<section class="py-16 px-8 bg-white">
    <div class="container mx-auto max-w-5xl">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Pembelajaran Rutin</h2>
        <p class="text-gray-700 text-justify leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu
            sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra,
            tincidunt metus a, scelerisque nunc. Etiam convallis a lorem in finibus. Ut
            dignissim velit quis augue pellentesque, hendrerit accumsan massa ultrices.
        </p>
    </div>
</section>

<section class="py-16 px-8 text-white" style="background: linear-gradient(to bottom, #0a67b4, #0a2fa3);">
    <div class="container mx-auto max-w-5xl">
        <h2 class="text-3xl font-extrabold mb-4 text-center">Lorem Ipsum</h2>
        <p class="text-blue-100 mb-10 text-center max-w-4xl mx-auto">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu
            sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra,
            tincidunt metus a, scelerisque nunc. Etiam convallis a lorem in finibus. Ut
            dignissim velit quis augue pellentesque, hendrerit accumsan massa ultrices.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <?php for ($i=1; $i <= 4; $i++): ?>
                <div class="flex items-start gap-4 bg-white/10 border border-blue-500 rounded-lg p-5">
                    <div class="w-6 h-6 flex-shrink-0 flex items-center justify-center rounded-full bg-blue-900 border border-blue-400 font-semibold mt-0.5">
                        <span class="w-2 h-2 rounded-full bg-white"></span>
                    </div>
                    <p class="text-blue-100 text-sm md:text-base leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu
                        sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra,
                        tincidunt a lorem in finibus. Ut dignissim velit quis augue
                    </p>
                </div>
            <?php endfor; ?>
        </div>
        
        <p class="text-blue-100 text-justify leading-relaxed mt-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu
            sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra,
            tincidunt metus a, scelerisque nunc. Etiam convallis a lorem in finibus.
        </p>
    </div>
</section>

<section class="py-16 px-8 bg-white">
    <div class="container mx-auto max-w-5xl">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-10 text-center">Lorem Ipsum</h2>
        <p class="text-gray-700 text-center mb-8">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu
            sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra,
            tincidunt metus a, scelerisque nunc.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
            <?php 
                // Data program kerja (contoh statis untuk simulasi)
                $prokers_grid = [
                    ['id' => 1, 'content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                    ['id' => 3, 'content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                    ['id' => 2, 'content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                    ['id' => 4, 'content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                ];
            ?>

            <?php foreach ($prokers_grid as $p): ?>
                <div class="bg-white shadow-xl border border-gray-200 rounded-lg p-6">
                    <div class="w-10 h-10 flex-shrink-0 flex items-center justify-center rounded-full bg-[#0a67b4] text-white font-bold text-lg mb-4">
                        <?= $p['id'] ?>
                    </div>
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed">
                        <?= $p['content'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>