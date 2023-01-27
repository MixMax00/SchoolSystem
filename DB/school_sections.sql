-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 04:08 PM
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
-- Table structure for table `school_sections`
--

CREATE TABLE `school_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bottom_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_sections`
--

INSERT INTO `school_sections` (`id`, `school_name`, `short_description`, `title_image`, `top_description`, `bottom_description`, `middle_image`, `created_at`, `updated_at`) VALUES
(1, 'Quality Education School & College', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex debitis consectetur, voluptatum tempora fugiat magnam minus quae exercitationem autem provident sit architecto facere, perferendis odit? Soluta maxime quisquam dolorum quibusdam. Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; primary program&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;primary program</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;primary program</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;primary program</p>\r\n\r\n<p>&nbsp;</p>', 'assets/backend/img/school/6316f8ef9fb49kj.jpeg', '<p>Druto School&nbsp;Druto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto School</p>', '<p>Druto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto SchoolDruto School</p>', 'assets/backend/img/school/6335e66c76fbbabout.png', '2022-09-06 01:37:55', '2022-10-19 22:42:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `school_sections`
--
ALTER TABLE `school_sections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `school_sections`
--
ALTER TABLE `school_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
