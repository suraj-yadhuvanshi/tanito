-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 11:37 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Movies'),
(2, 'Web Show'),
(3, 'Videos');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `user_id`, `video_id`, `comments`, `created_at`) VALUES
(1, 2, 3, 'hello how r u', '2020-04-23 12:11:32'),
(2, 2, 3, 'hello how r u', '2020-04-23 12:11:52'),
(3, 39, 21, 'nice song', '2020-04-23 14:14:15'),
(4, 39, 21, 'zhr song bhai super dil ko touch kr gya mai next song ka wait krunga bro super se bhi uper', '2020-04-23 14:18:41'),
(5, 39, 21, 'nice', '2020-04-23 14:23:18'),
(6, 34, 16, 'super', '2020-04-23 14:23:59'),
(17, 34, 21, 'nice', '2020-04-24 09:24:44'),
(18, 34, 21, 'abc', '2020-04-24 09:25:09'),
(19, 34, 21, 'asdad', '2020-04-24 09:26:40'),
(20, 47, 21, 'nice song , testing by suryaa', '2020-04-26 04:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`) VALUES
(1, 'Hindi'),
(2, 'English'),
(1, 'Hindi'),
(2, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo`) VALUES
(1, 'logo.jpg'),
(0, 'logos.png'),
(0, 'logos1.png'),
(1, 'logo.jpg'),
(0, 'logos.png'),
(0, 'logos1.png');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `playid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `created_id` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`playid`, `user_id`, `video_id`, `created_id`) VALUES
(1, 12, 12, '2020-03-19 13:17:00'),
(3, 0, 21, '2020-04-01 13:22:24'),
(4, 0, 16, '2020-04-03 15:24:48'),
(6, 37, 21, '2020-04-06 11:08:50'),
(7, 37, 15, '2020-04-06 11:22:59'),
(8, 37, 20, '2020-04-06 11:24:03'),
(15, 47, 5, '2020-04-26 04:48:00'),
(10, 39, 21, '2020-04-23 09:38:04'),
(14, 47, 21, '2020-04-26 04:42:54'),
(12, 16, 16, '2020-04-24 11:29:08'),
(13, 43, 21, '2020-04-24 15:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `savevideo`
--

CREATE TABLE `savevideo` (
  `saveid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savevideo`
--

INSERT INTO `savevideo` (`saveid`, `user_id`, `video_id`, `created_at`) VALUES
(1, 0, 21, '2020-04-01 13:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `admin_id`, `video_id`, `user_id`, `created_at`) VALUES
(6, 2, 0, 34, '2020-04-24 08:00:45'),
(8, 2, 0, 47, '2020-04-26 04:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`subcategory_id`, `category_id`, `subcategory_name`) VALUES
(1, 1, 'Romance'),
(2, 1, 'Action'),
(3, 1, 'Thriller'),
(4, 1, 'Someone'),
(5, 1, 'Special'),
(6, 2, 'Crime'),
(7, 2, 'Released'),
(8, 2, 'Hot Pick'),
(9, 2, 'best'),
(10, 3, 'Release'),
(11, 3, 'special'),
(12, 3, 'Sad Special'),
(13, 3, 'Someone'),
(14, 3, 'Trending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profile_image` varchar(300) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `otp` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `password`, `usertype`, `gender`, `profile_image`, `dob`, `status`, `otp`, `created_at`) VALUES
(2, 'admin', 'sineflix@gmail.com', '1234567890', 'Abhi@2015', 0, '1', '418459687111_500.jpg', '2020-02-01', 0, 0, '2020-02-24 00:02:16'),
(28, 'gaurav', 'user@gmail.com', '9599766840', '123456', 2, '1', 'Chrysanthemum.jpg', '', 0, 0, '2020-03-28 16:31:28'),
(29, 'pradeep', 'pradeepp@gmail.com', '9958984847', '123456', 2, '1', '', '', 0, 0, '2020-04-02 07:54:08'),
(30, 'pradeep', 'kjkjkj@gmail.com', '5546546565', '123456', 2, '1', '', '', 0, 0, '2020-04-04 12:32:19'),
(31, 'gaurav', 'gauravtiss2@gmail.co', '9599999999', 'gaurav123', 2, '1', '', '', 0, 0, '2020-04-04 13:02:42'),
(32, 'user', 'user12345@gmail.com', '8766567676', '123456', 2, '1', '', '', 0, 0, '2020-04-04 13:08:00'),
(33, 'test123', 'test3214@gmail.com', '9599468444', '123456', 2, '1', '', '', 0, 0, '2020-04-04 13:09:44'),
(46, 'Suryaa', 'suryaashukla@gmail.com', '9648473411', 'Abhi@2015', 1, '1', '418459687111_5001.jpg', '2020-04-26', 0, 0, '2020-04-25 21:31:19'),
(38, 'himanshu malik', 'himanshuvo9917@gmail', '7078479780', '99172343223', 2, '', '', '', 0, 0, '2020-04-12 13:21:34'),
(39, 'Dheeraj Sharma', 'jfffxggxhdhdhffh', '5535544575', '123456', 2, '', 'IMG-20200315-WA0004.jpg', '', 0, 0, '2020-04-23 02:38:02'),
(40, 'Pradeep', 'mail4upky@gmail.com', '9958984841', '12345678', 2, '1', '', '', 0, 4319, '2020-04-23 11:37:24'),
(44, 'gaurav', 'gauravtest@gmail.com', '9599766850', 'test@123', 2, '1', '', '', 0, 0, '2020-04-25 21:25:03'),
(43, 'Dheeraj Sharma', 'dheerajsharma151297@gmail.com', '7017491536', '123456', 2, '', '15852913405901.jpg', '', 0, 8449, '2020-04-24 08:11:21'),
(45, 'gaurav', 'gauravtest@123gmail.com', '9599766860', 'test', 1, '1', 'bmw.jpg', '2020-02-05', 0, 0, '2020-04-25 21:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `videoid` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `video_file` varchar(500) NOT NULL,
  `video_thumbnail` varchar(500) NOT NULL,
  `slider` int(11) DEFAULT 1,
  `top_slider` int(11) DEFAULT 0,
  `must_watch` int(11) NOT NULL DEFAULT 0,
  `counter` int(11) NOT NULL DEFAULT 0,
  `cdate` varchar(100) NOT NULL,
  `singer` varchar(500) NOT NULL,
  `lyrics` varchar(500) NOT NULL,
  `compose` varchar(500) NOT NULL,
  `company` varchar(500) NOT NULL,
  `vstatus` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`videoid`, `admin_id`, `category_id`, `lang_id`, `subcategory_id`, `title`, `description`, `video_file`, `video_thumbnail`, `slider`, `top_slider`, `must_watch`, `counter`, `cdate`, `singer`, `lyrics`, `compose`, `company`, `vstatus`) VALUES
(1, 2, 3, 1, 1, 'Album/Movie Love Aaj Kal (2020) Mp3 Songs', 'Artists\r\nArijit Singh, Madhubanti Bagchi , Pritam\r\nFile Type\r\nmp3\r\nTags\r\nArijit Singh Madhubanti Bagchi Pritam\r\n\r\n\r\n\r\n\r\nDownload Shayad Reprise - Love Aaj Kal Mp3 Song by Arijit Singh, Madhubanti Bagchi , Pritam in 190kbs & 320Kbps only on Pagalworld.\r\nFrom New Music Album \"Love Aaj Kal (2020) Mp3 Songs\". Free Download or listen online - in HD High Quality Audio.', 'videoplayback_(2).mp4', 'download.jpg', NULL, NULL, 1, 27, '2020-03-13', 'arjit singh', 'test', 'test', 'tsearies', 1),
(2, 2, 1, 1, 7, 'pati patni aur woh', 'pati patni aur woh', 'videoplayback_(3).mp4', 'download_(1).jpg', 1, 2, 1, 34, '2020-03-13', '', '', '', '', 1),
(5, 2, 3, 1, 6, 'baaghi 3', 'baaghi 3', 'videoplayback_(5)1.mp4', 'download2.jpg', 1, 2, 1, 21, '2020-03-13', '', '', '', '', 1),
(6, 2, 2, 1, 11, 'baaghi 3', 'baaghi 3', 'videoplayback_(6).mp4', 'download_(2).jpg', 1, 2, 1, 60, '2020-03-13', '', '', '', '', 1),
(7, 2, 3, 1, 4, 'Ikko Mikke      New Punjabi Song 2020', 'Download _08 - Satinder Sartaaj - Dastaar {www.PagalWorld.CoM} Mp3 Song by in 190kbs & 320Kbps only on Pagalworld.\r\nFrom New Music Album \"Satinder Sartaaj - Cheerey Wala Sartaaj\". Free Download or listen online - in HD High Quality Audio.', 'videoplayback.mp4', 'download_(3).jpg', NULL, NULL, 1, 7, '2020-03-13', '', '', '', '', 1),
(8, 2, 1, 1, 2, 'SHORT FILM', 'Action film is a film genre in which the protagonist or protagonists are thrust into a series of ... Common action scenes in films are generally, but not limited to, explosions, car chases, ... In short, bargain-basement Schwarzenegger. ... a large-studio genre in Hollywood, although this is not the case in Hong Kong action cinema, ...', 'videoplayback_(1).mp4', 'action.jpg', 1, NULL, 1, 18, '2020-03-13', '', '', '', '', 1),
(9, 2, 1, 1, 2, 'Arts Action Short Film', 'The film that kick-started Hong Kong cinema\'s kung-fu renaissance and launched ... It is these fight sequences that have endured, and although wuxia briefly fell out of ... Suddenly the humdrum vocabulary of the action movie has been ... martial arts films, Daggers is actually a little light on combat scenes.', 'videoplayback_(2)1.mp4', 'action222.jpg', NULL, NULL, 1, 17, '2020-03-13', 'aaa', 'aaa', 'aaa', 'aaa', 1),
(10, 2, 2, 1, 5, 'dear zindagi', 'Dear Zindagi\' is a story of a young cinematographer Kaira (Alia Bhatt), who breaks up with her current boyfriend Sid (Angad Bedi) and is ready to move into another relationship with Raghuvendra (Kunal Kapoor). Things get complicated and Kaira has to deal with the low phase in his personal and professional life.', 'videoplayback_(3)1.mp4', 'jpg.jpg', NULL, NULL, 1, 16, '2020-03-13', '', '', '', '', 1),
(11, 2, 2, 1, 9, 'queen ', 'This video karaoke song O Gujariya is from the Movie/Album Queen and is sung by Shefali Alvares. This is a performance quality karaoke song with lyrics.', 'videoplayback_(4)1.mp4', 'download.png', 1, NULL, 1, 14, '2020-03-13', '', '', '', '', 1),
(12, 2, 3, 1, 11, 'bahut tej', 'bahut tej', 'videoplayback_(8).mp4', 'Boht-Tej.jpg', 1, 0, 0, 17, '2020-03-17', '', '', '', '', 1),
(15, 2, 3, 1, 14, 'Dil Kehta Hai ', 'old song', 'videoplayback1.mp4', 'Koala.jpg', 1, 0, 0, 29, '2020-03-20', '', '', '', '', 1),
(16, 2, 1, 1, 1, 'webm', 'webm', 'videoplayback.webm', 'Lighthouse.jpg', 1, 0, 0, 158, '2020-03-21', '', '', '', '', 1),
(24, 2, 3, 1, 10, 'kjkh', 'lkjlk', 'videoplayback_(3)2.mp4', 'ajay2.jpg', 1, 0, 0, 1, '2020-04-27', 'jkhj', 'hkjhj', 'hjkhj', 'hkjhkjh', 1),
(20, 2, 3, 1, 12, 'bhula dunga', 'Bhula Dunga - Darshan Raval | Official Video | Sidharth Shukla | Shehnaaz Gill | Indie Music Label', 'videoplayback_(1)2.mp4', 'sidharth_shukla_and_shehnaaz_gill_cant_take_their_eyes_off_each_other_in_their_first_look_from_bhula_dunga.jpg', 1, 2, 1, 52, '2020-03-31', 'darshan raval', 'darshan raval', 'darshan', 'Indie Music Label', 1),
(21, 2, 3, 1, 10, 'Jinke liye', 'Gulshan Kumar & T-Series present  Bhushan Kumar\'s latest music video \"Jinke Liye\". This new song is from the album Jaani Ve and sung by Neha Kakkar featuring Jaani. The music for this song is composed by B Praak. The video director for this song is Arvindr Khaira.', 'videoplayback2.mp4', 'Jinke_Liye_Ft__Jaani.jpg', 1, 2, 1, 88, '2020-03-31', 'Neha Kakkar', 'Arvindr Khaira', 'Bhushan Kumar', 'T-Series', 1),
(25, 2, 1, 1, 2, 'Dear Pet Something\'s Fishy Popsocket', 'vdcxv', 'Wildlife1.wmv', 'bag-banner.jpg', 1, 0, 0, 1, '2020-09-10', 'sdfgdg', 'fgdg', 'dfgdg', 'dfgdg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_views`
--

CREATE TABLE `video_views` (
  `id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_views`
--

INSERT INTO `video_views` (`id`, `video_id`, `views`, `created_at`) VALUES
(1, 1, 27, '2020-03-13 10:56:16'),
(2, 0, 63, '2020-03-13 10:56:17'),
(3, 2, 34, '2020-03-13 10:59:41'),
(4, 3, 2, '2020-03-13 11:03:32'),
(5, 4, 1, '2020-03-13 11:07:31'),
(6, 6, 60, '2020-03-13 11:14:37'),
(24, 24, 1, '2020-04-27 10:32:55'),
(8, 7, 7, '2020-03-13 11:36:42'),
(9, 8, 18, '2020-03-13 12:09:12'),
(10, 9, 17, '2020-03-13 12:16:39'),
(11, 11, 14, '2020-03-13 12:48:54'),
(12, 10, 16, '2020-03-16 09:32:17'),
(13, 12, 17, '2020-03-17 12:46:05'),
(14, 5, 21, '2020-03-19 15:44:40'),
(22, 14, 1, '2020-04-27 05:05:55'),
(16, 15, 29, '2020-03-20 09:37:31'),
(17, 16, 158, '2020-03-21 03:32:12'),
(21, 13, 1, '2020-04-26 23:56:33'),
(19, 21, 88, '2020-03-31 09:13:26'),
(20, 20, 52, '2020-03-31 09:14:02'),
(25, 25, 1, '2020-09-10 09:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `vlike`
--

CREATE TABLE `vlike` (
  `likeid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `vlike` int(11) NOT NULL DEFAULT 0,
  `deslike` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vlike`
--

INSERT INTO `vlike` (`likeid`, `user_id`, `admin_id`, `video_id`, `vlike`, `deslike`, `created`) VALUES
(1, 34, 0, 16, 0, 0, '2020-04-23 11:30:57'),
(2, 34, 0, 16, 0, 0, '2020-04-23 11:31:00'),
(3, 34, 0, 16, 0, 0, '2020-04-23 11:31:05'),
(4, 34, 0, 16, 0, 0, '2020-04-23 11:31:32'),
(5, 34, 0, 16, 0, 0, '2020-04-23 11:49:22'),
(6, 34, 0, 16, 0, 0, '2020-04-23 11:49:28'),
(7, 34, 0, 16, 0, 0, '2020-04-23 11:51:44'),
(8, 34, 0, 16, 0, 0, '2020-04-23 11:51:54'),
(9, 34, 0, 16, 0, 0, '2020-04-23 11:51:57'),
(10, 34, 0, 16, 0, 0, '2020-04-23 11:52:01'),
(11, 34, 0, 16, 0, 0, '2020-04-23 11:52:04'),
(12, 34, 0, 16, 0, 0, '2020-04-23 11:52:54'),
(13, 34, 0, 16, 0, 0, '2020-04-23 11:56:28'),
(14, 34, 0, 16, 0, 0, '2020-04-23 11:56:31'),
(15, 34, 0, 16, 0, 0, '2020-04-23 11:56:33'),
(16, 34, 0, 16, 0, 0, '2020-04-23 11:57:45'),
(17, 34, 0, 16, 0, 0, '2020-04-23 11:57:48'),
(18, 34, 0, 16, 0, 0, '2020-04-23 13:02:56'),
(19, 34, 0, 16, 0, 0, '2020-04-23 13:14:28'),
(20, 34, 0, 16, 0, 0, '2020-04-23 13:14:31'),
(21, 39, 0, 21, 0, 1, '2020-04-23 13:42:20'),
(22, 40, 0, 21, 0, 0, '2020-04-23 18:37:51'),
(23, 40, 0, 21, 0, 0, '2020-04-23 18:37:53'),
(24, 40, 0, 21, 0, 0, '2020-04-23 18:37:55'),
(25, 40, 0, 21, 0, 0, '2020-04-23 18:37:58'),
(26, 40, 0, 21, 0, 0, '2020-04-23 18:38:03'),
(27, 40, 0, 21, 0, 0, '2020-04-23 18:38:06'),
(28, 40, 0, 21, 0, 1, '2020-04-23 18:38:09'),
(29, 40, 0, 6, 0, 0, '2020-04-23 18:38:34'),
(30, 40, 0, 6, 0, 0, '2020-04-23 18:38:36'),
(31, 40, 0, 6, 1, 0, '2020-04-23 18:38:37'),
(32, 34, 0, 16, 0, 0, '2020-04-24 06:16:56'),
(33, 34, 0, 16, 0, 1, '2020-04-24 08:00:41'),
(34, 43, 0, 21, 0, 0, '2020-04-24 15:26:34'),
(35, 43, 0, 21, 0, 0, '2020-04-24 15:26:39'),
(36, 43, 0, 21, 1, 0, '2020-04-24 15:26:43'),
(37, 47, 0, 21, 0, 0, '2020-04-26 04:42:57'),
(38, 47, 0, 21, 1, 0, '2020-04-26 04:43:05'),
(39, 47, 0, 5, 1, 0, '2020-04-26 04:48:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playid`);

--
-- Indexes for table `savevideo`
--
ALTER TABLE `savevideo`
  ADD PRIMARY KEY (`saveid`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`videoid`);

--
-- Indexes for table `video_views`
--
ALTER TABLE `video_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vlike`
--
ALTER TABLE `vlike`
  ADD PRIMARY KEY (`likeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `savevideo`
--
ALTER TABLE `savevideo`
  MODIFY `saveid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `videoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `video_views`
--
ALTER TABLE `video_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vlike`
--
ALTER TABLE `vlike`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
