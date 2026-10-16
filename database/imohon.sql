-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2026 at 08:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imohon`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_10_010435_create_permohonans_table', 1),
(5, '2026_09_21_013024_create_peralatans_table', 1),
(6, '2026_09_24_030925_create_peminjamen_table', 1),
(7, '2026_10_05_070116_create_vendors_table', 1),
(8, '2026_10_08_021735_create_peralatan_vendor_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjamans`
--

CREATE TABLE `peminjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `peralatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_pemohon` varchar(255) DEFAULT NULL,
  `nama_peralatan` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `no_siri` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `tarikh_pinjam` date DEFAULT NULL,
  `tarikh_pulang` date DEFAULT NULL,
  `status_peminjaman` varchar(255) NOT NULL DEFAULT 'Dipinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peralatans`
--

CREATE TABLE `peralatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_peralatan` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `vendor_id` varchar(255) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `tersedia` int(11) NOT NULL DEFAULT 0,
  `diagih` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peralatans`
--

INSERT INTO `peralatans` (`id`, `nama_peralatan`, `kategori`, `vendor_id`, `jumlah`, `tersedia`, `diagih`, `created_at`, `updated_at`) VALUES
(1, 'DELL PRECISION 3680 TOWER', 'PC Highend', NULL, 33, 33, 0, '2026-10-12 17:20:03', '2026-10-12 17:20:03'),
(3, 'DELL LATITUDE 7020', 'PC', NULL, 472, 472, 0, '2026-10-12 17:21:04', '2026-10-12 17:21:04'),
(4, 'DELL PRECISION 5490', 'Notebook Highend', NULL, 24, 24, 0, '2026-10-12 17:21:22', '2026-10-12 17:21:22'),
(7, 'DELL LATITUDE 3450', 'Notebook', NULL, 84, 84, 0, '2026-10-12 17:22:30', '2026-10-12 17:22:30'),
(9, 'OKI B432dn', 'Printer Mono A4', NULL, 174, 174, 0, '2026-10-12 17:23:14', '2026-10-12 17:23:14'),
(11, 'OKI C650dn', 'Printer Color A4', NULL, 46, 46, 0, '2026-10-12 17:23:50', '2026-10-12 17:23:50'),
(14, 'EPSON EB-L260F', 'Projektor', NULL, 5, 5, 0, '2026-10-12 17:24:45', '2026-10-12 17:24:45'),
(16, 'DELL OPTIPLEX 7010 i7', 'PC Highend', NULL, 61, 61, 0, '2026-10-14 18:08:46', '2026-10-14 18:08:46'),
(17, 'DELL OPTIPLEX 7010 i5', 'PC', NULL, 1190, 1190, 0, '2026-10-14 18:09:04', '2026-10-14 18:09:04'),
(18, 'DELL LATITUD 3440 i7', 'Notebook Highend', NULL, 49, 49, 0, '2026-10-14 18:09:23', '2026-10-14 18:09:23'),
(19, 'DELL LATITUD 3440 i5', 'Notebook', NULL, 85, 85, 0, '2026-10-14 18:09:39', '2026-10-14 18:09:39'),
(20, 'OKI B412D', 'Printer Mono A4', NULL, 265, 265, 0, '2026-10-14 18:10:00', '2026-10-14 18:10:00'),
(21, 'OKI C612DN', 'Printer Color A4', NULL, 174, 174, 0, '2026-10-14 18:10:20', '2026-10-14 18:10:20'),
(22, 'OKI C911DN', 'Printer Color A3', NULL, 9, 9, 0, '2026-10-14 18:10:35', '2026-10-14 18:10:35'),
(23, 'PANASONIC PT-LW373', 'Projektor', NULL, 57, 57, 0, '2026-10-14 18:10:52', '2026-10-14 18:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan_vendor`
--

CREATE TABLE `peralatan_vendor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peralatan_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_unit` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peralatan_vendor`
--

INSERT INTO `peralatan_vendor` (`id`, `peralatan_id`, `vendor_id`, `jumlah_unit`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 33, '2026-10-12 17:20:03', '2026-10-12 17:20:03'),
(3, 3, 2, 472, '2026-10-12 17:21:04', '2026-10-12 17:21:04'),
(4, 4, 2, 24, '2026-10-12 17:21:22', '2026-10-12 17:21:22'),
(7, 7, 2, 84, '2026-10-12 17:22:30', '2026-10-12 17:22:30'),
(9, 9, 2, 174, '2026-10-12 17:23:14', '2026-10-12 17:23:14'),
(11, 11, 2, 46, '2026-10-12 17:23:50', '2026-10-12 17:23:50'),
(14, 14, 2, 5, '2026-10-12 17:24:45', '2026-10-12 17:24:45'),
(16, 16, 5, 61, '2026-10-14 18:08:46', '2026-10-14 18:08:46'),
(17, 17, 5, 1190, '2026-10-14 18:09:04', '2026-10-14 18:09:04'),
(18, 18, 5, 49, '2026-10-14 18:09:23', '2026-10-14 18:09:23'),
(19, 19, 5, 85, '2026-10-14 18:09:39', '2026-10-14 18:09:39'),
(20, 20, 2, 265, '2026-10-14 18:10:00', '2026-10-14 18:10:00'),
(21, 21, 5, 174, '2026-10-14 18:10:20', '2026-10-14 18:10:20'),
(22, 22, 5, 9, '2026-10-14 18:10:35', '2026-10-14 18:10:35'),
(23, 23, 2, 57, '2026-10-14 18:10:52', '2026-10-14 18:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `permohonans`
--

CREATE TABLE `permohonans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_permohonan` varchar(255) NOT NULL,
  `jenis_permohonan` varchar(255) NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `kuantiti` varchar(255) DEFAULT NULL,
  `tarikh_mohon` date NOT NULL,
  `tujuan` text NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Dalam proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonans`
--

INSERT INTO `permohonans` (`id`, `user_id`, `id_permohonan`, `jenis_permohonan`, `nama_item`, `kuantiti`, `tarikh_mohon`, `tujuan`, `nama_penerima`, `lokasi`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'REQ-9887', 'Baru', 'Notebook Highend, PC Highend', '1, 1', '2026-10-13', 'permohonan baru', 'fareeza, hanis', 'tingkat 12, menara angksapuri, tingkat 10, menara angksapuri', 'Diterima', '2026-10-12 16:54:21', '2026-10-12 23:28:12'),
(2, 2, 'REQ-9303', 'Ganti', 'PC Highend', '1', '2026-10-13', 'hdfh', 'fareeza', 'tingkat 10, menara angksapuri', 'Ditolak', '2026-10-12 23:31:20', '2026-10-15 18:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('snhddjZ0IDK23dkSqEImciYm2gXK2aFeahXREbFe', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRTl6M1pGdmFGRUJrVkpyZFBYQ0F0UTZUSXVtM2JIbXR3SG1UVjRpTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZW5hcmFpLXBlcm1vaG9uYW4iO3M6NToicm91dGUiO3M6MTY6InBlcm1vaG9uYW4uaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1792120211);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `jawatan` varchar(255) DEFAULT NULL,
  `bahagian` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `ic`, `email`, `phone`, `unit`, `address`, `jawatan`, `bahagian`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'hanis', '030607050088', 'hanis@gmail.com', '0173940556', 'Seksyen Teknologi Maklumat', 'Tingkat 12, Menara Angkasapuri', 'Admin', 'Media Digital Interaktif', 'admin', '$2y$12$1l7zbrFI.woWRcNG5v6cYuK/e4COo9ynr4U1JnY7rd6hI/O3TO4Ze', '2026-10-12 16:51:51', '2026-10-12 16:51:51'),
(2, 'fareeza', '030607050099', 'fareezahanis@gmail.com', '0126530556', 'Seksyen Teknologi Maklumat', 'Tingkat 12, Menara Angkasapuri', 'Pelatih', 'Media Digital Interaktif', 'customer', '$2y$12$F5qWaC8XbcBqaRO7z.WJJ.QrcJmng6tX1gEpHBn2q7tgJ9G49IUBS', '2026-10-12 16:53:03', '2026-10-12 16:53:03'),
(3, 'lily', '030417061256', 'lily@gmail.com', '0129731559', 'Seksyen Teknologi Maklumat', 'Tingkat 12, Menara Angkasapuri', 'Pelulus', 'Media Digital Interaktif', 'pelulus', '$2y$12$XIZxyuy6nO7ynA0jM8yL5.YXPIebZAvzRFw3xyrxNw02rH.JImiq.', '2026-10-12 16:55:39', '2026-10-14 18:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `no_kontrak` varchar(255) NOT NULL,
  `pic_kontrak` varchar(255) DEFAULT NULL,
  `pemilik_kontrak` varchar(255) DEFAULT NULL,
  `nilai_kontrak` decimal(15,2) DEFAULT NULL,
  `tarikh_mula` date DEFAULT NULL,
  `tarikh_tamat` date DEFAULT NULL,
  `jumlah_peralatan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `nama_vendor`, `no_kontrak`, `pic_kontrak`, `pemilik_kontrak`, `nilai_kontrak`, `tarikh_mula`, `tarikh_tamat`, `jumlah_peralatan`, `created_at`, `updated_at`) VALUES
(2, 'BUMI OPTIMUS SDN BHD', 'QT240000000029890', '-', '-', 10000.00, '2025-06-01', '2029-05-31', 838, '2026-10-12 17:18:00', '2026-10-12 17:18:00'),
(5, '10 CREATIVE SOLUTIONS SDN BHD', '111', '-', '-', 10000.00, '2022-11-01', '2027-12-31', 1890, '2026-10-14 17:23:45', '2026-10-14 17:23:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamans_user_id_foreign` (`user_id`),
  ADD KEY `peminjamans_peralatan_id_foreign` (`peralatan_id`);

--
-- Indexes for table `peralatans`
--
ALTER TABLE `peralatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peralatan_vendor`
--
ALTER TABLE `peralatan_vendor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peralatan_vendor_peralatan_id_foreign` (`peralatan_id`),
  ADD KEY `peralatan_vendor_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `permohonans`
--
ALTER TABLE `permohonans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permohonans_id_permohonan_unique` (`id_permohonan`),
  ADD KEY `permohonans_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_ic_unique` (`ic`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjamans`
--
ALTER TABLE `peminjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peralatans`
--
ALTER TABLE `peralatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `peralatan_vendor`
--
ALTER TABLE `peralatan_vendor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permohonans`
--
ALTER TABLE `permohonans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD CONSTRAINT `peminjamans_peralatan_id_foreign` FOREIGN KEY (`peralatan_id`) REFERENCES `peralatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peralatan_vendor`
--
ALTER TABLE `peralatan_vendor`
  ADD CONSTRAINT `peralatan_vendor_peralatan_id_foreign` FOREIGN KEY (`peralatan_id`) REFERENCES `peralatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peralatan_vendor_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permohonans`
--
ALTER TABLE `permohonans`
  ADD CONSTRAINT `permohonans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
