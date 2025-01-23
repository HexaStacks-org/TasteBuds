-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 08:05 AM
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
  `bookmarkID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `recipeID` int(5) DEFAULT NULL,
  `postID` int(5) DEFAULT NULL,
  `bookmarkedAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`bookmarkID`, `userID`, `recipeID`, `postID`, `bookmarkedAt`) VALUES
(1, 19, 1, NULL, '2025-01-06 10:09:11'),
(2, 27, 1, NULL, '2025-01-06 15:15:07'),
(3, 14, 1, NULL, '2025-01-06 16:18:05'),
(4, 21, 3, NULL, '2025-01-07 09:38:05'),
(5, 37, 6, NULL, '2025-01-08 09:18:05'),
(6, 5, 6, NULL, '2025-01-08 10:18:05'),
(7, 33, 3, NULL, '2025-01-08 14:28:05'),
(8, 11, NULL, 2, '2025-01-08 16:18:05'),
(9, 6, NULL, 4, '2025-01-08 20:18:05'),
(10, 30, NULL, 1, '2025-01-09 08:28:05'),
(11, 18, NULL, 4, '2025-01-09 09:11:05'),
(12, 9, NULL, 4, '2025-01-09 10:21:05'),
(13, 36, NULL, 1, '2025-01-09 10:48:05'),
(14, 20, NULL, 4, '2025-01-09 11:28:15'),
(15, 28, NULL, 4, '2025-01-09 12:08:05'),
(16, 6, 9, NULL, '2025-01-09 13:11:05'),
(17, 27, 8, NULL, '2025-01-09 14:28:15'),
(18, 14, 12, NULL, '2025-01-09 15:12:05'),
(19, 30, 9, NULL, '2025-01-09 15:51:05'),
(20, 36, 14, NULL, '2025-01-09 16:08:05'),
(21, 22, 9, NULL, '2025-01-09 19:34:05'),
(22, 18, NULL, 11, '2025-01-09 20:18:05'),
(23, 19, NULL, 9, '2025-01-10 07:18:05'),
(24, 7, NULL, 9, '2025-01-10 08:33:05'),
(25, 14, NULL, 13, '2025-01-10 09:37:05'),
(26, 27, NULL, 9, '2025-01-10 10:12:01'),
(27, 14, NULL, 9, '2025-01-10 11:21:51'),
(28, 6, 18, NULL, '2025-01-10 14:18:05'),
(29, 33, 15, NULL, '2025-01-10 16:22:05'),
(30, 5, 15, NULL, '2025-01-10 16:46:02'),
(31, 18, 18, NULL, '2025-01-10 17:08:05'),
(32, 20, 16, NULL, '2025-01-10 17:23:01'),
(33, 11, 15, NULL, '2025-01-10 18:28:05'),
(34, 6, 16, NULL, '2025-01-10 20:11:05'),
(35, 21, NULL, 15, '2025-01-11 09:18:05'),
(36, 14, NULL, 15, '2025-01-11 10:43:05'),
(37, 11, NULL, 15, '2025-01-11 11:08:05'),
(38, 28, NULL, 7, '2025-01-11 11:32:05'),
(39, 36, NULL, 15, '2025-01-11 13:28:05'),
(40, 3, NULL, 5, '2025-01-11 16:18:05'),
(41, 30, NULL, 15, '2025-01-11 21:43:05'),
(42, 21, NULL, 7, '2025-01-12 09:11:05'),
(43, 3, NULL, 15, '2025-01-12 10:18:05'),
(44, 3, 21, NULL, '2025-01-12 15:18:05'),
(45, 27, 21, NULL, '2025-01-12 17:13:05'),
(46, 7, 22, NULL, '2025-01-12 21:11:05'),
(47, 10, 21, NULL, '2025-01-13 08:12:15'),
(48, 1, 21, NULL, '2025-01-13 10:14:15'),
(49, 14, 5, NULL, '2025-01-13 11:26:05'),
(50, 11, NULL, 23, '2025-01-13 19:18:05'),
(51, 3, NULL, 23, '2025-01-14 10:18:05'),
(52, 6, NULL, 22, '2025-01-14 16:18:05'),
(53, 27, NULL, 23, '2025-01-14 18:32:05'),
(54, 10, NULL, 23, '2025-01-14 19:22:05'),
(55, 36, NULL, 22, '2025-01-14 20:45:05'),
(56, 18, 25, NULL, '2025-01-14 20:56:08'),
(57, 3, 24, NULL, '2025-01-15 07:21:05'),
(58, 33, 25, NULL, '2025-01-15 08:18:05'),
(59, 27, NULL, 27, '2025-01-15 10:33:05'),
(60, 10, NULL, 27, '2025-01-15 10:47:05'),
(61, 11, NULL, 27, '2025-01-15 11:19:05'),
(62, 30, NULL, 27, '2025-01-15 13:18:05'),
(63, 27, 3, NULL, '2025-01-15 14:31:05'),
(64, 10, 3, NULL, '2025-01-15 16:18:05'),
(65, 28, 27, NULL, '2025-01-15 18:33:05'),
(66, 24, 27, NULL, '2025-01-15 22:18:44'),
(67, 21, 32, NULL, '2025-01-16 08:17:32'),
(68, 14, 33, NULL, '2025-01-16 09:17:06'),
(69, 9, NULL, 30, '2025-01-16 10:18:02'),
(70, 5, NULL, 34, '2025-01-16 11:18:32'),
(71, 37, NULL, 30, '2025-01-16 12:18:42'),
(72, 21, NULL, 31, '2025-01-16 12:48:21'),
(73, 5, NULL, 23, '2025-01-16 15:18:05'),
(74, 6, NULL, 25, '2025-01-16 16:33:42'),
(75, 7, NULL, 30, '2025-01-16 17:28:21'),
(76, 11, 3, NULL, '2025-01-16 18:23:34'),
(77, 30, 3, NULL, '2025-01-16 18:52:05'),
(78, 5, NULL, 34, '2025-01-16 19:21:12'),
(79, 21, NULL, 31, '2025-01-16 20:18:23'),
(80, 7, NULL, 28, '2025-01-16 20:36:21'),
(81, 6, 30, NULL, '2025-01-16 20:52:11'),
(82, 18, 36, NULL, '2025-01-16 21:08:21'),
(83, 3, 30, NULL, '2025-01-16 21:24:13'),
(84, 37, NULL, 35, '2025-01-16 21:37:05'),
(85, 22, NULL, 35, '2025-01-16 21:54:01'),
(86, 33, NULL, 25, '2025-01-16 21:55:13'),
(87, 21, NULL, 35, '2025-01-17 09:18:05'),
(88, 18, NULL, 25, '2025-01-17 09:58:05'),
(89, 9, 41, NULL, '2025-01-17 10:10:21'),
(90, 14, 27, NULL, '2025-01-17 10:32:05'),
(91, 10, 27, NULL, '2025-01-17 10:48:15'),
(92, 37, 41, NULL, '2025-01-17 11:08:25'),
(93, 36, 27, NULL, '2025-01-17 11:43:01'),
(94, 7, 41, NULL, '2025-01-17 11:55:05'),
(95, 14, NULL, 36, '2025-01-17 12:09:21'),
(96, 33, NULL, 27, '2025-01-17 12:16:05'),
(97, 36, NULL, 37, '2025-01-17 12:35:12'),
(98, 19, NULL, 37, '2025-01-17 12:48:05'),
(99, 21, NULL, 27, '2025-01-17 13:21:05'),
(100, 5, 21, NULL, '2025-01-17 13:48:05'),
(101, 6, NULL, 28, '2025-01-17 15:18:05'),
(102, 14, NULL, 39, '2025-01-17 18:18:05'),
(103, 37, NULL, 40, '2025-01-17 19:18:32'),
(104, 30, NULL, 39, '2025-01-17 20:18:33'),
(105, 36, NULL, 39, '2025-01-18 08:18:05'),
(106, 19, 43, NULL, '2025-01-18 09:22:11'),
(107, 20, 39, NULL, '2025-01-18 09:48:02'),
(108, 27, NULL, 42, '2025-01-18 10:08:25'),
(109, 3, NULL, 45, '2025-01-18 10:33:05'),
(110, 19, NULL, 40, '2025-01-18 10:56:34'),
(111, 11, 27, NULL, '2025-01-18 11:12:05'),
(112, 14, 46, NULL, '2025-01-18 11:28:05'),
(113, 5, 45, NULL, '2025-01-18 11:58:23'),
(114, 30, 27, NULL, '2025-01-18 12:18:05'),
(115, 28, NULL, 42, '2025-01-18 13:18:23'),
(116, 9, NULL, 42, '2025-01-18 14:28:23'),
(117, 19, NULL, 28, '2025-01-18 15:38:05'),
(118, 37, NULL, 42, '2025-01-18 16:10:43'),
(119, 28, NULL, 42, '2025-01-18 16:28:05'),
(120, 20, NULL, 28, '2025-01-18 17:07:22'),
(121, 19, 46, NULL, '2025-01-18 17:36:23'),
(122, 14, 38, NULL, '2025-01-18 18:18:22'),
(123, 30, 38, NULL, '2025-01-18 18:45:21'),
(124, 27, NULL, 50, '2025-01-18 19:26:05'),
(125, 11, NULL, 50, '2025-01-18 19:48:16'),
(126, 5, NULL, 54, '2025-01-18 20:10:05'),
(127, 3, 27, NULL, '2025-01-18 20:21:23'),
(128, 36, 38, NULL, '2025-01-18 20:48:20'),
(129, 18, NULL, 45, '2025-01-18 22:18:05'),
(130, 11, NULL, 53, '2025-01-19 09:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `foodsubcategories`
--

CREATE TABLE `foodsubcategories` (
  `subcategoryID` int(1) NOT NULL,
  `subcategoryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodsubcategories`
--

INSERT INTO `foodsubcategories` (`subcategoryID`, `subcategoryName`) VALUES
(1, 'Vegan'),
(2, 'Pork'),
(3, 'Chicken'),
(4, 'Beef'),
(5, 'Seafood'),
(6, 'Others'),
(7, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `galleryposts`
--

CREATE TABLE `galleryposts` (
  `postID` int(5) NOT NULL,
  `caption` varchar(1000) NOT NULL,
  `userID` int(5) NOT NULL,
  `isApproved` varchar(3) NOT NULL DEFAULT 'no',
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp(),
  `primaryCategoryID` int(1) NOT NULL,
  `subcategoryID` int(1) NOT NULL DEFAULT 7
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galleryposts`
--

INSERT INTO `galleryposts` (`postID`, `caption`, `userID`, `isApproved`, `createdAt`, `updatedAt`, `primaryCategoryID`, `subcategoryID`) VALUES
(1, 'Pork sinigang with lots of pork and vegetables.', 9, 'yes', '2025-01-03 10:15:24', NULL, 1, 2),
(2, 'Rich, and savory calderetang manok', 2, 'yes', '2025-01-03 14:15:24', NULL, 2, 3),
(3, 'Beef tapa, tender, flavorful, and perfectly seasoned for a hearty meal!', 5, 'yes', '2025-01-03 18:15:24', NULL, 1, 4),
(4, 'Sinigang na Hipon, the OG', 29, 'yes', '2025-01-06 10:15:24', NULL, 3, 5),
(5, 'Savory and sweet pie', 28, 'yes', '2025-01-06 14:15:24', NULL, 5, 7),
(6, 'Fresh and healty salad.', 8, 'yes', '2025-01-06 18:00:59', NULL, 1, 1),
(7, 'Spicy and savory chicken bicol express cook in coconut milk.', 12, 'yes', '2025-01-07 07:10:59', NULL, 2, 3),
(8, 'This is it, PANSIT', 18, 'yes', '2025-01-07 10:20:59', NULL, 2, 6),
(9, 'Bet na bet, Pinakbet', 1, 'yes', '2025-01-07 13:00:59', NULL, 3, 1),
(10, 'Chicken adobo, my all time Favorite! And easy to cook', 21, 'yes', '2025-01-07 14:20:59', NULL, 1, 3),
(11, 'A sweet, aromatic, and flavorful pork steak', 1, 'yes', '2025-01-07 18:18:02', NULL, 2, 2),
(12, 'Healthy combination of beef and vegetable.', 12, 'yes', '2025-01-08 08:18:02', NULL, 2, 4),
(13, 'A little treat for myself!', 2, 'yes', '2025-01-08 09:28:02', NULL, 5, 7),
(14, 'P-pop pop POPCORN', 15, 'yes', '2025-01-08 10:08:02', NULL, 4, 7),
(15, 'Crunchy ukoy da bestttt', 37, 'yes', '2025-01-08 13:18:02', NULL, 1, 5),
(16, 'Beef afritada, a meaty and flavorful dish.', 40, 'yes', '2025-01-08 17:23:39', NULL, 2, 4),
(17, 'Pork Chop Steak while I’m on a Break', 18, 'no', '2025-01-08 19:23:39', NULL, 3, 2),
(18, 'FRIES. That’s it.', 33, 'yes', '2025-01-09 08:13:39', NULL, 4, 7),
(19, 'Pinaka-bet na Pinakbet!', 24, 'yes', '2025-01-09 11:23:39', NULL, 1, 6),
(20, 'Chicken alaking, creamy and has overloading goodness.', 9, 'yes', '2025-01-09 11:54:39', NULL, 2, 3),
(21, 'Embutido hanggang dulo', 17, 'yes', '2025-01-09 13:35:00', NULL, 3, 2),
(22, 'Healthy food and also good for the diet.', 1, 'yes', '2025-01-09 14:15:00', NULL, 2, 1),
(23, 'Level up the taste and healthiness with adobong kangkong', 8, 'yes', '2025-01-09 15:33:10', NULL, 1, 1),
(24, 'Crunch in every bite', 24, 'yes', '2025-01-10 08:35:00', NULL, 4, 7),
(25, 'Must tryyy, sinigang na salmon!!', 22, 'yes', '2025-01-10 09:28:00', NULL, 2, 5),
(26, 'Bibingka my fave!!', 34, 'yes', '2025-01-10 12:45:27', NULL, 5, 7),
(27, 'Healthy breakfast y’all.', 1, 'yes', '2025-01-10 16:45:27', NULL, 1, 1),
(28, 'Mix vegetable called bulanglang', 8, 'yes', '2025-01-10 17:15:27', NULL, 2, 1),
(29, 'BROOOccolli', 34, 'yes', '2025-01-11 10:45:27', NULL, 3, 4),
(30, 'Mix and savory veggies with coconut milk.', 8, 'yes', '2025-01-11 14:45:27', NULL, 1, 1),
(31, 'Almond is da golddd', 12, 'yes', '2025-01-11 16:36:29', NULL, 4, 7),
(32, 'Sarap ay sobra sa torta hehe', 21, 'yes', '2025-01-12 13:26:29', NULL, 3, 6),
(33, 'Heavy and sweet food, kakanin!!', 22, 'yes', '2025-01-12 14:35:29', NULL, 5, 7),
(34, 'Spice up your meal with chicken curry.', 18, 'yes', '2025-01-12 16:16:29', NULL, 2, 3),
(35, 'Pork Longganisa, retired longganisa seller here', 7, 'yes', '2025-01-12 20:29:25', NULL, 3, 2),
(36, 'Chicken Inasal ang sagot sa dasal', 1, 'yes', '2025-01-13 08:01:21', NULL, 3, 3),
(37, 'Sizzling Sisig Gambas', 5, 'yes', '2025-01-13 10:01:21', NULL, 2, 5),
(38, 'Fried chicken, also one of my all time favorites and cravings', 1, 'yes', '2025-01-13 11:41:21', NULL, 1, 3),
(39, 'Lumpia Supremacy', 7, 'yes', '2025-01-13 12:11:21', NULL, 2, 2),
(40, 'Leche leche sa leche flan', 33, 'yes', '2025-01-13 14:10:21', NULL, 5, 7),
(41, 'Creamy chicken alfredo.', 1, 'yes', '2025-01-13 15:06:14', NULL, 2, 3),
(42, 'An apple a day keeps the doctors away', 5, 'yes', '2025-01-13 16:06:14', NULL, 4, 7),
(43, 'Tokneneng kayo dyan!', 28, 'yes', '2025-01-13 17:26:14', NULL, 3, 6),
(44, 'Vegan karekare, mix vegetable in peanutty sauce. ', 25, 'yes', '2025-01-13 18:06:14', NULL, 2, 1),
(45, 'Buko pandan para sa mga patuloy lumalaban', 40, 'yes', '2025-01-14 08:06:14', NULL, 5, 7),
(46, 'Tokwa’t baboy', 33, 'yes', '2025-01-13 09:12:15', NULL, 3, 2),
(47, 'Saging para sa taong kulang sa lambing', 37, 'yes', '2025-01-14 10:42:15', NULL, 4, 7),
(48, 'Pork sisig cravings satisfied', 37, 'yes', '2025-01-14 11:12:15', NULL, 2, 2),
(49, 'Chicken Adobo ON TOP', 29, 'yes', '2025-01-14 12:12:15', NULL, 3, 3),
(50, 'Turon na matamis pero ikaw pa rin na mimiss', 21, 'yes', '2025-01-14 12:52:15', NULL, 5, 7),
(51, 'Beef Burger Steak, pa-apuyin mo na ating streak', 7, 'yes', '2025-01-14 13:47:23', NULL, 3, 4),
(52, 'Smokey and juicy barbeque', 15, 'yes', '2025-01-14 17:11:23', NULL, 2, 2),
(53, 'Matamis na saging, bumalik ka na sa akin', 5, 'yes', '2025-01-14 17:47:23', NULL, 5, 7),
(54, 'Pininyahang manok, sa puso mo ay kumakatok', 4, 'yes', '2025-01-14 19:27:23', NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageID` int(5) NOT NULL,
  `imageURL` varchar(500) NOT NULL,
  `recipeID` int(5) DEFAULT NULL,
  `postID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageID`, `imageURL`, `recipeID`, `postID`) VALUES
(1, 'img-rc1.png', 1, NULL),
(2, 'img-rc2.png', 2, NULL),
(3, 'img-rc3.png', 3, NULL),
(4, 'img-rc4.png', 4, NULL),
(5, 'img-rc5.png', 5, NULL),
(6, 'img-rc6.png', 6, NULL),
(7, 'img-gp1.png', NULL, 1),
(8, 'img-gp2.png', NULL, 1),
(9, 'img-gp3.png', NULL, 2),
(10, 'img-rc7.png', 7, NULL),
(11, 'img-gp4.png', NULL, 3),
(12, 'img-gp5.png', NULL, 3),
(13, 'img-gp6.png', NULL, 3),
(14, 'img-rc8.png', 8, NULL),
(15, 'img-rc9.png', 9, NULL),
(16, 'img-gp7.png', NULL, 4),
(17, 'img-gp8.png', NULL, 4),
(18, 'img-rc10.png', 10, NULL),
(19, 'img-gp9.png', NULL, 5),
(20, 'img-gp10.png', NULL, 5),
(21, 'img-rc11.png', 11, NULL),
(22, 'img-gp11.png', NULL, 6),
(23, 'img-gp12.png', NULL, 6),
(24, 'img-gp13.png', NULL, 7),
(25, 'img-gp14.png', NULL, 8),
(26, 'img-rc12.png', 12, NULL),
(27, 'img-gp15.png', NULL, 9),
(28, 'img-gp16.png', NULL, 9),
(29, 'img-gp17.png', NULL, 9),
(30, 'img-gp18.png', NULL, 10),
(31, 'img-rc13.png', 13, NULL),
(32, 'img-rc14.png', 14, NULL),
(33, 'img-gp19.png', NULL, 11),
(34, 'img-gp20.png', NULL, 11),
(35, 'img-rc15.png', 15, NULL),
(36, 'img-gp21.png', NULL, 12),
(37, 'img-gp22.png', NULL, 13),
(38, 'img-gp23.png', NULL, 14),
(39, 'img-gp24.png', NULL, 14),
(40, 'img-rc16.png', 16, NULL),
(41, 'img-gp25.png', NULL, 15),
(42, 'img-rc17.png', 17, NULL),
(43, 'img-rc18.png', 18, NULL),
(44, 'img-rc19.png', 19, NULL),
(45, 'img-gp26.png', NULL, 16),
(46, 'img-gp27.png', NULL, 16),
(47, 'img-gp28.png', NULL, 17),
(48, 'img-gp29.png', NULL, 17),
(49, 'img-rc20.png', 20, NULL),
(50, 'img-gp30.png', NULL, 18),
(51, 'img-rc21.png', 21, NULL),
(52, 'img-rc22.png', 22, NULL),
(53, 'img-rc23.png', 23, NULL),
(54, 'img-gp31.png', NULL, 19),
(55, 'img-gp32.png', NULL, 20),
(56, 'img-gp33.png', NULL, 20),
(57, 'img-rc24.png', 24, NULL),
(58, 'img-gp34.png', NULL, 21),
(59, 'img-gp35.png', NULL, 21),
(60, 'img-gp36.png', NULL, 21),
(61, 'img-gp37.png', NULL, 22),
(62, 'img-gp38.png', NULL, 23),
(63, 'img-gp39.png', NULL, 23),
(64, 'img-rc25.png', 25, NULL),
(65, 'img-rc26.png', 26, NULL),
(66, 'img-gp40.png', NULL, 24),
(67, 'img-gp41.png', NULL, 25),
(68, 'img-rc27.png', 27, NULL),
(69, 'img-gp42.png', NULL, 26),
(70, 'img-rc28.png', 28, NULL),
(71, 'img-gp43.png', NULL, 27),
(72, 'img-gp44.png', NULL, 28),
(73, 'img-rc29.png', 29, NULL),
(74, 'img-rc30.png', 30, NULL),
(75, 'img-gp45.png', NULL, 29),
(76, 'img-gp46.png', NULL, 29),
(77, 'img-rc31.png', 31, NULL),
(78, 'img-gp47.png', NULL, 30),
(79, 'img-gp48.png', NULL, 31),
(80, 'img-rc32.png', 32, NULL),
(81, 'img-rc33.png', 33, NULL),
(82, 'img-rc34.png', 34, NULL),
(83, 'img-rc35.png', 35, NULL),
(84, 'img-gp49.png', NULL, 32),
(85, 'img-gp50.png', NULL, 32),
(86, 'img-gp51.png', NULL, 33),
(87, 'img-gp52.png', NULL, 33),
(88, 'img-gp53.png', NULL, 34),
(89, 'img-rc36.png', 36, NULL),
(90, 'img-rc37.png', 37, NULL),
(91, 'img-gp54.png', NULL, 35),
(92, 'img-gp55.png', NULL, 36),
(93, 'img-rc38.png', 38, NULL),
(94, 'img-gp56.png', NULL, 37),
(95, 'img-gp57.png', NULL, 38),
(96, 'img-gp58.png', NULL, 39),
(97, 'img-rc39.png', 39, NULL),
(98, 'img-rc40.png', 40, NULL),
(99, 'img-gp59.png', NULL, 40),
(100, 'img-rc41.png', 41, NULL),
(101, 'img-gp60.png', NULL, 41),
(102, 'img-gp61.png', NULL, 41),
(103, 'img-rc42.png', 42, NULL),
(104, 'img-gp62.png', NULL, 42),
(105, 'img-rc43.png', 43, NULL),
(106, 'img-gp63.png', NULL, 43),
(107, 'img-gp64.png', NULL, 43),
(108, 'img-gp65.png', NULL, 44),
(109, 'img-gp66.png', NULL, 44),
(110, 'img-rc44.png', 44, NULL),
(111, 'img-rc45.png', 45, NULL),
(112, 'img-rc46.png', 46, NULL),
(113, 'img-gp67.png', NULL, 45),
(114, 'img-gp68.png', NULL, 46),
(115, 'img-rc47.png', 47, NULL),
(116, 'img-rc48.png', 48, NULL),
(117, 'img-gp69.png', NULL, 47),
(118, 'img-gp70.png', NULL, 48),
(119, 'img-rc49.png', 49, NULL),
(120, 'img-gp71.png', NULL, 49),
(121, 'img-gp72.png', NULL, 50),
(122, 'img-rc50.png', 50, NULL),
(123, 'img-gp73.png', NULL, 51),
(124, 'img-rc51.png', 51, NULL),
(125, 'img-rc52.png', 52, NULL),
(126, 'img-gp74.png', NULL, 52),
(127, 'img-gp75.png', NULL, 53),
(128, 'img-rc53.png', 53, NULL),
(129, 'img-gp76.png', NULL, 54),
(130, 'img-rc54.png', 54, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `recipeID` int(5) DEFAULT NULL,
  `postID` int(5) DEFAULT NULL,
  `likedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likeID`, `userID`, `recipeID`, `postID`, `likedAt`) VALUES
(1, 19, 1, NULL, '2025-01-05 08:25:38'),
(2, 27, 1, NULL, '2025-01-06 10:30:43'),
(3, 5, 1, NULL, '2025-01-07 11:15:30'),
(4, 36, 2, NULL, '2025-01-08 10:12:16'),
(5, 27, 3, NULL, '2025-01-08 10:30:26'),
(6, 6, 2, NULL, '2025-01-08 10:31:20'),
(7, 14, 5, NULL, '2025-01-08 10:40:25'),
(8, 27, 5, NULL, '2025-01-08 10:45:08'),
(9, 5, 5, NULL, '2025-01-08 10:50:45'),
(10, 6, 1, NULL, '2025-01-08 10:55:50'),
(11, 14, 1, NULL, '2025-01-08 11:10:20'),
(12, 7, 1, NULL, '2025-01-08 11:12:30'),
(13, 10, 2, NULL, '2025-01-08 11:21:20'),
(14, 24, 2, NULL, '2025-01-08 11:25:04'),
(15, 31, 2, NULL, '2025-01-08 11:26:30'),
(16, 30, NULL, 1, '2025-01-08 11:28:20'),
(17, 36, NULL, 1, '2025-01-08 11:30:05'),
(18, 11, NULL, 2, '2025-01-08 11:31:55'),
(19, 3, 7, NULL, '2025-01-08 11:35:14'),
(20, 27, 7, NULL, '2025-01-08 11:36:20'),
(21, 24, 7, NULL, '2025-01-08 11:40:11'),
(22, 27, 8, NULL, '2025-01-08 11:55:55'),
(23, 7, 7, NULL, '2025-01-08 12:00:00'),
(24, 18, NULL, 4, '2025-01-08 12:05:22'),
(25, 28, NULL, 4, '2025-01-08 12:10:30'),
(26, 11, NULL, 5, '2025-01-08 12:12:35'),
(27, 10, 11, NULL, '2025-01-08 12:20:55'),
(28, 11, 7, NULL, '2025-01-08 12:23:33'),
(29, 18, 5, NULL, '2025-01-08 13:40:23'),
(30, 28, 5, NULL, '2025-01-08 15:12:40'),
(31, 28, NULL, 7, '2025-01-08 17:30:14'),
(32, 21, NULL, 7, '2025-01-08 18:25:03'),
(33, 6, NULL, 9, '2025-01-08 23:55:00'),
(34, 14, NULL, 9, '2025-01-09 09:10:54'),
(35, 27, NULL, 9, '2025-01-09 09:25:23'),
(36, 5, NULL, 9, '2025-01-09 09:27:30'),
(37, 11, 3, NULL, '2025-01-09 10:35:32'),
(38, 30, 3, NULL, '2025-01-09 10:39:02'),
(39, 20, 11, NULL, '2025-01-09 10:45:55'),
(40, 3, 11, NULL, '2025-01-09 10:59:25'),
(41, 33, 12, NULL, '2025-01-09 11:25:10'),
(42, 22, 12, NULL, '2025-01-09 11:28:45'),
(43, 7, NULL, 10, '2025-01-09 11:35:13'),
(44, 18, NULL, 10, '2025-01-09 11:50:01'),
(45, 20, NULL, 10, '2025-01-09 12:31:54'),
(46, 11, NULL, 2, '2025-01-09 12:40:17'),
(47, 9, NULL, 4, '2025-01-09 12:45:26'),
(48, 33, 3, NULL, '2025-01-09 12:50:00'),
(49, 11, 15, NULL, '2025-01-09 13:15:38'),
(50, 20, 15, NULL, '2025-01-09 13:25:30'),
(51, 6, 16, NULL, '2025-01-09 13:58:12'),
(52, 21, 17, NULL, '2025-01-09 16:09:41'),
(53, 18, 18, NULL, '2025-01-09 16:30:59'),
(54, 6, 18, NULL, '2025-01-09 23:45:26'),
(55, 6, NULL, 11, '2025-01-10 12:30:00'),
(56, 37, NULL, 12, '2025-01-10 13:25:45'),
(57, 7, NULL, 12, '2025-01-10 13:30:56'),
(58, 11, NULL, 2, '2025-01-10 15:45:23'),
(59, 30, NULL, 5, '2025-01-10 18:20:59'),
(60, 3, NULL, 5, '2025-01-10 23:48:32'),
(61, 3, 21, NULL, '2025-01-11 13:36:02'),
(62, 27, 21, NULL, '2025-01-11 14:14:49'),
(63, 36, 21, NULL, '2025-01-11 19:56:30'),
(64, 10, 21, NULL, '2025-01-11 23:59:59'),
(65, 11, 21, NULL, '2025-01-12 08:15:31'),
(66, 14, NULL, 15, '2025-01-12 10:25:09'),
(67, 36, NULL, 15, '2025-01-12 10:49:26'),
(68, 10, NULL, 15, '2025-01-12 13:23:35'),
(69, 9, NULL, 14, '2025-01-12 15:20:45'),
(70, 7, NULL, 9, '2025-01-12 19:52:23'),
(71, 20, NULL, 10, '2025-01-12 22:19:03'),
(72, 24, NULL, 10, '2025-01-13 09:34:55'),
(73, 19, NULL, 9, '2025-01-13 09:55:34'),
(74, 11, 24, NULL, '2025-01-13 11:16:24'),
(75, 30, 24, NULL, '2025-01-13 11:28:32'),
(76, 3, 24, NULL, '2025-01-13 11:35:45'),
(77, 33, 25, NULL, '2025-01-13 11:40:23'),
(78, 18, 25, NULL, '2025-01-13 12:34:45'),
(79, 21, NULL, 16, '2025-01-13 12:40:20'),
(80, 28, NULL, 17, '2025-01-13 13:55:12'),
(81, 21, NULL, 17, '2025-01-13 13:59:22'),
(82, 6, NULL, 11, '2025-01-13 15:23:40'),
(83, 20, NULL, 10, '2025-01-13 15:46:23'),
(84, 24, NULL, 10, '2025-01-13 16:12:22'),
(85, 14, 27, NULL, '2025-01-13 16:35:46'),
(86, 36, 27, NULL, '2025-01-13 17:20:14'),
(87, 10, 27, NULL, '2025-01-13 17:26:16'),
(88, 11, 27, NULL, '2025-01-13 17:30:19'),
(89, 30, 27, NULL, '2025-01-13 17:46:20'),
(90, 3, 27, NULL, '2025-01-13 17:50:06'),
(91, 18, 16, NULL, '2025-01-13 19:10:36'),
(92, 28, 16, NULL, '2025-01-13 19:29:34'),
(93, 9, 16, NULL, '2025-01-13 19:45:00'),
(94, 11, NULL, 15, '2025-01-13 19:58:12'),
(95, 30, NULL, 15, '2025-01-13 22:16:30'),
(96, 3, NULL, 15, '2025-01-13 22:49:14'),
(97, 10, NULL, 18, '2025-01-14 10:23:08'),
(98, 14, NULL, 18, '2025-01-14 11:03:45'),
(99, 33, NULL, 19, '2025-01-14 11:26:30'),
(100, 18, NULL, 19, '2025-01-14 11:48:46'),
(101, 33, 21, NULL, '2025-01-14 13:20:49'),
(102, 5, 21, NULL, '2025-01-14 13:43:56'),
(103, 3, 30, NULL, '2025-01-14 16:21:24'),
(104, 6, 30, NULL, '2025-01-14 16:45:00'),
(105, 20, 32, NULL, '2025-01-14 17:31:40'),
(106, 6, 32, NULL, '2025-01-14 17:40:32'),
(107, 19, NULL, 21, '2025-01-14 17:45:11'),
(108, 6, NULL, 22, '2025-01-14 19:14:20'),
(109, 27, NULL, 20, '2025-01-14 19:35:10'),
(110, 36, NULL, 22, '2025-01-14 19:55:16'),
(111, 3, NULL, 23, '2025-01-14 21:41:07'),
(112, 27, NULL, 23, '2025-01-15 14:20:46'),
(113, 36, NULL, 23, '2025-01-15 15:29:26'),
(114, 10, NULL, 23, '2025-01-15 15:35:06'),
(115, 11, NULL, 23, '2025-01-15 15:46:14'),
(116, 10, 34, NULL, '2025-01-15 16:30:33'),
(117, 18, 36, NULL, '2025-01-15 16:31:10'),
(118, 30, 38, NULL, '2025-01-15 16:34:32'),
(119, 14, 38, NULL, '2025-01-15 17:23:47'),
(120, 36, 38, NULL, '2025-01-15 17:29:56'),
(121, 6, NULL, 25, '2025-01-15 17:34:00'),
(122, 27, NULL, 27, '2025-01-15 19:00:00'),
(123, 10, NULL, 27, '2025-01-15 19:23:00'),
(124, 11, NULL, 27, '2025-01-15 19:45:30'),
(125, 24, NULL, 27, '2025-01-15 20:12:21'),
(126, 21, NULL, 27, '2025-01-15 22:14:14'),
(127, 7, NULL, 30, '2025-01-15 22:49:59'),
(128, 37, NULL, 30, '2025-01-16 10:08:02'),
(129, 9, NULL, 30, '2025-01-16 10:23:24'),
(130, 33, NULL, 27, '2025-01-16 10:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `primaryfoodcategories`
--

CREATE TABLE `primaryfoodcategories` (
  `primaryCategoryID` int(1) NOT NULL,
  `primaryCategoryName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `primaryfoodcategories`
--

INSERT INTO `primaryfoodcategories` (`primaryCategoryID`, `primaryCategoryName`) VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Snack'),
(5, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `reasons`
--

CREATE TABLE `reasons` (
  `reasonID` int(1) NOT NULL,
  `reason` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reasons`
--

INSERT INTO `reasons` (`reasonID`, `reason`) VALUES
(1, 'Spam'),
(2, 'Wrong Information'),
(3, 'Inappropriate Content'),
(4, 'Copyright Infringement'),
(5, 'Harassment or Abuse'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipeID` int(5) NOT NULL,
  `recipeTitle` varchar(100) NOT NULL,
  `description` varchar(600) NOT NULL,
  `ingredients` varchar(800) NOT NULL,
  `steps` varchar(5000) NOT NULL,
  `userID` int(5) NOT NULL,
  `isApproved` varchar(3) NOT NULL DEFAULT 'no',
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp(),
  `primaryCategoryID` int(1) NOT NULL,
  `subcategoryID` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipeID`, `recipeTitle`, `description`, `ingredients`, `steps`, `userID`, `isApproved`, `createdAt`, `updatedAt`, `primaryCategoryID`, `subcategoryID`) VALUES
(1, 'Ensaladang talong', 'Eggplant salad made with grilled eggplant, fresh tomatoes, onions, and a tangy dressing of vinegar, fish sauce, and salt. It\'s a refreshing side dish perfect for pairing with grilled meats.', '2 medium eggplants\r\n1 medium onion, thinly sliced\r\n1 medium tomato, chopped\r\n2 tbsp vinegar\r\n1 tbsp fish sauce\r\nSalt and pepper to taste\r\n', '1. Grill the eggplants until the skin is charred and the inside is tender. Let them cool.\r\n2. Peel the skin off the eggplants and chop the flesh into small pieces.\r\n3. In a mixing bowl, combine the eggplant, onion, and tomato.\r\n4. Drizzle with vinegar and fish sauce, and season with salt and pepper.\r\n5. Toss everything together and serve chilled.\r\n', 1, 'yes', '2024-12-30 10:20:34', NULL, 1, 1),
(2, 'Ginataang tulingan', 'This comforting dish strikes a perfect balance between savory and creamy, making it a must-try for those seeking authentic Filipino flavors.', '1 kg tulingan\r\n1 onion (chopped)\r\n3 cloves garlic (minced)\r\n2 medium tomatoes (chopped)\r\n1 can coconut milk\r\n1 thumb-sized ginger (sliced)\r\n1 long green chili (optional)\r\n1 cup water\r\nSalt and pepper to taste\r\n', '1. Thoroughly clean the fish under running water. Make a slit on both sides of each fish and generously rub salt over them. Let the fish sit for 10 to 15 minutes to absorb the salt.  \r\n2. In a cooking pot, layer the pork fat, kamias, fish, and ginger. Pour water into the pot, ensuring the ingredients are submerged. Cover the pot and bring it to a boil. Lower the heat to medium and cook for 40 minutes.  \r\n3. Add coconut milk to the pot, along with garlic, onion, and chili. Cover and continue to cook on low to medium heat for another 40 minutes, allowing the flavors to meld together.  \r\n4. Add the eggplant slices to the pot and cook for an additional 5 to 7 minutes, or until the eggplant becomes tender. Season the dish with patis and ground black pepper to taste.  \r\n5. Carefully transfer the cooked dish to a serving plate.  \r\n6. Serve warm and enjoy the hearty flavors of this traditional dish!\r\n', 1, 'yes', '2024-12-30 12:20:34', NULL, 2, 5),
(3, 'Pizza\r\n\r\n', 'Pizza is a dough base topped with tomato sauce, cheese, and various toppings, baked to perfection.', 'Pizza dough\r\nTomato sauce\r\nMozzarella cheese\r\nPepperoni, vegetables, or other toppings of choice\r\nOlive oil\r\nSalt and pepper\r\n\r\n', '1. Preheat the oven to 475°F (245°C).\r\n2. Roll out the pizza dough on a floured surface.\r\n3. Spread tomato sauce over the dough, then sprinkle with mozzarella cheese.\r\n4. Add your choice of toppings.\r\n5. Bake for 10–15 minutes or until the crust is golden and the cheese is melted.\r\n\r\n', 1, 'yes', '2024-12-30 14:30:04', NULL, 4, 7),
(4, 'Creamy mushroom chicken', 'Tender chicken simmered in a rich, creamy mushroom sauce, perfect for any occasion.', '4 chicken thighs or breasts\r\n2 cups mushrooms (sliced)\r\n1 cup heavy cream or all-purpose cream\r\n1/2 cup chicken broth\r\n1 onion (chopped)\r\n3 cloves garlic (minced)\r\n2 tablespoons butter or oil\r\n1 tablespoon flour (optional, for thickening)\r\nSalt, pepper, and parsley (for garnish)\r\n', '1. Season chicken with salt and pepper. Sear in butter or oil until golden brown on both sides. Remove and set aside.\r\n2. Saute garlic, onion, and mushrooms until soft and fragrant.\r\n3. Add flour (if using) and mix well. Pour in chicken broth and cream, stirring until smooth.\r\n4. Return the chicken to the pan and simmer for 10–15 minutes until fully cooked and the sauce thickens.\r\n5. Garnish with parsley and serve hot with rice, mashed potatoes, or pasta.\r\n\r\n', 1, 'yes', '2024-12-31 09:30:04', NULL, 3, 3),
(5, 'Chocolate Ice cream', 'whennnn\r\n', '2 cups heavy cream\r\n1 cup whole milk\r\n3/4 cup sugar\r\n1/2 cup unsweetened cocoa powder\r\n1 teaspoon vanilla extract\r\n1/2 cup chopped chocolate (optional)\r\n\r\n', '1. In a bowl, mix cocoa powder and sugar.\r\n2. In a saucepan, heat milk and cream until warm, then whisk in the cocoa mixture until smooth.\r\n3. Remove from heat and stir in vanilla extract. Let it cool completely.\r\n4. Pour the mixture into an ice cream maker and churn according to manufacturer’s instructions.\r\n5. Once thickened, mix in chopped chocolate (optional) and freeze for a few hours before serving.\r\n\r\n', 1, 'yes', '2024-12-31 12:33:33', '2025-01-20 12:34:00', 5, 7),
(6, 'Breakfast burrito\r\n', 'A hearty and satisfying breakfast wrap filled with scrambled eggs, sausage, cheese, and veggies. It\'s the perfect grab-and-go meal.\r\n\r\n', '2 large eggs\r\n2 breakfast sausages, crumbled\r\n1/4 cup shredded cheese\r\n1/4 cup diced tomatoes\r\n1/4 cup diced bell peppers\r\n1 large flour tortilla\r\nSalt and pepper to taste\r\n', '1. Scramble the eggs in a pan, seasoning with salt and pepper.\r\n2. Cook the crumbled sausages in a separate pan.\r\n3. Add the bell peppers and tomatoes to the eggs and cook until tender.\r\n4. Lay the scrambled mixture onto a tortilla, top with cheese, and fold the sides over.\r\n5. Roll up the burrito and serve.\r\n\r\n\r\n\r\n', 1, 'yes', '2024-12-31 15:38:44', NULL, 1, 2),
(7, 'Laing', 'Laing is a dish made with gabi leaves, coconut milk, and chili, delivering a rich, creamy, and spicy flavor.\r\n\r\n', '2 cups dried taro leaves (gabi)\r\n2 cups coconut milk\r\n1 cup coconut cream (optional for richer flavor)\r\n1 onion (chopped)\r\n3 cloves garlic (minced)\r\n1 thumb-sized ginger (sliced)\r\n2–3 red chilies (sliced, optional)\r\n1 tablespoon vegan bagoong (shrimp paste alternative) or soy sauce\r\nSalt and pepper to taste.\r\n', '1. Saute garlic, onion, and ginger in a pot. Add vegan bagoong or soy sauce and stir.\r\n2. Pour in coconut milk and bring to a gentle boil.\r\n3. Add the dried gabi leaves, ensuring they are fully soaked in the coconut milk. Simmer on low heat without stirring to avoid itchiness.\r\n4. Once the taro leaves are tender, add coconut cream for a richer texture and sliced chilies for spice. Simmer until the oil separates.\r\n5. Adjust salt and pepper to taste. Serve with steamed rice for a satisfying meal.\r\n\r\n', 5, 'yes', '2025-01-03 15:41:07', NULL, 3, 1),
(8, 'Spaghetti\r\n\r\n', 'Spaghetti is a pasta dish served with tomato sauce, meatballs, or other toppings.\r\n\r\n', '200g spaghetti\r\n1 cup tomato sauce\r\n2 cloves garlic (minced)\r\n1/2 onion (chopped)\r\nOlive oil\r\nSalt and pepper\r\nParmesan cheese (optional)\r\n', '1. Cook the spaghetti according to the package instructions.\r\n2. Saute garlic and onion in olive oil until soft.\r\n3. Add tomato sauce, salt, and pepper. Simmer for 10 minutes.\r\n4. Serve the spaghetti with sauce and sprinkle with Parmesan cheese.\r\n', 9, 'yes', '2025-01-04 09:43:36', NULL, 4, 7),
(9, 'Mushroom tocino', 'A vegetarian twist on the classic Filipino tocino, using mushrooms instead of meat. The mushrooms are marinated in a sweet, savory sauce and then fried until caramelized.\r\n\r\n', '200g mushrooms, sliced\r\n2 tbsp soy sauce\r\n1 tbsp sugar\r\n1 tbsp vinegar\r\n1 garlic clove, minced\r\n1 tbsp oil for frying\r\n', '1. In a bowl, mix soy sauce, sugar, vinegar, and garlic to create the marinade.\r\n2. Add the mushroom slices to the marinade and let it sit for 30 minutes.\r\n3. Heat oil in a pan and fry the mushrooms until golden and caramelized.\r\n4. Serve hot with rice.\r\n\r\n\r\n\r\n', 15, 'yes', '2025-01-04 10:45:53', NULL, 1, 1),
(10, 'Chicken Adobo\r\n', 'The tender, flavorful chicken simmered in a rich, savory adobo sauce makes chicken adobo a beloved comfort dish for all ages. Whether you\'re a kid or an adult, it\'s hard to resist this deliciously satisfying meal\r\n\r\n', '2 lbs chicken\r\n 3 pieces dried bay leaves\r\n 4 tablespoons soy sauce\r\n 6 tablespoons white vinegar\r\n 5 cloves garlic\r\n 1 1/2 cups water\r\n 3 tablespoons cooking oil\r\n 1 teaspoon sugar\r\n 1/4 teaspoon salt\r\n 1 teaspoon whole peppercorn', '1. In a large bowl, combine the chicken, soy sauce, and garlic. Mix thoroughly and let the chicken marinate for at least 1 hour (the longer, the better).  \r\n2. Heat a cooking pot and add the cooking oil. Once the oil is hot, pan-fry the marinated chicken for about 2 minutes on each side.  \r\n3. Add the remaining marinade and garlic, then pour in the water. Bring the mixture to a boil.  \r\n4. Add the bay leaves and peppercorns, then let it simmer for 30 minutes, or until the chicken becomes tender.  \r\n5. Stir in the vinegar and cook for another 10 minutes.  \r\n6. Add sugar and salt, stir well, then turn off the heat.  \r\n7. Serve hot and enjoy!\r\n\r\n', 17, 'yes', '2025-01-06 13:48:55', NULL, 2, 3),
(11, 'Chicken katsu curry', 'These breaded cutlets are enhanced with buttermilk, pepper, salt, and other seasonings to achieve a crispy, mouthwatering texture. Paired with a rich, smooth brown sauce, along with some cubed potatoes and additional toppings, this dish comes together perfectly.\r\n', '2 lbs boneless chicken breasts\r\n1 cup Good Life Breadcrumbs\r\n¾ cup buttermilk\r\n3 ounces curry sauce mix\r\n1 potato cubed\r\n1 carrot cubed\r\n1 onion wedged\r\n2 ¼ cups water\r\n½ teaspoon salt\r\n½ teaspoon ground black pepper\r\n1 cup cooking oil\r\n', '1. Season the chicken with salt and ground black pepper, ensuring it\'s evenly coated. Place it in a large bowl and pour in the buttermilk, making sure the chicken is fully submerged. Cover the bowl and refrigerate for at least 3 hours.\r\n\r\n2. For the curry sauce, heat 3 tablespoons of cooking oil in a pot. Sauté the onion until it begins to separate into layers, then add the carrot and potato. Cook for an additional minute.\r\n\r\n3. Pour water into the pot, cover, and bring it to a boil. Once boiling, reduce the heat to medium and let it simmer for 10 minutes.\r\n\r\n4. Stir in the curry sauce mix and blend well. Remove from heat and set the sauce aside, keeping it warm.\r\n\r\n5. To fry the chicken, heat oil to 350°F in a deep pot. Take the chicken breast out of the buttermilk, allowing any excess liquid to drip off. Coat the chicken breasts thoroughly with Good Life Panko Breadcrumbs on all sides.\r\n\r\n6. Deep fry the chicken for 10 to 12 minutes until golden brown. \r\n\r\n7.Remove and enjoy. ', 15, 'yes', '2025-01-06 16:53:59', NULL, 2, 3),
(12, 'Sarciadong manok\r\n', 'Sarciadong manok is a dish simmered in a rich tomato sauce, often served with vegetables, providing a hearty and flavorful meal.\r\n\r\n', '2 lbs chicken cut into serving pieces\r\n4 pieces tomatoe ripe sliced\r\n2 ounces tomato paste optional\r\n3/4 cup green peas\r\n1 tablespoon parsley chopped\r\n5 pieces dried bay leaves\r\n1 piece onion chopped\r\n4 cloves garlic minced\r\n2 cups chicken broth\r\n3 tablespoons cooking oil\r\nFish sauce and ground black pepper to taste.\r\n', '1. Heat oil in a pan. Saute onion, garlic, and tomato.\r\n2. Once the onion and tomato soften, add chicken pieces. Continue to cook until the color turns light brown.\r\n3. Add tomato paste and chicken broth. Let boil.\r\n4. Put-in dried bay leaves and parsley. Cover and cook between low to medium heat for 35 to 40 minutes. Note: add more water or chicken broth if needed.\r\n5. Add green peas and season with fish sauce and ground black pepper.\r\n6. Transfer to a serving bowl. Serve! Share and enjoy.\r\n\r\n', 25, 'yes', '2025-01-07 12:01:20', NULL, 3, 6),
(13, 'Brownies', 'A rich, fudgy dessert with a chocolatey taste, perfect for any occasion.\r\n\r\n', '1/2 cup butter\r\n1 cup sugar\r\n2 large eggs\r\n1 teaspoon vanilla extract\r\n1/3 cup cocoa powder\r\n1/2 cup all-purpose flour\r\n1/4 teaspoon salt\r\n1/4 teaspoon baking powder.\r\n\r\n\r\n\r\n', '1. Preheat the oven to 350°F (175°C) and grease a baking pan.\r\n2. Melt butter and mix with sugar, eggs, and vanilla.\r\n3. Stir in cocoa powder, flour, salt, and baking powder until smooth.\r\n4. Pour the batter into the pan and bake for 20–25 minutes.\r\n5. Let it cool before cutting into squares.\r\n\r\n\r\n\r\n', 34, 'yes', '2025-01-07 16:04:53', NULL, 5, 7),
(14, 'Chicken Afritada\r\n\r\n', 'Chicken Afritada, or afritadang manok, is a Filipino chicken stew cooked in a tomato-based sauce. It\'s an easy and straightforward dish, ideal for everyday meals. Perfect for lunch, it’s best enjoyed with a serving of warm white rice.\r\n', '1 ½ lbs. Chicken cut into serving pieces\r\n2 piece potato cubed\r\n1 piece carrot sliced\r\n8 oz. tomato sauce\r\n3 pieces hotdog sliced\r\n½ cup green peas\r\n3 pieces bay leaves\r\n1 piece red onion chopped\r\n2 teaspoons garlic minced\r\n3 cups chicken broth\r\n½ teaspoon sugar\r\n3 tablespoons cooking oil\r\nSalt and ground black pepper to taste\r\n\r\n', '1. Heat the oil in a cooking pot. Sauté the onion and garlic until the onion becomes soft.\r\n2. Add the chicken and cook for 30 seconds. Flip it over and cook the other side for another 30 seconds.\r\n3. Pour in the tomato sauce and chicken broth. Cover and let it boil.\r\n4. Add the dried bay leaves and cover the cooking pot. Let it cook on medium heat for 30 minutes.\r\n5. Add the hotdogs and carrots. Cook for 3 minutes.\r\n6. Add the potatoes, cover the pot, and cook for 8 minutes.\r\n7. Add the green peas and cook for 2 more minutes.\r\n8. Season with salt and ground black pepper.\r\n9. Serve and enjoy!\r\n', 8, 'yes', '2025-01-07 17:14:53', NULL, 1, 3),
(15, 'Sweet and Sour Chicken Meatballs', 'Sweet and sour chicken meatballs offer a delightful combination of tangy, savory, and slightly sweet flavors that truly tantalize the taste buds. The juicy chicken meatballs are coated in a perfectly balanced sauce that brings out the best of both worlds—sourness from the vinegar and sweetness from the sugar, creating an irresistible harmony.', '1 lb. ground chicken\r\n1/2 cup breadcrumbs\r\n1 piece Knorr Chicken Cube\r\n1 piece egg\r\n1/4 teaspoon salt\r\n1/4 teaspoon ground black pepper\r\n¼ cup cooking oil\r\n1 ¾ cups water\r\n4 tablespoons banana ketchup\r\n5 tablespoons white sugar\r\n4 tablespoons white vinegar\r\n¼ cup bell pepper Julienne\r\n2 tablespoons onion sliced\r\n3 tablespoons carrot Julienne\r\n1 1/2 tablespoons cornstarch diluted in 2 tablespoons water\r\nA few drops of Knorr Liquid Seasoning\r\n', '1. Combine ground chicken, grated Knorr chicken cube, salt, pepper, and an egg in a bowl.\r\n2. Mix well, gradually adding breadcrumbs.\r\n3. Shape the mixture into 2-tbsp balls and set aside.\r\n4. Heat oil in a pan and fry the meatballs until golden brown; set aside.\r\n5. Saute onions, then add bell pepper and carrot.\r\n6. Pour in water, sugar, vinegar, and banana ketchup; boil while stirring.\r\n7. Thicken with cornstarch mixed in water, then add meatballs to coat in sauce.\r\n8. Serve on a plate and enjoy!', 2, 'yes', '2025-01-07 19:14:15', NULL, 2, 3),
(16, 'Inihaw na bangus', 'Inihaw na bangus is a grilled milk fish then cooked in charcoal and it gives a tasty and aromatic dish', '1 piece milkfish \r\n1 piece tomato ripe, diced\r\n1 piece red onion diced\r\n1 piece lemon or 3 pieces calamansi (optional)\r\ntablespoon ginger minced\r\n2 teaspoons salt\r\n1/2 teaspoon ground black pepper\r\n\r\n', '1. In a bowl, combine garlic, onion, soy sauce, calamansi juice, salt, pepper, and oil.\r\n2. Rub the marinade into the bangus and let it marinate for at least 30 minutes to absorb the flavors.\r\n3. Preheat the grill and place the bangus on the grill. If using banana leaves, wrap the fish in the leaves before grilling. Grill for 8-10 minutes on each side until the fish is cooked through and has a nice smoky flavor.\r\n4. Serve hot with steamed rice and a side of dipping sauce (soy sauce with calamansi or vinegar).\r\n', 29, 'yes', '2025-01-08 12:19:00', NULL, 3, 5),
(17, 'Espasol', 'Espasol is a sweet rice flour cake with a chewy texture, dusted with toasted rice flour.\r\n\r\n', '2 cups rice flour\r\n1 cup coconut milk\r\n1 cup sugar\r\n1/2 teaspoon vanilla extract\r\n1/4 cup toasted rice flour (for dusting)\r\n', '1. In a pan, cook rice flour with coconut milk and sugar over medium heat, stirring constantly.\r\n2. Once the mixture thickens, add vanilla extract and continue stirring until smooth.\r\n3. Transfer to a greased mold and press it down. Let it cool and set.\r\n4. Dust with toasted rice flour before cutting into pieces.\r\n\r\n\r\n\r\n', 40, 'yes', '2025-01-08 15:25:13', NULL, 5, 7),
(18, 'Palabok\r\n\r\n', 'Palabok is a noodle dish made with rice noodles, garlic, shrimp, pork, and a rich, savory sauce.\r\n\r\n', '1 pack rice noodles\r\n1/2 cup pork (ground or sliced)\r\n1/4 cup shrimp (peeled)\r\n1/2 cup garlic (minced)\r\n1/4 cup fish sauce\r\n2 cups pork broth\r\n1 tablespoon annatto powder (for color)\r\n1 boiled egg (sliced)\r\nCrushed chicharrón (optional)\r\nGreen onions\r\n', '1. Boil the rice noodles according to package directions.\r\n2. Saute garlic and pork until golden. Add shrimp, fish sauce, and pork broth. Simmer for 10 minutes.\r\n3. Add annatto powder for color, then pour over noodles.\r\n4. Garnish with boiled eggs, chicharrón, and green onions.\r\n\r\n\r\n\r\n', 8, 'yes', '2025-01-08 16:19:58', NULL, 4, 7),
(19, 'Pork empanada\r\n', 'A savory Filipino pastry filled with seasoned pork, vegetables, and hard-boiled eggs, wrapped in a crispy dough.', '1/2 lb ground pork\r\n1 medium onion, chopped\r\n1/4 cup peas and carrots\r\n2 hard-boiled eggs, chopped\r\n1/2 tsp soy sauce\r\n1 package empanada dough\r\nSalt and pepper to taste.', '1. Cook ground pork in a pan with onions until browned.\r\n2. Add peas, carrots, and soy sauce, and cook for another 5 minutes. Season with salt and pepper.\r\n3. Place a spoonful of the filling and some chopped eggs onto each empanada dough circle.\r\n4. Fold the dough over to form a half-moon shape and seal the edges.\r\n5. Deep-fry the empanadas until golden and crispy. Drain on paper towels and serve.\r\n', 12, 'yes', '2025-01-08 16:45:35', NULL, 1, 2),
(20, 'Chicken noodle soup', 'Bowl of chicken soup with noodles, perfect for cold weather. It’s light yet filling with the goodness of chicken, vegetables, and broth.', '1 chicken breast, cooked and shredded\r\n1 carrot, sliced\r\n1 celery stalk, sliced\r\n1 onion, chopped\r\n2 cups chicken broth\r\n1 cup noodles (egg noodles or your choice)\r\nSalt and pepper to taste\r\n', '1. In a pot, bring the chicken broth to a boil.\r\n2. Add the carrot, celery, and onion, and cook until tender.\r\n3. Add the shredded chicken and noodles, and cook until the noodles are soft.\r\n4. Season with salt and pepper and serve hot.\r\n', 33, 'yes', '2025-01-09 07:39:08', NULL, 1, 3),
(21, 'Tofu and Brocolli Stir Fry\r\n\r\n', 'This vegetable and tofu stir-fry is a quick and easy dish, perfect for busy days. It\'s a simple, healthy recipe packed with bold flavors, thanks to its delicious sauce.\r\n\r\n', '8 oz. extra firm tofu sliced in 1/2 inch thick pieces\r\n3 cups sliced broccoli florets\r\n1 carrot sliced diagonally (optional)\r\n1 medium onion sliced\r\n1 teaspoon minced garlic\r\n1 teaspoon minced ginger\r\n2 tablespoons oyster sauce\r\n6 tablespoons cooking oil\r\nSalt and pepper to taste\r\n\r\n', '1. Heat a pan and add 4 tablespoons of cooking oil.\r\n2. Once the oil is hot, fry the tofu slices until both sides are golden and crispy, about 8 to 10 minutes per side.\r\n3. Remove the tofu from the pan, let it cool, and cut into smaller rectangular pieces. Set aside.\r\n4. In a clean pan, heat the remaining oil.\r\n5. Saute garlic, ginger, and onion until fragrant.\r\n6. Add the fried tofu and pour in the oyster sauce. Mix well.\r\n7. Toss in the broccoli florets and cook for 5 to 8 minutes, stirring occasionally.\r\n8. Season with salt and pepper to taste.\r\n9. Transfer to a serving plate and serve with steamed rice. Enjoy and share!', 8, 'yes', '2025-01-09 09:42:45', NULL, 2, 1),
(22, 'Salt and pepper pork chop', 'A simple yet flavorful dish featuring crispy pork chops seasoned with salt, pepper, and a touch of garlic.\r\n\r\n', '4 pork chops\r\n1 tbsp garlic powder\r\nSalt and pepper to taste\r\n1 tbsp oil for frying\r\n', '1. Season the pork chops with garlic powder, salt, and pepper.\r\n2. Heat oil in a pan and fry the pork chops until golden and cooked through.\r\n3. Serve hot with steamed rice or your choice of side.\r\n', 18, 'yes', '2025-01-09 10:05:28', NULL, 1, 2),
(23, 'Beef bulalo', 'Bulalo is a beef soup made with tender beef shanks, Bone marrow, and vegetables, simmered to perfection for a rich, flavorful broth.\r\n\r\n', '1 kg beef shanks\r\n1 onion (quartered)\r\n1 head garlic (crushed)\r\n2 ears corn (cut into pieces)\r\n2 potatoes (quartered)\r\n1 bundle pechay or bok choy\r\n1 bundle cabbage (quartered)\r\nPeppercorns, fish sauce, salt, and water\r\n', '1. Boil beef with onion, garlic, and peppercorns. Simmer until tender, skimming off scum.\r\n2. Add fish sauce, corn, and potatoes. Cook until vegetables are tender.\r\n3. Add pechay and cabbage, simmer for 5 minutes.\r\n4. Season to taste and serve hot.\r\n\r\n\r\n\r\n', 7, 'yes', '2025-01-09 10:48:19', NULL, 2, 4),
(24, 'Fruit salad', 'A refreshing dessert made with a variety of fruits, cream, and condensed milk.\r\n\r\n', '1 cup diced pineapple\r\n1 cup diced mango\r\n1 cup diced apples\r\n1/2 cup grapes\r\n1/2 cup canned fruit cocktail (drained)\r\n1/2 cup condensed milk\r\n1/2 cup all-purpose cream\r\n', '1. Combine all the fruits in a large bowl.\r\n2. In a separate bowl, mix condensed milk and all-purpose cream.\r\n3. Pour the mixture over the fruits and stir gently.\r\n4. Chill for an hour before serving.\r\n\r\n', 28, 'yes', '2025-01-09 12:11:01', NULL, 5, 7),
(25, 'Ice coffee\r\n', 'A chilled coffee beverage made with brewed coffee, ice, and milk or cream for a refreshing treat.\r\n\r\n', '1 cup brewed coffee (cooled)\r\n1/4 cup milk or cream\r\nIce cubes\r\nSugar or sweetener (optional)\r\n', '1. Brew coffee and allow it to cool.\r\n2. Fill a glass with ice cubes.\r\n3. Pour the cooled coffee over the ice.\r\n4. Add milk or cream and sweeten to taste.\r\n', 22, 'yes', '2025-01-09 18:53:21', NULL, 4, 7),
(26, 'Beef pares', 'Savory Filipino stew of tender beef cooked in soy sauce, garlic, and a sweet, slightly spicy sauce, typically served with garlic rice.\r\n', '1 lb beef brisket or shank, sliced\r\n1 onion, chopped\r\n1 tbsp soy sauce\r\n2 tbsp sugar\r\n2 garlic cloves, minced\r\n2 cups beef broth\r\n\r\n\r\n\r\n', '1. Brown the beef in a pan, then set aside.\r\n2. Saute garlic and onions until fragrant.\r\n3. Return the beef to the pan and add soy sauce, sugar, and beef broth.\r\n4. Simmer until the beef is tender and the sauce is thickened. Serve with garlic rice.\r\n', 21, 'yes', '2025-01-10 07:15:43', NULL, 1, 4),
(27, 'Ginisang Ampalaya', 'Ginisang Ampalaya offers a perfect blend of flavors, combining savory notes with a mild, pleasant bitterness. Beyond its unique taste, it’s also a highly nutritious and health-packed dish.\r\n\r\n', '2 pieces ampalaya cleaned and cut into thin slices\r\n1 tbsp garlic minced\r\n1/2 tsp ground black pepper\r\nsalt to taste\r\n2 raw eggs\r\n18 ounces luke warm water\r\n1 tomato sliced\r\n1 onion sliced\r\n3 tbsp cooking oil\r\n\r\n', '1. Put the ampalaya in a large bowl.  \r\n2. Sprinkle with salt and add lukewarm water, letting it sit for 5 minutes.  \r\n3. Place the ampalaya in a cheesecloth and squeeze firmly to remove excess liquid.  \r\n4. Heat a pan and add cooking oil.  \r\n5. Sauté the garlic, onion, and tomato until fragrant.  \r\n6. Add the ampalaya and stir to combine with the other ingredients.  \r\n7. Season with salt and pepper to taste.  \r\n8. Beat the eggs and pour them over the ampalaya. Allow the eggs to partially cook.  \r\n9. Stir to mix the eggs evenly with the other ingredients.  \r\n10. Serve hot. Enjoy and share! \r\n\r\n', 37, 'yes', '2025-01-10 11:17:50', NULL, 2, 1),
(28, 'Egg pie', 'Egg pie is a custard pie made with a silky egg filling and a flaky crust.\r\n\r\n', '1 pie crust (store-bought or homemade)\r\n5 large eggs\r\n1 cup evaporated milk\r\n1/2 cup sugar\r\n1 teaspoon vanilla extract\r\n1 tablespoon cornstarch\r\n', '1. Preheat the oven to 350°F (175°C).\r\n2. Whisk together eggs, evaporated milk, sugar, vanilla, and cornstarch until smooth.\r\n3. Pour the mixture into the pie crust and bake for 30–35 minutes or until set.\r\n4. Let it cool before slicing and serving.\r\n', 8, 'yes', '2025-01-10 14:20:16', NULL, 5, 7),
(29, 'Apple pie\r\n', 'Apple pie is a classic dessert with sweet apple filling and a buttery, flaky crust.\r\n\r\n', '4 cups peeled and sliced apples\r\n1 tablespoon lemon juice\r\n3/4 cup sugar\r\n1/4 teaspoon cinnamon\r\n2 tablespoons flour\r\n1 pie crust (top and bottom)\r\n\r\n\r\n\r\n', '1. Preheat the oven to 375°F (190°C).\r\n2. Toss apple slices with lemon juice, sugar, cinnamon, and flour.\r\n3. Place the apple mixture in the pie crust, then cover with the top crust.\r\n4. Bake for 45–50 minutes or until golden brown.\r\n5. Let it cool before serving.\r\n\r\n', 24, 'yes', '2025-01-10 19:02:23', NULL, 5, 7),
(30, 'Quick and Easy Fried Chicken\r\n', 'Tender and flavorful chicken drumsticks marinated in a rich blend of spices, then carefully steamed to lock in moisture, air-dried for that perfect crispy finish, and deep-fried until golden brown and crispy on the outside.\r\n\r\n', '2 lbs. chicken drumstick\r\n32 grams Knorr SavorRich Chicken Liquid seasoning\r\n3 tablespoons cooking wine (or rhum)\r\n1 teaspoon ground nutmeg\r\n1 teaspoon onion powder\r\n1 tablespoon patis\r\n2 cups cooking oil\r\n\r\n', '1. In a large bowl, combine chicken, onion powder, nutmeg, cooking wine, patis, and Knorr SavorRich. Mix thoroughly to ensure the chicken is evenly coated.\r\n2. Transfer the mixture into a resealable bag. Seal the bag and place it in the refrigerator to marinate overnight.\r\n3. The next day, arrange the marinated chicken drumsticks on a steamer rack.\r\n4. Boil water in a separate pot and steam the chicken for 45 minutes.\r\n5. Once done, remove the chicken from the steamer and place it on a wire rack to air dry for 1 hour.\r\n6. Heat oil in a cooking pot or deep fryer, and fry the chicken until it turns golden brown and crispy.\r\n7. Arrange the fried chicken on a serving plate and serve with banana ketchup.', 29, 'yes', '2025-01-11 08:06:59', NULL, 2, 3),
(31, 'Pork Kilawin', 'This recipe perfectly balances sour and salty flavors. If you enjoy dishes that are both rich and refreshing, Pork Kilawin is sure to delight your taste buds! This grilled pork dish is paired with slices of fresh fruits and vegetables for an irresistible combination.\r\n\r\n', '1 lb pork belly\r\n2 cucumbers sliced\r\n2 tomatoes (optional)\r\n1 red onion sliced\r\n3 pieces chili pepper chopped\r\nSauce ingredients:\r\n¾ cup white vinegar\r\n2 teaspoons soy sauce\r\n2 teaspoons white sugar\r\n¼ teaspoon salt\r\n¼ teaspoon ground black pepper\r\nMarinade ingredients:\r\n½ cup soy sauce\r\n¼ cup banana ketchup\r\n1 head garlic\r\n½ lemon\r\n1 teaspoon onion powder\r\n½ teaspoon salt\r\n¼ teaspoon ground black pepper', '1. In a bowl, combine all the marinade ingredients and mix thoroughly.\r\n2. Add the pork belly to the marinade and let it soak for at least 3 hours.\r\n3. Grill the marinated pork belly until it is fully cooked, then slice it into serving portions and set aside.\r\n4. In a large mixing bowl, combine all the sauce ingredients.\r\n5. Add the grilled pork slices, cucumber, tomato, onion, and chili pepper. Toss well to ensure everything is evenly coated.\r\n6. Transfer to a serving plate and serve.\r\n', 34, 'yes', '2025-01-11 12:09:32', NULL, 2, 2),
(32, 'Skittles', 'A colorful and fruity candy with a chewy texture and a burst of flavors in each bite.', 'Sugar\r\nCorn syrup\r\nFruit juice concentrates\r\nArtificial flavors and colors', '1. Skittles are made through a process of boiling sugar, corn syrup, and fruit concentrates.\r\n2. The mixture is poured into molds and allowed to cool before being packaged.\r\n\r\n', 18, 'yes', '2025-01-11 19:11:29', NULL, 4, 7),
(33, 'Grilled cheese', 'Toasted buttery bread and melted cheese in between. It’s simple, delicious, and perfect for any time of the day, often enjoyed with tomato soup.', '2 slices of bread (white, whole wheat, or your choice)\r\n2 slices of cheese (cheddar, American, or your preference)\r\n2 tbsp butter\r\n', '1. Heat a skillet or griddle over medium heat.\r\n2. Butter one side of each slice of bread.\r\n3. Place one slice of bread, butter side down, onto the skillet. Top with cheese slices.\r\n4. Place the second slice of bread on top, butter side up.\r\n5. Cook for 2-3 minutes on each side or until the bread is golden brown and the cheese is melted.\r\n6. Remove from the skillet, cut into halves or quarters, and serve immediately.\r\n', 2, 'yes', '2025-01-12 08:31:44', NULL, 1, 6),
(34, 'Donut', 'A sweet, fried pastry with a hole in the center, often glazed or covered with sugar.', '2 cups all-purpose flour\r\n1/2 cup sugar\r\n1 tablespoon baking powder\r\n1/2 teaspoon salt\r\n2 eggs\r\n1/2 cup milk\r\n1/4 cup butter (melted)\r\n1 teaspoon vanilla extract\r\nOil for frying', '1. Mix dry ingredients in one bowl and wet ingredients in another.\r\n2. Combine both mixtures and stir until smooth.\r\n3. Roll the dough and cut into donut shapes.\r\n4. Heat oil in a pan and fry donuts until golden brown.\r\n5. Drain excess oil and coat with sugar or glaze.\r\n', 17, 'yes', '2025-01-12 10:16:07', NULL, 4, 7),
(35, 'Pork Barbeque', 'Pinoy Pork Barbecue consists of marinated pork slices skewered and grilled to perfection. Similar to kebabs, this dish focuses solely on the meat, with no vegetables included.', '3 lbs pork shoulder sliced into thin pieces\r\nBBQ marinade\r\n3 tablespoons Knorr Liquid Seasoning\r\n4 pieces calamansi or 2 pieces lime\r\n½ cup banana ketchup\r\n½ cup soy sauce\r\n2 ½ tablespoons brown sugar\r\n2 teaspoons garlic powder\r\nBasting sauce\r\n5 tablespoons soy sauce\r\n1 tablespoon Knorr Liquid Seasoning\r\n1 piece calamansi or ½ lime\r\n¼ cup banana ketchup\r\n2 teaspoons vegetable oil', '1. Place the pork slices in a large bowl and add all the barbecue marinade ingredients. Mix thoroughly to ensure the meat is evenly coated.\r\n2. Cover the bowl and refrigerate. Let the pork marinate for at least 3 hours, though marinating longer allows the meat to fully absorb the flavors.\r\n3. Thread the marinated pork onto bamboo skewers.\r\n4. Prepare the basting sauce by mixing all the basting sauce ingredients in a bowl. Set aside.\r\n5. Preheat the grill. Grill the pork skewers for about 2 minutes on one side. Brush the top with the basting sauce, then flip the skewers and baste again.\r\n6. Continue grilling, flipping, and basting every 2 to 2 ½ minutes until the pork barbecue is fully cooked.\r\n7. Arrange the skewers on a serving plate. Serve with rice and a side of spicy vinegar dipping sauce.\r\n8. Enjoy the flavorful dish!\r\n', 8, 'yes', '2025-01-12 11:20:24', NULL, 2, 2),
(36, 'Sauteed onion and hotdog with ketchup', 'A quick and easy Filipino snack or side dish of sauteed onions and hotdogs, topped with ketchup for added flavor.', '4 hotdogs, sliced\r\n1 large onion, sliced\r\n2 tbsp ketchup\r\n1 tbsp oil', '1. Heat oil in a pan and sauté the onions until soft and translucent.\r\n2. Add the sliced hotdogs and cook until browned.\r\n3. Drizzle with ketchup and stir to coat. Serve warm.\r\n', 40, 'yes', '2025-01-12 17:23:00', NULL, 1, 2),
(37, 'Bananacue', 'Bananacue is made of caramelized bananas on skewers, often served as street food.\r\n\r\n', '6 ripe saba bananas (or plantains)\r\n1/2 cup brown sugar\r\n2 tablespoons cooking oil', '1. Peel and slice bananas into halves or thirds.\r\n2. Heat oil in a pan and add brown sugar. Stir until it melts and becomes a syrup.\r\n3. Add the banana slices and cook until they are coated with caramelized sugar.\r\n4. Skewer the bananas and serve.', 37, 'yes', '2025-01-12 18:25:11', NULL, 5, 7),
(38, 'Trailmix', 'A nutritious and crunchy snack made with a variety of nuts, seeds, dried fruits, and sometimes chocolate.\r\n\r\n\r\n\r\n', '1/2 cup almonds\r\n1/2 cup cashews\r\n1/2 cup dried cranberries\r\n1/4 cup sunflower seeds\r\n1/4 cup chocolate chips (optional)\r\n\r\n\r\n\r\n\r\n', '1 Combine all the ingredients in a large bowl.\r\n2. Toss to mix and distribute evenly.\r\n3. Serve or store in an airtight container for later.\r\n\r\n\r\n\r\n', 7, 'yes', '2025-01-13 09:31:05', NULL, 4, 7),
(39, 'Champorado\r\n\r\n', 'A Filipino sweet chocolate rice porridge made with glutinous rice, cocoa powder, and sugar. It’s a comforting breakfast or snack, often served with a side of salted dried fish (tuyo) for a sweet and savory combination.', '1 cup glutinous rice (malagkit)\r\n3 cups water\r\n2 tbsp cocoa powder\r\n1/4 cup sugar (adjust to taste)\r\n1/4 cup condensed milk (optional, for creaminess)\r\n', '1. In a pot, rinse the glutinous rice under cold water.\r\n2. Add the rice and water to the pot and bring to a boil.\r\n3. Lower the heat and simmer until the rice is soft and the mixture thickens, about 20-30 minutes.\r\n4. Stir in the cocoa powder and sugar until well combined. Adjust the sweetness to taste.\r\n5. Add condensed milk if you prefer a creamier texture.\r\n6. Serve warm with a side of tuyo (dried fish) or enjoy as is.\r\n', 21, 'yes', '2025-01-13 12:31:05', NULL, 1, 6),
(40, 'Chicken Tinola', 'Tinola is a comforting Filipino chicken soup that warms both the body and the soul. The tender chicken, simmered with fragrant ginger, onions, and garlic, creates a flavorful broth that\'s perfect for cozying up on a chilly day.', '3 lbs. chicken cut into serving pieces\r\n2 green papaya wedged\r\n1 ½ cup malunggay leaves\r\n1 cup hot pepper leaves\r\n5 cloves garlic crushed and chopped\r\n1 onion chopped\r\n3 thumbs ginger julienne\r\n2 Maggi Magic Chicken Cubes\r\n1 quart rice wash See notes\r\n1 quart water\r\n2 tablespoons fish sauce\r\nGround black pepper to taste optional\r\n3 tablespoons cooking oil.', '1. Heat cooking oil in a pot and sauté garlic, onion, and ginger until the onion becomes soft.\r\n2. Add the chicken and continue sautéing for 2 minutes, or until the chicken turns light brown.\r\n3. Pour in 2 tablespoons of fish sauce and stir well.\r\n4. Add the rice wash to the pot and let it boil. Simmer for 10 minutes.\r\n5. Add water as needed and let the mixture boil again.\r\n6. Place the green papaya wedges into the pot and simmer for 15 to 20 minutes.\r\n7. Stir in the Maggi Magic Chicken Cubes and season with ground black pepper (optional).\r\n8. Turn off the heat and add the hot pepper leaves and malunggay leaves. Cover the pot for 2 minutes to let the residual heat cook the greens.\r\n9. Transfer to a serving bowl. Serve and enjoy!', 24, 'yes', '2025-01-13 13:33:53', NULL, 2, 3),
(41, 'Yema', 'A sweet treat made with condensed milk, egg yolks, and sugar.\r\n\r\n', '1 can (300g) condensed milk\r\n4 egg yolks\r\n1/4 cup sugar\r\n1 teaspoon vanilla extract', '1. In a pan, whisk together egg yolks, condensed milk, and sugar.\r\n2. Cook over low heat, stirring constantly, until the mixture thickens.\r\n3. Once thickened, remove from heat and stir in vanilla extract.\r\n4. Let it cool, then form into small balls or logs, and wrap in cellophane.', 8, 'yes', '2025-01-13 14:42:21', NULL, 5, 7),
(42, 'Pastillas', 'Pastillas is a milk candy made from condensed milk, sugar, and powdered milk.', '1 can (300g) condensed milk\r\n1 cup powdered milk\r\n1/4 cup sugar', '1. Mix condensed milk and powdered milk in a pan over low heat.\r\n2. Stir constantly until the mixture thickens.\r\n3. Roll the mixture into small logs and coat with sugar.\r\n4. Wrap in cellophane and let it cool before serving.\r\n', 12, 'yes', '2025-01-13 15:42:21', NULL, 5, 7),
(43, 'Chicken buffalo wings', 'Chicken buffalo wings\r\nHas a spicy, tangy, and irresistibly deliciousess. These crispy wings, coated in a rich buffalo sauce', '1 kg chicken wings\r\n1 tsp salt\r\n1 tsp black pepper\r\n1 tsp garlic powder\r\n1/2 cup all-purpose flour\r\n1/4 cup cornstarch\r\nOil for frying\r\n1/4 cup unsalted butter\r\n1/2 cup hot sauce (e.g., Frank’s RedHot)\r\n1 tbsp honey or brown sugar (optional, for sweetness)\r\n1 tsp Worcestershire sauce', '1. Pat the chicken wings dry with a paper towel and season with salt, pepper, and garlic powder.\r\n2. In a bowl, mix flour and cornstarch. Toss the wings in the mixture until evenly coated.\r\n3. Heat oil in a deep pan or fryer to 175°C (350°F).\r\n4. Fry the wings in batches for 8-10 minutes, or until golden brown and crispy. Remove and drain on paper towels.', 33, 'yes', '2025-01-13 16:53:15', NULL, 2, 3),
(44, 'Paksiw na Bangus', 'The combination of sourness and savory undertones creates a balance that is perfect for pairing with steamed rice. Paksiw na Bangus is a must-try for those who love simple yet flavorful Filipino cuisine', '1 1/2 lbs. milkfish cleaned and sliced crosswise into serving pieces\r\n3 thumbs ginger crushed\r\n5 cloves garlic crushed\r\n1/2 cup white vinegar\r\n1 cup water\r\n1 piece onion sliced\r\n1 piece Chinese eggplant chopped\r\n5 pieces okra\r\n2 pieces long green pepper\r\n1 teaspoon whole peppercorn\r\nSalt to taste', '1. Layer the ginger, garlic, okra, onion, long green pepper, peppercorn, and eggplant at the bottom of a cooking pot, ensuring an even spread of flavors.  \r\n2. Place the bangus slices carefully on top of the vegetable mixture to ensure they cook evenly.  \r\n3. Pour in water and vinegar, making sure the liquid slightly covers the ingredients. Heat the pot and bring it to a boil.  \r\n4. Once boiling, reduce the heat to low or medium, cover the pot, and let the dish simmer gently for about 15 minutes, allowing the flavors to meld together.  \r\n5. Season with salt to enhance the taste and adjust according to your preference.  \r\n6. Transfer the dish to a serving plate, ensuring the vibrant colors and arrangement of the fish and vegetables are showcased.  \r\n7. Serve hot with steamed rice for a satisfying and flavorful meal.', 5, 'yes', '2025-01-13 18:53:15', NULL, 2, 5),
(45, 'Crackers', 'Crispy, thin baked goods, often served with cheese or spreads.\r\n\r\n', '1 1/2 cups all-purpose flour\r\n1/2 teaspoon salt\r\n1/4 teaspoon baking soda\r\n1/4 cup olive oil\r\n1/4 cup water', '1. Preheat the oven to 350°F (175°C).\r\n2. Mix flour, salt, and baking soda in a bowl.\r\n3. Add olive oil and water, knead the dough until smooth.\r\n4. Roll the dough out thinly and cut into squares.\r\n5. Bake for 10-15 minutes until golden and crispy.', 18, 'yes', '2025-01-13 19:29:07', NULL, 4, 7),
(46, 'Beef morcon', 'Beef morcon is a beef roll stuffed with eggs, sausages, cheese, and vegetables, cooked in a rich tomato sauce.\r\n\r\n', '1 kg beef sirloin\r\n2 hard-boiled eggs (quartered)\r\n2 sausages (sliced)\r\n1 carrot (sliced)\r\n1 pickle (sliced)\r\nCheese (sliced)\r\n1 cup tomato sauce\r\n1 onion (chopped)\r\n3 cloves garlic (minced)\r\nSoy sauce, salt, pepper, and water', '1. Season beef, stuff with eggs, sausages, carrots, pickles, and cheese. Roll and secure.\r\n2. Sear rolls in oil until browned.\r\n3. Saute onion and garlic, then add tomato sauce, soy sauce, and water.\r\n4. Simmer beef rolls in the sauce for 1.5–2 hours.\r\n5. Slice and serve with sauce over rice.\r\n', 7, 'yes', '2025-01-13 20:32:07', NULL, 2, 4),
(47, 'Bangus sisig', 'Bangus sisig is a dish made with milkfish (bangus), onions, and spices, perfect as a main dish or appetizer, and an easy to prepare type of sisig.', '1 large bangus (milkfish), cleaned and deboned\r\n1 onion (chopped)\r\n3 cloves garlic (minced)\r\n2 tablespoons soy sauce\r\n1 tablespoon calamansi juice (or lemon juice)\r\n1 chili (optional, chopped)\r\nMayonnaise (optional, for creaminess)\r\nSalt, pepper, and cooking oil', '1. Fry or grill the bangus until cooked, then flake the flesh, removing the bones and skin.\r\n2. Sauté the onion, garlic, and chili in oil. Combine the flakes bangus and soy sauce.\r\n3. Mix in the calamansi juice and mayonnaise (optional). Cook until thoroughly mixed.\r\n4. Transfer to a heated plate and serve hot.', 28, 'yes', '2025-01-14 09:44:12', NULL, 2, 5),
(48, 'Coconut macaron', 'A chewy coconut treat with a crisp edge, often served as a dessert or snack.', '2 cups shredded coconut\r\n1/2 cup sugar\r\n2 egg whites\r\n1 teaspoon vanilla extract', '1. Preheat the oven to 350°F (175°C).\r\n2. Beat egg whites until stiff peaks form, then fold in sugar, coconut, and vanilla extract.\r\n3. Drop spoonfuls of the mixture onto a baking sheet.\r\n4. Bake for 15–20 minutes or until golden brown.', 22, 'yes', '2025-01-14 10:04:12', NULL, 5, 7),
(49, 'Chicken katsu', 'Chicken katsu is a  crispy and juicy Japanese-style fried chicken cutlet, perfect with tonkatsu sauce and rice.', '2 lbs boneless chicken breasts\r\n1 cup Good Life Breadcrumbs\r\n¾ cup buttermilk\r\n3 ounces curry sauce mix\r\n1 potato cubed\r\n1 carrot cubed\r\n1 onion wedged\r\n2 ¼ cups water\r\n½ teaspoon salt\r\n½ teaspoon ground black pepper\r\n1 cup cooking oil', '1. Butterfly the chicken breasts, pound them to an even thickness, and season with salt and pepper.\r\n2. Dredge each piece in flour, dip in beaten eggs, and coat with panko breadcrumbs.\r\n3. Heat oil in a pan and fry the chicken over medium heat until golden brown and fully cooked.\r\n4. Cut into strips and serve with rice, shredded cabbage, and tonkatsu sauce.', 9, 'yes', '2025-01-14 11:58:29', NULL, 3, 3),
(50, 'Lechong kawali', 'Lechong kawali is a crispy and juicy deep-fried pork belly', '1 kg pork belly\r\n1 tablespoon salt\r\n1 teaspoon peppercorns\r\n3 cloves garlic (crushed)\r\n2 bay leaves\r\nWater (for boiling)\r\nCooking oil (for frying)', '1. Boil pork belly with salt, peppercorns, garlic, and bay leaves until tender. Remove and let it cool.\r\n2. Pat the pork dry with paper towels and refrigerate for at least an hour to remove moisture.\r\n3. Deep fry the pork belly until golden brown and crispy.\r\n4. Chop into pieces and serve with lechon sauce or spiced vinegar.', 37, 'yes', '2025-01-14 13:08:29', NULL, 2, 6),
(51, 'Beef burger steak', 'Filipino-inspired dish made of beef patties cooked in a savory gravy, typically served with rice.', '1 lb ground beef\r\n1 onion, sliced\r\n2 tbsp soy sauce\r\n1 tbsp Worcestershire sauce\r\n1 cup beef broth\r\n2 tbsp flour (for thickening)', '1. Form the ground beef into patties and cook them in a pan until browned.\r\n2. Remove the patties and set aside. Sauté onions in the same pan.\r\n3. Add soy sauce, Worcestershire sauce, and beef broth to the pan, and bring to a simmer.\r\n4. Add the patties back to the pan and cook in the gravy until heated through.\r\n5. Thicken the gravy with flour if desired and serve with rice.\r\n', 24, 'yes', '2025-01-14 15:12:41', NULL, 1, 4),
(52, 'Chocolate cake', 'A moist and rich cake made with chocolate, perfect for celebrations.', '1 1/2 cups all-purpose flour\r\n1 cup cocoa powder\r\n1 cup sugar\r\n1 teaspoon baking powder\r\n1/2 teaspoon baking soda\r\n1/2 teaspoon salt\r\n2 eggs\r\n1 cup milk\r\n1/2 cup vegetable oil\r\n1 teaspoon vanilla extract', '1. Preheat the oven to 350°F (175°C).\r\n2. Mix dry ingredients in a bowl and wet ingredients in another.\r\n3. Combine both mixtures and stir until smooth.\r\n4. Pour into a greased baking pan and bake for 30–35 minutes.\r\n5. Let it cool before frosting.', 21, 'yes', '2025-01-14 16:12:41', NULL, 5, 7),
(53, 'Grilled tuna belly', 'A deliciously smoky and tender grilled tuna belly, marinated with savory and tangy flavors, perfect for a quick and satisfying meal.', '4 lbs. Tuna belly\r\n1 cup soy sauce\r\n2 tablespoons sugar\r\n4 pieces calamansi\r\n¼ teaspoon ground black pepper', '1. Prepare the marinade by combine soy sauce, calamansi, ground black pepper, and sugar in a bowl. Stir until well blended.\r\n2. Place the tuna in a Ziploc bag. Pour the soy sauce marinade.Let the air out of the bag. Seal. Marinate inside the fridge for at least 3 hours.\r\n3. Heat-up the grill. Arrange the tuna belly on the grate of the grill. Brush a generous amount marinade mixture on the tuna. Grill for 3 to 5 minutes.\r\n4. Turn the tuna belly over and grill the opposite side. Baste the top and sides. Continue to grill for another 5 minutes. Continue performing the process until the tuna is completely cooked.\r\n5. Serve with a dipping sauce composed of soy sauce, calamansi, and chili pepper. Share and enjoy!', 33, 'yes', '2025-01-14 18:16:44', NULL, 3, 5),
(54, 'Ube kalamay', 'A sweet and sticky dessert made with ube (purple yam), sugar, and coconut milk.', '1 cup ube (purple yam), mashed\r\n1/2 cup sugar\r\n1/2 cup coconut milk\r\n1 tablespoon butter\r\n1 tablespoon rice flour', '1. In a pan, cook ube, sugar, coconut milk, and butter over low heat.\r\n2. Add rice flour and stir until the mixture thickens and becomes sticky.\r\n3. Once thick, remove from heat and cool. Serve in small portions.', 5, 'yes', '2025-01-14 20:16:44', NULL, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `recipeID` int(5) DEFAULT NULL,
  `postID` int(5) DEFAULT NULL,
  `reasonID` int(1) NOT NULL,
  `otherReason` varchar(255) DEFAULT NULL,
  `reportedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportID`, `userID`, `recipeID`, `postID`, `reasonID`, `otherReason`, `reportedAt`, `status`) VALUES
(1, 16, 32, NULL, 4, NULL, '2025-01-20 01:19:16', 'pending'),
(2, 23, NULL, 40, 6, 'Offensive Language or Imagery', '2025-01-20 01:22:18', 'pending'),
(3, 31, 36, NULL, 6, 'Misleading Claims', '2025-01-20 01:22:18', 'pending'),
(4, 4, NULL, 42, 2, NULL, '2025-01-20 01:22:18', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `registeredAt` datetime NOT NULL DEFAULT current_timestamp(),
  `isRestricted` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `password`, `role`, `registeredAt`, `isRestricted`) VALUES
(1, 'Jomari', 'Castillo', 'jomaricastillo@gmail.com', 'tastebudsAdmin27', 'admin', '2024-12-29 20:00:07', 'no'),
(2, 'Michael', 'Angeles', 'michaelangeles3@yahoo.com', 'anglesMIC032024', 'user', '2025-01-01 09:00:00', 'no'),
(3, 'Justine', 'Ocampo', 'ocampoj@gmail.com', 'OcampoJus2000', 'user', '2025-01-01 09:45:00', 'no'),
(4, 'Emma', 'Johnson', 'emmajohnson@pup.edu.ph', 'JohnsonEmma6', 'user', '2025-01-01 10:20:00', 'no'),
(5, 'John', 'Doe', 'johndoe@pup.edu.ph', 'JDoe123456', 'user', '2025-01-01 13:30:00', 'no'),
(6, 'Timothy', 'Reyes', 'timothyreyes@outlook.com', 'TimothyReyes789', 'user', '2025-01-01 17:00:00', 'no'),
(7, 'Sophia', 'Rivera', 'sophiarivera@gmail.com', 'RiveraSophia14', 'user', '2025-01-02 08:30:07', 'no'),
(8, 'Alyssa', 'Bautista', 'alybautista@gmail.com', 'AbautAlyssa123', 'user', '2025-01-02 09:12:00', 'no'),
(9, 'Miguel', 'Delasarios', 'miguel.delacruz@gmail.com', 'MigDeLaCruz2024', 'user', '2025-01-02 09:45:07', 'no'),
(10, 'Maria', 'Luna', 'marialuna@yahoo.com', 'LunaMaria77', 'user', '2025-01-02 11:15:07', 'no'),
(11, 'Katrina', 'Santos', 'katrinasantos@yahoo.com', 'KatrinaSantos19', 'user', '2025-01-02 12:10:00', 'no'),
(12, 'James', 'Lee', 'jameslee@gmail.com', 'Lee2025James', 'user', '2025-01-02 18:31:57', 'no'),
(13, 'Anna', 'Cruz', 'annacruz@pup.edu.ph', 'CruzAnna11', 'user', '2025-01-03 10:04:57', 'no'),
(14, 'Ryan', 'Mendoza', 'ryanmendoza@pup.edu.ph', 'RyanMenzo9', 'user', '2025-01-03 11:20:17', 'no'),
(15, 'Isabel', 'Gonzales', 'isabelg@gmail.com', 'IsaGon123', 'user', '2025-01-03 13:34:50', 'no'),
(16, 'Daniel', 'Ramos', 'danramos@outlook.com', 'DanRamos101', 'user', '2025-01-03 15:04:27', 'no'),
(17, 'Angela', 'Villanueva', 'angievillanueva@gmail.com', 'AngelaV20', 'user', '2025-01-03 19:21:17', 'no'),
(18, 'Patrick', 'Santiago', 'psantiago@gmail.com', 'PatricioSan23', 'user', '2025-01-04 08:44:11', 'no'),
(19, 'Joanna', 'Cruz', 'joannacruz@pup.edu.ph', 'CruzJoanna2025', 'user', '2025-01-04 09:30:00', 'no'),
(20, 'Kevin', 'Tan', 'kevintan@gmail.com', 'KevTan08', 'user', '2025-01-04 11:44:37', 'no'),
(21, 'Patricia', 'Diaz', 'patriciadiaz@yahoo.com', 'DiazPat123', 'user', '2025-01-04 12:24:17', 'no'),
(22, 'Joshua', 'Garcia', 'jgarcia@outlook.com', 'GarciaJosh1111', 'user', '2025-01-04 15:05:27', 'no'),
(23, 'Chloe', 'Moreno', 'chloem@pup.edu.ph', 'MorenoCloe2', 'user', '2025-01-04 18:22:02', 'no'),
(24, 'Martin', 'Flores', 'martin.flores@gmail.com', 'Flo321Martin', 'user', '2025-01-04 18:30:11', 'no'),
(25, 'Bianca', 'Suarez', 'biancad@gmail.com', 'leonBianca9', 'user', '2025-01-05 10:41:15', 'no'),
(26, 'Jerome', 'Castillo', 'jeromec@outlook.com', 'CastJer01', 'user', '2025-01-05 13:03:07', 'no'),
(27, 'Camille', 'Perez', 'camille.perez@pup.edu.ph', 'CamPerez23', 'user', '2025-01-05 14:37:18', 'no'),
(28, 'Zeus', 'Lim', 'zeussslim@gmail.com', 'ZeussLim8', 'user', '2025-01-05 15:47:18', 'no'),
(29, 'Denise', 'Santos', 'denisesantos@yahoo.com', 'SantosD0909', 'user', '2025-01-05 16:47:11', 'no'),
(30, 'Leo', 'Hernandez', 'leohernandez@pup.edu.ph', 'HernanLeo7', 'user', '2025-01-06 07:17:28', 'no'),
(31, 'Grace', 'Navarro', 'gracenav@gmail.com', 'NavGrace08', 'user', '2025-01-06 08:12:28', 'no'),
(32, 'Kyle', 'Dizon', 'kyledizon@yahoo.com', 'KyleDz2025', 'user', '2025-01-06 11:37:48', 'no'),
(33, 'Hazel', 'Torres', 'hazelt@gmail.com', 'TorresHazel1234', 'user', '2025-01-06 14:27:18', 'no'),
(34, 'Sean', 'Bautista', 'sbautista@outlook.com', 'BautiSean22', 'user', '2025-01-06 18:17:28', 'no'),
(35, 'Victor', 'Fernandez', 'victorfernandez@gmail.com', 'FernanVic1', 'user', '2025-01-06 19:27:18', 'no'),
(36, 'Carla', 'Villamor', 'carlavillamor@pup.edu.ph', 'VillaCar89', 'user', '2025-01-07 10:21:40', 'no'),
(37, 'Ethan', 'Cruz', 'ethancruz@gmail.com', 'CruzeEthan123', 'user', '2025-01-07 11:22:14', 'no'),
(38, 'Olivia', 'Manalo', 'oliviam@yahoo.com', 'ManaloOivia22', 'user', '2025-01-07 13:30:21', 'no'),
(39, 'Vincent', 'Chua', 'vincentchua@outlook.com', 'ChhuaVince22', 'user', '2025-01-07 15:30:48', 'no'),
(40, 'Ella', 'Zenaida', 'zenyella@yahoo.com', 'ZenElla134', 'user', '2025-01-07 18:19:02', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`bookmarkID`);

--
-- Indexes for table `foodsubcategories`
--
ALTER TABLE `foodsubcategories`
  ADD PRIMARY KEY (`subcategoryID`);

--
-- Indexes for table `galleryposts`
--
ALTER TABLE `galleryposts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`);

--
-- Indexes for table `primaryfoodcategories`
--
ALTER TABLE `primaryfoodcategories`
  ADD PRIMARY KEY (`primaryCategoryID`);

--
-- Indexes for table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`reasonID`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipeID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`);

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
  MODIFY `bookmarkID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `foodsubcategories`
--
ALTER TABLE `foodsubcategories`
  MODIFY `subcategoryID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galleryposts`
--
ALTER TABLE `galleryposts`
  MODIFY `postID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `primaryfoodcategories`
--
ALTER TABLE `primaryfoodcategories`
  MODIFY `primaryCategoryID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `reasonID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
