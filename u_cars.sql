-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 05:47 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_cats`
--

CREATE TABLE `class_cats` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_cats`
--

INSERT INTO `class_cats` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'size', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_types`
--

CREATE TABLE `class_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `class_cat_id` int(10) UNSIGNED NOT NULL,
  `sub_service_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_types`
--

INSERT INTO `class_types` (`id`, `name`, `price`, `discount`, `class_cat_id`, `sub_service_id`, `created_at`, `updated_at`) VALUES
(1, 'jeb', NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `car_type`, `car_no`, `car_color`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Salah', 'Mohamed@gmail.com', '01009160863', 'lancer', 'د س ر 9415', 'black', NULL, NULL),
(2, 'Norhan Hesham', 'Norhan@gmail.com', '01007124012', 'Jeb', 'د س ر 9415', 'silver', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_requests`
--

CREATE TABLE `client_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_service_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `free_service_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_request` tinyint(1) NOT NULL DEFAULT '0',
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'black', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color_sub_service`
--

CREATE TABLE `color_sub_service` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_service_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_sub_service`
--

INSERT INTO `color_sub_service` (`id`, `sub_service_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `free_services`
--

CREATE TABLE `free_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `free_services`
--

INSERT INTO `free_services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'free 1 updated', NULL, '2018-11-19 11:57:55'),
(2, 'free 2', NULL, NULL),
(3, 'new free service', '2018-11-19 11:52:16', '2018-11-19 11:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `free_service_sub_service`
--

CREATE TABLE `free_service_sub_service` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_service_id` int(10) UNSIGNED NOT NULL,
  `free_service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `price`, `code`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 'image 1', 100.00, 'code 1', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2018_11_15_215548_create_services_table', 1),
(13, '2018_11_15_215733_create_sub_services_table', 1),
(14, '2018_11_16_102916_create_colors_table', 1),
(15, '2018_11_16_210141_create_color_sub_service_table', 1),
(16, '2018_11_17_104218_create_images_table', 1),
(17, '2018_11_17_134557_create_class_cats_table', 1),
(18, '2018_11_17_135809_create_class_types_table', 1),
(19, '2018_11_18_120250_create_free_services_table', 1),
(20, '2018_11_18_120320_create_clients_table', 1),
(21, '2018_11_18_120333_create_client_requests_table', 1),
(22, '2018_11_18_131651_create_free_service_sub_service_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'تغليف كامل للسياره معدل مرتين كمان', 'Untitled_1542721551.png', NULL, '2018-11-20 11:45:51'),
(3, 'صبغ مطاطى كامل للسياره', '', NULL, NULL),
(4, 'خدمه جديده', 'adding midddleware in kernel file_1542720221.PNG', '2018-11-20 11:23:42', '2018-11-20 11:23:42'),
(6, 'خدمه جديده 3', 'product model_1542720363.PNG', '2018-11-20 11:26:03', '2018-11-20 11:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `sub_services`
--

CREATE TABLE `sub_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `guarantee` int(11) DEFAULT NULL,
  `free_removal` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `free_polishing` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_services`
--

INSERT INTO `sub_services` (`id`, `service_id`, `name`, `image`, `details`, `guarantee`, `free_removal`, `notes`, `requirements`, `free_polishing`, `created_at`, `updated_at`) VALUES
(5, 4, 'fff', 'gggg', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(7, 4, 'fff', 'gggg', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(8, 1, 'service 1', 'gggg', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(9, 4, 'fff', 'gggg', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(10, 1, 'service 1', 'gggg', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(11, 4, 'fff', 'gggg', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_cats`
--
ALTER TABLE `class_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_types`
--
ALTER TABLE `class_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_types_class_cat_id_index` (`class_cat_id`),
  ADD KEY `class_types_sub_service_id_index` (`sub_service_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_requests`
--
ALTER TABLE `client_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_requests_sub_service_id_index` (`sub_service_id`),
  ADD KEY `client_requests_color_id_index` (`color_id`),
  ADD KEY `client_requests_image_id_index` (`image_id`),
  ADD KEY `client_requests_class_id_index` (`class_id`),
  ADD KEY `client_requests_free_service_id_index` (`free_service_id`),
  ADD KEY `client_requests_client_id_index` (`client_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_sub_service`
--
ALTER TABLE `color_sub_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_sub_service_sub_service_id_index` (`sub_service_id`),
  ADD KEY `color_sub_service_color_id_index` (`color_id`);

--
-- Indexes for table `free_services`
--
ALTER TABLE `free_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_service_sub_service`
--
ALTER TABLE `free_service_sub_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `free_service_sub_service_sub_service_id_index` (`sub_service_id`),
  ADD KEY `free_service_sub_service_free_service_id_index` (`free_service_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_color_id_index` (`color_id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_services_service_id_index` (`service_id`);

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
-- AUTO_INCREMENT for table `class_cats`
--
ALTER TABLE `class_cats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_types`
--
ALTER TABLE `class_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_requests`
--
ALTER TABLE `client_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `color_sub_service`
--
ALTER TABLE `color_sub_service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `free_services`
--
ALTER TABLE `free_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `free_service_sub_service`
--
ALTER TABLE `free_service_sub_service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_services`
--
ALTER TABLE `sub_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_types`
--
ALTER TABLE `class_types`
  ADD CONSTRAINT `class_types_class_cat_id_foreign` FOREIGN KEY (`class_cat_id`) REFERENCES `class_cats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_types_sub_service_id_foreign` FOREIGN KEY (`sub_service_id`) REFERENCES `sub_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_requests`
--
ALTER TABLE `client_requests`
  ADD CONSTRAINT `client_requests_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class_cats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_requests_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_requests_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_requests_free_service_id_foreign` FOREIGN KEY (`free_service_id`) REFERENCES `free_services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_requests_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_requests_sub_service_id_foreign` FOREIGN KEY (`sub_service_id`) REFERENCES `sub_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `color_sub_service`
--
ALTER TABLE `color_sub_service`
  ADD CONSTRAINT `color_sub_service_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `color_sub_service_sub_service_id_foreign` FOREIGN KEY (`sub_service_id`) REFERENCES `sub_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `free_service_sub_service`
--
ALTER TABLE `free_service_sub_service`
  ADD CONSTRAINT `free_service_sub_service_free_service_id_foreign` FOREIGN KEY (`free_service_id`) REFERENCES `sub_services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `free_service_sub_service_sub_service_id_foreign` FOREIGN KEY (`sub_service_id`) REFERENCES `sub_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD CONSTRAINT `sub_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
