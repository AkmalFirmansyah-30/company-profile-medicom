<?= $this->extend('layout/template'); ?>

<?= $this->section('content')?>
<!-- Hero Section -->
<section class="text-center pt-4 pb-0 justify-center">
    <div class= "bg-gray">
        <img src="/src/img/logo/logo_Medicom_2_1.png" alt="" class="w-28 h-28 mx-auto mb-4">
    </div>
    <h3 class="text-2xl font-semibold">Unit Kegiatan Mahasiswa <span class="text-blue-600">Medicom</span></h3>
    <h3 class="text-2xl font-semibold">Politeknik Negeri Cilacap</h3>
    <div class="flex justify-center my-6">
        <div class="w-[80%] h-[290px] bg-gray-200 rounded-lg">
            <?php if(!empty($hero['image_path'])): ?>
                    <img src="<?= $hero['image_path'] ?>" class="w-full h-full object-cover rounded-lg" alt="Gambar Utama">
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Tentang Kami -->
<section id="tentang" class="text-center py-4">
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
<section id="partner" class="text-center pt-4 pb-10">
    <h3 class="text-2xl font-bold mb-6">Partner Kami</h3>
    <div class="flex justify-center gap-12">
        <?php foreach($partners as $p): ?>
            <div class="w-32 h-32 bg-gray-200 rounded-lg overflow-hidden">
                <img src="/src/img/partner<?= $p['image_path'] ?>" alt="<?= $p['name'] ?>" class="w-full h-full object-contain">
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Divisi Kami -->
 <section id="divisi" class="text-center py-16 px-8 bg-gradient-to-br from-[#0468BF] via-[#034C8C] to-[#030A8C] text-white">
    <h3 class="text-2xl font-bold mb-6">Divisi Kami</h3>
    <p class="max-w-3xl mx-auto text-gray-200 mb-8">
        Kami memiliki divisi teknis yang menaungi spesifik keilmuan dalam bidang multimedia dan komunikasi
    </p>
    
    <div class="flex flex-wrap justify-center gap-8 max-w-4xl mx-auto">
        
        <?php foreach($divisions as $div): ?>
            <div class="w-40 h-40 p-4 rounded-lg shadow-md flex flex-col items-center justify-center transition-transform hover:scale-105 duration-300 <?= $div['color_class'] ?>">
                <div class="w-32 h-32 mb-0 flex items-center justify-center">
                    <img src="<?= $div['image_path'] ?>" alt="<?= $div['name'] ?>" class="w-full h-full object-contain">
                </div>
                <h4 class="font-bold text-sm leading-tight"><?= $div['name'] ?></h4>
            </div>
        <?php endforeach; ?>

    </div>
</section>

<!-- Program Kerja -->
<section id="program" class="text-center py-10">
    <h3 class="text-2xl font-bold mb-6">Program Kerja</h3>
    <p class="max-w-3xl mx-auto text-gray-600 mb-6">
        Kergiatan tahunan yang rutin diselemggarakan UKM MEDICOM guna memberikan keilmuan pada mahasiswa di bidang multimedia dan komunikasi
    </p>
    <div class="grid grid-cols-3 gap-6 max-w-5xl mx-auto">
        <?php foreach($programs as $prog): ?>
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="w-full h-56 bg-gray-200 rounded-lg mb-4 overflow-hidden">
                <img src="/src/img/programs/<?= $prog['image_path'] ?>" class="w-full h-full object-cover">
            </div>
            <h4 class="font-semibold mb-2"><?= $prog['title'] ?></h4>
            <p class="text-gray-600"><?= $prog['description'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Prestasi Kami -->
 <?php
    $unique_years = [];
    if (!empty($achievements_by_year)) {
        $unique_years = array_unique(array_column($achievements_by_year, 'year'));
        rsort($unique_years); // Urutkan dari tahun terbaru
    }

    $achievements_grouped = [];
    foreach ($achievements_by_year as $item) {
        $achievements_grouped[$item['year']][] = $item;
    }
?>

<!-- Prestasi Kami -->
<section id="prestasi" class="text-center w-full text-white py-16 px-8 bg-gradient-to-br from-[#0468BF] via-[#034C8C] to-[#030A8C]">
    <div class="max-w-5xl mx-auto text-left">
        <!-- Header & Pager Tahun -->
        <div class="pl-0 md:pl-2 lg:pl-0 mb-6">
            <h3 class="text-2xl font-bold pb-2">Prestasi Kami</h3>
            <!-- Pager Tahun Dinamis -->
            <div class="flex space-x-6 mb-0 font-semibold text-lg" id="year-tabs">
                <?php foreach($unique_years as $index => $year): ?>
                    <button class="year-btn transition-colors duration-300 
                        <?= $index === 0 ? 'border-b-2 border-white text-white' : 'text-gray-300 hover:text-white' ?>" 
                        onclick="showYear('<?= $year ?>', this)">
                        <?= $year ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="relative mt-8">
            <?php foreach($unique_years as $index => $year): ?>
                <div id="slider-<?= $year ?>" class="achievement-slider <?= $index === 0 ? '' : 'hidden' ?>">
                    
                    <div class="swiper swiper-<?= $year ?>">
                        <div class="swiper-wrapper pb-12>
                            
                            <?php 
                            if (isset($achievements_grouped[$year])):
                                foreach($achievements_grouped[$year] as $item): 
                            ?>
                                
                                <!-- Setiap prestasi adalah sebuah "swiper-slide" -->
                                <div class="swiper-slide h-auto">
                                    <div class="rounded-lg p-4 bg-white text-black h-full flex flex-col">
                                        <div class="h-40 rounded-lg mb-4 overflow-hidden">
                                            <img src="<?= $item['image_path'] ?>" alt="<?= $item['name'] ?>" class="w-full h-full object-cover">
                                        </div>
                                        <h4 class="font-semibold mb-2 text-lg"><?= $item['name'] ?></h4>
                                        <p class="text-gray-600 mt-auto"><?= $item['year'] ?> - <?= $item['level'] ?></p>
                                    </div>
                                </div>

                            <?php 
                                endforeach;
                            endif; 
                            ?>
                        </div>
                        
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<script>
    function showYear(year, clickedButton) {
        document.querySelectorAll('.achievement-slider').forEach(slider => {
            slider.classList.add('hidden');
        });
        document.getElementById('slider-' + year).classList.remove('hidden');

        document.querySelectorAll('.year-btn').forEach(btn => {
            btn.classList.remove('border-b-2', 'border-white', 'text-white');
            btn.classList.add('text-gray-300', 'hover:text-white');
        });
        clickedButton.classList.add('border-b-2', 'border-white', 'text-white');
        clickedButton.classList.remove('text-gray-300', 'hover:text-white');
    }

    <?php foreach($unique_years as $year): ?>
    new Swiper('.swiper-<?= $year ?>', {
        
        slidesPerView: 1, 
        spaceBetween: 24, 

        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // --- FITUR BARU DITAMBAHKAN DI SINI ---
        
        mousewheel: {
            forceToAxis: true,
            sensitivity: 1,
            releaseOnEdges: true,
        },

        grabCursor: true,

        keyboard: {
            enabled: true,
        },

        watchOverflow: true,
    });
    <?php endforeach; ?>
</script>

<!-- Galeri Kegiatan -->
 <section id="galeri" class="text-center py-10">
    <h3 class="text-2xl font-bold mb-6">Galeri Kegiatan</h3>
    <div class="grid grid-cols-4 gap-4 max-w-5xl mx-auto">
        
        <?php
        if (!empty($gallery)):

            $first_item = array_shift($gallery);
        ?>
        
        <div class="w-full rounded-lg col-span-2 row-span-2 overflow-hidden bg-gray-200">
            <img src="<?= $first_item['image_path'] ?>" 
                 alt="<?= $first_item['caption'] ?? 'Galeri Utama' ?>" 
                 class="w-full h-full object-cover">
        </div>

        <?php
            foreach ($gallery as $item):
        ?>

        <div class="w-full h-40 bg-gray-200 rounded-lg overflow-hidden">
            <img src="<?= $item['image_path'] ?>" 
                 alt="<?= $item['caption'] ?? 'Galeri' ?>" 
                 class="w-full h-full object-cover">
        </div>

        <?php 
            endforeach; 
        endif; 
        ?>

    </div> <!-- Penutup grid -->
</section>

<?= $this->endsection()?>