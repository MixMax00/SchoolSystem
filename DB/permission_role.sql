-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 04:24 PM
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
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 8, 1, NULL, NULL),
(9, 9, 1, NULL, NULL),
(10, 10, 1, NULL, NULL),
(11, 11, 1, NULL, NULL),
(12, 12, 1, NULL, NULL),
(13, 13, 1, NULL, NULL),
(14, 14, 1, NULL, NULL),
(15, 15, 1, NULL, NULL),
(16, 16, 1, NULL, NULL),
(17, 17, 1, NULL, NULL),
(18, 18, 1, NULL, NULL),
(19, 19, 1, NULL, NULL),
(20, 20, 1, NULL, NULL),
(21, 21, 1, NULL, NULL),
(22, 22, 1, NULL, NULL),
(23, 23, 1, NULL, NULL),
(24, 24, 1, NULL, NULL),
(25, 25, 1, NULL, NULL),
(26, 26, 1, NULL, NULL),
(27, 27, 1, NULL, NULL),
(28, 28, 1, NULL, NULL),
(29, 29, 1, NULL, NULL),
(30, 30, 1, NULL, NULL),
(31, 31, 1, NULL, NULL),
(32, 32, 1, NULL, NULL),
(33, 33, 1, NULL, NULL),
(34, 34, 1, NULL, NULL),
(35, 35, 1, NULL, NULL),
(36, 36, 1, NULL, NULL),
(37, 37, 1, NULL, NULL),
(38, 38, 1, NULL, NULL),
(39, 39, 1, NULL, NULL),
(40, 40, 1, NULL, NULL),
(41, 41, 1, NULL, NULL),
(42, 42, 1, NULL, NULL),
(43, 43, 1, NULL, NULL),
(44, 44, 1, NULL, NULL),
(45, 45, 1, NULL, NULL),
(46, 46, 1, NULL, NULL),
(47, 47, 1, NULL, NULL),
(48, 48, 1, NULL, NULL),
(49, 49, 1, NULL, NULL),
(50, 1, 2, NULL, NULL),
(51, 14, 2, NULL, NULL),
(52, 18, 2, NULL, NULL),
(53, 26, 2, NULL, NULL),
(54, 34, 2, NULL, NULL),
(55, 38, 2, NULL, NULL),
(56, 46, 2, NULL, NULL),
(57, 2, 2, NULL, NULL),
(58, 6, 2, NULL, NULL),
(59, 10, 2, NULL, NULL),
(60, 22, 2, NULL, NULL),
(61, 30, 2, NULL, NULL),
(62, 42, 2, NULL, NULL),
(66, 1, 3, NULL, NULL),
(68, 50, 1, NULL, NULL),
(69, 51, 1, NULL, NULL),
(70, 52, 1, NULL, NULL),
(71, 53, 1, NULL, NULL),
(72, 1, 4, NULL, NULL),
(73, 14, 3, NULL, NULL),
(74, 34, 3, NULL, NULL),
(75, 38, 3, NULL, NULL),
(76, 42, 3, NULL, NULL),
(77, 46, 3, NULL, NULL),
(78, 50, 3, NULL, NULL),
(79, 1, 6, NULL, NULL),
(80, 2, 6, NULL, NULL),
(81, 3, 6, NULL, NULL),
(82, 4, 6, NULL, NULL),
(83, 5, 6, NULL, NULL),
(84, 6, 6, NULL, NULL),
(85, 7, 6, NULL, NULL),
(86, 8, 6, NULL, NULL),
(87, 9, 6, NULL, NULL),
(88, 10, 6, NULL, NULL),
(89, 11, 6, NULL, NULL),
(90, 12, 6, NULL, NULL),
(91, 13, 6, NULL, NULL),
(92, 14, 6, NULL, NULL),
(93, 15, 6, NULL, NULL),
(94, 16, 6, NULL, NULL),
(95, 17, 6, NULL, NULL),
(96, 18, 6, NULL, NULL),
(97, 19, 6, NULL, NULL),
(98, 20, 6, NULL, NULL),
(99, 21, 6, NULL, NULL),
(100, 22, 6, NULL, NULL),
(101, 23, 6, NULL, NULL),
(102, 24, 6, NULL, NULL),
(103, 25, 6, NULL, NULL),
(104, 26, 6, NULL, NULL),
(105, 27, 6, NULL, NULL),
(106, 28, 6, NULL, NULL),
(107, 29, 6, NULL, NULL),
(108, 30, 6, NULL, NULL),
(109, 31, 6, NULL, NULL),
(110, 32, 6, NULL, NULL),
(111, 33, 6, NULL, NULL),
(112, 34, 6, NULL, NULL),
(113, 35, 6, NULL, NULL),
(114, 36, 6, NULL, NULL),
(115, 37, 6, NULL, NULL),
(116, 38, 6, NULL, NULL),
(117, 39, 6, NULL, NULL),
(118, 40, 6, NULL, NULL),
(119, 41, 6, NULL, NULL),
(120, 42, 6, NULL, NULL),
(121, 43, 6, NULL, NULL),
(122, 44, 6, NULL, NULL),
(123, 45, 6, NULL, NULL),
(124, 46, 6, NULL, NULL),
(125, 47, 6, NULL, NULL),
(126, 48, 6, NULL, NULL),
(127, 49, 6, NULL, NULL),
(128, 50, 6, NULL, NULL),
(129, 51, 6, NULL, NULL),
(130, 52, 6, NULL, NULL),
(131, 53, 6, NULL, NULL),
(132, 54, 1, NULL, NULL),
(133, 55, 1, NULL, NULL),
(134, 56, 1, NULL, NULL),
(135, 57, 1, NULL, NULL),
(136, 58, 1, NULL, NULL),
(137, 59, 1, NULL, NULL),
(138, 60, 1, NULL, NULL),
(139, 61, 1, NULL, NULL),
(140, 62, 1, NULL, NULL),
(141, 63, 1, NULL, NULL),
(142, 64, 1, NULL, NULL),
(143, 65, 1, NULL, NULL),
(144, 66, 1, NULL, NULL),
(145, 67, 1, NULL, NULL),
(146, 68, 1, NULL, NULL),
(147, 69, 1, NULL, NULL),
(148, 70, 1, NULL, NULL),
(149, 71, 1, NULL, NULL),
(150, 72, 1, NULL, NULL),
(151, 73, 1, NULL, NULL),
(152, 74, 1, NULL, NULL),
(153, 75, 1, NULL, NULL),
(154, 76, 1, NULL, NULL),
(155, 77, 1, NULL, NULL),
(156, 78, 1, NULL, NULL),
(157, 79, 1, NULL, NULL),
(158, 50, 2, NULL, NULL),
(159, 54, 2, NULL, NULL),
(160, 58, 2, NULL, NULL),
(161, 62, 2, NULL, NULL),
(162, 66, 2, NULL, NULL),
(163, 70, 2, NULL, NULL),
(164, 74, 2, NULL, NULL),
(165, 2, 4, NULL, NULL),
(173, 42, 4, NULL, NULL),
(174, 46, 4, NULL, NULL),
(176, 54, 4, NULL, NULL),
(177, 55, 4, NULL, NULL),
(178, 56, 4, NULL, NULL),
(179, 57, 4, NULL, NULL),
(180, 58, 4, NULL, NULL),
(186, 1, 7, NULL, NULL),
(189, 46, 7, NULL, NULL),
(190, 59, 4, NULL, NULL),
(191, 60, 4, NULL, NULL),
(192, 61, 4, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
