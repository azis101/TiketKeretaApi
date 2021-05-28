/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.18-MariaDB : Database - tiket2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tiket2` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tiket2`;

/*Table structure for table `detail_pemesanan` */

DROP TABLE IF EXISTS `detail_pemesanan`;

CREATE TABLE `detail_pemesanan` (
  `kode_pemesanan` varchar(20) NOT NULL,
  `kode_jadwal` varchar(10) NOT NULL,
  `tarif_tiket` int(11) NOT NULL,
  `jumlah_pemesanan` int(11) NOT NULL,
  `tarif_total` int(11) NOT NULL,
  KEY `kode_pemesanan1` (`kode_pemesanan`),
  KEY `kode_jadwal` (`kode_jadwal`),
  CONSTRAINT `kode_jadwal` FOREIGN KEY (`kode_jadwal`) REFERENCES `jadwal` (`kode_jadwal`),
  CONSTRAINT `kode_pemesanan1` FOREIGN KEY (`kode_pemesanan`) REFERENCES `header_pemesanan` (`kode_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_pemesanan` */

/*Table structure for table `header_pemesanan` */

DROP TABLE IF EXISTS `header_pemesanan`;

CREATE TABLE `header_pemesanan` (
  `kode_pemesanan` varchar(20) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `tgl_berangkat` date DEFAULT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') DEFAULT NULL,
  PRIMARY KEY (`kode_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `header_pemesanan` */

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `kode_jadwal` varchar(10) NOT NULL,
  `kode_kereta` int(6) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `waktu_keberangkatan` time NOT NULL,
  `tarif_tiket` int(11) NOT NULL,
  PRIMARY KEY (`kode_jadwal`),
  KEY `kode_kereta` (`kode_kereta`),
  CONSTRAINT `kode_kereta` FOREIGN KEY (`kode_kereta`) REFERENCES `kereta` (`kode_kereta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jadwal` */

insert  into `jadwal`(`kode_jadwal`,`kode_kereta`,`tujuan`,`waktu_keberangkatan`,`tarif_tiket`) values 
('AB001',1,'Jakarta','09:00:00',200000),
('AB002',1,'Surabaya','20:30:00',200000),
('AC001',5,'Tegal','06:15:00',160000),
('AC002',5,'Cirebon','15:30:00',160000),
('AL001',3,'Jakarta','08:30:00',185000),
('AL002',3,'Solo','20:00:00',185000),
('AP001',13,'Bandung','14:25:00',90000),
('AP002',13,'Jakarta','19:30:00',90000),
('AS001',4,'Semarang','16:15:00',165000),
('AS002',4,'Jakarta','07:00:00',165000),
('AW001',2,'Bandung','07:00:00',210000),
('AW002',2,'Surabaya','20:00:00',210000),
('BR001',12,'Blitar','13:39:00',180000),
('CR001',9,'Bandung','06:30:00',210000),
('CR002',9,'Semarang','17:00:00',210000),
('DW001',11,'Surabaya','08:25:00',160000),
('JT001',14,'Purwosari','07:00:00',125000),
('JT002',14,'Jakarta','16:00:00',125000),
('ML001',6,'Malang','05:15:00',230000),
('MP001',15,'Malang','22:00:00',180000),
('MT001',8,'Jakarta','08:50:00',200000),
('MT002',8,'Solo','21:05:00',200000),
('RJ001',7,'Cirebon','05:00:00',250000),
('SU001',10,'Purworejo','07:00:00',130000),
('SU002',10,'Surabaya','17:15:00',130000);

/*Table structure for table `kereta` */

DROP TABLE IF EXISTS `kereta`;

CREATE TABLE `kereta` (
  `kode_kereta` int(6) NOT NULL AUTO_INCREMENT,
  `nama_kereta` varchar(50) NOT NULL,
  `jumlah_gerbong` int(6) NOT NULL,
  `jumlah_kursi` int(6) NOT NULL,
  `awal_keberangkatan` varchar(20) NOT NULL,
  `akhir_pemberhentian` varchar(20) NOT NULL,
  `kelas` enum('Eksekutif','Ekonomi','Bisnis') DEFAULT NULL,
  PRIMARY KEY (`kode_kereta`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kereta` */

insert  into `kereta`(`kode_kereta`,`nama_kereta`,`jumlah_gerbong`,`jumlah_kursi`,`awal_keberangkatan`,`akhir_pemberhentian`,`kelas`) values 
(1,'Argo Bromo Anggrek',4,160,'Surabaya','Jakarta','Eksekutif'),
(2,'Argo Wilis',5,200,'Surabaya','Bandung','Eksekutif'),
(3,'Argo Lawu',4,160,'Jakarta','Solo','Eksekutif'),
(4,'Argo Sindoro',5,200,'Semarang','Jakarta','Eksekutif'),
(5,'Argo Cheribon',4,160,'Cirebon','Tegal','Eksekutif'),
(6,'Malabar',3,150,'Malang','Bandung','Bisnis'),
(7,'Ranggajati',4,200,'Jember','Cirebon','Bisnis'),
(8,'Mataram',5,250,'Solo','Jakarta','Bisnis'),
(9,'Ciremai',4,200,'Semarang','Bandung','Bisnis'),
(10,'Sancaka Utara',5,250,'Surabaya','Purworejo','Bisnis'),
(11,'Dharmawangsa',5,250,'Jakarta','Surabaya','Ekonomi'),
(12,'Brantas',4,200,'Blitar','Jakarta','Ekonomi'),
(13,'Argo Parahyangan',3,150,'Bandung','Jakarta','Ekonomi'),
(14,'Jaka Tingkir',5,250,'Purwosari','Jakarta','Ekonomi'),
(15,'Majapahit',5,250,'Jakarta','Malang','Ekonomi');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `kode_pembayaran` varchar(20) NOT NULL,
  `kode_pemesanan` varchar(20) NOT NULL,
  `rekening` int(11) NOT NULL,
  `nama_b` varchar(50) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `tarif_total` int(11) NOT NULL,
  `tagihan` int(11) NOT NULL,
  PRIMARY KEY (`kode_pembayaran`),
  KEY `kode_pemesanan2` (`kode_pemesanan`),
  CONSTRAINT `kode_pemesanan2` FOREIGN KEY (`kode_pemesanan`) REFERENCES `header_pemesanan` (`kode_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
