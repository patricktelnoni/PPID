/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.16 : Database - ppid
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ppid` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ppid`;

/*Table structure for table `artikel` */

DROP TABLE IF EXISTS `artikel`;

CREATE TABLE `artikel` (
  `artikelid` int(255) NOT NULL AUTO_INCREMENT,
  `penulis` varchar(255) DEFAULT NULL,
  `isi` text,
  `judul` text,
  PRIMARY KEY (`artikelid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `artikel` */

insert  into `artikel`(`artikelid`,`penulis`,`isi`,`judul`) values (1,'jreng@gmail.com','Type here','Black baloon'),(2,'jreng@gmail.com','Type here','Black baloon'),(3,'jreng@gmail.com','<p>Arrrggghhhhhhhhh</p>','Malam minggu');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userid` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `propinsi` varchar(255) DEFAULT NULL,
  `kodepos` int(255) DEFAULT NULL,
  `telepon` int(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`userid`,`email`,`password`,`nama`,`alamat`,`kota`,`propinsi`,`kodepos`,`telepon`) values (1,'sayang@gmail.com','S8RofXiBo0dbnOFjCzbklHwJOTdZ4gnCe0bL1d7arvtn0jJv+/rEPB7TNILzVQ626tdHqCuQfHFJieCa','Septrafriansyah','Lampung','Lampung','Lampung',12345678,123456789),(3,'bodat@gmail.com','mEbXQIsuv7daYoGNwSTbzCfhGKk4hmrdOICA4RIXsf83ypgqj8kdFSZoskxzGy/aRSPPIRLh/8tuaRg5','Bodat','Medan','Medan','Sumatra Utara',1234,1234),(4,'paok@gmail.com','xbjMGYK2MmnSDXGe/BiBBhNltiuw+4ZcuN/GxIGBxrnUtK/ODtBqBAQxm0au9VDiE+zVBCLcXRWP05UF','Paok','Medan','Medan','Sumatra Utara',85117,2147483647),(5,'test@gmail.com','wESc9Cdh8LbViDTsb6vvKgmYD9ahFaI7Ztl8Wbxe+X6BOuVlGgXwnqaGz66KA4pns3qJzNTn4fwd3FvZ','Yandri','Bandung','Bandung','Bandung',123456,123456),(7,'csc@gmail.com','L3eIJNgN8+IZcBJUutwOFtqeMTcirtz+tVvBV9qTqjec9nWXLb7c0mX7fhx0nc/SXFi6oH/7IYY3k4/h','Budi Permana','bandung','Bandung','Jawa Barat',292929,3423423),(8,'jreng@gmail.com','o1fOtMtJo+kzBSPouUZP+5588aWylCpL6M1eSldzypR3GPpF7Q35JaQ8zpaGzYobMqwrV8/tbivMLRAP','Budi Permana','bandung','Bandung','Jawa Barat',292929,3423423);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
