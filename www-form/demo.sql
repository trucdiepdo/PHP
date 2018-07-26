-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 10:23 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `title_en` varchar(500) COLLATE utf8mb4_bin DEFAULT NULL,
  `picture` varchar(200) COLLATE utf8mb4_bin DEFAULT NULL,
  `slug` varchar(500) COLLATE utf8mb4_bin DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `title_en`, `picture`, `slug`, `parent_id`) VALUES
(1, 'tin thể thao', NULL, NULL, NULL, 0),
(2, 'tin thời sự', NULL, NULL, NULL, 0),
(5, 'bản tin trưa', NULL, NULL, NULL, 2),
(6, 'bản tin chiều', 'afternoon news', NULL, NULL, 2),
(11, 'cd', 'cd', '1522895481_bg2.jpg', NULL, NULL),
(14, 'tin bóng đá', 'football news', '1522897725_about-hair.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `content` text COLLATE utf8mb4_bin NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `slug`, `picture`, `status`, `user_id`, `created_at`, `updated_at`, `timestamp`, `category_id`) VALUES
(2, 'test1', '<p>text text textm</p>', 'test1', '1522820263_about-hair.jpg', 1, 3, '2018-04-04 01:28:51', '2018-04-05 03:38:37', '2018-04-05 03:38:37', 14),
(6, 'abcdhsđ', '<p>gtttr</p>', 'abcdhsđ', '1522890730_bg2.jpg', 0, 3, '2018-04-04 02:34:38', '2018-04-05 01:12:10', '2018-04-05 01:12:10', 3),
(8, 'tin 24h', '<p>gtg</p>', 'tin 24h', '1522898355_bg.jpg', 1, 3, '2018-04-04 02:38:37', '2018-04-05 03:19:15', '2018-04-05 03:19:15', 5),
(11, 'vr', '<p>fr</p>', 'vr', NULL, 1, 3, '2018-04-04 03:25:31', '2018-04-04 03:25:31', '2018-04-04 03:25:31', 1),
(12, 'fgfgf', '<p>gfgfg</p>', 'fgfgf', NULL, 1, 3, '2018-04-04 03:28:22', '2018-04-04 03:28:22', '2018-04-04 03:28:22', 1),
(13, 'hghgh', '<p>ghghg</p>', 'hghgh', NULL, 1, 3, '2018-04-04 03:29:34', '2018-04-04 03:29:34', '2018-04-04 03:29:34', 1),
(15, 'gfgfg', '<p>fgfg</p>', 'gfgfg', '1522812719_about_nails.jpg', 1, 3, '2018-04-04 03:31:59', '2018-04-04 03:31:59', '2018-04-04 03:31:59', 1),
(16, 'ghgh', '<p>ghghhgg</p>\r\n\r\n<p><img alt=\"\" src=\"http://news.local:8080/laravel-filemanager/photos/shares/IMG_0306.JPG\" style=\"height:68px; width:100px\" /></p>', 'ghgh', NULL, 1, 3, '2018-04-04 03:35:06', '2018-04-04 03:35:06', '2018-04-04 03:35:06', 1),
(17, 'new', '<p>drff</p>', 'new', NULL, 0, 3, '2018-04-04 09:37:12', '2018-04-04 09:37:12', '2018-04-04 09:37:12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `super_user` int(11) DEFAULT NULL,
  `password` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `picture`, `email`, `phone`, `super_user`, `password`, `remember_token`, `created_at`, `updated_at`, `timestamp`) VALUES
(4, 'abc', '1523271037_ava.jpg', 'abc@gmail.com', '123456', 1, '$2y$10$x5K1GwxFonzHcHDebbH36uGUty.cMbTkHIxmWZ72tBJAUj7KSQbO6', 'znykga0ucabdClAJ0q9sWjtXhOpQqC9lbemW8WgnctJd1CN0bpMsJKyncK4Y', '0000-00-00 00:00:00', '2018-04-10 01:25:54', '2018-04-10 01:28:57'),
(5, 'ab', NULL, 'abcs@abc.com', '651', 0, '$2y$10$he9ZgmfXF8IFY1pAt9cmJe1iQUyMuwfOsPypXtYzWWyS3jXsDzhpa', NULL, '2018-04-09 11:51:08', '2018-04-10 01:11:47', '2018-04-10 01:11:47'),
(6, 'adeedwefkkwk', NULL, 'abdcsdcs@abc.com', '64643565', NULL, '$2y$10$x3iZMB/1rrMwIZIS2CEhzu5HZgOp1LK37J20ws4unomnion3SXwHS', NULL, '2018-04-09 11:52:46', '2018-04-09 11:52:46', '2018-04-09 11:52:46'),
(7, 'a', NULL, NULL, NULL, NULL, '123456', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-04-09 12:02:11'),
(8, 'admin', '1523324362_1522817743_avatar.png', 'admina@gmail.com', '01234566220', 1, '$2y$10$zeWyDO/B1etxsKNv.Er27OfLfexNIEXNLBb52X0z0QmOKt0TkbBwy', 'gRSfqZrvayqs3txlnVweLZ7an1CaDEJ2Wrcp0MXH6dDEx3tr6aadKI3tsvpc', '2018-04-10 01:02:50', '2018-04-10 01:39:22', '2018-04-10 01:39:22'),
(9, 'adminadmin', NULL, 'a@amail.com', '00031', 1, '$2y$10$Kb9c/GW0kh1CHvRZVXiFauLVAlyYkesZWhtguJeu8Y22gyn4oNUBG', NULL, '2018-04-10 01:05:11', '2018-04-10 01:05:11', '2018-04-10 01:11:30'),
(10, 'grrrr', NULL, 'asd@sfhe.com', 'fefirh', NULL, '$2y$10$zO9/e2ovJ6m7rSZm3CH06eRq.L/gtayVzuOmhV7C.nakOmNTQqBue', NULL, '2018-04-10 01:25:01', '2018-04-10 01:25:01', '2018-04-10 01:25:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
