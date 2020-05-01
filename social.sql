-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 06:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  `friend_array` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(1, 'Alper', 'Akıncı', 'alper_akıncı', 'A@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-03-01', 'assets/images/profile_pics/default/head_sun_flower.png', 0, 0, 'no', ','),
(2, 'Alper', 'Akıncı', 'alper_akıncı_1', 'Aa@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-03-01', 'assets/images/profile_pics/default/head_sun_flower.png', 0, 0, 'no', ','),
(3, 'Aaa', 'Akıncı', '', 'Abcd@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-03-01', 'assets/images/profile_pics/default/head_sun_flower.png', 0, 0, 'no', ','),
(4, 'Alper', 'Abdulrezzak', 'alper_abdulrezzak', 'Alper@akinci.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-03-01', 'assets/images/profile_pics/default/head_carrot.png', 0, 0, 'no', ','),
(5, 'Alper', 'Abdulrezzak', 'alper_abdulrezzak_1', 'Ad@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-03-01', 'assets/images/profile_pics/default/head_carrot.png', 0, 0, 'no', ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
