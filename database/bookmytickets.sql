-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 03:50 PM
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
-- Table structure for table `tbl_genres`
--

CREATE TABLE `tbl_genres` (
  `genre_id` int(11) NOT NULL,
  `genre_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_genres`
--

INSERT INTO `tbl_genres` (`genre_id`, `genre_title`) VALUES
(1, 'Adventure'),
(2, 'Animation'),
(3, 'Drama'),
(4, 'Thriller'),
(5, 'Documentary '),
(6, 'History'),
(7, 'Comedy'),
(8, 'Action'),
(9, 'Fantasy'),
(10, 'Sci-Fi'),
(11, 'Romance'),
(12, 'Horror'),
(13, 'Western'),
(14, 'Mystery');

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
(1, 'admin@admin.com', 'qwerty', '', 1),
(4, 'alanshijoatkl@gmail.com', 'Alan@1234', '', 2),
(8, 'alexreji777@gmail.com', '1234', '', 2),
(16, 'georgebenny456@gmail.com', 'George@1234', '', 2),
(18, 'niceshijo52@gmail.com', 'Nice@1234', '', 2),
(19, 'shijoatkl@gmail.com', 'Shijo@1234', '', 2),
(21, 'puthettu@gmail.in', 'Djxq6aiZ', '', 4),
(22, 'mhrni@gmail.com', 'EgfaINnv', '', 4),
(23, 'universal@gmail.com', 'fUkpxeoN', '', 4),
(48, 'as@gm.com', 'Aashirvad@1', '', 4),
(51, 'jose@mail.com', 'v8ofI7SL', '', 4),
(52, 'deepu@gmail.com', 'eGNO1BwT', '', 4),
(53, 'abhish@gmail.com', '1F3xV7mT', '', 4),
(54, 'rdcinema@gmail.com', 'GMWitFJ1', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_moviegenres`
--

CREATE TABLE `tbl_moviegenres` (
  `genre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(37, 'godfthr.jpg', 'Godfather', 'English', 'A', '1hr 40min', '2022-11-02', 0),
(38, 'joker.png', 'Joker', 'English', 'A', '1hr 45min', '2022-11-28', 0),
(39, 'black adam.png', 'Black Adam', 'English', 'U/A', '3hr 1min', '2022-11-15', 0),
(40, 'bullettrain.png', 'Bullet Train', 'English', 'U/A', '1hr 40min', '2022-12-05', 0),
(41, 'aquaman.png', 'Aquaman', 'English', 'U/A', '2hr 36min', '2022-10-31', 0),
(42, 'justiceleag.png', 'Justice League', 'English', 'U/A', '4hr 1min', '2022-10-18', 0),
(43, 'endgame.png', 'Endgame', 'English', 'U/A', '3hr 13min', '2022-09-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shows`
--

CREATE TABLE `tbl_shows` (
  `show_id` int(11) NOT NULL,
  `thtr_id` int(11) NOT NULL,
  `show_time` time NOT NULL,
  `del_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shows`
--

INSERT INTO `tbl_shows` (`show_id`, `thtr_id`, `show_time`, `del_status`) VALUES
(7, 51, '09:00:00', 0),
(8, 51, '11:30:00', 0),
(9, 51, '14:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatremovies`
--

CREATE TABLE `tbl_theatremovies` (
  `tm_id` int(11) NOT NULL,
  `thtr_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `req_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_theatremovies`
--

INSERT INTO `tbl_theatremovies` (`tm_id`, `thtr_id`, `movie_id`, `req_status`) VALUES
(47, 48, 37, 'pending'),
(48, 48, 38, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatres`
--

CREATE TABLE `tbl_theatres` (
  `thtr_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `thtr_name` varchar(255) NOT NULL,
  `thtr_place` varchar(255) NOT NULL,
  `del_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_theatres`
--

INSERT INTO `tbl_theatres` (`thtr_id`, `login_id`, `thtr_name`, `thtr_place`, `del_status`) VALUES
(18, 21, 'puthet', 'Pala', 0),
(19, 22, 'Maharani', 'Palai', 0),
(20, 23, 'Universal', 'Palai', 0),
(45, 48, 'ashirvd', 'thdpzha', 0),
(48, 51, 'jose', 'palai', 0),
(49, 52, 'deepu', 'kotym', 0),
(50, 53, 'abhilsh', 'kotym', 0),
(51, 54, 'rd', 'mundkym', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatreshows`
--

CREATE TABLE `tbl_theatreshows` (
  `ts_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `tm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'project-3.jpg', 'alan', 'shijo', '8281187831', 'active', 4),
(6, '0', 'Alex', 'Reji', '7415236980', 'active', 8),
(14, '0', 'George', 'Benny', '6238681837', 'active', 16),
(16, '0', 'Nice', 'Shijo', '9446895431', 'active', 18),
(17, '0', 'Shijo', 'Joseph', '9946351543', 'deactive', 19),
(19, '', 'admin', 'admin', '', 'active', 1);

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
(2, 'user'),
(4, 'theatre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_genres`
--
ALTER TABLE `tbl_genres`
  ADD PRIMARY KEY (`genre_id`);

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
-- AUTO_INCREMENT for table `tbl_genres`
--
ALTER TABLE `tbl_genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_movies`
--
ALTER TABLE `tbl_movies`
  MODIFY `movie_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  MODIFY `show_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_theatremovies`
--
ALTER TABLE `tbl_theatremovies`
  MODIFY `tm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_theatres`
--
ALTER TABLE `tbl_theatres`
  MODIFY `thtr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_theatreshows`
--
ALTER TABLE `tbl_theatreshows`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
