
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
DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `authors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES ('Bolalin, Merlin Joy, D.',NULL,1,NULL,NULL),('Tanra, Gerald, C.',NULL,2,NULL,NULL),('Delfino, Erica Mae P.',NULL,3,NULL,NULL),('Plopinio, Hubert P.',NULL,4,NULL,NULL),('Abanto, Gracezel S.',NULL,5,NULL,NULL),('Olores, Lyka P.',NULL,6,NULL,NULL),('Baguio, Eve Frances Lloyd, O.',NULL,7,NULL,NULL),('Baldovia, Cyrill, A.',NULL,8,NULL,NULL),('Villaralvo, Isabel, R.',NULL,9,NULL,NULL),('Abanto, Gracezel, S.',NULL,10,NULL,NULL),('Olores, Lyka, P.',NULL,11,NULL,NULL),('Prestosa, Mark',NULL,12,NULL,NULL),('Gavarra, Joris',NULL,13,NULL,NULL),('Cultivo, Ria, B.',NULL,14,NULL,NULL),('Tominio, Mark John, G.',NULL,15,NULL,NULL),('Dialogo, Clark Ira, P.',NULL,16,NULL,NULL),('Rivero, Jayro, B.',NULL,17,NULL,NULL),('Delfino, Erica Mae, P.',NULL,18,NULL,NULL),('Plopinio, Hubert, P.',NULL,19,NULL,NULL),('Alarcon, Glysa, N.',NULL,20,NULL,NULL),('Boragay, Joanna, H.',NULL,21,NULL,NULL),('Jardinel, Mary Ann, D.',NULL,22,NULL,NULL),('Avila, Jessamae, B.',NULL,23,NULL,NULL),('Hufancia, Kareem Rogel, A.',NULL,24,NULL,NULL),('Gonzales, Romar, C.',NULL,25,NULL,NULL),('Eddie, Buenaflor, E.',NULL,26,NULL,NULL),('Egalin, Mark Noel, V.',NULL,27,NULL,NULL),('Talundata, Erica, D.',NULL,28,NULL,NULL),('Lubiano, Joey, P.',NULL,29,NULL,NULL),('Gonzaga, Diosa, B.',NULL,30,NULL,NULL),('Trial2, Error','trial2@mail.com',31,NULL,NULL),('Trial, Errorrrs','trial@mail.com',32,NULL,NULL);
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `colleges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colleges` (
  `college` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `colleges` WRITE;
/*!40000 ALTER TABLE `colleges` DISABLE KEYS */;
INSERT INTO `colleges` VALUES ('College of Arts and Sciences',1,'2023-10-01 11:32:49','2023-10-01 11:32:49'),('College of Business and Management',2,'2023-10-01 11:32:49','2023-10-01 11:32:49'),('College of Engineering and Technology',3,'2023-10-01 11:32:49','2023-10-01 11:32:49'),('College of Education',4,'2023-10-01 11:32:49','2023-10-01 11:32:49');
/*!40000 ALTER TABLE `colleges` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `college_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Bachelor of Science in Information Technology','2023-10-01 11:32:49','2023-10-01 11:32:49',1),(2,'Bachelor of Science in Computer Science','2023-10-01 11:32:49','2023-10-01 11:32:49',1),(3,'Bachelor of Science in Secondary Education Major in English','2023-10-01 11:32:49','2023-10-01 11:32:49',4),(4,'Bachelor of Science in Secondary Education Major in Values Education','2023-10-01 11:32:49','2023-10-01 11:32:49',4),(5,'Bachelor of Science in Secondary Education Major in Filipino','2023-10-01 11:32:49','2023-10-01 11:32:49',4),(6,'Bachelor of Science in Secondary Education Major in Social Studies','2023-10-01 11:32:49','2023-10-01 11:32:49',4),(7,'Bachelor of Science in Secondary Education Major in Science','2023-10-01 11:32:49','2023-10-01 11:32:49',4),(8,'Bachelor of Science in Secondary Education Major in Mathematics','2023-10-01 11:32:49','2023-10-01 11:32:49',4),(9,'Bachelor of Science in Elementary Education Major in General Education','2023-10-01 11:32:49','2023-10-01 11:32:49',4),(10,'Bachelor of Arts in Communication ','2023-10-01 11:32:49','2023-10-01 11:32:49',1),(11,'Bachelor of Science in Biology ','2023-10-01 11:32:49','2023-10-01 11:32:49',1),(12,'Bachelor of Science in Geology ','2023-10-01 11:32:49','2023-10-01 11:32:49',1),(13,'Bachelor of Science in Mathematics ','2023-10-01 11:32:49','2023-10-01 11:32:49',1),(14,'Bachelor of Science in Accountancy','2023-10-01 11:32:49','2023-10-01 11:32:49',2),(15,'Bachelor of Science in Business Administration Major in Financial Management','2023-10-01 11:32:49','2023-10-01 11:32:49',2),(16,'Bachelor of Science in Office Administration','2023-10-01 11:32:49','2023-10-01 11:32:49',2),(17,'Bachelor of Science in Entrepreneurship','2023-10-01 11:32:49','2023-10-01 11:32:49',2),(18,'Bachelor of Science in Economics','2023-10-01 11:32:49','2023-10-01 11:32:49',2),(19,'Bachelor of Science in Civil Engineering\r\n        ','2023-10-01 11:32:49','2023-10-01 11:32:49',3),(20,'Bachelor of Science in Sanitary Engineering','2023-10-01 11:32:49','2023-10-01 11:32:49',3),(21,'Bachelor of Automotive Technology','2023-10-01 11:32:49','2023-10-01 11:32:49',3),(22,'Bachelor of Engineering Technology Major in Electrical Engineering Technology','2023-10-01 11:32:49','2023-10-01 11:32:49',3),(23,'Bachelor of Engineering Technology Major in Mechanical Engineering Technology option:  Automotive Technology','2023-10-01 11:32:49','2023-10-01 11:32:49',3),(24,'Bachelor of Engineering Technology Major in Mechanical Engineering Technology option:  Refrigeration and Air Conditioning Technology','2023-10-01 11:32:49','2023-10-01 11:32:49',3);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `interactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `theses_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `interactions_theses_id_foreign` (`theses_id`),
  KEY `interactions_user_id_foreign` (`user_id`),
  CONSTRAINT `interactions_theses_id_foreign` FOREIGN KEY (`theses_id`) REFERENCES `theses` (`id`),
  CONSTRAINT `interactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `interactions` WRITE;
/*!40000 ALTER TABLE `interactions` DISABLE KEYS */;
INSERT INTO `interactions` VALUES (1,9,22,'Great',0,'2023-10-16 06:40:50','2023-10-16 06:45:46'),(2,5,22,'Great findings.',0,'2023-10-16 06:43:46','2023-10-16 06:43:46'),(3,6,22,'This is interesting.',0,'2023-10-16 06:44:44','2023-10-16 06:44:44'),(4,9,22,'Nice',0,'2023-10-16 06:47:06','2023-10-16 06:47:06');
/*!40000 ALTER TABLE `interactions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `theses_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_theses_id_foreign` (`theses_id`),
  KEY `likes_user_id_foreign` (`user_id`),
  CONSTRAINT `likes_theses_id_foreign` FOREIGN KEY (`theses_id`) REFERENCES `theses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,9,22,NULL,NULL,1),(2,12,22,NULL,NULL,1),(3,11,22,NULL,NULL,1),(4,5,22,NULL,NULL,1),(5,6,22,NULL,NULL,1);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2023_08_26_163805_create_sessions_table',1),(7,'2023_08_26_165918_create_theses_table',1),(8,'2023_08_26_170106_create_colleges_table',1),(9,'2023_08_26_170133_create_authors_table',1),(10,'2023_08_26_170156_create_comments_table',1),(11,'2023_08_27_013755_create_years',1),(12,'2023_08_27_151852_create_courses',1),(13,'2023_08_29_153729_create_interactions',1),(14,'2023_09_30_114011_create_permission_tables',1),(15,'2023_09_30_134708_create_foreign_keys',1),(16,'2023_10_01_014743_create_theses_has_authors',1),(17,'2023_10_01_024342_create_viewed_theses',1),(18,'2023_10_02_061118_approve_column',2),(19,'2023_10_03_091905_drop_contraints',3),(20,'2023_10_12_131527_user_id_nullable',4),(21,'2023_10_15_234945_add_course_id_in_user_table',5),(22,'2023_10_16_151808_create_likes_table',6),(23,'2023_10_16_153000_add_likes',7),(24,'2023_11_18_170218_add_email_to_author_table',8),(25,'2023_11_18_172100_add_ban_to_user_table',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` VALUES (1,'App\\Models\\User',13),(1,'App\\Models\\User',14);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',16),(2,'App\\Models\\User',18),(2,'App\\Models\\User',19),(2,'App\\Models\\User',20),(2,'App\\Models\\User',21),(2,'App\\Models\\User',22),(2,'App\\Models\\User',24),(3,'App\\Models\\User',1),(3,'App\\Models\\User',22),(3,'App\\Models\\User',24),(3,'App\\Models\\User',25),(3,'App\\Models\\User',26),(3,'App\\Models\\User',27),(3,'App\\Models\\User',28);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'moderate','web','2023-10-01 21:55:43','2023-10-01 21:55:43');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2023-10-01 11:32:48','2023-10-01 11:32:48'),(2,'contentModerator','web','2023-10-01 11:32:48','2023-10-01 11:32:48'),(3,'registeredUser','web','2023-10-01 11:32:48','2023-10-01 11:32:48'),(4,'guestUser','web','2023-10-01 11:32:48','2023-10-01 11:32:48');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('bEBrKEpIdnvmQORQSpRIuJmyWwc7biDpyzj8CQUJ',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoidThYTFhJRkU2ak5CU2NCOVBVSmQ5cFdUemkxV0hMcGxYY1daRWgzcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90aGVzZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1700932651),('rSaksQ068j1jRAIQyubyySjQezGbX8WzFwnwwK4j',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZjRpN2RJWWMyWEhlbXg1NVpGZnNPWWJsSkp0QTl3OFBueTgydXRHVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tb2RlcmF0b3IvdXNlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1700871377),('UipdFG73t7Mg9g6D8w2vVrPJ0AxZMLqFJP9RLdN4',24,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRzJVOEcyMDkxY1QyOXZqWVJJYkxHVU9Ybk1VTHFLMERoSXdSNzVybCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tb2RlcmF0b3IiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyNDt9',1700871382);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `theses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakeys` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint(20) unsigned NOT NULL,
  `college_id` bigint(20) unsigned NOT NULL,
  `year_id` bigint(20) unsigned NOT NULL,
  `interactions_id` bigint(20) unsigned DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `theses_user_id_foreign` (`user_id`),
  CONSTRAINT `theses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `theses` WRITE;
/*!40000 ALTER TABLE `theses` DISABLE KEYS */;
INSERT INTO `theses` VALUES (5,'CAUSES AND RESOLUTIONS: UNDERSTANDING CONFLICT IN \r\nCOMMUNICATION AMONG YOUNG PARENTS',1,'1697121588.pdf','This study is focused on conflict in communication and its communication style \r\nemployed among young parents. Specifically, it aims to investigate how conflict is \r\nunderstood and managed by young parents. This is a qualitative research paper that \r\nobtained comprehensive knowledge and understanding of the conflict in communication \r\namong young parents. This paper used a phenomenological approach that is focused on the \r\neveryday experiences of the young parents and deals with gathering in-depth insight on the \r\nyoung parents’ conflict in communication and their communication styles to resolve \r\nconflict. The primary data collection method for this study was a semi-structured interview. \r\nThe researchers visited the home of the informants for data gathering. Most of the \r\ninformants would sense that there is a conflict between them and their partners when they \r\nare both giving each other the silent treatment. The informants see the conflict as a normal \r\nscenario in their relationship. The informants described the situations or instances in their \r\nrelationship where conflict arises. This study generated two general themes of conflict in \r\ncommunication: Attitudinal conflict and Material conflict. Each couple has different \r\nreasons why conflict arises among these include: busy with online games, opposing \r\nattitudes and/or interests, vices, household chores, jealousy, and financial constraints. Each \r\nyoung parents have unique ways on how to resolve conflict among these include: \r\nAttitudinal, Behavioral, Passive to Assertive and Passive.','Conflict, Conflict in Communication, Young Parents, Communication Styles','2023-10-12 06:39:48','2023-10-12 06:48:30',10,1,4,NULL,1),(6,'NETFLIX’S FOREIGN SERIES AND BSED ENGLISH \r\nSTUDENTS’ VOCABULARY AND READING\r\nCOMPREHENSION',1,'1697122625.pdf','The use of media, which includes music, movies and other sorts of \r\nentertainment-related learning resources, has influenced learners to learn and \r\nacquire new languages, as well as to improve their abilities in writing, reading, and \r\nspeaking in a foreign or native language. However, little has been done to \r\nunderstand the implications of Netflix’s foreign series to vocabulary and reading \r\ncomprehension of students. The study focused on vocabulary and reading \r\ncomprehension among 38 BSEd English students of Partido State University to \r\nmaximize their opportunities to learn while watching foreign series on Netflix. It \r\naimed to assess the influences of Netflix’s foreign series in language learning of \r\nstudents. An explanatory sequential mixed-method design was employed in this \r\nstudy with a two-phase data collection (quantitative and qualitative). The survey \r\ndata were analyzed using weighted mean, frequency and percentage, as well as \r\ninferential analysis, while the results of the follow-up FGD were transcribed, coded, \r\nand thematically analyzed. Results revealed that students perceived Netflix’s \r\nforeign series to be an effective and beneficial way of learning vocabulary and \r\nreading comprehension indicating to have positive response towards Netflix’s \r\nforeign series as vocabulary and reading comprehension tool. In conclusion, \r\nNetflix’s foreign series have subtitle feature which is utilized by the students in \r\nlearning vocabulary and reading comprehension; students also strongly agreed \r\nthat Netflix’s foreign series is a multimedia learning tool in terms of its language \r\naccessibility, inclusion of both words and pictures, and presentation of related \r\nwords and pictures near each other; and students have the attitudes of being entertained, motivated, interested, and autonomous towards Netflix’s foreign \r\nseries as a vocabulary and reading comprehension learning tool.\r\nIt is recommended that; language learners may explore the influence of \r\nNetflix’s foreign series to their vocabulary and reading comprehension and use it \r\nas a supplementary tool in learning English language; language teachers may use \r\nNetflix’s foreign series as part of the teaching process along with the conventional \r\nclassroom syllabus and lectures to engage in students’ learning; and the \r\ncurriculum developers may consider Netflix’s foreign series in drafting and \r\ndesigning curriculum as one of the new learning tools in the language classroom.','Netflix’s foreign series, learning vocabulary, reading comprehension,  language skills, language learning tool.','2023-10-12 06:57:05','2023-10-12 07:31:58',3,4,3,NULL,1),(8,'CORPORATE SOCIAL RESPONSIBILITY (CSR) OF PHILIPPINE\r\nPUBLICLY LISTED COMPANIES IN THE SERVICE SECTOR AMIDST COVID-19 PANDEMIC',19,'1697258420.pdf','The growing societal degradation brought by COVID-19 emphasized the need for responsiblecorporate practices. CSR as corporate policy relates to the integration of relation betweenvarying and sometime conflicting interests of stakeholders especially in times of greatfinancial distress. Thus, it is imperative that we look into the behaviors of businesses relatingto their CSR practices during the pandemic. This study seeks to understand the status of CSRin the Philippines and what are the impetus for conducting such corporate initiatives. Contentanalysis of CSR disclosures on 6 dimensions (ECON, ENVI, HR, LA, PR and SOCI) onAnnual Reports (Form 17-1) showed that Philippine Companies focused their socialinitiatives on society development and economic performance indicator. Using regressionanalysis, this study assessed the determinants of CSR of publicly-listed companies in theservices sector in the Philippines. The findings revealed there is a positive significantrelationship between the level of disclosure (CSRDi) and several financial specific (ROA,LEV), firm specific (SUBSEC) and board governance (BOD, IND and DUA) characteristics.Furthermore, analysis of CSRDi revealed as significant difference with the level of disclosurepre- and mid-pandemic.','CSR, COVID – 19, Philippines, service sector, corporate social responsibility,stakeholder theory, legitimacy theory.','2023-10-13 20:40:20','2023-10-13 21:13:30',14,2,4,NULL,1),(9,'Speech Anxiety of BSEd English  \r\nStudents during Synchronous  \r\nLearning',1,'1697346831.pdf','This quantitative descriptive study discusses the level and causes of \r\nspeech anxiety and the coping strategies used by the students to overcome this \r\nanxiety in synchronous learning. The participants in this study are the randomly \r\nselected 45 students of Bachelor of Secondary Education majoring in English \r\nfrom the first to third years at Partido State University’s main campus, Goa, \r\nCamarines Sur, Philippines. The five-point Likert scale research-made \r\nquestionnaire was developed for the study. The analysis indicated an overall \r\nweighted mean of 3.59, explaining that BSEd English students concurred with \r\nthe majority to be “very anxious” in speech during synchronous learning. \r\nAccording to the results, the above-moderate level of speech anxiety among \r\nEnglish students was caused by Lack of Self Confidence, Fear of Negative \r\nEvaluation, Difficulty Expressing Ideas, Teaching Strategies, and Technical \r\nIssues and Difficulties. Difficulty expressing ideas is the greatest cause of speech \r\nanxiety (3.88) while technical issues and difficulties (3.33) are the least causes of \r\nspeech anxiety during synchronous learning. However, given the higher level of \r\nspeech anxiety obtained from quantitative data, students are much interested in \r\ncoping with this anxiety. Practicing/rehearsing, positive thinking, preparation, \r\nmeditating, mannerism/personal body gesture, and slow speaking were the \r\ndetermined six major coping strategies. The findings revealed that practicing and \r\nrehearsing are the most applied coping strategy.','Speech Anxiety, Coping Strategies, Causes, Level','2023-10-14 21:13:52','2023-10-14 21:15:19',3,4,3,NULL,1),(10,'TAMBANGAN HEALTH CENTER \r\nMANAGEMENT SYSTEM (THCMS)',1,'1697347601.pdf','The information obtained from the midwife and patients is \nprocessed by the Tambangan Health Center Management System. It is a \nrigorous approach for improving the workflow of an organization\'s in \nterms of efficiency, effectiveness, and adaptability. \nThe medical staff at the Barangay Tambangan Health Center work \nunder a manual method that makes it difficult for them to collect patient \ndata and results in their being the least productive at a health facility. \nTambangan Health Center Management System (THCMS) was suggested \nto be implemented in the mentioned barangay in order to enhance their \ncommunity services. \nPHP and MySQL were used to develop the web-based THCMS \nproject. It is intended to store and track medical data about Barangay \nTambangan residents. By doing this, patient medical data can be \nrecorded in a more organized and effective manner.','Web-Based, Health Center Management System, Management System','2023-10-14 21:26:41','2023-10-16 09:15:11',1,1,3,NULL,1),(11,'STUDENTS’ PERCEIVED SATISFACTION AND ACADEMIC PERFORMANCE IN \r\nONLINE CLASSES OF PARTIDO STATE UNIVERSITY: EVIDENCE FROM \r\nORDINAL LOGISTIC MODELS',22,'1697414605.pdf','COVID-19 pandemic strained academic institutions\' capacity to handle such \r\nabrupt crisis so, they implemented online learning education to give students access to continue \r\ntheir education. This study perceived how satisfied students are with their online learning classes \r\nand does it influence their academic performance. And examine whether there is a relationship \r\nbetween socio-economic profile, online learning activities and opportunities experienced by the \r\nstudents, constraints experienced by the students, coping mechanisms of students, level of \r\nsatisfaction of students in online learning classes, and academic performance of students engaged \r\nin online classes. For this purpose, we conducted a study in ParSU – Goa campus using online \r\nsurvey composed of 361 respondents. This study performed an analysis using ordinal logistic \r\nmodel and regression. This study shows a significant relationship between online learning \r\nactivities and opportunities with coefficient 0.87 and students’ class performance with coefficient \r\n2.05 which is strong – has positive relationship to students’ level of satisfaction where p-value \r\n5% > 0. The study results 46.69% of respondents are satisfied with their self-efficacy, class \r\ninteraction, internet access, class performance, grades and results, and motivated in continuing \r\nstudy. Respectively, gender has positive coefficient of 0.80 and p-value of 0.001; online learning \r\nactivities and opportunities coefficient of 0.49, p-value 0.016; common ways and strategies \r\ncoefficient 0.73, p-value 0.002; and students’ level of satisfaction coefficient 1.85 which is \r\nstrong has positive relationship and significant to students’ academic performance with p-value \r\nof 0. The researchers would like to recommend continuation and implementation of online \r\nlearning during fortuitous events.','Online Class, Academic Performance, Logistic Models','2023-10-15 16:03:26','2023-10-16 09:18:10',14,2,3,NULL,1),(12,'AUDIENCE PROFILE AND PROGRAM PREFERENCES ON PSU CAMPUS RADIO 103.3',22,'1697476151.pdf','This study is focused on the audience profile and program preferences of PSU campus\r\n radio 103.3. The purpose of this study is to determine the extent of the radio and the number of\r\n people who listens. This is a quantitative research paper and used the purposive sampling method\r\n using snowball technique utilizing survey questionnaire. The researchers visited the ten (10)\r\n municipalities that comprise Partido however, only five (5) municipalities were reached by the\r\n radio frequency namely; Goa, Lagonoy, Sagñay, San Jose and, Tigaon. The study showed that\r\n listeners of the campus radio mostly tuned in once (28%) and twice a week (30%). In terms of\r\n the reason for listening, 74% answered for learning new information, 64% for the music it plays\r\n and 60% for entertainment. The respondents’ preferred program for Monday was the Partido\r\n State University doctor’s corner that has 3.32 mean (medium priority) while the remaining days\r\n was music automation. The result of the study showed that the campus radio was not that known\r\n in side Partido and it does not have concrete program so the listeners suggested to add radio\r\n dramas, 80’s and 90’s music and news.','Audience Profile, Program Preference, PSU Campus Radio 103.3, Frequency, Radio  Transmitter,Listener','2023-10-16 09:09:11','2023-10-16 09:15:18',10,1,3,NULL,1),(13,'Assessing the Effect of Financial Aid in\r\nStudent’s Academic Performance: The Case of\r\nPartido State University - Goa Campus',24,'1697758838.pdf','The aim of the study is to assess the effect of financial aid to the academic performance of stu\r\ndents in Partido State University- Goa Campus using Propensity Score Matching (PSM). Logistic\r\n regression was used to estimate the propensity score for each observation. After the propensity\r\n score estimation, this study used full matching technique as a method to match the with finan\r\ncial aid (treated) and without financial aid (control) groups. The most common perceptions of\r\n respondents coming from low income class regarding scholarship are scholarship gives them the\r\n opportunity to reach and complete education, support them in need, and scholarship makes col\r\nlege education accessible and affordable. Moreover, majority of the students agree that scholarship\r\n develops the ability of dedication to study and scholarship promotes consistency of study in stu\r\ndents. The results of the PSM revealed that the average treatment effect on the treated (ATT)\r\n obtained 0.0012 which indicates that financial aid positively affects the academic performance of\r\n the students. However, the obtained P-value= 0.977 > 0.05 suggests that the financial aid is not\r\n statistically significant to obtain robust academic performance to students. Results of the study\r\n discovered that financial aid has a positive effect to students with financial aid or scholarship but\r\n not significant, and not statistically robust effect on academic performance of the students.','Financial Aid, Academic Performance, Logistic Regression, Propensity Score Match- ing, Full Matching Method, Average Treatment Effect on the Treated','2023-10-19 15:40:39','2023-10-19 22:14:06',13,1,4,NULL,1),(14,'UNDERSTANDING BIKOL RIDDLES FROM THE PARTIDOANOS',25,'1698347001.pdf','This study collected and analyzed Partido Riddles, determine the Communicative\r\nSignificance in the Culture Lived by Partidoanos, and explore Communicated Culture. To\r\nimplement a textual analysis methodology. The researcher will conduct Key Informant\r\nInterviews with a random sample of ten (10) respondents, including children, youth, and\r\nadults. Some parts of Barangay Soledad San Jose, Camarines Sur, were the participants to\r\nimplement the methodology. This study used Cultural Theory, Cultural Identity Theory,\r\nSemiotic, and Semiology Theory to support its claims. The main goal of this study on\r\nBikol riddles was to identify the communicative significance in the culture lived by\r\nPartidoanos and explore the communicated culture. Riddles that have no communicative\r\nsignificance in the culture lived by Partidoanos were not included in this study. An\r\nexamination of the Bikol riddles\' communication value to the Partidoanos\' culture may be\r\nfound in this sociocultural study.\r\nAdditionally, the primary tool for this study will be textual analysis methodology. It\r\nis a method for discovering how people perceive and express their daily lives by\r\ndecoding the words, symbols, and images present in texts. The goal of the research,\r\nrelated literature, and studies is to reinforce society\'s ingrained culture while highlighting\r\nthe significance of the riddle text. They capture the information, wisdom, and values that\r\nare ingrained in a society\'s environment and culture.\r\nHowever, this study not only concentrate on gathering Bikol riddles, it also\r\nexamined the communicated culture and identify its communicative significance in the\r\nculture lived by Partidoanos.','Cultural communication, Cultural Significance, Bikol Riddle, Bicolano','2023-10-26 11:03:21','2023-11-02 13:00:30',10,1,4,NULL,1),(15,'EXPLORING WORKING STUDENTS’ EXPERIENCES IN BLENDED LEARNING THROUGH PHOTOVOICE',27,'1698980136.pdf','This qualitative research study explored the life experiences, challenges, and\r\nopportunities encountered by five working students in dealing with blended learning. The\r\nphotovoice method was used to give voices to the participants in interpreting their\r\ncaptured photos that symbolize their experiences. There are a total of five (5) photos that\r\nhad been interpreted by each respective informant presented in the figures. The data has\r\nbeen interpreted through face-to-face interviews following the semi-structured questions\r\nwith the informants. The questions were a combination of structured mnemonics by\r\nWang & Burris, 1997 and follow-up questions from the interviewers. The data has been\r\nanalyzed by each theme using a coding method. Seven (7) recurring themes were\r\ndeveloped to identify the challenges and opportunities encountered by the informants.\r\nThese are the financial problem, conflict time management, health risks, and\r\nopportunities to earn money, opportunities to gain experiences, opportunities for self-\r\nimprovement, and opportunities to maximize time. In addition to that, most of the\r\ninformation had similar reasons in terms of their challenges and opportunities. Poverty\r\nwas found as the primary reason why the participants ended up working while studying.\r\nWorking students are considered in this study as a breadwinner in their families.','blended learning, experiences, working students, photovoice, challenges, opportunities','2023-11-02 18:55:36','2023-11-02 18:59:02',10,1,4,NULL,1);
/*!40000 ALTER TABLE `theses` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `theses_has_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theses_has_authors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint(20) unsigned NOT NULL,
  `theses_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `theses_has_authors_author_id_foreign` (`author_id`),
  KEY `theses_has_authors_theses_id_foreign` (`theses_id`),
  CONSTRAINT `theses_has_authors_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `theses_has_authors_theses_id_foreign` FOREIGN KEY (`theses_id`) REFERENCES `theses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `theses_has_authors` WRITE;
/*!40000 ALTER TABLE `theses_has_authors` DISABLE KEYS */;
INSERT INTO `theses_has_authors` VALUES (10,7,5,'2023-10-12 06:39:48','2023-10-12 06:39:48'),(11,8,5,'2023-10-12 06:39:48','2023-10-12 06:39:48'),(12,9,5,'2023-10-12 06:39:48','2023-10-12 06:39:48'),(13,10,6,'2023-10-12 06:57:05','2023-10-12 06:57:05'),(14,11,6,'2023-10-12 06:57:05','2023-10-12 06:57:05'),(17,12,8,'2023-10-13 20:40:20','2023-10-13 20:40:20'),(18,13,8,'2023-10-13 20:40:20','2023-10-13 20:40:20'),(19,1,9,'2023-10-14 21:13:52','2023-10-14 21:13:52'),(20,2,9,'2023-10-14 21:13:52','2023-10-14 21:13:52'),(21,14,10,'2023-10-14 21:26:41','2023-10-14 21:26:41'),(22,15,10,'2023-10-14 21:26:41','2023-10-14 21:26:41'),(23,16,10,'2023-10-14 21:26:41','2023-10-14 21:26:41'),(24,17,10,'2023-10-14 21:26:41','2023-10-14 21:26:41'),(25,18,11,'2023-10-15 16:03:26','2023-10-15 16:03:26'),(26,19,11,'2023-10-15 16:03:26','2023-10-15 16:03:26'),(27,20,12,'2023-10-16 09:09:11','2023-10-16 09:09:11'),(28,21,12,'2023-10-16 09:09:11','2023-10-16 09:09:11'),(29,22,12,'2023-10-16 09:09:11','2023-10-16 09:09:11'),(30,23,13,'2023-10-19 15:40:39','2023-10-19 15:40:39'),(31,24,13,'2023-10-19 15:40:39','2023-10-19 15:40:39'),(32,25,14,'2023-10-26 11:03:21','2023-10-26 11:03:21'),(33,26,14,'2023-10-26 11:03:21','2023-10-26 11:03:21'),(34,27,14,'2023-10-26 11:03:21','2023-10-26 11:03:21'),(35,28,15,'2023-11-02 18:55:36','2023-11-02 18:55:36'),(36,29,15,'2023-11-02 18:55:36','2023-11-02 18:55:36'),(37,30,15,'2023-11-02 18:55:36','2023-11-02 18:55:36');
/*!40000 ALTER TABLE `theses_has_authors` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` bigint(20) unsigned DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_course_id_foreign` (`course_id`),
  CONSTRAINT `users_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Inistrator','admin@mail.com',NULL,NULL,NULL,'2023-10-01 11:32:48','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-01 11:32:48','2023-10-01 11:32:48'),(16,'Content','Moderator','moderator@mail.com','1',NULL,NULL,'2023-10-03 04:03:16','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','',NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-03 04:03:16','2023-11-18 10:53:24'),(18,'Arts','Sciences','cas@mail.com','1',NULL,NULL,'2023-10-03 09:09:27','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-03 09:09:27','2023-10-03 09:09:27'),(19,'Business','Management','cbm@mail.com','2',NULL,NULL,'2023-10-03 09:09:27','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-03 09:09:27','2023-10-03 09:09:27'),(20,'Edu','Cation','educ@mail.com','4',NULL,NULL,'2023-10-03 09:09:27','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-03 09:09:27','2023-10-03 09:09:27'),(21,'Engineering','Technology','cet@mail.com','3',NULL,NULL,'2023-10-03 09:09:27','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-03 09:09:27','2023-10-03 09:09:27'),(22,'Edzel John','Sinfuego','esinfuego.pbox@parsu.edu.ph','1',1,202211334,NULL,'$2y$10$fFvZKrJd4BrAC1jMSUNTneW5ji4VkblmrRo0XIxd0CP0p8QFxujsa','',NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-15 15:50:47','2023-11-24 10:50:16'),(23,'For','Delete','fordelete@gmail.com','1',11,2022445,NULL,'$2y$10$Nqx2muiJal6P6RuROUx.7.G1CskXiFTcSabgCor/opCk6dfGXxXfm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-19 12:31:30','2023-10-19 12:31:30'),(24,'Gina','Claveria','gclaveria.pbox@parsu.edu.com','1',1,20226554,NULL,'$2y$10$EJYIqyJDn3Zc.10FH.Trx.VsN2EFO.cbchytbnOfWbFk7kNi2gsGO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-19 15:23:11','2023-10-19 15:23:11'),(25,'Christian Dominic','Pante','cdpante.pbox@parsu.edu.ph','1',1,201922334,NULL,'$2y$10$uxaEdbbGN4OeOIUUKwFpAec3FEoCNSj2YNQ18jnLPfxfZwf0swVRO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-26 10:58:29','2023-10-26 10:58:29'),(26,'Jomer','Biñas','jbinas.pbox@parsu.edu.com','1',1,20192245,NULL,'$2y$10$HRHlRKbmRHaQodbcAxsgou3MHq/C1U9zLFCwx5Q2K9L8f/h93hANO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-11-02 13:04:22','2023-11-02 13:04:22'),(27,'Salvador','Briones','briones@mail.com','1',1,2004114,NULL,'$2y$10$A2YZB6cZs3qJXx/S3BpyIuxcW75sPsRvkDzUNHPmS.Yr6S4ZJ85.e',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-11-02 18:49:56','2023-11-02 18:49:56'),(28,'Trial2','Error','trial2@mail.com','2',1,NULL,NULL,'$2y$10$4GxHttuTrhHIMLDhKDOcGu0v0VBLXmyvInqXc1RbpP5dMcBx7W35m',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-11-17 18:30:22','2023-11-17 18:30:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `viewed_theses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `viewed_theses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `theses_id` bigint(20) unsigned NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `viewed_theses_user_id_foreign` (`user_id`),
  KEY `viewed_theses_theses_id_foreign` (`theses_id`),
  CONSTRAINT `viewed_theses_theses_id_foreign` FOREIGN KEY (`theses_id`) REFERENCES `theses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `viewed_theses` WRITE;
/*!40000 ALTER TABLE `viewed_theses` DISABLE KEYS */;
INSERT INTO `viewed_theses` VALUES (13,1,5,'TdwFw9M69TJzIXDiSd7Xlv68Pyievm8Z2WLyECQy','2023-10-12 06:39:49','2023-10-12 06:39:49'),(14,18,5,'dDAcTk7yjT9YGkhIugKT1OdtDQQFvpJZparY62kM','2023-10-12 06:48:38','2023-10-12 06:48:38'),(15,1,6,'oWajE29FeEk3qvkuBmhKw08EQIFtyqwLjDsPVata','2023-10-12 06:57:05','2023-10-12 06:57:05'),(16,20,5,'GxxSpRX7Zh9UWiSItIlXGml4rFOBY77jhzifAJfo','2023-10-12 07:22:48','2023-10-12 07:22:48'),(17,20,5,'Zslr6EySPoSv2xo7RuaEHVOGheySUtdErSSXh13r','2023-10-12 08:36:34','2023-10-12 08:36:34'),(18,NULL,6,'BQe9YHsZOn2ko3zW6wlFATyLdTARf0Sh2oOwTWRr','2023-10-12 12:20:53','2023-10-12 12:20:53'),(20,NULL,6,'kIhlobAeCDRUPttxaqxTMVv1EQITfEnnJwAhEjJO','2023-10-13 17:50:45','2023-10-13 17:50:45'),(21,NULL,5,'kIhlobAeCDRUPttxaqxTMVv1EQITfEnnJwAhEjJO','2023-10-13 20:07:14','2023-10-13 20:07:14'),(23,20,5,'cePkQZsu16e4145XYAVGp4bSJGsOSzYK0pF6CzRx','2023-10-13 20:33:14','2023-10-13 20:33:14'),(24,20,6,'cePkQZsu16e4145XYAVGp4bSJGsOSzYK0pF6CzRx','2023-10-13 20:33:27','2023-10-13 20:33:27'),(26,19,8,'DfeD8FZQKvECXzBO53BslTEBdw3a5LCv8KxojMrB','2023-10-13 20:40:20','2023-10-13 20:40:20'),(27,19,5,'DfeD8FZQKvECXzBO53BslTEBdw3a5LCv8KxojMrB','2023-10-13 21:17:38','2023-10-13 21:17:38'),(28,19,6,'DfeD8FZQKvECXzBO53BslTEBdw3a5LCv8KxojMrB','2023-10-13 21:19:30','2023-10-13 21:19:30'),(30,1,9,'XFAnmRD7w6GrwD3I6oOVy8JaMwfRnA3QdbsktBG9','2023-10-14 21:13:52','2023-10-14 21:13:52'),(31,1,10,'XFAnmRD7w6GrwD3I6oOVy8JaMwfRnA3QdbsktBG9','2023-10-14 21:26:41','2023-10-14 21:26:41'),(32,22,9,'WUrBZxYv7dNGiuvtjGZQW779tXGDMsVeUbc5vM3U','2023-10-15 15:51:09','2023-10-15 15:51:09'),(33,22,5,'WUrBZxYv7dNGiuvtjGZQW779tXGDMsVeUbc5vM3U','2023-10-15 15:51:36','2023-10-15 15:51:36'),(34,22,6,'WUrBZxYv7dNGiuvtjGZQW779tXGDMsVeUbc5vM3U','2023-10-15 15:53:40','2023-10-15 15:53:40'),(35,22,8,'WUrBZxYv7dNGiuvtjGZQW779tXGDMsVeUbc5vM3U','2023-10-15 15:55:45','2023-10-15 15:55:45'),(36,22,11,'rbWc9avKSTNrJWfyk70xcSPo0h1V0IWSduZ6LdBv','2023-10-15 16:03:26','2023-10-15 16:03:26'),(37,19,11,'1YrTk9lfXNIKGgmFapUWt3RrHO8KuMuRKNI7QFua','2023-10-15 16:11:25','2023-10-15 16:11:25'),(38,NULL,9,'hcjDIa4diDadN8OksZn0ICILS2Sa9WCsRd4FRxi6','2023-10-15 17:31:07','2023-10-15 17:31:07'),(39,19,11,'kLfY2j2TAWFawpOIaB9gLUQDnBCNaIzUDNgKSrpG','2023-10-15 17:31:21','2023-10-15 17:31:21'),(40,19,11,'1qA1iyC4ZZzCByF0aekBv5AnB2X5d3LS9xEycxcl','2023-10-15 22:48:08','2023-10-15 22:48:08'),(41,NULL,9,'wjMEaAdO20jwCdW4iLWS5YkbYC0rrsRUV6IstY0D','2023-10-16 03:34:58','2023-10-16 03:34:58'),(42,NULL,5,'wjMEaAdO20jwCdW4iLWS5YkbYC0rrsRUV6IstY0D','2023-10-16 03:36:45','2023-10-16 03:36:45'),(43,19,11,'0ob61wgchR2wInnliXKsqzWha0shlMFrEyViFMaK','2023-10-16 03:40:42','2023-10-16 03:40:42'),(44,22,9,'QfElBFLa7LLg4lhwQiPBOWSGN4L1gAxlXFPWzz9H','2023-10-16 06:19:06','2023-10-16 06:19:06'),(45,22,5,'QfElBFLa7LLg4lhwQiPBOWSGN4L1gAxlXFPWzz9H','2023-10-16 06:43:29','2023-10-16 06:43:29'),(46,22,6,'QfElBFLa7LLg4lhwQiPBOWSGN4L1gAxlXFPWzz9H','2023-10-16 06:44:21','2023-10-16 06:44:21'),(47,22,8,'QfElBFLa7LLg4lhwQiPBOWSGN4L1gAxlXFPWzz9H','2023-10-16 07:50:38','2023-10-16 07:50:38'),(48,22,12,'QfElBFLa7LLg4lhwQiPBOWSGN4L1gAxlXFPWzz9H','2023-10-16 09:09:12','2023-10-16 09:09:12'),(49,NULL,12,'YD6gqtlLJclETkibe598FRGV8VRMLhoaEqJWee9C','2023-10-16 09:10:16','2023-10-16 09:10:16'),(50,18,12,'Uqjcz2Uudnozh4sXWQIDfzhs4TUDJ6ZkD6lilU81','2023-10-16 09:12:36','2023-10-16 09:12:36'),(51,18,10,'Uqjcz2Uudnozh4sXWQIDfzhs4TUDJ6ZkD6lilU81','2023-10-16 09:15:37','2023-10-16 09:15:37'),(52,NULL,12,'CaBzbRIhSyFFwhMTc3M49J4egJA7zfTdEl60BH1x','2023-10-16 20:43:17','2023-10-16 20:43:17'),(53,NULL,11,'CaBzbRIhSyFFwhMTc3M49J4egJA7zfTdEl60BH1x','2023-10-16 20:43:29','2023-10-16 20:43:29'),(54,NULL,10,'XdU5FxOkse5ePEsSkjtcK1R0t9usH32Y2J0gtGzs','2023-10-17 05:59:40','2023-10-17 05:59:40'),(55,NULL,12,'XdU5FxOkse5ePEsSkjtcK1R0t9usH32Y2J0gtGzs','2023-10-17 06:00:21','2023-10-17 06:00:21'),(56,NULL,6,'XdU5FxOkse5ePEsSkjtcK1R0t9usH32Y2J0gtGzs','2023-10-17 06:10:44','2023-10-17 06:10:44'),(57,NULL,9,'XdU5FxOkse5ePEsSkjtcK1R0t9usH32Y2J0gtGzs','2023-10-17 06:15:30','2023-10-17 06:15:30'),(58,NULL,8,'XdU5FxOkse5ePEsSkjtcK1R0t9usH32Y2J0gtGzs','2023-10-17 06:41:55','2023-10-17 06:41:55'),(59,22,12,'MFlwmlKSTuLMdffZjaoTJRd3MBrYW3tDZy3xihIb','2023-10-17 06:42:07','2023-10-17 06:42:07'),(60,22,11,'MFlwmlKSTuLMdffZjaoTJRd3MBrYW3tDZy3xihIb','2023-10-17 06:42:38','2023-10-17 06:42:38'),(61,22,5,'MFlwmlKSTuLMdffZjaoTJRd3MBrYW3tDZy3xihIb','2023-10-17 06:42:56','2023-10-17 06:42:56'),(62,NULL,5,'quhoXveTPFAZPLPqF4MVWvtnnnoJANzI05UFGC19','2023-10-17 09:10:07','2023-10-17 09:10:07'),(63,NULL,5,'EejSxFXpdpNp7QK5QqZVacUfmoDqAnyRnjgrjS9l','2023-10-17 15:19:07','2023-10-17 15:19:07'),(64,NULL,11,'EejSxFXpdpNp7QK5QqZVacUfmoDqAnyRnjgrjS9l','2023-10-17 15:19:32','2023-10-17 15:19:32'),(65,NULL,6,'EejSxFXpdpNp7QK5QqZVacUfmoDqAnyRnjgrjS9l','2023-10-17 15:20:39','2023-10-17 15:20:39'),(66,NULL,8,'EejSxFXpdpNp7QK5QqZVacUfmoDqAnyRnjgrjS9l','2023-10-17 15:20:42','2023-10-17 15:20:42'),(67,22,5,'zug1nXnuNJE2ViYY0z3SCpbFix1WIk8YXH4DdKE5','2023-10-17 18:06:37','2023-10-17 18:06:37'),(68,NULL,6,'6a8jhJN4b3KE0XRw8QiO2KiwBRPGzw2VJzP4F3l4','2023-10-17 18:09:29','2023-10-17 18:09:29'),(69,NULL,5,'6a8jhJN4b3KE0XRw8QiO2KiwBRPGzw2VJzP4F3l4','2023-10-17 18:13:00','2023-10-17 18:13:00'),(70,22,5,'zZVg76NhTsL5U2NlYjXRzIyIMDylJXhYygv7aTYP','2023-10-17 18:13:52','2023-10-17 18:13:52'),(71,NULL,6,'VCO4s7wkS1XNEVTLw9rrwAvBCCtjFP6r1Zj97DPa','2023-10-17 18:19:58','2023-10-17 18:19:58'),(72,22,6,'L7dYANDXaoo2HLTCQEI8hW1GuhtL3mj80fL49Mbx','2023-10-17 18:20:31','2023-10-17 18:20:31'),(73,NULL,5,'BRKB54twKAjPdqrtv6yp1NCGACuJdne04Tn0oQqJ','2023-10-17 18:23:35','2023-10-17 18:23:35'),(74,NULL,6,'c87lHOXs55cAHhiqZsfBl4H8WtubCXZ2H7f0L8pw','2023-10-17 18:34:22','2023-10-17 18:34:22'),(75,NULL,5,'c87lHOXs55cAHhiqZsfBl4H8WtubCXZ2H7f0L8pw','2023-10-17 18:49:58','2023-10-17 18:49:58'),(76,22,6,'OR3ou5WjAibbqbAOYlA9N6Hx3WcMRQOYMMrJmEAT','2023-10-17 18:50:35','2023-10-17 18:50:35'),(77,NULL,10,'i86Vcin8Ea6Mt8s48pTXd4av2CzO5IyFOHyR9c9N','2023-10-19 05:30:37','2023-10-19 05:30:37'),(78,1,6,'AkvClBMi09cwkQKeNlODRm5CTMXVbR1IFCZB0ka5','2023-10-19 06:20:33','2023-10-19 06:20:33'),(79,1,12,'97aKYlvoIc6Pr9kbSiH4MaNs3TcdWLm2322aUovO','2023-10-19 08:11:46','2023-10-19 08:11:46'),(80,23,6,'wouNpzWsWOa9p6okWKSdMLRQHygi0aMMccoO9myx','2023-10-19 12:31:53','2023-10-19 12:31:53'),(81,23,5,'2sm3Idlgfk2JUgG1dfRsYE6d2JfTHVANyoYhaUvm','2023-10-19 12:48:03','2023-10-19 12:48:03'),(82,23,6,'2sm3Idlgfk2JUgG1dfRsYE6d2JfTHVANyoYhaUvm','2023-10-19 12:48:18','2023-10-19 12:48:18'),(83,23,10,'2sm3Idlgfk2JUgG1dfRsYE6d2JfTHVANyoYhaUvm','2023-10-19 12:55:29','2023-10-19 12:55:29'),(84,23,11,'2sm3Idlgfk2JUgG1dfRsYE6d2JfTHVANyoYhaUvm','2023-10-19 13:03:25','2023-10-19 13:03:25'),(85,24,13,'KpCbojWmPCx79RiJl6YsiPQUrL5AC3k44NSIViEn','2023-10-19 15:40:40','2023-10-19 15:40:40'),(86,24,12,'KpCbojWmPCx79RiJl6YsiPQUrL5AC3k44NSIViEn','2023-10-19 15:42:57','2023-10-19 15:42:57'),(87,1,5,'RbbjEATSWdKqLwreaqP7GJKapGGnBdLvYSZMeKaN','2023-10-19 21:37:28','2023-10-19 21:37:28'),(88,1,12,'RbbjEATSWdKqLwreaqP7GJKapGGnBdLvYSZMeKaN','2023-10-19 21:39:06','2023-10-19 21:39:06'),(89,18,13,'LocvAkyMesT5y2JaB9SgPknNvDbHKg3ydR6atIDQ','2023-10-19 22:11:18','2023-10-19 22:11:18'),(90,18,6,'LocvAkyMesT5y2JaB9SgPknNvDbHKg3ydR6atIDQ','2023-10-19 22:38:23','2023-10-19 22:38:23'),(91,NULL,6,'zxtZcur0zCzal2qvDmmvhW0D37kkpYxX8PgwIsq3','2023-10-19 22:38:44','2023-10-19 22:38:44'),(92,NULL,5,'H4x7SWyPSb0ypQJxsBPIdiXaJD1U8d0pR8eqoxot','2023-10-21 17:28:51','2023-10-21 17:28:51'),(93,NULL,11,'lAbo7c1hkFLn8vFUXyQD0aSxlyHoObKJQVBhZaVm','2023-10-26 10:42:03','2023-10-26 10:42:03'),(94,25,14,'n6POddRxfeGhbIdmjjaSqF1skZuBJMrFzXOD3AD3','2023-10-26 11:03:22','2023-10-26 11:03:22'),(95,18,14,'E1GsuMSemYe7SDf3aShGC33cttLxN2coWTGr2lMM','2023-10-26 11:04:46','2023-10-26 11:04:46'),(96,NULL,6,'yVupwTOaKyMyadcRcab6GrH5EbCtMrL1NAO60pgX','2023-10-26 11:27:36','2023-10-26 11:27:36'),(97,NULL,6,'VsMEpj7eQ5rPwsU6Dy5OQTNOamVAEwes2H6sXM69','2023-10-26 12:15:42','2023-10-26 12:15:42'),(98,NULL,5,'b1VeKYg1J2RbeAknN7HbNwxjWHpI3fdqg3LuBUtm','2023-11-02 12:56:19','2023-11-02 12:56:19'),(99,NULL,6,'b1VeKYg1J2RbeAknN7HbNwxjWHpI3fdqg3LuBUtm','2023-11-02 12:56:26','2023-11-02 12:56:26'),(100,NULL,13,'b1VeKYg1J2RbeAknN7HbNwxjWHpI3fdqg3LuBUtm','2023-11-02 12:56:33','2023-11-02 12:56:33'),(101,18,14,'xMAj8hsTI4EUXKGvYrDfpdybdQZY2y94cjvyPtrW','2023-11-02 13:01:18','2023-11-02 13:01:18'),(102,18,12,'xMAj8hsTI4EUXKGvYrDfpdybdQZY2y94cjvyPtrW','2023-11-02 13:01:57','2023-11-02 13:01:57'),(103,NULL,6,'YW210E6TvTaN54PE6USbLimi4s3tnlXhG3uI4SDT','2023-11-02 18:42:44','2023-11-02 18:42:44'),(104,27,6,'hIgnkoBVPCVvitEPBXfn8qgnaZwIcooH0Wx2qpXT','2023-11-02 18:59:39','2023-11-02 18:59:39'),(105,NULL,6,'yg02t1Lal6iPlPfpfqzZ2ZuL43V0wWqHoVZF7C3b','2023-11-04 19:12:10','2023-11-04 19:12:10'),(106,18,15,'WYGOM9qjXm3ilwGmECtbCmb5yBE9WA9tDCaI0IXp','2023-11-06 00:02:44','2023-11-06 00:02:44'),(107,18,5,'WYGOM9qjXm3ilwGmECtbCmb5yBE9WA9tDCaI0IXp','2023-11-06 00:44:14','2023-11-06 00:44:14'),(108,18,13,'WYGOM9qjXm3ilwGmECtbCmb5yBE9WA9tDCaI0IXp','2023-11-06 00:50:15','2023-11-06 00:50:15'),(109,18,8,'WYGOM9qjXm3ilwGmECtbCmb5yBE9WA9tDCaI0IXp','2023-11-06 02:26:20','2023-11-06 02:26:20'),(110,18,12,'WYGOM9qjXm3ilwGmECtbCmb5yBE9WA9tDCaI0IXp','2023-11-06 02:52:26','2023-11-06 02:52:26'),(111,NULL,14,'hJbsUEtP1xUlpHcSb4albhrX7Y1oyaktwenSZtTj','2023-11-06 05:30:11','2023-11-06 05:30:11'),(112,NULL,5,'hJbsUEtP1xUlpHcSb4albhrX7Y1oyaktwenSZtTj','2023-11-06 05:31:57','2023-11-06 05:31:57'),(113,NULL,12,'hJbsUEtP1xUlpHcSb4albhrX7Y1oyaktwenSZtTj','2023-11-06 05:39:19','2023-11-06 05:39:19'),(114,NULL,15,'hJbsUEtP1xUlpHcSb4albhrX7Y1oyaktwenSZtTj','2023-11-06 09:06:05','2023-11-06 09:06:05'),(115,NULL,5,'Uyyk8iVkwiGkrDHwWPYjYa4KAouAkML8gwjQSbRO','2023-11-17 05:54:51','2023-11-17 05:54:51'),(116,NULL,15,'zbAJFiCUYlZVLAVpEGcOMEtfHpmWWAKm9s3fF9gV','2023-11-17 18:34:24','2023-11-17 18:34:24'),(117,NULL,5,'2WzLpyFqdqrSFG5cpPM4nQGXu6X18kPRyWYh3J7q','2023-11-18 06:41:33','2023-11-18 06:41:33'),(118,NULL,15,'2WzLpyFqdqrSFG5cpPM4nQGXu6X18kPRyWYh3J7q','2023-11-18 06:41:43','2023-11-18 06:41:43'),(119,18,5,'MIpXXEdjS9aEjmmyErlre9K03lrrBPhsysTjMGNq','2023-11-18 08:47:43','2023-11-18 08:47:43'),(120,18,9,'z1oGPvHMOzlAdP522bCedZ7TbQ6he5p3Sco3Emhs','2023-11-18 21:57:09','2023-11-18 21:57:09'),(121,NULL,13,'UbstlZ9MHMQnFALtO9ZV6i4nvoPyS8hunOWeV4mu','2023-11-19 03:24:44','2023-11-19 03:24:44'),(122,NULL,15,'UbstlZ9MHMQnFALtO9ZV6i4nvoPyS8hunOWeV4mu','2023-11-19 07:03:35','2023-11-19 07:03:35'),(123,NULL,8,'UbstlZ9MHMQnFALtO9ZV6i4nvoPyS8hunOWeV4mu','2023-11-19 08:30:46','2023-11-19 08:30:46'),(124,18,6,'LWfe7eMKapsgkgcyFEWFYTbtEbpUBZqgRpIE99Wb','2023-11-19 09:43:17','2023-11-19 09:43:17'),(125,NULL,8,'AZbyho1BtTgNVW58CeZNKT0QGb0H6Ej4uF4iihuF','2023-11-20 16:46:23','2023-11-20 16:46:23'),(126,NULL,12,'AZbyho1BtTgNVW58CeZNKT0QGb0H6Ej4uF4iihuF','2023-11-20 17:20:33','2023-11-20 17:20:33'),(127,NULL,13,'AZbyho1BtTgNVW58CeZNKT0QGb0H6Ej4uF4iihuF','2023-11-20 17:56:31','2023-11-20 17:56:31'),(128,NULL,5,'lV3aw9JhrRsrNmz9GgdcKilzmh9VpQLku6gv6OV0','2023-11-20 21:43:42','2023-11-20 21:43:42'),(129,NULL,13,'lV3aw9JhrRsrNmz9GgdcKilzmh9VpQLku6gv6OV0','2023-11-20 22:26:00','2023-11-20 22:26:00'),(130,NULL,8,'lV3aw9JhrRsrNmz9GgdcKilzmh9VpQLku6gv6OV0','2023-11-20 23:15:40','2023-11-20 23:15:40'),(131,NULL,5,'0ZITFsnzHRDIseMfE8kuGiVy3Y3N76AZLKfznSiX','2023-11-21 04:00:55','2023-11-21 04:00:55'),(132,NULL,10,'dXMk9DcagL66gJ9LVlcMH9jP3WgkIXTkdNseBg4z','2023-11-21 19:30:33','2023-11-21 19:30:33'),(133,NULL,11,'dXMk9DcagL66gJ9LVlcMH9jP3WgkIXTkdNseBg4z','2023-11-21 22:45:08','2023-11-21 22:45:08'),(134,NULL,5,'E46qljTztB5joj7ijLK3hqc6rdK8vw5puPrJ2MP4','2023-11-23 11:31:36','2023-11-23 11:31:36'),(135,NULL,15,'5LwK2NfB1Fc8waddmb8CgG94zfuv7nKjXUiX0MJR','2023-11-24 05:48:09','2023-11-24 05:48:09'),(136,NULL,6,'5LwK2NfB1Fc8waddmb8CgG94zfuv7nKjXUiX0MJR','2023-11-24 09:28:16','2023-11-24 09:28:16');
/*!40000 ALTER TABLE `viewed_theses` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `years`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `years` (
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `years` WRITE;
/*!40000 ALTER TABLE `years` DISABLE KEYS */;
INSERT INTO `years` VALUES ('2020',1,'2023-10-01 21:07:33','2023-10-01 21:07:33'),('2021',2,'2023-10-01 21:07:33','2023-10-01 21:07:33'),('2022',3,'2023-10-01 21:07:33','2023-10-01 21:07:33'),('2023',4,'2023-10-01 21:07:33','2023-10-01 21:07:33');
/*!40000 ALTER TABLE `years` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

