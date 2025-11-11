<?= $this->include('layout/header'); ?>

<!-- Hero Section -->
<section class="text-center pt-12 pb-16">
    <h2 class="text-2xl font-semibold">Unit Kegiatan Mahasiswa <span class="text-blue-600">Medicom</span></h2>
    <p class="text-gray-700">Politeknik Negeri Cilacap</p>
    <div class="flex justify-center my-6">
        <div class="w-[90%] h-64 bg-gray-200 rounded-lg"></div>
    </div>
</section>

<!-- Tentang Kami -->
<section id="tentang" class="text-center py-10 bg-gray-50">
    <h3 class="text-xl font-bold mb-2">Tentang Kami</h3>
    <p class="max-w-3xl mx-auto text-gray-600">
        UKM MEDICOM Politeknik Negeri Cilacap adalah komunitas mahasiswa yang bergerak di bidang multimedia dan komunikasi.
    </p>
    <div class="flex justify-center gap-8 mt-8">
        <div><p class="text-3xl font-bold text-blue-600">2023</p><p>Tahun Berdiri</p></div>
        <div><p class="text-3xl font-bold text-blue-600">200+</p><p>Total Anggota</p></div>
        <div><p class="text-3xl font-bold text-blue-600">7</p><p>Divisi</p></div>
    </div>
    <button class="mt-6 px-6 py-2 bg-blue-600 text-white rounded-lg">Selengkapnya</button>
</section>

<!-- Tambahkan section lain seperti Partner, Divisi, Program, Prestasi, Galeri -->
<!-- ... -->

<?= $this->include('layout/footer'); ?>
