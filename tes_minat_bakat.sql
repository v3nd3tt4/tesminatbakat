/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.32-MariaDB : Database - db_minat_bakat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_minat_bakat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_minat_bakat`;

/*Table structure for table `tb_agama` */

DROP TABLE IF EXISTS `tb_agama`;

CREATE TABLE `tb_agama` (
  `id_agama` int(11) NOT NULL AUTO_INCREMENT,
  `nama_agama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_agama` */

insert  into `tb_agama`(`id_agama`,`nama_agama`) values 
(3,'Islam');

/*Table structure for table `tb_jk` */

DROP TABLE IF EXISTS `tb_jk`;

CREATE TABLE `tb_jk` (
  `id_jk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jk` */

insert  into `tb_jk`(`id_jk`,`nama_jk`) values 
(1,'Laki-Laki'),
(2,'Wanita');

/*Table structure for table `tb_kategori_sma` */

DROP TABLE IF EXISTS `tb_kategori_sma`;

CREATE TABLE `tb_kategori_sma` (
  `id_kategori_sma` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori_sma`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori_sma` */

insert  into `tb_kategori_sma`(`id_kategori_sma`,`nama_kategori`) values 
(1,'IPA (SNMPTN)'),
(2,'IPS (SNMPTN)'),
(3,'MAN');

/*Table structure for table `tb_kategori_utbk` */

DROP TABLE IF EXISTS `tb_kategori_utbk`;

CREATE TABLE `tb_kategori_utbk` (
  `id_kategori_utbk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori_utbk` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori_utbk` */

insert  into `tb_kategori_utbk`(`id_kategori_utbk`,`nama_kategori_utbk`) values 
(1,'Semua (Soshum/Saintek/Campuran) '),
(2,'Saintek/Campuran'),
(3,'Soshum/Campuran');

/*Table structure for table `tb_mapel` */

DROP TABLE IF EXISTS `tb_mapel`;

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_sma` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mapel`),
  KEY `id_kategori_sma` (`id_kategori_sma`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel` */

insert  into `tb_mapel`(`id_mapel`,`id_kategori_sma`,`nama_mapel`) values 
(1,1,'Fisika');

/*Table structure for table `tb_mapel_utbk` */

DROP TABLE IF EXISTS `tb_mapel_utbk`;

CREATE TABLE `tb_mapel_utbk` (
  `id_mapel_utbk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_utbk` int(11) NOT NULL,
  `nama_mapel_utbk` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mapel_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel_utbk` */

insert  into `tb_mapel_utbk`(`id_mapel_utbk`,`id_kategori_utbk`,`nama_mapel_utbk`) values 
(3,2,'FISIKA');

/*Table structure for table `tb_sekolah` */

DROP TABLE IF EXISTS `tb_sekolah`;

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_sekolah` */

insert  into `tb_sekolah`(`id_sekolah`,`nama_sekolah`) values 
(2,'SMK N 5 Bandar Lampung');

/*Table structure for table `tb_siswa` */

DROP TABLE IF EXISTS `tb_siswa`;

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_jk` int(11) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `alamat` text,
  `nisn` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `id_kategori_sma` int(11) DEFAULT NULL,
  `id_kategori_utbk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`id_siswa`,`nama_siswa`,`tempat_lahir`,`tgl_lahir`,`id_jk`,`id_agama`,`id_sekolah`,`alamat`,`nisn`,`email`,`no_hp`,`id_kategori_sma`,`id_kategori_utbk`) values 
(1,'arief','bandar lampung','0000-00-00',1,3,2,'test','15432','arief@mail.com','98766',1,2),
(2,'ridho','bandar lampung','0000-00-00',1,3,2,'test','15433','ridho@mail.com','98766',1,2);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`level`) values 
(1,'arief@mail.com','LoxWjU','siswa'),
(2,'ridho@mail.com','lYFenb','siswa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
