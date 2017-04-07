/*
SQLyog Ultimate v8.55 
MySQL - 5.5.38 : Database - erest_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`erest_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `erest_db`;

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(200) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `imagepath` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`id`,`itemname`,`price`,`imagepath`) values (1,'SUMMER SANDWICH','1500','SUMMER SANDWICH.jpg'),(2,'NEW GREAT TASTE','2000','NEW GREAT TASTE.jpg'),(3,'SPICY PIZZA','800','SPICY PIZZA.jpg'),(4,'FRESH FRUIT JUICE','250','FRESH FRUIT JUICE.jpg');

/*Table structure for table `order_tbl` */

DROP TABLE IF EXISTS `order_tbl`;

CREATE TABLE `order_tbl` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `totalamount` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `createddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `createduser` int(5) DEFAULT NULL,
  `updatedate` varchar(20) DEFAULT NULL,
  `updateuser` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `order_tbl` */

insert  into `order_tbl`(`id`,`totalamount`,`status`,`createddate`,`createduser`,`updatedate`,`updateuser`) values (1,'3000','PND','2017-03-16 14:34:46',2,NULL,NULL);

/*Table structure for table `orderitem` */

DROP TABLE IF EXISTS `orderitem`;

CREATE TABLE `orderitem` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `orderid` int(5) DEFAULT NULL,
  `itemid` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `orderitem` */

insert  into `orderitem`(`id`,`orderid`,`itemid`,`qty`) values (1,3,4,2),(2,4,2,5),(3,5,2,3),(4,6,2,4),(5,7,1,5),(6,7,2,8),(7,8,1,5),(8,9,1,6),(9,12,3,5),(10,13,1,5),(11,13,2,3),(12,14,1,2),(13,14,2,2),(14,14,3,2),(15,14,4,2),(16,16,1,2),(17,16,2,2),(18,17,1,2),(19,17,2,2),(20,19,1,2),(21,19,2,5),(22,20,1,2),(23,20,2,5),(24,21,1,3),(25,21,2,4),(26,1,1,2);

/*Table structure for table `slot` */

DROP TABLE IF EXISTS `slot`;

CREATE TABLE `slot` (
  `slotno` int(5) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `dateupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`slotno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `slot` */

insert  into `slot`(`slotno`,`status`,`dateupdated`) values (1,'FREE','2017-02-14 12:55:20'),(2,'FREE','2017-02-20 10:00:21'),(3,'FREE','2017-02-20 10:00:26'),(4,'USE','2017-02-20 10:00:32'),(5,'USE','2017-03-16 13:46:52'),(6,'FREE','2017-03-16 13:46:57');

/*Table structure for table `slot_reservation` */

DROP TABLE IF EXISTS `slot_reservation`;

CREATE TABLE `slot_reservation` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `slotno` int(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `from_time` varchar(20) DEFAULT NULL,
  `to_time` varchar(20) DEFAULT NULL,
  `dateupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usercreated` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `slot_reservation` */

/*Table structure for table `slothistory` */

DROP TABLE IF EXISTS `slothistory`;

CREATE TABLE `slothistory` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `slotno` int(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `channel` varchar(20) DEFAULT NULL,
  `from` varchar(20) DEFAULT NULL,
  `to` varchar(20) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `slothistory` */

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `code` varchar(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `sortkey` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status` */

insert  into `status`(`code`,`description`,`sortkey`) values ('BUK','Booked','slot'),('FREE','Free','tbl'),('FREE','Free','slot'),('USE','Use','slot'),('OCU','Occupy','tbl'),('RSV','Reserve','tbl'),('CSL','Cancle','tbl'),('CLO','Closed','tbl');

/*Table structure for table `tbl` */

DROP TABLE IF EXISTS `tbl`;

CREATE TABLE `tbl` (
  `tableno` int(5) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `dateupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tableno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl` */

insert  into `tbl`(`tableno`,`status`,`dateupdated`) values (1,'','2017-02-14 14:27:22'),(2,'VACANT','2017-03-16 13:46:21'),(3,'VACANT','2017-03-16 13:46:31'),(4,'VACANT','2017-04-03 10:38:41'),(5,'VACANT','2017-04-03 10:38:41'),(6,'VACANT','2017-04-03 10:38:48');

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `orderid` int(5) NOT NULL AUTO_INCREMENT,
  `tableno` int(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `usercreated` varchar(20) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userupdated` varchar(20) DEFAULT NULL,
  `dateupdated` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_order` */

/*Table structure for table `tbl_reservation` */

DROP TABLE IF EXISTS `tbl_reservation`;

CREATE TABLE `tbl_reservation` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tableno` int(5) DEFAULT NULL,
  `from_time` varchar(20) DEFAULT NULL,
  `to_time` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `keycode` varchar(20) DEFAULT NULL,
  `usercreated` varchar(20) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userupdated` varchar(20) DEFAULT NULL,
  `dateupdated` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_reservation` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` text,
  `email` varchar(200) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'ACT',
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex3` (`username`),
  KEY `NewIndex1` (`username`),
  KEY `NewIndex2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`firstname`,`lastname`,`username`,`password`,`email`,`telephone`,`datecreated`,`role`,`status`) values (1,'Lasantha','Lasantha','admin','*667F407DE7C6AD07358FA38DAED7828A72014B4E','Lasantha@gmail.com','071000111','2017-03-16 13:45:59','ADM','ACT'),(2,'ashenp','ash','ashenp','*23AE809DDACAF96AF0FD78ED04B6A265E05AA257','as@g.com','071','2017-03-16 14:08:58','CUS','ACT'),(3,'w','w','w','*667F407DE7C6AD07358FA38DAED7828A72014B4E',NULL,NULL,'2017-03-16 14:34:58','WTR','ACT');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
