<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-8">
        <h3 class="text-lg font-bold mb-4">Tambah Data Prestasi</h3>
        <form action="/admin/addAchievement" method="post" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lomba</label>
                    <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2.5" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                        <input type="number" name="year" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="2024" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tingkat</label>
                        <input type="text" name="level" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Nasional" required>
                    </div>
                </div>
            </div>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto Dokumentasi</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 bg-gray-50 text-center">
                        <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required/>
                    </div>
                </div>
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 rounded-lg transition mt-2">Simpan Prestasi</button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="p-4">Foto</th>
                        <th class="p-4">Tahun</th>
                        <th class="p-4">Nama Lomba</th>
                        <th class="p-4">Tingkat</th>
                        <th class="p-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach($achievements as $item): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4">
                            <img src="<?= $item['image_path'] ?>" class="h-12 w-12 object-cover rounded-lg border">
                        </td>
                        <td class="p-4 font-medium text-gray-900"><?= $item['year'] ?></td>
                        <td class="p-4 text-gray-700"><?= $item['name'] ?></td>
                        <td class="p-4 text-gray-500 text-sm"><?= $item['level'] ?></td>
                        <td class="p-4 text-right">
                            <a href="/admin/deleteAchievement/<?= $item['id'] ?>" class="text-red-600 hover:text-red-900 text-sm font-medium">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>