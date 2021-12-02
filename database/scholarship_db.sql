-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2021 at 12:13 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarship_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `r_announcements`
--

CREATE TABLE `r_announcements` (
  `announce_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `r_scholarship_type`
--

CREATE TABLE `r_scholarship_type` (
  `scholarship_type_id` int(11) NOT NULL,
  `scholarship_name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `create_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_scholarship_type`
--

INSERT INTO `r_scholarship_type` (`scholarship_type_id`, `scholarship_name`, `description`, `create_date`) VALUES
(1, 'Entrance Scholarship', 'SHS Graduates with Highest Honors\r\nSHS Graduates with High Honors', '2021-06-13 21:04:32'),
(2, 'Financial Aid', 'This refers to term employment of not more than 100 hours a month for a compensation of Php25.00 an hour. A bonafide students of the University who has/had at least two semester or one year of residency in the University; duly recommended by the Office in need of S.A. with complete grades from the previous semester with general weighted average of at least 2.50 and no failed, dropped or withdrawn marks in any subject', '2021-06-13 21:04:32'),
(3, 'Special Grant', 'A special grant is sponsored by a private or public institution, foundation, industrial firm, or an individual.\r\nA special grant takes the form of stipend plus other benefits stipulated in the contract with the sponsoring agency or donor.\r\nSpecial Grants criteria varies, largely giving consideration to the preferences of the Grantor or if the Grantor is government in nature, giving due consideration to the implementing rules and regulations of a certain scholarship.\r\nOther criteria in selecting a grantee might be outlined by the Grantor and shall be stipulated in the Memorandum of Agreement.', '2021-06-13 21:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `t_students`
--

CREATE TABLE `t_students` (
  `student_id` int(11) NOT NULL,
  `student_number` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `year_and_section` varchar(50) DEFAULT NULL,
  `sex` varchar(25) DEFAULT NULL,
  `gwa` varchar(50) DEFAULT NULL,
  `scholarship_type_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_students`
--

INSERT INTO `t_students` (`student_id`, `student_number`, `lastname`, `firstname`, `middlename`, `year_and_section`, `sex`, `gwa`, `scholarship_type_id`, `created_date`) VALUES
(113, '2017-00110-CM-0', 'Tarlac', 'Ralph Lawrence', 'C', 'BSIT 4-1', 'Male', '1.56', 2, '2021-06-13 23:04:03'),
(114, '2017-00111-CM-0', 'Cantuja', 'Marinel', 'T', 'BSIT 4-1', 'Female', '1.75', 2, '2021-06-13 23:04:03'),
(115, '2017-00110-CM-0', 'Duterte', 'Rodel', 'C', 'BSIT 4-1', 'Male', '1.56', NULL, '2021-06-13 23:06:06'),
(116, '2017-00111-CM-0', 'Lagon', 'Romualdo', 'T', 'BSIT 4-1', 'Male', '1.5', NULL, '2021-06-13 23:06:06'),
(117, '2017-00110-CM-0', 'Duterte', 'Rodel', 'C', 'BSIT 4-1', 'Male', '1.56', 1, '2021-06-13 23:07:46'),
(118, '2017-00111-CM-0', 'Lagon', 'Romualdo', 'T', 'BSIT 4-1', 'Male', '1.5', 1, '2021-06-13 23:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `picture`) VALUES
(3, 'Bong Cuadra', 'bongcuadra13@gmail.com', NULL, '$2y$10$KK20DDdDG9aJJCUQPB9Vfe/B0p3epBj0omvLi5PmygCM4SM0D5g3a', NULL, '2020-09-06 12:37:33', '2020-09-06 12:37:33', 'admin', 'admin.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_get_students`
-- (See below for the actual view)
--
CREATE TABLE `v_get_students` (
`student_id` int(11)
,`student_number` varchar(50)
,`lastname` varchar(50)
,`firstname` varchar(50)
,`middlename` varchar(50)
,`year_and_section` varchar(50)
,`sex` varchar(25)
,`gwa` varchar(50)
,`scholarship_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_get_students`
--
DROP TABLE IF EXISTS `v_get_students`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_get_students`  AS SELECT `T`.`student_id` AS `student_id`, `T`.`student_number` AS `student_number`, `T`.`lastname` AS `lastname`, `T`.`firstname` AS `firstname`, `T`.`middlename` AS `middlename`, `T`.`year_and_section` AS `year_and_section`, `T`.`sex` AS `sex`, `T`.`gwa` AS `gwa`, `TY`.`scholarship_name` AS `scholarship_name` FROM (`t_students` `T` join `r_scholarship_type` `TY` on(`T`.`scholarship_type_id` = `TY`.`scholarship_type_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r_announcements`
--
ALTER TABLE `r_announcements`
  ADD PRIMARY KEY (`announce_id`);

--
-- Indexes for table `r_scholarship_type`
--
ALTER TABLE `r_scholarship_type`
  ADD PRIMARY KEY (`scholarship_type_id`);

--
-- Indexes for table `t_students`
--
ALTER TABLE `t_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_announcements`
--
ALTER TABLE `r_announcements`
  MODIFY `announce_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_scholarship_type`
--
ALTER TABLE `r_scholarship_type`
  MODIFY `scholarship_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_students`
--
ALTER TABLE `t_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
