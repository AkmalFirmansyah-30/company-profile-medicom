<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="text-white py-12 px-8" style="background: linear-gradient(to right, #0a67b4, #0a2fa3);">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-2">Program Kerja</h1>
        <p class="text-gray-100 text-lg max-w-2xl">
            Program kerja UKM Medicom Politeknik Negeri Cilacap (PNC)
            untuk mewujudkan mahasiswa kreatif dan inovatif 
            meningkatkan potensi mahasiswa di bidang
            multimedia dan komunikasi.
        </p>
    </div>
</section>

<section class="py-16 px-8 bg-white">
    <div class="container mx-auto max-w-5xl">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Apa Itu Medicom</h2>
        <p class="text-gray-700 text-justify leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu
            sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra,
            tincidunt magna a, pellentesque quis felis. Curabitur elementum felis. Ut
            dapibus enim velit quis augue pellentesque, hendrerit accumsan massa
            ultrices.
        </p>
        <p class="text-gray-700 text-justify leading-relaxed mt-4">
            Fusce id congue erat. Donec id est gravida, condimentum dui sed, mollis
            eros. Morbi at vulputate odio, molestie sodales mollis. Mauris maximus mi,
            commodo sed nisl sit amet, convallis tempor enim. Cras placerat pharetra
            augue, ut rutrum dui ornare laoreet. Vivamus egestas sed, elementum
            turpis nec, malesuada maximus diam. Nam sagittis euismod augue, id
            ullamcorper lectus nec maximus diam. Nam sagittis euismod augue, id
            ullamcorper lectus nec maximus diam. Nunc eu ipsum non nunc eleifend
            ullamcorper. Vivamus vitae felis vel massa semper tincidunt. Proin quis
            pharetra massa. Phasellus posuere sem vel urna sagittis, id molestie purus
            convallis. Vivamus dolor ipsum, ultrices.
        </p>
    </div>
</section>

<section class="py-16 px-8 text-white" style="background: linear-gradient(to bottom, #0a67b4, #0a2fa3);">
    <div class="container mx-auto max-w-5xl">
        <h2 class="text-3xl font-extrabold mb-4 text-center">Lorem Ipsum</h2>
        <p class="text-blue-100 mb-10 text-center max-w-4xl mx-auto">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu
            sollicitudin, pellentesque eros vel, molestie velit. Nulla ut nulla viverra,
            tincidunt magna a, pellentesque quis felis. Curabitur elementum felis. Ut
            dapibus enim velit quis augue pellentesque, hendrerit accumsan massa ultrices.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white/10 aspect-[3/1] border-2 border-white/30 rounded-lg"></div>
            <div class="bg-white/10 aspect-[3/1] border-2 border-white/30 rounded-lg"></div>
            <div class="bg-white/10 aspect-[3/1] border-2 border-white/30 rounded-lg"></div>
            <div class="bg-white/10 aspect-[3/1] border-2 border-white/30 rounded-lg"></div>
            <div class="bg-white/10 aspect-[3/1] border-2 border-white/30 rounded-lg"></div>
            <div class="bg-white/10 aspect-[3/1] border-2 border-white/30 rounded-lg"></div>
        </div>
    </div>
</section>

<section class="py-16 px-8 bg-white">
    <div class="container mx-auto max-w-5xl">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-10 text-center">Lorem Ipsum</h2>

        <div class="space-y-4 text-left">
            <?php 
                // Data program kerja (contoh statis untuk simulasi)
                $prokers = [
                    ['content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                    ['content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                    ['content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                    ['content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                    ['content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                    ['content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                    ['content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                    ['content' => 'Kegiatan tahunan yang rutin diselenggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi'],
                ];
            ?>

            <?php foreach ($prokers as $i => $p): ?>
                <div class="flex items-start gap-4 bg-white shadow-lg border border-gray-200 rounded-lg p-3 md:p-4 hover:shadow-xl transition-shadow">
                    <div class="w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-full bg-[#0a67b4] text-white font-semibold mt-0.5">
                        <?= $i + 1 ?>
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