
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `is_confirmed` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_login` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_image`, `is_confirmed`, `is_active`, `is_login`, `token`, `date`) VALUES
(1, 'aa', 'aa@gmail.com', 'MTIzNA==', 'default_img.jpg', 0, 0, 0, '7bc090b14097e87d6c8d61543e8f9aad551813a1e6532d83afe85ff1a493adf1826933567d9cfec09664ddbeb1066bb4d9e3', 2020)
