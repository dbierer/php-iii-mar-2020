-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2018 at 11:46 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.2.3-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flying_elephant`
--

-- --------------------------------------------------------

--
-- Table structure for table `propellant`
--

CREATE TABLE `propellant` (
  `id` varchar(150) NOT NULL,
  `type` varchar(100) NOT NULL,
  `propellant` varchar(255) NOT NULL,
  `timestamp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propellant`
--

INSERT INTO `propellant` (`id`, `type`, `propellant`, `timestamp`) VALUES
('01d1c119-bf97-4a05-b5d6-d94d950d049f', 'Solar Sail', 'High energy lazer', 1474050766),
('5cd8d70c-89e2-43c7-86ac-4778cf4a2ac4', 'Antimatter Rocket', 'High density matter/antimatter reaction', 1474050772),
('a745187d-a5b2-4850-8cc2-e19880627533', 'Fusion Rocket', 'Nuclear fusion reaction', 1474050769),
('e4d69bd7-10e9-4913-95ab-90fe18d53104', 'Traditional Rocket', 'Chemical', 1474050763);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `propellant`
--
ALTER TABLE `propellant`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
