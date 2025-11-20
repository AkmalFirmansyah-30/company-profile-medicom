<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold mb-6 text-gray-800">Kelola Struktur Pengurus</h1>

<div class="mb-6 bg-blue-50 p-4 rounded border border-blue-200">
    <p class="text-sm text-blue-800">
        💡 Divisi diambil dari menu <strong>Divisi</strong>. Silakan tambah/edit nama divisi di menu Divisi, lalu kembali ke sini untuk menambahkan anggotanya.
    </p>
</div>

<?php foreach($divisions as $div): ?>
<div class="bg-white p-6 rounded shadow mb-8 border-t-4 border-blue-600">
    <div class="flex justify-between items-center mb-4 border-b pb-2">
        <div class="flex items-center gap-2">
            <img src="<?= $div['image_path'] ?>" class="w-8 h-8 object-contain">
            <h2 class="text-xl font-bold text-gray-800"><?= $div['name'] ?></h2>
        </div>
    </div>

    <form action="/admin/addMember" method="post" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-3 mb-6 bg-gray-50 p-4 rounded">
        <?= csrf_field() ?>
        <input type="hidden" name="division_id" value="<?= $div['id'] ?>">
        
        <input type="text" name="name" placeholder="Nama Anggota" class="border p-2 rounded w-full md:w-1/4" required>
        <input type="text" name="position" placeholder="Jabatan (Ketua/Staff)" class="border p-2 rounded w-full md:w-1/4" required>
        <input type="file" name="member_image" class="border p-2 rounded w-full md:w-1/4" required>
        
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah</button>
    </form>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php 
        // Filter anggota hanya untuk divisi ini
        $divMembers = array_filter($members, function($m) use ($div) {
            return $m['division_id'] == $div['id'];
        });
        ?>

        <?php foreach($divMembers as $m): ?>
        <div class="bg-white border rounded p-3 text-center relative group">
            <img src="<?= $m['image_path'] ?>" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover border-2 border-blue-100">
            <h4 class="font-bold text-sm"><?= $m['name'] ?></h4>
            <p class="text-xs text-gray-500"><?= $m['position'] ?></p>
            
            <div class="absolute top-1 right-1 opacity-0 group-hover:opacity-100 transition">
                <a href="/admin/deleteMember/<?= $m['id'] ?>" onclick="return confirm('Hapus?')" class="text-red-600 font-bold text-xs">❌</a>
            </div>
        </div>
        <?php endforeach; ?>
        
        <?php if(empty($divMembers)): ?>
            <p class="text-sm text-gray-400 col-span-full italic">Belum ada anggota.</p>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; ?>

<?= $this->endSection() ?>