<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 sticky top-6">
                <h3 class="text-lg font-bold mb-4">Tambah Program</h3>
                <form action="/admin/addProgram" method="post" enctype="multipart/form-data" class="space-y-4">
                    <?= csrf_field() ?>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Program</label>
                        <input type="text" name="title" class="w-full border p-2.5 rounded-lg" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Cover</label>
                        <input type="file" name="program_image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" rows="4" class="w-full border p-2.5 rounded-lg" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-semibold hover:bg-blue-700">Simpan</button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach($programs as $prog): ?>
            <div class="bg-white border border-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group">
                <div class="h-40 overflow-hidden bg-gray-100 relative">
                    <img src="<?= $prog['image_path'] ?>" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <a href="/admin/deleteProgram/<?= $prog['id'] ?>" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold">Hapus</a>
                    </div>
                </div>
                <div class="p-5">
                    <h4 class="font-bold text-lg mb-2 text-gray-800"><?= $prog['title'] ?></h4>
                    <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed"><?= $prog['description'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

<?= $this->endSection() ?>