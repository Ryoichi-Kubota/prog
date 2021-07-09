-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2021 年 7 朁E09 日 19:57
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `analytics_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `indate` datetime NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `indate`, `lid`, `lpw`, `email`, `fname`, `kanri_flg`, `life_flg`) VALUES
(1, '角田 弁慶', '2021-07-05 00:00:00', 'kadoben', 'kadoben', 'kadoben@gmail.com', 'kadoben.jpg', 0, 0),
(3, '江戸 五郎', '2021-07-07 03:19:47', 'goro', 'goro', 'goro@gmail.com', 'goro.jpg', 2, 0),
(10, '花丸木', '2021-07-08 03:17:10', 'ramu', 'ramu', 'ramu@gmail.com', 'ramu.jpg', 1, 0),
(14, '管理 士郎', '2021-07-10 01:22:43', 'admin', 'admin', 'admin@gmail.com', 'hirasyain.jfif', 2, 0),
(15, 'テスト 三郎', '2021-07-10 02:33:34', 'test', 'test', 'test@gmail.com', '', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
