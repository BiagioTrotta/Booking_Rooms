-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: db_booking_rooms
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lastname` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_issuing_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname_group_1` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname_group_1` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth_group_1` date DEFAULT NULL,
  `place_of_birth_group_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_group_1` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_document_group_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_number_group_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_issuing_place_group_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname_group_2` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname_group_2` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth_group_2` date DEFAULT NULL,
  `place_of_birth_group_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_group_2` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_document_group_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_number_group_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_issuing_place_group_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Kihn','Greyson','0147942004','gchamplin@okon.org','2000-06-25','Beckerbury','male','national_id','0GB79RFPEJ','South Norwood','Runte','Daphne','1976-03-23','Port Jerodshire','male','national_id','6EF3D4X220','South Oma','Haley','Dudley','2023-09-16','Cormierview','other','national_id','9B6NZ3DLHJ','West Eveline','2024-03-29 14:26:29','2024-03-29 14:26:29'),(2,'Pollich','Brenden','7230386526','kpaucek@sporer.com','1992-03-12','Murrayborough','male','driver_license','RT823SPOEN','Lake Clemmie','Lynch','Alisha','2009-01-31','Ferryview','other','passport','GP92FRN5F8','Rosaliashire','Wiegand','Alexandrea','1980-10-04','South Alannafort','male','driver_license','N9R5FEMDY0','North Alview','2024-03-29 14:26:29','2024-03-29 14:26:29'),(3,'Watsica','Fanny','9544058423','matteo.bins@bruen.com','2014-02-05','Raynorside','male','passport','UHK98DDFLX','Carrollland','Langosh','Lura','2000-03-13','East Uriahhaven','female','national_id','9IS2GCOT4S','North Arnoton','Eichmann','Trent','2020-10-29','Cartwrightville','male','passport','0B9EH49SSM','Jovanyfurt','2024-03-29 14:26:29','2024-03-29 14:26:29'),(4,'Jacobson','Allison','8404673257','dayne73@yahoo.com','1980-08-21','Lenoraton','other','national_id','D5JHC0BQAC','Gustport','Jacobs','Hope','1981-08-09','West Ignaciomouth','female','national_id','ZJXIO8EK2W','Owentown','Lebsack','Alessandro','1997-04-08','East Morris','male','passport','OODZIS20WQ','Lake Karine','2024-03-29 14:26:29','2024-03-29 14:26:29'),(5,'Johns','Brycen','4527555392','gregg24@yahoo.com','2018-08-18','Lake Adelbert','male','driver_license','FEHJNLQNOM','Tyreekville','Larson','Arch','1994-04-16','Greenfeldermouth','female','national_id','H9NQWAK6KT','Ritchiebury','Denesik','Hoyt','1985-08-02','Lake Rogelio','male','national_id','B1BKEFSE1N','South Joesph','2024-03-29 14:26:29','2024-03-29 14:26:29'),(6,'Schaefer','Cade','8977903195','rveum@senger.net','2005-09-02','South Ursula','female','driver_license','A0RJI4XY7B','Port Alfredo','Hansen','Savanna','1979-09-09','East Tyree','other','driver_license','MMNEZDXVD0','Nienowtown','Zieme','Franz','1970-08-18','Alfonzoland','female','passport','9YNHWCDWRP','West Rebecca','2024-03-29 14:26:29','2024-03-29 14:26:29'),(7,'Daniel','Travon','1184977883','shanahan.justine@gmail.com','2016-04-21','Stammburgh','female','national_id','MTTLOIZ8O7','Port Delphine','Pfeffer','Estrella','2022-09-26','Reillymouth','male','driver_license','MPXSC6JT50','Anabelleland','Schumm','Celine','2004-12-19','Emmanuelshire','other','passport','INI7T84T0G','Maggioborough','2024-03-29 14:26:29','2024-03-29 14:26:29'),(8,'Adams','Jaylon','6754750421','turcotte.gerardo@yahoo.com','1981-07-19','Robelchester','female','driver_license','RJQR8YOAJP','O\'Konfort','Sporer','Lyda','1988-12-29','Manuelmouth','female','driver_license','SAIL5A6XF2','Stammfurt','Russel','Marta','1985-06-18','New Jacynthe','male','driver_license','F1IC8BNJVU','North Oceane','2024-03-29 14:26:29','2024-03-29 14:26:29'),(9,'Fay','Felton','6216706493','shea.pouros@hahn.com','1999-11-25','Wilbertberg','other','driver_license','HUDCNSZCM9','Damianville','DuBuque','Wilma','2010-10-31','Eberttown','male','passport','AY9AQQ7ZRR','Kirlintown','Kunze','Emilia','2004-06-20','South Hollie','female','passport','OBI43AAZOS','Isabellbury','2024-03-29 14:26:29','2024-03-29 14:26:29'),(10,'Monahan','Marge','5989917480','blick.maximo@wolff.com','2005-12-23','South Albafort','female','passport','FDLCGFEKNJ','Shadmouth','Thompson','Dianna','1975-04-25','Keeblerland','other','driver_license','42BI2C5DF7','West Budborough','Hirthe','Santino','2005-11-04','Alethaside','male','passport','S1RUGKZ77S','Diegoberg','2024-03-29 14:26:29','2024-03-29 14:26:29'),(11,'Cook','Jada','23','xefovepyg@mailinator.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-03-31 08:56:16','2024-03-31 08:56:16');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2023_10_14_141656_create_rooms_table',1),(7,'2023_12_04_194150_create_clients_table',1),(8,'2023_12_04_194702_create_reservations_table',1),(9,'2023_12_06_200302_add_unique_constraint_to_reservations_table_for_dates',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `room_id` bigint unsigned NOT NULL,
  `beds` int NOT NULL DEFAULT '1',
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reservations_room_id_check_in_unique` (`room_id`,`check_in`),
  UNIQUE KEY `reservations_room_id_check_out_unique` (`room_id`,`check_out`),
  KEY `reservations_client_id_foreign` (`client_id`),
  CONSTRAINT `reservations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `reservations_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,1,5,2,'2024-03-30','2024-04-03',55.00,220.00,1,'2024-03-30 19:21:50','2024-03-30 19:22:24'),(2,5,12,3,'2024-03-31','2024-04-04',2.00,8.00,0,'2024-03-31 08:55:37','2024-03-31 08:55:37'),(3,7,6,4,'2024-03-31','2024-04-18',33.00,594.00,1,'2024-03-31 13:31:17','2024-03-31 13:31:23');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `room_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `beds` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'101',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(2,'102',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(3,'103',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(4,'104',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(5,'105',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(6,'106',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(7,'107',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(8,'108',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(9,'109',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(10,'110',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(11,'111',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(12,'112',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(13,'201',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(14,'202',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(15,'203',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(16,'204',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(17,'205',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(18,'206',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(19,'207',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(20,'208',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(21,'209',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(22,'210',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(23,'211',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(24,'301',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(25,'302',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(26,'303',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(27,'304',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(28,'305',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(29,'306',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(30,'307',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(31,'308',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(32,'309',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(33,'310',2,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(34,'311',2,'2024-03-29 14:26:29','2024-03-29 14:26:29');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_manager` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,1,'Administrator','admin@example.com',NULL,'$2y$10$mvYNLDiKjrzKV8irJNVf2eUZCmTOLyZ8Eor7NytnlE9w0GCh.Ci5C',NULL,NULL,NULL,'2024-03-29 14:26:29','2024-03-29 14:27:40'),(2,0,1,'User','user@example.com',NULL,'$2y$10$w5FDTBAqGuMhvJCtepp4B.n3ttA2Z0Fysr32GX1EJ7Taazuy1jT8q',NULL,NULL,NULL,'2024-03-29 14:26:29','2024-03-29 14:27:19'),(3,0,0,'User2','user2@example.com',NULL,'$2y$10$RTinSq7McVSMxbtUXfHNv.bLGEkIZWm13iOFBCOJPPT.ftzG1e19.',NULL,NULL,NULL,'2024-03-29 14:26:29','2024-03-29 14:26:29'),(4,0,0,'Facilis ','vagyx@mailinator.com',NULL,'$2y$10$Cieud6nWidud9jRgZf.gB.dOqbFxOfyMHzoe3eY7PE6kApBS5ZA4u',NULL,NULL,NULL,'2024-03-31 08:55:57','2024-03-31 08:55:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-31 13:31:57
