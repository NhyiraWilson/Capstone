-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 12:47 PM
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
-- Database: `oasis`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_ID` int(11) NOT NULL,
  `Salon_name` varchar(50) DEFAULT NULL,
  `Massage_name` varchar(50) DEFAULT NULL,
  `body_name` varchar(50) DEFAULT NULL,
  `Staff_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Appointment_date` date DEFAULT NULL,
  `Start_time` time DEFAULT NULL,
  `End_time` time DEFAULT NULL,
  `Appointment_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `Appointment_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Staff_ID` int(11) DEFAULT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `Availability_ID` int(11) NOT NULL,
  `Staff_ID` int(11) DEFAULT NULL,
  `set_Date` date DEFAULT NULL,
  `Start_time` varchar(10) DEFAULT NULL,
  `End_time` varchar(10) DEFAULT NULL,
  `isAvailable` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `spa_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faceandbody`
--

CREATE TABLE `faceandbody` (
  `body_ID` int(11) NOT NULL,
  `body_name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faceandbody`
--

INSERT INTO `faceandbody` (`body_ID`, `body_name`, `description`, `duration`, `price`) VALUES
(1, 'Facial Treatment', 'Our facial treatments are designed to rejuvenate your skin, leaving it glowing and refreshed.', '60 minutes', '$80'),
(2, 'Waxing', 'Our sugar waxes leave your body smooth and relaxed.', '60 minutes\'', '$80'),
(3, 'Body Wraps', 'Indulge in our luxurious body wraps that detoxify, exfoliate and hydrate your skin.', '60 minutes', '$100');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_ID` int(11) NOT NULL,
  `Massage_name` int(11) DEFAULT NULL,
  `body_name` varchar(50) DEFAULT NULL,
  `Staff_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Rating` float DEFAULT NULL,
  `Review` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `items_ID` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `massage_ID` int(11) NOT NULL,
  `Massage_name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`massage_ID`, `Massage_name`, `description`, `duration`, `price`) VALUES
(1, 'Swedish Massage', 'A relaxing massage technique that uses long strokes and kneading to improve circulation and promote relaxation.', '60 minutes', '$80'),
(2, 'Deep Tissue Massage', 'A therapeutic massage focusing on deeper layers of muscles to relieve chronic pain and tension.', '90 minutes', '$120'),
(3, 'Hot Stone Massage', 'A soothing massage using heated stones to relax muscles and improve overall well-being.', '75 minutes', '$100');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL,
  `order_status` enum('pending','completed','canceled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(11) NOT NULL,
  `Appointment_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Amount` float DEFAULT NULL,
  `Payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Role_ID` int(11) NOT NULL,
  `Role_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Role_ID`, `Role_name`) VALUES
(1, 'admin'),
(2, 'customer'),
(3, 'parlour_admin');

-- --------------------------------------------------------

--
-- Table structure for table `salon`
--

CREATE TABLE `salon` (
  `Salon_ID` int(11) NOT NULL,
  `Salon_name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salon`
--

INSERT INTO `salon` (`Salon_ID`, `Salon_name`, `description`, `duration`, `price`) VALUES
(1, 'Braiding(short)', 'short length\r\n', '2 hours', '$80'),
(2, 'Braiding (long)', 'long ', '3 hours', '$100'),
(3, 'Natural Hair Treatment', 'Including washing, deep conditioning, blow-drying.', '60 minutes', '$50'),
(4, 'Manicure and Pedicure', 'Acrylics, stick-Ons and gel polish', '120 minutes', '$80'),
(5, 'Installations', 'Sew-ins, Wigs and Ponytails.', '60 minutes', '$60');

-- --------------------------------------------------------

--
-- Table structure for table `spas`
--

CREATE TABLE `spas` (
  `spa_id` int(11) NOT NULL,
  `spa_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subscription_type` enum('normal','customization') NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` enum('1','0') DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spas`
--

INSERT INTO `spas` (`spa_id`, `spa_name`, `description`, `location`, `contact_phone`, `email`, `subscription_type`, `fee`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Oasis', 'tall', 'Berekuso', '0506701913', 'ewuraadjoaw@gmail.com', 'customization', 120.00, '0', '2024-12-03 10:46:09', '2024-12-03 18:56:23'),
(4, 'Kels Body', 'A luxury spa', 'Haatso', '0506701913', 'ewura.wilson@ashesi.edu.gh', 'customization', 120.00, '1', '2024-12-03 10:56:21', '2024-12-03 10:56:21'),
(9, 'lick Body', 'sderftg', 'Haatso', '0506701913', 'ewura.wilson@ashesi.edu.gh', 'customization', 120.00, '1', '2024-12-03 17:18:45', '2024-12-03 17:18:45'),
(10, 'lick Body', 'sderftg', 'Haatso', '0506701913', 'que.wilson@ashesi.edu.gh', 'customization', 120.00, '0', '2024-12-03 18:00:52', '2024-12-03 20:37:09'),
(13, 'lick Body', 'hjm', 'Haatso', '0506701913', 'ewura.wilson@ashesi.edu.gh', 'customization', 120.00, '1', '2024-12-03 23:27:02', '2024-12-03 23:27:02'),
(14, 'Ageless Day Spa', 'hi', 'Baatsona, opposite EC Church', '0506701913', 'agelessday@gmail.com', '', 80.00, '1', '2025-04-24 13:50:19', '2025-04-24 13:50:19'),
(15, 'Ageless Day Spa', 'yhui', 'Baatsona, opposite EC Church', '0506701913', 'agelessday@gmail.com', 'customization', 120.00, '1', '2025-04-24 14:08:44', '2025-04-24 14:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `spa_services`
--

CREATE TABLE `spa_services` (
  `service_id` int(11) NOT NULL,
  `spa_id` int(11) DEFAULT NULL,
  `service_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(11) NOT NULL,
  `Massage_ID` int(11) DEFAULT NULL,
  `Salon_ID` int(11) DEFAULT NULL,
  `body_ID` int(11) DEFAULT NULL,
  `Staff_name` varchar(30) DEFAULT NULL,
  `Availability` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Massage_ID`, `Salon_ID`, `body_ID`, `Staff_name`, `Availability`) VALUES
(1, 0, 0, 0, 'Mary Ansah', 'Mondays - Wednesdays: 9am - 2pm'),
(2, 0, 0, 0, 'Abigail Nunepkeku', 'Mondays - Wednesdays: 9am - 2pm'),
(3, 0, 0, 0, 'Iris Boakye', 'Mondays - Wednesdays: 9am - 2pm'),
(4, 0, 0, 0, 'Nana Ama Asante', 'Mondays - Wednesdays: 9am - 2pm'),
(5, 0, 0, 0, 'Vivian Nkrumah', 'Mondays - Wednesdays: 9am - 2pm'),
(6, 0, 0, 0, 'Vanesah Antwi', 'Mondays - Wednesdays: 2pm - 7pm'),
(7, 0, 0, 0, 'Kweku Botwe', 'Mondays - Wednesdays: 2pm -7pm'),
(8, 0, 0, 0, 'Ohemaa Akroma', 'Mondays - Wednesdays: 2pm -7pm'),
(9, 0, 0, 0, 'Phillip Akwei', 'Mondays - Wednesdays: 2pm -7pm'),
(10, 0, 0, 0, 'Abena Kyei', 'Mondays - Wednesdays: 2pm -7pm');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Status_ID` int(11) NOT NULL,
  `Status_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Status_ID`, `Status_name`) VALUES
(1, 'Pending'),
(2, 'Confirmed'),
(3, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_transactions`
--

CREATE TABLE `subscription_transactions` (
  `transaction_id` int(11) NOT NULL,
  `spa_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_status` enum('pending','completed','failed') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Role_ID` int(11) DEFAULT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `Passwords` varchar(250) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Phone_number` char(10) DEFAULT NULL,
  `Preferences` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Role_ID`, `f_name`, `l_name`, `Passwords`, `gender`, `Email`, `DOB`, `Phone_number`, `Preferences`) VALUES
(8, 3, 'Bryne', 'Antwi', '$2y$10$3uw2aqxD8sNzEFFo6nkhWOZ3xeE8kGqT5nkr5LQ6oofeLYS7Wk7Xe', '1', 'bryne.antwi@ashesi.edu.gh', '2024-11-20', '0262085806', NULL),
(12, 2, 'Brain', 'Antwi', '$2y$10$klBpf6etsmtA9ql7G5pHY.klyTJJsttccuQ/bXnChoXlLn9cogGla', '0', 'brian.antwi@ashesi.edu.gh', '2024-12-27', '0506701913', NULL),
(13, 2, 'Nhyira', 'Wilson', '$2y$10$uAOjFMAHseEhT1U.X0qny.lZsdbOSm6TaGmQjHtIIHTA.0PaDgxvK', '1', 'ewura.wilson@ashesi.edu.gh', '2024-12-27', '0506701913', NULL),
(14, 1, 'Nhyira', 'Wilson', '$2y$10$gmXoKkqW43cVyygPubdcYu8ApGshgxdIZFAt11zn3thoBN1c/18f.', '1', 'nhyira.wilson@ashesi.edu.gh', '2024-12-06', '0506701913', NULL),
(15, 1, 'Akua', 'Asomaning', '$2y$10$O6McZOoR6g6UpYYPnfqjd.b6IEPEHgw8yAAuX0fWaDsQLb31krPhm', '1', 'akua.asomaning@gmail.com', '2008-01-30', '0206701914', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waitinglist`
--

CREATE TABLE `waitinglist` (
  `WaitingList_ID` int(11) NOT NULL,
  `Appointment_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Prefered_date` date DEFAULT NULL,
  `Appointment_Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Appointment_status` (`Appointment_status`),
  ADD KEY `massage_ID` (`Massage_name`),
  ADD KEY `body_ID` (`body_name`),
  ADD KEY `appointment_ibfk_1` (`Salon_name`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `Appointment_ID` (`Appointment_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`),
  ADD KEY `Status_ID` (`Status_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`Availability_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `spa_id` (`spa_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `faceandbody`
--
ALTER TABLE `faceandbody`
  ADD PRIMARY KEY (`body_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_ID`),
  ADD KEY `Service_ID` (`Massage_name`),
  ADD KEY `Staff_ID` (`Staff_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`items_ID`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`massage_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Appointment_ID` (`Appointment_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Role_ID`);

--
-- Indexes for table `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`Salon_ID`);

--
-- Indexes for table `spas`
--
ALTER TABLE `spas`
  ADD PRIMARY KEY (`spa_id`);

--
-- Indexes for table `spa_services`
--
ALTER TABLE `spa_services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `spa_id` (`spa_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_ID`);

--
-- Indexes for table `subscription_transactions`
--
ALTER TABLE `subscription_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `spa_id` (`spa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `Role_ID` (`Role_ID`);

--
-- Indexes for table `waitinglist`
--
ALTER TABLE `waitinglist`
  ADD PRIMARY KEY (`WaitingList_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Appointment_Status` (`Appointment_Status`),
  ADD KEY `waitinglist_ibfk_1` (`Appointment_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appointment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `Availability_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faceandbody`
--
ALTER TABLE `faceandbody`
  MODIFY `body_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `massage_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salon`
--
ALTER TABLE `salon`
  MODIFY `Salon_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spas`
--
ALTER TABLE `spas`
  MODIFY `spa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `spa_services`
--
ALTER TABLE `spa_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription_transactions`
--
ALTER TABLE `subscription_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `waitinglist`
--
ALTER TABLE `waitinglist`
  MODIFY `WaitingList_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`Staff_ID`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`Appointment_status`) REFERENCES `status` (`Status_ID`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`Appointment_ID`) REFERENCES `appointment` (`Appointment_ID`),
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`Staff_ID`),
  ADD CONSTRAINT `assignment_ibfk_3` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`Status_ID`),
  ADD CONSTRAINT `assignment_ibfk_4` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`Staff_ID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`spa_id`) REFERENCES `spas` (`spa_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `spa_services` (`service_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Massage_name`) REFERENCES `services` (`Service_ID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`Staff_ID`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `spa_services` (`service_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Appointment_ID`) REFERENCES `appointment` (`Appointment_ID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `spa_services`
--
ALTER TABLE `spa_services`
  ADD CONSTRAINT `spa_services_ibfk_1` FOREIGN KEY (`spa_id`) REFERENCES `spas` (`spa_id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_transactions`
--
ALTER TABLE `subscription_transactions`
  ADD CONSTRAINT `subscription_transactions_ibfk_1` FOREIGN KEY (`spa_id`) REFERENCES `spas` (`spa_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Role_ID`) REFERENCES `roles` (`Role_ID`);

--
-- Constraints for table `waitinglist`
--
ALTER TABLE `waitinglist`
  ADD CONSTRAINT `waitinglist_ibfk_1` FOREIGN KEY (`Appointment_ID`) REFERENCES `appointment` (`Appointment_ID`),
  ADD CONSTRAINT `waitinglist_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `waitinglist_ibfk_3` FOREIGN KEY (`Appointment_Status`) REFERENCES `status` (`Status_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
