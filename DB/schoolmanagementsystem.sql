-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 05:11 PM
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
-- Table structure for table `2020-2021_4_students`
--

CREATE TABLE `2020-2021_4_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `2020-2021_4_students`
--

INSERT INTO `2020-2021_4_students` (`id`, `student_id`, `roll`, `image`, `stu_name`, `class`, `section`) VALUES
(1, 2, '500', 'assets/backend/img/student/6383382d7b210download (6).jpg', 'jodigutira@mailinator.com', '4', '6'),
(2, 4, '401', 'assets/backend/img/student/638ed7fa4c7231.png', 'Sakib', '4', '6');

-- --------------------------------------------------------

--
-- Table structure for table `2021-2022_2_attandence`
--

CREATE TABLE `2021-2022_2_attandence` (
  `id` int(10) UNSIGNED NOT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'absent',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `2021-2022_2_attandence`
--

INSERT INTO `2021-2022_2_attandence` (`id`, `roll`, `session_year`, `class_name`, `section`, `student_name`, `attendance`, `date`) VALUES
(1, '101', '2021-2022', '2', 'A', 'vufovolifa@mailinator.com', 'present', '2022-12-03'),
(2, '202', '2021-2022', '2', 'A', 'Surjo', 'present', '2022-12-03'),
(3, '1001', '2021-2022', '2', 'A', 'Atik Hasan', 'present', '2022-12-20'),
(4, '202', '2021-2022', '2', 'A', 'Surjo Ray', 'present', '2022-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `2021-2022_2_fees`
--

CREATE TABLE `2021-2022_2_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expance_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `2021-2022_2_fees`
--

INSERT INTO `2021-2022_2_fees` (`id`, `session_year`, `class`, `stu_roll`, `amount`, `expance_type`, `date`, `status`) VALUES
(1, '2021-2022', '2', '202', '5000', '1', '2022-12-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `2021-2022_2_students`
--

CREATE TABLE `2021-2022_2_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `2021-2022_2_students`
--

INSERT INTO `2021-2022_2_students` (`id`, `student_id`, `roll`, `image`, `stu_name`, `class`, `section`) VALUES
(1, 1, '1001', 'assets/backend/img/student/63a144faea1a9download (6).jpg', 'Atik Hasan', '2', '3'),
(2, 3, '202', 'assets/backend/img/student/638add3471cf8Screenshot (7).png', 'Surjo Ray', '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `2021-2022_7_fees`
--

CREATE TABLE `2021-2022_7_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `2021-2022_7_fees`
--

INSERT INTO `2021-2022_7_fees` (`id`, `session_year`, `class`, `stu_roll`, `amount`, `fee_type`, `date`, `status`) VALUES
(1, '2021-2022', '7', '600', '6000', '4', '2022-12-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `2021-2022_7_students`
--

CREATE TABLE `2021-2022_7_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `2021-2022_7_students`
--

INSERT INTO `2021-2022_7_students` (`id`, `student_id`, `roll`, `image`, `stu_name`, `class`, `section`) VALUES
(1, 5, '600', 'assets/backend/img/student/63a31bd1d234adownload (6).jpg', 'vatiqypoj@mailinator.com', '7', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `2021-2022_8_fees`
--

CREATE TABLE `2021-2022_8_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `2021-2022_8_fees`
--

INSERT INTO `2021-2022_8_fees` (`id`, `session_year`, `class`, `stu_roll`, `amount`, `fee_type`, `date`, `status`) VALUES
(1, '2021-2022', '8', '700', '1000', '6', '2022-12-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `2021-2022_8_students`
--

CREATE TABLE `2021-2022_8_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `2021-2022_8_students`
--

INSERT INTO `2021-2022_8_students` (`id`, `student_id`, `roll`, `image`, `stu_name`, `class`, `section`) VALUES
(1, 6, '700', 'assets/backend/img/student/63a31c545f4eedownload (6).jpg', 'dyqeratyb@mailinator.com', '8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accountants`
--

CREATE TABLE `accountants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(10,2) DEFAULT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkden` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountants`
--

INSERT INTO `accountants` (`id`, `role_id`, `name`, `school_id`, `designation`, `dob`, `gender`, `address`, `qualification`, `phone`, `email`, `password`, `department`, `salary`, `fb`, `twitter`, `linkden`, `subject`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Kaseem Lamb', NULL, 'Ut quaerat reprehend', '1977-07-09', 'male', 'Voluptate et nisi fu', 'butix@mailinator.com', '+1 (598) 514-2065', 'morymysun@mailinator.com', '$2y$10$5rlRFiv9r010K/ZKDxgl/.FxZUounX4wIWycl.Uvyrx162BhSoAPK', 'Hic officia est inc', 20000.00, 'Est neque commodi d', 'Ut do elit nisi lab', 'Quia molestiae culpa', NULL, 'assets/backend/teacher/63974610503ccdownload (2).jpg', '1', '2022-12-12 09:17:36', '2022-12-12 09:17:36'),
(2, 6, 'Idona Ramirez', NULL, 'Rerum in dolore quas', '1987-11-11', 'male', 'Quia ab nemo volupta', 'dywam@mailinator.com', '+1 (534) 663-3132', 'lezawu@mailinator.com', '$2y$10$Cu7PISEqrog1XeY4wGOtme/igkEmMs7d1IW21mkYjScNZQO447oRW', 'Exercitationem accus', 22500.00, 'Vero corporis velit', 'Beatae voluptas iust', 'Et unde dolor id bea', NULL, 'assets/backend/teacher/6397463602d41download (1).jpg', '1', '2022-12-12 09:18:14', '2022-12-12 09:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `admin_resets`
--

CREATE TABLE `admin_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `school_id`, `headings`, `short_description`, `email`, `phone`, `image`, `status`, `created_at`, `updated_at`) VALUES
(13, NULL, 'Quality Education School & College 1', NULL, 'c11@gmail.com', '14785236978', 'assets/backend/img/banner/6350d0d4e4c9c360F427160582w0D5Z01pVaz32w7JzzNWTtE2n1VvvKmi1920x576.jpg', 1, '2022-10-19 22:38:46', '2022-10-19 22:41:05'),
(14, NULL, 'Quality Education School & College 2', NULL, 'c11@gmail.com', '78945612322', 'assets/backend/img/banner/6350d109855f9pexelsphoto8427111920x576.jpg', 1, '2022-10-19 22:39:38', '2022-10-19 22:40:22'),
(15, NULL, 'Quality Education School & College 3', NULL, 'c11@gmail.com', '12345679855', 'assets/backend/img/banner/6350d12de9af93977451920x576.jpg', 1, '2022-10-19 22:40:14', '2022-10-19 22:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`id`, `school_id`, `category_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Golpo', 'Golpo', 1, '2022-11-18 05:52:13', '2022-11-18 05:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_name_numeric` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `school_id`, `class_name`, `class_name_numeric`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Class Two', 2, 1, '2022-11-03 00:02:07', '2022-11-03 00:02:07'),
(3, NULL, 'Class Three', 3, 1, '2022-11-03 00:02:22', '2022-11-03 00:02:22'),
(4, NULL, 'Class Four', 4, 1, '2022-11-03 00:02:42', '2022-11-03 00:02:42'),
(5, NULL, 'Class Five', 5, 1, '2022-11-03 00:02:54', '2022-11-03 00:02:54'),
(7, NULL, 'Class Six', 6, 1, '2022-11-03 03:27:13', '2022-11-03 03:27:13'),
(8, NULL, 'Class Seven', 7, 0, '2022-11-03 03:27:29', '2022-11-03 03:27:29'),
(9, NULL, 'Class Eight', 8, 1, '2022-11-03 03:27:44', '2022-11-03 03:27:44'),
(10, NULL, 'Class nine', 9, 1, '2022-11-03 03:27:58', '2022-11-03 03:27:58'),
(11, NULL, 'Class Ten', 10, 0, '2022-11-03 03:28:10', '2022-11-07 05:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `class_routines`
--

CREATE TABLE `class_routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_name` bigint(20) UNSIGNED NOT NULL,
  `section` bigint(20) UNSIGNED NOT NULL,
  `subject` bigint(20) UNSIGNED NOT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_minute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending_minute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_routines`
--

INSERT INTO `class_routines` (`id`, `school_id`, `class_name`, `section`, `subject`, `teacher`, `day`, `starting_hour`, `starting_minute`, `starting`, `ending_hour`, `ending_minute`, `ending`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 3, 3, 'Maggie Vargas', 'Saturday', '10', '0', 'AM', '11', '0', 'AM', 1, '2022-11-12 10:40:31', '2022-12-10 00:21:54'),
(2, NULL, 4, 6, 16, 'Josiah Oneill', 'Saturday', '9', '0', 'AM', '10', '0', 'AM', 1, '2022-12-03 12:27:52', '2022-12-13 08:18:50'),
(3, NULL, 2, 3, 4, 'Maggie Vargas', 'Saturday', '11', '0', 'AM', '12', '0', 'PM', 1, '2022-12-10 00:11:09', '2022-12-10 00:11:09'),
(4, NULL, 2, 3, 6, 'Roth Moody', 'Saturday', '12', '0', 'PM', '1', '0', 'PM', 1, '2022-12-10 00:11:49', '2022-12-10 00:11:49'),
(5, NULL, 2, 3, 7, 'Cole Holcomb', 'Saturday', '1', '0', 'PM', '2', '0', 'PM', 1, '2022-12-10 00:12:50', '2022-12-10 00:12:50'),
(6, NULL, 2, 3, 8, 'Beatrice Burks', 'Saturday', '2', '0', 'PM', '3', '0', 'PM', 1, '2022-12-10 00:13:57', '2022-12-10 00:13:57'),
(7, NULL, 2, 3, 11, 'Jessamine Rivers', 'Saturday', '3', '0', 'PM', '4', '0', 'PM', 1, '2022-12-10 00:14:41', '2022-12-10 00:14:41'),
(8, NULL, 2, 3, 3, '8', 'Sunday', '2', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:44:51', '2022-12-10 04:44:51'),
(9, NULL, 2, 3, 3, '3', 'Sunday', '6', '0', 'AM', '2', '0', 'PM', 1, '2022-12-10 04:44:51', '2022-12-10 04:44:51'),
(10, NULL, 2, 3, 3, '6', 'Sunday', '1', '0', 'AM', '3', '0', 'PM', 1, '2022-12-10 04:44:51', '2022-12-10 04:44:51'),
(11, NULL, 2, 3, 7, '8', 'Sunday', '8', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:44:52', '2022-12-10 04:44:52'),
(12, NULL, 2, 3, 6, '8', 'Sunday', '9', '0', 'AM', '4', '0', 'PM', 1, '2022-12-10 04:44:52', '2022-12-10 04:44:52'),
(13, NULL, 2, 3, 8, '11', 'Sunday', '3', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:44:52', '2022-12-10 04:44:52'),
(14, NULL, 2, 3, 8, 'Kay Strong', 'Monday', '7', '0', 'AM', '3', '0', 'PM', 1, '2022-12-10 04:51:03', '2022-12-10 04:51:03'),
(15, NULL, 2, 3, 7, 'Shana Buchanan', 'Monday', '6', '0', 'AM', '3', '0', 'PM', 1, '2022-12-10 04:51:03', '2022-12-10 04:51:03'),
(16, NULL, 2, 3, 7, 'Halla Owens', 'Monday', '3', '0', 'AM', '7', '0', 'PM', 1, '2022-12-10 04:51:04', '2022-12-10 04:51:04'),
(17, NULL, 2, 3, 11, 'Kay Strong', 'Monday', '6', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:51:04', '2022-12-10 04:51:04'),
(18, NULL, 2, 3, 11, 'Halla Owens', 'Monday', '7', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:51:04', '2022-12-10 04:51:04'),
(19, NULL, 2, 3, 11, 'Halla Owens', 'Monday', '2', '0', 'AM', '4', '0', 'PM', 1, '2022-12-10 04:51:04', '2022-12-10 04:51:04'),
(20, NULL, 2, 3, 4, 'Jayme Morris', 'Tuesday', '6', '0', 'AM', '1', '0', 'PM', 1, '2022-12-10 04:52:14', '2022-12-10 04:52:14'),
(21, NULL, 2, 3, 4, 'Jayme Morris', 'Tuesday', '6', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:52:14', '2022-12-10 04:52:14'),
(22, NULL, 2, 3, 8, 'Shana Buchanan', 'Tuesday', '6', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:52:14', '2022-12-10 04:52:14'),
(23, NULL, 2, 3, 8, 'Jayme Morris', 'Tuesday', '8', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:52:14', '2022-12-10 04:52:14'),
(24, NULL, 2, 3, 7, 'Cole Holcomb', 'Tuesday', '8', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:52:14', '2022-12-10 04:52:14'),
(25, NULL, 2, 3, 8, 'Kay Strong', 'Tuesday', '9', '0', 'AM', '7', '0', 'PM', 1, '2022-12-10 04:52:15', '2022-12-10 04:52:15'),
(26, NULL, 2, 3, 6, 'Halla Owens', 'Wednesday', '5', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:52:34', '2022-12-10 04:52:34'),
(27, NULL, 2, 3, 4, 'Kay Strong', 'Wednesday', '7', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:52:34', '2022-12-10 04:52:34'),
(28, NULL, 2, 3, 6, 'Kay Strong', 'Wednesday', '1', '0', 'AM', '7', '0', 'PM', 1, '2022-12-10 04:52:34', '2022-12-10 04:52:34'),
(29, NULL, 2, 3, 11, 'Shana Buchanan', 'Wednesday', '1', '0', 'AM', '1', '0', 'PM', 1, '2022-12-10 04:52:34', '2022-12-10 04:52:34'),
(30, NULL, 2, 3, 4, 'Cole Holcomb', 'Wednesday', '0', '0', 'AM', '4', '0', 'PM', 1, '2022-12-10 04:52:34', '2022-12-10 04:52:34'),
(31, NULL, 2, 3, 8, 'Halla Owens', 'Wednesday', '9', '0', 'AM', '2', '0', 'PM', 1, '2022-12-10 04:52:34', '2022-12-10 04:52:34'),
(32, NULL, 2, 3, 4, 'Jayme Morris', 'Thursday', '4', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:52:56', '2022-12-10 04:52:56'),
(33, NULL, 2, 3, 8, 'Cole Holcomb', 'Thursday', '0', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:52:56', '2022-12-10 04:52:56'),
(34, NULL, 2, 3, 4, 'Jayme Morris', 'Thursday', '5', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:52:56', '2022-12-10 04:52:56'),
(35, NULL, 2, 3, 3, 'Cole Holcomb', 'Thursday', '9', '0', 'AM', '2', '0', 'PM', 1, '2022-12-10 04:52:56', '2022-12-10 04:52:56'),
(36, NULL, 2, 3, 3, 'Kay Strong', 'Thursday', '8', '0', 'AM', '2', '0', 'PM', 1, '2022-12-10 04:52:56', '2022-12-10 04:52:56'),
(37, NULL, 2, 3, 11, 'Halla Owens', 'Thursday', '3', '0', 'AM', '1', '0', 'PM', 1, '2022-12-10 04:52:56', '2022-12-10 04:52:56'),
(38, NULL, 3, 5, 10, 'Maggie Vargas', 'Thursday', '3', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:58:04', '2022-12-10 04:58:04'),
(39, NULL, 3, 5, 15, 'Alisa Lara', 'Thursday', '2', '0', 'AM', '5', '0', 'PM', 1, '2022-12-10 04:58:04', '2022-12-10 04:58:04'),
(40, NULL, 3, 5, 9, 'Maggie Vargas', 'Thursday', '9', '0', 'AM', '6', '0', 'PM', 1, '2022-12-10 04:58:04', '2022-12-10 04:58:04'),
(41, NULL, 3, 5, 13, 'Josiah Oneill', 'Thursday', '5', '0', 'AM', '2', '0', 'PM', 1, '2022-12-10 04:58:04', '2022-12-10 04:58:04'),
(42, NULL, 3, 5, 13, 'Hermione Pope', 'Thursday', '6', '0', 'AM', '3', '0', 'PM', 1, '2022-12-10 04:58:04', '2022-12-10 04:58:04'),
(43, NULL, 3, 5, 10, 'Hermione Pope', 'Thursday', '9', '0', 'AM', '2', '0', 'PM', 1, '2022-12-10 04:58:04', '2022-12-10 04:58:04'),
(44, NULL, 3, 5, 13, 'Maggie Vargas', 'Wednesday', '6', '0', 'AM', '4', '0', 'PM', 1, '2022-12-10 04:58:23', '2022-12-10 04:58:23'),
(45, NULL, 3, 5, 13, 'Maggie Vargas', 'Wednesday', '9', '0', 'AM', '8', '0', 'PM', 1, '2022-12-10 04:58:24', '2022-12-10 04:58:24'),
(46, NULL, 3, 5, 13, 'Beatrice Burks', 'Wednesday', '4', '0', 'AM', '2', '0', 'PM', 1, '2022-12-10 04:58:24', '2022-12-10 04:58:24'),
(47, NULL, 3, 5, 13, 'Alisa Lara', 'Wednesday', '8', '0', 'AM', '7', '0', 'PM', 1, '2022-12-10 04:58:24', '2022-12-10 04:58:24'),
(48, NULL, 3, 5, 12, 'Beatrice Burks', 'Wednesday', '1', '0', 'AM', '8', '0', 'PM', 1, '2022-12-10 04:58:24', '2022-12-10 04:58:24'),
(49, NULL, 3, 5, 9, 'Alisa Lara', 'Wednesday', '3', '0', 'AM', '3', '0', 'PM', 1, '2022-12-10 04:58:24', '2022-12-10 04:58:24'),
(50, NULL, 3, 5, 14, 'Hermione Pope', 'Tuesday', '0', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:58:40', '2022-12-10 04:58:40'),
(51, NULL, 3, 5, 13, 'Maggie Vargas', 'Tuesday', '1', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:58:41', '2022-12-10 04:58:41'),
(52, NULL, 3, 5, 10, 'Clementine Pugh', 'Tuesday', '2', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:58:41', '2022-12-10 04:58:41'),
(53, NULL, 3, 5, 14, 'Josiah Oneill', 'Tuesday', '8', '0', 'AM', '6', '0', 'PM', 1, '2022-12-10 04:58:41', '2022-12-10 04:58:41'),
(54, NULL, 3, 5, 9, 'Beatrice Burks', 'Tuesday', '0', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:58:41', '2022-12-10 04:58:41'),
(55, NULL, 3, 5, 15, 'Clementine Pugh', 'Tuesday', '7', '0', 'AM', '7', '0', 'PM', 1, '2022-12-10 04:58:41', '2022-12-10 04:58:41'),
(56, NULL, 3, 5, 12, 'Beatrice Burks', 'Monday', '3', '0', 'AM', '8', '0', 'PM', 1, '2022-12-10 04:59:01', '2022-12-10 04:59:01'),
(57, NULL, 3, 5, 14, 'Clementine Pugh', 'Monday', '2', '0', 'AM', '1', '0', 'PM', 1, '2022-12-10 04:59:01', '2022-12-10 04:59:01'),
(58, NULL, 3, 5, 13, 'Maggie Vargas', 'Monday', '1', '0', 'AM', '5', '0', 'PM', 1, '2022-12-10 04:59:01', '2022-12-10 04:59:01'),
(59, NULL, 3, 5, 12, 'Hermione Pope', 'Monday', '2', '0', 'AM', '2', '0', 'PM', 1, '2022-12-10 04:59:01', '2022-12-10 04:59:01'),
(60, NULL, 3, 5, 14, 'Clementine Pugh', 'Monday', '0', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:59:01', '2022-12-10 04:59:01'),
(61, NULL, 3, 5, 15, 'Alisa Lara', 'Monday', '2', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:59:02', '2022-12-10 04:59:02'),
(62, NULL, 3, 5, 14, 'Alisa Lara', 'Sunday', '2', '0', 'AM', '8', '0', 'PM', 1, '2022-12-10 04:59:21', '2022-12-10 04:59:21'),
(63, NULL, 3, 5, 14, 'Clementine Pugh', 'Sunday', '8', '0', 'AM', '7', '0', 'PM', 1, '2022-12-10 04:59:21', '2022-12-10 04:59:21'),
(64, NULL, 3, 5, 12, 'Josiah Oneill', 'Sunday', '9', '0', 'AM', '8', '0', 'PM', 1, '2022-12-10 04:59:21', '2022-12-10 04:59:21'),
(65, NULL, 3, 5, 15, 'Clementine Pugh', 'Sunday', '8', '0', 'AM', '5', '0', 'PM', 1, '2022-12-10 04:59:21', '2022-12-10 04:59:21'),
(66, NULL, 3, 5, 12, 'Maggie Vargas', 'Sunday', '9', '0', 'AM', '3', '0', 'PM', 1, '2022-12-10 04:59:22', '2022-12-10 04:59:22'),
(67, NULL, 3, 5, 9, 'Beatrice Burks', 'Sunday', '2', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:59:22', '2022-12-10 04:59:22'),
(68, NULL, 3, 5, 12, 'Beatrice Burks', 'Saturday', '3', '0', 'AM', '1', '0', 'PM', 1, '2022-12-10 04:59:47', '2022-12-10 04:59:47'),
(69, NULL, 3, 5, 13, 'Hermione Pope', 'Saturday', '5', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:59:47', '2022-12-10 04:59:47'),
(70, NULL, 3, 5, 14, 'Hermione Pope', 'Saturday', '1', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:59:47', '2022-12-10 04:59:47'),
(71, NULL, 3, 5, 13, 'Maggie Vargas', 'Saturday', '8', '0', 'AM', '2', '0', 'PM', 1, '2022-12-10 04:59:47', '2022-12-10 04:59:47'),
(72, NULL, 3, 5, 10, 'Maggie Vargas', 'Saturday', '8', '0', 'AM', '0', '0', 'PM', 1, '2022-12-10 04:59:47', '2022-12-10 04:59:47'),
(73, NULL, 3, 5, 12, 'Alisa Lara', 'Saturday', '0', '0', 'AM', '9', '0', 'PM', 1, '2022-12-10 04:59:47', '2022-12-10 04:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `school_id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(3, 'ins-39405', 'Quamar Stanton', 'fijavima@mailinator.com', '63', 'Provident aliquid p', 'Voluptatem Fugiat i', 0, '2022-10-03 02:06:05', '2022-10-03 02:06:05'),
(4, 'ins-39405', 'Alfonso Rutledge', 'nomuk@mailinator.com', '11', 'Odit eligendi dolore', 'Eu rem laudantium i', 0, '2022-10-03 02:06:11', '2022-10-03 02:06:11'),
(6, 'ins-39405', 'Blythe Terry', 'hesytin@mailinator.com', '30', 'Placeat quaerat lab', 'Qui placeat consequ', 0, '2022-10-20 04:17:42', '2022-10-20 04:17:42'),
(7, 'ins-39405', 'Rafael Guzman', 'fyxy@mailinator.com', '222222', 'Qui nostrum nulla su', 'Sint laboriosam per', 0, '2022-10-20 04:22:28', '2022-10-20 04:22:28'),
(8, 'ins-39405', 'Iona Hardy', 'zyfakela@mailinator.com', '54', 'Reiciendis pariatur', 'Molestiae deserunt m', 0, '2022-10-20 04:23:32', '2022-10-20 04:23:32'),
(9, 'ins-39405', 'Caryn Sampson', 'lepic@mailinator.com', '4711111', 'Obcaecati odio adipi', 'Consequat Sit ex u', 0, '2022-10-20 04:24:33', '2022-10-20 04:24:33'),
(10, 'ins-39405', 'Kimberley Luna', 'quhoce@mailinator.com', '62', 'Deleniti et expedita', 'Soluta maxime in in', 0, '2022-10-20 04:26:21', '2022-10-20 04:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `school_id`, `course_name`, `course_code`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Step-5', 'st-1234', '1', '2022-10-20 00:17:10', '2022-10-20 00:17:10'),
(2, NULL, 'step-3', 'st-1235', '1', '2022-10-20 00:17:44', '2022-10-20 00:17:44'),
(3, NULL, 'step-4', 'st-1236', '1', '2022-10-20 00:18:29', '2022-10-20 00:18:29'),
(4, NULL, 'Step-6', 'st-1237', '1', '2022-10-20 00:18:41', '2022-10-20 00:19:39'),
(6, NULL, 'Thomas Harrison', 'Excepturi nobis cupi', '1', '2022-11-07 03:13:22', '2022-11-07 03:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `create_marks_1_students`
--

CREATE TABLE `create_marks_1_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mcq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `practical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `create_marks_1_students`
--

INSERT INTO `create_marks_1_students` (`id`, `student_id`, `roll`, `stu_name`, `session`, `class_name`, `section`, `subject_name`, `theory`, `mcq`, `practical`, `total`, `assignment`, `remarks`) VALUES
(3, 1, '101', 'vufovolifa@mailinator.com', '2021-2022', '2', '3', '4', '50', '20', '25', NULL, NULL, NULL),
(4, 3, '202', 'Surjo', '2021-2022', '2', '3', '4', '40', '20', '25', NULL, NULL, NULL),
(5, 1, '101', 'vufovolifa@mailinator.com', '2021-2022', '2', '3', '6', '40', '20', '20', NULL, NULL, NULL),
(6, 3, '202', 'Surjo', '2021-2022', '2', '3', '6', '30', '35', '25', NULL, NULL, NULL),
(7, 1, '101', 'vufovolifa@mailinator.com', '2021-2022', '2', '3', '7', '45', '10', '25', NULL, NULL, NULL),
(8, 3, '202', 'Surjo', '2021-2022', '2', '3', '7', '45', '45', '12', NULL, NULL, NULL),
(9, 1, '101', 'vufovolifa@mailinator.com', '2021-2022', '2', '3', '3', '35', '12', '12', NULL, NULL, NULL),
(10, 3, '202', 'Surjo', '2021-2022', '2', '3', '3', '45', '45', '10', NULL, NULL, NULL),
(11, 1, '101', 'vufovolifa@mailinator.com', '2021-2022', '2', '3', '8', '12', '12', '14', NULL, NULL, NULL),
(12, 3, '202', 'Surjo', '2021-2022', '2', '3', '8', '12', '45', '12', NULL, NULL, NULL),
(13, 1, '101', 'vufovolifa@mailinator.com', '2021-2022', '2', '3', '11', '12', '12', '12', NULL, NULL, NULL),
(14, 3, '202', 'Surjo', '2021-2022', '2', '3', '11', '45', '45', '12', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `create_marks_2_students`
--

CREATE TABLE `create_marks_2_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mcq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `practical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `create_marks_2_students`
--

INSERT INTO `create_marks_2_students` (`id`, `student_id`, `roll`, `stu_name`, `session`, `class_name`, `section`, `subject_name`, `theory`, `mcq`, `practical`, `total`, `assignment`, `remarks`) VALUES
(1, 2, '500', 'jodigutira@mailinator.com', '2020-2021', '4', '6', '16', '50', '20', NULL, '70', NULL, NULL),
(2, 4, '401', 'Sakib', '2020-2021', '4', '6', '16', '40', '25', NULL, '60', NULL, NULL),
(3, 2, '500', 'jodigutira@mailinator.com', '2020-2021', '4', '6', '17', '70', NULL, NULL, '70', NULL, NULL),
(4, 4, '401', 'Sakib', '2020-2021', '4', '6', '17', '80', NULL, NULL, '80', NULL, NULL),
(5, 2, '500', 'jodigutira@mailinator.com', '2020-2021', '4', '6', '18', '40', '27', NULL, '67', NULL, NULL),
(6, 4, '401', 'Sakib', '2020-2021', '4', '6', '18', '35', '20', NULL, '55', NULL, NULL),
(7, 2, '500', 'jodigutira@mailinator.com', '2020-2021', '4', '6', '19', '35', '20', NULL, '55', NULL, NULL),
(8, 4, '401', 'Sakib', '2020-2021', '4', '6', '19', '6', '6', NULL, '12', NULL, NULL),
(9, 2, '500', 'jodigutira@mailinator.com', '2020-2021', '4', '6', '16', NULL, NULL, NULL, '0', NULL, NULL),
(10, 4, '401', 'Sakib', '2020-2021', '4', '6', '16', '45', '20', '15', '80', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd', NULL, NULL),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd', NULL, NULL),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', NULL, NULL),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL, 'www.rangamati.gov.bd', NULL, NULL),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd', NULL, NULL),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', NULL, NULL),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', NULL, NULL),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd', NULL, NULL),
(9, 1, 'Coxsbazar', 'কক্সবাজার', NULL, NULL, 'www.coxsbazar.gov.bd', NULL, NULL),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', NULL, NULL),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', NULL, NULL),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', NULL, NULL),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd', NULL, NULL),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd', NULL, NULL),
(15, 2, 'Rajshahi', 'রাজশাহী', NULL, NULL, 'www.rajshahi.gov.bd', NULL, NULL),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd', NULL, NULL),
(17, 2, 'Joypurhat', 'জয়পুরহাট', NULL, NULL, 'www.joypurhat.gov.bd', NULL, NULL),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', NULL, NULL),
(19, 2, 'Naogaon', 'নওগাঁ', NULL, NULL, 'www.naogaon.gov.bd', NULL, NULL),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd', NULL, NULL),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd', NULL, NULL),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd', NULL, NULL),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd', NULL, NULL),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', NULL, NULL),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd', NULL, NULL),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd', NULL, NULL),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd', NULL, NULL),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd', NULL, NULL),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', NULL, NULL),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd', NULL, NULL),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', NULL, NULL),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd', NULL, NULL),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd', NULL, NULL),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd', NULL, NULL),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd', NULL, NULL),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', NULL, NULL),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', NULL, NULL),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd', NULL, NULL),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', NULL, NULL),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd', NULL, NULL),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', NULL, NULL),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd', NULL, NULL),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd', NULL, NULL),
(44, 6, 'Tangail', 'টাঙ্গাইল', NULL, NULL, 'www.tangail.gov.bd', NULL, NULL),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', NULL, NULL),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd', NULL, NULL),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', NULL, NULL),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd', NULL, NULL),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', NULL, NULL),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd', NULL, NULL),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', NULL, NULL),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', NULL, NULL),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', NULL, NULL),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', NULL, NULL),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd', NULL, NULL),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd', NULL, NULL),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd', NULL, NULL),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', NULL, NULL),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd', NULL, NULL),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd', NULL, NULL),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', NULL, NULL),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', NULL, NULL, 'www.mymensingh.gov.bd', NULL, NULL),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd', NULL, NULL),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd', NULL, NULL),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd', NULL, NULL),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd', NULL, NULL),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd', NULL, NULL),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd', NULL, NULL),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd', NULL, NULL),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd', NULL, NULL),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education_qualifications`
--

CREATE TABLE `education_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passing_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gpa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_qualifications`
--

INSERT INTO `education_qualifications` (`id`, `student_id`, `exam_name`, `department`, `board`, `passing_year`, `exam_roll`, `reg`, `gpa`, `created_at`, `updated_at`) VALUES
(1, 1, 'HSC', 'Science', 'Barisal', '2026', '1245789', '4567892', '4', '2022-12-19 23:20:32', '2022-12-19 23:27:27'),
(2, 5, 'PSC', 'Commerce', 'DIBS(Dhaka)', '2035', 'sevym@mailinator.com', 'wavyzuve@mailinator.com', 'jofoxezyde@mailinator.com', '2022-12-21 08:44:40', '2022-12-21 08:44:40'),
(3, 6, 'JSC', 'Science', 'Barisal', '2033', 'fyrekit@mailinator.com', 'sahuzy@mailinator.com', 'piwykom@mailinator.com', '2022-12-21 08:46:46', '2022-12-21 08:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE `employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(10,2) DEFAULT NULL,
  `adv_salary` double(10,2) DEFAULT NULL,
  `due_salary` double(10,2) DEFAULT NULL,
  `session_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `discription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salaries`
--

INSERT INTO `employee_salaries` (`id`, `user_id`, `user_name`, `salary`, `adv_salary`, `due_salary`, `session_year`, `month`, `date`, `discription`, `pay_status`, `created_at`, `updated_at`) VALUES
(1, NULL, '1-t', 12000.00, NULL, NULL, '2021-2022', 'Decembar-2022', '2022-12-22', 'Paid', 'paid', '2022-12-22 03:31:41', '2022-12-22 03:31:41'),
(2, NULL, '4-t', 10000.00, NULL, NULL, '2021-2022', 'Decembar-2022', '2022-12-22', 'paid', 'paid', '2022-12-22 03:32:26', '2022-12-22 03:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `school_id`, `title`, `image`, `details`, `event_date`, `status`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Friday Holyday', 'assets/backend/img/event/6335da7baba031.png', '<p>The VSI International School aims at all round personality development of the students, who learn to give and receive respect, as they are groomed into citizens not only of this country but also of the world.</p>', '2022-09-30', 1, '2022-09-29 11:48:43', '2022-09-29 11:48:43'),
(4, NULL, 'CA Ramesh C. Sharma (Chairman) The first principle', 'assets/backend/img/event/6335dac57c0c82.png', '<p>We at VSI International School believe in the fundamental dignity of each individual. We believe that educational excellence helps to develop understanding, reasoning and thinking skills. It also helps to instill a life-long appreciation for learning and helps foster a sense of moral and ethical behavior.</p>', '2022-10-01', 1, '2022-09-29 11:49:57', '2022-09-29 11:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `exam_grades`
--

CREATE TABLE `exam_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_upto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point_upto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_grades`
--

INSERT INTO `exam_grades` (`id`, `grade_name`, `grade_point`, `mark_from`, `mark_upto`, `grade_point_from`, `grade_point_upto`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '2', '40', '49', '2', '3', 'dfgfgfgdfg', 1, '2022-12-07 23:46:49', '2022-12-07 23:46:50'),
(2, 'A', '4', '70', '79', '4', '5', 'fdgdfg', 1, '2022-12-07 23:53:52', '2022-12-07 23:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `exam_lists`
--

CREATE TABLE `exam_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_lists`
--

INSERT INTO `exam_lists` (`id`, `school_id`, `exam_name`, `date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '1st Tarm', '2022-04-01', '1st Mid-Tarm Exam 1st April', 1, '2022-11-12 04:31:06', '2022-11-12 04:31:07'),
(2, NULL, '2nd Tarm', '2022-08-02', '2nd mid-tarm exam', 1, '2022-11-12 04:33:11', '2022-11-12 04:33:11'),
(6, NULL, 'hjbh', '2022-11-12', 'hjh', 1, '2022-11-19 03:38:18', '2022-11-19 03:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `expances`
--

CREATE TABLE `expances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expance_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expances`
--

INSERT INTO `expances` (`id`, `expance_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Timothy Fisher', 'Porro ut corporis ad', '1', '2022-12-11 05:36:09', '2022-12-11 05:36:09'),
(3, 'Kyra Rowland', 'Magnam blanditiis es', '1', '2022-12-11 05:36:19', '2022-12-11 05:36:19'),
(4, 'Eletric bill', 'Eletric bill  Eletric bill', '1', '2022-12-11 10:15:40', '2022-12-11 10:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `expancesive_lists`
--

CREATE TABLE `expancesive_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expance_type` bigint(20) UNSIGNED DEFAULT NULL,
  `salary` double(10,2) DEFAULT NULL,
  `adv_salary` double(10,2) DEFAULT NULL,
  `due_salary` double(10,2) DEFAULT NULL,
  `pay` double(10,2) DEFAULT NULL,
  `adv_pay` double(10,2) DEFAULT NULL,
  `due_pay` double(10,2) DEFAULT NULL,
  `session_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `discription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_image` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `school_id`, `title`, `title_image`, `total_image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Image gallery', 'assets/backend/img/gallery/6350dbd21fedf360_F_427160582_w0D5Z01pVaz32w7JzzNWTtE2n1VvvKmi.jpg', 3, 1, '2022-10-19 23:25:38', '2022-10-19 23:26:07'),
(2, NULL, 'Holiday', 'assets/backend/img/gallery/63511a9cf0258download (3).jpg', 2, 1, '2022-10-20 03:53:33', '2022-10-20 03:53:34'),
(3, NULL, 'Pohela boishak', 'assets/backend/img/gallery/63511adfa5362download (3).jpg', 4, 1, '2022-10-20 03:54:39', '2022-10-20 03:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gallery_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `school_id`, `gallery_id`, `gallery_image`, `created_at`, `updated_at`) VALUES
(3, NULL, 1, 'assets/backend/img/gallery/6350dbd266d8fimages (2).jpg', '2022-10-19 23:25:38', '2022-10-19 23:25:38'),
(4, NULL, 1, 'assets/backend/img/gallery/6350dbd2a5c57images.jpg', '2022-10-19 23:25:38', '2022-10-19 23:25:38'),
(5, NULL, 1, 'assets/backend/img/gallery/6350dbed24902397745.jpg', '2022-10-19 23:26:06', '2022-10-19 23:26:06'),
(6, NULL, 2, 'assets/backend/img/gallery/63511a9d6d6dadownload (2).jpeg', '2022-10-20 03:53:33', '2022-10-20 03:53:33'),
(7, NULL, 2, 'assets/backend/img/gallery/63511a9dc4a60download (3).jpeg', '2022-10-20 03:53:34', '2022-10-20 03:53:34'),
(8, NULL, 3, 'assets/backend/img/gallery/63511adfefec7download (1).jpg', '2022-10-20 03:54:40', '2022-10-20 03:54:40'),
(9, NULL, 3, 'assets/backend/img/gallery/63511ae04583ddownload (2).jpg', '2022-10-20 03:54:40', '2022-10-20 03:54:40'),
(10, NULL, 3, 'assets/backend/img/gallery/63511ae0ac42ddownload.jpg', '2022-10-20 03:54:40', '2022-10-20 03:54:40'),
(11, NULL, 3, 'assets/backend/img/gallery/63511ae1005f1images.jpg', '2022-10-20 03:54:41', '2022-10-20 03:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `school_id`, `website_name`, `footer`, `email`, `phone`, `fax`, `address`, `latitude`, `longitude`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, NULL, 'QUALITY EDUCATION SCHOOL & COLLEGE', 'Druto School © DrutoSoft 2022', 'ashad@gmail.com', '12456789', NULL, 'GMMV+RQ5, Mohitnagar, Jalpaiguri, West Bengal 735101, India', 4587.36, 87778.3, 'assets/backend/img/general_settings/636be05ed87ddSK-School-Logo.png', 'assets/backend/img/general_settings/6305f18739601Favicon.png', NULL, '2022-11-09 11:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `reject` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `school_id`, `name`, `category_id`, `supplier_id`, `price`, `quantity`, `total_quantity`, `total_price`, `image`, `description`, `status`, `reject`, `created_at`, `updated_at`) VALUES
(1, NULL, 'V7 Engry Light', 6, 5, 350.00, 2, 19, 8750.00, 'assets/backend/teacher/6386dd913c452170px-Gluehlampe_01_KMJ.jpg', 'Light 3d Ex model', 1, 0, '2022-11-29 22:35:29', '2022-11-30 10:27:05'),
(2, NULL, 'BRB Siling Fan-950', 5, 1, 2500.00, 27, 30, 75000.00, 'assets/backend/teacher/6386de098fdd2download.png', 'brb high defense  selling fan', 1, 0, '2022-11-29 22:37:29', '2022-11-29 22:39:43'),
(3, NULL, 'Finger Print', 6, 6, 870.00, 40, 50, 43500.00, 'assets/backend/teacher/638707ddd654edownload (2).jpg', 'Earum aut nobis vita', 1, 0, '2022-11-30 01:35:59', '2022-11-30 01:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_categories`
--

CREATE TABLE `inventory_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_categories`
--

INSERT INTO `inventory_categories` (`id`, `school_id`, `category_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laptop', 'Irure aliquid incidu', 1, '2022-11-26 23:24:02', '2022-11-26 23:54:00'),
(3, NULL, 'Byron Murphy', 'Eum ut maiores amet', 1, '2022-11-27 10:20:32', '2022-11-27 10:20:32'),
(4, NULL, 'Jessamine York', 'Sapiente adipisci mi', 1, '2022-11-27 10:37:51', '2022-11-27 10:37:51'),
(5, NULL, 'Fan', 'fan is able able', 1, '2022-11-29 10:02:19', '2022-11-29 10:02:19'),
(6, NULL, 'Electronics', 'Electronics device', 1, '2022-11-29 21:45:19', '2022-11-29 21:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_identities`
--

CREATE TABLE `inventory_identities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_Id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `identity_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_identities`
--

INSERT INTO `inventory_identities` (`id`, `school_id`, `category_Id`, `product_id`, `identity_name`, `slug`, `price`, `starting_date`, `quantity`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 6, 1, 'seven', 'seven-1', 350.00, '2022-11-30', 15, NULL, NULL, '2022-11-29 22:38:39', '2022-11-29 22:43:14'),
(2, NULL, 5, 2, 'seven', 'seven-2', 2500.00, '2022-11-30', 3, NULL, NULL, '2022-11-29 22:39:43', '2022-11-29 22:39:43'),
(3, NULL, 6, 1, 'eight', 'eight-1', 350.00, '2022-11-30', 3, NULL, NULL, '2022-11-29 22:40:14', '2022-11-29 22:40:14'),
(4, NULL, 6, 1, 'ten', 'ten-1', 350.00, '2022-11-30', 0, NULL, NULL, '2022-11-29 22:40:39', '2022-11-29 23:18:41'),
(5, NULL, 6, 3, 'Class 8', 'class-8-3', 870.00, NULL, 5, NULL, NULL, '2022-11-30 01:36:56', '2022-11-30 01:37:50'),
(6, NULL, 6, 1, 'two', 'two-1', 350.00, '2022-11-29', 1, NULL, NULL, '2022-11-30 10:27:05', '2022-11-30 10:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `invent_suppliers`
--

CREATE TABLE `invent_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invent_suppliers`
--

INSERT INTO `invent_suppliers` (`id`, `school_id`, `name`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Florence Chase', 'bityjifyv@mailinator.com', '+1 (949) 548-2679', 'Deserunt dolor aperi', 1, '2022-11-27 00:42:41', '2022-11-27 00:47:02'),
(2, NULL, 'Hedley Collier', 'babibi@mailinator.com', '+1 (567) 272-3056', 'Et eligendi dolor re', 1, '2022-11-27 00:44:38', '2022-11-27 00:44:38'),
(3, NULL, 'Erin Copeland', 'pisa@mailinator.com', '+1 (421) 663-1969', 'Et magnam ipsum nob', 0, '2022-11-27 00:44:50', '2022-11-27 00:58:29'),
(5, NULL, 'Remedios Bird', 'pafijoc@mailinator.com', '+1 (618) 827-4793', 'Veniam consequuntur', 1, '2022-11-27 10:20:55', '2022-11-27 10:20:55'),
(6, NULL, 'Wyatt Nichols', 'kymoly@mailinator.com', '+1 (633) 639-6033', 'Fugiat dolorem vero', 1, '2022-11-27 10:38:16', '2022-11-27 10:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `issu_books`
--

CREATE TABLE `issu_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_name` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_copy` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issu_books`
--

INSERT INTO `issu_books` (`id`, `school_id`, `book_name`, `name`, `phone`, `address`, `num_of_copy`, `issue_date`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Elmo Hardy', '+1 (834) 619-1701', 'Voluptas veniam vol', 4, '1976-01-25', NULL, 1, '2022-11-18 09:42:55', '2022-11-18 11:33:59'),
(2, NULL, 2, 'Martina Tillman', '+1 (408) 522-6253', 'Aperiam do dolor lab', 5, '2012-05-26', NULL, 1, '2022-11-18 11:14:02', '2022-11-18 11:34:44'),
(3, NULL, 4, 'Hasan', '12345678904', 'Dhaka', 5, '2022-11-19', NULL, 1, '2022-11-19 10:08:03', '2022-11-19 10:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `salary` double(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`id`, `role_id`, `name`, `email`, `phone`, `image`, `gender`, `dob`, `salary`, `status`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 4, 'Joan Wiley', 'pyvanysupy@mailinator.com', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$XEKXzEHYhe.7Aliu6nNeL.Jq9A6tFI5SIVyW9wx3cJ4YlNUAOS3jq', NULL, NULL, '2022-12-12 09:14:20', '2022-12-12 09:14:20'),
(2, 4, 'Linus Buckley', 'fejacen@mailinator.com', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$8Yoyderle0Oq4CxMk2SJS.B1bTSjmuq0eKuw7vjK4PhunqoRgtgoS', NULL, NULL, '2022-12-12 09:14:44', '2022-12-12 09:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `library_books`
--

CREATE TABLE `library_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_category` bigint(20) UNSIGNED DEFAULT NULL,
  `self_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `library_books`
--

INSERT INTO `library_books` (`id`, `school_id`, `book_category`, `self_no`, `book_name`, `author`, `description`, `price`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Consequatur qui quis', 'Lewis Rodriguez', 'Natus voluptates nih', 'In inventore molesti', 700.00, '14', 1, '2022-11-18 05:53:56', '2022-11-18 11:33:59'),
(2, NULL, 1, 'Ipsa consequatur in', 'Hayden Bradley', 'Minim ut delectus e', 'Et voluptatem Omnis', 974.00, '6', 1, '2022-11-18 05:54:15', '2022-11-18 11:34:44'),
(3, NULL, 1, '12', 'Marquez', 'Est', 'Ad dolore est dicta', 500.00, '10', 1, '2022-11-19 10:05:34', '2022-11-19 10:05:34'),
(4, NULL, 1, '12', 'Marquez', 'Est', 'Ad dolore est dicta', 500.00, '10', 1, '2022-11-19 10:05:38', '2022-11-19 10:09:09'),
(5, NULL, 1, '12', 'Marquez', 'Est', 'Ad dolore est dicta', 500.00, '10', 1, '2022-11-19 10:05:40', '2022-11-19 10:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `lost_inventories`
--

CREATE TABLE `lost_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lost_inventories`
--

INSERT INTO `lost_inventories` (`id`, `school_id`, `product_id`, `product_name`, `identity_name`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(6, NULL, 1, 'ten', 'ten', 350.00, 3, '2022-11-29 23:18:41', '2022-11-29 23:18:41'),
(7, NULL, 3, NULL, 'Class 8', 870.00, 5, '2022-11-30 01:37:50', '2022-11-30 01:37:50'),
(8, NULL, 1, NULL, 'two', 350.00, 1, '2022-11-30 10:31:10', '2022-11-30 10:31:12');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_24_062738_create_general_settings_table', 1),
(6, '2022_08_25_094614_create_banners_table', 1),
(7, '2022_09_01_072425_create_quotes_table', 1),
(9, '2022_09_05_140303_create_notices_table', 2),
(11, '2022_09_06_051855_create_school_sections_table', 3),
(12, '2022_09_06_085126_create_events_table', 4),
(29, '2022_09_26_055706_create_divisions_table', 8),
(30, '2022_09_26_060239_create_districts_table', 8),
(31, '2022_09_26_060346_create_unions_table', 8),
(32, '2022_09_26_070242_create_thanas_table', 8),
(35, '2022_09_30_103401_create_contacts_table', 9),
(38, '2022_09_08_075335_create_galleries_table', 10),
(39, '2022_09_08_075800_create_gallery_images_table', 10),
(45, '2022_09_25_093545_create_trades_table', 11),
(46, '2022_09_25_093908_create_courses_table', 11),
(47, '2022_10_01_024615_create_social_settings_table', 11),
(48, '2022_09_26_122402_create_online_admissions_table', 12),
(50, '2022_10_29_184239_create_classes_table', 14),
(51, '2022_10_29_211030_create_sections_table', 14),
(52, '2022_10_30_202233_create_session_years_table', 15),
(53, '2022_11_02_044859_create_students_table', 25),
(63, '2022_11_07_033323_create_subjects_table', 17),
(65, '2022_11_07_062219_create_education_qualifications_table', 17),
(109, '2014_10_12_000000_create_users_table', 18),
(110, '2022_11_10_090041_create_class_routines_table', 18),
(111, '2022_11_11_061434_create_modules_table', 18),
(112, '2022_11_11_062713_create_permissions_table', 18),
(113, '2022_11_11_063017_create_roles_table', 18),
(114, '2022_11_12_054734_create_permission_role_table', 18),
(115, '2022_11_12_094010_create_exam_lists_table', 19),
(121, '2022_11_12_104745_create_exam_grades_table', 21),
(122, '2022_11_15_094035_create_library_books_table', 21),
(123, '2022_11_15_101316_create_book_categories_table', 21),
(126, '2022_11_18_061721_create_issu_books_table', 23),
(128, '2022_11_18_180858_create_admin_resets_table', 24),
(132, '2022_11_23_055611_create_transports_table', 26),
(133, '2022_11_07_044859_create_students_table', 27),
(134, '2022_11_27_042907_create_inventory_categories_table', 28),
(135, '2022_11_27_055912_create_invent_suppliers_table', 29),
(153, '2022_11_27_070054_create_inventories_table', 30),
(154, '2022_11_27_115226_create_inventory_identities_table', 30),
(155, '2022_11_29_092856_create_lost_inventories_table', 30),
(157, '2022_11_30_090708_create_supplier_invoices_table', 31),
(161, '2016_06_01_000001_create_oauth_auth_codes_table', 33),
(162, '2016_06_01_000002_create_oauth_access_tokens_table', 33),
(163, '2016_06_01_000003_create_oauth_refresh_tokens_table', 33),
(164, '2016_06_01_000004_create_oauth_clients_table', 33),
(165, '2016_06_01_000005_create_oauth_personal_access_clients_table', 33),
(166, '2022_12_05_115739_create_assignments_table', 33),
(169, '2022_12_11_052804_create_expances_table', 34),
(175, '2022_11_06_073621_create_teachers_table', 36),
(176, '2022_11_18_032521_create_librarians_table', 36),
(177, '2022_11_20_081539_create_accountants_table', 36),
(178, '2022_12_05_065002_create_staff_manages_table', 36),
(181, '2022_12_11_063305_create_expancesive_lists_table', 37),
(182, '2022_12_11_130158_create_employee_salaries_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin Dashboard', 'admin.Dashboard', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(2, 'Role Management', 'role.Management', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(3, 'User Management', 'user.Management', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(4, 'Web Management', 'web.Management', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(5, 'Session Management', 'session.Management', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(6, 'Course Management', 'course.Management', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(7, 'Trade Management', 'trade.Management', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(8, 'Teacher Management', 'teacher.Management', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(9, 'Application Management', 'application.Management', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(10, 'Class Management', 'class.Management', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(11, 'Student Management', 'student.Management', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(12, 'Subject Management', 'subject.Management', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(13, 'Class Routine Management', 'classroutine.Management', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(14, 'Section Management', 'section.Management', '2022-11-15 00:52:24', '2022-11-15 00:52:24'),
(15, 'Student Attendance Management', 'attendance.Management', '2022-11-19 02:52:43', '2022-11-19 02:52:43'),
(16, 'Exam Management', 'exam.Management', '2022-11-19 02:52:44', '2022-11-19 02:52:44'),
(17, 'Librarian Management', 'librarian.Management', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(18, 'Library Management', 'library.Management', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(19, 'Accountant Management', 'accountant.Management', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(20, 'Account Management', 'account.Management', '2022-11-19 02:52:46', '2022-11-19 02:52:46'),
(21, 'Settings Management', 'setting.Management', '2022-11-19 02:52:46', '2022-11-19 02:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `school_id`, `title`, `notice`, `status`, `created_at`, `updated_at`) VALUES
(4, NULL, 'Pending Document Verification For Graduate Programs – Spring 2022', 'assets/backend/notice/63368260bc926rabbi_cv.pdf', 1, '2022-09-29 23:45:04', '2022-09-29 23:45:04'),
(5, NULL, 'Pending Document Verification For Graduate Programs – Spring 2023', 'assets/backend/notice/6336827dc1580rabbi-hasan.pdf', 1, '2022-09-29 23:45:33', '2022-09-29 23:45:33'),
(6, NULL, 'Graduate Programs – Spring 2022', 'assets/backend/notice/6336828c8c59arabbi_cv.pdf', 1, '2022-09-29 23:45:48', '2022-09-29 23:45:48'),
(7, NULL, 'Verification For Graduate Programs', 'assets/backend/notice/633684a0b65d6rabbi-hasan.pdf', 1, '2022-09-29 23:54:40', '2022-09-29 23:54:40'),
(8, NULL, '2024 Verification For Graduate Programs', 'assets/backend/notice/633684afb1a64rabbi-hasan.pdf', 1, '2022-09-29 23:54:55', '2022-09-29 23:54:55'),
(9, NULL, '2025 Verification For Graduate Programs', 'assets/backend/notice/633684c420dbbrabbi_cv.pdf', 1, '2022-09-29 23:55:16', '2022-09-29 23:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('4f9fa0b86eae13f05d02a66b5df1ccbd2a5042b3cebc1ce4ff86b735cfc6639efc1a2061911ac3a4', 4, 1, 'auth_token', '[]', 0, '2022-12-07 02:50:45', '2022-12-07 02:50:45', '2023-12-07 08:50:45'),
('a9e9698685223c26d61f6babad004b75365cd22bec240a6b1fab8b1257ebe45fe19d317035407a11', 16, 1, 'auth_token', '[]', 1, '2022-12-07 01:23:46', '2022-12-07 01:23:46', '2023-12-07 07:23:46'),
('b79b641564006f1ef71fdc874fce6a42072cde0f7bd8a684999c6c26b786afeb5090a15e7987c0e2', 16, 1, 'auth_token', '[]', 0, '2022-12-07 00:55:39', '2022-12-07 00:55:39', '2023-12-07 06:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
<br />
<b>Fatal error</b>:  Maximum execution time of 300 seconds exceeded in <b>C:\xampp\phpMyAdmin\libraries\classes\Dbal\DbiMysqli.php</b> on line <b>209</b><br />
