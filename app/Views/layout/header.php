<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'UKM Medicom PNC') ?></title>
    <link href="<?= base_url('output.css') ?>" rel="stylesheet">
</head>
<body class="bg-white text-gray-800">

<!-- Navbar -->
<nav class="flex justify-between items-center px-8 py-4 bg-white shadow fixed w-full top-0 z-50">
    <div class="flex items-center space-x-2">
        <img src="<?= base_url('logo.png') ?>" alt="Logo" class="w-8 h-8">
        <span class="font-semibold text-lg">Medicom</span>
    </div>
    <ul class="hidden md:flex space-x-8 font-medium">
        <li><a href="/" class="hover:text-blue-600">Beranda</a></li>
        <li><a href="#tentang" class="hover:text-blue-600">Tentang Kami</a></li>
        <li><a href="#profil" class="hover:text-blue-600">Profil</a></li>
        <li><a href="#laporan" class="hover:text-blue-600">Laporan Kinerja</a></li>
    </ul>
    <button class="bg-blue-600 text-white px-4 py-2 rounded-md">Gabung</button>
</nav>

<div class="pt-24"></div>
