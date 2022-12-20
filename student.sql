-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 10:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `blog` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `township` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `blog`, `street`, `township`, `city`) VALUES
(27, '3', '8', 'Thamine', 'Yangon'),
(28, '3', 'rose', 'Thamine', 'Yangon'),
(29, '3', '8', 'Thamine', 'Yangon'),
(30, '3', '8', 'Thamine', 'Yangon'),
(31, '3', '8', 'Thamine', 'Yangon');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `semester`, `specialization`, `degree`) VALUES
(23, 'Full Time', 'Computer Science', 'B.C.Sc'),
(24, 'Full Time', 'Computer Science', 'B.C.Sc'),
(25, 'Full Time', 'Computer Science', 'B.C.Sc'),
(26, 'Full Time', 'Computer Science', 'B.C.Sc'),
(27, 'Part Time', 'Computer Science', 'B.C.Sc');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `social_id` bigint(20) UNSIGNED DEFAULT NULL,
  `education_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `user_id`, `sname`, `fname`, `email`, `date_of_birth`, `gender`, `image`, `address_id`, `social_id`, `education_id`) VALUES
(62, 5, 'eek', 'U Soe Win', 'eek752000@gmail.com', '2022-12-08', 'Female', 'p1.jpg', 29, NULL, 25),
(63, 5, 'eieikhaing', 'U Soe Win', 'eek752000@gmail.com', '2022-12-01', 'Female', 'p1.jpg', 30, NULL, 26),
(64, 5, 'eiei', 'U Soe Win', 'eek752000@gmail.com', '2022-12-02', 'Female', 'p1.jpg', 31, NULL, 27);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_confirmed` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_login` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `token_expire` date NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_image`, `is_confirmed`, `is_active`, `is_login`, `token`, `date`, `token_expire`, `user_type_id`) VALUES
(5, 'KhaingKhaing', 'eek752000@gmail.com', 'RWVrNzUyMDAwQA==', 'default_profile.jpg', 0, 0, 1, 'c09b92456476e7d933baa37710b244dfc9ef479500b96ba00ec1b9e82922df441fc0a2789417ca28bbaba5204d7830b5f472', 2022, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Moderator'),
(3, 'Editor'),
(4, 'Student');


-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_address`
-- (See below for the actual view)
--
CREATE TABLE `vw_address` (
`id` int(11)
,`city_name` varchar(255)
,`township_name` varchar(255)
,`street_name` varchar(255)
,`block` varchar(255)
,`unit` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_education`
-- (See below for the actual view)
--
CREATE TABLE `vw_education` (
`id` int(11)
,`semester_name` varchar(255)
,`specialization` varchar(255)
,`degree` varchar(255)
,`achedamic_year` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_expenses_categories_users`
-- (See below for the actual view)
--
CREATE TABLE `vw_students` (
`id` int(11)
,`name` varchar(255)
,`email` varchar(255)
,`password` varchar(255)
,`image` varchar(255)
,`father_name` varchar(255)
,`date_of_birth` date
,`gender` varchar(255)
,`city_name` varchar(255)
,`township_name` varchar(255)
,`street_name` varchar(255)
,`block` varchar(255)
,`unit` varchar(255)
,`semester_name` varchar(255)
,`specialization` varchar(255)
,`degree` varchar(255)
,`achedamic_year` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_address`
--
DROP TABLE IF EXISTS
    `vw_student`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `vw_student` AS SELECT
    `student`.`id` AS `id`,
    `student`.`name` AS `name`,
    `student`.`email` AS `email`,
    `student`.`father_name` AS `father_name`,
    `student`.`date_of_birth` AS `date_of_birth`,
    `student`.`gender` AS `gender`,
    `student`.`profile_image` AS `image`,
    `semester`.`name` AS `semester`,
    `subject`.`specialization` AS `specialization`,
    `subject`.`degree` AS `degree`,
    `achedamic_year`.`name` AS `achedamic_year`,
    `city`.`name` AS `city_name`,
    `township`.`name` AS `township_name`,
    `street`.`name` AS `street_name`,
    `address`.`block` AS `block`,
    `address`.`unit` AS `unit`
FROM
    (
        (
            `student`
        LEFT JOIN `education` ON(
                `student`.`education_id` = `education`.`id`
            )
        )
    LEFT JOIN `semester` ON
        (
            `education`.`semester_id` = `semester`.`id`
        )
    LEFT JOIN `subject` ON(
            `education`.`subject_id` = `subject`.`id`
        )
    LEFT JOIN `achedamic_year` ON(
            `education`.`achedamic_year_id` = `achedamic_year`.`id`
        )
    LEFT JOIN `address` ON(
            `student`.`address_id` = `address`.`id`
        )
    LEFT JOIN `street` ON
        (`address`.`street_id` = `street`.`id`)
    LEFT JOIN `township` ON(
            `address`.`township_id` = `township`.`id`
        )
    LEFT JOIN `city` ON(`township`.`city_id` = `city`.`id`)
    );

-- --------------------------------------------------------

--
-- Structure for view `vw_education`
--
DROP TABLE IF EXISTS `vw_education`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_education`  AS  select `education`.`id` AS `id`,`semester`.`name` AS `semester_name`,`subject`.`specialization` AS `specialization`,`subject`.`degree` AS `degree`,`achedamic_year`.`name` AS `name` from ((`education` left join `semester` on(`education`.`semester_id` = `semester`.`id`)) left join `subject` on(`education`.`subject_id` = `subject`.`id`) left join `achedamic_year` on(`education`.`achedamic_year_id` = `achedamic_year`.`id`)) ;

-- --------------------------------------------------------


--
-- Structure for view `vw_student`
--
-- DROP TABLE IF EXISTS `vw_student`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_student`  AS  select `student`.`id` AS `id`,`student`.`name` AS `semester_name`,`subject`.`specialization` AS `specialization`,`subject`.`degree` AS `degree`,`achedamic_year`.`name` AS `name` from ((`education` left join `semester` on(`education`.`semester_id` = `semester`.`id`)) left join `subject` on(`education`.`subject_id` = `subject`.`id`) left join `achedamic_year` on(`education`.`achedamic_year_id` = `achedamic_year`.`id`)) ;

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_id` (`social_id`),
  ADD KEY `education_id` (`education_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
