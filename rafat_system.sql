-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2023 at 09:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rafat_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_img`, `manager_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ali Naser', 'Agent@example.com', NULL, '$2y$10$vdtxmg0KgRlFB4iVpNRFZurd9I7A9sQa2/jEyZvS3A2jFiPrMxGWC', '1681765873face4.jpg', 1, 1, NULL, '2023-04-15 23:14:33', '2023-04-17 19:11:13'),
(2, 'Shawqi', 'Agent2@example.com', NULL, '$2y$10$Ohl6rf4GDqBO8rOcz6O3ou48RZS2pJozG3S6P1GdK997oOCJjfFWC', NULL, 1, 1, NULL, '2023-04-16 11:20:09', '2023-04-16 11:20:09'),
(3, 'عبدالرحمن', 'abdo@gmail.com', NULL, '$2y$10$I4c1oM0iANQ7mB0vki6N5.yu6SmL/Wp/O87fl/Cs.ukiTHKw/Z/he', NULL, 3, 1, NULL, '2023-04-18 09:04:58', '2023-04-18 09:04:58'),
(4, 'سمير', 'samer@gmail.com', NULL, '$2y$10$5P5gzJOuRncjyQocFUX2COPFVt2gfEHeHcFGmEZoDpJTV7xzRIjlu', NULL, 2, 1, NULL, '2023-04-18 09:06:00', '2023-04-18 09:06:00'),
(5, 'ربيع', 'anas1@gmail.com', NULL, '$2y$10$h/BLCy9cBMyne/P6vb/7Ie2yxZKQvS1doLcs174SvinTkuJSdURdW', NULL, 3, 1, NULL, '2023-04-18 14:00:24', '2023-04-18 14:00:24'),
(6, 'ali', 'ali@gmail.com', NULL, '$2y$10$q/aHsB6S7m6LH25Lv7Kf9enUTF6RsSV1rQNwRHwSBeD.iP6nb/lLq', NULL, 4, 1, NULL, '2023-04-18 14:15:26', '2023-04-18 14:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Added_by` int NOT NULL DEFAULT '0',
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `email`, `email_verified_at`, `password`, `Added_by`, `profile_img`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abdallah', 'manager@example.com', NULL, '$2y$10$hgUSZRZAxIJ556033srkY.wWalzQy6NgI5nn8.NdvstJ.46eI.Oye', 1, '1681765640face3.jpg', 1, NULL, '2023-04-15 23:14:03', '2023-04-17 19:07:20'),
(2, 'انس', 'anas@gmail.com', NULL, '$2y$10$polSRH3ySaoxO8d2O6q5Yuyu58vJbkYPO1fc/CTrF6tTQoPkkIuN2', 1, '1681794705IMG_20230417_210838.jpg', 1, NULL, '2023-04-18 09:02:41', '2023-04-18 09:11:45'),
(3, 'بدر', 'badr@gmail.com', NULL, '$2y$10$pymhqcvM6YJOG02N/P7g3O1R0LbtF/mchDJEl6zFSf49DjiQcVy5K', 1, NULL, 1, NULL, '2023-04-18 09:03:46', '2023-04-18 09:03:46'),
(4, 'Ahmed', 'ahmed@gmail.com', NULL, '$2y$10$bLqutVdVI9k5lwSZpYJS2OF0ZdH3gAKtxoIet.43aBNBb/mc21NR2', 1, NULL, 1, NULL, '2023-04-18 14:14:04', '2023-04-18 14:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(10, '2023_04_16_003359_create_managers_table', 2),
(11, '2023_04_17_231041_create_agents_table', 3),
(15, '2023_04_16_132949_create_vistors_table', 4);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '1',
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Added_by` int DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `profile_img`, `Added_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rafat Badr', 'rafat@gmail.com', NULL, '$2y$10$BoDftzAFbz2kTG76MjQqAOBS725a.zfcqbHQNUz2AeUhls1RvkJh.', 1, '1682169371mySalamLogo-min (1).png', NULL, NULL, '2023-04-12 21:14:37', '2023-04-22 17:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `vistors`
--

CREATE TABLE `vistors` (
  `id` bigint UNSIGNED NOT NULL,
  `vistor_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vistor_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vistor_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vistor_count_slides` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vistor_count_activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `long` decimal(10,8) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `Agent_id` bigint UNSIGNED NOT NULL,
  `manager_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vistors`
--

INSERT INTO `vistors` (`id`, `vistor_code`, `vistor_phone`, `vistor_balance`, `vistor_count_slides`, `vistor_count_activity`, `lat`, `long`, `notes`, `Agent_id`, `manager_id`, `created_at`, `updated_at`) VALUES
(1, '2001', '010932521322', '1000', '10', '5', '30.14732740', '31.34840430', 'تم البيع', 1, 1, '2023-04-17 10:52:02', '2023-04-17 10:52:02'),
(2, '204', '34444344', '9876', '3', '1', '31.03201340', '30.46234820', 'test', 2, 1, '2023-04-18 08:53:43', '2023-04-18 08:53:43'),
(3, '1234', '0134678854', '7000', '4', '3', '31.03184020', '30.46229000', 'عم رافت صح الصح', 4, 2, '2023-04-18 09:19:44', '2023-04-18 09:19:44'),
(4, '2010', '0987654321', '4', '6', '7', '31.03134180', '30.46210110', 'test', 5, 3, '2023-04-18 14:04:45', '2023-04-18 14:04:45'),
(5, '55', '٠١٠٩٨٢٤٥٩١٨', '333', '4333', '555', '30.26700945', '31.49199324', 'Tast', 4, 2, '2023-04-22 18:08:31', '2023-04-22 18:08:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agents_email_unique` (`email`),
  ADD KEY `agents_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `managers_email_unique` (`email`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vistors`
--
ALTER TABLE `vistors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vistors_agent_id_foreign` (`Agent_id`),
  ADD KEY `vistors_manager_id_foreign` (`manager_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vistors`
--
ALTER TABLE `vistors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vistors`
--
ALTER TABLE `vistors`
  ADD CONSTRAINT `vistors_agent_id_foreign` FOREIGN KEY (`Agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vistors_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
