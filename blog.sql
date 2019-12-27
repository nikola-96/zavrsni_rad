-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2019 at 08:02 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `text`, `post_id`) VALUES
(42, 'Ivan Ivanovic', 'Probaj kurs.', 1),
(43, 'Ivan Ivanovic', 'www.oglasi.com', 6);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `body` varchar(1000) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `created_at`) VALUES
(1, 'Kako krenuti sa programiranjem?', 'Zanimaju me vasa iskustva, kako ste krenuli sa programiranjem i odakle se stvorila zelja za istim. \nMene je programiranje krenulo da zanima jos u srednjoj skoli, iako nisam upisao nista sto je imalo veze sa programiranjem, ali sam me \nje oduvek privlacilo i intrigiralo kako sve to funkcionise. Zelim krenuti da se bavim programiranjem, ali ne znam odakle da krenem...', 'Nikola Markovic', '2019-12-24 23:25:59'),
(2, 'Kupovina prvog automobila', 'Nakon nekog vremena sam konacno skupio novac da kupim automobil, ali se ne razumem u automobile. Imam 23 godine i \nzelim da kupim auto za jeftine novce koje ce me naravno sluziti, sa sto manjim ulaganjima, pa bih vas zamolio da mi ispricate vasa iskustva.', 'Jovan Jovanovic', '2019-12-25 01:25:50'),
(3, 'Preporuka za film', 'Imam problem sa odlucivanjem kojeg filma pogledati sutra sa devojkom, naime stalno trazimo neke, ali retko koji nam zadrzi paznju. \nZanima nas kvalitetna misterija, sa dobrim glumcima, a da nije stariji film od 5 god. Pisite samo dobro proverene.', 'Petar Petrovic', '2019-12-25 01:55:02'),
(5, 'Knjiga', 'Preporucite neku dobru knjigu. Nisam citao duze vreme, dobio sam iznenadnu zelju, ali ne znam sta da citam. Saljite samo  ukoliko ste procitali istu.', 'Marko Markovic', '2019-12-26 23:29:13'),
(6, 'Sajt za posao', 'Imam 18 godina i zelim naci posao, ucenik sam tehnicke skole. Radila bih honorarne poslove od kuce, ali ne znam koji je sajt najbolji za to.', 'Miljana Antic', '2019-12-26 23:30:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

