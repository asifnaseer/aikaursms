/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.14-log : Database - instagram
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


/*Table structure for table `animation_preset` */

DROP TABLE IF EXISTS `animation_preset`;

CREATE TABLE `animation_preset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `animation_preset` */

insert  into `animation_preset`(`id`,`name`) values (1,'Left to Right Continuous'),(2,'Right to Left Continuous');

/*Table structure for table `animation_speed` */

DROP TABLE IF EXISTS `animation_speed`;

CREATE TABLE `animation_speed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `animation_speed` */

insert  into `animation_speed`(`id`,`name`) values (1,'Very Slow'),(2,'Slow'),(3,'Medium'),(4,'Fast'),(5,'Very Fast'),(6,'Very Very Fast');

/*Table structure for table `appearance_font` */

DROP TABLE IF EXISTS `appearance_font`;

CREATE TABLE `appearance_font` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `appearance_font` */

insert  into `appearance_font`(`id`,`name`) values (1,'arial'),(2,'arial black'),(3,'times new roman');

/*Table structure for table `appearance_font_size` */

DROP TABLE IF EXISTS `appearance_font_size`;

CREATE TABLE `appearance_font_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `appearance_font_size` */

insert  into `appearance_font_size`(`id`,`name`) values (1,'9'),(2,'10'),(3,'11'),(4,'12'),(5,'13'),(6,'14'),(7,'15'),(8,'16'),(9,'17'),(10,'18'),(11,'19'),(12,'20');

/*Table structure for table `appearance_location` */

DROP TABLE IF EXISTS `appearance_location`;

CREATE TABLE `appearance_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `appearance_location` */

insert  into `appearance_location`(`id`,`name`) values (1,'Top'),(2,'Bottom'),(3,'Top Left'),(4,'Top Right'),(5,'Right'),(6,'Left'),(7,'Bottom Left'),(8,'Bottom Right');

/*Table structure for table `blocked_follower` */

DROP TABLE IF EXISTS `blocked_follower`;

CREATE TABLE `blocked_follower` (
  `blocked_follower_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `board_id` int(11) NOT NULL,
  `ig_id` int(11) NOT NULL,
  PRIMARY KEY (`blocked_follower_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `blocked_follower` */

insert  into `blocked_follower`(`blocked_follower_id`,`board_id`,`ig_id`) values (1,22,819729375),(3,23,819729375),(4,24,819729375),(5,26,971850549),(6,27,971850549),(7,28,971850549),(8,30,971850549),(9,31,13854229),(10,31,204292585);

/*Table structure for table `board` */

DROP TABLE IF EXISTS `board`;

CREATE TABLE `board` (
  `board_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_preset_id` int(11) NOT NULL,
  `tag` varchar(200) NOT NULL,
  `control` enum('yes','no') NOT NULL DEFAULT 'yes',
  `lock_down` enum('yes','no') NOT NULL DEFAULT 'yes',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`board_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `board` */

insert  into `board`(`board_id`,`user_id`,`package_id`,`user_preset_id`,`tag`,`control`,`lock_down`,`status`) values (26,90,6,15,'lol','yes','no','inactive'),(27,90,3,15,'lol','yes','yes','inactive'),(28,90,3,15,'test','yes','yes','inactive'),(29,90,3,15,'lol','yes','yes','inactive'),(30,90,6,15,'lol','yes','yes','inactive'),(31,90,1,16,'Datum','yes','yes','inactive'),(32,90,2,17,'lol','yes','yes','inactive');

/*Table structure for table `board_banned_user` */

DROP TABLE IF EXISTS `board_banned_user`;

CREATE TABLE `board_banned_user` (
  `board_banned_user_id` binary(1) NOT NULL,
  `board_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`board_banned_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `board_banned_user` */

/*Table structure for table `board_privacy` */

DROP TABLE IF EXISTS `board_privacy`;

CREATE TABLE `board_privacy` (
  `board_privacy_id` int(11) NOT NULL AUTO_INCREMENT,
  `board_id` int(11) NOT NULL,
  `board_private` enum('yes','no') NOT NULL,
  `unlock_code` varchar(250) NOT NULL,
  PRIMARY KEY (`board_privacy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `board_privacy` */

insert  into `board_privacy`(`board_privacy_id`,`board_id`,`board_private`,`unlock_code`) values (6,11,'yes','123432'),(7,12,'yes','12312'),(8,13,'yes','12323'),(9,14,'yes','123213'),(10,15,'yes','123434'),(11,16,'yes','123124'),(12,18,'yes','12343'),(13,22,'yes',''),(14,22,'yes',''),(15,22,'yes',''),(16,22,'yes',''),(17,22,'yes',''),(18,23,'yes','123'),(19,24,'yes','1212423'),(20,26,'yes',''),(21,27,'yes','1232'),(22,28,'yes','1234321'),(23,29,'yes','12343'),(24,30,'yes','213'),(25,31,'yes','12312');

/*Table structure for table `gen_contact_information` */

DROP TABLE IF EXISTS `gen_contact_information`;

CREATE TABLE `gen_contact_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `gen_contact_information` */

insert  into `gen_contact_information`(`id`,`telephone`,`mobile`,`email`,`website`,`notes`,`tags`,`created_at`,`updated_at`,`deleted_at`) values (1,'92 051 3439999','92 332 5929999','ali.m@allshoreresources.com','','','','2013-12-12 16:38:34','2013-12-12 16:38:34',NULL),(6,'92 051 3439999','92 332 5929999','','','','','2014-01-14 14:29:57','2014-01-14 14:29:57',NULL),(7,'+93232332','+93223423','','','','','2014-01-29 19:04:03','2014-01-29 19:04:03',NULL),(8,'92332423','23423423','','','','','2014-01-30 19:55:07','2014-01-30 19:55:07',NULL),(9,'92123123','8234234','','','','','2014-02-03 20:39:44','2014-02-03 20:39:44',NULL);

/*Table structure for table `gen_menu_item` */

DROP TABLE IF EXISTS `gen_menu_item`;

CREATE TABLE `gen_menu_item` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `parent_id` int(6) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `route` varchar(150) DEFAULT NULL,
  `route_name` varchar(150) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `order_by` int(3) DEFAULT NULL,
  `last_updated_by` tinyint(1) DEFAULT NULL,
  `last_updated_date` datetime DEFAULT NULL,
  `created_by` tinyint(1) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `gen_menu_item` */

insert  into `gen_menu_item`(`id`,`parent_id`,`title`,`route`,`route_name`,`icon`,`order_by`,`last_updated_by`,`last_updated_date`,`created_by`,`created_date`,`published`,`is_deleted`) values (4,0,'dashboard','/admin/dasboard','admin.dashboard','home',1,NULL,NULL,1,'2013-01-23 22:50:41',1,0),(5,0,'My Boards','/admin/boards','admin.boards.list','film',5,NULL,NULL,1,'2013-01-24 22:12:13',1,0),(6,0,'User Management','/admin/users','admin.users.list','user',2,NULL,NULL,1,'2013-01-24 22:14:28',1,0),(9,0,'Site Configurations','',NULL,'cogs',6,NULL,NULL,1,'2013-09-10 18:31:27',1,1),(10,0,'Dashboard','/user/dashboard','user.dashboard','home',1,NULL,NULL,1,'2014-02-07 19:46:54',1,0),(11,0,'My Boards','#','user.manageboard','film',2,NULL,NULL,1,'2014-02-07 20:03:53',1,0),(12,11,'Manage Board','/user/manage-board','user.manageboard','user',3,NULL,NULL,1,'2014-02-07 20:06:40',1,0),(13,11,'Create a New Board','user/new-board','user.newboard','user',4,NULL,NULL,1,'2014-02-07 20:16:33',1,0);

/*Table structure for table `gen_menu_item_by_group` */

DROP TABLE IF EXISTS `gen_menu_item_by_group`;

CREATE TABLE `gen_menu_item_by_group` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(4) NOT NULL,
  `menu_item_id` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `gen_menu_item_by_group` */

insert  into `gen_menu_item_by_group`(`id`,`group_id`,`menu_item_id`,`description`) values (6,1,'4','dashboard menu - super administrator'),(7,1,'5','menu manager menu - super administrator'),(8,1,'6','form manager menu - super administrator'),(9,1,'7','acl menu -  super admin menu'),(10,1,'8','cms menu - super admin menu'),(11,1,'9','site configuration - super admin menu'),(12,2,'10','Dashboard for the user'),(13,2,'11','My Board in User paenl'),(14,2,'12','Manage boarded in user paenl'),(15,2,'13','create newboard in user panel');

/*Table structure for table `gen_menu_item_by_position` */

DROP TABLE IF EXISTS `gen_menu_item_by_position`;

CREATE TABLE `gen_menu_item_by_position` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `menu_position_id` varchar(255) DEFAULT NULL,
  `menu_item_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `gen_menu_item_by_position` */

insert  into `gen_menu_item_by_position`(`id`,`menu_position_id`,`menu_item_id`,`description`) values (10,'4','4','dashboard menu item - cpanel menu'),(11,'4','5','menu manager menu item - cpanel menu'),(12,'4','6','user manager menu item - cpanel menu'),(13,'4','7','acl management menu item - cpanel menu'),(14,'4','8','cms management menu item - cpanel menu'),(15,'4','9','site configuration - cpanel menu item'),(16,'4','10','dashboard for the user'),(17,'4','11','my boaard in user panel'),(18,'4','12','manage board'),(19,'4','13','create new board');

/*Table structure for table `gen_menu_position` */

DROP TABLE IF EXISTS `gen_menu_position`;

CREATE TABLE `gen_menu_position` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `menu_position` varchar(20) DEFAULT NULL,
  `menu_position_lable` varchar(100) DEFAULT NULL,
  `published` varchar(255) DEFAULT NULL,
  `last_updated_by` varchar(255) DEFAULT NULL,
  `last_updated_date` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `gen_menu_position` */

insert  into `gen_menu_position`(`id`,`menu_position`,`menu_position_lable`,`published`,`last_updated_by`,`last_updated_date`,`created_by`,`created_date`,`is_deleted`) values (1,'top','Top Menu','1',NULL,NULL,'1','2013-01-17 00:18:32',0),(2,'right','Right Menu','1',NULL,NULL,'1','2013-01-17 01:13:02',0),(3,'bottom','BottomMenu','1',NULL,NULL,'1','2013-01-17 01:13:27',0),(4,'left','Left Menu','1',NULL,NULL,'1','2013-01-24 00:44:37',0);

/*Table structure for table `gen_physical_address` */

DROP TABLE IF EXISTS `gen_physical_address`;

CREATE TABLE `gen_physical_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `line1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `state_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `country_sub_division_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code_suffix` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `long` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `gen_physical_address` */

insert  into `gen_physical_address`(`id`,`line1`,`line2`,`line3`,`line4`,`line5`,`city`,`state`,`state_code`,`country`,`country_code`,`country_sub_division_code`,`postal_code`,`postal_code_suffix`,`lat`,`long`,`notes`,`tags`,`created_at`,`updated_at`,`deleted_at`) values (1,'G9, 1 pisahwer more','G9, 1 pisahwer more','G9, 1 pisahwer more','G9, 1 pisahwer more','','Islamabad','Punjab','','Pakistan','','','46600','','','','','','2013-12-12 16:26:37','2013-12-12 16:26:37',NULL),(11,'G9, 1 pisahwer more','line2','line  no 3','line4','','Islamabad','Punjab','','Pakistan','','','46600','','','','','','2014-01-14 14:29:57','2014-01-14 14:29:57',NULL),(3,'G9, 1 pisahwer more 3','G9, 1 pisahwer more 3','G9, 1 pisahwer more 3','G9, 1 pisahwer more 3','','Islamabad','Alaska','','Pakistan','','','46600','','','','','','2013-12-12 16:38:34','2013-12-12 16:38:34',NULL),(12,'street # 22 , LHR','','','','','Lahore','Punjab','','Pakistan','','','54770','','','','','','2014-01-29 19:04:03','2014-01-29 19:04:03',NULL),(13,'test1','test2','test3','test4','','Lahore','PU','','Paksitan','','','54770','','','','','','2014-01-30 19:55:07','2014-01-30 19:55:07',NULL),(14,'test 123','test 1234','test12345','test12345','','Lahore','PU','','Pakistan','','','54770','','','','','','2014-02-03 20:39:44','2014-02-03 20:39:44',NULL);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`permissions`,`created_at`,`updated_at`) values (1,'Admin','{\"1.2.3\":1,\"acl.acl.index\":1,\"1.2.4\":1,\"acl.acl.add\":1,\"16.17.18\":1,\"config.config.index\":1,\"9.10.12\":1,\"9.10.13\":1,\"cms.cms.add\":1,\"cms.cms.edit\":1,\"1.2.7\":1,\"1.2.8\":1,\"9.10.11\":1,\"acl.acl.privileges\":1,\"acl.acl.addmodulenode\":1,\"cms.cms.index\":1,\"1.2.5\":1,\"1.2.6\":1,\"9.10.14\":1,\"9.10.15\":1,\"16.17.19\":1,\"acl.acl.edit\":1,\"acl.acl.delete\":1,\"cms.cms.delete\":1,\"cms.cms.publish\":1,\"config.config.edit\":1}','2013-10-31 13:40:01','2013-11-11 20:45:40'),(2,'User','{\"1.2.3\":1,\"acl.acl.index\":1,\"9.10.11\":1,\"cms.cms.index\":1,\"9.10.14\":1,\"9.10.15\":1,\"cms.cms.delete\":1,\"cms.cms.publish\":1,\"9.10.12\":1,\"9.10.13\":1,\"cms.cms.add\":1,\"cms.cms.edit\":1}','2013-11-05 19:42:52','2013-11-08 18:53:20'),(3,'Employee','{\"9.10.11\":1,\"9.10.12\":1,\"cms.cms.index\":1,\"cms.cms.add\":1}','2013-11-07 16:16:00','2013-11-08 18:48:51');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2012_12_06_225921_migration_cartalyst_sentry_install_users',1),('2012_12_06_225929_migration_cartalyst_sentry_install_groups',1),('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot',1),('2012_12_06_225988_migration_cartalyst_sentry_install_throttle',1),('2013_12_02_184759_PhysicalAddress',2),('2013_12_03_145116_ContactInformation',2),('2013_12_12_152047_Event',2),('2013_12_13_141552_AldiVideo',3);

/*Table structure for table `package` */

DROP TABLE IF EXISTS `package`;

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `color` varchar(25) NOT NULL,
  `detail` text NOT NULL,
  `type` enum('personal','professional') NOT NULL DEFAULT 'personal',
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `package` */

insert  into `package`(`package_id`,`name`,`duration`,`price`,`color`,`detail`,`type`) values (1,'Personal','48 hours','9.99','#35AA47','<p> Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. \r\n</p>','personal'),(2,'Personal +','48 hours','11.99','#31A9D4','<p> Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. \r\n</p>','personal'),(3,'Fancy','48 hours','15.99','#8064A1','<p> Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. \r\n</p>','personal'),(4,'Bronze','Per month','29.99','#948A54','<p> Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. \r\n</p>','professional'),(5,'Silver','Per month','49.99','#A6A6A6',' <p> Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. \r\n</p>','professional'),(6,'Gold','Per month','89.99','#FFD71B','		<p> Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. Testing .. \r\n</p>','professional');

/*Table structure for table `password_history` */

DROP TABLE IF EXISTS `password_history`;

CREATE TABLE `password_history` (
  `password_history_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`password_history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `password_history` */

insert  into `password_history`(`password_history_id`,`user_id`,`password`,`timestamp`) values (14,90,'$2y$08$b4FmxB5mOQoS.Zn6LrAhv.uLOoPBcJ.5/ye8YMqjdm.nPmscQyUVS','2014-03-07 19:16:01');

/*Table structure for table `photo_size` */

DROP TABLE IF EXISTS `photo_size`;

CREATE TABLE `photo_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `photo_size` */

insert  into `photo_size`(`id`,`name`) values (1,'Tiny'),(2,'Small'),(3,'Large'),(4,'Extra Large');

/*Table structure for table `promo_code` */

DROP TABLE IF EXISTS `promo_code`;

CREATE TABLE `promo_code` (
  `promo_code_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `status` enum('available','used') DEFAULT 'available',
  PRIMARY KEY (`promo_code_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `promo_code` */

insert  into `promo_code`(`promo_code_id`,`code`,`price`,`status`) values (1,'abc','3','available'),(2,'xyz','2','available'),(3,'add','1','available');

/*Table structure for table `temp_hash_tag` */

DROP TABLE IF EXISTS `temp_hash_tag`;

CREATE TABLE `temp_hash_tag` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

/*Data for the table `temp_hash_tag` */

insert  into `temp_hash_tag`(`id`,`user_id`,`tag`) values (16,58,'hehe'),(17,58,'lol'),(18,58,'lol'),(19,58,'lol'),(20,58,'lol'),(21,58,'lol'),(22,58,'asif'),(23,58,'lol'),(24,58,'lol'),(25,78,'lol'),(26,78,'balls'),(27,58,'balls'),(28,58,'balls'),(29,58,'balls'),(30,58,'balls'),(31,58,'lol'),(32,58,'lol'),(33,58,'lol'),(34,58,'lol'),(35,58,'lol'),(36,58,'lol'),(37,58,'balls'),(38,58,'lol'),(39,58,'lol'),(40,58,'lol'),(41,58,'balls'),(42,58,'lol'),(43,58,'balls'),(44,58,'balls'),(45,58,'lol'),(46,58,'lol'),(47,58,'lol'),(48,58,'balls'),(49,58,'balls'),(50,58,'balls'),(51,58,'balls'),(52,58,'balls'),(53,58,'balls'),(54,58,'balls'),(55,58,'lol'),(56,58,'lol'),(57,58,'test'),(58,58,'lol'),(59,58,'lol'),(60,58,'balls'),(61,58,'lol'),(62,58,'lol'),(63,58,'lol'),(64,58,'lol'),(65,90,'lol'),(66,90,'lol'),(67,90,'balls'),(68,90,'lol'),(69,90,'lol'),(70,90,'balls'),(71,90,'lol'),(72,90,'balls'),(73,90,'lol'),(74,90,'balls'),(75,90,'balls'),(76,90,'lol'),(77,90,'lol'),(78,90,'lol'),(79,90,'==lol'),(80,90,'lol'),(81,90,'lol'),(82,90,'d'),(83,90,'lol'),(84,90,'test'),(85,90,'lol'),(86,90,'test'),(87,90,'lol'),(88,90,'lol'),(89,90,'Datum'),(90,90,'lol');

/*Table structure for table `temp_preset_logo` */

DROP TABLE IF EXISTS `temp_preset_logo`;

CREATE TABLE `temp_preset_logo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Data for the table `temp_preset_logo` */

insert  into `temp_preset_logo`(`id`,`user_id`,`file_name`) values (5,58,'DoJmjCHBtMg6nX9D5f4t.jpg'),(6,78,'liVdLbxCEdn1Io9T7tFD.JPG'),(7,58,'UOzXlu1F6ojy9DGh0wxW.JPG'),(8,90,'K7agGcRmXHaRXUOC3CmD.png'),(9,90,'fL6gclziUBh2dZcoJTQB.png'),(10,90,'ipYWag3WkC7BQ4su9ndh.png'),(11,90,'Q4gxvFGisGev55bLDoOa.png'),(12,90,'RzMKvDGuPUffzqRplX9s.png'),(13,90,'hNO7Z5PgmdiNqQqvhoHx.png'),(14,90,'HCCODbz7RwcqGNmMXTnO.png'),(15,90,'XhG1NSh9z2l8cieUF5B7.png'),(16,90,'xfirCj6g3rnB249kcHas.png'),(17,90,'GonJjhonMPWEFDhCZjW5.png'),(18,90,'RvFDs7bSMFEja6h34Crl.png'),(19,90,'IJ8arzqROIO4H7dKi5Bf.png'),(20,90,'axtFOnepFku7QKWY7Z4d.png'),(21,90,'XVGk9osGp5RjkUHLWgyo.png'),(22,90,'EafrIH4t6bQENMGXLfN9.png'),(23,90,'n0HFiuOJOPPgxGiRDVL1.png'),(24,90,'jff7N3JCceBVubcNTL5v.png'),(25,90,'mILWRbx8rnh9knDpaRD7.png'),(26,90,'F0Wlreu58kdnSSor2qz2.png'),(27,90,'2Ec1J1WbRYKUMeCsQKaI.png'),(28,90,'M8TmSSKJlPnbfqCL0Txm.png'),(29,90,'at4j1yjAi5ybBSZLjwR1.png'),(30,90,'ViJgQcam4eKYDMB3QbFB.png'),(31,90,'GbrKMXDaDKpJOlbeKXtY.png'),(32,90,'WOdODxK1IWKj0IWOD6gl.png'),(33,90,'JJ8KxcmdSMmPIKFKxBMv.png'),(34,90,'srAcYeKg3YcGfCBYNRRj.png'),(35,90,'SUwdcqmxUqHQuYN3H2QZ.png'),(36,90,'IWbnhoOk4mObdJ53NPqV.png'),(37,90,'pTn7Z8N8zCWNPKeY7Prz.png'),(38,90,'jXowWtFd3HlcSx7hKuGN.JPG'),(39,90,'tPhRIjwHkhAvWru8F0ZU.png'),(40,90,'VBvw7OPYkXYgFzfwsqiV.png'),(41,90,'JnkgmPj8Kf0lr5MW0ThS.png'),(42,90,'VjGAXVeo2JJDVWhyx1s9.png'),(43,90,'QgMPLlr5oGgfJKcFnj6k.png'),(44,90,'ASa3BRDJSa6h81nP1BjB.png'),(45,90,'0UOOaURm1oN1AssUZc55.png'),(46,90,'ucFlLMy5j3J2mbTuSyEu.png'),(47,90,'cO3hsOvOQSeEHatu6J5Q.png'),(48,90,'i8I1o1Hpvsb6BzW24XLi.png'),(49,90,'rr2XS5VdqxDp2Zd0kOuJ.png'),(50,90,'Zf8bbxJ3CBH9vo3rlpQi.png'),(51,90,'LW8E5ZbidSZZ48W9x614.JPG'),(52,90,'cegnYeLBxCpKXWlic5zK.JPG'),(53,90,'Ibuobi0toBN86iRaUY6K.JPG'),(54,90,'O7R6Q6EBlJWUJPTRsCyz.JPG'),(55,90,'lK1ePsu4lSaKlcUr7D4y.JPG'),(56,90,'JcurbEY3P8vhuWmRVWQC.JPG'),(57,90,'0EgRzXgmcpdXAi7yvESf.JPG'),(58,90,'0PoorwG1q1Fy56XiCXeI.JPG'),(59,90,'HKk5z9sAA4wbPaaVecgh.JPG'),(60,90,'9PEaEGElOTmXkGttsPuy.JPG'),(61,90,'LjnO4bJhYmbuZquynL7p.JPG'),(62,90,'wtxXJxOa7O8UGCmEr7fI.JPG'),(63,90,'OGmwMwNhdKZYUEDrXwyb.JPG'),(64,90,'3HMfaTrPO9u2VGWkXFDJ.JPG'),(65,90,'40UeBDg5hm4jCDb2FCwU.JPG'),(66,90,'0WQnLx5FgGhq4lDzN6np.JPG'),(67,90,'tHkPi6jYA5RoSkiimv1P.JPG'),(68,90,'2lUgWjHXhz3T2DmMUYRG.JPG'),(69,90,'OugvMtaMcQWzsTSSYZ18.png'),(70,90,'nwf0k9je4kn5MUk2rkn9.jpg'),(71,90,'NoyWvfE6TEjk90xUBPz5.JPG'),(72,90,'uRhOvi8oZw268OcYmk5U.JPG'),(73,90,'WFIJfysjGqAjjFHYz3nk.jpg'),(74,90,'wMtCi46FRJXKC3iF3Q2T.JPG'),(75,90,'LyftCHVawZfS8NMq7KEU.jpg'),(76,90,'Tw5q0iPFr75Z1ItfuEWj.JPG'),(77,90,'e7NAnXGqX28IrwgQMkfD.JPG'),(78,90,'yPI5ehvYB393oZHnsOZc.JPG'),(79,90,'jemwCDq9Xwvsy5vB9ZIn.jpg'),(80,90,'j8le3ivVBgtaaDx6EkLW.JPG'),(81,90,'YF7mK1Q4n0oNMSuQ4FsL.png');

/*Table structure for table `throttle` */

DROP TABLE IF EXISTS `throttle`;

CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `throttle` */

insert  into `throttle`(`id`,`user_id`,`ip_address`,`attempts`,`suspended`,`banned`,`last_attempt_at`,`suspended_at`,`banned_at`) values (1,1,'127.0.0.1',0,0,0,NULL,NULL,NULL),(2,46,'127.0.0.1',0,0,0,NULL,NULL,NULL),(3,53,'127.0.0.1',2,0,0,'2014-01-09 14:26:05',NULL,NULL),(4,55,'127.0.0.1',3,0,0,'2014-02-06 20:37:52',NULL,NULL),(5,58,'127.0.0.1',0,0,0,NULL,NULL,NULL);

/*Table structure for table `user_preset` */

DROP TABLE IF EXISTS `user_preset`;

CREATE TABLE `user_preset` (
  `user_preset_id` int(11) NOT NULL AUTO_INCREMENT,
  `preset_name` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `font_id` int(11) NOT NULL,
  `font_size_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `font_color` varchar(10) NOT NULL,
  `background_color` varchar(10) NOT NULL,
  `branding` enum('yes','no') NOT NULL,
  `glow_shadow_effect` enum('yes','no') NOT NULL,
  `effect_color` varchar(10) NOT NULL,
  `photo_background` enum('yes','no') NOT NULL,
  `photo_background_color` varchar(10) NOT NULL,
  `include_avatar` enum('yes','no') NOT NULL,
  `include_name` enum('yes','no') NOT NULL,
  `include_likes` enum('yes','no') NOT NULL,
  `include_comments` enum('yes','no') NOT NULL,
  `include_caption` enum('yes','no') NOT NULL,
  `photo_size_id` int(11) NOT NULL,
  `grid_row` int(11) NOT NULL,
  `grid_column` int(11) NOT NULL,
  `animation_preset_id` int(11) NOT NULL,
  `animation_speed_id` int(11) NOT NULL,
  `logo` varchar(50) NOT NULL,
  PRIMARY KEY (`user_preset_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `user_preset` */

insert  into `user_preset`(`user_preset_id`,`preset_name`,`user_id`,`font_id`,`font_size_id`,`location_id`,`font_color`,`background_color`,`branding`,`glow_shadow_effect`,`effect_color`,`photo_background`,`photo_background_color`,`include_avatar`,`include_name`,`include_likes`,`include_comments`,`include_caption`,`photo_size_id`,`grid_row`,`grid_column`,`animation_preset_id`,`animation_speed_id`,`logo`) values (13,'test1',58,1,1,4,'#3865a8','#3865a8','yes','yes','#3865a8','no','#020501','no','no','no','yes','no',1,0,0,1,1,'DoJmjCHBtMg6nX9D5f4t.jpg'),(14,'test123',78,1,3,1,'#3865a8','#3865a8','yes','yes','#013d00','yes','#3865a8','no','no','no','no','no',1,0,0,1,1,'liVdLbxCEdn1Io9T7tFD.JPG'),(15,'test123',90,1,1,1,'#FFFFFF','#3865a8','yes','yes','#3865a8','yes','#3865a8','no','no','no','no','no',1,0,0,1,1,'j8le3ivVBgtaaDx6EkLW.JPG'),(16,'my test123123123',90,3,10,1,'#FFFFFF','#3865a8','yes','yes','#38a865','yes','#3894a8','no','no','no','no','no',1,0,0,1,1,'YF7mK1Q4n0oNMSuQ4FsL.png'),(17,'test',90,1,1,1,'#FFFFFF','#3865a8','yes','yes','#3865a8','yes','#3865a8','no','no','no','no','no',1,0,0,1,1,'YF7mK1Q4n0oNMSuQ4FsL.png');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`permissions`,`activated`,`activation_code`,`activated_at`,`last_login`,`persist_code`,`reset_password_code`,`first_name`,`last_name`,`created_at`,`updated_at`) values (1,'admin@dwm.com','$2y$10$JMAMa33CxDgOFgvINixpw.2Pc9hD4/ZekYgsrPUlKk3JvcpyI/ifq',NULL,1,NULL,NULL,'2014-02-06 20:43:09','$2y$10$jD4shCSgX78dXxYnjoh1P.jSEjPWzkh0cm2FcSLEEJpusfLjrUXZu','abc','Mitch','Russell','2013-11-11 13:38:12','2014-02-06 20:43:09'),(90,'asif.n@allshoreresources.com','$2y$08$b4FmxB5mOQoS.Zn6LrAhv.uLOoPBcJ.5/ye8YMqjdm.nPmscQyUVS',NULL,0,NULL,NULL,NULL,NULL,'1394201685','Asif','N','2014-03-06 19:31:11','2014-03-06 19:31:11');

/*Table structure for table `users_detail` */

DROP TABLE IF EXISTS `users_detail`;

CREATE TABLE `users_detail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `contact_info` int(10) DEFAULT NULL,
  `user_addr` int(10) DEFAULT NULL,
  `billing_addr` int(10) DEFAULT NULL,
  `fb_id` varchar(25) DEFAULT NULL,
  `fb_access_token` varchar(150) DEFAULT NULL,
  `fb_access_secret` varchar(150) DEFAULT NULL,
  `tw_id` varchar(25) DEFAULT NULL,
  `tw_access_token` varchar(150) DEFAULT NULL,
  `tw_access_secret` varchar(150) DEFAULT NULL,
  `ig_id` varchar(25) DEFAULT NULL,
  `ig_access_token` varchar(150) DEFAULT NULL,
  `ig_access_secret` varchar(150) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `users_detail` */

insert  into `users_detail`(`id`,`user_id`,`contact_info`,`user_addr`,`billing_addr`,`fb_id`,`fb_access_token`,`fb_access_secret`,`tw_id`,`tw_access_token`,`tw_access_secret`,`ig_id`,`ig_access_token`,`ig_access_secret`,`updated_at`,`created_at`,`deleted_at`) values (2,1,1,1,3,NULL,NULL,NULL,NULL,NULL,NULL,'823170405','823170405.4d50fa3.7cdfbab1554d4524bf22f1686cc74af4','','2014-01-09 17:10:50','2013-12-06 14:42:08',NULL),(44,90,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'31653602','31653602.b015c7e.51266a42740e436baab2e3fa9da3a75f',NULL,NULL,NULL,NULL);

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users_groups` */

insert  into `users_groups`(`user_id`,`group_id`) values (1,1),(46,2),(47,3),(50,3),(52,2),(53,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
