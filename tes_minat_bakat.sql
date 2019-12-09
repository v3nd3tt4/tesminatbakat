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

/*Table structure for table `tb_kategori_pertanyaan` */

DROP TABLE IF EXISTS `tb_kategori_pertanyaan`;

CREATE TABLE `tb_kategori_pertanyaan` (
  `id_kategori_soal` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_kategori_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori_pertanyaan` */

insert  into `tb_kategori_pertanyaan`(`id_kategori_soal`,`nama_kategori`,`keterangan`) values 
(2,'KECERDASAN MAJEMUK 01','KECERDASAN VERBAL/ LINGUISTIK.\r\n\r\nKemampuan untuk menggunakan bahasa atau kata-kata secara efektif.\r\nProfesi:\r\nPengajar, pengacara, politikus, wartawan, presenter, penyiar, tour guide, sales, dsb.'),
(3,'KECERDASAN MAJEMUK 02','KECERDASAN LOGIS/ MATEMATIS.\r\n\r\nKemampuan menggunakan angka-angka dan penalaran logika dengan baik, biasanya\r\npunya minat yang besar untuk bereksplorasi dan bertanya tentang berbagai fenomena\r\nserta menuntut jawaban logis.\r\nProfesi:\r\nInsinyur, dokter, peneliti, pengacara, akuntan, programmer, analis sistem, analis\r\nkeuangan, banker, dsb.'),
(4,'KECERDASAN MAJEMUK 03 ','KECERDASAN VISUAL/ SPASIAL.\r\n\r\nKemampuan berpikir 2 atau 3 dimensi, termasuk pemahaman akan bentuk dan ruang\r\nserta hubungan antar benda dalam ruangan, memiliki kepekaan akan arah atau lokasi\r\ntertentu.\r\nProfesi:\r\nArsitek, designer, perencana tata kota, seniman, fotografer, animator, pelaut, pilot, dsb'),
(5,'KECERDASAN MAJEMUK 04','KECERDASAN KINESTETIK\r\n\r\nKemampuan untuk menggunakan gerak tubuh atau bergerak dengan ketepatan\r\n(presisi) tinggi dan mengekspresikan ide atau perasaan melalui gerakan tertentu.\r\nProfesi:\r\nAtlet, penari, koreografer, pemeran pantomim, aktor/ aktris, model, pramugari, ahli jam,\r\nperakit senjata/ bom, dokter bedah, trainer atraktif, dsb.'),
(6,'KECERDASAN MAJEMUK 05 ','KECERDASAN MUSIKAL.\r\n\r\nKemampuan untuk memahami, mengapresiasi, memainkan dan menciptakan musik\r\nserta memiliki kepekaan akan ritme, melodi atau nada.\r\nProfesi:\r\nPenyanyi, pencipta lagu, pemusik, komposer, guru vokal atau musik, dirigen, music\r\ndirector, video jockey, disc jockey, music arranger, dsb.'),
(7,'KECERDASAN MAJEMUK 06','KECERDASAN INTERPERSONAL\r\n\r\nKemampuan untuk menjalin hubungan (berkomunikasi) dengan orang lain, memahami\r\nkebutuhan dan perilaku orang lain, mengenali perasaan dengan jeli, melihat dari sudut\r\npandang orang lain (berempati), bekerja sama (teamwork), pandai membangun\r\nkepercayaan dan mempertahankan hubungan positif.\r\nProfesi:\r\nPengajar, politikus, pebisnis, marketing communication, public relations, konsultan ,\r\npekerja sosial, aktor/ aktris, rohaniwan, perawat, terapis, dsb.'),
(8,'KECERDASAN MAJEMUK 07','KECERDASAN INTRAPERSONAL\r\n\r\nKemampuan memahami, menganalisa, dan merefleksikan diri sendiri, mengenali\r\nkekuatan dan keterbatasan diri sendiri, serta menyadari perasaan, keinginan, harapan,\r\ndan tujuan hidup.\r\nProfesi:\r\nPelatih, pengajar, penulis, peneliti, konselor, psikolog, rohaniwan, entrepreneur, dsb.'),
(9,'KECERDASAN MAJEMUK 08 ','KECERDASAN NATURALIS.\r\n\r\nKemampuan untuk memahami alam sekitar, mengidentifikasi dan mengklasifikasikan\r\npersamaan dan perbedaan karakteristik spesies flora dan fauna, secara secara efektif\r\nberinteraksi dengan alam.\r\nProfesi:\r\nAktivis lingkungan hidup, ahli pertanian atau peternakan, spesialis budi daya hewan\r\ntertentu, pencinta alam, polisi hutan, dokter hewan, pengelola kebun binatang atau\r\ncagar alam, pengusaha binatang peliharaan, dsb.');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel` */

insert  into `tb_mapel`(`id_mapel`,`id_kategori_sma`,`nama_mapel`) values 
(1,1,'Matematika Wajib'),
(2,1,'Matematika Minat'),
(3,1,'Fisika'),
(4,1,'Kimia'),
(5,1,'Biologi'),
(6,1,'Bahasa Inggris'),
(7,1,'Bahasa Indonesia'),
(8,2,'Matematika'),
(9,2,'Bahasa Inggris'),
(10,2,'Bahasa Indonesia'),
(11,2,'Sosiologi'),
(12,2,'Geografi'),
(13,2,'Sejarah'),
(14,2,'Ekonomi'),
(15,2,'Kewarganegaraan');

/*Table structure for table `tb_mapel_utbk` */

DROP TABLE IF EXISTS `tb_mapel_utbk`;

CREATE TABLE `tb_mapel_utbk` (
  `id_mapel_utbk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_utbk` int(11) NOT NULL,
  `nama_mapel_utbk` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mapel_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mapel_utbk` */

insert  into `tb_mapel_utbk`(`id_mapel_utbk`,`id_kategori_utbk`,`nama_mapel_utbk`) values 
(3,2,'Matematika'),
(4,2,'Fisika'),
(5,2,'Kimia'),
(6,2,'Biologi'),
(7,1,'Penalaran Umum'),
(8,1,'Pemahaman Bacaan dan Menulis'),
(9,1,'Pengetahuan Umum'),
(10,1,'Pengetahuan Kuantitatif'),
(11,3,'Matematika'),
(12,3,'Geografi'),
(13,3,'Sejarah'),
(14,3,'Sosiologi'),
(15,3,'Ekonomi');

/*Table structure for table `tb_nilai_mapel` */

DROP TABLE IF EXISTS `tb_nilai_mapel`;

CREATE TABLE `tb_nilai_mapel` (
  `id_nilai_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `semester` int(10) DEFAULT NULL,
  `id_riwayat_isi_rapor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nilai_mapel` */

insert  into `tb_nilai_mapel`(`id_nilai_mapel`,`id_mapel`,`nilai`,`id_siswa`,`semester`,`id_riwayat_isi_rapor`) values 
(1,1,'80',1,1,1),
(2,2,'90',1,1,1),
(3,3,'78',1,1,1),
(4,4,'86',1,1,1),
(5,5,'56',1,1,1),
(6,6,'89',1,1,1),
(7,7,'90',1,1,1),
(8,1,'',1,2,1),
(9,2,'',1,2,1),
(10,3,'',1,2,1),
(11,4,'',1,2,1),
(12,5,'',1,2,1),
(13,6,'',1,2,1),
(14,7,'',1,2,1),
(15,1,'',1,3,1),
(16,2,'',1,3,1),
(17,3,'',1,3,1),
(18,4,'',1,3,1),
(19,5,'',1,3,1),
(20,6,'',1,3,1),
(21,7,'',1,3,1),
(22,1,'',1,4,1),
(23,2,'',1,4,1),
(24,3,'',1,4,1),
(25,4,'',1,4,1),
(26,5,'',1,4,1),
(27,6,'',1,4,1),
(28,7,'',1,4,1),
(29,1,'',1,5,1),
(30,2,'',1,5,1),
(31,3,'',1,5,1),
(32,4,'',1,5,1),
(33,5,'',1,5,1),
(34,6,'',1,5,1),
(35,7,'',1,5,1),
(36,1,'80',1,1,2),
(37,2,'90',1,1,2),
(38,3,'78',1,1,2),
(39,4,'86',1,1,2),
(40,5,'56',1,1,2),
(41,6,'89',1,1,2),
(42,7,'90',1,1,2),
(43,1,'87',1,2,2),
(44,2,'98',1,2,2),
(45,3,'90',1,2,2),
(46,4,'67',1,2,2),
(47,5,'89',1,2,2),
(48,6,'95',1,2,2),
(49,7,'87',1,2,2),
(50,1,'',1,3,2),
(51,2,'',1,3,2),
(52,3,'',1,3,2),
(53,4,'',1,3,2),
(54,5,'',1,3,2),
(55,6,'',1,3,2),
(56,7,'',1,3,2),
(57,1,'',1,4,2),
(58,2,'',1,4,2),
(59,3,'',1,4,2),
(60,4,'',1,4,2),
(61,5,'',1,4,2),
(62,6,'',1,4,2),
(63,7,'',1,4,2),
(64,1,'',1,5,2),
(65,2,'',1,5,2),
(66,3,'',1,5,2),
(67,4,'',1,5,2),
(68,5,'',1,5,2),
(69,6,'',1,5,2),
(70,7,'',1,5,2);

/*Table structure for table `tb_nilai_mapel_utbk` */

DROP TABLE IF EXISTS `tb_nilai_mapel_utbk`;

CREATE TABLE `tb_nilai_mapel_utbk` (
  `id_nilai_mapel_utbk` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_utbk` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_riwayat_isi_utbk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_mapel_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nilai_mapel_utbk` */

insert  into `tb_nilai_mapel_utbk`(`id_nilai_mapel_utbk`,`id_mapel_utbk`,`nilai`,`id_siswa`,`id_riwayat_isi_utbk`) values 
(17,7,'68',1,5),
(18,8,'98',1,5),
(19,9,'78',1,5),
(20,10,'66',1,5),
(21,7,'80',1,6),
(22,8,'80',1,6),
(23,9,'80',1,6),
(24,10,'80',1,6),
(25,7,'76',1,7),
(26,8,'76',1,7),
(27,9,'76',1,7),
(28,10,'76',1,7);

/*Table structure for table `tb_pendukung_rapor` */

DROP TABLE IF EXISTS `tb_pendukung_rapor`;

CREATE TABLE `tb_pendukung_rapor` (
  `id_pendukung_rapor` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
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
  `id_riwayat_isi_rapor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pendukung_rapor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pendukung_rapor` */

insert  into `tb_pendukung_rapor`(`id_pendukung_rapor`,`id_siswa`,`jur_1`,`kampus_1`,`jur_2`,`kampus_2`,`jur_3`,`kampus_3`,`good_mapel`,`bad_mapel`,`status`,`tgl_create`,`id_riwayat_isi_rapor`) values 
(1,1,'jjh','ddd','uuy','dr','gg','ytr','uuu','kjnj','sudah','2019-12-09 10:15:29',1),
(2,1,'jhhh','ds','jjh','lkj','gg','ggg','tre','ee','sudah','2019-12-09 10:16:04',2);

/*Table structure for table `tb_pendukung_utbk` */

DROP TABLE IF EXISTS `tb_pendukung_utbk`;

CREATE TABLE `tb_pendukung_utbk` (
  `id_pendukung_utbk` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
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
  `id_riwayat_isi_utbk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pendukung_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pendukung_utbk` */

insert  into `tb_pendukung_utbk`(`id_pendukung_utbk`,`id_siswa`,`jur_1`,`kampus_1`,`jur_2`,`kampus_2`,`jur_3`,`kampus_3`,`good_mapel`,`bad_mapel`,`status`,`tgl_create`,`id_riwayat_isi_utbk`) values 
(1,1,'gg','sss','ff','gg','hhh','ff','yyt','nh','sudah','2019-12-09 11:23:35',5),
(2,1,'f','ss','ff','ff','ff','ff','ff','ff','sudah','2019-12-09 11:59:12',6),
(3,1,'p','p','p','p','p','p','p','p','sudah','2019-12-09 12:03:23',7);

/*Table structure for table `tb_pertanyaan` */

DROP TABLE IF EXISTS `tb_pertanyaan`;

CREATE TABLE `tb_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_soal` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `tgl_create` datetime NOT NULL,
  PRIMARY KEY (`id_pertanyaan`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pertanyaan` */

insert  into `tb_pertanyaan`(`id_pertanyaan`,`id_kategori_soal`,`pertanyaan`,`tgl_create`) values 
(1,2,'Saya suka bercerita, termasuk cerita dongeng dan cerita yang lucu. ','2019-12-08 03:48:36'),
(2,2,'Saya memiliki ingatan yang baik untuk hal-hal yang sepele','2019-12-08 03:48:43'),
(4,2,'Saya menyukai permainan katakata (seperti scrabble dan puzzle).','2019-12-08 03:49:19'),
(5,2,'Saya membaca buku hanya sebagai hobi.','2019-12-08 03:49:34'),
(6,2,'Saya seorang pembicara yang baik (hampir setiap waktu).','2019-12-08 03:49:47'),
(7,2,'Dalam berargumentasi, saya cenderung menggunakan kata-kata sindiran.','2019-12-08 03:50:03'),
(8,2,'Saya senang membicarakan dan menulis ide-ide saya.','2019-12-08 03:50:15'),
(9,2,'Jika saya harus mengingat sesuatu, saya menciptakan irama-irama atau kata-kata yang membantu saya untuk mengingatnya.','2019-12-08 03:50:34'),
(10,2,'Jika sesuatu rusak dan tidak berfungsi, saya akan membaca buku panduannya terlebih dahulu.','2019-12-08 03:50:49'),
(11,2,'Dalam kerja kelompok (untuk menyiapkan sebuah presentasi), saya lebih memilih untuk menulis dan melakukan riset pustaka.','2019-12-08 03:51:06'),
(12,3,'Saya sangat menikmati pelajaran matematika.','2019-12-08 03:51:23'),
(13,3,'Saya menyukai permainan yang menggunakan logika, seperti tekateki angka. ','2019-12-08 03:51:33'),
(14,3,'Dapat memecahkan soal-soal hitungan adalah hal yang menyenangkan bagi saya. ','2019-12-08 03:51:46'),
(15,3,'Jika saya harus mengingat sesuatu, saya cenderung menempatkan\r\nsetiap kejadian dalam urutan yang logis.','2019-12-08 03:52:07'),
(16,3,'Saya senang mencari tahu bagaimana cara kerja setiap benda','2019-12-08 03:52:18'),
(17,3,'Saya menyukai komputer dan berbagai permainan angka-angka.','2019-12-08 03:52:29'),
(18,3,'Saya suka bermain catur, checkers, atau monopoli.','2019-12-08 03:52:40'),
(19,3,'Dalam berargumentasi, saya mencoba mencari solusi yang adil\r\ndan logis.','2019-12-08 03:52:52'),
(20,3,'Jika sesuatu rusak dan tidak berfungsi, saya melihat bagian-bagiannya (atau komponenkomponennya) dan mencari tahu bagaimana cara kerjanya.','2019-12-08 03:53:12'),
(21,3,'Dalam kerja kelompok, saya lebih memilih membuat diagram dan grafik.','2019-12-08 03:53:25'),
(22,4,'Saya lebih memilih peta daripada petunjuk tertulis dalam mencari\r\nsebuah alamat.','2019-12-08 03:53:58'),
(23,4,'Saya sering melamun. ','2019-12-08 03:54:08'),
(24,4,'Saya menikmati hobi saya dalam dalam bidang fotografi.','2019-12-08 03:54:22'),
(25,4,'Saya senang menggambar dan menciptakan sesuatu.','2019-12-08 03:54:47'),
(26,4,'Jika saya harus mengingat sesuatu, saya menggambar diagram untuk membantu saya mengingatnya.','2019-12-08 03:55:04'),
(27,4,'Saya senang membuat coretancoretan di kertas kapan pun saya\r\nbisa.','2019-12-08 03:55:14'),
(28,4,'Ketika membaca majalah, saya lebih suka melihat gambar-gambarnya daripada membaca teksnya.','2019-12-08 03:55:34'),
(29,4,'Dalam berargumentasi, saya mencoba menjaga jarak, tetap\r\nberdiam diri, atau memvisualisasikan beberapa solusi.','2019-12-08 03:55:49'),
(30,4,'Jika sesuatu rusak dan tidak berfungsi, saya cenderung\r\nmempelajari diagram mengenai cara kerjanya.','2019-12-08 03:56:08'),
(31,4,'Dalam kerja kelompok, saya lebih memilih menggambar hal-hal yang penting.','2019-12-08 03:56:24'),
(32,5,'Sejak suka berolahraga, senam menjadi olah raga favorit saya.','2019-12-08 03:56:46'),
(33,5,'Saya menyukai kegiatan-kegiatan seperti pertukangan, menjahit dan membuat bentuk-bentuk.','2019-12-08 03:57:02'),
(34,5,'Ketika melihat benda-benda, saya senang menyentuhnya.','2019-12-08 03:57:18'),
(35,5,'Saya tidak dapat duduk diam dalam waktu yang lama','2019-12-08 03:57:29'),
(36,5,'Saya menggunakan banyak gerakan tubuh ketika berbicara.','2019-12-08 03:57:40'),
(37,5,'Jika saya harus mengingat sesuatu, saya menuliskannya berkali-kali sampai saya memahaminya.','2019-12-08 03:57:56'),
(38,5,'Saya cenderung mengetuk-ngetuk jari saya atau memainkan pena/pensil selama jam pelajaran.','2019-12-08 03:58:12'),
(39,5,'Dalam berargumentasi,saya cenderung menyerang atau menghindarinya.','2019-12-08 03:58:30'),
(40,5,'Jika sesuatu rusak dan tidak berfungsi, saya cenderung memisahkan setiap bagian lalu menggabungkannya kembali.','2019-12-08 03:58:47'),
(41,5,'Dalam kerja kelompok, saya lebih memilih memindahkan barang atau membuat suatu bentuk.','2019-12-08 03:59:00'),
(42,6,'Saya senang mendengarkan musik dan radio.','2019-12-08 03:59:25'),
(43,6,'Saya cenderung bersenandung ketika sedang bekerja.','2019-12-08 03:59:38'),
(44,6,'Saya suka bernyanyi. ','2019-12-08 03:59:51'),
(45,6,'Saya bisa memainkan salah satu alat musik dengan baik.','2019-12-08 04:00:04'),
(46,6,'Saya suka mendengarkan musik sambil belajar atau sambil membaca buku.','2019-12-08 04:00:17'),
(47,6,'Jika saya harus mengingat sesuatu, saya mencoba untuk membuat irama tentang hal tersebut.','2019-12-08 04:00:33'),
(48,6,'Dalam berargumentasi, saya cenderung berteriak atau memukul (meja/ benda) atau bergerak dalam suatu irama.','2019-12-08 04:00:49'),
(49,6,'Saya bisa menghafal nada-nada dari banyak lagu.','2019-12-08 04:01:02'),
(50,6,'Jika sesuatu rusak dan tidak berfungsi, saya cenderung\r\nmengetuk-ngetuk jari saya membentuk suatu irama sambil mencari jalan keluar.','2019-12-08 04:01:23'),
(51,6,'Dalam kerja kelompok, saya lebih suka menggunakan kata-kata\r\nbaru pada nada atau musik yang sudah dikenal.','2019-12-08 04:01:41'),
(52,7,'Saya mampu bergaul baik dengan orang lain.','2019-12-08 04:02:12'),
(53,7,'Saya senang berkumpul dan berorganisasi.','2019-12-08 04:02:23'),
(54,7,'Saya mempunyai beberapa teman dekat.','2019-12-08 04:02:41'),
(55,7,'Saya suka membantu mengajar murid-murid lain.','2019-12-08 04:02:51'),
(56,7,'Saya senang bekerja sama dalam kelompok.','2019-12-08 04:03:02'),
(57,7,'Teman-teman sering meminta saran dari saya karena saya terlihat sebagai pemimpin alamiah.','2019-12-08 04:03:16'),
(58,7,'Jika saya harus mengingat sesuatu, saya meminta seseorang untuk menguji saya apakah saya sudah memahaminya.','2019-12-08 04:03:35'),
(59,7,'Dalam berargumentasi, saya cenderung meminta bantuan teman atau pihak- pihak yang memiliki otoritas (ahli) dalam bidang tersebut.','2019-12-08 04:03:51'),
(60,7,'Jika sesuatu rusak dan tidak berfungsi, saya mencari seseorang yang dapat menolong saya.','2019-12-08 04:04:05'),
(61,7,'Dalam kerja kelompok, saya lebih memilih mengatur tugas dalam\r\nkelompok.','2019-12-08 04:04:17'),
(62,8,'Saya suka bekerja sendirian tanpa ada gangguan orang lain.','2019-12-08 04:04:40'),
(63,8,'Saya suka menulis buku harian. ','2019-12-08 04:04:48'),
(64,8,'Saya menyukai diri saya (hampir setiap waktu).','2019-12-08 04:05:00'),
(65,8,'Saya tidak suka keramaian.','2019-12-08 04:05:08'),
(66,8,'Saya tahu kelebihan dan kekurangan diri saya.','2019-12-08 04:05:19'),
(67,8,'Saya memiliki tekad yang kuat, mandiri dan berpendirian kuat (tidak mudah ikut-ikutan orang lain). ','2019-12-08 04:05:35'),
(68,8,'Jika saya harus mengingat sesuatu saya cenderung\r\nmenutup mata saya dan mendalami (merasakan) situasi yang sedang terjadi.','2019-12-08 04:05:51'),
(69,8,'Dalam berargumentasi, saya biasanya menghindar (keluar\r\nruangan) hingga saya dapat menenangkan diri.','2019-12-08 04:06:04'),
(70,8,'Jika sesuatu rusak dan tidak berfungsi, saya mempertimbangkan apakah benda tersebut layak untuk diperbaiki.','2019-12-08 04:06:21'),
(71,8,'Dalam kerja kelompok, saya senang mengkontribusikan sesuatu yang unik berdasarkan apa yang saya miliki dan rasakan.','2019-12-08 04:06:37'),
(72,9,'Saya sangat memperhatikan sekeliling dan apa yang sedang terjadi di sekitar saya.','2019-12-08 04:07:00'),
(73,9,'Saya senang berjalan-jalan di hutan (atau taman) dan melihat-lihat pohon serta bunga','2019-12-08 04:07:23'),
(74,9,'Saya senang berkebun.','2019-12-08 04:07:35'),
(75,9,'Saya suka mengoleksi barangbarang seperti batu-batuan, kartu\r\nolahraga, perangko, dsb.','2019-12-08 04:07:45'),
(76,9,'Ketika dewasa, saya ingin pergi dari kota yang ramai ke tempat yang masih alamiah untuk menikmati alam. ','2019-12-08 04:08:01'),
(77,9,'Jika saya harus mengingat sesuatu, saya cenderung mengkategorikannya dalam kelompok-kelompok.','2019-12-08 04:08:15'),
(78,9,'Saya senang mempelajari namanama makhluk hidup di lingkungan\r\ntempat saya berada, seperti bunga dan pohon.','2019-12-08 04:08:27'),
(79,9,'Dalam berargumentasi, saya cenderung membandingkan lawan saya dengan seseorang atau sesuatu yang pernah saya baca atau dengar lalu bereaksi.','2019-12-08 04:08:46'),
(80,9,'Jika sesuatu rusak dan tidak berfungsi, saya memperhatikan sekeliling saya untuk melihat apa yang bisa saya temukan untuk memperbaikinya.','2019-12-08 04:09:02'),
(81,9,'Dalam kerja kelompok, saya lebih memilih mengatur dan mengelompokkan informasi dalam kategori-kategori sehingga mudah dimengerti.','2019-12-08 04:09:19');

/*Table structure for table `tb_riwayat_isi_rapor` */

DROP TABLE IF EXISTS `tb_riwayat_isi_rapor`;

CREATE TABLE `tb_riwayat_isi_rapor` (
  `id_riwayat_isi_rapor` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_isi` datetime DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_isi_rapor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_riwayat_isi_rapor` */

insert  into `tb_riwayat_isi_rapor`(`id_riwayat_isi_rapor`,`tgl_isi`,`id_siswa`) values 
(1,'2019-12-09 10:15:29',1),
(2,'2019-12-09 10:16:04',1);

/*Table structure for table `tb_riwayat_isi_utbk` */

DROP TABLE IF EXISTS `tb_riwayat_isi_utbk`;

CREATE TABLE `tb_riwayat_isi_utbk` (
  `id_riwayat_isi_utbk` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_isi` datetime DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_riwayat_isi_utbk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_riwayat_isi_utbk` */

insert  into `tb_riwayat_isi_utbk`(`id_riwayat_isi_utbk`,`tgl_isi`,`id_siswa`) values 
(5,'2019-12-09 11:23:35',1),
(6,'2019-12-09 11:59:12',1),
(7,'2019-12-09 12:03:23',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`id_siswa`,`nama_siswa`,`tempat_lahir`,`tgl_lahir`,`id_jk`,`id_agama`,`id_sekolah`,`alamat`,`nisn`,`email`,`no_hp`,`id_kategori_sma`,`id_kategori_utbk`) values 
(1,'arief','bandar lampung','2019-12-04',1,3,2,'test','15432','arief@mail.com','98766',1,NULL),
(2,'ridho','bandar lampung','0000-00-00',1,3,2,'test','15433','ridho@mail.com','98766',1,2),
(3,'Okta Pilopa','Bandar Lampung','1992-10-27',1,3,2,'jl test','764552','okta@mail.com','0974567',2,NULL),
(4,'Danzen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'danzen@mail.com',NULL,NULL,NULL),
(5,'Adam',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'adam@mail.com',NULL,NULL,NULL);

/*Table structure for table `tb_status_kelengkapan` */

DROP TABLE IF EXISTS `tb_status_kelengkapan`;

CREATE TABLE `tb_status_kelengkapan` (
  `id_status_kelengkapan` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_status_kelengkapan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_status_kelengkapan` */

insert  into `tb_status_kelengkapan`(`id_status_kelengkapan`,`id_siswa`,`kategori`,`status`,`tgl_create`) values 
(1,1,'profil','sudah','2019-12-09 10:11:09'),
(2,1,'password','sudah','2019-12-09 10:11:14'),
(3,1,'rapor','sudah','2019-12-09 10:15:29'),
(6,1,'utbk','sudah','2019-12-09 11:23:35');

/*Table structure for table `tb_status_pengisian_nilai` */

DROP TABLE IF EXISTS `tb_status_pengisian_nilai`;

CREATE TABLE `tb_status_pengisian_nilai` (
  `id_status_pengisian_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_create` datetime NOT NULL,
  `rasionalisasi` text NOT NULL,
  `id_riwayat_isi_rapor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_status_pengisian_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_status_pengisian_nilai` */

insert  into `tb_status_pengisian_nilai`(`id_status_pengisian_nilai`,`id_siswa`,`kategori`,`status`,`tgl_create`,`rasionalisasi`,`id_riwayat_isi_rapor`) values 
(1,1,'rapor','rasionalisasi','2019-12-09 10:17:16','ini rasionalisasi 2',1),
(2,1,'rapor','rasionalisasi','2019-12-09 10:17:01','ini rasionalisasi 1',2),
(3,1,'utbk','rasionalisasi','2019-12-09 12:16:11','ras 1',5),
(4,1,'utbk','rasionalisasi','2019-12-09 12:13:13','',6),
(5,1,'utbk','rasionalisasi','2019-12-09 12:13:13','',7);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`level`) values 
(1,'okta@mail.com','1','siswa'),
(2,'admin@mail.com','adminku','admin'),
(3,'arief@mail.com','1','siswa'),
(4,'danzen@mail.com',NULL,'siswa'),
(5,'adam@mail.com',NULL,'siswa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
