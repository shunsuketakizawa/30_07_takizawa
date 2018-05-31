-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 5 月 31 日 13:16
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_product`
--

CREATE TABLE IF NOT EXISTS `mst_product` (
`code` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `gazou` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_product`
--

INSERT INTO `mst_product` (`code`, `name`, `price`, `gazou`) VALUES
(15, 'どんべえ', 380, 'images.jpg'),
(16, 'カレーうどん', 380, '3787273.jpg'),
(17, 'カレーうどん', 380, '3787273.jpg'),
(18, 'カレーうどん', 380, '3787273.jpg'),
(19, 'カレーうどん', 380, '3787273.jpg'),
(20, 'カレーうどん', 380, '3787273.jpg'),
(21, 'カレーうどん', 380, '3787273.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_product`
--
ALTER TABLE `mst_product`
 ADD PRIMARY KEY (`code`), ADD KEY `code` (`code`), ADD KEY `code_2` (`code`), ADD KEY `code_3` (`code`), ADD KEY `code_4` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_product`
--
ALTER TABLE `mst_product`
MODIFY `code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
