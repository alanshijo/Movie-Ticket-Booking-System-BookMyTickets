-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 07:44 AM
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
-- Database: `bookmytickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `otp_code` varchar(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `email`, `password`, `otp_code`, `type_id`) VALUES
(1, 'admin@admin.com', 'qwerty', '0', 1),
(4, 'alanshijoatkl@gmail.com', 'Alan@1234', '0', 2),
(8, 'alexreji777@gmail.com', '1234', '0', 2),
(16, 'georgebenny456@gmail.com', 'George@1234', '', 2),
(18, 'niceshijo52@gmail.com', 'Nice@1234', '', 2),
(19, 'shijoatkl@gmail.com', 'Shijo@1234', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movies`
--

CREATE TABLE `tbl_movies` (
  `movie_id` int(255) NOT NULL,
  `movie_poster` varchar(255) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `movie_lang` varchar(255) NOT NULL,
  `movie_certificate` varchar(255) NOT NULL,
  `movie_runtime` varchar(255) NOT NULL,
  `movie_releasedate` date NOT NULL,
  `del_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_movies`
--

INSERT INTO `tbl_movies` (`movie_id`, `movie_poster`, `movie_name`, `movie_lang`, `movie_certificate`, `movie_runtime`, `movie_releasedate`, `del_status`) VALUES
(32, 'cover.jpg', 'Transformer', 'English', 'U/A', '2hr 10min', '2022-11-30', 0),
(33, 'cover2.jpg', 'Renevant', 'English', 'U/A', '3hr 1min', '2022-11-21', 0),
(34, 'cover4.jpg', 'Inception', 'English', 'U', '2hr 30min', '2022-11-15', 0),
(35, 'cover6.jpg', 'Orphan', 'English', 'A', '1hr 22min', '2022-11-25', 0),
(36, 'project-1.jpg', 'avatar', 'English', 'U', '2hr 5min', '2022-11-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shows`
--

CREATE TABLE `tbl_shows` (
  `show_id` int(11) NOT NULL,
  `show_name` varchar(255) NOT NULL,
  `show_time` time NOT NULL,
  `del_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shows`
--

INSERT INTO `tbl_shows` (`show_id`, `show_name`, `show_time`, `del_status`) VALUES
(1, 'noon', '13:00:00', 1),
(2, 'morning', '11:00:00', 0),
(3, 'noon', '14:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatremovies`
--

CREATE TABLE `tbl_theatremovies` (
  `tm_id` int(11) NOT NULL,
  `thtr_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_theatremovies`
--

INSERT INTO `tbl_theatremovies` (`tm_id`, `thtr_id`, `movie_id`) VALUES
(43, 11, 32),
(44, 11, 34);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatres`
--

CREATE TABLE `tbl_theatres` (
  `thtr_id` int(11) NOT NULL,
  `thtr_name` varchar(255) NOT NULL,
  `thtr_place` varchar(255) NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `del_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_theatres`
--

INSERT INTO `tbl_theatres` (`thtr_id`, `thtr_name`, `thtr_place`, `ticket_price`, `del_status`) VALUES
(11, 'Maharani', 'Palai', 100, 0),
(12, 'Universal', 'Palai', 130, 0),
(13, 'Surya', 'Erattupetta', 150, 0),
(14, '', '', 0, 1),
(15, 'ashirvd', 'thodupuzha', 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatreshows`
--

CREATE TABLE `tbl_theatreshows` (
  `ts_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `tm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_theatreshows`
--

INSERT INTO `tbl_theatreshows` (`ts_id`, `show_id`, `tm_id`) VALUES
(41, 3, 43),
(42, 3, 44);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `pro_pic` varchar(255) NOT NULL,
  `user_fname` varchar(25) NOT NULL,
  `user_lname` varchar(25) NOT NULL,
  `user_phno` varchar(10) NOT NULL,
  `user_status` varchar(25) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `pro_pic`, `user_fname`, `user_lname`, `user_phno`, `user_status`, `login_id`) VALUES
(1, '0', 'admin', 'admin', '9999999999', 'active', 1),
(2, 'project-3.jpg', 'alan', 'shijo', '8281187831', 'active', 4),
(6, '0', 'Alex', 'Reji', '7415236980', 'deactive', 8),
(14, '0', 'George', 'Benny', '6238681837', 'deactive', 16),
(16, '0', 'Nice', 'Shijo', '9446895431', 'active', 18),
(17, '0', 'Shijo', 'Joseph', '9946351543', 'active', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `type_id` int(11) NOT NULL,
  `type_title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`type_id`, `type_title`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_movies`
--
ALTER TABLE `tbl_movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  ADD PRIMARY KEY (`show_id`);

--
-- Indexes for table `tbl_theatremovies`
--
ALTER TABLE `tbl_theatremovies`
  ADD PRIMARY KEY (`tm_id`);

--
-- Indexes for table `tbl_theatres`
--
ALTER TABLE `tbl_theatres`
  ADD PRIMARY KEY (`thtr_id`);

--
-- Indexes for table `tbl_theatreshows`
--
ALTER TABLE `tbl_theatreshows`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_movies`
--
ALTER TABLE `tbl_movies`
  MODIFY `movie_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  MODIFY `show_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_theatremovies`
--
ALTER TABLE `tbl_theatremovies`
  MODIFY `tm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_theatres`
--
ALTER TABLE `tbl_theatres`
  MODIFY `thtr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_theatreshows`
--
ALTER TABLE `tbl_theatreshows`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
