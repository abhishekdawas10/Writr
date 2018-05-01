-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2018 at 10:50 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `writr`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `access_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` set('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`access_id`, `project_id`, `user_id`, `level`) VALUES
(1, 4, 3, '1'),
(2, 5, 3, '2'),
(3, 6, 4, '2'),
(6, 9, 19, '2'),
(8, 11, 17, '2'),
(9, 12, 17, '2'),
(10, 13, 19, '2'),
(12, 15, 20, '2'),
(13, 9, 17, '2'),
(14, 13, 17, '2');

-- --------------------------------------------------------

--
-- Table structure for table `follow_and_unfollow_activity`
--

CREATE TABLE `follow_and_unfollow_activity` (
  `id` int(100) NOT NULL,
  `page_owners_emails` varchar(200) NOT NULL,
  `followers_username` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forget`
--

CREATE TABLE `forget` (
  `username` varchar(200) NOT NULL,
  `OTP` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `node_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `isroot` tinyint(1) NOT NULL,
  `version_count` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`node_id`, `project_id`, `parent_id`, `isroot`, `version_count`, `creation_date`, `user_id`, `description`) VALUES
(24, 9, 0, 1, 1, '2018-05-01 00:35:13', 19, 'Hi this is my first node'),
(26, 9, 24, 0, 1, '2018-05-01 01:36:08', 19, 'Second node'),
(27, 9, 26, 0, 1, '2018-05-01 01:38:55', 19, 'The Third node.'),
(28, 9, 24, 0, 1, '2018-05-01 01:40:21', 19, 'Second child'),
(29, 9, 28, 0, 2, '2018-05-01 01:40:59', 19, 'The third man child'),
(36, 11, 0, 1, 2, '2018-05-01 04:48:56', 17, 'asdasd'),
(38, 11, 36, 0, 1, '2018-05-01 04:49:30', 17, 'qweasczxcasd'),
(43, 12, 0, 1, 1, '2018-05-01 05:22:15', 17, 'Starting our journey'),
(44, 12, 43, 0, 1, '2018-05-01 05:23:13', 17, 'Wandering through forest'),
(45, 12, 43, 0, 1, '2018-05-01 05:36:44', 17, 'Walking by the riverside'),
(46, 12, 45, 0, 1, '2018-05-01 05:38:03', 17, 'ahahaha this is too easy'),
(47, 12, 45, 0, 1, '2018-05-01 05:38:41', 17, 'ahahaha this is too easy'),
(48, 12, 44, 0, 1, '2018-05-01 05:38:58', 17, 'zxczxc'),
(51, 12, 44, 0, 1, '2018-05-01 05:39:57', 17, 'Next node'),
(52, 13, 0, 1, 1, '2018-05-01 05:50:44', 19, 'Start of a journey'),
(53, 13, 52, 0, 1, '2018-05-01 05:50:56', 19, 'zxcxzcasdasdzasdad'),
(54, 13, 52, 0, 1, '2018-05-01 05:51:06', 19, 'asdkljnxcjvsd'),
(55, 15, 0, 1, 1, '2018-05-01 09:16:37', 20, 'Node1'),
(56, 15, 55, 0, 1, '2018-05-01 09:18:50', 20, 'Child1'),
(57, 15, 55, 0, 1, '2018-05-01 09:19:28', 20, 'Child2'),
(58, 15, 56, 0, 1, '2018-05-01 09:20:16', 20, 'Grandchild1');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `summary` text NOT NULL,
  `creation_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `name`, `summary`, `creation_time`, `user_id`) VALUES
(2, 'Once Upon A Time', 'In a land far, far away, there was a kid named George. George one day, stumbled upon a book which changed his life forever.', '0000-00-00 00:00:00', 3),
(3, 'Heaven and Hell', 'Jon, an extraordinary nihilistic commoner possesses the keys to the gates to the heavens above and the hells below. What will he do with this power?', '0000-00-00 00:00:00', 3),
(4, 'To kill a mockingbird', 'A lawyers advice to his children as he defends the real mockingbird of Harper Lees classic.', '2018-04-29 23:53:51', 3),
(5, 'Lorem', 'In publishing and graphic design, lorem ipsum is a placeholder text.', '2018-04-29 23:55:02', 3),
(6, 'Kuch bhi rakh de', 'Pineapple raita', '2018-04-30 00:22:56', 4),
(9, 'The Murder of Roger Ackroyd', 'The Murder of Roger Ackroyd is a fine work of detective fiction by Agatha Christie, first published in June 1926 in the United Kingdom by William Collins, Sons and in the United States by Dodd, Mead and Company on 19 June 1926.', '2018-04-30 22:50:15', 19),
(11, 'Killing Floor', 'Killing Floor is the debut novel by Lee Child, first published in 1997 by Putnam. The book won the Anthony Award and Barry Award for best first novel.', '2018-05-01 04:24:07', 17),
(12, 'The Return of the King', 'The Return of the King is the third and final volume of J. R. R. Tolkiens The Lord of the Rings, following The Fellowship of the Ring and The Two Towers', '2018-05-01 05:20:58', 17),
(13, 'The Return of the king', 'The Return of the King is the third and final volume', '2018-05-01 05:47:15', 19),
(15, 'Project1', 'CSP202', '2018-05-01 09:15:58', 20);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `date`, `description`) VALUES
(16, 'sahilgupta', 'Sahil', 'Gupta', 'sahil7gupta@gmail.com', '315eb115d98fcbad39ffc5edebd669c9', '30-04-2018', ''),
(17, 'qweqweqwe', 'qwe', 'qwe', 'qwe@qwe.com', '76d80224611fc919a5d54f0ff9fba446', '30-04-2018', ''),
(18, 'qweqwe', 'qwe', 'qwe', 'qwe@asdasd.com', '76d80224611fc919a5d54f0ff9fba446', '30-04-2018', 'qwe'),
(19, 'Akaye', 'Abhishek', 'Goyal', 'abhi.goyal2@gmail.com', '315eb115d98fcbad39ffc5edebd669c9', '30-04-2018', 'Hi! this is me Abhishek. I\'m a computer science student.'),
(20, 'ad', 'abhishek', 'dawas', 'abhishekdawas10@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '01-05-2018', 'dscccs'),
(21, 'ad100', 'Abhishek', 'Dawas', 'abhidawas@gmail.com', '315eb115d98fcbad39ffc5edebd669c9', '01-05-2018', 'Hi! I am Dawas.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `follow_and_unfollow_activity`
--
ALTER TABLE `follow_and_unfollow_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`node_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `follow_and_unfollow_activity`
--
ALTER TABLE `follow_and_unfollow_activity`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
