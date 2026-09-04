-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table senverse.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.cache: ~2 rows (approximately)
DELETE FROM `cache`;
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-settings.all', 'a:26:{s:9:"site_name";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:8:"Senverse";s:2:"en";s:8:"Senverse";}}s:11:"site_slogan";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:52:"Giải pháp vận hành toàn diện cho Nail Salon";s:2:"en";s:28:"Everything Your Salon Needs.";}}s:12:"company_name";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:12:"Senverse LLC";s:2:"en";s:12:"Senverse LLC";}}s:4:"logo";a:2:{s:4:"type";s:5:"image";s:12:"translations";a:2:{s:2:"vi";s:2:"18";s:2:"en";N;}}s:7:"favicon";a:2:{s:4:"type";s:5:"image";s:12:"translations";a:2:{s:2:"vi";s:2:"19";s:2:"en";N;}}s:5:"phone";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:14:"(352) 426-2498";s:2:"en";s:14:"(352) 426-2498";}}s:5:"email";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:16:"info@senverse.us";s:2:"en";N;}}s:7:"address";a:2:{s:4:"type";s:8:"textarea";s:12:"translations";a:2:{s:2:"vi";s:55:"5141 NW 43rd Street, #102 , Gainesville, Florida, 32606";s:2:"en";N;}}s:9:"copyright";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:37:"© Senverse LLC. All rights reserved.";s:2:"en";s:37:"© Senverse LLC. All rights reserved.";}}s:15:"home_meta_title";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:15:"Senverse POS VU";s:2:"en";s:12:"Senverse POS";}}s:21:"home_meta_description";a:2:{s:4:"type";s:8:"textarea";s:12:"translations";a:2:{s:2:"vi";s:65:"Giải pháp POS, thanh toán và marketing dành cho Nail Salon.";s:2:"en";s:53:"POS, payment and marketing solutions for nail salons.";}}s:18:"home_meta_keywords";a:2:{s:4:"type";s:8:"textarea";s:12:"translations";a:2:{s:2:"vi";s:45:"POS, Nail Salon, Marketing, Merchant Services";s:2:"en";s:45:"POS, Nail Salon, Marketing, Merchant Services";}}s:16:"default_og_image";a:2:{s:4:"type";s:5:"image";s:12:"translations";a:2:{s:2:"vi";N;s:2:"en";N;}}s:14:"robots_default";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:12:"index,follow";s:2:"en";s:12:"index,follow";}}s:12:"facebook_url";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:12:"/senverse.us";s:2:"en";N;}}s:13:"instagram_url";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:12:"/senverse.us";s:2:"en";N;}}s:12:"linkedin_url";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:12:"/senverse.us";s:2:"en";N;}}s:11:"youtube_url";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:12:"/senverse.us";s:2:"en";N;}}s:10:"tiktok_url";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:12:"/senverse.us";s:2:"en";N;}}s:13:"schema_enable";a:2:{s:4:"type";s:7:"boolean";s:12:"translations";a:2:{s:2:"vi";s:1:"1";s:2:"en";s:1:"1";}}s:11:"schema_type";a:2:{s:4:"type";s:4:"text";s:12:"translations";a:2:{s:2:"vi";s:12:"Organization";s:2:"en";s:12:"Organization";}}s:16:"google_analytics";a:2:{s:4:"type";s:8:"textarea";s:12:"translations";a:2:{s:2:"vi";s:11:"GTM-XXXXXXX";s:2:"en";s:11:"GTM-XXXXXXX";}}s:18:"google_tag_manager";a:2:{s:4:"type";s:8:"textarea";s:12:"translations";a:2:{s:2:"vi";s:11:"GTM-XXXXXXX";s:2:"en";s:11:"GTM-XXXXXXX";}}s:10:"meta_pixel";a:2:{s:4:"type";s:8:"textarea";s:12:"translations";a:2:{s:2:"vi";s:11:"GTM-XXXXXXX";s:2:"en";s:11:"GTM-XXXXXXX";}}s:18:"custom_head_script";a:2:{s:4:"type";s:8:"textarea";s:12:"translations";a:2:{s:2:"vi";N;s:2:"en";N;}}s:18:"custom_body_script";a:2:{s:4:"type";s:8:"textarea";s:12:"translations";a:2:{s:2:"vi";N;s:2:"en";N;}}}', 2103005141);

-- Dumping structure for table senverse.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.cache_locks: ~0 rows (approximately)
DELETE FROM `cache_locks`;

-- Dumping structure for table senverse.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_id` bigint unsigned DEFAULT NULL,
  `banner_id` bigint unsigned DEFAULT NULL,
  `og_image_id` bigint unsigned DEFAULT NULL,
  `canonical_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robots` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'index, follow',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_thumbnail_id_foreign` (`thumbnail_id`),
  KEY `categories_banner_id_foreign` (`banner_id`),
  KEY `categories_og_image_id_foreign` (`og_image_id`),
  KEY `categories_parent_id_index` (`parent_id`),
  KEY `categories_type_index` (`type`),
  KEY `categories_is_active_index` (`is_active`),
  KEY `categories_is_featured_index` (`is_featured`),
  KEY `categories_sort_order_index` (`sort_order`),
  CONSTRAINT `categories_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `categories_og_image_id_foreign` FOREIGN KEY (`og_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `categories_thumbnail_id_foreign` FOREIGN KEY (`thumbnail_id`) REFERENCES `media` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.categories: ~12 rows (approximately)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `parent_id`, `type`, `slug`, `thumbnail_id`, `banner_id`, `og_image_id`, `canonical_url`, `robots`, `is_featured`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'post', 'pos-system', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:48:23', '2026-08-18 02:48:23'),
	(2, NULL, 'post', 'merchant-services', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:50:48', '2026-08-18 02:50:48'),
	(3, NULL, 'post', 'growth-services', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:52:24', '2026-08-18 02:52:24'),
	(4, 3, 'post', 'website-design', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:54:35', '2026-08-18 02:54:35'),
	(5, 3, 'post', 'social-media', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:55:35', '2026-08-18 02:55:35'),
	(6, 3, 'post', 'local-boost', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:55:58', '2026-08-18 02:55:58'),
	(7, 3, 'post', 'the-qua-tang', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:56:28', '2026-08-18 02:56:36'),
	(8, 3, 'post', 'al-reception', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:57:01', '2026-08-18 02:57:01'),
	(9, NULL, 'post', 'resource', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:57:35', '2026-08-18 02:57:35'),
	(10, 9, 'post', 'blog', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:57:52', '2026-08-18 02:57:52'),
	(11, 9, 'post', 'faq', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:58:14', '2026-08-18 02:58:14'),
	(12, 9, 'post', 'case-studies', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:58:34', '2026-08-18 02:58:34'),
	(13, 9, 'post', 'huong-dan', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:58:52', '2026-08-18 02:58:52'),
	(14, NULL, 'post', 'about-us', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-18 02:59:20', '2026-08-21 20:37:36'),
	(15, 9, 'post', 'khach-hang', NULL, NULL, NULL, NULL, 'index, follow', 0, 1, 0, '2026-08-19 02:43:47', '2026-08-19 02:44:59');

-- Dumping structure for table senverse.category_translations
CREATE TABLE IF NOT EXISTS `category_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `schema_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  KEY `category_translations_locale_index` (`locale`),
  CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.category_translations: ~25 rows (approximately)
DELETE FROM `category_translations`;
INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `short_description`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `og_title`, `og_description`, `schema_type`, `schema_data`, `created_at`, `updated_at`) VALUES
	(1, 1, 'vi', 'POS System', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:48:23', '2026-08-18 02:48:23'),
	(2, 2, 'vi', 'Merchant Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:50:48', '2026-08-18 02:50:48'),
	(3, 2, 'en', 'Merchant Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:50:48', '2026-08-18 02:50:48'),
	(4, 1, 'en', 'POS System', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:51:04', '2026-08-18 02:51:04'),
	(5, 3, 'vi', 'Growth Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:52:24', '2026-08-18 02:52:24'),
	(6, 3, 'en', 'Growth Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:52:24', '2026-08-18 02:52:24'),
	(7, 4, 'vi', 'Website Design', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:54:35', '2026-08-18 02:54:35'),
	(8, 4, 'en', 'Website Design', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:54:35', '2026-08-18 02:54:35'),
	(9, 5, 'vi', 'Social Media', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:55:35', '2026-08-18 02:55:35'),
	(10, 5, 'en', 'Social Media', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:55:35', '2026-08-18 02:55:35'),
	(11, 6, 'vi', 'Local Boost', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:55:58', '2026-08-18 02:55:58'),
	(12, 6, 'en', 'Local Boost', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:55:58', '2026-08-18 02:55:58'),
	(13, 7, 'vi', 'Thẻ Quà Tặng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:56:28', '2026-08-18 02:56:28'),
	(14, 7, 'en', 'Gift Card', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:56:28', '2026-08-18 02:56:28'),
	(15, 8, 'vi', 'Al Reception', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:57:01', '2026-08-18 02:57:01'),
	(16, 8, 'en', 'Al Reception', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:57:01', '2026-08-18 02:57:01'),
	(17, 9, 'vi', 'Resource', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:57:35', '2026-08-18 02:57:35'),
	(18, 9, 'en', 'Resource', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:57:35', '2026-08-18 02:57:35'),
	(19, 10, 'vi', 'Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:57:52', '2026-08-18 02:57:52'),
	(20, 10, 'en', 'Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:57:52', '2026-08-18 02:57:52'),
	(21, 11, 'vi', 'FAQ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:58:14', '2026-08-18 02:58:14'),
	(22, 11, 'en', 'FAQ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:58:14', '2026-08-18 02:58:14'),
	(23, 12, 'vi', 'Case Studies', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:58:34', '2026-08-18 02:58:34'),
	(24, 12, 'en', 'Case Studies', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:58:34', '2026-08-18 02:58:34'),
	(25, 13, 'vi', 'Hướng Dẫn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:58:52', '2026-08-18 02:58:52'),
	(26, 13, 'en', 'Guides', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:58:52', '2026-08-18 02:58:52'),
	(27, 14, 'vi', 'Về Chúng Tôi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:59:20', '2026-08-18 02:59:20'),
	(28, 14, 'en', 'About Us', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-18 02:59:20', '2026-08-18 02:59:20'),
	(29, 15, 'vi', 'Khách Hàng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-19 02:43:47', '2026-08-19 02:43:47'),
	(30, 15, 'en', 'Testimonials', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CollectionPage', NULL, '2026-08-19 02:43:47', '2026-08-19 02:43:47');

-- Dumping structure for table senverse.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table senverse.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table senverse.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.job_batches: ~0 rows (approximately)
DELETE FROM `job_batches`;

-- Dumping structure for table senverse.locales
CREATE TABLE IF NOT EXISTS `locales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locales_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.locales: ~2 rows (approximately)
DELETE FROM `locales`;
INSERT INTO `locales` (`id`, `code`, `name`, `is_default`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'en', 'English', 1, 1, '2026-08-18 00:35:07', '2026-08-18 00:35:07'),
	(2, 'vi', 'Tiếng Việt', 0, 1, '2026-08-18 00:35:07', '2026-08-18 00:35:07');

-- Dumping structure for table senverse.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` int DEFAULT NULL,
  `width` int DEFAULT NULL,
  `height` int DEFAULT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `uploaded_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_uploaded_by_foreign` (`uploaded_by`),
  CONSTRAINT `media_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.media: ~43 rows (approximately)
DELETE FROM `media`;
INSERT INTO `media` (`id`, `file_name`, `file_path`, `mime_type`, `file_size`, `width`, `height`, `alt_text`, `title`, `caption`, `description`, `uploaded_by`, `created_at`, `updated_at`) VALUES
	(3, 'Logo.png', 'media/6rgUqQ4DLk7rnk2Ax8ZQ7QTn2Ov9zNfmXD91w70K.png', NULL, 6009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-18 19:45:27', '2026-08-18 19:45:27'),
	(4, '01.webp', 'media/Xw0Zu1YoF1M06UcSzF4gCmbgkAMlpZ91PMVXRKVu.webp', NULL, 88014, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-18 20:25:47', '2026-08-18 20:25:47'),
	(5, '06.webp', 'media/DUI9juS4jiVQlkL2zDKHDWH44Rv9aag4zV5tq2N0.webp', NULL, 167424, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-18 20:27:29', '2026-08-18 20:27:29'),
	(6, '08.webp', 'media/FVBgE8VyNlmNHnxwrwkygqsHsiEhDtpeUyVUaENt.webp', NULL, 32028, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-18 21:54:27', '2026-08-18 21:54:27'),
	(7, 'marketing.webp', 'uploads/media/marketing-20260819081209-6a8565594a675.webp', 'image/webp', 52076, 1126, 802, 'marketing', 'marketing', NULL, NULL, 1, '2026-08-19 01:12:09', '2026-08-19 01:12:09'),
	(8, 'mechant.webp', 'uploads/media/mechant-20260819081216-6a8565600123a.webp', 'image/webp', 41034, 1126, 802, 'mechant', 'mechant', NULL, NULL, 1, '2026-08-19 01:12:16', '2026-08-19 01:12:16'),
	(9, 'possystem.webp', 'uploads/media/possystem-20260819081221-6a856565a7db6.webp', 'image/webp', 59940, 1126, 802, 'possystem', 'possystem', NULL, NULL, 1, '2026-08-19 01:12:21', '2026-08-19 01:12:21'),
	(10, '04.webp', 'media/CekjqCOE0W5hzCJSmIo20DjgX74QdoJjc6fuZkAA.webp', NULL, 120638, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 02:28:33', '2026-08-19 02:28:33'),
	(11, '01.webp', 'media/OwAPyblNzIxQ23lZfDQXnZYubhn4IKYYR3VJWMDt.webp', NULL, 4474, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 02:59:24', '2026-08-19 02:59:24'),
	(12, '02.webp', 'media/Yl1m0jnf8YBQnxCrpn80nm5VtRzTXheOSK1UGXUD.webp', NULL, 3366, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 03:00:26', '2026-08-19 03:00:26'),
	(13, '06.webp', 'media/ocSSnB6bGSc50lXRbuI99DppUEKPR56nSPkcUJWJ.webp', NULL, 33648, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 03:01:32', '2026-08-19 03:01:32'),
	(14, '01.webp', 'media/ROVAPSsOyzM7o8qNrnKHdvgQYTIoKXo1SoOox2NO.webp', NULL, 64056, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 03:19:08', '2026-08-19 03:19:08'),
	(15, '02.webp', 'media/N2CEffHJpYLdxG4uQzGubRhfOWG5XI6giEtsOC9m.webp', NULL, 75474, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-20 00:25:35', '2026-08-20 00:25:35'),
	(16, '05.webp', 'media/dsfddxjnDEoWutJ8bfKJ6Cy6xKipDgfVVB7gxDsr.webp', NULL, 43536, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-21 20:35:54', '2026-08-21 20:35:54'),
	(17, '07.webp', 'media/OesHkzKc3coUKLHuFYTvh5QxVJ98r0CZWvLvntZH.webp', NULL, 129054, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-21 20:43:30', '2026-08-21 20:43:30'),
	(18, 'logochu.png', 'media/togshMA7R6Ej8iqmqTdOlOGKFVFSNRJT3zyXxuBi.png', NULL, 54484, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-24 02:15:48', '2026-08-24 02:15:48'),
	(19, 'favicon.png', 'media/7AlrtlFj2lJMCCoM5iIeOTYzRnQID5dmLoVSuZIC.png', NULL, 25735, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-25 00:39:18', '2026-08-25 00:39:18'),
	(26, 'smart-nail-salon.png', 'media/JMODGg2BbmBVFIDCuYixb2QGBizdVtS7z2O252oy.png', NULL, 1469311, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 01:53:44', '2026-08-26 01:53:44'),
	(27, 'marchent-service.png', 'uploads/media/marchent-service-20260826094841-6a8eb679429ce.png', 'image/png', 1582456, 1920, 910, 'marchent service', 'marchent service', NULL, NULL, 1, '2026-08-26 02:48:41', '2026-08-26 02:48:41'),
	(28, 'growth-services.png', 'media/ljgsj4I4TvDmJ4k1L5xM7APjx2tFWy6eBz7lgFkq.png', NULL, 1878710, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 03:02:31', '2026-08-26 03:02:31'),
	(29, 'about.png', 'media/pblx82QgW20oNAZiE3FmeZumHusb6br3f5WvOZwn.png', NULL, 735524, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 03:23:11', '2026-08-26 03:23:11'),
	(30, 'why_senverse.png', 'media/f6oQVsY3sUKbJlLhDRMwETrFM4Jrwl8gi5Nxjqnb.png', NULL, 1739970, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 20:02:35', '2026-08-26 20:02:35'),
	(31, 'serenity-nail-studio.png', 'media/Lbkr1FvxwwfvZrLdhM4PZHTYgoauULtX8DssITvt.png', NULL, 596867, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:26:19', '2026-08-26 21:26:19'),
	(32, 'luxury-nail-bar.png', 'media/wAyfBbm3OYWEGRVZtHmeoifK76XYNFAYnrUElPra.png', NULL, 547672, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:32:43', '2026-08-26 21:32:43'),
	(33, 'blossom-nail-bar.png', 'media/N8TKsBE4OJedjWrtXG9k0VY3wERVMYjyUbGHGV01.png', NULL, 597657, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:39:28', '2026-08-26 21:39:28'),
	(34, 'Elegant-nail.png', 'media/taSWxwVXsFrOpKy7tjjcxG0JKP0nfDy4ZGK37ueZ.png', NULL, 635910, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:42:19', '2026-08-26 21:42:19'),
	(35, 'Venus-nail.png', 'media/3dVMuZZqAzcNQOCKXGWeEqDEKy1GpoBCZWl6HmtG.png', NULL, 600707, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:44:34', '2026-08-26 21:44:34'),
	(36, 'royal-nail.png', 'media/nOf2exy5I0tCvaTmJvR0yB0gSP2mKy1Dgj3nuA1C.png', NULL, 583828, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:51:13', '2026-08-26 21:51:13'),
	(37, 'happy-nail.png', 'media/dCnwqozFlYt2lBLsHdsX02g5pW3y9qfmIypIKOAR.png', NULL, 639244, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:54:27', '2026-08-26 21:54:27'),
	(38, 'Banner-Service.png', 'media/8tWKONtHihV9fzfTufIrcQxrhx9BOFNPiXyNvauh.png', NULL, 570865, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 00:58:37', '2026-08-27 00:58:37'),
	(39, 'for-customer.png', 'media/hsEmDBqEFEPe5hHOXpKdDM3zdeblk3Q7m2NXjxZQ.png', NULL, 1245928, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 01:58:29', '2026-08-27 01:58:29'),
	(40, 'for-owner.png', 'media/dsDjfmH6OjT0aajsa5RHUEkMAvdCtYuq6D0bmBsu.png', NULL, 1168934, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 02:11:02', '2026-08-27 02:11:02'),
	(41, 'for-tech.png', 'media/wzvkNNyZtxozBxvlhj7opMy0Hp257hGptTWme7O9.png', NULL, 1155297, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 02:25:30', '2026-08-27 02:25:30'),
	(42, 'merchant-services.png', 'media/nJKM48EzRoOrBwx2mRumi7fX6lmlwRyjscTcMZd1.png', NULL, 627350, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 03:16:10', '2026-08-27 03:16:10'),
	(43, 'payment-option.png', 'media/6woeL8UmTF1spBGQ9jEe9ZaoLYUdCO1B4wbp3IZi.png', NULL, 1006764, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 18:27:18', '2026-08-27 18:27:18'),
	(44, 'payment-management.png', 'media/QESz31ZnKcJxcaUwt8Kr5bcUpa8OCdpAsPwj1wDv.png', NULL, 1122558, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 20:01:01', '2026-08-27 20:01:01'),
	(45, 'social-media.png', 'media/MDSXD1luYjO4Xa64DtGzRviToSHfVOP8JkCIQP1z.png', NULL, 1522918, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 20:36:32', '2026-08-27 20:36:32'),
	(46, 'why-social-marketing.png', 'media/u4Z2sTt2irwEAqlBZPPmI0pL0KzSywy08Iifksdm.png', NULL, 892563, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 20:56:53', '2026-08-27 20:56:53'),
	(47, 'why-social-media.png', 'media/i9fk1yDIZtdArGJ999i3odOexFfasHZqFEUrk4ry.png', NULL, 902930, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 21:24:15', '2026-08-27 21:24:15'),
	(48, 'Detail-About.png', 'media/b3ApD6eqnIOyvb4Gqbe6OHg3Nm6D4MrT0LFOVuJI.png', NULL, 1351657, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 21:52:13', '2026-08-27 21:52:13'),
	(49, 'our-mission.png', 'media/JQeNdCFr1ZqNUN4UmWUy73yRkYv40RnIqmi3z8Gc.png', NULL, 3780300, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-27 23:21:35', '2026-08-27 23:21:35'),
	(51, 'local-boost.png', 'media/h7BcPsREZ6mSO7oBxLOJDJVxp4OxMHWrwrFlWv9n.png', NULL, 1592231, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-28 02:38:50', '2026-08-28 02:38:50'),
	(52, 'why-local-boost.png', 'media/qBDQhxC4nWJIQhe0ki5eTgP7SrQzUh2laWwfres7.png', NULL, 1114521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-28 02:50:39', '2026-08-28 02:50:39'),
	(53, 'why_local_seo.png', 'media/Rfec3EgznTKKAcMzXsm0O5asmjaBbXAQNkO3DN8g.png', NULL, 834127, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-28 03:10:08', '2026-08-28 03:10:08');

-- Dumping structure for table senverse.mediaables
CREATE TABLE IF NOT EXISTS `mediaables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `media_id` bigint unsigned NOT NULL,
  `mediaable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediaable_id` bigint unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gallery',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mediaables_media_id_foreign` (`media_id`),
  KEY `mediaables_mediaable_type_mediaable_id_index` (`mediaable_type`,`mediaable_id`),
  CONSTRAINT `mediaables_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.mediaables: ~0 rows (approximately)
DELETE FROM `mediaables`;

-- Dumping structure for table senverse.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_04_25_141327_create_media_table', 1),
	(5, '2026_04_25_141438_create_mediaables_table', 1),
	(6, '2026_05_09_165149_create_locales_table', 1),
	(7, '2026_05_19_180152_create_settings_table', 1),
	(8, '2026_05_19_180158_create_setting_translations_table', 1),
	(9, '2026_05_20_142938_create_sliders_table', 1),
	(10, '2026_05_20_143020_create_slider_translations_table', 1),
	(11, '2026_05_20_160053_create_categories_table', 1),
	(12, '2026_05_20_160412_create_category_translations_table', 1),
	(13, '2026_05_20_172127_create_posts_table', 1),
	(14, '2026_05_20_172134_create_post_translations_table', 1),
	(15, '2026_05_21_134558_create_tags_table', 1),
	(16, '2026_05_21_134618_create_tag_translations_table', 1),
	(17, '2026_05_21_134644_create_taggables_table', 1),
	(18, '2026_05_22_160559_create_pages_table', 1),
	(19, '2026_05_22_160656_create_page_translations_table', 1),
	(20, '2026_05_23_164130_create_page_sections_table', 1),
	(21, '2026_05_23_164137_create_page_section_translations_table', 1),
	(22, '2026_05_23_174221_create_products_table', 1),
	(23, '2026_05_23_174230_create_product_translations_table', 1);

-- Dumping structure for table senverse.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_id` bigint unsigned DEFAULT NULL,
  `banner_id` bigint unsigned DEFAULT NULL,
  `og_image_id` bigint unsigned DEFAULT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `canonical_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robots` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_data` json DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`),
  KEY `pages_thumbnail_id_foreign` (`thumbnail_id`),
  KEY `pages_banner_id_foreign` (`banner_id`),
  KEY `pages_og_image_id_foreign` (`og_image_id`),
  CONSTRAINT `pages_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pages_og_image_id_foreign` FOREIGN KEY (`og_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pages_thumbnail_id_foreign` FOREIGN KEY (`thumbnail_id`) REFERENCES `media` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.pages: ~7 rows (approximately)
DELETE FROM `pages`;
INSERT INTO `pages` (`id`, `slug`, `thumbnail_id`, `banner_id`, `og_image_id`, `template`, `canonical_url`, `robots`, `schema_type`, `schema_data`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
	(1, 'home', NULL, NULL, NULL, 'default', NULL, 'index, follow', NULL, NULL, 1, 0, '2026-08-18 21:45:31', '2026-08-18 21:45:31'),
	(2, 'footer', NULL, NULL, NULL, 'default', NULL, 'index, follow', NULL, NULL, 1, 0, '2026-08-19 19:25:23', '2026-08-19 19:25:23'),
	(3, 'pos-system', NULL, NULL, NULL, 'default', NULL, 'index, follow', NULL, NULL, 1, 0, '2026-08-20 01:14:24', '2026-08-20 01:14:24'),
	(4, 'merchant-services', NULL, NULL, NULL, 'default', NULL, 'index, follow', NULL, NULL, 1, 0, '2026-08-20 20:24:21', '2026-08-20 20:24:21'),
	(5, 'social-media', NULL, NULL, NULL, 'default', NULL, 'index, follow', NULL, NULL, 1, 0, '2026-08-21 02:37:49', '2026-08-21 02:42:27'),
	(6, 'about', NULL, NULL, NULL, 'default', NULL, 'index, follow', NULL, NULL, 1, 0, '2026-08-21 20:27:56', '2026-08-21 20:27:56'),
	(7, 'contact', NULL, NULL, NULL, 'default', NULL, 'index, follow', NULL, NULL, 1, 0, '2026-08-21 21:29:27', '2026-08-21 21:29:27'),
	(8, 'local-boost', NULL, NULL, NULL, 'default', NULL, 'index, follow', NULL, NULL, 1, 0, '2026-08-28 01:54:41', '2026-08-28 01:54:41');

-- Dumping structure for table senverse.page_sections
CREATE TABLE IF NOT EXISTS `page_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_id` bigint unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'content',
  `layout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint unsigned DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_sections_image_id_foreign` (`image_id`),
  KEY `page_sections_page_id_type_index` (`page_id`,`type`),
  KEY `page_sections_page_id_sort_order_index` (`page_id`,`sort_order`),
  CONSTRAINT `page_sections_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `page_sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.page_sections: ~38 rows (approximately)
DELETE FROM `page_sections`;
INSERT INTO `page_sections` (`id`, `page_id`, `key`, `type`, `layout`, `image_id`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
	(4, 1, 'about', 'custom', 'default', 29, 0, 1, '2026-08-18 23:36:11', '2026-08-26 03:23:15'),
	(5, 1, 'service', 'custom', 'default', NULL, 0, 1, '2026-08-19 00:33:28', '2026-08-19 00:33:28'),
	(6, 1, 'solution', 'custom', 'default', NULL, 0, 1, '2026-08-19 00:54:59', '2026-08-19 00:54:59'),
	(7, 1, 'workflow', 'custom', 'default', NULL, 0, 1, '2026-08-19 01:50:39', '2026-08-19 01:50:39'),
	(8, 1, 'why_senverse', 'custom', 'default', 30, 0, 1, '2026-08-19 02:16:54', '2026-08-26 20:04:57'),
	(9, 1, 'cta', 'cta', 'default', NULL, 0, 1, '2026-08-19 19:08:36', '2026-08-19 19:08:36'),
	(10, 2, 'footer_company', 'list', 'default', NULL, 0, 1, '2026-08-19 19:40:56', '2026-08-19 19:40:56'),
	(11, 2, 'footer_service', 'list', 'default', NULL, 0, 1, '2026-08-19 19:41:56', '2026-08-19 19:41:56'),
	(12, 2, 'footer_policy', 'list', 'default', NULL, 0, 1, '2026-08-19 19:42:46', '2026-08-19 19:42:55'),
	(13, 3, 'features', 'list', NULL, NULL, 0, 1, '2026-08-20 01:17:37', '2026-08-20 01:17:37'),
	(14, 3, 'for_customer', 'image_text', NULL, 39, 0, 1, '2026-08-20 02:10:11', '2026-08-27 01:58:35'),
	(15, 3, 'for_owner', 'image_text', NULL, 40, 0, 1, '2026-08-20 02:28:53', '2026-08-27 02:11:06'),
	(16, 3, 'for_technical', 'image_text', NULL, 41, 0, 1, '2026-08-20 02:30:17', '2026-08-27 02:25:33'),
	(17, 3, 'workflow', 'custom', 'default', NULL, 0, 1, '2026-08-20 02:53:41', '2026-08-20 02:53:41'),
	(18, 3, 'pricing', 'custom', 'default', NULL, 0, 1, '2026-08-20 03:25:19', '2026-08-20 03:25:19'),
	(19, 4, 'benefits', 'custom', NULL, NULL, 0, 1, '2026-08-20 20:36:59', '2026-08-20 20:36:59'),
	(20, 4, 'payment_methods', 'custom', 'default', 43, 0, 1, '2026-08-20 21:23:21', '2026-08-27 18:27:23'),
	(21, 4, 'workflow', 'custom', 'default', NULL, 0, 1, '2026-08-20 21:50:37', '2026-08-20 21:50:37'),
	(22, 4, 'payment_manament', 'custom', 'default', 44, 0, 1, '2026-08-20 23:39:22', '2026-08-27 20:01:09'),
	(23, 4, 'faq', 'faq', 'default', NULL, 0, 1, '2026-08-21 00:16:48', '2026-08-21 00:16:48'),
	(24, 4, 'cta', 'cta', 'default', NULL, 0, 1, '2026-08-21 00:29:23', '2026-08-21 00:29:23'),
	(25, 5, 'benefits', 'custom', 'default', 46, 0, 1, '2026-08-21 02:41:44', '2026-08-27 20:56:58'),
	(26, 5, 'services', 'custom', 'default', NULL, 0, 1, '2026-08-21 02:54:02', '2026-08-21 02:54:02'),
	(27, 5, 'workflow', 'custom', 'default', NULL, 0, 1, '2026-08-21 03:05:43', '2026-08-21 03:05:43'),
	(28, 5, 'why_senverse', 'custom', NULL, 47, 0, 1, '2026-08-21 03:15:01', '2026-08-27 21:24:20'),
	(29, 5, 'pricing', 'custom', 'default', NULL, 0, 1, '2026-08-21 03:36:31', '2026-08-21 03:36:31'),
	(30, 5, 'faq', 'custom', 'default', NULL, 0, 1, '2026-08-21 18:28:28', '2026-08-21 18:28:28'),
	(31, 5, 'cta', 'cta', NULL, NULL, 0, 1, '2026-08-21 18:46:02', '2026-08-21 18:46:02'),
	(32, 6, 'hero', 'image_text', 'default', 48, 0, 1, '2026-08-21 20:35:58', '2026-08-27 21:54:54'),
	(33, 6, 'mission', 'image_text', 'default', 49, 0, 1, '2026-08-21 20:43:38', '2026-08-27 23:21:40'),
	(34, 6, 'values', 'custom', NULL, NULL, 0, 1, '2026-08-21 20:48:53', '2026-08-21 20:48:53'),
	(35, 6, 'workflow', 'custom', NULL, NULL, 0, 1, '2026-08-21 20:54:52', '2026-08-21 20:54:52'),
	(36, 6, 'cta', 'cta', 'default', NULL, 0, 1, '2026-08-21 21:01:05', '2026-08-21 21:01:05'),
	(37, 7, 'contact', 'content', NULL, NULL, 0, 1, '2026-08-21 21:30:06', '2026-08-21 21:30:06'),
	(38, 8, 'benefits', 'custom', 'default', 52, 0, 1, '2026-08-28 02:51:06', '2026-08-28 02:51:06'),
	(39, 8, 'services', 'custom', NULL, NULL, 0, 1, '2026-08-28 02:54:17', '2026-08-28 02:54:17'),
	(40, 8, 'workflow', 'custom', 'default', NULL, 0, 1, '2026-08-28 03:01:42', '2026-08-28 03:01:42'),
	(41, 8, 'why_senverse', 'custom', NULL, 53, 0, 1, '2026-08-28 03:10:17', '2026-08-28 03:10:17'),
	(42, 8, 'pricing', 'custom', NULL, NULL, 0, 1, '2026-08-28 03:13:46', '2026-08-28 03:13:46'),
	(43, 8, 'faq', 'faq', NULL, NULL, 0, 1, '2026-08-28 03:17:27', '2026-08-28 03:17:27'),
	(44, 8, 'cta', 'cta', NULL, NULL, 0, 1, '2026-08-28 03:20:28', '2026-08-28 03:20:28');

-- Dumping structure for table senverse.page_section_translations
CREATE TABLE IF NOT EXISTS `page_section_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_section_id` bigint unsigned NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_json` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_section_translations_page_section_id_locale_unique` (`page_section_id`,`locale`),
  KEY `page_section_translations_locale_index` (`locale`),
  CONSTRAINT `page_section_translations_page_section_id_foreign` FOREIGN KEY (`page_section_id`) REFERENCES `page_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.page_section_translations: ~79 rows (approximately)
DELETE FROM `page_section_translations`;
INSERT INTO `page_section_translations` (`id`, `page_section_id`, `locale`, `title`, `subtitle`, `content`, `button_text`, `button_link`, `data_json`, `created_at`, `updated_at`) VALUES
	(7, 4, 'vi', 'Một nền tảng kết nối, được xây dựng dành riêng cho tiệm nail', 'Về Senverse', '<p>Senverse kết nối quản l&yacute; salon, thanh to&aacute;n, chăm s&oacute;c kh&aacute;ch h&agrave;ng v&agrave; marketing tr&ecirc;n một nền tảng duy nhất. Từ vận h&agrave;nh tại quầy đến ph&aacute;t triển kinh doanh, mọi c&ocirc;ng cụ đều được thiết kế theo c&aacute;ch một tiệm nail hiện đại thực sự hoạt động</p>', 'Khám phá Senverse', '/about-us', '{"label": "+ Tính năng", "number": "20", "features": ["POS & Check-in thông minh", "Lịch hẹn & Đặt lịch", "Quản lý thợ & lượt", "Khách hàng & Loyalty", "Thanh toán & Tiền tip", "SMS Marketing", "Tính lương & Báo cáo", "Website & Local SEO"], "trust_text": "Được xây dựng dành riêng cho tiệm nail", "trust_title": "POS + Thanh toán + Marketing"}', '2026-08-18 23:36:11', '2026-08-26 03:23:15'),
	(8, 4, 'en', 'One Connected Platform Built Around Your Nail Salon', 'About Senverse', '<p>Senverse brings salon management, payments, customer engagement, and marketing together in one connected platform. From the front desk to business growth, every tool is designed around the way modern nail salons operate</p>', 'Discover Senverse', '/about-us', '{"label": "+ Features", "number": "20", "features": ["POS & Smart Check-in", "Appointments & Booking", "Technicians & Turns", "Loyalty", "Payments & Tips", "SMS Marketing", "Payroll", "Reports", "Website", "Local SEO"], "trust_text": "Built specifically for nail salons", "trust_title": "POS + Payments + Marketing"}', '2026-08-18 23:36:11', '2026-08-26 03:26:48'),
	(9, 5, 'vi', 'Giải Pháp Cho Tiệm Nail', 'GIẢI PHÁP SENVERS', NULL, 'Xem Tất Cả', '/services', '{"services": [{"icon": "fa-light fa-cash-register", "link": "/pos-system", "title": "Hệ Thống POS", "description": "Quản lý lịch hẹn, khách hàng, thợ và hoạt động salon hằng ngày."}, {"icon": "fa-light fa-credit-card", "link": "/merchant-services", "title": "Dịch Vụ Thanh Toán", "description": "Thanh toán an toàn, quản lý tiền tip và đồng bộ mọi giao dịch."}, {"icon": "fa-light fa-laptop-code", "link": "/website", "title": "Thiết Kế Website", "description": "Website chuyên nghiệp giúp salon thu hút khách và tăng lượt đặt lịch."}, {"icon": "fa-light fa-share-nodes", "link": "/social-media", "title": "Mạng Xã Hội", "description": "Xây dựng thương hiệu và kết nối thường xuyên với khách hàng địa phương."}, {"icon": "fa-light fa-location-dot", "link": "/local-boost", "title": "Local Boost", "description": "Giúp khách hàng gần khu vực dễ dàng tìm thấy và lựa chọn salon."}, {"icon": "fa-light fa-display", "link": "/digital-signage", "title": "Digital Signage", "description": "Trình chiếu dịch vụ, ưu đãi và nội dung quảng bá ngay tại salon."}]}', '2026-08-19 00:33:28', '2026-08-26 18:55:40'),
	(10, 5, 'en', 'Solutions for Nail Salons', 'SENVERS SOLUTIONS', NULL, 'All Services', '/services', '{"services": [{"icon": "fa-light fa-cash-register", "link": "/pos-system", "title": "POS System", "description": "Manage appointments, clients, technicians, and daily salon operations."}, {"icon": "fa-light fa-credit-card", "link": "/merchant-services", "title": "Merchant Services", "description": "Accept secure payments and keep tips and transactions connected."}, {"icon": "fa-light fa-laptop-code", "link": "/website", "title": "Website Design", "description": "Turn more visitors into bookings with a professional salon website."}, {"icon": "fa-light fa-share-nodes", "link": "/social-media", "title": "Social Media", "description": "Build your brand and stay connected with local clients."}, {"icon": "fa-light fa-location-dot", "link": "/local-boost", "title": "Local Boost", "description": "Help nearby clients discover and choose your salon."}, {"icon": "fa-light fa-display", "link": "/digital-signage", "title": "Digital Signage", "description": "Promote services and special offers throughout your salon."}]}', '2026-08-19 00:33:28', '2026-08-26 18:55:40'),
	(11, 6, 'vi', 'Ba Giải Pháp - Một Hệ Thống Senverse.', 'ONE CONNECTED PLATFORM', NULL, NULL, NULL, '{"products": [{"link": "/pos-system", "tags": ["Vận Hành", "Tự Động Hóa", "Báo Cáo"], "image": "possystem.webp", "title": "Hệ Thống POS", "features": ["Lịch Hẹn & Check-in Thông Minh", "Quản Lý Thợ & Phân Lượt", "Khách Hàng & Loyalty", "Tính Lương & Commission", "Báo Cáo & Quản Lý Từ Xa"], "description": "Quản lý lịch hẹn, thợ, khách hàng, bảng lương và toàn bộ hoạt động của salon trên một nền tảng kết nối."}, {"link": "/merchant-services", "tags": ["Thanh Toán", "Tiền Tip", "Tích Hợp POS"], "image": "mechant.webp", "title": "Dịch Vụ Thanh Toán", "features": ["Nhiều Phương Thức Thanh Toán", "Quản Lý & Phân Bổ Tiền Tip", "Split Payment & Split Ticket", "Đồng Bộ Trực Tiếp Với POS", "Báo Cáo & Đối Soát Giao Dịch"], "description": "Xử lý thanh toán an toàn, quản lý tiền tip và tự động đồng bộ mọi giao dịch với hệ thống POS Senverse."}, {"link": "/growth-services", "tags": ["Website", "Local Boost", "Digital Signage"], "image": "marketing.webp", "title": "Marketing & Growth", "features": ["Thiết Kế Website Salon", "Quản Lý Social Media", "Local Boost", "Website SEO", "Digital Signage"], "description": "Xây dựng thương hiệu, tăng khả năng được tìm thấy và thu hút thêm khách hàng bằng các giải pháp marketing dành cho nail salon."}]}', '2026-08-19 00:54:59', '2026-08-26 19:19:04'),
	(12, 6, 'en', 'Three Solutions - One Senverse Platform.', 'ONE CONNECTED PLATFORM', NULL, NULL, NULL, '{"products": [{"link": "/pos-system", "tags": ["Operations", "Automation", "Reporting"], "image": "possystem.webp", "title": "POS System", "features": ["Appointments & Smart Check-in", "Technicians & Turn Management", "CRM & Loyalty", "Payroll & Commission", "Reports & Remote Management"], "description": "Manage appointments, technicians, clients, payroll, and everyday salon operations from one connected platform."}, {"link": "/merchant-services", "tags": ["Payments", "Tips", "POS Integration"], "image": "mechant.webp", "title": "Merchant Services", "features": ["Multiple Payment Methods", "Tip Management & Distribution", "Split Payments & Split Tickets", "Seamless POS Integration", "Transaction Reports & Reconciliation"], "description": "Process payments securely, manage tips, and automatically connect every transaction with your Senverse POS."}, {"link": "/growth-services", "tags": ["Website", "Local Boost", "Digital Signage"], "image": "marketing.webp", "title": "Marketing & Growth", "features": ["Salon Website Design", "Social Media Management", "Local Boost", "Website SEO", "Digital Signage"], "description": "Build your brand, improve local visibility, and attract more clients with marketing solutions designed for nail salons."}]}', '2026-08-19 00:54:59', '2026-08-26 19:19:04'),
	(13, 7, 'vi', 'Senverse Đồng Hành Cùng Salon Như Thế Nào?', 'TỪ THIẾT LẬP ĐẾN TĂNG TRƯỞNG', NULL, NULL, NULL, '{"steps": [{"title": "Thiết Lập Hệ Thống", "description": "Cấu hình dịch vụ, bảng giá, kỹ thuật viên, lịch làm việc và thông tin salon theo mô hình vận hành thực tế."}, {"title": "Quản Lý Vận Hành", "description": "Kết nối lịch hẹn, check-in, phân lượt thợ, thanh toán, khách hàng và bảng lương trên một hệ thống."}, {"title": "Tự Động & Chăm Sóc Khách", "description": "Tự động gửi xác nhận lịch hẹn, nhắc lịch, tin nhắn chăm sóc và các chương trình marketing phù hợp."}, {"title": "Theo Dõi & Phát Triển", "description": "Theo dõi báo cáo, tối ưu vận hành và thu hút thêm khách hàng qua website, Local Boost và Social Media."}]}', '2026-08-19 01:50:39', '2026-08-26 19:29:54'),
	(14, 7, 'en', 'How Senverse Helps Your Salon Grow', 'How It Works', NULL, NULL, NULL, '{"steps": [{"title": "Set Up Your System", "description": "Configure services, pricing, technicians, schedules, and salon information around the way your business operates."}, {"title": "Run Daily Operations", "description": "Connect appointments, check-in, technician turns, payments, clients, and payroll in one system."}, {"title": "Automate Client Engagement", "description": "Automate appointment confirmations, reminders, client follow-ups, and targeted marketing messages."}, {"title": "Track & Grow", "description": "Monitor performance, improve operations, and attract more clients through websites, Local Boost, and Social Media."}]}', '2026-08-19 01:50:39', '2026-08-26 19:29:08'),
	(15, 8, 'vi', 'Được Xây Dựng Theo Cách Nail Salon Vận Hành', 'Tại Sao Chọn Senverse?', '<p>Senverse kết nối quản l&yacute; salon, thanh to&aacute;n, tự động h&oacute;a v&agrave; marketing trong một hệ thống duy nhất, gi&uacute;p chủ salon tiết kiệm thời gian, n&acirc;ng cao trải nghiệm kh&aacute;ch h&agrave;ng v&agrave; ph&aacute;t triển kinh doanh</p>', 'Đặt Lịch Demo', '/about-us', '{"features": ["Thiết Kế Riêng Cho Cách Nail Salon Vận Hành", "Một Nền Tảng Kết Nối Toàn Bộ Salon", "Tự Động Hóa Giúp Tiết Kiệm Thời Gian", "Marketing Tích Hợp Hỗ Trợ Tăng Trưởng"]}', '2026-08-19 02:16:54', '2026-08-26 20:04:57'),
	(16, 8, 'en', 'Built Around the Way Nail Salons Work', 'Why Choose Senverse?', '<p>Senverse connects salon management, payments, automation, and marketing in one system&mdash;helping owners save time, improve client experiences, and grow with confidence</p>', 'Book a Demo', '/about-us', '{"features": ["Built Around the Way Nail Salons Work", "One Platform Connecting Your Entire Salon", "Time-Saving Automation", "Integrated Marketing for Long-Term Growth"]}', '2026-08-19 02:16:54', '2026-08-26 20:04:57'),
	(17, 9, 'vi', 'Sẵn Sàng Nâng Tầm Nail Salon?', 'Đặt lịch demo miễn phí và khám phá cách Senverse giúp tối ưu vận hành, nâng cao trải nghiệm khách hàng và phát triển doanh nghiệp.', NULL, 'Đặt Lịch Demo', '/about-us', NULL, '2026-08-19 19:08:36', '2026-08-19 19:08:36'),
	(18, 9, 'en', 'Ready to Transform Your Nail Salon?', 'Schedule a free demo and discover how Senverse can simplify operations, improve customer experiences, and help your salon grow.', NULL, 'Book a Demo', '/about-us', NULL, '2026-08-19 19:08:36', '2026-08-19 19:08:36'),
	(19, 10, 'vi', 'Về Chúng Tôi', NULL, NULL, NULL, NULL, '{"items": [{"link": "/about-us", "title": "Về Chúng Tôi"}, {"link": "/case-studies", "title": "Case Study"}, {"link": "/blog", "title": "Tin Tức"}, {"link": "/contact", "title": "Liên Hệ"}]}', '2026-08-19 19:40:56', '2026-08-19 19:40:56'),
	(20, 10, 'en', 'Company', NULL, NULL, NULL, NULL, '{"items": [{"link": "/about-us", "title": "About Us"}, {"link": "/case-studies", "title": "Case Studies"}, {"link": "/blog", "title": "Blog"}, {"link": "/contact", "title": "Contact Us"}]}', '2026-08-19 19:40:56', '2026-08-19 19:40:56'),
	(21, 11, 'vi', 'Dịch Vụ', NULL, NULL, NULL, NULL, '{"items": [{"link": "solutions/pos-system", "title": "POS System"}, {"link": "solutions/merchant-services", "title": "Merchant Services"}, {"link": "solutions/the-qua-tang", "title": "Gift Card"}, {"link": "/ai-reception", "title": "AI Reception"}, {"link": "/social-media", "title": "Social Media"}, {"link": "/website", "title": "Website"}]}', '2026-08-19 19:41:56', '2026-08-24 19:24:38'),
	(22, 11, 'en', 'Service', NULL, NULL, NULL, NULL, '{"items": [{"link": "/pos-system", "title": "POS System"}, {"link": "/merchant-services", "title": "Merchant Services"}, {"link": "/gift-card", "title": "Gift Card"}, {"link": "/ai-reception", "title": "AI Reception"}, {"link": "/social-media", "title": "Social Media"}, {"link": "/website", "title": "Website"}]}', '2026-08-19 19:41:56', '2026-08-19 19:41:56'),
	(23, 12, 'vi', 'Chính Sách', NULL, NULL, NULL, NULL, '{"items": [{"link": "/privacy-policy", "title": "Chính Sách Bảo Mật"}, {"link": "/terms", "title": "Điều Khoản Sử Dụng"}, {"link": "/refund-policy", "title": "Chính Sách Hoàn Tiền"}, {"link": "/cookie-policy", "title": "Chính Sách Cookie"}]}', '2026-08-19 19:42:46', '2026-08-19 19:42:46'),
	(24, 12, 'en', 'Policy', NULL, NULL, NULL, NULL, '{"items": [{"link": "/privacy-policy", "title": "Privacy Policy"}, {"link": "/terms", "title": "Terms & Conditions"}, {"link": "/refund-policy", "title": "Refund Policy"}, {"link": "/cookie-policy", "title": "Cookie Policy"}]}', '2026-08-19 19:42:46', '2026-08-19 19:42:46'),
	(25, 13, 'vi', 'Mọi Thứ Tiệm Nail Cần <br> Trong Một Hệ Thống POS', 'TÍNH NĂNG', NULL, NULL, NULL, '[{"icon": "fa-regular fa-calendar-check", "name": "Quản Lý Lịch Hẹn", "description": "Quản lý lịch đặt, lịch làm việc, nhắc hẹn và khách walk-in tại một nơi."}, {"icon": "fa-regular fa-credit-card", "name": "Xử Lý Thanh Toán", "description": "Nhận thanh toán bằng thẻ, tiền mặt, thẻ quà tặng, tip và chia hóa đơn nhanh chóng."}, {"icon": "fa-solid fa-users", "name": "Quản Lý Khách Hàng", "description": "Lưu hồ sơ, lịch sử sử dụng dịch vụ, sở thích và thông tin liên hệ của khách hàng."}, {"icon": "fa-solid fa-user-gear", "name": "Quản Lý Thợ", "description": "Quản lý lịch làm việc, chia turn, hoa hồng, hiệu suất và phân công dịch vụ."}, {"icon": "fa-solid fa-right-to-bracket", "name": "Check-in Thông Minh", "description": "Rút ngắn thời gian chờ và mang đến trải nghiệm check-in nhanh chóng, thuận tiện."}, {"icon": "fa-solid fa-chart-line", "name": "Báo Cáo & Phân Tích", "description": "Theo dõi doanh thu, lịch hẹn, dịch vụ, tip và hiệu suất tiệm theo thời gian thực."}, {"icon": "fa-solid fa-gift", "name": "Khách Hàng Thân Thiết & Gift Card", "description": "Tăng tỷ lệ khách quay lại bằng chương trình tích điểm, phần thưởng và thẻ quà tặng."}, {"icon": "fa-regular fa-comment-dots", "name": "SMS Marketing", "description": "Tự động gửi tin nhắn nhắc hẹn, chương trình ưu đãi và chăm sóc khách hàng."}]', '2026-08-20 01:17:37', '2026-08-27 01:30:55'),
	(26, 13, 'en', 'Everything Your Salon Needs <br> in One Powerful POS', 'FEATURES', NULL, NULL, NULL, '[{"icon": "fa-regular fa-calendar-check", "name": "Appointment Management", "description": "Manage bookings, staff calendars, reminders, and walk-in customers from one place."}, {"icon": "fa-regular fa-credit-card", "name": "Payment Processing", "description": "Accept cards, cash, gift cards, tips, and split payments quickly and securely."}, {"icon": "fa-solid fa-users", "name": "Customer Management", "description": "Store customer profiles, service history, preferences, and contact information."}, {"icon": "fa-solid fa-user-gear", "name": "Technician Management", "description": "Manage schedules, turn rotation, commissions, performance, and service assignments."}, {"icon": "fa-solid fa-right-to-bracket", "name": "Smart Check-In", "description": "Reduce waiting time and provide a faster, more convenient check-in experience."}, {"icon": "fa-solid fa-chart-line", "name": "Reports & Analytics", "description": "Track revenue, appointments, services, tips, and salon performance in real time."}, {"icon": "fa-solid fa-gift", "name": "Loyalty & Gift Cards", "description": "Increase customer retention with loyalty rewards, points, and digital gift cards."}, {"icon": "fa-regular fa-comment-dots", "name": "SMS Marketing", "description": "Automatically send appointment reminders, promotions, and customer follow-up messages."}]', '2026-08-20 01:17:37', '2026-08-27 01:30:55'),
	(27, 14, 'vi', 'Mang Đến Trải Nghiệm Tốt Hơn Cho Mỗi Khách Hàng', 'DÀNH CHO KHÁCH HÀNG', '<p>Tạo ra một h&agrave;nh tr&igrave;nh liền mạch từ l&uacute;c đặt lịch đến khi thanh to&aacute;n với quy tr&igrave;nh nhanh hơn, tiện lợi hơn v&agrave; trải nghiệm hiện đại hơn.</p>\r\n\r\n<ul class="feature-list">\r\n	<li><i class="fa-regular fa-calendar-days">​</i> Đặt lịch trực tuyến dễ d&agrave;ng</li>\r\n	<li><i class="fa-solid fa-user-check">​</i> Check-in nhanh ch&oacute;ng</li>\r\n	<li><i class="fa-regular fa-credit-card">​</i> Thanh to&aacute;n nhanh v&agrave; linh hoạt</li>\r\n	<li><i class="fa-solid fa-receipt">​</i> H&oacute;a đơn điện tử</li>\r\n	<li><i class="fa-solid fa-gift">​</i> T&iacute;ch điểm v&agrave; nhận ưu đ&atilde;i</li>\r\n</ul>', NULL, NULL, NULL, '2026-08-20 02:10:11', '2026-08-27 01:58:35'),
	(28, 14, 'en', 'Better Experience to Customer', 'FOR CUSTOMERS', '<p>\r\n    Create a seamless journey from booking to checkout with a faster,\r\n    more convenient process and a modern customer experience.\r\n</p>\r\n\r\n<ul class="feature-list">\r\n    <li>\r\n        <i class="fa-regular fa-calendar-days">&#8203;</i>\r\n        Easy Online Booking\r\n    </li>\r\n    <li>\r\n        <i class="fa-solid fa-user-check">&#8203;</i>\r\n        Fast and Easy Check-in\r\n    </li>\r\n    <li>\r\n        <i class="fa-regular fa-credit-card">&#8203;</i>\r\n        Fast and Flexible Payments\r\n    </li>\r\n    <li>\r\n        <i class="fa-solid fa-receipt">&#8203;</i>\r\n        Digital Receipts\r\n    </li>\r\n    <li>\r\n        <i class="fa-solid fa-gift">&#8203;</i>\r\n        Loyalty Points and Rewards\r\n    </li>\r\n</ul>', NULL, NULL, NULL, '2026-08-20 02:10:11', '2026-08-27 01:59:13'),
	(29, 15, 'vi', 'Mọi Công Cụ Bạn Cần Để Quản Lý Tiệm Nail', 'FOR SALON OWNERS', '<p>Kiểm so&aacute;t hoạt động của tiệm với dữ liệu theo thời gian thực về lịch hẹn, doanh thu, hiệu suất thợ, kh&aacute;ch h&agrave;ng v&agrave; vận h&agrave;nh hằng ng&agrave;y.</p>\r\n\r\n<ul class="feature-list">\r\n	<li><i class="fa-solid fa-chart-line">​</i> Theo d&otilde;i doanh thu theo thời gian thực</li>\r\n	<li><i class="fa-regular fa-calendar-check">​</i> Quản l&yacute; lịch hẹn v&agrave; chia turn</li>\r\n	<li><i class="fa-solid fa-user-gear">​</i> Theo d&otilde;i hiệu suất thợ</li>\r\n	<li><i class="fa-solid fa-chart-pie">​</i> B&aacute;o c&aacute;o v&agrave; ph&acirc;n t&iacute;ch kinh doanh</li>\r\n	<li><i class="fa-solid fa-laptop">​</i> Quản l&yacute; tiệm từ xa</li>\r\n</ul>', NULL, NULL, NULL, '2026-08-20 02:28:53', '2026-08-27 02:13:36'),
	(30, 15, 'en', 'Everything You Need to Manage Your Salon', 'FOR SALON OWNERS', '<p>Stay in control with real-time visibility into appointments, revenue, technician performance, customer activity, and daily salon operations.</p>\r\n\r\n<ul class="feature-list">\r\n	<li><i class="fa-solid fa-chart-line">​</i> Real-Time Revenue Tracking</li>\r\n	<li><i class="fa-regular fa-calendar-check">​</i> Appointment and Turn Management</li>\r\n	<li><i class="fa-solid fa-user-gear">​</i> Technician Performance Tracking</li>\r\n	<li><i class="fa-solid fa-chart-pie">​</i> Business Reports and Analytics</li>\r\n	<li><i class="fa-solid fa-laptop">​</i> Remote Salon Management</li>\r\n</ul>', NULL, NULL, NULL, '2026-08-20 02:28:53', '2026-08-27 02:13:36'),
	(31, 16, 'vi', 'Giúp Đội Ngũ Làm Việc Hiệu Quả Hơn', 'FOR TECHNICIANS', '<p>Cung cấp cho thợ những c&ocirc;ng cụ cần thiết để quản l&yacute; lịch l&agrave;m việc, theo d&otilde;i lượt, dịch vụ, tiền tip v&agrave; thu nhập trong suốt ng&agrave;y l&agrave;m việc.</p>\r\n\r\n<ul class="feature-list">\r\n	<li><i class="fa-regular fa-calendar-days">​</i> Theo d&otilde;i lịch l&agrave;m việc</li>\r\n	<li><i class="fa-solid fa-rotate">​</i> Quản l&yacute; lượt v&agrave; ph&acirc;n c&ocirc;ng dịch vụ</li>\r\n	<li><i class="fa-solid fa-percent">​</i> Theo d&otilde;i hoa hồng</li>\r\n	<li><i class="fa-solid fa-hand-holding-dollar">​</i> Quản l&yacute; tiền tip</li>\r\n	<li><i class="fa-solid fa-chart-bar">​</i> Xem thu nhập v&agrave; hiệu suất</li>\r\n</ul>', NULL, NULL, NULL, '2026-08-20 02:30:17', '2026-08-27 02:28:46'),
	(32, 16, 'en', 'Help Your Team Work More Efficiently', 'FOR TECHNICIANS', '<p>Give technicians the tools they need to manage schedules, track turns, services, tips, and earnings throughout the workday.</p>\r\n\r\n<ul class="feature-list">\r\n	<li><i class="fa-regular fa-calendar-days">​</i> View Work Schedules</li>\r\n	<li><i class="fa-solid fa-rotate">​</i> Turn and Service Management</li>\r\n	<li><i class="fa-solid fa-percent">​</i> Commission Tracking</li>\r\n	<li><i class="fa-solid fa-hand-holding-dollar">​</i> Tip Management</li>\r\n	<li><i class="fa-solid fa-chart-bar">​</i> Earnings and Performance Insights</li>\r\n</ul>', NULL, NULL, NULL, '2026-08-20 02:30:17', '2026-08-27 02:28:46'),
	(33, 17, 'vi', 'Từ Đặt Lịch Đến Thanh Toán', 'QUY TRÌNH VẬN HÀNH', '<p>Senverse POS connects every step of your salon workflow into one seamless process.</p>', NULL, NULL, '{"steps": [{"title": "Đặt Lịch", "description": "Khách hàng đặt lịch trực tuyến, qua điện thoại hoặc trực tiếp tại tiệm."}, {"title": "Check-in Thông Minh", "description": "Khách check-in nhanh chóng và hệ thống tự động ghi nhận thời gian đến."}, {"title": "Phân Công Thợ", "description": "Phân công thợ phù hợp dựa trên lượt, lịch làm việc và tình trạng sẵn sàng."}, {"title": "Theo Dõi Dịch Vụ", "description": "Theo dõi dịch vụ, thợ thực hiện, thời gian, giá và các dịch vụ bổ sung."}, {"title": "Thanh Toán", "description": "Xử lý thanh toán, tip, giảm giá, gift card và hóa đơn điện tử tại một nơi."}, {"title": "Đánh Giá & Chăm Sóc", "description": "Tự động gửi yêu cầu đánh giá, ưu đãi và tin nhắn chăm sóc sau mỗi lần ghé tiệm."}]}', '2026-08-20 02:53:41', '2026-08-27 02:35:37'),
	(34, 17, 'en', 'From Booking to Checkout', 'SALON WORKFLOW', '<p>{<br />\r\n&nbsp; &nbsp; &quot;steps&quot;: [<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;title&quot;: &quot;Appointment&quot;,<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;description&quot;: &quot;Customers book appointments online, by phone, or directly at the salon.&quot;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; },<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;title&quot;: &quot;Smart Check-In&quot;,<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;description&quot;: &quot;Customers check in quickly while the system automatically records their arrival.&quot;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; },<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;title&quot;: &quot;Assign Technician&quot;,<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;description&quot;: &quot;Assign the right technician based on turn rotation, schedule, and availability.&quot;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; },<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;title&quot;: &quot;Service Tracking&quot;,<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;description&quot;: &quot;Track services, technicians, duration, pricing, and add-ons throughout each visit.&quot;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; },<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;title&quot;: &quot;Checkout&quot;,<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;description&quot;: &quot;Process payments, tips, discounts, gift cards, and digital receipts in one place.&quot;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; },<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;title&quot;: &quot;Review &amp; Follow-Up&quot;,<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;description&quot;: &quot;Automatically send review requests, rewards, and follow-up messages after each visit.&quot;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; }<br />\r\n&nbsp; &nbsp; ]<br />\r\n}</p>', NULL, NULL, '{"steps": [{"title": "Appointment", "description": "Customers schedule appointments online or by phone."}, {"title": "Check-In", "description": "Customers arrive and check in quickly."}, {"title": "Assign Technician", "description": "Assign the right technician based on schedule and availability."}, {"title": "Service", "description": "Technicians manage selected services and add-ons."}, {"title": "Checkout", "description": "Complete payments, tips, discounts, and digital receipts."}, {"title": "Review Request", "description": "Automatically follow up with customers after their visit."}]}', '2026-08-20 02:53:41', '2026-08-27 02:35:37'),
	(35, 18, 'vi', 'Chọn Gói Phù Hợp Cho Tiệm Nail Của Bạn', 'BẢNG GIÁ', '<p data-end="975" data-start="965">C&aacute;c g&oacute;i linh hoạt được thiết kế ph&ugrave; hợp với từng giai đoạn ph&aacute;t triển của tiệm</p>', NULL, NULL, '{"plans": [{"name": "S-PRO", "price": "$99", "active": true, "period": "/THÁNG", "features": ["Check-in Thông Minh & Quản Lý Lượt", "Quản Lý Lịch Hẹn & Đặt Lịch Online", "Tự Động Gửi Tin Nhắn Nhắc Hẹn", "Tính Lương & Hoa Hồng", "Bán & Quản Lý Gift Card", "Báo Cáo & Phân Tích Kinh Doanh", "Ứng Dụng Cho Chủ Tiệm & Quản Lý", "SMS Marketing & Tự Động Hóa", "1.000 SMS + 3.000 Email / Tháng", "Gói 6 Tháng: Tặng 1 Tháng", "Gói 12 Tháng: Tặng 3 Tháng", "Phí Cài Đặt Một Lần: $199"], "button_link": "/contact", "button_text": "Bắt Đầu Ngay", "description": "Dành cho chủ tiệm cần một hệ thống hoàn chỉnh để quản lý hoạt động hằng ngày.", "features_title": "Bao Gồm Tất Cả Tính Năng"}, {"name": "S-PRO+", "price": "$199", "active": false, "period": "/THÁNG", "features": ["Thiết Kế & Quản Lý Website", "Quản Lý Đánh Giá Google", "Thiết Lập Quảng Cáo Meta & Google", "12 Bài Social Đa Nền Tảng / Tháng", "Chính Sách Giá Sỉ Độc Quyền", "Gói 12 Tháng: Tặng 3 Tháng", "Hosting & Tên Miền: $299", "Phí Cài Đặt Một Lần: $199"], "button_link": "/contact", "button_text": "Đặt Lịch Demo Miễn Phí", "description": "Mọi công cụ bạn cần để quản lý và phát triển tiệm Nail, từ POS đến Marketing.", "features_title": "Bao Gồm S-PRO Và Thêm"}]}', '2026-08-20 03:25:20', '2026-08-27 02:58:42'),
	(36, 18, 'en', 'Choose the Right Plan for Your Salon', 'PRICING PLANS', '<p>Flexible plans built for every stage of your salon&rsquo;s growth.</p>', NULL, NULL, '{"plans": [{"name": "S-PRO", "price": "$99", "active": true, "period": "/MONTH", "features": ["Smart Check-in & Turn Management", "Appointments & Online Booking", "Automated Appointment Reminders", "Payroll & Commission Calculation", "Gift Card Sales & Management", "Business Reports & Analytics", "Staff & Manager Mobile App", "SMS Marketing & Automation", "1,000 SMS + 3,000 Emails / Month", "6-Month Plan: 1 Month Free", "12-Month Plan: 3 Months Free", "One-Time Setup Fee: $199"], "button_link": "/contact", "button_text": "Get Started", "description": "Built for salon owners who need a complete system to manage daily operations.", "features_title": "Everything Included"}, {"name": "S-PRO+", "price": "$199", "active": false, "period": "/MONTH", "features": ["Business Website & Management", "Google Review Management", "Meta & Google Ads Setup", "12 Multi-Platform Social Posts / Month", "Exclusive Wholesale Pricing", "12-Month Plan: 3 Months Free", "Hosting & Domain: $299", "One-Time Setup Fee: $199"], "button_link": "/contact", "button_text": "Book a Free Demo", "description": "Everything you need to manage and grow your salon—from POS to marketing.", "features_title": "Everything in S-PRO, Plus"}]}', '2026-08-20 03:25:20', '2026-08-27 02:58:42'),
	(37, 19, 'vi', 'Thanh Toán Đơn Giản - Chi Phí Minh Bạch.', 'VÌ SAO CHỌN SENVERS E MERCHANT SERVICES', NULL, NULL, NULL, '[{"icon": "fa-solid fa-receipt", "title": "Không Có Phí Ẩn", "description": "Mức phí rõ ràng, minh bạch, không có các khoản phí bất ngờ hoặc ẩn."}, {"icon": "fa-solid fa-percent", "title": "Mức Phí Cạnh Tranh", "description": "Mức phí xử lý thanh toán được thiết kế để giúp giảm chi phí vận hành."}, {"icon": "fa-solid fa-shield-alt", "title": "Thanh Toán An Toàn", "description": "Bảo vệ mọi giao dịch bằng công nghệ thanh toán an toàn và ổn định."}, {"icon": "fa-solid fa-money-bill-wave", "title": "Tiền Về Nhanh", "description": "Tiền giao dịch được xử lý và chuyển vào tài khoản nhanh chóng, ổn định."}, {"icon": "fa-regular fa-credit-card", "title": "Thanh Toán Linh Hoạt", "description": "Chấp nhận thẻ tín dụng, thẻ ghi nợ, thanh toán không tiếp xúc và ví điện tử."}, {"icon": "fa-solid fa-desktop", "title": "Tích Hợp Senverse POS", "description": "Kết nối thanh toán trực tiếp với Senverse POS để checkout nhanh và liền mạch hơn."}]', '2026-08-20 20:36:59', '2026-08-27 03:23:41'),
	(38, 19, 'en', 'Simple Payments - Clear Pricing.', 'WHY SENVERS E MERCHANT SERVICES', NULL, NULL, NULL, '[{"icon": "fa-solid fa-receipt", "title": "No Hidden Fees", "description": "Clear and transparent pricing with no unexpected or hidden charges."}, {"icon": "fa-solid fa-percent", "title": "Competitive Rates", "description": "Payment processing rates designed to help reduce operating costs."}, {"icon": "fa-solid fa-shield-alt", "title": "Secure Payments", "description": "Protect every transaction with reliable and secure payment technology."}, {"icon": "fa-solid fa-money-bill-wave", "title": "Fast Deposits", "description": "Get transaction funds processed and deposited quickly and reliably."}, {"icon": "fa-regular fa-credit-card", "title": "Flexible Payment Options", "description": "Accept credit cards, debit cards, contactless payments, and digital wallets."}, {"icon": "fa-solid fa-desktop", "title": "Senverse POS Integration", "description": "Connect payments directly with Senverse POS for a faster, smoother checkout."}]', '2026-08-20 20:36:59', '2026-08-27 03:23:41'),
	(39, 20, 'vi', 'Chấp Nhận Phương Thức Thanh Toán Khách Hàng Ưa Dùng', 'Phương Thức Thanh Toán Linh Hoạt', '<p>Mang đến nhiều lựa chọn thanh to&aacute;n nhanh ch&oacute;ng, an to&agrave;n v&agrave; được kết nối trực tiếp với Senverse POS.</p>', NULL, NULL, '{"features": [{"icon": "fa-regular fa-credit-card", "title": "Thẻ Tín Dụng"}, {"icon": "fa-solid fa-money-check-dollar", "title": "Thẻ Ghi Nợ"}, {"icon": "fa-solid fa-wifi", "title": "Thanh Toán Không Tiếp Xúc"}, {"icon": "fa-solid fa-mobile-screen-button", "title": "Ví Điện Tử"}]}', '2026-08-20 21:23:21', '2026-08-27 18:27:23'),
	(40, 20, 'en', 'Accept Payments the Way Your Customers Prefer', 'Flexible Payment Options', '<p>Give customers more ways to pay with fast, secure payment options connected directly to Senverse POS.</p>', NULL, NULL, '{"features": [{"icon": "fa-regular fa-credit-card", "title": "Credit Cards"}, {"icon": "fa-solid fa-money-check-dollar", "title": "Debit Cards"}, {"icon": "fa-solid fa-wifi", "title": "Contactless Payments"}, {"icon": "fa-solid fa-mobile-screen-button", "title": "Digital Wallets"}]}', '2026-08-20 21:23:21', '2026-08-27 18:27:23'),
	(41, 21, 'vi', 'Thanh Toán Và POS. Hoạt Động Tốt Hơn Khi Kết Hợp.', 'TÍCH HỢP POS LIỀN MẠCH', NULL, NULL, NULL, '{"steps": [{"icon": "fa-solid fa-cash-register", "title": "Checkout", "number": "01", "description": "Tổng dịch vụ, giảm giá và thông tin khách hàng được tự động chuẩn bị để thanh toán."}, {"icon": "fa-solid fa-hand-holding-dollar", "title": "Thêm Tip", "number": "02", "description": "Khách hàng dễ dàng lựa chọn và thêm tiền tip trực tiếp trên màn hình thanh toán."}, {"icon": "fa-regular fa-credit-card", "title": "Thanh Toán", "number": "03", "description": "Xử lý giao dịch an toàn thông qua thiết bị thanh toán đã kết nối."}, {"icon": "fa-solid fa-receipt", "title": "Hóa Đơn", "number": "04", "description": "Hoàn tất giao dịch và gửi hoặc in hóa đơn ngay lập tức."}, {"icon": "fa-solid fa-chart-line", "title": "Báo Cáo", "number": "05", "description": "Dữ liệu thanh toán tự động đồng bộ với báo cáo trên Senverse POS."}], "highlight_text": "Không nhập liệu thủ công. Giảm sai sót. Checkout nhanh hơn.", "highlight_title": "Một Giao Dịch. Một Hệ Thống Kết Nối."}', '2026-08-20 21:50:37', '2026-08-27 18:35:32'),
	(42, 21, 'en', 'Payments and POS - Better Together.', 'SEAMLESS POS INTEGRATION', NULL, NULL, NULL, '{"steps": [{"icon": "fa-solid fa-cash-register", "title": "Checkout", "number": "01", "description": "Service totals, discounts, and customer details are automatically prepared for checkout."}, {"icon": "fa-solid fa-hand-holding-dollar", "title": "Tip", "number": "02", "description": "Customers can easily select and add a tip directly on the payment screen."}, {"icon": "fa-regular fa-credit-card", "title": "Payment", "number": "03", "description": "Process transactions securely through the connected payment terminal."}, {"icon": "fa-solid fa-receipt", "title": "Receipt", "number": "04", "description": "Complete the transaction and send or print a receipt instantly."}, {"icon": "fa-solid fa-chart-line", "title": "Reporting", "number": "05", "description": "Payment data automatically syncs with Senverse POS reports."}], "highlight_text": "No manual entry. Fewer errors. Faster checkout.", "highlight_title": "One Transaction. One Connected System."}', '2026-08-20 21:50:37', '2026-08-27 18:35:32'),
	(43, 22, 'vi', 'Kiểm Soát Mọi Giao Dịch', 'QUẢN LÝ THANH TOÁN', '<p>Theo d&otilde;i thanh to&aacute;n, ho&agrave;n tiền, tiền chuyển về v&agrave; lịch sử giao dịch trực tiếp tr&ecirc;n hệ thống Senverse được kết nối.</p>', NULL, NULL, '{"features": [{"icon": "fa-solid fa-clock-rotate-left", "title": "Lịch Sử Giao Dịch", "description": "Xem và theo dõi toàn bộ hoạt động thanh toán tại một nơi."}, {"icon": "fa-solid fa-arrow-rotate-left", "title": "Hoàn Tiền", "description": "Xử lý và theo dõi các giao dịch hoàn tiền nhanh chóng."}, {"icon": "fa-solid fa-building-columns", "title": "Theo Dõi Tiền Về", "description": "Theo dõi các khoản thanh toán đã xử lý và tiền chuyển về."}, {"icon": "fa-solid fa-chart-line", "title": "Báo Cáo Thanh Toán", "description": "Nắm bắt rõ hiệu quả và tình hình hoạt động thanh toán."}]}', '2026-08-20 23:39:22', '2026-08-27 20:01:09'),
	(44, 22, 'en', 'Stay in Control of Every Transaction', 'PAYMENT MANAGEMENT', '<p>Track payments, refunds, deposits, and transaction history directly from your connected Senverse system.</p>', NULL, NULL, '{"features": [{"icon": "fa-solid fa-clock-rotate-left", "title": "Transaction History", "description": "View and track all payment activity in one place."}, {"icon": "fa-solid fa-arrow-rotate-left", "title": "Refunds", "description": "Process and track refunds quickly and easily."}, {"icon": "fa-solid fa-building-columns", "title": "Deposit Tracking", "description": "Monitor processed payments and incoming deposits."}, {"icon": "fa-solid fa-chart-line", "title": "Payment Reports", "description": "Get clear insights into your payment performance."}]}', '2026-08-20 23:39:22', '2026-08-27 20:01:09'),
	(45, 23, 'vi', 'Frequently Asked Questions', 'Merchant Services FAQ', NULL, NULL, NULL, '{"faqs": [{"answer": "Senverse Merchant Services cung cấp giải pháp xử lý thanh toán an toàn được tích hợp với Senverse POS, giúp salon quản lý checkout, thanh toán, tiền tip và báo cáo giao dịch trên một hệ thống kết nối.", "question": "Senverse Merchant Services là gì?"}, {"answer": "Senverse hướng đến chính sách chi phí rõ ràng và minh bạch, giúp bạn dễ dàng nắm được chi phí xử lý thanh toán mà không gặp các khoản phí ẩn bất ngờ.", "question": "Có phí ẩn không?"}, {"answer": "Salon có thể chấp nhận các loại thẻ tín dụng và thẻ ghi nợ phổ biến, thanh toán không tiếp xúc, ví điện tử được hỗ trợ, thẻ quà tặng và các phương thức thanh toán khả dụng khác.", "question": "Tôi có thể chấp nhận những phương thức thanh toán nào?"}, {"answer": "Có. Merchant Services kết nối trực tiếp với Senverse POS, giúp thanh toán, tiền tip, checkout và dữ liệu giao dịch được quản lý trên cùng một hệ thống.", "question": "Merchant Services có tích hợp với Senverse POS không?"}, {"answer": "Thời gian nhận tiền có thể thay đổi tùy theo tài khoản merchant, ngân hàng và lịch xử lý giao dịch. Đội ngũ Senverse sẽ cung cấp thông tin cụ thể cho tài khoản của bạn.", "question": "Bao lâu tôi sẽ nhận được tiền về tài khoản?"}, {"answer": "Có. Bạn có thể xem lịch sử giao dịch, theo dõi thanh toán và tiền gửi, quản lý hoàn tiền và xem báo cáo thanh toán thông qua hệ thống Senverse được kết nối.", "question": "Tôi có thể theo dõi thanh toán và hoàn tiền không?"}]}', '2026-08-21 00:16:48', '2026-08-21 00:16:48'),
	(46, 23, 'en', 'Frequently Asked Questions', 'Merchant Services FAQ', NULL, NULL, NULL, '{"faqs": [{"answer": "Senverse Merchant Services provides secure payment processing integrated with Senverse POS, helping salons manage checkout, payments, tips, and transaction reporting in one connected system.", "question": "What is Senverse Merchant Services?"}, {"answer": "Senverse focuses on clear and transparent pricing, so you can understand your payment processing costs without unexpected hidden charges.", "question": "Are there any hidden fees?"}, {"answer": "Accept major credit and debit cards, contactless payments, supported digital wallets, gift cards, and other available payment options.", "question": "What payment methods can I accept?"}, {"answer": "Yes. Merchant Services connects directly with Senverse POS, allowing payments, tips, checkout, and transaction data to stay connected in one system.", "question": "Does Merchant Services integrate with Senverse POS?"}, {"answer": "Deposit timing may vary depending on your merchant account, bank, and processing schedule. Our team can provide specific funding details for your account.", "question": "How quickly will I receive my deposits?"}, {"answer": "Yes. You can review transaction history, track payments and deposits, manage refunds, and access payment reporting through the connected Senverse system.", "question": "Can I track payments and refunds?"}]}', '2026-08-21 00:16:48', '2026-08-21 00:16:48'),
	(47, 24, 'vi', 'Ready to Simplify Your Payments?', 'Connect Senverse Merchant Services with your POS and manage payments, checkout, tips, and reporting in one seamless system.', NULL, 'Talk to Our Team', '/contact', NULL, '2026-08-21 00:29:23', '2026-08-21 00:29:23'),
	(48, 24, 'en', NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-21 00:29:23', '2026-08-21 00:29:23'),
	(49, 25, 'vi', 'Biến Social Media Thành Tăng Trưởng Thực Tế Cho Salon', 'VÌ SAO SOCIAL MEDIA QUAN TRỌNG', '<p>Kh&aacute;ch h&agrave;ng đang t&igrave;m kiếm v&agrave; kh&aacute;m ph&aacute; c&aacute;c salon trực tuyến mỗi ng&agrave;y. Ch&uacute;ng t&ocirc;i gi&uacute;p salon duy tr&igrave; sự hiện diện, x&acirc;y dựng niềm tin, tiếp cận th&ecirc;m kh&aacute;ch h&agrave;ng địa phương v&agrave; biến nội dung th&agrave;nh cơ hội đặt lịch.</p>', NULL, NULL, '{"features": [{"icon": "fa-solid fa-eye", "title": "Duy Trì Hiện Diện", "description": "Giúp salon luôn xuất hiện với nội dung chuyên nghiệp và nhất quán."}, {"icon": "fa-regular fa-heart", "title": "Xây Dựng Niềm Tin", "description": "Giới thiệu chất lượng dịch vụ, không gian salon và kết quả thực tế."}, {"icon": "fa-solid fa-location-dot", "title": "Tiếp Cận Khách Địa Phương", "description": "Kết nối với những người đang tìm dịch vụ Nail trong khu vực."}, {"icon": "fa-regular fa-calendar-check", "title": "Tăng Cơ Hội Đặt Lịch", "description": "Biến sự chú ý và tương tác thành những cơ hội đặt lịch thực tế."}]}', '2026-08-21 02:41:44', '2026-08-27 20:56:58'),
	(50, 25, 'en', 'Turn Social Media Into Real Salon Growth', 'WHY SOCIAL MEDIA MATTERS', '<p>Your customers are already discovering salons online. We help your salon stay visible, build trust, reach more local customers, and turn everyday content into more booking opportunities.</p>', NULL, NULL, '{"features": [{"icon": "fa-solid fa-eye", "title": "Stay Visible", "description": "Keep your salon active and visible with consistent, professional content."}, {"icon": "fa-regular fa-heart", "title": "Build Trust", "description": "Showcase your work, salon experience, and customer results."}, {"icon": "fa-solid fa-location-dot", "title": "Reach Local Customers", "description": "Connect with people searching for nail services in your area."}, {"icon": "fa-regular fa-calendar-check", "title": "Drive More Bookings", "description": "Turn attention and engagement into real appointment opportunities."}]}', '2026-08-21 02:41:44', '2026-08-27 20:56:58'),
	(51, 26, 'vi', 'Mọi Thứ Salon Cần Để Duy Trì Social Media', 'DỊCH VỤ SOCIAL MEDIA', '<p>Từ sản xuất nội dung đến đăng b&agrave;i v&agrave; tối ưu hiệu quả, ch&uacute;ng t&ocirc;i quản l&yacute; c&aacute;c c&ocirc;ng việc cần thiết để salon lu&ocirc;n hiện diện chuy&ecirc;n nghiệp tr&ecirc;n Social Media.</p>', NULL, NULL, '[{"icon": "fa-solid fa-photo-film", "title": "Sản Xuất Nội Dung", "description": "Biến hình ảnh và video từ salon thành nội dung Social Media chỉn chu, chuyên nghiệp."}, {"icon": "fa-solid fa-video", "title": "Reels & Video Ngắn", "description": "Biên tập video từ salon thành nội dung ngắn hấp dẫn, thu hút sự chú ý."}, {"icon": "fa-solid fa-pen-to-square", "title": "Caption & Hashtag", "description": "Xây dựng caption và hashtag phù hợp với salon và nhóm khách hàng địa phương."}, {"icon": "fa-regular fa-calendar-check", "title": "Lên Lịch & Đăng Bài", "description": "Duy trì lịch đăng nhất quán trên các nền tảng Social Media đã lựa chọn."}, {"icon": "fa-solid fa-bullhorn", "title": "Khuyến Mãi & Chiến Dịch", "description": "Quảng bá dịch vụ, ưu đãi theo mùa, sự kiện và các khung giờ còn trống."}, {"icon": "fa-solid fa-chart-line", "title": "Tối Ưu Hiệu Quả", "description": "Theo dõi kết quả và liên tục cải thiện chiến lược Social Media."}]', '2026-08-21 02:54:02', '2026-08-27 21:05:49'),
	(52, 26, 'en', 'Everything Your Salon Needs to Stay Social', 'OUR SOCIAL MEDIA SERVICES', '<p>From content creation to publishing and optimization, we manage the work required to keep your salon active and professional online.</p>', NULL, NULL, '[{"icon": "fa-solid fa-photo-film", "title": "Content Creation", "description": "Turn your salon photos and videos into polished, professional social media content."}, {"icon": "fa-solid fa-video", "title": "Reels & Short Videos", "description": "Transform your salon footage into engaging short-form videos designed to attract attention."}, {"icon": "fa-solid fa-pen-to-square", "title": "Captions & Hashtags", "description": "Create engaging captions and relevant hashtags tailored to your salon and local audience."}, {"icon": "fa-regular fa-calendar-check", "title": "Scheduling & Publishing", "description": "Maintain consistent posting across your selected social media platforms."}, {"icon": "fa-solid fa-bullhorn", "title": "Promotions & Campaigns", "description": "Promote salon services, seasonal offers, events, and available appointment times."}, {"icon": "fa-solid fa-chart-line", "title": "Performance Optimization", "description": "Review content performance and continuously improve your social media strategy."}]', '2026-08-21 02:54:02', '2026-08-27 21:05:49'),
	(53, 27, 'vi', 'Quy Trình Đơn Giản - Tăng Trưởng Nhất Quán.', 'QUY TRÌNH TRIỂN KHAI', '<p>Ch&uacute;ng t&ocirc;i quản l&yacute; Social Media theo một quy tr&igrave;nh phối hợp r&otilde; r&agrave;ng, để salon tập trung phục vụ kh&aacute;ch h&agrave;ng.</p>', NULL, NULL, '{"steps": [{"icon": "fa-solid fa-lightbulb", "title": "Lập Kế Hoạch", "number": "01", "description": "Tìm hiểu salon, dịch vụ, khách hàng, chương trình khuyến mãi và mục tiêu kinh doanh."}, {"icon": "fa-solid fa-photo-film", "title": "Sản Xuất Nội Dung", "number": "02", "description": "Salon gửi hình ảnh và video. Chúng tôi biên tập thành thiết kế, caption và nội dung ngắn."}, {"icon": "fa-solid fa-circle-check", "title": "Duyệt Nội Dung", "number": "03", "description": "Salon xem trước và yêu cầu điều chỉnh trước khi bất kỳ nội dung nào được đăng."}, {"icon": "fa-solid fa-chart-line", "title": "Đăng & Tối Ưu", "number": "04", "description": "Chúng tôi lên lịch, đăng bài, theo dõi kết quả và cải thiện nội dung dựa trên dữ liệu."}]}', '2026-08-21 03:05:43', '2026-08-27 21:08:29'),
	(54, 27, 'en', 'Simple Process - Consistent Growth', 'HOW IT WORKS', '<p>We manage your social media through a clear, collaborative process, so your salon can stay focused on serving customers.</p>', NULL, NULL, '{"steps": [{"icon": "fa-solid fa-lightbulb", "title": "Plan", "number": "01", "description": "We learn about your salon, services, audience, promotions, and business goals."}, {"icon": "fa-solid fa-photo-film", "title": "Create", "number": "02", "description": "You send salon photos and videos. We turn them into graphics, captions, and short-form content."}, {"icon": "fa-solid fa-circle-check", "title": "Review & Approve", "number": "03", "description": "You review the content and request changes before anything is published."}, {"icon": "fa-solid fa-chart-line", "title": "Publish & Optimize", "number": "04", "description": "We schedule, publish, track performance, and improve content based on results."}]}', '2026-08-21 03:05:43', '2026-08-27 21:08:29'),
	(55, 28, 'vi', 'Không Chỉ Là Quản Lý Social Media', 'Vì Sao Chọn Senverse', '<p>Social Media hiệu quả hơn khi được kết nối với to&agrave;n bộ hoạt động của salon. Senverse kết hợp nội dung, chương tr&igrave;nh khuyến m&atilde;i, đặt lịch trực tuyến v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng để biến sự ch&uacute; &yacute; th&agrave;nh tăng trưởng c&oacute; thể đo lường.</p>', 'Learn More', '/about-us', '{"features": ["Kết nối Social Media với website và chương trình khuyến mãi", "Điều hướng khách hàng trực tiếp đến trang đặt lịch", "Duy trì hình ảnh thương hiệu nhất quán trên mọi kênh", "Biến khách hàng mới thành khách hàng trung thành"]}', '2026-08-21 03:15:01', '2026-08-27 21:24:20'),
	(56, 28, 'en', 'More Than Just Social Media', 'Why Choose Senverse', '<p>Social media works better when it connects with the rest of your salon. Senverse brings content, promotions, online booking, and customer engagement together to turn attention into measurable growth.</p>', 'Learn More', '/about', '{"features": ["Connect social media with your website and promotions", "Guide customers directly to online booking", "Turn new visitors into long-term customers", "Build a connected system designed for growth"]}', '2026-08-21 03:15:01', '2026-08-27 21:24:20'),
	(57, 29, 'vi', 'Chọn Gói Phù Hợp Với Salon Của Bạn', 'CÁC GÓI SOCIAL MEDIA', '<p>C&aacute;c giải ph&aacute;p Social Media v&agrave; Digital Marketing linh hoạt, được thiết kế ph&ugrave; hợp với mục ti&ecirc;u v&agrave; từng giai đoạn ph&aacute;t triển của salon.</p>', NULL, NULL, '{"plans": [{"name": "Social Media Essentials", "price": "", "active": false, "period": "", "features": ["Quản Lý Facebook", "Quản Lý Instagram", "Lập Kế Hoạch Nội Dung Hàng Tháng", "Thiết Kế Hình Ảnh", "Caption & Hashtag", "Quản Lý Tương Tác", "4 Bài Organic / Tuần", "Báo Cáo Hiệu Quả Hàng Tháng"], "button_link": "/contact", "button_text": "Yêu Cầu Báo Giá", "description": "Xây dựng và duy trì sự hiện diện Social Media chuyên nghiệp.", "features_title": "Tính Năng Chính"}, {"name": "Social Media Growth", "price": "", "active": true, "period": "", "features": ["Quản Lý Facebook", "Quản Lý Instagram", "Lập Kế Hoạch Nội Dung Hàng Tháng", "Thiết Kế Hình Ảnh", "Caption & Hashtag", "Biên Tập Video Ngắn", "Quản Lý Tương Tác", "7 Bài Organic / Tuần", "Quản Lý Quảng Cáo Meta", "Tối Ưu Quảng Cáo & Remarketing", "Báo Cáo Hiệu Quả Hàng Tháng", "Họp Chiến Lược Hàng Tháng"], "button_link": "/contact", "button_text": "Yêu Cầu Báo Giá", "description": "Tiếp cận thêm khách hàng địa phương và tạo nhiều cơ hội đặt lịch.", "features_title": "Tính Năng Chính"}, {"name": "Digital Growth", "price": "", "active": false, "period": "", "features": ["Bao Gồm Social Media Growth", "Quản Lý Facebook & Instagram", "7 Bài Organic / Tuần", "Quản Lý Quảng Cáo Meta", "Tối Ưu Quảng Cáo & Remarketing", "SEO Website", "2 Bài Viết SEO / Tuần", "Quản Lý Google Business Profile", "1 Google Business Post / Tuần", "Tối Ưu Tìm Kiếm Địa Phương", "Báo Cáo Hiệu Quả Hàng Tháng", "Họp Chiến Lược Hàng Tháng"], "button_link": "/contact", "button_text": "Yêu Cầu Báo Giá", "description": "Kết nối Social Media, SEO và Local Marketing để tăng trưởng bền vững.", "features_title": "Tính Năng Chính"}]}', '2026-08-21 03:36:31', '2026-08-27 21:29:48'),
	(58, 29, 'en', 'Choose the Right Plan for Your Salon', 'SOCIAL MEDIA PLANS', '<p>Flexible social media and digital marketing solutions designed to match your salon&rsquo;s goals and stage of growth.</p>', NULL, NULL, '{"plans": [{"name": "Social Media Essentials", "price": "", "active": false, "period": "", "features": ["Facebook Management", "Instagram Management", "Monthly Content Planning", "Graphic Design", "Captions & Hashtags", "Community Management", "4 Organic Posts / Week", "Monthly Performance Report"], "button_link": "/contact", "button_text": "Request a Quote", "description": "Build and maintain a professional social media presence.", "features_title": "Key Features"}, {"name": "Social Media Growth", "price": "", "active": true, "period": "", "features": ["Facebook Management", "Instagram Management", "Monthly Content Planning", "Graphic Design", "Captions & Hashtags", "Short-Form Video Editing", "Community Management", "7 Organic Posts / Week", "Meta Ads Management", "Ads Optimization & Remarketing", "Monthly Performance Report", "Monthly Strategy Meeting"], "button_link": "/contact", "button_text": "Request a Quote", "description": "Reach more local customers and create more booking opportunities.", "features_title": "Key Features"}, {"name": "Digital Growth", "price": "", "active": false, "period": "", "features": ["Everything in Social Media Growth", "Facebook & Instagram Management", "7 Organic Posts / Week", "Meta Ads Management", "Ads Optimization & Remarketing", "Website SEO", "2 SEO Content Posts / Week", "Google Business Profile Management", "1 Google Business Post / Week", "Local Search Optimization", "Monthly Performance Report", "Monthly Strategy Meeting"], "button_link": "/contact", "button_text": "Request a Quote", "description": "Connect social media, SEO, and local marketing for sustainable growth.", "features_title": "Key Features"}]}', '2026-08-21 03:36:31', '2026-08-27 21:29:48'),
	(59, 30, 'vi', 'Bạn Có Thắc Mắc Về Social Media Marketing?', 'CÂU HỎI THƯỜNG GẶP', NULL, NULL, NULL, '{"faqs": [{"answer": "Các gói Social Media bao gồm quản lý Facebook và Instagram, từ lập kế hoạch nội dung, đăng bài đến quản lý tài khoản thường xuyên.", "question": "Bạn quản lý những nền tảng Social Media nào?"}, {"answer": "Có. Salon cung cấp hình ảnh và video gốc, đội ngũ của chúng tôi sẽ biên tập thành thiết kế, caption, hashtag và video ngắn chuyên nghiệp. Salon có thể xem và duyệt nội dung trước khi đăng.", "question": "Bạn có sản xuất nội dung cho salon không?"}, {"answer": "Tần suất đăng phụ thuộc vào từng gói. Social Media Essentials gồm 4 bài organic mỗi tuần; Social Media Growth và Digital Growth gồm 7 bài organic mỗi tuần.", "question": "Nội dung được đăng bao nhiêu lần mỗi tuần?"}, {"answer": "Có. Quản lý Meta Ads, tối ưu quảng cáo và remarketing được bao gồm trong gói Social Media Growth và Digital Growth. Ngân sách chạy quảng cáo được tính riêng với phí dịch vụ.", "question": "Bạn có quản lý quảng cáo Facebook và Instagram không?"}, {"answer": "Social Media có thể tạo thêm cơ hội đặt lịch bằng cách kết nối nội dung và chương trình khuyến mãi với website và trang đặt lịch trực tuyến. Kết quả phụ thuộc vào thị trường, ưu đãi, chất lượng nội dung và chiến lược quảng cáo.", "question": "Social Media có thể giúp salon tăng lịch hẹn không?"}, {"answer": "Có. Báo cáo hàng tháng giúp salon theo dõi hiệu quả nội dung, hoạt động của khách hàng, kết quả chiến dịch và các cơ hội cần cải thiện.", "question": "Tôi có nhận được báo cáo hiệu quả không?"}]}', '2026-08-21 18:28:28', '2026-08-27 21:37:26'),
	(60, 30, 'en', 'Questions About Social Media Marketing?', 'FREQUENTLY ASKED QUESTIONS', NULL, NULL, NULL, '{"faqs": [{"answer": "Our Social Media plans include Facebook and Instagram management, including content planning, publishing, and ongoing account management.", "question": "Which social media platforms do you manage?"}, {"answer": "Yes. Your salon provides the original photos and videos, and our team transforms them into professional graphics, captions, hashtags, and short-form content. You can review and approve content before it is published.", "question": "Do you create the content for my salon?"}, {"answer": "Posting frequency depends on your plan. Social Media Essentials includes 4 organic posts per week, while Social Media Growth and Digital Growth include 7 organic posts per week.", "question": "How often will you post on social media?"}, {"answer": "Yes. Meta Ads Management, optimization, and remarketing are included with Social Media Growth and Digital Growth. Advertising spend is separate from the service fee.", "question": "Do you manage Facebook and Instagram ads?"}, {"answer": "Social media can create more booking opportunities by connecting professional content and promotions with your website and online booking experience. Results depend on your market, offer, content quality, and advertising strategy.", "question": "Can social media help generate more salon bookings?"}, {"answer": "Yes. Monthly reporting is included so you can review content performance, audience activity, campaign results, and opportunities for improvement.", "question": "Will I receive performance reports?"}]}', '2026-08-21 18:28:28', '2026-08-27 21:37:26'),
	(61, 31, 'vi', 'Ready to Grow Your Salon on Social Media?', 'Build a stronger online presence, reach more local customers, and turn social media into real opportunities for your salon.', NULL, 'Get Started', '/contact', NULL, '2026-08-21 18:46:02', '2026-08-21 18:46:02'),
	(62, 31, 'en', NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-21 18:46:02', '2026-08-21 18:46:02'),
	(63, 32, 'vi', 'Công nghệ được xây dựng dựa trên quy trình vận hành salon của bạn', NULL, NULL, NULL, NULL, NULL, '2026-08-21 20:35:58', '2026-08-27 21:54:54'),
	(64, 32, 'en', 'Technology Built Around the Way Your Salon Works', 'About Senverse', NULL, NULL, NULL, NULL, '2026-08-21 20:35:58', '2026-08-27 21:54:54'),
	(65, 33, 'vi', 'Sứ Mệnh', NULL, '<p>Sứ mệnh của Senverse l&agrave; gi&uacute;p chủ Nail Salon vận h&agrave;nh th&ocirc;ng minh hơn, ph&aacute;t triển tự tin hơn v&agrave; giảm thời gian xử l&yacute; những c&ocirc;ng việc phức tạp kh&ocirc;ng cần thiết. Ch&uacute;ng t&ocirc;i kết nối POS, thanh to&aacute;n, marketing v&agrave; c&aacute;c c&ocirc;ng cụ AI trong một hệ sinh th&aacute;i được x&acirc;y dựng theo c&aacute;ch salon thực sự hoạt động.</p>\r\n\r\n<p>Từ vận h&agrave;nh hằng ng&agrave;y v&agrave; quản l&yacute; lịch hẹn đến chăm s&oacute;c kh&aacute;ch h&agrave;ng v&agrave; tăng trưởng d&agrave;i hạn, Senverse cung cấp c&ocirc;ng nghệ c&ugrave;ng sự hỗ trợ cần thiết để chủ salon lu&ocirc;n kiểm so&aacute;t tốt hoạt động v&agrave; đưa doanh nghiệp tiến về ph&iacute;a trước.</p>', NULL, NULL, NULL, '2026-08-21 20:43:38', '2026-08-27 23:21:40'),
	(66, 33, 'en', 'Our Mission', NULL, '<p>Our mission is to help nail salon owners operate smarter, grow with confidence, and spend less time managing unnecessary complexity. Senverse brings POS, payments, marketing, and AI-powered tools together in one connected ecosystem built around the way salons actually work.</p>\r\n\r\n<p>From daily operations and appointments to customer engagement and long-term growth, we provide the technology and support salon owners need to stay in control and move their businesses forward.</p>', NULL, NULL, NULL, '2026-08-21 20:43:38', '2026-08-27 23:21:40'),
	(67, 34, 'vi', 'Những Giá Trị Tạo Nên Mọi Giải Pháp', 'GIÁ TRỊ CỐT LÕI', NULL, NULL, NULL, '[{"icon": "assets/frontend/images/about/icons/01.svg", "title": "Đổi Mới", "description": "Chúng tôi ứng dụng công nghệ, tự động hóa và AI để việc quản lý salon thông minh, nhanh chóng và hiệu quả hơn."}, {"icon": "assets/frontend/images/about/icons/02.svg", "title": "Tập Trung Vào Salon", "description": "Mọi giải pháp đều bắt đầu từ nhu cầu thực tế của chủ salon, thợ, nhân viên và khách hàng."}, {"icon": "assets/frontend/images/about/icons/03.svg", "title": "Đơn Giản", "description": "Chúng tôi biến công nghệ mạnh mẽ thành những công cụ dễ hiểu, dễ sử dụng và dễ quản lý mỗi ngày."}, {"icon": "assets/frontend/images/about/icons/04.svg", "title": "Đáng Tin Cậy", "description": "Chúng tôi cung cấp công nghệ ổn định và dịch vụ hỗ trợ đáng tin cậy để chủ salon luôn an tâm vận hành."}, {"icon": "assets/frontend/images/about/icons/05.svg", "title": "Tăng Trưởng", "description": "Chúng tôi giúp salon thu hút khách hàng, xây dựng lòng trung thành và tạo ra sự tăng trưởng bền vững."}]', '2026-08-21 20:48:53', '2026-08-27 23:31:52'),
	(68, 34, 'en', 'OUR CORE VALUES', 'The Values Behind Everything We Build', NULL, NULL, NULL, '[{"icon": "assets/frontend/images/about/icons/01.svg", "title": "Innovation", "description": "We use technology, automation, and AI to make salon management smarter, faster, and more efficient."}, {"icon": "assets/frontend/images/about/icons/02.svg", "title": "Salon-Focused", "description": "Every solution starts with the real needs of salon owners, technicians, staff, and customers."}, {"icon": "assets/frontend/images/about/icons/03.svg", "title": "Simplicity", "description": "We turn powerful technology into tools that are easy to understand, use, and manage every day."}, {"icon": "assets/frontend/images/about/icons/04.svg", "title": "Reliability", "description": "We provide stable technology and dependable support that salon owners can count on."}, {"icon": "assets/frontend/images/about/icons/05.svg", "title": "Growth", "description": "We help salons attract customers, build loyalty, and create sustainable long-term growth."}]', '2026-08-21 20:48:53', '2026-08-27 23:31:30'),
	(69, 35, 'vi', 'Từ Thấu Hiểu Đến Đồng Hành Tăng Trưởng', 'CÁCH CHÚNG TÔI LÀM VIỆC', NULL, NULL, NULL, '{"steps": [{"title": "Tìm Hiểu", "description": "Chúng tôi tìm hiểu hoạt động, khó khăn, mục tiêu và những công cụ salon đang sử dụng."}, {"title": "Lập Kế Hoạch", "description": "Chúng tôi đề xuất giải pháp POS, thanh toán, marketing và tự động hóa phù hợp với salon."}, {"title": "Triển Khai", "description": "Đội ngũ Senverse cấu hình giải pháp, chuyển dữ liệu cần thiết và hướng dẫn nhân viên sử dụng."}, {"title": "Hỗ Trợ & Tăng Trưởng", "description": "Chúng tôi tiếp tục hỗ trợ và giúp salon khai thác Senverse hiệu quả trong quá trình phát triển."}]}', '2026-08-21 20:54:52', '2026-08-27 23:45:13'),
	(70, 35, 'en', 'From Understanding to Ongoing Growth', 'HOW WE WORK', NULL, NULL, NULL, '{"steps": [{"title": "Understand", "description": "We learn about your salon’s operations, challenges, goals, and the tools you currently use."}, {"title": "Plan", "description": "We recommend the right combination of POS, payments, marketing, and automation for your needs."}, {"title": "Implement", "description": "Our team configures your solutions, transfers essential data, and guides your staff through setup."}, {"title": "Support & Grow", "description": "We provide ongoing support and help you get more value from Senverse as your salon grows."}]}', '2026-08-21 20:54:52', '2026-08-27 23:45:13'),
	(71, 36, 'vi', 'Ready to Build a Smarter Salon?', 'Discover how Senverse brings technology, payments, marketing, and AI together to help your salon operate smarter and grow with confidence.', NULL, 'Book a Demo', '/book-demo', NULL, '2026-08-21 21:01:05', '2026-08-21 21:01:05'),
	(72, 36, 'en', 'Ready to Build a Smarter Salon?', 'Discover how Senverse brings technology, payments, marketing, and AI together to help your salon operate smarter and grow with confidence.', NULL, 'Book a Demo', '/book-demo', NULL, '2026-08-21 21:01:05', '2026-08-21 21:01:05'),
	(73, 37, 'vi', 'Get in Touch', 'If you have any questions or require assistance, please complete the form on this page.', NULL, NULL, NULL, NULL, '2026-08-21 21:30:06', '2026-08-21 21:30:06'),
	(74, 37, 'en', NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-21 21:30:06', '2026-08-21 21:30:06'),
	(75, 38, 'vi', 'Biến Lượt Tìm Kiếm Địa Phương Thành Khách Đến Salon', 'TẠI SAO LOCAL SEO QUAN TRỌNG', '<p>Hầu hết kh&aacute;ch h&agrave;ng đều t&igrave;m kiếm tr&ecirc;n Google trước khi lựa chọn salon Nail. Senverse gi&uacute;p salon xuất hiện trong c&aacute;c kết quả t&igrave;m kiếm ph&ugrave; hợp, x&acirc;y dựng niềm tin v&agrave; biến lượt t&igrave;m kiếm gần bạn th&agrave;nh cuộc gọi, chỉ đường v&agrave; lịch hẹn.</p>', NULL, NULL, '{"features": [{"icon": "fa-solid fa-location-dot", "title": "Được Tìm Thấy Gần Đây", "description": "Giúp khách hàng trong khu vực tìm thấy salon trên Google Search và Google Maps."}, {"icon": "fa-regular fa-star", "title": "Xây Dựng Niềm Tin", "description": "Nâng cao uy tín bằng đánh giá, hình ảnh và hồ sơ doanh nghiệp được tối ưu."}, {"icon": "fa-solid fa-arrow-pointer", "title": "Tăng Hành Động Của Khách", "description": "Tạo thêm cuộc gọi, lượt chỉ đường, truy cập website và nhấp đặt lịch."}, {"icon": "fa-regular fa-calendar-check", "title": "Tăng Lịch Hẹn", "description": "Biến khả năng hiển thị địa phương thành nhiều lịch hẹn và khách đến salon hơn."}]}', '2026-08-28 02:51:06', '2026-08-28 02:51:06'),
	(76, 38, 'en', 'Turn Local Searches Into Salon Visits', 'WHY LOCAL SEO MATTERS', '<p>Most customers search on Google before choosing a nail salon. Senverse helps your salon appear in relevant local searches, build customer trust, and turn nearby searches into calls, directions, and appointments</p>', NULL, NULL, '{"features": [{"icon": "fa-solid fa-location-dot", "title": "Get Found Nearby", "description": "Help nearby customers discover your salon on Google Search and Maps."}, {"icon": "fa-regular fa-star", "title": "Build Customer Trust", "description": "Strengthen your reputation with reviews, photos, and an optimized business profile."}, {"icon": "fa-solid fa-arrow-pointer", "title": "Increase Customer Actions", "description": "Generate more calls, directions, website visits, and booking clicks."}, {"icon": "fa-regular fa-calendar-check", "title": "Drive More Appointments", "description": "Turn stronger local visibility into more bookings and salon visits."}]}', '2026-08-28 02:51:06', '2026-08-28 02:51:06'),
	(77, 39, 'vi', 'Mọi Thứ Salon Cần Để Xếp Hạng Tại Địa Phương', 'DỊCH VỤ LOCAL SEO', '<p>Ch&uacute;ng t&ocirc;i quản l&yacute; những hoạt động cần thiết để tăng khả năng hiển thị, độ uy t&iacute;n v&agrave; hiệu quả của salon tr&ecirc;n Google Search v&agrave; Google Maps.</p>', NULL, NULL, '[{"icon": "fa-solid fa-store", "title": "Tối Ưu Hồ Sơ Doanh Nghiệp", "description": "Tối ưu thông tin salon, danh mục, dịch vụ, mô tả, thuộc tính và phần hỏi đáp."}, {"icon": "fa-solid fa-magnifying-glass-location", "title": "Chiến Lược Từ Khóa Địa Phương", "description": "Tối ưu từ khóa Near Me, dịch vụ và ZIP Code mà khách hàng trong khu vực tìm kiếm."}, {"icon": "fa-regular fa-images", "title": "Google Posts & Hình Ảnh", "description": "Duy trì hồ sơ bằng hình ảnh salon, cập nhật dịch vụ, ưu đãi và Google Posts."}, {"icon": "fa-regular fa-star", "title": "Quản Lý Đánh Giá", "description": "Xây dựng niềm tin bằng chiến lược thu thập đánh giá và quản lý phản hồi chuyên nghiệp."}, {"icon": "fa-solid fa-building", "title": "Danh Bạ & Uy Tín Địa Phương", "description": "Củng cố sự hiện diện địa phương thông qua danh bạ doanh nghiệp và xây dựng thực thể."}, {"icon": "fa-solid fa-chart-line", "title": "Theo Dõi & Báo Cáo", "description": "Theo dõi thứ hạng, cuộc gọi, chỉ đường, lượt truy cập website, đối thủ và tăng trưởng."}]', '2026-08-28 02:54:17', '2026-08-28 02:58:36'),
	(78, 39, 'en', 'Everything Your Salon Needs to Rank Locally', 'OUR LOCAL SEO SERVICES', '<p>We manage the essential activities needed to strengthen your salon&rsquo;s visibility, authority, and performance on Google Search and Maps.</p>', NULL, NULL, '[{"icon": "fa-solid fa-store", "title": "Business Profile Optimization", "description": "Optimize your salon information, categories, services, description, attributes, and Q&A."}, {"icon": "fa-solid fa-magnifying-glass-location", "title": "Local Keyword Strategy", "description": "Target Near Me, service, and ZIP Code keywords used by customers searching nearby."}, {"icon": "fa-regular fa-images", "title": "Google Posts & Photos", "description": "Keep your profile active with salon photos, service updates, promotions, and Google Posts."}, {"icon": "fa-regular fa-star", "title": "Review Management", "description": "Build customer trust with a consistent review strategy and professional feedback management."}, {"icon": "fa-solid fa-building", "title": "Listings & Local Authority", "description": "Strengthen your salon’s local presence through business listings and entity building."}, {"icon": "fa-solid fa-chart-line", "title": "Tracking & Reporting", "description": "Track rankings, calls, directions, website clicks, competitors, and local search growth."}]', '2026-08-28 02:54:17', '2026-08-28 02:58:36'),
	(79, 40, 'vi', 'Quy Trình Đơn Giản Để Tăng Trưởng Địa Phương', 'QUY TRÌNH TRIỂN KHAI', '<p>Ch&uacute;ng t&ocirc;i x&acirc;y dựng nền tảng Local SEO, củng cố uy t&iacute;n v&agrave; li&ecirc;n tục tối ưu hiệu quả t&igrave;m kiếm địa phương cho salon</p>', NULL, NULL, '{"steps": [{"icon": "fa-solid fa-magnifying-glass", "title": "Kiểm Tra & Nghiên Cứu", "number": "01", "description": "Phân tích hồ sơ doanh nghiệp, đối thủ, thứ hạng hiện tại và cơ hội tìm kiếm địa phương."}, {"icon": "fa-solid fa-store", "title": "Tối Ưu Hồ Sơ", "number": "02", "description": "Tối ưu thông tin doanh nghiệp, danh mục, dịch vụ, nội dung, hình ảnh và từ khóa mục tiêu."}, {"icon": "fa-solid fa-building", "title": "Xây Dựng Uy Tín", "number": "03", "description": "Củng cố niềm tin qua đánh giá, Google Posts, danh bạ doanh nghiệp và xây dựng thực thể."}, {"icon": "fa-solid fa-chart-line", "title": "Theo Dõi & Cải Thiện", "number": "04", "description": "Theo dõi thứ hạng và hành động của khách hàng để liên tục cải thiện chiến lược Local SEO."}]}', '2026-08-28 03:01:42', '2026-08-28 03:01:42'),
	(80, 40, 'en', 'HOW IT WORKS', 'A Simple Process for Local Growth', '<p>We build and manage your salon&rsquo;s local SEO foundation, strengthen its authority, and continuously improve performance.</p>', NULL, NULL, '{"steps": [{"icon": "fa-solid fa-magnifying-glass", "title": "Audit & Research", "number": "01", "description": "Analyze your Business Profile, competitors, current rankings, and local search opportunities."}, {"icon": "fa-solid fa-store", "title": "Profile Optimization", "number": "02", "description": "Optimize your business information, categories, services, content, photos, and target keywords."}, {"icon": "fa-solid fa-building", "title": "Build Local Authority", "number": "03", "description": "Strengthen trust through reviews, Google Posts, business listings, and local entity building."}, {"icon": "fa-solid fa-chart-line", "title": "Track & Improve", "number": "04", "description": "Monitor rankings and customer actions, then continuously improve your Local SEO strategy."}]}', '2026-08-28 03:01:42', '2026-08-28 03:01:42'),
	(81, 41, 'vi', 'Không Chỉ Là Thứ Hạng Cao Hơn', 'Tại Sao Chọn Senverse', '<p>Local SEO kh&ocirc;ng chỉ gi&uacute;p salon xuất hiện tr&ecirc;n Google Maps. Ch&uacute;ng t&ocirc;i x&acirc;y dựng một chiến lược tăng trưởng địa phương to&agrave;n diện để salon dễ được t&igrave;m thấy, tạo dựng niềm tin v&agrave; trở th&agrave;nh lựa chọn của kh&aacute;ch h&agrave;ng</p>', NULL, NULL, '{"features": ["Xây dựng chiến lược theo salon và thị trường địa phương", "Tối ưu mức độ liên quan, khoảng cách và độ nổi bật", "Kết hợp đánh giá, nội dung và danh bạ doanh nghiệp", "Theo dõi thứ hạng, cuộc gọi, chỉ đường và lượt nhấp website"]}', '2026-08-28 03:10:17', '2026-08-28 03:10:17'),
	(82, 41, 'en', 'More Than Just Higher Rankings', 'Why Choose Senverse', '<p>Local SEO is not only about appearing on Google Maps. We build a complete local growth strategy that helps your salon become more visible, trusted, and easier to choose</p>', NULL, NULL, '{"features": ["Build a strategy around your salon and local market", "Optimize relevance, distance, and local prominence", "Connect reviews, content, and business listings", "Track rankings, calls, directions, and website clicks"]}', '2026-08-28 03:10:17', '2026-08-28 03:10:17'),
	(83, 42, 'vi', 'Chọn Gói Phù Hợp Cho Salon', 'CÁC GÓI LOCAL SEO & MAPS', NULL, NULL, NULL, '{"plans": [{"name": "Essential", "price": "$2,499", "active": false, "period": "", "features": ["Tối Ưu Google Business Profile", "Phân Tích Đối Thủ", "Từ Khóa Near Me", "4 Google Posts", "10 Lượt Cập Nhật Hình Ảnh", "Quản Lý Đánh Giá", "Danh Bạ Doanh Nghiệp & Xây Dựng Thực Thể", "Hơn 50 Hồ Sơ Doanh Nghiệp", "Báo Cáo Hằng Tháng"], "button_link": "/contact", "button_text": "Yêu Cầu Báo Giá", "description": "Xây dựng nền tảng Local SEO vững chắc cho salon mới.", "features_title": "Tính Năng Chính"}, {"name": "Professional", "price": "$4,499", "active": true, "period": "", "features": ["Bao Gồm Toàn Bộ Gói Essential", "8 Google Posts", "20 Lượt Cập Nhật Hình Ảnh", "Từ Khóa Near Me & Dịch Vụ", "Quản Lý Đánh Giá", "Danh Bạ Doanh Nghiệp & Xây Dựng Thực Thể", "Hơn 150 Hồ Sơ Doanh Nghiệp", "Theo Dõi Hiệu Suất", "Quản Lý Google Ads", "Báo Cáo Hằng Tháng"], "button_link": "/contact", "button_text": "Yêu Cầu Báo Giá", "description": "Mở rộng khả năng hiển thị và tạo thêm hành động từ khách hàng.", "features_title": "Tính Năng Chính"}, {"name": "Enterprise", "price": "$6,499", "active": false, "period": "", "features": ["Bao Gồm Toàn Bộ Gói Professional", "12 Google Posts", "30 Lượt Cập Nhật Hình Ảnh", "Từ Khóa Near Me, Dịch Vụ & ZIP Code", "Quản Lý Đánh Giá Nâng Cao", "Danh Bạ Doanh Nghiệp & Xây Dựng Thực Thể", "Hơn 300 Hồ Sơ Doanh Nghiệp", "Báo Cáo Hiệu Suất Nâng Cao", "Theo Dõi Đối Thủ", "Báo Cáo Chiến Lược Hằng Tháng"], "button_link": "/contact", "button_text": "Yêu Cầu Báo Giá", "description": "Mở rộng độ phủ địa phương và hỗ trợ tăng trưởng dài hạn.", "features_title": "Tính Năng Chính"}]}', '2026-08-28 03:13:46', '2026-08-28 03:13:46'),
	(84, 42, 'en', 'Choose the Right Plan for Your Salon', 'LOCAL SEO & MAPS PLANS', NULL, NULL, NULL, '{"plans": [{"name": "Essential", "price": "$2,499", "active": false, "period": "", "features": ["Google Business Profile Optimization", "Competitor Analysis", "Near Me Keywords", "4 Google Posts", "10 Photo Updates", "Review Management", "Business Listings & Entity Building", "50+ Business Profiles", "Monthly Reports"], "button_link": "/contact", "button_text": "Request a Quote", "description": "Build a strong Local SEO foundation for a new salon.", "features_title": "Key Features"}, {"name": "Professional", "price": "$4,499", "active": true, "period": "", "features": ["Everything in Essential", "8 Google Posts", "20 Photo Updates", "Near Me & Service Keywords", "Review Management", "Business Listings & Entity Building", "150+ Business Profiles", "Performance Tracking", "Google Ads Management", "Monthly Reports"], "button_link": "/contact", "button_text": "Request a Quote", "description": "Expand local visibility and generate more customer actions.", "features_title": "Key Features"}, {"name": "Enterprise", "price": "$6,499", "active": false, "period": "", "features": ["Everything in Professional", "12 Google Posts", "30 Photo Updates", "Near Me, Service & ZIP Code Keywords", "Advanced Review Management", "Business Listings & Entity Building", "300+ Business Profiles", "Advanced Performance Reports", "Competitor Monitoring", "Monthly Strategy Reports"], "button_link": "/contact", "button_text": "Request a Quote", "description": "Strengthen visibility across a wider local market for long-term growth.", "features_title": "Key Features"}]}', '2026-08-28 03:13:46', '2026-08-28 03:13:46'),
	(85, 43, 'vi', 'Câu Hỏi Về Local Boost?', 'CÂU HỎI THƯỜNG GẶP', NULL, NULL, NULL, '{"faqs": [{"answer": "Local SEO giúp salon xuất hiện nổi bật hơn khi khách hàng trong khu vực tìm kiếm dịch vụ Nail trên Google Search và Google Maps.", "question": "Local SEO cho salon Nail là gì?"}, {"answer": "Local SEO là một quá trình dài hạn. Phần lớn salon bắt đầu thấy cải thiện có thể đo lường trong khoảng 3 đến 6 tháng, tùy vào đối thủ, vị trí và tình trạng hồ sơ hiện tại.", "question": "Mất bao lâu để thấy kết quả?"}, {"answer": "Không công ty nào có thể đảm bảo một vị trí cụ thể trên Google Maps. Chúng tôi áp dụng chiến lược phù hợp để cải thiện khả năng hiển thị, mức độ liên quan, uy tín và hiệu suất tìm kiếm địa phương.", "question": "Senverse có đảm bảo Top 3 Google Maps không?"}, {"answer": "Có. Salon vẫn là chủ sở hữu Google Business Profile. Senverse chỉ nhận quyền truy cập phù hợp để quản lý và tối ưu hồ sơ.", "question": "Salon có giữ quyền sở hữu Google Business Profile không?"}, {"answer": "Chưa. Ngân sách quảng cáo không nằm trong các gói Local Boost. Google Maps Ads có thể được bổ sung dưới dạng dịch vụ tùy chọn.", "question": "Chi phí quảng cáo Google Maps đã được bao gồm chưa?"}, {"answer": "Có. Báo cáo có thể gồm thứ hạng, lượt xem hồ sơ, cuộc gọi, chỉ đường, lượt nhấp website, hành động của khách hàng, đối thủ và đề xuất tăng trưởng.", "question": "Tôi có nhận được báo cáo hiệu suất không?"}]}', '2026-08-28 03:17:27', '2026-08-28 03:17:27'),
	(86, 43, 'en', 'Questions About Local Boost?', 'FREQUENTLY ASKED QUESTIONS', NULL, NULL, NULL, '{"faqs": [{"answer": "Local SEO helps your salon appear more prominently when nearby customers search for nail services on Google Search and Maps.", "question": "What is Local SEO for nail salons?"}, {"answer": "Local SEO is a long-term process. Most salons begin seeing measurable improvements within 3 to 6 months, depending on competition, location, and current profile strength.", "question": "How long does it take to see results?"}, {"answer": "No company can guarantee a specific Google Maps position. We use proven strategies to improve visibility, relevance, authority, and overall local search performance.", "question": "Can you guarantee a Top 3 Google Maps ranking?"}, {"answer": "Yes. Your salon remains the owner of its Google Business Profile. Senverse only receives the appropriate access needed to manage and optimize it.", "question": "Do I keep ownership of my Google Business Profile?"}, {"answer": "No. Advertising costs are not included in the Local Boost packages. Google Maps Ads can be added as an optional service.", "question": "Are Google Maps advertising costs included?"}, {"answer": "Yes. Reports may include rankings, profile views, calls, directions, website clicks, customer actions, competitor performance, and growth recommendations.", "question": "Will I receive performance reports?"}]}', '2026-08-28 03:17:27', '2026-08-28 03:17:27'),
	(87, 44, 'vi', 'Sẵn Sàng Tiếp Cận Thêm Khách Hàng Địa Phương?', 'Xây dựng sự hiện diện mạnh mẽ hơn trên Google Search và Google Maps, tiếp cận khách hàng gần salon và biến lượt tìm kiếm thành cuộc gọi, chỉ đường và lịch hẹn.', NULL, 'Tăng Hiển Thị Cho Salon', '/contact', NULL, '2026-08-28 03:20:28', '2026-08-28 03:20:28'),
	(88, 44, 'en', 'Ready to Get Found by More Local Customers?', 'Build a stronger presence on Google Search and Maps, reach nearby customers, and turn local searches into more calls, directions, and appointments.', NULL, 'Boost My Salon', '/contact', NULL, '2026-08-28 03:20:28', '2026-08-28 03:20:28');

-- Dumping structure for table senverse.page_translations
CREATE TABLE IF NOT EXISTS `page_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_id` bigint unsigned NOT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_translations_page_id_locale_unique` (`page_id`,`locale`),
  CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.page_translations: ~8 rows (approximately)
DELETE FROM `page_translations`;
INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `title`, `subtitle`, `excerpt`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `og_title`, `og_description`, `created_at`, `updated_at`) VALUES
	(1, 1, 'vi', 'home', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-18 21:45:31', '2026-08-18 21:45:31'),
	(2, 2, 'vi', 'footer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 19:25:23', '2026-08-19 19:25:23'),
	(3, 3, 'vi', 'Pos System', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-20 01:14:24', '2026-08-20 01:14:24'),
	(4, 4, 'vi', 'Merchant Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-20 20:24:21', '2026-08-20 20:24:21'),
	(5, 4, 'en', 'Merchant Services', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-20 20:24:21', '2026-08-20 20:24:21'),
	(6, 5, 'vi', 'Social Media', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-21 02:37:49', '2026-08-21 02:42:27'),
	(7, 6, 'vi', 'About', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-21 20:27:56', '2026-08-21 20:27:56'),
	(8, 7, 'vi', 'Contact', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-21 21:29:27', '2026-08-21 21:29:27'),
	(9, 7, 'en', 'Contact', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-21 21:29:27', '2026-08-21 21:29:27'),
	(10, 8, 'vi', 'Local Boost', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-28 01:54:41', '2026-08-28 01:54:41');

-- Dumping structure for table senverse.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table senverse.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `author_id` bigint unsigned DEFAULT NULL,
  `thumbnail_id` bigint unsigned DEFAULT NULL,
  `banner_id` bigint unsigned DEFAULT NULL,
  `og_image_id` bigint unsigned DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `published_at` timestamp NULL DEFAULT NULL,
  `view_count` bigint unsigned NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `canonical_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_thumbnail_id_foreign` (`thumbnail_id`),
  KEY `posts_banner_id_foreign` (`banner_id`),
  KEY `posts_og_image_id_foreign` (`og_image_id`),
  KEY `posts_category_id_index` (`category_id`),
  KEY `posts_author_id_index` (`author_id`),
  KEY `posts_type_index` (`type`),
  KEY `posts_is_featured_index` (`is_featured`),
  KEY `posts_is_active_index` (`is_active`),
  KEY `posts_published_at_index` (`published_at`),
  KEY `posts_sort_order_index` (`sort_order`),
  CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_og_image_id_foreign` FOREIGN KEY (`og_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_thumbnail_id_foreign` FOREIGN KEY (`thumbnail_id`) REFERENCES `media` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.posts: ~13 rows (approximately)
DELETE FROM `posts`;
INSERT INTO `posts` (`id`, `category_id`, `author_id`, `thumbnail_id`, `banner_id`, `og_image_id`, `slug`, `type`, `published_at`, `view_count`, `is_featured`, `is_active`, `sort_order`, `canonical_url`, `schema_type`, `schema_data`, `created_at`, `updated_at`) VALUES
	(3, 15, 1, 31, NULL, NULL, 'amy-le-serenity-nail-studio', 'post', NULL, 0, 0, 0, 0, NULL, 'Article', NULL, '2026-08-19 03:02:00', '2026-08-26 21:27:01'),
	(4, 10, 1, 14, NULL, NULL, 'vi-sao-tiem-nail-can-he-thong-nhac-lich-tu-dong', 'post', '2026-08-21 09:52:00', 0, 0, 1, 0, NULL, 'Article', NULL, '2026-08-19 03:19:30', '2026-08-25 02:52:48'),
	(6, 10, 1, 14, NULL, NULL, 'quan-ly-hoa-hong-ky-thuat-vien-nail-chinh-xac-va-minh-bach', 'post', '2026-08-22 09:52:00', 6, 0, 1, 0, NULL, 'Article', NULL, '2026-08-19 03:20:10', '2026-08-25 02:52:36'),
	(7, 10, 1, 14, NULL, NULL, 'cach-tang-doanh-thu-tiem-nail-ma-khong-can-tang-ngan-sach-quang-cao', 'post', '2026-08-24 09:52:00', 25, 0, 1, 0, NULL, 'Article', NULL, '2026-08-19 03:20:34', '2026-08-25 03:24:40'),
	(8, 11, 1, NULL, NULL, NULL, 'senverse-co-ho-tro-dat-lich-truc-tuyen-khong', 'post', NULL, 0, 0, 1, 0, NULL, 'Article', NULL, '2026-08-19 18:37:21', '2026-08-19 18:37:21'),
	(9, 11, 1, NULL, NULL, NULL, 'toi-co-the-chuyen-du-lieu-tu-he-thong-pos-hien-tai-sang-senverse-khong', 'post', NULL, 0, 0, 1, 0, NULL, 'Article', NULL, '2026-08-19 18:37:47', '2026-08-19 18:37:47'),
	(11, 11, 1, NULL, NULL, NULL, 'senverse-co-ho-tro-giai-phap-thanh-toan-tich-hop-khong', 'post', NULL, 0, 0, 1, 0, NULL, 'Article', NULL, '2026-08-19 18:42:30', '2026-08-19 18:42:30'),
	(12, 15, 1, 32, NULL, NULL, 'tony-tran-luxury-nail-bar-tampa-fl', 'post', '2026-08-27 04:31:00', 0, 0, 1, 0, NULL, 'Article', NULL, '2026-08-26 21:32:53', '2026-08-26 21:32:53'),
	(13, 15, 1, 33, NULL, NULL, 'cindy-hoang-blossom-nail-bar-nashville-tn', 'post', NULL, 0, 0, 1, 0, NULL, 'Article', NULL, '2026-08-26 21:39:36', '2026-08-26 21:39:36'),
	(14, 15, 1, 34, NULL, NULL, 'linda-nguyen-elegant-nails-spa-orlando-fl', 'post', NULL, 0, 0, 1, 0, NULL, 'Article', NULL, '2026-08-26 21:42:34', '2026-08-26 21:42:34'),
	(15, 15, 1, 35, NULL, NULL, 'jenny-le-venus-nails-spa-san-jose-ca', 'post', NULL, 0, 0, 1, 0, NULL, 'Article', NULL, '2026-08-26 21:44:46', '2026-08-26 21:44:46'),
	(16, 15, 1, 36, NULL, NULL, 'sophia-nguyen-royal-nails-spa-houston-tx', 'post', NULL, 0, 0, 1, 0, NULL, 'Article', NULL, '2026-08-26 21:51:21', '2026-08-26 21:51:21'),
	(18, 15, 1, 37, NULL, NULL, 'david-tran-happy-nails-lounge-dallas-tx', 'post', NULL, 0, 0, 1, 0, NULL, 'Article', NULL, '2026-08-26 21:54:31', '2026-08-26 21:54:31');

-- Dumping structure for table senverse.post_translations
CREATE TABLE IF NOT EXISTS `post_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint unsigned NOT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `ai_overview` text COLLATE utf8mb4_unicode_ci,
  `faq_schema` json DEFAULT NULL,
  `schema_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_translations_post_id_locale_unique` (`post_id`,`locale`),
  KEY `post_translations_locale_title_index` (`locale`,`title`),
  KEY `post_translations_locale_index` (`locale`),
  CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.post_translations: ~23 rows (approximately)
DELETE FROM `post_translations`;
INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `short_description`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `og_title`, `og_description`, `ai_overview`, `faq_schema`, `schema_data`, `created_at`, `updated_at`) VALUES
	(5, 3, 'vi', 'Amy Le - Serenity Nail Studio | Charlotte, NC', 'Tôi rất hài lòng với các tính năng marketing và quản lý khách hàng của Senverse. Hệ thống giúp salon dễ dàng phân nhóm và gửi ưu đãi phù hợp, từ đó thu hút nhiều khách hàng quay trở lại.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 03:02:00', '2026-08-26 21:27:01'),
	(6, 3, 'en', 'Amy Le - Serenity Nail Studio | Charlotte, NC', 'I’m very happy with Senverse’s marketing and customer management features. It makes it easy to segment clients and send relevant promotions, helping us bring more customers back to the salon.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 03:02:00', '2026-08-26 21:27:01'),
	(7, 4, 'vi', 'Vì Sao Tiệm Nail Cần Hệ Thống Nhắc Lịch Tự Động?', 'Một hệ thống nhắc lịch tự động có thể giảm đáng kể tỷ lệ khách bỏ hẹn.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 03:19:30', '2026-08-19 03:19:30'),
	(8, 6, 'vi', 'Quản Lý Hoa Hồng Kỹ Thuật Viên Nail Chính Xác Và Minh Bạch', 'Commission Tracking được xem là một trong những tính năng quan trọng nhất đối với phần mềm Nail Salon tại Mỹ.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 03:20:10', '2026-08-19 03:20:10'),
	(9, 7, 'vi', 'Cách Tăng Doanh Thu Tiệm Nail Mà Không Cần Tăng Ngân Sách Quảng Cáo', 'Đôi khi doanh thu tăng nhanh nhất đến từ khách hàng hiện tại chứ không phải khách hàng mới.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 03:20:34', '2026-08-19 03:20:34'),
	(10, 8, 'vi', 'Senverse có hỗ trợ đặt lịch trực tuyến không?', 'Có. Senverse tích hợp hệ thống đặt lịch trực tuyến, cho phép khách hàng đặt lịch bất cứ lúc nào. Chủ salon có thể quản lý lịch hẹn, kỹ thuật viên và khung giờ làm việc trên một nền tảng duy nhất.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 18:37:21', '2026-08-19 18:37:21'),
	(11, 8, 'en', 'Does Senverse support online booking?', 'Yes. Senverse includes an integrated online booking system that allows customers to schedule appointments anytime. Salon owners can manage bookings, technician schedules, and appointment availability from a single dashboard.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 18:37:21', '2026-08-19 18:37:21'),
	(12, 9, 'vi', 'Tôi có thể chuyển dữ liệu từ hệ thống POS hiện tại sang Senverse không?', 'Có. Đội ngũ của chúng tôi sẽ hỗ trợ chuyển đổi dữ liệu khách hàng, lịch sử đặt lịch và các thông tin quan trọng khác từ hệ thống hiện tại sang Senverse.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 18:37:47', '2026-08-19 18:37:47'),
	(13, 9, 'en', 'Can I transfer data from my current POS system?', 'Yes. Our team can assist with migrating customer information, appointment history, and other essential business data from your existing system to Senverse.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 18:37:47', '2026-08-19 18:37:47'),
	(14, 11, 'vi', 'Senverse có hỗ trợ giải pháp thanh toán tích hợp không?', 'Có. Senverse cung cấp giải pháp thanh toán tích hợp, giúp salon xử lý giao dịch nhanh chóng và an toàn, đồng thời quản lý toàn bộ hoạt động thanh toán trên cùng một hệ thống.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 18:42:30', '2026-08-19 18:42:30'),
	(15, 11, 'en', 'Does Senverse provide integrated payment solutions?', 'Yes. Senverse offers integrated payment solutions that allow salons to process transactions quickly and securely while managing all payment activities within the same platform.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-19 18:42:30', '2026-08-19 18:42:30'),
	(16, 12, 'vi', 'Tony Tran - Luxury Nail Bar | Tampa, FL', 'Khách hàng có thể chủ động đặt lịch trực tuyến bất cứ lúc nào. Tính năng tự động nhắc hẹn giúp salon giảm đáng kể tình trạng khách quên lịch, trong khi báo cáo doanh thu chi tiết giúp tôi dễ dàng theo dõi hiệu quả kinh doanh mỗi ngày', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:32:53', '2026-08-26 21:32:53'),
	(17, 12, 'en', 'Tony Tran - Luxury Nail Bar | Tampa, FL', 'Customers can conveniently book appointments online at any time. Automated reminders have significantly reduced missed appointments, while detailed revenue reports make it easy for me to monitor the salon’s daily performance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:32:53', '2026-08-26 21:32:53'),
	(18, 13, 'vi', 'Cindy Hoang - Blossom Nail Bar | Nashville, TN', 'Từ khi sử dụng Senverse POS, salon của tôi vận hành chuyên nghiệp và hiệu quả hơn. Khách hàng hài lòng, nhân viên làm việc thuận tiện hơn và doanh thu cũng có sự cải thiện rõ rệt. Tôi sẵn sàng giới thiệu Senverse cho những chủ tiệm nail đang muốn phát triển salon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:39:36', '2026-08-26 21:39:36'),
	(19, 13, 'en', 'Cindy Hoang - Blossom Nail Bar | Nashville, TN', 'Since switching to Senverse POS, my salon has become more professional and efficient. Our customers are happier, our staff works more smoothly, and we’ve seen a noticeable improvement in revenue. I would gladly recommend Senverse to nail salon owners looking to grow their business', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:39:36', '2026-08-26 21:39:36'),
	(20, 14, 'vi', 'Linda Nguyen - Elegant Nails & Spa | Orlando, FL', 'Từ khi sử dụng Senverse POS, salon của tôi vận hành gọn gàng và hiệu quả hơn. Khách check-in nhanh chóng, lễ tân bớt áp lực và việc quản lý lịch hẹn cũng trở nên đơn giản. Tôi còn có thể theo dõi doanh thu của salon mọi lúc, mọi nơi ngay trên điện thoại', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:42:34', '2026-08-26 21:42:34'),
	(21, 14, 'en', 'Linda Nguyen - Elegant Nails & Spa | Orlando, FL', 'Since using Senverse POS, my salon has become more organized and efficient. Customers check in faster, our receptionist feels less overwhelmed, and managing appointments is much easier. I can also monitor salon revenue anytime, anywhere from my phone.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:42:34', '2026-08-26 21:42:34'),
	(22, 15, 'vi', 'Jenny Le - Venus Nails & Spa | San Jose, CA', 'Khách hàng của tôi rất thích tính năng tự check-in bằng số điện thoại. Họ không còn phải xếp hàng chờ tại quầy lễ tân, giúp quy trình đón khách trở nên nhanh chóng, gọn gàng và hiện đại hơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:44:46', '2026-08-26 21:44:46'),
	(23, 15, 'en', 'Jenny Le - Venus Nails & Spa | San Jose, CA', 'Our customers love being able to check in using their phone number. They no longer have to wait in line at the front desk, making the entire check-in process faster, smoother, and more modern', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:44:46', '2026-08-26 21:44:46'),
	(24, 16, 'vi', 'Sophia Nguyen - Royal Nails & Spa | Houston, TX', 'Báo cáo của Senverse POS rất đầy đủ và dễ theo dõi, từ doanh thu, tiền tip đến hoa hồng của từng kỹ thuật viên. Tôi có thể kiểm tra hoạt động của salon ngay trên điện thoại, dù đang ở nhà hay đi du lịch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:51:21', '2026-08-26 21:51:21'),
	(25, 16, 'en', 'Sophia Nguyen - Royal Nails & Spa | Houston, TX', 'Senverse POS provides clear, detailed reports on revenue, tips, and each technician’s commission. I can monitor my salon directly from my phone, whether I’m at home or traveling.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:51:21', '2026-08-26 21:51:21'),
	(26, 18, 'vi', 'David Tran - Happy Nails Lounge | Dallas, TX', 'Đội ngũ hỗ trợ của Senverse luôn phản hồi nhanh chóng và tận tình mỗi khi tôi cần trợ giúp. Nhờ đó, tôi có thể yên tâm vận hành salon ổn định mà không lo công việc bị gián đoạn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:54:31', '2026-08-26 21:54:31'),
	(27, 18, 'en', 'David Tran - Happy Nails Lounge | Dallas, TX', 'Senverse’s support team is always responsive and helpful whenever I need assistance. Their reliable support gives me peace of mind and keeps my salon running smoothly without interruption', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-26 21:54:31', '2026-08-26 21:54:31');

-- Dumping structure for table senverse.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `thumbnail_id` bigint unsigned DEFAULT NULL,
  `banner_id` bigint unsigned DEFAULT NULL,
  `og_image_id` bigint unsigned DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,0) DEFAULT NULL,
  `sale_price` decimal(15,0) DEFAULT NULL,
  `stock_quantity` int NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `view_count` int NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  `canonical_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robots` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'index, follow',
  `schema_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_user_id_foreign` (`user_id`),
  KEY `products_thumbnail_id_foreign` (`thumbnail_id`),
  KEY `products_banner_id_foreign` (`banner_id`),
  KEY `products_og_image_id_foreign` (`og_image_id`),
  KEY `products_status_is_featured_index` (`status`,`is_featured`),
  KEY `products_category_id_status_index` (`category_id`,`status`),
  KEY `products_slug_index` (`slug`),
  KEY `products_view_count_index` (`view_count`),
  CONSTRAINT `products_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_og_image_id_foreign` FOREIGN KEY (`og_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_thumbnail_id_foreign` FOREIGN KEY (`thumbnail_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.products: ~0 rows (approximately)
DELETE FROM `products`;

-- Dumping structure for table senverse.product_translations
CREATE TABLE IF NOT EXISTS `product_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specifications` json DEFAULT NULL,
  `features` json DEFAULT NULL,
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  KEY `product_translations_locale_index` (`locale`),
  CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.product_translations: ~0 rows (approximately)
DELETE FROM `product_translations`;

-- Dumping structure for table senverse.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.sessions: ~1 rows (approximately)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('NQFlcrX7NU8OxPIrMDa4X2M0qOrZ7SnPBKLVbP5E', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36 Edg/152.0.0.0', 'eyJfdG9rZW4iOiJOYWgwbXpNRzAydEVVUUc2YzJvcFJLcUFRejZCVGFZeU1IUFZzRUpjIiwibG9jYWxlIjoiZW4iLCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvY21zLWxhcmF2ZWwudGVzdFwvc29sdXRpb25zXC9zb2NpYWwtbWVkaWEiLCJyb3V0ZSI6ImVuLnNvbHV0aW9ucy5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwidXJsIjpbXSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', 1788423448);

-- Dumping structure for table senverse.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `options` json DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`),
  KEY `settings_group_index` (`group`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.settings: ~26 rows (approximately)
DELETE FROM `settings`;
INSERT INTO `settings` (`id`, `group`, `key`, `type`, `label`, `description`, `options`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'general', 'site_name', 'text', 'Website Name', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(2, 'general', 'site_slogan', 'text', 'Website Slogan', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(3, 'general', 'company_name', 'text', 'Company Name', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(4, 'general', 'logo', 'image', 'Logo', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(5, 'general', 'favicon', 'image', 'Favicon', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(6, 'general', 'phone', 'text', 'Phone', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(7, 'general', 'email', 'text', 'Email', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(8, 'general', 'address', 'textarea', 'Address', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(9, 'general', 'copyright', 'text', 'Copyright', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(10, 'seo', 'home_meta_title', 'text', 'Home Meta Title', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(11, 'seo', 'home_meta_description', 'textarea', 'Home Meta Description', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(12, 'seo', 'home_meta_keywords', 'textarea', 'Home Meta Keywords', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(13, 'seo', 'default_og_image', 'image', 'Default OG Image', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(14, 'seo', 'robots_default', 'text', 'Robots', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(15, 'social', 'facebook_url', 'text', 'Facebook URL', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(16, 'social', 'instagram_url', 'text', 'Instagram URL', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(17, 'social', 'linkedin_url', 'text', 'LinkedIn URL', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(18, 'social', 'youtube_url', 'text', 'YouTube URL', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(19, 'social', 'tiktok_url', 'text', 'TikTok URL', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(20, 'schema', 'schema_enable', 'boolean', 'Enable Schema', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(21, 'schema', 'schema_type', 'text', 'Schema Type', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(22, 'tracking', 'google_analytics', 'textarea', 'Google Analytics', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(23, 'tracking', 'google_tag_manager', 'textarea', 'Google Tag Manager', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(24, 'tracking', 'meta_pixel', 'textarea', 'Meta Pixel', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(25, 'script', 'custom_head_script', 'textarea', 'Custom Head Script', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(26, 'script', 'custom_body_script', 'textarea', 'Custom Body Script', NULL, NULL, 0, 1, '2026-08-18 00:30:34', '2026-08-18 00:30:34');

-- Dumping structure for table senverse.setting_translations
CREATE TABLE IF NOT EXISTS `setting_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `setting_id` bigint unsigned NOT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  KEY `setting_translations_locale_index` (`locale`),
  CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.setting_translations: ~52 rows (approximately)
DELETE FROM `setting_translations`;
INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `value`, `created_at`, `updated_at`) VALUES
	(1, 1, 'vi', 'Senverse', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(2, 1, 'en', 'Senverse', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(3, 2, 'vi', 'Giải pháp vận hành toàn diện cho Nail Salon', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(4, 2, 'en', 'Everything Your Salon Needs.', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(5, 3, 'vi', 'Senverse LLC', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(6, 3, 'en', 'Senverse LLC', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(7, 4, 'vi', '18', '2026-08-18 00:30:34', '2026-08-24 02:16:03'),
	(8, 4, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(9, 5, 'vi', '19', '2026-08-18 00:30:34', '2026-08-25 00:39:30'),
	(10, 5, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(11, 6, 'vi', '(352) 426-2498', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(12, 6, 'en', '(352) 426-2498', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(13, 7, 'vi', 'info@senverse.us', '2026-08-18 00:30:34', '2026-08-19 20:03:22'),
	(14, 7, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(15, 8, 'vi', '5141 NW 43rd Street, #102 , Gainesville, Florida, 32606', '2026-08-18 00:30:34', '2026-08-19 20:03:22'),
	(16, 8, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(17, 9, 'vi', '© Senverse LLC. All rights reserved.', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(18, 9, 'en', '© Senverse LLC. All rights reserved.', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(19, 10, 'vi', 'Senverse POS VU', '2026-08-18 00:30:34', '2026-08-25 00:21:30'),
	(20, 10, 'en', 'Senverse POS', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(21, 11, 'vi', 'Giải pháp POS, thanh toán và marketing dành cho Nail Salon.', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(22, 11, 'en', 'POS, payment and marketing solutions for nail salons.', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(23, 12, 'vi', 'POS, Nail Salon, Marketing, Merchant Services', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(24, 12, 'en', 'POS, Nail Salon, Marketing, Merchant Services', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(25, 13, 'vi', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(26, 13, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(27, 14, 'vi', 'index,follow', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(28, 14, 'en', 'index,follow', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(29, 15, 'vi', '/senverse.us', '2026-08-18 00:30:34', '2026-08-19 20:03:22'),
	(30, 15, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(31, 16, 'vi', '/senverse.us', '2026-08-18 00:30:34', '2026-08-19 20:03:22'),
	(32, 16, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(33, 17, 'vi', '/senverse.us', '2026-08-18 00:30:34', '2026-08-19 20:03:22'),
	(34, 17, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(35, 18, 'vi', '/senverse.us', '2026-08-18 00:30:34', '2026-08-19 20:03:22'),
	(36, 18, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(37, 19, 'vi', '/senverse.us', '2026-08-18 00:30:34', '2026-08-19 20:03:22'),
	(38, 19, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(39, 20, 'vi', '1', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(40, 20, 'en', '1', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(41, 21, 'vi', 'Organization', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(42, 21, 'en', 'Organization', '2026-08-18 00:30:34', '2026-08-18 00:30:34'),
	(43, 22, 'vi', 'GTM-XXXXXXX', '2026-08-18 00:30:34', '2026-08-25 01:05:37'),
	(44, 22, 'en', 'GTM-XXXXXXX', '2026-08-18 00:30:34', '2026-08-25 01:05:37'),
	(45, 23, 'vi', 'GTM-XXXXXXX', '2026-08-18 00:30:34', '2026-08-25 01:05:37'),
	(46, 23, 'en', 'GTM-XXXXXXX', '2026-08-18 00:30:34', '2026-08-25 01:05:37'),
	(47, 24, 'vi', 'GTM-XXXXXXX', '2026-08-18 00:30:34', '2026-08-25 01:05:37'),
	(48, 24, 'en', 'GTM-XXXXXXX', '2026-08-18 00:30:34', '2026-08-25 01:05:37'),
	(49, 25, 'vi', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(50, 25, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(51, 26, 'vi', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55'),
	(52, 26, 'en', NULL, '2026-08-18 00:30:34', '2026-08-18 01:04:55');

-- Dumping structure for table senverse.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `image_id` bigint unsigned DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sliders_image_id_foreign` (`image_id`),
  KEY `sliders_position_index` (`position`),
  CONSTRAINT `sliders_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.sliders: ~7 rows (approximately)
DELETE FROM `sliders`;
INSERT INTO `sliders` (`id`, `position`, `image_id`, `link`, `button_text`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
	(2, 'home', 26, 'http://cms-laravel.test/', 'Learn More', 0, 1, '2026-08-18 20:27:35', '2026-08-26 01:54:26'),
	(3, 'pos-system', 38, NULL, NULL, 0, 1, '2026-08-20 00:25:39', '2026-08-27 00:58:43'),
	(4, 'merchant-services', 42, NULL, NULL, 0, 1, '2026-08-20 19:44:40', '2026-08-27 03:17:57'),
	(5, 'social-media', 45, '/contact', 'Phát Triển Social Media', 0, 1, '2026-08-21 01:02:55', '2026-08-27 20:37:03'),
	(7, 'home', 27, 'solutions/merchant-services', 'Khám phá Merchant Services', 0, 1, '2026-08-26 02:49:16', '2026-08-26 02:49:16'),
	(8, 'home', 28, '/contact', 'Grow With Senverse', 3, 1, '2026-08-26 03:02:43', '2026-08-26 03:02:43'),
	(9, 'local-boost', 51, NULL, NULL, 0, 1, '2026-08-28 02:34:02', '2026-08-28 02:38:55');

-- Dumping structure for table senverse.slider_translations
CREATE TABLE IF NOT EXISTS `slider_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slider_id` bigint unsigned NOT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slider_translations_slider_id_locale_unique` (`slider_id`,`locale`),
  CONSTRAINT `slider_translations_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.slider_translations: ~13 rows (approximately)
DELETE FROM `slider_translations`;
INSERT INTO `slider_translations` (`id`, `slider_id`, `locale`, `title`, `subtitle`, `description`, `created_at`, `updated_at`) VALUES
	(3, 2, 'vi', 'Mọi thứ salon của bạn cần, trong một nền tảng', 'Quản lý salon thông minh hơn', 'Quản lý lịch hẹn, thanh toán, kỹ thuật viên, marketing và hiệu quả kinh doanh trên một nền tảng mạnh mẽ dành riêng cho tiệm nail hiện đại', '2026-08-18 20:27:35', '2026-08-26 01:54:26'),
	(4, 2, 'en', 'Everything Your Salon Needs. All in One Place', 'Smarter Salon Management', 'Manage appointments, payments, technicians, marketing, and business performance from one powerful platform built for modern nail salons.', '2026-08-18 20:27:35', '2026-08-26 01:54:26'),
	(5, 3, 'vi', 'Vận Hành Tiệm Nail Thông Minh Hơn Với Senverse POS', 'POS TẤT CẢ TRONG MỘT CHO TIỆM NAIL', 'Quản lý lịch hẹn, check-in, thợ, thanh toán và khách hàng trên một nền tảng mạnh mẽ được thiết kế riêng cho tiệm Nail.', '2026-08-20 00:25:39', '2026-08-27 01:02:30'),
	(6, 3, 'en', 'Run Your Nail Salon Smarter with Senverse POS', 'ALL-IN-ONE POS FOR NAIL SALONS', 'Manage appointments, check-ins, technicians, payments, and customers from one powerful platform built specifically for nail salons', '2026-08-20 00:25:39', '2026-08-27 01:02:30'),
	(7, 4, 'vi', 'Thanh Toán Thông Minh - Chi Phí Minh Bạch', 'Dịch Vụ Thanh Toán', 'Nhận thanh toán an toàn với mức phí minh bạch, hệ thống xử lý ổn định và khả năng tích hợp liền mạch với Senverse POS.', '2026-08-20 19:44:40', '2026-08-27 03:17:57'),
	(8, 4, 'en', 'Smarter Payments - Clearer Costs.', 'Merchant Services', 'Accept payments securely with transparent pricing, reliable processing, and seamless integration with Senverse POS.', '2026-08-20 19:44:40', '2026-08-27 03:17:57'),
	(9, 5, 'vi', 'Biến Social Media Thành Nhiều Lịch Hẹn Hơn', 'SOCIAL MEDIA MARKETING CHO TIỆM NAIL', 'Xây dựng sự hiện diện mạnh mẽ tại địa phương bằng nội dung chuyên nghiệp, lịch đăng nhất quán và các chiến dịch được thiết kế để thu hút thêm khách hàng đến tiệm.', '2026-08-21 01:02:55', '2026-08-27 20:37:03'),
	(10, 5, 'en', 'Turn Social Media Into More Appointments', 'SOCIAL MEDIA MARKETING FOR NAIL SALONS', 'Build a stronger local presence with professional content, consistent posting, and targeted campaigns designed to attract more customers to your salon.', '2026-08-21 01:02:55', '2026-08-27 20:37:03'),
	(13, 7, 'vi', 'DỊCH VỤ THANH TOÁN TÍCH HỢP', 'Thanh toán liền mạch. Vận hành salon thông minh hơn.', 'Chấp nhận thanh toán an toàn, quản lý tiền tip dễ dàng và tự động đồng bộ mọi giao dịch với hệ thống POS Senverse', '2026-08-26 02:49:16', '2026-08-26 02:49:16'),
	(14, 7, 'en', 'Seamless Payments. Smarter Salon Operations.', 'INTEGRATED MERCHANT SERVICES', 'Accept payments securely, manage tips with ease, and keep every transaction connected to your Senverse POS—all in one seamless system', '2026-08-26 02:49:16', '2026-08-26 02:49:16'),
	(15, 8, 'vi', 'Biến salon thành thương hiệu khách hàng luôn nhớ đến', 'GIẢI PHÁP MARKETING TOÀN DIỆN', 'Xây dựng hình ảnh salon mạnh mẽ trên môi trường trực tuyến và ngay tại cửa hàng với các giải pháp marketing đồng bộ', '2026-08-26 03:02:43', '2026-08-26 03:02:43'),
	(16, 8, 'en', 'COMPLETE SALON MARKETING', 'Turn Your Salon Into a Brand Clients Remember.', 'Build a stronger presence online and inside your salon with connected marketing solutions designed for long-term growth', '2026-08-26 03:02:43', '2026-08-26 03:02:43'),
	(17, 9, 'vi', 'Biến lượt tìm kiếm tại địa phương thành nhiều lịch hẹn hơn.', 'LOCAL SEO & GOOGLE MAPS FOR NAIL SALONS', 'ăng khả năng hiển thị của salon trên Google Search và Google Maps, tiếp cận nhiều khách hàng ở gần, đồng thời chuyển lượt tìm kiếm thành cuộc gọi, lịch hẹn và khách ghé trực tiếp.', '2026-08-28 02:34:02', '2026-08-28 02:34:02'),
	(18, 9, 'en', 'Turn Local Searches Into More Appointments', 'LOCAL SEO & GOOGLE MAPS FOR NAIL SALONS', 'Improve your salon’s visibility on Google Search and Maps, reach more nearby customers, and turn local searches into calls, bookings, and walk-ins.', '2026-08-28 02:34:02', '2026-08-28 02:34:02');

-- Dumping structure for table senverse.taggables
CREATE TABLE IF NOT EXISTS `taggables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` bigint unsigned NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint unsigned NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `taggables_tag_id_foreign` (`tag_id`),
  KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`),
  KEY `taggables_taggable_id_taggable_type_index` (`taggable_id`,`taggable_type`),
  CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.taggables: ~0 rows (approximately)
DELETE FROM `taggables`;

-- Dumping structure for table senverse.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_id` bigint unsigned DEFAULT NULL,
  `banner_id` bigint unsigned DEFAULT NULL,
  `og_image_id` bigint unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `canonical_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robots` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_unique` (`slug`),
  KEY `tags_thumbnail_id_foreign` (`thumbnail_id`),
  KEY `tags_banner_id_foreign` (`banner_id`),
  KEY `tags_og_image_id_foreign` (`og_image_id`),
  KEY `tags_type_index` (`type`),
  KEY `tags_is_active_index` (`is_active`),
  KEY `tags_is_featured_index` (`is_featured`),
  CONSTRAINT `tags_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `tags_og_image_id_foreign` FOREIGN KEY (`og_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `tags_thumbnail_id_foreign` FOREIGN KEY (`thumbnail_id`) REFERENCES `media` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.tags: ~0 rows (approximately)
DELETE FROM `tags`;

-- Dumping structure for table senverse.tag_translations
CREATE TABLE IF NOT EXISTS `tag_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` bigint unsigned NOT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `ai_overview` text COLLATE utf8mb4_unicode_ci,
  `faq_schema` json DEFAULT NULL,
  `schema_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_translations_tag_id_locale_unique` (`tag_id`,`locale`),
  KEY `tag_translations_locale_name_index` (`locale`,`name`),
  KEY `tag_translations_locale_index` (`locale`),
  CONSTRAINT `tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.tag_translations: ~0 rows (approximately)
DELETE FROM `tag_translations`;

-- Dumping structure for table senverse.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_is_active_index` (`role`,`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table senverse.users: ~0 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `is_active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', '$2y$12$VDmqNdTN7DgAVVlFhZrT.O5.ESPYzHjpXp2orYqJUnqOd1pXnPjo2', NULL, 'admin', 1, NULL, NULL, '2026-08-18 00:30:34', '2026-08-18 00:30:34');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
