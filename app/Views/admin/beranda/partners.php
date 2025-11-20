<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 sticky top-6">
                <h3 class="text-lg font-bold mb-4">Tambah Partner</h3>
                <form action="/admin/addPartner" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Partner</label>
                        <input type="text" name="name" class="w-full border-gray-300 border rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Google" required>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Logo Partner</label>
                        <input type="file" name="partner_image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required/>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-semibold hover:bg-blue-700">Tambah</button>
                </form>
            </div>
        </div>
        <div class="lg:col-span-2">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold mb-4">Daftar Partner</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <?php foreach($partners as $p): ?>
                        <div class="border rounded-lg p-4 relative group hover:shadow-md transition bg-white flex items-center justify-center h-32">
                            <img src="<?= $p['image_path'] ?>" class="max-h-20 max-w-full object-contain">
                            <a href="/admin/deletePartner/<?= $p['id'] ?>" class="absolute top-2 right-2 bg-red-100 text-red-600 p-1.5 rounded-full hover:bg-red-600 hover:text-white transition opacity-0 group-hover:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            </a>
                            <div class="absolute bottom-2 left-0 right-0 text-center text-xs text-gray-500 font-medium opacity-0 group-hover:opacity-100 transition"><?= $p['name'] ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>