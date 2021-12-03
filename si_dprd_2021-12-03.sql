# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.21-MariaDB)
# Database: si_dprd
# Generation Time: 2021-12-03 16:58:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table anggota
# ------------------------------------------------------------

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `anggota_id` int(11) NOT NULL AUTO_INCREMENT,
  `anggota_nama` varchar(50) NOT NULL,
  `anggota_jabatan` varchar(50) NOT NULL,
  `anggota_tempatlhr` varchar(255) NOT NULL,
  `anggota_tgllhr` date NOT NULL,
  `partai_id` int(11) NOT NULL,
  `anggota_pasangan` varchar(50) NOT NULL,
  `anggota_pekerjaan` varchar(255) NOT NULL,
  `anggota_alamat` text NOT NULL,
  `anggota_nohp` varchar(20) NOT NULL,
  `anggota_email` varchar(50) NOT NULL,
  `anggota_anak` int(11) NOT NULL,
  `anggota_ktp` varchar(255) NOT NULL,
  `anggota_npwp` varchar(255) NOT NULL,
  `anggota_bpjs` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`anggota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `anggota` WRITE;
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;

INSERT INTO `anggota` (`anggota_id`, `anggota_nama`, `anggota_jabatan`, `anggota_tempatlhr`, `anggota_tgllhr`, `partai_id`, `anggota_pasangan`, `anggota_pekerjaan`, `anggota_alamat`, `anggota_nohp`, `anggota_email`, `anggota_anak`, `anggota_ktp`, `anggota_npwp`, `anggota_bpjs`, `created_at`, `updated_at`)
VALUES
	(2,'jasdfklasd','fasdfs','sdfsf','1994-06-08',1,'sdfs','fsdfsd','tegal catak no.638 warungboto, umbulharjo, yogyakarta','0895421735441','bertojunikrisnanto@gmail.com',3,'C:\\xampp\\tmp\\php2845.tmp','C:\\xampp\\tmp\\php2846.tmp','22','2021-11-24 06:39:06','2021-11-24 06:42:59'),
	(7,'Andri Nur','Mahasiswa','Bantul','2000-01-13',1,'Ivo','Developers','Jl. Bantul','087838698443','andribis13@gmail.com',2,'uploads/anggota/ktp_a2710ad255067d1a45fbfbc3daf2e356_1638363563.png','uploads/anggota/npwp_a2710ad255067d1a45fbfbc3daf2e356_1638363563.png','uploads/anggota/bpjs_a2710ad255067d1a45fbfbc3daf2e356_1638363563.png','2021-12-01 12:59:23','2021-12-01 13:27:58');

/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table partai
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partai`;

CREATE TABLE `partai` (
  `partai_id` int(11) NOT NULL AUTO_INCREMENT,
  `partai_nama` varchar(50) NOT NULL,
  `partai_logo` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`partai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `partai` WRITE;
/*!40000 ALTER TABLE `partai` DISABLE KEYS */;

INSERT INTO `partai` (`partai_id`, `partai_nama`, `partai_logo`, `created_at`, `updated_at`)
VALUES
	(1,'pdi','uploads/partai/pdi-1637726656.png','2021-11-24 04:04:16','2021-11-24 04:04:16');

/*!40000 ALTER TABLE `partai` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pegawai
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `pg_id` int(11) NOT NULL AUTO_INCREMENT,
  `pg_nip` varchar(50) NOT NULL,
  `pg_nama` varchar(50) NOT NULL,
  `pg_gol` varchar(50) NOT NULL,
  `pg_jabatan` varchar(100) NOT NULL,
  `pg_tempatlhr` varchar(255) NOT NULL,
  `pg_tgllhr` date NOT NULL,
  `pg_status` varchar(50) NOT NULL,
  `pg_pasangan` varchar(50) DEFAULT NULL,
  `pg_anak` int(11) DEFAULT NULL,
  `pg_email` varchar(50) NOT NULL,
  `pg_pendidikan` varchar(50) NOT NULL,
  `pg_kontak` varchar(20) NOT NULL,
  `pg_alamat` text NOT NULL,
  `pg_ktp` varchar(50) NOT NULL,
  `pg_karpeg` varchar(50) NOT NULL,
  `pg_npwp` varchar(50) NOT NULL,
  `pg_bpjs` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`pg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table ppt
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ppt`;

CREATE TABLE `ppt` (
  `ppt_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppt_nama` varchar(50) NOT NULL,
  `ppt_pendidikan` varchar(10) NOT NULL,
  `ppt_tempatlhr` varchar(50) NOT NULL,
  `ppt_tgllhr` date NOT NULL,
  `ppt_alamat` text NOT NULL,
  `ppt_nohp` varchar(20) NOT NULL,
  `ppt_ktp` varchar(255) NOT NULL,
  `ppt_bagian` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`ppt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table surat_masuk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `surat_masuk`;

CREATE TABLE `surat_masuk` (
  `sm_id` int(11) NOT NULL AUTO_INCREMENT,
  `sm_asal` text NOT NULL,
  `sm_no` varchar(128) NOT NULL DEFAULT '',
  `sm_perihal` text NOT NULL,
  `sm_tgl` date NOT NULL,
  `sm_masuk` date NOT NULL,
  `sm_tujuan` text NOT NULL,
  `sm_penerima` varchar(128) NOT NULL DEFAULT '',
  `sm_desc` text NOT NULL,
  `sm_file` varchar(128) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`sm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `surat_masuk` WRITE;
/*!40000 ALTER TABLE `surat_masuk` DISABLE KEYS */;

INSERT INTO `surat_masuk` (`sm_id`, `sm_asal`, `sm_no`, `sm_perihal`, `sm_tgl`, `sm_masuk`, `sm_tujuan`, `sm_penerima`, `sm_desc`, `sm_file`, `created_at`, `updated_at`)
VALUES
	(1,'Pemuda Kampung','456','Peminjaman Ruangan','2021-12-01','2021-11-29','Kepala Bidang Perkap','Bapak Sumardi','Surat ini ditujukan kepada Kepala Bidang Perkap',NULL,'2021-12-01 14:15:25','2021-12-01 14:15:25'),
	(2,'Pemuda Korea Selatan','9028337373','Peminjaman Aula Besar','2021-12-16','2021-12-03','Kepada Bidang Bagian Pengadaan','Bapak Sumardi','Ini adalah surat dengan file yaa oke sip ya','uploads/suratmasuk/836a10e8bb90b9ba65a865131d71012a_1638550212.pdf','2021-12-03 12:36:05','2021-12-03 16:50:12');

/*!40000 ALTER TABLE `surat_masuk` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_pass` varchar(10) NOT NULL,
  `user_level` varchar(50) NOT NULL,
  `user_foto` varchar(255) NOT NULL,
  `user_created` datetime NOT NULL,
  `user_updated` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
