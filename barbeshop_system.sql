/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.1.2-MariaDB, for Android (aarch64)
--
-- Host: localhost    Database: barbeshop
-- ------------------------------------------------------
-- Server version	12.1.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `activities` VALUES
(1,'Menambahkan barber baru: Tes','barber','2026-03-07 19:27:03','2026-03-07 19:27:03'),
(2,'Memperbarui data barber: dari \'Puki\'','barber','2026-03-07 19:37:42','2026-03-07 19:37:42'),
(3,'Memperbarui data barber: . Hayin','barber','2026-03-07 19:38:52','2026-03-07 19:38:52'),
(4,'Memperbarui data barber: Hayin','barber','2026-03-07 19:40:16','2026-03-07 19:40:16'),
(5,'Memperbarui data barber: Tes','barber','2026-03-07 19:40:30','2026-03-07 19:40:30'),
(6,'Memperbarui data barber: Hu Tao','barber','2026-03-07 19:40:47','2026-03-07 19:40:47'),
(7,'Memperbarui data barber \'Hu Tes\' (Bagian: Nama)','barber','2026-03-07 19:44:16','2026-03-07 19:44:16'),
(8,'Memperbarui data barber \'Hu Tes\' (Bagian: Biografi)','barber','2026-03-07 19:44:41','2026-03-07 19:44:41'),
(9,'Memperbarui data barber \'Hu Tes\' (Bagian: Foto Profil)','barber','2026-03-07 19:45:22','2026-03-07 19:45:22'),
(10,'Memperbarui data barber \'Danyys\' (Bagian: Nama, Bio, Foto Profil)','barber','2026-03-07 19:46:35','2026-03-07 19:46:35'),
(11,'Memperbarui data barber: \'Susu\' (Bagian: Nama)','barber','2026-03-07 19:48:13','2026-03-07 19:48:13'),
(12,'Menghapus barber: Susudari sistem','barber','2026-03-07 19:50:44','2026-03-07 19:50:44'),
(13,'Menambahkan barber baru: \'Dannys\'','barber','2026-03-07 19:54:44','2026-03-07 19:54:44'),
(14,'Memperbarui data barber: \'Hu Tao\' (Bagian: Nama)','barber','2026-03-07 19:55:07','2026-03-07 19:55:07'),
(15,'Menghapus barber: \'Hu Tao\' dari sistem','barber','2026-03-07 19:55:45','2026-03-07 19:55:45'),
(16,'Menambahkan layanan baru: \'Tes\'','layanan','2026-03-07 20:02:48','2026-03-07 20:02:48'),
(17,'Memperbarui data barber: \'Demon Dwi\' (Bagian: Nama)','barber','2026-03-07 20:03:21','2026-03-07 20:03:21'),
(18,'Memperbarui data layanan: \'Tes\' (Bagian: Harga)','layanan','2026-03-07 20:08:01','2026-03-07 20:08:01'),
(19,'Menghapus layanan: \'Tes\' dari sistem','layanan','2026-03-07 20:08:59','2026-03-07 20:08:59'),
(20,'Update status Iza Makmur: PENDING -> KONFIRMASI','booking','2026-03-07 20:20:04','2026-03-07 20:20:04'),
(21,'Update status Iza Makmur: KONFIRMASI -> SELESAI','booking','2026-03-07 20:23:25','2026-03-07 20:23:25'),
(22,'Update status Gilang Kamal: PENDING -> BATAL','booking','2026-03-07 20:25:55','2026-03-07 20:25:55'),
(23,'Menghapus reservasi: Gilang Kamal (2026-03-06)','booking','2026-03-07 20:25:59','2026-03-07 20:25:59');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) unsigned NOT NULL,
  `barber_id` bigint(20) unsigned NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `status` enum('pending','konfirmasi','selesai','batal') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_service_id_foreign` (`service_id`),
  KEY `appointments_barber_id_foreign` (`barber_id`),
  CONSTRAINT `appointments_barber_id_foreign` FOREIGN KEY (`barber_id`) REFERENCES `barbers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `appointments` VALUES
(5,1,3,'Erza Kurniawan','085645837298','2026-03-06','15:00:00','konfirmasi','2026-03-05 22:33:49','2026-03-05 22:38:52'),
(8,1,3,'Maltan','085645837810','2026-03-20','11:00:00','pending','2026-03-05 22:51:10','2026-03-05 22:51:10'),
(9,5,4,'Iza Makmur','085645837298','2026-03-09','13:00:00','selesai','2026-03-07 20:17:54','2026-03-07 20:23:25');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `barbers`
--

DROP TABLE IF EXISTS `barbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `barbers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barbers`
--

LOCK TABLES `barbers` WRITE;
/*!40000 ALTER TABLE `barbers` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `barbers` VALUES
(2,'Dimas Barka','barbers/eDm6T75gE3fBlReSyZgWu8IRMn5RCdh360kQzHmc.jpg','Pengalaman cukur rambut selama 5 tahun dan penghargaan juara satu cukur kabupaten','2026-02-28 22:46:26','2026-03-05 21:38:40'),
(3,'Ahmad Roland','barbers/pkCRRFb8JXLPNBAEqdDo8bQbAXxAyWfqnxE1b2fI.jpg','Berpengalaman hampir 1 abad dalam bidang cukur bulu puyuh','2026-03-03 21:52:10','2026-03-05 21:38:48'),
(4,'Zezhi Fauzan','barbers/XrFwntEUNKw0KDrttj6Cd39nP9Od9OBNU0TFbhIZ.jpg','Berpengalaman dalam mencukur 1000 orang, kalau tak sembayang apa gunanya','2026-03-04 23:03:27','2026-03-05 21:39:11'),
(5,'Demon Dwi','barbers/qx28zgSgo40lX08LHBNWERWqeYM0Y804DZyz5Aw4.jpg','Pengalaman bla bla bla bla 5 tahun dalam bidang kedokteran wajah','2026-03-07 08:24:26','2026-03-07 20:03:21');
/*!40000 ALTER TABLE `barbers` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `cache` VALUES
('laravel-cache-admin@barbeshop.com|127.0.0.1','i:1;',1772691560),
('laravel-cache-admin@barbeshop.com|127.0.0.1:timer','i:1772691560;',1772691560);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_02_21_054857_create_services_table',1),
(5,'2026_02_21_054920_create_barbers_table',1),
(6,'2026_02_21_054946_create_appointments_table',1),
(7,'2026_03_08_021054_create_activities_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `services` VALUES
(1,'Haircut & Stylling',50000,45,'2026-02-21 00:16:30','2026-02-21 00:16:30'),
(2,'Beard Trim',30000,20,'2026-02-21 00:16:30','2026-02-21 00:16:30'),
(3,'The Executive Cut',75000,45,'2026-03-07 08:26:34','2026-03-07 08:26:34'),
(4,'Gentlemen\'s Grooming',125000,60,'2026-03-07 08:27:11','2026-03-07 08:27:11'),
(5,'Express Fresh Trim',50000,30,'2026-03-07 08:27:45','2026-03-07 08:27:45');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `sessions` VALUES
('FWvdTxie0PnFZiw1FhQxtwBsyYJ5lYWuE2FgdR9o',2,'127.0.0.1','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZHY0M2tEM0REaHZTZUZ5SHJ3eEtQelJmRmpoWW1VbGF3NUZoakk5YyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1772940584),
('jY1Fap8bSTYOOvsgI4lJl5CF6XjrOxjUfoFUfBAn',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkhkajlhYU9IaEVETlBwTkU2eW1sWXZPNnZReExWSmFYMVZLSlRsNSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1773040558);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,'Admin','admin@gmail.com','2026-02-21 00:16:30','$2y$12$/WvX24t5mQQDIAT.6LTZvePW3s9pkt6/OFs7al2el/iDsIl9qqh.O','EKOnyTAnam','2026-02-21 00:16:30','2026-02-21 00:16:30'),
(2,'Admin','admin@barbershop.com',NULL,'$2y$12$RPIhllDuiLYqm4VwRMLca.QHj7vgo4FqTwPnfFja/TVFrGi1S98DW','4OUjizVqmsFnjY8of8KPCJu1uubxny0Y3BBRyatDibmmGt86f9mtGmn6UQoS','2026-03-04 23:17:32','2026-03-04 23:17:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-03-11 14:42:48
