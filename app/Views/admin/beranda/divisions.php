<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-8">
        <h3 class="text-lg font-bold mb-4">Tambah Divisi Baru</h3>
        <form action="/admin/addDivision" method="post" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?= csrf_field() ?>
            <input type="text" name="name" placeholder="Nama Divisi" class="border p-2.5 rounded-lg w-full" required>
            <select name="color" class="border p-2.5 rounded-lg w-full bg-white" required>
                <option value="white">⚪ Tema Putih (Teks Hitam)</option>
                <option value="blue">🔵 Tema Biru (Teks Putih)</option>
                <option value="red">🔴 Tema Merah (Teks Putih)</option>
            </select>
            <input type="text" name="description" placeholder="Deskripsi Singkat" class="border p-2.5 rounded-lg w-full md:col-span-2">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Icon Divisi</label>
                <input type="file" name="division_image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
            </div>
            <button type="submit" class="md:col-span-2 bg-blue-600 text-white py-2.5 rounded-lg hover:bg-blue-700 font-semibold">Tambah Divisi</button>
        </form>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php foreach($divisions as $div): ?>
            <div class="<?= $div['color_class'] ?> p-6 rounded-xl shadow-md relative group flex flex-col items-center justify-center text-center border border-gray-100 h-40">
                <img src="<?= $div['image_path'] ?>" class="w-12 h-12 mb-3 object-contain">
                <h4 class="font-bold text-lg leading-tight"><?= $div['name'] ?></h4>
                <a href="/admin/deleteDivision/<?= $div['id'] ?>" class="absolute top-2 right-2 bg-black/20 hover:bg-black/50 text-white rounded-full p-1 w-6 h-6 flex items-center justify-center text-xs transition opacity-0 group-hover:opacity-100">✕</a>
            </div>
        <?php endforeach; ?>
    </div>
<?= $this->endSection() ?>