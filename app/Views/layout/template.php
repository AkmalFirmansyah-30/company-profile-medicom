<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'UKM Medicom PNC') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen font-sans bg-gray-50">

    <!-- Header -->
    <?= $this->include('layout/header') ?>

    <!-- Konten utama -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <?= $this->include('layout/footer') ?>

</body>
</html>
