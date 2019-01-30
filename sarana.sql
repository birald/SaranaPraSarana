-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 01:47 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$FEuRYV3t/D4OwnHih49kZ.mRoSMhFShvvSC0l8oKmyMkSjgulXgCa', '5fv8BUXHnhYvsbgHDrrjGRaf2kUnYMuqaqJZDdlzHd6FNpeXz2DdvekEninv', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kasi`
--

CREATE TABLE `kasi` (
  `id` int(11) NOT NULL,
  `tingkat` enum('paud','sd','smp') NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasi`
--

INSERT INTO `kasi` (`id`, `tingkat`, `username`, `email`, `password`, `nip`, `no_hp`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'paud', 'kasi paud', 'kasipaud@gmail.com', '$2y$10$FEuRYV3t/D4OwnHih49kZ.mRoSMhFShvvSC0l8oKmyMkSjgulXgCa', '874723', '823798237', 'bandung', '1eYf0VBAk5dfSShylqtpNriGFSchZxOxQFs9M4aK1dXQZpv64XevbyjF3nCx', NULL, '2018-11-26 09:51:22'),
(2, 'sd', 'kasi sd', 'kasisd@gmail.com', '$2y$10$FEuRYV3t/D4OwnHih49kZ.mRoSMhFShvvSC0l8oKmyMkSjgulXgCa', '01293', '129312', 'jakarta', 'jsuJncHkwTZD75lSiHhXe35PyC7mYAG4kiFHFN56IGn5bfR46vIRLEhIqC0J', NULL, '2018-12-06 09:12:25'),
(3, 'smp', 'kasi smp', 'kasismp@gmail.com', '$2y$10$FEuRYV3t/D4OwnHih49kZ.mRoSMhFShvvSC0l8oKmyMkSjgulXgCa', '12390', '123', 'aceh', 'EwWm1FZw5UpDnzvcdZL27eYMP0O8pKUyZ7QgbsCxj0K7fm6sPkhOQ2zPcigU', NULL, '2018-12-06 09:12:39'),
(4, 'paud', 'Kasi Paud 2', 'kasipaud2@gmail.com', '$2y$10$aLljG95hg4Fij.qwnwACtO0046iYEVwpRwbH1ZEmuzNHDnOycsQ9G', '1239898', '0852', 'malang', NULL, '2018-11-26 09:42:36', '2018-11-27 10:59:56'),
(5, 'smp', 'kasismp12', 'kasismp12@gmail.com', '$2y$10$pd5rtbauQFH5I7vp0kgpk.8xTSTD4IHBbRExPS3tkOMjXN707q88.', '12312412412', '0812487481', 'Jalan PandanArum No.9/Kav.9 Malang - Jawa Timur', NULL, '2018-12-25 08:05:47', '2018-12-25 08:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `data_id` int(11) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `tingkat` enum('paud','sd','smp') DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_dana`
--

CREATE TABLE `penggunaan_dana` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `dokumen` varchar(100) NOT NULL,
  `dokumen_persetujuan` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_dana`
--

CREATE TABLE `pengiriman_dana` (
  `id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `dokumen` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(220) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `galeri` varchar(200) DEFAULT NULL,
  `dokumen` varchar(100) NOT NULL,
  `jumlah_rusak` int(5) NOT NULL DEFAULT '0',
  `tingkat_rusak` enum('ringan','sedang','berat') NOT NULL DEFAULT 'ringan',
  `rombongan_belajar` varchar(50) DEFAULT '0',
  `jumlah_siswa` int(5) NOT NULL DEFAULT '0',
  `tingkat_sekolah` enum('paud','sd','smp') NOT NULL DEFAULT 'paud',
  `jenis_sekolah` enum('negeri','swasta') NOT NULL DEFAULT 'negeri',
  `status` varchar(50) NOT NULL,
  `dana_diajukan` varchar(50) DEFAULT NULL,
  `dana_total` varchar(50) NOT NULL DEFAULT '0',
  `dana_terpakai` varchar(50) DEFAULT '0',
  `rate` varchar(10) DEFAULT '0',
  `dana_terkirim` varchar(50) NOT NULL DEFAULT '0',
  `status_foto` varchar(50) DEFAULT NULL,
  `status_dokumen` varchar(50) DEFAULT NULL,
  `status_jumlah_rusak` varchar(50) DEFAULT NULL,
  `status_tingkat_rusak` varchar(50) DEFAULT NULL,
  `status_jumlah_siswa` varchar(50) DEFAULT NULL,
  `status_tingkat_sekolah` varchar(50) DEFAULT NULL,
  `status_rombongan_belajar` varchar(50) DEFAULT NULL,
  `status_jenis_sekolah` varchar(50) DEFAULT NULL,
  `tgl_mulai_verifikasi` varchar(10) DEFAULT NULL,
  `tgl_akhir_verifikasi` varchar(10) DEFAULT NULL,
  `dokumen_verifikasi` varchar(200) DEFAULT NULL,
  `dokumen_terima` varchar(200) DEFAULT NULL,
  `dokumen_forward` varchar(200) DEFAULT NULL,
  `pengantar_dinas` varchar(224) NOT NULL,
  `surat_permohonan` varchar(224) NOT NULL,
  `tgl_diverifikasi` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tingkat` enum('paud','sd','smp') NOT NULL,
  `npsn` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `nama_bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `tingkat`, `npsn`, `alamat`, `telepon`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `no_rekening`, `atas_nama`, `nama_bank`) VALUES
(3, 'smpn 01 malang', 'smp', '123', 'malang', '0987', 'smp@gmail.com', '$2y$10$Yg8CQgQ0SuT.O3oO9A/eA.KteBQBTL1qUWvhhJZrbC0hpwGyQ0D9K', 'IkV1Q73LlI8DyuBtCzmlUloeFTxwnj6wP8CuNyKw1gaUulcHV9T4zlAq7dZa', '2018-10-07 03:59:15', '2018-11-26 05:22:05', '123', 'smp', 'bri'),
(4, 'paud 03 malang', 'paud', '213', 'malang', '0987', 'paud@gmail.com', '$2y$10$Yg8CQgQ0SuT.O3oO9A/eA.KteBQBTL1qUWvhhJZrbC0hpwGyQ0D9K', '', '0000-00-00 00:00:00', '2018-11-27 10:54:20', '939434', 'paud', 'bri'),
(5, 'sd 02 malang', 'sd', '321', 'malang', '0987', 'sd@gmail.com', '$2y$10$Yg8CQgQ0SuT.O3oO9A/eA.KteBQBTL1qUWvhhJZrbC0hpwGyQ0D9K', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '321', 'sd', 'bri'),
(6, 'SMPN 12 KOTA SERANG', 'smp', '741571', 'Jalan PandanArum No.9/Kav.9 Malang - Jawa Timur', '6546354', 'smp12@gmail.com', '$2y$10$CWdwQcPQdSFECbM50CA83u7kP0Q7mneINIGbKxOjJdky2PkEfjSsa', NULL, '2018-12-25 08:04:16', '2018-12-25 08:05:13', '878481818', 'SMAN 12 KOTA SERANG', 'Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `tim_verifikasi`
--

CREATE TABLE `tim_verifikasi` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim_verifikasi`
--

INSERT INTO `tim_verifikasi` (`id`, `username`, `email`, `password`, `nip`, `no_hp`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tim verifikasi', 'timverifikasi@gmail.com', '$2y$10$FEuRYV3t/D4OwnHih49kZ.mRoSMhFShvvSC0l8oKmyMkSjgulXgCa', '1237112312312', '1239189238', 'bekasi', 'c3rRVKRXW4YLMqp1qHMxPnUgy7EFb0vqltGsjOM3jJZeICuk3IXBtaozhAIG', NULL, '2018-11-27 11:03:56'),
(2, 'tim verifikasi 2', 'timverifikasi2@gmail.com', '$2y$10$ommNuTh.39t5T6bQTAvT6usedBph3C68s3obluwL3iM2hSpsL.wRO', '0987', '09876', 'jakarta', NULL, '2018-11-26 09:43:17', '2018-11-26 09:43:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasi`
--
ALTER TABLE `kasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_id` (`proposal_id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_id` (`proposal_id`);

--
-- Indexes for table `penggunaan_dana`
--
ALTER TABLE `penggunaan_dana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_id` (`proposal_id`);

--
-- Indexes for table `pengiriman_dana`
--
ALTER TABLE `pengiriman_dana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_id` (`proposal_id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sekolah_id` (`sekolah_id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim_verifikasi`
--
ALTER TABLE `tim_verifikasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kasi`
--
ALTER TABLE `kasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `penggunaan_dana`
--
ALTER TABLE `penggunaan_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengiriman_dana`
--
ALTER TABLE `pengiriman_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tim_verifikasi`
--
ALTER TABLE `tim_verifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_ibfk_1` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penggunaan_dana`
--
ALTER TABLE `penggunaan_dana`
  ADD CONSTRAINT `penggunaan_dana_ibfk_1` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman_dana`
--
ALTER TABLE `pengiriman_dana`
  ADD CONSTRAINT `pengiriman_dana_ibfk_1` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
