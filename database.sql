-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2021 at 05:45 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `role`, `created_at`, `updated_at`, `name`) VALUES
(2, 'bulzart@gmail.com', '$2y$10$fwC/vRGiGuEEV6PgolOO7OAAxKhJuQiDsFfg2/a7kWeETqVgiKqhq', 'admin', '2021-05-15 20:48:47', '2021-05-15 20:48:47', 'Bulzart'),
(3, 'bajramaliu222@gmail.com', 'bajram', 'aa', NULL, NULL, 'Bajram');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perdoruesi_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sasia` int(11) NOT NULL,
  `items` json NOT NULL,
  `total` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `perdoruesi_id`, `created_at`, `updated_at`, `sasia`, `items`, `total`) VALUES
(15, 10, '2021-11-08 01:55:56', '2021-11-08 23:08:44', 0, '[]', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modeli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `modeli`, `created_at`, `updated_at`) VALUES
(25, 'Bicycles', '2021-11-05 18:19:20', '2021-11-05 18:19:20'),
(26, 'Automobile', '2021-11-05 18:19:28', '2021-11-05 18:19:28'),
(27, 'Toy', '2021-11-05 18:19:44', '2021-11-05 18:19:44'),
(28, 'Sports', '2021-11-05 18:19:52', '2021-11-05 18:19:52'),
(29, 'Outdoors', '2021-11-05 18:19:58', '2021-11-05 18:19:58'),
(30, 'House and Garden', '2021-11-05 18:20:10', '2021-11-05 18:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `val` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency`, `created_at`, `updated_at`, `val`) VALUES
(1, '$', NULL, '2021-11-04 18:50:55', '$');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2021_05_12_170416_create_files_db', 1),
(20, '2021_05_12_172451_create_car_models', 1),
(21, '2021_05_13_063129_admins_table', 2),
(22, '2021_05_14_205124_add_row_files_db', 3),
(23, '2021_05_14_212820_create_uploads_table', 4),
(24, '2021_05_17_121433_create_perdoruesis_table', 5),
(26, '2021_06_12_205543_create_jobs_table', 7),
(28, '2021_06_09_195654_create_cart_table', 8),
(29, '2021_06_16_192327_add_two_columns_carts_table', 8),
(30, '2021_06_16_203922_add_total_to_carts_table', 9),
(35, '2021_06_17_130918_add_online_perdoruesit_table', 8),
(36, '2021_06_17_130918_add_online_perdoruesit_table', 8),
(39, '2021_06_18_201304_change_cmimi_to_uploads_table', 10),
(44, '2021_07_16_190545_delete_path2_from_uploads', 14),
(45, '2021_07_17_175615_add_cnt_to_images_uploads_table', 15),
(46, '2021_07_18_214133_add_role', 16),
(47, '2021_07_18_214307_add_roles', 17),
(48, '2021_07_20_000134_delete_rows_from_orders_table', 18),
(49, '2021_06_28_163101_orders', 19),
(50, '2021_07_01_231256_add_columns_to_orders_table', 19),
(51, '2021_07_11_223517_add_checked_orders_table', 20),
(52, '2021_07_20_032254_add_companyname_perdoruesit_table', 21),
(53, '2021_08_28_095108_create_currencies_table', 22),
(54, '2021_11_04_224404_create_subcategories_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `items` json NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `sasia` int(11) NOT NULL,
  `perdoruesi_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `emri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shteti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mesazh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perfunduar` tinyint(1) NOT NULL DEFAULT '0',
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `items`, `total`, `sasia`, `perdoruesi_id`, `created_at`, `updated_at`, `emri`, `tel`, `shteti`, `adresa`, `mesazh`, `perfunduar`, `zip`) VALUES
(5, '{\"24\": {\"id\": \"24\", \"url\": \"uploads/bicycle.webp\", \"emri\": \"bulzart\", \"slug\": \"bulzart-24\", \"cmimi\": \"1649.00\", \"sasia\": 1, \"ngjyra\": \"Purple\", \"perdoruesi\": 10}}', '1649.00', 1, 10, '2021-11-08 02:55:06', '2021-11-08 02:55:06', 'Bulzart Aliu', '325156', 'Prishtine', 'Kuvendi i Ferizajt', 'nexha18@live.com', 0, 70000);

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
-- Table structure for table `perdoruesit`
--

CREATE TABLE `perdoruesit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `viber` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `online` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perdoruesit`
--

INSERT INTO `perdoruesit` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `tel`, `viber`, `online`, `role`, `company_name`) VALUES
(10, 'Bulzart', 'bulzarti@gmail.com', '$2y$10$NyNMSXeBy0eEabbKjOV06.XxW7PRqONEcSYYhUuaBx2vlcRcPC/ae', '2021-10-30 21:14:20', '2021-11-08 23:03:32', '045917726', ' ', 1, 'mod', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_models_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `car_models_id`, `name`, `created_at`, `updated_at`) VALUES
(4, 25, 'Cycles', '2021-11-05 18:24:51', '2021-11-05 18:24:51'),
(5, 26, 'Bycicly ringing', '2021-11-05 18:25:13', '2021-11-05 18:25:13'),
(6, 26, 'Bicycle trailers', '2021-11-05 18:25:29', '2021-11-05 18:25:29'),
(7, 25, 'Bicycle bags', '2021-11-05 18:25:34', '2021-11-05 18:25:34'),
(8, 25, 'Bike track', '2021-11-05 20:30:42', '2021-11-05 20:30:42'),
(9, 25, 'Bicycle trainer', '2021-11-05 20:31:02', '2021-11-05 20:31:02'),
(10, 25, 'Dutch bike men', '2021-11-05 20:31:35', '2021-11-05 20:31:35'),
(12, 25, 'Childrens bikes', '2021-11-05 20:32:34', '2021-11-05 20:32:34'),
(13, 25, 'Cargo bikes', '2021-11-05 20:33:02', '2021-11-05 20:33:02'),
(14, 25, 'Mother child bikes', '2021-11-05 20:33:07', '2021-11-05 20:33:07'),
(15, 25, 'Chain guard', '2021-11-05 20:33:53', '2021-11-05 20:33:53'),
(16, 25, 'Bike chains', '2021-11-05 20:33:59', '2021-11-05 20:33:59'),
(17, 25, 'Mount bikes', '2021-11-05 20:34:10', '2021-11-05 20:34:10'),
(18, 25, 'Scooters', '2021-11-05 20:35:03', '2021-11-05 20:35:03'),
(19, 25, 'E bikes', '2021-11-05 20:35:08', '2021-11-05 20:35:08'),
(20, 25, 'Electronic-bikes', '2021-11-05 20:35:16', '2021-11-05 20:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carousel` tinyint(1) NOT NULL DEFAULT '0',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `car_models_id` bigint(20) NOT NULL,
  `ngjyra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmimi` decimal(8,2) NOT NULL,
  `viti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pershkrimi` varchar(700) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perdoruesi_id` bigint(20) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` json NOT NULL,
  `cnt` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `specs` json DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `emri`, `carousel`, `path`, `created_at`, `updated_at`, `car_models_id`, `ngjyra`, `cmimi`, `viti`, `pershkrimi`, `perdoruesi_id`, `slug`, `url`, `cnt`, `count`, `specs`, `subcategory_id`) VALUES
(22, 'Kids bicycle 15cc', 0, 'uploads/bicycle1.webp', '2021-11-06 16:42:01', '2021-11-10 14:30:43', 25, 'Blue', '199.00', '2018', '', 10, 'kids-bicycle-15cc-22', '[{\"url\": \"uploads/bicyclee.webp\", \"width\": 1280, \"height\": 852}]', 1, 53, '[\"Made in:Germany\", \"Used only one month\", \"For ages:11-14\"]', 4),
(24, 'Iphone 11 Pro', 0, 'uploads/11prooo..webp', '2021-11-08 13:30:47', '2021-11-09 13:24:47', 25, 'gray', '399.00', '2021', '', 10, 'iphone-11-pro-24', '[]', 0, 4, NULL, 4),
(25, '11 pro', 0, 'uploads/11proooo..webp', '2021-11-09 14:15:20', '2021-11-09 14:15:30', 25, 'b', '55.00', '2021', '', 10, '11-pro-25', '[]', 0, 1, NULL, 10),
(26, 'bicycle', 0, 'uploads/bicycle.webp', '2021-11-10 13:32:42', '2021-11-10 13:32:42', 25, 'Red', '55.00', '2021', '', 10, 'bicycle-26', '[]', 0, 0, NULL, 4),
(27, '', 0, 'uploads/10115551hveDHbicycle.webp', '2021-11-10 13:42:27', '2021-11-10 16:40:50', 25, NULL, '0.00', '2021', '', 10, '-27', '[]', 0, 2, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_email_index` (`email`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_models_modeli_index` (`modeli`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currencies_currency_index` (`currency`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_index` (`id`),
  ADD KEY `orders_total_index` (`total`),
  ADD KEY `orders_sasia_index` (`sasia`),
  ADD KEY `orders_emri_index` (`emri`),
  ADD KEY `orders_shteti_index` (`shteti`),
  ADD KEY `orders_adresa_index` (`adresa`),
  ADD KEY `orders_perfunduar_index` (`perfunduar`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perdoruesit_name_index` (`name`),
  ADD KEY `perdoruesit_email_index` (`email`),
  ADD KEY `numri` (`tel`),
  ADD KEY `viber` (`viber`),
  ADD KEY `perdoruesit_online_index` (`online`),
  ADD KEY `perdoruesit_role_index` (`role`),
  ADD KEY `perdoruesit_company_name_index` (`company_name`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_car_models_id_index` (`car_models_id`),
  ADD KEY `subcategories_name_index` (`name`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_emri_index` (`emri`),
  ADD KEY `uploads_path_index` (`path`),
  ADD KEY `uploads_car_models_id_index` (`car_models_id`),
  ADD KEY `uploads_ngjyra_index` (`ngjyra`),
  ADD KEY `uploads_cmimi_index` (`cmimi`),
  ADD KEY `uploads_viti_index` (`viti`),
  ADD KEY `uploads_pershkrimi_index` (`pershkrimi`),
  ADD KEY `uploads_slug_index` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
