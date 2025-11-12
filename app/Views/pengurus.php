<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="text-white py-12 px-8" style="background: linear-gradient(to right, #0a67b4, #0a2fa3);">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-2">Kepengurusan Kami</h1>
    <p class="text-gray-100 text-lg max-w-2xl">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse semper dignissim bibendum.
    </p>
  </div>
</section>

<!-- Navigasi Divisi -->
<section class="py-10 px-8 bg-white">
  <div class="container mx-auto max-w-5xl">
    <div class="flex gap-8 text-xl font-semibold text-gray-900">
      <a href="#" class="text-blue-800 underline">BPH</a>
      <a href="#" class="hover:text-blue-800 transition">Divisi</a>
      <a href="#" class="hover:text-blue-800 transition">Divisi</a>
    </div>
  </div>
</section>

<!-- Struktur Pengurus -->
<section class="py-10 px-8 bg-white">
  <div class="container mx-auto max-w-6xl text-center space-y-16">

    <!-- Ketua -->
    <div>
      <div class="w-48 h-48 bg-blue-900 rounded-xl mx-auto"></div>
      <h3 class="mt-4 text-lg font-bold text-blue-900">Lorem</h3>
      <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur</p>
    </div>

    <!-- Wakil Ketua -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 justify-center items-center max-w-3xl mx-auto">
      <?php for ($i = 0; $i < 2; $i++): ?>
        <div class="text-center">
          <div class="w-40 h-40 bg-blue-900 rounded-xl mx-auto"></div>
          <h3 class="mt-4 text-lg font-bold text-blue-900">Lorem</h3>
          <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur</p>
        </div>
      <?php endfor; ?>
    </div>

    <!-- Sekretaris & Bendahara -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 justify-center items-center max-w-3xl mx-auto">
      <?php for ($i = 0; $i < 2; $i++): ?>
        <div class="text-center">
          <div class="w-40 h-40 bg-blue-900 rounded-xl mx-auto"></div>
          <h3 class="mt-4 text-lg font-bold text-blue-900">Lorem</h3>
          <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur</p>
        </div>
      <?php endfor; ?>
    </div>

    <!-- Divisi-divisi -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 justify-center items-center max-w-5xl mx-auto">
      <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="text-center">
          <div class="w-40 h-40 bg-blue-900 rounded-xl mx-auto"></div>
          <h3 class="mt-4 text-lg font-bold text-blue-900">Lorem</h3>
          <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur</p>
        </div>
      <?php endfor; ?>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
