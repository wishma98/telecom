-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 05:25 AM
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
-- Database: `telecomdb`
--
CREATE DATABASE IF NOT EXISTS `telecomdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `telecomdb`;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('tech@gmal.com|127.0.0.1', 'i:1;', 1740485021),
('tech@gmal.com|127.0.0.1:timer', 'i:1740485021;', 1740485021);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clousers`
--

DROP TABLE IF EXISTS `clousers`;
CREATE TABLE `clousers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clouser_ID` varchar(191) NOT NULL,
  `service_id` varchar(191) NOT NULL,
  `category` enum('new','fault','re') NOT NULL,
  `clouser_type` enum('ribbon','non_ribbon') NOT NULL,
  `clouser_amount` decimal(10,2) NOT NULL,
  `location` varchar(191) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` text DEFAULT NULL,
  `nooflocation` decimal(10,2) DEFAULT NULL,
  `connectiontype` enum('Maintainance','New') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clousers`
--

INSERT INTO `clousers` (`id`, `clouser_ID`, `service_id`, `category`, `clouser_type`, `clouser_amount`, `location`, `date_time`, `message`, `nooflocation`, `connectiontype`, `created_at`, `updated_at`) VALUES
(1, 'CID001', 'SID001', 'new', 'ribbon', 10.00, 'kegalle', '2025-02-25 12:01:00', 'dsadasdsa', NULL, NULL, '2025-02-25 20:01:47', '2025-02-25 20:01:47'),
(2, 'CID002', 'SID002', 'new', 'ribbon', 50.00, 'colombo', '2025-02-25 12:07:00', 'ddsadasdas dsad asd as', 1.00, 'Maintainance', '2025-02-25 20:04:02', '2025-02-26 13:24:07'),
(3, 'CID003', 'SID003', 'new', 'ribbon', 10.00, 'kegalle', '2025-02-01 12:21:00', 'jklngh', NULL, NULL, '2025-02-25 20:21:24', '2025-02-25 20:21:24'),
(4, 'CID4', 'SID004', 'new', 'ribbon', 20.00, 'kegalle', '2025-02-25 12:36:09', 'thank you universe', NULL, NULL, '2025-02-25 20:35:24', '2025-02-25 20:36:09'),
(5, 'CID006', 'SID005', 'new', 'ribbon', 5.00, 'Katugasthota', '2025-02-05 05:19:00', 'hhdgdgddd', 2.00, 'Maintainance', '2025-02-26 13:20:01', '2025-02-26 13:20:01'),
(6, 'CID007', 'SID007', 'fault', 'non_ribbon', 10.00, 'kegalle', '2025-02-26 05:23:32', 'hagga a', NULL, NULL, '2025-02-26 13:23:02', '2025-02-26 13:23:32'),
(7, 'CID009', 'SID005', 'new', 'ribbon', 5.00, 'Katugasthota', '2025-01-29 07:05:00', 'zzzzzzzzz', 2.00, 'Maintainance', '2025-02-26 15:05:38', '2025-02-26 15:05:38'),
(8, 'CID010', 'SID005', 'new', 'ribbon', 5.00, 'Katugasthota', '2025-01-28 07:06:00', 'ggggggzB', 2.00, 'New', '2025-02-26 15:06:42', '2025-02-26 15:06:42'),
(9, 'bxb', 'SID005', 'new', 'ribbon', 50.00, 'Katugasthota', '2025-01-28 07:07:00', 'sqqqqqqqqqqqs', 2.00, 'New', '2025-02-26 15:07:25', '2025-02-26 15:07:25'),
(10, '17455', 'SID005', 'new', 'ribbon', 10.00, 'Katugasthota', '2025-01-29 07:08:00', 'sqsqqq', 2.00, 'New', '2025-02-26 15:08:18', '2025-02-26 15:08:18'),
(11, 'CID888', 'SID005', 'new', 'ribbon', 10.00, 'Katugasthota', '2025-01-29 07:11:00', 'sssssssssss', 2.00, 'New', '2025-02-26 15:11:32', '2025-02-26 15:11:32'),
(12, 'CID4332', 'SID005', 'new', 'ribbon', 10.00, 'kegalle', '2025-02-05 07:12:00', 'SSSSSSSSSSSSS', 1.00, 'New', '2025-02-26 15:12:35', '2025-02-26 15:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
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

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
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

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
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

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_15_044123_create_clousers_table', 1),
(5, '2025_01_28_052949_create_table_location_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
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
('hVBvgVwzP2XbQMl7SixBB17K9tP4JsMfMVEVYZzy', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTWJ4a0VqVzA3UEh3bElVSllxRURjc2dBSjF3SEFsYUdORkRPRFBuYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1740585734),
('LfqBLhCUoaw4TeYr8a1R0KDu7AsOvYwGrRmYDPQD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVWEwb0lNck5rdzRMeTYzYzFPWTVjSFpScjNhV0hMT29QNFExd05ZdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9fQ==', 1740561447),
('pGqgrjajyZyADuKyvqdHiO8X93ITdshXxTmsf6ll', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZm90UDRDU2pwM3B2WmxmSVFMZE9vaFEwTm4ydWhpeTFyQ2RGenllUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9fQ==', 1740629838);

-- --------------------------------------------------------

--
-- Table structure for table `table_location`
--

DROP TABLE IF EXISTS `table_location`;
CREATE TABLE `table_location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(191) NOT NULL,
  `END_A_LONGITUDE` varchar(191) NOT NULL,
  `END_A_LATITUDE` varchar(191) NOT NULL,
  `END_A_PHOTO` varchar(191) NOT NULL,
  `END_B_LONGITUDE` varchar(191) DEFAULT NULL,
  `END_B_LATITUDE` varchar(191) DEFAULT NULL,
  `END_B_PHOTO` varchar(191) DEFAULT NULL,
  `LEA` enum('LEA1','LEA2','LEA3') NOT NULL,
  `clouser_used` enum('Yes','No') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_location`
--

INSERT INTO `table_location` (`id`, `location_name`, `END_A_LONGITUDE`, `END_A_LATITUDE`, `END_A_PHOTO`, `END_B_LONGITUDE`, `END_B_LATITUDE`, `END_B_PHOTO`, `LEA`, `clouser_used`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Peradeniya', '80.65011978149415', '7.287559564863531', 'photos/OiGrAz9V2PP270FSK2NaN6yMpnRYsJy4tuvOL42g.jpg', '80.6638526916504', '7.242530484962644', 'photos/Ab0FJaRLAKU0fOwM4IcCX1AdMwaKPOGfXIzyB2zv.jpg', 'LEA1', 'No', NULL, '2025-02-25 20:04:59', '2025-02-25 20:04:59'),
(2, 'Katugasthota', '80.53201675415039', '7.391245643968647', 'photos/3GNenKhWIUW5I91VCLh2z6iisTnrJpddNkUHNGGa.jpg', '80.60480117797853', '7.301197093963398', 'photos/jATomqSd79cgCyOIfUYS2ccIlI1sGxK83qhTQfEh.jpg', 'LEA1', 'No', NULL, '2025-02-26 13:20:59', '2025-02-26 13:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `contact_number` varchar(191) NOT NULL,
  `userType` varchar(191) NOT NULL DEFAULT 'user',
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `service_id`, `name`, `contact_number`, `userType`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SID001', 'John Doe Admin', '0771234567', 'admin', 'admin@gmail.com', NULL, '$2y$12$0nJReSu2/Ey4x6N6XJN8CebURxfSqn7m1RTOnn.9xYGgSSRZ4xK4S', NULL, '2025-02-25 19:47:58', '2025-02-25 19:47:58'),
(2, 'SID002', 'John Doe Tech', '0771234567', 'technician', 'tech@gmail.com', NULL, '$2y$12$9fxOu4TpC.6pYmp1bzi44.oZfSoJPFPf/9wjz2wWGqNWrQI9Oiari', NULL, '2025-02-25 19:48:43', '2025-02-25 19:48:43'),
(3, 'SID003', 'tech1', '0714859632', 'admin', 'tech1@gmail.com', NULL, '$2y$12$ks/hsJ08lZwe64rx4pw/P.XBKmXfSleMG8L1OUBpOdo3BrxIfIdQ2', NULL, '2025-02-25 20:20:59', '2025-02-25 20:20:59'),
(4, 'SID004', 'admin3', '0718569230', 'admin', 'admin3@gmail.com', NULL, '$2y$12$SQTTYV.QGrFuXNoSXw2EI..hOyAF1oUxw0rCFezVP24lbc2.4KdDK', NULL, '2025-02-25 20:32:04', '2025-02-25 20:32:04'),
(5, 'SID005', 'tech5', '0778952146', 'technician', 'tech5@gmail.com', NULL, '$2y$12$XO8.6bRD3LMH2FWcV1Vuc.cLbj12b3d/YmQypBMc2HR13vEuiE4wK', NULL, '2025-02-26 13:19:03', '2025-02-26 13:19:03'),
(6, 'SID007', 'admin7', '0725894512', 'admin', 'admin7@gmail.com', NULL, '$2y$12$Zmt5mSPBeevQJsqA/ALX4O0fNv03UJAp0pt/CdhvEoyHv2mpCHx.O', NULL, '2025-02-26 13:22:07', '2025-02-26 13:22:07'),
(7, 'SID008', 'admin8', '0725894512', 'admin', 'admin8@gmail.com', NULL, '$2y$12$cUrBEQCnsTwfNtoSrKkzGu7su6qmieoplUnIQM6sPGehYnPbY3NH2', NULL, '2025-02-26 13:43:05', '2025-02-26 13:43:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `clousers`
--
ALTER TABLE `clousers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clousers_service_id_foreign` (`service_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `table_location`
--
ALTER TABLE `table_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_service_id_unique` (`service_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clousers`
--
ALTER TABLE `clousers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_location`
--
ALTER TABLE `table_location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clousers`
--
ALTER TABLE `clousers`
  ADD CONSTRAINT `clousers_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `users` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
