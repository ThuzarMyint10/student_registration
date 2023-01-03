-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 02:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `achedamic_year`
--

CREATE TABLE `achedamic_year` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `achedamic_year`
--

INSERT INTO `achedamic_year` (`id`, `name`) VALUES
(1, 'First Year'),
(2, 'Second Year'),
(3, 'Third Year'),
(4, 'Fouth Year'),
(5, 'Fifth Year'),
(6, 'Graduated');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `block` varchar(255) NOT NULL,
  `street_id` bigint(20) NOT NULL,
  `township_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `unit`, `block`, `street_id`, `township_id`) VALUES
(2, '0001', '6', 8, 1),
(3, '001', '6', 7, 1),
(4, '0001', '5', 8, 1),
(5, '0002', '7', 8, 1),
(6, '0001', '6', 14, 3),
(7, '0001', '6', 3, 2),
(8, '0001', '6', 0, 0),
(9, '0003', '8', 7, 1),
(10, '0001', '6', 7, 1),
(11, '0002', '8', 23, 4),
(12, '0003', '7', 9, 1),
(13, '0001', '7', 14, 3),
(14, '0003', '7', 14, 3),
(15, '0002', '7', 15, 3),
(16, '0003', '8', 9, 1),
(17, '0001', '6', 2, 2),
(18, '0001', '6', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id` int(11) NOT NULL,
  `month` text NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id`, `month`, `count`) VALUES
(1, 'January', 5),
(2, 'February', 10),
(3, 'March', 15),
(4, 'April', 20),
(5, 'May', 25),
(6, 'June', 30),
(7, 'July', 35),
(8, 'August', 5),
(9, 'September', 55),
(10, 'October', 3),
(11, 'November', 17),
(12, 'December', 11);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Yangon'),
(2, 'Mandalay'),
(3, 'NaypyiTaw'),
(4, 'Mawlamyine'),
(5, 'Taunggyi'),
(6, 'Bago');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `semester_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `achedamic_year_id` bigint(20) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `semester_id`, `subject_id`, `achedamic_year_id`, `start_date`, `end_date`) VALUES
(3, 1, 1, 1, '2022-12-28', '2022-12-28'),
(4, 1, 2, 2, '2022-12-28', '2022-12-28'),
(5, 0, 1, 6, '2022-12-28', '2022-12-28'),
(6, 0, 1, 0, '2022-12-28', '2022-12-28'),
(7, 1, 1, 3, '2022-12-28', '2022-12-28'),
(8, 1, 1, 4, '2022-12-28', '2022-12-28'),
(9, 1, 1, 2, '2022-12-28', '2022-12-28'),
(10, 1, 3, 5, '2022-12-28', '2022-12-28'),
(11, 1, 0, 1, '2022-12-28', '2022-12-28'),
(12, 1, 1, 1, '2022-11-01', '0000-00-00'),
(13, 1, 1, 1, '2022-11-01', '0000-00-00'),
(14, 1, 1, 1, '2022-11-01', '0000-00-00'),
(15, 1, 1, 1, '2022-11-01', '0000-00-00'),
(16, 2, 1, 1, '2023-01-03', '0000-00-00'),
(17, 2, 1, 1, '2023-01-01', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `name`) VALUES
(1, 'Normal'),
(2, 'Intermediate'),
(3, 'Advance');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`) VALUES
(1, 'first_semester'),
(2, 'second_semester');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'active'),
(2, 'suspend');

-- --------------------------------------------------------

--
-- Table structure for table `street`
--

CREATE TABLE `street` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `township_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `street`
--

INSERT INTO `street` (`id`, `name`, `township_id`) VALUES
(1, 'Tharyaraye (1) Street', 2),
(2, 'Tharyaraye (2) Street', 2),
(3, 'That Yet Taw Street', 2),
(4, 'NANTHARKHONE Street., Lann Thit Group', 2),
(5, 'Ywar Thit 2nd Street, Myo Thit B Group', 2),
(6, 'Ye Baw 3rd Street', 2),
(7, 'Kyaung Gone 1st Street', 1),
(8, 'Kyaung Gone 2nd Street', 1),
(9, 'Kyaung Gone 3rd Street', 1),
(10, 'Ma Har Swe 1st Street', 1),
(11, 'Ma Har Swe 2nd Street', 1),
(12, 'Mae Zi Gone Road', 1),
(13, 'Malar Myaing 4th Street', 1),
(14, '25th Street, Pyi Gyi Kyat Tha Yay (East)', 3),
(15, '81st Street, Pyi Gyi Kyat Tha Yay (East)', 3),
(16, '82nd Street, 20th & 21st Street, Pa Lae Ngwe Yaung', 3),
(17, '82nd Street, 21st & 22nd Street, Pa Lae Ngwe Yaung', 3),
(18, '81st Street, 18th & 19th Street, Mya Gagiyi', 3),
(19, '82nd Street, 16th & 17th Street, Mya Gagiyi', 3),
(20, '81st Street, 18th & 19th Street, Mya Gagiyi', 3),
(21, '82nd Street, 16th & 17th Street, Mya Gagiyi', 3),
(22, 'Tharaphe Street', 4),
(23, 'Gantgaw Lane', 4),
(24, '72nd Street, 29&30th Street', 4),
(25, '72nd Street, 33&34th Street', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `is_confirmed` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_login` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `token_expire` date NOT NULL,
  `user_type_id` bigint(20) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address_id` bigint(20) NOT NULL,
  `education_id` bigint(20) NOT NULL,
  `status_id` int(11) NOT NULL,
  `performance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `profile_image`, `is_confirmed`, `is_active`, `is_login`, `token`, `date`, `token_expire`, `user_type_id`, `father_name`, `date_of_birth`, `gender`, `address_id`, `education_id`, `status_id`, `performance_id`) VALUES
(11, 'Thuzar', 'thuzarmyint75@gmail.com', 'VHptMTIzNDU2QA==', '1672075653875b-2.jpg', 1, 1, 0, '', '0000-00-00', '0000-00-00', 4, 'U Aye Thaw', '2022-12-06', 'Female', 18, 11, 1, 3),
(12, 'Thae Thae', 'thaethae@gmail.com', 'VGhhZTEyMzQ1NkA=', '1672073734779bg-1.jpg', 1, 1, 0, '', '0000-00-00', '0000-00-00', 4, 'U Aye', '2022-12-01', 'Female', 11, 9, 2, 2),
(13, 'Mya Mya', 'myamya123@gmail.com', 'TXlhMTIzNDU2QA==', '1672069077729b-2.jpg', 1, 1, 0, '', '0000-00-00', '0000-00-00', 4, 'U aung Mya', '2022-12-01', 'Female', 14, 10, 1, 1),
(15, 'Lae Lae', 'laelae123@gmail.com', 'TGFlMTIzNDU2QA==', '1672075702504Emely.avif', 1, 1, 0, '', '0000-00-00', '0000-00-00', 4, 'U Nay Min', '2022-12-01', 'Male', 16, 3, 2, 2),
(17, 'Min Min', 'minmin123@gmail.com', 'TWluMTIzNDU2QA==', '1672133382390pic-1.png', 1, 1, 0, '', '0000-00-00', '0000-00-00', 4, 'U Min Aung', '2022-12-03', 'Male', 17, 7, 2, 3),
(19, 'Aung Aung', 'aungaung123@gmail.com', 'QXVuZzEyMzQ1NkA=', '1672392346683b-2.jpg', 1, 1, 0, '', '0000-00-00', '0000-00-00', 4, 'U Aung Mya', '2022-11-01', 'Female', 18, 15, 1, 2),
(20, 'Nay Nay', 'naynay123@gmail.com', 'TmF5MTIzNDU2QA==', '1672650138666b-1.jpg', 0, 0, 0, '', '0000-00-00', '0000-00-00', 4, 'U Nay Min', '2023-01-03', 'Female', 10, 17, 1, 2),
(21, 'Mie Mie', 'miemie123@gmail.com', 'TWllMTIzNDU2QA==', 'default_profile.jpg', 0, 0, 0, '6ce7f75d09572c3529f01dd3d0051743f787c71830d789e05182c58cfd3554d14725b408b2ee1a3be72c5c82b85edfb90415', '2023-01-02', '2023-01-03', 4, '', '0000-00-00', '', 0, 0, 1, 1),
(22, 'Thuzar Myint', 'thuzarmyint795@gmail.com', 'VHptMTIzNDU2QA==', 'default_profile.jpg', 1, 1, 1, '959315ee736ff5d2c6cffcce03f7a9356d83cae358ddcfb15240a8aeb1b5c25686f1a345a6e0c25b40ccbda4714a0d723a71', '2023-01-02', '2023-01-03', 1, '', '0000-00-00', '', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `specialization`, `degree`) VALUES
(1, 'Computer Science', 'B.C.Sc'),
(2, 'Information Technology', 'IT'),
(3, 'Computer Architecture', 'CA'),
(4, 'Tele Communication', 'CT');

-- --------------------------------------------------------

--
-- Table structure for table `township`
--

CREATE TABLE `township` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `township`
--

INSERT INTO `township` (`id`, `name`, `city_id`) VALUES
(1, 'Hlaing', 1),
(2, 'Insein', 1),
(3, 'Aungmyethazan ', 2),
(4, 'Chanayethazan ', 2),
(5, 'Chanmyathazi ', 2),
(6, 'Maha Aungmye', 2),
(7, 'Pyigyidagun', 2),
(8, 'Amarapura', 2),
(9, 'Ahlon', 1),
(10, 'Bahan', 1),
(11, 'Dagon', 1),
(12, 'Kamayut', 1),
(13, 'Kyauktada', 1),
(14, 'Kyimyindaing', 1),
(15, 'Lanmadaw', 1),
(16, 'Zeyar Thiri', 3),
(17, 'Pohbba Thiri', 3),
(18, 'Uttara Thiri', 3),
(19, 'Zabu Thiri', 3),
(20, 'Dekina Thiri', 3),
(21, 'Pyinmana', 3),
(22, 'Lewe', 3),
(23, 'Tatkone', 3),
(24, 'Kyaikmaraw', 4),
(25, 'Chaungzon', 4),
(26, 'Thanbyuzayat', 4),
(27, 'Mudon', 4),
(28, 'Hopong', 5),
(29, 'Ywangan', 5),
(30, 'Pindaya', 5),
(31, 'Pekon', 5),
(32, 'Kalaw', 5),
(33, 'Nyaungshwe', 5),
(34, 'Kalaw', 5),
(35, 'Nyaungshwe', 5),
(36, 'Daik-U', 6),
(37, 'Nyaunglebin', 6),
(38, 'Shwegyin', 6),
(39, 'Thanatpin', 6),
(40, 'Waw', 6),
(41, 'Kyauktaga', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user type`
--

CREATE TABLE `user type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user type`
--

INSERT INTO `user type` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Moderator'),
(3, 'Editor'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_student`
-- (See below for the actual view)
--
CREATE TABLE `vw_student` (
`id` int(11)
,`name` varchar(255)
,`email` varchar(255)
,`is_login` int(11)
,`is_confirmed` int(11)
,`token_key` varchar(255)
,`is_active` int(11)
,`token_start_date` date
,`token_expire` date
,`user_type_id` bigint(20)
,`performance_id` int(11)
,`address_id` bigint(20)
,`education_id` bigint(20)
,`password` varchar(255)
,`father_name` varchar(255)
,`date_of_birth` date
,`gender` varchar(255)
,`image` varchar(255)
,`semester` varchar(255)
,`semester_id` int(11)
,`specialization` varchar(255)
,`subject_id` int(11)
,`degree` varchar(255)
,`achedamic_year` varchar(255)
,`start_date` date
,`end_date` date
,`achedamic_year_id` int(11)
,`city_name` varchar(255)
,`city_id` int(11)
,`township_name` varchar(255)
,`township_id` int(11)
,`street_name` varchar(255)
,`block` varchar(255)
,`unit` varchar(255)
,`status_id` int(11)
,`status` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_student`
--
DROP TABLE IF EXISTS `vw_student`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_student`  AS SELECT `id` AS `id`, `name` AS `name`, `email` AS `email`, `is_login` AS `is_login`, `is_confirmed` AS `is_confirmed`, `token` AS `token_key`, `is_active` AS `is_active`, `date` AS `token_start_date`, `token_expire` AS `token_expire`, `user_type_id` AS `user_type_id`, `performance_id` AS `performance_id`, `address_id` AS `address_id`, `education_id` AS `education_id`, `password` AS `password`, `father_name` AS `father_name`, `date_of_birth` AS `date_of_birth`, `gender` AS `gender`, `profile_image` AS `image`, `semester`.`name` AS `semester`, `semester`.`id` AS `semester_id`, `subject`.`specialization` AS `specialization`, `subject`.`id` AS `subject_id`, `subject`.`degree` AS `degree`, `achedamic_year`.`name` AS `achedamic_year`, `education`.`start_date` AS `start_date`, `education`.`end_date` AS `end_date`, `achedamic_year`.`id` AS `achedamic_year_id`, `city`.`name` AS `city_name`, `city`.`id` AS `city_id`, `township`.`name` AS `township_name`, `township`.`id` AS `township_id`, `street`.`name` AS `street_name`, `address`.`block` AS `block`, `address`.`unit` AS `unit`, `status_id` AS `status_id`, `status`.`name` AS `status` FROM (((((((((`student` left join `education` on(`education_id` = `education`.`id`)) left join `semester` on(`education`.`semester_id` = `semester`.`id`)) left join `subject` on(`education`.`subject_id` = `subject`.`id`)) left join `achedamic_year` on(`education`.`achedamic_year_id` = `achedamic_year`.`id`)) left join `address` on(`address_id` = `address`.`id`)) left join `street` on(`address`.`street_id` = `street`.`id`)) left join `township` on(`address`.`township_id` = `township`.`id`)) left join `city` on(`township`.`city_id` = `city`.`id`)) left join `status` on(`status_id` = `status`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achedamic_year`
--
ALTER TABLE `achedamic_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `township`
--
ALTER TABLE `township`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user type`
--
ALTER TABLE `user type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achedamic_year`
--
ALTER TABLE `achedamic_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `street`
--
ALTER TABLE `street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `township`
--
ALTER TABLE `township`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user type`
--
ALTER TABLE `user type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
