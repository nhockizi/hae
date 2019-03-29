/*
SQLyog Professional v12.09 (64 bit)
MySQL - 8.0.12 : Database - hae
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hae` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `message` */

insert  into `message`(`id`,`fullname`,`content`,`created_at`) values (1,'lam xuan bao','The application should be submitted via online hosted source repository e.g. Github, Bitbucket','2019-03-29 15:32:04'),(2,'lam xuan bao','Please include an SQL schema for your database','2019-03-29 15:32:14'),(3,'lam xuan bao','Please include an SQL schema for your database','2019-03-29 15:37:52'),(4,'bao','The application should be submitted via online hosted source repository e.g. Github, Bitbucket','2019-03-29 16:14:54'),(5,'bao','The application should be submitted via online hosted source repository e.g. Github, Bitbucket','2019-03-29 16:14:58'),(6,'bao','The application should be submitted via online hosted source repository e.g. Github, Bitbucket','2019-03-29 16:15:02'),(7,'bao','The application should be submitted via online hosted source repository e.g. Github, Bitbucket','2019-03-29 16:15:06'),(8,'asdasdasda','sdasda sdasd asd a sda sd asd asd jajkd ad jkasd jkhasd khaksd jkla jsd jaklsjd klajdkljaskldjakl sdjkla sdklja skldj ak','2019-03-29 16:52:03');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

INSERT  INTO `user`(`username`,`password`) VALUES ('admin',MD5('123456'));

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
