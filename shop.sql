/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.25 : Database - shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `shop`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `parent_id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

insert  into `categories`(`id`,`parent_id`,`name`) values (1,0,'Телефоны'),(2,0,'Планшеты'),(3,1,'Телефоны Samsung'),(4,1,'Телефоны Apple'),(5,2,'Планшеты Apple'),(6,2,'Планшеты Acer'),(7,2,'Планшеты Samsung'),(10,0,'Компьютеры'),(11,10,'HP'),(12,10,'Lenovo');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_payment` datetime DEFAULT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `user_ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`id`,`user_id`,`date_created`,`date_payment`,`date_modification`,`status`,`comment`,`user_ip`) values (10,7,'2014-07-17 10:31:54',NULL,'2014-07-17 10:31:54',0,'id пользователя: 7<br />\r\n            Имя: Андрей<br />\r\n            Тел: 8 909-566-49-21<br />\r\n            Адрес: Великий Новгород','127.0.0.1'),(11,7,'2014-07-17 12:14:09',NULL,'2014-07-17 12:14:09',0,'id пользователя: 7<br />\r\n            Имя: Андрей<br />\r\n            Тел: 8 909-566-49-21<br />\r\n            Адрес: Великий Новгород','127.0.0.1'),(12,7,'2014-07-17 13:09:10',NULL,'2014-07-17 13:09:10',0,'id пользователя: 7<br />\r\n            Имя: Андрей<br />\r\n            Тел: 8 909-566-49-21<br />\r\n            Адрес: Великий Новгород','127.0.0.1'),(13,9,'2014-07-17 15:45:45',NULL,'2014-07-17 15:45:45',0,'id пользователя: 9<br />\r\n            Имя: Андрей<br />\r\n            Тел: 08098<br />\r\n            Адрес: фывафывафыва','127.0.0.1'),(14,0,'2014-07-17 15:46:31',NULL,'2014-07-17 15:46:31',0,'id пользователя: <br />\r\n            Имя: 123<br />\r\n            Тел: 123<br />\r\n            Адрес: 123','127.0.0.1'),(15,10,'2014-07-17 15:47:21',NULL,'2014-07-17 15:47:21',0,'id пользователя: 10<br />\r\n            Имя: 123<br />\r\n            Тел: 123<br />\r\n            Адрес: 123','127.0.0.1'),(16,7,'2014-07-17 16:45:08',NULL,'2014-07-17 16:45:08',0,'id пользователя: 7<br />\r\n            Имя: Андрей<br />\r\n            Тел: 8 909-566-49-21<br />\r\n            Адрес: Великий Новгород','127.0.0.1'),(17,6,'2014-07-17 16:47:48',NULL,'2014-07-17 16:47:48',0,'ID пользователя: 6<br />\r\n            Имя: <br />\r\n            Тел: <br />\r\n            Адрес: ','127.0.0.1'),(18,6,'2014-07-17 16:48:21','2014-07-18 17:00:35','2014-07-25 10:27:25',1,'ID пользователя: 6<br />\r\n            Имя: Андрей<br />\r\n            Тел: 123<br />\r\n            Адрес: ','127.0.0.1'),(19,7,'2014-07-28 11:34:29',NULL,'2014-07-28 11:34:29',0,'ID пользователя: 7<br />\r\n               Имя: Андрей<br />\r\n               Тел: 8 909-566-49-21<br />\r\n               Адрес: Великий Новгород','127.0.0.1'),(20,7,'2014-07-28 11:35:11',NULL,'2014-07-28 11:35:11',0,'ID пользователя: 7<br />\r\n               Имя: Андрей<br />\r\n               Тел: 8 909-566-49-21<br />\r\n               Адрес: Великий Новгород','127.0.0.1'),(21,7,'2014-07-28 13:53:27','2014-07-28 14:03:00','2014-07-28 14:03:41',1,'ID пользователя: 7<br />\r\n               Имя: Андрей<br />\r\n               Тел: 8 909-566-49-21<br />\r\n               Адрес: Великий Новгород','127.0.0.1');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`id`,`category_id`,`name`,`description`,`price`,`image`,`status`) values (1,3,'GT-C3560','                        <p>Закругленные углы и окантовка  вносят стильный штрих в минималистичный дизайн телефона. Металлическая отделка смотрится  элегантно и современно. А благодаря небольшим размерам С3560 удобно лежит в руке и легко помещается в кармане.</p>\n<br />\n\n<p>Спецификации:</p>\n<ul><li>Стандарты сети GSM и EDGE : GSM (850/900/1800/1900)</li><li>Стандарт сети 3G : N/A</li><li>Стандарт сети CDMA : N/A</li><li>TD-SCDMA Band : N/A</li></ul>\n                    ',3000,'1.png',1),(3,3,'GT-E2600','<p>Тонкий и изящный дизайн телефона E2600? широкий экран и пользовательский интерфейс Paragon UX обеспечивают удобство и комфорт в использовании.  Телефон оснащен интуитивно-понятным пользовательским интерфейсом.  </p>\n<br />\n<p>Спецификации:</p>\n<ul><li>850 / 900 / 1800 / 1900 МГц GSM & EDGE Band</li><li>GPRS Network&Data: 850 / 900 / 1800 / 1900</li><li>EDGE Network&Data: 850 / 900 / 1800 / 1900</li><li>фирменная</li><li>Интернет браузерr ( NetFront 4.2)</li><li>JAVA™ SUN CLDC HotSpot Implementation 1.1 (MIDP 2.0) Platform</li><li>SAR 0,45 Вт./кг.</li></ul>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2600ZKASER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2600ZKASER</a>',5000,'3.png',1),(2,3,'S5570 Galaxy mini','Платформа\n850/900/1800/1900 МГц\nДиапазон 900/2100 МГц\nAndroid 2.2 OS\nИнтернет браузер (Android Browser)\nФизические характеристики\nВес трубки 106,6 г.\nРазмеры трубки: 110,4 x 60,6 x 12,1 мм',7000,'2.png',1),(4,3,'E2530 La Fleur','                        <ul><li>850/900/1800/1900 МГц</li><li>GPRS класс 12</li><li>EDGE Class12(только RX)</li><li>Proprietary (MMP) OS</li><li>Интернет браузер</li><li>MIDP 2,1 / CLDC 1.1</li></ul>\n\n<ul><li>Вес трубки 86 г.</li><li>Размеры трубки: 94.4 x 47.2 x 17.4 мм</li></ul>\n\n<ul><li>Стандартная батарея: до 800 мАч</li><li>До 680 мин. в режиме разговора</li></ul>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2530SRFSER\">\nhttp://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2530SRFSER</a>\n                    ',6000,'4.png',1),(5,3,'S3350 Chat 335','<p>Samsung Ch@t 335 — самый тонкий QWERTY-телефон на современном рынке, чья толщина составляет всего 11,9&nbsp;мм. Обтекаемый корпус с хромированным покрытием придает модели изысканный классический вид. 2,4-дюймовый LQVGA дисплей идеально подходит для просмотра снимков и чтения длинных сообщений.</p>\n<br />\n<p>Благодаря новой, улучшенной QWERTY-клавиатуре набор текста становится еще более быстрым и удобным, как при печати на ПК. Есть возможность настраивать горячие клавиши для часто используемых приложений (например, A для будильника и т.п.).</p>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-S3350HKASER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-S3350HKASER</a>',10000,'5.png',1),(6,3,'S5380 La Fleur Wave Y','Стандарты сети 850/900/1800/1900MHz GSM&EDGE Band\nСтандарты сети: 900/2100МГц 3G\nПоддерживаемые 3G: GPRS Network&Data :850/900/1800/1900 (Slave)\nEDGE Network&Data: стандарты сетей: 850/900/1800/1900 (Master)\nNetwork&Data (3G): HSDPA 7,2Мбит/с.\nBada 2.0\nБраузер Dolfin Browser 3.0\nПлатформа SUN CLDC 1.1\nЗначение SAR: 0,797мВт./г.\n',12000,'6.png',1),(7,3,'I9001 Galaxy S Plus','Платформа\n850 / 900 / 1800 / 1900 МГц\nGPRS Class12\nEDGE Class12\nИнтернет браузер (Android Browser)\nДисплей\nРазрешение дисплея 480 x 800 WVGA\n<br />\n<br />\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-smart/GT-I9001HKDSER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-smart/GT-I9001HKDSER</a>',11000,'7.png',1),(8,3,'I8350 Omnia W','Windows Phone 7.5 Mango\nGSM&EDGE 850 / 900 / 1,800 / 1,900 МГц\n3G 900 / 2,100 MГц\nGPRS: Класс 12\nEDGE: Класс 12\nHSDPA 14.4 / HSUPA 5.76 Мбит/с\nInternet Explorer 9\n',15000,'8.png',1),(11,4,'iPhone 3GS','Широкоформатный дисплей Multi-Touch с диагональю 3,5 дюйма\nРазрешение 480 x 320 пикселей (163 пикселя/дюйм)\nОлеофобное покрытие, препятствующее появлению отпечатков пальцев\nПоддержка одновременного отображения нескольких языков и наборов символов\n<br /><br />\n<a href=\"http://www.apple.com/ru/iphone/iphone-3gs/specs.html\">http://www.apple.com/ru/iphone/iphone-3gs/specs.html</a>',20000,'11.PNG',1),(12,4,'iPhone 4S','                                                Поддержка международных сетей\nUMTS/HSDPA/HSUPA (850, 900, 1900, 2100 МГц); \nGSM/EDGE (850, 900, 1800, 1900 МГц)\nCDMA EV-DO Rev. A (800, 1900 МГц)3\n802.11b/g/n Wi-Fi (802.11n только 2,4 ГГц)\nБеспроводная технология Bluetooth 4.0\n<br /><br />\n<a href=\"http://www.apple.com/ru/iphone/specs.html\">http://www.apple.com/ru/iphone/specs.html</a>\n                    \n                    ',25000,'12.png',1),(18,10,'Новый компьютер','Это описание для нового компьютера',10000,'18.jpg',0),(19,4,'qwe123','=)',10000,'19.jpg',0);

/*Table structure for table `purchase` */

DROP TABLE IF EXISTS `purchase`;

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `purchase` */

insert  into `purchase`(`id`,`order_id`,`product_id`,`price`,`amount`) values (1,11,2,7000,1),(2,11,7,11000,1),(3,12,1,3000,1),(4,12,4,6000,2),(5,12,12,25000,3),(6,13,7,11000,1),(7,14,1,3000,1),(8,15,7,11000,1),(9,16,3,5000,1),(10,17,3,5000,1),(11,17,12,25000,2),(12,18,12,25000,1),(13,20,1,3000,1),(14,20,11,20000,1),(15,21,12,25000,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `role` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`pwd`,`name`,`phone`,`address`,`role`) values (7,'andr@inbox.ru','abe6db4c9f5484fae8d79f2e868a673c','Андрей','8 909-566-49-21','Великий Новгород','1'),(6,'123','202cb962ac59075b964b07152d234b70','Один-два-три','123','','0'),(8,'andy','abe6db4c9f5484fae8d79f2e868a673c','Андрей','1234','Адрес','1'),(9,'qwe','202cb962ac59075b964b07152d234b70','Андрей','08098','фывафывафыва','0'),(10,'345','202cb962ac59075b964b07152d234b70','123','123','123','0'),(11,'456','250cf8b51c773f3f8dc8b4be867a9a02','456','456','456','0'),(12,'3333','2be9bd7a3434f7038ca27d1918de58bd','Иван','987','Москва','0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
