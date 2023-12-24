-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 11:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `created_at`, `updated_at`) VALUES
(2, 'Larry Dominguez', 'valerie80@cruz-humphrey.com', '+1-243-344-1007x9291', '2021-05-02 03:53:33', '2021-05-02 03:53:33'),
(3, 'Corey Fisher', 'victorosborne@yahoo.com', '780.703.5724', '2022-04-22 18:34:17', '2023-06-24 18:09:53'),
(4, 'Robert Chaney', 'ngonzalez@rivera.biz', '930-604-6595x4453', '2022-04-06 10:58:01', '2023-07-03 03:09:35'),
(5, 'Marilyn Moore', 'parkererica@sharp.info', '+1-900-926-8792', '2021-11-20 02:06:29', '2023-04-30 16:44:33'),
(6, 'Janet Glover', 'marilyn24@yahoo.com', '(737)311-0846', '2021-09-06 07:10:44', '2023-09-27 23:46:52'),
(8, 'Christopher Robinson', 'onelson@logan-woodard.com', '000.890.3745x893', '2021-08-17 06:12:31', '2021-08-17 06:12:31'),
(9, 'Ronald Baxter', 'williamsandrew@burns.com', '570.050.0135', '2020-02-10 16:58:32', '2020-04-28 04:35:27'),
(10, 'Lance Brown', 'robertmorgan@yahoo.com', '107-310-9583x0604', '2020-09-21 20:26:40', '2022-08-14 22:47:50'),
(11, 'Elizabeth Roberson', 'taylordouglas@pena.com', '001-589-766-0219x95124', '2022-10-30 19:37:35', '2022-10-30 19:37:35'),
(12, 'Jacqueline Walter', 'david84@williams.org', '+1-875-821-0554x661', '2022-04-21 18:11:03', '2022-10-08 23:20:19'),
(13, 'Michelle Stuart', 'phylliswalters@nelson.com', '277.090.4865', '2022-10-08 19:35:49', '2022-10-08 19:35:49'),
(14, 'Courtney Brown 123', 'tlester@schmitt-lopez.biz', '524-988-3291x2239', '2022-08-09 18:17:22', '2023-12-24 04:23:17');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_07_23_133550_create_customers', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
