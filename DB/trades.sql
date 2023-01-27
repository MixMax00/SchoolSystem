-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 05:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demoschoolmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `trades`
--

CREATE TABLE `trades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `trade_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_sit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ablable_sit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fillup_sit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trades`
--

INSERT INTO `trades` (`id`, `course_id`, `trade_title`, `trade_code`, `total_sit`, `ablable_sit`, `fillup_sit`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Laravel 7', 'lara-7777', '50', '50', '0', '1', '2022-10-20 00:23:43', '2022-10-20 00:23:43'),
(2, 3, 'Laravel 8', 'lara-8888', '50', '30', '20', '1', '2022-10-20 00:24:19', '2022-10-20 00:24:19'),
(3, 4, 'Laravel 9', 'lara-9999', '50', '40', '10', '1', '2022-10-20 00:25:06', '2022-10-20 00:25:06'),
(4, 1, 'Laravel -10 upcomming', 'lara-1010', '50', '50', '0', '1', '2022-10-20 00:25:24', '2022-10-20 00:26:15'),
(6, 2, 'Brittany Holman', 'Dolorem dolor tempor', 'Byron Mayo', 'Walker Howell', 'Murphy Powers', '1', '2022-11-07 03:14:30', '2022-11-07 03:14:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trades`
--
ALTER TABLE `trades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trades`
--
ALTER TABLE `trades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
