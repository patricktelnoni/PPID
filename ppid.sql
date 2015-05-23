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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `artikel` */

insert  into `artikel`(`artikelid`,`penulis`,`isi`,`judul`) values (1,'jreng@gmail.com','Type here','Black baloon'),(2,'jreng@gmail.com','Type here','Black baloon'),(3,'jreng@gmail.com','<p>Arrrggghhhhhhhhh</p>','Malam minggu'),(4,'jreng@gmail.com','<p>Dear diary.. Entah kenapa si doski hari ini seneng banget gw ciye-ciyein. Mungkin karena dia seneng betulan kali yak? LOLL Hahahaha</p>','Ciyeee'),(5,'jreng@gmail.com','Type here','0'),(6,'jreng@gmail.com','Type here','0');

/*Table structure for table `info` */

DROP TABLE IF EXISTS `info`;

CREATE TABLE `info` (
  `idtipe` int(11) NOT NULL AUTO_INCREMENT,
  `tipeinfo` varchar(255) NOT NULL,
  `jenis` enum('informasi_berkala','informasi_setiap_saat','informasi_serta_merta','') NOT NULL,
  `child` int(1) NOT NULL,
  `parent` int(1) DEFAULT NULL,
  PRIMARY KEY (`idtipe`)
) ENGINE=InnoDB AUTO_INCREMENT=402 DEFAULT CHARSET=latin1;

/*Data for the table `info` */

insert  into `info`(`idtipe`,`tipeinfo`,`jenis`,`child`,`parent`) values (1,'Profil','informasi_berkala',1,0),(2,'Program dan Kegiatan ','informasi_berkala',1,0),(3,'Keuangan Daerah','informasi_berkala',1,0),(4,'Pengadaan Barang / Jasa','informasi_berkala',1,0),(5,'Kinerja Badan Publik','informasi_berkala',1,0),(6,'Lap. Akses Informasi','informasi_berkala',1,0),(7,'Pengaduan Masyarakat','informasi_berkala',1,0),(8,'Produk Hukum','informasi_setiap_saat',1,0),(9,'Rencana Pembangunan','informasi_setiap_saat',1,0),(10,'Organisasi dan Kepegawaian','informasi_setiap_saat',1,0),(11,'Pelayanan Publik','informasi_setiap_saat',1,0),(12,'Pemilihan Umum','informasi_setiap_saat',1,0),(13,'Bencana Alam / Kebakaran','informasi_serta_merta',1,0),(14,'Bencana Non Alam','informasi_serta_merta',0,0),(15,'Bencana Sosial','informasi_serta_merta',0,0),(16,'Rencana Gangguan','informasi_serta_merta',0,0),(17,'Wabah Penyakit','informasi_serta_merta',0,0),(18,'Makanan Beracun','informasi_serta_merta',0,0),(19,'Gerakan ISIS','informasi_serta_merta',0,0),(340,'Profil Badan Publik ','',0,1),(341,'Struktur Organisasi ','',0,1),(342,'Profil Pejabat Struktural ','',0,1),(343,'Lap. Harta Kekayaan Pejabat','',0,1),(344,'Rencana Kerja Tahunan ','',0,2),(345,'Agenda Kegiatan','',0,2),(346,'Ringkasan RKA - SKPD ','',0,3),(347,'Ringkasan RKA - PPKD ','',0,3),(348,'Raperda APBD ','',0,3),(349,'Raperda Perubahan APBD ','',0,3),(350,'Perda APBD Perda ','',0,3),(351,'Perubahan APBD ','',0,3),(352,'Ringkasan DPA - SKPD ','',0,3),(353,'Ringkasan DPA - PPKD ','',0,3),(354,'Lap. Realisasi Anggaran - SKPD ','',0,3),(355,'Lap. Realisasi Anggaran - PPKD ','',0,3),(356,'Lap. Keuangan Pemerintah Daerah Telah Diaudit ','',0,3),(357,'Opini Atas Lap. Keuangan Pemerintah Daerah ','',0,3),(358,'Neraca ','',0,3),(359,'Laporan Arus Kas ','',0,3),(360,'Daftar Aset','',0,3),(361,'Rencana Pengadaan ','',0,4),(362,'Pengumuman Pengadaan ','',0,4),(363,'Pemenang Pengadaan ','',0,4),(364,'Penyedia Barang','',0,4),(365,'Laporan Akuntabilitas Kinerja Instansi Pemerintah ','',0,5),(366,'Informasi Laporan Penyelenggaraan Pemerintah ','',0,5),(367,'Kota Bontang Dalam Angka ','',0,5),(368,'Indikator Kinerja Utama ','',0,5),(369,'Penetapan dan Pengukuran Kinerja','',0,5),(370,'Permohonan Dokumen Publik','',0,6),(371,'Pengaduan Masyarakat Lap. Rekapitulasi Pengaduan','',0,7),(372,'Peraturan Daerah ','',0,8),(373,'Peraturan Walikota ','',0,8),(374,'Keputusan Walikota ','',0,8),(375,'Instruksi Walikota ','',0,8),(376,'Risalah Rapat ','',0,8),(377,'Dokumen Pendukung','',0,8),(378,'Rencana Pembangunan Jangka Panjang ','',0,9),(379,'Rencana Pembangunan Jangka Menengah ','',0,9),(380,'Rencana Strategis ','',0,9),(381,'Rencana Program Investasi Jangka Menengah','',0,9),(382,'Pedoman Pengelolaan ','',0,10),(383,'Profil Lengkap Personil ','',0,10),(384,'Data Statistik ','',0,10),(385,'Surat Dinas ','',0,10),(386,'Agenda Kerja Pejabat ','',0,10),(387,'Penerimaan Calon Pegawai ','',0,10),(388,'Calon Peserta Diklat ','',0,10),(389,'Perjanjian Pihak Ketiga','',0,10),(390,'Prosedur Perijinan ','',0,11),(391,'Prosedur Kependudukan ','',0,11),(392,'Pengaduan dan Informasi ','',0,11),(393,'Pelaporan Pengaduan ','',0,11),(394,'Prosedur Investasi ','',0,11),(395,'Formulir Perijinan ','',0,11),(396,'Formulir Kependudukan','',0,11),(397,'Jadwal dan Tempat Kampanye','',0,12),(398,'Prosedur Peringatan Dini ','',0,13),(399,'Prosedur Penanggulangan Bencana ','',0,13),(400,'Perubahan Status Gunung Kelud','',0,13),(401,'Peta Informasi Bencana','',0,13);

/*Table structure for table `informasi` */

DROP TABLE IF EXISTS `informasi`;

CREATE TABLE `informasi` (
  `infoid` int(11) NOT NULL AUTO_INCREMENT,
  `tipe_info` int(3) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `url_video` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `file` text,
  `token` varchar(255) DEFAULT NULL,
  `unitkerja` int(255) DEFAULT NULL,
  `sub_info` int(3) DEFAULT NULL,
  PRIMARY KEY (`infoid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `informasi` */

insert  into `informasi`(`infoid`,`tipe_info`,`judul`,`isi`,`gambar`,`url_video`,`penulis`,`tgl`,`file`,`token`,`unitkerja`,`sub_info`) values (2,7,'Apa aja','','','','','0000-00-00','./upload/20150316_cpns_khusus_putra-i_papua.pdf','MSqtrxFUIn3mV6NGIK64Dj74Mw7mPu',NULL,NULL),(3,9,'GItulah','','','','','0000-00-00','./upload/V2-I1-P10-17.pdf','W1ZXykC9vUJjAQacFjGOVWigaN6AlP',NULL,NULL),(4,5,'Udah belum yaa','','','','','0000-00-00','./upload/US20120291129.pdf','TKvMtIewUSPhIGdLh6uww4rkorvr9v',NULL,NULL),(6,8,'Ngapain ini','','','','','0000-00-00','./upload/145.pdf','cfFlEYsIeaiHtOMZSBf1fb3UtJweOR',NULL,NULL),(8,14,'Ah tambah bingung ','','','','','0000-00-00','./upload/[new] - Pengumuman Hasil Seleksi Administrasi.pdf','dHNWUHZzkxYqmokkq2YlX8Wpx6a5JS',NULL,NULL),(10,400,'Sukurin aja deh','','','','','0000-00-00','./upload/Security patterns and secure systems design.pdf','p7f1Oppob1EzWDx5o2Y2M7hZB7u9VH',NULL,NULL),(11,386,'Kumaha cuyy','','','','','0000-00-00','./upload/Asynchronous intrusion recovery.pdf','5AzVY5kNqvsUZHxt3kxdSa2xL5HuG3',NULL,NULL),(12,347,'Cek infoid','Ketik isi berita di sini...','','','jreng@gmail.com','2015-04-29','./upload/RencanaStudi-23512104-22082013151048.pdf','Jm3Y36RAVI4JsZLCa2ZeFfgBwBP6PM',NULL,NULL),(13,379,'Testing sub menu','Ketik isi berita di sini...','','','jreng@gmail.com','2015-04-29','./upload/Form Progress Kerja.pdf','5I7UswIMrGsf7WH25pjiA2qyUJZVTF',NULL,361);

/*Table structure for table `subinfo` */

DROP TABLE IF EXISTS `subinfo`;

CREATE TABLE `subinfo` (
  `idsubtipe` int(11) NOT NULL AUTO_INCREMENT,
  `subtipe` varchar(255) NOT NULL,
  `idtipe` int(3) NOT NULL,
  PRIMARY KEY (`idsubtipe`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

/*Data for the table `subinfo` */

insert  into `subinfo`(`idsubtipe`,`subtipe`,`idtipe`) values (1,'Profil Badan Publik',1),(2,'Struktur Organisasi',1),(3,'Profil Pejabat Struktural',1),(4,'Lap. Harta Kekayaan Pejabat',1),(5,'Rencana Kerja Tahunan ',2),(6,'Agenda Kegiatan',2),(7,'Ringkasan RKA - SKPD',3),(8,'Ringkasan RKA - PPKD',3),(9,'Raperda APBD',3),(10,'Raperda Perubahan APBD',3),(11,'Perda APBD Perda',3),(12,'Perubahan APBD',3),(13,'Ringkasan DPA - SKPD',3),(14,'Ringkasan DPA - PPKD',3),(15,'Lap. Realisasi Anggaran - SKPD',3),(16,'Lap. Realisasi Anggaran - PPKD',3),(17,'Lap. Keuangan Pemerintah Daerah Telah Diaudit',3),(18,'Opini Atas Lap. Keuangan Pemerintah Daerah',3),(19,'Neraca',3),(20,'Laporan Arus Kas',3),(21,'Daftar Aset',3),(22,'Rencana Pengadaan',4),(23,'Pengumuman Pengadaan',4),(24,'Pemenang Pengadaan',4),(25,'Penyedia Barang',4),(26,'Laporan Akuntabilitas Kinerja Instansi Pemerintah',5),(27,'Informasi Laporan Penyelenggaraan Pemerintah',5),(28,'Kota Bontang Dalam Angka',5),(29,'Indikator Kinerja Utama',5),(30,'Penetapan dan Pengukuran Kinerja',5),(31,'Permohonan Dokumen Publik',6),(32,'Pengaduan Masyarakat Lap. Rekapitulasi Pengaduan',7),(33,'Peraturan Daerah',8),(34,'Peraturan Walikota',8),(35,'Keputusan Walikota',8),(36,'Instruksi Walikota',8),(37,'Risalah Rapat',8),(38,'Dokumen Pendukung',8),(39,'Rencana Pembangunan Jangka Panjang',9),(40,'Rencana Pembangunan Jangka Menengah',9),(41,'Rencana Strategis',9),(42,'Rencana Program Investasi Jangka Menengah',9),(43,'Pedoman Pengelolaan',10),(44,'Profil Lengkap Personil',10),(45,'Data Statistik',10),(46,'Surat Dinas',10),(47,'Agenda Kerja Pejabat',10),(48,'Penerimaan Calon Pegawai',10),(49,'Calon Peserta Diklat',10),(50,'Perjanjian Pihak Ketiga',10),(51,'Prosedur Perijinan',11),(52,'Prosedur Kependudukan',11),(53,'Pengaduan dan Informasi',11),(54,'Pelaporan Pengaduan',11),(55,'Prosedur Investasi',11),(56,'Formulir Perijinan',11),(57,'Formulir Kependudukan',11),(58,'Jadwal dan Tempat Kampanye',12),(59,'Prosedur Peringatan Dini',13),(60,'Prosedur Penanggulangan Bencana',13),(61,'Perubahan Status Gunung Kelud',13),(62,'Peta Informasi Bencana',13);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`userid`,`email`,`password`,`nama`,`alamat`,`kota`,`propinsi`,`kodepos`,`telepon`) values (1,'sayang@gmail.com','S8RofXiBo0dbnOFjCzbklHwJOTdZ4gnCe0bL1d7arvtn0jJv+/rEPB7TNILzVQ626tdHqCuQfHFJieCa','Septrafriansyah','Lampung','Lampung','Lampung',12345678,123456789),(3,'bodat@gmail.com','mEbXQIsuv7daYoGNwSTbzCfhGKk4hmrdOICA4RIXsf83ypgqj8kdFSZoskxzGy/aRSPPIRLh/8tuaRg5','Bodat','Medan','Medan','Sumatra Utara',1234,1234),(4,'paok@gmail.com','xbjMGYK2MmnSDXGe/BiBBhNltiuw+4ZcuN/GxIGBxrnUtK/ODtBqBAQxm0au9VDiE+zVBCLcXRWP05UF','Paok','Medan','Medan','Sumatra Utara',85117,2147483647),(5,'test@gmail.com','wESc9Cdh8LbViDTsb6vvKgmYD9ahFaI7Ztl8Wbxe+X6BOuVlGgXwnqaGz66KA4pns3qJzNTn4fwd3FvZ','Yandri','Bandung','Bandung','Bandung',123456,123456),(7,'csc@gmail.com','L3eIJNgN8+IZcBJUutwOFtqeMTcirtz+tVvBV9qTqjec9nWXLb7c0mX7fhx0nc/SXFi6oH/7IYY3k4/h','Budi Permana','bandung','Bandung','Jawa Barat',292929,3423423),(8,'jreng@gmail.com','o1fOtMtJo+kzBSPouUZP+5588aWylCpL6M1eSldzypR3GPpF7Q35JaQ8zpaGzYobMqwrV8/tbivMLRAP','Budi Permana','bandung','Bandung','Jawa Barat',292929,3423423),(9,'0','XZw4ZRvlVHyyZFpVNP7c1KYDn8UW4UFtm0SQgjjjsfGnLhUohyIModMqZFugXiB+MDesdH3r87wkq0NV','0','0','0','0',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
