-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 09:19 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concertbookings`
--
CREATE DATABASE IF NOT EXISTS `concertbookings` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `concertbookings`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Adim', '87654321'),
('John', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `mobilePhone` varchar(15) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `surname` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`mobilePhone`, `firstname`, `DOB`, `surname`, `password`) VALUES
('0432918183', 'Steph', '1970-08-03', 'Sam', '12345678'),
('0434833920', 'margret', '2020-08-13', 'beniameen', '12345678'),
('0475757783', 'sally', '2019-04-19', 'nabil', '12345678'),
('5331330', 'lucy', '2020-08-14', 'jack', '12345678'),
('53486008', 'lolo', '2002-01-01', 'nabil', '12345678'),
('55006677', 'fifi', '2020-07-30', 'adam', '12345678'),
('7467773', 'nancy', '0001-01-01', 'saad', '12345678'),
('7636656', 'lucy', '2019-04-19', 'edam', '12345678'),
('94875665466', 'ann', '2019-04-19', 'edward', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `bands`
--

CREATE TABLE `bands` (
  `band_id` int(15) UNSIGNED NOT NULL,
  `band_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bands`
--

INSERT INTO `bands` (`band_id`, `band_name`) VALUES
(2, 'Big Beats'),
(5, 'Boggletops'),
(3, 'Kelly roth'),
(24, 'king'),
(27, 'The leader '),
(1, 'The leader coins');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(15) UNSIGNED NOT NULL,
  `mobilePhone` varchar(15) NOT NULL,
  `concert_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `mobilePhone`, `concert_id`) VALUES
(200, '5331330', 5),
(201, '5331330', 1),
(204, '5331330', 2),
(206, '0434833920', 4),
(207, '0434833920', 5);

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

CREATE TABLE `concerts` (
  `concert_id` int(15) UNSIGNED NOT NULL,
  `band_id` int(15) NOT NULL,
  `venue_id` int(15) NOT NULL,
  `concert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`concert_id`, `band_id`, `venue_id`, `concert_date`) VALUES
(1, 1, 2, '2020-09-25 21:00:00'),
(2, 2, 1, '2020-10-01 17:00:00'),
(3, 3, 3, '2020-08-01 19:00:00'),
(4, 5, 1, '2020-11-05 16:00:00'),
(5, 1, 2, '2020-09-14 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_id` int(15) UNSIGNED NOT NULL,
  `venue_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `venue_name`) VALUES
(3, 'Camboon Hall'),
(2, 'east Lounge'),
(8, 'oshclub'),
(1, 'The Club'),
(39, 'The Clubb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`mobilePhone`);

--
-- Indexes for table `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`band_id`),
  ADD UNIQUE KEY `band_name` (`band_name`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`concert_id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_id`),
  ADD UNIQUE KEY `venue_name` (`venue_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bands`
--
ALTER TABLE `bands`
  MODIFY `band_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `concerts`
--
ALTER TABLE `concerts`
  MODIFY `concert_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
