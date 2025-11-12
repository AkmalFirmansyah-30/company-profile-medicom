<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Section Laporan Kinerja -->
<section class="py-16 px-8 text-white" style="background: linear-gradient(to bottom, #0a67b4, #0a2fa3);">
  <div class="container mx-auto max-w-3xl">

    <!-- Grid Judul + Tombol Bulan -->
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-center">

      <!-- Judul di baris penuh -->
      <div class="col-span-2 sm:col-span-3 mb-4">
        <h1 class="text-3xl font-bold mb-2">Laporan Kinerja Bulanan</h1>
        <p class="text-blue-100 text-base max-w-xl mx-auto">
          Pilih bulan untuk melihat laporan kegiatan UKM MEDICOM selama periode tersebut.
        </p>
      </div>

      <!-- Tombol Bulan -->
      <?php 
      $bulan = [
        'JANUARI','FEBRUARI','MARET',
        'APRIL','MEI','JUNI',
        'JULI','AGUSTUS','SEPTEMBER',
        'OKTOBER','NOVEMBER','DESEMBER'
      ];
      foreach ($bulan as $b): ?>
        <a href="#"
           class="py-3 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20 transition font-medium">
           <?= $b ?>
        </a>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- Keterangan -->
<section class="py-16 px-8 bg-white">
  <div class="container mx-auto max-w-4xl">
    <h2 class="text-xl font-bold text-gray-900 mb-3">Keterangan :</h2>
    <p class="text-gray-700 leading-relaxed text-justify">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae arcu sollicitudin, 
      pellentesque eros vel, molestie velit. Nulla ut nulla viverra, tincidunt metus a, 
      scelerisque nunc. Etiam convallis a lorem in finibus. Ut dignissim velit quis augue 
      pellentesque, hendrerit accumsan massa ultricies.
    </p>
  </div>
</section>

<?= $this->endSection() ?>
