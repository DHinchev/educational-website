-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2016 at 07:31 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooljournal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) UNSIGNED NOT NULL,
  `category_title` varchar(64) NOT NULL,
  `cat_author` varchar(16) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category_title`, `cat_author`, `date`) VALUES
(45, 'Mathematic', 'master', '2016-04-17'),
(46, 'English', 'master', '2016-04-17'),
(47, 'German', 'master', '2016-04-17'),
(48, 'French', 'master', '2016-04-17'),
(49, 'History', 'master', '2016-04-17'),
(50, 'Geography', 'student1', '2016-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(120) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `permissions` varchar(120) DEFAULT NULL,
  `agreement` varchar(120) DEFAULT NULL,
  `activation` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `password`, `email`, `permissions`, `agreement`, `activation`) VALUES
(1, 'master', '521831', 'nathaniel.howk@gmail.com', 'teacher', 'accepted', NULL),
(42, 'daniel', '521831', 'daniel.hinchev@outlook.com', 'teacher', 'accepted', NULL),
(43, 'student1', '521831', 'daniel.hinchev@abv.bg', 'student', 'accepted', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(3) UNSIGNED NOT NULL,
  `category_id` int(3) UNSIGNED NOT NULL,
  `subcategory_id` int(3) UNSIGNED NOT NULL,
  `topics_id` int(3) UNSIGNED NOT NULL,
  `author` varchar(16) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `category_id`, `subcategory_id`, `topics_id`, `author`, `comment`, `date`) VALUES
(1, 46, 49, 1, 'master', 'What is this?', '2016-04-18'),
(2, 46, 49, 1, 'master', '', '2016-04-21'),
(3, 46, 49, 1, 'master', 'adfdasfsdf', '2016-04-21'),
(4, 45, 53, 2, 'master', 'sdkjghzdfjghfghjy', '2016-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcat_id` int(3) UNSIGNED NOT NULL,
  `parent_id` int(3) UNSIGNED NOT NULL,
  `subcategory_title` varchar(128) NOT NULL,
  `subcategory_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcat_id`, `parent_id`, `subcategory_title`, `subcategory_desc`) VALUES
(48, 46, 'English/American', 'something'),
(49, 46, 'Grammar', 'Gramatical rules questions'),
(50, 46, 'Syntax', 'Syntax related questions'),
(51, 46, 'Riddles', 'Answers of English riddles'),
(52, 50, 'Geo politics', '123456'),
(53, 45, 'Algebra', 'leraning');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(3) UNSIGNED NOT NULL,
  `subject_title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_title`) VALUES
(1, 'Mathematic'),
(2, 'Biology'),
(3, 'History'),
(4, 'Languages'),
(5, 'Chemistry'),
(6, 'Art'),
(7, 'Economy'),
(8, 'Computer Science'),
(9, 'Geography'),
(10, 'Photography'),
(11, 'Physic'),
(12, 'IT'),
(13, 'Web technologies'),
(14, 'Sociology'),
(15, 'Phylosophy'),
(16, 'Ethics'),
(17, 'Civil Rights'),
(18, 'Law'),
(19, 'Cyber Security'),
(20, 'Geometry'),
(21, 'Algebra'),
(22, 'Stereometry');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `confirm` varchar(120) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `permissions` varchar(120) DEFAULT NULL,
  `agreement` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`confirm`, `username`, `password`, `email`, `permissions`, `agreement`) VALUES
('5811f06e247045b893940fc912278cb1', 'dageran', '521831', 'danielhinchev@yahoo.com', 'teacher', 'accepted'),
('886956c5c4f059a30cfa73ce944b657f', 'dageran', '521831', 'danielhinchev@yahoo.com', 'teacher', 'accepted'),
('96a51b2f5cbddb73572129400dc50fa9', 'dageran', '521831', 'danielhinchev@yahoo.com', 'teacher', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topics_id` int(8) UNSIGNED NOT NULL,
  `category_id` int(3) UNSIGNED NOT NULL,
  `subcategory_id` int(3) UNSIGNED NOT NULL,
  `author` varchar(16) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `date_post` date NOT NULL,
  `views` int(5) UNSIGNED NOT NULL,
  `replies` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topics_id`, `category_id`, `subcategory_id`, `author`, `title`, `content`, `date_post`, `views`, `replies`) VALUES
(1, 46, 49, 'master', 'Add', 'sgtyyo8rtuy5t', '2016-04-18', 12, 0),
(2, 45, 53, 'master', 'Binary tree', 'sdvsdvsdf', '2016-05-11', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `upload_id` int(3) UNSIGNED NOT NULL,
  `parent_id_cat` int(3) UNSIGNED NOT NULL,
  `upload_title` varchar(255) NOT NULL,
  `file_location` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `size` bigint(20) NOT NULL,
  `date_subject` date NOT NULL,
  `subject` varchar(128) NOT NULL,
  `upload_author` varchar(120) NOT NULL,
  `subject_title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`upload_id`, `parent_id_cat`, `upload_title`, `file_location`, `type`, `size`, `date_subject`, `subject`, `upload_author`, `subject_title`) VALUES
(1, 1, 'Algebra', '../lessons/master/', 'html', 167, '2016-04-04', '1', 'master', 'Mathenmatic'),
(6, 1, 'Geo', '../lessons/master/', 'html', 155, '2016-04-06', '1', 'master', 'Mathematic'),
(7, 1, 'English', '../lessons/master/', 'html', 169, '2016-04-06', '4', 'master', 'Mathematic'),
(8, 2, 'Eng', '../lessons/master/', 'html', 161, '2016-04-06', '4', 'master', 'Biology'),
(12, 3, 'Borodino', '../lessons/master/', 'html', 154, '2016-04-08', '3', 'master', 'History'),
(13, 2, 'William', '../lessons/master/', 'html', 191, '2016-04-11', '2', 'master', 'Biology'),
(15, 2, 'ala bala', '../lessons/master/', 'html', 3152, '2016-04-18', '2', 'master', 'Biology'),
(19, 2, 'Cells', '../lessons/Nathaniel/', 'html', 173, '2016-04-18', '2', 'Nathaniel', 'Biology'),
(20, 2, 'Gama', '../lessons/Nathaniel/', 'html', 161, '2016-04-18', '2', 'Nathaniel', 'Biology'),
(21, 2, 'gara', '../lessons/Nathaniel/', 'html', 164, '2016-04-18', '2', 'Nathaniel', 'Biology'),
(22, 2, 'gara12', '../lessons/Nathaniel/', 'html', 164, '2016-04-18', '2', 'Nathaniel', 'Biology'),
(23, 3, 'zvcffzg', '../lessons/master/', 'html', 162, '2016-04-18', '2', 'master', 'History'),
(24, 3, 'adscfdsa', '../lessons/master/', 'html', 162, '2016-04-18', '2', 'master', 'History'),
(25, 3, 'Battle at Borodini,The beginning of Napoleon demise', '../lessons/master/', 'html', 2773, '2016-04-24', '3', 'master', 'History'),
(26, 8, 'Sequential search', '../lessons/master/', 'html', 181, '2016-05-08', '8', 'master', 'Computer Science'),
(32, 8, 'AA', '../lessons/master/', 'html', 139, '2016-05-08', '8', 'master', 'Computer Science'),
(33, 8, 'Garavana', '../lessons/master/', 'html', 139, '2016-05-08', '8', 'master', 'Computer Science'),
(35, 8, 'Gama', '../lessons/master/', 'html', 161, '2016-05-08', '8', 'master', 'Computer Science'),
(36, 3, 'Greek history - the Greek gods', '../lessons/student1/', 'html', 224, '2016-05-10', '3', 'student1', 'History'),
(37, 1, 'Binary Search Tree', '../lessons/master/', 'html', 1852, '2016-05-11', '1', 'master', 'Mathematic'),
(38, 6, 'sdgsdfgefg', '../lessons/master/', 'html', 195, '2016-05-11', '6', 'master', 'Art');

-- --------------------------------------------------------

--
-- Table structure for table `user_subjects`
--

CREATE TABLE `user_subjects` (
  `id` int(3) UNSIGNED NOT NULL,
  `user` varchar(128) NOT NULL,
  `subjects_parent_id` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_subjects`
--

INSERT INTO `user_subjects` (`id`, `user`, `subjects_parent_id`) VALUES
(15, 'master', 6),
(16, 'master', 3),
(17, 'master', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `topics_id` (`topics_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`confirm`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topics_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `parent_id_cat` (`parent_id_cat`);

--
-- Indexes for table `user_subjects`
--
ALTER TABLE `user_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_parent_id` (`subjects_parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcat_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topics_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `upload_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `user_subjects`
--
ALTER TABLE `user_subjects`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`subcat_id`),
  ADD CONSTRAINT `reply_ibfk_3` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`topics_id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`subcat_id`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_ibfk_1` FOREIGN KEY (`parent_id_cat`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `user_subjects`
--
ALTER TABLE `user_subjects`
  ADD CONSTRAINT `user_subjects_ibfk_1` FOREIGN KEY (`subjects_parent_id`) REFERENCES `subjects` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
