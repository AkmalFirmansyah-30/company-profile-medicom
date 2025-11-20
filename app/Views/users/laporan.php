<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="py-16 px-8 text-white" style="background: linear-gradient(to bottom, #0a67b4, #0a2fa3);">
  <div class="container mx-auto max-w-4xl">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold mb-2">Laporan Kinerja Bulanan</h1>
        <!-- <p class="text-blue-100 mb-6">Pilih tahun dan bulan untuk melihat laporan.</p> -->

        <div class="inline-flex bg-white/20 rounded-lg p-1 gap-2">
            <?php 
            $currentYear = date('Y');
            // Tampilkan 3 tahun terakhir + 1 tahun depan
            for ($y = $currentYear + 1; $y >= $currentYear - 3; $y--): 
                $isActive = $y == $selected_year;
            ?>
                <a href="?year=<?= $y ?>" 
                   class="px-4 py-2 rounded-md font-bold transition <?= $isActive ? 'bg-white text-blue-800 shadow' : 'text-white hover:bg-white/10' ?>">
                   <?= $y ?>
                </a>
            <?php endfor; ?>
        </div>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
      <?php 
      $bulan = [
        1=>'JANUARI', 2=>'FEBRUARI', 3=>'MARET', 4=>'APRIL', 5=>'MEI', 6=>'JUNI',
        7=>'JULI', 8=>'AGUSTUS', 9=>'SEPTEMBER', 10=>'OKTOBER', 11=>'NOVEMBER', 12=>'DESEMBER'
      ];
      foreach ($bulan as $num => $name): 
          $url = $reports[$num] ?? '#';
          $hasLink = $url !== '#' && $url !== '';
      ?>
        <a href="<?= $hasLink ? $url : 'javascript:void(0)' ?>" 
           <?= $hasLink ? 'target="_blank"' : '' ?>
           class="group py-4 px-2 rounded-xl border border-white/30 text-center transition relative overflow-hidden
                  <?= $hasLink ? 'bg-white/10 hover:bg-white hover:text-blue-800 cursor-pointer' : 'bg-black/10 text-white/50 cursor-not-allowed' ?>">
           
           <span class="font-bold block"><?= $name ?></span>
           
           <?php if(!$hasLink): ?>
               <span class="text-xs block mt-1 opacity-60">(Belum Tersedia)</span>
           <?php else: ?>
               <span class="text-xs block mt-1 opacity-80 group-hover:opacity-100 underline">Buka Laporan ↗</span>
           <?php endif; ?>
        </a>
      <?php endforeach; ?>
    </div>
    
  </div>
</section>

<section class="py-12 px-8 bg-white">
  <div class="container mx-auto max-w-4xl">
    <h2 class="text-xl font-bold text-gray-900 mb-3">Keterangan :</h2>
    <p class="text-gray-700 leading-relaxed">
      Laporan kinerja di atas bersumber dari Google Drive. Pastikan Anda memiliki akses internet untuk membukanya.
    </p>
  </div>
</section>

<?= $this->endSection() ?>