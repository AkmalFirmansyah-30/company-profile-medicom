<!DOCTYPE html>
<html lang="id">
<head>
    <title>Admin Dashboard - Medicom</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-blue-800">Dashboard Admin Medicom</h1>
        <div class="flex items-center gap-4">
            <span class="text-gray-600">Halo, <?= session()->get('username') ?></span>
            <a href="/logout" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm font-semibold">
                Logout
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('msg')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- EDIT HERO IMAGE -->
    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-xl font-bold mb-4 border-b pb-2">Edit Hero Image</h2>
        <form action="/admin/updateHero" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $hero['id'] ?? '' ?>">
            <div class="mb-4">
                <p class="mb-2">Gambar Saat Ini:</p>
                <img src="<?= $hero['image_path'] ?? '' ?>" class="h-32 rounded bg-gray-200">
            </div>
            <input type="file" name="hero_image" class="mb-4 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Hero</button>
        </form>
    </div>

    <!-- MODIFIKASI PRESTASI -->
    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-xl font-bold mb-4 border-b pb-2">Tambah Prestasi</h2>
        <form action="/admin/addAchievement" method="post" enctype="multipart/form-data" class="grid grid-cols-2 gap-4">
            <input type="text" name="name" placeholder="Nama Lomba" class="border p-2 rounded" required>
            <input type="number" name="year" placeholder="Tahun (misal: 2024)" class="border p-2 rounded" required>
            <input type="text" name="level" placeholder="Tingkat (Nasional/Provinsi)" class="border p-2 rounded" required>
            <input type="file" name="image" class="border p-2 rounded" required>
            <button type="submit" class="col-span-2 bg-green-600 text-white px-4 py-2 rounded">Tambah Prestasi</button>
        </form>

        <div class="mt-6">
            <table class="w-full text-left border-collapse">
                <thead><tr class="bg-gray-100"><th>Tahun</th><th>Nama</th><th>Aksi</th></tr></thead>
                <tbody>
                    <?php foreach($achievements as $item): ?>
                    <tr class="border-b">
                        <td class="p-2"><?= $item['year'] ?></td>
                        <td class="p-2"><?= $item['name'] ?></td>
                        <td class="p-2">
                            <a href="/admin/deleteAchievement/<?= $item['id'] ?>" class="text-red-600 text-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- KELOLA GALERI KEGIATAN -->
    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-xl font-bold mb-4 border-b pb-2">Kelola Galeri Kegiatan</h2>

        <h3 class="text-lg font-semibold mb-3">Tambah Gambar Galeri (Maksimal 9)</h3>
        <?php if (count($gallery) < 9): ?>
            <form action="/admin/addGallery" method="post" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-4 mb-6 items-start">
                <?= csrf_field() ?>
                <div class="w-full md:w-1/2">
                    <input type="file" name="gallery_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-2 <?= (session('validation') && session('validation')->hasError('gallery_image')) ? 'border-red-500' : '' ?>" required/>
                    <?php if (session('validation') && session('validation')->hasError('gallery_image')) : ?>
                        <p class="text-red-500 text-xs mt-1"><?= session('validation')->getError('gallery_image') ?></p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="md:self-start bg-blue-600 text-white px-4 py-2 rounded">Tambah Galeri</button>
            </form>
        <?php else: ?>
            <p class="text-red-500 text-sm mb-6">Anda telah mencapai batas maksimal 9 gambar galeri.</p>
        <?php endif; ?>

        <h3 class="text-lg font-semibold mb-3">Daftar Gambar Galeri (Total: <?= count($gallery) ?>)</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php foreach($gallery as $item): ?>
                <div class="bg-gray-100 rounded-lg p-2 relative group">
                    <img src="<?= $item['image_path'] ?>" alt="<?= $item['caption'] ?? 'Galeri' ?>" class="w-full h-32 object-cover rounded-md mb-2">
                    <p class="text-xs text-gray-700 truncate"><?= $item['caption'] ?? 'Tidak ada caption' ?></p>
                    <div class="absolute top-2 right-2 flex space-x-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <a href="/admin/deleteGallery/<?= $item['id'] ?>" class="bg-red-500 text-white p-1 rounded-full text-xs" title="Hapus" onclick="return confirm('Yakin ingin menghapus gambar ini dari galeri?');">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- KELOLA DIVISI -->
    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-xl font-bold mb-4 border-b pb-2">Kelola Divisi</h2>
                
        <form action="/admin/addDivision" method="post" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <?= csrf_field() ?>
                
            <input type="text" name="name" placeholder="Nama Divisi" class="border p-2 rounded" required>
                
            <select name="color" class="border p-2 rounded" required>
                <option value="white">Warna Putih (Text Hitam)</option>
                <option value="blue">Warna Biru (Text Putih)</option>
                <option value="red">Warna Merah (Text Putih)</option>
            </select>
                
            <input type="file" name="division_image" class="border p-2 rounded" required>
                
            <input type="text" name="description" placeholder="Deskripsi Singkat (Opsional)" class="border p-2 rounded">
                
            <button type="submit" class="md:col-span-2 bg-blue-600 text-white px-4 py-2 rounded">Tambah Divisi</button>
        </form>
                
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach($divisions as $div): ?>
                <div class="<?= $div['color_class'] ?> p-4 rounded-lg shadow-md relative group h-32 flex flex-col items-center justify-center text-center">
                    <img src="<?= $div['image_path'] ?>" class="w-10 h-10 mb-2 object-contain">
                    <h4 class="font-bold text-sm"><?= $div['name'] ?></h4>
                    
                    <div class="absolute top-1 right-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="/admin/deleteDivision/<?= $div['id'] ?>" class="bg-black text-white rounded-full p-1 text-xs">X</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- KELOLA PROGRAM KERJA -->
    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-xl font-bold mb-4 border-b pb-2">Kelola Program Kerja</h2>

        <form action="/admin/addProgram" method="post" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <?= csrf_field() ?>
            
            <div class="col-span-2 md:col-span-1">
                <input type="text" name="title" placeholder="Nama Program Kerja" class="w-full border p-2 rounded <?= (session('validation') && session('validation')->hasError('title')) ? 'border-red-500' : '' ?>" value="<?= old('title') ?>" required>
                <?php if (session('validation') && session('validation')->hasError('title')) : ?>
                    <p class="text-red-500 text-xs mt-1"><?= session('validation')->getError('title') ?></p>
                <?php endif; ?>
            </div>

            <div class="col-span-2 md:col-span-1">
                <input type="file" name="program_image" class="w-full border p-2 rounded <?= (session('validation') && session('validation')->hasError('program_image')) ? 'border-red-500' : '' ?>" required>
                <?php if (session('validation') && session('validation')->hasError('program_image')) : ?>
                    <p class="text-red-500 text-xs mt-1"><?= session('validation')->getError('program_image') ?></p>
                <?php endif; ?>
            </div>

            <div class="col-span-2">
                <textarea name="description" rows="3" placeholder="Deskripsi singkat program kerja..." class="w-full border p-2 rounded <?= (session('validation') && session('validation')->hasError('description')) ? 'border-red-500' : '' ?>" required><?= old('description') ?></textarea>
                <?php if (session('validation') && session('validation')->hasError('description')) : ?>
                    <p class="text-red-500 text-xs mt-1"><?= session('validation')->getError('description') ?></p>
                <?php endif; ?>
            </div>

            <button type="submit" class="md:col-span-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Tambah Program</button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($programs as $prog): ?>
            <div class="border rounded-lg overflow-hidden shadow hover:shadow-md transition bg-gray-50">
                <div class="h-40 overflow-hidden bg-gray-200 relative group">
                    <img src="<?= $prog['image_path'] ?>" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="/admin/deleteProgram/<?= $prog['id'] ?>" class="bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</a>
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-lg mb-1 text-gray-800"><?= $prog['title'] ?></h4>
                    <p class="text-sm text-gray-600 line-clamp-3"><?= $prog['description'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    </body>
</html>