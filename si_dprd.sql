-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2021 pada 14.08
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

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
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `anggota_id` int(11) NOT NULL,
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
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`anggota_id`, `anggota_nama`, `anggota_jabatan`, `anggota_tempatlhr`, `anggota_tgllhr`, `partai_id`, `anggota_pasangan`, `anggota_pekerjaan`, `anggota_alamat`, `anggota_nohp`, `anggota_email`, `anggota_anak`, `anggota_ktp`, `anggota_npwp`, `anggota_bpjs`, `created_at`, `updated_at`) VALUES
(2, 'jasdfklasd', 'fasdfs', 'sdfsf', '1994-06-08', 1, 'sdfs', 'fsdfsd', 'tegal catak no.638 warungboto, umbulharjo, yogyakarta', '0895421735441', 'bertojunikrisnanto@gmail.com', 3, 'C:\\xampp\\tmp\\php2845.tmp', 'C:\\xampp\\tmp\\php2846.tmp', '22', '2021-11-24 06:39:06', '2021-11-24 06:42:59'),
(3, 'jasdfklasd132131', 'fasdfs', 'sdfsf', '1997-06-24', 1, 'sdfs', 'fsdfsd', 'tegal catak no.638 warungboto, umbulharjo, yogyakarta', '0895421735441', 'bertojunikrisnanto@gmail.com', 10, 'C:\\xampp\\tmp\\php2BA9.tmp', 'C:\\xampp\\tmp\\php2BAA.tmp', '3643131313', '2021-11-24 06:45:11', '2021-11-24 06:45:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partai`
--

CREATE TABLE `partai` (
  `partai_id` int(11) NOT NULL,
  `partai_nama` varchar(50) NOT NULL,
  `partai_logo` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `partai`
--

INSERT INTO `partai` (`partai_id`, `partai_nama`, `partai_logo`, `created_at`, `updated_at`) VALUES
(1, 'pdi', 'uploads/partai/pdi-1637726656.png', '2021-11-24 04:04:16', '2021-11-24 04:04:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `pg_id` int(11) NOT NULL,
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
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppt`
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indeks untuk tabel `partai`
--
ALTER TABLE `partai`
  ADD PRIMARY KEY (`partai_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indeks untuk tabel `ppt`
--
ALTER TABLE `ppt`
  ADD PRIMARY KEY (`ppt_id`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `partai`
--
ALTER TABLE `partai`
  MODIFY `partai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ppt`
--
ALTER TABLE `ppt`
  MODIFY `ppt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
