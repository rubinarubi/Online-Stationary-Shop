-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 10:10 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stationary_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `product_id` int(4) unsigned zerofill NOT NULL,
  `qty` int(4) NOT NULL DEFAULT '0',
  `cust_id` int(4) unsigned zerofill NOT NULL,
  `checkout` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'n',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checkedon` date NOT NULL,
  `trans` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `qty`, `cust_id`, `checkout`, `added`, `checkedon`, `trans`) VALUES
(0001, 0001, 1, 0002, 'y', '2014-03-27 07:44:55', '2014-03-27', 16444),
(0002, 0196, 1, 0002, 'y', '2018-03-01 02:09:55', '2018-04-19', 23851),
(0003, 0327, 10, 0002, 'y', '2018-04-19 02:17:13', '2018-04-19', 23851),
(0004, 0334, 10, 0002, 'y', '2018-04-19 02:27:27', '2018-04-19', 18169),
(0005, 0327, 10, 0002, 'y', '2018-04-19 02:32:02', '2018-04-19', 847),
(0006, 0327, 10, 0002, 'y', '2018-04-19 02:36:21', '2018-04-19', 698),
(0009, 0001, 1, 0003, 'y', '2018-04-19 03:02:30', '2018-04-20', 0),
(0010, 0334, 2, 0003, 'y', '2018-04-20 02:55:41', '2018-04-20', 0),
(0011, 0334, 1, 0003, 'y', '2018-04-20 02:57:33', '2018-04-20', 0),
(0012, 0334, 1, 0003, 'y', '2018-04-20 02:59:22', '2018-04-20', 10220),
(0023, 0002, 2, 0003, 'y', '2018-04-23 06:15:36', '2018-04-24', 9318),
(0014, 0327, 1, 0003, 'y', '2018-04-20 03:07:46', '2018-04-24', 9318),
(0015, 0003, 1, 0003, 'y', '2018-04-20 03:08:27', '2018-04-24', 9318),
(0016, 0002, 1, 0002, 'y', '2018-04-22 16:14:11', '2018-04-22', 32050),
(0017, 0000, 2, 0000, 'n', '2018-04-23 04:51:51', '0000-00-00', 27077),
(0018, 0002, 1, 0002, 'y', '2018-04-23 05:28:38', '2018-04-22', 13030),
(0019, 0334, 1, 0002, 'y', '2018-04-23 05:35:08', '2018-04-22', 21309),
(0020, 0001, 2, 0002, 'y', '2018-04-23 05:38:31', '2018-04-22', 21309),
(0021, 0334, 1, 0007, 'y', '2018-04-23 05:47:55', '2018-04-22', 22807),
(0022, 0001, 2, 0007, 'n', '2018-04-23 05:49:26', '0000-00-00', 30445),
(0024, 0327, 2, 0001, 'n', '2018-04-25 03:08:16', '0000-00-00', 9409),
(0025, 0327, 2, 0003, 'y', '2018-04-25 04:19:17', '2018-04-24', 13776),
(0026, 0335, 2, 0003, 'y', '2018-04-25 04:19:52', '2018-04-24', 13776),
(0027, 0336, 2, 0003, 'y', '2018-04-25 04:20:29', '2018-04-24', 13776),
(0028, 0337, 2, 0003, 'y', '2018-04-25 04:20:53', '2018-04-24', 13776),
(0029, 0338, 2, 0003, 'y', '2018-04-25 04:23:14', '2018-04-24', 13776),
(0030, 0339, 2, 0003, 'y', '2018-04-25 04:23:57', '2018-04-24', 13776),
(0031, 0002, 2, 0003, 'y', '2018-04-25 04:24:25', '2018-04-24', 13776),
(0032, 0340, 2, 0003, 'y', '2018-04-25 04:25:26', '2018-04-24', 13776),
(0033, 0341, 2, 0003, 'y', '2018-04-25 04:26:00', '2018-04-24', 13776),
(0034, 0342, 2, 0003, 'y', '2018-04-25 04:26:34', '2018-04-24', 13776),
(0035, 0343, 2, 0003, 'y', '2018-04-25 04:27:07', '2018-04-24', 13776),
(0036, 0344, 2, 0003, 'y', '2018-04-25 04:27:52', '2018-04-24', 13776),
(0037, 0003, 2, 0003, 'y', '2018-04-25 04:28:35', '2018-04-24', 13776),
(0038, 0345, 2, 0003, 'y', '2018-04-25 04:29:11', '2018-04-24', 13776),
(0039, 0346, 2, 0003, 'y', '2018-04-25 04:29:39', '2018-04-24', 13776),
(0040, 0327, 2, 0003, 'y', '2018-04-25 05:01:22', '2018-04-24', 1979);

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE IF NOT EXISTS `main_menu` (
  `mmenu_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `mmenu_name` varchar(200) NOT NULL,
  `mmenu_link` varchar(200) NOT NULL,
  PRIMARY KEY (`mmenu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`mmenu_id`, `mmenu_name`, `mmenu_link`) VALUES
(0001, 'About Us', 'about.php'),
(0002, 'Contact Us', 'contact.php'),
(0003, 'NoteBooks & Writting', 'javascript:void(0)'),
(0004, 'Desk Accessories', 'javascript:void(0)'),
(0005, 'Pen Collection', 'javascript:void(0)');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `prodname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `path` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT 'images/nophoto.gif',
  `category` int(33) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descr` text COLLATE latin1_general_ci NOT NULL,
  `type` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT 'latest',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci PACK_KEYS=0 AUTO_INCREMENT=347 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prodname`, `path`, `category`, `price`, `descr`, `type`) VALUES
(0335, 'Notebooks&amp;Writing/ListPads', 'Notebooks&amp;Writing/ListPads/1.jpg	', 9, 20.00, 'List pads ', 'latest'),
(0002, 'DeskAccessories/StickyNotes', 'DeskAccessories/StickyNotes/2.jpg', 19, 500.00, 'This is a very nice thing for the daily use.', 'latest'),
(0003, 'PenCollection/BrushPens', 'PenCollection/BrushPens/1.jpg', 39, 100.00, 'PenCollection BrushPens', 'latest'),
(0327, 'Notebooks&Writing/NoteBooks', 'Notebooks&Writing/NoteBooks/2.jpg', 8, 110.00, 'test case', 'latest'),
(0334, 'Notebooks&Writing/NoteBooks', 'Notebooks&Writing/NoteBooks/3.jpg', 8, 3883.00, 'hgrdew', 'featured'),
(0336, 'Notebooks&amp;Writing/Writing_', 'Notebooks&amp;Writing/Writing_Sets/2.jpg', 10, 34.00, 'Writing Sets', 'latest'),
(0337, 'Notebooks&amp;Writing/Paper&am', 'Notebooks&amp;Writing/Paper&amp;Envelopes/1.jpg', 11, 26.00, 'Envelopes', 'latest'),
(0338, 'DeskAccessories/PencilCases', 'DeskAccessories/PencilCases/1.jpg', 17, 28.00, 'Pen cases ', 'latest'),
(0339, 'DeskAccessories/Penpots', 'DeskAccessories/Penpots/1.jpg', 18, 200.00, '150 items', 'latest'),
(0340, 'DeskAccessories/Sharpners', 'DeskAccessories/Sharpners/1.jpg', 21, 13.00, '500 items', 'latest'),
(0341, 'PenCollection/pen', 'PenCollection/pen/1.jpg', 1, 50.00, '200 items', 'latest'),
(0342, 'PenCollection/Pencils', 'PenCollection/Pencils/1.jpg', 2, 30.00, '500 items', 'latest'),
(0343, 'PenCollection/Novelty pens', 'PenCollection/Novelty pens/1.jpg', 3, 60.00, '200 items are available', 'latest'),
(0344, 'PenCollection/PenRefils', 'PenCollection/PenRefils/1.jpg', 4, 55.00, '300 items', 'latest'),
(0345, 'PenCollection/BallpointPens', 'PenCollection/BallpointPens/1.jpg', 35, 15.00, '200 items', 'latest'),
(0346, 'PenCollection/Markerpens', 'PenCollection/Markerpens/1.jpg', 38, 65.00, '120 items', 'latest');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE IF NOT EXISTS `sub_menu` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `mmenu_id` int(4) NOT NULL DEFAULT '375',
  `smenu_name` varchar(200) NOT NULL,
  `smenu_link` varchar(200) NOT NULL DEFAULT 'viewproduct.php',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `mmenu_id`, `smenu_name`, `smenu_link`) VALUES
(0001, 5, 'Pen', 'viewproduct.php'),
(0002, 5, 'pencils ', 'viewproduct.php'),
(0003, 5, 'Novelty Pens', 'viewproduct.php'),
(0004, 5, 'Pen Refills', 'viewproduct.php'),
(0008, 3, 'Note Books', 'viewproduct.php'),
(0009, 3, 'List Pads', 'viewproduct.php'),
(0010, 3, 'Writing Sets', 'viewproduct.php'),
(0011, 3, 'paper & Envelops', 'viewproduct.php'),
(0017, 4, 'Pencil Cases', 'viewproduct.php'),
(0018, 4, 'Pen Pots', 'viewproduct.php'),
(0019, 4, 'Sticky Notes', 'viewproduct.php'),
(0020, 4, 'Erasers ', 'viewproduct.php'),
(0021, 4, 'Sharpeners', 'viewproduct.php'),
(0039, 5, 'Brush Pens', 'viewproduct.php'),
(0035, 5, 'Ballpoint Pens', 'viewproduct.php'),
(0038, 5, 'Marker Pens', 'viewproduct.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `tel` int(8) NOT NULL,
  `ac_type` varchar(30) DEFAULT 'user',
  `user_status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `username`, `password`, `email`, `address`, `tel`, `ac_type`, `user_status`) VALUES
(0001, 'Admin', 'admin', 'admin', '11111', 'admin1@gmail.com', 'Sylhet', 54954491, 'Administrator', 0),
(0002, 'shimu', 'shamima', 'shimu', '12345', 'shamimaneub07@gmail.com', 'Sylhet', 1754954491, 'user', 1),
(0003, 'rr', 'rr', 's', 'rrrrr', 'a@gmail.com', 'utuy', 1787654321, 'user', 1),
(0005, 'w', 'w', 'w', 'wwwww', 'ww@gmail.com', 'sgrtuhyj', 53628145, 'user', 1),
(0006, 'ss', 'ss', 'ss', '12345', 'ss@gmail.com', 'ss', 1625648340, 'user', 1),
(0007, 'Aaa', 'a', 'aa', 'aaaaa', 'aaaaa@yahoo.com', 'swedgbwe', 1736985421, 'user', 1),
(0008, 'abc', 'abbb', 'ab', '22222', 'abc@g0.com', 'sereerg', 1625648340, 'user', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
