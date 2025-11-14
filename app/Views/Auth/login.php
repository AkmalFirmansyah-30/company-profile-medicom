<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center mb-6 text-blue-800">Login Admin</h2>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="/login/process" method="post">
            <?= csrf_field() ?>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" name="username" class="w-full border p-2 rounded focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded focus:outline-none focus:border-blue-500" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Masuk</button>
        </form>
        <a href="/" class="block text-center mt-4 text-sm text-gray-500 hover:text-blue-500">Kembali ke Website</a>
    </div>
</body>
</html>