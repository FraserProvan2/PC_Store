# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.38)
# Database: pc_store
# Generation Time: 2019-01-20 12:38:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2018_12_22_155643_create_parts_table',1),
	(4,'2018_12_22_161251_create_part_lists_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `cart` longtext,
  `shipping` longtext,
  `price` float DEFAULT NULL,
  `status` enum('in-progress','shipped','complete') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table part_lists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `part_lists`;

CREATE TABLE `part_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `case_id` int(11) DEFAULT '0',
  `cooler_id` int(11) DEFAULT '0',
  `cpu_id` int(11) DEFAULT '0',
  `gpu_id` int(11) DEFAULT '0',
  `add_card` tinyint(1) DEFAULT '0',
  `mobo_id` int(11) DEFAULT '0',
  `powersupply_id` int(11) DEFAULT '0',
  `ram_id` int(11) DEFAULT '0',
  `storage_id` int(11) DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `part_lists` WRITE;
/*!40000 ALTER TABLE `part_lists` DISABLE KEYS */;

INSERT INTO `part_lists` (`id`, `name`, `user_id`, `case_id`, `cooler_id`, `cpu_id`, `gpu_id`, `add_card`, `mobo_id`, `powersupply_id`, `ram_id`, `storage_id`, `total`, `created_at`, `updated_at`)
VALUES
	(55,'gaming pc',1,29,34,22,43,3,27,37,45,47,0,'2019-01-02 20:18:06','2019-01-19 14:12:08');

/*!40000 ALTER TABLE `part_lists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table parts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `parts`;

CREATE TABLE `parts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('case','cooler','cpu','gpu','motherboard','powersupply','ram','storage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `specs` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `socket` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `image` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `parts` WRITE;
/*!40000 ALTER TABLE `parts` DISABLE KEYS */;

INSERT INTO `parts` (`id`, `name`, `type`, `specs`, `socket`, `price`, `stock`, `image`, `created_at`, `updated_at`)
VALUES
	(13,'Intel Core i3 8350K','cpu','Intel Core i3 8350K, S 1151, Coffee Lake, Quad Core, 4 Thread, 4.0GHz, 8MB Cache, 1150MHz GPU, 91W, CPU','1151',159,100,'cpu-i3.jpg',NULL,'2019-01-20 12:33:46'),
	(17,'Intel Core i5 8600K','cpu','Intel Core i5 8600K, S 1151, Coffee Lake, 6 Core, 6 Thread, 3.6GHz, 4.3GHz Turbo, 9MB Cache, 1150MHz GPU, 95W','1151',262,100,'cpu-i5.jpg',NULL,NULL),
	(18,'Intel Core i7 8700K','cpu','Intel Core i7 8700K, S 1151, Coffee Lake, 6 Core, 12 Thread, 3.7GHz, 4.7GHz Turbo, 12MB Cache, 1200MHz GPU, 95W','1151',389,100,'cpu-i7.jpg',NULL,NULL),
	(19,'Intel Core i9 9900K','cpu','Intel Core i9 9900K, S 1151, Coffee Lake Refresh, 8 Core, 16 Thread, 3.6GHz, 5.0GHz Turbo, 16MB, 1200MHz GPU, 95W','1151',509,100,'cpu-i9.jpg',NULL,NULL),
	(20,'AMD Ryzen 3','cpu','AMD Ryzen™ 3 1200, S AM4, Quad Core, 4 Thread, 3.1GHz, 3.4GHz Turbo, 8MB Cache, 65W, CPU, Retail, +Wraith Stealth Cooler','AM4',94,100,'cpu-ryzen3.jpg',NULL,NULL),
	(21,'AMD Ryzen 5','cpu','AMD Ryzen™ 5 2600X, AM4, Zen+, 6 Core, 12 Thread, 3.6GHz, 4.25GHz Turbo, 19MB Cache, 95W, CPU, Retail + Wraith Spire','AM4',199,100,'cpu-ryzen5.jpg',NULL,NULL),
	(22,'AMD Ryzen 7','cpu','AMD Ryzen™ 7 1700, S AM4, 8 Core, 16 Thread, 3.0GHz, 3.7GHz Turbo, 16MB Cache, 65W, CPU, Retail, w/ Wraith Spire Cooler','AM4',275,100,'cpu-ryzen7.jpg',NULL,'2019-01-20 12:33:46'),
	(23,'Gigabyte AORUS Intel B360M GAMING 3','motherboard','Gigabyte B360M AORUS GAMING 3, Intel B360, S 1151, DDR4, SATA3, Dual M.2, 2-Way CrossFire, GbE, USB 3.1 Gen2 A, MicroATX','1151',83,100,'mobo-AORUS-Intel.jpg',NULL,NULL),
	(25,'ASUS ROG STRIX Intel Z390-F','motherboard','ASUS STRIX Z390-F GAMING, Intel Z390, S 1151, DDR4, SATA3, Dual M.2, 2-Way SLi/3-Way CrossFire, GbE, USB3.1 A+C, ATX','1151',199,100,'mobo-strix.jpg',NULL,NULL),
	(26,'ASRock AMD Ryzen X470 TaichiTX Motherboard','motherboard','ASRock X470 Taichi, AMD X470, S AM4, DDR4, SATA3, Dual M.2, 2-Way SLi/CrossFire, GbE, ac WiFi, USB 3.1 Gen2 A+C, ATX','AM4',191,100,'mobo-TaichiTX.png',NULL,NULL),
	(27,'ASUS AMD Ryzen ROG CROSSHAIR VII','motherboard','ASUS ROG CROSSHAIR VII HERO (WI-FI), AMD X470, S AM4, DDR4, SATA3, Dual M.2, 2-Way SLi/3-Way CrossFire, GbE/WiFi, ATX','AM4',257,100,'mobo-crosshair.jpg',NULL,'2019-01-20 12:33:46'),
	(28,'NZXT Red H500','case','NZXT H500, Red/Black, Mid Tower Computer Chassis, Tempered Glass Window, ATX/MicroATX/Mini-ITX, 2x 120mm Aer Fans',NULL,69.34,100,'case-nxzt500.jpg',NULL,NULL),
	(29,'Corsair 780T Black Full Tower Case','case','Corsair Graphite Series 780T Black Full Tower Case ',NULL,149,100,'case-780ti.png',NULL,'2019-01-20 12:33:46'),
	(30,'Corsair Carbide 100R Mid Tower Gaming Case','case','Corsair Carbide Series 100R Mid-Tower Computer Chassis with Side-Window, USB 3.0, Cable Management ',NULL,44,100,'case-Carbide.jpg',NULL,NULL),
	(31,'DeepCool Dukase V2','case','DeepCool Dukase V2, Black Mid Tower Computer Chassis, ATX/MicroATX/Mini-ITX, with Side Window, 120mm Fan, USB3.0',NULL,49,100,'case-dukase.jpg',NULL,NULL),
	(32,'Cooler Master C700M','case','Cooler Master Cosmos C700M RGB, Tempered Glass, 4x 120mm Fans, Radiator Support, E-ATX/ATX/MicroATX/Mini-ITX, USB Type-C',NULL,399,100,'case-c700m.jpg',NULL,NULL),
	(33,'Corsair Carbide 100R Mid Tower Gaming Case','case','Corsair Carbide Series 100R Mid-Tower Computer Chassis with Side-Window, USB 3.0, Cable Management ',NULL,44,100,'case-100r.jpg',NULL,NULL),
	(34,'Cooler Master Hyper 212X','cooler','Cooler Master Hyper 212X Tower CPU Cooler, 4 Heatpipes, 1x 120 PWM Fan',NULL,27,100,'cooler-hyper212.jpg',NULL,'2019-01-20 12:33:46'),
	(35,'NZXT Kraken X62 AIO WATER COOLING','cooler','NZXT Kraken X62, 280mm All-In-One CPU Hydro Cooler with RGB Lighting, CAM Control, 2x140mm PWM Fan, w/ AM4 Bracket, TR4',NULL,140,100,'cooler-kraken.png',NULL,NULL),
	(36,'Corsair 450 Watt CX450M','powersupply','450W Corsair CX450M, 80PLUS Bronze, Hybrid Modular, SLI/CrossFire, Single Rail, 37.4A +12V, 1x120mm Fan, ATX PSU',NULL,49,100,'pcu-cx450.jpg',NULL,NULL),
	(37,'be quiet! 400W Straight Power 10','powersupply','400W be quiet! BN230 Straight Power 10 80PLUS GOLD PSU with 135mm Silent Wings 3 FDB Fan ',NULL,65,100,'pcu-power.jpg',NULL,'2019-01-20 12:33:46'),
	(38,'EVGA GeForce GTX 1050 Ti','gpu','EVGA GeForce GTX 1050 Ti GAMING 4GB GDDR5 Graphics Card, 768 Core, 1290MHz GPU, 1392MHz Boost',NULL,155,100,'gpu-1050ti.jpg',NULL,NULL),
	(39,'MSI NVIDIA GeForce GTX 1070','gpu','MSI GeForce GTX 1070 Armor OC 8GB GDDR5 VR Ready Graphics Card, 1920 Core, 1556MHz GPU, 1746MHz Boost ',NULL,329,100,'gpu-1070.jpg',NULL,NULL),
	(41,'MSI NVIDIA GeForce RTX 2070','gpu','MSI GeForce RTX 2070 GAMING Z 8GB GDDR6 VR Ready Graphics Card, 2304 Core, 1410MHz GPU, 1830MHz Boost ',NULL,549,100,'gpu-2070.jpg',NULL,NULL),
	(42,'AORUS NVIDIA GeForce RTX 2080','gpu','Gigabyte GeForce RTX 2080 AORUS XTREME 8GB GDDR6 VR Ready Graphics Card, 2944 Core, 1890MHz Boost',NULL,828,100,'gpu-2080.jpg',NULL,NULL),
	(43,'ASUS NVIDIA GeForce RTX 2080 Ti','gpu','ASUS GeForce RTX 2080 Ti ROG STRIX OC GAMING 11GB GDDR6 VR Ready Graphics Card, 4352 Core, 1350MHz GPU, 1650MHz Boost',NULL,1499,100,'gpu-2080ti.jpg',NULL,'2019-01-20 12:33:46'),
	(44,'Corsair Vengeance DDR4 4GB','ram','4GB Corsair DDR4 Value Select, PC4-17000 (2133), Non-ECC Unbuffered, CAS 15-15-15-36, 1.2V, Single Stick, Desktop Memory',NULL,31,100,'ram-corsair.jpg',NULL,NULL),
	(45,'Corsair Vengeance DDR4 8GB','ram','8GB Corsair DDR4 Value Select, PC4-17000 (2133), Non-ECC Unbuffered, CAS 15-15-15-36, 1.2V, Single Stick, Desktop Memory ',NULL,55,100,'ram-corsair.jpg',NULL,'2019-01-20 12:33:46'),
	(46,'Corsair Vengeance DDR4 16GB','ram','16GB (2x8GB) Corsair DDR4 Vengeance LPX Black, PC4-17000 (2133), Non-ECC Unbuffered, CAS 13-15-15-28, XMP 2.0, 1.2V ',NULL,103,100,'ram-corsair.jpg',NULL,NULL),
	(47,'Bundle 1 - 1TB HDD','storage','',NULL,32,100,'storage-bundle1.png',NULL,'2019-01-20 12:33:46'),
	(48,'Bundle 2 - 2TB HDD/250GB SSD','storage','',NULL,121,100,'storage-bundle2-3.jpg',NULL,NULL),
	(49,'Bundle 3 - 4TB HDD/500GB SSD','storage','',NULL,201,100,'storage-bundle2-3.jpg',NULL,NULL);

/*!40000 ALTER TABLE `parts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Fraser','FraserProvan2@gmail.com',NULL,'$2y$10$NlTmtladbRbzgQqa2AdC5eSEmE8DIBHv6mSozktZhENHzR1mus6U6','74UPO4vDOteMK3fcZ7FCWF0d4Dule1rGCmXvYpJ01fV5k5EuWtO6qA9Hl54j','2018-12-23 14:28:34','2018-12-23 14:28:34'),
	(2,'test','test@gmail.com',NULL,'$2y$10$y40wu3gxvklqy5VzmfSJN.gtXSIzTwK1ozz.uDKtcPIXDzpMb0i6.','qMotNlCNjYXIJVlyoHnQN8BT1rTEXG2rgVsfhFeTZyU3AxblmxzqOFp952c2','2018-12-24 16:02:06','2018-12-24 16:02:06');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
