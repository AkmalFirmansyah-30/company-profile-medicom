<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="text-white py-12 px-8" style="background: linear-gradient(to right, #0a67b4, #0a2fa3);">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-2"><?= $page['hero_title'] ?></h1>
    <p class="text-gray-100 text-lg max-w-2xl"><?= $page['hero_description'] ?></p>
  </div>
</section>

<!-- Content Section -->
<section class="container mx-auto px-8 py-16">
  <h2 class="text-3xl font-bold mb-8">Prestasi Kami</h2>
  
  <?php 
    // Persiapan Data Tahun
    $unique_years = [];
    if (!empty($achievements_by_year)) {
        $unique_years = array_unique(array_column($achievements_by_year, 'year'));
        rsort($unique_years);
    }
    
    // Grouping Data
    $achievements_grouped = [];
    foreach ($achievements_by_year as $item) {
        $achievements_grouped[$item['year']][] = $item;
    }
  ?>

  <div class="flex space-x-8 mb-10 font-semibold text-lg overflow-x-auto">
    <?php foreach($unique_years as $index => $year): ?>
        <button class="year-btn <?= $index === 0 ? 'text-black border-b-2 border-black' : 'text-gray-500 hover:text-black' ?>" data-year="<?= $year ?>">
            <?= $year ?>
        </button>
    <?php endforeach; ?>
  </div>

  <?php foreach ($unique_years as $index => $year): ?>
  <div id="prestasi-<?= $year ?>" class="prestasi-grid <?= $index === 0 ? '' : 'hidden' ?>">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12">
      
      <?php if(isset($achievements_grouped[$year])): ?>
        <?php foreach ($achievements_grouped[$year] as $item): ?>
            <div class="flex flex-col h-full">
            <div class="bg-gray-200 rounded-lg w-full h-52 mb-4 overflow-hidden">
                <img src="<?= $item['image_path'] ?>" class="w-full h-full object-cover">
            </div>
            <h3 class="font-semibold text-base leading-tight mb-1">
                <?= $item['name'] ?>
            </h3>
            <p class="text-gray-600 text-sm"><?= $item['level'] ?></p>
            </div>
        <?php endforeach; ?>
      <?php endif; ?>

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
