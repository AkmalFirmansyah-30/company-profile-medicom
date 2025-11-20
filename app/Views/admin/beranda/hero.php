<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Kelola Hero Image</h1>
    
    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-xl font-bold mb-4 border-b pb-2">Edit Hero Image</h2>
        <form action="/admin/updateHero" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $hero['id'] ?? '' ?>">
            <div class="mb-4">
                <p class="mb-2">Gambar Saat Ini:</p>
                <img src="<?= $hero['image_path'] ?? '' ?>" class="h-32 rounded bg-gray-200">
            </div>
            <input type="file" name="hero_image" class="mb-4 block w-full text-sm text-gray-500 ... "/>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Hero</button>
        </form>
    </div>
<?= $this->endSection() ?>