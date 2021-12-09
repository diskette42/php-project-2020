-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 03:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `image`, `price`) VALUES
(1, 'Clean-Sandwich', 'product-images/acai.jpg', 1500.00),
(2, 'Shrimp', 'product-images/shrimpp.jpg', 800.00),
(3, 'Wrap', 'product-images/wrap.jpg', 300.00),
(4, 'Salad', 'product-images/6.jpg', 800.00),
(5,'Chicken Breast with rice','product-images/Chicken.jpg',60.00),
(6,'Seared Tuna','product-images/tuna.webp',60.00),
(7,'Beef','product-images/Beef.jpg',90.00),
(8,'Salmon with rice','product-images/salmon.webp',80.00),
(9,'Pizza','product-images/pizza.jpg',160.00),
(10,'Salmon steak with good fat','product-images/salmon steak.jpg',80.00),
(11,'Potato','product-images/Potato.jpg',90.00),
(12,'Beef steak','product-images/beef steak.jpg',100.00),
(13,'Spaghetti with Chicken','product-images/Spaghetti with Chicken.jpg',120.00),
(14,'Spaghetti Cabonara','product-images/spaghetti_carbonara.jpg',140.00),
(15,'Egg Avocado','product-images/Egg_Avocado.jpg',60.00),
(16,'Posh Mushroom','product-images/Posh Mushroom.jpg',55.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
