<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kelola Laporan Kinerja</h1>
    
    <form method="get" action="" class="flex gap-2">
        <select name="year" class="border p-2 rounded font-bold text-blue-800" onchange="this.form.submit()">
            <?php 
            $currentYear = date('Y');
            for($y = $currentYear; $y >= $currentYear - 4; $y--): ?>
                <option value="<?= $y ?>" <?= $selected_year == $y ? 'selected' : '' ?>><?= $y ?></option>
            <?php endfor; ?>
        </select>
    </form>
</div>

<div class="bg-white p-6 rounded shadow">
    <h2 class="text-lg font-bold mb-4 border-b pb-2">Edit Link Laporan Tahun <?= $selected_year ?></h2>
    
    <form action="/admin/updateLaporan" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="year" value="<?= $selected_year ?>">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php 
            $bulanNames = [
                1=>'Januari', 2=>'Februari', 3=>'Maret', 4=>'April', 5=>'Mei', 6=>'Juni',
                7=>'Juli', 8=>'Agustus', 9=>'September', 10=>'Oktober', 11=>'November', 12=>'Desember'
            ];
            foreach($bulanNames as $num => $name): 
                $val = $reports[$num] ?? '';
            ?>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1"><?= $name ?></label>
                    <input type="text" name="urls[<?= $num ?>]" value="<?= $val ?>" 
                           placeholder="https://..." 
                           class="w-full border p-2 rounded focus:ring focus:ring-blue-200 transition <?= $val ? 'bg-green-50 border-green-300' : '' ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-6 border-t pt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 font-semibold">
                Simpan Semua Link
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>