-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 05:35 PM
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
-- Table structure for table `online_admissions`
--

CREATE TABLE `online_admissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_guardian_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_guardian_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_guardian_nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `union` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_thana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_union` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_roll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssc_gpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssc_depertment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssc_registation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssc_borad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_admissions`
--

INSERT INTO `online_admissions` (`id`, `school_id`, `name`, `email`, `birth_certificate`, `gender`, `religion`, `blood_group`, `phone`, `date`, `nationality`, `father_name`, `father_phone`, `father_nid`, `mother_name`, `mother_phone`, `mother_nid`, `local_guardian_name`, `local_guardian_email`, `local_guardian_phone`, `local_guardian_nid`, `division`, `thana`, `village`, `district`, `union`, `per_division`, `per_thana`, `per_village`, `per_district`, `per_union`, `ssc_roll`, `ssc_gpa`, `ssc_depertment`, `ssc_registation`, `ssc_borad`, `trade_id`, `image`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Md Hridoy Raju', 'raju@gmail.com', '89789456125', 'Female', 'Islam', 'O+', '01314151025', '2005-11-23', 'Bangldesi', 'Md Khyrul Alom', '01314151025', '1234567890', 'Mst. Anjuara Begum', '01314151025', '1234567890', 'Md Jillur Rahman', 'mdjillur123@gmail.com', '01787983462', '1234567895', '7', '401', 'Sundura Pukuri', '53', '3670', '7', '401', 'Sundura Pukuri', '53', '3670', '576287', '3.5', 'Arts', '1917845994', 'Dinajpur', '1', 'assets/backend/student/63510b9d9cffeWIN_20221020_13_10_23_Pro.jpg', '2', 1, '2022-10-20 02:49:34', '2022-10-20 02:49:34'),
(2, NULL, 'Zelenia Mann', 'lisybydil@mailinator.com', '12345678', 'Female', 'Islam', 'O-', '+1 (658) 339-7189', '2005-07-26', 'Mollit beatae volupt', 'Kyla Steele', '+1 (439) 357-2951', '1234578', 'Juliet Fletcher', '+1 (261) 216-5318', '1234578', 'Stella Vaughan', 'lexazody@mailinator.com', '+1 (507) 122-7052', '1234578', '4', '247', 'Eiusmod sit labore', '32', '2230', '4', '247', 'Eiusmod sit labore', '32', '2230', '1234578', '5', 'Commerce', '1234578', 'Rajshahi', '2', 'assets/backend/student/635122c983d15images.jpg', '3', 1, '2022-10-20 04:28:25', '2022-10-20 04:28:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `online_admissions`
--
ALTER TABLE `online_admissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `online_admissions`
--
ALTER TABLE `online_admissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
