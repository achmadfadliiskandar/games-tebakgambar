-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 03:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamestbgambar`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_levels`
--

CREATE TABLE `detail_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_games_id` int(11) DEFAULT NULL,
  `rintangan_games_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_levels`
--

INSERT INTO `detail_levels` (`id`, `level_games_id`, `rintangan_games_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-09-22 19:49:36', '2022-09-22 19:49:36'),
(2, 1, 2, 1, '2022-09-22 20:00:00', '2022-12-20 08:07:07'),
(6, 3, 4, 1, '2022-09-23 23:05:18', '2022-09-24 01:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level_games`
--

CREATE TABLE `level_games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_games`
--

INSERT INTO `level_games` (`id`, `level`, `judul`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'satu', 'umum', 1, '2022-09-22 19:49:36', '2022-09-22 19:49:36'),
(3, 'dua', 'makanan', 1, '2022-09-23 23:05:04', '2022-09-23 23:05:04');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_08_23_015711_create_play_games_table', 4),
(13, '2022_08_13_153150_create_sarans_table', 6),
(17, '2022_08_19_124759_create_rintangan_games_table', 7),
(18, '2022_09_22_041228_create_level_games_table', 7),
(19, '2022_09_22_041510_create_detail_levels_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `play_games`
--

CREATE TABLE `play_games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rintangan_games_id` int(11) NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_menjawab` time NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `play_games`
--

INSERT INTO `play_games` (`id`, `rintangan_games_id`, `jawaban`, `waktu_menjawab`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'BUKU CERITA', '00:57:00', 5, '2022-09-24 01:54:10', '2022-09-24 01:54:10'),
(2, 2, 'TANGAN KESEMUTAN', '01:56:00', 5, '2022-09-24 01:55:01', '2022-09-24 01:55:01'),
(3, 4, 'BUKU GAMBAR', '02:58:00', 5, '2022-09-24 01:55:12', '2022-09-24 01:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `rintangan_games`
--

CREATE TABLE `rintangan_games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rintangan_games`
--

INSERT INTO `rintangan_games` (`id`, `images`, `jawaban`, `required`, `waktu`, `warna`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'WhatsApp Image 2022-08-10 at 19.51.10 (1).jpeg.1663837022.jpg', 'BUKU CERITA', NULL, 60, '#f86868', 1, '2022-09-22 01:57:02', '2022-09-22 01:57:02'),
(2, '1663837079.jpeg', 'TANGAN KESEMUTAN', '1', 120, '#126d17', 1, '2022-09-22 01:57:39', '2022-09-22 01:58:16'),
(4, 'WhatsApp Image 2022-08-10 at 19.51.33 (2).jpeg.1663999444.jpg', 'BUKU GAMBAR', '2', 180, '#9f1982', 1, '2022-09-23 23:04:04', '2022-09-23 23:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `sarans`
--

CREATE TABLE `sarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','pemain') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pemain',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$LNolzAqw4wGTZungffVExO4op1ClTgDUfcNWyFCRLMX24sc.dM9gq', 'admin', NULL, '2022-08-10 19:31:19', '2022-09-05 23:59:39'),
(2, 'fadlan', 'fadlan@gmail.com', '2022-09-01 03:56:04', '$2y$10$ylcj.nRgN8MjhYfGpYKrW.iNPpHCKiHNkEIixsEGCqL557bnmu4oy', 'pemain', NULL, '2022-08-10 19:34:43', '2022-09-01 03:56:04'),
(3, 'rizky andiyyansah', 'rizkyandiyansah2010@gmail.com', NULL, '$2y$10$y/j1SlNEFAZKt1cSnlI4jOI8N4bBEcvW.vebKlfXgY2myRDRfid/O', 'pemain', 'TrZw7PT2HECjtJG6uToBNHgbWd2jmA0ptQQVLuapVZnuJQ8uhLW6edIAKn39', '2022-08-13 08:12:27', '2022-08-13 08:12:27'),
(5, 'Faiz', 'faiz@gmail.com', '2022-08-14 17:00:00', '$2y$10$.qPYfb5zIF8.d6Nh376aF.IOdHOENXkRanDS7Hdvdh3qubhDlrJ9m', 'pemain', NULL, '2022-08-15 05:35:32', '2022-08-15 05:35:32'),
(6, 'Rani', 'rani@gmail.com', '2022-08-29 22:14:53', '$2y$10$uXtGn7/95Jt9ZAHfxzvrqeF6SxWgxW6bz4ipde3Z/cWyYJQ0QEpkO', 'pemain', NULL, '2022-08-15 05:36:55', '2022-08-29 22:14:53'),
(8, 'torik', 'torik@gmail.com', '2022-08-14 17:00:00', '$2y$10$YPfqrGNNk5BFuZZFp6KvaOZS/tjuc9zUzwnJKNHvr5R0oCObfg3M2', 'pemain', NULL, '2022-08-15 05:42:31', '2022-08-15 05:42:31'),
(9, 'dzaki ahnaf', 'dzaki@gmail.com', NULL, '$2y$10$tTc043.qrHeMSDe81k1nCe5Fo4vQtXItMo.VciCLh7fUYkTAT0P5K', 'pemain', NULL, '2022-08-23 21:16:36', '2022-08-23 21:16:36'),
(10, 'orang', 'orangbutun@gmail.com', NULL, '$2y$10$c6.qZ9fiLsvgtDCBPOBho.pNZMxEByJl6YvAL2ZRl/VlBrT16chYu', 'pemain', NULL, '2022-09-05 23:29:50', '2022-09-05 23:29:50'),
(11, 'syafiq', 'syafiq@gmail.com', NULL, '$2y$10$9YRYRMKrNc4of0np/l.kwuUMVb0BQs6l5fI7HxzaVG6N9t7jDWO8O', 'pemain', NULL, '2022-09-09 02:43:12', '2022-09-09 02:43:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_levels`
--
ALTER TABLE `detail_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `level_games`
--
ALTER TABLE `level_games`
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
-- Indexes for table `play_games`
--
ALTER TABLE `play_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rintangan_games`
--
ALTER TABLE `rintangan_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sarans`
--
ALTER TABLE `sarans`
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
-- AUTO_INCREMENT for table `detail_levels`
--
ALTER TABLE `detail_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_games`
--
ALTER TABLE `level_games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `play_games`
--
ALTER TABLE `play_games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rintangan_games`
--
ALTER TABLE `rintangan_games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sarans`
--
ALTER TABLE `sarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
