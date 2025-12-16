-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 04:30 PM
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
-- Database: `coffeeshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `image`) VALUES
(1, 'About Us', 'Coffee Shop started with a simple passion: serving specialty coffee with local character and global quality. We carefully select our beans from trusted farms and roast them in small batches to ensure freshness and flavor. Our values are quality, transparency, and customer service. Whether in the café or through delivery, we want your experience to be smooth and enjoyable.', 'signin/logo-removebg.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `whatsapp`, `instagram`, `twitter`, `description`) VALUES
(1, 'https://wa.me/054XXXXXX', 'https://instagram.com/coffeeshop', 'https://x.com/coffeeshop', 'We are always happy to hear from you. Whether you have a question, an order request, or simply want to share your feedback, feel free to reach out to us at any time through the channels below.');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `username`, `message`, `created_at`) VALUES
(1, 'fatma', 'best Coffe ', '2025-12-16 15:30:29'),
(2, 'Doaa', 'Good', '2025-12-16 15:52:50'),
(3, 'ahmed', 'bad', '2025-12-16 15:54:16'),
(4, 'Ali', 'Good', '2025-12-16 16:03:13'),
(5, 'Khaled', 'Great', '2025-12-16 16:04:53'),
(6, 'khaled', 'Good Coffe', '2025-12-16 17:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `price`, `quantity`, `created_at`) VALUES
(1, 'Cappuccino', 10.00, 1, '2025-12-16 11:19:49'),
(2, 'Caramel Mikato', 28.00, 1, '2025-12-16 11:20:21'),
(3, 'Cappuccino', 10.00, 1, '2025-12-16 12:18:57'),
(4, 'Caramel Mikato', 28.00, 1, '2025-12-16 14:02:42'),
(5, 'Matcha', 18.00, 4, '2025-12-16 14:03:31'),
(6, 'Caramel Mikato', 28.00, 1, '2025-12-16 14:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `our_story`
--

CREATE TABLE `our_story` (
  `id` int(11) NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `section_text` text NOT NULL,
  `section_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_story`
--

INSERT INTO `our_story` (`id`, `section_title`, `section_text`, `section_image`) VALUES
(1, 'Why Choose Us?', 'We serve coffee made from the finest kinds beans, freshly brewed for a rich and delightful taste. We support local farmers and ensures high-quality beans in every cup. Each sip offers a unique and unforgettable experience, carefully crafted to brighten your day.', 'coffee-images/storyCoffeeBeans.jpg'),
(2, 'From The Beans To Your Table', 'From drying Coffee Beans, roasting, and grinding, all done by our specialists team. We value the science and craft behind each cup — from planting and harvesting, to roasting and brewing. We ensure that from Beans quality to the latte art every cup takes its time, its effort, and all the care needed because every cup is important.', 'coffee-images/storyHandandCoffee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `imgSrc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `imgSrc`) VALUES
(1, 'Test Coffee', 9.00, 'menu/mikato.jpg'),
(2, 'Cappuccino', 10.00, 'menu/cappuccino.jpg'),
(3, 'Americano', 5.00, 'menu/americano.jpg'),
(4, 'Espresso', 4.00, 'menu/espresso.jpg'),
(5, 'Caramel Mikato', 28.00, 'menu/caramel%20mikato.jpg'),
(6, 'Black Coffee', 14.00, 'menu/black%20coffee.jpg'),
(7, 'Matcha', 18.00, 'menu/matcha%20latte.jpg'),
(8, 'Flat White', 12.00, 'menu/flat%20white.jpg'),
(9, 'Ice Shaken', 22.00, 'menu/ice%20shaken.jpg'),
(10, 'Ice Spanish', 25.00, 'menu/ice%20spanish.jpg'),
(11, 'Choco Frappe', 20.00, 'menu/choco%20frappe.jpg'),
(12, 'Ice Strawberry Matcha', 28.00, 'menu/strawberry%20matcha.jpeg'),
(13, 'Classic Cookies', 7.00, 'menu/classic%20cookie.jpg'),
(14, 'English Cake', 20.00, 'menu/english%20cake.jpg'),
(15, 'Donut Cina-Roll', 27.00, 'menu/donut%20cinnaroll.jpg'),
(16, 'Speculous', 30.00, 'menu/speculous.jpg'),
(17, 'French Toast', 32.00, 'menu/french%20toast.jpg'),
(18, 'Choclolate Cake', 30.00, 'menu/choco%20cake.jpg'),
(19, 'Mikato', 9.00, 'menu/mikato.jpg'),
(20, 'Cappuccino', 10.00, 'menu/cappuccino.jpg'),
(21, 'Americano', 5.00, 'menu/americano.jpg'),
(22, 'Espresso', 4.00, 'menu/espresso.jpg'),
(23, 'Caramel Mikato', 28.00, 'menu/caramel%20mikato.jpg'),
(24, 'Black Coffee', 14.00, 'menu/black%20coffee.jpg'),
(25, 'Matcha', 18.00, 'menu/matcha%20latte.jpg'),
(26, 'Flat White', 12.00, 'menu/flat%20white.jpg'),
(27, 'Ice Shaken', 22.00, 'menu/ice%20shaken.jpg'),
(28, 'Ice Spanish', 25.00, 'menu/ice%20spanish.jpg'),
(29, 'Choco Frappe', 20.00, 'menu/choco%20frappe.jpg'),
(30, 'Ice Strawberry Matcha', 28.00, 'menu/strawberry%20matcha.jpeg'),
(31, 'Classic Cookies', 7.00, 'menu/classic%20cookie.jpg'),
(32, 'English Cake', 20.00, 'menu/english%20cake.jpg'),
(33, 'Donut Cina-Roll', 27.00, 'menu/donut%20cinnaroll.jpg'),
(34, 'Speculous', 30.00, 'menu/speculous.jpg'),
(35, 'French Toast', 32.00, 'menu/french%20toast.jpg'),
(36, 'Choclolate Cake', 30.00, 'menu/choco%20cake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `age`, `created_at`) VALUES
(1, 'ahmed', 'ahmed@gmail.com', '$2y$10$J1.CYmDYQnjxc85zX0HE1.NfPO5/cOGCFKNcBGyCJYmu13Z2SEAJ6', 20, '2025-12-16 09:30:59'),
(2, 'saif', 'saif@gmail.com', '$2y$10$fQjcti3Rg7k6djuztH5Cxepw542CdJaFvtlbFQUTj82FgpqZmF0le', 30, '2025-12-16 10:02:39'),
(3, 'fatma', 'fatma@Gmail.com', '$2y$10$qGfjthEr8jeYz4/EzyUHzOWAdKiyyYdJF1hq3VUzoVONBWsk4gqBi', 40, '2025-12-16 10:37:44'),
(5, 'khaled', 'khaled@gmail.com', '$2y$10$z2eMbX9ev7.GEo7.s2WF5OIFZt1ihoqs/MEnWinKCwsIy18kUgehq', 80, '2025-12-16 15:09:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_story`
--
ALTER TABLE `our_story`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `our_story`
--
ALTER TABLE `our_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
