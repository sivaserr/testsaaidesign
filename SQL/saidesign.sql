-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2020 at 06:03 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saidesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_no` bigint(11) NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_gst_no_unique` (`gst_no`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `phone_no`, `address`, `company_name`, `gst_no`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Ivisual', 987654321, 'sample', 'sample', 1234567890, 'tamilnadu', '2020-06-01 06:25:41', '2020-06-01 07:48:44'),
(3, 'sai', 987654321, 'sample1', 'sample', 12345677, 'tamilnadu', '2020-06-01 08:12:24', '2020-06-01 08:12:45'),
(4, 'ivisual', 987654321, 'sample', 'sample', 98877, 'tamilnadu', '2020-06-03 09:35:45', '2020-06-03 09:35:45'),
(5, 'ivisual', 987654321, 'sample', 'sample', 5432156, 'tamilnadu', '2020-06-03 09:41:43', '2020-06-03 09:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `tax_amount` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `customer_id`, `sub_total`, `tax`, `tax_amount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, '0', '2020-06-03', 1, 0, 0, 0, 0, NULL, NULL),
(2, 'SAAI/2', '2020-06-03', 1, 12000, 5, 600, 11400, '2020-06-03 02:13:10', '2020-06-03 02:13:10'),
(3, 'SAAI/3', '2020-06-03', 3, 34660, 5, 1733, 32927, '2020-06-03 06:30:06', '2020-06-03 06:30:06'),
(4, 'SAAI/4', '2020-06-03', 3, 12100, 10, 1210, 10890, '2020-06-03 06:31:59', '2020-06-03 06:31:59'),
(5, 'SAAI/5', '2020-06-03', 3, 100, 0, 0, 100, '2020-06-03 10:45:34', '2020-06-03 10:45:34'),
(6, 'SAAI/5', '2020-06-03', 3, 100, 0, 0, 100, '2020-06-03 10:46:13', '2020-06-03 10:46:13'),
(7, 'SAAI/7', '2020-06-04', 4, 100, 0, 0, 100, '2020-06-03 10:47:08', '2020-06-03 10:47:08'),
(8, 'SAAI/8', '2020-06-03', 4, 28900, 0, 0, 28900, '2020-06-03 10:52:41', '2020-06-03 10:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

DROP TABLE IF EXISTS `invoice_products`;
CREATE TABLE IF NOT EXISTS `invoice_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sqrft_copies` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_sqrft_copies` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `netvalue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_products`
--

INSERT INTO `invoice_products` (`id`, `invoice_id`, `description`, `material_id`, `sqrft_copies`, `total_sqrft_copies`, `qty`, `price`, `netvalue`, `created_at`, `updated_at`) VALUES
(1, 2, 'test', '1', '10x10', '100', '10', '10', '10000', '2020-06-03 01:19:34', '2020-06-03 01:19:34'),
(2, 2, 'test', '1', '10x10', '100', '20', '10', '20000', '2020-06-03 01:19:34', '2020-06-03 01:19:34'),
(3, 2, 'ivisual', '1', '10x12', '120', '10', '10', '12000', '2020-06-03 02:13:10', '2020-06-03 02:13:10'),
(4, 3, 'Sai Company', '1', '12x24', '288', '12', '10', '34560', '2020-06-03 06:30:06', '2020-06-03 06:30:06'),
(5, 4, 'Sai Company', '1', '10x12', '120', '10', '10', '12000', '2020-06-03 06:31:59', '2020-06-03 06:31:59'),
(6, 8, 'Sai Company', '4', '0', '0', '10', '10', '100', '2020-06-03 10:52:41', '2020-06-03 10:52:41'),
(7, 8, 'Sai Company', '1', '12x24', '288', '10', '10', '28800', '2020-06-03 10:52:41', '2020-06-03 10:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `material_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsn_code` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `material_name`, `hsn_code`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Visiting Card', 12345, 1, '2020-05-31 05:09:59', '2020-06-01 07:28:52'),
(4, 'Photo', 34556, 2, '2020-06-02 13:17:37', '2020-06-02 13:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_31_060134_create_customers_table', 2),
(4, '2020_05_31_064238_create_materials_table', 2),
(5, '2020_05_31_065820_create_invoices_table', 2),
(6, '2020_06_01_102953_create_units_table', 3),
(7, '2020_06_01_114135_create_customers_table', 4),
(8, '2020_06_02_104216_create_invoices_table', 5),
(9, '2020_06_02_104901_create_invoice_products_table', 5),
(10, '2020_06_02_110409_create_invoice_products_table', 6),
(11, '2020_06_03_072856_create_invoices_tables', 7),
(12, '2020_06_03_073055_create_invoices_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, 'sqrft', '2020-05-31 18:30:00', '2020-05-31 18:30:00'),
(2, 'copies', '2020-05-31 18:30:00', '2020-05-31 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'siva', 'sivabeec95@gmail.com', NULL, '$2y$10$J9as3x6yS61wIqqUrQhyheSwqh1jxvLn4NSt895XhkkdxwLA1UHHG', NULL, '2020-05-29 12:30:34', '2020-05-29 12:30:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
