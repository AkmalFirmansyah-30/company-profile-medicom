-- 1. Buat Database dan Gunakan
CREATE DATABASE IF NOT EXISTS `medicom`;
USE `medicom`;

-- ==========================================
-- 2. Tabel cms_achievements (Prestasi)
-- ==========================================
CREATE TABLE `cms_achievements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 3. Tabel cms_divisions (Divisi)
-- ==========================================
CREATE TABLE `cms_divisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `color_class` varchar(50) DEFAULT 'bg-white text-gray-800',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 4. Tabel cms_gallery (Galeri)
-- ==========================================
CREATE TABLE `cms_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL, -- Saya tambahkan ini karena kode PHP Anda menggunakannya
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 5. Tabel cms_hero (Hero Image)
-- ==========================================
CREATE TABLE `cms_hero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 6. Tabel cms_members (Pengurus)
-- ==========================================
-- Perlu dibuat SETELAH cms_divisions karena ada relasi
CREATE TABLE `cms_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `division_id` (`division_id`),
  CONSTRAINT `fk_members_division` FOREIGN KEY (`division_id`) REFERENCES `cms_divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 7. Tabel cms_objectives (Tujuan)
-- ==========================================
CREATE TABLE `cms_objectives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 8. Tabel cms_pages (Halaman Statis: About/Prestasi)
-- ==========================================
CREATE TABLE `cms_pages` (
  `page_slug` varchar(50) NOT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_description` text DEFAULT NULL,
  `main_title` varchar(255) DEFAULT NULL,
  `main_content` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`page_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 9. Tabel cms_partners (Partner)
-- ==========================================
CREATE TABLE `cms_partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 10. Tabel cms_programs (Program Kerja)
-- ==========================================
CREATE TABLE `cms_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 11. Tabel cms_reports (Laporan Kinerja)
-- ==========================================
CREATE TABLE `cms_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `url` varchar(255) DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- 12. Tabel cms_users (Admin)
-- ==========================================
CREATE TABLE `cms_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================
-- Data Awal Penting (Seed)
-- ==========================================

-- Insert User Admin (Password: admin123)
-- Hash ini dihasilkan dari password_hash('admin123', PASSWORD_DEFAULT)
INSERT INTO `cms_users` (`username`, `password`) VALUES
('admin', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm');

-- Insert Halaman Default (Agar tidak error saat load About/Prestasi)
INSERT INTO `cms_pages` (`page_slug`, `hero_title`, `hero_description`, `main_title`, `main_content`, `video_url`) VALUES
('about', 'Tentang Kami', 'Deskripsi singkat tentang kami.', 'Apa itu Medicom?', 'Medicom adalah...', ''),
('prestasi', 'Prestasi Kami', 'Daftar pencapaian membanggakan kami.', NULL, NULL, NULL);

-- Insert Hero Default (Agar tidak error di dashboard)
INSERT INTO `cms_hero` (`image_path`) VALUES ('/src/img/default_hero.jpg');