-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2022 at 01:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgmcsoftware_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_classifications`
--

CREATE TABLE `account_classifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_classification_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `financial_statement` enum('BalanceSheet','IncomeStatement') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'products_log', 'created', 'App\\Models\\Products', 1, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-05-15T05:18:50.000000Z\",\"updated_at\":\"2022-05-15T05:18:50.000000Z\"}}', '2022-05-14 22:48:50', '2022-05-14 22:48:50'),
(2, 'products_log', 'created', 'App\\Models\\Products', 2, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-05-15T05:18:50.000000Z\",\"updated_at\":\"2022-05-15T05:18:50.000000Z\"}}', '2022-05-14 22:48:50', '2022-05-14 22:48:50'),
(3, 'customers_log', 'created', 'App\\Models\\Customers', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"U Maung Maung Soe\",\"phone\":\"09123123123\",\"description\":null,\"opening_balance\":\"0\",\"opening_balance_date\":null,\"created_at\":\"2022-05-15T05:30:49.000000Z\",\"updated_at\":\"2022-05-15T05:30:49.000000Z\"}}', '2022-05-14 23:00:49', '2022-05-14 23:00:49'),
(4, 'customers_log', 'created', 'App\\Models\\Customers', 2, 'App\\User', 1, '{\"attributes\":{\"name\":\"U Aung Zaw Win\",\"phone\":\"09123123123\",\"description\":null,\"opening_balance\":\"0\",\"opening_balance_date\":null,\"created_at\":\"2022-05-15T05:32:47.000000Z\",\"updated_at\":\"2022-05-15T05:32:47.000000Z\"}}', '2022-05-14 23:02:47', '2022-05-14 23:02:47'),
(5, 'customers_log', 'updated', 'App\\Models\\Customers', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"U Maung Maung Soe\",\"phone\":\"09123123123\",\"description\":null,\"opening_balance\":\"0\",\"opening_balance_date\":null,\"created_at\":\"2022-05-15T05:30:49.000000Z\",\"updated_at\":\"2022-05-15T05:33:46.000000Z\"},\"old\":{\"name\":\"U Maung Maung Soe\",\"phone\":\"09123123123\",\"description\":null,\"opening_balance\":\"0\",\"opening_balance_date\":null,\"created_at\":\"2022-05-15T05:30:49.000000Z\",\"updated_at\":\"2022-05-15T05:30:49.000000Z\"}}', '2022-05-14 23:03:46', '2022-05-14 23:03:46'),
(6, 'customers_log', 'updated', 'App\\Models\\Customers', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"U Maung Maung Soe\",\"phone\":\"09123123123\",\"description\":null,\"opening_balance\":\"0\",\"opening_balance_date\":null,\"created_at\":\"2022-05-15T05:30:49.000000Z\",\"updated_at\":\"2022-05-15T05:34:28.000000Z\"},\"old\":{\"name\":\"U Maung Maung Soe\",\"phone\":\"09123123123\",\"description\":null,\"opening_balance\":\"0\",\"opening_balance_date\":null,\"created_at\":\"2022-05-15T05:30:49.000000Z\",\"updated_at\":\"2022-05-15T05:33:46.000000Z\"}}', '2022-05-14 23:04:28', '2022-05-14 23:04:28'),
(7, 'customers_log', 'updated', 'App\\Models\\Customers', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"U Maung Maung Soe\",\"phone\":\"09123123123\",\"description\":null,\"opening_balance\":\"0\",\"opening_balance_date\":null,\"created_at\":\"2022-05-15T05:30:49.000000Z\",\"updated_at\":\"2022-05-15T05:34:45.000000Z\"},\"old\":{\"name\":\"U Maung Maung Soe\",\"phone\":\"09123123123\",\"description\":null,\"opening_balance\":\"0\",\"opening_balance_date\":null,\"created_at\":\"2022-05-15T05:30:49.000000Z\",\"updated_at\":\"2022-05-15T05:34:28.000000Z\"}}', '2022-05-14 23:04:45', '2022-05-14 23:04:45'),
(8, 'customers_log', 'updated', 'App\\Models\\Customers', 2, 'App\\User', 1, '{\"attributes\":{\"name\":\"U Aung Zaw Win\",\"phone\":\"09123123123\",\"description\":null,\"opening_balance\":\"0\",\"opening_balance_date\":null,\"created_at\":\"2022-05-15T05:32:47.000000Z\",\"updated_at\":\"2022-05-15T05:35:50.000000Z\"},\"old\":{\"name\":\"U Aung Zaw Win\",\"phone\":\"09123123123\",\"description\":null,\"opening_balance\":\"0\",\"opening_balance_date\":null,\"created_at\":\"2022-05-15T05:32:47.000000Z\",\"updated_at\":\"2022-05-15T05:32:47.000000Z\"}}', '2022-05-14 23:05:50', '2022-05-14 23:05:50'),
(9, 'departments_log', 'created', 'App\\Models\\Department', 1, 'App\\User', 1, '{\"attributes\":{\"title\":\"Admin\",\"created_at\":\"2022-05-15T06:36:25.000000Z\",\"updated_at\":\"2022-05-15T06:36:25.000000Z\"}}', '2022-05-15 00:06:25', '2022-05-15 00:06:25'),
(10, 'departments_log', 'created', 'App\\Models\\Department', 2, 'App\\User', 1, '{\"attributes\":{\"title\":\"Purchase\",\"created_at\":\"2022-05-15T06:36:31.000000Z\",\"updated_at\":\"2022-05-15T06:36:31.000000Z\"}}', '2022-05-15 00:06:31', '2022-05-15 00:06:31'),
(11, 'departments_log', 'created', 'App\\Models\\Department', 3, 'App\\User', 1, '{\"attributes\":{\"title\":\"Sale\",\"created_at\":\"2022-05-15T06:36:34.000000Z\",\"updated_at\":\"2022-05-15T06:36:34.000000Z\"}}', '2022-05-15 00:06:34', '2022-05-15 00:06:34'),
(12, 'users_log', 'created', 'App\\User', 3, 'App\\User', 1, '{\"attributes\":{\"name\":\"Ma May Myat Mon\",\"email\":\"mamaymyatmon@gmail.com\",\"employee_id\":\"EMP-00001\",\"phone\":\"0912312312\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":3,\"created_at\":\"2022-05-15T06:38:07.000000Z\",\"updated_at\":\"2022-05-15T06:38:07.000000Z\"}}', '2022-05-15 00:08:07', '2022-05-15 00:08:07'),
(13, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-01T02:17:14.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-05-12T16:41:42.000000Z\"}}', '2022-05-31 19:47:14', '2022-05-31 19:47:14'),
(14, 'products_log', 'created', 'App\\Models\\Products', 3, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-01T02:19:12.000000Z\",\"updated_at\":\"2022-06-01T02:19:12.000000Z\"}}', '2022-05-31 19:49:12', '2022-05-31 19:49:12'),
(15, 'products_log', 'created', 'App\\Models\\Products', 4, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-01T02:19:12.000000Z\",\"updated_at\":\"2022-06-01T02:19:12.000000Z\"}}', '2022-05-31 19:49:12', '2022-05-31 19:49:12'),
(16, 'products_log', 'created', 'App\\Models\\Products', 5, 'App\\User', 1, '{\"attributes\":{\"product\":\"Car\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-01T02:24:31.000000Z\",\"updated_at\":\"2022-06-01T02:24:31.000000Z\"}}', '2022-05-31 19:54:31', '2022-05-31 19:54:31'),
(17, 'products_log', 'created', 'App\\Models\\Products', 6, 'App\\User', 1, '{\"attributes\":{\"product\":\"Car\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-01T02:26:06.000000Z\",\"updated_at\":\"2022-06-01T02:26:06.000000Z\"}}', '2022-05-31 19:56:06', '2022-05-31 19:56:06'),
(18, 'products_log', 'deleted', 'App\\Models\\Products', 6, 'App\\User', 1, '{\"attributes\":{\"product\":\"Car\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-01T02:26:06.000000Z\",\"updated_at\":\"2022-06-01T02:26:06.000000Z\"}}', '2022-05-31 19:56:19', '2022-05-31 19:56:19'),
(19, 'products_log', 'deleted', 'App\\Models\\Products', 5, 'App\\User', 1, '{\"attributes\":{\"product\":\"Car\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-01T02:24:31.000000Z\",\"updated_at\":\"2022-06-01T02:24:31.000000Z\"}}', '2022-05-31 19:56:30', '2022-05-31 19:56:30'),
(20, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-01T13:44:46.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-01T02:17:14.000000Z\"}}', '2022-06-01 07:14:47', '2022-06-01 07:14:47'),
(21, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-01T14:47:44.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-01T13:44:46.000000Z\"}}', '2022-06-01 08:17:44', '2022-06-01 08:17:44'),
(22, 'customers_log', 'created', 'App\\Models\\Customers', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"MGM\",\"phone\":\"09\",\"description\":null,\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:12:28.000000Z\"}}', '2022-06-01 08:42:28', '2022-06-01 08:42:28'),
(23, 'customers_log', 'updated', 'App\\Models\\Customers', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"MGM\",\"phone\":\"09\",\"description\":\"Ok\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:23:03.000000Z\"},\"old\":{\"name\":\"MGM\",\"phone\":\"09\",\"description\":null,\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:12:28.000000Z\"}}', '2022-06-01 08:53:03', '2022-06-01 08:53:03'),
(24, 'customers_log', 'updated', 'App\\Models\\Customers', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"MGM\",\"phone\":\"09\",\"description\":\"Ok\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:23:07.000000Z\"},\"old\":{\"name\":\"MGM\",\"phone\":\"09\",\"description\":\"Ok\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:23:03.000000Z\"}}', '2022-06-01 08:53:07', '2022-06-01 08:53:07'),
(25, 'customers_log', 'created', 'App\\Models\\Customers', 3, 'App\\User', 1, '{\"attributes\":{\"name\":\"Mg Mg\",\"phone\":\"09444161554\",\"description\":\"Ok\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:41:30.000000Z\",\"updated_at\":\"2022-06-01T15:41:30.000000Z\"}}', '2022-06-01 09:11:30', '2022-06-01 09:11:30'),
(26, 'customers_log', 'created', 'App\\Models\\Customers', 4, 'App\\User', 1, '{\"attributes\":{\"name\":\"U Soe\",\"phone\":\"091231311\",\"description\":\"Hello\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:42:39.000000Z\",\"updated_at\":\"2022-06-01T15:42:39.000000Z\"}}', '2022-06-01 09:12:39', '2022-06-01 09:12:39'),
(27, 'customers_log', 'created', 'App\\Models\\Customers', 5, 'App\\User', 1, '{\"attributes\":{\"name\":\"Mg Mg\",\"phone\":\"askf\",\"description\":\"as\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:43:55.000000Z\",\"updated_at\":\"2022-06-01T15:43:55.000000Z\"}}', '2022-06-01 09:13:55', '2022-06-01 09:13:55'),
(28, 'customers_log', 'updated', 'App\\Models\\Customers', 2, 'App\\User', 1, '{\"attributes\":{\"name\":\"HP\",\"phone\":\"09\",\"description\":\"Ok\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:51:30.000000Z\"},\"old\":{\"name\":\"HP\",\"phone\":\"09\",\"description\":\"Ok\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:23:07.000000Z\"}}', '2022-06-01 09:21:30', '2022-06-01 09:21:30'),
(29, 'customers_log', 'updated', 'App\\Models\\Customers', 2, 'App\\User', 1, '{\"attributes\":{\"name\":\"HP Customer\",\"phone\":\"09\",\"description\":\"Ok\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:51:39.000000Z\"},\"old\":{\"name\":\"HP\",\"phone\":\"09\",\"description\":\"Ok\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:51:30.000000Z\"}}', '2022-06-01 09:21:39', '2022-06-01 09:21:39'),
(30, 'customers_log', 'updated', 'App\\Models\\Customers', 5, 'App\\User', 1, '{\"attributes\":{\"name\":\"Mg Mg\",\"phone\":\"askf\",\"description\":\"as\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:43:55.000000Z\",\"updated_at\":\"2022-06-01T15:56:32.000000Z\"},\"old\":{\"name\":\"Mg Mg\",\"phone\":\"askf\",\"description\":\"as\",\"opening_balance\":null,\"opening_balance_date\":null,\"created_at\":\"2022-06-01T15:43:55.000000Z\",\"updated_at\":\"2022-06-01T15:43:55.000000Z\"}}', '2022-06-01 09:26:32', '2022-06-01 09:26:32'),
(31, 'customers_log', 'updated', 'App\\Models\\Customers', 5, 'App\\User', 1, '{\"attributes\":{\"name\":\"Mg Mg\",\"company_name\":\"Mg Mg\",\"dealer_code\":null,\"city\":\"YGN\",\"address\":\"kasdf\",\"phone\":\"askf\",\"description\":\"as\",\"created_at\":\"2022-06-01T15:43:55.000000Z\",\"updated_at\":\"2022-06-01T15:58:08.000000Z\"},\"old\":{\"name\":\"Mg Mg\",\"company_name\":\"Mg Mg\",\"dealer_code\":null,\"city\":\"YGN\",\"address\":\"kasdf\",\"phone\":\"askf\",\"description\":\"as\",\"created_at\":\"2022-06-01T15:43:55.000000Z\",\"updated_at\":\"2022-06-01T15:56:32.000000Z\"}}', '2022-06-01 09:28:08', '2022-06-01 09:28:08'),
(32, 'customers_log', 'updated', 'App\\Models\\Customers', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"MGM SOE\",\"company_name\":\"Karry Show room (ASE)\",\"dealer_code\":\"MGM-001-YGN-Karry1\",\"city\":\"Yangon\",\"address\":\"Yangon City\",\"phone\":\"09\",\"description\":\"Ok\",\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:59:52.000000Z\"},\"old\":{\"name\":\"MGM\",\"company_name\":\"Karry Show room (ASE)\",\"dealer_code\":\"MGM-001-YGN-Karry1\",\"city\":\"Yangon\",\"address\":\"Yangon City\",\"phone\":\"09\",\"description\":\"Ok\",\"created_at\":\"2022-06-01T15:12:28.000000Z\",\"updated_at\":\"2022-06-01T15:23:07.000000Z\"}}', '2022-06-01 09:29:52', '2022-06-01 09:29:52'),
(33, 'customers_log', 'created', 'App\\Models\\Customers', 6, 'App\\User', 1, '{\"attributes\":{\"name\":\"MGM\",\"company_name\":\"Karry Show room (Head Office)\",\"dealer_code\":\"MGM-002-YGN-MGM\",\"city\":\"Yangon\",\"address\":null,\"phone\":null,\"description\":null,\"created_at\":\"2022-06-01T04:15:44.000000Z\",\"updated_at\":\"2022-06-01T04:15:44.000000Z\"}}', '2022-06-01 09:45:44', '2022-06-01 09:45:44'),
(34, 'suppliers_log', 'created', 'App\\Models\\Supplier', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Chery Commercial Vehicle(Anhui) Company Limited\",\"company\":null,\"phone\":\"959\",\"description\":null,\"created_at\":\"2022-06-01T04:48:19.000000Z\",\"updated_at\":\"2022-06-01T04:48:19.000000Z\"}}', '2022-06-01 10:18:19', '2022-06-01 10:18:19'),
(35, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-02T01:51:29.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-01T14:47:44.000000Z\"}}', '2022-06-01 19:21:29', '2022-06-01 19:21:29'),
(36, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-02T07:38:11.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-02T01:51:29.000000Z\"}}', '2022-06-02 01:08:11', '2022-06-02 01:08:11'),
(37, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-03T04:30:28.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-02T07:38:11.000000Z\"}}', '2022-06-02 22:00:28', '2022-06-02 22:00:28'),
(38, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-03T09:00:47.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-03T04:30:28.000000Z\"}}', '2022-06-03 02:30:47', '2022-06-03 02:30:47'),
(39, 'products_log', 'created', 'App\\Models\\Products', 7, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(40, 'products_log', 'created', 'App\\Models\\Products', 8, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(41, 'products_log', 'created', 'App\\Models\\Products', 9, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(42, 'products_log', 'created', 'App\\Models\\Products', 10, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(43, 'products_log', 'created', 'App\\Models\\Products', 11, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(44, 'products_log', 'created', 'App\\Models\\Products', 12, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(45, 'products_log', 'created', 'App\\Models\\Products', 13, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(46, 'products_log', 'created', 'App\\Models\\Products', 14, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(47, 'products_log', 'created', 'App\\Models\\Products', 15, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(48, 'products_log', 'created', 'App\\Models\\Products', 16, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(49, 'products_log', 'created', 'App\\Models\\Products', 17, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(50, 'products_log', 'created', 'App\\Models\\Products', 18, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(51, 'products_log', 'created', 'App\\Models\\Products', 19, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(52, 'products_log', 'created', 'App\\Models\\Products', 20, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(53, 'products_log', 'created', 'App\\Models\\Products', 21, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(54, 'products_log', 'created', 'App\\Models\\Products', 22, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(55, 'products_log', 'created', 'App\\Models\\Products', 23, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(56, 'products_log', 'created', 'App\\Models\\Products', 24, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(57, 'products_log', 'created', 'App\\Models\\Products', 25, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(58, 'products_log', 'created', 'App\\Models\\Products', 26, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(59, 'products_log', 'created', 'App\\Models\\Products', 27, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(60, 'products_log', 'created', 'App\\Models\\Products', 28, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(61, 'products_log', 'created', 'App\\Models\\Products', 29, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(62, 'products_log', 'created', 'App\\Models\\Products', 30, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:01:30.000000Z\",\"updated_at\":\"2022-06-03T09:01:30.000000Z\"}}', '2022-06-03 02:31:30', '2022-06-03 02:31:30'),
(63, 'products_log', 'created', 'App\\Models\\Products', 1, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(64, 'products_log', 'created', 'App\\Models\\Products', 2, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(65, 'products_log', 'created', 'App\\Models\\Products', 3, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(66, 'products_log', 'created', 'App\\Models\\Products', 4, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(67, 'products_log', 'created', 'App\\Models\\Products', 5, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(68, 'products_log', 'created', 'App\\Models\\Products', 6, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(69, 'products_log', 'created', 'App\\Models\\Products', 7, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(70, 'products_log', 'created', 'App\\Models\\Products', 8, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(71, 'products_log', 'created', 'App\\Models\\Products', 9, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(72, 'products_log', 'created', 'App\\Models\\Products', 10, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(73, 'products_log', 'created', 'App\\Models\\Products', 11, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(74, 'products_log', 'created', 'App\\Models\\Products', 12, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(75, 'products_log', 'created', 'App\\Models\\Products', 13, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(76, 'products_log', 'created', 'App\\Models\\Products', 14, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(77, 'products_log', 'created', 'App\\Models\\Products', 15, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(78, 'products_log', 'created', 'App\\Models\\Products', 16, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(79, 'products_log', 'created', 'App\\Models\\Products', 17, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(80, 'products_log', 'created', 'App\\Models\\Products', 18, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(81, 'products_log', 'created', 'App\\Models\\Products', 19, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(82, 'products_log', 'created', 'App\\Models\\Products', 20, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(83, 'products_log', 'created', 'App\\Models\\Products', 21, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(84, 'products_log', 'created', 'App\\Models\\Products', 22, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(85, 'products_log', 'created', 'App\\Models\\Products', 23, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(86, 'products_log', 'created', 'App\\Models\\Products', 24, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:02:40.000000Z\",\"updated_at\":\"2022-06-03T09:02:40.000000Z\"}}', '2022-06-03 02:32:40', '2022-06-03 02:32:40'),
(87, 'products_log', 'created', 'App\\Models\\Products', 25, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(88, 'products_log', 'created', 'App\\Models\\Products', 26, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(89, 'products_log', 'created', 'App\\Models\\Products', 27, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(90, 'products_log', 'created', 'App\\Models\\Products', 28, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(91, 'products_log', 'created', 'App\\Models\\Products', 29, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(92, 'products_log', 'created', 'App\\Models\\Products', 30, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(93, 'products_log', 'created', 'App\\Models\\Products', 31, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(94, 'products_log', 'created', 'App\\Models\\Products', 32, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(95, 'products_log', 'created', 'App\\Models\\Products', 33, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(96, 'products_log', 'created', 'App\\Models\\Products', 34, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(97, 'products_log', 'created', 'App\\Models\\Products', 35, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(98, 'products_log', 'created', 'App\\Models\\Products', 36, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(99, 'products_log', 'created', 'App\\Models\\Products', 37, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(100, 'products_log', 'created', 'App\\Models\\Products', 38, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(101, 'products_log', 'created', 'App\\Models\\Products', 39, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(102, 'products_log', 'created', 'App\\Models\\Products', 40, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(103, 'products_log', 'created', 'App\\Models\\Products', 41, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(104, 'products_log', 'created', 'App\\Models\\Products', 42, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(105, 'products_log', 'created', 'App\\Models\\Products', 43, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(106, 'products_log', 'created', 'App\\Models\\Products', 44, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(107, 'products_log', 'created', 'App\\Models\\Products', 45, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(108, 'products_log', 'created', 'App\\Models\\Products', 46, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(109, 'products_log', 'created', 'App\\Models\\Products', 47, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(110, 'products_log', 'created', 'App\\Models\\Products', 48, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:45.000000Z\",\"updated_at\":\"2022-06-03T09:17:45.000000Z\"}}', '2022-06-03 02:47:45', '2022-06-03 02:47:45'),
(111, 'products_log', 'created', 'App\\Models\\Products', 49, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(112, 'products_log', 'created', 'App\\Models\\Products', 50, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(113, 'products_log', 'created', 'App\\Models\\Products', 51, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(114, 'products_log', 'created', 'App\\Models\\Products', 52, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(115, 'products_log', 'created', 'App\\Models\\Products', 53, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(116, 'products_log', 'created', 'App\\Models\\Products', 54, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(117, 'products_log', 'created', 'App\\Models\\Products', 55, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(118, 'products_log', 'created', 'App\\Models\\Products', 56, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(119, 'products_log', 'created', 'App\\Models\\Products', 57, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(120, 'products_log', 'created', 'App\\Models\\Products', 58, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(121, 'products_log', 'created', 'App\\Models\\Products', 59, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(122, 'products_log', 'created', 'App\\Models\\Products', 60, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(123, 'products_log', 'created', 'App\\Models\\Products', 61, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(124, 'products_log', 'created', 'App\\Models\\Products', 62, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(125, 'products_log', 'created', 'App\\Models\\Products', 63, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(126, 'products_log', 'created', 'App\\Models\\Products', 64, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(127, 'products_log', 'created', 'App\\Models\\Products', 65, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(128, 'products_log', 'created', 'App\\Models\\Products', 66, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(129, 'products_log', 'created', 'App\\Models\\Products', 67, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(130, 'products_log', 'created', 'App\\Models\\Products', 68, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(131, 'products_log', 'created', 'App\\Models\\Products', 69, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(132, 'products_log', 'created', 'App\\Models\\Products', 70, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(133, 'products_log', 'created', 'App\\Models\\Products', 71, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(134, 'products_log', 'created', 'App\\Models\\Products', 72, 'App\\User', 1, '{\"attributes\":{\"product\":null,\"brand_id\":null,\"brand_name\":null,\"quantity\":null,\"created_at\":\"2022-06-03T09:17:58.000000Z\",\"updated_at\":\"2022-06-03T09:17:58.000000Z\"}}', '2022-06-03 02:47:58', '2022-06-03 02:47:58'),
(135, 'products_log', 'created', 'App\\Models\\Products', 73, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(136, 'products_log', 'created', 'App\\Models\\Products', 74, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(137, 'products_log', 'created', 'App\\Models\\Products', 75, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(138, 'products_log', 'created', 'App\\Models\\Products', 76, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(139, 'products_log', 'created', 'App\\Models\\Products', 77, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(140, 'products_log', 'created', 'App\\Models\\Products', 78, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(141, 'products_log', 'created', 'App\\Models\\Products', 79, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(142, 'products_log', 'created', 'App\\Models\\Products', 80, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(143, 'products_log', 'created', 'App\\Models\\Products', 81, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(144, 'products_log', 'created', 'App\\Models\\Products', 82, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(145, 'products_log', 'created', 'App\\Models\\Products', 83, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(146, 'products_log', 'created', 'App\\Models\\Products', 84, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(147, 'products_log', 'created', 'App\\Models\\Products', 85, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(148, 'products_log', 'created', 'App\\Models\\Products', 86, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(149, 'products_log', 'created', 'App\\Models\\Products', 87, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(150, 'products_log', 'created', 'App\\Models\\Products', 88, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(151, 'products_log', 'created', 'App\\Models\\Products', 89, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(152, 'products_log', 'created', 'App\\Models\\Products', 90, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(153, 'products_log', 'created', 'App\\Models\\Products', 91, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(154, 'products_log', 'created', 'App\\Models\\Products', 92, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(155, 'products_log', 'created', 'App\\Models\\Products', 93, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(156, 'products_log', 'created', 'App\\Models\\Products', 94, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(157, 'products_log', 'created', 'App\\Models\\Products', 95, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(158, 'products_log', 'created', 'App\\Models\\Products', 96, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:27.000000Z\",\"updated_at\":\"2022-06-03T09:33:27.000000Z\"}}', '2022-06-03 03:03:27', '2022-06-03 03:03:27'),
(159, 'products_log', 'created', 'App\\Models\\Products', 1, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(160, 'products_log', 'created', 'App\\Models\\Products', 2, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(161, 'products_log', 'created', 'App\\Models\\Products', 3, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(162, 'products_log', 'created', 'App\\Models\\Products', 4, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(163, 'products_log', 'created', 'App\\Models\\Products', 5, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(164, 'products_log', 'created', 'App\\Models\\Products', 6, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(165, 'products_log', 'created', 'App\\Models\\Products', 7, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(166, 'products_log', 'created', 'App\\Models\\Products', 8, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(167, 'products_log', 'created', 'App\\Models\\Products', 9, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(168, 'products_log', 'created', 'App\\Models\\Products', 10, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(169, 'products_log', 'created', 'App\\Models\\Products', 11, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(170, 'products_log', 'created', 'App\\Models\\Products', 12, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22B\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(171, 'products_log', 'created', 'App\\Models\\Products', 13, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(172, 'products_log', 'created', 'App\\Models\\Products', 14, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(173, 'products_log', 'created', 'App\\Models\\Products', 15, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(174, 'products_log', 'created', 'App\\Models\\Products', 16, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:56.000000Z\",\"updated_at\":\"2022-06-03T09:33:56.000000Z\"}}', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(175, 'products_log', 'created', 'App\\Models\\Products', 17, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:57.000000Z\",\"updated_at\":\"2022-06-03T09:33:57.000000Z\"}}', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(176, 'products_log', 'created', 'App\\Models\\Products', 18, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:57.000000Z\",\"updated_at\":\"2022-06-03T09:33:57.000000Z\"}}', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(177, 'products_log', 'created', 'App\\Models\\Products', 19, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:57.000000Z\",\"updated_at\":\"2022-06-03T09:33:57.000000Z\"}}', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(178, 'products_log', 'created', 'App\\Models\\Products', 20, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:57.000000Z\",\"updated_at\":\"2022-06-03T09:33:57.000000Z\"}}', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(179, 'products_log', 'created', 'App\\Models\\Products', 21, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:57.000000Z\",\"updated_at\":\"2022-06-03T09:33:57.000000Z\"}}', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(180, 'products_log', 'created', 'App\\Models\\Products', 22, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:57.000000Z\",\"updated_at\":\"2022-06-03T09:33:57.000000Z\"}}', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(181, 'products_log', 'created', 'App\\Models\\Products', 23, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:57.000000Z\",\"updated_at\":\"2022-06-03T09:33:57.000000Z\"}}', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(182, 'products_log', 'created', 'App\\Models\\Products', 24, 'App\\User', 1, '{\"attributes\":{\"product\":\"Q22D\",\"brand_id\":null,\"brand_name\":\"Karry\",\"quantity\":\"1\",\"created_at\":\"2022-06-03T09:33:57.000000Z\",\"updated_at\":\"2022-06-03T09:33:57.000000Z\"}}', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(183, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-04T03:12:52.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-03T09:00:47.000000Z\"}}', '2022-06-03 20:42:52', '2022-06-03 20:42:52'),
(184, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-04T10:38:58.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-04T03:12:52.000000Z\"}}', '2022-06-04 04:08:58', '2022-06-04 04:08:58'),
(185, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-05T01:58:11.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-04T10:38:58.000000Z\"}}', '2022-06-04 19:28:11', '2022-06-04 19:28:11'),
(186, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-05T07:36:21.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-05T01:58:11.000000Z\"}}', '2022-06-05 01:06:21', '2022-06-05 01:06:21'),
(187, 'sales_journals', 'created', 'App\\Models\\SalesJournal', 3, 'App\\User', 1, '{\"attributes\":{\"sales_journal_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":4,\"post_ref\":\"AR-2\",\"debited\":\"56800000\",\"credited\":\"56800000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T08:57:43.000000Z\",\"updated_at\":\"2022-06-05T08:57:43.000000Z\"}}', '2022-06-05 02:27:43', '2022-06-05 02:27:43'),
(188, 'sales_journals', 'updated', 'App\\Models\\SalesJournal', 3, 'App\\User', 1, '{\"attributes\":{\"sales_journal_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":4,\"post_ref\":\"AR-3\",\"debited\":\"56800000\",\"credited\":\"56800000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T08:57:43.000000Z\",\"updated_at\":\"2022-06-05T08:58:05.000000Z\"},\"old\":{\"sales_journal_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":4,\"post_ref\":\"AR-2\",\"debited\":\"56800000\",\"credited\":\"56800000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T08:57:43.000000Z\",\"updated_at\":\"2022-06-05T08:57:43.000000Z\"}}', '2022-06-05 02:28:05', '2022-06-05 02:28:05'),
(189, 'sales_journals', 'created', 'App\\Models\\SalesJournal', 4, 'App\\User', 1, '{\"attributes\":{\"sales_journal_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":1,\"post_ref\":\"AR-2\",\"debited\":\"0\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T09:28:58.000000Z\",\"updated_at\":\"2022-06-05T09:28:58.000000Z\"}}', '2022-06-05 02:58:58', '2022-06-05 02:58:58'),
(190, 'sales_journals', 'updated', 'App\\Models\\SalesJournal', 3, 'App\\User', 1, '{\"attributes\":{\"sales_journal_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":4,\"post_ref\":\"AR-2\",\"debited\":\"56800000\",\"credited\":\"56800000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T08:57:43.000000Z\",\"updated_at\":\"2022-06-05T10:42:32.000000Z\"},\"old\":{\"sales_journal_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":4,\"post_ref\":\"AR-3\",\"debited\":\"56800000\",\"credited\":\"56800000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T08:57:43.000000Z\",\"updated_at\":\"2022-06-05T08:58:05.000000Z\"}}', '2022-06-05 04:12:32', '2022-06-05 04:12:32'),
(191, 'cash_collections_log', 'updated', 'App\\Models\\CashCollection', 1, 'App\\User', 1, '{\"attributes\":{\"cash_collection_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":4,\"sales_journal_id\":3,\"cash_debited\":\"56800000\",\"sale_discount_debited\":\"0\",\"credited\":\"56800000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T10:51:37.000000Z\",\"updated_at\":\"2022-06-05T11:08:27.000000Z\"},\"old\":{\"cash_collection_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":1,\"sales_journal_id\":1,\"cash_debited\":\"38500000\",\"sale_discount_debited\":\"0\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T10:51:37.000000Z\",\"updated_at\":\"2022-06-05T10:51:37.000000Z\"}}', '2022-06-05 04:38:27', '2022-06-05 04:38:27'),
(192, 'cash_collections_log', 'updated', 'App\\Models\\CashCollection', 1, 'App\\User', 1, '{\"attributes\":{\"cash_collection_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":1,\"sales_journal_id\":1,\"cash_debited\":\"38500000\",\"sale_discount_debited\":\"0\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T10:51:37.000000Z\",\"updated_at\":\"2022-06-05T11:08:39.000000Z\"},\"old\":{\"cash_collection_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":4,\"sales_journal_id\":3,\"cash_debited\":\"56800000\",\"sale_discount_debited\":\"0\",\"credited\":\"56800000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T10:51:37.000000Z\",\"updated_at\":\"2022-06-05T11:08:27.000000Z\"}}', '2022-06-05 04:38:39', '2022-06-05 04:38:39'),
(193, 'cash_collections_log', 'created', 'App\\Models\\CashCollection', 3, 'App\\User', 1, '{\"attributes\":{\"cash_collection_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":1,\"sales_journal_id\":1,\"cash_debited\":\"38500000\",\"sale_discount_debited\":\"1000\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T11:08:55.000000Z\",\"updated_at\":\"2022-06-05T11:08:55.000000Z\"}}', '2022-06-05 04:38:55', '2022-06-05 04:38:55'),
(194, 'cash_collections_log', 'updated', 'App\\Models\\CashCollection', 3, 'App\\User', 1, '{\"attributes\":{\"cash_collection_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":1,\"sales_journal_id\":1,\"cash_debited\":\"38500000\",\"sale_discount_debited\":\"2000\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T11:08:55.000000Z\",\"updated_at\":\"2022-06-05T11:10:15.000000Z\"},\"old\":{\"cash_collection_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":1,\"sales_journal_id\":1,\"cash_debited\":\"38500000\",\"sale_discount_debited\":\"1000\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T11:08:55.000000Z\",\"updated_at\":\"2022-06-05T11:08:55.000000Z\"}}', '2022-06-05 04:40:15', '2022-06-05 04:40:15'),
(195, 'cash_collections_log', 'updated', 'App\\Models\\CashCollection', 3, 'App\\User', 1, '{\"attributes\":{\"cash_collection_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":1,\"sales_journal_id\":1,\"cash_debited\":\"38500000\",\"sale_discount_debited\":\"0\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T11:08:55.000000Z\",\"updated_at\":\"2022-06-05T11:10:21.000000Z\"},\"old\":{\"cash_collection_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":1,\"sales_journal_id\":1,\"cash_debited\":\"38500000\",\"sale_discount_debited\":\"2000\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T11:08:55.000000Z\",\"updated_at\":\"2022-06-05T11:10:15.000000Z\"}}', '2022-06-05 04:40:21', '2022-06-05 04:40:21'),
(196, 'cash_collections_log', 'deleted', 'App\\Models\\CashCollection', 3, 'App\\User', 1, '{\"attributes\":{\"cash_collection_date\":\"2022-06-05\",\"customer_id\":1,\"sales_invoice_id\":1,\"sales_journal_id\":1,\"cash_debited\":\"38500000\",\"sale_discount_debited\":\"0\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-05T11:08:55.000000Z\",\"updated_at\":\"2022-06-05T11:10:21.000000Z\"}}', '2022-06-05 04:40:53', '2022-06-05 04:40:53'),
(197, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-06T04:59:36.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-05T07:36:21.000000Z\"}}', '2022-06-05 22:29:36', '2022-06-05 22:29:36'),
(198, 'sales_journals', 'created', 'App\\Models\\SalesJournal', 1, 'App\\User', 1, '{\"attributes\":{\"sales_journal_date\":\"2022-06-06\",\"customer_id\":1,\"sales_invoice_id\":1,\"post_ref\":\"R-1\",\"debited\":\"38500000\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-06T06:09:28.000000Z\",\"updated_at\":\"2022-06-06T06:09:28.000000Z\"}}', '2022-06-05 23:39:28', '2022-06-05 23:39:28'),
(199, 'sales_journals', 'created', 'App\\Models\\SalesJournal', 2, 'App\\User', 1, '{\"attributes\":{\"sales_journal_date\":\"2022-06-06\",\"customer_id\":1,\"sales_invoice_id\":4,\"post_ref\":\"R-2\",\"debited\":\"56800000\",\"credited\":\"56800000\",\"user_id\":\"1\",\"created_at\":\"2022-06-06T06:09:44.000000Z\",\"updated_at\":\"2022-06-06T06:09:44.000000Z\"}}', '2022-06-05 23:39:45', '2022-06-05 23:39:45'),
(200, 'cash_collections_log', 'created', 'App\\Models\\CashCollection', 1, 'App\\User', 1, '{\"attributes\":{\"cash_collection_date\":\"2022-06-06\",\"customer_id\":1,\"sales_invoice_id\":1,\"sales_journal_id\":1,\"cash_debited\":\"38500000\",\"sale_discount_debited\":\"0\",\"credited\":\"38500000\",\"user_id\":\"1\",\"created_at\":\"2022-06-06T06:10:09.000000Z\",\"updated_at\":\"2022-06-06T06:10:09.000000Z\"}}', '2022-06-05 23:40:09', '2022-06-05 23:40:09'),
(201, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-08T04:05:06.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-06T04:59:36.000000Z\"}}', '2022-06-07 21:35:06', '2022-06-07 21:35:06'),
(202, 'sales_invoices_log', 'created', 'App\\Models\\SalesInvoices', 2, 'App\\User', 1, '{\"attributes\":{\"customer_id\":2,\"id_no\":\"Hanteng-2020-0002\",\"invoice_no\":\"Hanteng-2020-0002\",\"invoice_date\":\"2022-06-08\",\"showroom_name\":\"MGM\",\"sales_type\":\"1 Year\",\"payment_team\":\"1 Year\",\"sales_persons_id\":3,\"delivery_date\":\"2022-06-08\",\"user_id\":1,\"created_at\":\"2022-06-08T08:25:51.000000Z\",\"updated_at\":\"2022-06-08T08:25:51.000000Z\"}}', '2022-06-08 01:55:51', '2022-06-08 01:55:51'),
(203, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-07-01T03:33:45.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-06-08T04:05:06.000000Z\"}}', '2022-06-30 21:03:45', '2022-06-30 21:03:45'),
(204, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-07-01T05:04:12.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-07-01T03:33:45.000000Z\"}}', '2022-06-30 22:34:12', '2022-06-30 22:34:12'),
(205, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-07-01T09:25:54.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-07-01T05:04:12.000000Z\"}}', '2022-07-01 02:55:54', '2022-07-01 02:55:54'),
(206, 'sales_invoices_log', 'created', 'App\\Models\\SalesInvoices', 3, 'App\\User', 1, '{\"attributes\":{\"customer_id\":1,\"id_no\":\"ID-00001\",\"invoice_no\":\"INV-00001\",\"invoice_date\":\"2022-07-01\",\"showroom_name\":\"MGM\",\"sales_type\":\"1 Year\",\"payment_team\":\"1 Year\",\"sales_persons_id\":3,\"delivery_date\":\"2022-07-01\",\"user_id\":1,\"created_at\":\"2022-07-01T09:39:02.000000Z\",\"updated_at\":\"2022-07-01T09:39:02.000000Z\"}}', '2022-07-01 03:09:02', '2022-07-01 03:09:02'),
(207, 'users_log', 'updated', 'App\\User', 1, 'App\\User', 1, '{\"attributes\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-07-02T03:02:51.000000Z\"},\"old\":{\"name\":\"Dev Test\",\"email\":\"developer@gmail.com\",\"employee_id\":\"EMP-0001\",\"phone\":\"09444161997\",\"nrc_number\":null,\"address\":\"YGN\",\"department_id\":1,\"created_at\":\"2022-03-28T17:58:34.000000Z\",\"updated_at\":\"2022-07-01T09:25:54.000000Z\"}}', '2022-07-01 20:32:51', '2022-07-01 20:32:51'),
(208, 'sales_journals', 'created', 'App\\Models\\SalesJournal', 3, 'App\\User', 1, '{\"attributes\":{\"sales_journal_date\":\"2022-07-02\",\"customer_id\":1,\"sales_invoice_id\":3,\"post_ref\":\"R-3\",\"debited\":\"3000\",\"credited\":\"3000\",\"user_id\":\"1\",\"created_at\":\"2022-07-02T07:13:38.000000Z\",\"updated_at\":\"2022-07-02T07:13:38.000000Z\"}}', '2022-07-02 00:43:38', '2022-07-02 00:43:38'),
(209, 'sales_journals', 'updated', 'App\\Models\\SalesJournal', 2, 'App\\User', 1, '{\"attributes\":{\"sales_journal_date\":\"2022-06-06\",\"customer_id\":2,\"sales_invoice_id\":2,\"post_ref\":\"R-2\",\"debited\":\"1000\",\"credited\":\"1000\",\"user_id\":\"1\",\"created_at\":\"2022-06-06T06:09:44.000000Z\",\"updated_at\":\"2022-07-02T07:14:36.000000Z\"},\"old\":{\"sales_journal_date\":\"2022-06-06\",\"customer_id\":1,\"sales_invoice_id\":4,\"post_ref\":\"R-2\",\"debited\":\"56800000\",\"credited\":\"56800000\",\"user_id\":\"1\",\"created_at\":\"2022-06-06T06:09:44.000000Z\",\"updated_at\":\"2022-06-06T06:09:44.000000Z\"}}', '2022-07-02 00:44:36', '2022-07-02 00:44:36'),
(210, 'cash_collections_log', 'created', 'App\\Models\\CashCollection', 2, 'App\\User', 1, '{\"attributes\":{\"cash_collection_date\":\"2022-07-02\",\"customer_id\":2,\"sales_invoice_id\":2,\"sales_journal_id\":2,\"cash_debited\":\"1000\",\"sale_discount_debited\":\"0\",\"credited\":\"1000\",\"user_id\":\"1\",\"created_at\":\"2022-07-02T09:18:44.000000Z\",\"updated_at\":\"2022-07-02T09:18:44.000000Z\"}}', '2022-07-02 02:48:44', '2022-07-02 02:48:44'),
(211, 'sale_refund_log', 'created', 'App\\Models\\SaleRefund', 3, 'App\\User', 1, '{\"attributes\":{\"sales_invoice_id\":2,\"refund\":\"192011\",\"refund_date\":\"2022-07-02\",\"user_id\":\"1\",\"created_at\":\"2022-07-02T10:42:16.000000Z\",\"updated_at\":\"2022-07-02T10:42:16.000000Z\"}}', '2022-07-02 04:12:16', '2022-07-02 04:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_books`
--

CREATE TABLE `cash_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `cash_book_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iv_one` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iv_two` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_code_id` int(11) NOT NULL,
  `account_type_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash_account_id` int(11) DEFAULT NULL,
  `bank_account` int(11) DEFAULT NULL,
  `cash_in` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash_out` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_in` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_out` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_collections`
--

CREATE TABLE `cash_collections` (
  `id` int(10) UNSIGNED NOT NULL,
  `cash_collection_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `sales_invoice_id` int(11) DEFAULT NULL,
  `sales_journal_id` int(11) DEFAULT NULL,
  `cash_debited` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_discount_debited` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credited` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_collections`
--

INSERT INTO `cash_collections` (`id`, `cash_collection_date`, `customer_id`, `sales_invoice_id`, `sales_journal_id`, `cash_debited`, `sale_discount_debited`, `credited`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2022-06-06', 1, 1, 1, '38500000', '0', '38500000', '1', '2022-06-05 23:40:09', '2022-06-05 23:40:09'),
(2, '2022-07-02', 2, 2, 2, '1000', '0', '1000', '1', '2022-07-02 02:48:44', '2022-07-02 02:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `chartof_accounts`
--

CREATE TABLE `chartof_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `coa_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type_id` int(11) DEFAULT NULL,
  `account_classification_id` int(11) DEFAULT NULL,
  `account_opening_balance` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chartof_account_id` int(11) DEFAULT NULL,
  `sub_or_main_account` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balance_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_or_hp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_customer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `company_name`, `dealer_code`, `city`, `address`, `phone`, `email`, `description`, `dealer_or_hp`, `dealer_customer_id`, `created_at`, `updated_at`) VALUES
(1, 'MGM', 'Karry Show room (Head Office)', 'MGM-002-YGN-MGM', 'Yangon', 'Upper Kyi Min Ding Rood,Kyi Myin Daing Township , Yangon', '09-266222285', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(2, 'U Banyar Aung', 'BNA Auto Co.,Ltd', 'MGM-003-YGN-BN', 'Yangon', '36 Quarter , Pinlon Rood, North Dagon Township Yangon.', '09-5020997', 'bnaauto.902@gmail.com', NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(3, 'U Zaw Min Tun', 'Pan Pu Eain Co.,Ltd', 'MGM-004-YGN-ZMT', 'Yangon', '8-Ward ,Tharkayta Township, Yangon', '09-73134738 , 09-450046214', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(4, 'U Mg Mg Soe', '7 Boss Auto Service', 'MGM-005-NPT-MMS', 'Nay Pyi Taw', 'Yarzar Htar Ni Rood,Pobbathiri,Nay Pyi Taw', '09-5134144', 'maungmaungsoe1980@gmail.com', NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(5, 'U Aye Min Gaday Kyaw', 'AMGDK Auto Service Co., Ltd', 'MGM-006-MDY-AMGDK', 'Pyin Oo Lwin', 'Mandalay-Lashio Highway Road,12Ward,Pyin Oo Lwin', '09-43021329 , 09-964021329', 'ayemingadaykyaw.me@gmail.com', NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(6, 'Ko Myo Gyi', 'Ever One Service Center', 'MGM-007-MDY-MG', 'Mandalay', '60 Street ,Between 36 and 37,Mandalay', '09-2011888', NULL, 'Not Doing Business Now', 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(7, 'U Steevin(MDY)', 'Royal Planet Car Show Room', 'MGM-008-MDY-Steevin', 'Mandalay', '62 Street ,Chan Aye Thar Zan,Mandalay', '09-2020863', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(8, 'U Swe Tun', 'Royal La Min Ta Yar Co.,Ltd', 'MGM-009-MDY-ST', 'Kyauk Pa Daung', 'In front of Myo U Aung Pagda,Thiri Mingalar Qrd,Kyauk Pa Tound', '09-777777528,09-2220528', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(9, 'U Swe Tun', 'Ko Swe Tun La Min Ta Yar Co.,Ltd', 'MGM-010-MDY-ST', 'Meiktilar', 'Make Hti Lar Township ,Mandalay', '09-777777528,09-2220528', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(10, 'U Swe Tun', 'Ko Swe Tun La Min Ta Yar Co.,Ltd', 'MGM-011-Magwe-ST', 'Pakouku', 'Pakouku Township Magwe', '09-777777528,09-2220528', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(11, 'U Tin Kyaw Nanda', 'Nagar Laydi Co.,Ltd', 'MGM-012-Myike-TKN', 'Myeik', 'Myike Township', '09-5641588,09-777225588', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(12, 'U Thiha', 'Myat And Sons Co.,Ltd', 'MGM-013-AYA-Thiha', 'Maubin', 'Ma Au Pin Township, Ayarwady', '09-5184021,09-74930603', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(13, 'U Mg Mg Soe', 'LEVEL TEN Co.,Ltd', 'MGM-014-AYA-MMS(LT)', 'Pathein', 'Pethein Township ,Ayarwady', '09-5202644', NULL, 'Not Doing Business Now', 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(14, 'A Yay Kyo', 'AYK Auto Co.,Ltd', 'MGM-015-YGN-AYK', 'Pathein', 'Yankin Township,Yangon.', '09-2025040', 'kiamotorsaykauto@gmail.com', NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(15, 'Ko Yu Pa', 'Karry-Yp-7', 'MGM-016-YGN-YP', 'Yangon', 'No.3, road Mingalar Done Township,Yangon', NULL, NULL, 'Not Doing Business Now', 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(16, 'U Mg Mg Soe', '7 Boss Auto Service', 'MGM-017-Magwe-MMS', 'Magwe', 'Pyi Taw Thar Street,Magwe', '09-5134144,09-518949', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(17, 'Nay Min', 'Sun Auto Service', 'MGM-018-Monywar-NM', 'Monywar', 'Aung Chan Thar,Monywar', '09-444666030,09-777666030', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(18, 'U Myint Sein', 'Ground Master Co.,Ltd', 'MGM-019-Pyay-MS', 'Pyay', 'Nawaday st,Thaday Pin Qrd,Pyay Tsp,Bago', '09-5107562', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(19, 'U Mg Mg Soe', '7 Boss Auto Service', 'MGM-020-MDY-MMS', 'Mandalay', '35 Street,Mandalay City.', '09-5134144,09-518494', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(20, 'Ko Phyo (ATP)', 'Auto Top Power Car Showroom', 'MGM-021-YGN-KP', 'Yangon', 'Shwe Gon Ding,Yangon', '09-31253648,09-5157474', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(21, 'Ko Kyaw Swar', 'MFA Co.,Ltd', 'MGM-022-YGN-KS', 'Yangon', 'Sanchaung Yangon', '09-2542822513,09-5577737', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(22, 'Ko Dee Pue', 'SKMM Auto Service Centre', 'MGM-023-KT(Shan)-DP', 'Kyaine Tong-East-Shan', 'Shan State', '09-5188786', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(23, 'U Thant Zin Lin', 'Asia Motor Auto(AMA) Co.,Ltd', 'MGM-024-MLM-TZL', 'Mawlamyine', 'Taung Wine Street,Zay Cho,Mawlamyine', '09-5140079', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(24, 'U Thant Zin Lin', 'Asia Motor Auto(AMA) Co.,Ltd', 'MGM-025-MLM(Mudon)-TZL', 'Mudon', 'No.23,Kyun Ywar Street,Mudon,Mawlamyine', '09-889909852,09-5140079,09-889999851', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(25, 'U Than Htike Win', 'Top High Co.,Ltd', 'MGM-026-YGN-THW', 'Yangon', 'No.23,Aye Yate Mon Street,Hlaing Township', '09-695656555', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(26, 'U Zin Mn Tun', 'MH Auto Car Sale Centre', 'MGM-027-HpaAn(KY)-ZMT', 'Hpa An Township', 'River Side Centre ,Strand Streed,Hpa An', '09-794222555,09-944222555,09-252226665', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(27, 'U Thiha', 'U Thiha Win', 'MGM-028-Bago(LPD)-THW', 'Bago', 'No.682,Myoth Shoung Street, Maubin Township,Ayarwady', NULL, NULL, 'Not Doing Business Now', 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(28, 'U Ko Ko Oo', 'Linn Latt Pwint Co.,Ltd', 'MGM-029-YGN-KKO', 'Yangon', 'No.1200,60 Ward,Corner of Shwe Li Street & Yadanar Street', '09-5131374,09-78513134', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(29, 'U Nyi Htut', 'U Nyi Htut', 'MGM-030-SGG-NH', 'Suggaing', 'No.123,Ywataung Qty,Saggaing-Monywa Main Road,Saggaing', '09-254044679', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(30, 'U Aung Zaw Soe', 'KARRY POWER 3', 'MGM-031-TH(Mon)-KAZS', 'Yangon', 'No.47 Qrd,Pearl Street,Shwe Pyi Thar', NULL, NULL, 'Not Doing Business Now', 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(31, 'U Pyae Phyo Aung', 'U Pyae Phyo Aung', 'MGM-032-MG-KPPA', 'Aung Lan', 'Pyay Street,Aung Myay Shwe Ngar Qtr,Aung Lan Tsp,Magwe', '09-974442856,09-974442726', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(32, 'U Zaw Aung', 'King Brother', 'MGM-033-MDY-KZA', 'Mandalay', 'Between 15st & 16st Pyay Road,Behind MCE Mobile', '09-777555555', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(33, 'Daw Lwin Lwin Moe Aye', '9999 Motors', 'MGM-034-MM-LLMA', 'Myaung Mya', 'No.106,MyaKanTar Myo Pat St,Myaung Mya', '09-5135644', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(34, 'Daw Lwin Lwin Moe Aye', '9999 Motors', 'MGM-035-YGN-LLMA', 'Yangon', 'No.1,Than Thu Mar Rd,South Okkalapa Tsp,Ygn', '09-793322604', NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(35, 'U Yan Naing', 'Shwe Moe The Sea', 'MGM-036-NPT-KYN', 'Nay Pyi Taw', 'Tat Kone', NULL, NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33'),
(36, 'U Khun Tin Ko Aug', 'Farmer Phoe Yarzar', 'MGM-037-YGN-FPY', 'Yangon', '9  Mile,Front of Ocean', NULL, NULL, NULL, 'dealer', 0, '2022-06-01 20:28:33', '2022-06-01 20:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-05-15 00:06:25', '2022-05-15 00:06:25'),
(2, 'Purchase', '2022-05-15 00:06:31', '2022-05-15 00:06:31'),
(3, 'Sale', '2022-05-15 00:06:34', '2022-05-15 00:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_02_10_103209_create_account_classifications_table', 1),
(5, '2022_02_10_173302_create_account_types_table', 1),
(6, '2022_02_11_065406_create_chartof_accounts_table', 1),
(7, '2022_03_24_192125_create_cash_books_table', 1),
(9, '2022_03_25_073157_create_suppliers_table', 1),
(10, '2022_03_25_093621_create_products_table', 1),
(11, '2022_03_28_065307_create_activity_log_table', 1),
(12, '2022_04_25_152320_create_brands_table', 1),
(13, '2022_04_25_154422_create_departments_table', 1),
(14, '2022_03_25_064339_create_customers_table', 2),
(18, '2022_06_01_184553_create_sales_items_table', 4),
(19, '2022_06_05_075454_create_sales_journals_table', 5),
(20, '2022_06_05_104600_create_cash_collections_table', 6),
(21, '2022_06_06_093238_create_temporary_sales_items_table', 7),
(22, '2022_06_01_184253_create_sales_invoices_table', 8),
(23, '2022_06_01_184854_create_sales_invoices_payments_table', 8),
(24, '2022_06_08_042917_add_description_to_sales_items_table', 9),
(26, '2022_07_02_041220_create_sale_pay_nows_table', 10),
(27, '2022_07_02_101145_create_sale_refunds_table', 11);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_year` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `configuration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_color` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interior_color` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_power` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chessi_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `door` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seater` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commodity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_usd` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjustment_value_ad` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `import_duty_other_tax_percent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_tax_percent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maccs_service_fee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_fee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redemption_fine` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advance_tax_percent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `import_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `type`, `model_no`, `model_year`, `configuration`, `body_color`, `interior_color`, `engine_power`, `chessi_no`, `engine_no`, `weight`, `door`, `seater`, `vehicle_no`, `quantity`, `remark`, `user_id`, `brand_id`, `brand_name`, `commodity`, `id_no`, `unit`, `amount_usd`, `exchange_rate`, `adjustment_value_ad`, `import_duty_other_tax_percent`, `commercial_tax_percent`, `maccs_service_fee`, `security_fee`, `redemption_fine`, `advance_tax_percent`, `import_date`, `created_at`, `updated_at`) VALUES
(1, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'Gray', 'Black', '1100CC', 'LVMZ1A1A0KF143221', NULL, '1000 Kg', '2 Doors', '2 Seater', '3R/4456', '1', NULL, '1', NULL, 'Karry', 'ILV 192002894', '100140907421', 'Unit', '3800', '1422.52', '0', '10', '5', '30000', '20000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(2, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1100CC', 'LVMZ1A1A1KF143227', NULL, '1000 Kg', '2 Doors', '2 Seater', '4R/3467', '1', NULL, '1', NULL, 'Karry', 'ILV 192002894', '100140882921', 'Unit', '3800', '1422.52', '0', '10', '5', '7500', '5000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(3, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1100CC', 'LVMZ1A1A1KF143230', NULL, '1000 Kg', '2 Doors', '2 Seater', '3R/4472', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02891', '100140882921', 'Unit', '3800', '1422.52', '0', '10', '5', '7500', '5000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(4, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'Gray', 'Black', '1100CC', 'LVMZ1A1A2KF143222', NULL, '1000 Kg', '2 Doors', '2 Seater', '3R/5247', '1', NULL, '1', NULL, 'Karry', 'ILV 192002894', '100140905101', 'Unit', '3800', '1422.52', '0', '10', '5', '15000', '10000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(5, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1100CC', 'LVMZ1A1A2KF143231', NULL, '1000 Kg', '2 Doors', '2 Seater', '3R/9248', '1', NULL, '1', NULL, 'Karry', 'ILV 192002894', '100140905101', 'Unit', '3800', '1422.52', '0', '10', '5', '7500', '5000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(6, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1100CC', 'LVMZ1A1A3KF143228', NULL, '1000 Kg', '2 Doors', '2 Seater', '3R/6671', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02891', '100140902151', 'Unit', '3800', '1422.52', '0', '10', '5', '7500', '5000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(7, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'Gray', 'Black', '1100CC', 'LVMZ1A1A4KF143223', NULL, '1000 Kg', '2 Doors', '2 Seater', '3R/5649', '1', NULL, '1', NULL, 'Karry', 'ILV1920 02896', '100140905101', 'Unit', '3800', '1422.52', '0', '10', '5', '15000', '10000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(8, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1100CC', 'LVMZ1A1A5KF143229', NULL, '1000 Kg', '2 Doors', '2 Seater', '3R/4878', '1', NULL, '1', NULL, 'Karry', 'ILV 192002894', '100140882921', 'Unit', '3800', '1422.52', '0', '10', '5', '7500', '5000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(9, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1100CC', 'LVMZ1A1A6KF143224', NULL, '1000 Kg', '2 Doors', '2 Seater', '3R/5721', '1', NULL, '1', NULL, 'Karry', 'ILV1920 02896', '100140872751', 'Unit', '3800', '1422.52', '0', '10', '5', '7500', '5000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(10, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1100CC', 'LVMZ1A1A8KF143225', NULL, '1000 Kg', '2 Doors', '2 Seater', '4R/2587', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02896', '100140872751', 'Unit', '3800', '1422.52', '0', '10', '5', '7500', '5000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(11, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'Gray', 'Black', '1100CC', 'LVMZ1A1A9KF143220', NULL, '1000 Kg', '2 Doors', '2 Seater', '3R/5717', '1', NULL, '1', NULL, 'Karry', 'ILV1920 02896', '100140905101', 'Unit', '3800', '1422.52', '0', '10', '5', '30000', '20000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(12, 'Q22B', '1.1L-MT Single cab Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1100CC', 'LVMZ1A1AXKF143226', NULL, '1000 Kg', '2 Doors', '2 Seater', '3R/6062', '1', NULL, '1', NULL, 'Karry', 'ILV1920 02896', '100140882921', 'Unit', '3800', '1422.52', '0', '10', '5', '7500', '5000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(13, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'Gray', 'Black', '1300CC', 'LVMZ1A1A0KF143204', NULL, '1100 Kg', '2 Doors', '2 Seater', '5R/7620', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02738', '100140916411', 'Unit', '3800', '1422.52', '0', '10', '5', '30000', '20000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(14, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1300CC', 'LVMZ1A1A1KF143213', NULL, '1100 Kg', '2 Doors', '2 Seater', '3R/5257', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02737', '100140909301', 'Unit', '3800', '1422.52', '0', '10', '5', '10000', '6666.66', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(15, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'Gray', 'Black', '1300CC', 'LVMZ1A1A2KF143205', NULL, '1100 Kg', '2 Doors', '2 Seater', '4R/4926', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02738', '100140918401', 'Unit', '3800', '1422.52', '0', '10', '5', '15000', '10000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(16, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1300CC', 'LVMZ1A1A46KF143207', NULL, '1100 Kg', '2 Doors', '2 Seater', '4R/1445', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02891', '100140876141', 'Unit', '3800', '1422.52', '0', '10', '5', '10000', '5000', '100000', '2', '2022-06-03 09:33:56', '2022-06-03 03:03:56', '2022-06-03 03:03:56'),
(17, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'Gray', 'Black', '1300CC', 'LVMZ1A1A4KF143206', NULL, '1100 Kg', '2 Doors', '2 Seater', '3R/6794', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02737', '100140911621', 'Unit', '3800', '1422.52', '0', '10', '5', '15000', '10000', '100000', '2', '2022-06-03 09:33:57', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(18, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1300CC', 'LVMZ1A1A6KF143210', NULL, '1100 Kg', '2 Doors', '2 Seater', '3R/5753', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02737', '100140909301', 'Unit', '3800', '1422.52', '0', '10', '5', '10000', '5000', '100000', '2', '2022-06-03 09:33:57', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(19, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'Gray', 'Black', '1300CC', 'LVMZ1A1A7KF143202', NULL, '1100 Kg', '2 Doors', '2 Seater', '4R/3759', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02737', '100140909301', 'Unit', '3800', '1422.52', '0', '10', '5', '15000', '10000', '100000', '2', '2022-06-03 09:33:57', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(20, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1300CC', 'LVMZ1A1A8KF143208', NULL, '1100 Kg', '2 Doors', '2 Seater', '4R/9858', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02737', '100140911621', 'Unit', '3800', '1422.52', '0', '10', '5', '10000', '5000', '100000', '2', '2022-06-03 09:33:57', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(21, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1300CC', 'LVMZ1A1A8KF143209', NULL, '1100 Kg', '2 Doors', '2 Seater', '3R/5246', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02738', '100140918401', 'Unit', '3800', '1422.52', '0', '10', '5', '15000', '10000', '100000', '2', '2022-06-03 09:33:57', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(22, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1300CC', 'LVMZ1A1A8KF143211', NULL, '1100 Kg', '2 Doors', '2 Seater', '3R/6277', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02891', '100140876141', 'Unit', '3800', '1422.52', '0', '10', '5', '10000', '6666.67', '100000', '2', '2022-06-03 09:33:57', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(23, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'Gray', 'Black', '1300CC', 'LVMZ1A1A9KF143203', NULL, '1100 Kg', '2 Doors', '2 Seater', '3R/7508', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02738', '100140918401', 'Unit', '3800', '1422.52', '0', '10', '5', '10000', '6666.67', '100000', '2', '2022-06-03 09:33:57', '2022-06-03 03:03:57', '2022-06-03 03:03:57'),
(24, 'Q22D', '1.3L-MT Single cab extended Mini Truck', 'Yoki', '2019', 'Superlong', 'White', 'Black', '1300CC', 'LVMZ1A1AXKF143212', NULL, '1100 Kg', '2 Doors', '2 Seater', '3R/7154', '1', NULL, '1', NULL, 'Karry', 'ILV 1920 02738', '', 'Unit', '3800', '1422.52', '0', '10', '5', '30000', '20000', '100000', '2', '2022-06-03 09:33:57', '2022-06-03 03:03:57', '2022-06-03 03:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

CREATE TABLE `sales_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `id_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `showroom_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_team` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_persons_id` int(11) DEFAULT NULL,
  `delivery_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`id`, `customer_id`, `id_no`, `invoice_no`, `invoice_date`, `showroom_name`, `sales_type`, `payment_team`, `sales_persons_id`, `delivery_date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'IV-0001/20', 'IV-0001/20', '2022-06-08', 'MGM', '1 Year', '1 Year', 3, '2022-06-08', 1, '2022-06-08 01:49:56', '2022-06-08 01:49:56'),
(2, 2, 'Hanteng-2020-0002', 'Hanteng-2020-0002', '2022-06-08', 'MGM', '1 Year', '1 Year', 3, '2022-06-08', 1, '2022-06-08 01:55:51', '2022-06-08 01:55:51'),
(3, 1, 'ID-00001', 'INV-00001', '2022-07-01', 'MGM', '1 Year', '1 Year', 3, '2022-07-01', 1, '2022-07-01 03:09:02', '2022-07-01 03:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices_payments`
--

CREATE TABLE `sales_invoices_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_amount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `down_payment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_ercentage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_to_be_pay` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_to_pay_be_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_invoice_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_invoices_payments`
--

INSERT INTO `sales_invoices_payments` (`id`, `total_amount`, `down_payment`, `discount`, `dealer_ercentage`, `balance_to_be_pay`, `balance_to_pay_be_date`, `sales_invoice_id`, `created_at`, `updated_at`) VALUES
(1, '38501000', '25900000', '0', NULL, NULL, NULL, 1, '2022-06-06 04:32:15', '2022-06-08 01:53:14'),
(2, '9023129', '0', '0', NULL, '9023129', NULL, 2, '2022-06-06 04:36:18', '2022-06-06 04:36:18'),
(3, '3000', '0', '0', NULL, '3000', NULL, 3, '2022-06-07 21:38:58', '2022-06-07 21:38:58'),
(4, '2000', '1000', '0', NULL, '1000', NULL, 4, '2022-06-07 22:02:44', '2022-06-07 22:55:53'),
(5, '0', '0', '0', NULL, '0', NULL, 5, '2022-06-07 22:57:42', '2022-06-07 22:57:42'),
(6, '0', '0', '0', NULL, '0', NULL, 6, '2022-06-07 23:00:13', '2022-06-07 23:00:13'),
(7, '3000', '0', '0', NULL, '3000', NULL, 7, '2022-06-07 23:04:30', '2022-06-07 23:04:30'),
(8, '3000', '0', '0', NULL, '3000', NULL, 8, '2022-06-07 23:05:08', '2022-06-07 23:05:08'),
(9, '3000', '0', '0', NULL, '3000', NULL, 9, '2022-06-07 23:06:08', '2022-06-07 23:06:08'),
(10, '3000', '0', '0', NULL, '3000', NULL, 10, '2022-06-07 23:06:43', '2022-06-07 23:06:43'),
(11, '12000', '1000', '0', NULL, '10760', NULL, 11, '2022-06-07 23:07:23', '2022-06-07 23:08:32'),
(12, '83500000', '25900000', '0', NULL, '57600000', NULL, 1, '2022-06-08 01:49:56', '2022-06-08 01:49:56'),
(13, '1000', '1000', '0', NULL, '0', NULL, 2, '2022-06-08 01:55:51', '2022-06-08 01:55:51'),
(14, '3000', '1000', '0', NULL, '2000', NULL, 3, '2022-07-01 03:09:02', '2022-07-01 03:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_invoice_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`id`, `product_id`, `qty`, `unit_price`, `sales_invoice_id`, `created_at`, `updated_at`, `description`) VALUES
(22, 1, 1, '38500000', 1, '2022-06-08 01:49:56', '2022-06-08 01:49:56', NULL),
(24, 24, 1, '1000', 1, '2022-06-08 01:53:14', '2022-06-08 01:53:14', NULL),
(25, 2, 1, '1000', 2, '2022-06-08 01:55:51', '2022-06-08 01:55:51', NULL),
(26, 1, 1, '1000', 3, '2022-07-01 03:09:02', '2022-07-01 03:09:02', NULL),
(27, 2, 1, '2000', 3, '2022-07-01 03:09:02', '2022-07-01 03:09:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_journals`
--

CREATE TABLE `sales_journals` (
  `id` int(10) UNSIGNED NOT NULL,
  `sales_journal_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `sales_invoice_id` int(11) DEFAULT NULL,
  `post_ref` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debited` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credited` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_journals`
--

INSERT INTO `sales_journals` (`id`, `sales_journal_date`, `customer_id`, `sales_invoice_id`, `post_ref`, `debited`, `credited`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2022-06-06', 1, 1, 'R-1', '38500000', '38500000', '1', '2022-06-05 23:39:28', '2022-06-05 23:39:28'),
(2, '2022-06-06', 2, 2, 'R-2', '1000', '1000', '1', '2022-06-05 23:39:44', '2022-07-02 00:44:36'),
(3, '2022-07-02', 1, 3, 'R-3', '3000', '3000', '1', '2022-07-02 00:43:38', '2022-07-02 00:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `sale_pay_nows`
--

CREATE TABLE `sale_pay_nows` (
  `id` int(10) UNSIGNED NOT NULL,
  `sales_invoice_id` int(11) DEFAULT NULL,
  `sales_invoices_payment_id` int(11) DEFAULT NULL,
  `receive_by` int(11) DEFAULT NULL,
  `payment_status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_amount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_pay_nows`
--

INSERT INTO `sale_pay_nows` (`id`, `sales_invoice_id`, `sales_invoices_payment_id`, `receive_by`, `payment_status`, `payment_time`, `remark`, `received_date`, `pay_amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 'In_Payment', '1st Payment', NULL, '2022-06-08', '10000', '1', '2022-07-02 03:02:32', '2022-07-02 03:02:32'),
(2, 1, 1, 3, 'In_Payment', '2nd Payment', 'Ok Pay Now', '2022-06-08', '2000', '1', '2022-07-02 03:04:15', '2022-07-02 03:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `sale_refunds`
--

CREATE TABLE `sale_refunds` (
  `id` int(10) UNSIGNED NOT NULL,
  `sales_invoice_id` int(11) DEFAULT NULL,
  `refund` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `company`, `phone`, `email`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Chery Commercial Vehicle(Anhui) Company Limited', NULL, '959', 'Xurupeng@mychery.com', 'No-8 Building 717 South Zhongshan Road,Science and Technology Industrial Park,Yijiang District,Wuhu,Anhui,China', NULL, '2022-05-31 22:18:19', '2022-05-31 22:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_sales_items`
--

CREATE TABLE `temporary_sales_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nrc_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `last_login_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `employee_id`, `phone`, `nrc_number`, `gender`, `address`, `department_id`, `last_login_at`, `last_login_ip`, `agent`) VALUES
(1, 'Dev Test', 'developer@gmail.com', NULL, '$2y$10$fCdZ6o33mm5ftnDrz63j4O1ssBWd1mrEaCfHLwaVpgr2ei7t3RURe', NULL, '2022-03-28 11:28:34', '2022-07-01 20:32:51', 'EMP-0001', '09444161997', NULL, 'male', 'YGN', 1, '2022-07-02 03:02:51', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'),
(2, 'U Aung Cho Tun', 'aungchotun@gmail.com', NULL, '$2y$10$tl7wt/VHxT8TX1cZwGzUhuT/RyFx.TU3kI/2gmAXywdc294eCHTra', 'KyAsL3PniXpQqZBoPCp50e8Pq9rw4IjSBsYgJD8eQJod5ICz3u8M4vcOKrdZ', '2022-03-28 19:41:13', '2022-03-31 08:39:12', 'EMP-00002', '09123123123', NULL, 'male', 'YGN', 1, '2022-03-31 15:39:12', '69.160.8.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0'),
(3, 'Ma May Myat Mon', 'mamaymyatmon@gmail.com', NULL, '$2y$10$sSmcokRLRJBbuuOogCQamOWL4FCnsBgZkLQIcJn4MkRPhGWx6krDC', NULL, '2022-05-15 00:08:07', '2022-05-15 00:08:07', 'EMP-00001', '0912312312', NULL, 'male', 'YGN', 3, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_classifications`
--
ALTER TABLE `account_classifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_classifications_ac_code_unique` (`ac_code`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_types_number_unique` (`number`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_books`
--
ALTER TABLE `cash_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_collections`
--
ALTER TABLE `cash_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chartof_accounts`
--
ALTER TABLE `chartof_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chartof_accounts_coa_number_unique` (`coa_number`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_invoices_payments`
--
ALTER TABLE `sales_invoices_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_journals`
--
ALTER TABLE `sales_journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_pay_nows`
--
ALTER TABLE `sale_pay_nows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_refunds`
--
ALTER TABLE `sale_refunds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_sales_items`
--
ALTER TABLE `temporary_sales_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_classifications`
--
ALTER TABLE `account_classifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_books`
--
ALTER TABLE `cash_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_collections`
--
ALTER TABLE `cash_collections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chartof_accounts`
--
ALTER TABLE `chartof_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_invoices_payments`
--
ALTER TABLE `sales_invoices_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sales_journals`
--
ALTER TABLE `sales_journals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_pay_nows`
--
ALTER TABLE `sale_pay_nows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale_refunds`
--
ALTER TABLE `sale_refunds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temporary_sales_items`
--
ALTER TABLE `temporary_sales_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
