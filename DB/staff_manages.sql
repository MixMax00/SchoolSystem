-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 04:42 PM
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
-- Table structure for table `staff_manages`
--

CREATE TABLE `staff_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(10,2) DEFAULT NULL,
  `adv_salary` double(10,2) DEFAULT NULL,
  `remaining_salary` double(10,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_manages`
--

INSERT INTO `staff_manages` (`id`, `role_id`, `name`, `school_id`, `dob`, `gender`, `address`, `qualification`, `phone`, `email`, `password`, `department`, `salary`, `adv_salary`, `remaining_salary`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Yolanda Bailey', NULL, '2015-05-03', 'female', '+1 (213) 539-4976', '+1 (728) 644-2932', '+1 (348) 425-6675', NULL, NULL, 'Qui harum aute numqu', 8000.00, NULL, NULL, 'assets/backend/teacher/639744ec3ce6d1.png', '1', '2022-12-12 09:12:44', '2022-12-12 09:12:44'),
(2, NULL, 'Taylor Hurley', NULL, '1987-02-07', 'female', '+1 (751) 709-8006', '+1 (556) 749-3348', '+1 (231) 641-7444', NULL, NULL, 'Voluptatum aspernatu', 9000.00, NULL, NULL, 'assets/backend/teacher/639745003f2c81 (1).png', '1', '2022-12-12 09:13:04', '2022-12-12 09:13:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff_manages`
--
ALTER TABLE `staff_manages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_manages_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff_manages`
--
ALTER TABLE `staff_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
