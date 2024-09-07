/*
SQLyog Ultimate v10.00 Beta1
MySQL - 8.0.30 : Database - dubai_builders_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dubai_builders_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `dubai_builders_db`;

/*Table structure for table `abouts` */

DROP TABLE IF EXISTS `abouts`;

CREATE TABLE `abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `our_mission` text COLLATE utf8mb4_unicode_ci,
  `our_vision` text COLLATE utf8mb4_unicode_ci,
  `our_builders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_image` text COLLATE utf8mb4_unicode_ci,
  `about_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `abouts` */

insert  into `abouts`(`id`,`title`,`slug`,`description`,`short_description`,`our_mission`,`our_vision`,`our_builders`,`experience_year`,`hero_image`,`about_image`,`created_at`,`updated_at`) values (1,'title','slug','description','short desc','mission','vision','builders',NULL,'hero','about','2023-10-15 21:28:57','2023-10-15 21:29:00');

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_description` text COLLATE utf8mb4_unicode_ci,
  `hero_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_slug` text COLLATE utf8mb4_unicode_ci,
  `author_description` text COLLATE utf8mb4_unicode_ci,
  `author_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_publish` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blogs` */

/*Table structure for table `careers` */

DROP TABLE IF EXISTS `careers`;

CREATE TABLE `careers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci,
  `no_of_vacancy` int DEFAULT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `educational_requirement` text COLLATE utf8mb4_unicode_ci,
  `experience_requirement` text COLLATE utf8mb4_unicode_ci,
  `additional_requirement` text COLLATE utf8mb4_unicode_ci,
  `compensations` text COLLATE utf8mb4_unicode_ci,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `careers` */

insert  into `careers`(`id`,`job_title`,`job_description`,`no_of_vacancy`,`poster`,`slug`,`job_type`,`salary`,`job_location`,`experience`,`deadline`,`educational_requirement`,`experience_requirement`,`additional_requirement`,`compensations`,`is_active`,`created_at`,`updated_at`) values (1,'Developer','<p>description</p>',12,'backend/uploads/images/careers/1783545195776937.png','slug','fulltime','20000','location','2 years','2000-01-01','<p>requirement</p>','<p>experience</p>','<p>additionaal</p>','<p>compansation</p>','active','2023-11-25 08:08:48','2023-11-25 14:07:26'),(2,'Site Engineer','<p>sdf</p>',12,'backend/uploads/images/careers/1784261284453249.png','slug','fulltime','12000','location','1 years','1111-11-11','<p>sdf</p>','<p>sf</p>','<p>sf</p>','<p>sf</p>','active','2023-11-25 12:12:17','2023-12-03 11:49:23');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clients` */

insert  into `clients`(`id`,`client_code`,`name`,`organization_name`,`address`,`email`,`phone`,`created_at`,`updated_at`) values (1,'CUS-2024001','Shiplu','company','','shiplu@mail.com','0192222222','2024-09-07 17:41:50','2024-09-07 17:41:50'),(2,'CUS-2024002','Momin','abc company','','momin@mial.com','01992222','2024-09-07 17:47:56','2024-09-07 17:47:56');

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contacts` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
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

/*Data for the table `failed_jobs` */

/*Table structure for table `invoice_details` */

DROP TABLE IF EXISTS `invoice_details`;

CREATE TABLE `invoice_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_details_invoice_id_foreign` (`invoice_id`),
  KEY `invoice_details_item_id_foreign` (`item_id`),
  KEY `invoice_details_category_id_foreign` (`category_id`),
  CONSTRAINT `invoice_details_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `work_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `invoice_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `invoice_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `invoice_details` */

/*Table structure for table `invoice_payments` */

DROP TABLE IF EXISTS `invoice_payments`;

CREATE TABLE `invoice_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint unsigned NOT NULL,
  `payment_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double(8,2) DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_payments_invoice_id_foreign` (`invoice_id`),
  CONSTRAINT `invoice_payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `invoice_payments` */

/*Table structure for table `invoices` */

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `invoice_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quotation_id` bigint unsigned NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `paid_amount` double(8,2) DEFAULT '0.00',
  `invoice_date` date NOT NULL DEFAULT '2024-04-01',
  `bank_details` text COLLATE utf8mb4_unicode_ci,
  `trn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_quotation_id_foreign` (`quotation_id`),
  CONSTRAINT `invoices_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotation_applications` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `invoices` */

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `work_category_id` bigint unsigned NOT NULL,
  `item_work` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint unsigned NOT NULL,
  `unit_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_work_category_id_foreign` (`work_category_id`),
  KEY `items_unit_id_foreign` (`unit_id`),
  CONSTRAINT `items_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  CONSTRAINT `items_work_category_id_foreign` FOREIGN KEY (`work_category_id`) REFERENCES `work_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `items` */

insert  into `items`(`id`,`work_category_id`,`item_work`,`unit_id`,`unit_price`,`created_at`,`updated_at`) values (2,2,'20 CM block',1,112,'2024-02-07 00:57:23','2024-02-07 00:57:23'),(3,1,'Fensing',1,223,'2024-02-07 00:57:36','2024-02-07 00:57:36'),(4,1,'Wiring',1,121,'2024-02-07 00:58:02','2024-02-07 00:58:02');

/*Table structure for table `job_applications` */

DROP TABLE IF EXISTS `job_applications`;

CREATE TABLE `job_applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_id` bigint unsigned NOT NULL,
  `int_date` date DEFAULT NULL,
  `reply_message` text COLLATE utf8mb4_unicode_ci,
  `is_replied` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_applications_job_id_foreign` (`job_id`),
  CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_applications` */

insert  into `job_applications`(`id`,`name`,`email`,`mobile`,`address`,`file`,`job_id`,`int_date`,`reply_message`,`is_replied`,`created_at`,`updated_at`) values (2,'Avishek Barua','avishek@mail.com','9182379187',NULL,'backend\\uploads\\files\\cv\\1702232426.pdf',2,NULL,NULL,0,'2023-12-10 18:20:26','2024-01-31 06:19:42'),(3,'Avishek Barua','avishek@mail.com','01951055456',NULL,'backend\\uploads\\files\\cv\\1707677153.pdf',2,'2024-05-15','hitteer',1,'2024-02-11 18:45:53','2024-05-29 18:45:52');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_09_01_191815_create_clients_table',1),(6,'2023_09_01_192000_create_projects_table',1),(7,'2023_09_03_052701_create_settings_table',1),(9,'2023_09_08_095029_create_abouts_table',1),(10,'2023_09_08_170923_create_teams_table',1),(11,'2023_09_14_060155_create_contacts_table',1),(12,'2023_09_15_072553_create_blogs_table',1),(13,'2023_09_17_151823_create_careers_table',1),(17,'2023_11_14_063222_create_work_categories_table',1),(18,'2023_11_14_064804_create_units_table',1),(19,'2023_11_14_064904_create_items_table',1),(20,'2023_12_05_105401_create_job_applications_table',1),(25,'2023_10_31_181438_create_sliders_table',2),(26,'2023_09_04_181515_create_services_table',3),(30,'2023_09_28_055128_create_quotations_table',5),(32,'2024_01_28_085505_create_quotation_details_table',7),(33,'2023_11_08_192000_create_projects_table',8),(35,'2024_02_07_053913_create_invoice_details_table',10),(36,'2023_11_07_074720_create_quotation_applications_table',11),(39,'2024_02_06_050022_create_invoices_table',12),(40,'2023_11_20_064904_create_items_table',13),(41,'2024_03_07_071713_create_quotation_details_table',14),(43,'2024_04_23_130648_create_invoice_payments_table',15);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `quotation_id` bigint unsigned DEFAULT NULL,
  `project_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_description` text COLLATE utf8mb4_unicode_ci,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_permit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handover_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_testimonial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_type` tinyint DEFAULT NULL,
  `project_status` tinyint DEFAULT NULL,
  `hero_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'backend/uploads/images/projects/default/p_details.png',
  `thumbnail_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'backend/uploads/images/projects/default/1.png',
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'backend/uploads/images/projects/default/p1.png',
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'backend/uploads/images/projects/default/p2.png',
  `is_active` tinyint NOT NULL DEFAULT '0',
  `is_frontend` tinyint NOT NULL DEFAULT '0',
  `is_popular` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_client_id_index` (`client_id`),
  KEY `projects_quotation_id_index` (`quotation_id`),
  CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `projects_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotation_applications` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `projects` */

insert  into `projects`(`id`,`client_id`,`quotation_id`,`project_title`,`project_description`,`project_code`,`project_permit`,`project_location`,`handover_time`,`client_rating`,`client_testimonial`,`project_type`,`project_status`,`hero_image`,`thumbnail_image`,`image_1`,`image_2`,`is_active`,`is_frontend`,`is_popular`,`created_at`,`updated_at`) values (2,1,1,NULL,NULL,'DB-2024001',NULL,'ddhks','12',NULL,NULL,0,NULL,'backend/uploads/images/projects/default/p_details.png','backend/uploads/images/projects/default/1.png','backend/uploads/images/projects/default/p1.png','backend/uploads/images/projects/default/p2.png',0,0,0,'2024-09-07 17:45:12','2024-09-07 17:45:12'),(3,2,2,NULL,NULL,'DB-2024003',NULL,'ddss','11',NULL,NULL,1,NULL,'backend/uploads/images/projects/default/p_details.png','backend/uploads/images/projects/default/1.png','backend/uploads/images/projects/default/p1.png','backend/uploads/images/projects/default/p2.png',0,0,0,'2024-09-07 17:50:50','2024-09-07 17:50:50');

/*Table structure for table `quotation_applications` */

DROP TABLE IF EXISTS `quotation_applications`;

CREATE TABLE `quotation_applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quotation_request_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `quotation_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` double(8,2) DEFAULT '0.00',
  `discount_amount` double(8,2) DEFAULT '0.00',
  `grand_total` double(8,2) NOT NULL,
  `terms_conditions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quotation_applications_quotation_request_id_foreign` (`quotation_request_id`),
  KEY `quotation_applications_client_id_foreign` (`client_id`),
  CONSTRAINT `quotation_applications_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `quotation_applications_quotation_request_id_foreign` FOREIGN KEY (`quotation_request_id`) REFERENCES `quotations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `quotation_applications` */

insert  into `quotation_applications`(`id`,`quotation_request_id`,`client_id`,`quotation_code`,`tax`,`discount_amount`,`grand_total`,`terms_conditions`,`created_at`,`updated_at`) values (1,1,1,'QT-2024001',2.00,20.00,7583.70,'conditions','2024-09-07 17:43:51','2024-09-07 17:43:51'),(2,2,2,'QT-2024002',NULL,1200.00,1655.00,'condition','2024-09-07 17:50:15','2024-09-07 17:50:15');

/*Table structure for table `quotation_details` */

DROP TABLE IF EXISTS `quotation_details`;

CREATE TABLE `quotation_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quotation_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quotation_details_quotation_id_foreign` (`quotation_id`),
  KEY `quotation_details_item_id_foreign` (`item_id`),
  KEY `quotation_details_category_id_foreign` (`category_id`),
  CONSTRAINT `quotation_details_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `work_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `quotation_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `quotation_details_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotation_applications` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `quotation_details` */

insert  into `quotation_details`(`id`,`quotation_id`,`item_id`,`category_id`,`unit`,`quantity`,`unit_price`,`total_price`,`created_at`,`updated_at`) values (1,1,3,1,'Meter sq',4.00,223.00,892.00,'2024-09-07 17:43:51','2024-09-07 17:43:51'),(2,1,2,2,'Meter sq',2.00,224.00,448.00,'2024-09-07 17:43:51','2024-09-07 17:43:51'),(3,1,4,1,'Meter sq',5.00,1223.00,6115.00,'2024-09-07 17:43:51','2024-09-07 17:43:51'),(4,2,4,1,'Meter sq',5.00,121.00,605.00,'2024-09-07 17:50:15','2024-09-07 17:50:15'),(5,2,3,1,'Meter sq',10.00,225.00,2250.00,'2024-09-07 17:50:15','2024-09-07 17:50:15');

/*Table structure for table `quotations` */

DROP TABLE IF EXISTS `quotations`;

CREATE TABLE `quotations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluate_budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `is_read` tinyint NOT NULL DEFAULT '0',
  `is_replied` tinyint NOT NULL DEFAULT '0',
  `is_confirmed` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quotations_client_id_foreign` (`client_id`),
  CONSTRAINT `quotations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `quotations` */

insert  into `quotations`(`id`,`client_id`,`name`,`email`,`mobile`,`location`,`project_type`,`evaluate_budget`,`project_time`,`company_name`,`file`,`message`,`is_read`,`is_replied`,`is_confirmed`,`created_at`,`updated_at`) values (1,1,'Shiplu','shiplu@mail.com','0192222222','ddhks','0','12222','12','company',NULL,'message',0,1,1,'2024-09-07 17:41:50','2024-09-07 17:45:12'),(2,2,'Momin','momin@mial.com','01992222','ddss','1','12','11','abc company',NULL,'mes',0,1,1,'2024-09-07 17:47:56','2024-09-07 17:50:50');

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_details` text COLLATE utf8mb4_unicode_ci,
  `slogan` text COLLATE utf8mb4_unicode_ci,
  `hero_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/uploads/images/services/default_images/default_hero.png',
  `thumbnail_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/uploads/images/services/default_images/default_thumbnail.png',
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/uploads/images/services/default_images/default_first.png',
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/uploads/images/services/default_images/default_second.png',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/uploads/images/services/default_images/default_logo.png',
  `home_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/uploads/images/services/default_images/default_home.png',
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `services` */

insert  into `services`(`id`,`service_title`,`service_details`,`slogan`,`hero_image`,`thumbnail_image`,`image_1`,`image_2`,`logo`,`home_image`,`video_link`,`created_at`,`updated_at`) values (3,'COMMERTIAL DESIGN','<p>dfaerafef</p>','Builderrine is the safe, reliable & cost effective construction company.','backend/uploads/images/services/1803129533065086.jpg','backend/uploads/images/services/thumbnail/1803129082353003.jpg','backend/uploads/images/services/1803129083551507.png','backend/uploads/images/services/1803129084386072.png','backend/uploads/images/services/1803129085183030.png','backend/uploads/images/services/1803129085377578.png','https://www.youtube.com/embed/zVdHCvCxtTg?si=-WpMRT3ocuxBRT98','2024-06-28 18:04:58','2024-06-28 18:12:05');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_secondary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_secondary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribble_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instragram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`app_name`,`app_logo`,`address`,`address_secondary`,`email`,`email_secondary`,`phone_1`,`phone_2`,`opening_time`,`fb_link`,`twitter_link`,`dribble_link`,`instragram_link`,`linkedin_link`,`footer_text`,`maps`,`is_active`,`created_at`,`updated_at`) values (1,'Dubai Builders','backend/uploads/images/logo/1809521243789386.jpg','Abu dhabi, Dubai',NULL,'dubaibuilders@mail.com',NULL,'019999999',NULL,NULL,'https://facebook.com',NULL,NULL,NULL,NULL,'All rights reserved','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18196.269674951982!2d-3.473097385510982!3d55.24387937246506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487d4c4b03fff9bb%3A0x7d3c33686c4f01be!2sEden%20Festival!5e0!3m2!1sen!2sbd!4v1694548630410!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>',1,'2024-09-07 07:25:35','2024-09-07 07:25:35');

/*Table structure for table `sliders` */

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/uploads/videos/slider/default_slider/pexels_videos_3925 (1080p).mp4',
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sliders` */

insert  into `sliders`(`id`,`title`,`description`,`video`,`is_active`,`created_at`,`updated_at`) values (1,'slider 1',NULL,'',1,NULL,'2024-02-12 07:23:05');

/*Table structure for table `teams` */

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `x_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `teams` */

insert  into `teams`(`id`,`name`,`designation`,`image`,`email`,`phone`,`fb_link`,`x_link`,`linkedin_link`,`description`,`order`,`created_at`,`updated_at`) values (1,'Mominul Karim','Site Engineer','backend/uploads/images/team/1776950234339897.png','momin@mail.com','0199223312','facebook','twtter','linkedin','<p>ddss</p>',12,'2023-09-13 19:03:20','2023-09-13 19:03:20'),(2,'Rofiq boda','Driver bodda','backend/uploads/images/team/1786497726076903.jpg','rofiqvai@bulu.com','123','fb.com','twtter','linkedin','ddsss',1122,'2023-12-28 04:16:39','2023-12-28 04:16:39');

/*Table structure for table `units` */

DROP TABLE IF EXISTS `units`;

CREATE TABLE `units` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `units` */

insert  into `units`(`id`,`title`,`created_at`,`updated_at`) values (1,'Meter sq','2023-12-30 18:47:25','2023-12-30 18:47:25');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Admin','superadmin@email.com',NULL,'$2a$12$ijbNDwvXN5n1iK8Nw86Se.0z7oPAN7qRYyi7/K/pijXuoe/W8eEgG',NULL,NULL,'2023-08-28 01:01:27');

/*Table structure for table `work_categories` */

DROP TABLE IF EXISTS `work_categories`;

CREATE TABLE `work_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `work_categories` */

insert  into `work_categories`(`id`,`title`,`created_at`,`updated_at`) values (1,'Preliminaries','2023-12-30 18:46:53','2023-12-30 18:46:53'),(2,'Block Work','2023-12-21 18:46:53','2023-12-21 18:46:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
