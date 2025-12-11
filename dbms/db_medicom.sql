-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: medicom
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cms_achievements`
--

DROP TABLE IF EXISTS `cms_achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_achievements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_achievements`
--

LOCK TABLES `cms_achievements` WRITE;
/*!40000 ALTER TABLE `cms_achievements` DISABLE KEYS */;
INSERT INTO `cms_achievements` VALUES (2,'Juara 2 Lomba UI/UX Kategori Mahasiswa',2024,'Nasional','https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),(3,'Juara 3 Lomba Jaringan Komputer se-Jateng',2024,'Provinsi','https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),(4,'Finalis Lomba Competitive Programming',2024,'Nasional','https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),(5,'Juara Harapan 1 Lomba Fotografi',2023,'Kabupaten','https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),(6,'Juara 1 Lomba Video Pendek',2023,'Nasional','https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),(7,'Peserta Terbaik Pelatihan Desain Grafis',2023,'Internal','https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),(8,'Juara 2 Lomba Esai Ilmiah',2022,'Provinsi','https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),(9,'Finalis Lomba Poster Digital',2022,'Nasional','https://www.komatikugm.com/_next/image?url=%2Fassets%2Fprestasi%2Fdummy.png&w=1920&q=75'),(10,'Gemastik',2024,'Nasional','/src/img/prestasi/default_hero.jpg');
/*!40000 ALTER TABLE `cms_achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_divisions`
--

DROP TABLE IF EXISTS `cms_divisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_divisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `color_class` varchar(50) DEFAULT 'bg-white text-gray-800',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_divisions`
--

LOCK TABLES `cms_divisions` WRITE;
/*!40000 ALTER TABLE `cms_divisions` DISABLE KEYS */;
INSERT INTO `cms_divisions` VALUES (11,'BPH','KEGIATAN SEHARI HARI','/src/img/divisi/bagasbagas.png','bg-blue-500 text-white'),(12,'Siceman','adsas','/src/img/divisi/Group 285.png','bg-white text-gray-800'),(13,'Divisi 2','Divisi 2','/src/img/divisi/Group 291.png','bg-white text-gray-800');
/*!40000 ALTER TABLE `cms_divisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_gallery`
--

DROP TABLE IF EXISTS `cms_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_gallery`
--

LOCK TABLES `cms_gallery` WRITE;
/*!40000 ALTER TABLE `cms_gallery` DISABLE KEYS */;
INSERT INTO `cms_gallery` VALUES (7,'https://placehold.co/300x200/E0E0E0/909090?text=Galeri+7'),(9,'/src/img/galeri/default_hero.jpg'),(10,'/src/img/galeri/bagasbagas.png');
/*!40000 ALTER TABLE `cms_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_hero`
--

DROP TABLE IF EXISTS `cms_hero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_hero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_hero`
--

LOCK TABLES `cms_hero` WRITE;
/*!40000 ALTER TABLE `cms_hero` DISABLE KEYS */;
INSERT INTO `cms_hero` VALUES (1,'/src/img/download.jpeg','2025-12-03 01:21:33');
/*!40000 ALTER TABLE `cms_hero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_members`
--

DROP TABLE IF EXISTS `cms_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `division_id` (`division_id`),
  CONSTRAINT `cms_members_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `cms_divisions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_members`
--

LOCK TABLES `cms_members` WRITE;
/*!40000 ALTER TABLE `cms_members` DISABLE KEYS */;
INSERT INTO `cms_members` VALUES (5,11,'Ilham','Sekretaris','/src/img/pengurus/bagasbagas.png'),(6,11,'Bagas','Ketua','/src/img/pengurus/bagasbagas.png'),(7,11,'Wicak','Bendahara','/src/img/pengurus/Group 287.png');
/*!40000 ALTER TABLE `cms_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_objectives`
--

DROP TABLE IF EXISTS `cms_objectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_objectives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_objectives`
--

LOCK TABLES `cms_objectives` WRITE;
/*!40000 ALTER TABLE `cms_objectives` DISABLE KEYS */;
INSERT INTO `cms_objectives` VALUES (1,'Menjadi wadah kreativitas mahasiswa.'),(2,'Mengembangkan skill multimedia.');
/*!40000 ALTER TABLE `cms_objectives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_pages`
--

DROP TABLE IF EXISTS `cms_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_pages` (
  `page_slug` varchar(50) NOT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_description` text DEFAULT NULL,
  `main_title` varchar(255) DEFAULT NULL,
  `main_content` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`page_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_pages`
--

LOCK TABLES `cms_pages` WRITE;
/*!40000 ALTER TABLE `cms_pages` DISABLE KEYS */;
INSERT INTO `cms_pages` VALUES ('about','Tentang Kami','Medicom adalah adalah adalah adalahadalahadalah','Apa itu Medicom?','Medicom adalah lorem ipsum dan lain lain','https://www.youtube.com/embed/c3mJxCZJruE?si=85PijZ3-IsbFqD-z'),('prestasi','Prestasi Kami','Daftar pencapaian membanggakan kami.',NULL,NULL,NULL);
/*!40000 ALTER TABLE `cms_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_partners`
--

DROP TABLE IF EXISTS `cms_partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_partners`
--

LOCK TABLES `cms_partners` WRITE;
/*!40000 ALTER TABLE `cms_partners` DISABLE KEYS */;
INSERT INTO `cms_partners` VALUES (3,'RRQ','/src/img/partners/download (2).jpg'),(4,'Bagas','/src/img/partners/bagasbagas.png'),(5,'Google','/src/img/partners/Group 289.png');
/*!40000 ALTER TABLE `cms_partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_programs`
--

DROP TABLE IF EXISTS `cms_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_programs`
--

LOCK TABLES `cms_programs` WRITE;
/*!40000 ALTER TABLE `cms_programs` DISABLE KEYS */;
INSERT INTO `cms_programs` VALUES (4,'Bagas','test','/src/img/programs/bagasbagas.png');
/*!40000 ALTER TABLE `cms_programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_reports`
--

DROP TABLE IF EXISTS `cms_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `url` varchar(255) DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_reports`
--

LOCK TABLES `cms_reports` WRITE;
/*!40000 ALTER TABLE `cms_reports` DISABLE KEYS */;
INSERT INTO `cms_reports` VALUES (1,2024,1,'https://google.com'),(2,2025,1,'https://v3.tailwindcss.com/docs/text-color'),(3,2025,2,'https://protic.online/');
/*!40000 ALTER TABLE `cms_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_users`
--

DROP TABLE IF EXISTS `cms_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_users`
--

LOCK TABLES `cms_users` WRITE;
/*!40000 ALTER TABLE `cms_users` DISABLE KEYS */;
INSERT INTO `cms_users` VALUES (1,'admin','$2y$10$aHaptyDz7EZHz88aBabKd.hmaATtDuDpUdAXysYIQq0/3688ZEY5e','2025-11-13 03:58:44');
/*!40000 ALTER TABLE `cms_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-11  0:56:07
