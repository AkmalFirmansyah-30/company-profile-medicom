-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2025 at 06:40 PM
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
-- Database: `balai_pengobatan`
--
CREATE DATABASE IF NOT EXISTS `balai_pengobatan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `balai_pengobatan`;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(7) NOT NULL,
  `nama_dokter` varchar(25) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `kota` varchar(45) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `alamat`, `kota`, `no_telp`) VALUES
('D.0201', 'Andesita Prihantara', 'JL. Kenari No.05', 'Cilacap', '555444'),
('D.0202', 'Nur Wahyu R', 'JL. Katamso No.10', 'Purwokerto', '673215'),
('D.0203', 'Cahya Vikasari', 'JL. S.Parman No.71', 'Cilacap', '668901'),
('D.0204', 'Antonius Agung H', 'JL. Rinjani No.07', 'Cilacap', '777777'),
('D.0205', 'Riyadi Purwanto', 'JL. Duku No.06', 'Brebes', '736452'),
('D.0206', 'Isa Bahroni', 'JL. Sengon No.15', 'Tegal', '563729'),
('D.0207', 'Wiyono', 'JL. Nakula No.10', 'Cilacap', '652738');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(5) NOT NULL,
  `nama_obat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`) VALUES
('O.31', 'Panadol'),
('O.32', 'Konimex'),
('O.33', 'Dulcolax'),
('O.34', 'Antangin'),
('O.35', 'Promag'),
('O.36', 'OBH');

-- --------------------------------------------------------

--
-- Table structure for table `obat_milik_pasien`
--

CREATE TABLE `obat_milik_pasien` (
  `id_obat` varchar(5) NOT NULL,
  `id_periksa` varchar(5) NOT NULL,
  `tgl_pengambilan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat_milik_pasien`
--

INSERT INTO `obat_milik_pasien` (`id_obat`, `id_periksa`, `tgl_pengambilan`) VALUES
('O.32', 'C.51', '2015-01-30'),
('O.34', 'C.52', '2015-01-30'),
('O.31', 'C.53', '2015-01-30'),
('O.31', 'C.54', '2015-01-30'),
('O.35', 'C.56', '2015-02-03'),
('O.34', 'C.57', '2015-02-04'),
('O.34', 'C.58', '2015-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(7) NOT NULL,
  `nama_pasien` varchar(25) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat`, `kota`, `telp`) VALUES
('P.0101', 'Ipo Novianto', 'JL. Ketapang no.15', 'Cilacap', '765878'),
('P.0102', 'Iith Yuniarti', 'JL. Brantas No.20', 'Cilacap', '657456'),
('P.0103', 'Jody Almayda', 'JL. Flores No.10', 'Purwokerto', '565890'),
('P.0104', 'Willy Riezkiadi', 'JL. Mawar No.45', 'Purwokerto', ''),
('P.0105', 'Andri Setiawan', 'JL. Mangga No.15', 'Purbalingga', '4746494'),
('P.0106', 'Ikhwatun', 'JL. Veteran No.35', 'Purbalingga', ''),
('P.0107', 'Agus Stiyo', 'JL. Katamso No.45', 'Semarang', '647546'),
('P.0108', 'Miftakhul Jannah', 'JL. Dr. Sutomo No.4', 'Surakarta', '547532');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` varchar(5) NOT NULL,
  `id_pasien` varchar(7) NOT NULL,
  `id_dokter` varchar(7) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `diagnosa_awal` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `id_pasien`, `id_dokter`, `tgl_periksa`, `keluhan`, `diagnosa_awal`) VALUES
('C.51', 'P.0101', 'D.0204', '2015-01-30', 'Batuk', 'Flu'),
('C.52', 'P.0104', 'D.0201', '2015-01-30', 'Pilek', 'Flu'),
('C.53', 'P.0102', 'D.0204', '2015-01-30', 'Sakit Kepala', 'Flu'),
('C.54', 'P.0105', 'D.0206', '2015-01-28', 'Tenggorokan Sakit', 'Radang Tenggorokan'),
('C.56', 'P.0108', 'D.0206', '2015-02-03', 'Sakit Perut', 'Asam lambung meningkat'),
('C.57', 'P.0101', 'D.0204', '2015-02-04', 'Batuk', 'Flu'),
('C.58', 'P.0104', 'D.0204', '2015-02-05', 'Pilek', 'Flu');

-- --------------------------------------------------------

--
-- Table structure for table `periksa_copy`
--

CREATE TABLE `periksa_copy` (
  `id_periksa` varchar(5) NOT NULL,
  `id_pasien` varchar(7) NOT NULL,
  `id_dokter` varchar(7) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `diagnosa_awal` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa_copy`
--

INSERT INTO `periksa_copy` (`id_periksa`, `id_pasien`, `id_dokter`, `tgl_periksa`, `keluhan`, `diagnosa_awal`) VALUES
('C.51', 'P.0101', 'D.0204', '2015-01-30', 'Batuk', 'Influenza'),
('C.52', 'P.0104', 'D.0201', '2015-01-30', 'Pilek', 'Influenza'),
('C.53', 'P.0102', 'D.0204', '2015-01-30', 'Sakit Kepala', 'Influenza'),
('C.54', 'P.0105', 'D.0204', '2015-01-30', 'Kepala Pusing', 'Influenza'),
('C.57', 'P.0101', 'D.0204', '2015-02-04', 'Batuk', 'Influenza'),
('C.58', 'P.0104', 'D.0204', '2015-02-05', 'Pilek', 'Influenza');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `obat_milik_pasien`
--
ALTER TABLE `obat_milik_pasien`
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_periksa` (`id_periksa`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id_periksa`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat_milik_pasien`
--
ALTER TABLE `obat_milik_pasien`
  ADD CONSTRAINT `obat_milik_pasien_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obat_milik_pasien_ibfk_2` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id_periksa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `koperasi`
--
CREATE DATABASE IF NOT EXISTS `koperasi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `koperasi`;

-- --------------------------------------------------------

--
-- Table structure for table `simpan_pinjam`
--

CREATE TABLE `simpan_pinjam` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` varchar(12) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `simpan_pinjam`
--

INSERT INTO `simpan_pinjam` (`username`, `nama`, `nik`, `no_hp`) VALUES
('member01', 'Vnia', '234215213', '12445125'),
('tes_php_murni_1759297806', 'Pengguna Tes PHP Murni', '123456789012', '080000000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `simpan_pinjam`
--
ALTER TABLE `simpan_pinjam`
  ADD PRIMARY KEY (`username`);
--
-- Database: `kuliah`
--
CREATE DATABASE IF NOT EXISTS `kuliah` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kuliah`;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `ID_DOSEN` char(5) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(255) DEFAULT NULL,
  `JABATAN` varchar(50) DEFAULT NULL,
  `NOTELP` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`ID_DOSEN`, `NAMA`, `ALAMAT`, `JABATAN`, `NOTELP`) VALUES
('12341', 'NUR WAHYU RAHADI.,M.Eng.', 'JL.ELANG NO.11', 'ASS AHLI', '08123456789'),
('12342', 'ANTONIUS AGUNG H.,M.Eng.', 'JL.KENDENG NO.12', 'ASS AHLI', '08123456788'),
('12343', 'ANDESITA PRIHANTARA.,M.Eng.', 'JL PERKUTUT NO.23', 'LEKTOR', '08123456787'),
('12344', 'DWI NOVIA PRASETYANTI.,M.Cs.', 'JL. RINJANI NO.13', 'ASS AHLI', '08123456786'),
('12345', 'CAHYA VIKASARI.,M.Eng.', 'JL. MANGGA NO/10', 'ASS AHLI', '08123456785');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` char(10) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(255) DEFAULT NULL,
  `IPK` float(10,2) DEFAULT NULL,
  `ID_DOSEN` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `NAMA`, `ALAMAT`, `IPK`, `ID_DOSEN`) VALUES
('123070201', 'LALU HERMAN', 'JL MAWAR NO 11', 3.01, '12345'),
('123070202', 'KURNIAWAN', 'JL AFFANDI NO 12', 2.75, '12344'),
('123070203', 'INDRA KUSUMA', 'JL DEMANGAN NO 4', 2.83, '12345'),
('123070204', 'KARMAN MAULANA', 'JL BABARSARI NO 23', 2.91, '12343'),
('123070205', 'RIZAD RAHMAN', 'JL KAPAS NO 8', 2.50, '12344'),
('123070206', 'WAWAN ADI PUTRA', 'JL KLEDOKAN NO 2', 3.21, '12341'),
('123070207', 'M TAUFIK HIDAYAT', 'JL TAMBAKBAYAN NO 3', 3.11, '12341'),
('123070208', 'FITRIADI BUDIMAN', 'JL MERPATI NO 24', 3.41, '12344'),
('123070209', 'IDA KUSUMAWATI', 'JL BANTUL NO 15', 3.32, '12343'),
('123070210', 'HIDAYAT NUGRAHA', 'JL PASIFIK NO 6', 2.85, '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`ID_DOSEN`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `ID_DOSEN` (`ID_DOSEN`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`ID_DOSEN`) REFERENCES `dosen` (`ID_DOSEN`);
--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`title`, `author`, `publisher`) VALUES
('Si Gayung Informatika', 'Ilham Budi Trisetyo', 'MyBudi Ltd');
--
-- Database: `medic`
--
CREATE DATABASE IF NOT EXISTS `medic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `medic`;

-- --------------------------------------------------------

--
-- Table structure for table `galery_kegiatan`
--

CREATE TABLE `galery_kegiatan` (
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `name` varchar(100) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `img` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_profile`
--

CREATE TABLE `video_profile` (
  `url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Database: `medicom`
--
CREATE DATABASE IF NOT EXISTS `medicom` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `medicom`;

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
(11, 'BPH', 'KEGIATAN SEHARI HARI', '/src/img/divisi/bagasbagas.png', 'bg-blue-500 text-white');

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
(7, 'https://placehold.co/300x200/E0E0E0/909090?text=Galeri+7'),
(9, '/src/img/galeri/default_hero.jpg'),
(10, '/src/img/galeri/bagasbagas.png');

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
(1, '/src/img/bagasbagas.png', '2025-11-14 21:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `cms_members`
--

CREATE TABLE `cms_members` (
  `id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_members`
--

INSERT INTO `cms_members` (`id`, `division_id`, `name`, `position`, `image_path`) VALUES
(5, 11, 'Ilham', 'Sekretaris', '/src/img/pengurus/bagasbagas.png'),
(6, 11, 'Bagas', 'Ketua', '/src/img/pengurus/bagasbagas.png');

-- --------------------------------------------------------

--
-- Table structure for table `cms_objectives`
--

CREATE TABLE `cms_objectives` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_objectives`
--

INSERT INTO `cms_objectives` (`id`, `content`) VALUES
(1, 'Menjadi wadah kreativitas mahasiswa.'),
(2, 'Mengembangkan skill multimedia.');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `page_slug` varchar(50) NOT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_description` text DEFAULT NULL,
  `main_title` varchar(255) DEFAULT NULL,
  `main_content` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`page_slug`, `hero_title`, `hero_description`, `main_title`, `main_content`, `video_url`) VALUES
('about', 'Tentang Kami', 'Deskripsi singkat tentang kami.', 'Apa itu Medicom?', 'Medicom adalah...', 'https://www.youtube.com/embed/video_id'),
('prestasi', 'Prestasi Kami', 'Daftar pencapaian membanggakan kami.', NULL, NULL, NULL);

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
(3, 'RRQ', '/src/img/partners/download (2).jpg'),
(4, 'Bagas', '/src/img/partners/bagasbagas.png');

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

--
-- Dumping data for table `cms_programs`
--

INSERT INTO `cms_programs` (`id`, `title`, `description`, `image_path`) VALUES
(4, 'Bagas', 'test', '/src/img/programs/bagasbagas.png');

-- --------------------------------------------------------

--
-- Table structure for table `cms_reports`
--

CREATE TABLE `cms_reports` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `url` varchar(255) DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_reports`
--

INSERT INTO `cms_reports` (`id`, `year`, `month`, `url`) VALUES
(1, 2024, 1, 'https://google.com'),
(2, 2025, 1, 'https://v3.tailwindcss.com/docs/text-color');

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
-- Indexes for table `cms_members`
--
ALTER TABLE `cms_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `cms_objectives`
--
ALTER TABLE `cms_objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`page_slug`);

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
-- Indexes for table `cms_reports`
--
ALTER TABLE `cms_reports`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cms_divisions`
--
ALTER TABLE `cms_divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cms_gallery`
--
ALTER TABLE `cms_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cms_hero`
--
ALTER TABLE `cms_hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_members`
--
ALTER TABLE `cms_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cms_objectives`
--
ALTER TABLE `cms_objectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_partners`
--
ALTER TABLE `cms_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_programs`
--
ALTER TABLE `cms_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_reports`
--
ALTER TABLE `cms_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cms_members`
--
ALTER TABLE `cms_members`
  ADD CONSTRAINT `cms_members_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `cms_divisions` (`id`) ON DELETE CASCADE;
--
-- Database: `modul3`
--
CREATE DATABASE IF NOT EXISTS `modul3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `modul3`;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `plate` varchar(10) DEFAULT NULL,
  `brand` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `plate`, `brand`) VALUES
(1, 'AA-3372-FD', 'Toyota'),
(2, 'AA-3373-FD', 'Suzuki');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `salary` float(8,2) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `description` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `start_date`, `end_date`, `salary`, `city`, `description`) VALUES
(1, 'alison', 'martin', '1996-07-25', '2006-07-25', 1235.56, 'toronto', 'programmer'),
(2, 'alison', 'mathews', '1976-03-21', '1986-02-21', 6662.78, 'vancouver', 'tester'),
(3, 'james', 'smith', '1978-12-12', '1990-03-15', 6545.78, 'vancouver', 'tester'),
(4, 'celia', 'rice', '1982-10-24', '1999-04-21', 2345.78, 'vancouver', 'manager\r\n'),
(9, 'James', 'Bond', '1982-04-21', '2002-09-23', 1235.56, 'London', 'Spy'),
(10, 'Hercules', 'Poirot', '1973-05-23', '2020-08-09', 4322.98, 'Brussels', 'Detective'),
(11, 'Lincoln', 'Rhyme', '1999-05-25', '2011-07-13', 3213.98, 'New York', 'Forensics'),
(12, 'Sherlock', 'Holmes', '1923-08-12', '1945-07-21', 4124.21, 'London', 'Detective');

-- --------------------------------------------------------

--
-- Table structure for table `employee2`
--

CREATE TABLE `employee2` (
  `id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee2`
--

INSERT INTO `employee2` (`id`, `name`, `city`) VALUES
(1, 'alison martin', 'toronto'),
(2, 'alison mathews', 'Ottawa'),
(3, 'james smith', 'Ottawa'),
(4, 'celia rice', 'Ottawa'),
(9, 'James Bond', 'London'),
(10, 'Hercules Poirot', 'Brussels'),
(12, 'sHERLOCK hOLMES', 'Manchester');

-- --------------------------------------------------------

--
-- Table structure for table `employee_copy`
--

CREATE TABLE `employee_copy` (
  `id` int(11) NOT NULL DEFAULT 0,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `salary` float(8,2) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `description` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_copy`
--

INSERT INTO `employee_copy` (`id`, `first_name`, `last_name`, `start_date`, `end_date`, `salary`, `city`, `description`) VALUES
(2, 'alison', 'mathews', '1976-03-21', '1986-02-21', 6661.78, 'vancouver', 'tester'),
(3, 'james', 'smith', '1978-12-12', '1990-03-15', 6544.78, 'vancouver', 'tester'),
(4, 'celia', 'rice', '1982-10-24', '1999-04-21', 2344.78, 'vancouver', 'manager\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `jurusan`, `angkatan`, `kelas`) VALUES
('15.03.01.008', 'Citra Kusuma', 'TM', 2015, '3B\r'),
('15.03.02.077', 'Nur Cahyo', 'TI', 2015, '3A\r'),
('15.03.03.056', 'Aris Firman', 'TE', 2015, '3C\r'),
('16.03.01.015', 'Andi Setiyawan', 'TM', 2016, '2A\r'),
('16.03.02.027', 'Novi Indri', 'TI', 2016, '2C\r'),
('16.03.03.033', 'Joko Pramono', 'TE', 2016, '2B\r'),
('17.03.01.017', 'Bimo Haris', 'TM', 2017, '1A\r'),
('17.03.02.034', 'Ananda Kurniawan', 'TI', 2017, '1B\r'),
('17.03.03.045', 'Nur Fitria', 'TE', 2017, '1C');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_copy`
--

CREATE TABLE `mahasiswa_copy` (
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa_copy`
--

INSERT INTO `mahasiswa_copy` (`nim`, `nama_mahasiswa`, `jurusan`, `angkatan`, `kelas`) VALUES
('15.03.02.077', 'Nur Cahyo', 'TI', 2015, '3A\r'),
('16.03.02.027', 'Novi Indri', 'TI', 2016, '2C\r');

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

CREATE TABLE `table2` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table3`
--

CREATE TABLE `table3` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table4`
--

CREATE TABLE `table4` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `salary` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plate` (`plate`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee2`
--
ALTER TABLE `employee2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table2`
--
ALTER TABLE `table2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table3`
--
ALTER TABLE `table3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table4`
--
ALTER TABLE `table4`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee2`
--
ALTER TABLE `employee2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table2`
--
ALTER TABLE `table2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table3`
--
ALTER TABLE `table3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table4`
--
ALTER TABLE `table4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `modul4`
--
CREATE DATABASE IF NOT EXISTS `modul4` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `modul4`;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(15) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penerbit`, `tahun`) VALUES
('15002', 'Senangnya Bermain Java', 'Mark', '2015'),
('21001', 'Kitab MikroTik', 'Pujojo', '2021'),
('23001', 'Teknik Mantap', 'Airlangga', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `kembali`
--

CREATE TABLE `kembali` (
  `id_pinjam` varchar(15) NOT NULL,
  `NIM` varchar(15) DEFAULT NULL,
  `id_buku` varchar(15) NOT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kembali`
--

INSERT INTO `kembali` (`id_pinjam`, `NIM`, `id_buku`, `tgl_kembali`) VALUES
('2404230001', '250202010', '15002', '2025-04-24'),
('2404230002', '240302017', '23001', '2025-04-25'),
('2404230003', '250302011', '21001', '2025-04-24'),
('2408140001', '240302017', '15002', '2025-08-15'),
('2408140002', '250302011', '23001', '2025-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `no_telp`) VALUES
('240302017', 'Ilham Budi Trisetyo', 'Kebumen', '859141470636'),
('250202010', 'Setiawan Jokowi', 'Surakarta', '85927932671'),
('250302011', 'Budi Susanto', 'Tegal', '85987312673');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `modelid` smallint(6) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` smallint(6) NOT NULL,
  `modelid` smallint(6) NOT NULL,
  `description` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` varchar(15) NOT NULL,
  `NIM` varchar(15) DEFAULT NULL,
  `id_buku` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `NIM`, `id_buku`) VALUES
('2404230001', '250202010', '15002'),
('2409150001', '240302017', '23001'),
('2495110001', '250302011', '21001');

-- --------------------------------------------------------

--
-- Table structure for table `table10`
--

CREATE TABLE `table10` (
  `id` int(11) NOT NULL,
  `last_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table10`
--

INSERT INTO `table10` (`id`, `last_name`) VALUES
(1, 'Ilham'),
(2, 'Budi'),
(3, 'Trisetyo');

-- --------------------------------------------------------

--
-- Table structure for table `table10_copy`
--

CREATE TABLE `table10_copy` (
  `id` int(11) NOT NULL,
  `last_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`modelid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modelid` (`modelid`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `table10`
--
ALTER TABLE `table10`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `modelid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`modelid`) REFERENCES `models` (`modelid`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `modul5`
--
CREATE DATABASE IF NOT EXISTS `modul5` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `modul5`;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(9) NOT NULL,
  `nama_pasien` varchar(25) NOT NULL,
  `jenis_kelamin` char(3) NOT NULL,
  `alamat_pasien` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `alamat_pasien`) VALUES
('P001', 'Ani', 'P', 'Jl. Kenanga 10'),
('P002', 'Budi', 'L', 'Jl. Anggrek 12');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` varchar(7) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `id_pasien` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `tgl_periksa`, `id_pasien`) VALUES
('PR001', '2025-09-01', 'P001'),
('PR002', '2025-09-05', 'P002');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_medis`
--

CREATE TABLE `tenaga_medis` (
  `id_dokter` varchar(6) NOT NULL,
  `nama_dokter` varchar(25) NOT NULL,
  `almt_dokter` varchar(35) DEFAULT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenaga_medis`
--

INSERT INTO `tenaga_medis` (`id_dokter`, `nama_dokter`, `almt_dokter`, `no_telepon`) VALUES
('D001', 'Dr. Budi', 'Jl. Merdeka 1', '081111111'),
('D002', 'Dr. Sari', 'Jl. Melati 2', '082222222'),
('D003', 'Dr. Andi', 'Jl. Mawar 3', '083333333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id_periksa`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `tenaga_medis`
--
ALTER TABLE `tenaga_medis`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `modul7`
--
CREATE DATABASE IF NOT EXISTS `modul7` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `modul7`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_brg` int(3) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `exp` date DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `nama`, `exp`, `harga`, `stok`, `status`) VALUES
(001, 'Sabun Mandi Lifebuoy', '2025-12-31', 4500, 4, 'LIMIT'),
(002, 'Shampoo Sunsilk', '2026-05-10', 15000, 80, NULL),
(003, 'Minyak Goreng Bimoli 1L', '2025-09-15', 18000, 60, NULL),
(004, 'Gula Pasir 1kg', '2027-03-01', 14000, 100, NULL),
(005, 'Susu UHT Ultra Milk 250ml', '2025-11-20', 6500, 200, NULL),
(006, 'Kopi Kapal Api 65gr', '2026-01-05', 3000, 150, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brg` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `pethouse`
--
CREATE DATABASE IF NOT EXISTS `pethouse` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pethouse`;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `name` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`name`, `date`, `type`, `remark`) VALUES
('Fluffy', '1995-05-15', 'Litter', '4 kittens, 3 female, 1 male'),
('Buffy', '1993-06-23', 'Litter', '5 puppies, 2 female, 3 male'),
('Buffy', '1994-06-19', 'Litter', '3 puppies, 3 female'),
('Chirpy', '1999-03-21', 'Vet', 'Needed beak straightened'),
('Slim', '1997-08-03', 'Vet', 'Broken rib'),
('Bowser', '1991-10-12', 'kennel', '-'),
('Fang', '1991-10-12', 'Kennel', '-'),
('Fang', '1998-08-28', 'Birthday', 'Gave him a new chew toy'),
('Claws', '1998-03-17', 'Birthday', 'Gave him a new flea collar'),
('Whistler', '1998-12-09', 'Birthday', 'First birthday');
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"relation_lines\":\"true\",\"angular_direct\":\"direct\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'cms_medicom', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"cms_achievements\",\"cms_divisions\",\"cms_gallery\",\"cms_hero\",\"cms_partners\",\"cms_programs\",\"cms_users\"],\"table_structure[]\":[\"cms_achievements\",\"cms_divisions\",\"cms_gallery\",\"cms_hero\",\"cms_partners\",\"cms_programs\",\"cms_users\"],\"table_data[]\":[\"cms_achievements\",\"cms_divisions\",\"cms_gallery\",\"cms_hero\",\"cms_partners\",\"cms_programs\",\"cms_users\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"pustaka\",\"table\":\"users\"},{\"db\":\"pustaka\",\"table\":\"migrations\"},{\"db\":\"siswa_sekolah\",\"table\":\"nilai_siswa\"},{\"db\":\"pustaka\",\"table\":\"anggota\"},{\"db\":\"pustaka\",\"table\":\"buku\"},{\"db\":\"db_beasiswa\",\"table\":\"tb_mahasiswa\"},{\"db\":\"db_beasiswa\",\"table\":\"tb_users\"},{\"db\":\"db_beasiswa\",\"table\":\"tb_dummy_gpa\"},{\"db\":\"akademik\",\"table\":\"tb_mahasiswa\"},{\"db\":\"siswa\",\"table\":\"tb_siswa\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2025-11-26 17:39:11', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `puskesmas`
--
CREATE DATABASE IF NOT EXISTS `puskesmas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `puskesmas`;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL,
  `harga` decimal(11,2) NOT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `harga`, `stok`) VALUES
(1, 'Paracetamol 500mg', 12000.00, 100),
(2, 'Amoxicillin 250mg', 17500.00, 80),
(3, 'Vitamin C 100g', 200000.00, 150),
(4, 'Obat Batuk Hitam', 9500.00, 60),
(5, 'Antasida', 7000.00, 75),
(6, 'Aspirin', 11000.00, 40),
(7, 'Betadine', 13500.00, 50),
(8, 'PARAMAXXXX', 12000.00, 2),
(9, 'Obat Cacing', 100000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat`, `tanggal_lahir`) VALUES
(1, 'Budi Santoso', 'Jl. Merdeka No. 10, Jakarta', '1990-05-15'),
(2, 'Siti Aminah', 'Jl. Kenanga No. 5, Bandung', '1985-11-20'),
(3, 'Agus Salim', 'Jl. Mawar No. 1', '1978-02-10'),
(4, 'Dewi Lestari', 'Jl. Cendana No. 12', '2001-07-30'),
(5, 'Eko Prasetyo', 'Jl. Sudirman No. 50', '1995-12-01'),
(6, 'Fitriani', 'Jl. Anggrek No. 3', '1989-09-09'),
(7, 'Gunawan', 'Jl. Kamboja No. 7', '1992-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` bigint(20) NOT NULL,
  `nama_peg` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `nama_peg`, `alamat`, `tanggal_lahir`) VALUES
(198202152009121002, 'Fajar Nugroho', 'Jl. Cendrawasih No. 2', '1982-02-15'),
(198309122009121004, 'Eko Prasetyo', 'Jl. Gajah Mada No. 33', '1983-09-12'),
(198503152010011001, 'Budi Santoso', 'Jl. Merdeka No. 10', '1985-03-15'),
(198505052010031003, 'Andi Wijaya', 'Jl. Elang No. 9', '1985-05-05'),
(198602282011081003, 'Indra Permana', 'Jl. Gatot Subroto No. 112', '1986-02-28'),
(198706082012111002, 'Gilang Ramadhan', 'Jl. Imam Bonjol No. 42', '1987-06-08'),
(198807202015051005, 'Candra Setiawan', 'Jl. Garuda No. 15', '1988-07-20'),
(198811052014031005, 'Cahyo Nugroho', 'Jl. Pahlawan No. 5', '1988-11-05'),
(199001012020011001, 'Dr. Ahmad Subagyo', 'Jl. Pahlawan No. 20, Surabaya', '1990-01-01'),
(199004252018012006, 'Fitri Handayani', 'Jl. Ahmad Yani No. 7', '1990-04-25'),
(199108142016072004, 'Jihan Fauziah', 'Jl. Siliwangi No. 20', '1991-08-14'),
(199203032021022002, 'Rini Susanti (Suster)', 'Jl. Melati No. 8, Yogyakarta', '1992-03-03'),
(199207202015022003, 'Ani Wijaya', 'Jl. Sudirman Kav. 25', '1992-07-20'),
(199311122019032004, 'Dian Permata', 'Jl. Rajawali No. 1', '1993-11-12'),
(199312192017052001, 'Hesti Purwanti', 'Jl. Pattimura No. 8', '1993-12-19'),
(199501302019032002, 'Dewi Lestari', 'Jl. Diponegoro No. 150', '1995-01-30'),
(199510102022012001, 'Bunga Citra', 'Jl. Merpati No. 4', '1995-10-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`);
--
-- Database: `pustaka`
--
CREATE DATABASE IF NOT EXISTS `pustaka` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pustaka`;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `telp`) VALUES
(240001, 'Ilham Budi Trisetyo', 'Kebumen', '0852615519277'),
(240002, 'Haidar Ghani', 'Karang Kandri', '0857236612357'),
(240003, 'Bagas Wicaksono', 'Gumilir', '0857233761637'),
(240004, 'Hafizh Ramadhani', 'Karang Kandri', '085782836317'),
(240005, 'Akmal Firmansyah', 'Kroya', '085729452837'),
(240006, 'Bambang Bima', 'Sumpiuh', '082375649283');

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '7903248d79d17625dd1d5c40bf0358d6', '2025-11-04 19:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'ilhamtrisetyo@gmail.com', 5, '2025-11-04 19:26:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `pengarang` varchar(25) NOT NULL,
  `penerbit` varchar(25) NOT NULL,
  `sampul` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `tahun_terbit`, `pengarang`, `penerbit`, `sampul`) VALUES
(1005002, 'Kitab Suci MikroTik', '2012', 'Akmal', 'GagasMedia', 'bagasbagas.png'),
(1204003, 'Competitive Programing Dasar', '2012', 'Ghani', 'Grasindo', 'cnt3.jpg'),
(1205001, 'Pemrograman', '2012', 'Ilham', 'Sinar Mas', 'cnt4.jpg'),
(1501007, 'Makan Siang Codingan', '2015', 'Budi', 'BambangMedia', 'cnt5.jpg'),
(1501010, 'asd', '0000', 'sad', 'asd', 'location.png'),
(1501011, 'Si Konci', '2019', 'Gatau', 'Gatau Juga', 'HEADER LINKEDIN.png'),
(1501012, 'Double T', '2019', 'TESTING2', 'test2', 'diagram_uts_psd_index.png'),
(1501013, 'aa', '0000', 'aa', 'aa', 'circle.png'),
(1501014, 'aaaa', '0000', 'aa', 'aa', 'Protic1.png'),
(1501015, 'b', '0000', 'b', 'b', 'header.png'),
(1501016, 'Nazril', '1945', 'Aulia', 'Muhendi', 'nazrilgansss.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1761101595, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'ilhamtrisetyo@gmail.com', 'ilham', '$2y$10$6xPHhQWuNeCgBowXeXIWMO6C84R61EDinxGdUI8BIJkfk8nKXWHhq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-11-04 19:26:34', '2025-11-04 19:26:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1501017;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
--
-- Database: `siswa`
--
CREATE DATABASE IF NOT EXISTS `siswa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `siswa`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `place_birth` varchar(50) DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `citizen` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone_address` int(11) DEFAULT NULL,
  `pastschool` varchar(100) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `penghasilan_ortu` int(11) DEFAULT NULL,
  `photos` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `privileges` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `privileges`) VALUES
('admin', 'admin', 1),
('user', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `siswa_sekolah`
--
CREATE DATABASE IF NOT EXISTS `siswa_sekolah` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `siswa_sekolah`;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `nis` varchar(15) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_ajaran` varchar(20) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `mapel` varchar(50) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `guru_mapel` varchar(100) DEFAULT NULL,
  `nilai_absen` decimal(5,2) DEFAULT NULL,
  `nilai_tugas` decimal(5,2) DEFAULT NULL,
  `nilai_kuis` decimal(5,2) DEFAULT NULL,
  `nilai_uts` decimal(5,2) DEFAULT NULL,
  `nilai_uas` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`nis`, `nama`, `jurusan`, `tahun_ajaran`, `semester`, `mapel`, `kelas`, `guru_mapel`, `nilai_absen`, `nilai_tugas`, `nilai_kuis`, `nilai_uts`, `nilai_uas`) VALUES
('1023002', 'BUdi i', 'Teknik Komputer dan Jaringan', '2021/2022', 1, 'Matematika', 'KELAS X', 'Fajar Mahardika', 80.00, 80.00, 80.00, 80.00, 80.00),
('1023003', 'Doni Firmansyah', 'Multimedia', '2023/2024(Ganjil)', 1, 'Pancasila', 'KELAS X', 'Eko Prasetyo', 92.50, 85.00, 89.00, 82.00, 87.50),
('1023005', 'Ilham Budi Trisetyo', 'Teknik Komputer dan Jaringan', '2021/2022', 1, 'Matematika', 'KELAS X', 'Fajar Mahardika', 5.00, 5.00, 5.00, 5.00, 5.00),
('1023006', 'Ilham Budi Trisetyo', 'Teknik Komputer dan Jaringan', '2021/2022', 1, 'Matematika', 'KELAS X', 'Fajar Mahardika', 5.00, 5.00, 5.00, 5.00, 5.00),
('1023010', 'Akmal', 'Teknik Komputer dan Jaringan', '2021/2022', 1, 'Matematika', 'KELAS X', 'Fajar Mahardika', 9.00, 9.00, 9.00, 9.00, 9.00),
('1023011', 'Paijo ilham', 'Teknik Komputer dan Jaringan', '2021/2022', 1, 'Matematika', 'KELAS X', 'Fajar Mahardika', 80.00, 80.00, 80.00, 80.00, 80.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
