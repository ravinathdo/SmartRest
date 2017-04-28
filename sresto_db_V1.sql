/*
SQLyog Ultimate v8.55 
MySQL - 5.5.54 : Database - sresto_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sresto_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sresto_db`;

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(200) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `imagepath` varchar(100) DEFAULT NULL,
  `statuscode` varchar(5) DEFAULT 'ACT' COMMENT 'ACT|DACT',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`id`,`itemname`,`price`,`imagepath`,`statuscode`) values (1,'SUMMER SANDWICH','1500','SUMMER SANDWICH.jpg','ACT'),(2,'NEW GREAT TASTE','2000','NEW GREAT TASTE.jpg','ACT'),(3,'SPICY PIZZA','800','SPICY PIZZA.jpg','ACT'),(4,'FRESH FRUIT JUICE','250','FRESH FRUIT JUICE.jpg','ACT'),(5,'chicken Sandwich','850','Buffolo_chicken_Sandwich.jpg','ACT'),(6,'burger','350','burger.jpg','ACT'),(7,'cannoli','700','cannoli.jpg','ACT'),(8,'beef and sausage','1300','combo-beef-and-sausage.jpg','ACT');

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
  `takeaway` varchar(200) DEFAULT 'NON',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `order_tbl` */

insert  into `order_tbl`(`id`,`totalamount`,`status`,`createddate`,`createduser`,`updatedate`,`updateuser`,`takeaway`) values (1,'8500','CLS','2017-04-07 13:57:03',4,'2017-04-07 16:45:19','5','NON'),(2,'3000','ACT','2017-04-27 23:32:43',6,'2017-04-27 23:44:26','5','Raddoluwa, Seeduwa');

/*Table structure for table `orderitem` */

DROP TABLE IF EXISTS `orderitem`;

CREATE TABLE `orderitem` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `orderid` int(5) DEFAULT NULL,
  `itemid` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `orderitem` */

insert  into `orderitem`(`id`,`orderid`,`itemid`,`qty`) values (1,1,1,3),(2,1,2,2),(3,2,1,2);

/*Table structure for table `slot` */

DROP TABLE IF EXISTS `slot`;

CREATE TABLE `slot` (
  `slotno` int(5) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `dateupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`slotno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `slot` */

insert  into `slot`(`slotno`,`status`,`dateupdated`) values (1,'USE','2017-02-14 12:55:20'),(2,'USE','2017-02-20 10:00:21'),(3,'USE','2017-02-20 10:00:26'),(4,'FREE','2017-02-20 10:00:32'),(5,'FREE','2017-03-16 13:46:52'),(6,'USE','2017-03-16 13:46:57');

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

insert  into `tbl`(`tableno`,`status`,`dateupdated`) values (1,'VACANT','2017-02-14 14:27:22'),(2,'RESERVED','2017-03-16 13:46:21'),(3,'VACANT','2017-03-16 13:46:31'),(4,'VACANT','2017-04-03 10:38:41'),(5,'VACANT','2017-04-03 10:38:41'),(6,'VACANT','2017-04-03 10:38:48');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_reservation` */

insert  into `tbl_reservation`(`id`,`tableno`,`from_time`,`to_time`,`status`,`keycode`,`usercreated`,`datecreated`,`userupdated`,`dateupdated`) values (1,1,'2017-04-07T00:01','2017-04-07T00:20','BUK',NULL,'4','2017-04-07 13:53:52',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`firstname`,`lastname`,`username`,`password`,`email`,`telephone`,`datecreated`,`role`,`status`) values (1,'Lasantha','Lasantha','admin','*23AE809DDACAF96AF0FD78ED04B6A265E05AA257','Lasantha@gmail.com','071000111','2017-03-16 13:45:59','ADM','ACT'),(4,'ravinath','fernand','ravi','*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9','ravi','0715833470','2017-04-07 13:51:09','CUS','DACT'),(5,'gayan','perere','gayan','*667F407DE7C6AD07358FA38DAED7828A72014B4E','gayan@gmail.com','071583344','2017-04-07 13:59:15','WTR','DACT'),(6,'yohan','perera','yoha','*667F407DE7C6AD07358FA38DAED7828A72014B4E','ra@g.com','07711','2017-04-19 16:20:51','CUS','ACT');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
