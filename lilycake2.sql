-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 05:31 PM
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
-- Database: `lilycake2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(4) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_fullname` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `admin_username`, `admin_fullname`, `admin_password`) VALUES
(1, 'inozrh', 'Nurina Zahirah', '590dbdf04b79090fd0d09535ae63036b'),
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(9, 'admin2', 'admin2', '21232f297a57a5a743894a0e4a801fc3'),
(15, 'admin3', 'admin3', 'fc1ebc848e31e0a68e868432225e3c82'),
(20, 'admin4', 'admin4', '21232f297a57a5a743894a0e4a801fc3'),
(22, 'admin5', 'admin5', '26a91342190d515231d7238b0c5438e1');

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE `cakes` (
  `ID_cakes` int(4) NOT NULL,
  `cakes_title` varchar(100) NOT NULL,
  `cakes_description` text NOT NULL,
  `cakes_price` decimal(10,2) NOT NULL,
  `cakes_imagetitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`ID_cakes`, `cakes_title`, `cakes_description`, `cakes_price`, `cakes_imagetitle`) VALUES
(3, 'Rainbow Cake', 'Celebrations can never go wrong with cake that features pastel colour cream strokes. Comes in with Belgium Chocolate flavour as your cake base.', 99.00, 'Cake-Name-8891.jpg'),
(10, 'Funfetti Cake', 'Coated in yellow and decorated with colourful sprinkles. Comes in with Mango Custard flavour as your cake base.', 90.00, 'Cake-Name-4636.jpg'),
(11, 'Blue Palette Cake', 'Covered in full white, decorated with blue cream strokes and comes in with Caramel Cofee flavour as base.', 80.00, 'Cake-Name-8995.jpg'),
(20, 'Caramel Cake', 'Signature chocolate cake layered with classic buttercream and a salted caramel drip, served with pretzels and chocolate.', 110.00, 'Cake-Name-3143.jpg'),
(21, 'Hojicha Cake', 'Fragrant hojicha cake, layered with macadamia nut cream for some crunch. Take a bite and indulge in the roasted and nutty flavours.', 100.00, 'Cake-Name-4652.jpg'),
(22, 'Lemon-ie Cake', 'A scrumptious cake with zesty lemon cake, layered with pistachio cream. Get this refreshing and nutty cake to share with your loved one.', 110.00, 'Cake-Name-5367.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `ID_order` int(11) NOT NULL,
  `cake` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cust_name` varchar(150) NOT NULL,
  `cust_notel` varchar(11) NOT NULL,
  `cust_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`ID_order`, `cake`, `price`, `qty`, `total_price`, `status`, `cust_name`, `cust_notel`, `cust_address`) VALUES
(18, 'Blue Palette Cake', 80.00, 2, 160.00, 'Delivered', 'Baji Keisuke', '0182587745', 'Klang, Selangor'),
(34, 'Lemon-ie Cake', 110.00, 1, 110.00, 'Delivered', 'Nurina Zahirah', '01116374480', 'Pelabuhan Klang, Selangor'),
(35, 'Hojicha Cake', 100.00, 3, 300.00, 'Delivered', 'Zenin Toji', '01128104259', 'Kota Pendamar, Selangor'),
(36, 'Rainbow Cake', 99.00, 3, 297.00, 'Delivered', 'Wei Wuxian', '0183753501', 'Klang, Selangor'),
(37, 'Funfetti Cake', 90.00, 1, 90.00, 'Delivered', 'Wakasa Imaushi', '0175568306', 'Kampung Raja Uda, Selangor'),
(38, 'Lemon-ie Cake', 110.00, 1, 110.00, 'On Delivery', 'Kayden Break', '01128104259', 'Kuala Lumpur'),
(40, 'Hojicha Cake', 100.00, 1, 100.00, 'On Delivery', 'Gege Akutami', '01123645367', 'Park Land, Selangor'),
(41, 'Caramel Cake', 110.00, 2, 220.00, 'On Delivery', 'Ken Wakui', '0199183172', 'Pelabuhan Klang, Selangor'),
(46, 'Funfetti Cake', 90.00, 1, 90.00, 'Cancelled', 'Doja Cat', '0146053141', 'Klang, Selangor'),
(52, 'Caramel Cake', 110.00, 2, 220.00, 'Ordered', 'Hijikata Toshio', '01182736629', 'Klang, Selangor'),
(53, 'Caramel Cake', 110.00, 1, 110.00, 'Ordered', 'Zenin Toji', '01128104259', 'Klang, Selangor'),
(54, 'Lemon-ie Cake', 110.00, 1, 110.00, 'Cancelled', 'Ain', '0173871418', 'Tangkak, Johor'),
(55, 'Lemon-ie Cake', 110.00, 1, 110.00, 'Ordered', 's', '2', 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`ID_cakes`);

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`ID_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cakes`
--
ALTER TABLE `cakes`
  MODIFY `ID_cakes` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `ID_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
