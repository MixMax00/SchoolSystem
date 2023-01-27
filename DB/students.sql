-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 05:40 PM
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technology` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_name_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_name_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_phone_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_phone_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_phone_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zila` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upzila` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `union` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `para` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_zila` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_upzila` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_union` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_para` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_zila` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_upzila` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_union` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_para` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostel` tinyint(4) NOT NULL DEFAULT 0,
  `full_course_fee` double(10,2) NOT NULL DEFAULT 0.00,
  `semester_fee` double(10,2) NOT NULL DEFAULT 0.00,
  `internship_fee` double(10,2) NOT NULL DEFAULT 0.00,
  `agreement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_activities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_sign` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_sign` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admitted_by_sign` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school_id`, `institute_name`, `branch`, `course`, `trade`, `image`, `class_roll`, `class`, `group`, `technology`, `semester`, `session`, `student_name_eng`, `student_name_ban`, `student_phone_1`, `student_phone_2`, `father_name_eng`, `father_name_ban`, `father_phone_1`, `father_phone_2`, `mother_name_eng`, `mother_name_ban`, `mother_phone_1`, `mother_phone_2`, `zila`, `upzila`, `union`, `post`, `ward`, `village`, `para`, `g_zila`, `g_upzila`, `g_union`, `g_post`, `g_ward`, `g_village`, `g_para`, `loc_name`, `loc_relation`, `loc_phone`, `loc_zila`, `loc_upzila`, `loc_union`, `loc_post`, `loc_ward`, `loc_village`, `loc_para`, `hostel`, `full_course_fee`, `semester_fee`, `internship_fee`, `agreement`, `doc1`, `doc2`, `doc3`, `doc4`, `remarks`, `role_id`, `email`, `password`, `other_activities`, `student_sign`, `guardian_sign`, `admitted_by_sign`, `created_at`, `updated_at`) VALUES
(1, NULL, 'QUALITY EDUCATION SCHOOL & COLLEGE', 'Barishal', NULL, NULL, 'assets/backend/img/student/63a144faea1a9download (6).jpg', '1001', '2', '3', 'electrical', '2nd Semester', '2021-2022', 'Atik Hasan', 'আতিক হাসান', '014755465', '014544556', 'Md Royel Islam', 'মোঃ', '12345678', 'lemyneb@mailinator.com', 'conaxy@mailinator.com', 'tipyvufem@mailinator.com', 'qemyj@mailinator.com', 'hesaf@mailinator.com', '53', '401', '3668', 'Ducimus sit veniam', 'Laborum Earum aut c', 'Amet iure eligendi', 'Minus perferendis ex', '49', '379', '3428', 'Nobis delectus expe', 'Atque et sint labori', 'Natus praesentium su', 'Alias quia consequat', 'Heidi Dunlap', 'ryvybefadu@mailinator.com', 'podyb@mailinator.com', '2', '20', '210', 'Proident reprehende', 'Culpa nemo ipsam mol', 'Aliquid deserunt dol', 'Assumenda minima con', 0, 100000.00, 1000.00, 10000.00, 'Rem architecto delen', ' ', ' ', ' ', ' ', 'Rerum non corrupti', 7, 'student@gmail.com', '$2y$10$c/60YKcO1Im/3M7b9w5wKOT6OU1RNXd.3YTfGrVA/ib4zjXhTpL1a', 'Temporibus illum fu', NULL, NULL, NULL, '2022-11-26 02:28:52', '2022-12-19 23:15:39'),
(2, NULL, 'QUALITY EDUCATION SCHOOL & COLLEGE', 'wukamymex@mailinator.com', '3', '2', 'assets/backend/img/student/6383382d7b210download (6).jpg', '500', '4', '6', 'electrical', '1st Semester', '2020-2021', 'jodigutira@mailinator.com', 'nehyxuzoze@mailinator.com', 'vevav@mailinator.com', 'nyxejy@mailinator.com', 'gylurobyr@mailinator.com', 'bazebe@mailinator.com', 'daxisogiqo@mailinator.com', 'wadaxuzot@mailinator.com', 'jurohylaw@mailinator.com', 'tubim@mailinator.com', 'vocozat@mailinator.com', 'kejiveze@mailinator.com', '14', '127', '1157', 'Similique odit assum', 'Labore libero volupt', 'Tenetur in et atque', 'Corrupti fugiat eu', '36', '276', '2474', 'Architecto omnis eos', 'Atque nesciunt in a', 'Dolore id cum ducimu', 'Enim voluptatum quis', 'Kameko Haynes', 'tudalizaq@mailinator.com', 'kewe@mailinator.com', '11', '97', NULL, 'Consequatur Cupidat', 'Debitis officiis eve', 'Quasi perferendis mo', 'Sint velit praesent', 0, 54654.00, 45645.00, 65465.00, 'Vitae laboriosam ob', 'assets/backend/img/student/file/6383382ece31cdownload (6).jpg', ' ', ' ', ' ', 'Voluptatem est qui', 7, 'xowovowok@mailinator.com', '$2y$10$7EwQRFv.lJH9GeavkmUF.uLkAVzztWx2arh/3Nf6A/QNpeb2ZzpOG', 'Dolores aperiam maxi', NULL, NULL, NULL, '2022-11-27 04:13:06', '2022-11-27 04:13:06'),
(3, NULL, 'QUALITY EDUCATION SCHOOL & COLLEGE', 'Dhaka', NULL, NULL, 'assets/backend/img/student/638add3471cf8Screenshot (7).png', '202', '2', '3', 'computer', '4th Semester', '2021-2022', 'Surjo Ray', 'Ray', 'jomu@mailinator.com', 'dobakoz@mailinator.com', 'Ray', 'Ray', 'zuzaqu@mailinator.com', 'viwanyhy@mailinator.com', 'Ray', 'Ray', 'qasatija@mailinator.com', 'sehufyru@mailinator.com', '18', '158', '1395', 'Sequi impedit moles', 'Voluptas ipsum sunt', 'Odio et est nostrum', 'Labore blanditiis en', '6', '56', '516', 'Blanditiis velit nos', 'Alias eligendi sit i', 'Molestiae nostrud fu', 'Iure cupiditate cons', 'Jemima Winters', 'litix@mailinator.com', 'wyriwityza@mailinator.com', '35', '269', '2418', 'Aut reprehenderit r', 'Quaerat quia quia pr', 'Veritatis voluptate', 'Necessitatibus qui c', 0, 56000.00, 5000.00, 10000.00, 'Exercitation ut quae', ' ', ' ', ' ', ' ', 'Repellendus Qui quo', 7, 'surjo@gmail.com', '$2y$10$9AbOe7AkNHl0YjARALTF.eKm6spJe7rAyIglNdmAU1WkVcfxNY6sq', 'Quis repudiandae ass', NULL, NULL, NULL, '2022-12-02 23:23:02', '2022-12-19 04:46:39'),
(4, NULL, 'QUALITY EDUCATION SCHOOL & COLLEGE', 'Dinajpur', '1', '4', 'assets/backend/img/student/638ed7fa4c7231.png', '401', '4', '6', 'electrical', '2nd Semester', '2020-2021', 'Sakib', 'Sakib', '1044545454', '1044545454', 'Mahib Sad', 'Mahib Sad', '1044545454', '1044545454', 'Mahib Sadiya', 'Mahib Sadiya', '1044545454', '1044545454', '6', '55', '502', 'Enim eligendi ipsum', 'Ipsum ipsum sequi co', 'Consectetur qui cum', 'Dicta eveniet qui p', '43', '330', '2964', 'Vel perspiciatis in', 'In tenetur laboris u', 'Et duis dolorem quae', 'Et provident offici', 'Keaton Joyner', 'bizo@mailinator.com', 'mugu@mailinator.com', '24', '193', '1746', 'Ea culpa et eos exe', 'Est dolorem ipsam qu', 'Est aut aut minima', 'Quo quidem tempor cu', 0, 120000.00, 10000.00, 50000.00, 'Autem adipisicing ra', 'assets/backend/img/student/file/638ed7fb4da3a1 (1).png', ' ', ' ', ' ', 'Laboriosam necessit', 7, 'sakib@gmail.com', '$2y$10$x1K9Y9JKN0tSi.gQk2GUouXt82p.JLdu0q3EB3ZIdgwZ3JJdVlOk6', 'Laboris accusantium', NULL, NULL, NULL, '2022-12-05 23:49:47', '2022-12-05 23:49:47'),
(5, NULL, 'QUALITY EDUCATION SCHOOL & COLLEGE', 'tugupu@mailinator.com', '3', '2', 'assets/backend/img/student/63a31bd1d234adownload (6).jpg', '600', '7', NULL, 'computer', '2nd Semester', '2021-2022', 'vatiqypoj@mailinator.com', 'famati@mailinator.com', 'dodeqodixa@mailinator.com', 'samagaqyn@mailinator.com', 'muciryto@mailinator.com', 'nawuq@mailinator.com', 'zexyh@mailinator.com', 'seperomyce@mailinator.com', 'xebasa@mailinator.com', 'xitisyzowo@mailinator.com', 'gosu@mailinator.com', 'fepahowed@mailinator.com', '21', '179', NULL, 'Nostrum a natus iure', 'Laboriosam quod fug', 'Temporibus eum velit', 'Delectus odit moles', '18', '155', NULL, 'Illum quam rerum mo', 'Minus quidem facilis', 'Irure anim vel ea qu', 'Fuga Incididunt cum', 'Burke Navarro', 'lojuquvij@mailinator.com', 'wuvijidume@mailinator.com', '20', '171', NULL, 'Placeat officia vol', 'Porro voluptas ipsum', 'Eligendi praesentium', 'Fuga Nihil sunt exp', 0, 456789.00, 1234.00, 122.00, 'Sint voluptatem dese', 'assets/backend/img/student/file/63a31bd215d70download (4).jpg', ' ', ' ', ' ', 'Itaque fugiat sit c', 7, 'zaqiny@mailinator.com', '$2y$10$FGIuKByle/ZhPdg/fQbwDO/7WAqHx6DT50KOMZwusnQnmYfYyr3Fm', 'Dicta nostrud quae q', NULL, NULL, NULL, '2022-12-21 08:44:39', '2022-12-21 08:44:39'),
(6, NULL, 'QUALITY EDUCATION SCHOOL & COLLEGE', 'micudybuci@mailinator.com', '4', '3', 'assets/backend/img/student/63a31c545f4eedownload (6).jpg', '700', '8', NULL, 'computer', '1st Semester', '2021-2022', 'dyqeratyb@mailinator.com', 'paguwyrar@mailinator.com', 'gaky@mailinator.com', 'wawobifav@mailinator.com', 'wuqudecex@mailinator.com', 'nihuzu@mailinator.com', 'niwixeta@mailinator.com', 'cynun@mailinator.com', 'sikeceneso@mailinator.com', 'raxorelyk@mailinator.com', 'mumobi@mailinator.com', 'reba@mailinator.com', '38', '292', NULL, 'Et voluptas necessit', 'Omnis voluptate fugi', 'Necessitatibus itaqu', 'Aliquid quia nihil p', '57', '428', NULL, 'Consectetur adipisic', 'Sint dolor sit dolo', 'Et consectetur aut e', 'Nemo velit obcaecati', 'Blake Mccray', 'seqawin@mailinator.com', 'xahawa@mailinator.com', '11', '97', NULL, 'Quidem unde ratione', 'Eveniet ad non enim', 'Commodi exercitation', 'Exercitationem qui n', 0, 15000.00, 123456.00, 123456.00, 'Nostrud ducimus vel', 'assets/backend/img/student/file/63a31c546f6badownload (5).jpg', ' ', ' ', ' ', 'Quia iste aut perfer', 7, 'xehegixeny@mailinator.com', '$2y$10$CIFvexFKjuRZ3e8rAOs3re4l06rXU5CIfYbYAdFPvauVSnUXQmLsO', 'Dolores odit in illo', NULL, NULL, NULL, '2022-12-21 08:46:46', '2022-12-21 08:46:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
