# ************************************************************
# Sequel Ace SQL dump
# Версия 20057
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Хост: localhost (MySQL 8.1.0)
# База данных: personal_site
# Время формирования: 2023-10-21 06:37:36 +0000
# ************************************************************

CREATE DATABASE personal_site;
USE personal_site;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы about
# ------------------------------------------------------------

DROP TABLE IF EXISTS `about`;

CREATE TABLE `about` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;

INSERT INTO `about` (`id`, `text`)
VALUES
	(14,'wefwef wef we f');

/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы guest_book
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guest_book`;

CREATE TABLE `guest_book` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `guest_book` WRITE;
/*!40000 ALTER TABLE `guest_book` DISABLE KEYS */;

INSERT INTO `guest_book` (`id`, `text`)
VALUES
	(3,'ewfefw we we'),
	(4,'wefwef'),
	(5,'rgerg erg erg ewrg er g'),
	(6,'fwef'),
	(7,'wef'),
	(8,'erger'),
	(9,'ewfwef'),
	(10,'gergerg'),
	(11,'gerg er gerg '),
	(12,'rgerger'),
	(13,'erg erg er'),
	(14,'ewfwe');

/*!40000 ALTER TABLE `guest_book` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы photo_gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photo_gallery`;

CREATE TABLE `photo_gallery` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_file` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `photo_gallery` WRITE;
/*!40000 ALTER TABLE `photo_gallery` DISABLE KEYS */;

INSERT INTO `photo_gallery` (`id`, `name_file`)
VALUES
	(1,'gallary_1.jpg'),
	(2,'gallary_2.jpg'),
	(3,'gallary_3.jpg'),
	(4,'gallary_4.jpg');

/*!40000 ALTER TABLE `photo_gallery` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
