<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="text-white py-12 px-8" style="background: linear-gradient(to right, #0a67b4, #0a2fa3);">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-2">Prestasi Kami</h1>
    <p class="text-gray-100 text-lg max-w-2xl">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
      Suspendisse semper dignissim bibendum.
    </p>
  </div>
</section>

<!-- Content Section -->
<section class="container mx-auto px-8 py-16">
  <h2 class="text-3xl font-bold mb-8">Prestasi Kami</h2>

  <!-- Filter Tahun -->
  <div class="flex space-x-8 mb-10 font-semibold text-lg">
    <button class="year-btn text-black border-b-2 border-black" data-year="2024">2024</button>
    <button class="year-btn text-gray-500 hover:text-black" data-year="2023">2023</button>
    <button class="year-btn text-gray-500 hover:text-black" data-year="2022">2022</button>
    <button class="year-btn text-gray-500 hover:text-black" data-year="2021">2021</button>
  </div>

  <!-- Grid Prestasi -->
  <?php 
    $years = [2024, 2023, 2022, 2021];
    foreach ($years as $index => $year): 
  ?>
  <div id="prestasi-<?= $year ?>" class="prestasi-grid <?= $index === 0 ? '' : 'hidden' ?>">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12">
      <?php for ($i = 1; $i <= 9; $i++): ?>
        <div class="flex flex-col">
          <!-- Placeholder gambar -->
          <div class="bg-gray-300 rounded-lg w-full h-52 mb-4"></div>
          <h3 class="font-semibold text-base leading-tight">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </h3>
          <p class="text-gray-600 text-sm mt-1">Gemastik</p>
        </div>
      <?php endfor; ?>
    </div>
  </div>
  <?php endforeach; ?>
</section>

<!-- Script interaktif ganti tahun -->
<script>
  const yearButtons = document.querySelectorAll('.year-btn');
  const grids = document.querySelectorAll('.prestasi-grid');

  yearButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Reset semua tombol
      yearButtons.forEach(btn => {
        btn.classList.remove('text-black', 'border-b-2', 'border-black');
        btn.classList.add('text-gray-500');
      });

      // Aktifkan tombol yang diklik
      button.classList.remove('text-gray-500');
      button.classList.add('text-black', 'border-b-2', 'border-black');

      // Tampilkan grid sesuai tahun
      grids.forEach(grid => grid.classList.add('hidden'));
      document.getElementById(`prestasi-${button.dataset.year}`).classList.remove('hidden');
    });
  });
</script>

<?= $this->endSection() ?>
