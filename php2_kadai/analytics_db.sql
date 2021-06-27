-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2021 年 6 朁E27 日 04:24
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
-- テーブルの構造 `a_table`
--

CREATE TABLE IF NOT EXISTS `a_table` (
`id` int(12) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `indate` datetime NOT NULL,
  `device` varchar(64) NOT NULL,
  `age` int(3) NOT NULL,
  `annual_income` int(64) NOT NULL,
  `rank` int(1) NOT NULL,
  `answer_kakaku` int(1) NOT NULL,
  `answer_design` int(1) NOT NULL,
  `answer_support` int(1) NOT NULL,
  `answer_brand` int(1) NOT NULL,
  `answer_quality` int(1) NOT NULL,
  `sales` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `a_table`
--

INSERT INTO `a_table` (`id`, `last_name`, `indate`, `device`, `age`, `annual_income`, `rank`, `answer_kakaku`, `answer_design`, `answer_support`, `answer_brand`, `answer_quality`, `sales`) VALUES
(1, '田中', '2021-01-15 00:00:00', 'iPhone', 20, 200, 1, 4, 5, 3, 4, 4, 3),
(2, '田中', '2021-06-10 00:00:00', 'iPhone', 20, 200, 1, 4, 5, 2, 4, 4, 3),
(3, '田中', '2021-01-15 00:00:00', 'iPhone', 20, 200, 1, 4, 4, 5, 4, 4, 3),
(4, '田中', '2021-01-15 00:00:00', 'iPhone', 20, 200, 1, 4, 5, 3, 4, 4, 3),
(5, '田中', '2021-01-15 00:00:00', 'iPhone', 20, 200, 1, 4, 5, 5, 4, 4, 3),
(6, '田中', '2021-02-15 00:00:00', 'android', 25, 300, 1, 5, 3, 4, 3, 4, 5),
(7, '田中', '2021-02-15 00:00:00', 'android', 25, 300, 1, 5, 5, 4, 3, 4, 5),
(8, '田中', '2021-02-15 00:00:00', 'android', 25, 300, 1, 5, 5, 1, 3, 4, 5),
(9, '田中', '2021-02-15 00:00:00', 'android', 25, 300, 1, 5, 5, 4, 3, 4, 5),
(10, '田中', '2021-02-15 00:00:00', 'android', 25, 300, 1, 5, 3, 3, 3, 4, 5),
(11, '田中', '2021-03-15 00:00:00', 'iPhone', 30, 400, 2, 4, 4, 4, 4, 4, 8),
(12, '田中', '2021-03-15 00:00:00', 'iPhone', 30, 400, 2, 4, 4, 4, 4, 4, 8),
(13, '田中', '2021-03-15 00:00:00', 'iPhone', 30, 400, 2, 4, 4, 2, 4, 5, 8),
(14, '田中', '2021-03-15 00:00:00', 'iPhone', 30, 400, 2, 2, 4, 4, 4, 4, 8),
(15, '田中', '2021-03-15 00:00:00', 'iPhone', 30, 400, 2, 4, 5, 4, 4, 4, 8),
(16, '田中', '2021-06-11 00:00:00', 'iPhone', 35, 600, 3, 5, 4, 5, 3, 4, 20),
(17, '田中', '2021-04-15 00:00:00', 'iPhone', 35, 600, 3, 1, 4, 2, 3, 4, 12),
(18, '田中', '2021-04-15 00:00:00', 'iPhone', 35, 600, 3, 5, 4, 5, 3, 4, 12),
(19, '田中', '2021-04-15 00:00:00', 'iPhone', 35, 600, 3, 1, 5, 5, 3, 4, 12),
(20, '田中', '2021-04-15 00:00:00', 'iPhone', 35, 600, 3, 5, 4, 1, 3, 4, 12),
(21, '田中', '2021-03-15 00:00:00', 'iPhone', 40, 800, 4, 4, 3, 3, 5, 5, 2),
(22, '田中', '2021-05-15 00:00:00', 'iPhone', 40, 800, 4, 4, 5, 3, 5, 5, 15),
(23, '田中', '2021-03-02 00:00:00', 'iPhone', 40, 800, 4, 1, 5, 3, 5, 5, 15),
(24, '田中', '2021-05-15 00:00:00', 'iPhone', 40, 800, 4, 4, 5, 3, 5, 5, 15),
(25, '田中', '2021-05-15 00:00:00', 'iPhone', 40, 800, 4, 4, 5, 3, 5, 5, 15),
(26, '田中', '2021-06-15 00:00:00', 'android', 18, 100, 1, 3, 5, 1, 4, 3, 3),
(27, '田中', '2021-06-15 00:00:00', 'android', 18, 100, 2, 3, 3, 3, 4, 3, 3),
(28, '田中', '2021-06-15 00:00:00', 'android', 18, 100, 1, 3, 5, 3, 4, 3, 3),
(29, '田中', '2021-06-15 00:00:00', 'android', 18, 100, 1, 1, 5, 3, 4, 5, 2),
(30, '田中', '2021-06-15 00:00:00', 'android', 18, 100, 2, 3, 3, 3, 4, 3, 3),
(31, '田中', '2021-05-15 00:00:00', 'android', 18, 100, 1, 3, 5, 4, 4, 3, 1),
(32, '田中', '2021-05-15 00:00:00', 'android', 18, 100, 4, 3, 5, 2, 4, 5, 1),
(33, '田中', '2021-05-15 00:00:00', 'android', 18, 100, 4, 3, 5, 4, 4, 5, 2),
(34, '田中', '2021-05-15 00:00:00', 'android', 18, 100, 3, 3, 5, 4, 4, 3, 1),
(35, '田中', '2021-05-15 00:00:00', 'android', 18, 100, 3, 3, 5, 4, 4, 5, 4),
(36, '田中', '2021-06-15 00:00:00', 'iPhone', 18, 100, 2, 1, 5, 4, 4, 3, 3),
(37, '田中', '2021-04-01 00:00:00', 'iPhone', 18, 100, 1, 3, 5, 4, 4, 5, 2),
(38, '田中', '2021-06-15 00:00:00', 'iPhone', 18, 100, 1, 3, 5, 1, 4, 3, 2),
(39, '田中', '2021-05-15 00:00:00', 'iPhone', 18, 100, 1, 1, 5, 4, 4, 3, 3),
(40, '山田', '2021-06-26 01:55:44', 'android', 21, 200, 1, 5, 5, 5, 5, 5, 50),
(41, 'スズキ', '2021-06-26 06:20:08', 'iPhone', 51, 800, 4, 3, 5, 2, 4, 5, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_table`
--
ALTER TABLE `a_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_table`
--
ALTER TABLE `a_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
