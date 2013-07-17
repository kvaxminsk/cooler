-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2013 at 01:03 AM
-- Server version: 5.5.31
-- PHP Version: 5.4.6-1ubuntu1.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `varetis_cooler`
--

-- --------------------------------------------------------

--
-- Table structure for table `battery_capacity_tablet`
--

CREATE TABLE IF NOT EXISTS `battery_capacity_tablet` (
  `id_battery_capacity` int(11) NOT NULL AUTO_INCREMENT,
  `name_battery_capacity` int(11) NOT NULL,
  PRIMARY KEY (`id_battery_capacity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `battery_capacity_tablet`
--

INSERT INTO `battery_capacity_tablet` (`id_battery_capacity`, `name_battery_capacity`) VALUES
(2, 2),
(3, 444);

-- --------------------------------------------------------

--
-- Table structure for table `beznal_computer`
--

CREATE TABLE IF NOT EXISTS `beznal_computer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_alt` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `beznal` varchar(12) NOT NULL,
  `beznal_sb` varchar(12) NOT NULL,
  `beznal_monitor` varchar(12) NOT NULL,
  `beznal_keyboard` varchar(12) NOT NULL,
  `beznal_mouse` varchar(12) NOT NULL,
  `beznal_loudspeakers` varchar(12) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `hdd` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `optical_drive` varchar(255) NOT NULL,
  `motherboard` varchar(255) NOT NULL,
  `housing` varchar(255) NOT NULL,
  `vga` varchar(255) NOT NULL,
  `monitor` varchar(255) NOT NULL,
  `loudspeakers` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Компьютеры по безналу' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `beznal_computer`
--

INSERT INTO `beznal_computer` (`id`, `title`, `image`, `image_alt`, `image_title`, `beznal`, `beznal_sb`, `beznal_monitor`, `beznal_keyboard`, `beznal_mouse`, `beznal_loudspeakers`, `processor`, `hdd`, `ram`, `optical_drive`, `motherboard`, `housing`, `vga`, `monitor`, `loudspeakers`, `information`, `date`) VALUES
(1, 'Компьютер Эко-Viotech130', 'ofisnyj_kompjuter/ofisnyj_kompjuter.jpg', 'офисный компьютер', 'офисный компьютер', '3.814.000', '2.494.000', '1.190.000', '80.000', '50.000', '-', 'Sempron 130(1x2.6GHz)', '500GB sataII', '2GB DDR3-1333', 'DVD±RW', 'SocketAM3 mATX', 'Classic ATX 400W', 'Video Int Up To 256MB', '19" LG E1942C-BN', '-', '(картинка может не соответствовать конфигурации)', '2012-10-25'),
(2, 'Компьютер для офиса Celeron G530', 'ofisnyj_kompjuter/ofisnyj_kompjuter_2.jpg', 'офисный компьютер', 'офисный компьютер', '3.837.000', '2.517.000', '1.190.000', '80.000', '50.000', '-', 'Celeron G530 (2x2.4GHz)', '500GB sataII', '2GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 400W', 'Video Int Up To 256MB', '19', '-', '(картинка может не соответствовать конфигурации)', '2012-10-25'),
(3, 'Компьютер Бухгалтер-профи Celeron G540', 'ofisnyj_kompjuter/ofisnyj_kompjuter_3.jpg', 'офисный компьютер', 'офисный компьютер', '3.874.000', '2.554.000', '1.190.000', '80.000', '50.000', '-', 'Celeron G540 (2x2.5GHz)', '500GB sataII', '2GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 400W', 'Video Int Up To 512MB', '19', '-', '(картинка может не соответствовать конфигурации)', '2012-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `build_computer`
--

CREATE TABLE IF NOT EXISTS `build_computer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `number` int(5) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `hdd` varchar(255) NOT NULL,
  `vga` varchar(255) NOT NULL,
  `motherboard` varchar(255) NOT NULL,
  `dvd_rw` varchar(255) NOT NULL,
  `housing` varchar(255) NOT NULL,
  `cost_sb_ue` int(5) NOT NULL,
  `cost_clearing` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Таблица вариантов сборки системных блоков' AUTO_INCREMENT=135 ;

--
-- Dumping data for table `build_computer`
--

INSERT INTO `build_computer` (`id`, `type`, `number`, `processor`, `ram`, `hdd`, `vga`, `motherboard`, `dvd_rw`, `housing`, `cost_sb_ue`, `cost_clearing`, `date`) VALUES
(1, 'ofisnyj', 1, 'AMD Athlon  X2 250u(2x1.6GHz)', 'DDRIII 1024MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '-', 'Classix/Optimum ATX 400W', 198, '2.296.000', '2012-10-24'),
(84, 'ofisnyj', 13, 'Intel Pentium G840 (2x2.8GHz)', 'DDRIII 4096MB', '500Gb', 'интегрированна', 'GigaByte GA-H61M-S1 Sock-1155', '+', 'Classix/Optimum ATX 400W', 272, '2.878.000', '2012-11-13'),
(83, 'ofisnyj', 12, 'Intel Pentium G640 (2x2.8GHz)', 'DDRIII 4096MB', '500Gb', 'интегрированна', 'Biostar H61MLV2 Sock-1155', '+', 'Classix/Optimum ATX 400W', 264, '2.886.000', '2012-11-13'),
(82, 'ofisnyj', 10, 'Intel Pentium G620 (2x2.6GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'GigaByte GA-H61M-S1 Sock-1155', '+', 'Classix/Optimum ATX 400W', 252, '2.750.000', '2012-11-13'),
(81, 'ofisnyj', 7, 'AMD Athlon X2 270 (2x3.4GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 234, '2.545.000', '2012-11-13'),
(80, 'ofisnyj', 8, 'Intel Celeron G540 (2x2.5GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'GigaByte GA-H61M-S1 Sock-1155', '+', 'Classix/Optimum ATX 400W', 236, '2.568.000', '2012-11-13'),
(79, 'AMD Athlon X2 250 (2x3.0GHz)', 4, 'AMD Athlon X2 250 (2x3.0GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 244, '2.530.000', '2012-11-13'),
(78, 'ofisnyj', 6, 'AMD Athlon X2 260 (2x3.2GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 232, '2.522.000', '2012-11-13'),
(77, 'ofisnyj', 2, 'Intel Celeron G530 (2x2.4GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'GigaByte GA-H61M-S1 Sock-1155', '-', 'Classix/Optimum ATX 400W', 207, '2.362.000', '2012-11-13'),
(12, 'shkolniku', 3, 'Intel Celeron G530 (2x2.4GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'Biostar H61MLV', '+', 'Classix/Optimum ATX 400W', 244, '', '2012-10-24'),
(13, 'shkolniku', 1, 'Intel Celeron G1610 (2x2.6GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'Biostar H61MLV', '+', 'Classix/Optimum ATX 400W', 227, '', '2012-10-24'),
(14, 'shkolniku', 4, 'AMD Athlon X2 245 (2x2.9GHz)', 'DDRIII 2048MB', '500Gb', 'GeForce GT520 1Gb', 'Biostar A780L3C', '+', 'Classix/Optimum ATX 400W', 261, '', '2012-10-24'),
(15, 'shkolniku', 5, 'AMD Athlon X2 255 (2x3.1GHz)', 'DDRIII 2048MB', '500Gb', 'GeForce GT610 1Gb', 'Biostar A780L3C', '+', 'Classix/Optimum ATX 400W', 264, '', '2012-10-24'),
(16, 'shkolniku', 7, 'AMD Athlon X4 651 (4x3.0GHz)', 'DDRIII 2048MB', '500Gb', 'GeForce GT210 1024Mb', 'AsRock A55M-DGS UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 288, '', '2012-10-24'),
(17, 'shkolniku', 7, 'AMD Athlon X4 640 (3x3.0GHz)', 'DDRIII 2048MB', '500Gb', 'GeForce GT610 1Gb', 'AsRock N68-VGS3 FX ', '+', 'Classix/Optimum ATX 400W', 295, '', '2012-10-24'),
(18, 'shkolniku', 2, 'AMD Athlon X2 270 (2x3.4GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'Biostar A780L3C', '+', 'Classix/Optimum ATX 400W', 231, '', '2012-10-24'),
(19, 'shkolniku', 6, 'Intel Pentium G550 (2x2.6GHz)', 'DDRIII 4096MB', '500Gb', 'GeForce GT610 1Gb', 'Biostar H61MLV2 Sock-1155', '+', 'Classix/Optimum ATX 400W', 279, '', '2012-10-24'),
(20, 'shkolniku', 10, 'AMD Athlon X3 455 (3x3.3GHz)', 'DDRIII 4096MB', '500Gb', 'GeForce GT620 1Gb', 'Biostar A780L3B', '+', 'Classix/Optimum ATX 400W', 325, '', '2012-10-24'),
(21, 'shkolniku', 9, 'Intel Pentium G840 (2x2.8GHz)', 'DDRIII 4096MB', '500Gb', 'GeForce GT620 1Gb', 'Biostar H61MLV2 Sock-1155', '+', 'Classix/Optimum ATX 400W', 316, '', '2012-10-24'),
(23, 'domashnij', 1, 'AMD Athlon X2 250 (2x3.0GHz)', 'DDRIII 2048MB	', '1000GB', 'интегрированная', 'Biostar A780L3B', '+', 'Classix/Optimum ATX 450W', 245, '', '2012-10-24'),
(24, 'domashnij', 2, 'AMD Athlon X2 270 (2x3.4GHz)', 'DDRIII 2048MB', '1000GB', 'GeForce GT610 1Gb', 'AsRock N68-VS3 FX', '+', 'Classix/Optimum ATX 450W', 285, '', '2012-10-24'),
(25, 'domashnij', 3, 'AMD Athlon X3 450 (3x3.2GHz)', 'DDRIII 2048MB', '1000GB', 'GeForce GT610 2Gb', 'AsRock N68-VGS3 UCC', '+', 'Classix/Optimum ATX 450W', 307, '', '2012-10-24'),
(26, 'domashnij', 5, 'AMD Athlon X3 460 (3x3.4GHz)', 'DDRIII 2048MB', '1000GB', 'GeForce GT440 1Gb', 'Biostar A780L3C', '+', 'Classix/Optimum ATX 450W', 320, '', '2012-10-24'),
(27, 'domashnij', 6, 'AMD Athlon 2 X4 645 (4x3.1GHz)', 'DDRIII 4096MB', '1000GB	', 'GeForce GT620 2Gb', 'Biostar A780L3C ', '+', 'Classix/Optimum ATX 450W', 338, '', '2012-10-24'),
(28, 'domashnij', 8, 'Intel Pentium G840 (2x2.8GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GT440 2Gb', 'Biostar H61MLV2 Sock-1155', '+', 'Classix/Optimum ATX 450W', 343, '', '2012-10-24'),
(29, 'domashnij', 9, 'AMD Athlon X4 640 (4x3.0GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GT620 2Gb', 'Biostar A780L3C ', '+', 'Classix/Optimum ATX 450W', 335, '', '2012-10-24'),
(30, 'domashnij', 10, 'Intel Pentium G860 (2x3.0GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GT630 1Gb', 'Biostar H61MLV2 Sock-1155', '+', 'Classix/Optimum ATX 450W', 341, '', '2012-10-24'),
(31, 'domashnij', 12, 'AMD A8-3850 (4x2.9GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GT630 2Gb', 'AsRock A55M-DGS', '+', 'Classix/Optimum ATX 450W', 362, '', '2012-10-24'),
(32, 'domashnij', 13, 'AMD A8-3870K (4x3.0GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GT640 1Gb', 'AsRock A55M-DGS', '+', 'Classix/Optimum ATX 450W', 388, '', '2012-10-24'),
(107, 'igrovoj', 11, 'Intel Core i5 3450 (4x3.1GHz)', 'DDRIII 8192MB', '2000GB', 'GeForce GTX650Ti 2Gb ', 'AsRock B75M-DGS ', '+', 'Classic ATX 500W', 659, '', '2013-01-31'),
(108, 'igrovoj', 13, 'Intel Core i5 3570  (4x3.4GHz)', 'DDRIII 8192MB', '2000GB', 'GeForce GTX 650Ti 2Gb', 'Biostar B75MU3B', '+', 'Classic ATX 500W', 689, '', '2013-01-31'),
(106, 'igrovoj', 5, 'AMD Phenom X4 965 (4x3.4GHz)', 'DDRIII 8192MB', '1000GB', 'GeForce GTX650Ti 2Gb ', 'ASRock 960GM-GS3 FX', '+', 'Classic ATX 500W', 517, '', '2013-01-31'),
(105, 'igrovoj', 9, 'Intel Core i5 2400 (4x3.1GHz)', 'DDRIII 8192MB', '1000GB', ' GeForce GTX650 2Gb', 'AsRock B75M-DGS ', '+', 'Classic ATX 500W', 592, '', '2013-01-31'),
(37, 'igrovoj', 4, 'AMD Athlon 2 X4 645 (4х3.1 GHz)', 'DDRIII 8192 MB', '1000GB', 'GeForce GTX 650Ti 1Gb', 'MSI 760GM-P23 (FX) ', '+', 'Classic ATX 500W', 486, '', '2012-10-24'),
(38, 'igrovoj', 3, 'AMD Phenom X4 965 (4x3.4GHz)', 'DDRIII 8192 MB', '1000GB', 'GeForce GTX650 2Gb', 'MSI 760GM-P23 (FX) ', '+', 'Classic ATX 500W', 484, '', '2012-10-24'),
(39, 'igrovoj', 8, 'Intel Core i3 2120 (2x3.3GHz)', 'DDRIII 8192MB', '1000GB', 'GeForce GTX 650Ti 1Gb', 'AsRock H61M-GS', '+', 'Classic ATX 500W', 549, '', '2012-10-24'),
(40, 'igrovoj', 7, 'AMD FX-6200 (6x3.8GHz)', 'DDRIII 8192MB', '1000GB', 'GeForce GTX650 2Gb', 'ASRock 960GM-GS3 FX', '+', 'Classic ATX 500W', 527, '', '2012-10-24'),
(41, 'igrovoj', 12, 'Intel Core i5 3470 (4x3.2GHz)', 'DDRIII 8192MB', '2000GB', 'GeForce GTX 650 Ti 2Gb', 'AsRock B75M-DGS ', '+', 'Classic ATX 500W', 667, '', '2012-10-24'),
(42, 'igrovoj', 14, 'Intel Core i5 3570 (4x3.4GHz)', 'DDRIII 8192MB', '2000GB', 'GeForce GTX 660 2Gb', 'AsRock B75M-DGS ', '+', 'Classic ATX 500W', 726, '', '2012-10-24'),
(116, 'multimedijnyj', 14, 'Intel Core i7-3820 (4х3.6 HGz)', 'DDRIII 8192MB', 'SSD 512Gb/ + 2Tb', 'MSI N660Ti TF 3GD5/OC 3GB GDDR5', 'Gigabyte GA-X79-UP4', '+', 'Cooler Master Gladiator 600 (БП FSP 1010W)', 1944, '', '2013-02-06'),
(114, 'multimedijnyj', 11, 'Intel Core i7 2600 (4x3.4GHz) ', 'DDRIII 16Gb', 'SSD 128Gb/ + 2Tb', 'GeForce GTХ 680 2Gb', 'AsRock B75 PRO3', '+', 'Classic ATX 600W', 1363, '', '2013-02-06'),
(112, 'multimedijnyj', 10, 'Intel Core i7-3820 (4х3.6HGz)', 'DDRIII 8192MB', 'SSD 64Gb/ + 2Tb', 'GeForce GTX 660 2Gb', 'Gigabyte GA-X79-UD3', '+', 'Classic ATX 600W', 1211, '', '2013-02-06'),
(111, 'multimedijnyj', 8, 'Intel Core i7 3770 (4x3.4GHz)', 'DDRIII 8192MB', '2000GB', 'GigaByte GV-N66TOC-3GD 3GB', 'AsRock B75 Pro3-M ', '+', 'Classic ATX 600W', 1136, '', '2013-02-06'),
(110, 'multimedijnyj', 5, 'AMD FX-8150 (8х3.6GHz)', 'DDRIII 16Gb', 'SSD 128Gb/ + 2Tb', 'GeForce GTX 670 2Gb', 'Asus M5A78L-M LX V2', '+', 'Classic ATX 600W', 1080, '', '2013-02-06'),
(49, 'multimedijnyj', 1, 'AMD FX-6100 (6x3.3GHz)', 'DDRIII 8192MB', '1500GB', 'GeForce GTX 650 2Gb', 'AsRock N68C-GS FX', '+', 'Classic ATX 500W ', 640, '', '2012-10-24'),
(50, 'multimedijnyj', 2, 'Intel Core i5 3550 (4x3.3GHz)', 'DDRIII 8192MB', '1500GB', 'GeForce GTX 650 2Gb', 'AsRock B75M', '+', 'Classic ATX 500W ', 775, '', '2012-10-24'),
(51, 'multimedijnyj', 4, 'Intel Core i5 2550K (4x3.4GHz) разбл.', 'DDRIII 8192MB', '2000GB', 'GeForce GTX 660 2Gb', 'AsRock B75M', '+', 'Classic ATX 500W', 845, '', '2012-10-24'),
(52, 'multimedijnyj', 6, 'Intel Core i7 2600K (4x3.4GHz) разбл.', 'DDRIII 8192MB', 'SSD 120Gb/ +2Tb', 'GeForce GTX 660 2Gb', 'AsRock B75M', '+', 'Classic ATX 500W', 1095, '', '2012-10-24'),
(53, 'multimedijnyj', 7, 'Intel Core i7 2700K (4x3.5GHz) разбл.', 'DDRIII 8192MB', 'SSD 120Gb/ + 2Tb', 'GeForce GTX 660 2Gb', 'AsRock B75M', '+', 'Classic ATX 600W', 1120, '', '2012-10-24'),
(54, 'multimedijnyj', 9, 'Intel Core i7 3770 (4x3.4GHz)', 'DDRIII 16Gb', 'SSD 120Gb/ + 2Tb', 'GeForce GTX 660 2Gb', 'AsRock B75M', '+', 'Classic ATX 600W', 1170, '', '2012-10-24'),
(56, 'beznal', 1, 'Intel Celeron G460  (1x1.8GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированная', 'AsRock H61M-VG3', '-', 'Classix/Optimum ATX 400W', 0, '2.328.000', '2012-10-25'),
(57, 'beznal', 2, 'Intel Celeron G530 (2x2.4GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'GigaByte GA-H61M-S1 Sock-1155', '-', 'Classix/Optimum ATX 400W', 0, '2.362.000', '2012-10-25'),
(58, 'beznal', 3, 'AMD Athlon X2 240 (2x2.8GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 0, '2.465.000', '2012-10-25'),
(59, 'beznal', 5, 'AMD Athlon X2 250 (2x3.0GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 0, '2.499.000', '2012-10-25'),
(60, 'beznal', 11, 'Intel Celeron G550 (2x2.6GHz)', 'DDRIII 4096MB', '1000Gb', 'интегрированна', 'GigaByte GA-H61M-S1 Sock-1155', '+', 'Classix/Optimum ATX 400W', 0, '2.807.000', '2012-10-25'),
(61, 'beznal', 10, 'AMD Athlon X2 270 (2x3.4GHz)', 'DDRIII 4096MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 0, '2.659.000', '2012-10-25'),
(62, 'beznal', 13, 'Intel Pentium G620 (2x2.6GHz)', 'DDRIII 2048MB', '1000Gb', 'интегрированна', 'GigaByte GA-H61M-S1 Sock-1155', '+', 'Classix/Optimum ATX 400W', 0, '2.863.000', '2012-10-25'),
(63, 'beznal', 15, 'Intel Pentium G640 (2x2.8GHz)', 'DDRIII 2048MB', '500Gb', 'Palit GeForce GT210 1GB', 'Biostar H61MLV Sock-1155', '+', 'Classix/Optimum ATX 400W', 0, '3.023.000', '2012-10-25'),
(64, 'beznal', 16, 'Intel Pentium G840 (2x2.8GHz)', 'DDRIII 4096MB', '1000Gb', 'интегрированна', 'GigaByte GA-H61M-S1 Sock-1155', '+', 'Classix/Optimum ATX 400W', 0, '3.102.000', '2012-10-25'),
(65, 'beznal', 14, 'Intel Pentium G870 (2x3.1GHz)', 'DDRIII 4096MB', '500Gb', 'интегрированна', 'Biostar H61MLV Sock-1155', '+', 'Classix/Optimum ATX 400W', 0, '3.011.000', '2012-10-25'),
(85, 'ofisnyj', 14, 'Intel Pentium G870 (2x3.1GHz)', 'DDRIII 4096MB', '500Gb', 'интегрированна', 'Biostar H61MLV2 Sock-1155', '+', 'Classix/Optimum ATX 400W', 275, '3.011.000', '2012-11-13'),
(86, 'ofisnyj', 3, 'AMD A4-3300  (2x2.5GHz)', 'DDRIII 2048MB', '500Gb', 'интегрирована в процессор Radeon™ HD 6410D', 'AsRock A55M-DGS Sock-FM1', '+', 'Classix/Optimum ATX 400W', 227, '2.465.000', '2012-11-13'),
(87, 'ofisnyj', 9, 'Intel Pentium G860 (2x3.0GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'GigaByte GA-H61M-S1 Sock-1155', '+', 'Classix/Optimum ATX 400W', 249, '2.829.000', '2012-11-13'),
(88, 'ofisnyj', 11, 'AMD Athlon X2 B24 (2x3.0GHz)', 'DDRIII 4096MB', '1000GB', 'интегрированна', 'AsRock N68-GS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 258, '2.818.000', '2012-11-13'),
(89, 'ofisnyj', 5, 'AMD Athlon X2 255 (2x3.1GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'Biostar A780L3C Sock-AM3', '+', 'Classix/Optimum ATX 400W', 229, '2.500.000', '2012-11-13'),
(90, 'ofisnyj', 4, 'AMD Athlon X2 245 (2x3.1GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 228, '2.477.000', '2012-11-13'),
(91, 'ofisnyj', 15, 'AMD Athlon X4 645 (4x3.1GHz)', 'DDRIII 4096MB', '500Gb', 'GeForce GT210 1Gb ', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 309, '3.387.000', '2012-11-13'),
(92, 'multimedijnyj', 3, 'Intel Core i5 3350P (4x3.1GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GTX 660 Ti 2Gb', 'AsRock B75M', '+', 'Classic ATX 500W', 810, '', '2012-11-22'),
(93, 'beznal', 9, 'Intel Celeron G555(2x2.7GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'AsRock H61M-VG3', '+', 'Classix/Optimum ATX 400W', 0, '2.647.000', '2012-12-05'),
(102, 'domashnij', 4, 'AMD Athlon X3 455 (3x3.3GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GT 630 1Gb', 'AsRock N68-VS3 UCC ', '+', 'Classix/Optimum ATX 450W', 355, '', '2013-01-31'),
(94, 'beznal', 4, 'AMD Athlon X2 245 (2x2.9GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 0, '2.477.000', '2012-12-05'),
(95, 'beznal', 7, 'AMD Athlon X2 260 (2x3.2GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 0, '2.522.000', '2012-12-05'),
(96, 'beznal', 6, 'AMD Athlon X2 255 (2x3.1GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 0, '2.500.000', '2012-12-05'),
(97, 'beznal', 8, 'AMD Athlon 2 X2 B24 (2x3.0GHz)', 'DDRIII 2048MB', '1000GB', 'интегрированна', 'AsRock N68-VS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 0, '2.636.000', '2012-12-05'),
(98, 'beznal', 12, 'Intel Pentium G860 (2x3.0GHz)', 'DDRIII 2048MB', '500Gb', 'интегрированна', 'GigaByte GA-H61M-S1 Sock-1155', '+', 'Classix/Optimum ATX 400W', 0, '2.829.000', '2012-12-05'),
(99, 'beznal', 17, 'AMD Athlon 2 X4 645 (4х3.1)', 'DDRIII 4096MB', '500Gb', 'MSI N610GT-MD1GD3/LP 1Gb', 'AsRock N68-GS3 UCC Sock-AM3', '+', 'Classix/Optimum ATX 400W', 0, '3.387.000', '2012-12-05'),
(100, 'igrovoj', 8, 'Intel Core i5 3330 (4x3.0GHz)', 'DDRIII 8192MB', '1000GB', 'GeForce GTX 650 2Gb', 'Biostar B75MU3B', '+', 'Classic ATX 500W', 575, '', '2012-12-06'),
(101, 'igrovoj', 10, 'AMD FX-8320 (8x3.5GHz)', 'DDRIII 8192MB', '1000GB', 'GeForce GTX650Ti 2Gb ', 'MSI 760GM-P23 (FX) ', '+', 'Classic ATX 500W', 605, '', '2012-12-06'),
(103, 'domashnij', 7, 'AMD Athlon 2 X4 645 (4x2.6GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GT 630 1Gb', 'Biostar A780L3C ', '+', 'Classix/Optimum ATX 450W', 340, '', '2013-01-31'),
(104, 'domashnij', 11, 'AMD Athlon 2 X4 651 (4x3.0GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GT 630 2Gb', 'AsRock A55M-DGS', '+', 'Classix/Optimum ATX 450W', 346, '', '2013-01-31'),
(109, 'igrovoj', 15, 'AMD FX-8350  (8x4.0GHz)', 'DDRIII 8192MB', '2000GB', 'GeForce GTX 660Ti 2Gb', 'MSI 760GM-P34 (FX)', '+', 'Classic ATX 600W', 799, '', '2013-01-31'),
(117, 'multimedijnyj', 12, 'AMD Phenom 2 X4 975 (4х3.6)', 'DDRIII 8192MB', 'SSD 512Gb/ + 2Tb', 'Asus GTX670-DC2G-4GD5 4Gb', 'AsRock 970 Extreme3', '+', 'Classic ATX 600W', 1570, '', '2013-02-07'),
(118, 'multimedijnyj', 13, 'Intel Core i7 3770K  (4х3.5HGz))', 'DDRIII 8192MB', 'SSD 512Gb/ + 2Tb', 'Asus GTX670-DC2G-4GD5 4Gb', 'Asus GTX670-DC2G-4GD5 4Gb', '+', 'Classic ATX 600W', 1790, '', '2013-02-07'),
(121, 'igrovoj', 2, 'AMD FX-4100 (4х3.6GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GTX 650 2Gb', 'MSI 760GM-P23 (FX) ', '+', 'Classic ATX 500W', 481, '', '2013-02-08'),
(120, 'igrovoj', 1, 'AMD Athlon 2 X4 645 (4x3.1GHz)', 'DDRIII 4096MB', '1000GB', 'GeForce GTX 650 2Gb', 'AsRock N68-VS3 FX ', '+', 'Classic ATX 500W', 454, '', '2013-02-08'),
(123, 'igrovoj_radeon', 1, 'AMD Athlon X3 460 (3x3.4GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon HD6570 2Gb', 'AsRock N68-VS3 FX', '+', 'Classix/Optimum ATX 500W', 423, '', '2013-02-27'),
(124, 'igrovoj_radeon', 2, 'AMD Athlon X4 631 (4x2.6GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon HD6670 2Gb', 'AsRock A55M-DGS', '+', 'Classic ATX 500W', 434, '', '2013-02-27'),
(125, 'igrovoj_radeon', 3, 'AMD Athlon X4 641 (4x2.8GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon HD6670 2Gb', 'AsRock A55M-DGS', '+', 'Classic ATX 500W', 443, '', '2013-02-27'),
(126, 'igrovoj_radeon', 4, 'AMD Athlon X4 645 (4x3.1GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon HD7750 2Gb', 'AsRock N68-VS3 FX', '+', 'Classic ATX 500W', 454, '', '2013-02-27'),
(127, 'igrovoj_radeon', 5, 'AMD Athlon 2 X4 651 (4x3.0GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon HD7750 2Gb', 'AsRock A55M-DGS', '+', 'Classic ATX 500W ', 456, '', '2013-02-27'),
(128, 'igrovoj_radeon', 7, 'AMD FX-4100 (4x3.6GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon HD7750  2Gb', 'Gigabyte GA-78LMT-S2 ', '+', 'Classic ATX 500W', 481, '', '2013-02-27'),
(129, 'igrovoj_radeon', 11, 'AMD FX-6200 (6x3.8GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon  7770 GHZ EDITION 1GB', 'MSI 760GM-P34 (FX)', '+', 'Classic ATX 500W', 707, '', '2013-02-27'),
(130, 'igrovoj_radeon', 6, 'AMD Phenom 2 X4 965(4х3.4GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon HD7750 2Gb ', 'MSI 760GM-P34 (FX)', '+', 'Classic ATX 500W ', 468, '', '2013-02-27'),
(131, 'igrovoj_radeon', 8, 'AMD FX-8120 (8х3.1GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon AX7750 2Gb', 'MSI 760GM-P34 (FX) ', '+', 'Classic ATX 500W', 536, '', '2013-02-27'),
(132, 'igrovoj_radeon', 9, 'AMD Phenom 2 X4 975 (4x3.6GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon HD7850 OC 2Gb', 'MSI 760GM-P34 (FX) ', '+', 'Classic ATX 500W', 608, '', '2013-02-27'),
(133, 'igrovoj_radeon', 10, 'AMD FX-8320 (8х3.5GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon HD7850 OC 2Gb', 'AsRock M3N78D FX ', '+', 'Classic ATX 500W', 693, '', '2013-02-27'),
(134, 'igrovoj_radeon', 12, 'AMD FX-8350 (8x4.0GHz)', 'DDRIII 8192MB', '2000GB', 'Radeon HD7870 GHZ Edition OC 2Gb', 'AsRock M3N78D FX', '+', 'Classic ATX 650W ', 758, '', '2013-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `case_material_tablet`
--

CREATE TABLE IF NOT EXISTS `case_material_tablet` (
  `id_case_material` int(11) NOT NULL AUTO_INCREMENT,
  `name_case_material` varchar(255) NOT NULL,
  PRIMARY KEY (`id_case_material`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `case_material_tablet`
--

INSERT INTO `case_material_tablet` (`id_case_material`, `name_case_material`) VALUES
(2, '3'),
(3, '123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Категории компьютеров' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `title`) VALUES
(1, 'ofisnyj', 'Офисный'),
(2, 'shkolniku', 'Школьнику'),
(3, 'domashnij', 'Домашний'),
(4, 'igrovoj', 'Игровой'),
(5, 'multimedijnyj', 'Мультимедийный'),
(6, 'akciya_domashnij', 'Акция &quot;Домашний&quot;'),
(7, 'akciya_igrovoj', 'Акция &quot;Игровой&quot;'),
(8, 'akciya_multimedijnyj', 'Акция &quot;Мультимедийный&quot;'),
(10, 'igrovoj_radeon', 'Игровой &quot;Radeon&quot;'),
(11, 'akciya_radeon', 'Акция &quot;Radeon&quot;'),
(12, 'akciya_main_page', 'Акция  &quot;Главная стр&quot;');

-- --------------------------------------------------------

--
-- Table structure for table `categories_kolonki`
--

CREATE TABLE IF NOT EXISTS `categories_kolonki` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Категории колонок' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories_kolonki`
--

INSERT INTO `categories_kolonki` (`id`, `type`, `title`) VALUES
(1, 'sven_2_0', 'Sven Stereo'),
(2, 'sven_2_1', 'Sven 2.1'),
(3, 'sven_5_1', 'Sven 5.1');

-- --------------------------------------------------------

--
-- Table structure for table `categories_monitor`
--

CREATE TABLE IF NOT EXISTS `categories_monitor` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Категории мониторов' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories_monitor`
--

INSERT INTO `categories_monitor` (`id`, `brand`, `title`) VALUES
(1, 'acer', 'Acer'),
(2, 'benq', 'BenQ'),
(3, 'lg', 'LG'),
(4, 'philips', 'PHILIPS'),
(5, 'samsung', 'Samsung'),
(6, 'viewsonic', 'Viewsonic');

-- --------------------------------------------------------

--
-- Table structure for table `categories_printer`
--

CREATE TABLE IF NOT EXISTS `categories_printer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Категории принтеров' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories_printer`
--

INSERT INTO `categories_printer` (`id`, `type`, `title`) VALUES
(1, 'epson_snpch', 'Принтеры и МФУ Epson с СНПЧ'),
(2, 'laser', 'Принтеры лазерные'),
(3, 'mfu', 'МФУ');

-- --------------------------------------------------------

--
-- Table structure for table `categories_sb`
--

CREATE TABLE IF NOT EXISTS `categories_sb` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Категории компьютеров' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories_sb`
--

INSERT INTO `categories_sb` (`id`, `type`, `title`) VALUES
(1, 'ofisnyj', 'Офисный'),
(2, 'shkolniku', 'Школьнику'),
(3, 'domashnij', 'Домашний'),
(4, 'igrovoj', 'Игровой'),
(5, 'multimedijnyj', 'Мультимедийный'),
(6, 'beznal', 'Безнал'),
(10, 'igrovoj_radeon', 'Игровой Radeon');

-- --------------------------------------------------------

--
-- Table structure for table `computer_case`
--

CREATE TABLE IF NOT EXISTS `computer_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_computer_case` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=25 ;

--
-- Dumping data for table `computer_case`
--

INSERT INTO `computer_case` (`id`, `name_computer_case`) VALUES
(17, 'Delux DLC-MV850'),
(18, 'STC-MASTER A15'),
(19, 'STC Magnum X7'),
(20, 'STC-MASTER A22'),
(21, 'STC-MASTER A17'),
(22, 'Delux DLC-MV875'),
(23, 'Delux DLC-MV871'),
(24, '');

-- --------------------------------------------------------

--
-- Table structure for table `computer_case_system_block`
--

CREATE TABLE IF NOT EXISTS `computer_case_system_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_computer_case` int(11) DEFAULT NULL,
  `id_system_block` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=145 ;

--
-- Dumping data for table `computer_case_system_block`
--

INSERT INTO `computer_case_system_block` (`id`, `id_computer_case`, `id_system_block`) VALUES
(42, 13, 5),
(43, 14, 5),
(44, 15, 6),
(46, 14, 10),
(47, 14, 11),
(48, 14, 12),
(49, 13, 8),
(50, 17, 13),
(51, 17, 14),
(52, 18, 15),
(53, 18, 16),
(54, 18, 17),
(55, 18, 18),
(56, 18, 19),
(57, 17, 20),
(58, 17, 21),
(59, 17, 22),
(60, 17, 23),
(61, 17, 24),
(62, 18, 25),
(63, 18, 26),
(64, 17, 27),
(65, 18, 28),
(66, 18, 29),
(67, 18, 30),
(68, 18, 32),
(69, 18, 33),
(70, 18, 34),
(71, 18, 35),
(72, 0, 36),
(73, 18, 36),
(75, 17, 39),
(76, 17, 40),
(77, 17, 41),
(78, 17, 42),
(79, 17, 43),
(80, 19, 44),
(81, 19, 45),
(82, 19, 46),
(83, 19, 47),
(84, 19, 48),
(85, 19, 49),
(86, 19, 50),
(87, 19, 51),
(88, 19, 52),
(89, 20, 53),
(90, 21, 54),
(91, 22, 55),
(92, 22, 56),
(93, 23, 57),
(94, 23, 58),
(95, 23, 59),
(96, 23, 60),
(97, 23, 61),
(98, 22, 62),
(99, 22, 63),
(100, 22, 64),
(101, 22, 65),
(102, 22, 66),
(103, 22, 67),
(104, 22, 67),
(105, 22, 68),
(106, 22, 69),
(107, 22, 70),
(108, 22, 71),
(109, 17, 72),
(110, 17, 73),
(111, 17, 74),
(112, 20, 75),
(113, 17, 76),
(114, 19, 77),
(115, 19, 78),
(116, 19, 79),
(117, 19, 80),
(118, 24, 81),
(119, 21, 81),
(120, 0, 42),
(121, 18, 76),
(122, 25, 0),
(123, 18, 45),
(124, 18, 45),
(125, 18, 45),
(126, 18, 45),
(127, 18, 45),
(128, 18, 45),
(129, 18, 45),
(130, 18, 45),
(131, 20, 45),
(132, 20, 45),
(133, 20, 45),
(134, 20, 45),
(135, 20, 45),
(136, 20, 45),
(137, 20, 45),
(138, 20, 45),
(139, 20, 45),
(140, 20, 45),
(141, 20, 45),
(142, 24, 0),
(143, 19, 0),
(144, 19, 81);

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE IF NOT EXISTS `cpu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_cpu` varchar(255) CHARACTER SET utf8 NOT NULL,
  `number_cores_cpu` varchar(11) COLLATE utf8_bin NOT NULL,
  `speed_cpu` varchar(11) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=113 ;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`id`, `name_cpu`, `number_cores_cpu`, `speed_cpu`) VALUES
(65, 'Intel Core i3 2120', '2', '3.3'),
(66, 'Intel Core i5 2310', '4', '2.9'),
(67, 'Intel Core i5 3570', '4', '3.4'),
(68, 'Intel Core i7 2600', '4', '3.4'),
(69, 'Intel Core i7 2700K', '4', '3.5'),
(70, 'Intel Core i7 2700', '4', '3.5'),
(71, 'AMD FX-4100', '4', '3.6'),
(72, 'AMD Athlon X4 641', '4', '2.8'),
(73, 'AMD AthlonX4 651', '4', '3.0'),
(74, 'AMD FX-8320', '8', '3.5'),
(75, 'AMD Phenom X4 955', '4', '3.2'),
(76, 'AMD FX-6100', '6', '3.3'),
(77, 'AMD FX-6200', '6', '3.8'),
(78, 'AMD FX-8150', '8', '3.6'),
(79, 'AMD FX-4130', '4', '3.8'),
(80, 'AMD FX-8350', '8', '4.0'),
(81, 'AMD Athlon X4975', '4', '3.3'),
(82, 'AMD Athlon X4 631', '4', '2.6'),
(83, 'Intel Core i3 3220', '2', '3.3'),
(84, 'Intel Core i7 3770', '4', '3.5'),
(85, 'AMD FX-8120', '8', '3.1'),
(86, 'Intel Core i5 2320', '4', '3.0'),
(87, 'Intel Core i5 3550', '4', '3.3'),
(88, 'Intel Core i5 3470', '4', '3.2'),
(89, 'Intel Celeron G530', '2', '2.4'),
(90, 'Intel Celeron G540', '2', '2.5'),
(91, 'Intel Pentium G630', '2', '2.7'),
(92, 'AMD Athlon X2 260', '2', '3.2'),
(93, 'Intel Pentium G840', '2', '2.8'),
(94, 'AMD Athlon X2 270', '2', '3.4'),
(95, 'AMD Athlon X3 460', '3', '3.4'),
(96, 'AMD Sempron 130', '1', '1.8'),
(97, 'Intel Celeron G460', '1', '1.8'),
(98, 'AMD Athlon X2 240', '2', '2.8'),
(99, 'AMD Athlon X2 245', '2', '2.9'),
(100, 'Intel Celeron G1610', '2', '2.4'),
(101, 'AMD Athlon X2 255', '2', '3.1'),
(102, 'AMD Athlon X3 455', '3', '3.3'),
(103, 'Intel Celeron G550', '2', '2.6'),
(104, 'Intel Pentium G860', '2', '3.0'),
(105, 'Intel Core i5 2550K', '4', '3.4'),
(106, 'Intel Pentium G870', '2', '3.1'),
(107, 'Intel Core i7 3820', '4', '3.6'),
(108, 'Intel Core i5 3330', '4', '3.0'),
(109, 'Intel Celeron G465', '1', '1900'),
(110, 'Intel Core i7 3770K', '4', '3.5'),
(111, 'Intel Celeron G1610', '2', '2.6'),
(112, 'AMD Athlon X4 640', '4', '3.0');

-- --------------------------------------------------------

--
-- Table structure for table `cpu_system_block`
--

CREATE TABLE IF NOT EXISTS `cpu_system_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cpu` int(11) DEFAULT NULL,
  `id_system_block` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=268 ;

--
-- Dumping data for table `cpu_system_block`
--

INSERT INTO `cpu_system_block` (`id`, `id_cpu`, `id_system_block`) VALUES
(114, 57, 5),
(115, 58, 5),
(117, 60, 6),
(118, 61, 6),
(119, 60, 6),
(120, 57, 7),
(121, 61, 8),
(122, 61, 9),
(123, 57, 10),
(124, 57, 10),
(125, 58, 11),
(126, 57, 11),
(127, 60, 12),
(128, 62, 13),
(131, 63, 13),
(132, 63, 6),
(133, 63, 8),
(134, 63, 9),
(135, 62, 13),
(136, 62, 13),
(137, 62, 13),
(138, 62, 13),
(139, 61, 13),
(140, 62, 13),
(141, 62, 13),
(142, 62, 13),
(143, 64, 13),
(144, 64, 6),
(145, 64, 8),
(146, 64, 9),
(147, 65, 13),
(148, 65, 6),
(149, 65, 8),
(150, 65, 9),
(151, 65, 14),
(152, 66, 15),
(153, 67, 16),
(154, 68, 17),
(155, 69, 18),
(156, 70, 19),
(157, 71, 20),
(158, 71, 21),
(159, 72, 22),
(160, 73, 23),
(161, 74, 24),
(162, 75, 25),
(163, 76, 26),
(164, 77, 27),
(165, 78, 28),
(166, 78, 29),
(167, 79, 30),
(168, 72, 32),
(169, 80, 33),
(170, 81, 34),
(171, 75, 35),
(172, 76, 36),
(173, 77, 37),
(174, 82, 39),
(175, 72, 40),
(176, 73, 41),
(177, 71, 42),
(178, 76, 43),
(179, 83, 44),
(180, 84, 45),
(181, 85, 46),
(182, 78, 47),
(183, 77, 48),
(184, 85, 49),
(185, 86, 50),
(186, 87, 51),
(187, 84, 52),
(188, 88, 53),
(189, 87, 54),
(190, 89, 55),
(191, 90, 56),
(192, 91, 57),
(193, 92, 58),
(194, 93, 59),
(195, 94, 60),
(196, 95, 61),
(197, 0, 62),
(198, 0, 62),
(199, 96, 62),
(200, 97, 63),
(201, 89, 64),
(202, 98, 65),
(203, 99, 66),
(204, 100, 67),
(205, 101, 68),
(206, 90, 69),
(207, 102, 70),
(208, 103, 71),
(209, 104, 72),
(210, 104, 73),
(211, 66, 74),
(212, 105, 74),
(213, 105, 15),
(214, 105, 75),
(215, 106, 76),
(216, 84, 77),
(217, 107, 78),
(218, 87, 79),
(219, 69, 80),
(220, 69, 80),
(221, 66, 81),
(222, 106, 73),
(223, 106, 72),
(224, 108, 0),
(225, 109, 0),
(226, 108, 76),
(227, 110, 0),
(228, 110, 76),
(229, 109, 55),
(230, 110, 77),
(231, 111, 0),
(232, 111, 76),
(233, 111, 55),
(234, 111, 77),
(235, 72, 39),
(236, 0, 70),
(237, 112, 0),
(238, 112, 76),
(239, 112, 55),
(240, 112, 77),
(241, 0, 70),
(242, 0, 70),
(243, 0, 70),
(244, 0, 70),
(245, 0, 70),
(246, 0, 70),
(247, 0, 70),
(248, 0, 70),
(249, 0, 70),
(250, 0, 70),
(251, 0, 70),
(252, 0, 70),
(253, 0, 70),
(254, 0, 70),
(255, 0, 70),
(256, 0, 70),
(257, 0, 70),
(258, 0, 70),
(259, 0, 70),
(260, 0, 70),
(261, 0, 70),
(262, 0, 70),
(263, 0, 70),
(264, 0, 70),
(265, 0, 70),
(266, 69, 19),
(267, 101, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cpu_tablet`
--

CREATE TABLE IF NOT EXISTS `cpu_tablet` (
  `id_cpu` int(11) NOT NULL AUTO_INCREMENT,
  `name_cpu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cpu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cpu_tablet`
--

INSERT INTO `cpu_tablet` (`id_cpu`, `name_cpu`) VALUES
(2, '2'),
(3, '123');

-- --------------------------------------------------------

--
-- Table structure for table `design_tablet`
--

CREATE TABLE IF NOT EXISTS `design_tablet` (
  `id_design` int(11) NOT NULL AUTO_INCREMENT,
  `name_design` varchar(255) NOT NULL,
  PRIMARY KEY (`id_design`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `design_tablet`
--

INSERT INTO `design_tablet` (`id_design`, `name_design`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `graphics_accelerator_tablet`
--

CREATE TABLE IF NOT EXISTS `graphics_accelerator_tablet` (
  `id_graphics_accelerator` int(11) NOT NULL AUTO_INCREMENT,
  `name_graphics_accelerator` varchar(255) NOT NULL,
  PRIMARY KEY (`id_graphics_accelerator`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `graphics_accelerator_tablet`
--

INSERT INTO `graphics_accelerator_tablet` (`id_graphics_accelerator`, `name_graphics_accelerator`) VALUES
(2, '2'),
(3, '555');

-- --------------------------------------------------------

--
-- Table structure for table `hdd`
--

CREATE TABLE IF NOT EXISTS `hdd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_hdd` varchar(255) NOT NULL,
  `size_hdd` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `hdd`
--

INSERT INTO `hdd` (`id`, `name_hdd`, `size_hdd`) VALUES
(27, 'HDD', 500),
(28, 'HDD', 1000),
(29, 'HDD', 1500),
(30, 'HDD', 2000),
(31, 'HDD', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `hdd_system_block`
--

CREATE TABLE IF NOT EXISTS `hdd_system_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_hdd` int(11) DEFAULT NULL,
  `id_system_block` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=139 ;

--
-- Dumping data for table `hdd_system_block`
--

INSERT INTO `hdd_system_block` (`id`, `id_hdd`, `id_system_block`) VALUES
(48, 23, 5),
(49, 24, 5),
(50, 25, 6),
(51, 26, 6),
(52, 23, 6),
(53, 25, 7),
(54, 26, 8),
(55, 25, 9),
(56, 23, 10),
(57, 23, 10),
(58, 25, 11),
(59, 25, 12),
(60, 25, 12),
(61, 27, 13),
(62, 28, 14),
(63, 28, 15),
(64, 28, 16),
(65, 28, 16),
(66, 28, 17),
(67, 29, 18),
(68, 30, 19),
(69, 28, 20),
(70, 28, 21),
(71, 28, 22),
(72, 28, 23),
(73, 28, 24),
(74, 29, 25),
(75, 28, 26),
(76, 29, 27),
(77, 29, 28),
(78, 28, 29),
(79, 30, 30),
(80, 30, 32),
(81, 30, 33),
(82, 30, 34),
(83, 30, 35),
(84, 30, 36),
(85, 30, 37),
(86, 0, 39),
(87, 28, 39),
(88, 28, 40),
(89, 29, 41),
(90, 29, 42),
(91, 30, 43),
(92, 27, 44),
(93, 30, 45),
(94, 30, 46),
(95, 29, 47),
(96, 29, 48),
(97, 30, 49),
(98, 30, 50),
(99, 30, 51),
(100, 31, 52),
(101, 28, 53),
(102, 30, 54),
(103, 27, 55),
(104, 27, 56),
(105, 27, 57),
(106, 27, 58),
(107, 28, 59),
(108, 28, 60),
(109, 28, 61),
(110, 27, 62),
(111, 27, 63),
(112, 27, 64),
(113, 27, 65),
(114, 27, 66),
(115, 27, 67),
(116, 27, 67),
(117, 27, 68),
(118, 27, 69),
(119, 27, 70),
(120, 27, 71),
(121, 27, 72),
(122, 27, 73),
(123, 27, 74),
(124, 31, 74),
(125, 27, 75),
(126, 31, 76),
(127, 27, 77),
(128, 27, 78),
(129, 31, 79),
(130, 27, 80),
(131, 27, 81),
(132, 28, 80),
(133, 28, 78),
(134, 28, 77),
(135, 28, 75),
(136, 28, 81),
(137, 28, 73),
(138, 28, 72);

-- --------------------------------------------------------

--
-- Table structure for table `ibp`
--

CREATE TABLE IF NOT EXISTS `ibp` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image_big` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `time_p` varchar(255) NOT NULL,
  `time_z` varchar(255) NOT NULL,
  `input` varchar(255) NOT NULL,
  `cost` int(5) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Источники бесперебойного питания' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `ibp`
--

INSERT INTO `ibp` (`id`, `image_big`, `image_small`, `model`, `power`, `time_p`, `time_z`, `input`, `cost`, `date`) VALUES
(1, 'ibp/ibp-1.jpg', 'ibp/small/ibp-1.jpg', 'ИБП FSP EP-450', '240 Вт', '10 мс.', '6 ч.', '162-290 В', 52, '2012-10-30'),
(2, 'ibp/ibp-2.jpg', 'ibp/small/ibp-2.jpg', 'ИБП Sven UPS Pro+ 500 VA', '320 Вт', '5 мс.', '3,6 ч.', '145 - 285 В', 77, '2012-10-30'),
(7, 'ibp/ibp-3.jpg', 'ibp/small/ibp-3.jpg', 'ИБП PowerCom BNT-400A', '240Вт', '4 мс', '6 ч.', '165 - 275 В', 66, '2012-11-30'),
(8, 'ibp/ibp-4.jpg', 'ibp/small/ibp-4.jpg', 'ИБП Sven UPS Pro+ 400 VA', '230 Вт', '10 мс', '6 ч.', '165 - 275 В', 67, '2012-11-30'),
(9, 'ibp/ibp-5.jpg', 'ibp/small/ibp-5.jpg', 'ИБП PowerCom WAR-600A', '300 Вт', '4 мс', '6 ч.', '165 - 253 В', 68, '2012-11-30'),
(10, 'ibp/ibp-6.jpg', 'ibp/small/ibp-6.jpg', 'ИБП PowerCom BNT-500A', '340Вт', '4 мс', '6 ч.', '165 - 275 В', 73, '2012-11-30'),
(11, 'ibp/ibp-7.jpg', 'ibp/small/ibp-7.jpg', 'ИБП Ippon Back Power Pro 400', '280 Вт', '3 мс', '4 ч.', '165 - 275 В', 76, '2012-11-30'),
(12, 'ibp/ibp-8.jpg', 'ibp/small/ibp-8.jpg', 'ИБП Ippon Comfo Pro 400', '240 Вт', '6 мс ', '8 ч.', '154 — 264 В ', 84, '2012-11-30'),
(13, 'ibp/ibp-9.jpg', 'ibp/small/ibp-9.jpg', 'ИБП Vivaldi Advance 650VA', '390 Вт', '6 мс', '8 ч.', '160 - 280 В', 84, '2012-11-30'),
(14, 'ibp/ibp-10.jpg', 'ibp/small/ibp-10.jpg', 'ИБП FSP EP-850', '480 Вт', '10 мс', '6 ч.', '162 - 290 В', 87, '2012-11-30'),
(15, 'ibp/ibp-11.jpg', 'ibp/small/ibp-11.jpg', 'ИБП Ippon Comfo Pro 600', '360 Вт', '6 мс', '8 ч.', '154 - 264 В', 90, '2012-11-30'),
(16, 'ibp/ibp-12.jpg', 'ibp/small/ibp-12.jpg', 'ИБП FSP Vesta 850', '480 Вт', '10 мс', '6 ч.', '162 - 290 В', 95, '2012-11-30'),
(17, 'ibp/ibp-13.jpg', 'ibp/small/ibp-13.jpg', 'ИБП PowerCom Black Knight BNT-800AP', '480 Вт', '4 мс', '6 ч.', '165 - 275 В', 106, '2012-11-30'),
(18, 'ibp/ibp-5.jpg', 'ibp/small/ibp-5.jpg', 'ИБП PowerCom WAR-1000A', '500 Вт ', '4 мс', '6 ч.', '165 - 253 В', 106, '2012-11-30'),
(19, 'ibp/ibp-7.jpg', 'ibp/small/ibp-7.jpg', 'ИБП Ippon Back Power Pro 800', '480 Вт', '3 мс', '4 ч.', '165 - 275 В', 109, '2012-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `igrovye_manipuljatory`
--

CREATE TABLE IF NOT EXISTS `igrovye_manipuljatory` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image_big` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `interface` varchar(255) NOT NULL,
  `buttons` varchar(255) NOT NULL,
  `vibration` varchar(255) NOT NULL,
  `cost` int(5) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Игровые манипуляторы' AUTO_INCREMENT=18 ;

--
-- Dumping data for table `igrovye_manipuljatory`
--

INSERT INTO `igrovye_manipuljatory` (`id`, `image_big`, `image_small`, `model`, `interface`, `buttons`, `vibration`, `cost`, `date`) VALUES
(1, 'igrovye-manipuljatory/im-1.jpg', 'igrovye-manipuljatory/small/im-1.jpg', 'Джойстик Genius F-23U', 'USB', '8', '+', 22, '2012-10-30'),
(2, 'igrovye-manipuljatory/im-2.jpg', 'igrovye-manipuljatory/small/im-2.jpg', 'Руль Genius Speed Wheel 5', 'USB', '11', '+', 185, '2012-10-30'),
(4, 'igrovye-manipuljatory/im-3.jpg', 'igrovye-manipuljatory/small/im-3.jpg', 'Геймпад GP-A01 Dialog Action', 'USB', ' 10 кнопок', '-', 15, '2012-11-29'),
(5, 'igrovye-manipuljatory/im-4.jpg', 'igrovye-manipuljatory/small/im-4.jpg', 'Геймпад GP-F20EL Nakatomi Fighter', 'USB', '12 кнопок', '+', 24, '2012-11-29'),
(6, 'igrovye-manipuljatory/im-5.jpg', 'igrovye-manipuljatory/small/im-5.jpg', 'Геймпад GP-A17EL Dialog Action ', 'PC USB,PS3', '12 кнопок', '+', 35, '2012-11-29'),
(7, 'igrovye-manipuljatory/im-6.jpg', 'igrovye-manipuljatory/small/im-6.jpg', 'Беспроводной геймпад Defender GAME MASTER WIRELESS', 'USB', '12 кнопок', '-', 38, '2012-11-29'),
(8, 'igrovye-manipuljatory/im-7.jpg', 'igrovye-manipuljatory/small/im-7.jpg', 'Руль игровой Defender ADRENALINE MINI', 'USB', '12 кнопок', '+', 45, '2012-11-29'),
(9, 'igrovye-manipuljatory/im-8.jpg', 'igrovye-manipuljatory/small/im-8.jpg', 'Беспроводной геймпад Dialog Master GP-M24RF', 'PC USB,PS3', '12 кнопок', '+', 59, '2012-11-29'),
(10, 'igrovye-manipuljatory/im-9.jpg', 'igrovye-manipuljatory/small/im-9.jpg', 'Джойстик Zalman  FPSGUN FG1000', 'USB', '6 кнопок', '-', 59, '2012-11-29'),
(11, 'igrovye-manipuljatory/im-10.jpg', 'igrovye-manipuljatory/small/im-10.jpg', 'Джойстик-руль Dialog GW-201 Street Racer', 'USB', '12 кнопок', '+', 71, '2012-11-29'),
(12, 'igrovye-manipuljatory/im-11.jpg', 'igrovye-manipuljatory/small/im-11.jpg', 'Джойстик-руль Dialog GW-300 RACE WINNER I ', 'USB', '12 кнопок', '+', 72, '2012-11-29'),
(13, 'igrovye-manipuljatory/im-12.jpg', 'igrovye-manipuljatory/small/im-12.jpg', 'Руль CANYON CNG-GW4', 'USB ', '14 кнопок', '+', 74, '2012-11-29'),
(14, 'igrovye-manipuljatory/im-13.jpg', 'igrovye-manipuljatory/small/im-13.jpg', 'Джойстик-руль Gembird STR-FFB2', 'USB', '9 кнопок', '+', 81, '2012-11-29'),
(15, 'igrovye-manipuljatory/im-14.jpg', 'igrovye-manipuljatory/small/im-14.jpg', 'Джойстик-руль  Dialog GW-11VR Ралли-Спорт ', ' USB', '12 кнопок', '+', 83, '2012-11-29'),
(16, 'igrovye-manipuljatory/im-15.jpg', 'igrovye-manipuljatory/small/im-15.jpg', 'Руль Logitech Driving Force GT PC Compatible', 'PS3, PS2, PC', '11 кнопок', '+', 223, '2012-11-29'),
(17, 'igrovye-manipuljatory/im-16.jpg', 'igrovye-manipuljatory/small/im-16.jpg', 'Руль Logitech G27 Racing Wheel ', 'USB', '18 кнопок', '+', 390, '2012-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `internal_memory_tablet`
--

CREATE TABLE IF NOT EXISTS `internal_memory_tablet` (
  `id_internal_memory` int(11) NOT NULL AUTO_INCREMENT,
  `name_internal_memory` varchar(255) NOT NULL,
  PRIMARY KEY (`id_internal_memory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `internal_memory_tablet`
--

INSERT INTO `internal_memory_tablet` (`id_internal_memory`, `name_internal_memory`) VALUES
(2, '2'),
(3, '444');

-- --------------------------------------------------------

--
-- Table structure for table `klaviaturji`
--

CREATE TABLE IF NOT EXISTS `klaviaturji` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Клавиатуры' AUTO_INCREMENT=28 ;

--
-- Dumping data for table `klaviaturji`
--

INSERT INTO `klaviaturji` (`id`, `image`, `model`, `cost`, `date`) VALUES
(1, 'klaviaturji/kl_1.jpg', 'Sven Basic 304', '10', '2012-10-30'),
(2, 'klaviaturji/kl_2.jpg', 'Genius KB06XE', '9', '2012-10-30'),
(3, 'klaviaturji/kl_3.jpg', 'Genius KB-110', '10', '2012-10-30'),
(4, 'klaviaturji/kl_4.jpg', 'Genius SlimStar 110', '12', '2012-10-30'),
(5, 'klaviaturji/kl_5.jpg', 'Genius KB-220e', '15', '2012-10-30'),
(6, 'klaviaturji/kl_6.jpg', 'Logitech Keyboard K200', '15', '2012-10-30'),
(7, 'klaviaturji/kl_7.jpg', 'Genius KB-320e', '18', '2012-10-30'),
(8, 'klaviaturji/kl_8.jpg', 'Sven Office 7007', '21', '2012-10-30'),
(9, 'klaviaturji/kl_9.jpg', 'Genius Luxemate T810', '31', '2012-10-30'),
(10, 'klaviaturji/kl_10.jpg', 'Genius KB06XE', '31', '2012-10-30'),
(14, 'klaviaturji/kl_11.jpg', 'Defender Element HB-520', '8', '2012-11-29'),
(15, 'klaviaturji/kl_12.jpg', 'Sven Standard 303 ', '9', '2012-11-29'),
(16, 'klaviaturji/kl_13.jpg', 'Gembird KB-8300M-BL-R', '9', '2012-11-29'),
(17, 'klaviaturji/kl_14.jpg', 'Genius KB-200', '10', '2012-11-29'),
(18, 'klaviaturji/kl_15.jpg', 'Gembird KB-8300M-SB-R', '10', '2012-11-29'),
(19, 'klaviaturji/kl_16.jpg', ' Defender ММ Etude 980 B', '11', '2012-11-29'),
(20, 'klaviaturji/kl_17.jpg', 'Sven Comfort 3050', '12', '2012-11-29'),
(21, 'klaviaturji/kl_18.jpg', 'QUMO(гибкая, резиновая)', '19', '2012-11-29'),
(22, 'klaviaturji/kl_19.jpg', 'A4-Tech G-600', '20', '2012-11-29'),
(23, 'klaviaturji/kl_20.jpg', 'Sven Multimedia EL 4001', '23', '2012-11-29'),
(24, 'klaviaturji/kl_21.jpg', ' A4-tech 3100N', '23', '2012-11-29'),
(25, 'klaviaturji/kl_22.jpg', 'A4-tech 7200N', '23', '2012-11-29'),
(26, 'klaviaturji/kl_23.jpg', 'Genius SlimStar 8010', '28', '2012-11-29'),
(27, 'klaviaturji/kl_24.jpg', 'Sven Multimedia EL 4005 MH', '51', '2012-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `kolonki`
--

CREATE TABLE IF NOT EXISTS `kolonki` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `image_big` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `diapozon` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `cost` int(5) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Колонки' AUTO_INCREMENT=58 ;

--
-- Dumping data for table `kolonki`
--

INSERT INTO `kolonki` (`id`, `type`, `image_big`, `image_small`, `model`, `color`, `power`, `material`, `diapozon`, `size`, `other`, `cost`, `date`) VALUES
(1, 'sven_2_0', 'kolonki/st_1.jpg', 'kolonki/small/st_1.jpg', 'Колонки Sven 310', 'Silver', '2x1 Вт', 'пластик', '100-20000 Гц', '70x205x70 мм', 'разъем для наушников', 19, '2012-10-29'),
(2, 'sven_2_0', 'kolonki/st_2.jpg', 'kolonki/small/st_2.jpg', 'Колонки Sven 315', 'Black', '2x2.5 Вт', 'пластик', '100-20000 Гц', '65x70x70 мм', 'USB', 18, '2012-10-29'),
(3, 'sven_2_0', 'kolonki/st_3.jpg', 'kolonki/small/st_3.jpg', 'Колонки Sven 230', 'Black', '2x2 Вт', 'пластик', '100-20000 Гц', '65x200x60 мм', 'разъем для наушников', 18, '2012-10-29'),
(4, 'sven_2_0', 'kolonki/st_4.jpg', 'kolonki/small/st_4.jpg', 'Колонки Sven 314', 'Black', '2x2 Вт', 'пластик', '100-20000 Гц', '64x150x55 мм', 'USB', 20, '2012-10-29'),
(5, 'sven_2_0', 'kolonki/st_5.jpg', 'kolonki/small/st_5.jpg', 'Колонки Sven 235', 'Black', '2x2 Вт', 'пластик', '100-20000 Гц', '65x200x60 мм', 'разъем для наушников', 19, '2012-10-29'),
(6, 'sven_2_0', 'kolonki/st_6.jpg', 'kolonki/small/st_6.jpg', 'Колонки Sven 245', 'Black', '2x2 Вт', 'пластик', '90-20000 Гц', '70x185x48 мм', 'USB', 21, '2012-10-29'),
(7, 'sven_2_0', 'kolonki/st_7.jpg', 'kolonki/small/st_7.jpg', 'Колонки Sven 250', 'Black, Silver', '2x3 Вт', 'пластик', '160-20000 Гц', '50x300x50 мм', 'разъем для наушников', 21, '2012-10-29'),
(8, 'sven_2_0', 'kolonki/st_8.jpg', 'kolonki/small/st_8.jpg', 'Колонки Sven SPS-605', 'Black', '2x3Вт', 'MDF', '100-18000 Гц', '87x85x142 мм', 'USB', 19, '2012-10-29'),
(9, 'sven_2_0', 'kolonki/st_9.jpg', 'kolonki/small/st_9.jpg', 'Колонки Sven 350', 'Silver', '2x3 Вт', 'пластик', '100-20000 Гц', '80x245x80 мм', '-', 24, '2012-10-29'),
(10, 'sven_2_0', 'kolonki/st_10.jpg', 'kolonki/small/st_10.jpg', 'Колонки Sven Boogie Ball R', 'Black, Red, Blue', '1x2.4Вт', 'MDF', '100-20000 Гц', '87x85x142 мм', 'питание от батареи', 22, '2012-10-29'),
(11, 'sven_2_0', 'kolonki/st_11.jpg', 'kolonki/small/st_11.jpg', 'Колонки Sven 280', 'Black', '2x2.5 Вт', 'пластик', '100-20000 Гц', '58x205x87 мм', 'разъем для наушников, крепление на стену', 23, '2012-10-29'),
(12, 'sven_2_0', 'kolonki/st_12.jpg', 'kolonki/small/st_12.jpg', 'Колонки Sven  SPS-607', 'Black, Wooden+Walnut', '1x3Вт', 'MDF', '100-20000 Гц', '117x207x105 мм', 'выход на сабвуфер', 26, '2012-10-29'),
(13, 'sven_2_0', 'kolonki/st_13.jpg', 'kolonki/small/st_13.jpg', 'Колонки Sven 355', 'Black', '2x2.5 Вт', 'пластик', '80-20000 Гц', '75x130x68 мм', '-', 25, '2012-10-29'),
(14, 'sven_2_0', 'kolonki/st_14.jpg', 'kolonki/small/st_14.jpg', 'Колонки Sven 260', 'Black, Wooden+Walnut', '1x3 Вт', 'пластик', '160-20000 Гц', '45x230x35 мм', 'разъем для наушников, крепление на стену', 29, '2012-10-29'),
(15, 'sven_2_0', 'kolonki/st_15.jpg', 'kolonki/small/st_15.jpg', 'Колонки Sven SPS-609', 'Black', '2x5 Вт', 'MDF', '70-18000 Гц', '115x225x155 мм', '-', 30, '2012-10-29'),
(16, 'sven_2_0', 'kolonki/st_16.jpg', 'kolonki/small/st_16.jpg', 'Колонки Sven SPS-610', 'Black, Walnut', '1x3 Вт', 'пластик', '160-20000 Гц', '45x230x35 мм', 'разъем для наушников', 44, '2012-10-29'),
(17, 'sven_2_0', 'kolonki/st_17.jpg', 'kolonki/small/st_17.jpg', 'Колонки Sven SPS-611S', 'Black,Silver,Wooden', '2x18 Вт', 'MDF', '70-18000 Гц', '143x250x175 мм', 'выход для подключения сабвуфера', 44, '2012-10-29'),
(18, 'sven_2_0', 'kolonki/st_18.jpg', 'kolonki/small/st_18.jpg', 'Колонки Sven SPS-702', 'Black Leather, Walnut', '1x20 Вт', 'MDF', '40-22000 Гц', '143x265x150 мм', 'разъем для наушников', 44, '2012-10-29'),
(19, 'sven_2_0', 'kolonki/st_19.jpg', 'kolonki/small/st_19.jpg', 'Колонки Sven SPS-700', 'Black, Walnut, Silver', '2x20 Вт', 'MDF', '40-20000 Гц', '150x255x195 мм', '-', 53, '2012-10-29'),
(20, 'sven_2_0', 'kolonki/st_20.jpg', 'kolonki/small/st_20.jpg', 'Колонки Sven SPS-704', 'Black, Cherry', '1x25 Вт', 'MDF', '45-25000 Гц', '266x151x180 мм', 'разъем для наушников', 67, '2012-10-29'),
(21, 'sven_2_0', 'kolonki/st_21.jpg', 'kolonki/small/st_21.jpg', 'Колонки Sven Stream Light', 'Black, Cherry', '2x30 Вт', 'MDF', '45-27000 Гц', '175x285x205 мм', 'разъем для наушников', 98, '2012-10-29'),
(22, 'sven_2_0', 'kolonki/st_22.jpg', 'kolonki/small/st_22.jpg', 'Колонки Sven Stream', 'Black, Cherry', '1x45 Вт', 'MDF', '40-27000 Гц', '185x310x220 мм', 'разъем для наушников', 115, '2012-10-29'),
(23, 'sven_2_0', 'kolonki/st_23.jpg', 'kolonki/small/st_23.jpg', 'Колонки Sven Stream Mega', 'Black, Cherry', '2x60 Вт', 'MDF', '35-27000 Гц', '225x360x255 мм', 'раздельные ВЧ- и НЧ- усилители каждого канала; активный кроссовер 4-го порядка; 2 стереовхода RCA', 150, '2012-10-29'),
(25, 'sven_2_1', 'kolonki/2.1/st2_1.jpg', 'kolonki/2.1/small/st2_1.jpg', 'Колонки Sven MS-80', 'Black', '2x1+5 Вт', 'MDF', '60-20000 Гц', 'сателлиты: 68x108x70 мм, сабвуфер: 105x145x115 мм', '-', 30, '2012-10-29'),
(26, 'sven_2_1', 'kolonki/2.1/st2_2.jpg', 'kolonki/2.1/small/st2_2.jpg', 'Колонки Sven MS-103', 'Black', '2x2+4 Вт', 'MDF', '65-18000 Гц', 'сателлиты: 124x176x154 мм, сабвуфер: 70x135x80 мм', '-', 34, '2012-10-29'),
(27, 'sven_2_1', 'kolonki/2.1/st2_3.jpg', 'kolonki/2.1/small/st2_3.jpg', 'Колонки Sven MS-106', 'Black', '2x2.5+5 Вт', 'MDF', '60-20000 Гц', 'сателлиты: 80x120x80 мм, сабвуфер: 145x175x155 мм', '-', 40, '2012-10-29'),
(28, 'sven_2_1', 'kolonki/2.1/st2_4.jpg', 'kolonki/2.1/small/st2_4.jpg', 'Колонки Sven MS-905', 'Silver,Black', '2x6+10 Вт', 'MDF', '50-20000 Гц', 'сателлиты: 80x190x80 мм, сабвуфер: 212x221x239 мм', '-', 51, '2012-10-29'),
(29, 'sven_2_1', 'kolonki/2.1/st2_5.jpg', 'kolonki/2.1/small/st2_5.jpg', 'Колонки Sven Emotion', 'Black, Silver', '2x4+10 Вт', 'MDF', '40-20000 Гц', 'сателлиты: 80x205x80 мм, сабвуфер: 168x187x250 мм', '-', 49, '2012-10-29'),
(30, 'sven_2_1', 'kolonki/2.1/st2_6.jpg', 'kolonki/2.1/small/st2_6.jpg', 'Колонки Sven MS-308', 'Black', '2x11+13 Вт', 'MDF', '50-20000 Гц', 'сателлиты: 128x127x89 мм, сабвуфер: 190x210x210 мм', 'проводной ДУ', 51, '2012-10-29'),
(31, 'sven_2_1', 'kolonki/2.1/st2_7.jpg', 'kolonki/2.1/small/st2_7.jpg', 'Колонки Sven MS-908', 'Black, Silver', '2x8+12 Вт', 'MDF', '40-20000 Гц', 'сателлиты: 162x242x242 мм, сабвуфер: 70x200x100 мм', '-', 53, '2012-10-29'),
(32, 'sven_2_1', 'kolonki/2.1/st2_8.jpg', 'kolonki/2.1/small/st2_8.jpg', 'Колонки Sven SPS-820', 'Black, Silver, Wooden', '2x10+18 Вт', 'MDF', '20-20000 Гц', 'сателлиты: 110x185x120 мм, сабвуфер: 150x260x270 мм', 'отношение сигнал/шум 75 дБ', 50, '2012-10-29'),
(33, 'sven_2_1', 'kolonki/2.1/st2_9.jpg', 'kolonki/2.1/small/st2_9.jpg', 'Колонки Sven SPS-821', 'Black', '2x10+20 Вт', 'MDF', '40-20000 Гц', 'сателлиты: 95x133x90 мм, сабвуфер: 150x240x250 мм', 'отношение сигнал/шум 75 дБ', 52, '2012-10-29'),
(34, 'sven_2_1', 'kolonki/2.1/st2_10.jpg', 'kolonki/2.1/small/st2_10.jpg', 'Колонки Sven MS-915', 'Black,Wooden', '2x8+10 Вт', 'MDF', '50-20000 Гц', 'сателлиты: 119x154x122 мм, сабвуфер: 212x221x239 мм', '-', 53, '2012-10-29'),
(35, 'sven_2_1', 'kolonki/2.1/st2_11.jpg', 'kolonki/2.1/small/st2_11.jpg', 'Колонки Sven MS-920 Light', 'Wooden,Silver', '2x8+10 Вт', 'MDF', '50-20000 Гц', 'сателлиты: 119x154x122 мм, сабвуфер: 212x221x239 мм', '-', 53, '2012-10-29'),
(36, 'sven_2_1', 'kolonki/2.1/st2_12.jpg', 'kolonki/2.1/small/st2_12.jpg', 'Колонки Sven MS-1080', 'Black', '2x10+20 Вт', 'MDF', '50-20000 Гц', 'сателлиты: 110x110x120 мм, сабвуфер: 220x230x268 мм', 'проводной ДУ', 55, '2012-10-29'),
(37, 'sven_2_1', 'kolonki/2.1/st2_13.jpg', 'kolonki/2.1/small/st2_13.jpg', 'Колонки Sven MS-1085', 'Black', '2x13+20 Вт', 'MDF', '40-20000 Гц', 'сателлиты: 101x166x111 мм, сабвуфер: 266x187x246 мм', 'проводной ДУ', 59, '2012-10-29'),
(38, 'sven_2_1', 'kolonki/2.1/st2_14.jpg', 'kolonki/2.1/small/st2_14.jpg', 'Колонки Sven MS-1060R', 'Black, Wooden', '2x15+30 Вт', 'MDF', '45-20000 Гц', 'сателлиты: 110x120x95 мм, сабвуфер: 160x310x300 мм', 'ДУ', 85, '2012-10-29'),
(39, 'sven_2_1', 'kolonki/2.1/st2_15.jpg', 'kolonki/2.1/small/st2_15.jpg', 'Колонки Sven MS-1040', 'Black', '2x15+30 Вт', 'MDF', '35-20000 Гц', 'сателлиты: 100x290x90 мм, сабвуфер: 220x210x310 мм', '-', 91, '2012-10-29'),
(40, 'sven_2_1', 'kolonki/2.1/st2_16.jpg', 'kolonki/2.1/small/st2_16.jpg', 'Колонки Sven MS-1020', 'Black, Walnut', '2x15+30 Вт', 'MDF', '35-20000 Гц', 'сателлиты: 80x346x90 мм, сабвуфер: 200x223x350 мм', 'разъем для наушников', 79, '2012-10-29'),
(41, 'sven_2_1', 'kolonki/2.1/st2_17.jpg', 'kolonki/2.1/small/st2_17.jpg', 'Колонки Sven MS-960', 'Black, Oak', '2x15+20 Вт', 'MDF', '50-20000 Гц', 'сателлиты: 115x180x140 мм, сабвуфер: 170x238x260 мм', 'разъем для наушников, крепление на стену', 102, '2012-10-29'),
(42, 'sven_2_1', 'kolonki/2.1/st2_18.jpg', 'kolonki/2.1/small/st2_18.jpg', 'Колонки Sven MS-970', 'Black, Oak', '2x20+30 Вт', 'MDF', '50-20000 Гц', 'сателлиты: 145x230x130 мм, сабвуфер: 192x295x305 мм', 'разъем для наушников, крепление на стену', 114, '2012-10-29'),
(43, 'sven_5_1', 'kolonki/5.1/st5_1.jpg', 'kolonki/5.1/small/st5_1.jpg', 'Колонки Sven HT-435', 'Black, Wooden', '5x15+35 Вт', 'MDF', '40-20000 Гц', 'центр: 220x110x95 мм, сателлиты: 110x120x95 мм, сабвуфер: 170x313x313 мм', 'пульт ДУ', 110, '2012-10-29'),
(44, 'sven_5_1', 'kolonki/5.1/st5_2.jpg', 'kolonki/5.1/small/st5_2.jpg', 'Колонки Sven HT-435D', 'Black', '5x15+35 Вт', 'MDF', '40-20000 Гц', 'центр: 220x110x95 мм, сателлиты: 110x120x95 мм, сабвуфер: 170x313x313 мм', 'Dolby Digital, DTS, пульт ДУ', 150, '2012-10-29'),
(45, 'sven_5_1', 'kolonki/5.1/st5_3.jpg', 'kolonki/5.1/small/st5_3.jpg', 'Колонки Sven IHOO MT 5.1P', 'Black, Wooden, Silver', '5x20+50 Вт', 'MDF', '40-22000 Гц', 'сателлиты: 220x300x168 мм, 150х180х150 мм, 400х140х150 мм, сабвуфер: 200x415x350 мм', 'пульт ДУ', 165, '2012-10-29'),
(46, 'sven_5_1', 'kolonki/5.1/st5_4.jpg', 'kolonki/5.1/small/st5_4.jpg', 'Колонки Sven IHOO T100', 'Black,Wooden  ', '5x20+50 Вт', 'MDF', '40-22000 Гц', 'сателлиты: 168x300x220 мм, 150х180х150 мм, 400x140x150 мм, сабвуфер: 200x420x360 мм', 'встроенный тюнер, пульт ДУ', 193, '2012-10-29'),
(50, 'sven_2_1', 'kolonki/2.1/st2_19.jpg', 'kolonki/2.1/small/st2_19.jpg', 'Sven MS-940', 'Красный', '2x5+15 Вт', 'пластик', '40-20000 Гц', 'сателлиты: 130x130x115 мм, сабвуфер: 240x190x190 мм', '-', 57, '2012-11-28'),
(51, 'sven_2_1', 'kolonki/2.1/st2_20.jpg', 'kolonki/2.1/small/st2_20.jpg', 'Sven MS-321', 'Black', '2x8+25 Вт', 'MDF', '30-20000 Гц', 'сателлиты: 170x100x120 мм, сабвуфер: 165x230x300 мм', '-', 63, '2012-11-28'),
(52, 'sven_2_0', 'kolonki/st_24.jpg', 'kolonki/small/st_24.jpg', 'Sven 316', 'Black ', '2x2 В', 'пластик', '100-20000 Гц', '87x125x87 мм', ' USB', 18, '2012-11-28'),
(53, 'sven_2_0', 'kolonki/st_25.jpg', 'kolonki/small/st_25.jpg', 'Sven 245 Glamour', 'Black', '2x2 Вт', 'пластик', '90-20000 Гц', '70x185x48 мм', 'USB', 22, '2012-11-28'),
(54, 'sven_2_0', 'kolonki/st_26.jpg', 'kolonki/small/st_26.jpg', 'Sven 250 ', 'Silver', '2x3 Вт', 'пластик', '160-20000 Гц', '50x300x50 мм', 'разъем для наушников', 22, '2012-11-28'),
(55, 'sven_2_0', 'kolonki/st_27.jpg', 'kolonki/small/st_27.jpg', 'NEODRIVE Плюшевые мишки', '-', '2х2 Вт', '-', '60 - 20 000 Гц', '-', 'Плюшевые мишки -аудио колонки,USB', 23, '2012-11-28'),
(56, 'sven_2_0', 'kolonki/st_28.jpg', 'kolonki/small/st_28.jpg', 'Sven SPS-609', 'Cherry,Dark oak', '2x5 Вт', 'MDF', '70-18000 Гц', '115x225x155 мм', '-', 29, '2012-11-28'),
(57, 'sven_2_0', 'kolonki/st_29.jpg', 'kolonki/small/st_29.jpg', 'Sven Royal 1R', 'Black', '2x35 Вт', 'MDF', '40-27000 Гц', '180x275x332 мм', 'пульт ДУ', 148, '2012-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `kompjuter`
--

CREATE TABLE IF NOT EXISTS `kompjuter` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `main_page` varchar(3) NOT NULL,
  `main_link1` varchar(255) NOT NULL,
  `main_link2` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_alt` varchar(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `cost` int(5) NOT NULL,
  `cost_clearing` varchar(255) NOT NULL,
  `cost_sb` int(9) NOT NULL,
  `cost_monitor` int(9) NOT NULL,
  `cost_keyboard` int(9) NOT NULL,
  `cost_mouse` int(9) NOT NULL,
  `cost_loudspeakers` varchar(9) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `hdd` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `optical_drive` varchar(255) NOT NULL,
  `motherboard` varchar(255) NOT NULL,
  `housing` varchar(255) NOT NULL,
  `vga` varchar(255) NOT NULL,
  `monitor` varchar(255) NOT NULL,
  `loudspeakers` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Компьютеры' AUTO_INCREMENT=58 ;

--
-- Dumping data for table `kompjuter`
--

INSERT INTO `kompjuter` (`id`, `type`, `main_page`, `main_link1`, `main_link2`, `title`, `image`, `image_alt`, `image_title`, `cost`, `cost_clearing`, `cost_sb`, `cost_monitor`, `cost_keyboard`, `cost_mouse`, `cost_loudspeakers`, `processor`, `hdd`, `ram`, `optical_drive`, `motherboard`, `housing`, `vga`, `monitor`, `loudspeakers`, `information`, `date`) VALUES
(1, 'ofisnyj', 'yes', 'ofisnyj_kompjuter.html', 'ofisnyj_kompjuter.html', 'Компьютер Эко-130', 'ofisnyj_kompjuter/ofisnyj_kompjuter.jpg', 'Офисный компьютер', 'Офисный компьютер', 317, '3.624.000', 194, 110, 8, 5, '-', 'Sempron 130(1x1.6GHz)', '500GB sataII', '2GB DDR3-1333', '-', 'SocketAM3 mATX', 'Classic ATX 400W', 'Video Int Up To 256MB', '18.5" LG E1942C-BN', '-', '(картинка может не соответствовать конфигурации)', '2012-10-22'),
(2, 'ofisnyj', '', '', '', 'Компьютер Бюджетный  Athlon  250u', 'ofisnyj_kompjuter/ofisnyj_kompjuter_1.jpg', '', '', 342, '3.767.000', 220, 109, 8, 5, '-', 'AMD Athlon 2 X2 250u (2x1.6GHz)', '500GB sataII', '2GB DDR3-1333', 'DVD±RW', 'SocketAM3 mATX', 'Classic ATX 400W', 'Video Int Up To 256MB', '18.5" Philips 196V4LSB2', '-', '(картинка может не соответствовать конфигурации)', '2012-10-22'),
(3, 'ofisnyj', '', '', '', 'Компьютер для офиса Celeron G530', 'ofisnyj_kompjuter/ofisnyj_kompjuter_2.jpg', '', '', 345, '3.837.000 ', 222, 110, 8, 5, '-', 'Celeron G530 (2x2.4GHz)', '500GB sataII', '2GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 400W', 'Video Int Up To 256MB', '18.5" LG E1942C-BN', '-', '(картинка может не соответствовать конфигурации)', '2012-10-22'),
(4, 'ofisnyj', '', '', '', 'Компьютер Бухгалтер-профи Celeron G1610', 'ofisnyj_kompjuter/ofisnyj_kompjuter_3.jpg', '', '', 349, '3.876.000 ', 227, 109, 8, 5, '-', 'Celeron G1610 (2x2.6GHz)', '500GB sataII', '2GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 400W', 'Video Int Up To 256MB', '18.5" Philips 196V4LSB2', '-', '(картинка может не соответствовать конфигурации)', '2012-10-22'),
(5, 'shkolniku', 'yes', 'kompjuter_shkolniku.html', 'kompjuter_shkolniku.html', 'Компьютер для школьника Athlon X2 245', 'kompjuter_shkolniku/shkolniku_kompjuter.jpg', 'Компьютер школьнику', 'Компьютер школьнику', 358, '', 219, 111, 9, 6, '13', 'Athlon X2 245 (2x2.9GHz)', '500GB sataII', '2GB DDR3-1333', 'DVD±RW', 'SocketAM3 mATX', 'Classic ATX 400W', 'Video Int Up To 256MB', '18.5" Philips 196V4LSB2', 'Sven 310', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(6, 'shkolniku', '', '', '', 'Компьютер для школьника Pentium G630', 'kompjuter_shkolniku/shkolniku_kompjuter_1.jpg', '', '', 385, '', 241, 110, 9, 6, '19', 'Pentium G630 (2x2.7GHz)', '500GB sataII', '2GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 400W', 'Video Int Up To 256MB', '18.5" LG E1942C-BN', 'Sven 350', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(7, 'shkolniku', '', '', '', 'Компьютер для школьника Athlon X3 460', 'kompjuter_shkolniku/shkolniku_kompjuter_2.jpg', '', '', 423, '', 268, 111, 9, 6, '29', 'Athlon X3 460 (3x3.4GHz)', '500GB sataII', '4GB DDR3-1333', 'DVD±RW', 'SocketAM3 mATX', 'Classic ATX 400W', 'Video Int Up To 256MB', '18.5" Philips 196V4LSB2', 'Sven 260', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(8, 'shkolniku', '', '', '', 'Компьютер для школьника Pentium G860', 'kompjuter_shkolniku/shkolniku_kompjuter_3.jpg', '', '', 464, '', 265, 155, 9, 6, '29', 'Pentium G860 (2x3.0GHz)', '500GB sataII', '4GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 450W', 'Video Int Up To 256MB', '22" Philips 226V4LSB (LED)', 'Sven SPS-609', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(9, 'akciya_domashnij', '', '', '', 'Домашний системный блок', 'domashnij_kompjuter/sist-blok-03.jpg', '', '', 299, '', 0, 0, 0, 0, '', 'Intel Pentium G870 (2x3.1GHz)', '500Gb', '4GB DDR3', 'DVD±RW', 'Socket1155', 'Classic ATX 400W', 'SVGA HD Graphics 850 МГц', '', '', 'Процессор Intel G860 с тактовой частотой 3.0Ггц обеспечит комфортную работу, <b>4Gb оперативной \r\n                                     памяти</b> предоставят быстродествие при большом количестве открытых приложений. <br>Данный процессор потребляет мало энернии, что обсусловленно тепловыделение на уровне всего 65Вт.\r\n                                     Мощности встроенного видеоядра слихвой <b>хватит на нетребовательные игры</b>, рабочая частота которого 850 МГц или до 1.1 ГГц в режиме Turbo Boost!', '2012-10-24'),
(10, 'domashnij', 'yes', 'domashnij_kompjuter.html', 'domashnij_kompjuter.html', 'Компьютер домашний Pentium G630', 'domashnij_kompjuter/domashnij_kompjuter.jpg', 'Компьютер для дома', 'Компьютер для дома', 470, '', 333, 110, 9, 6, '12', 'Intel Pentium G630 (2x2.7GHz)', '1000GB', '4GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 450W', 'GeForce GT 630 1Gb', '19" LG E1942C-BN', 'Sven 310', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(11, 'domashnij', '', '', '', 'Компьютер домашний AMD A4-5300', 'domashnij_kompjuter/domashnij_kompjuter_1.jpg', '', '', 522, '', 331, 150, 10, 6, '25', 'AMD A4-5300 (2x3.4GHz)', '1000GB', '4GB DDR3-1333', 'DVD±RW', 'Socket FM2 mATX', 'Classic ATX 450W', 'GeForce GT 630 2Gb', '22" AOC E2250SWDNK LED(LED)', 'Sven SPS-607', '<b>Новинка на сайте!!!</b><br/>\r\n(картинка может не соответствовать конфигурации)', '2012-10-24'),
(12, 'domashnij', '', '', '', 'Компьютер домашний Athlon X3 455', 'domashnij_kompjuter/domashnij_kompjuter_2.jpg', '', '', 539, '', 343, 155, 10, 6, '25', 'Athlon X3 455 (3x3.3GHz)', '1000GB', '4GB DDR3-1333', 'DVD±RW', 'SocketAM3 mATX', 'Classic ATX 450W', 'GeForce GT 630 2Gb', ' 22" Philips 226V4L(LED)', 'Sven SPS-607', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(13, 'domashnij', '', '', '', 'Компьютер домашний Pentium G2120', 'domashnij_kompjuter/domashnij_kompjuter_3.jpg', '', '', 566, '', 371, 155, 9, 6, '25', 'Intel Pentium G2120 (2x2.9GHz)', '1000GB', '4GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 450W', 'GeForce GT 640 1Gb', '22" Philips 226V4LSB (LED)', 'Sven SPS-609', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(15, 'akciya_igrovoj', '', '', '', 'Игровой системный блок', 'igrovoj_kompjuter/sist-blok-01.jpg', '', '', 499, '', 0, 0, 0, 0, '', 'Intel Core i3 2130(2x3.4GHz)', '2000GB', '8GB DDR3', 'DVD±RW', 'Socket1155', 'Classic ATX 500W', 'GeForce GTX650 1Gb GDDR5', '', '', 'Теперь за <b class="cena-slide">499 у.е.</b> вы получаете отличную производительность благодаря новой видеокарте 6-ой серии и процессору на ядре Ivy Bridge. Установленная <b>GeForce GTX650 с 1Gb</b> поддерживает     версию шейдеров 5.0 и DirectX 11 - это означает что теперь игры не "пойдут", а "полетят"! <b>Процессор Intel Core i3 2130</b> с частотой 3.4ГГц покажет отличный результат, при этом он не требует мощный блок питания и систему охлаждения, так как техпроцесс 32нм, в результате тепловыделение всего 65Вт!', '2012-10-24'),
(16, 'igrovoj', 'yes', 'igrovoj_kompjuter.html', 'igrovoj_kompjuter.html', 'Компьютер игровой Athlon X4 651', 'igrovoj_kompjuter/igrovoj_kompjuter.jpg', 'Игровой компьютер', 'Игровой компьютер', 619, '', 402, 155, 10, 7, '45', 'Athlon X4 651 (4x3.0GHz)', '1000GB', '4GB DDR3-1333', 'DVD±RW', 'Socket FM1 mATX', 'Classic ATX 450W', 'GeForce GT 640 2GB', '22"  Philips 226V4LSB(LED)', 'Sven SPS-820', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(17, 'igrovoj', '', '', '', 'Компьютер игровой Athlon X4 640', 'igrovoj_kompjuter/igrovoj_kompjuter_1.jpg', '', '', 615, '', 400, 155, 10, 7, '43', 'Athlon X4 640 (4x3.0GHz)', '1000GB', '4GB DDR3-1333', 'DVD±RW', 'SocketAM3 mATX', 'Classic ATX 450W', 'GeForce GT 640 2 Gb', '22" Philips 226V4LSB(LED)', 'Sven SPS-611S', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(18, 'igrovoj', '', '', '', 'Компьютер игровой Phenom X4 965', 'igrovoj_kompjuter/igrovoj_kompjuter_2.jpg', '', '', 648, '', 442, 150, 10, 7, '39', 'Phenom X4 965 (4x3.4GHz)', '1000GB', '4GB DDR3-1333', 'DVD±RW', 'SocketAM3 mATX', 'Classic ATX 500W', 'GeForce GTX 650 1Gb', '22" AOC E2250SWDNK (LED)', 'Sven SPS-610', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(19, 'igrovoj', '', '', '', 'Компьютер игровой Core i5 3450', 'igrovoj_kompjuter/igrovoj_kompjuter_3.jpg', '', '', 804, '', 560, 182, 10, 7, '45', 'Intel Core i5 3450 (4x3.1GHz)', '1000GB', '4GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 500W', 'GeForce GTX 650 2Gb', '22" BENQ RL2240H (LED)2ms', 'Sven SPS-820', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(20, 'akciya_multimedijnyj', '', '', '', 'Суперигровой системный блок', 'multimedijnyj_kompjuter/sist-blok-02.jpg', '', '', 799, '', 0, 0, 0, 0, '', 'Core i5 3470 (4x3.2GHz)', '2000GB +60GB', '8GB DDR3-1600', 'DVD±RW', 'Socket1155', 'Classic ATX 500W', 'GeForce GTX660 2GB GDDR5', '', '', 'За <b class="cena-slide">799 у.е.</b> вы получаете новую видеокарту <b>GeForce GTX660 с 2GB</b> видеопамяти в связке с новым 4-х ядерным процессором <b>Intel Core i5 3470</b>. Они обеспечат несравненную производительность и самый широкий спектр возможностей для любителей компьютерных игр. <br>С установленным твердотельным жестким диском <b>SSD OCZ на 60GB</b> операционная система будет загружаться и работать гораздо быстрее, мгновенно откликаясь на команды.', '2012-10-24'),
(21, 'multimedijnyj', 'yes', 'multimedijnyj_kompjuter.html', 'multimedijnyj_kompjuter.html', 'Компьютер суперигровой Core i5 3470', 'multimedijnyj_kompjuter/multimedijnyj_kompjuter.jpg', 'Компьютер суперигровой Core i5 3470', 'Компьютер суперигровой Core i5 3470', 842, '', 570, 208, 10, 5, '49', 'Intel Core i5 3470 (4x3.2GHz)', '1000GB', '4GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 550W', 'GeForce GTX 650 1Gb', '23.6" Philips 247E3LHSU2 (LED)', 'Sven SPS-820', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(49, 'multimedijnyj', '', '', '', 'Компьютер суперигровой Core i5-3550', 'multimedijnyj_kompjuter/multimedijnyj_kompjuter_3.jpg', '', '', 869, '', 670, 182, 10, 7, '-', 'Intel Core i5 3550 (4x3.3GHz)', '1500GB', '8GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 550W', 'GeForce GTX 650Ti 2Gb', '22" BENQ GW2260HM (LED)', '-', '(картинка может не соответствовать конфигурации)', '2013-02-15'),
(23, 'multimedijnyj', '', '', '', 'Компьютер суперигровой Core i5-3570', 'multimedijnyj_kompjuter/multimedijnyj_kompjuter_2.jpg', '', '', 960, '', 735, 208, 10, 7, '-', 'Core i5-3570(4x3.4GHz)', '1500GB', '8GB DDR3-1333', 'DVD±RW', 'Socket1155 mATX', 'Classic ATX 500W', 'GeForce GTX 660 2Gb', '23.6" Philips 247E3LHSU2 (LED)', '-', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(24, 'multimedijnyj', '', '', '', 'Компьютер суперигровой Intel Core i7-3820', 'multimedijnyj_kompjuter/multimedijnyj_kompjuter_4.jpg', '', '', 2079, '', 1699, 330, 25, 25, '-', 'Core i7-3820 (4х3.6HGz)', 'SSD 128Gb + 2Tb', '16GB(2x8GB) DDR3-1600', 'DVD±RW', 'Gigabyte GA-X79-UD3', 'AeroCool Mechatron White (БП 1100W)', 'Geforce GV-N66TOC-3GD 3GB', '23" LG D2342P-PN (LED 3D)', '-', '(картинка может не соответствовать конфигурации)', '2012-10-24'),
(51, 'igrovoj_radeon', '', '', '', 'Компьютер игровой Athlon X4 641', 'igrovoj_kompjuter/igrovoj_kompjuter.jpg', '', '', 632, '', 415, 155, 10, 7, '45', 'Athlon X4 651 (4x3.0GHz)', '2000GB', '4GB DDR3-1333', 'DVD±RW ', 'Socket FM1 mATX', ' Classic ATX 450W ', 'Radeon AX6670 2Gb', '22" Philips 226V4L (LED)', 'Sven SPS-820 ', '(картинка может не соответствовать конфигурации)', '2013-02-27'),
(52, 'igrovoj_radeon', '', '', '', 'Компьютер игровой Athlon X4 640', 'igrovoj_kompjuter/igrovoj_kompjuter_1.jpg', '', '', 628, '', 413, 155, 10, 7, '43', ' Athlon X4 640 (4x3.1GHz)', '2000GB ', '4GB DDR3-1333', 'DVD±RW ', 'SocketAM3 mATX', 'Classic ATX 450W ', 'Radeon AX6670 2Gb', '22" Philips 226V4L (LED)', 'Sven SPS-611S ', '(картинка может не соответствовать конфигурации)', '2013-02-27'),
(53, 'igrovoj_radeon', '', '', '', 'Компьютер игровой Phenom X4 955', 'igrovoj_kompjuter/igrovoj_kompjuter_2.jpg', '', '', 653, '', 442, 155, 10, 7, '39', 'Phenom X4 955 (4x3.2GHz)', '2000GB ', '4GB DDR3-1333', 'DVD±RW ', 'SocketAM3 mATX', 'Classic ATX 500W', 'Sapphire HD7750 2Gb ', ' 22" AOC E2250SWDNK (LED)', 'Sven SPS-610 ', '(картинка может не соответствовать конфигурации) ', '2013-02-27'),
(54, 'igrovoj_radeon', '', '', '', 'Компьютер игровой Intel Core i5 2400', 'igrovoj_kompjuter/igrovoj_kompjuter_3.jpg', '', '', 787, '', 570, 155, 10, 7, '45', 'Intel Core i5 2400 (4x3.1GHz)', '2000GB ', '4GB DDR3-1333', 'DVD±RW ', 'Socket1155 mATX', 'GameCaseSpider ATX 500W', 'Radeon AX7770 1Gb', '22" AOC E2250SWDNK (LED)', 'Sven SPS-820 ', '(картинка может не соответствовать конфигурации) ', '2013-02-27'),
(56, 'akciya_radeon', '', '', '', 'Системный блок игровой Radeon', 'igrovoj_kompjuter/sist-blok-04.jpg', '', '', 499, '', 0, 0, 0, 0, '', 'AMD Phenom X4 965 (4x3.4GHz)', '2000GB ', 'DDR3 8GB', 'DVD±RW', 'Socket AM3 ', 'Classic ATX 500W', 'Radeon HD7770 1GB GDDR5', '', '', 'Системный блок за 499 у.е. на базе 4-х ядерного процессора от AMD покажет превосходную производительность при минимальной цене. Процессор Phenom X4 965 построен на сокете AM3 и обладает усовершенствованной архитектурой ядра с техпроцессом изготовления 45 нм.\r\nВидеокарта Radeon HD7770 потянет почти все современные игры на максимальных настройках с поддержкой DirectX® 11.1 и OpenGL 4.2.', '2013-04-16'),
(57, 'akciya_main_page', '', '', '', 'Суперигровой  AMD FX-8320 (8 x 3.5GHz)', 'igrovoj_kompjuter/super.jpg', '', '', 1099, '', 0, 0, 0, 0, '', 'AMD FX-8320 (8x3.5GHz)', '2000Gb Sata3 ', '16GB(2x8GB) DDR3-2133', 'DVD±RW', 'Socket AM3+', 'ZALMAN Z9 700W', 'GeForce GTX660Ti 2Gb GDDR5', '', '', 'Процессор <b>AMD FX-8320</b> - топовый процессор в своем классе, обладающий огромным запасом мощности, \r\n                                     процессор имеет большой потенциал для разгона компьютера.\r\n                                     <br>16Gb оперативной памяти имеют повышенную частоту в 2133MHz, в совокупности с процессором <b>видеокарта GeForce GTX 660Ti 2Gb</b>\r\n                                     раскроет весь потенциал, показывая отличную производительность в самых требовательных играх и графических 3D программах.\r\n                                    ', '2013-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `length_tablet`
--

CREATE TABLE IF NOT EXISTS `length_tablet` (
  `id_length` int(11) NOT NULL AUTO_INCREMENT,
  `name_length` varchar(255) NOT NULL,
  PRIMARY KEY (`id_length`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `length_tablet`
--

INSERT INTO `length_tablet` (`id_length`, `name_length`) VALUES
(2, '33344');

-- --------------------------------------------------------

--
-- Table structure for table `mjishji`
--

CREATE TABLE IF NOT EXISTS `mjishji` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `cost` int(5) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Мыши' AUTO_INCREMENT=32 ;

--
-- Dumping data for table `mjishji`
--

INSERT INTO `mjishji` (`id`, `image`, `model`, `other`, `cost`, `date`) VALUES
(1, 'mjishji/msh_1.jpg', 'Genius NetScroll 110', '', 6, '2012-10-30'),
(2, 'mjishji/msh_2.jpg', 'Genius NetScroll 130', '', 8, '2012-10-30'),
(3, 'mjishji/msh_3.jpg', 'Sven OP-1', '', 8, '2012-10-30'),
(4, 'mjishji/msh_4.jpg', 'Genius Xscroll', '', 8, '2012-10-30'),
(5, 'mjishji/msh_5.jpg', 'Sven OP-12', '', 9, '2012-10-30'),
(6, 'mjishji/msh_6.jpg', 'Genius NetScroll 310', '', 9, '2012-10-30'),
(7, 'mjishji/msh_7.jpg', 'Sven OP-15', '', 10, '2012-10-30'),
(8, 'mjishji/msh_8.jpg', 'Genius ScrollToo 200', '', 10, '2012-10-30'),
(9, 'mjishji/msh_9.jpg', 'Genius ScrollToo 310', '', 10, '2012-10-30'),
(10, 'mjishji/msh_10.jpg', 'Genius NetScroll 200', '', 12, '2012-10-30'),
(11, 'mjishji/msh_11.jpg', 'Genius NetScroll 220', '', 13, '2012-10-30'),
(12, 'mjishji/msh_12.jpg', 'Sven ML-1000', '', 13, '2012-10-30'),
(13, 'mjishji/msh_13.jpg', 'Genius Navigator 320', '', 14, '2012-10-30'),
(14, 'mjishji/msh_14.jpg', 'Genius Traveler 6000', 'беспроводная', 16, '2012-10-30'),
(15, 'mjishji/msh_15.jpg', 'Genius Mini Navigator', 'беспроводная', 20, '2012-10-30'),
(19, 'mjishji/msh_16.jpg', 'Genius Traveler 6000', '', 17, '2012-12-02'),
(20, 'mjishji/msh_17.jpg', 'Genius Traveler 6000', '', 18, '2012-12-02'),
(21, 'mjishji/msh_18.jpg', 'Genius Traveler 7000', '', 18, '2012-12-02'),
(22, 'mjishji/msh_19.jpg', 'QUMO iO3WW', '', 14, '2012-12-02'),
(23, 'mjishji/msh_20.jpg', 'QUMO iO6W', '', 17, '2012-12-02'),
(24, 'mjishji/msh_21.jpg', 'Sven RX-195', '', 18, '2012-12-02'),
(25, 'mjishji/msh_22.jpg', 'Genius NetScroll 100X', '', 9, '2012-12-02'),
(26, 'mjishji/msh_23.jpg', 'Genius NetScroll 110', '', 8, '2012-12-02'),
(27, 'mjishji/msh_24.jpg', 'Genius NetScroll 120', '', 8, '2012-12-02'),
(28, 'mjishji/msh_25.jpg', 'Genius ScrollToo 200', '', 10, '2012-12-02'),
(29, 'mjishji/msh_26.jpg', 'Sven RX-111', '', 7, '2012-12-02'),
(30, 'mjishji/msh_27.jpg', 'Sven RX-160', '', 8, '2012-12-02'),
(31, 'mjishji/msh_28.jpg', 'Sven RX-170', '', 9, '2012-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE IF NOT EXISTS `monitor` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `image_big` varchar(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `resolution` varchar(255) NOT NULL,
  `contrast` varchar(255) NOT NULL,
  `response_time` varchar(255) NOT NULL,
  `angles` varchar(255) NOT NULL,
  `connector` varchar(255) NOT NULL,
  `cost` int(5) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Мониторы' AUTO_INCREMENT=120 ;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`id`, `brand`, `series`, `model`, `image_small`, `image_big`, `format`, `resolution`, `contrast`, `response_time`, `angles`, `connector`, `cost`, `date`) VALUES
(1, 'acer', '', 'Монитор 19"Acer V193HQDB', 'acer_monitor/small/acer_1.jpg', 'acer_monitor/acer_1.jpg', 'WIDE', '1366x768', 'DC 50000:1', '5 ms', '160/160', 'VGA', 137, '2012-10-26'),
(2, 'acer', '', 'Монитор 22"Acer V223HQBb', 'acer_monitor/small/acer_2.jpg', 'acer_monitor/acer_2.jpg', 'WIDE', '1920x1080', 'DC 50000:1', '5 ms', '160/160', 'VGA', 182, '2012-10-26'),
(3, 'acer', '', 'Монитор 24"Acer HS244HQbmii 3D <br>+ 3D очки в комплекте', 'acer_monitor/small/acer_3.jpg', 'acer_monitor/acer_3.jpg', 'WIDE', '1920x1080', 'DC 500000:1', '2 ms', '176/176', 'VGA+HDMI 120Hz', 448, '2012-10-26'),
(6, 'benq', '', 'Монитор 19"BenQ G922HDAL', 'benq__monitor/small/benq_1.jpg', 'benq__monitor/benq_1.jpg', 'WIDE LED', '1366x768', 'DC 50000:1', '5 ms', '170/160', 'VGA', 128, '2012-10-27'),
(7, 'benq', '', 'Монитор 20" BenQ G2020HD', 'benq__monitor/small/benq_2.jpg', 'benq__monitor/benq_2.jpg', 'WIDE', '1600x900', 'DC 50000:1', '5 ms', '160/160', 'VGA', 152, '2012-10-27'),
(8, 'benq', '', 'Монитор 22" BenQ GL2240M', 'benq__monitor/small/benq_3.jpg', 'benq__monitor/benq_3.jpg', 'WIDE LED', '1920x1080', 'DC 50000:1', '5 ms', '170/160', 'D-sub + DVI-D', 177, '2012-10-27'),
(9, 'benq', '', 'Монитор 24" BenQ G2420HD', 'benq__monitor/small/benq_4.jpg', 'benq__monitor/benq_4.jpg', 'WIDE', '1920x1080', 'DC 50000:1', '5 ms', '160/160', 'VGA+DVI+HDMI', 235, '2012-10-27'),
(10, 'benq', '', 'Монитор 24" BenQ V2420', 'benq__monitor/small/benq_5.jpg', 'benq__monitor/benq_5.jpg', 'WIDE LED', '1920x1080', 'DC 100000:1', '5 ms', '170/160', 'VGA+DVI', 260, '2012-10-27'),
(11, 'benq', '', 'Монитор 26" BenQ E26-5500 +TV', 'benq__monitor/small/benq_6.jpg', 'benq__monitor/benq_6.jpg', 'WIDE LED', '1920x1080', 'DC 50000:1', '5 ms', '160/160', 'TV-тюнер. HDMI, RCA, S-Video, Component, SCART, USB, ПДУ', 390, '2012-10-27'),
(12, 'lg', '19', 'Монитор 19" LG W1946S-BF', 'lg_monitor/small/lg_1.jpg', 'lg_monitor/lg_1.jpg', 'WIDE', '1366x768', 'DC 3000:1', '5 ms', '170/170', 'D-Sub', 132, '2012-10-27'),
(13, 'lg', '19', 'Монитор 19" LG E1911S-BN', 'lg_monitor/small/lg_2.jpg', 'lg_monitor/lg_2.jpg', 'WIDE LED', '1366x768', 'DC 1000:1', '5 ms', '170/170', 'VGA', 138, '2012-10-27'),
(14, 'lg', '19', 'Монитор 19" LG E1960S-PN', 'lg_monitor/small/lg_3.jpg', 'lg_monitor/lg_3.jpg', 'WIDE LED', '1366x768', 'DC 5000000:1', '5 ms', '176/170', 'D-sub + DVI-D', 146, '2012-10-27'),
(15, 'lg', '19', 'Монитор 19" LG M197WA TV', 'lg_monitor/small/lg_4.jpg', 'lg_monitor/lg_4.jpg', 'WIDE', '1366x768', 'DC 50000:1', '5 ms', '176/170', 'VGA+DVI+HDMI, 2x3W, SCART, ДУ', 180, '2012-10-27'),
(16, 'lg', '20', 'Монитор 20" LG W2043C-PF', 'lg_monitor/small/lg_5.jpg', 'lg_monitor/lg_5.jpg', 'WIDE', '1600x900', 'DC 3000:1', '5 ms', '170/160', 'D-Sub', 160, '2012-10-27'),
(17, 'lg', '20', 'Монитор 20"  LG E2041S-BN', 'lg_monitor/small/lg_6.jpg', 'lg_monitor/lg_6.jpg', 'WIDE LED', '1600x900', 'DC 5000000:1', '5 ms', '160/160', 'D-Sub', 162, '2012-10-27'),
(18, 'lg', '20', 'Монитор 20" LG E2060S-PN', 'lg_monitor/small/lg_7.jpg', 'lg_monitor/lg_7.jpg', 'WIDE LED', '1600x900', 'DC 5000000:1', '5 ms', '170/160', 'VGA', 168, '2012-10-27'),
(19, 'lg', '22', 'Монитор 22" LG W2246S-BF', 'lg_monitor/small/lg_8.jpg', 'lg_monitor/lg_8.jpg', 'WIDE', '1920x1080', 'DC 3000:1', '5 ms', '170/160', 'VGA', 175, '2012-10-27'),
(20, 'lg', '22', 'Монитор 22" LG W2243S-PF', 'lg_monitor/small/lg_9.jpg', 'lg_monitor/lg_9.jpg', 'WIDE LED', '1920x1080', 'DC 3000:1', '5 ms', '170/160', 'VGA', 177, '2012-10-27'),
(21, 'lg', '22', 'Монитор 22" LG E2211S-BN', 'lg_monitor/small/lg_10.jpg', 'lg_monitor/lg_10.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA', 182, '2012-10-27'),
(22, 'lg', '22', 'Монитор 22" LG E2241S-BN', 'lg_monitor/small/lg_11.jpg', 'lg_monitor/lg_11.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA', 182, '2012-10-27'),
(23, 'lg', '22', 'Монитор 22" LG W2246T-BF', 'lg_monitor/small/lg_12.jpg', 'lg_monitor/lg_12.jpg', 'WIDE', '1920x1080', 'DC 30000:1', '5 ms', '170/160', 'VGA, DVI', 182, '2012-10-27'),
(24, 'lg', '22', 'Монитор 22" LG E2241S-BN', 'lg_monitor/small/lg_13.jpg', 'lg_monitor/lg_13.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA', 190, '2012-10-27'),
(25, 'lg', '22', 'Монитор 22" LG E2260V-PN', 'lg_monitor/small/lg_14.jpg', 'lg_monitor/lg_14.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA+DVI+HDMI', 199, '2012-10-27'),
(26, 'lg', '22', 'Монитор 22" LG IPS225T-BN', 'lg_monitor/small/lg_15.jpg', 'lg_monitor/lg_15.jpg', '<b>IPS матрица</b> LED', '1920x1080', 'DC 5M:1', '5 ms', '178/178', 'VGA+DVI', 235, '2012-10-27'),
(27, 'lg', '22', 'Монитор 22" LG IPS226V-PN', 'lg_monitor/small/lg_16.jpg', 'lg_monitor/lg_16.jpg', '<b>IPS матрица</b> LED', '1920x1080', 'DC 5M:1', '5 ms', '178/178', 'VGA+DVI+HDMI', 245, '2012-10-27'),
(28, 'lg', '23', 'Монитор 23" LG W2343S-PF', 'lg_monitor/small/lg_17.jpg', 'lg_monitor/lg_17.jpg', 'WIDE', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA', 240, '2012-10-27'),
(29, 'lg', '23', 'Монитор 23" LG E2350S-PN', 'lg_monitor/small/lg_18.jpg', 'lg_monitor/lg_18.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA', 246, '2012-10-27'),
(30, 'lg', '23', 'Монитор 23" LG E2351T-BN', 'lg_monitor/small/lg_19.jpg', 'lg_monitor/lg_19.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA+DVI', 253, '2012-10-27'),
(31, 'lg', '23', 'Монитор 23" LG E2350V-PN', 'lg_monitor/small/lg_20.jpg', 'lg_monitor/lg_20.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '176/160', 'VGA+DVI+HDMI', 264, '2012-10-27'),
(32, 'lg', '23', 'Монитор 23" LG IPS235T-BN', 'lg_monitor/small/lg_21.jpg', 'lg_monitor/lg_21.jpg', '<b>IPS матрица</b> LED', '1920x1080', 'DC 5M:1', '5 ms', '178/178', 'VGA+DVI', 275, '2012-10-27'),
(33, 'lg', '23', 'Монитор 23" LG IPS236V-PN', 'lg_monitor/small/lg_22.jpg', 'lg_monitor/lg_22.jpg', '<b>IPS матрица</b> LED', '1920x1080', 'DC 5M:1', '5 ms', '178/178', 'VGA+DVI+HDMI', 295, '2012-10-27'),
(34, 'lg', '23', 'Монитор 23" LG E2351T-BN 3D', 'lg_monitor/small/lg_23.jpg', 'lg_monitor/lg_23.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA+DVI+HDMI', 339, '2012-10-27'),
(35, 'lg', '24', 'Монитор 24" LG E2350V-PN', 'lg_monitor/small/lg_24.jpg', 'lg_monitor/lg_24.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA+DVI', 252, '2012-10-27'),
(36, 'lg', '24', 'Монитор 24', 'lg_monitor/small/lg_25.jpg', 'lg_monitor/lg_25.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA+DVI', 241, '2012-10-27'),
(39, 'philips', '19', 'Монитор 19', 'philips__monitor/small/ph_1.jpg', 'philips__monitor/ph_1.jpg', 'WIDE', '1366x768', 'DC 25000:1', '5 ms', '176/170', 'VGA', 121, '2012-10-28'),
(40, 'philips', '19', 'Монитор 19" Philips', 'philips__monitor/small/ph_2.jpg', 'philips__monitor/ph_2.jpg', 'WIDE LED', '1366x768', 'DC 10M:1', '5 ms', '170/160', 'DVI', 132, '2012-10-28'),
(41, 'philips', '20', 'Монитор 20" Philips 206V3LAB/00', 'philips__monitor/small/ph_3.jpg', 'philips__monitor/ph_3.jpg', 'WIDE LED', '1600x900', 'DC 10M:1', '5 ms', '170/160', 'VGA+DVI', 165, '2012-10-28'),
(42, 'philips', '22', 'Монитор 22" Philips 221V2SB/01', 'philips__monitor/small/ph_4.jpg', 'philips__monitor/ph_4.jpg', 'WIDE LED', '1920x1080', 'DC 300000:1', '5 ms', '176/170', 'VGA', 174, '2012-10-28'),
(43, 'philips', '22', 'Монитор 22" Philips 222E2SB/00', 'philips__monitor/small/ph_5.jpg', 'philips__monitor/ph_5.jpg', 'WIDE', '1920x1080', 'DC 500000:1', '5 ms', '176/170', 'VGA, DVI', 179, '2012-10-28'),
(44, 'philips', '22', 'Монитор 22" Philips 220V1SB/62', 'philips__monitor/small/ph_6.jpg', 'philips__monitor/ph_6.jpg', 'WIDE 16:10', '1680x1050', 'DC 50M:1', '5 ms', '170/160', 'VGA', 182, '2012-10-28'),
(45, 'philips', '22', 'Монитор 22" Philips 226V3LSB/01', 'philips__monitor/small/ph_7.jpg', 'philips__monitor/ph_7.jpg', 'WIDE LED', '1920x1080', 'DC 10M:1', '5 ms', '170/160', 'VGA, DVI', 183, '2012-10-28'),
(46, 'philips', '22', 'Монитор 22" Philips 222EL2SB/00', 'philips__monitor/small/ph_8.jpg', 'philips__monitor/ph_8.jpg', 'WIDE LED', '1920x1080', 'DC 50M:1', '5 ms', '170/160', 'VGA+DVI', 187, '2012-10-28'),
(47, 'philips', '22', 'Монитор 22" Philips 226C2SB/00', 'philips__monitor/small/ph_9.jpg', 'philips__monitor/ph_9.jpg', 'WIDE', '1920x1080', 'DC 800000:1', '2 ms', '176/170', 'VGA+DVI', 195, '2012-10-28'),
(48, 'philips', '23', 'Монитор 23" Philips 236V3LSB/01', 'philips__monitor/small/ph_10.jpg', 'philips__monitor/ph_10.jpg', 'WIDE LED', '1920x1080', 'DC 10M:1', '5 ms', '170/160', 'VGA, DVI', 212, '2012-10-28'),
(49, 'philips', '23', 'Монитор 23" Philips 234EL2SB/00', 'philips__monitor/small/ph_11.jpg', 'philips__monitor/ph_11.jpg', 'WIDE LED', '1920x1080', 'DC 20M:1', '5 ms', '176/170', 'VGA+DVI+HDMI', 235, '2012-10-28'),
(50, 'philips', '24', 'Монитор 24" Philips 248C3LHSW/00', 'philips__monitor/small/ph_12.jpg', 'philips__monitor/ph_12.jpg', 'WIDE LED', '1920x1080', 'DC 20M:1', '5 ms', '170/160', 'VGA+DVI', 315, '2012-10-28'),
(51, 'samsung', '19', 'Монитор 19" Samsung E1920N', 'samsung_monitor/small/sm_1.jpg', 'samsung_monitor/sm_1.jpg', 'WIDE', '1366x768', 'DC 50000:1', '5 ms', '170/160', 'VGA', 132, '2012-10-28'),
(52, 'samsung', '19', 'Монитор 19" Samsung S19A100N', 'samsung_monitor/small/sm_2.jpg', 'samsung_monitor/sm_2.jpg', 'WIDE LED', '1366x768', 'DC 70000:1', '5 ms', '170/160', 'VGA', 139, '2012-10-28'),
(53, 'samsung', '19', 'Монитор 19" Samsung E1920NW', 'samsung_monitor/small/sm_3.jpg', 'samsung_monitor/sm_3.jpg', 'WIDE 16:10', '1440x900', 'DC 70000:1', '5 ms', '170/160', 'VGA', 146, '2012-10-28'),
(54, 'samsung', '19', 'Монитор 19" Samsung E1920NR', 'samsung_monitor/small/sm_4.jpg', 'samsung_monitor/sm_4.jpg', '4:3', '1280x1024', 'DC 50000:1', '5 ms', '170/160', 'VGA', 175, '2012-10-28'),
(55, 'samsung', '20', 'Монитор 20" Samsung E2020N', 'samsung_monitor/small/sm_5.jpg', 'samsung_monitor/sm_5.jpg', 'WIDE', '1600x900', 'DC 50000:1', '5 ms', '170/160', 'VGA', 160, '2012-10-28'),
(56, 'samsung', '20', 'Монитор 20" Samsung S20A300N', 'samsung_monitor/small/sm_6.jpg', 'samsung_monitor/sm_6.jpg', 'WIDE', '1600x900', 'DC 50000:1', '5 ms', '170/160', 'VGA', 165, '2012-10-28'),
(57, 'samsung', '20', 'Монитор 20" Samsung B2030N', 'samsung_monitor/small/sm_7.jpg', 'samsung_monitor/sm_7.jpg', 'WIDE', '1600x900', 'DC 50000:1', '5 ms', '170/160', 'VGA', 170, '2012-10-28'),
(58, 'samsung', '22', 'Монитор 22" Samsung B2230N HG', 'samsung_monitor/small/sm_8.jpg', 'samsung_monitor/sm_8.jpg', 'WIDE', '1920x1080', 'DC 70000:1', '5 ms', '170/160', 'VGA', 185, '2012-10-28'),
(59, 'samsung', '22', 'Монитор 22" Samsung S22A300N', 'samsung_monitor/small/sm_9.jpg', 'samsung_monitor/sm_9.jpg', 'WIDE LED', '1920x1080', 'DC 500000:1', '5 ms', '170/160', 'VGA', 191, '2012-10-28'),
(60, 'samsung', '22', 'Монитор 22" Samsung EX2220', 'samsung_monitor/small/sm_10.jpg', 'samsung_monitor/sm_10.jpg', 'WIDE', '1920x1080', 'DC 50M:1', '5 ms', '170/160', 'VGA', 195, '2012-10-28'),
(61, 'samsung', '22', 'Монитор 22" Samsung S22A200B', 'samsung_monitor/small/sm_11.jpg', 'samsung_monitor/sm_11.jpg', 'WIDE', '1920x1080', 'DC 10M:1', '5 ms', '170/160', 'VGA, DVI', 199, '2012-10-28'),
(62, 'samsung', '22', 'Монитор 22" Samsung S22A350N', 'samsung_monitor/small/sm_12.jpg', 'samsung_monitor/sm_12.jpg', 'WIDE LED', '1920x1080', 'DC 50M:1', '5 ms', '170/160', 'VGA', 225, '2012-10-28'),
(63, 'samsung', '22', 'Монитор 22" Samsung S22A450BW', 'samsung_monitor/small/sm_13.jpg', 'samsung_monitor/sm_13.jpg', 'повор. экрана LED', '1920x1080', 'DC 50M:1', '5 ms', '170/160', 'VGA', 240, '2012-10-28'),
(64, 'samsung', '23', 'Монитор 23" Samsung E2320', 'samsung_monitor/small/sm_14.jpg', 'samsung_monitor/sm_14.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA+DVI-D', 222, '2012-10-28'),
(65, 'samsung', '23', 'Монитор 23" Samsung S23A300N', 'samsung_monitor/small/sm_15.jpg', 'samsung_monitor/sm_15.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA+DVI', 235, '2012-10-28'),
(66, 'samsung', '23', 'Монитор 23" Samsung B2330', 'samsung_monitor/small/sm_16.jpg', 'samsung_monitor/sm_16.jpg', 'WIDE', '1920x1080', 'DC 70000:1', '5 ms', '170/160', 'VGA+DVI', 246, '2012-10-28'),
(67, 'samsung', '23', 'Монитор 23" Samsung S23A350N', 'samsung_monitor/small/sm_17.jpg', 'samsung_monitor/sm_17.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA', 250, '2012-10-28'),
(68, 'samsung', '23', 'Монитор 23" Samsung BX2340', 'samsung_monitor/small/sm_18.jpg', 'samsung_monitor/sm_18.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA+DVI', 272, '2012-10-28'),
(69, 'samsung', '23', 'Монитор 23" Samsung S23A550H', 'samsung_monitor/small/sm_19.jpg', 'samsung_monitor/sm_19.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'VGA, HDMI', 278, '2012-10-28'),
(70, 'samsung', '24', 'Монитор 24" Samsung T24A350 TV', 'samsung_monitor/small/sm_20.jpg', 'samsung_monitor/sm_20.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'HDMI+VGA, SCART', 375, '2012-10-28'),
(71, 'samsung', '27', 'Монитор 27" Samsung S27A350H', 'samsung_monitor/small/sm_21.jpg', 'samsung_monitor/sm_21.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '2 ms', '170/160', 'VGA+HDMI', 479, '2012-10-28'),
(72, 'samsung', '27', 'Монитор 27" Samsung S27A550H', 'samsung_monitor/small/sm_22.jpg', 'samsung_monitor/sm_22.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '2 ms', '170/160', 'D-sub, HDMI', 482, '2012-10-28'),
(73, 'samsung', '27', 'Монитор 27" Samsung T27A550 TV', 'samsung_monitor/small/sm_23.jpg', 'samsung_monitor/sm_23.jpg', 'WIDE LED', '1920x1080', 'DC 5M:1', '5 ms', '170/160', 'SCART+VGA+2xHDMI+USB, 2x5W,ДУ', 510, '2012-10-28'),
(74, 'viewsonic', '', 'Монитор 19" ViewSonic VA1931WA', 'viewsonic_monitor/small/vs_1.jpg', 'viewsonic_monitor/vs_1.jpg', 'WIDE LED', '1366x768', 'DC 10M:1', '5 ms', '170/160', 'VGA', 132, '2012-10-28'),
(75, 'viewsonic', '', 'Монитор 22', 'viewsonic_monitor/small/vs_2.jpg', 'viewsonic_monitor/vs_2.jpg', 'WIDE LED', '1920x1080', 'DC 10M:1', '5 ms', '170/160', 'VGA', 155, '2012-10-28'),
(76, 'viewsonic', '', 'Монитор 22" ViewSonic VX2253mh', 'viewsonic_monitor/small/vs_3.jpg', 'viewsonic_monitor/vs_3.jpg', 'WIDE LED', '1920x1080', 'DC 20M:1', '2 ms', '170/160', 'VGA', 218, '2012-10-28'),
(77, 'viewsonic', '', 'Монитор 23" ViewSonic VP2365', 'viewsonic_monitor/small/vs_4.jpg', 'viewsonic_monitor/vs_4.jpg', '<b>E-IPS</b> матрица LED', '1920x1080', 'DC 50000:1', '6 ms', '178/178', 'VGA, DVI', 355, '2012-10-28'),
(78, 'viewsonic', '', 'Монитор 24" ViewSonic VX2451MH', 'viewsonic_monitor/small/vs_5.jpg', 'viewsonic_monitor/vs_5.jpg', 'WIDE LED', '1920x1080', 'DC 20M:1', '2 ms', '176/170', 'VGA+DVI+HDMI', 265, '2012-10-28'),
(89, 'acer', '', 'Монитор 18,5', 'acer_monitor/small/acer_4.jpg', 'acer_monitor/acer_4.jpg', 'Wide', '1366x768', 'DC 50000:1', '5 ms', '90/50', 'VGA', 125, '2012-11-22'),
(91, 'acer', '', 'Монитор 23,6" Asus VH242HL', 'acer_monitor/small/acer_6.jpg', 'acer_monitor/acer_6.jpg', 'Wide LED', '1920x1080', 'DC 20000:1', '5ms', '170/160', 'VGA + DVI + HDMI', 255, '2012-11-22'),
(92, 'acer', '', 'Монитор 23,6', 'acer_monitor/small/acer_7.jpg', 'acer_monitor/acer_7.jpg', 'Full HD LED', ' 1920x1080', 'DC 50000000:1', '5ms', '170/160', 'VGA + DVI + HDMI', 267, '2012-11-22'),
(117, 'acer', '', 'Монитор 23,6" Asus VH242HL', 'acer_monitor/small/acer_11.jpg', 'acer_monitor/acer_11.jpg', 'Wide', '1920x1080', 'DC 20000:1', '5ms', '170/160', 'VGA + DVI + HDMI', 250, '2012-11-23'),
(118, 'acer', '', 'Монитор 20" Acer S200HLBb', 'acer_monitor/small/acer_12.jpg', 'acer_monitor/acer_12.jpg', 'WIDE LED', '1600x900', 'DC 100000000:1', '5 ms', '170/160', 'VGA-DVI ', 147, '2012-11-23'),
(93, 'acer', '', 'Монитор 23,6" Asus 24T1E', 'acer_monitor/small/acer_8.jpg', 'acer_monitor/acer_8.jpg', 'Wide LED', '1920x1080', 'DC 20000:1', ' 5ms', '170/160', 'VGA + HDMI + TV-Tuner', 287, '2012-11-22'),
(94, 'lg', '19', 'Монитор 18,5'''' LG E1942C-BN', 'lg_monitor/small/lg_26.jpg', 'lg_monitor/lg_26.jpg', 'LED ', '1366x768', 'DC 5000000:1', '5ms', '170/160', 'VGA', 117, '2012-11-23'),
(95, 'philips', '19', 'Монитор 18,5" Philips 196V3LSB7/01', 'philips__monitor/small/ph_13.jpg', 'philips__monitor/ph_13.jpg', 'WIDE LED', '1366x768', 'DC 10000000:1', '5ms', '170/160', 'VGA + DVI', 121, '2012-11-23'),
(96, 'philips', '22', 'Монитор 21,5" Philips 226V3LSB25/00(01)', 'philips__monitor/small/ph_13.jpg', 'philips__monitor/ph_13.jpg', 'WIDE LED', '1920x1080', 'DC 10000000:1', '5ms', '90/65', ' VGA + DVI', 158, '2012-11-23'),
(97, 'philips', '22', 'Монитор 21,5" Philips 227E3LPHSU/01', 'philips__monitor/small/ph_14.jpg', 'philips__monitor/ph_14.jpg', ' Wide LED LCD', '1920x1080', 'DC 20000000:1', ' 5ms', '176/170', 'VGA+DVI+HDMI', 184, '2012-11-23'),
(98, 'philips', '24', 'Монитор 23,6" Philips 247E3LHSU/01', 'philips__monitor/small/ph_15.jpg', 'philips__monitor/ph_15.jpg', 'WIDE LED', '1920x1080', 'DC 20000000:1', ' 2ms', '170/160', ' VGA + HDMI', 214, '2012-11-23'),
(99, 'philips', '27', 'Монитор 27" PHILIPS 273E3LHSB/00', 'philips__monitor/small/ph_16.jpg', 'philips__monitor/ph_16.jpg', ' Wide LCD', '1920x1080', 'DC 20M:1', '2 ms', '170/160', 'VGA + HDMI', 370, '2012-11-23'),
(100, 'philips', '27', 'Монитор 27" PHILIPS 273E3LHSB/00', 'philips__monitor/small/ph_16.jpg', 'philips__monitor/ph_16.jpg', 'LCD Wide', '1920x1080', 'DC 20M:1', '2 ms', '170/160', 'VGA+DVI+HDMI', 370, '2012-11-23'),
(101, 'samsung', '19', 'Монитор 18,5" Samsung S19B220B', 'samsung_monitor/small/sm_24.jpg', 'samsung_monitor/sm_24.jpg', 'LED', '1366x768', 'MEGA DCR', '5ms', '170/160', 'VGA + DVI', 120, '2012-11-23'),
(102, 'samsung', '22', 'Монитор 21.5', 'samsung_monitor/small/sm_25.jpg', 'samsung_monitor/sm_25.jpg', 'LED 16:9', '1920x1080', 'DC MEGA', ' 5ms ', '170/160', 'VGA', 194, '2012-11-23'),
(103, 'samsung', '24', 'Монитор 24" Samsung S24B300BL', 'samsung_monitor/small/sm_26.jpg', 'samsung_monitor/small/sm_26.jpg', 'Wide LCD ', '1920x1080', '1000:1', '5ms ', '170/160', 'VGA + DVI', 214, '2012-11-23'),
(104, 'samsung', '24', 'Монитор 24" Samsung S24B350HL', 'samsung_monitor/small/sm_27.jpg', 'samsung_monitor/sm_27.jpg', 'Wide LCD', '1920x1080', 'Mega DCR', '5ms', '170/160', 'VGA + DVI+HDMI', 226, '2012-11-23'),
(105, 'viewsonic', '', 'Монитор 18,5" ViewSonic VA1938WA', 'viewsonic_monitor/small/vs_6.jpg', 'viewsonic_monitor/vs_6.jpg', 'LED', '1366x768', 'DC 10000000:1', '5ms', '170/160', 'VGA', 116, '2012-11-23'),
(106, 'philips', '24', 'Монитор 27" PHILIPS 273E3LHSB/00 ', 'philips__monitor/small/ph_16.jpg', 'philips__monitor/ph_16.jpg', 'LCD, Wide', '1920x1080', 'DC 20M:1', '2 ms', '170/160', 'VGA+DVI+HDMI', 370, '2012-11-23'),
(107, 'benq', '', 'Монитор 18.5" BENQ G950A', 'benq__monitor/small/benq_7.jpg', 'benq__monitor/benq_7.jpg', 'Wide', '1366x768 ', 'DC 50000:1', '5ms', '90/ 65', 'VGA', 115, '2012-11-23'),
(108, 'benq', '', 'Монитор 20" BenQ G2025HDA', 'benq__monitor/small/benq_8.jpg', 'benq__monitor/small/benq_8.jpg', 'Wide', '1600x900', 'DC 40000:1', '5ms', '90/ 65', ' VGA', 134, '2012-11-23'),
(109, 'benq', '', 'Монитор 20" BenQ GL2055', 'benq__monitor/small/benq_7.jpg', 'benq__monitor/benq_7.jpg', 'LCD  Wide', '1600x900', 'DC 12M:1', '5ms', '90/ 65', 'VGA + DVI', 138, '2012-11-23'),
(110, 'benq', '', 'Монитор 24" Benq GL2450', 'benq__monitor/small/benq_9.jpg', 'benq__monitor/small/benq_9.jpg', ' Wide  LED', '1920x1080 ', 'DC 12000000:1', '5ms', '170/160', ' VGA + DVI ', 201, '2012-11-23'),
(111, 'benq', '', 'Монитор 24" Benq GL2450HM', 'benq__monitor/small/benq_9.jpg', 'benq__monitor/benq_9.jpg', ' LED', '1920x1080', 'DC 12000000:1', '2ms', '170/160', ' VGA + DVI + HDMI', 212, '2012-11-23'),
(112, 'lg', '22', 'Монитор 21,5" LG E2242C-BN', 'lg_monitor/small/lg_27.jpg', 'lg_monitor/lg_27.jpg', 'WIDE LED', '1920x1080 ', 'DC 5 000 000:1', '5ms', '170/160', 'VGA ', 155, '2012-11-23'),
(113, 'lg', '22', 'Монитор 21,5" LG E2251S-BN', 'lg_monitor/small/lg_28.jpg', 'lg_monitor/lg_28.jpg', 'LED', '1920x1080', 'DC 5000000:1', '5ms', '170/160', 'VGA', 168, '2012-11-23'),
(114, 'lg', '24', 'Монитор 24" LG E2411T-BN', 'lg_monitor/small/lg_29.jpg', 'lg_monitor/g_29.jpg', 'Wide LED', '1920x1080', 'DC 5M:1', '5ms', '170/160', 'VGA + DVI', 222, '2012-11-23'),
(115, 'acer', '', 'Монитор 23" Asus MS238H', 'acer_monitor/small/acer_9.jpg', 'acer_monitor/acer_9.jpg', 'WIDE LED', '1920x1080', 'DC 10000 :1', '5ms', '170/160', 'VGA + HDMI ', 240, '2012-11-23'),
(116, 'acer', '', 'Монитор 23,6" Asus 24T1E', 'acer_monitor/small/acer_10.jpg', 'acer_monitor/acer_10.jpg', 'WIDE LED', '1920x1080', 'DC 20000:1', '5ms', '170/160', 'VGA + HDMI + TV-Tuner', 282, '2012-11-23'),
(119, 'acer', '', 'Монитор 21,5" Acer S220HQLBb ', 'acer_monitor/small/acer_13.jpg', 'acer_monitor/acer_13.jpg', 'WIDE LED', '1920x1080', 'DC 100000000:1', '5 ms', '170/160', 'VGA', 164, '2012-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `monitor_series`
--

CREATE TABLE IF NOT EXISTS `monitor_series` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `series` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Серии мониторов' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `monitor_series`
--

INSERT INTO `monitor_series` (`id`, `series`, `title`) VALUES
(1, '19', '19"'),
(2, '20', '20"'),
(3, '22', '22"'),
(4, '23', '23"'),
(5, '24', '24"'),
(6, '27', '27"');

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE IF NOT EXISTS `motherboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_motherboard` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `motherboard`
--

INSERT INTO `motherboard` (`id`, `name_motherboard`) VALUES
(17, 'SocketAM3'),
(18, 'Socket1155');

-- --------------------------------------------------------

--
-- Table structure for table `motherboard_system_block`
--

CREATE TABLE IF NOT EXISTS `motherboard_system_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_motherboard` int(11) DEFAULT NULL,
  `id_system_block` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=138 ;

--
-- Dumping data for table `motherboard_system_block`
--

INSERT INTO `motherboard_system_block` (`id`, `id_motherboard`, `id_system_block`) VALUES
(45, 15, 5),
(46, 16, 5),
(47, 15, 6),
(48, 15, 7),
(49, 15, 8),
(50, 16, 9),
(51, 16, 10),
(52, 16, 10),
(53, 15, 11),
(54, 15, 12),
(55, 17, 17),
(56, 17, 13),
(57, 17, 14),
(58, 17, 16),
(59, 17, 15),
(60, 17, 18),
(61, 17, 19),
(62, 17, 20),
(63, 17, 21),
(64, 17, 22),
(65, 17, 23),
(66, 17, 23),
(67, 17, 24),
(68, 17, 25),
(69, 17, 26),
(70, 17, 27),
(71, 17, 28),
(72, 17, 29),
(73, 17, 29),
(74, 17, 30),
(75, 18, 32),
(76, 18, 14),
(77, 18, 16),
(78, 18, 15),
(79, 18, 17),
(80, 18, 18),
(81, 18, 19),
(82, 17, 32),
(83, 17, 33),
(84, 17, 33),
(85, 17, 34),
(86, 17, 35),
(87, 17, 36),
(88, 17, 37),
(89, 17, 39),
(90, 17, 40),
(91, 17, 41),
(92, 17, 42),
(93, 17, 43),
(94, 18, 44),
(95, 18, 45),
(96, 17, 46),
(97, 17, 47),
(98, 17, 48),
(99, 17, 49),
(100, 18, 50),
(101, 18, 51),
(102, 18, 51),
(103, 18, 52),
(104, 18, 53),
(105, 18, 54),
(106, 18, 54),
(107, 18, 55),
(108, 18, 56),
(109, 18, 57),
(110, 18, 58),
(111, 18, 59),
(112, 17, 60),
(113, 17, 58),
(114, 17, 61),
(115, 17, 62),
(116, 18, 63),
(117, 18, 63),
(118, 18, 64),
(119, 17, 65),
(120, 17, 66),
(121, 18, 67),
(122, 17, 68),
(123, 18, 69),
(124, 17, 70),
(125, 17, 71),
(126, 18, 71),
(127, 18, 72),
(128, 18, 73),
(129, 18, 74),
(130, 18, 75),
(131, 18, 76),
(132, 18, 76),
(133, 18, 77),
(134, 18, 78),
(135, 18, 79),
(136, 18, 80),
(137, 18, 81);

-- --------------------------------------------------------

--
-- Table structure for table `naushniki`
--

CREATE TABLE IF NOT EXISTS `naushniki` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image_big` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `signal_shum` varchar(255) NOT NULL,
  `resist` varchar(255) NOT NULL,
  `microphone` varchar(255) NOT NULL,
  `volume_control` varchar(255) NOT NULL,
  `cost` int(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Наушники' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `naushniki`
--

INSERT INTO `naushniki` (`id`, `image_big`, `image_small`, `model`, `signal_shum`, `resist`, `microphone`, `volume_control`, `cost`, `date`) VALUES
(1, 'naushniki/n-1.jpg', 'naushniki/small/n-1.jpg', 'Наушники Sven AP-600', '106 дБ', '32 Ом', '+', '+', 9, '2012-10-29'),
(2, 'naushniki/n-2.jpg', 'naushniki/small/n-2.jpg', 'Наушники Sven CD-Blonde', '106 дБ', '32 Ом', '+', '+', 24, '2012-10-29'),
(6, 'naushniki/n-3.jpg', 'naushniki/small/n-3.jpg', 'Sven SEB-100', '105 дБ', '32 Ом', '-', '-', 10, '2012-11-28'),
(7, 'naushniki/n-4.jpg', 'naushniki/small/n-4.jpg', 'Sven AP-540', '106 дБ', '32 Ом', '+', '+', 13, '2012-11-28'),
(8, 'naushniki/n-5.jpg', 'naushniki/small/n-5.jpg', 'Sven GD-200MV', '105 дБ', '32 Ом', '+', '+', 13, '2012-11-28'),
(9, 'naushniki/n-6.jpg', 'naushniki/small/n-6.jpg', 'Defender HN-928', '105 дБ', '32 Ом', '+', '+', 13, '2012-11-28'),
(10, 'naushniki/n-7.jpg', 'naushniki/small/n-7.jpg', 'INTEX Echo Grey IT-HP896L', '-', '-', '+', '+', 13, '2012-11-28'),
(11, 'naushniki/n-8.jpg', 'naushniki/small/n-8.jpg', 'Sven HM-40BK', '106 дБ', '32 Ом', '+', '+', 14, '2012-11-28'),
(12, 'naushniki/n-9.jpg', 'naushniki/small/n-9.jpg', 'Grundig G38218', '91 дБ', '32 Ом', '-', '-', 16, '2012-11-28'),
(13, 'naushniki/n-10.jpg', 'naushniki/small/n-10.jpg', 'Sven SEB-14 WD', '106 дБ', '32 Ом', '-', '-', 17, '2012-11-28'),
(14, 'naushniki/n-11.jpg', 'naushniki/small/n-11.jpg', 'Philips SHP1900', '98 дБ', '32 Ом', '-', '-', 18, '2012-11-28'),
(15, 'naushniki/n-12.jpg', 'naushniki/small/n-12.jpg', 'Grundig G38629', '112 дБ', '32 Ом', '-', '-', 25, '2012-11-28'),
(16, 'naushniki/n-13.jpg', 'naushniki/small/n-13.jpg', 'Sven HM-80BK', '106 дБ', '32 Ом', '+', '+', 28, '2012-11-28'),
(17, 'naushniki/n-14.jpg', 'naushniki/small/n-14.jpg', 'Sven GD-970MV', '105 дБ', '32 Ом', '+', '+', 31, '2012-11-28'),
(18, 'naushniki/n-15.jpg', 'naushniki/small/n-15.jpg', 'Cooler Master SGH-2010-KKTA1', '108 дБ', '32 Ом', '+', '+', 46, '2012-11-28'),
(19, 'naushniki/n-16.jpg', 'naushniki/small/n-16.jpg', 'Philips SHC2000', '108 дБ', '-', '-', '-', 48, '2012-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `number_of_cores_tablet`
--

CREATE TABLE IF NOT EXISTS `number_of_cores_tablet` (
  `id_number_of_cores` int(11) NOT NULL AUTO_INCREMENT,
  `name_number_of_cores` varchar(255) NOT NULL,
  PRIMARY KEY (`id_number_of_cores`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `number_of_cores_tablet`
--

INSERT INTO `number_of_cores_tablet` (`id_number_of_cores`, `name_number_of_cores`) VALUES
(2, '2'),
(3, '444');

-- --------------------------------------------------------

--
-- Table structure for table `operating_system_tablet`
--

CREATE TABLE IF NOT EXISTS `operating_system_tablet` (
  `id_operating_system` int(11) NOT NULL AUTO_INCREMENT,
  `name_operating_system` varchar(255) NOT NULL,
  PRIMARY KEY (`id_operating_system`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `operating_system_tablet`
--

INSERT INTO `operating_system_tablet` (`id_operating_system`, `name_operating_system`) VALUES
(2, 'Android'),
(3, '123');

-- --------------------------------------------------------

--
-- Table structure for table `operating_system_version_tablet`
--

CREATE TABLE IF NOT EXISTS `operating_system_version_tablet` (
  `id_operating_system_version` int(11) NOT NULL AUTO_INCREMENT,
  `name_operating_system_version` varchar(255) NOT NULL,
  PRIMARY KEY (`id_operating_system_version`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `operating_system_version_tablet`
--

INSERT INTO `operating_system_version_tablet` (`id_operating_system_version`, `name_operating_system_version`) VALUES
(2, '4.0'),
(4, '555');

-- --------------------------------------------------------

--
-- Table structure for table `optical_drive`
--

CREATE TABLE IF NOT EXISTS `optical_drive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_optical_drive` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `optical_drive`
--

INSERT INTO `optical_drive` (`id`, `name_optical_drive`) VALUES
(1, 'DVD±RW');

-- --------------------------------------------------------

--
-- Table structure for table `power_unit`
--

CREATE TABLE IF NOT EXISTS `power_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_power_unit` varchar(255) COLLATE utf8_bin NOT NULL,
  `size_power_unit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- Dumping data for table `power_unit`
--

INSERT INTO `power_unit` (`id`, `name_power_unit`, `size_power_unit`) VALUES
(18, '', 500),
(20, '', 550),
(21, '', 650),
(22, '', 600),
(23, '', 400),
(24, '', 450),
(25, '', 0),
(26, 'STC', 650);

-- --------------------------------------------------------

--
-- Table structure for table `power_unit_system_block`
--

CREATE TABLE IF NOT EXISTS `power_unit_system_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_power_unit` int(11) DEFAULT NULL,
  `id_system_block` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=161 ;

--
-- Dumping data for table `power_unit_system_block`
--

INSERT INTO `power_unit_system_block` (`id`, `id_power_unit`, `id_system_block`) VALUES
(42, 14, 5),
(43, 15, 5),
(44, 16, 6),
(45, 17, 6),
(46, 15, 6),
(47, 15, 7),
(48, 16, 8),
(49, 16, 9),
(50, 15, 10),
(51, 15, 10),
(52, 15, 11),
(53, 14, 12),
(54, 18, 13),
(55, 19, 14),
(56, 18, 14),
(57, 20, 15),
(58, 20, 16),
(59, 20, 17),
(60, 20, 18),
(61, 20, 19),
(62, 18, 20),
(63, 18, 21),
(64, 18, 22),
(65, 18, 23),
(66, 18, 24),
(67, 20, 25),
(68, 20, 25),
(69, 20, 26),
(70, 20, 27),
(71, 20, 28),
(72, 20, 29),
(73, 20, 30),
(74, 20, 32),
(75, 20, 33),
(76, 20, 33),
(77, 20, 34),
(78, 20, 35),
(79, 20, 36),
(81, 18, 39),
(82, 18, 40),
(83, 18, 41),
(84, 18, 42),
(85, 18, 43),
(86, 21, 44),
(87, 21, 45),
(88, 21, 46),
(89, 21, 47),
(90, 21, 48),
(91, 21, 49),
(92, 21, 50),
(93, 22, 51),
(94, 22, 52),
(95, 20, 53),
(96, 20, 54),
(97, 23, 55),
(98, 23, 56),
(99, 24, 57),
(100, 24, 58),
(101, 24, 59),
(102, 24, 60),
(103, 24, 61),
(104, 23, 62),
(105, 23, 63),
(106, 23, 64),
(107, 23, 65),
(108, 23, 66),
(109, 23, 67),
(110, 23, 68),
(111, 23, 69),
(112, 23, 70),
(113, 23, 71),
(114, 18, 72),
(115, 18, 73),
(116, 18, 74),
(117, 18, 74),
(118, 18, 74),
(119, 20, 75),
(120, 18, 76),
(121, 20, 77),
(122, 21, 78),
(123, 21, 78),
(124, 21, 79),
(125, 21, 80),
(126, 18, 81),
(127, 20, 76),
(128, 21, 77),
(129, 21, 77),
(130, 21, 77),
(131, 21, 77),
(132, 21, 77),
(133, 21, 77),
(134, 20, 45),
(135, 20, 45),
(136, 21, 51),
(137, 25, 0),
(138, 21, 51),
(139, 21, 51),
(140, 21, 51),
(141, 21, 51),
(142, 21, 51),
(143, 21, 51),
(144, 21, 51),
(145, 22, 51),
(146, 22, 51),
(147, 22, 51),
(148, 22, 51),
(149, 22, 51),
(150, 22, 51),
(151, 21, 52),
(152, 21, 52),
(153, 21, 52),
(154, 21, 52),
(155, 21, 52),
(156, 21, 52),
(157, 21, 52),
(158, 20, 81),
(159, 21, 76),
(160, 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `printer`
--

CREATE TABLE IF NOT EXISTS `printer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `image_big` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color_print` varchar(255) NOT NULL,
  `functions` varchar(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `resolution_max` varchar(255) NOT NULL,
  `kol_color` varchar(255) NOT NULL,
  `bez_pc` varchar(255) NOT NULL,
  `wi_fi` varchar(255) NOT NULL,
  `ethernet` varchar(255) NOT NULL,
  `bluetooth` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `card` varchar(255) NOT NULL,
  `lcd` varchar(255) NOT NULL,
  `photo_print` varchar(255) NOT NULL,
  `two_sided` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `depth` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `cost` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Принтеры и МФУ' AUTO_INCREMENT=46 ;

--
-- Dumping data for table `printer`
--

INSERT INTO `printer` (`id`, `type`, `series`, `image_big`, `image_small`, `model`, `color_print`, `functions`, `format`, `resolution_max`, `kol_color`, `bez_pc`, `wi_fi`, `ethernet`, `bluetooth`, `fax`, `card`, `lcd`, `photo_print`, `two_sided`, `weight`, `height`, `width`, `depth`, `information`, `cost`, `date`) VALUES
(1, 'epson_snpch', 'epson_stylus', 'snpch/sn-1.jpg', 'snpch/small/sn-1.jpg', 'МФУ Epson Stylus SX130 с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'А4', '1200x1200', '4', '-', '-', '-', '-', '-', '-', '-', '-', '-', '3,9', '150', '436', '304', '', 'нет в наличии', '2012-10-30'),
(2, 'epson_snpch', 'epson_stylus', 'snpch/sn-2.jpg', 'snpch/small/sn-2.jpg', 'МФУ Epson Stylus SX230 с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'А4', '1200x2400', '4', '-', '-', '-', '-', '-', '-', '-', '-', '-', '4,1', '300', '390', '145', '', 'нет в наличии', '2012-10-30'),
(3, 'epson_snpch', 'epson_stylus', 'snpch/sn-3.jpg', 'snpch/small/sn-3.jpg', 'МФУ Epson Stylus SX235W с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'А4', '1200x2400', '4', '-', '-', '-', '-', '-', '-', '-', '-', '-', '4,1', '300', '390', '145', '', 'нет в наличии', '2012-10-30'),
(4, 'epson_snpch', 'epson_stylus', 'snpch/sn-4.jpg', 'snpch/small/sn-4.jpg', 'МФУ Epson Stylus SX420W с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'А4', '1200x2400', '4', '+', '+', '-', '-', '+', '+', '+ цветной', '-', '-', '6,2', '359', '445', '164', '', 'нет в наличии', '2012-10-30'),
(5, 'epson_snpch', 'spson_stylus', 'snpch/sn-5.jpg', 'snpch/small/sn-5.jpg', 'МФУ Epson Stylus SX430W с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'А4', '1200x2400', '4', '+', '+', '-', '-', '-', '+', '-', '-', '-', '4,1', '300', '390', '145', '', '205', '2012-10-30'),
(6, 'epson_snpch', 'epson_stylus', 'snpch/sn-6.jpg', 'snpch/small/sn-6.jpg', 'МФУ Epson Stylus SX535WD с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'А4', '2400x2400', '4', '+', '+', '+', '-', '+', '+', '-', '-', '-', '6,3', '367', '445', '169', '', 'нет в наличии', '2012-10-30'),
(7, 'epson_snpch', 'epson_stylus_photo', 'snpch/sn-7.jpg', 'snpch/small/sn-7.jpg', 'Принтер Epson Stylus Photo P50 с СНПЧ', 'Цветная', 'Принтер', 'А4', '5760x1440 dpi', '6', '-', '-', '-', '-', '-', '-', '-', '+', '+', '5,4', '187', '450', '282', '(BlackBox,чернила EIM 290)', '270', '2012-10-30'),
(8, 'epson_snpch', 'epson_stylus_photo', 'snpch/sn-8.jpg', 'snpch/small/sn-8.jpg', 'МФУ Epson Stylus Photo PX660 с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'А4', '5760x1440 dpi', '6', '+', '-', '-', '-', '-', '+', '+ цветной', '+', '-', '8,5', '195', '450', '386', '', '315', '2012-10-30'),
(9, 'epson_snpch', 'epson_stylus_photo', 'snpch/sn-9.jpg', 'snpch/small/sn-9.jpg', 'МФУ Epson Stylus Photo PX720WD с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'А4', '5760 х 1440 dpi', '6', '+', '+', '+', '+', '+', '+', '+ цветной', '-', '+', '9,6', '446', '458', '150', '', 'нет в наличии', '2012-10-30'),
(10, 'epson_snpch', 'epson_stylus_photo', 'snpch/sn-10.jpg', 'snpch/small/sn-10.jpg', 'МФУ Epson Stylus Photo PX730WD с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'А4', '2400x4800', '6', '+', '+', '+', '-', '-', '+', '+ цветной', '-', '+', ' 9,8', '458', '446', '150', '', 'нет в наличии', '2012-10-30'),
(11, 'epson_snpch', 'epson_l_series', 'snpch/sn-11.jpg', 'snpch/small/sn-11.jpg', 'Принтер Epson L100 с СНПЧ', 'Цветная', 'Принтер', 'А4', '5760x1440 dpi', '4', '-', '-', '-', '-', '-', '-', '+', '+', '-', '2,8', '228', '487', '135', '', '179', '2012-10-30'),
(12, 'epson_snpch', 'epson_l_series', 'snpch/sn-12.jpg', 'snpch/small/sn-12.jpg', 'Принтер Epson L800 с СНПЧ', 'Цветная', 'Принтер', 'А4', '-', '6', '-', '-', '-', '-', '-', '-', '-', '+', '-', '6,2', '188', '537', '289', '', '284', '2012-10-30'),
(13, 'epson_snpch', 'epson_workforce', 'snpch/sn-13.jpg', 'snpch/small/sn-13.jpg', 'Принтер Epson WorkForce WF-7015 с СНПЧ', 'Цветная', 'Принтер', 'А3', '-', '4', '-', '+', '+', '-', '-', '-', '-', '+', '+', '12,3', '414', '558', '264', '', '509', '2012-10-30'),
(14, 'epson_snpch', 'epson_workforce', 'snpch/sn-14.jpg', 'snpch/small/sn-14.jpg', 'Принтер Epson WorkForce WF-7515 с СНПЧ', 'Цветная', 'Принтер', 'А3', '1200x1200', '4', '-', '+', '+', '-', '-', '-', '-', '+', '+', '12,3', '414', '558', '264', '', '640', '2012-10-30'),
(15, 'laser', '', 'printerji/pr_1.jpg', 'printerji/small/pr_1.jpg', 'Samsung ML1670', 'Черно-белая ', 'Принтер', 'A4', '1200x600 dpi', '1', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '', '', '', '16 ppm, 8Mb, до 5 000 стр. в мес., USB2.0, старт. картр. на 700 стр. (по ISO), стандарт. картр. MLT-D108S на 1500 стр', 'нет в наличии', '2012-10-30'),
(16, 'laser', '', 'printerji/pr_2.jpg', 'printerji/small/pr_2.jpg', 'Xerox Phaser 3140', 'Черно-белая ', 'Принтер', 'A4', '1200x600 dpi', '1', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '18 cтр/мин, 8Mb, 10000 стр./месяц, USB', 'нет в наличии', '2012-10-30'),
(17, 'laser', '', 'printerji/pr_3.jpg', 'printerji/small/pr_3.jpg', 'Canon Laser Shot LBP-6000', 'Черно-белая', 'Принтер', 'A4', '2400х600 dpi IQ', '1', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '18 ppm, 2 Mb, интерфейс USB 2.0 High-speed, картридж 1600 страниц', 'нет в наличии', '2012-10-30'),
(18, 'laser', '', 'printerji/pr_4.jpg', 'printerji/small/pr_4.jpg', 'Epson PictureMate PM260', 'струйная цветная печать', 'Фотопринтер', 'A4', '5760x1440 dpi', '-', '-', '-', '-', '+', '-', '-', 'дисплей 3.6', '+', '-', '-', '-', '-', '-', '--', 'нет в наличии', '2012-10-30'),
(19, 'mfu', '', 'mfu/mfu_1.jpg', 'mfu/small/mfu_1.jpg', 'Canon Pixma MP280', 'Цветная', 'Принтер/сканер/копир', 'A4', '4800x1200 dpi', '4', '-', '-', '-', '-', '-', '-', '-', '-', '-', '', '', '', '', '19/15 ppm, скан. 1200x2400 ppi CIS, 48/24 bit, без полей, PictBridge, USB2.0', '65', '2012-10-31'),
(20, 'mfu', '', 'mfu/mfu_2.jpg', 'mfu/small/mfu_2.jpg', 'Xerox Phaser 3100MPF', 'Черно-белый', 'Принтер/сканер/копир', 'A4', '600x600 dpi', '1', '-', '-', '-', '-', '-', '-', '+', '-', '-', '-', '344', '447', '386', 'лазерный, 20 стр/мин,USB2.0', '148', '2012-10-31'),
(21, 'mfu', '', 'mfu/mfu_3.jpg', 'mfu/small/mfu_3.jpg', 'Canon LaserBase MF4410', 'Черно-белый', 'Лазерный принтер/сканер/копир', 'A4', '', '1', '-', '-', '-', '-', '-', '-', '+', '-', '-', '', '', '', '', '23 стр/мин, 64 Мб, USB2.0', '215', '2012-10-31'),
(22, 'mfu', '', 'mfu/mfu_4.jpg', 'mfu/small/mfu_4.jpg', 'Samsung SCX-3405', 'Черно-белый', 'Лазерный принтер/сканер/копир', 'A4', '-', '1', '-', '-', '-', '-', '-', '-', '+', '-', '-', '-', '-', '-', '-', '64Mb, 20 cтр/мин, сканер 1200x1200 dpi, USB2.0, подача 150 лист', 'нет в наличии', '2012-10-31'),
(28, 'mfu', '', 'snpch/sn-15.jpg', 'snpch/small/sn-15.jpg', 'Canon MP230', 'Цветная', 'Принтер/сканер/копир', 'A4', '4800x1200 dpi', '4', '-', '-', '-', '-', '-', '-', '-', '-', '', '5.3', '153', '444', '329', 'USB 2.0,без полей,струйная цветная и черно-белая печать 4800x1200 dpi, сканер 600x1200 dpi', '68', '2012-12-02'),
(29, 'mfu', '', 'snpch/sn-16.jpg', 'snpch/small/sn-16.jpg', 'HP Deskjet 3050A J611b (CR231C)', 'Цветная', 'Принтер/сканер/копир', 'A4', '4800x1200 dpi', '4', '-', '+', '-', '-', '-', '-', '+', '-', '', '3,5', '249', '427', '406', 'A4(~210x297), струйная цветная и черно-белая печать 4800x1200 dpi,сканер 1200x1200 dpi, дисплей 1.9",Wi-Fi', '78', '2012-12-02'),
(30, 'laser', '', 'snpch/sn-17.jpg', 'snpch/small/sn-17.jpg', 'Xerox Phaser 3010', 'Черно-белая', 'Принтер', 'A4', '1200x1200 dpi', '1', '-', '-', '-', '-', '-', '-', '-', '-', '', '4,5', '208', '358', '197', '20 cтр/мин, 64Mb, 30000 стр./месяц, USB, картридж 106R02181(3)', '89', '2012-12-02'),
(31, 'laser', '', 'snpch/sn-18.jpg', 'snpch/small/sn-18.jpg', 'Canon Laser Shot LBP-6000B', 'Черно-белая', 'Принтер', 'A4', '2400х600 dpi', '1', '-', '-', '-', '-', '-', '-', '-', '-', '', '5', '198', '359', '249', '18 ppm, 2 Mb, интерфейс USB 2.0 High-speed, картридж 1600 страниц', 'нет в наличии', '2012-12-02'),
(32, 'mfu', '', 'snpch/sn-19.jpg', 'snpch/small/sn-19.jpg', 'Samsung 3400 ', 'Черно-белый', 'Принтер/сканер/копир', 'A4', '1200x1200 dpi', '1', '-', '-', '-', '-', '-', '-', '+', '-', '', '6,7', '249', '389', '274', 'лазерная черно-белая печать 1200x1200 dpi, сканер 4800x4800 dpi, дисплей', '169', '2012-12-02'),
(33, 'mfu', '', 'snpch/sn-20.jpg', 'snpch/small/sn-20.jpg', 'HP LaserJet Pro M1132 MFP', 'Черно-белый', 'Принтер/сканер/копир', 'A4', '1200x1200 dpi', '1', '-', '-', '-', '-', '-', '-', '+', '-', '', '7,86', '250', '415', '265', 'USB 2.0, лазерная черно-белая печать 1200x1200 dpi, сканер 1200x1200 dpi, дисплей', '195', '2012-12-02'),
(34, 'mfu', '', 'snpch/sn-21.jpg', 'snpch/small/sn-21.jpg', 'Canon LaserBase MF3010', 'Черно-белый', 'Принтер/сканер/копир', ' A4', '1200x600 dpi', '1', '-', '-', '-', '-', '-', '-', '-', '-', '', '8,2', '254', '372', '276', '18 стр.мин, 1200х600 dpi IQ, цветной сканер 600x1200 ppi, 64 Мб, масштабирование 50-200%, тиражирование,  картридж 725 (1600 стр), USB 2.0', '200', '2012-12-02'),
(35, 'mfu', '', 'snpch/sn-22.jpg', 'snpch/small/sn-22.jpg', 'HP LaserJet Pro M1132 MFP', 'Черно-белый', 'Принтер/сканер/копир', 'A4', '1200x1200 dpi', '1', '-', '-', '-', '-', '-', '-', '+', '-', '', '7,86', '250', '415', '265', '18 стр.мин, 1200 dpi IQ, 600х600 dpi, цветной сканер 1200 dpi (до 19200 ppi), 8 Мб, масштабир.25-400%, до 8000 стр. в месяц, USB 2.0', '205', '2012-12-02'),
(36, 'mfu', '', 'snpch/sn-23.jpg', 'snpch/small/sn-23.jpg', 'Canon LaserBase MF4430', 'Черно-белый', ' Принтер/сканер/копир', 'A4', '600x600 dpi', '1', '-', '-', '-', '-', '-', '-', '+', '-', '', '11,5', '370', '390', '421', '23 стр.мин, 600х600 dpi IQ, цветной сканер 600x600 ppi, 64 Мб, масштабирование 25-400%, USB 2.0', '250', '2012-12-02'),
(37, 'mfu', '', 'snpch/sn-24.jpg', 'snpch/small/sn-24.jpg', 'Canon LaserBase MF4580DN', 'Черно-белый', 'Принтер/сканер/копир', 'A4', '600х600 dpi ', '1', '-', '-', '+', '-', '+', '-', '+', '-', '', '13,4', '361', '390', '429', '25 стр.мин, 600х600 dpi IQ, цветной сканер 600x600 ppi, 64 Мб, масштабирование 25-400%, USB 2.0, Ethernet', '429', '2012-12-02'),
(38, 'mfu', '', 'snpch/sn-25.jpg', 'snpch/small/sn-25.jpg', 'Canon IR1133', 'Черно-белый', 'Принтер/сканер/копир', 'A4', '1200x1200 dpi', '1', '-', '+', '+', '-', '+', '-', '+', '-', '', '20,5', '465', '450', '472', '600x600dpi, 33ppm, Duplex Unit Есть, (ADF дополнительно), (FAX - optional), Lan, (Wi-Fi optional) , 256MB, USB2.0, UFR II LT', '520', '2012-12-02'),
(39, 'epson_snpch', 'epson_stylus', 'snpch/sn-26.jpg', 'snpch/small/sn-26.jpg', 'МФУ Epson StylusOffice BX320FW с СНПЧ', 'Цветная и черно-белая ', 'Принтер/сканер/копир/факс', 'A4', '5760x1440 dpi', '4', '-', 'Есть, IEEE 802.11n, IEEE 802.11g, IEEE 802.11b', '+', '-', 'Есть, цветной с возможностью автономной (без подключения к ПК) работы', '-', 'Есть, 2-х строчный', '-', '', '7,4', '235', '460', '403', 'Струйная цветная и черно-белая печать 1440x5760 dpi, сканер 1200x2400 dpi, дисплей, факс, Ethernet, Wi-Fi', '255', '2012-12-02'),
(40, 'epson_snpch', 'epson_l_series', 'snpch/sn-27.jpg', 'snpch/small/sn-27.jpg', 'МФУ Epson L200 с СНПЧ', 'Цветная и черно-белая', 'Принтер/сканер/копир', 'A4', '5760x1440 dpi', '4', '-', '-', '-', '-', '-', '-', '-', '-', '', '4,3', '151 ', '508', '304', 'Печать без полей,USB 2.0', '235', '2012-12-02'),
(41, 'epson_snpch', 'epson_workforce', 'snpch/sn-28.jpg', 'snpch/small/sn-28.jpg', 'МФУ Epson WorkForce WF-4015DN с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'A4', '4800x1200 dpi', '4', '-', '-', '+', '-', '-', '-', '-', '+', '', '10,9', '420', '460', '284', 'Ethernet (RJ-45), USB 2.0', '399', '2012-12-02'),
(42, 'epson_snpch', 'epson_workforce', 'snpch/sn-29.jpg', 'snpch/small/sn-29.jpg', 'МФУ Epson WorkForce WF-4515DN с СНПЧ', 'Цветная', 'Принтер/сканер/копир', 'А4', '4800x1200 dpi', '4', '-', '-', '+', '-', '+', '-', '+', '-', '', '-', '-', '-', '-', 'Сенсорный дисплей,USB 2.0', '440', '2012-12-02'),
(43, 'epson_snpch', 'epson_stylus_photo', 'snpch/sn-30.jpg', 'snpch/small/sn-30.jpg', 'МФУ Epson Stylus Photo PX830FWD с СНПЧ', 'Цветная', 'Принтер/сканер/копир/факс', 'A4', '5760x1440 dpi', '6', '+', '+', '+', '-', '+', '+', '+', '+', '', '11,4', '198', '465', '458', 'Ethernet (RJ-45), Wi-Fi, 802.11n, USB 2.0,печать без полей', '505', '2012-12-02'),
(44, 'epson_snpch', 'epson_stylus_photo', 'snpch/sn-31.jpg', 'snpch/small/sn-31.jpg', 'Принтер Epson Stylus Photo 1410 с СНПЧ', 'Цветная', 'Принтер', 'A3+, A3, A4 ', '5760x1440 dpi', '6', '+', '-', '-', '-', '-', '-', '-', '+', '', '11,5', '223', '615', '314', 'USB 2.0', '620', '2012-12-02'),
(45, 'epson_snpch', 'epson_workforce', 'snpch/sn-32.jpg', 'snpch/small/sn-32.jpg', 'МФУ Epson WorkForce WF-7525 с СНПЧ', 'Цветная и черно-белая', 'Принтер/сканер/копир/факс', 'A3+ ', '5760 х 1440 dpi', '4', '+', '+', '+', '-', '+', '+', '+', '+', '', '18,9', '418', '559', '365', 'A3+, струйная цветная и черно-белая печать 5760x1440 dpi, сканер 1200x1200 dpi, дисплей 2.5", факс, Ethernet, Wi-Fi,USB 2.0', '780', '2012-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `printer_series`
--

CREATE TABLE IF NOT EXISTS `printer_series` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `series` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Серии принтеров Epson' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `printer_series`
--

INSERT INTO `printer_series` (`id`, `series`, `title`) VALUES
(1, 'epson_stylus', 'Epson Stylus'),
(2, 'epson_stylus_photo', 'Epson Stylus Photo'),
(3, 'epson_l_series', 'Epson L-серия'),
(4, 'epson_workforce', 'Epson WorkForce');

-- --------------------------------------------------------

--
-- Table structure for table `ram_tablet`
--

CREATE TABLE IF NOT EXISTS `ram_tablet` (
  `id_ram` int(11) NOT NULL AUTO_INCREMENT,
  `name_ram` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ram`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ram_tablet`
--

INSERT INTO `ram_tablet` (`id_ram`, `name_ram`) VALUES
(2, '2'),
(3, '333');

-- --------------------------------------------------------

--
-- Table structure for table `random_access_memory`
--

CREATE TABLE IF NOT EXISTS `random_access_memory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_random_access_memory` varchar(255) CHARACTER SET utf8 NOT NULL,
  `size_random_access_memory` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=20 ;

--
-- Dumping data for table `random_access_memory`
--

INSERT INTO `random_access_memory` (`id`, `name_random_access_memory`, `size_random_access_memory`) VALUES
(16, 'DDR3', 4),
(17, 'DDR3', 8),
(18, 'DDR3', 16),
(19, 'DDR3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `random_access_memory_system_block`
--

CREATE TABLE IF NOT EXISTS `random_access_memory_system_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_random_access_memory` int(11) DEFAULT NULL,
  `id_system_block` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=135 ;

--
-- Dumping data for table `random_access_memory_system_block`
--

INSERT INTO `random_access_memory_system_block` (`id`, `id_random_access_memory`, `id_system_block`) VALUES
(47, 13, 5),
(48, 14, 5),
(49, 15, 6),
(50, 13, 6),
(51, 15, 7),
(52, 15, 8),
(53, 13, 9),
(54, 13, 10),
(55, 13, 10),
(56, 13, 11),
(57, 13, 12),
(58, 16, 13),
(59, 16, 14),
(60, 16, 15),
(61, 17, 16),
(62, 17, 17),
(63, 17, 18),
(64, 17, 19),
(65, 16, 20),
(66, 17, 21),
(67, 16, 22),
(68, 17, 23),
(69, 17, 24),
(70, 17, 24),
(71, 16, 25),
(72, 17, 26),
(73, 17, 27),
(74, 17, 28),
(75, 17, 29),
(76, 17, 30),
(77, 16, 13),
(78, 16, 15),
(79, 17, 19),
(80, 17, 32),
(81, 17, 33),
(82, 17, 34),
(83, 17, 34),
(84, 17, 35),
(85, 17, 36),
(86, 17, 37),
(87, 17, 39),
(88, 17, 40),
(89, 17, 41),
(90, 17, 42),
(91, 17, 43),
(92, 17, 44),
(93, 17, 45),
(94, 17, 46),
(95, 17, 47),
(96, 17, 48),
(97, 17, 49),
(98, 17, 50),
(99, 18, 51),
(100, 18, 52),
(101, 17, 53),
(102, 17, 54),
(103, 19, 55),
(104, 19, 56),
(105, 19, 57),
(106, 16, 58),
(107, 16, 59),
(108, 16, 60),
(109, 16, 61),
(110, 19, 62),
(111, 19, 63),
(112, 19, 63),
(113, 19, 64),
(114, 19, 65),
(115, 19, 66),
(116, 19, 67),
(117, 19, 68),
(118, 19, 68),
(119, 19, 69),
(120, 19, 70),
(121, 19, 71),
(122, 18, 72),
(123, 18, 73),
(124, 17, 74),
(125, 19, 74),
(126, 17, 75),
(127, 19, 76),
(128, 18, 77),
(129, 17, 78),
(130, 19, 79),
(131, 18, 80),
(132, 17, 81),
(133, 17, 76),
(134, 18, 79);

-- --------------------------------------------------------

--
-- Table structure for table `screen_size_tablet`
--

CREATE TABLE IF NOT EXISTS `screen_size_tablet` (
  `id_screen_size` int(11) NOT NULL AUTO_INCREMENT,
  `name_screen_size` varchar(255) NOT NULL,
  PRIMARY KEY (`id_screen_size`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `screen_size_tablet`
--

INSERT INTO `screen_size_tablet` (`id_screen_size`, `name_screen_size`) VALUES
(2, '10'),
(4, '12');

-- --------------------------------------------------------

--
-- Table structure for table `stabilizatory_naprjazhenija`
--

CREATE TABLE IF NOT EXISTS `stabilizatory_naprjazhenija` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image_big` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `power` varchar(255) NOT NULL,
  `input` varchar(255) NOT NULL,
  `kol_roz` varchar(255) NOT NULL,
  `cost` int(5) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Стабилизаторы напряжения' AUTO_INCREMENT=19 ;

--
-- Dumping data for table `stabilizatory_naprjazhenija`
--

INSERT INTO `stabilizatory_naprjazhenija` (`id`, `image_big`, `image_small`, `model`, `power`, `input`, `kol_roz`, `cost`, `date`) VALUES
(1, 'stabilizatory-naprjazhenija/sn-1.jpg', 'stabilizatory-naprjazhenija/small/sn-1.jpg', 'FSP SCUDO AVR 1000', '600 Вт', '180-264 В', '3', 49, '2012-10-30'),
(2, 'stabilizatory-naprjazhenija/sn-2.jpg', 'stabilizatory-naprjazhenija/small/sn-2.jpg', 'Sven AVR-500', '350 Вт', '100-280 В', '1', 50, '2012-10-30'),
(5, 'stabilizatory-naprjazhenija/sn-3.jpg', 'stabilizatory-naprjazhenija/small/sn-3.jpg', 'FSP SCUDO AVR 600', '360 Вт ', '180 — 264 В ', '3', 49, '2012-12-03'),
(6, 'stabilizatory-naprjazhenija/sn-4.jpg', 'stabilizatory-naprjazhenija/small/sn-4.jpg', 'Sven Neo R500', '280 Вт', '172-270 В', '2', 49, '2012-12-03'),
(7, 'stabilizatory-naprjazhenija/sn-5.jpg', 'stabilizatory-naprjazhenija/small/sn-5.jpg', 'Sven AVR-500 LCD', '350 Вт ', '100 — 280 В', '1', 53, '2012-12-03'),
(8, 'stabilizatory-naprjazhenija/sn-6.jpg', 'stabilizatory-naprjazhenija/small/sn-6.jpg', 'Sven Neo R850', '450 Вт ', '172 — 270 В ', '2', 53, '2012-12-03'),
(9, 'stabilizatory-naprjazhenija/sn-7.jpg', 'stabilizatory-naprjazhenija/small/sn-7.jpg', 'Sven AVR-800', '560 Вт', '100 — 280 В ', '1', 55, '2012-12-03'),
(10, 'stabilizatory-naprjazhenija/sn-7.jpg', 'stabilizatory-naprjazhenija/small/sn-7.jpg', 'Sven AVR-800 LCD', '560 Вт ', '100-280 В', '1', 56, '2012-12-03'),
(11, 'stabilizatory-naprjazhenija/sn-8.jpg', 'stabilizatory-naprjazhenija/small/sn-8.jpg', 'Sven Neo R1000', '500 Вт', '150-280 В', '2', 58, '2012-12-03'),
(12, 'stabilizatory-naprjazhenija/sn-9.jpg', 'stabilizatory-naprjazhenija/small/sn-9.jpg', 'Sven AVR-1000', '700 Вт', '100-280 В', '1', 59, '2012-12-03'),
(13, 'stabilizatory-naprjazhenija/sn-10.jpg', 'stabilizatory-naprjazhenija/small/sn-10.jpg', 'Sven AVR-1000 LCD', '700 Вт', '100-280 В', '1', 62, '2012-12-03'),
(14, 'stabilizatory-naprjazhenija/sn-11.jpg', 'stabilizatory-naprjazhenija/small/sn-11.jpg', 'Sven AVR-2000', '1400 Вт', '100-280 В', '2', 74, '2012-12-03'),
(15, 'stabilizatory-naprjazhenija/sn-12.jpg', 'stabilizatory-naprjazhenija/small/sn-12.jpg', 'Sven Neo R1500', '750 Вт', '150-280 В', '4', 81, '2012-12-03'),
(16, 'stabilizatory-naprjazhenija/sn-13.jpg', 'stabilizatory-naprjazhenija/small/sn-13.jpg', 'Sven Neo R2000', '1000 Вт', '150-280 В', '4', 97, '2012-12-03'),
(17, 'stabilizatory-naprjazhenija/sn-14.jpg', 'stabilizatory-naprjazhenija/small/sn-14.jpg', 'Sven AVR-3000', '2100 Вт', '100-280 В', '5 (винтовые клеммы)', 124, '2012-12-03'),
(18, 'stabilizatory-naprjazhenija/sn-14.jpg', 'stabilizatory-naprjazhenija/small/sn-14.jpg', 'Sven AVR-3000 LCD', '2100 Вт', '100-280 В', '5 (винтовые клеммы)', 129, '2012-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `system_block`
--

CREATE TABLE IF NOT EXISTS `system_block` (
  `id_system_block` int(11) NOT NULL AUTO_INCREMENT,
  `name_system_block` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_cpu` int(11) DEFAULT NULL,
  `id_hdd` int(11) DEFAULT NULL,
  `id_random_access_memory` int(11) DEFAULT NULL,
  `id_optical_drive` int(11) DEFAULT NULL,
  `id_computer_case` int(11) DEFAULT NULL,
  `id_motherboard` int(11) DEFAULT NULL,
  `id_power_unit` int(11) NOT NULL,
  `id_vga` int(11) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `url_image` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_system_block`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=82 ;

--
-- Dumping data for table `system_block`
--

INSERT INTO `system_block` (`id_system_block`, `name_system_block`, `id_cpu`, `id_hdd`, `id_random_access_memory`, `id_optical_drive`, `id_computer_case`, `id_motherboard`, `id_power_unit`, `id_vga`, `cost`, `url_image`) VALUES
(13, 'Cooler Advanced', 65, 27, 16, 1, 17, 17, 18, 26, 388, 'delux-dlc-mv850.jpg'),
(14, 'Cooler Aztec', 65, 28, 16, 1, 17, 18, 18, 25, 450, 'delux-dlc-mv850.jpg'),
(15, 'Cooler Engine Next', 66, 28, 16, 1, 18, 18, 20, 27, 494, 'stc-a15.jpg'),
(16, 'Cooler Dark Neo', 67, 28, 17, 1, 18, 18, 20, 28, 619, 'stc-a15.jpg'),
(17, 'Cooler VX-E Edition', 68, 28, 17, 1, 18, 18, 20, 25, 707, 'stc-a15.jpg'),
(18, 'Cooler VX-E Pro Limited Edition', 69, 29, 17, 1, 18, 18, 20, 25, 737, 'stc-a15.jpg'),
(19, 'Cooler eXtreme Power', 69, 30, 17, 1, 18, 18, 20, 28, 782, 'stc-a15.jpg'),
(20, 'Cooler Antec', 71, 28, 16, 1, 17, 17, 18, 27, 424, 'delux-dlc-mv850.jpg'),
(21, 'Cooler Antec Smart', 71, 28, 17, 1, 17, 17, 18, 25, 462, 'delux-dlc-mv850.jpg'),
(22, 'Cooler Arena', 72, 28, 16, 1, 17, 17, 18, 25, 431, 'delux-dlc-mv850.jpg'),
(23, 'Cooler Griffin', 73, 28, 17, 1, 17, 17, 18, 25, 460, 'delux-dlc-mv850.jpg'),
(24, 'Cooler Sagida', 74, 28, 17, 1, 17, 17, 18, 25, 604, 'delux-dlc-mv850.jpg'),
(25, 'Cooler Fenix', 75, 29, 16, 1, 18, 17, 20, 25, 461, 'stc-a15.jpg'),
(26, 'Cooler Optimum', 76, 28, 17, 1, 18, 17, 20, 29, 645, 'stc-a15.jpg'),
(27, 'Cooler Rider', 77, 29, 17, 1, 17, 17, 20, 25, 648, 'stc-a15.jpg'),
(28, 'Cooler Stacker', 78, 29, 17, 1, 18, 17, 20, 27, 667, 'stc-a15.jpg'),
(29, 'Cooler Silencio', 78, 28, 17, 1, 18, 17, 20, 25, 617, 'stc-a15.jpg'),
(30, 'Cooler Qdion', 79, 30, 17, 1, 18, 17, 20, 28, 552, 'stc-a15.jpg'),
(32, 'Cooler Quattro', 72, 30, 17, 1, 18, 17, 20, 29, 534, 'stc-a15.jpg'),
(33, 'Cooler  Suprim', 80, 30, 17, 1, 18, 17, 20, 28, 711, 'stc-a15.jpg'),
(34, 'Cooler Platinum', 81, 30, 17, 1, 18, 17, 20, 30, 685, 'stc-a15.jpg'),
(35, 'Cooler Argentum', 75, 30, 17, 1, 18, 17, 20, 28, 575, 'stc-a15.jpg'),
(36, 'Cooler Standart', 76, 30, 17, 1, 18, 17, 20, 31, 710, 'stc-a15.jpg'),
(37, 'Cooler Element', 77, 30, 17, 1, 19, 17, 26, 31, 775, 'stc-a15.jpg'),
(39, 'Cooler Evolution I', 72, 28, 17, 1, 17, 17, 18, 32, 396, 'delux-dlc-mv850.jpg'),
(40, 'Cooler Evolution II', 72, 28, 17, 1, 17, 17, 18, 25, 444, 'delux-dlc-mv850.jpg'),
(41, 'Cooler Evolution III', 73, 29, 17, 1, 17, 17, 18, 25, 465, 'delux-dlc-mv850.jpg'),
(42, 'Cooler Storm', 71, 29, 17, 1, 17, 17, 18, 28, 528, 'delux-dlc-mv850.jpg'),
(43, 'Cooler Storm Enforcer', 76, 30, 17, 1, 17, 17, 18, 33, 553, 'delux-dlc-mv850.jpg'),
(44, 'Cooler Enermax', 83, 27, 17, 1, 19, 18, 21, 28, 566, 'stc-magnum-x7.jpg'),
(45, 'Cooler eXtreme Max-Power', 84, 30, 17, 1, 19, 18, 21, 34, 1060, 'stc-magnum-x7.jpg'),
(46, 'Cooler X-Fighter', 85, 30, 17, 1, 19, 17, 21, 34, 903, 'stc-magnum-x7.jpg'),
(47, 'Cooler Z-MACHINE', 78, 29, 17, 1, 19, 17, 21, 34, 912, 'stc-magnum-x7.jpg'),
(48, 'Cooler Storm Scout', 77, 29, 17, 1, 19, 17, 21, 33, 686, 'stc-magnum-x7.jpg'),
(49, 'Cooler Storm Sniper', 85, 30, 17, 1, 19, 17, 21, 29, 660, 'stc-magnum-x7.jpg'),
(50, 'Cooler Quad Trooper', 86, 30, 17, 1, 19, 18, 21, 35, 708, 'stc-magnum-x7.jpg'),
(51, 'Cooler Gladiator', 87, 30, 18, 1, 19, 18, 21, 43, 1296, 'stc-magnum-x7.jpg'),
(52, 'Cooler Agressor', 84, 31, 18, 1, 19, 18, 21, 37, 1271, 'stc-magnum-x7.jpg'),
(53, 'Cooler Epsilon', 88, 28, 17, 1, 20, 18, 20, 25, 573, 'stc-master-a22.jpg'),
(54, 'Cooler Dark Fleet', 87, 30, 17, 1, 21, 18, 20, 25, 621, 'stc-master-a17.jpg'),
(57, 'Cooler Internet serfing', 91, 27, 19, 1, 23, 18, 24, 39, 263, 'delux-dlc-mv871.jpg'),
(58, 'Cooler Бизнес-профи', 92, 27, 16, 1, 23, 17, 24, 39, 299, 'delux-dlc-mv871.jpg'),
(59, 'Cooler Hybrid', 93, 28, 16, 1, 23, 18, 24, 26, 350, 'delux-dlc-mv871.jpg'),
(60, 'Cooler Magnum', 94, 28, 16, 1, 23, 17, 24, 26, 328, 'delux-dlc-mv871.jpg'),
(61, 'Cooler Evolution ARC', 95, 28, 16, 1, 23, 17, 24, 38, 354, 'delux-dlc-mv871.jpg'),
(62, 'Cooler Light', 96, 27, 19, 0, 22, 17, 23, 39, 211, 'delux-dlc-mv875.jpg'),
(63, 'Cooler Simple', 97, 27, 19, 1, 22, 18, 23, 39, 243, 'delux-dlc-mv875.jpg'),
(64, 'Cooler Unique', 89, 27, 19, 0, 22, 18, 23, 39, 228, 'delux-dlc-mv875.jpg'),
(65, 'Cooler Suprisum', 98, 27, 19, 1, 22, 17, 23, 39, 250, 'delux-dlc-mv875.jpg'),
(66, 'Cooler Aurum', 99, 27, 19, 1, 22, 17, 23, 39, 228, 'delux-dlc-mv875.jpg'),
(67, 'Cooler Adventure', 111, 27, 19, 0, 22, 18, 23, 39, 229, 'delux-dlc-mv875.jpg'),
(68, 'Cooler Soft', 101, 27, 19, 1, 22, 17, 23, 39, 229, 'delux-dlc-mv875.jpg'),
(69, 'Cooler Engine', 90, 27, 19, 0, 22, 18, 23, 39, 230, 'delux-dlc-mv875.jpg'),
(70, 'Cooler Future', 102, 27, 19, 0, 22, 17, 23, 39, 271, 'delux-dlc-mv875.jpg'),
(71, 'Cooler Global', 103, 27, 19, 1, 22, 18, 23, 39, 245, 'delux-dlc-mv875.jpg'),
(72, 'Cooler  Athlantis', 106, 28, 18, 1, 17, 18, 18, 29, 539, 'delux-dlc-mv850.jpg'),
(73, 'Cooler Premium', 104, 27, 18, 1, 17, 18, 18, 39, 353, 'delux-dlc-mv850.jpg'),
(74, 'Cooler Infinite', 105, 31, 19, 1, 17, 18, 18, 38, 587, 'delux-dlc-mv850.jpg'),
(75, 'Cooler Universum', 105, 28, 17, 1, 20, 18, 20, 35, 678, 'stc-master-a22.jpg'),
(76, 'Cooler Supra', 108, 31, 17, 1, 18, 18, 21, 34, 972, 'stc-a15.jpg'),
(77, 'Cooler Arbitra', 110, 28, 18, 1, 19, 18, 21, 28, 871, 'stc-magnum-x7.jpg'),
(78, 'Cooler Perfectum', 107, 28, 17, 1, 19, 18, 21, 28, 974, 'stc-magnum-x7.jpg'),
(79, 'Cooler View', 87, 31, 18, 1, 19, 18, 21, 41, 1252, 'stc-magnum-x7.jpg'),
(80, 'Cooler Berg', 69, 28, 18, 1, 19, 18, 21, 40, 1110, 'stc-magnum-x7.jpg'),
(81, 'Cooler Voyager', 66, 28, 17, 1, 21, 18, 20, 28, 583, 'stc-master-a17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tablet`
--

CREATE TABLE IF NOT EXISTS `tablet` (
  `id_tablet` int(11) NOT NULL AUTO_INCREMENT,
  `design` int(11) NOT NULL,
  `screen_size` int(11) NOT NULL,
  `operating_system` int(255) NOT NULL,
  `operating_system_version` int(255) NOT NULL,
  `cpu` int(11) NOT NULL,
  `graphics_accelerator` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `internal_memory` int(11) NOT NULL,
  `number_of_cores` int(11) NOT NULL,
  `case_material` int(11) NOT NULL,
  `battery_capacity` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `thickness` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`id_tablet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `thickness_tablet`
--

CREATE TABLE IF NOT EXISTS `thickness_tablet` (
  `id_thickness` int(11) NOT NULL AUTO_INCREMENT,
  `name_thickness` varchar(255) NOT NULL,
  PRIMARY KEY (`id_thickness`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `thickness_tablet`
--

INSERT INTO `thickness_tablet` (`id_thickness`, `name_thickness`) VALUES
(1, '444');

-- --------------------------------------------------------

--
-- Table structure for table `tv_tjunery`
--

CREATE TABLE IF NOT EXISTS `tv_tjunery` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image_big` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `cost` int(5) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='TV тюнеры' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tv_tjunery`
--

INSERT INTO `tv_tjunery` (`id`, `image_big`, `image_small`, `model`, `information`, `cost`, `date`) VALUES
(1, 'tv_tjunery/tv_1.jpg', 'tv_tjunery/small/tv_1.jpg', 'AverMedia AverTV Super 009', 'PCI, аналоговый, MPEG-1/2/4, H.264, PAL/SECAM/NTSC, FM, ДУ, телетекст, картинка в картинке', 55, '2012-10-28'),
(2, 'tv_tjunery/tv_2.jpg', 'tv_tjunery/small/tv_2.jpg', 'AverMedia AVerTV Volar Lite II', 'USB 2.0, аналоговый TV-Tuner + FM Radio, PAL/SECAM/NTSC, A2 Stereo/NICAM 728, ДУ, H.264', 81, '2012-10-28'),
(3, 'tv_tjunery/tv_3.jpg', 'tv_tjunery/small/tv_3.jpg', 'AverMedia AverTV 809', 'PCI, аналоговый, FM-радио + RDS, PAL/SECAM/NTSC, NICAM, 720х576, картинка в картинке, MPEG-1/2/4, Н.264, ДУ', 85, '2012-10-28'),
(4, 'tv_tjunery/tv_4.jpg', 'tv_tjunery/small/tv_4.jpg', 'AverMedia AVerLife Cinema', '720p, выходы: аудио стерео, видео композитный, видео компонентный, HDMI, FAT, NTFS, USB 2.0/MS/SD/SDHC/MMC, видео: MPG/AVI/RM/RMVB/MPEG1/2/4/\r\nXVID/DIVX/MP4/DAT/MOV/MJPEG/\r\nVOB, ДУ', 92, '2012-10-28'),
(5, 'tv_tjunery/tv_5.jpg', 'tv_tjunery/small/tv_5.jpg', 'AverMedia AverTV Hybrid AirExpress', 'Express Card/34mm, цифровой+аналоговый TV-Tuner, FM radio, DVB-T, HDTV 1080i/720p, звук A2 Stereo/NICAM 728, PAL/SECAM/NTSC, ДУ', 108, '2012-10-28'),
(6, 'tv_tjunery/tv_6.jpg', 'tv_tjunery/small/tv_6.jpg', 'Beholder TV Intro', 'TV, FM-stereo, УКВ, Teletext, RC', 118, '2012-10-28'),
(8, 'tv_tjunery/tv_7.jpg', 'tv_tjunery/small/tv_7.jpg', 'Compro M330F', 'PCI, аналоговый, MPEG-1/2/4, PAL/SECAM/NTSC, FM, ДУ, таймер записи, картинка в картинке,мультиэкран', 45, '2012-11-20'),
(9, 'tv_tjunery/tv_8.jpg', 'tv_tjunery/small/tv_8.jpg', 'INTEX', 'PCI, FM IT-7130FM ', 46, '2012-11-20'),
(10, 'tv_tjunery/tv_9.jpg', 'tv_tjunery/small/tv_9.jpg', 'INTEX Box LCD IT-191', 'Пульт ДУ,внешний, работает без компьютера, встр. колонки', 66, '2012-11-20'),
(11, 'tv_tjunery/tv_10.jpg', 'tv_tjunery/small/tv_10.jpg', 'Compro U830F', 'Внешний TV-тюнер, аналоговый, подключение к компьютеру через USB,встроенный FM-тюнер, пульт ДУ,MPEG-1/2/4, PAL/SECAM/NTSC', 69, '2012-11-20'),
(12, 'tv_tjunery/tv_11.jpg', 'tv_tjunery/small/tv_11.jpg', 'AverMedia DVD EZMaker 7', 'Аналоговый TV-тюнер,внешний, USB 2.0, NTSC, PAL, SECAM, MPEG-2, MPEG-4', 84, '2012-11-21'),
(13, 'tv_tjunery/tv_12.jpg', 'tv_tjunery/small/tv_12.jpg', 'AverMedia Life Cinema', '720p,блок питания: внешний,поддержка карт памяти: Secure Digital, Secure Digital HC, Memory Stick, MultiMedia Card, выходы: аудио стерео, видео композитный, видео компонентный, HDMI, FAT, NTFS, USB 2.0/MS/SD/SDHC/MMC, видео: MPG/AVI/RM/RMVB/MPEG1/2/4/ XVID/DIVX/MP4/DAT/MOV/MJPEG/ VOB,аудиофайлы: MP3, WMA, AAC, Ogg, WAV,графические файлы: JPEG, GIF, BMP, PNG, TIFF, ДУ', 93, '2012-11-21'),
(14, 'tv_tjunery/tv_13.jpg', 'tv_tjunery/small/tv_13.jpg', 'AverTV Hybrid AirExpress', 'Поддержка HD 720p, 1080i,ПДУ, кабель с ИК датчиком,PAL, SECAM, NTSC,MPEG1, MPEG2, FM антенна', 110, '2012-11-21'),
(15, 'tv_tjunery/tv_14.jpg', 'tv_tjunery/small/tv_14.jpg', 'AverMedia AverTV DVI Box 1080i', 'Аналоговый, DVI, 1920x1200x75, A2/NICAM, картинка в картинке, 3D Motion Adaptive De-Interlace,ДУ', 118, '2012-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `usb_pamjat`
--

CREATE TABLE IF NOT EXISTS `usb_pamjat` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cost` int(5) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='USB flesh память' AUTO_INCREMENT=32 ;

--
-- Dumping data for table `usb_pamjat`
--

INSERT INTO `usb_pamjat` (`id`, `title`, `image`, `cost`, `date`) VALUES
(1, '4GB Transcend JetFlash 500 TS4GJF500', 'usb_pamjat/fl_1.jpg', 8, '2012-10-28'),
(2, 'GB Transcend JetFlash V30 TS4GJFV30', 'usb_pamjat/fl_2.jpg', 9, '2012-10-28'),
(3, '8GB Transcend JetFlash 530 TS8GJF530', 'usb_pamjat/fl_3.jpg', 10, '2012-10-28'),
(4, '4GB Transcend JetFlash 600 TS4GJF600', 'usb_pamjat/fl_4.jpg', 12, '2012-10-28'),
(5, '8GB Transcend JetFlash T3 TS8GJFT3K', 'usb_pamjat/fl_5.jpg', 12, '2012-10-28'),
(6, '8GB Transcend JetFlash V90P TS8GJFV90P', 'usb_pamjat/fl_6.jpg', 16, '2012-10-28'),
(7, '16GB Transcend JetFlash 330 TS16GJF330', 'usb_pamjat/fl_7.jpg', 18, '2012-10-28'),
(8, '16GB Transcend JetFlash 200 TS16GJF200', 'usb_pamjat/fl_8.jpg', 32, '2012-10-28'),
(9, '32GB Transcend JetFlash 500 TS32GJF500', 'usb_pamjat/fl_9.jpg', 42, '2012-10-28'),
(16, '4GB Silicon Power Ultima II SP004GBUF2M01V1S ', 'usb_pamjat/fl_10.jpg', 12, '2012-11-30'),
(17, '4GB QUMO Sticker', 'usb_pamjat/fl_11.jpg', 12, '2012-11-30'),
(18, '4GB Apacer AH332', 'usb_pamjat/fl_12.jpg', 12, '2012-11-30'),
(19, '4GB Transcend JetFlash 300 TS4GJF300', 'usb_pamjat/fl_13.jpg', 12, '2012-11-30'),
(20, '8Gb Verbatim Micro Plus', 'usb_pamjat/fl_14.jpg', 14, '2012-11-30'),
(21, '8GB Silicon Power LuxMini 710 SP008GBUF2710V1K', 'usb_pamjat/fl_15.jpg', 15, '2012-11-30'),
(22, '8GB Smartbuy SB8GBSh-K', 'usb_pamjat/fl_16.jpg', 16, '2012-11-30'),
(23, '16Gb SanDisk CZ51 Cruzer Edge', 'usb_pamjat/fl_17.jpg', 16, '2012-11-30'),
(24, '8Gb Apacer AH326', 'usb_pamjat/fl_18.jpg', 16, '2012-11-30'),
(25, '16Gb Kingston 100 G2', 'usb_pamjat/fl_19.jpg', 17, '2012-11-30'),
(26, '16GB Silicon Power Helios 101 SP016GBUF2101V1B', 'usb_pamjat/fl_20.jpg', 18, '2012-11-30'),
(27, '8GB QUMO LEX', 'usb_pamjat/fl_21.jpg', 20, '2012-11-30'),
(28, '32GB Kingston SE9', 'usb_pamjat/fl_22.jpg', 27, '2012-11-30'),
(29, '32GB QUMO Slider 01', 'usb_pamjat/fl_23.jpg', 30, '2012-11-30'),
(30, '16GB Transcend JetFlash 220 TS16GJF220', 'usb_pamjat/fl_24.jpg', 37, '2012-11-30'),
(31, '64GB Transcend JetFlash 530 TS64GJF530', 'usb_pamjat/fl_25.jpg', 72, '2012-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE IF NOT EXISTS `userlist` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Пользователи админки' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`id`, `user`, `pass`) VALUES
(1, 'varetis', '3db9173430c24feed0cd25602ad4f0b4');

-- --------------------------------------------------------

--
-- Table structure for table `veb_kamera`
--

CREATE TABLE IF NOT EXISTS `veb_kamera` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image_big` varchar(255) NOT NULL,
  `image_small` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `information` text NOT NULL,
  `cost` int(5) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Веб-камеры' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `veb_kamera`
--

INSERT INTO `veb_kamera` (`id`, `image_big`, `image_small`, `model`, `information`, `cost`, `date`) VALUES
(1, 'veb-kamera/1.jpg', 'veb-kamera/small/1.jpg', 'Sven CU-1.2', 'изображения до 1,3 Мп,<br>видео 640x480x20', 24, '2012-10-28'),
(2, 'veb-kamera/2.jpg', 'veb-kamera/small/2.jpg', 'Sven CU-2.1', 'изображения до 2,0 Мп,<br>видео 640x480x20', 18, '2012-10-28'),
(3, 'veb-kamera/3.jpg', 'veb-kamera/small/3.jpg', 'Sven CU-3.1', 'изображения до 2,0 Мп,<br>видео 640x480x20', 32, '2012-10-28'),
(4, 'veb-kamera/4.jpg', 'veb-kamera/small/4.jpg', 'Qumo WCQ-112', 'изображения до 5 Мп,<br>видео 640x480x30', 33, '2012-10-28'),
(5, 'veb-kamera/5.jpg', 'veb-kamera/small/5.jpg', 'Qumo WCQ-110', 'изображения до 5 Мп,<br>видео 640x480x30', 20, '2012-10-28'),
(6, 'veb-kamera/6.jpg', 'veb-kamera/small/6.jpg', 'Genius FaceCam 311', 'видео 640x480x30', 22, '2012-10-28'),
(7, 'veb-kamera/7.jpg', 'veb-kamera/small/7.jpg', 'Genius FaceCam 315', 'видео 640x480x30', 23, '2012-10-28'),
(8, 'veb-kamera/8.jpg', 'veb-kamera/small/8.jpg', 'Qumo WCQ-108', 'изображения до 5 Мп,<br>видео 640x480x30', 24, '2012-10-28'),
(9, 'veb-kamera/9.jpg', 'veb-kamera/small/9.jpg', 'Genius eFace 1300', 'изображения до 1,3 Мп,<br>видео 640x480x30', 33, '2012-10-28'),
(10, 'veb-kamera/10.jpg', 'veb-kamera/small/10.jpg', 'Genius iSlim 1320', 'изображения до 1,3 Мп,<br>видео 1280x1024x15', 36, '2012-10-28'),
(11, 'veb-kamera/11.jpg', 'veb-kamera/small/11.jpg', 'D-Link DCS-930L', '802.11n, видео 640x480x20', 73, '2012-10-28'),
(12, 'veb-kamera/12.jpg', 'veb-kamera/small/12.jpg', 'Logitech HD WebCam C615 Full HD', 'изображения 8 Мп,<br>видео 1920x1080', 90, '2012-10-28'),
(14, 'veb-kamera/13.jpg', 'veb-kamera/small/13.jpg', 'Defender C-090', 'Black, 0.3 Мп, универ. крепление ', 17, '2012-11-26'),
(16, 'veb-kamera/14.jpg', 'veb-kamera/small/14.jpg', 'Ritmix RVC-005M', 'USB2.0, микрофон,\r\n<br> подставка,0,3MP', 24, '2012-11-26'),
(17, 'veb-kamera/15.jpg', 'veb-kamera/small/15.jpg', 'Genius iLook 300', 'USB 1.1,0.3 мпикс.,CMOS,\r\n<br>видео 640x480,30 Гц,\r\n<br>крепление на мониторе', 27, '2012-11-26'),
(18, 'veb-kamera/16.jpg', 'veb-kamera/small/16.jpg', 'Genius FaceCam 300', 'USB 1.1,0.3 мпикс.,CMOS,<br>видео 640x480,30 Гц,<br>крепление на мониторе', 25, '2012-11-26'),
(19, ' veb-kamera/17.jpg', ' veb-kamera/small/17.jpg', 'CANYON  CNF-WCAM01B ', '1.3Мпикс,CMOS,8МПикс.,USB 2.0\r\n<br>цвет чёрный', 27, '2012-11-26'),
(20, 'veb-kamera/18.jpg', 'veb-kamera/small/18.jpg', 'Neodrive Super Dog', '350K(аппаратно),2 мП (интерполяция),<br>тип матрицы 1/6" CMOS', 29, '2012-11-26'),
(21, 'veb-kamera/19.jpg', 'veb-kamera/small/19.jpg', 'CANYON  CNR-WCAM420HD', '2 млн пикс., 1600x1200, встроенный микрофон,<br> крепление на мониторе,<br>\r\nчёрный, USB', 33, '2012-11-26'),
(22, 'veb-kamera/20.jpg', 'veb-kamera/small/20.jpg', ' Dialog WC-17U', '1.3M, HD, встр. микрофон,USB 2.0,<br> белая', 33, '2012-11-26'),
(25, 'veb-kamera/23.jpg', 'veb-kamera/small/23.jpg', 'Genius FaceCam 1020', 'USB 2.0,1.3 мпикс., CMOS,видео 1280x1024,30 Гц, крепление на мониторе,микрофон', 49, '2012-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `vga`
--

CREATE TABLE IF NOT EXISTS `vga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vga` varchar(255) NOT NULL,
  `size_vga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `vga`
--

INSERT INTO `vga` (`id`, `name_vga`, `size_vga`) VALUES
(25, 'GeForce GTX 650', 1),
(26, 'GeForce GT 620', 2),
(27, 'GeForce GT 640', 2),
(28, 'GeForce GTX 650', 2),
(29, 'GeForce GTX 650Ti', 1),
(30, 'GeForce GTX 660', 1),
(31, 'GeForce GTX 660Ti', 2),
(32, 'GeForce GT 640', 1),
(33, 'GeForce GTX 550Ti', 1),
(34, 'GeForce GTX 670', 2),
(35, 'GeForce GTX 650Ti', 2),
(36, 'GigaByte GV-N66TOC', 3),
(37, 'GeForce GTX 680', 2),
(38, 'GeForce GT 630', 1),
(39, 'Встроенная', 0),
(40, 'GeForce GTX670 JetStream', 2),
(41, 'GeForce GTX680 JetStream', 4),
(42, 'GigaByte GV-N66TWF3-3GD 3GB GDDR5', 3),
(43, 'GigaByte GV-N66TWF3-3GD', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vga_system_block`
--

CREATE TABLE IF NOT EXISTS `vga_system_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vga` int(11) DEFAULT NULL,
  `id_system_block` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=153 ;

--
-- Dumping data for table `vga_system_block`
--

INSERT INTO `vga_system_block` (`id`, `id_vga`, `id_system_block`) VALUES
(49, 17, 5),
(50, 18, 5),
(51, 19, 6),
(52, 20, 6),
(53, 21, 6),
(54, 22, 6),
(55, 23, 6),
(56, 19, 6),
(57, 21, 7),
(58, 23, 8),
(59, 22, 9),
(60, 18, 10),
(61, 18, 10),
(62, 18, 10),
(63, 20, 11),
(64, 20, 11),
(65, 18, 12),
(66, 18, 12),
(67, 24, 13),
(68, 25, 14),
(69, 26, 15),
(70, 27, 15),
(71, 28, 16),
(72, 25, 17),
(73, 26, 13),
(74, 25, 18),
(75, 28, 19),
(76, 27, 20),
(77, 25, 21),
(78, 25, 22),
(79, 25, 23),
(80, 25, 24),
(81, 25, 25),
(82, 29, 26),
(83, 25, 27),
(84, 27, 28),
(85, 25, 29),
(86, 28, 30),
(87, 29, 32),
(88, 28, 33),
(89, 30, 34),
(90, 28, 35),
(91, 28, 35),
(92, 31, 36),
(93, 31, 37),
(94, 32, 39),
(95, 25, 40),
(96, 25, 41),
(97, 28, 42),
(98, 33, 43),
(99, 28, 44),
(100, 34, 45),
(101, 34, 46),
(102, 34, 47),
(103, 33, 48),
(104, 29, 49),
(105, 35, 50),
(106, 36, 51),
(107, 37, 52),
(108, 25, 53),
(109, 25, 54),
(110, 26, 59),
(111, 26, 60),
(112, 38, 61),
(113, 39, 62),
(114, 39, 55),
(115, 39, 58),
(116, 39, 57),
(117, 39, 62),
(118, 39, 63),
(119, 39, 64),
(120, 39, 65),
(121, 39, 66),
(122, 39, 67),
(123, 39, 68),
(124, 39, 69),
(125, 39, 70),
(126, 39, 71),
(127, 39, 72),
(128, 29, 72),
(129, 39, 73),
(130, 40, 74),
(131, 35, 75),
(132, 35, 75),
(133, 40, 76),
(134, 39, 76),
(135, 28, 77),
(136, 28, 78),
(137, 34, 79),
(138, 31, 80),
(139, 28, 81),
(140, 41, 0),
(141, 38, 74),
(142, 34, 76),
(143, 40, 0),
(144, 41, 0),
(145, 41, 74),
(146, 41, 76),
(147, 42, 0),
(148, 42, 74),
(149, 42, 76),
(150, 43, 0),
(151, 43, 74),
(152, 43, 76);

-- --------------------------------------------------------

--
-- Table structure for table `weight_tablet`
--

CREATE TABLE IF NOT EXISTS `weight_tablet` (
  `id_weight` int(11) NOT NULL AUTO_INCREMENT,
  `name_weight` varchar(255) NOT NULL,
  PRIMARY KEY (`id_weight`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `weight_tablet`
--

INSERT INTO `weight_tablet` (`id_weight`, `name_weight`) VALUES
(3, '5552143214');

-- --------------------------------------------------------

--
-- Table structure for table `width_tablet`
--

CREATE TABLE IF NOT EXISTS `width_tablet` (
  `id_width` int(11) NOT NULL AUTO_INCREMENT,
  `name_width` varchar(255) NOT NULL,
  PRIMARY KEY (`id_width`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `width_tablet`
--

INSERT INTO `width_tablet` (`id_width`, `name_width`) VALUES
(3, '444');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
