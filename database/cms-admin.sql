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

-- Dumping structure for table cms_admin.cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.cache: ~4 rows (approximately)
DELETE FROM `cache`;
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-media_url_1', 's:80:"http://cms-admin.test/storage/media/sYC4RqwtfqFscxEpIr7mN0q2Hl1QoOHFE59gOU4Q.png";', 1778007242),
	('laravel-cache-media_url_4', 's:80:"http://cms-admin.test/storage/media/7Ofp7AplEgw4pzYVjFOW5L9BUGbfOiFAnfDPWNsh.jpg";', 1778008109),
	('laravel-cache-media_url_6', 's:80:"http://cms-admin.test/storage/media/EtbjYjPbzmNBRE5ueTYaphsaYByEup61W2lh2fiJ.png";', 1778007068),
	('laravel-cache-media_url_8', 's:80:"http://cms-admin.test/storage/media/KYPiOeX4zEcUq50vdMfseVMGoPD0zUjIjKlIUGrL.png";', 1778006393);

-- Dumping structure for table cms_admin.cache_locks
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.cache_locks: ~0 rows (approximately)
DELETE FROM `cache_locks`;

-- Dumping structure for table cms_admin.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail_id` bigint unsigned DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` text COLLATE utf8mb4_unicode_ci,
  `robots` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'index, follow',
  `og_image_id` bigint unsigned DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_type_unique` (`slug`,`type`),
  KEY `categories_thumbnail_id_foreign` (`thumbnail_id`),
  KEY `categories_og_image_id_foreign` (`og_image_id`),
  KEY `categories_parent_id_is_active_index` (`parent_id`,`is_active`),
  KEY `categories_type_is_active_index` (`type`,`is_active`),
  KEY `categories_sort_order_index` (`sort_order`),
  KEY `categories_type_index` (`type`),
  CONSTRAINT `categories_og_image_id_foreign` FOREIGN KEY (`og_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `categories_thumbnail_id_foreign` FOREIGN KEY (`thumbnail_id`) REFERENCES `media` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.categories: ~9 rows (approximately)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `parent_id`, `type`, `name`, `slug`, `description`, `thumbnail_id`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `robots`, `og_image_id`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'post', 'Giới Thiệu', 'gioi-thieu', NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 0, 1, '2026-05-02 09:21:23', '2026-05-02 09:21:23'),
	(2, NULL, 'post', 'Giải Pháp', 'giai-phap', NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 0, 1, '2026-05-02 09:21:38', '2026-05-02 09:21:38'),
	(3, 2, 'post', 'KVM & Remote Management', 'kvm-remote-management', NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 0, 1, '2026-05-02 09:22:08', '2026-05-02 09:22:08'),
	(4, 2, 'post', 'Professional AV Solutions', 'professional-av-solutions', NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 0, 1, '2026-05-02 09:22:27', '2026-05-02 09:22:53'),
	(5, 2, 'post', 'Connectivity & Power Solutions', 'connectivity-power-solutions', NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', NULL, 0, 1, '2026-05-02 09:22:43', '2026-05-02 09:22:43'),
	(6, NULL, 'post', 'Dịch Vụ', 'dich-vu', NULL, 1, NULL, NULL, NULL, NULL, 'index, follow', NULL, 0, 1, '2026-05-02 10:34:18', '2026-05-05 00:13:34'),
	(7, NULL, 'post', 'Tin Tức', 'tin-tuc', NULL, 2, NULL, NULL, NULL, NULL, 'index, follow', NULL, 0, 1, '2026-05-02 11:38:06', '2026-05-05 03:26:53'),
	(8, NULL, 'product', 'Sản Phẩm', 'san-pham', NULL, 2, NULL, NULL, NULL, NULL, 'index, follow', NULL, 0, 1, '2026-05-05 01:43:22', '2026-05-05 01:43:22'),
	(9, 8, 'product', 'Cables', 'cables', NULL, 1, NULL, NULL, NULL, NULL, 'index, follow', NULL, 0, 1, '2026-05-05 01:53:48', '2026-05-05 01:53:48');

-- Dumping structure for table cms_admin.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
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

-- Dumping data for table cms_admin.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table cms_admin.jobs
DROP TABLE IF EXISTS `jobs`;
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

-- Dumping data for table cms_admin.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table cms_admin.job_batches
DROP TABLE IF EXISTS `job_batches`;
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

-- Dumping data for table cms_admin.job_batches: ~0 rows (approximately)
DELETE FROM `job_batches`;

-- Dumping structure for table cms_admin.media
DROP TABLE IF EXISTS `media`;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.media: ~8 rows (approximately)
DELETE FROM `media`;
INSERT INTO `media` (`id`, `file_name`, `file_path`, `mime_type`, `file_size`, `width`, `height`, `alt_text`, `title`, `caption`, `description`, `uploaded_by`, `created_at`, `updated_at`) VALUES
	(1, 'data-center.png', 'media/sYC4RqwtfqFscxEpIr7mN0q2Hl1QoOHFE59gOU4Q.png', NULL, 2900444, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-02 08:42:00', '2026-05-02 08:42:00'),
	(2, 'giai-phap-ket-noi.png', 'media/PTK2pozzKRvSkO79z9gpAs7Jdr5HTJfDpX7934oM.png', NULL, 2317893, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-02 08:42:00', '2026-05-02 08:42:00'),
	(3, 'giai-phap-phong-hop-thong-minh.png', 'media/OSx0JYJMk2AjLJVMW2wzuoB21M59zJYlLLBHEb2O.png', NULL, 2265257, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-02 08:42:00', '2026-05-02 08:42:00'),
	(4, '1.jpg', 'media/7Ofp7AplEgw4pzYVjFOW5L9BUGbfOiFAnfDPWNsh.jpg', NULL, 50973, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-02 10:40:17', '2026-05-02 10:40:17'),
	(5, 'service.png', 'uploads/media/service-20260502181331-69f63ecb1cc25.png', 'image/png', 775488, 800, 700, 'service', 'service', NULL, NULL, 1, '2026-05-02 11:13:31', '2026-05-02 11:13:31'),
	(6, 'ChatGPT Image May 5, 2026, 05_24_30 PM.png', 'media/EtbjYjPbzmNBRE5ueTYaphsaYByEup61W2lh2fiJ.png', NULL, 2137881, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-05 03:25:38', '2026-05-05 03:25:38'),
	(7, 'can-ho-tro.png', 'media/3qr52CSMRaRwxpB1isYTEaOONKa1JSXeoTD56eU8.png', NULL, 1734024, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-05 08:01:40', '2026-05-05 08:01:40'),
	(8, 'logo.png', 'media/KYPiOeX4zEcUq50vdMfseVMGoPD0zUjIjKlIUGrL.png', NULL, 16465, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-05 10:26:35', '2026-05-05 10:26:35');

-- Dumping structure for table cms_admin.mediaables
DROP TABLE IF EXISTS `mediaables`;
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

-- Dumping data for table cms_admin.mediaables: ~0 rows (approximately)
DELETE FROM `mediaables`;

-- Dumping structure for table cms_admin.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.migrations: ~12 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_04_25_141327_create_media_table', 1),
	(5, '2026_04_25_141402_create_categories_table', 1),
	(6, '2026_04_25_141409_create_posts_table', 1),
	(7, '2026_04_25_141432_create_products_table', 1),
	(8, '2026_04_25_141438_create_mediaables_table', 1),
	(9, '2026_04_25_141446_create_sliders_table', 1),
	(10, '2026_04_25_141452_create_settings_table', 1),
	(11, '2026_05_03_145650_create_pages_table', 2),
	(12, '2026_05_03_150004_create_page_sections_table', 2);

-- Dumping structure for table cms_admin.pages
DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_id` bigint unsigned DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `schema_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`),
  KEY `pages_banner_id_foreign` (`banner_id`),
  CONSTRAINT `pages_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `media` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.pages: ~1 rows (approximately)
DELETE FROM `pages`;
INSERT INTO `pages` (`id`, `title`, `slug`, `template`, `banner_id`, `short_description`, `content`, `status`, `meta_title`, `meta_description`, `meta_keywords`, `schema_type`, `schema_data`, `created_at`, `updated_at`) VALUES
	(1, 'Giới Thiệu', 'gioi-thieu', 'about_aten', 2, NULL, NULL, 'published', NULL, NULL, NULL, 'AboutPage', NULL, '2026-05-03 08:37:23', '2026-05-03 10:42:14');

-- Dumping structure for table cms_admin.page_sections
DROP TABLE IF EXISTS `page_sections`;
CREATE TABLE IF NOT EXISTS `page_sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_id` bigint unsigned NOT NULL,
  `section_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image_id` bigint unsigned DEFAULT NULL,
  `items` json DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_sections_page_id_foreign` (`page_id`),
  KEY `page_sections_image_id_foreign` (`image_id`),
  CONSTRAINT `page_sections_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `page_sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.page_sections: ~7 rows (approximately)
DELETE FROM `page_sections`;
INSERT INTO `page_sections` (`id`, `page_id`, `section_key`, `title`, `subtitle`, `description`, `content`, `image_id`, `items`, `button_text`, `button_link`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 1, 'hero', 'Giới thiệu ATEN', 'ATEN', 'Giải pháp kết nối và quản lý hạ tầng CNTT hàng đầu thế giới', NULL, NULL, NULL, NULL, NULL, 0, 1, '2026-05-03 08:37:23', '2026-05-03 09:17:45'),
	(2, 1, 'about_intro', 'Giải pháp kết nối và quản lý hạ tầng CNTT hàng đầu', 'ATEN – Giải pháp kết nối toàn diện', 'ATEN được thành lập năm 1979 tại Đài Loan, là thương hiệu toàn cầu trong lĩnh vực kết nối và quản lý hạ tầng CNTT, AV chuyên nghiệp và hệ thống điều khiển thông minh.\r\n\r\nVới hơn 40 năm kinh nghiệm, ATEN cung cấp các giải pháp KVM, AV over IP và Control System giúp doanh nghiệp tối ưu vận hành, nâng cao hiệu suất và đảm bảo sự ổn định cho hệ thống.', '<p>\r\nChúng tôi cung cấp đa dạng giải pháp từ KVM, AV over IP đến Control System, phù hợp cho nhiều mô hình doanh nghiệp từ vừa đến lớn. Các sản phẩm của ATEN được thiết kế với tiêu chuẩn cao về hiệu năng, độ bền và khả năng tích hợp linh hoạt.\r\n</p>\r\n\r\n<p>\r\nVới đội ngũ chuyên gia giàu kinh nghiệm, chúng tôi cam kết đồng hành cùng khách hàng trong việc xây dựng hệ thống hạ tầng CNTT hiện đại, an toàn và tối ưu chi phí đầu tư.\r\n</p>', 4, '[{"icon": "flaticon-certification", "title": "Chứng nhận toàn cầu", "description": "Sản phẩm đạt tiêu chuẩn quốc tế, đảm bảo chất lượng và độ tin cậy cao."}, {"icon": "flaticon-award-star-with-olive-branches", "title": "Giải pháp đoạt giải", "description": "Nhiều giải thưởng trong ngành công nghệ và AV chuyên nghiệp."}]', NULL, NULL, 1, 1, '2026-05-03 08:37:23', '2026-05-03 11:22:34'),
	(3, 1, 'works_about', 'Được tin tưởng bởi hàng nghìn khách hàng doanh nghiệp', 'Năng lực triển khai', 'ATEN đồng hành cùng nhiều doanh nghiệp trong việc xây dựng hệ thống kết nối, quản lý hạ tầng CNTT và AV chuyên nghiệp. Các giải pháp được thiết kế nhằm tối ưu vận hành, tăng tính ổn định và phù hợp với nhu cầu mở rộng lâu dài.', NULL, 4, '[{"title": "Tối ưu hiệu suất vận hành"}, {"title": "Giải pháp linh hoạt cho nhiều quy mô"}]', 'Tư vấn giải pháp', '/lien-he', 2, 1, '2026-05-03 08:37:23', '2026-05-03 11:34:33'),
	(4, 1, 'process', 'Quy trình tư vấn và triển khai giải pháp', 'Quy trình', NULL, NULL, NULL, '[{"icon": "flaticon-select", "title": "Tiếp nhận nhu cầu", "description": "Lắng nghe yêu cầu thực tế của doanh nghiệp, mô hình vận hành và hiện trạng hạ tầng."}, {"icon": "flaticon-video-call", "title": "Tư vấn giải pháp", "description": "Đề xuất thiết bị và phương án kết nối phù hợp với ngân sách, quy mô và mục tiêu sử dụng."}, {"icon": "flaticon-strategy", "title": "Lập phương án triển khai", "description": "Xây dựng cấu hình, sơ đồ hệ thống và kế hoạch triển khai rõ ràng trước khi thực hiện."}, {"icon": "flaticon-help", "title": "Hỗ trợ vận hành", "description": "Đồng hành trong quá trình sử dụng, hỗ trợ kỹ thuật và tối ưu hệ thống khi cần thiết."}]', NULL, NULL, 3, 1, '2026-05-03 08:37:23', '2026-05-03 11:39:12'),
	(5, 1, 'why_choose', 'Giải pháp CNTT tối ưu cho doanh nghiệp hiện đại', 'Tại sao chọn chúng tôi', 'Chúng tôi cung cấp giải pháp toàn diện giúp doanh nghiệp vận hành hiệu quả, ổn định và sẵn sàng mở rộng.', NULL, 5, '[{"type": "highlight", "phone": "+84 123 456 789", "title": "Hỗ trợ 24/7", "description": "Đội ngũ kỹ thuật luôn sẵn sàng hỗ trợ mọi lúc, đảm bảo hệ thống vận hành ổn định."}, {"icon": "fas fa-cubes", "type": "normal", "title": "Giải pháp thông minh", "button_link": "/lien-he", "button_text": "Bắt đầu ngay", "description": "ATEN Việt Nam cung cấp thiết bị ATEN chính hãng và giải pháp KVM, AV, USB, nguồn điện cho doanh nghiệp. Chúng tôi cung cấp giải pháp toàn diện giúp doanh nghiệp vận hành hiệu quả, ổn định và sẵn sàng mở rộng."}]', NULL, NULL, 4, 1, '2026-05-03 08:37:23', '2026-05-03 11:47:59'),
	(6, 1, 'timeline', 'Lịch sử hình thành và phát triển ATEN', 'Hành trình phát triển', 'Từ một công ty công nghệ tại Đài Loan, ATEN đã không ngừng đổi mới và mở rộng, trở thành thương hiệu toàn cầu trong lĩnh vực kết nối và quản lý hạ tầng CNTT.', '<p>\r\nATEN đã trải qua nhiều giai đoạn phát triển quan trọng, đánh dấu bằng những bước tiến về công nghệ và mở rộng thị trường toàn cầu.\r\n</p>', 3, '[{"year": "1979", "title": "Thành lập ATEN", "description": "ATEN được thành lập tại Đài Loan."}, {"year": "1980s", "title": "Ra mắt KVM", "description": "Giới thiệu sản phẩm KVM đầu tiên."}, {"year": "1990s", "title": "Mở rộng toàn cầu", "description": "ATEN phát triển mạnh ra thị trường quốc tế."}, {"year": "2000s", "title": "Phát triển AV & Control", "description": "Ra mắt các giải pháp AV và hệ thống điều khiển."}]', NULL, NULL, 5, 1, '2026-05-03 08:37:23', '2026-05-03 11:51:40'),
	(7, 1, 'cta', 'Bạn cần tư vấn giải pháp ATEN?', NULL, 'Liên hệ ngay để được tư vấn giải pháp phù hợp cho doanh nghiệp của bạn', NULL, NULL, NULL, 'Tìm hiểu ngay', NULL, 6, 1, '2026-05-03 08:37:23', '2026-05-03 09:20:44');

-- Dumping structure for table cms_admin.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table cms_admin.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `thumbnail_id` bigint unsigned DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `view_count` int NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` text COLLATE utf8mb4_unicode_ci,
  `robots` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'index, follow',
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `og_image_id` bigint unsigned DEFAULT NULL,
  `schema_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_thumbnail_id_foreign` (`thumbnail_id`),
  KEY `posts_og_image_id_foreign` (`og_image_id`),
  KEY `posts_category_id_status_index` (`category_id`,`status`),
  KEY `posts_user_id_status_index` (`user_id`,`status`),
  KEY `posts_status_published_at_index` (`status`,`published_at`),
  KEY `posts_is_featured_index` (`is_featured`),
  KEY `posts_view_count_index` (`view_count`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_og_image_id_foreign` FOREIGN KEY (`og_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_thumbnail_id_foreign` FOREIGN KEY (`thumbnail_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.posts: ~7 rows (approximately)
DELETE FROM `posts`;
INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `excerpt`, `content`, `thumbnail_id`, `status`, `is_featured`, `view_count`, `published_at`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `robots`, `og_title`, `og_description`, `og_image_id`, `schema_type`, `schema_data`, `created_at`, `updated_at`) VALUES
	(1, 6, 1, 'Tích hợp hệ thống đa dạng', 'tich-hop-he-thong-da-dang', 'Kết nối và đồng bộ nhiều thiết bị, nền tảng trong cùng một hệ thống, giúp vận hành liền mạch và hiệu quả.', NULL, 4, 'published', 0, 11, '2026-05-02 10:40:57', NULL, NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, 'Article', NULL, '2026-05-02 10:40:39', '2026-05-05 07:48:11'),
	(2, 6, 1, 'Bảo mật dữ liệu hàng đầu', 'bao-mat-du-lieu-hang-dau', 'Áp dụng các giải pháp bảo mật tiên tiến, đảm bảo an toàn thông tin và hạn chế tối đa rủi ro.', '<p>&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;&Aacute;p dụng c&aacute;c giải ph&aacute;p bảo mật ti&ecirc;n tiến, đảm bảo an to&agrave;n th&ocirc;ng tin v&agrave; hạn chế tối đa rủi ro.&nbsp;</p>', 4, 'published', 0, 11, '2026-05-02 10:41:00', NULL, NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, 'Article', NULL, '2026-05-02 10:41:23', '2026-05-05 08:40:02'),
	(3, 6, 1, 'Phân tích dữ liệu chuyên sâu', 'phan-tich-du-lieu-chuyen-sau', 'Cung cấp công cụ và giải pháp phân tích giúp doanh nghiệp đưa ra quyết định chính xác và kịp thời.', NULL, 4, 'published', 0, 2, '2026-05-02 10:41:50', NULL, NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, 'Article', NULL, '2026-05-02 10:41:50', '2026-05-05 07:48:39'),
	(4, 6, 1, 'Chuyên gia giàu kinh nghiệm', 'doi-ngu-chuyen-gia-giau-kinh-nghiem', 'Đội ngũ kỹ thuật giàu kinh nghiệm, sẵn sàng tư vấn và triển khai giải pháp phù hợp.', NULL, 4, 'published', 0, 2, '2026-05-02 10:43:00', NULL, NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, 'Article', NULL, '2026-05-02 10:43:38', '2026-05-05 07:48:38'),
	(5, 6, 1, 'Triển khai & tối ưu hệ thống', 'trien-khai-toi-uu-he-thong', 'Hỗ trợ lắp đặt, cấu hình và tối ưu hệ thống KVM, AV, đảm bảo hiệu suất cao và vận hành ổn định.', NULL, 4, 'published', 0, 1, '2026-05-02 10:45:15', NULL, NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, 'Article', NULL, '2026-05-02 10:45:15', '2026-05-05 07:48:35'),
	(6, 6, 1, 'Hỗ trợ kỹ thuật & bảo trì dài hạn', 'ho-tro-ky-thuat-bao-tri-dai-han', 'Dịch vụ hỗ trợ kỹ thuật nhanh chóng, bảo trì định kỳ giúp hệ thống luôn hoạt động bền bỉ.', NULL, 4, 'published', 0, 4, '2026-05-02 10:45:00', NULL, NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, 'Article', NULL, '2026-05-02 10:45:45', '2026-05-05 11:12:17'),
	(7, 7, 1, 'Tiêu đề', 'tieu-de', 'Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn Mô tả ngắn', '<p>&nbsp;</p>\r\n\r\n<p><label>Nội dung</label></p>', 6, 'published', 1, 12, '2026-05-05 03:14:00', 'Meta Title', 'Meta Description', 'Meta Keywords', 'Canonical URL', 'index, follow', 'OG Title', 'OG Description', NULL, 'Article', NULL, '2026-05-05 03:14:48', '2026-05-05 11:13:08');

-- Dumping structure for table cms_admin.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `thumbnail_id` bigint unsigned DEFAULT NULL,
  `og_image_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` decimal(15,0) DEFAULT NULL,
  `sale_price` decimal(15,0) DEFAULT NULL,
  `stock_quantity` int NOT NULL DEFAULT '0',
  `specifications` json DEFAULT NULL,
  `features` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `view_count` int NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robots` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'index, follow',
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `schema_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_user_id_foreign` (`user_id`),
  KEY `products_thumbnail_id_foreign` (`thumbnail_id`),
  KEY `products_og_image_id_foreign` (`og_image_id`),
  KEY `products_status_is_featured_index` (`status`,`is_featured`),
  KEY `products_category_id_status_index` (`category_id`,`status`),
  KEY `products_slug_index` (`slug`),
  KEY `products_view_count_index` (`view_count`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_og_image_id_foreign` FOREIGN KEY (`og_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_thumbnail_id_foreign` FOREIGN KEY (`thumbnail_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.products: ~1 rows (approximately)
DELETE FROM `products`;
INSERT INTO `products` (`id`, `category_id`, `user_id`, `thumbnail_id`, `og_image_id`, `name`, `slug`, `sku`, `brand`, `model`, `warranty`, `short_description`, `description`, `price`, `sale_price`, `stock_quantity`, `specifications`, `features`, `status`, `is_featured`, `view_count`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `robots`, `og_title`, `og_description`, `schema_type`, `schema_data`, `created_at`, `updated_at`) VALUES
	(1, 9, 1, 4, NULL, 'Cables 5', 'cables-5', 'SKU', 'Thương hiệu', 'Model', '12 Tháng', 'Mô tả ngắn', '<p>&nbsp;</p>\r\n\r\n<p><label>Nội dung chi tiết</label></p>', 500000, 450000, 40, '[{"key": "Độ Dài", "value": "2M"}, {"key": "Cổng Kết Nối", "value": "USB - USB"}]', '["Hỗ Trợ 4K", "Kết Nối Điện Thoại"]', 'published', 0, 8, NULL, NULL, NULL, NULL, 'index, follow', NULL, NULL, 'Product', '{"sku": "SKU", "name": "Cables 5", "@type": "Product", "brand": {"name": "Thương hiệu", "@type": "Brand"}, "offers": {"@type": "Offer", "price": "450000", "availability": "https://schema.org/InStock", "priceCurrency": "VND"}, "@context": "https://schema.org/", "description": "Mô tả ngắn"}', '2026-05-05 01:55:54', '2026-05-05 11:08:32');

-- Dumping structure for table cms_admin.sessions
DROP TABLE IF EXISTS `sessions`;
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

-- Dumping data for table cms_admin.sessions: ~1 rows (approximately)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('LBBVKYQMf2FpzZ8PUsxSzmQlQSaXLlu4HOCoBYmY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJzcm1vcjZKQXlvYWlGQjdlYkVzWmVUSW05dm9sQXZobEZsdzhIQVV6IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2Ntcy1hZG1pbi50ZXN0XC90aW4tdHVjXC90aWV1LWRlIiwicm91dGUiOiJmcm9udGVuZC5wb3N0LnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOltdLCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1778004788);

-- Dumping structure for table cms_admin.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_group_key_unique` (`group`,`key`),
  KEY `settings_group_index` (`group`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.settings: ~38 rows (approximately)
DELETE FROM `settings`;
INSERT INTO `settings` (`id`, `group`, `key`, `value`, `type`, `label`, `description`, `sort_order`, `created_at`, `updated_at`) VALUES
	(1, 'general', 'site_name', 'Tên website', 'text', 'Tên website', 'Tên hiển thị của website.', 1, '2026-05-01 09:18:24', '2026-05-01 09:18:24'),
	(2, 'general', 'site_description', NULL, 'textarea', 'Mô tả website', 'Mô tả ngắn về website.', 2, '2026-05-01 09:18:24', '2026-05-01 09:18:24'),
	(3, 'general', 'logo', '8', 'image', 'Logo', 'Logo chính của website.', 3, '2026-05-01 09:18:24', '2026-05-05 10:26:43'),
	(4, 'general', 'favicon', '8', 'image', 'Favicon', 'Icon hiển thị trên tab trình duyệt.', 4, '2026-05-01 09:18:24', '2026-05-05 10:38:03'),
	(5, 'general', 'hotline', '0908017541', 'text', 'Hotline', 'Số điện thoại liên hệ.', 5, '2026-05-01 09:18:24', '2026-05-05 10:03:16'),
	(6, 'general', 'email', 'ngochoi.duong@gmail.com', 'text', 'Email', 'Email liên hệ.', 6, '2026-05-01 09:18:24', '2026-05-05 10:03:16'),
	(7, 'general', 'address', '411/12/14', 'textarea', 'Địa chỉ', 'Địa chỉ công ty/cửa hàng.', 7, '2026-05-01 09:18:24', '2026-05-05 10:03:16'),
	(8, 'seo', 'meta_title', NULL, 'text', 'Meta Title mặc định', 'Tiêu đề SEO mặc định cho website.', 1, '2026-05-01 09:18:24', '2026-05-01 09:18:24'),
	(9, 'seo', 'meta_description', NULL, 'textarea', 'Meta Description mặc định', 'Mô tả SEO mặc định cho website.', 2, '2026-05-01 09:18:24', '2026-05-01 09:18:24'),
	(10, 'seo', 'meta_keywords', NULL, 'textarea', 'Meta Keywords', 'Từ khóa SEO mặc định.', 3, '2026-05-01 09:18:24', '2026-05-01 09:18:24'),
	(11, 'seo', 'og_image', NULL, 'image', 'Ảnh chia sẻ mặc định', 'Ảnh Open Graph mặc định khi chia sẻ lên mạng xã hội.', 4, '2026-05-01 09:18:24', '2026-05-01 09:18:24'),
	(12, 'seo', 'robots_index', '1', 'boolean', 'Cho phép index', 'Bật/tắt index website trên công cụ tìm kiếm.', 5, '2026-05-01 09:18:24', '2026-05-01 09:18:24'),
	(13, 'sitemap', 'sitemap_enable', '1', 'boolean', 'Bật sitemap', 'Cho phép tạo sitemap.xml.', 1, '2026-05-01 09:18:24', '2026-05-01 09:18:24'),
	(14, 'sitemap', 'sitemap_post', '1', 'boolean', 'Đưa bài viết vào sitemap', 'Bật/tắt bài viết trong sitemap.', 2, '2026-05-01 09:18:24', '2026-05-01 09:18:24'),
	(15, 'sitemap', 'sitemap_product', '1', 'boolean', 'Đưa sản phẩm vào sitemap', 'Bật/tắt sản phẩm trong sitemap.', 3, '2026-05-01 09:18:24', '2026-05-01 09:18:24'),
	(16, 'sitemap', 'sitemap_category', '1', 'boolean', 'Đưa danh mục vào sitemap', 'Bật/tắt danh mục trong sitemap.', 4, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(17, 'sitemap', 'sitemap_changefreq', 'weekly', 'text', 'Changefreq mặc định', 'Tần suất cập nhật mặc định: daily, weekly, monthly.', 5, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(18, 'sitemap', 'sitemap_priority', '0.8', 'text', 'Priority mặc định', 'Độ ưu tiên mặc định trong sitemap.', 6, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(19, 'schema', 'schema_enable', '1', 'boolean', 'Bật Schema', 'Cho phép hiển thị Schema JSON-LD.', 1, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(20, 'schema', 'schema_type', 'Organization', 'text', 'Loại Schema', 'Ví dụ: Organization, LocalBusiness, Store.', 2, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(21, 'schema', 'schema_name', NULL, 'text', 'Tên Schema', 'Tên thương hiệu/doanh nghiệp.', 3, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(22, 'schema', 'schema_logo', NULL, 'image', 'Logo Schema', 'Logo dùng cho structured data.', 4, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(23, 'schema', 'schema_phone', NULL, 'text', 'Số điện thoại Schema', 'Số điện thoại hiển thị trong Schema.', 5, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(24, 'schema', 'schema_address', NULL, 'textarea', 'Địa chỉ Schema', 'Địa chỉ doanh nghiệp trong Schema.', 6, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(25, 'schema', 'schema_json', NULL, 'json', 'Schema JSON tuỳ chỉnh', 'Dùng khi muốn tự nhập JSON-LD.', 7, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(26, 'social', 'facebook', NULL, 'text', 'Facebook', 'Link Facebook.', 1, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(27, 'social', 'youtube', NULL, 'text', 'Youtube', 'Link Youtube.', 2, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(28, 'social', 'tiktok', NULL, 'text', 'TikTok', 'Link TikTok.', 3, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(29, 'social', 'zalo', NULL, 'text', 'Zalo', 'Link Zalo hoặc số Zalo.', 4, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(30, 'script', 'google_analytics', NULL, 'textarea', 'Google Analytics', 'Mã Google Analytics hoặc GA4.', 1, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(31, 'script', 'google_search_console', NULL, 'textarea', 'Google Search Console', 'Thẻ xác minh Google Search Console.', 2, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(32, 'script', 'header_script', NULL, 'textarea', 'Header Script', 'Mã script chèn trước thẻ </head>.', 3, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(33, 'script', 'footer_script', NULL, 'textarea', 'Footer Script', 'Mã script chèn trước thẻ </body>.', 4, '2026-05-01 09:18:25', '2026-05-01 09:18:25'),
	(34, 'homepage', 'home_mission_title', 'Sứ mệnh', 'text', 'Tiêu đề sứ mệnh', 'Tiêu đề hiển thị ở phần Mission trang chủ', 10, '2026-05-02 17:10:39', '2026-05-02 17:10:39'),
	(35, 'homepage', 'home_mission_content', 'Cung cấp thiết bị ATEN chính hãng và giải pháp kết nối IT/AV, giúp doanh nghiệp quản lý hệ thống hiệu quả, vận hành ổn định và tối ưu hạ tầng công nghệ.', 'textarea', 'Nội dung sứ mệnh', 'Đoạn mô tả hiển thị ở phần Mission trang chủ', 20, '2026-05-02 17:10:39', '2026-05-02 17:10:39'),
	(36, 'homepage', 'home_vision_title', 'Tầm nhìn', 'text', 'Tiêu đề tầm nhìn', 'Tiêu đề hiển thị ở phần Vision trang chủ', 30, '2026-05-02 17:10:39', '2026-05-02 17:10:39'),
	(37, 'homepage', 'home_vision_content', 'Trở thành đối tác giải pháp KVM, AV và quản lý hạ tầng IT đáng tin cậy hàng đầu tại Việt Nam, đồng hành cùng doanh nghiệp trong quá trình chuyển đổi số.', 'textarea', 'Nội dung tầm nhìn', 'Đoạn mô tả hiển thị ở phần Vision trang chủ', 40, '2026-05-02 17:10:39', '2026-05-02 17:10:39'),
	(38, 'homepage', 'home_mission_image', '3', 'image', 'Ảnh nền Mission / Vision', 'Ảnh nền bên trái của section Mission / Vision', 50, '2026-05-02 17:10:39', '2026-05-02 10:14:46');

-- Dumping structure for table cms_admin.sliders
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_id` bigint unsigned DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sliders_image_id_foreign` (`image_id`),
  CONSTRAINT `sliders_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cms_admin.sliders: ~4 rows (approximately)
DELETE FROM `sliders`;
INSERT INTO `sliders` (`id`, `title`, `subtitle`, `description`, `image_id`, `link`, `button_text`, `position`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Giải pháp Kết nối & Quản lý hệ thống IT/AV', NULL, NULL, 2, NULL, NULL, 'home', 1, 1, '2026-05-02 08:42:40', '2026-05-02 08:42:40'),
	(2, 'Giải pháp phòng họp thông minh', NULL, NULL, 3, NULL, NULL, 'home', 0, 1, '2026-05-02 08:43:18', '2026-05-02 08:43:18'),
	(3, 'Quản lý Data Center', NULL, NULL, 1, NULL, NULL, 'home', 0, 1, '2026-05-02 08:44:54', '2026-05-02 08:44:54'),
	(4, 'Cần Tư Vấn', '0123 456 789', NULL, 7, NULL, NULL, 'blog', 0, 1, '2026-05-05 08:02:24', '2026-05-05 08:02:24');

-- Dumping structure for table cms_admin.users
DROP TABLE IF EXISTS `users`;
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

-- Dumping data for table cms_admin.users: ~1 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `is_active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@atenvn.com', '$2y$12$jS82AyKP25WkNTMboWkoXepjlUczjvbUWdQaJqf/bILIG0ATPRSc.', NULL, 'admin', 1, '2026-05-01 09:18:24', 'fZSEfB72wS', '2026-05-01 09:18:24', '2026-05-01 09:18:24');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
