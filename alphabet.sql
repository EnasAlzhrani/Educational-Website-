-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 07:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphabet`
--

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `latter` char(1) NOT NULL,
  `ex_1` varchar(10) NOT NULL,
  `ex_2` varchar(10) NOT NULL,
  `ex_3` varchar(10) NOT NULL,
  `ex_4` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `latter`, `ex_1`, `ex_2`, `ex_3`, `ex_4`) VALUES
(1, 'A', 'Apple', 'Artist', 'April', 'Award'),
(2, 'B', 'Bear', 'Ball', 'Bat', 'Bed'),
(3, 'C', 'Cat', 'Car', 'Cap', 'Cake');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `qustion` varchar(50) NOT NULL,
  `op1` varchar(10) NOT NULL,
  `op2` varchar(10) NOT NULL,
  `op3` varchar(10) NOT NULL,
  `op4` varchar(10) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `ansr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `qustion`, `op1`, `op2`, `op3`, `op4`, `lesson_id`, `ansr`) 
VALUES 
('1', 'Chosse the word that start with A:', 'Apple', 'Cat', 'Bed', 'Car', '1', 'Apple'), 
('2', 'Chosse the word that start with A:', 'Bat', 'Cup', 'Aprile', 'Bear','1', 'Aprile'),
('3', 'Chosse the word that start with A:', 'Cake', 'Cup', 'Ball', 'Award','1', 'Award'),
('4', 'Chosse the word that start with A:', 'Artist', 'Cup', 'Cake', 'Ball','1', 'Artist'),
('5', 'Chosse the word that start with B:', 'Apple', 'Cat', 'Bed', 'Car', '2', 'Bed'), 
('6', 'Chosse the word that start with B:', 'Bat', 'Cup', 'Aprile', 'Award', '2', 'Bat'),
('7', 'Chosse the word that start with B:', 'Cake', 'Cup', 'Ball', 'Award', '2', 'Ball'),
('8', 'Chosse the word that start with B:', 'Artist', 'Cup', 'Cake', 'Bear', '2', 'Bear'),
('9', 'Chosse the word that start with C:', 'Apple', 'Cat', 'Bed', 'Bear', '3', 'Cat'), 
('10', 'Chosse the word that start with C:', 'Bat', 'Cup', 'Aprile', 'Award', '3', 'Cup'),
('11', 'Chosse the word that start with C:', 'Cake', 'Car', 'Ball', 'Award', '3', 'Car'),
('12', 'Chosse the word that start with C:', 'Artist', 'Aprile', 'Cake', 'Bear', '3', 'Cake');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `paasword` varchar(255) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `q1_score` int(11) NOT NULL DEFAULT 0,
  `q2_score` int(11) NOT NULL DEFAULT 0,
  `q3_score` int(11) NOT NULL DEFAULT 0,
  `q4_score` int(11) NOT NULL DEFAULT 0,
  `lesson_completed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `paasword`, `user_name`, `login_time`, `q1_score`, `q2_score`, `q3_score`, `q4_score`, `lesson_completed`) VALUES
('GG1@gmail.com', 'Sh@123', 'sh', '2023-05-30 16:45:14', 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_lesson` (`lesson_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
