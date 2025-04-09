-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2025 at 06:59 PM
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
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(1500) NOT NULL,
  `section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `name`, `birthday`, `image`, `section`) VALUES
(1, 'Ahmed', '2005-02-07', 'https://0x0.st/8_fi.jpg', 1),
(2, 'Louay', '2004-06-21', 'https://0x0.st/8_fs.jpg', 1),
(3, 'Ghassen', '2004-10-02', 'https://0x0.st/8_f-.jpg', 1),
(8, 'Fathi', '2003-04-22', 'https://cdn5.vectorstock.com/i/1000x1000/52/54/male-student-graduation-avatar-profile-vector-12055254.jpg', 4),
(9, 'Fathia', '2004-04-22', 'https://cdn2.vectorstock.com/i/1000x1000/11/81/young-student-profile-vector-13821181.jpg', 2),
(10, 'Amine', '2005-08-08', 'https://cdn5.vectorstock.com/i/1000x1000/52/54/male-student-graduation-avatar-profile-vector-12055254.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `user_id` int(11) NOT NULL,
  `pass_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`user_id`, `pass_hash`) VALUES
(1, '$2y$12$Ifyt4rkg4mOLs4XtozExwObyEviF2hBDfKQei70jqRgXplV/EC8ua'),
(2, '$2y$12$sq94G3zi3f/Yueyq/pBkFexFUQy50koIdRupKlJ/RLfS0tC3ABBHm');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `designation` varchar(5) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `designation`, `description`) VALUES
(1, 'GL', 'Génie Logiciel'),
(2, 'RT', 'Réseaux Informatique et Telecommunications '),
(3, 'IIA', 'Informatique Industrielle et Automatique'),
(4, 'IMI', 'Instrumentation et Maintenance Industrielle');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `email`, `role`) VALUES
(1, 'Ahmed', 'ahmed.loubiri@insat.ucar.tn', 'user'),
(2, 'Louay', 'louay.dardouri@insat.ucar.tn', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section` (`section`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_SectionEtudiant` FOREIGN KEY (`section`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `FK_Password_Utilisateur` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
