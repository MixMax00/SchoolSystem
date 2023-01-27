-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 04:10 PM
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
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
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
  `salary` double(10,2) DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `role_id`, `name`, `school_id`, `designation`, `dob`, `gender`, `address`, `qualification`, `phone`, `email`, `password`, `salary`, `department`, `fb`, `twitter`, `linkden`, `subject`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Nadine Deleon', NULL, 'Asperiores deleniti', '2007-01-04', 'male', 'Explicabo Sit dolor', 'vyxuhy@mailinator.com', '+1 (252) 907-7634', 'wuwejefep@mailinator.com', '$2y$10$b.H8RS4DqstGfkmkcVrhW.8/1odCE2NACXiKu6XiUZ8t/zzq9VllS', 30000.00, 'Mollitia tempora por', 'Esse cillum earum n', 'Sunt itaque et facer', 'Rerum qui provident', NULL, 'assets/backend/teacher/639746852b9e8download (3).jpg', '1', '2022-12-12 09:19:33', '2022-12-12 09:19:33'),
(2, 4, 'Violet Sanchez', NULL, 'Iusto vel id optio', '1989-09-21', 'male', 'Adipisci impedit qu', 'kacuhupele@mailinator.com', '+1 (794) 772-5183', 'mysynufoza@mailinator.com', '$2y$10$mhx71V0uWnrt3abu8av5H.IQGBqHPDgLXaMUAqkWcReyuh1vH3/nq', 16500.00, 'Eum modi sit non eum', 'Minim proident aut', 'Nulla voluptatum Nam', 'Provident velit et', NULL, 'assets/backend/teacher/6397469ea4cc7images.jpg', '1', '2022-12-12 09:19:58', '2022-12-12 09:19:58'),
(3, 4, 'Scott Hayden', NULL, 'Quibusdam id est o', '1983-03-10', 'male', 'Aliqua Ea fuga Sed', 'domenyna@mailinator.com', '+1 (535) 683-2121', 'safoga@mailinator.com', '$2y$10$JOxQTY2WVJtLsduzGXXCmOw9M64K8l6Bx0KvWj/Gq9mPik5BMPXCe', 15000.00, 'Ea in voluptas disti', 'Est sint dolor quia', 'Architecto neque est', 'Voluptates aliquid t', NULL, 'assets/backend/teacher/639746bb1a435images (2).jpg', '1', '2022-12-12 09:20:27', '2022-12-12 09:20:27'),
(4, 4, 'Callie Marsh', NULL, 'Ullamco corporis nos', '1985-12-28', 'male', 'Cum quis deserunt co', 'retuke@mailinator.com', '+1 (504) 173-3271', 'nuqefovucy@mailinator.com', '$2y$10$zk1AYOxTZ2.ZTSCJwExakeIkDjSnRPQwRN1KIeTqAxlA2Gu0luoyO', 16000.00, 'Eum aliquid eiusmod', 'Consequat Sit aperi', 'Reprehenderit enim v', 'Velit exercitatione', NULL, 'assets/backend/teacher/639746d242499images (3).jpg', '1', '2022-12-12 09:20:50', '2022-12-12 09:20:50'),
(5, 4, 'Yasir Montoya', NULL, 'Animi laborum Offi', '1987-11-19', 'male', 'Consequatur temporib', 'fovekoxik@mailinator.com', '+1 (422) 857-6726', 'lujaho@mailinator.com', '$2y$10$4o5d2nDRPOviZPAc.jDpvOncc2JnSgLij.IucGQ90UJmNq0HCKHT.', 18000.00, 'Eius nostrum consect', 'Sequi possimus cill', 'Neque enim ad omnis', 'Quibusdam aut aliqui', NULL, 'assets/backend/teacher/639746f18f878images (5).jpg', '1', '2022-12-12 09:21:21', '2022-12-12 09:21:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
