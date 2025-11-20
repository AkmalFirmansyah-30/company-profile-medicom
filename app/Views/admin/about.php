<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Halaman About</h1>

<div class="bg-white p-6 rounded shadow mb-8">
    <h2 class="text-lg font-bold mb-4 border-b pb-2">Konten Utama</h2>
    <form action="/admin/updateAbout" method="post">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-bold mb-1">Judul Hero</label>
                <input type="text" name="hero_title" value="<?= esc($page['hero_title']) ?>" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block text-sm font-bold mb-1">Deskripsi Hero</label>
                <input type="text" name="hero_description" value="<?= esc($page['hero_description']) ?>" class="w-full border p-2 rounded">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold mb-1">Judul Section Info</label>
            <input type="text" name="main_title" value="<?= esc($page['main_title']) ?>" class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-1">Isi Konten (Apa itu Medicom?)</label>
            <textarea name="main_content" rows="5" class="w-full border p-2 rounded"><?= esc($page['main_content']) ?></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-1">Link Video (Embed URL)</label>
            <input type="text" name="video_url" value="<?= esc($page['video_url']) ?>" class="w-full border p-2 rounded placeholder-gray-400" placeholder="https://www.youtube.com/embed/...">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
</div>

<div class="bg-white p-6 rounded shadow">
    <h2 class="text-lg font-bold mb-4 border-b pb-2">Kelola Tujuan Medicom</h2>
    
    <form action="/admin/addObjective" method="post" class="flex gap-2 mb-6">
        <?= csrf_field() ?>
        <input type="text" name="content" placeholder="Tulis tujuan baru..." class="flex-1 border p-2 rounded" required>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Tambah</button>
    </form>

    <ul class="space-y-2">
        <?php foreach($objectives as $obj): ?>
        <li class="flex justify-between items-center bg-gray-50 p-3 rounded border">
            <span><?= esc($obj['content']) ?></span>
            <a href="/admin/deleteObjective/<?= $obj['id'] ?>" class="text-red-600 text-sm font-bold" onclick="return confirm('Hapus?')">Hapus</a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?= $this->endSection() ?>