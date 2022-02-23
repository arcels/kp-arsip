-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 07:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `asistens`
--

CREATE TABLE `asistens` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sk` int(10) UNSIGNED NOT NULL,
  `as_no` int(11) NOT NULL,
  `as_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `as_nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `as_prodi` int(10) UNSIGNED NOT NULL,
  `as_makul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `as_kelas` int(11) NOT NULL,
  `as_semester` int(11) NOT NULL,
  `as_tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `as_status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customs`
--

CREATE TABLE `customs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sk` int(10) UNSIGNED NOT NULL,
  `c_no` int(11) NOT NULL,
  `m_isi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `as_status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customs`
--

INSERT INTO `customs` (`id`, `id_sk`, `c_no`, `m_isi`, `as_status`, `updated_at`, `created_at`) VALUES
(1, 2, 1, '<p>blablbla</p>', '0', '2020-09-02', '2020-09-02'),
(2, 3, 2, NULL, '0', '2020-09-02', '2020-09-02'),
(3, 4, 1, NULL, '0', '2020-09-02', '2020-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` int(10) UNSIGNED NOT NULL,
  `dosen_nidn` int(11) NOT NULL,
  `dosen_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `prodi_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `dosen_nidn`, `dosen_nama`, `dosen_email`, `dosen_jabatan`, `dosen_status`, `updated_at`, `created_at`, `prodi_id`) VALUES
(1, 8987123, 'Bambang Setyo', 'pwlcoba@gmail.com', 'Dekan', '1', '2020-08-24', '2020-08-24', 1),
(2, 8987122, 'Tarno', 'dhaliarismawati@student.ukrimuniversity.ac.id', 'Dosen', '0', '2020-09-21', '2020-08-24', 1),
(3, 89182, 'Vera', 'vera@ukrimuniversity.ac.id', 'Dekan', '1', '2020-08-24', '2020-08-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `d_surat_masuks`
--

CREATE TABLE `d_surat_masuks` (
  `id` int(10) UNSIGNED NOT NULL,
  `sm_id` int(10) UNSIGNED NOT NULL,
  `sm_dosen` int(10) UNSIGNED NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d_surat_masuks`
--

INSERT INTO `d_surat_masuks` (`id`, `sm_id`, `sm_dosen`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2020-08-24', '2020-08-24'),
(2, 2, 1, '2020-08-24', '2020-08-24'),
(3, 3, 2, '2020-09-07', '2020-09-07'),
(4, 6, 2, '2020-09-07', '2020-09-07'),
(5, 7, 1, '2020-09-19', '2020-09-19'),
(6, 11, 1, '2020-09-24', '2020-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_surats`
--

CREATE TABLE `kategori_surats` (
  `id` int(10) UNSIGNED NOT NULL,
  `ks_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ks_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ks_status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kerja_prakteks`
--

CREATE TABLE `kerja_prakteks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sk` int(10) UNSIGNED NOT NULL,
  `kp_no` int(11) NOT NULL,
  `kp_hal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kp_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kp_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kp_nim` int(11) NOT NULL,
  `kp_mulai` date NOT NULL,
  `kp_selesai` date NOT NULL,
  `kp_status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kerja_prakteks`
--

INSERT INTO `kerja_prakteks` (`id`, `id_sk`, `kp_no`, `kp_hal`, `kp_perusahaan`, `kp_mahasiswa`, `kp_nim`, `kp_mulai`, `kp_selesai`, `kp_status`, `updated_at`, `created_at`) VALUES
(1, 5, 1, 'Permohonan Kerja Praktek', 'PT Sinarmas Financial', 'Marcelino Dwi Kurniantono', 1742101510, '2020-08-01', '2020-09-01', '1', '2020-09-24', '2020-09-24'),
(2, 6, 2, 'Permohonan Kerja Praktek', 'PT Pertamina', 'Stefani', 1742101511, '2020-07-01', '2020-09-01', '1', '2020-09-24', '2020-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_07_12_143715_create_users_table', 1),
(2, '2020_07_12_143750_create_prodis_table', 1),
(3, '2020_07_12_143803_create_dosens_table', 1),
(4, '2020_07_26_155054_create_suratmasuks_table', 1),
(5, '2020_07_26_155852_create_dsuratmasuks_table', 1),
(6, '2020_08_08_154721_create_kategorisurats_table', 1),
(7, '2020_08_10_144953_create_suratkeluars_table', 1),
(8, '2020_08_13_005208_create_kerjaprakteks_table', 1),
(9, '2020_08_18_180430_create_asistens_table', 1),
(10, '2020_08_19_193018_create_skaktifs_table', 1),
(11, '2020_08_20_182320_create_customs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prodis`
--

CREATE TABLE `prodis` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodi_kode` int(11) NOT NULL,
  `prodi_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi_status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodis`
--

INSERT INTO `prodis` (`id`, `prodi_kode`, `prodi_nama`, `prodi_status`, `updated_at`, `created_at`) VALUES
(1, 41321, 'Fisika', '1', '2020-09-19', '2020-08-24'),
(2, 413212, 'Informatika', '0', '2020-09-02', '2020-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `skaktifs`
--

CREATE TABLE `skaktifs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sk` int(10) UNSIGNED NOT NULL,
  `m_no` int(11) NOT NULL,
  `m_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_prodi` int(10) UNSIGNED NOT NULL,
  `m_tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_keperluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `as_status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skaktifs`
--

INSERT INTO `skaktifs` (`id`, `id_sk`, `m_no`, `m_mahasiswa`, `m_nim`, `m_prodi`, `m_tahun`, `m_alamat`, `m_keperluan`, `as_status`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 'Marcelino Dwi K', '1742101510', 1, 'Gasar 2020/2021', 'Jln. Menteri Supeno', 'Surat Keterangan ini dipergunakan untuk memperpanjanga KTM.', '1', '2020-08-24', '2020-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluars`
--

CREATE TABLE `surat_keluars` (
  `id` int(10) UNSIGNED NOT NULL,
  `sk_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sk_kpj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sk_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sk_tgl` date NOT NULL,
  `sk_penanggungjawab` int(10) UNSIGNED NOT NULL,
  `sk_kepada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sk_status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sk_upload` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_keluars`
--

INSERT INTO `surat_keluars` (`id`, `sk_kode`, `sk_kpj`, `sk_title`, `sk_tgl`, `sk_penanggungjawab`, `sk_kepada`, `sk_status`, `sk_upload`, `updated_at`, `created_at`) VALUES
(1, 'SKA-M', 'KTI', 'Surat Keterangan Aktif', '2020-08-24', 1, 'Marcelino Dwi K', '1', '', '2020-08-24', '2020-08-24'),
(2, 'Akd', 'D', 'Kelulusan', '2020-09-02', 1, 'Seluruh Mahasiswa Fiskom', '0', '', '2020-09-02', '2020-09-02'),
(3, 'Akd', NULL, 'Pemberitahuan TAS', '2020-09-02', 1, 'HRD PT Sinarmas Financial', '0', '', '2020-09-02', '2020-09-02'),
(4, 'umum', 'D', 'Surat Undangan Rapat', '2020-09-02', 1, 'Dosen FISKOM', '0', '', '2020-09-02', '2020-09-02'),
(5, 'KP', '', 'Surat Kerja Praktek', '2020-09-24', 1, 'HRD PT Sinarmas Financial', '0', '', '2020-09-24', '2020-09-24'),
(6, 'KP', '', 'Surat Kerja Praktek', '2020-09-24', 1, 'HRD PT Pertamina', '0', '', '2020-09-24', '2020-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuks`
--

CREATE TABLE `surat_masuks` (
  `id` int(10) UNSIGNED NOT NULL,
  `sm_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sm_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sm_upload` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sm_tgl` date NOT NULL,
  `sm_status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_masuks`
--

INSERT INTO `surat_masuks` (`id`, `sm_kode`, `sm_keterangan`, `sm_upload`, `sm_tgl`, `sm_status`, `updated_at`, `created_at`) VALUES
(1, '120', 'Surat Keterangan Masuk', '1598234782.jpg', '2020-08-24', '1', '2020-08-24', '2020-08-24'),
(2, '78', 'Surat Keterangan Masuk', '1598243864.jpg', '2020-08-24', '1', '2020-08-24', '2020-08-24'),
(3, '99', 'HAY', '1599453359.png', '2020-09-07', '1', '2020-09-07', '2020-09-07'),
(6, '12312', 'Surat Keterangan Masuk', '1599453520.png', '2020-09-07', '1', '2020-09-07', '2020-09-07'),
(7, '1212', 'Surat Keterangan Masuk', '1600486381.png', '2020-09-19', '1', '2020-09-19', '2020-09-19'),
(11, '3324', 'Surat Tugas', '1600924177.jpg', '2020-09-24', '1', '2020-09-24', '2020-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_pengguna`, `password`, `user_email`, `user_status`, `user_role`, `updated_at`, `created_at`) VALUES
(1, '8987123', 'Bambang Setyo', '$2y$10$dPGtmQRuW.Gnm0P997xnL.bPhmY7H9gytiSoSErEzQebKMASzsgXS', 'pwlcoba@gmail.com', '0', 'Dekan', '2020-09-24', '2020-08-24'),
(2, '89182', 'Vera', '$2y$10$vmJje5WX8ASBY68NxgbolO1s2leG9EUQfQi148qu4IPyPj.pp9PDK', 'vera@ukrimuniversity.ac.id', '1', 'Dekan', '2020-08-24', '2020-08-24'),
(3, '1', 'admin', '$2y$10$/H8R/iDwC.k5.G0llJloje/msNFb/75/tZwoe95WzBcXoswa2rWne', 'pwlcoba@gmail.com', '1', 'Admin', '2020-08-31', '2020-08-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asistens`
--
ALTER TABLE `asistens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asistens_id_sk_foreign` (`id_sk`),
  ADD KEY `asistens_as_prodi_foreign` (`as_prodi`);

--
-- Indexes for table `customs`
--
ALTER TABLE `customs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customs_id_sk_foreign` (`id_sk`);

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosens_dosen_nidn_unique` (`dosen_nidn`),
  ADD KEY `dosens_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `d_surat_masuks`
--
ALTER TABLE `d_surat_masuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d_surat_masuks_sm_id_foreign` (`sm_id`),
  ADD KEY `d_surat_masuks_sm_dosen_foreign` (`sm_dosen`);

--
-- Indexes for table `kategori_surats`
--
ALTER TABLE `kategori_surats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_surats_ks_kode_unique` (`ks_kode`);

--
-- Indexes for table `kerja_prakteks`
--
ALTER TABLE `kerja_prakteks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kerja_prakteks_id_sk_foreign` (`id_sk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skaktifs`
--
ALTER TABLE `skaktifs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skaktifs_id_sk_foreign` (`id_sk`),
  ADD KEY `skaktifs_m_prodi_foreign` (`m_prodi`);

--
-- Indexes for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_keluars_sk_penanggungjawab_foreign` (`sk_penanggungjawab`);

--
-- Indexes for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `surat_masuks_sm_kode_unique` (`sm_kode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asistens`
--
ALTER TABLE `asistens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customs`
--
ALTER TABLE `customs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `d_surat_masuks`
--
ALTER TABLE `d_surat_masuks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_surats`
--
ALTER TABLE `kategori_surats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kerja_prakteks`
--
ALTER TABLE `kerja_prakteks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skaktifs`
--
ALTER TABLE `skaktifs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asistens`
--
ALTER TABLE `asistens`
  ADD CONSTRAINT `asistens_as_prodi_foreign` FOREIGN KEY (`as_prodi`) REFERENCES `prodis` (`id`),
  ADD CONSTRAINT `asistens_id_sk_foreign` FOREIGN KEY (`id_sk`) REFERENCES `surat_keluars` (`id`);

--
-- Constraints for table `customs`
--
ALTER TABLE `customs`
  ADD CONSTRAINT `customs_id_sk_foreign` FOREIGN KEY (`id_sk`) REFERENCES `surat_keluars` (`id`);

--
-- Constraints for table `dosens`
--
ALTER TABLE `dosens`
  ADD CONSTRAINT `dosens_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodis` (`id`);

--
-- Constraints for table `d_surat_masuks`
--
ALTER TABLE `d_surat_masuks`
  ADD CONSTRAINT `d_surat_masuks_sm_dosen_foreign` FOREIGN KEY (`sm_dosen`) REFERENCES `dosens` (`id`),
  ADD CONSTRAINT `d_surat_masuks_sm_id_foreign` FOREIGN KEY (`sm_id`) REFERENCES `surat_masuks` (`id`);

--
-- Constraints for table `kerja_prakteks`
--
ALTER TABLE `kerja_prakteks`
  ADD CONSTRAINT `kerja_prakteks_id_sk_foreign` FOREIGN KEY (`id_sk`) REFERENCES `surat_keluars` (`id`);

--
-- Constraints for table `skaktifs`
--
ALTER TABLE `skaktifs`
  ADD CONSTRAINT `skaktifs_id_sk_foreign` FOREIGN KEY (`id_sk`) REFERENCES `surat_keluars` (`id`),
  ADD CONSTRAINT `skaktifs_m_prodi_foreign` FOREIGN KEY (`m_prodi`) REFERENCES `prodis` (`id`);

--
-- Constraints for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
  ADD CONSTRAINT `surat_keluars_sk_penanggungjawab_foreign` FOREIGN KEY (`sk_penanggungjawab`) REFERENCES `dosens` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
