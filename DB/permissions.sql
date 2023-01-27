-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 04:21 PM
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Access Dashboard', 'app.dashboard', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(2, 2, 'Access Role', 'app.roles.index', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(3, 2, 'Create Role', 'app.roles.create', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(4, 2, 'Edit Role', 'app.roles.update', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(5, 2, 'Delete Role', 'app.roles.delete', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(6, 3, 'Access User', 'app.user.index', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(7, 3, 'Create User', 'app.user.create', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(8, 3, 'Edit User', 'app.user.update', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(9, 3, 'Delete User', 'app.user.delete', '2022-11-12 02:08:58', '2022-11-12 02:08:58'),
(10, 4, 'Access Web', 'app.web.index', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(11, 4, 'Create User', 'app.web.create', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(12, 4, 'Edit Web', 'app.web.update', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(13, 4, 'Delete Web', 'app.web.delete', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(14, 5, 'Access Session', 'app.session.index', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(15, 5, 'Create Session', 'app.session.create', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(16, 5, 'Edit Session', 'app.session.update', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(17, 5, 'Delete Session', 'app.session.delete', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(18, 6, 'Access Course', 'app.course.index', '2022-11-12 02:08:59', '2022-11-12 02:08:59'),
(19, 6, 'Create Course', 'app.course.create', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(20, 6, 'Edit Course', 'app.course.update', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(21, 6, 'Delete Course', 'app.course.delete', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(22, 7, 'Access Trade', 'app.trade.index', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(23, 7, 'Create Trade', 'app.trade.create', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(24, 7, 'Edit Trade', 'app.trade.update', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(25, 7, 'Delete Trade', 'app.trade.delete', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(26, 8, 'Access Teacher', 'app.teacher.index', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(27, 8, 'Create Teacher', 'app.teacher.create', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(28, 8, 'Edit Teacher', 'app.teacher.update', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(29, 8, 'Delete Teacher', 'app.teacher.delete', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(30, 9, 'Access Teacher', 'app.application.index', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(31, 9, 'Create Teacher', 'app.application.create', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(32, 9, 'Edit Teacher', 'app.application.update', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(33, 9, 'Delete Application', 'app.application.delete', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(34, 10, 'Access Class', 'app.class.index', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(35, 10, 'Create Class', 'app.class.create', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(36, 10, 'Edit Class', 'app.class.update', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(37, 10, 'Delete Class', 'app.class.delete', '2022-11-12 02:09:00', '2022-11-12 02:09:00'),
(38, 11, 'Access Student', 'app.student.index', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(39, 11, 'Create Student', 'app.student.create', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(40, 11, 'Edit Student', 'app.student.update', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(41, 11, 'Delete Student', 'app.student.delete', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(42, 12, 'Access Subject', 'app.subject.index', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(43, 12, 'Create Subject', 'app.subject.create', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(44, 12, 'Edit Subject', 'app.subject.update', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(45, 12, 'Delete Subject', 'app.subject.delete', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(46, 13, 'Access Class Routine', 'app.classroutine.index', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(47, 13, 'Create Class Routine', 'app.classroutine.create', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(48, 13, 'Edit Class Routine', 'app.classroutine.update', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(49, 13, 'Delete Class Routine', 'app.classroutine.delete', '2022-11-12 02:09:01', '2022-11-12 02:09:01'),
(50, 14, 'Access Section', 'app.section.index', '2022-11-15 00:52:25', '2022-11-15 00:52:25'),
(51, 14, 'Create Section', 'app.section.create', '2022-11-15 00:52:26', '2022-11-15 00:52:26'),
(52, 14, 'Edit Section', 'app.section.update', '2022-11-15 00:52:26', '2022-11-15 00:52:26'),
(53, 14, 'Delete Section', 'app.section.delete', '2022-11-15 00:52:26', '2022-11-15 00:52:26'),
(54, 15, 'Access Student Attendance', 'app.attendance.index', '2022-11-19 02:52:43', '2022-11-19 02:52:43'),
(55, 15, 'Create Student Attendance', 'app.attendance.create', '2022-11-19 02:52:43', '2022-11-19 02:52:43'),
(56, 15, 'Edit Student Attendance', 'app.attendance.update', '2022-11-19 02:52:44', '2022-11-19 02:52:44'),
(57, 15, 'Delete Student Attendance', 'app.attendance.delete', '2022-11-19 02:52:44', '2022-11-19 02:52:44'),
(58, 16, 'Access Exam', 'app.exam.index', '2022-11-19 02:52:44', '2022-11-19 02:52:44'),
(59, 16, 'Create Exam', 'app.exam.create', '2022-11-19 02:52:44', '2022-11-19 02:52:44'),
(60, 16, 'Edit Exam', 'app.exam.update', '2022-11-19 02:52:44', '2022-11-19 02:52:44'),
(61, 16, 'Delete Exam', 'app.exam.delete', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(62, 17, 'Access Librarian', 'app.librarian.index', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(63, 17, 'Create Librarian', 'app.librarian.create', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(64, 17, 'Edit Librarian', 'app.librarian.update', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(65, 17, 'Delete Librarian', 'app.librarian.delete', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(66, 18, 'Access Library', 'app.library.index', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(67, 18, 'Create Library', 'app.library.create', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(68, 18, 'Edit Library', 'app.library.update', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(69, 18, 'Delete Library', 'app.library.delete', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(70, 19, 'Access Accountant', 'app.accountant.index', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(71, 19, 'Create Accountant', 'app.accountant.create', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(72, 19, 'Edit Accountant', 'app.accountant.update', '2022-11-19 02:52:45', '2022-11-19 02:52:45'),
(73, 19, 'Delete Accountant', 'app.accountant.delete', '2022-11-19 02:52:46', '2022-11-19 02:52:46'),
(74, 20, 'Access Account', 'app.account.index', '2022-11-19 02:52:46', '2022-11-19 02:52:46'),
(75, 20, 'Create Account', 'app.account.create', '2022-11-19 02:52:46', '2022-11-19 02:52:46'),
(76, 20, 'Edit Account', 'app.account.update', '2022-11-19 02:52:46', '2022-11-19 02:52:46'),
(77, 20, 'Delete Account', 'app.account.delete', '2022-11-19 02:52:46', '2022-11-19 02:52:46'),
(78, 21, 'Access Settings', 'app.setting.index', '2022-11-19 02:52:46', '2022-11-19 02:52:46'),
(79, 21, 'Edit Settings', 'app.setting.update', '2022-11-19 02:52:46', '2022-11-19 02:52:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
