-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2025 at 12:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bID` int(11) NOT NULL,
  `bDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `bstatus` varchar(20) DEFAULT NULL,
  `pyID` int(11) DEFAULT NULL,
  `cusID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bID`, `bDate`, `bstatus`, `pyID`, `cusID`) VALUES
(1, '2025-03-19 12:37:37', 'Confirmed', 1, 2),
(2, '2025-03-19 12:53:22', 'Confirmed', 3, 3),
(3, '2025-03-19 12:53:26', 'Confirmed', 1, 4),
(4, '2025-03-19 12:53:16', 'Confirmed', 2, 5),
(5, '2025-03-19 12:57:17', 'Rejected', 2, 5),
(6, '2025-03-20 07:22:43', 'Confirmed', 1, 2),
(7, '2025-04-25 08:37:14', 'Confirmed', 2, 6),
(8, '2025-05-03 15:14:46', 'Confirmed', 3, 4),
(9, '2025-05-03 15:14:52', 'Confirmed', 2, 4),
(10, '2025-05-03 15:46:35', 'Confirmed', 1, 2),
(11, '2025-05-03 15:46:32', 'Confirmed', 1, 2),
(12, '2025-05-03 15:46:27', 'Confirmed', 1, 7),
(13, '2025-05-03 15:36:34', 'Confirmed', 1, 8),
(14, '2025-05-04 05:38:06', 'Rejected', 3, 4),
(15, '2025-05-04 06:06:20', 'Confirmed', 2, 4),
(16, '2025-05-04 07:17:17', 'Confirmed', 3, 8),
(17, '2025-05-04 02:48:28', 'Confirmed', 1, 8),
(18, '2025-05-04 03:16:37', 'Confirmed', 1, 5),
(19, '2025-05-04 05:50:35', 'Rejected', 2, 5),
(20, '2025-05-04 05:59:24', 'Confirmed', 3, 5),
(21, '2025-05-04 23:38:30', 'Rejected', 2, 2),
(22, '2025-05-06 03:12:03', 'Confirmed', 3, 9),
(23, '2025-05-06 03:18:55', 'Confirmed', 1, 9),
(24, '2025-05-06 03:20:49', 'Confirmed', 3, 9),
(25, '2025-05-06 03:50:55', 'Rejected', 3, 10),
(26, '2025-05-06 03:53:23', 'Rejected', 3, 10),
(27, '2025-05-13 06:17:23', 'Rejected', 3, 2),
(28, '2025-05-13 06:37:42', 'Confirmed', 3, 2),
(29, '2025-05-20 04:04:55', 'Confirmed', 3, 12),
(30, '2025-05-20 04:42:35', 'Confirmed', 3, 13),
(31, '2025-05-20 04:47:20', 'Rejected', 2, 13),
(32, '2025-05-22 02:36:24', 'Rejected', 1, 12),
(33, '2025-05-22 02:38:46', 'Rejected', 1, 15),
(34, '2025-09-11 02:37:11', 'Rejected', 1, 16),
(35, '2025-09-11 02:44:40', 'Pending', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetail`
--

CREATE TABLE `bookingdetail` (
  `bkID` int(11) NOT NULL,
  `payimg` varchar(255) DEFAULT NULL,
  `bkPQ` int(11) DEFAULT NULL,
  `bID` int(11) DEFAULT NULL,
  `pgID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookingdetail`
--

INSERT INTO `bookingdetail` (`bkID`, `payimg`, `bkPQ`, `bID`, `pgID`) VALUES
(1, '67daba738a3eb9.83999738.jpg', 10, 1, 8),
(2, '67dabca802ea54.88922285.jpg', 5, 2, 12),
(3, '67dabd3b9e6aa8.79235032.jpg', 8, 3, 7),
(4, '67dabde4562580.97986285.avif', 5, 4, 6),
(5, '67dabf21ae2542.77983388.jpg', 5, 5, 12),
(6, '67dbc1e6858af8.29063826.jpg', 1, 6, 13),
(7, '680b49426b6a46.94447780.png', 5, 7, 8),
(8, '6816326d6b42f8.41769742.jpg', 10, 8, 21),
(9, '681632b7e47540.04506375.avif', 5, 9, 20),
(10, '68163622a800e2.19779106.jpg', 10, 10, 21),
(11, '681636498f61c2.37410347.jpg', 8, 11, 18),
(12, '6816373408a528.19766591.jpg', 5, 12, 20),
(13, '681637cf8e6f93.31883601.jpg', 15, 13, 16),
(14, '6816fd344ff644.57135918.png', 10, 14, 19),
(15, '681703c37d1472.43671313.avif', 3, 15, 16),
(16, '68171402212b00.77039466.jpg', 5, 16, 22),
(17, '681714c4187ec9.07043187.jpg', 5, 17, 20),
(18, '68171b5d86eab2.40929303.jpg', 2, 18, 18),
(19, '68173f7383d380.59863617.jpg', 5, 19, 22),
(20, '68174184cf0765.17696201.jpg', 5, 20, 19),
(21, '681839be47c1c4.62657946.jpg', 5, 21, 21),
(22, '6819bd4b0d4ab4.83662748.jpg', 5, 22, 21),
(23, '6819bee79e2320.28560357.jpg', 2, 23, 18),
(24, '6819bf59df7690.17213098.jpg', 1, 24, 22),
(25, '6819c667cf99a5.28509040.jpg', 2, 25, 20),
(26, '6819c6fba2c132.88102069.jpg', 2, 26, 20),
(27, '6823233b090c25.27068942.jpg', 5, 27, 20),
(28, '682327fe8e5860.48805869.jpg', 5, 28, 20),
(29, '682c3eaf83ea27.66805736.jpg', 5, 29, 21),
(30, '682c4783503305.09558759.jpg', 5, 30, 21),
(31, '682c48a0a15192.21808863.jpg', 10, 31, 22),
(32, '682eccf071d4b9.77724856.jpg', 1, 32, 18),
(33, '682ecd7ed9dbc2.47837635.jpg', 4, 33, 22),
(34, '68c2751f895560.63861119.webp', 5, 34, 32),
(35, '68c276e0963706.09804910.jpg', 4, 35, 32);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carID` int(11) NOT NULL,
  `carType` varchar(50) DEFAULT NULL,
  `avaPeople` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carID`, `carType`, `avaPeople`) VALUES
(1, 'Toyota Coaster', '20'),
(2, 'Mitsubishi Fuso Rosa', '20'),
(3, 'Isuzu Turquoise', '30'),
(4, 'Scania Citywide', '40'),
(5, 'Mini Vans', '20');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cusID` int(11) NOT NULL,
  `cusName` varchar(50) DEFAULT NULL,
  `cusEmail` varchar(50) DEFAULT NULL,
  `cusPh` varchar(20) DEFAULT NULL,
  `cusPw` varchar(100) DEFAULT NULL,
  `cusImg` varchar(100) DEFAULT NULL,
  `cusToken` varchar(64) DEFAULT NULL,
  `tokenExp` datetime DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusID`, `cusName`, `cusEmail`, `cusPh`, `cusPw`, `cusImg`, `cusToken`, `tokenExp`, `created`) VALUES
(2, 'Myo Han Ko', 'myo@gmail.com', '0912312312', '$2y$10$8oEdPHjureF08Oa1DNYXFuM3w3Tt931W.D9ATmJSne0pQjCzR0g32', '67dab9f5a896f2.17592772.jpg', 'cd2fb9c53878569b1e54893b02790f83', '2025-06-02 17:27:39', '2025-05-03 15:27:39'),
(3, 'Sai Sai', 'sai@gmail.com', '0912312319', '$2y$10$TCUIQOyr//kVyK5E60YfCeyUxQDsnGyZffRhOrhXujeRQp3pcX2yG', '67dabb9954d265.44307686.jpg', NULL, NULL, '2025-03-19 07:12:01'),
(4, 'Tin Tin', 'tin@gmail.com', '0912312316', '$2y$10$rw0ofxPdCj6v1CX8MOFS8OhgQMe4VO3uC7RtChmQVtqrzOU6/2hKG', '67dabcff930dd6.74043451.png', '06052c160445fe7a9bae27213cd60a94', '2025-06-03 07:37:29', '2025-05-04 05:37:29'),
(5, 'Thet Paing', 'thet@gmail.com', '0912312313', '$2y$10$rkZXe8RmeBfR8FtRYnZAOuYLewyG3mJyS6XlWL5Sa89QiWhRcqiwe', '67dabd91f226a8.25528301.jpg', NULL, NULL, '2025-03-19 07:20:25'),
(6, 'Aung Phyo', 'aung@gmail.com', '0912312312', '$2y$10$aBSuKmAtWSqAqJBGx6sHzurx3qvL2DvHyCvdd.I9G4I8AkyOnNP3y', '680b48e9cf27a1.68456860.jpg', NULL, NULL, '2025-04-25 04:03:45'),
(7, 'Zue Zue', 'zue@gmail.com', '0912312316', '$2y$10$a8n5VJq2l5vbwV31tGEJdOo6rTLr.OByB0xtIVpbX2vWsB5BX0qi2', '681636e13715d2.32606196.jpg', NULL, NULL, '2025-05-03 11:01:45'),
(8, 'Wunna', 'wunna@gmail.com', '0912312314', '$2y$10$tafa4OfDxdUwPVURTDbVuebDkUL5os731fBsF.O93MWgsBW1tvwhO', '681637b428c741.73275678.png', NULL, NULL, '2025-05-03 11:05:16'),
(9, 'Myo Code', 'myoforcode23@gmail.com', '0912312314', '$2y$10$.YKECY.je76wZndD0K5dQuTv1TZQah8cr5Wi6m3SbTWepBOQLdHQu', '6819bd34a6ac59.38684376.png', 'dcd5c4064398cd5c1b8505f75e8f3b02', '2025-06-05 09:43:45', '2025-05-06 07:43:45'),
(10, 'Aung Phyo', 'aungphyokhant2318@gmail.com', '0912312312', '$2y$10$WTL1fyVXLonTUFW1CA7oq.dPQR895ejsF5SsCPwCU3SVJNENRaEV.', '6819c62c5fc201.03259498.jpg', NULL, NULL, '2025-05-06 08:22:49'),
(11, 'Myo Han', 'myo@gmail.com', '0912312312', '$2y$10$Ib0UD/Ev3GHeecKMCsV4gOgZCe9NjBxO.3W.5rgH6FP2RUmT6ViGG', '68288cd6436418.21315474.png', NULL, NULL, '2025-05-17 08:49:18'),
(12, 'Myo Test', 'myotest@gmail.com', '0912121212', '$2y$10$CKjBpqH0X75lZMSrNETL6e9FCsh4ftHVUXaViUg5yH8AmwsX34Vv2', '68288dd80178c1.97984802.png', 'da4c808b944bf90524a65455f103ea9d', '2025-06-21 09:05:48', '2025-05-22 07:05:48'),
(13, 'Wunna Tun', 'wunnatunsai940@gmail.com', '0912312319', '$2y$10$WiAGnB0bLCX3deVE7pGjBOGAZHYU8DM.uxVTD8fp3R3RLx5SDY8/.', '682c453e3720d4.46742303.png', NULL, NULL, '2025-05-20 04:32:54'),
(14, 'Sai Sai', 'wunnatunsai940@gmail.com', '0912312312', '$2y$10$.j2BolzyhC862.N36YKJCOBhRSZjyv.V2tJH2Tyac9aQq3EW1s/fi', '682c45cba9dda4.42396479.png', NULL, NULL, '2025-05-20 04:35:15'),
(15, 'Aye Moe Aung', 'ayemoeaung@gmail.com', '0912312312', '$2y$10$pZAazArrnvzTUezHEMGGaOuv63XNtPNtUd97/pNyLA2127nTtQ41S', '682ecd61933406.96111287.jpg', NULL, NULL, '2025-05-22 02:38:17'),
(16, 'Hla Hla', 'hlahla@gmail.com', '0912312312', '$2y$10$ZA5DJbR2Ymc41K9dgEtOjev2/AWL7ksAn80kR8W6x6nGibz5RWh/y', '68c274ff57e043.89508670.jpg', NULL, NULL, '2025-09-11 02:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fID` int(11) NOT NULL,
  `fDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rate` varchar(20) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `cusID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fID`, `fDate`, `rate`, `comment`, `cusID`) VALUES
(1, '2025-05-18 11:03:11', '5', 'What a site!', 12),
(2, '2025-05-18 11:30:11', '3', 'Please make more beach packages.', 2),
(3, '2025-05-18 11:31:12', '4', 'Best services during journey.', 4),
(4, '2025-05-20 07:51:42', '4', 'Got a lot of pleasure with this travel agency trip.', 12);

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `guID` int(11) NOT NULL,
  `guImg` varchar(100) DEFAULT NULL,
  `guName` varchar(50) DEFAULT NULL,
  `guLanguage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`guID`, `guImg`, `guName`, `guLanguage`) VALUES
(1, '67d3ddbb8c40d5.19398183.png', 'Aye Aye', 'English'),
(2, '67d3c5118385d0.25540811.png', 'Mg Kyaw Min Khant', 'Myanmar'),
(3, '67d2d9f79994b9.83812325.png', 'Mg Sai Wanna', 'English'),
(4, '682f0def4d6ae8.82004165.png', 'Hla Hla', 'Myanmar'),
(6, '6835745142df09.58550476.png', 'Pyae Pyae', 'Myanmar');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotID` int(11) NOT NULL,
  `hoName` varchar(100) DEFAULT NULL,
  `hoAdd` varchar(100) DEFAULT NULL,
  `hoRating` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotID`, `hoName`, `hoAdd`, `hoRating`) VALUES
(1, 'Sedona Hotel', 'Kaba Aye Pagoda Road, Yankin Township', '5'),
(2, 'Kalaw Heritage Hotel', 'No. 3 Quarter, University Road, Shan State, Kalaw 11101', '4'),
(3, 'Bay Of Inle Hotel', 'Myanmar (Nan Thae Street, Nyaungshwe)', '4'),
(4, 'Heritage Bagan Hotel', 'Nyaung Oo Airport Road, Myay Nal Lay Quarter, Nyaung Oo Township. Bagan', '4'),
(5, 'Bh Hotel', ' Bayint naung , Lan shan state,rangoon, Taunggyi', '4'),
(6, 'Mansu Hotel', '(8) Ward, Thein Ni Road, Hsipaw-Lashio Road, Lashio, Myanmar', '4'),
(7, 'Attran Hotel', 'Bogyoke Lan, Mawlamyine', '4'),
(8, 'Mountain Top Hotel', ' Near Kyaiktiyo Pagoda, Adjacent to the, Road to Kyaikhtiyo', '4'),
(10, 'Amazing Chaung Tha Resort', ' Chaung Tha Village, Ayeyarwady Division, Myanmar', '4'),
(11, 'Bagan Thande Hotel', 'Old Bagan, Near Bagan Archaeological Museum, Bagan, Myanmar', '4'),
(12, ' The Strand Yangon', '92 Strand Road, Yangon, Myanmar', '4'),
(13, 'Bayview – The Beach Resort', 'Ngapali Beach, Thandwe, Rakhine State, Myanmar', '4'),
(14, 'Royal Taunggyi Hotel', 'No. 130, University Road, Taunggyi, Myanmar', '4');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pgID` int(11) NOT NULL,
  `pgtitle` varchar(100) DEFAULT NULL,
  `pgImg` varchar(100) DEFAULT NULL,
  `pgPrice` varchar(20) DEFAULT NULL,
  `pgduration` int(4) DEFAULT NULL,
  `numOfPeo` int(4) DEFAULT NULL,
  `pgLeaveDate` varchar(50) DEFAULT NULL,
  `pgInfo` text DEFAULT NULL,
  `pgCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `pgUpdated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `plID` int(11) DEFAULT NULL,
  `hotID` int(11) DEFAULT NULL,
  `guID` int(11) DEFAULT NULL,
  `carID` int(11) DEFAULT NULL,
  `pgStatus` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pgID`, `pgtitle`, `pgImg`, `pgPrice`, `pgduration`, `numOfPeo`, `pgLeaveDate`, `pgInfo`, `pgCreated`, `pgUpdated`, `plID`, `hotID`, `guID`, `carID`, `pgStatus`) VALUES
(6, 'Enchanting Kalaw: 5-Day Scenic Adventure', '67d79ca6536eb5.39161594.jpg', '500,000', 5, 20, '2025-03-31 : 08:00', 'Day 1: Arrival in Kalaw\r\nDepart from Mandalay by private car or bus to Kalaw.\r\nCheck-in the hotel.\r\nEvening at leisure to explore the town.\r\n\r\nDay 2: Kalaw Exploration\r\nVisit Kalaw Market to experience local life and shop for handicrafts.\r\nExplore colonial-era architecture and the Kalaw Railway Station.\r\nOptional cycling tour around Kalaw to enjoy scenic views.\r\n\r\nDay 3: Trekking Adventure\r\nEmbark on a full-day trek through the Shan hills, visiting indigenous villages and experiencing local culture.\r\nEnjoy a traditional lunch in a village setting.\r\nReturn to the hotel in the late afternoon.\r\n\r\nDay 4: Pindaya Caves Excursion\r\nDrive to Pindaya to explore the famous Pindaya Caves, home to thousands of Buddha images.\r\nVisit local workshops to see traditional Shan paper and umbrella making.\r\nReturn to Kalaw in the evening.\r\n\r\nDay 5: Departure \r\nMorning at leisure for last-minute shopping or relaxation.\r\nCheck out from the hotel and depart.', '2025-03-14 07:06:16', '2025-04-25 08:36:06', 4, 2, 1, 2, 'expired'),
(7, 'Inle Lake Serenity: 6-Day Overland Adventure', '67d79c3b5ea3d4.34393855.jpeg', '700,000', 6, 30, '2025-04-15 : 10:00', 'Day 1: Depart from Mandalay by private minibus to Nyaung Shwe (approximately 10-hour drive). Check-in at KMA Inle Hotel.​\r\n\r\nDay 2: Full-day boat tour of Inle Lake, visiting floating gardens, stilted villages, and Phaung Daw Oo Pagoda.​\r\n\r\nDay 3: Visit Indein Village and explore the ancient pagoda complex. Afternoon at leisure.​\r\n\r\nDay 4: Morning visit to Red Mountain Estate Vineyards for a tour and wine tasting. Afternoon free for optional activities.​\r\n\r\nDay 5: Explore local markets and artisan workshops in Nyaung Shwe.​\r\n\r\nDay 6: Return journey to Mandalay by private minibus.', '2025-03-16 22:21:23', '2025-04-25 08:36:06', 3, 3, 1, 3, 'expired'),
(8, 'Enchanting Bagan: 5-Day Cultural Expedition', '67d7a54b451dd7.20782921.jpg', '500,000', 5, 40, '2025-04-20 : 08:00', 'Day 1: Arrival in Bagan\nDepart from  Mandalay by private car or bus to Bagan.​\nCheck-in the hotel.​\nEvening at leisure to explore the local area.​\n\nDay 2: Temple Exploration\nVisit iconic temples such as Ananda Temple and Shwezigon Pagoda.​\nExplore lesser-known temples for a more intimate experience.​\nOptional hot air balloon ride over Bagan at sunrise.​\n\nDay 3: Cultural Immersion\nVisit a local village to experience traditional Burmese life.​\nParticipate in a cooking class to learn Burmese cuisine.​\nEvening visit to a lacquerware workshop to see traditional crafts.​\n\nDay 4: Mount Popa Excursion\nDrive to Mount Popa, an extinct volcano with a monastery atop.​\nClimb the 777 steps to the monastery for panoramic views.​\nReturn to Bagan for a sunset boat ride on the Irrawaddy River.​\n\nDay 5: Departure\nMorning at leisure for last-minute shopping or relaxation.​\nCheck out from the hotel and depart by bus.', '2025-03-16 22:48:25', '2025-05-02 15:23:49', 2, 4, 3, 4, 'expired'),
(9, 'Taunggyi Cultural and Scenic Exploration Journey', '67dbca3f116ec5.90790812.jpg', '550,000', 5, 20, '2025-04-01 : 13:00', 'Day 1: Arrival in Taunggyi\r\nDepart from Mandalay by minibus to Taunggyi.​\r\nCheck-in the hotel.\r\nEvening at leisure to explore the local markets and enjoy traditional Shan cuisine.​\r\n\r\nDay 2: Explore Taunggyi\r\nVisit the Taunggyi Cultural Museum to learn about Shan culture and history.​\r\nExplore the bustling Myoma Market, known for local handicrafts and produce.​\r\nAfternoon visit to Sulamuni Pagoda, offering panoramic views of the city.​\r\n\r\nDay 3: Excursion to Kakku Pagodas\r\nDrive to the Kakku Pagoda complex, home to over 2,000 ancient stupas.​\r\nGuided tour of the site, learning about its historical and cultural significance.​\r\nEnjoy a traditional lunch at a local restaurant.​\r\nReturn to Taunggyi in the late afternoon.​\r\n\r\nDay 4: Visit Inle Lake\r\nDrive to Nyaung Shwe and take a boat tour of Inle Lake.​\r\nVisit floating gardens, stilted villages, and the Phaung Daw Oo Pagoda.​\r\nExperience traditional Intha fishing techniques.​\r\nReturn to Taunggyi in the evening.​\r\n\r\nDay 5: Departure\r\nMorning at leisure for last-minute shopping or relaxation.​\r\nCheck out from the hotel and depart by car.', '2025-03-17 01:51:10', '2025-04-25 08:36:06', 6, 5, 1, 2, 'expired'),
(10, 'Lashio Adventure, Cultural and Natural Exploration', '67d7d22c91fbd8.66942771.jpg', '500,000', 4, 20, '2025-04-05 : 12:30', 'Day 1: Journey to Lashio\r\nDepart from Mandalay by minibus to Lashio.​\r\nCheck-in the hotel.​\r\nEvening at leisure to explore the local surroundings.\r\n​\r\nDay 2: Cultural Immersion and Natural Wonders\r\nVisit the bustling Lashio Market to experience local life and shop for traditional crafts.​\r\nExplore the Quan Yin San Temple, a significant Chinese temple reflecting the town\'s cultural diversity.​\r\nAfternoon visit to the Lashio Hot Springs for relaxation.​\r\n\r\nDay 3: Trekking and Village Experience\r\nEmbark on a guided trek through the Shan hills, visiting indigenous villages and experiencing local culture.​\r\nEnjoy a traditional lunch in a village setting.​\r\nReturn to the hotel in the late afternoon.​\r\n\r\nDay 4: Departure\r\nMorning at leisure for last-minute shopping or relaxation.​\r\nCheck out from the hotel and depart by bus.', '2025-03-17 02:04:25', '2025-04-25 08:36:06', 5, 6, 3, 1, 'expired'),
(12, 'Pagoda Pilgrimage: Exploring Kyaikto Sacred Sites', '67d7daa6c0c6d7.06941492.jpg', '500,000', 5, 40, '2025-04-10 : 08:00', 'Day 1: Mandalay to Kyaikto\r\nDepart from Mandalay by minibus, heading to Kyaikto. The journey takes approximately 8 to 9 hours, covering a distance of about 600 kilometers.​\r\nAccommodation: Check into a hotel in Kyaikto.​\r\n\r\nDay 2: Kyaiktiyo Pagoda (Golden Rock)\r\nExplore the Kyaiktiyo Pagoda, also known as the Golden Rock, a significant Buddhist pilgrimage site where a golden boulder appears to defy gravity. ​\r\nLearn about the legends surrounding the Golden Rock and observe the rituals performed by devotees.​\r\n\r\nDay 3: Additional Pagoda Visits\r\nExplore other notable pagodas in the Kyaikto area, such as the Kyaukthanban Pagoda, also known as the Stone Boat Pagoda, which is associated with the legend of the Golden Rock\'s transportation. ​\r\nEngage with local monks and pilgrims, and participate in meditation sessions if available.​\r\n\r\nDay 4: Cultural Exploration\r\nExplore local monasteries and temples to gain insight into the region\'s Buddhist practices and architecture.​\r\nVisit local markets and interact with artisans to experience the local culture and craftsmanship.​\r\n\r\nDay 5: Return to Mandalay\r\nDepart from Kyaikto by minibus, returning to Mandalay, concluding the trip.', '2025-03-17 02:47:42', '2025-04-25 08:36:06', 8, 8, 2, 4, 'expired'),
(13, 'Mandalay Winter Trip', '67dbcc258b4bb1.94687074.jpg', '200,000', 5, 20, '2025-03-21 : 05:45', 'aaaa', '2025-03-20 01:42:18', '2025-04-25 08:36:06', 2, 5, 1, 5, 'expired'),
(16, 'Bagan Discovery – 4 Days / 3 Nights', '6815cbb2786932.99791234.jpg', '500,000', 4, 30, '2025-05-30 : 06:00', 'Day 1: Journey to Bagan\r\nDepart from Mandalay by private car or bus to Bagan.\r\n\r\nCheck-in at the hotel.\r\n\r\nEvening at leisure to explore the local surroundings.\r\n\r\nDay 2: Temple Exploration and Cultural Sites\r\nVisit the bustling Nyaung U Market to experience local life and shop for traditional crafts.\r\n\r\nExplore Shwezigon Pagoda, a prototype of Burmese stupas.\r\n\r\nDiscover Ananda Temple, renowned for its architectural beauty.\r\n\r\nOptional: Enjoy a traditional Burmese dinner at a local restaurant.\r\n\r\nDay 3: Mount Popa Excursion\r\nEmbark on a guided trek to Mount Popa, an extinct volcano and pilgrimage site.\r\n\r\nClimb the 777 steps to the summit of Taung Kalat Monastery, home to revered nats (spirits).\r\n\r\nEnjoy a traditional lunch in a village setting.\r\n\r\nReturn to the hotel in the late afternoon.\r\n\r\nDay 4: Departure\r\nMorning at leisure for last-minute shopping or relaxation.\r\n\r\nCheck out from the hotel and depart by bus.', '2025-05-03 03:22:04', '2025-09-11 07:03:13', 2, 4, 1, 3, 'expired'),
(17, 'Taunggyi Cultural and Scenic Exploration: 5-Day Journey', '6816087ae818f8.55131522.jpg', '700,000', 5, 20, '2025-05-30 : 08:00', 'Day 1: Arrival in Taunggyi\r\n\r\nDepart from Mandalay by private car to Taunggyi.\r\n\r\nCheck-in at Hotel.\r\n\r\nEvening at leisure to explore the local markets and enjoy traditional Shan cuisine.\r\n\r\n\r\nDay 2: Explore Taunggyi\r\n\r\nVisit the Taunggyi Cultural Museum to learn about Shan culture and history.\r\n\r\nExplore the bustling Myoma Market, known for local handicrafts and produce.\r\n\r\nAfternoon visit to Sulamuni Pagoda, offering panoramic views of the city.\r\n\r\n\r\nDay 3: Excursion to Kakku Pagodas\r\n\r\nDrive to the Kakku Pagoda complex, home to over 2,000 ancient stupas.\r\ntripadvisor.in\r\n\r\nGuided tour of the site, learning about its historical and cultural significance.\r\n\r\nEnjoy a traditional lunch at a local restaurant.\r\n\r\nReturn to Taunggyi in the late afternoon.\r\n\r\n\r\nDay 4: Visit Inle Lake\r\n\r\nDrive to Nyaung Shwe and take a boat tour of Inle Lake.\r\n\r\nVisit floating gardens, stilted villages, and the Phaung Daw Oo Pagoda.\r\n\r\nExperience traditional Intha fishing techniques.\r\n\r\nReturn to Taunggyi in the evening.\r\n\r\n\r\nDay 5: Departure\r\n\r\nMorning at leisure for last-minute shopping or relaxation.\r\n\r\nCheck out from the hotel and depart by car.', '2025-05-03 07:43:46', '2025-09-11 07:03:13', 6, 5, 2, 2, 'expired'),
(18, '\"Inle Lake Serenity: 6-Day Overland Adventure', '6816090798d291.26071763.jpeg', '700,000', 6, 40, '2025-06-05 : 07:00', 'Day 1: Depart from Yangon by private minibus to Nyaung Shwe (approximately 10-hour drive). Check-in at KMA Inle Hotel.\r\n\r\n\r\nDay 2: Full-day boat tour of Inle Lake, visiting floating gardens, stilted villages, and Phaung Daw Oo Pagoda.\r\n\r\n\r\nDay 3: Visit Indein Village and explore the ancient pagoda complex. Afternoon at leisure.\r\n\r\n\r\nDay 4: Morning visit to Red Mountain Estate Vineyards for a tour and wine tasting. Afternoon free for optional activities.\r\n\r\n\r\nDay 5: Explore local markets and artisan workshops in Nyaung Shwe.\r\n\r\n\r\nDay 6: Return journey to Yangon by private minibus.', '2025-05-03 07:46:07', '2025-09-11 07:03:13', 3, 3, 3, 4, 'expired'),
(19, 'Enchanting Kalaw: 5-Day Scenic Adventure', '681609cd46d7b8.55817915.jpg', '600,000', 5, 30, '2025-07-01 : 06:00', 'Day 1: Arrival in Kalaw\r\n\r\nDepart from Mandalay by private car or bus to Kalaw.\r\n\r\nCheck-in at Hotel.\r\n\r\nEvening at leisure to explore the town.\r\n\r\n\r\nDay 2: Kalaw Exploration\r\n\r\nVisit Kalaw Market to experience local life and shop for handicrafts.\r\n\r\nExplore colonial-era architecture and the Kalaw Railway Station.\r\n\r\nOptional cycling tour around Kalaw to enjoy scenic views.\r\n\r\n\r\nDay 3: Trekking Adventure\r\n\r\nEmbark on a full-day trek through the Shan hills, visiting indigenous villages and experiencing local culture.\r\n\r\nEnjoy a traditional lunch in a village setting.\r\n\r\nReturn to the hotel in the late afternoon.\r\n\r\n\r\nDay 4: Pindaya Caves Excursion\r\n\r\nDrive to Pindaya to explore the famous Pindaya Caves, home to thousands of Buddha images.\r\n\r\nVisit local workshops to see traditional Shan paper and umbrella making.\r\n\r\nReturn to Kalaw in the evening.\r\n\r\n\r\nDay 5: Departure\r\n\r\nMorning at leisure for last-minute shopping or relaxation.\r\n\r\nCheck out from the hotel and depart by bus.', '2025-05-03 07:49:25', '2025-09-11 07:03:13', 4, 2, 4, 3, 'expired'),
(20, 'Yangon Thadingyut Trip', '68160a9a76f912.14653382.jpg', '700,000', 5, 20, '2025-10-10 : 08:00', 'Day 1: Yangon City Exploration\r\n\r\nMorning: Begin with a visit to the Shwedagon Pagoda, Yangon\'s most iconic landmark.\r\n\r\nAfternoon: Explore the Sule Pagoda and the surrounding colonial-era architecture.\r\n\r\nEvening: Stroll through the Bogyoke Aung San Market (Scott Market) for local crafts and souvenirs.\r\n\r\n\r\nDay 2: Cultural and Historical Sites\r\n\r\nMorning: Visit the Chaukhtatgyi Buddha Temple, home to a giant reclining Buddha statue.\r\n\r\nAfternoon: Explore the National Museum to delve into Myanmar\'s rich history.\r\n\r\nEvening: Enjoy a traditional Burmese dinner at a local restaurant.\r\n\r\n\r\nDay 3: Day Trip to Bago\r\n\r\nMorning: Drive to Bago (approximately 1.5 hours from Yangon) to visit the Shwemawdaw Pagoda and the Kanbawzathadi Palace.\r\n\r\nAfternoon: Explore the Kyaik Pun Pagoda, known for its four giant Buddha images.\r\n\r\nEvening: Return to Yangon and relax at your hotel.\r\n\r\n\r\nDay 4: Yangon Surroundings\r\n\r\nMorning: Visit the Kandawgyi Lake and the Karaweik Palace.\r\n\r\nAfternoon: Take a short trip to the Thanlyin (formerly Syriam) to visit the Kyauktan Ye Le Pagoda, situated on a small island in the river.\r\n\r\nEvening: Return to Yangon and explore the vibrant Chinatown area.\r\n\r\n\r\nDay 5: Leisure and Departure\r\n\r\nMorning: Free time for shopping or additional sightseeing.\r\n\r\nAfternoon: Conclude your tour.', '2025-05-03 07:52:50', NULL, 1, 1, 1, 2, 'active'),
(21, 'Mandalay to Mawlamyine: A 6-Day Cultural Odyssey', '68162cdcad7da9.77832677.jpg', '700,000', 6, 40, '2025-06-30 : 06:00', 'Day 1: Departure from Mandalay to Mawlamyine\r\n\r\nMorning: Depart from Mandalay by private car or bus. The journey to Mawlamyine typically takes approximately 13 hours, covering a distance of about 753 km. \r\nrome2rio.com\r\n\r\nEvening: Arrive in Mawlamyine, check into your accommodation, and rest after the long journey.\r\n\r\n\r\nDay 2: Exploring Mawlamyine\r\n\r\nMorning: Visit the Kyaik Than Lan Pagoda, the tallest and most prominent pagoda in the region, offering panoramic views of the city.\r\n\r\nAfternoon: Explore the Mawlamyine Market to experience local life and shop for regional handicrafts.\r\n\r\nEvening: Take a leisurely walk along the Strand Road promenade, enjoying the sunset over the Thanlwin River.\r\n\r\n\r\nDay 3: Day Trip to Thanbyuzayat\r\n\r\nMorning: Travel by car to Thanbyuzayat, approximately 30 km from Mawlamyine, to visit the Death Railway Museum and the nearby war cemetery, commemorating those who perished during the construction of the Burma Railway.\r\n\r\nAfternoon: Visit the nearby villages to observe traditional lifestyles and local industries.\r\n\r\nEvening: Return to Mawlamyine and relax at your accommodation.\r\n\r\n\r\nDay 4: Visit to Hpa-An\r\n\r\nMorning: Depart for Hpa-An by private car, a journey of about 2 hours. Explore the Kawthoolone Cave and the Sadan Cave, both renowned for their impressive Buddhist shrines and natural formations.\r\n\r\nAfternoon: Visit the Kyauk Ka Lat Pagoda, a picturesque temple situated on a rocky outcrop in a lake.\r\n\r\nEvening: Return to Mawlamyine and enjoy a traditional Burmese dinner at a local restaurant.\r\n\r\n\r\nDay 5: Exploration of Mawlamyine\'s Surroundings\r\n\r\nMorning: Take a boat trip on the Thanlwin River to visit the villages along the riverbank, observing traditional fishing methods and rural life.\r\n\r\nAfternoon: Visit the U Zina Pagoda, known for its unique architecture and serene environment.\r\n\r\nEvening: Attend a cultural performance or enjoy a local music show to experience the regional arts scene.\r\n\r\n\r\nDay 6: Return to Mandalay\r\n\r\nMorning: Depart from Mawlamyine to Mandalay by private car or bus, retracing your route.\r\nrome2rio.com\r\n\r\nEvening: Arrive in Mandalay, concluding your 6-day journey.', '2025-05-03 10:19:00', '2025-09-11 07:03:13', 7, 7, 3, 4, 'expired'),
(22, 'Golden Rock Pilgrimage and Cultural Exploration', '68162db4a46ef4.22738701.jpg', '600,000', 5, 30, '2025-07-01 : 07:00', 'Day 1: Mandalay to Kyaikto\r\n\r\nTravel: Depart from Mandalay by private car, heading to Kyaikto. The journey takes approximately 8 to 9 hours, covering a distance of about 600 kilometers.\r\n\r\nAccommodation: Check into a hotel in Kyaikto.\r\n\r\n\r\nDay 2: Kyaiktiyo Pagoda (Golden Rock)\r\n\r\nVisit: Explore the Kyaiktiyo Pagoda, also known as the Golden Rock, a significant Buddhist pilgrimage site where a golden boulder appears to defy gravity. \r\nen.wikipedia.org\r\n\r\nActivities: Learn about the legends surrounding the Golden Rock and observe the rituals performed by devotees.\r\ntibetanbuddhistencyclopedia.com\r\n\r\n\r\nDay 3: Additional Pagoda Visits\r\n\r\nVisit: Explore other notable pagodas in the Kyaikto area, such as the Kyaukthanban Pagoda, also known as the Stone Boat Pagoda, which is associated with the legend of the Golden Rock\'s transportation. \r\nen.wikipedia.org\r\n\r\nActivities: Engage with local monks and pilgrims, and participate in meditation sessions if available.\r\n\r\n\r\nDay 4: Cultural Exploration\r\n\r\nVisit: Explore local monasteries and temples to gain insight into the region\'s Buddhist practices and architecture.\r\n\r\nActivities: Visit local markets and interact with artisans to experience the local culture and craftsmanship.\r\n\r\n\r\nDay 5: Return to Mandalay\r\n\r\nTravel: Depart from Kyaikto by private car, returning to Mandalay, concluding the trip.', '2025-05-03 10:22:36', '2025-09-11 07:03:13', 8, 8, 4, 3, 'expired'),
(26, 'Chaung Thar Coastal Escape – 4 Days / 3 Nights', '683563b36b0e21.89737077.jpg', '500,000', 4, 20, '2025-07-31 : 06:00', 'Day 1: Journey to Chaung Thar\r\n\r\nDepart from Mandalay by private car or bus to Chaung Thar Beach.\r\n\r\nCheck-in at your selected hotel.\r\n\r\nRelax and enjoy the beach atmosphere.\r\n\r\n\r\nDay 2: Beach Activities and Local Exploration\r\n\r\nEnjoy a leisurely breakfast at the hotel.\r\n\r\nParticipate in beach activities such as swimming, sunbathing, or beach volleyball.\r\n\r\nExplore local markets and sample fresh seafood.\r\n\r\nOptional: Sunset boat ride along the coast.\r\n\r\n\r\nDay 3: Cultural Sites and Nature Walks\r\n\r\nVisit the nearby pagoda situated on a rock formation by the sea.\r\n\r\nTake a guided nature walk to explore the coastal flora and fauna.\r\n\r\nEnjoy a traditional Burmese lunch at a local eatery.\r\n\r\nEvening at leisure to explore the town or relax at the hotel.\r\n\r\n\r\nDay 4: Departure\r\n\r\nMorning at leisure for last-minute shopping or beach time.\r\n\r\nCheck out from the hotel and depart for Mandalay by car or bus.', '2025-05-27 02:33:15', '2025-09-11 07:03:13', 10, 10, 1, 2, 'expired'),
(27, 'Bagan Immersion – 3 Days / 2 Nights', '68356a3b183ca4.68453047.jpg', '400,000', 3, 30, '2025-06-30 : 06:00', 'Day 1: Arrival and Initial Exploration\r\n\r\nDepart from Mandalay by private car or bus to Bagan.\r\n\r\nCheck-in at your selected hotel.\r\n\r\nVisit Nyaung U Market to experience local life and shop for traditional crafts.\r\n\r\nExplore Shwezigon Pagoda and Ananda Temple.\r\n\r\nOptional: Enjoy a traditional Burmese dinner at a local restaurant.\r\n\r\n\r\nDay 2: Mount Popa Excursion\r\n\r\nEmbark on a guided trek to Mount Popa, an extinct volcano and pilgrimage site.\r\n\r\nClimb the 777 steps to the summit of Taung Kalat Monastery, home to revered nats (spirits).\r\n\r\nEnjoy a traditional lunch in a village setting.\r\n\r\nReturn to the hotel in the late afternoon.\r\n\r\n\r\nDay 3: Sunrise and Departure\r\n\r\nEarly morning: Witness the sunrise over Bagan\'s temples.\r\n\r\nOptional: Take a hot air balloon ride for panoramic views.\r\n\r\nVisit additional temples or relax at the hotel.\r\n\r\nCheck out from the hotel and depart  by car or bus.', '2025-05-27 03:01:07', '2025-09-11 07:03:13', 2, 11, 3, 3, 'expired'),
(28, 'Yangon Discovery – 7 Days / 6 Nights', '68356cc5d73fb3.18344435.jpg', '800,000', 7, 30, '2025-07-20 : 20:09', 'Day 1: Arrival in Yangon\r\n\r\nArrive and settle into hotel.\r\n\r\nEvening visit to Shwedagon Pagoda to witness the stupa illuminated at night.\r\n\r\n\r\nDay 2: Historical Landmarks\r\n\r\nTour Sule Pagoda and nearby colonial buildings.\r\n\r\nVisit Theingyi Market, the largest traditional market in downtown Yangon. \r\n\r\n\r\nDay 3: Bago Exploration\r\n\r\nDay trip to Bago to see Shwemawdaw Pagoda, Kanbawzathadi Palace, and Shwethalyaung Reclining Buddha.\r\n\r\n\r\nDay 4: Dala Township Visit\r\n\r\nTake a ferry across the Yangon River to Dala Township.\r\n\r\nExplore local villages, markets, and experience rural life.\r\n\r\n\r\nDay 5: Twante Pottery Village\r\n\r\nDrive to Twante, known for its pottery industry.\r\n\r\nVisit workshops and learn about traditional pottery-making techniques.\r\n\r\n\r\nDay 6: Leisure and Shopping\r\n\r\nSpend the day at leisure, shopping at Bogyoke Aung San Market or exploring other parts of the city.\r\n\r\n\r\nDay 7: Departure\r\n\r\nConclude your trip.\r\n', '2025-05-27 03:11:57', '2025-09-11 07:03:13', 1, 12, 2, 3, 'expired'),
(29, 'Ngapali Serenity Escape – 5 Days / 4 Nights', '68356f528fb267.17146177.jpg', '500,000', 5, 40, '2025-08-30 : 10:00', 'Day 1: Journey to Ngapali\r\n\r\nDepart from Mandalay by private car or bus to Ngapali.\r\n\r\nCheck-in at your selected hotel.\r\n\r\nRelax and enjoy the serene beach environment.\r\n\r\n\r\nDay 2: Leisure and Exploration\r\n\r\nSpend the day at your leisure on Ngapali Beach.\r\n\r\nVisit the local Thandwe Market to experience local life and shop for traditional crafts.\r\n\r\nBike along the coast to explore surrounding villages.\r\n\r\nHire a boat for fishing or sailing against the backdrop of the Rakhine hills.\r\n\r\n\r\nDay 3: Cultural Immersion\r\n\r\nExplore nearby fishing villages to observe traditional lifestyles.\r\n\r\nVisit local artisans and learn about traditional crafts.\r\n\r\nEnjoy fresh seafood at a local restaurant.\r\n\r\n\r\nDay 4: Relaxation and Optional Activities\r\n\r\nRelax on the beach or participate in optional activities:\r\n\r\nSnorkeling or diving around the surrounding islands.\r\n\r\nVisit nearby attractions or take a cooking class.\r\n\r\n\r\nDay 5: Departure\r\n\r\nMorning at leisure for last-minute shopping or relaxation.\r\n\r\nCheck out from the hotel and depart by car or bus.', '2025-05-27 03:22:50', '2025-09-11 07:03:13', 12, 13, 3, 4, 'expired'),
(30, 'Kalaw Highland Adventure – 4 Days / 3 Nights', '683572f0521a68.86172574.jpg', '500,000', 4, 20, '2025-07-31 : 08:00', 'Day 1: Arrival and Local Exploration\r\n\r\nDepart from Mandalay by private car or bus to Kalaw.\r\n\r\nCheck-in at your selected hotel.\r\n\r\nVisit the Kalaw Market to experience local life and shop for traditional crafts.\r\n\r\nExplore Thein Taung Hpaya Monastery and enjoy panoramic views of the town.\r\n\r\n\r\nDay 2: Trekking to Local Villages\r\n\r\nBegin a guided trek through pine forests and rolling hills.\r\n\r\nVisit Danu and Pa-O villages, interacting with local communities.\r\n\r\nEnjoy a traditional lunch in a village setting.\r\n\r\nOvernight stay at a local homestay or monastery.\r\n\r\n\r\nDay 3: Continued Trekking and Cultural Immersion\r\n\r\nContinue trekking through scenic landscapes and agricultural fields.\r\n\r\nLearn about local farming practices and traditional lifestyles.\r\n\r\nReturn to Kalaw in the late afternoon.\r\n\r\nEvening at leisure to explore the town or relax at the hotel.\r\n\r\n\r\nDay 4: Departure\r\n\r\nMorning at leisure for last-minute shopping or relaxation.\r\n\r\nCheck out from the hotel and depart by car or bus.', '2025-05-27 03:38:16', '2025-09-11 07:03:13', 4, 2, 3, 2, 'expired'),
(31, 'Taunggyi Cultural Discovery – 6 Days / 5 Nights', '683574f4cddbc9.03893926.jpg', '600,000', 6, 45, '2025-08-31 : 08:30', 'Day 1: Arrival and City Introduction\r\n\r\nDepart from Mandalay by private car or bus to Taunggyi.\r\n\r\nCheck-in at your selected hotel.\r\n\r\nVisit the Taunggyi Market to experience local life and shop for traditional crafts.\r\n\r\nExplore Shwe Phone Pwint Pagoda, offering panoramic views of the city.\r\n\r\n\r\nDay 2: Kakku Pagodas and Htan Phaya Cave\r\n\r\nJourney to the Kakku Pagodas, a complex of over 2,000 stupas nestled in the hills.\r\n\r\nExplore Htan Phaya Cave, known for its religious significance and natural formations.\r\n\r\nReturn to Taunggyi for an evening at leisure.\r\n\r\n\r\nDay 3: Inle Lake Exploration\r\n\r\nTravel to Inle Lake, renowned for its floating villages and unique leg-rowing fishermen.\r\n\r\nVisit the Floating Gardens and the Phaung Daw Oo Pagoda.\r\n\r\nOptional: Enjoy a traditional lunch at a lakeside restaurant.\r\n\r\nReturn to Taunggyi in the late afternoon.\r\n\r\n\r\nDay 4: Cultural Immersion\r\n\r\nVisit Sagar Village to experience traditional stilt houses and local crafts.\r\n\r\nParticipate in a cooking class to learn about Shan cuisine.\r\n\r\nEvening: Attend a cultural performance showcasing local music and dance.\r\n\r\n\r\nDay 5: Trekking and Natural Beauty\r\n\r\nEmbark on a guided trek to Main Ma Ye\' Tha-Khin-Ma Mountain for panoramic views.\r\n\r\nExplore nearby villages and interact with local communities.\r\n\r\nReturn to Taunggyi for a farewell dinner.\r\n\r\n\r\nDay 6: Departure\r\n\r\nMorning at leisure for last-minute shopping or relaxation.\r\n\r\nCheck out from the hotel and depart for by car or bus.', '2025-05-27 03:46:52', '2025-09-11 07:03:13', 6, 14, 6, 5, 'expired'),
(32, 'Mandalay Winter Trip', '68c275eb1d2a31.62815158.webp', '500,000', 5, 20, '2025-09-30 : 13:34', 'lkadsnglsjjhsjfg;ksj', '2025-09-11 02:34:36', '2025-09-11 02:40:35', 1, 1, 2, 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pyID` int(11) NOT NULL,
  `pyType` varchar(20) DEFAULT NULL,
  `pyNumber` varchar(20) DEFAULT NULL,
  `pyImg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pyID`, `pyType`, `pyNumber`, `pyImg`) VALUES
(1, 'KBZ pay', '09975099842', '67d2d8a3b38e93.59154009.jpg'),
(2, 'CB pay', '09975099842', '67d2d8be3a2e70.31524526.avif'),
(3, 'WAVE pay', '09975099842', '67d2d8d67a2416.73826716.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `plID` int(11) NOT NULL,
  `plName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`plID`, `plName`) VALUES
(1, 'Yangon'),
(2, 'Bagan'),
(3, 'Inn lay '),
(4, 'Kalaw'),
(5, 'Lashio'),
(6, 'Taunggyi'),
(7, 'Mawlamyine'),
(8, 'Kyaik hto'),
(10, 'Chaung Thar'),
(12, 'Ngapali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bID`),
  ADD KEY `pyID` (`pyID`),
  ADD KEY `cusID` (`cusID`);

--
-- Indexes for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD PRIMARY KEY (`bkID`),
  ADD KEY `bID` (`bID`),
  ADD KEY `pgID` (`pgID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cusID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fID`),
  ADD KEY `cusID` (`cusID`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`pgID`),
  ADD KEY `plID` (`plID`),
  ADD KEY `hotID` (`hotID`),
  ADD KEY `guID` (`guID`),
  ADD KEY `carID` (`carID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pyID`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`plID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  MODIFY `bkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `guID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `pgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `plID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`pyID`) REFERENCES `payment` (`pyID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`cusID`) REFERENCES `customer` (`cusID`);

--
-- Constraints for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD CONSTRAINT `bookingdetail_ibfk_1` FOREIGN KEY (`bID`) REFERENCES `booking` (`bID`),
  ADD CONSTRAINT `bookingdetail_ibfk_2` FOREIGN KEY (`pgID`) REFERENCES `package` (`pgID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`cusID`) REFERENCES `customer` (`cusID`);

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`plID`) REFERENCES `place` (`plID`),
  ADD CONSTRAINT `package_ibfk_2` FOREIGN KEY (`hotID`) REFERENCES `hotel` (`hotID`),
  ADD CONSTRAINT `package_ibfk_3` FOREIGN KEY (`guID`) REFERENCES `guide` (`guID`),
  ADD CONSTRAINT `package_ibfk_4` FOREIGN KEY (`carID`) REFERENCES `car` (`carID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
