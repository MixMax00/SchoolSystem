-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 05:31 PM
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
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `school_id`, `sub_name`, `class_id`, `teacher_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Cairo Benton', 11, 1, 1, '2022-11-09 04:30:42', '2022-11-09 04:30:42'),
(2, NULL, 'Quail Stanton', 9, 8, 1, '2022-11-10 00:46:19', '2022-11-10 00:46:19'),
(3, NULL, 'Bangla', 2, 10, 1, '2022-11-10 00:46:51', '2022-11-10 00:46:51'),
(4, NULL, 'English', 2, 12, 1, '2022-11-10 00:47:10', '2022-11-10 00:47:10'),
(6, NULL, 'Social Science', 2, 2, 1, '2022-11-10 00:47:46', '2022-11-10 00:47:46'),
(7, NULL, 'Islam', 2, 3, 1, '2022-11-10 00:48:07', '2022-11-10 00:48:07'),
(8, NULL, 'ICT', 2, 15, 1, '2022-11-10 00:48:30', '2022-11-10 00:48:30'),
(9, NULL, 'Bangla', 3, 10, 1, '2022-11-10 00:48:54', '2022-11-10 00:48:54'),
(10, NULL, 'English', 3, 12, 1, '2022-11-10 00:49:34', '2022-11-10 00:49:35'),
(11, NULL, 'Math', 2, 1, 1, '2022-11-10 00:49:54', '2022-11-10 00:49:54'),
(12, NULL, 'Math', 3, 1, 1, '2022-11-10 00:50:19', '2022-11-10 00:50:19'),
(13, NULL, 'Social Science', 3, 2, 1, '2022-11-10 00:50:49', '2022-11-10 00:50:49'),
(14, NULL, 'Islam', 3, 3, 1, '2022-11-10 00:51:07', '2022-11-10 00:51:07'),
(15, NULL, 'ICT', 3, 15, 1, '2022-11-10 00:51:30', '2022-11-10 00:51:30'),
(16, NULL, 'Bangla', 4, 6, 1, '2022-11-10 01:04:57', '2022-11-10 01:04:57'),
(17, NULL, 'English', 4, 1, 1, '2022-11-10 01:05:13', '2022-11-10 01:05:13'),
(18, NULL, 'Math', 4, 10, 1, '2022-11-10 01:05:33', '2022-11-10 01:05:33'),
(19, NULL, 'ICT', 4, 15, 1, '2022-11-10 01:05:56', '2022-11-10 01:05:56'),
(20, NULL, 'Social Science', 4, 14, 1, '2022-11-10 01:06:14', '2022-11-10 01:06:14'),
(21, NULL, 'Islam', 4, 11, 1, '2022-11-10 01:06:29', '2022-11-10 01:06:29'),
(22, NULL, 'Bangla', 5, 1, 1, '2022-11-10 01:06:53', '2022-11-10 01:06:53'),
(23, NULL, 'English', 5, 10, 1, '2022-11-10 01:07:10', '2022-11-10 01:07:10'),
(24, NULL, 'Math', 5, 3, 1, '2022-11-10 01:07:24', '2022-11-10 01:07:24'),
(25, NULL, 'Social Science', 5, 13, 1, '2022-11-10 01:07:47', '2022-11-10 01:07:47'),
(26, NULL, 'ICT', 5, 10, 1, '2022-11-10 01:08:04', '2022-11-10 01:08:04'),
(27, NULL, 'Islam', 5, 15, 1, '2022-11-10 01:08:16', '2022-11-10 01:08:16'),
(28, NULL, 'Bangla', 7, 1, 1, '2022-11-10 01:08:36', '2022-11-10 01:08:36'),
(29, NULL, 'English', 7, 10, 1, '2022-11-10 01:08:48', '2022-11-10 01:08:48'),
(30, NULL, 'Math', 7, 12, 1, '2022-11-10 01:08:57', '2022-11-10 01:08:57'),
(31, NULL, 'ICT', 7, 12, 1, '2022-11-10 01:09:07', '2022-11-10 01:09:07'),
(32, NULL, 'Social Science', 7, 9, 1, '2022-11-10 01:09:29', '2022-11-10 01:09:29'),
(33, NULL, 'Islam', 7, 13, 1, '2022-11-10 01:09:40', '2022-11-10 01:09:40'),
(34, NULL, 'Bangla', 8, 2, 1, '2022-11-10 01:10:05', '2022-11-10 01:10:05'),
(35, NULL, 'English', 8, 11, 1, '2022-11-10 01:10:19', '2022-11-10 01:10:19'),
(36, NULL, 'Math', 8, 10, 1, '2022-11-10 01:10:28', '2022-11-10 01:10:28'),
(37, NULL, 'ICT', 8, 15, 1, '2022-11-10 01:10:38', '2022-11-10 01:10:38'),
(38, NULL, 'Social Science', 8, 14, 1, '2022-11-10 01:10:57', '2022-11-10 01:10:57'),
(39, NULL, 'Islam', 8, 13, 1, '2022-11-10 01:11:10', '2022-11-10 01:11:10'),
(40, NULL, 'English', 9, 12, 1, '2022-11-10 01:11:28', '2022-11-10 01:11:28'),
(41, NULL, 'Math', 9, 13, 1, '2022-11-10 01:11:37', '2022-11-10 01:11:37'),
(42, NULL, 'ICT', 9, 10, 1, '2022-11-10 01:11:47', '2022-11-10 01:11:47'),
(43, NULL, 'Socail Science', 9, 11, 1, '2022-11-10 01:12:07', '2022-11-10 01:12:07'),
(44, NULL, 'Islam', 9, 12, 1, '2022-11-10 01:12:19', '2022-11-10 01:12:19'),
(45, NULL, 'Bangla', 10, 11, 1, '2022-11-10 01:12:38', '2022-11-10 01:12:38'),
(46, NULL, 'English', 10, 13, 1, '2022-11-10 01:12:57', '2022-11-10 01:12:57'),
(47, NULL, 'Math', 10, 13, 1, '2022-11-10 01:13:07', '2022-11-10 01:13:07'),
(48, NULL, 'Ict', 10, 11, 1, '2022-11-10 01:13:22', '2022-11-10 01:13:22'),
(49, NULL, 'Social Science', 10, 13, 1, '2022-11-10 01:13:38', '2022-11-10 01:13:38'),
(50, NULL, 'Islam', 10, 13, 1, '2022-11-10 01:13:50', '2022-11-10 01:13:50'),
(51, NULL, 'Bangla', 11, 14, 1, '2022-11-10 01:14:30', '2022-11-10 01:14:30'),
(52, NULL, 'English', 11, 14, 1, '2022-11-10 01:14:43', '2022-11-10 01:14:43'),
(53, NULL, 'Math', 11, 14, 1, '2022-11-10 01:14:56', '2022-11-10 01:14:56'),
(54, NULL, 'Ict', 11, 11, 1, '2022-11-10 01:15:06', '2022-11-10 01:15:06'),
(55, NULL, 'Cmoputer', 11, 11, 1, '2022-11-10 01:15:32', '2022-11-10 01:15:32'),
(56, NULL, 'Database', 11, 13, 1, '2022-11-10 01:15:45', '2022-11-10 01:15:45'),
(57, NULL, 'Cyber Security', 11, 11, 1, '2022-11-10 01:16:04', '2022-11-10 01:16:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
