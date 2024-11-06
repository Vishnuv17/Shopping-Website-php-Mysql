-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 07:13 AM
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
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`) VALUES
(1, 'Men Regular Fit Shirt', 749.00, 'product1_1.jpg', 'product1_2.jpg', 'product1_3.jpg', 'product1_4.jpg', 'product1_5.jpg', 'product1_6.jpg'),
(2, 'Blue Checked Shirt', 1299.00, 'product2_1.jpg', 'product2_2.jpg', 'product2_3.jpg', 'product2_4.jpg', 'product2_5.jpg', 'product2_6.jpg'),
(3, 'Casual Checked Shirt', 849.00, 'product3_1.jpg', 'product3_2.jpg', 'product3_3.jpg', 'product3_4.jpg', 'product3_5.jpg', 'product3_6.jpg'),
(4, 'White Checked Shirt', 499.00, 'product4_1.jpg', 'product4_2.jpg', 'product4_3.jpg', 'product4_4.jpg', 'product4_5.jpg', 'product4_6.jpg'),
(5, 'Checked Casual Shirt', 1299.00, 'product5_1.jpg', 'product5_2.jpg', 'product5_3.jpg', 'product5_4.jpg', 'product5_5.jpg', 'product5_6.jpg'),
(6, 'Slim Fit Party Shirts', 499.00, 'product6_1.jpg', 'product6_2.jpg', 'product6_3.jpg', 'product6_4.jpg', 'product6_5.jpg', 'product6_6.jpg'),
(7, 'Men Slim Fit Shirt', 1199.00, 'product7_1.jpg', 'product7_2.jpg', 'product7_3.jpg', 'product7_4.jpg', 'product7_5.jpg', 'product7_6.jpg'),
(8, 'Checkered Casual Shirt', 549.00, 'product8_1.jpg', 'product8_2.jpg', 'product8_3.jpg', 'product8_4.jpg', 'product8_5.jpg', 'product8_6.jpg'),
(9, 'Printed Casual Shirt', 899.00, 'product9_1.jpg', 'product9_2.jpg', 'product9_3.jpg', 'product9_4.jpg', 'product9_5.jpg', 'product9_6.jpg'),
(10, 'Men Slim Fit', 849.00, 'product10_1.jpg', 'product10_2.jpg', 'product10_3.jpg', 'product10_4.jpg', 'product10_5.jpg', 'product10_6.jpg'),
(11, 'Men Solid Jacket', 1099.00, 'product11_1.jpg', 'product11_2.jpg', 'product11_3.jpg', 'product11_4.jpg', 'product11_5.jpg', 'product11_6.jpg'),
(12, 'Blue Men Shirt', 899.00, 'product12_1.jpg', 'product12_2.jpg', 'product12_3.jpg', 'product12_4.jpg', 'product12_5.jpg', 'product12_6.jpg'),
(13, 'Brown Mustard Shirt', 749.00, 'product13_1.jpg', 'product13_2.jpg', 'product13_3.jpg', 'product13_4.jpg', 'product13_5.jpg', 'product13_6.jpg'),
(14, 'Boys Long Sleeve Shirt', 1099.00, 'product14_1.jpg', 'product14_2.jpg', 'product14_3.jpg', 'product14_4.jpg', 'product14_5.jpg', 'product14_6.jpg'),
(15, 'Women Black Kurta Set', 649.00, 'product15_1.jpg', 'product15_2.jpg', 'product15_3.jpg', 'product15_4.jpg', 'product15_5.jpg', 'product15_6.jpg'),
(16, 'Women Blue Kurta Set', 1299.00, 'product16_1.jpg', 'product16_2.jpg', 'product16_3.jpg', 'product16_4.jpg', 'product16_5.jpg', 'product16_6.jpg'),
(17, 'Women Blend Kurta', 1299.00, 'product17_1.jpg', 'product17_2.jpg', 'product17_3.jpg', 'product17_4.jpg', 'product17_5.jpg', 'product17_6.jpg'),
(18, 'Flare Maroon Dress', 749.00, 'product18_1.jpg', 'product18_2.jpg', 'product18_3.jpg', 'product18_4.jpg', 'product18_5.jpg', 'product18_6.jpg'),
(19, 'Regular Fit Kurta Set', 849.00, 'product19_1.jpg', 'product19_2.jpg', 'product19_3.jpg', 'product19_4.jpg', 'product19_5.jpg', 'product19_6.jpg'),
(20, 'Casual Party Wear Shirt', 749.00, 'product20_1.jpg', 'product20_2.jpg', 'product20_3.jpg', 'product20_4.jpg', 'product20_5.jpg', 'product20_6.jpg'),
(21, 'Printed Shirt', 1199.00, 'product21_1.jpg', 'product21_2.jpg', 'product21_3.jpg', 'product21_4.jpg', 'product21_5.jpg', 'product21_6.jpg'),
(22, 'Denim Shirt', 849.00, 'product22_1.jpg', 'product22_2.jpg', 'product22_3.jpg', 'product22_4.jpg', 'product22_5.jpg', 'product22_6.jpg'),
(23, 'Linen Shirt', 599.00, 'product23_1.jpg', 'product23_2.jpg', 'product23_3.jpg', 'product23_4.jpg', 'product23_5.jpg', 'product23_6.jpg'),
(24, 'Cotton Blend Shirt', 649.00, 'product24_1.jpg', 'product24_2.jpg', 'product24_3.jpg', 'product24_4.jpg', 'product24_5.jpg', 'product24_6.jpg'),
(25, 'Casual Denim Shirt', 899.00, 'product25_1.jpg', 'product25_2.jpg', 'product25_3.jpg', 'product25_4.jpg', 'product25_5.jpg', 'product25_6.jpg'),
(26, 'Casual Wear Shirt', 899.00, 'product26_1.jpg', 'product26_2.jpg', 'product26_3.jpg', 'product26_4.jpg', 'product26_5.jpg', 'product26_6.jpg'),
(27, 'Fashion Shirt', 999.00, 'product27_1.jpg', 'product27_2.jpg', 'product27_3.jpg', 'product27_4.jpg', 'product27_5.jpg', 'product27_6.jpg'),
(28, 'Formal Shirt', 549.00, 'product28_1.jpg', 'product28_2.jpg', 'product28_3.jpg', 'product28_4.jpg', 'product28_5.jpg', 'product28_6.jpg'),
(29, 'Floral Print Shirt', 799.00, 'product29_1.jpg', 'product29_2.jpg', 'product29_3.jpg', 'product29_4.jpg', 'product29_5.jpg', 'product29_6.jpg'),
(30, 'Mandarin Collar Shirt', 599.00, 'product30_1.jpg', 'product30_2.jpg', 'product30_3.jpg', 'product30_4.jpg', 'product30_5.jpg', 'product30_6.jpg'),
(31, 'Long Sleeve Shirt', 1199.00, 'product31_1.jpg', 'product31_2.jpg', 'product31_3.jpg', 'product31_4.jpg', 'product31_5.jpg', 'product31_6.jpg'),
(32, 'Summer Shirt', 999.00, 'product32_1.jpg', 'product32_2.jpg', 'product32_3.jpg', 'product32_4.jpg', 'product32_5.jpg', 'product32_6.jpg'),
(33, 'Polo Shirt', 499.00, 'product33_1.jpg', 'product33_2.jpg', 'product33_3.jpg', 'product33_4.jpg', 'product33_5.jpg', 'product33_6.jpg'),
(34, 'Causal Button-Down Shirt', 699.00, 'product34_1.jpg', 'product34_2.jpg', 'product34_3.jpg', 'product34_4.jpg', 'product34_5.jpg', 'product34_6.jpg'),
(35, 'Floral Casual Shirt', 999.00, 'product35_1.jpg', 'product35_2.jpg', 'product35_3.jpg', 'product35_4.jpg', 'product35_5.jpg', 'product35_6.jpg'),
(36, 'Colorful Print Shirt', 749.00, 'product36_1.jpg', 'product36_2.jpg', 'product36_3.jpg', 'product36_4.jpg', 'product36_5.jpg', 'product36_6.jpg'),
(37, 'Solid Color Shirt', 599.00, 'product37_1.jpg', 'product37_2.jpg', 'product37_3.jpg', 'product37_4.jpg', 'product37_5.jpg', 'product37_6.jpg'),
(38, 'Business Casual Shirt', 549.00, 'product38_1.jpg', 'product38_2.jpg', 'product38_3.jpg', 'product38_4.jpg', 'product38_5.jpg', 'product38_6.jpg'),
(39, 'Summer Short Sleeve Shirt', 1099.00, 'product39_1.jpg', 'product39_2.jpg', 'product39_3.jpg', 'product39_4.jpg', 'product39_5.jpg', 'product39_6.jpg'),
(40, 'Causal Long Sleeve Shirt', 899.00, 'product40_1.jpg', 'product40_2.jpg', 'product40_3.jpg', 'product40_4.jpg', 'product40_5.jpg', 'product40_6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `phone`, `address`, `pincode`) VALUES
(2, 'Vishnu', 'Vishnuv1708@gmail.com', 'vishnukutty', '2024-10-24 13:27:38', NULL, NULL, NULL),
(4, 'Vishnu1708', 'vishnu1708@gmail.com', 'vishnu1708', '2024-10-28 04:36:42', '07094249301', '2/152 , Mela Street, Panchakkai, Thirukkadaiyur', '609311');

-- --------------------------------------------------------

--
-- Table structure for table `vishnu`
--

CREATE TABLE `vishnu` (
  `id` int(11) NOT NULL,
  `Product_name` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Image_Path` varchar(255) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vishnu`
--

INSERT INTO `vishnu` (`id`, `Product_name`, `Price`, `Quantity`, `Total`, `Image_Path`, `Date`) VALUES
(1, 'Blue Checked Shirt', 49.99, 1, 49.00, 'product2_1.jpg', '2024-10-24 15:04:04'),
(3, 'Orange Men\'s Casual', 24.99, 1, 24.00, 'product39_1.jpg', '2024-10-24 16:03:02'),
(15, 'Casual Checked Shirt', 19.99, 1, 19.00, 'product3_1.jpg', '2024-10-25 04:04:29'),
(17, 'Casual Checked Shirt', 19.99, 1, 19.00, 'product3_1.jpg', '2024-10-25 04:05:02'),
(19, 'Men Slim Fit Shirt', 39.99, 1, 39.00, 'product7_1.jpg', '2024-10-25 04:25:20'),
(20, 'Casual Checked Shirt', 19.99, 1, 19.00, 'product3_1.jpg', '2024-10-25 09:21:33'),
(21, 'Back Casual Shirt', 99.99, 1, 99.00, 'product38_1.jpg', '2024-10-29 04:35:24'),
(22, 'Orange Men\'s Casual', 24.99, 1, 24.00, 'product39_1.jpg', '2024-10-29 04:35:24'),
(23, 'Casual Checked Shirt', 849.00, 1, 849.00, 'product3_1.jpg', '2024-10-29 09:49:31'),
(24, 'Casual Checked Shirt', 849.00, 1, 849.00, 'product3_1.jpg', '2024-10-29 09:49:37'),
(25, 'Casual Checked Shirt', 849.00, 1, 849.00, 'product3_1.jpg', '2024-10-29 09:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `vishnu1708`
--

CREATE TABLE `vishnu1708` (
  `id` int(11) NOT NULL,
  `Product_name` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Image_Path` varchar(255) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vishnu1708`
--

INSERT INTO `vishnu1708` (`id`, `Product_name`, `Price`, `Quantity`, `Total`, `Image_Path`, `Date`) VALUES
(1, 'Regular Fit Kurta Set', 34.99, 1, 34.00, 'product19_1.jpg', '2024-10-29 04:57:31'),
(2, 'Women Sandal Dress', 24.99, 1, 24.00, 'product25_1.jpg', '2024-10-29 04:57:31'),
(3, 'Polo Shirt', 499.00, 3, 1497.00, 'product33_1.jpg', '2024-11-04 06:01:52'),
(4, 'Causal Button-Down Shirt', 699.00, 1, 699.00, 'product34_1.jpg', '2024-11-04 06:01:52'),
(5, 'Women Blend Kurta', 1299.00, 1, 1299.00, 'product17_1.jpg', '2024-11-04 10:08:02'),
(6, 'Women Blend Kurta', 1299.00, 1, 1299.00, 'product17_1.jpg', '2024-11-04 10:12:05'),
(7, 'Regular Fit Kurta Set', 849.00, 1, 849.00, 'product19_1.jpg', '2024-11-04 10:12:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vishnu`
--
ALTER TABLE `vishnu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vishnu1708`
--
ALTER TABLE `vishnu1708`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vishnu`
--
ALTER TABLE `vishnu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vishnu1708`
--
ALTER TABLE `vishnu1708`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
