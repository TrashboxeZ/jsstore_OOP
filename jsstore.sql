-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.31 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных jsstore
CREATE DATABASE IF NOT EXISTS `jsstore` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `jsstore`;


-- Дамп структуры для таблица jsstore.caret
CREATE TABLE IF NOT EXISTS `caret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_caret_users` (`user_id`),
  KEY `FK_caret_products` (`product_id`),
  CONSTRAINT `FK_caret_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `FK_caret_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jsstore.caret: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `caret` DISABLE KEYS */;
INSERT INTO `caret` (`id`, `user_id`, `product_id`) VALUES
	(5, 1, 28),
	(6, 1, 6),
	(7, 1, 14),
	(8, 1, 1),
	(9, 1, 1);
/*!40000 ALTER TABLE `caret` ENABLE KEYS */;


-- Дамп структуры для таблица jsstore.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` decimal(10,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jsstore.products: ~32 rows (приблизительно)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `title`, `description`, `price`) VALUES
	(1, 'Samsung a5', 'samsung', 1223.00),
	(6, 'Xiaomi mi 2', 'xiaomi', 4700.00),
	(7, 'nokia teksi', 'reload test', 12424.12),
	(14, 'samsung G3', 'sams', 15500.00),
	(28, 'samsung g5', 'samsung g5', 123.00),
	(30, 'samsung g6', 'samsung g6', 1560.15),
	(31, 'samsung a6', 'samsung a6', 1360.15),
	(32, 'samsung a9', 'samsung a9', 1990.15),
	(33, 'xiaomi mi 2', 'xiaomi', 3990.15),
	(34, 'xiaomi mi 3', 'xiaomi', 4990.15),
	(35, 'xiaomi mi 4', 'xiaomi', 5990.15),
	(36, 'xiaomi redmi note 2', 'xiaomi', 4990.15),
	(37, 'xiaomi redmi note 3', 'xiaomi', 6990.15),
	(38, 'xiaomi redmi note 42', 'xiaomi', 7990.15),
	(39, 'nokia 3310', 'nokia', 990.15),
	(40, 'nokia 3320', 'nokia', 1090.15),
	(41, 'nokia 3330', 'nokia', 1590.15),
	(42, 'nokia lumia 2', 'nokia', 1590.15),
	(43, 'nokia lumia 3', 'nokia', 2590.15),
	(44, 'nokia lumia 4', 'nokia', 2590.15),
	(45, 'nokia lumia 5', 'nokia', 3590.15),
	(46, 'nokia lumia a2', 'nokia', 4590.15),
	(47, 'nokia lumia a3', 'nokia', 4590.15),
	(48, 'nokia lumia a4', 'nokia', 5590.15),
	(49, 'nokia lumia a5', 'nokia', 6590.15),
	(50, 'meizu 1', 'meizu', 1590.15),
	(51, 'meizu 2', 'meizu', 2590.15),
	(52, 'meizu 3', 'meizu', 3590.15),
	(53, 'meizu a1', 'meizu', 2590.15),
	(54, 'meizu a2', 'meizu', 3590.15),
	(55, 'meizu a3', 'meizu', 4590.15);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Дамп структуры для таблица jsstore.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `img` varchar(150) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы jsstore.users: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `img`, `age`) VALUES
	(1, 'Valentin', 'Solovey', 'test', 'test', './temp/user1/photo_2017-08-03_17-10-07.jpg', 21);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
