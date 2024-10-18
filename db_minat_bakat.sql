/*
SQLyog Ultimate v10.3 
MySQL - 8.0.30 : Database - db_minat_bakat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_minat_bakat` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_minat_bakat`;

/*Table structure for table `tb_agama` */

DROP TABLE IF EXISTS `tb_agama`;

CREATE TABLE `tb_agama` (
  `id_agama` int NOT NULL AUTO_INCREMENT,
  `nama_agama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_agama` */

insert  into `tb_agama`(`id_agama`,`nama_agama`) values (3,'Islam');

/*Table structure for table `tb_jk` */

DROP TABLE IF EXISTS `tb_jk`;

CREATE TABLE `tb_jk` (
  `id_jk` int NOT NULL AUTO_INCREMENT,
  `nama_jk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jk` */

insert  into `tb_jk`(`id_jk`,`nama_jk`) values (1,'Laki-Laki'),(2,'Wanita');

/*Table structure for table `tb_kategori_pertanyaan` */

DROP TABLE IF EXISTS `tb_kategori_pertanyaan`;

CREATE TABLE `tb_kategori_pertanyaan` (
  `id_kategori_soal` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_kategori_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori_pertanyaan` */

insert  into `tb_kategori_pertanyaan`(`id_kategori_soal`,`nama_kategori`,`keterangan`) values (2,'KECERDASAN MAJEMUK 01','KECERDASAN VERBAL/ LINGUISTIK.\r\n\r\nKemampuan untuk menggunakan bahasa atau kata-kata secara efektif.\r\nProfesi:\r\nPengajar, pengacara, politikus, wartawan, presenter, penyiar, tour guide, sales, dsb.'),(3,'KECERDASAN MAJEMUK 02','KECERDASAN LOGIS/ MATEMATIS.\r\n\r\nKemampuan menggunakan angka-angka dan penalaran logika dengan baik, biasanya\r\npunya minat yang besar untuk bereksplorasi dan bertanya tentang berbagai fenomena\r\nserta menuntut jawaban logis.\r\nProfesi:\r\nInsinyur, dokter, peneliti, pengacara, akuntan, programmer, analis sistem, analis\r\nkeuangan, banker, dsb.'),(4,'KECERDASAN MAJEMUK 03 ','KECERDASAN VISUAL/ SPASIAL.\r\n\r\nKemampuan berpikir 2 atau 3 dimensi, termasuk pemahaman akan bentuk dan ruang\r\nserta hubungan antar benda dalam ruangan, memiliki kepekaan akan arah atau lokasi\r\ntertentu.\r\nProfesi:\r\nArsitek, designer, perencana tata kota, seniman, fotografer, animator, pelaut, pilot, dsb'),(5,'KECERDASAN MAJEMUK 04','KECERDASAN KINESTETIK\r\n\r\nKemampuan untuk menggunakan gerak tubuh atau bergerak dengan ketepatan\r\n(presisi) tinggi dan mengekspresikan ide atau perasaan melalui gerakan tertentu.\r\nProfesi:\r\nAtlet, penari, koreografer, pemeran pantomim, aktor/ aktris, model, pramugari, ahli jam,\r\nperakit senjata/ bom, dokter bedah, trainer atraktif, dsb.'),(6,'KECERDASAN MAJEMUK 05 ','KECERDASAN MUSIKAL.\r\n\r\nKemampuan untuk memahami, mengapresiasi, memainkan dan menciptakan musik\r\nserta memiliki kepekaan akan ritme, melodi atau nada.\r\nProfesi:\r\nPenyanyi, pencipta lagu, pemusik, komposer, guru vokal atau musik, dirigen, music\r\ndirector, video jockey, disc jockey, music arranger, dsb.'),(7,'KECERDASAN MAJEMUK 06','KECERDASAN INTERPERSONAL\r\n\r\nKemampuan untuk menjalin hubungan (berkomunikasi) dengan orang lain, memahami\r\nkebutuhan dan perilaku orang lain, mengenali perasaan dengan jeli, melihat dari sudut\r\npandang orang lain (berempati), bekerja sama (teamwork), pandai membangun\r\nkepercayaan dan mempertahankan hubungan positif.\r\nProfesi:\r\nPengajar, politikus, pebisnis, marketing communication, public relations, konsultan ,\r\npekerja sosial, aktor/ aktris, rohaniwan, perawat, terapis, dsb.'),(8,'KECERDASAN MAJEMUK 07','KECERDASAN INTRAPERSONAL\r\n\r\nKemampuan memahami, menganalisa, dan merefleksikan diri sendiri, mengenali\r\nkekuatan dan keterbatasan diri sendiri, serta menyadari perasaan, keinginan, harapan,\r\ndan tujuan hidup.\r\nProfesi:\r\nPelatih, pengajar, penulis, peneliti, konselor, psikolog, rohaniwan, entrepreneur, dsb.'),(9,'KECERDASAN MAJEMUK 08 ','KECERDASAN NATURALIS.\r\n\r\nKemampuan untuk memahami alam sekitar, mengidentifikasi dan mengklasifikasikan\r\npersamaan dan perbedaan karakteristik spesies flora dan fauna, secara secara efektif\r\nberinteraksi dengan alam.\r\nProfesi:\r\nAktivis lingkungan hidup, ahli pertanian atau peternakan, spesialis budi daya hewan\r\ntertentu, pencinta alam, polisi hutan, dokter hewan, pengelola kebun binatang atau\r\ncagar alam, pengusaha binatang peliharaan, dsb.');

/*Table structure for table `tb_kategori_sma` */

DROP TABLE IF EXISTS `tb_kategori_sma`;

CREATE TABLE `tb_kategori_sma` (
  `id_kategori_sma` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori_sma`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori_sma` */

insert  into `tb_kategori_sma`(`id_kategori_sma`,`nama_kategori`) values (1,'IPA (SNMPTN)'),(2,'IPS (SNMPTN)'),(3,'MAN');

/*Table structure for table `tb_kategori_utbk` */

DROP TABLE IF EXISTS `tb_kategori_utbk`;

CREATE TABLE `tb_kategori_utbk` (
  `id_kategori_utbk` int NOT NULL AUTO_INCREMENT,
  `nama_kategori_utbk` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori_utbk` */

insert  into `tb_kategori_utbk`(`id_kategori_utbk`,`nama_kategori_utbk`) values (1,'Semua (Soshum/Saintek/Campuran) '),(2,'Saintek/Campuran'),(3,'Soshum/Campuran');

/*Table structure for table `tb_mapel` */

DROP TABLE IF EXISTS `tb_mapel`;

CREATE TABLE `tb_mapel` (
  `id_mapel` int NOT NULL AUTO_INCREMENT,
  `id_kategori_sma` int NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mapel`),
  KEY `id_kategori_sma` (`id_kategori_sma`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel` */

insert  into `tb_mapel`(`id_mapel`,`id_kategori_sma`,`nama_mapel`) values (1,1,'Matematika Wajib'),(2,1,'Matematika Minat'),(3,1,'Fisika'),(4,1,'Kimia'),(5,1,'Biologi'),(6,1,'Bahasa Inggris'),(7,1,'Bahasa Indonesia'),(8,2,'Matematika'),(9,2,'Bahasa Inggris'),(10,2,'Bahasa Indonesia'),(11,2,'Sosiologi'),(12,2,'Geografi'),(13,2,'Sejarah'),(14,2,'Ekonomi'),(15,2,'Kewarganegaraan');

/*Table structure for table `tb_mapel_utbk` */

DROP TABLE IF EXISTS `tb_mapel_utbk`;

CREATE TABLE `tb_mapel_utbk` (
  `id_mapel_utbk` int NOT NULL AUTO_INCREMENT,
  `id_kategori_utbk` int NOT NULL,
  `nama_mapel_utbk` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mapel_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel_utbk` */

insert  into `tb_mapel_utbk`(`id_mapel_utbk`,`id_kategori_utbk`,`nama_mapel_utbk`) values (3,2,'Matematika'),(4,2,'Fisika'),(5,2,'Kimia'),(6,2,'Biologi'),(7,1,'Penalaran Umum'),(8,1,'Pemahaman Bacaan dan Menulis'),(9,1,'Pengetahuan Umum'),(10,1,'Pengetahuan Kuantitatif'),(11,3,'Matematika'),(12,3,'Geografi'),(13,3,'Sejarah'),(14,3,'Sosiologi'),(15,3,'Ekonomi');

/*Table structure for table `tb_nilai_mapel` */

DROP TABLE IF EXISTS `tb_nilai_mapel`;

CREATE TABLE `tb_nilai_mapel` (
  `id_nilai_mapel` int NOT NULL AUTO_INCREMENT,
  `id_mapel` int NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `id_siswa` int NOT NULL,
  `semester` int DEFAULT NULL,
  `id_riwayat_isi_rapor` int DEFAULT NULL,
  PRIMARY KEY (`id_nilai_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nilai_mapel` */

insert  into `tb_nilai_mapel`(`id_nilai_mapel`,`id_mapel`,`nilai`,`id_siswa`,`semester`,`id_riwayat_isi_rapor`) values (1,1,'80',1,1,1),(2,2,'90',1,1,1),(3,3,'78',1,1,1),(4,4,'86',1,1,1),(5,5,'56',1,1,1),(6,6,'89',1,1,1),(7,7,'90',1,1,1),(8,1,'',1,2,1),(9,2,'',1,2,1),(10,3,'',1,2,1),(11,4,'',1,2,1),(12,5,'',1,2,1),(13,6,'',1,2,1),(14,7,'',1,2,1),(15,1,'',1,3,1),(16,2,'',1,3,1),(17,3,'',1,3,1),(18,4,'',1,3,1),(19,5,'',1,3,1),(20,6,'',1,3,1),(21,7,'',1,3,1),(22,1,'',1,4,1),(23,2,'',1,4,1),(24,3,'',1,4,1),(25,4,'',1,4,1),(26,5,'',1,4,1),(27,6,'',1,4,1),(28,7,'',1,4,1),(29,1,'',1,5,1),(30,2,'',1,5,1),(31,3,'',1,5,1),(32,4,'',1,5,1),(33,5,'',1,5,1),(34,6,'',1,5,1),(35,7,'',1,5,1),(36,1,'80',1,1,2),(37,2,'90',1,1,2),(38,3,'78',1,1,2),(39,4,'86',1,1,2),(40,5,'56',1,1,2),(41,6,'89',1,1,2),(42,7,'90',1,1,2),(43,1,'87',1,2,2),(44,2,'98',1,2,2),(45,3,'90',1,2,2),(46,4,'67',1,2,2),(47,5,'89',1,2,2),(48,6,'95',1,2,2),(49,7,'87',1,2,2),(50,1,'',1,3,2),(51,2,'',1,3,2),(52,3,'',1,3,2),(53,4,'',1,3,2),(54,5,'',1,3,2),(55,6,'',1,3,2),(56,7,'',1,3,2),(57,1,'',1,4,2),(58,2,'',1,4,2),(59,3,'',1,4,2),(60,4,'',1,4,2),(61,5,'',1,4,2),(62,6,'',1,4,2),(63,7,'',1,4,2),(64,1,'',1,5,2),(65,2,'',1,5,2),(66,3,'',1,5,2),(67,4,'',1,5,2),(68,5,'',1,5,2),(69,6,'',1,5,2),(70,7,'',1,5,2);

/*Table structure for table `tb_nilai_mapel_utbk` */

DROP TABLE IF EXISTS `tb_nilai_mapel_utbk`;

CREATE TABLE `tb_nilai_mapel_utbk` (
  `id_nilai_mapel_utbk` int NOT NULL AUTO_INCREMENT,
  `id_mapel_utbk` int NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `id_siswa` int NOT NULL,
  `id_riwayat_isi_utbk` int DEFAULT NULL,
  PRIMARY KEY (`id_nilai_mapel_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nilai_mapel_utbk` */

insert  into `tb_nilai_mapel_utbk`(`id_nilai_mapel_utbk`,`id_mapel_utbk`,`nilai`,`id_siswa`,`id_riwayat_isi_utbk`) values (17,7,'68',1,5),(18,8,'98',1,5),(19,9,'78',1,5),(20,10,'66',1,5),(21,7,'80',1,6),(22,8,'80',1,6),(23,9,'80',1,6),(24,10,'80',1,6),(25,7,'76',1,7),(26,8,'76',1,7),(27,9,'76',1,7),(28,10,'76',1,7);

/*Table structure for table `tb_pendukung_rapor` */

DROP TABLE IF EXISTS `tb_pendukung_rapor`;

CREATE TABLE `tb_pendukung_rapor` (
  `id_pendukung_rapor` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NOT NULL,
  `jur_1` varchar(255) NOT NULL,
  `kampus_1` varchar(255) NOT NULL,
  `jur_2` varchar(255) NOT NULL,
  `kampus_2` varchar(255) NOT NULL,
  `jur_3` varchar(255) NOT NULL,
  `kampus_3` varchar(255) NOT NULL,
  `good_mapel` varchar(255) NOT NULL,
  `bad_mapel` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_create` datetime NOT NULL,
  `id_riwayat_isi_rapor` int DEFAULT NULL,
  PRIMARY KEY (`id_pendukung_rapor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pendukung_rapor` */

insert  into `tb_pendukung_rapor`(`id_pendukung_rapor`,`id_siswa`,`jur_1`,`kampus_1`,`jur_2`,`kampus_2`,`jur_3`,`kampus_3`,`good_mapel`,`bad_mapel`,`status`,`tgl_create`,`id_riwayat_isi_rapor`) values (1,1,'jjh','ddd','uuy','dr','gg','ytr','uuu','kjnj','sudah','2019-12-09 10:15:29',1),(2,1,'jhhh','ds','jjh','lkj','gg','ggg','tre','ee','sudah','2019-12-09 10:16:04',2);

/*Table structure for table `tb_pendukung_utbk` */

DROP TABLE IF EXISTS `tb_pendukung_utbk`;

CREATE TABLE `tb_pendukung_utbk` (
  `id_pendukung_utbk` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NOT NULL,
  `jur_1` varchar(255) NOT NULL,
  `kampus_1` varchar(255) NOT NULL,
  `jur_2` varchar(255) NOT NULL,
  `kampus_2` varchar(255) NOT NULL,
  `jur_3` varchar(255) NOT NULL,
  `kampus_3` varchar(255) NOT NULL,
  `good_mapel` varchar(255) NOT NULL,
  `bad_mapel` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_create` datetime NOT NULL,
  `id_riwayat_isi_utbk` int DEFAULT NULL,
  PRIMARY KEY (`id_pendukung_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pendukung_utbk` */

insert  into `tb_pendukung_utbk`(`id_pendukung_utbk`,`id_siswa`,`jur_1`,`kampus_1`,`jur_2`,`kampus_2`,`jur_3`,`kampus_3`,`good_mapel`,`bad_mapel`,`status`,`tgl_create`,`id_riwayat_isi_utbk`) values (1,1,'gg','sss','ff','gg','hhh','ff','yyt','nh','sudah','2019-12-09 11:23:35',5),(2,1,'f','ss','ff','ff','ff','ff','ff','ff','sudah','2019-12-09 11:59:12',6),(3,1,'p','p','p','p','p','p','p','p','sudah','2019-12-09 12:03:23',7);

/*Table structure for table `tb_pertanyaan` */

DROP TABLE IF EXISTS `tb_pertanyaan`;

CREATE TABLE `tb_pertanyaan` (
  `id_pertanyaan` int NOT NULL AUTO_INCREMENT,
  `id_kategori_soal` int NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `tgl_create` datetime NOT NULL,
  PRIMARY KEY (`id_pertanyaan`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pertanyaan` */

insert  into `tb_pertanyaan`(`id_pertanyaan`,`id_kategori_soal`,`pertanyaan`,`tgl_create`) values (1,2,'Saya suka bercerita, termasuk cerita dongeng dan cerita yang lucu. ','2019-12-08 03:48:36'),(2,2,'Saya memiliki ingatan yang baik untuk hal-hal yang sepele','2019-12-08 03:48:43'),(4,2,'Saya menyukai permainan katakata (seperti scrabble dan puzzle).','2019-12-08 03:49:19'),(5,2,'Saya membaca buku hanya sebagai hobi.','2019-12-08 03:49:34'),(6,2,'Saya seorang pembicara yang baik (hampir setiap waktu).','2019-12-08 03:49:47'),(7,2,'Dalam berargumentasi, saya cenderung menggunakan kata-kata sindiran.','2019-12-08 03:50:03'),(8,2,'Saya senang membicarakan dan menulis ide-ide saya.','2019-12-08 03:50:15'),(9,2,'Jika saya harus mengingat sesuatu, saya menciptakan irama-irama atau kata-kata yang membantu saya untuk mengingatnya.','2019-12-08 03:50:34'),(10,2,'Jika sesuatu rusak dan tidak berfungsi, saya akan membaca buku panduannya terlebih dahulu.','2019-12-08 03:50:49'),(11,2,'Dalam kerja kelompok (untuk menyiapkan sebuah presentasi), saya lebih memilih untuk menulis dan melakukan riset pustaka.','2019-12-08 03:51:06'),(12,3,'Saya sangat menikmati pelajaran matematika.','2019-12-08 03:51:23'),(13,3,'Saya menyukai permainan yang menggunakan logika, seperti tekateki angka. ','2019-12-08 03:51:33'),(14,3,'Dapat memecahkan soal-soal hitungan adalah hal yang menyenangkan bagi saya. ','2019-12-08 03:51:46'),(15,3,'Jika saya harus mengingat sesuatu, saya cenderung menempatkan\r\nsetiap kejadian dalam urutan yang logis.','2019-12-08 03:52:07'),(16,3,'Saya senang mencari tahu bagaimana cara kerja setiap benda','2019-12-08 03:52:18'),(17,3,'Saya menyukai komputer dan berbagai permainan angka-angka.','2019-12-08 03:52:29'),(18,3,'Saya suka bermain catur, checkers, atau monopoli.','2019-12-08 03:52:40'),(19,3,'Dalam berargumentasi, saya mencoba mencari solusi yang adil\r\ndan logis.','2019-12-08 03:52:52'),(20,3,'Jika sesuatu rusak dan tidak berfungsi, saya melihat bagian-bagiannya (atau komponenkomponennya) dan mencari tahu bagaimana cara kerjanya.','2019-12-08 03:53:12'),(21,3,'Dalam kerja kelompok, saya lebih memilih membuat diagram dan grafik.','2019-12-08 03:53:25'),(22,4,'Saya lebih memilih peta daripada petunjuk tertulis dalam mencari\r\nsebuah alamat.','2019-12-08 03:53:58'),(23,4,'Saya sering melamun. ','2019-12-08 03:54:08'),(24,4,'Saya menikmati hobi saya dalam dalam bidang fotografi.','2019-12-08 03:54:22'),(25,4,'Saya senang menggambar dan menciptakan sesuatu.','2019-12-08 03:54:47'),(26,4,'Jika saya harus mengingat sesuatu, saya menggambar diagram untuk membantu saya mengingatnya.','2019-12-08 03:55:04'),(27,4,'Saya senang membuat coretancoretan di kertas kapan pun saya\r\nbisa.','2019-12-08 03:55:14'),(28,4,'Ketika membaca majalah, saya lebih suka melihat gambar-gambarnya daripada membaca teksnya.','2019-12-08 03:55:34'),(29,4,'Dalam berargumentasi, saya mencoba menjaga jarak, tetap\r\nberdiam diri, atau memvisualisasikan beberapa solusi.','2019-12-08 03:55:49'),(30,4,'Jika sesuatu rusak dan tidak berfungsi, saya cenderung\r\nmempelajari diagram mengenai cara kerjanya.','2019-12-08 03:56:08'),(31,4,'Dalam kerja kelompok, saya lebih memilih menggambar hal-hal yang penting.','2019-12-08 03:56:24'),(32,5,'Sejak suka berolahraga, senam menjadi olah raga favorit saya.','2019-12-08 03:56:46'),(33,5,'Saya menyukai kegiatan-kegiatan seperti pertukangan, menjahit dan membuat bentuk-bentuk.','2019-12-08 03:57:02'),(34,5,'Ketika melihat benda-benda, saya senang menyentuhnya.','2019-12-08 03:57:18'),(35,5,'Saya tidak dapat duduk diam dalam waktu yang lama','2019-12-08 03:57:29'),(36,5,'Saya menggunakan banyak gerakan tubuh ketika berbicara.','2019-12-08 03:57:40'),(37,5,'Jika saya harus mengingat sesuatu, saya menuliskannya berkali-kali sampai saya memahaminya.','2019-12-08 03:57:56'),(38,5,'Saya cenderung mengetuk-ngetuk jari saya atau memainkan pena/pensil selama jam pelajaran.','2019-12-08 03:58:12'),(39,5,'Dalam berargumentasi,saya cenderung menyerang atau menghindarinya.','2019-12-08 03:58:30'),(40,5,'Jika sesuatu rusak dan tidak berfungsi, saya cenderung memisahkan setiap bagian lalu menggabungkannya kembali.','2019-12-08 03:58:47'),(41,5,'Dalam kerja kelompok, saya lebih memilih memindahkan barang atau membuat suatu bentuk.','2019-12-08 03:59:00'),(42,6,'Saya senang mendengarkan musik dan radio.','2019-12-08 03:59:25'),(43,6,'Saya cenderung bersenandung ketika sedang bekerja.','2019-12-08 03:59:38'),(44,6,'Saya suka bernyanyi. ','2019-12-08 03:59:51'),(45,6,'Saya bisa memainkan salah satu alat musik dengan baik.','2019-12-08 04:00:04'),(46,6,'Saya suka mendengarkan musik sambil belajar atau sambil membaca buku.','2019-12-08 04:00:17'),(47,6,'Jika saya harus mengingat sesuatu, saya mencoba untuk membuat irama tentang hal tersebut.','2019-12-08 04:00:33'),(48,6,'Dalam berargumentasi, saya cenderung berteriak atau memukul (meja/ benda) atau bergerak dalam suatu irama.','2019-12-08 04:00:49'),(49,6,'Saya bisa menghafal nada-nada dari banyak lagu.','2019-12-08 04:01:02'),(50,6,'Jika sesuatu rusak dan tidak berfungsi, saya cenderung\r\nmengetuk-ngetuk jari saya membentuk suatu irama sambil mencari jalan keluar.','2019-12-08 04:01:23'),(51,6,'Dalam kerja kelompok, saya lebih suka menggunakan kata-kata\r\nbaru pada nada atau musik yang sudah dikenal.','2019-12-08 04:01:41'),(52,7,'Saya mampu bergaul baik dengan orang lain.','2019-12-08 04:02:12'),(53,7,'Saya senang berkumpul dan berorganisasi.','2019-12-08 04:02:23'),(54,7,'Saya mempunyai beberapa teman dekat.','2019-12-08 04:02:41'),(55,7,'Saya suka membantu mengajar murid-murid lain.','2019-12-08 04:02:51'),(56,7,'Saya senang bekerja sama dalam kelompok.','2019-12-08 04:03:02'),(57,7,'Teman-teman sering meminta saran dari saya karena saya terlihat sebagai pemimpin alamiah.','2019-12-08 04:03:16'),(58,7,'Jika saya harus mengingat sesuatu, saya meminta seseorang untuk menguji saya apakah saya sudah memahaminya.','2019-12-08 04:03:35'),(59,7,'Dalam berargumentasi, saya cenderung meminta bantuan teman atau pihak- pihak yang memiliki otoritas (ahli) dalam bidang tersebut.','2019-12-08 04:03:51'),(60,7,'Jika sesuatu rusak dan tidak berfungsi, saya mencari seseorang yang dapat menolong saya.','2019-12-08 04:04:05'),(61,7,'Dalam kerja kelompok, saya lebih memilih mengatur tugas dalam\r\nkelompok.','2019-12-08 04:04:17'),(62,8,'Saya suka bekerja sendirian tanpa ada gangguan orang lain.','2019-12-08 04:04:40'),(63,8,'Saya suka menulis buku harian. ','2019-12-08 04:04:48'),(64,8,'Saya menyukai diri saya (hampir setiap waktu).','2019-12-08 04:05:00'),(65,8,'Saya tidak suka keramaian.','2019-12-08 04:05:08'),(66,8,'Saya tahu kelebihan dan kekurangan diri saya.','2019-12-08 04:05:19'),(67,8,'Saya memiliki tekad yang kuat, mandiri dan berpendirian kuat (tidak mudah ikut-ikutan orang lain). ','2019-12-08 04:05:35'),(68,8,'Jika saya harus mengingat sesuatu saya cenderung\r\nmenutup mata saya dan mendalami (merasakan) situasi yang sedang terjadi.','2019-12-08 04:05:51'),(69,8,'Dalam berargumentasi, saya biasanya menghindar (keluar\r\nruangan) hingga saya dapat menenangkan diri.','2019-12-08 04:06:04'),(70,8,'Jika sesuatu rusak dan tidak berfungsi, saya mempertimbangkan apakah benda tersebut layak untuk diperbaiki.','2019-12-08 04:06:21'),(71,8,'Dalam kerja kelompok, saya senang mengkontribusikan sesuatu yang unik berdasarkan apa yang saya miliki dan rasakan.','2019-12-08 04:06:37'),(72,9,'Saya sangat memperhatikan sekeliling dan apa yang sedang terjadi di sekitar saya.','2019-12-08 04:07:00'),(73,9,'Saya senang berjalan-jalan di hutan (atau taman) dan melihat-lihat pohon serta bunga','2019-12-08 04:07:23'),(74,9,'Saya senang berkebun.','2019-12-08 04:07:35'),(75,9,'Saya suka mengoleksi barangbarang seperti batu-batuan, kartu\r\nolahraga, perangko, dsb.','2019-12-08 04:07:45'),(76,9,'Ketika dewasa, saya ingin pergi dari kota yang ramai ke tempat yang masih alamiah untuk menikmati alam. ','2019-12-08 04:08:01'),(77,9,'Jika saya harus mengingat sesuatu, saya cenderung mengkategorikannya dalam kelompok-kelompok.','2019-12-08 04:08:15'),(78,9,'Saya senang mempelajari namanama makhluk hidup di lingkungan\r\ntempat saya berada, seperti bunga dan pohon.','2019-12-08 04:08:27'),(79,9,'Dalam berargumentasi, saya cenderung membandingkan lawan saya dengan seseorang atau sesuatu yang pernah saya baca atau dengar lalu bereaksi.','2019-12-08 04:08:46'),(80,9,'Jika sesuatu rusak dan tidak berfungsi, saya memperhatikan sekeliling saya untuk melihat apa yang bisa saya temukan untuk memperbaikinya.','2019-12-08 04:09:02'),(81,9,'Dalam kerja kelompok, saya lebih memilih mengatur dan mengelompokkan informasi dalam kategori-kategori sehingga mudah dimengerti.','2019-12-08 04:09:19');

/*Table structure for table `tb_riwayat_isi_rapor` */

DROP TABLE IF EXISTS `tb_riwayat_isi_rapor`;

CREATE TABLE `tb_riwayat_isi_rapor` (
  `id_riwayat_isi_rapor` int NOT NULL AUTO_INCREMENT,
  `tgl_isi` datetime DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_isi_rapor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_riwayat_isi_rapor` */

insert  into `tb_riwayat_isi_rapor`(`id_riwayat_isi_rapor`,`tgl_isi`,`id_siswa`) values (1,'2019-12-09 10:15:29',1),(2,'2019-12-09 10:16:04',1);

/*Table structure for table `tb_riwayat_isi_utbk` */

DROP TABLE IF EXISTS `tb_riwayat_isi_utbk`;

CREATE TABLE `tb_riwayat_isi_utbk` (
  `id_riwayat_isi_utbk` int NOT NULL AUTO_INCREMENT,
  `tgl_isi` datetime DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_isi_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_riwayat_isi_utbk` */

insert  into `tb_riwayat_isi_utbk`(`id_riwayat_isi_utbk`,`tgl_isi`,`id_siswa`) values (5,'2019-12-09 11:23:35',1),(6,'2019-12-09 11:59:12',1),(7,'2019-12-09 12:03:23',1);

/*Table structure for table `tb_riwayat_tes` */

DROP TABLE IF EXISTS `tb_riwayat_tes`;

CREATE TABLE `tb_riwayat_tes` (
  `id_riwayat_tes` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `hasil_1` int DEFAULT NULL,
  `hasil_2` int DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `total_skor` varchar(255) DEFAULT NULL,
  `hasil_terbawah_1` int DEFAULT NULL,
  `hasil_terbawah_2` int DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_tes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_riwayat_tes` */

insert  into `tb_riwayat_tes`(`id_riwayat_tes`,`id_siswa`,`tgl_mulai`,`hasil_1`,`hasil_2`,`status`,`tgl_selesai`,`total_skor`,`hasil_terbawah_1`,`hasil_terbawah_2`) values (1,1,NULL,4,9,'sudah','2024-10-13 12:14:40','6',8,2),(2,9,NULL,2,8,'sudah','2024-10-19 01:20:17','21',5,3);

/*Table structure for table `tb_sekolah` */

DROP TABLE IF EXISTS `tb_sekolah`;

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_sekolah` */

insert  into `tb_sekolah`(`id_sekolah`,`nama_sekolah`) values (2,'SMK N 5 Bandar Lampung');

/*Table structure for table `tb_setting_fasilitas` */

DROP TABLE IF EXISTS `tb_setting_fasilitas`;

CREATE TABLE `tb_setting_fasilitas` (
  `id_setting_fasilitas` int NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` varchar(255) NOT NULL,
  `status` enum('enable','disable') NOT NULL,
  PRIMARY KEY (`id_setting_fasilitas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_setting_fasilitas` */

insert  into `tb_setting_fasilitas`(`id_setting_fasilitas`,`nama_fasilitas`,`status`) values (1,'nilai rapor','enable'),(2,'nilai utbk','enable'),(3,'tes minat bakat','enable');

/*Table structure for table `tb_siswa` */

DROP TABLE IF EXISTS `tb_siswa`;

CREATE TABLE `tb_siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_jk` int DEFAULT NULL,
  `id_agama` int DEFAULT NULL,
  `id_sekolah` int DEFAULT NULL,
  `alamat` text,
  `nisn` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `id_kategori_sma` int DEFAULT NULL,
  `id_kategori_utbk` int DEFAULT NULL,
  `sekolah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`id_siswa`,`nama_siswa`,`tempat_lahir`,`tgl_lahir`,`id_jk`,`id_agama`,`id_sekolah`,`alamat`,`nisn`,`email`,`no_hp`,`id_kategori_sma`,`id_kategori_utbk`,`sekolah`) values (1,'arief edit','bandar lampung','2019-12-04',1,3,2,'test','15432','arief@mail.com','98766',1,NULL,NULL),(2,'ridho','bandar lampung','0000-00-00',1,3,2,'test','15433','ridho@mail.com','98766',1,2,NULL),(3,'Okta Pilopa','Bandar Lampung','1992-10-27',1,3,2,'jl test','764552','okta@mail.com','0974567',2,NULL,NULL),(4,'Danzen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'danzen@mail.com',NULL,NULL,NULL,NULL),(5,'Adam',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'adam@mail.com',NULL,NULL,NULL,NULL),(6,'contoh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'contoh@mail.com',NULL,NULL,NULL,NULL),(8,'faisil',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'faisil@mail.com',NULL,NULL,NULL,NULL),(9,'Aut repudiandae et e','Et dolorum nihil dol','1996-04-04',1,3,NULL,'Dolorem id assumenda','322222','faisul@mail.com','15',2,NULL,'Laudantium dolor do');

/*Table structure for table `tb_status_kelengkapan` */

DROP TABLE IF EXISTS `tb_status_kelengkapan`;

CREATE TABLE `tb_status_kelengkapan` (
  `id_status_kelengkapan` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_status_kelengkapan`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tb_status_kelengkapan` */

insert  into `tb_status_kelengkapan`(`id_status_kelengkapan`,`id_siswa`,`kategori`,`status`,`tgl_create`) values (1,1,'profil','sudah','2019-12-09 10:11:09'),(2,1,'password','sudah','2019-12-09 10:11:14'),(3,1,'rapor','sudah','2019-12-09 10:15:29'),(6,1,'utbk','sudah','2019-12-09 11:23:35'),(7,3,'profil','sudah','2019-12-10 09:18:03'),(8,3,'password','sudah','2019-12-10 09:18:08'),(15,9,'profil','sudah','2024-10-19 01:19:16'),(16,9,'password','sudah','2024-10-19 01:19:27');

/*Table structure for table `tb_status_pengisian_nilai` */

DROP TABLE IF EXISTS `tb_status_pengisian_nilai`;

CREATE TABLE `tb_status_pengisian_nilai` (
  `id_status_pengisian_nilai` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_create` datetime NOT NULL,
  `rasionalisasi` text NOT NULL,
  `id_riwayat_isi_rapor` int DEFAULT NULL,
  PRIMARY KEY (`id_status_pengisian_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_status_pengisian_nilai` */

insert  into `tb_status_pengisian_nilai`(`id_status_pengisian_nilai`,`id_siswa`,`kategori`,`status`,`tgl_create`,`rasionalisasi`,`id_riwayat_isi_rapor`) values (1,1,'rapor','rasionalisasi','2019-12-09 10:17:16','ini rasionalisasi 2',1),(2,1,'rapor','rasionalisasi','2019-12-09 10:17:01','ini rasionalisasi 1',2),(3,1,'utbk','rasionalisasi','2019-12-09 12:16:11','ras 1',5),(4,1,'utbk','rasionalisasi','2019-12-09 12:13:13','',6),(5,1,'utbk','rasionalisasi','2019-12-09 12:13:13','',7);

/*Table structure for table `tb_temporary_soal` */

DROP TABLE IF EXISTS `tb_temporary_soal`;

CREATE TABLE `tb_temporary_soal` (
  `id_temporary_soal` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `id_pertanyaan` int DEFAULT NULL,
  `jawaban` int DEFAULT NULL,
  `no_soal` int DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_riwayat_tes` int DEFAULT NULL,
  PRIMARY KEY (`id_temporary_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

/*Data for the table `tb_temporary_soal` */

insert  into `tb_temporary_soal`(`id_temporary_soal`,`id_siswa`,`id_pertanyaan`,`jawaban`,`no_soal`,`status`,`id_riwayat_tes`) values (1,1,23,3,1,'sudah',1),(2,1,80,3,2,'sudah',1),(3,1,48,NULL,3,'sudah',1),(4,1,75,NULL,4,'sudah',1),(5,1,31,NULL,5,'sudah',1),(6,1,39,NULL,6,'sudah',1),(7,1,29,NULL,7,'sudah',1),(8,1,53,NULL,8,'sudah',1),(9,1,43,NULL,9,'sudah',1),(10,1,14,NULL,10,'sudah',1),(11,1,26,NULL,11,'sudah',1),(12,1,70,NULL,12,'sudah',1),(13,1,1,NULL,13,'sudah',1),(14,1,60,NULL,14,'sudah',1),(15,1,5,NULL,15,'sudah',1),(16,1,6,NULL,16,'sudah',1),(17,1,64,NULL,17,'sudah',1),(18,1,66,NULL,18,'sudah',1),(19,1,13,NULL,19,'sudah',1),(20,1,4,NULL,20,'sudah',1),(21,1,74,NULL,21,'sudah',1),(22,1,36,NULL,22,'sudah',1),(23,1,76,NULL,23,'sudah',1),(24,1,58,NULL,24,'sudah',1),(25,1,35,NULL,25,'sudah',1),(26,1,32,NULL,26,'sudah',1),(27,1,2,NULL,27,'sudah',1),(28,1,72,NULL,28,'sudah',1),(29,1,69,NULL,29,'sudah',1),(30,1,62,NULL,30,'sudah',1),(31,1,12,NULL,31,'sudah',1),(32,1,21,NULL,32,'sudah',1),(33,1,49,NULL,33,'sudah',1),(34,1,17,NULL,34,'sudah',1),(35,1,9,NULL,35,'sudah',1),(36,1,67,NULL,36,'sudah',1),(37,1,16,NULL,37,'sudah',1),(38,1,78,NULL,38,'sudah',1),(39,1,27,NULL,39,'sudah',1),(40,1,73,NULL,40,'sudah',1),(41,1,7,NULL,41,'sudah',1),(42,1,37,NULL,42,'sudah',1),(43,1,77,NULL,43,'sudah',1),(44,1,81,NULL,44,'sudah',1),(45,1,38,NULL,45,'sudah',1),(46,1,11,NULL,46,'sudah',1),(47,1,46,NULL,47,'sudah',1),(48,1,68,NULL,48,'sudah',1),(49,1,24,NULL,49,'sudah',1),(50,1,18,NULL,50,'sudah',1),(51,1,33,NULL,51,'sudah',1),(52,1,45,NULL,52,'sudah',1),(53,1,65,NULL,53,'sudah',1),(54,1,55,NULL,54,'sudah',1),(55,1,59,NULL,55,'sudah',1),(56,1,30,NULL,56,'sudah',1),(57,1,19,NULL,57,'sudah',1),(58,1,20,NULL,58,'sudah',1),(59,1,57,NULL,59,'sudah',1),(60,1,56,NULL,60,'sudah',1),(61,1,10,NULL,61,'sudah',1),(62,1,25,NULL,62,'sudah',1),(63,1,8,NULL,63,'sudah',1),(64,1,71,NULL,64,'sudah',1),(65,1,44,NULL,65,'sudah',1),(66,1,50,NULL,66,'sudah',1),(67,1,54,NULL,67,'sudah',1),(68,1,34,NULL,68,'sudah',1),(69,1,40,NULL,69,'sudah',1),(70,1,22,NULL,70,'sudah',1),(71,1,63,NULL,71,'sudah',1),(72,1,51,NULL,72,'sudah',1),(73,1,41,NULL,73,'sudah',1),(74,1,79,NULL,74,'sudah',1),(75,1,28,NULL,75,'sudah',1),(76,1,47,NULL,76,'sudah',1),(77,1,52,NULL,77,'sudah',1),(78,1,42,NULL,78,'sudah',1),(79,1,15,NULL,79,'sudah',1),(80,1,61,NULL,80,'sudah',1),(81,9,70,1,1,'sudah',2),(82,9,80,4,2,'sudah',2),(83,9,44,3,3,'sudah',2),(84,9,2,3,4,'sudah',2),(85,9,54,1,5,'sudah',2),(86,9,63,5,6,'sudah',2),(87,9,30,NULL,7,'sudah',2),(88,9,8,NULL,8,'sudah',2),(89,9,35,NULL,9,'sudah',2),(90,9,43,NULL,10,'sudah',2),(91,9,33,NULL,11,'sudah',2),(92,9,78,NULL,12,'sudah',2),(93,9,65,NULL,13,'sudah',2),(94,9,37,NULL,14,'sudah',2),(95,9,68,NULL,15,'sudah',2),(96,9,42,NULL,16,'sudah',2),(97,9,17,NULL,17,'sudah',2),(98,9,81,NULL,18,'sudah',2),(99,9,26,NULL,19,'sudah',2),(100,9,75,NULL,20,'sudah',2),(101,9,38,NULL,21,'sudah',2),(102,9,20,NULL,22,'sudah',2),(103,9,32,NULL,23,'sudah',2),(104,9,72,NULL,24,'sudah',2),(105,9,79,NULL,25,'sudah',2),(106,9,59,NULL,26,'sudah',2),(107,9,41,NULL,27,'sudah',2),(108,9,61,NULL,28,'sudah',2),(109,9,47,NULL,29,'sudah',2),(110,9,16,NULL,30,'sudah',2),(111,9,56,NULL,31,'sudah',2),(112,9,76,NULL,32,'sudah',2),(113,9,40,NULL,33,'sudah',2),(114,9,50,NULL,34,'sudah',2),(115,9,1,NULL,35,'sudah',2),(116,9,77,NULL,36,'sudah',2),(117,9,6,NULL,37,'sudah',2),(118,9,24,NULL,38,'sudah',2),(119,9,7,NULL,39,'sudah',2),(120,9,13,NULL,40,'sudah',2),(121,9,10,NULL,41,'sudah',2),(122,9,53,NULL,42,'sudah',2),(123,9,48,NULL,43,'sudah',2),(124,9,74,NULL,44,'sudah',2),(125,9,15,NULL,45,'sudah',2),(126,9,52,NULL,46,'sudah',2),(127,9,62,NULL,47,'sudah',2),(128,9,29,NULL,48,'sudah',2),(129,9,12,NULL,49,'sudah',2),(130,9,39,NULL,50,'sudah',2),(131,9,23,NULL,51,'sudah',2),(132,9,28,NULL,52,'sudah',2),(133,9,60,NULL,53,'sudah',2),(134,9,5,NULL,54,'sudah',2),(135,9,64,NULL,55,'sudah',2),(136,9,31,NULL,56,'sudah',2),(137,9,69,NULL,57,'sudah',2),(138,9,46,NULL,58,'sudah',2),(139,9,55,NULL,59,'sudah',2),(140,9,67,NULL,60,'sudah',2),(141,9,45,NULL,61,'sudah',2),(142,9,25,NULL,62,'sudah',2),(143,9,19,NULL,63,'sudah',2),(144,9,51,NULL,64,'sudah',2),(145,9,57,NULL,65,'sudah',2),(146,9,49,NULL,66,'sudah',2),(147,9,14,NULL,67,'sudah',2),(148,9,71,NULL,68,'sudah',2),(149,9,11,NULL,69,'sudah',2),(150,9,66,NULL,70,'sudah',2),(151,9,27,NULL,71,'sudah',2),(152,9,18,NULL,72,'sudah',2),(153,9,22,NULL,73,'sudah',2),(154,9,73,NULL,74,'sudah',2),(155,9,34,NULL,75,'sudah',2),(156,9,36,NULL,76,'sudah',2),(157,9,21,NULL,77,'sudah',2),(158,9,58,NULL,78,'sudah',2),(159,9,9,NULL,79,'sudah',2),(160,9,4,4,80,'sudah',2);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`level`) values (1,'okta@mail.com','1','siswa'),(2,'admin@mail.com','adminku','admin'),(3,'arief@mail.com','2','siswa'),(4,'danzen@mail.com',NULL,'siswa'),(5,'adam@mail.com',NULL,'siswa'),(6,'contoh@mail.com','730129','siswa'),(7,'contoh2@mail.com',NULL,'siswa'),(8,'faisil@mail.com',NULL,'siswa'),(9,'faisul@mail.com','123','siswa');

/*Table structure for table `v_data_siswa` */

DROP TABLE IF EXISTS `v_data_siswa`;

/*!50001 DROP VIEW IF EXISTS `v_data_siswa` */;
/*!50001 DROP TABLE IF EXISTS `v_data_siswa` */;

/*!50001 CREATE TABLE  `v_data_siswa`(
 `nama_siswa` varchar(255) ,
 `email` varchar(255) ,
 `password` varchar(255) ,
 `id_siswa` int ,
 `s_rapor` varchar(5) ,
 `s_rapor_rasi` varchar(5) ,
 `s_utbk` varchar(5) ,
 `s_utbk_rasi` varchar(5) 
)*/;

/*Table structure for table `view_skor` */

DROP TABLE IF EXISTS `view_skor`;

/*!50001 DROP VIEW IF EXISTS `view_skor` */;
/*!50001 DROP TABLE IF EXISTS `view_skor` */;

/*!50001 CREATE TABLE  `view_skor`(
 `id_kategori_soal` int ,
 `id_siswa` int ,
 `skor` decimal(32,0) 
)*/;

/*View structure for view v_data_siswa */

/*!50001 DROP TABLE IF EXISTS `v_data_siswa` */;
/*!50001 DROP VIEW IF EXISTS `v_data_siswa` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_data_siswa` AS select distinct `tb_siswa`.`nama_siswa` AS `nama_siswa`,`tb_siswa`.`email` AS `email`,`tb_user`.`password` AS `password`,`tb_siswa`.`id_siswa` AS `id_siswa`,(case when ((select count(0) from `tb_riwayat_isi_rapor` where (`tb_riwayat_isi_rapor`.`id_siswa` = `tb_siswa`.`id_siswa`)) = 0) then 'Belum' else 'Sudah' end) AS `s_rapor`,(case when ((select count(0) from `tb_status_pengisian_nilai` where ((`tb_status_pengisian_nilai`.`id_siswa` = `tb_siswa`.`id_siswa`) and (`tb_status_pengisian_nilai`.`kategori` = 'rapor'))) = 0) then 'Belum' else 'Sudah' end) AS `s_rapor_rasi`,(case when ((select count(0) from `tb_riwayat_isi_utbk` where (`tb_riwayat_isi_utbk`.`id_siswa` = `tb_siswa`.`id_siswa`)) = 0) then 'Belum' else 'Sudah' end) AS `s_utbk`,(case when ((select count(0) from `tb_status_pengisian_nilai` where ((`tb_status_pengisian_nilai`.`id_siswa` = `tb_siswa`.`id_siswa`) and (`tb_status_pengisian_nilai`.`kategori` = 'utbk'))) = 0) then 'Belum' else 'Sudah' end) AS `s_utbk_rasi` from (`tb_siswa` left join `tb_user` on((`tb_user`.`username` = `tb_siswa`.`email`))) */;

/*View structure for view view_skor */

/*!50001 DROP TABLE IF EXISTS `view_skor` */;
/*!50001 DROP VIEW IF EXISTS `view_skor` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_skor` AS select `tb_pertanyaan`.`id_kategori_soal` AS `id_kategori_soal`,`tb_temporary_soal`.`id_siswa` AS `id_siswa`,sum(`tb_temporary_soal`.`jawaban`) AS `skor` from (`tb_temporary_soal` join `tb_pertanyaan` on((`tb_pertanyaan`.`id_pertanyaan` = `tb_temporary_soal`.`id_pertanyaan`))) group by `tb_pertanyaan`.`id_kategori_soal` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
