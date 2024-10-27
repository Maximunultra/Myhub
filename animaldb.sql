-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 03:09 PM
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
-- Database: `animaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `lifespan` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_path`, `type`, `breed`, `lifespan`, `description`, `status`) VALUES
(7, 'images/66fa4c060a509.jpeg', 'Dog', 'Golden retriver', '80 years', 'Malambing malakas kumain, mabalahibo', 'enabled'),
(9, 'images/671e2e45bbea1.jpg', 'Dog', 'Beagle', '12 - 15years', 'A small to medium-sized breed known for its friendly, curious, and gentle nature. Beagles have a keen sense of smell and are often used in hunting.', 'disabled'),
(10, 'images/671e2e86532e5.jfif', 'Dog', 'Dachshund', '12 - 16years', 'A small dog with a long body and short legs, often known as the \"wiener dog.\" They are curious, brave, and have a strong hunting instinct.', 'enabled'),
(11, 'images/671e2ee08dcba.jfif', 'Dog', 'French Bulldog', '10 - 12years', ' A small, muscular dog with a smooth coat and distinctive \"bat-like\" ears. Known for being affectionate, playful, and good with families.', 'disabled'),
(12, 'images/671e2f300cb9c.jfif', 'Dog', 'Shih Tzu', '10 - 16years', 'A small dog with a long, flowing coat and a friendly, affectionate personality. Originally bred for companionship.', 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Middle_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Birthdate` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL DEFAULT 'user',
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Gender`, `Age`, `Birthdate`, `Email`, `Role`, `Username`, `Password`) VALUES
(4, 'Laurence', 'Advincula', 'Palacio', 'male', 20, '2021-08-13', 'laurencepalacio099gmail.com', 'admin', 'laurencepalacio', 'admin'),
(5, 'Paul Kenrick', 'navarro', 'Pineda', 'Male', 21, '2003-08-15', 'paul@gmail.com', 'user', 'paulkenrick', 'user'),
(7, 'Hugh', 'Eugene', 'Navarro', 'Male', 17, '2007-07-04', 'hugh@gmail.com', 'user', 'hugh', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
