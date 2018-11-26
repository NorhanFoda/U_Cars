-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 06:52 PM
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
(1, 'حجم السياره', '2018-11-26 15:37:59', '2018-11-26 15:37:59'),
(2, 'اجزاء السياره', '2018-11-26 15:49:55', '2018-11-26 15:49:55');

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
(1, 'جيب', NULL, NULL, 1, NULL, '2018-11-26 15:38:10', '2018-11-26 15:38:10'),
(2, 'سيدان', NULL, NULL, 1, NULL, '2018-11-26 15:38:19', '2018-11-26 15:38:19'),
(3, 'جيب', 15000, NULL, 1, 1, '2018-11-26 15:39:25', '2018-11-26 15:39:25'),
(4, 'سيدان', 20000, NULL, 1, 1, '2018-11-26 15:39:25', '2018-11-26 15:39:25'),
(5, 'جيب', 12000, NULL, 1, 2, '2018-11-26 15:40:21', '2018-11-26 15:40:21'),
(6, 'سيدان', 5000, NULL, 1, 2, '2018-11-26 15:40:22', '2018-11-26 15:40:22'),
(7, 'جيب', NULL, NULL, 1, 2, '2018-11-26 15:40:22', '2018-11-26 15:40:22'),
(8, 'سيدان', NULL, NULL, 1, 2, '2018-11-26 15:40:22', '2018-11-26 15:40:22'),
(9, 'كبوت', NULL, NULL, 2, NULL, '2018-11-26 15:50:05', '2018-11-26 15:50:05'),
(10, 'كبوت', 50000, NULL, 2, 3, '2018-11-26 15:50:51', '2018-11-26 15:50:51');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `classtype_id` int(10) UNSIGNED DEFAULT NULL
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
(1, 'احمر مطفى', '2018-11-26 15:36:26', '2018-11-26 15:36:26'),
(2, 'ذهبى لامع', '2018-11-26 15:48:15', '2018-11-26 15:48:15'),
(3, 'ذهبى', '2018-11-26 15:48:31', '2018-11-26 15:48:31');

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
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 2, NULL, NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_service_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `price`, `code`, `color_id`, `created_at`, `updated_at`, `sub_service_id`) VALUES
(1, 'CreatingRoutes_1543254115.PNG', 5000.00, 'code', 1, '2018-11-26 15:41:55', '2018-11-26 15:41:55', 1),
(2, 'product model_1543254199.PNG', NULL, 'code 2', 1, '2018-11-26 15:43:19', '2018-11-26 15:43:19', 2),
(3, 'app.blade_file_1_1543254711.PNG', NULL, 'code5', 2, '2018-11-26 15:51:51', '2018-11-26 15:51:51', 3);

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
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2018_11_15_215548_create_services_table', 1),
(40, '2018_11_15_215733_create_sub_services_table', 1),
(41, '2018_11_16_102916_create_colors_table', 1),
(42, '2018_11_16_210141_create_color_sub_service_table', 1),
(43, '2018_11_17_104218_create_images_table', 1),
(44, '2018_11_17_134557_create_class_cats_table', 1),
(45, '2018_11_17_135809_create_class_types_table', 1),
(46, '2018_11_18_120250_create_free_services_table', 1),
(47, '2018_11_18_120320_create_clients_table', 1),
(48, '2018_11_18_120333_create_client_requests_table', 1),
(49, '2018_11_18_131651_create_free_service_sub_service_table', 1),
(50, '2018_11_21_155235_add_classtype_id_to_client_requests', 1),
(51, '2018_11_25_192945_add_sub_service_id_to_images', 1);

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
(1, 'تغليف كامل للسياره', 'PermissionTableSeeder_1543253851.PNG', '2018-11-26 15:37:31', '2018-11-26 15:37:31');

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
  `guarantee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 1, 'مطفى', 'app.blade_file_1_1543253964.PNG', 'مفيش', '4 سنوات', 'ازاله مجانيه فى فترة الضمان', 'تىرتى', 'تكون العربيه فابريكا', 1, '2018-11-26 15:39:24', '2018-11-26 15:39:24'),
(2, 1, 'لامع', 'product model_1543254021.PNG', 'مفيش مواصفات', 'مدى الحياه', 'ازاله مجانيه فى فترة الضمان', 'اابنثنثل', 'تيست تانى', 0, '2018-11-26 15:40:21', '2018-11-26 15:40:21'),
(3, 1, 'قسم جديد', 'product model_1543254651.PNG', NULL, NULL, NULL, NULL, NULL, 1, '2018-11-26 15:50:51', '2018-11-26 15:50:51');

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
  ADD KEY `client_requests_client_id_index` (`client_id`),
  ADD KEY `client_requests_classtype_id_index` (`classtype_id`);

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
  ADD KEY `images_color_id_index` (`color_id`),
  ADD KEY `images_sub_service_id_index` (`sub_service_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_types`
--
ALTER TABLE `class_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_requests`
--
ALTER TABLE `client_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `color_sub_service`
--
ALTER TABLE `color_sub_service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `free_services`
--
ALTER TABLE `free_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `free_service_sub_service`
--
ALTER TABLE `free_service_sub_service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_services`
--
ALTER TABLE `sub_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `client_requests_classtype_id_foreign` FOREIGN KEY (`classtype_id`) REFERENCES `class_types` (`id`) ON DELETE CASCADE,
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
  ADD CONSTRAINT `images_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `images_sub_service_id_foreign` FOREIGN KEY (`sub_service_id`) REFERENCES `sub_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD CONSTRAINT `sub_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
