<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="mb-8 bg-blue-50 p-4 rounded-lg border border-blue-100 flex justify-between items-center">
        <div>
            <h4 class="font-bold text-blue-800">Status Galeri</h4>
            <p class="text-sm text-blue-600">Jumlah Foto: <strong><?= count($gallery) ?></strong> / 9 Maksimal</p>
        </div>
        <?php if (count($gallery) < 9): ?>
            <span class="bg-green-200 text-green-800 text-xs px-2 py-1 rounded-full font-bold">Bisa Tambah</span>
        <?php else: ?>
            <span class="bg-red-200 text-red-800 text-xs px-2 py-1 rounded-full font-bold">Penuh</span>
        <?php endif; ?>
    </div>

    <?php if (count($gallery) < 9): ?>
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-8">
        <form action="/admin/addGallery" method="post" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-4 items-end">
            <?= csrf_field() ?>
            <div class="flex-1 w-full">
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto</label>
                <input type="file" name="gallery_image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required/>
            </div>
            <div class="flex-1 w-full">
                <label class="block text-sm font-medium text-gray-700 mb-1">Caption (Opsional)</label>
                <input type="text" name="caption" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Kegiatan seru...">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 font-semibold">Upload</button>
        </form>
    </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

        <?php foreach($gallery as $item): ?>
        
        <form action="/admin/gallery/update" method="post" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm overflow-hidden border group hover:shadow-md transition">

            <?= csrf_field() ?>

            <input type="hidden" name="id" value="<?= $item['id'] ?>">

            <a href="<?= $item['image_path'] ?>" target="_blank" class="block h-48 w-full bg-gray-100 relative">
                <img src="<?= $item['image_path'] ?>" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition flex items-center justify-center">
                    <span class="text-white opacity-0 group-hover:opacity-100 transition font-bold">Lihat</span>
                </div>
            </a>

            <div class="p-4 space-y-3">
                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1">Ganti Caption</label>
                    <input type="text" name="caption" class="w-full border border-gray-300 rounded-lg p-2 text-sm" placeholder="Caption..." value="<?= esc($item['caption'] ?? '') ?>">
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gallery_image" class="block w-full text-xs text-slate-500 file:mr-3 file:py-1 file:px-3 file:rounded-full file:border-0 file:bg-gray-100 file:text-gray-600 hover:file:bg-gray-200"/>
                </div>

                <div class="flex justify-between items-center pt-2 border-t mt-3">
                    <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded-lg text-sm font-semibold hover:bg-green-700">Simpan</button>
                    <a href="/admin/deleteGallery/<?= $item['id'] ?>" class="text-red-600 hover:text-red-800 text-sm">Hapus</a>
                </div>
            </div>

        </form>
        <?php endforeach; ?>
    </div>

<?= $this->endSection() ?>