-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 04:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(9, 'images/671e2e45bbea1.jpg', 'Dog', 'Beagle', '12 - 15years', 'A small to medium-sized breed known for its friendly, curious, and gentle nature. Beagles have a keen sense of smell and are often used in hunting.', 'enabled'),
(10, 'images/671e2e86532e5.jfif', 'Dog', 'Dachshund', '12 - 16years', 'A small dog with a long body and short legs, often known as the \"wiener dog.\" They are curious, brave, and have a strong hunting instinct.', 'enabled'),
(11, 'images/671e2ee08dcba.jfif', 'Dog', 'French Bulldog', '10 - 12years', ' A small, muscular dog with a smooth coat and distinctive \"bat-like\" ears. Known for being affectionate, playful, and good with families.', 'enabled'),
(12, 'images/671e2f300cb9c.jfif', 'Dog', 'Shih Tzu', '10 - 16years', 'A small dog with a long, flowing coat and a friendly, affectionate personality. Originally bred for companionship.', 'enabled'),
(14, 'images/6751101677d69.png', 'Bird', 'Budgerigar', '5 to 10 years ', 'Small, colorful parrots that are friendly and social. They are known for their playful nature and can learn to mimic sounds and words.', 'enabled'),
(15, 'images/67511044a686f.jpeg', 'Bird', 'Cockatiel', '10 to 15 years', 'A medium-sized parrot with a distinctive crest and a friendly disposition. Cockatiels are known for their whistling ability and affectionate behavior.', 'enabled'),
(16, 'images/675110710a8c5.jpg', 'Bird', 'LovedBird', '10 to 15 years', 'Small, affectionate parrots that are known for their strong pair bonds. They are social birds that enjoy interaction with their owners and can be quite playful.', 'enabled'),
(17, 'images/675110949b344.jpg', 'Bird', 'African Grey Parro', '20 to 30 years', 'Highly intelligent and social birds known for their exceptional ability to mimic human speech. They require mental stimulation and social interaction.', 'enabled'),
(18, 'images/675110bba5c62.jpg', 'Bird', 'Canary', '10 to 15 years', 'Small songbirds known for their beautiful singing. Canaries come in various colors and are relatively easy to care for, making them popular pets for bird enthusiasts.', 'enabled'),
(19, 'images/675113f2cb368.jpg', 'Fish', 'BettaFish', '3 to 5 years.', 'Betta fish, also known as Siamese fighting fish, are known for their vibrant colors and flowing fins. Males are particularly aggressive towards each other, so they should be kept alone or with non-aggressive species. They thrive in smaller tanks but require clean water and regular maintenance.', 'enabled'),
(20, 'images/6751141bd136b.jpg', 'Fish', 'Goldfish', '10 to 15 years', 'Goldfish are one of the most popular pet fish due to their hardiness and variety of colors and shapes. They can grow quite large, especially in spacious tanks or ponds. Goldfish require a well-maintained tank with adequate filtration and should not be kept in small bowls, as they need space to swim and grow.', 'enabled'),
(21, 'images/675114459e8bc.jpg', 'Fish', 'Guppy', '3 to 5 years.', 'Guppies are small, colorful freshwater fish that are easy to care for, making them ideal for beginners. They are livebearers, meaning they give birth to live young rather than laying eggs. Guppies are social fish and thrive in groups, and they come in a variety of colors and patterns.', 'enabled'),
(22, 'images/675114704196d.jpg', 'Fish', 'Neon Tetra', '5 years.', ' Neon tetras are small, peaceful fish known for their striking blue and red coloration. They are best kept in schools of six or more and do well in community tanks with other small, non-aggressive fish. Neon tetras prefer well-planted tanks with subdued lighting.', 'enabled'),
(23, 'images/6751148de8eef.jpg', 'Fish', 'Corydoras Catfish', '10 years', 'Corydoras catfish are small, bottom-dwelling fish that are known for their friendly nature and unique appearance. They have a distinctive armored body and are often seen swimming in groups. Corydoras help keep the tank clean by scavenging for leftover food. They thrive in community tanks and prefer sandy substrates.', 'enabled');

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
(5, 'Paul Kenrick', 'navarro', 'Pineda', 'Male', 21, '2003-08-15', 'paul@gmail.com', 'user', 'paulkenrick', '1234'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
