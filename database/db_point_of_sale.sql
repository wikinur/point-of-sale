/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_point_of_sale
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_point_of_sale` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `db_point_of_sale`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `categories_category_name_unique` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id_category`,`category_name`,`created_at`,`updated_at`) values 
(1,'Alat Sekolah','2023-05-11 16:01:51','2023-05-11 16:01:51');

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `companies` */

insert  into `companies`(`id`,`name`,`no_telp`,`address`,`email`,`created_at`,`updated_at`) values 
(1,'PT Wan','022-42077257','Bandung Jawa Barat','wan7@gmail.com',NULL,'2023-05-12 19:03:59');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

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

/*Data for the table `failed_jobs` */

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id_member` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code_member` varchar(255) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `telpon` varchar(17) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `members_code_member_unique` (`code_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `members` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(12,'2014_10_12_000000_create_users_table',1),
(13,'2014_10_12_100000_create_password_reset_tokens_table',1),
(14,'2014_10_12_100000_create_password_resets_table',1),
(15,'2019_08_19_000000_create_failed_jobs_table',1),
(16,'2019_12_14_000001_create_personal_access_tokens_table',1),
(52,'2023_05_02_102212_add_new_column_to_users_table',2),
(53,'2023_05_02_105242_create_categories_table',2),
(54,'2023_05_02_110245_create_products_table',2),
(59,'2023_05_02_114458_create_members_table',3),
(60,'2023_05_02_114953_create_suppliers_table',3),
(61,'2023_05_03_030611_add_category_id_to_products_table',3),
(62,'2023_05_04_095900_add_code_product_to_products_table',3),
(63,'2023_05_08_131540_create_purchase_orders_table',4),
(64,'2023_05_09_005959_create_status_table',4),
(66,'2023_05_11_043647_add_status_id_to_purchase_orders_table',5),
(68,'2023_05_11_043729_create_purchase_order_line_table',6),
(70,'2023_05_11_043828_add_grand_total_to_purchase_order_line_table',7),
(72,'2023_05_11_052721_add_supplier_id_to_products_table',8),
(86,'2023_05_11_043948_create_sales_table',9),
(87,'2023_05_11_165823_add_qty_to_purchase_order_line_table',9),
(88,'2023_05_11_172605_create_sale_line_table',9),
(90,'2023_05_12_080621_add_column_to_sales_table',10),
(92,'2023_05_12_172747_create_companies_table',11),
(95,'2023_05_12_192656_add_minimal_stock_to_products_table',12);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id_product` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned DEFAULT NULL,
  `code_product` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `stock` int(10) unsigned DEFAULT 12,
  `min_stock` int(11) NOT NULL DEFAULT 12,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_supplier_id_foreign` (`supplier_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id_category`),
  CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id_supplier`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id_product`,`category_id`,`supplier_id`,`code_product`,`product_name`,`purchase_price`,`selling_price`,`stock`,`min_stock`,`created_at`,`updated_at`) values 
(1,1,1,'PRD-20230511160316','Pulpen Standart',3000,25000,236,12,'2023-05-11 16:03:16','2023-05-12 17:26:17'),
(2,1,1,'PRD-20230512145144','Sepatu Kompas',150000,155000,97,12,'2023-05-12 14:51:44','2023-05-12 20:55:38'),
(3,1,2,'PRD-20230512193128','Pensil',2500,3000,10,12,'2023-05-12 19:31:28','2023-05-12 19:31:28');

/*Table structure for table `purchase_order_line` */

DROP TABLE IF EXISTS `purchase_order_line`;

CREATE TABLE `purchase_order_line` (
  `id_po_line` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `buy` int(11) NOT NULL,
  `grand_total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_po_line`),
  KEY `purchase_order_line_purchase_order_id_foreign` (`purchase_order_id`),
  KEY `purchase_order_line_product_id_foreign` (`product_id`),
  CONSTRAINT `purchase_order_line_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`) ON DELETE CASCADE,
  CONSTRAINT `purchase_order_line_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id_purchase`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `purchase_order_line` */

insert  into `purchase_order_line`(`id_po_line`,`purchase_order_id`,`product_id`,`qty`,`buy`,`grand_total`) values 
(1,4,1,10,3000,30000);

/*Table structure for table `purchase_orders` */

DROP TABLE IF EXISTS `purchase_orders`;

CREATE TABLE `purchase_orders` (
  `id_purchase` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `document_no` varchar(40) NOT NULL,
  `supplier_id` int(10) unsigned DEFAULT NULL,
  `status_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_purchase`),
  KEY `purchase_orders_supplier_id_foreign` (`supplier_id`),
  KEY `purchase_orders_status_id_foreign` (`status_id`),
  CONSTRAINT `purchase_orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchase_orders_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id_supplier`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `purchase_orders` */

insert  into `purchase_orders`(`id_purchase`,`document_no`,`supplier_id`,`status_id`,`created_at`,`updated_at`) values 
(4,'PO-202305110421518678',1,1,NULL,NULL);

/*Table structure for table `sale_line` */

DROP TABLE IF EXISTS `sale_line`;

CREATE TABLE `sale_line` (
  `id_sale_line` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `selling_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  PRIMARY KEY (`id_sale_line`),
  KEY `sale_line_sale_id_foreign` (`sale_id`),
  KEY `sale_line_product_id_foreign` (`product_id`),
  CONSTRAINT `sale_line_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`) ON DELETE CASCADE,
  CONSTRAINT `sale_line_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id_sale`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sale_line` */

insert  into `sale_line`(`id_sale_line`,`sale_id`,`product_id`,`selling_price`,`qty`,`grand_total`) values 
(39,36,1,25000,1,25000),
(40,37,1,25000,10,250000),
(41,38,2,155000,1,155000),
(42,39,1,25000,3,75000),
(43,40,2,155000,2,310000);

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id_sale` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_struk` varchar(115) NOT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sale`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sales` */

insert  into `sales`(`id_sale`,`no_struk`,`grand_total`,`kembalian`,`total_cost`,`created_at`,`updated_at`) values 
(36,'051223131955',25000,25000,50000,'2023-04-11 13:19:55','2023-05-12 13:19:55'),
(37,'051223140022',250000,35000,285000,'2023-04-12 14:00:22','2023-05-12 14:00:22'),
(38,'051223145846',155000,45000,200000,'2023-05-12 14:58:46','2023-05-12 14:58:46'),
(39,'051223151306',75000,25000,100000,'2023-05-12 15:13:06','2023-05-12 15:13:07'),
(40,'051223205538',310000,90000,400000,'2023-05-12 20:55:38','2023-05-12 20:55:38');

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `status` */

insert  into `status`(`id`,`status`,`created_at`,`updated_at`) values 
(1,'pending',NULL,NULL),
(2,'complete',NULL,NULL);

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `id_supplier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `telpon` varchar(17) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `suppliers` */

insert  into `suppliers`(`id_supplier`,`supplier_name`,`address`,`telpon`,`created_at`,`updated_at`) values 
(1,'Pt Edu','Kota Bandunmg','089775576467','2023-05-11 16:02:25','2023-05-11 16:02:25'),
(2,'Cv Good','Cimahi','9879865717','2023-05-12 19:30:53','2023-05-12 19:30:53');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT '0',
  `foto` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`level`,`foto`,`remember_token`,`created_at`,`updated_at`) values 
(3,'user','user@gmail.com',NULL,'$2y$10$2Xlg0hv2gidwqMJdN6iJou0UCnLbDFtlmbHwexKNNk5Hy4VCbao0q','0',NULL,NULL,'2023-05-12 07:45:56','2023-05-12 07:45:56');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
