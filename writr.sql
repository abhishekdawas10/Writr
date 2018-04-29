-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 01:58 AM
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
(3, 6, 4, '2');

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
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 'To kill a mockingbird', 'A lawyers advice to his children as he defends the real mockingbird of Harper Lees classic novel', '2018-04-29 23:53:51', 3),
(5, 'Lorem', 'In publishing and graphic design, lorem ipsum is a placeholder text.', '2018-04-29 23:55:02', 3),
(6, 'Kuch bhi rakh de', 'Pineapple raita', '2018-04-30 00:22:56', 4);

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

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`UserID`, `Username`, `Password`, `Name`, `Email`, `description`) VALUES
(1, 'asd', '76d80224611fc919a5d54f0ff9fba446', 'qweqwe', 'asd@asd.com', ''),
(2, 'zxc', '76d80224611fc919a5d54f0ff9fba446', 'zxczxczxc', 'zxc@email.com', ''),
(3, 'qweqweqwe', '76d80224611fc919a5d54f0ff9fba446', 'qwe', 'qwe@qwe.com', 'QWE is the greatest 3 letter combination, isn\'t it?'),
(4, 'akaye', '315eb115d98fcbad39ffc5edebd669c9', 'Abhishek Goyal', 'abhi.goyal2@gmail.com', 'Hi! I am Abhishek. A Student majoring in computer Science.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
