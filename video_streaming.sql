-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 12:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_streaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `VideoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `rating` int(30) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `VideoID`, `UserID`, `Comment`, `rating`, `Date`) VALUES
(1, 2, 2, 'Nice Movie.', 5, '2023-12-12 12:00:44'),
(2, 3, 4, 'Average movie.', 3, '2023-12-12 12:01:27'),
(3, 2, 4, 'Excellent', 5, '2023-12-12 12:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserType` enum('Creator','Consumer') NOT NULL,
  `RegistrationDate` datetime NOT NULL,
  `LastLogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`, `UserType`, `RegistrationDate`, `LastLogin`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$eXRiCAPZHBvfOEuwyfbpA.jwNv3aT6SHo7nIav.QxH4W6cJ7FKo3y', 'Consumer', '2023-11-28 00:20:13', NULL),
(3, 'salma', 'salmarinky2@gmail.com', '$2y$10$DOafrVCvgx8WA4xXoxpL4uGeiOelaBmlwG5UDUAXHF6EB9danyqJm', 'Creator', '2023-11-29 15:37:53', NULL),
(4, 'Asad', 'asad@gmail.com', '$2y$10$7jlP0BVgIHI.0oDiRS45pON/ZRH/RL1LoCnnjqkc..vvwI3To6rCG', 'Consumer', '2023-11-29 16:20:03', NULL),
(5, 'hafsa', 'hafsa@gmail.com', '52e189a0ce8993379504172c3854b949', 'Creator', '2023-11-29 17:33:53', NULL),
(6, 'Nadia', 'nadia@gmail.com', 'e89b626a614c79121a5fbdef26d43613', 'Creator', '2023-11-29 16:41:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videocontent`
--

CREATE TABLE `videocontent` (
  `VideoID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Producer` varchar(100) DEFAULT NULL,
  `Genre` varchar(50) DEFAULT NULL,
  `AgeRating` varchar(10) DEFAULT NULL,
  `Image` text NOT NULL,
  `Video` text NOT NULL,
  `UploadDate` date NOT NULL,
  `CreatorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videocontent`
--

INSERT INTO `videocontent` (`VideoID`, `Title`, `Publisher`, `Producer`, `Genre`, `AgeRating`, `Image`, `Video`, `UploadDate`, `CreatorID`) VALUES
(2, 'Jawan', 'Gauri Khan', 'Atlee Kumar', 'Action', 'G', '6-action-directors-1-film-shah-rukh-khans-jawan-unveiling-the-powerhouse-action-directors-of-jawan.jpg', 'test.mp4', '2023-12-06', 3),
(3, 'hhh', 'Gauri Khan', 'Vikram bhatt', 'Action', 'PG', 'download.jpg', 'test.mp4', '2023-12-29', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `VideoID` (`VideoID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `videocontent`
--
ALTER TABLE `videocontent`
  ADD PRIMARY KEY (`VideoID`),
  ADD KEY `CreatorID` (`CreatorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `videocontent`
--
ALTER TABLE `videocontent`
  MODIFY `VideoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`VideoID`) REFERENCES `videocontent` (`VideoID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `videocontent`
--
ALTER TABLE `videocontent`
  ADD CONSTRAINT `videocontent_ibfk_1` FOREIGN KEY (`CreatorID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
