-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 11:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_yals`
--

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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `lantai` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `id_kelas`, `nama_kelas`, `lantai`, `created_at`, `updated_at`) VALUES
(9, 'KLS-0001', 'X-1', 'Lantai 2', '2023-08-20 12:14:27', '2023-08-20 12:14:27'),
(18, 'KLS-0002', 'X-2', 'Lantai 1', '2023-08-27 01:41:57', '2023-08-27 01:41:57'),
(19, 'KLS-0003', 'X-3', 'Lantai 1', '2023-08-27 01:42:04', '2023-08-27 01:42:04'),
(20, 'KLS-0004', 'X-4', 'Lantai 1', '2023-08-27 01:42:19', '2023-08-27 01:42:19'),
(21, 'KLS-0005', 'X-5', 'Lantai 1', '2023-08-27 01:42:24', '2023-08-27 01:42:24'),
(22, 'KLS-0006', 'X-6', 'Lantai 1', '2023-08-27 01:42:34', '2023-08-27 01:42:34'),
(23, 'KLS-0007', 'X-7', 'Lantai 1', '2023-08-27 01:42:42', '2023-08-27 01:42:42'),
(24, 'KLS-0008', 'X-8', 'Lantai 2', '2023-08-27 01:42:50', '2023-08-27 01:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_laporan` varchar(100) NOT NULL,
  `id_pass_laporan` varchar(20) NOT NULL,
  `nama_laporan` varchar(100) NOT NULL,
  `file_laporan` varchar(255) NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_laporan`, `id_pass_laporan`, `nama_laporan`, `file_laporan`, `tanggal_laporan`, `update_by`, `created_at`, `updated_at`) VALUES
(139, 'SMA-YAPPENDA/LAP/SPS/RNA/001', 'RNA-0002', 'Laporan-Sarpras--2023-09-06.pdf', 'C:\\xampp\\htdocs\\YALS-Sarpras\\public\\Laporan/Sarpras-Ruangan/Laporan-Sarpras--2023-09-06.pdf', '2023-09-06', 'Reshita Gusti Vianinggar, S.Pd', '2023-09-05 13:49:01', '2023-09-05 13:49:01'),
(141, 'SMA-YAPPENDA/LAP/SPS/KLS/003', 'KLS-0001', 'Laporan-Sarpras-X-1-2023-09-10.pdf', 'C:\\xampp\\htdocs\\YALS-Sarpras\\public\\Laporan/Sarpras-Kelas/Laporan-Sarpras-X-1-2023-09-10.pdf', '2023-09-10', 'Reshita Gusti Vianinggar, S.Pd', '2023-09-09 22:35:37', '2023-09-09 22:35:37'),
(142, 'SMA-YAPPENDA/LAP/SPS/KLS/004', 'KLS-0002', 'Laporan-Sarpras-X-2-2023-09-10.pdf', 'C:\\xampp\\htdocs\\YALS-Sarpras\\public\\Laporan/Sarpras-Kelas/Laporan-Sarpras-X-2-2023-09-10.pdf', '2023-09-10', 'Reshita Gusti Vianinggar, S.Pd', '2023-09-09 22:37:05', '2023-09-09 22:37:05'),
(143, 'SMA-YAPPENDA/LAP/SPS/RNA/002', 'RNA-0001', 'Laporan-Sarpras--2023-09-10.pdf', 'C:\\xampp\\htdocs\\YALS-Sarpras\\public\\Laporan/Sarpras-Ruangan/Laporan-Sarpras--2023-09-10.pdf', '2023-09-10', 'Reshita Gusti Vianinggar, S.Pd', '2023-09-09 22:43:47', '2023-09-09 22:43:47');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_09_010911_kelas', 1),
(6, '2023_08_09_012654_sarpras_kelas', 1),
(7, '2023_09_02_132021_laporan', 2),
(8, '2023_09_05_000157_ruangan', 3),
(9, '2023_09_05_145516_sarprasruangan', 4),
(10, '2023_09_10_024547_req_sarpras', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_sarpras`
--

CREATE TABLE `request_sarpras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_req` varchar(20) NOT NULL,
  `untuk_ruang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_barang` double NOT NULL,
  `harga_barang` double NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_req` date NOT NULL,
  `req_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ruangan` varchar(255) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `lantai` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `id_ruangan`, `nama_ruangan`, `lantai`, `created_at`, `updated_at`) VALUES
(1, 'RNA-0001', 'Ruang Guru', 'Lantai 2', '2023-09-05 04:01:21', '2023-09-05 04:01:21'),
(2, 'RNA-0002', 'Masjid', 'Lantai 1', '2023-09-05 04:01:47', '2023-09-05 04:01:47'),
(3, 'RNA-0003', 'Masjid', 'Lantai 2', '2023-09-05 04:02:00', '2023-09-05 04:43:28'),
(4, 'RNA-0004', 'Perpustakaan', 'Lantai 2', '2023-09-05 04:02:24', '2023-09-05 04:02:24'),
(5, 'RNA-0005', 'Ruang Radio', 'Lantai 2', '2023-09-05 04:43:44', '2023-09-05 04:43:44'),
(6, 'RNA-0006', 'Ruang Tata Usaha', 'Lantai 1', '2023-09-05 04:44:01', '2023-09-05 04:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `sarpras_kelas`
--

CREATE TABLE `sarpras_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas_sarpras` varchar(255) NOT NULL,
  `id_barang_sarpras` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_barang` varchar(15) NOT NULL,
  `kondisi` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sarpras_kelas`
--

INSERT INTO `sarpras_kelas` (`id`, `id_kelas_sarpras`, `id_barang_sarpras`, `nama_barang`, `jumlah_barang`, `kondisi`, `keterangan`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'KLS-0001', 'SRPSKLS-0001', 'Meja', '40', 'Bagus', '-', 'Reshita Gusti Vianinggar, S.Pd', '2023-08-26 16:28:21', '2023-08-26 16:28:21'),
(5, 'KLS-0001', 'SRPSKLS-00002', 'Kursi', '40', 'Bagus', '-', 'Reshita Gusti Vianinggar, S.Pd', '2023-08-27 01:45:17', '2023-08-27 01:45:17'),
(6, 'KLS-0001', 'SRPSKLS-00003', 'Papan Tulis', '1', 'Bagus', '-', 'Reshita Gusti Vianinggar, S.Pd', '2023-08-27 01:45:17', '2023-08-27 07:10:21'),
(7, 'KLS-0002', 'SRPSKLS-00004', 'Meja', '40', 'Bagus', '-', 'Reshita Gusti Vianinggar, S.Pd', '2023-08-27 01:45:58', '2023-08-27 01:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `sarpras_ruangan`
--

CREATE TABLE `sarpras_ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ruangan_sarpras` varchar(20) NOT NULL,
  `id_barang_sarpras_ruangan` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_barang` varchar(15) NOT NULL,
  `kondisi` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `update_by` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sarpras_ruangan`
--

INSERT INTO `sarpras_ruangan` (`id`, `id_ruangan_sarpras`, `id_barang_sarpras_ruangan`, `nama_barang`, `jumlah_barang`, `kondisi`, `keterangan`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'RNA-0001', 'SRPSRNA-00001', 'AC', '2', 'Bagus', '-', 'Reshita Gusti Vianinggar, S.Pd', '2023-09-05 12:29:38', '2023-09-05 12:29:38'),
(2, 'RNA-0001', 'SRPSRNA-00002', 'Komputer', '3', 'Bagus', '-', 'Reshita Gusti Vianinggar, S.Pd', '2023-09-05 12:29:38', '2023-09-05 12:29:38'),
(4, 'RNA-0002', 'SRPSRNA-00004', 'Kipas Angin', '5', 'Bagus', '-', 'Reshita Gusti Vianinggar, S.Pd', '2023-09-05 12:32:07', '2023-09-05 12:40:36'),
(5, 'RNA-0002', 'SRPSRNA-00005', 'Mimbar', '1', 'Bagus', '-', 'Reshita Gusti Vianinggar, S.Pd', '2023-09-05 12:32:07', '2023-09-05 12:32:07'),
(6, 'RNA-0002', 'SRPSRNA-00006', 'Mic', '1', 'Bagus', '-', 'Reshita Gusti Vianinggar, S.Pd', '2023-09-05 12:32:07', '2023-09-05 12:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Sarpras','Admin') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Reshita Gusti Vianinggar, S.Pd', '2475', 'yappenda@gmail.com', '$2y$12$xMKTPQduPs30IHaNNgp22.eW7dSQxMkAAKb96xX6yxuxR.PBsFhwm', 'Sarpras', NULL, '2023-08-19 09:22:38', NULL),
(2, 'Admin', 'admin', 'admin@mail.com', '$2a$12$loG9Sprmnpxoeriwx24T/O2dpiL586NkWcEXCnhTCKcQn7IBHzYWC', 'Admin', NULL, '2023-08-19 20:23:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `request_sarpras`
--
ALTER TABLE `request_sarpras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sarpras_kelas`
--
ALTER TABLE `sarpras_kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_barang_sarpras` (`id_barang_sarpras`);

--
-- Indexes for table `sarpras_ruangan`
--
ALTER TABLE `sarpras_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_sarpras`
--
ALTER TABLE `request_sarpras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sarpras_kelas`
--
ALTER TABLE `sarpras_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sarpras_ruangan`
--
ALTER TABLE `sarpras_ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
