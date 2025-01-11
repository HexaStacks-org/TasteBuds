-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 03:21 PM
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
-- Database: `tastebuds`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `bookmarkID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `recipeID` int(11) DEFAULT NULL,
  `postID` int(11) DEFAULT NULL,
  `bookmarkedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foodsubcategories`
--

CREATE TABLE `foodsubcategories` (
  `subcategoryID` int(11) NOT NULL,
  `subcategoryName` varchar(100) DEFAULT NULL,
  `otherSubcategory` varchar(255) DEFAULT NULL,
  `primaryCategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleryposts`
--

CREATE TABLE `galleryposts` (
  `postID` int(11) NOT NULL,
  `caption` varchar(1000) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `isApproved` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp(),
  `primaryCategoryID` int(11) DEFAULT NULL,
  `subcategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `imageURL` varchar(255) DEFAULT NULL,
  `recipeID` int(11) DEFAULT NULL,
  `postID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `recipeID` int(11) DEFAULT NULL,
  `postID` int(11) DEFAULT NULL,
  `likedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `primaryfoodcategories`
--

CREATE TABLE `primaryfoodcategories` (
  `primaryCategoryID` int(11) NOT NULL,
  `primaryCategoryName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipeID` int(11) NOT NULL,
  `recipeTitle` varchar(150) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `ingredients` varchar(1000) DEFAULT NULL,
  `steps` varchar(1000) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `isApproved` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp(),
  `primaryCategoryID` int(11) DEFAULT NULL,
  `subcategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reportreasons`
--

CREATE TABLE `reportreasons` (
  `reasonID` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `recipeID` int(11) DEFAULT NULL,
  `postID` int(11) DEFAULT NULL,
  `reasonID` int(11) DEFAULT NULL,
  `otherReason` varchar(255) DEFAULT NULL,
  `reportedAt` datetime DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `registeredAt` datetime DEFAULT current_timestamp(),
  `isRestricted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`bookmarkID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `recipeID` (`recipeID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `foodsubcategories`
--
ALTER TABLE `foodsubcategories`
  ADD PRIMARY KEY (`subcategoryID`),
  ADD KEY `foodsubcategories_ibfk_1` (`primaryCategoryID`);

--
-- Indexes for table `galleryposts`
--
ALTER TABLE `galleryposts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `primaryCategoryID` (`primaryCategoryID`),
  ADD KEY `subcategoryID` (`subcategoryID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `images_ibfk_1` (`recipeID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `recipeID` (`recipeID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `primaryfoodcategories`
--
ALTER TABLE `primaryfoodcategories`
  ADD PRIMARY KEY (`primaryCategoryID`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipeID`),
  ADD KEY `recipes_ibfk_1` (`primaryCategoryID`),
  ADD KEY `subcategoryID` (`subcategoryID`);

--
-- Indexes for table `reportreasons`
--
ALTER TABLE `reportreasons`
  ADD PRIMARY KEY (`reasonID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `recipeID` (`recipeID`),
  ADD KEY `postID` (`postID`),
  ADD KEY `reasonID` (`reasonID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `bookmarkID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foodsubcategories`
--
ALTER TABLE `foodsubcategories`
  MODIFY `subcategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleryposts`
--
ALTER TABLE `galleryposts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `primaryfoodcategories`
--
ALTER TABLE `primaryfoodcategories`
  MODIFY `primaryCategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportreasons`
--
ALTER TABLE `reportreasons`
  MODIFY `reasonID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `bookmarks_ibfk_2` FOREIGN KEY (`recipeID`) REFERENCES `recipes` (`recipeID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `bookmarks_ibfk_3` FOREIGN KEY (`postID`) REFERENCES `galleryposts` (`postID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `foodsubcategories`
--
ALTER TABLE `foodsubcategories`
  ADD CONSTRAINT `foodsubcategories_ibfk_1` FOREIGN KEY (`primaryCategoryID`) REFERENCES `primaryfoodcategories` (`primaryCategoryID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `galleryposts`
--
ALTER TABLE `galleryposts`
  ADD CONSTRAINT `galleryposts_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `galleryposts_ibfk_2` FOREIGN KEY (`primaryCategoryID`) REFERENCES `primaryfoodcategories` (`primaryCategoryID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `galleryposts_ibfk_3` FOREIGN KEY (`subcategoryID`) REFERENCES `foodsubcategories` (`subcategoryID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`recipeID`) REFERENCES `recipes` (`recipeID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `images_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `galleryposts` (`postID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`recipeID`) REFERENCES `recipes` (`recipeID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`postID`) REFERENCES `galleryposts` (`postID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`primaryCategoryID`) REFERENCES `primaryfoodcategories` (`primaryCategoryID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`subcategoryID`) REFERENCES `foodsubcategories` (`subcategoryID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`recipeID`) REFERENCES `recipes` (`recipeID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `reports_ibfk_3` FOREIGN KEY (`postID`) REFERENCES `galleryposts` (`postID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `reports_ibfk_4` FOREIGN KEY (`reasonID`) REFERENCES `reportreasons` (`reasonID`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
