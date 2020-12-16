-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2020 at 06:53 AM
-- Server version: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panel06`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rlname` varchar(255) NOT NULL,
  `fnname` varchar(255) NOT NULL,
  `member_alter` varchar(255) NOT NULL,
  `tracker` varchar(255) NOT NULL,
  `team_id` varchar(255) NOT NULL,
  `socials` varchar(255) NOT NULL,
  `eigenschaften` varchar(255) NOT NULL,
  `zukunft` varchar(255) NOT NULL,
  `cws` varchar(255) NOT NULL,
  `state` enum('active','deleted') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `user_id`, `username`, `rlname`, `fnname`, `member_alter`, `tracker`, `team_id`, `socials`, `eigenschaften`, `zukunft`, `cws`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'asd', 'asd', 'asd', 'asd', 'asd', '1', '', '', '', 'ja', 'active', '2020-12-10 07:37:21', '2020-12-10 07:37:21', NULL),
(2, 1, 'asdq', 'asd', 'asd', 'asd', 'aa', '1', '', '', '', 'ja', 'active', '2020-12-10 07:37:46', '2020-12-10 07:37:46', NULL),
(3, 1, 'qwe', 'asd', 'asd', 'asd', 'asd', '1', '', '', '', 'ja', 'active', '2020-12-10 07:37:54', '2020-12-10 07:37:54', NULL),
(4, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:38:01', '2020-12-10 07:38:01', NULL),
(5, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:38:57', '2020-12-10 07:38:57', NULL),
(6, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:39:00', '2020-12-10 07:39:00', NULL),
(7, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:39:24', '2020-12-10 07:39:24', NULL),
(8, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:39:29', '2020-12-10 07:39:29', NULL),
(9, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:40:08', '2020-12-10 07:40:08', NULL),
(10, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:40:17', '2020-12-10 07:40:17', NULL),
(11, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:40:23', '2020-12-10 07:40:23', NULL),
(12, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:40:26', '2020-12-10 07:40:26', NULL),
(13, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:40:29', '2020-12-10 07:40:29', NULL),
(14, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:40:33', '2020-12-10 07:40:33', NULL),
(15, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:40:37', '2020-12-10 07:40:37', NULL),
(16, 1, 'asd', 'asd', 'asd', 'asd', '', '1', '', '', '', '', 'active', '2020-12-10 07:40:40', '2020-12-10 07:40:40', NULL),
(17, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:40:52', '2020-12-10 07:40:52', NULL),
(18, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:40:56', '2020-12-10 07:40:56', NULL),
(19, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:40:58', '2020-12-10 07:40:58', NULL),
(20, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:40:59', '2020-12-10 07:40:59', NULL),
(21, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:00', '2020-12-10 07:41:00', NULL),
(22, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:00', '2020-12-10 07:41:00', NULL),
(23, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:01', '2020-12-10 07:41:01', NULL),
(24, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:02', '2020-12-10 07:41:02', NULL),
(25, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:02', '2020-12-10 07:41:02', NULL),
(26, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:03', '2020-12-10 07:41:03', NULL),
(27, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:04', '2020-12-10 07:41:04', NULL),
(28, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:04', '2020-12-10 07:41:04', NULL),
(29, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:05', '2020-12-10 07:41:05', NULL),
(30, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:06', '2020-12-10 07:41:06', NULL),
(31, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:06', '2020-12-10 07:41:06', NULL),
(32, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:07', '2020-12-10 07:41:07', NULL),
(33, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:08', '2020-12-10 07:41:08', NULL),
(34, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:08', '2020-12-10 07:41:08', NULL),
(35, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:09', '2020-12-10 07:41:09', NULL),
(36, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:10', '2020-12-10 07:41:10', NULL),
(37, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:10', '2020-12-10 07:41:10', NULL),
(38, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:11', '2020-12-10 07:41:11', NULL),
(39, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:12', '2020-12-10 07:41:12', NULL),
(40, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:12', '2020-12-10 07:41:12', NULL),
(41, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:13', '2020-12-10 07:41:13', NULL),
(42, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:14', '2020-12-10 07:41:14', NULL),
(43, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:14', '2020-12-10 07:41:14', NULL),
(44, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:15', '2020-12-10 07:41:15', NULL),
(45, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:16', '2020-12-10 07:41:16', NULL),
(46, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:17', '2020-12-10 07:41:17', NULL),
(47, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:17', '2020-12-10 07:41:17', NULL),
(48, 1, 'wer', 'wer', 'wer', 'wer', 'wer', '1', '', '', '', 'ja', 'active', '2020-12-10 07:41:18', '2020-12-10 07:41:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_teams`
--

CREATE TABLE `member_teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` enum('active','disabled') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_teams`
--

INSERT INTO `member_teams` (`id`, `name`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asd', 'active', '2020-12-10 07:37:13', '2020-12-10 07:37:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `login` int(11) NOT NULL DEFAULT 1,
  `register` int(11) NOT NULL DEFAULT 1,
  `impressum` longtext DEFAULT NULL,
  `agb` longtext DEFAULT NULL,
  `datenschutz` longtext DEFAULT NULL,
  `sitename` varchar(255) NOT NULL DEFAULT 'panel06.memberdb.de',
  `siteNameBig` varchar(255) NOT NULL DEFAULT 'eSports Member Database',
  `siteNameSmall` varchar(255) NOT NULL DEFAULT 'MemberDB',
  `memberLimit` int(11) NOT NULL DEFAULT 50
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`login`, `register`, `impressum`, `agb`, `datenschutz`, `sitename`, `siteNameBig`, `siteNameSmall`, `memberLimit`) VALUES
(1, 1, NULL, NULL, NULL, 'panel06.memberdb.de', 'eSports Member Database', 'MemberDB', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state` enum('pending','active') NOT NULL,
  `role` enum('customer','admin') NOT NULL,
  `session_token` varchar(255) DEFAULT NULL,
  `verify_code` varchar(255) DEFAULT NULL,
  `member_limit` int(11) NOT NULL DEFAULT 200,
  `user_addr` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `state`, `role`, `session_token`, `verify_code`, `member_limit`, `user_addr`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.de', '$2y$10$eq6tb/rPpluIUfRBvkIS..If1/WJ4Beb8N2b0K10PRlKZceRNeZAq', 'active', 'admin', 'VRtvfpeLKZdAgl8MvJfbGGPwLgUTzI', NULL, 200, '2003:e8:718:a9:8516:d21b:2fba:48bb', '2020-12-06 10:16:17', '2020-12-16 00:39:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_teams`
--
ALTER TABLE `member_teams`
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
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `member_teams`
--
ALTER TABLE `member_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
