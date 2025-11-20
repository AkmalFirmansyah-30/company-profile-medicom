<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Header Halaman Prestasi</h1>

<div class="bg-white p-6 rounded shadow mb-8">
    <div class="mb-4 p-4 bg-blue-50 text-blue-800 rounded text-sm">
        ℹ️ <strong>Catatan:</strong> Untuk menambah/menghapus data prestasi (lomba), silakan gunakan menu <strong>🏆 Prestasi</strong> di sidebar. Halaman ini khusus untuk mengedit judul dan deskripsi header.
    </div>

    <form action="/admin/updatePrestasiPage" method="post">
        <?= csrf_field() ?>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-1">Judul Hero</label>
            <input type="text" name="hero_title" value="<?= esc($page['hero_title']) ?>" class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-1">Deskripsi Hero</label>
            <textarea name="hero_description" rows="3" class="w-full border p-2 rounded"><?= esc($page['hero_description']) ?></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Header</button>
    </form>
</div>
<?= $this->endSection() ?>