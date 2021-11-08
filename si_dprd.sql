-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 02:51 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_dprd`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `anggota_id` int(11) NOT NULL,
  `anggota_nama` varchar(50) NOT NULL,
  `anggota_jabatan` varchar(50) NOT NULL,
  `anggota_tempatlhr` varchar(255) NOT NULL,
  `anggota_tgllhr` date NOT NULL,
  `anggota_partai` int(11) NOT NULL,
  `anggota_pasangan` varchar(50) NOT NULL,
  `anggota_pekerjaan` varchar(255) NOT NULL,
  `anggota_alamat` text NOT NULL,
  `anggota_nohp` varchar(20) NOT NULL,
  `angggota_email` varchar(50) NOT NULL,
  `anggota_anak` int(11) NOT NULL,
  `anggota_ktp` varchar(255) NOT NULL,
  `anggota_npwp` varchar(255) NOT NULL,
  `anggota_bpjs` varchar(255) NOT NULL,
  `anggota_created` datetime NOT NULL,
  `anggota_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `partai`
--

CREATE TABLE `partai` (
  `partai_id` int(11) NOT NULL,
  `partai_nama` varchar(50) NOT NULL,
  `partai_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pg_id` int(11) NOT NULL,
  `pg_nip` varchar(50) NOT NULL,
  `pg_nama` varchar(50) NOT NULL,
  `pg_gol` varchar(50) NOT NULL,
  `pg_jabatan` varchar(100) NOT NULL,
  `pg_tempatlhr` varchar(255) NOT NULL,
  `pg_tgllhr` datetime NOT NULL,
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
  `pg_created` datetime NOT NULL,
  `pg_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ppt`
--

CREATE TABLE `ppt` (
  `ppt_id` int(11) NOT NULL,
  `ppt_nama` varchar(50) NOT NULL,
  `ppt_pendidikan` varchar(10) NOT NULL,
  `ppt_tempatlhr` varchar(50) NOT NULL,
  `ppt_tgllhr` date NOT NULL,
  `ppt_alamat` text NOT NULL,
  `ppt_nohp` varchar(20) NOT NULL,
  `ppt_ktp` varchar(255) NOT NULL,
  `ppt_bagian` varchar(255) NOT NULL,
  `ppt_created` datetime NOT NULL,
  `ppt_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `sm_id` int(11) NOT NULL,
  `sm_asal` text NOT NULL,
  `sm_no` varchar(50) NOT NULL,
  `sm_perihal` text NOT NULL,
  `sm_tgl` date NOT NULL,
  `sm_masuk` datetime NOT NULL,
  `sm_tujuan` text NOT NULL,
  `sm_penerima` varchar(50) NOT NULL,
  `sm_desc` text NOT NULL,
  `sm_created` datetime NOT NULL,
  `sm_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_pass` varchar(10) NOT NULL,
  `user_level` varchar(50) NOT NULL,
  `user_foto` varchar(255) NOT NULL,
  `user_created` datetime NOT NULL,
  `user_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indexes for table `partai`
--
ALTER TABLE `partai`
  ADD PRIMARY KEY (`partai_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `ppt`
--
ALTER TABLE `ppt`
  ADD PRIMARY KEY (`ppt_id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partai`
--
ALTER TABLE `partai`
  MODIFY `partai_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppt`
--
ALTER TABLE `ppt`
  MODIFY `ppt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
