-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 10, 2016 at 11:14 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `anewsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
`id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`id`, `name`, `introduction`, `image`, `created_at`, `deleted_at`) VALUES
(1, 'item1', 'this is iteam 1, gjiejg ,ajiage', '/images/item1', '2016-06-08 07:04:00', NULL),
(2, 'item2', 'this is iteam 2, oqhngoihgeuk,hgoiaejogij', '/image/item2', '2016-06-08 04:03:00', NULL),
(3, 'item3', 'this is item3', '/images/item3', '2016-06-08 04:00:00', NULL),
(4, 'item4', 'this is item4', '/images/item4', '2016-06-09 04:00:00', NULL),
(5, 'item5', 'item5', '/images/item5', '2016-06-08 04:00:00', NULL),
(6, 'item6', 'item6', '/images/item6', '2016-06-09 04:00:00', NULL),
(7, 'item7', 'item7', '/images/item7', '0000-00-00 00:00:00', NULL),
(8, 'item8', 'item8', '/images/item8', '0000-00-00 00:00:00', NULL),
(9, 'item9', 'item9', '/images/item9', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'fangweidaily@gmail.com', '$2y$10$Qra2AiHEgp7Xxg8.9Hpp2OpFqGkhXY245uPo1GMvRLrnvhpZgowwa', 'V', '7iSP0ikBsdPriGCU4WDO8dGbhirBasndgknFyyaboMqmdkaJOVKJg4W245Ke', '2016-06-08 23:24:26', '2016-06-10 23:05:00', NULL),
(2, 'user2', 'user@test.com', '$2y$10$jw6ArqwBaCfHvZfmN5C6kuC/nL56bxhrhX0BLSzNaO6iwGneuf6jK', 'A', 'h5nNHzP1sBYYZaSTqtBwjnr6d5ya2CZo3jXTbZjSOXxX9M2vIwgDZQh9gysC', '2016-06-09 00:06:27', '2016-06-10 23:05:07', NULL),
(3, 'user1', '1user@test.com', '$2y$10$uAvJx4YUXDy.oZWOrpcm1Oc/kYMMNQVs2eHGj0zdPVMER39B4QDeC', 'N', 'eU9LtmxOOLShVJVfX9bB98mtfJlrHMGYzvXsYm6gabdzQt1mZzHqwmxpcvkF', '2016-06-10 20:29:57', '2016-06-10 20:30:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `image` (`image`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
