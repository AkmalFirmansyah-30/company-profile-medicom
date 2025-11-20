<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="text-white py-12 px-8" style="background: linear-gradient(to right, #0a67b4, #0a2fa3);">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-2">Struktur Pengurus</h1>
    <p class="text-gray-100 text-lg">Kenali tim di balik layar Medicom.</p>
  </div>
</section>

<section class="py-10 px-8 bg-white min-h-screen">
  <div class="container mx-auto max-w-6xl">
    
    <div class="flex flex-wrap justify-left gap-8 mb-12 font-semibold text-lg">
        <?php foreach($divisions as $index => $div): ?>
            <button onclick="showDivisi('div-<?= $div['id'] ?>')" 
                    class="div-btn pb-1 border-b-2 transition-colors duration-300 
                    <?= $index === 0 
                        ? 'text-blue-800 border-blue-800'
                        : 'text-gray-400 border-transparent hover:text-blue-800'
                    ?>"
                    id="btn-div-<?= $div['id'] ?>">
                <?= $div['name'] ?>
            </button>
        <?php endforeach; ?>
    </div>

    <?php foreach($divisions as $index => $div): ?>
    <div id="div-<?= $div['id'] ?>" class="div-content <?= $index === 0 ? '' : 'hidden' ?>">
        
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-2"><?= $div['name'] ?></h2>
            <p class="text-gray-500 max-w-2xl mx-auto"><?= $div['description'] ?? '' ?></p>
        </div>

        <?php 
        $allMembers = array_filter($members, function($m) use ($div) { 
            return $m['division_id'] == $div['id']; 
        });

        $isBPH = stripos($div['name'], 'BPH') !== false || stripos($div['name'], 'Badan Pengurus Harian') !== false;

        $level1 = []; // BPH: Ketua | Divisi: Ketua
        $level2 = []; // BPH: Wakil | Divisi: Staff
        $level3 = []; // BPH: Sekben | Divisi: -

        foreach ($allMembers as $m) {
            $pos = strtolower($m['position']);

            if ($isBPH) {
                if (str_contains($pos, 'ketua') && !str_contains($pos, 'wakil')) {
                    $level1[] = $m;
                } elseif (str_contains($pos, 'wakil')) {
                    $level2[] = $m;
                } else {
                    $level3[] = $m;
                }
            } else {
                if (str_contains($pos, 'ketua') || str_contains($pos, 'koordinator')) {
                    $level1[] = $m;
                } else {
                    $level2[] = $m;
                }
            }
        }
        ?>

        <div class="space-y-12">
            
            <?php if (!empty($level1)): ?>
            <div class="flex flex-wrap justify-center gap-8">
                <?php foreach($level1 as $m): ?>
                    <?php renderMemberCard($m); ?> 
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($level2)): ?>
            <div class="flex flex-wrap justify-center gap-8">
                <?php foreach($level2 as $m): ?>
                    <?php renderMemberCard($m); ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if ($isBPH && !empty($level3)): ?>
            <div class="flex flex-wrap justify-center gap-8">
                <?php foreach($level3 as $m): ?>
                    <?php renderMemberCard($m); ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if (empty($allMembers)): ?>
                <p class="text-center text-gray-400 italic py-10">Belum ada anggota di divisi ini.</p>
            <?php endif; ?>

        </div>

    </div>
    <?php endforeach; ?>
    
    <?php 
    function renderMemberCard($m) {
    ?>
        <div class="text-center group w-48"> 
            <div class="relative w-40 h-40 mx-auto mb-4 rounded-xl overflow-hidden shadow-lg ring-4 ring-white bg-gray-200">
                <img src="<?= $m['image_path'] ?>" class="w-full h-full object-cover transition duration-500 transform group-hover:scale-110">
            </div>
            <h3 class="text-lg font-bold text-blue-900 leading-tight"><?= $m['name'] ?></h3>
            <div class="inline-block bg-blue-50 text-blue-700 text-xs px-2 py-1 rounded-full mt-1 font-semibold border border-blue-100">
                <?= $m['position'] ?>
            </div>
        </div>
    <?php 
    } 
    ?>

  </div>
</section>

<script>
function showDivisi(divId) {
    document.querySelectorAll('.div-content').forEach(el => el.classList.add('hidden'));
    document.getElementById(divId).classList.remove('hidden');
    
    document.querySelectorAll('.div-btn').forEach(btn => {
        btn.classList.remove('text-blue-800', 'border-blue-800');
        btn.classList.add('text-gray-400', 'border-transparent');
    });
    
    const activeBtn = document.getElementById('btn-' + divId);
    activeBtn.classList.remove('text-gray-400', 'border-transparent');
    activeBtn.classList.add('text-blue-800', 'border-blue-800');
}
</script>

<?= $this->endSection() ?>