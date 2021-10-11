-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 12:34 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `firstname`, `lastname`, `email`, `birthdate`, `sex`, `username`, `password`, `roles_id`) VALUES
(1, NULL, 'Budi', 'Putra', 'admin@gmail.com', '2021-10-05', 'Rather not say', 'admin', '$2y$10$kVo4yfjbsVcL8vuALEpSqea5M94YNSDVg2M.3SlKPhXiB763x5vf6', 1),
(30, NULL, 'Bryan', 'Sandy', 'bray@gmail.com', '2002-01-01', 'Pria', 'bry123', '$2y$10$Q/K4/dWq29Er2kWQakxWwOFNBYdFkfi0LCeLV/aOxsCj/2QCGssBe', 2),
(35, '', 'Dika', 'Pratama', 'admin2@gmail.com', '2021-10-08', 'Rather not to say', 'admin2', '$2y$10$IJI1TjDKPPh//d6AN.2j2OOpQtwlvFIRiXMFqZjD5uAGK5GUM7mOi', 1),
(36, '61601d3cb6ec6.jpg', 'cindy', '', 'cindy123@gmail.com', '1994-09-04', 'Wanita', 'cindyaja', '$2y$10$GPNPYBl/PSzVj4MGgT1f3OkReOSh0fyUAW8JJY.EtNQBkOf2ZV0he', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersRole` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
