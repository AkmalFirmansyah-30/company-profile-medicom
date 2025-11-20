-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2025 at 01:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_achievements`
--

CREATE TABLE `cms_achievements` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_achievements`
--

INSERT INTO `cms_achievements` (`id`, `name`, `year`, `level`, `image_path`) VALUES
(2, 'Juara 2 Lomba UI/UX Kategori Mahasiswa', '2024', 'Nasional', 'https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),
(3, 'Juara 3 Lomba Jaringan Komputer se-Jateng', '2024', 'Provinsi', 'https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),
(4, 'Finalis Lomba Competitive Programming', '2024', 'Nasional', 'https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),
(5, 'Juara Harapan 1 Lomba Fotografi', '2023', 'Kabupaten', 'https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),
(6, 'Juara 1 Lomba Video Pendek', '2023', 'Nasional', 'https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),
(7, 'Peserta Terbaik Pelatihan Desain Grafis', '2023', 'Internal', 'https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),
(8, 'Juara 2 Lomba Esai Ilmiah', '2022', 'Provinsi', 'https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),
(9, 'Finalis Lomba Poster Digital', '2022', 'Nasional', 'https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),
(10, 'Gemastik', '2024', 'Nasional', '/src/img/prestasi/default_hero.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cms_divisions`
--

CREATE TABLE `cms_divisions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `color_class` varchar(50) DEFAULT 'bg-white text-gray-800'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_divisions`
--

INSERT INTO `cms_divisions` (`id`, `name`, `description`, `image_path`, `color_class`) VALUES
(1, 'Pemrograman', 'Fokus pada Web & Mobile App', 'https://placehold.co/100x100/transparent/white?text=DEV', 'bg-blue-500 text-white'),
(2, 'Desain Grafis', 'Ilustrasi dan Branding', 'https://placehold.co/100x100/transparent/black?text=DSGN', 'bg-white text-gray-800'),
(3, 'Jaringan', 'Network Engineering & IoT', 'https://placehold.co/100x100/transparent/white?text=NET', 'bg-red-500 text-white'),
(4, 'Sinematografi', 'Produksi Video & Film', 'https://placehold.co/100x100/transparent/black?text=CINE', 'bg-white text-gray-800'),
(5, 'Fotografi', 'Teknik Fotografi Digital', 'https://placehold.co/100x100/transparent/white?text=FOTO', 'bg-blue-500 text-white'),
(6, 'Jurnalistik', 'Penulisan Berita & Artikel', 'https://placehold.co/100x100/transparent/white?text=NEWS', 'bg-red-500 text-white');

-- --------------------------------------------------------

--
-- Table structure for table `cms_gallery`
--

CREATE TABLE `cms_gallery` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_gallery`
--

INSERT INTO `cms_gallery` (`id`, `image_path`) VALUES
(1, 'https://placehold.co/600x400/E0E0E0/909090?text=Galeri+1'),
(2, 'https://placehold.co/300x200/E0E0E0/909090?text=Galeri+2'),
(3, 'https://placehold.co/300x200/E0E0E0/909090?text=Galeri+3'),
(4, 'https://placehold.co/300x200/E0E0E0/909090?text=Galeri+4'),
(5, 'https://placehold.co/300x200/E0E0E0/909090?text=Galeri+5'),
(7, 'https://placehold.co/300x200/E0E0E0/909090?text=Galeri+7'),
(8, 'https://placehold.co/300x200/E0E0E0/909090?text=Galeri+8'),
(9, '/src/img/galeri/default_hero.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cms_hero`
--

CREATE TABLE `cms_hero` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_hero`
--

INSERT INTO `cms_hero` (`id`, `image_path`, `updated_at`) VALUES
(1, '/src/img/184fa501-1abd-4e85-8cb4-048e9cb68550.jpg', '2025-11-13 07:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `cms_partners`
--

CREATE TABLE `cms_partners` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_partners`
--

INSERT INTO `cms_partners` (`id`, `name`, `image_path`) VALUES
(1, 'Google', 'google.png'),
(2, 'Medicom', '/src/img/partners/Group_280.png'),
(3, 'RRQ', '/src/img/partners/download (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cms_programs`
--

CREATE TABLE `cms_programs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$aHaptyDz7EZHz88aBabKd.hmaATtDuDpUdAXysYIQq0/3688ZEY5e', '2025-11-13 03:58:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_achievements`
--
ALTER TABLE `cms_achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_divisions`
--
ALTER TABLE `cms_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_gallery`
--
ALTER TABLE `cms_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_hero`
--
ALTER TABLE `cms_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_partners`
--
ALTER TABLE `cms_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_programs`
--
ALTER TABLE `cms_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_achievements`
--
ALTER TABLE `cms_achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cms_divisions`
--
ALTER TABLE `cms_divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cms_gallery`
--
ALTER TABLE `cms_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cms_hero`
--
ALTER TABLE `cms_hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_partners`
--
ALTER TABLE `cms_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_programs`
--
ALTER TABLE `cms_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
