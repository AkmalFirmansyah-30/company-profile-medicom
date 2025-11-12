<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="text-white py-12 px-8" style="background: linear-gradient(to right, #0a67b4, #0a2fa3);">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-2">Tentang Kami</h1>
    <p class="text-gray-100 text-lg max-w-2xl">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Suspendisse semper dignissim bibendum.
    </p>
  </div>
</section>

<!-- Apa itu Medicom -->
<section class="py-20 px-8 bg-white">
  <div class="container mx-auto max-w-4xl text-center">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Apa itu Medicom?</h2>
    <p class="text-gray-700 text-justify leading-relaxed">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse semper dignissim bibendum.
      Sed venenatis volutpat eleifend. Etiam lectus lorem, luctus at vestibulum non, euismod eget magna.
      Nulla tincidunt elementum lorem at aliquam. Nam sed dolor aliquet magna placerat vehicula. 
      Proin et diam dui. Vivamus et est tempus, scelerisque tellus nec, faucibus felis. Donec purus nunc, 
      volutpat sit amet dolor ut, mattis auctor sapien. Suspendisse vitae finibus lacus. 
      Proin ullamcorper felis nec lectus lacinia suscipit. Nullam quis justo eleifend purus ornare dignissim.
      In consectetur dui magna, eget feugiat tellus luctus in.
    </p>
  </div>
</section>

<!-- Tujuan Medicom -->
<section class="py-20 px-8 text-white" style="background: linear-gradient(to bottom, #0a67b4, #0a2fa3);">
  <div class="container mx-auto max-w-4xl text-center">
    <h2 class="text-3xl font-bold mb-4">Tujuan Medicom</h2>
    <p class="text-blue-100 mb-10 max-w-2xl mx-auto">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse semper dignissim bibendum.
      Sed venenatis volutpat eleifend.
    </p>

    <!-- Daftar Tujuan -->
    <div class="space-y-4 text-left">
      <?php
      $tujuan = [
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse semper dignissim.",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse semper dignissim bibendum.",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse semper dignissim bibendum.",
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse semper dignissim."
      ];
      foreach ($tujuan as $i => $t): ?>
        <div class="flex items-center gap-4 bg-blue-800/40 border border-blue-500 rounded-xl p-4">
          <div class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-900 border border-blue-400 font-semibold">
            <?= $i + 1 ?>
          </div>
          <p class="text-blue-100 text-sm md:text-base"><?= $t ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Video Profile -->
<section class="py-20 px-8 bg-white">
  <div class="container mx-auto max-w-5xl text-center">
    <h2 class="text-3xl font-bold text-gray-900 mb-8">Video Profile</h2>
    <div class="w-full aspect-video bg-gradient-to-r from-blue-700 to-blue-900 rounded-2xl shadow-lg flex items-center justify-center text-white">
      <span class="text-lg opacity-70">[ Video Profile Placeholder ]</span>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
