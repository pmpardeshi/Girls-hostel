-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 26, 2019 at 02:37 AM
-- Server version: 5.6.39
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `hostellist`
--

CREATE TABLE `hostellist` (
  `Categary` varchar(10) NOT NULL DEFAULT 'OPEN',
  `Mechanical` int(10) DEFAULT '0',
  `Automobile` int(10) NOT NULL DEFAULT '0',
  `Instrumentation` int(10) NOT NULL DEFAULT '0',
  `Computer` int(10) NOT NULL DEFAULT '0',
  `Civil` int(10) NOT NULL DEFAULT '0',
  `ENTC` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hostellist`
--

INSERT INTO `hostellist` (`Categary`, `Mechanical`, `Automobile`, `Instrumentation`, `Computer`, `Civil`, `ENTC`) VALUES
('OPEN', 6, 6, 6, 3, 3, 3),
('OBC', 5, 5, 3, 5, 2, 3),
('SC', 26, 11111, 6323, 6325, 363, 6363),
('ST', 633, 6363, 63633, 633, 3, 33),
('VJNT/NT(A)', 3333, 63, 633, 363, 3663, 6363),
('NT(B)', 6363, 6363, 363, 33, 63, 63),
('NT(C)', 66, 363, 636, 36, 33, 63),
('NT(D)', 6363, 636, 3636, 363, 36363, 63636);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
