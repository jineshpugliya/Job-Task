-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 07:46 PM
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
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `i_name` varchar(50) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `i_name`, `p_id`) VALUES
(21, '16245519981.jpg', 7),
(22, '16245519982.jpg', 7),
(23, '16245519983.jpg', 7),
(24, '16245519984.jpg', 7),
(25, '16245528350.jpg', 6),
(26, '16245528352.jpg', 6),
(28, '16245535602.jpg', 8),
(29, '16245535810.jpg', 8),
(30, '16245535811.jpg', 8),
(32, '16245565841.jpg', 9),
(33, '16245565842.jpg', 9),
(34, '16245565843.jpg', 9),
(35, '16245565854.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(12) NOT NULL,
  `rollno` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `class`, `rollno`, `date`, `dob`) VALUES
(1, 'jinesh', 'bca 3rd year', 20, '2021-06-24 15:57:11', '2001-06-01'),
(5, 'Ignatius vincent', 'Velit sed pa', 72, '2021-06-24 16:15:30', '1976-07-10'),
(6, 'Moana', 'Est', 7, '2021-06-24 16:15:51', '2009-01-24'),
(8, 'Andrew', 'Non ', 7, '2021-06-24 16:52:13', '1974-06-07'),
(9, 'Duncan perez', '12 th class', 82, '2021-06-24 17:20:08', '1981-05-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
