-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 07:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mwdw2`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `friendship_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`user1_id`, `user2_id`, `friendship_status`) VALUES
(2, 1, 1),
(2, 3, 1),
(2, 4, 1),
(1, 5, 1),
(3, 5, 1),
(4, 5, 1),
(4, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_caption` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_public` char(1) NOT NULL,
  `post_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_caption`, `post_time`, `post_public`, `post_by`) VALUES
(1, 'Hello there!', '2021-12-22 19:20:06', 'Y', 1),
(2, 'Paul James has changed his profile picture.', '2012-12-22 19:20:06', 'N', 2),
(3, 'A new artwork from the upcoming content.', '2017-12-22 19:20:06', 'Y', 3),
(4, 'New Year Eve Fireworks', '2022-12-22 19:20:06', 'Y', 4),
(5, 'Visit our profile to check out the upcoming transfers and rumors for January 2018', '2017-12-22 19:20:06', 'N', 5),
(6, 'Happy new year!', '2017-12-22 19:20:06', 'N', 5),
(7, 'Hello', '2024-05-13 16:20:31', 'Y', 4),
(8, 'New here', '2024-05-13 17:43:02', 'N', 6),
(9, 'Newww', '2024-05-13 17:43:22', 'Y', 6),
(10, 'Neu', '2024-05-13 17:45:42', 'N', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_username` varchar(20) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` char(1) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_username`, `user_email`, `user_password`, `user_gender`, `user_birthdate`, `user_about`) VALUES
(1, 'Armin Virgil', 'armin', 'armin@gmail.com', 'cf3384d079ddcb4ca02fadab6be9802d', 'M', '2001-02-05', NULL),
(2, 'Paul James', 'paul', 'paul@gmail.com', '6c63212ab48e8401eaf6b59b95d816a9', 'M', '1998-12-19', 'New profile!'),
(3, 'Chris Wilson', 'chris', 'chris@gmail.com', '6b34fe24ac2ff8103f6fce1f0da2ef57', 'M', '1996-01-18', NULL),
(4, 'Rory Blue', 'rory', 'rory@gmail.com', '6c27ea029ce5894cf6c66690bbe6acde', 'F', '1994-04-18', 'New profile!'),
(5, 'Andrea Surman', 'andrea', 'andrea@gmail.com', '1c42f9c1ca2f65441465b43cd9339d6c', 'M', '1994-06-06', NULL),
(6, 'user', 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'M', '2024-05-13', 'New user!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
