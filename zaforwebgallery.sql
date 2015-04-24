-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2015 at 11:42 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zaforwebgallery`
--
CREATE DATABASE IF NOT EXISTS `zaforwebgallery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zaforwebgallery`;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_albums`
--

CREATE TABLE IF NOT EXISTS `gallery_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `default_name` varchar(255) NOT NULL,
  `album_type` varchar(20) NOT NULL,
  `path` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `tags` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `gallery_albums`
--

INSERT INTO `gallery_albums` (`id`, `title`, `default_name`, `album_type`, `path`, `user_id`, `event_id`, `model`, `model_id`, `tags`, `status`, `created`, `modified`) VALUES
(2, 'Sum''s Painting 1', '', 'Painting', '', 0, 3, 'sumon', 3, '', 'published', '2015-03-11 19:15:37', '2015-04-20 00:05:06'),
(4, 'Sum''s Sculpture 1', '', 'Sculpture', '', 0, 3, 'sumon', 3, '', 'published', '2015-03-11 21:15:19', '2015-04-20 16:01:50'),
(99, 'Zaf''s Sculpture 1', '', 'Sculpture', '', 0, 2, 'zafor', 1, 'sc', 'published', '2015-03-11 23:23:39', '2015-04-24 03:55:09'),
(100, 'Zaf''s Painting (Kids)', '', 'Painting', '', 0, 2, 'zafor', 1, 'kids paintings', 'published', '2015-03-11 23:26:16', '2015-04-24 03:41:40'),
(101, 'Album Zafor - 661', '', 'Painting', '', 0, 0, 'zafor', 1, 'nature, jelly, fish, flower', 'draft', '2015-03-13 00:08:33', '2015-04-24 03:49:27'),
(102, 'Album Hazera - 340', '', 'Painting', '', 0, 0, 'hazera', 5, '', 'draft', '2015-04-17 20:29:44', '2015-04-17 20:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_events`
--

CREATE TABLE IF NOT EXISTS `gallery_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `event_start_date` datetime NOT NULL,
  `event_end_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gallery_events`
--

INSERT INTO `gallery_events` (`id`, `title`, `location`, `event_start_date`, `event_end_date`, `user_id`, `created`, `modified`) VALUES
(1, 'Event 1', 'Online', '2015-05-13 12:00:00', '2015-05-14 12:00:00', 1, '2015-03-11 22:12:08', '2015-04-20 10:58:07'),
(2, 'Event 2', 'Online', '2015-05-17 11:45:00', '2015-05-17 22:00:00', 3, '2015-03-12 19:49:44', '2015-03-12 22:38:10'),
(3, 'Event 3', 'Online', '2015-05-20 09:30:00', '2015-05-20 00:00:00', 1, '2015-03-12 19:50:00', '2015-04-20 10:58:32'),
(4, 'Event 4', 'Online', '2015-06-20 11:00:00', '2015-06-20 23:59:00', 1, '2015-04-20 11:00:37', '2015-04-20 11:00:37'),
(5, 'Event 5', 'Online', '2015-05-08 00:00:00', '2015-05-08 23:59:00', 5, '2015-04-20 11:03:22', '2015-04-20 11:13:39'),
(6, 'Event 6', 'Online', '2015-06-14 00:00:00', '2015-06-14 23:59:00', 5, '2015-04-20 11:12:36', '2015-04-20 11:12:36'),
(7, 'Event 7', 'Online', '2015-07-20 11:00:00', '2015-07-20 23:59:00', 3, '2015-04-20 11:16:34', '2015-04-20 11:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_pictures`
--

CREATE TABLE IF NOT EXISTS `gallery_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `original_name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `year` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `for_sale` varchar(20) NOT NULL DEFAULT 'Not for sale',
  `path` varchar(255) NOT NULL,
  `size` bigint(20) NOT NULL,
  `album_id` int(11) NOT NULL,
  `main_id` int(11) DEFAULT NULL,
  `style` varchar(255) NOT NULL DEFAULT 'full',
  `order` int(11) NOT NULL DEFAULT '9999999',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`album_id`),
  KEY `main_id` (`main_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=199 ;

--
-- Dumping data for table `gallery_pictures`
--

INSERT INTO `gallery_pictures` (`id`, `name`, `original_name`, `type`, `year`, `price`, `for_sale`, `path`, `size`, `album_id`, `main_id`, `style`, `order`, `created`, `modified`) VALUES
(37, 'White Rose.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\4\\EFa5AsAAFIAAA2ABD4AAH.jpg', 145741, 4, NULL, 'full', 9999999, '2015-03-11 21:15:46', '2015-03-11 21:15:46'),
(38, 'small-White Rose.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\4\\small-EFa5AsAAFIAAA2ABD4AAH.jpg', 1791, 4, 37, 'small', 9999999, '2015-03-11 21:15:46', '2015-03-11 21:15:46'),
(39, 'medium-White Rose.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\4\\medium-EFa5AsAAFIAAA2ABD4AAH.jpg', 9075, 4, 37, 'medium', 9999999, '2015-03-11 21:15:46', '2015-03-11 21:15:46'),
(40, 'large-White Rose.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\4\\large-EFa5AsAAFIAAA2ABD4AAH.jpg', 51048, 4, 37, 'large', 9999999, '2015-03-11 21:15:47', '2015-03-11 21:15:47'),
(41, 'Women.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\4\\HUJAAAAAAAAIAAFuAEAAFAAF.jpg', 41878, 4, NULL, 'full', 9999999, '2015-03-11 21:15:48', '2015-03-11 21:15:48'),
(42, 'small-Women.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\4\\small-HUJAAAAAAAAIAAFuAEAAFAAF.jpg', 1252, 4, 41, 'small', 9999999, '2015-03-11 21:15:48', '2015-03-11 21:15:48'),
(43, 'medium-Women.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\4\\medium-HUJAAAAAAAAIAAFuAEAAFAAF.jpg', 4199, 4, 41, 'medium', 9999999, '2015-03-11 21:15:48', '2015-03-11 21:15:48'),
(44, 'large-Women.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\4\\large-HUJAAAAAAAAIAAFuAEAAFAAF.jpg', 14612, 4, 41, 'large', 9999999, '2015-03-11 21:15:48', '2015-03-11 21:15:48'),
(69, 'Big Palm.jpg', '', '', '2035-01-01 00:00:00', '1000.00', 'For sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\99\\ZAAdGAA6AFAAJGAHAAAJAAAn.jpg', 173159, 99, NULL, 'full', 1, '2015-03-12 00:08:13', '2015-04-17 02:41:19'),
(70, 'small-Big Palm.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\99\\small-ZAAdGAA6AFAAJGAHAAAJAAAn.jpg', 1682, 99, 69, 'small', 9999999, '2015-03-12 00:08:13', '2015-03-12 00:08:13'),
(71, 'medium-Big Palm.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\99\\medium-ZAAdGAA6AFAAJGAHAAAJAAAn.jpg', 9278, 99, 69, 'medium', 9999999, '2015-03-12 00:08:13', '2015-03-12 00:08:13'),
(72, 'large-Big Palm.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\99\\large-ZAAdGAA6AFAAJGAHAAAJAAAn.jpg', 52667, 99, 69, 'large', 9999999, '2015-03-12 00:08:13', '2015-03-12 00:08:13'),
(77, 'Mordern River Side.jpg', '', '', '2035-01-01 00:00:00', '500.00', 'For sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\99\\hAzAFAdBAiDHAAbAADEA.jpg', 186876, 99, NULL, 'full', 2, '2015-03-12 00:08:17', '2015-04-17 02:41:54'),
(78, 'small-Mordern River Side.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\99\\small-hAzAFAdBAiDHAAbAADEA.jpg', 1844, 99, 77, 'small', 9999999, '2015-03-12 00:08:18', '2015-03-12 00:08:18'),
(79, 'medium-Mordern River Side.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\99\\medium-hAzAFAdBAiDHAAbAADEA.jpg', 12006, 99, 77, 'medium', 9999999, '2015-03-12 00:08:18', '2015-03-12 00:08:18'),
(80, 'large-Mordern River Side.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\99\\large-hAzAFAdBAiDHAAbAADEA.jpg', 66601, 99, 77, 'large', 9999999, '2015-03-12 00:08:18', '2015-03-12 00:08:18'),
(85, 'My little princes.jpg', '', '', '0000-00-00 00:00:00', '100.00', 'For sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\BAGIDCIA0BAAfADDCzDAAA.jpg', 240048, 100, NULL, 'full', 2, '2015-03-12 00:13:53', '2015-04-17 02:44:18'),
(86, 'small-My little princes.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\small-BAGIDCIA0BAAfADDCzDAAA.jpg', 2004, 100, 85, 'small', 9999999, '2015-03-12 00:13:54', '2015-03-12 00:13:54'),
(87, 'medium-My little princes.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\medium-BAGIDCIA0BAAfADDCzDAAA.jpg', 12597, 100, 85, 'medium', 9999999, '2015-03-12 00:13:54', '2015-03-12 00:13:54'),
(88, 'large-My little princes.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\large-BAGIDCIA0BAAfADDCzDAAA.jpg', 66820, 100, 85, 'large', 9999999, '2015-03-12 00:13:55', '2015-03-12 00:13:55'),
(93, 'Suzy''s first painting.jpg', '', '', '0000-00-00 00:00:00', '10000.00', 'For sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\AADAEAPAAAIAAFQHAAAAUAAAA.jpg', 190960, 100, NULL, 'full', 1, '2015-03-12 00:13:59', '2015-04-24 03:43:16'),
(94, 'small-Suzy''s first painting.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\small-AADAEAPAAAIAAFQHAAAAUAAAA.jpg', 2305, 100, 93, 'small', 9999999, '2015-03-12 00:14:00', '2015-03-12 00:14:00'),
(95, 'medium-Suzy''s first painting.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\medium-AADAEAPAAAIAAFQHAAAAUAAAA.jpg', 17675, 100, 93, 'medium', 9999999, '2015-03-12 00:14:00', '2015-03-12 00:14:00'),
(96, 'large-Suzy''s first painting.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\large-AADAEAPAAAIAAFQHAAAAUAAAA.jpg', 80153, 100, 93, 'large', 9999999, '2015-03-12 00:14:01', '2015-03-12 00:14:01'),
(97, 'Little Blue Bird.JPG', '', '', '0000-00-00 00:00:00', '5000.00', 'For sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\dAIHLAAcAGAABAIAmAAAAA.JPG', 179069, 100, NULL, 'full', 3, '2015-03-12 00:14:02', '2015-04-17 02:44:32'),
(98, 'small-Little Blue Bird.JPG', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\small-dAIHLAAcAGAABAIAmAAAAA.JPG', 2235, 100, 97, 'small', 9999999, '2015-03-12 00:14:03', '2015-03-12 00:14:03'),
(99, 'medium-Little Blue Bird.JPG', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\medium-dAIHLAAcAGAABAIAmAAAAA.JPG', 14283, 100, 97, 'medium', 9999999, '2015-03-12 00:14:03', '2015-03-12 00:14:03'),
(100, 'large-Little Blue Bird.JPG', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\100\\large-dAIHLAAcAGAABAIAmAAAAA.JPG', 65270, 100, 97, 'large', 9999999, '2015-03-12 00:14:03', '2015-03-12 00:14:03'),
(113, '', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-16 21:38:23', '2015-04-16 21:38:23'),
(114, '', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 00:53:45', '2015-04-17 00:53:45'),
(115, '', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 01:02:26', '2015-04-17 01:02:26'),
(116, '', '', '', '0000-00-00 00:00:00', '0.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 01:05:43', '2015-04-17 01:05:43'),
(117, '', '', '', '0000-00-00 00:00:00', '1000.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 02:15:57', '2015-04-17 02:15:57'),
(118, '', '', '', '0000-00-00 00:00:00', '0.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 02:16:40', '2015-04-17 02:16:40'),
(119, '', '', '', '0000-00-00 00:00:00', '1000.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 02:19:05', '2015-04-17 02:19:05'),
(120, '', '', '', '0000-00-00 00:00:00', '1000.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 02:19:51', '2015-04-17 02:19:51'),
(121, '', '', '', '0000-00-00 00:00:00', '0.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 02:20:20', '2015-04-17 02:20:20'),
(122, '', '', '', '0000-00-00 00:00:00', '0.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 02:21:18', '2015-04-17 02:21:18'),
(123, '', '', '', '0000-00-00 00:00:00', '0.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 02:22:06', '2015-04-17 02:22:06'),
(124, '', '', '', '0000-00-00 00:00:00', '1000.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 02:29:47', '2015-04-17 02:29:47'),
(125, '', '', '', '0000-00-00 00:00:00', '1000.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 02:31:52', '2015-04-17 02:31:52'),
(126, '', '', '', '0000-00-00 00:00:00', '1000.00', 'For sale', '', 0, 0, NULL, 'full', 9999999, '2015-04-17 02:34:29', '2015-04-17 02:34:29'),
(131, 'Desert.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\101\\AAJAAjABABACIAAAAABsAADDR.jpg', 252306, 101, NULL, 'full', 1, '2015-04-20 00:21:38', '2015-04-20 00:21:37'),
(132, 'small-Desert.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\101\\small-AAJAAjABABACIAAAAABsAADDR.jpg', 1569, 101, 131, 'small', 9999999, '2015-04-20 00:21:38', '2015-04-20 00:21:38'),
(133, 'medium-Desert.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\101\\medium-AAJAAjABABACIAAAAABsAADDR.jpg', 11157, 101, 131, 'medium', 9999999, '2015-04-20 00:21:38', '2015-04-20 00:21:38'),
(134, 'large-Desert.jpg', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\101\\large-AAJAAjABABACIAAAAABsAADDR.jpg', 80377, 101, 131, 'large', 9999999, '2015-04-20 00:21:38', '2015-04-20 00:21:38'),
(187, 'xmas14.gif', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\2\\AAAGGAeAAuEAAAAxA4AAJAAAF.gif', 411107, 2, NULL, 'full', 9999999, '2015-04-22 18:54:10', '2015-04-22 18:54:10'),
(188, 'small-xmas14.gif', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\2\\small-AAAGGAeAAuEAAAAxA4AAJAAAF.gif', 2473, 2, 187, 'small', 9999999, '2015-04-22 18:54:10', '2015-04-22 18:54:10'),
(189, 'medium-xmas14.gif', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\2\\medium-AAAGGAeAAuEAAAAxA4AAJAAAF.gif', 16411, 2, 187, 'medium', 9999999, '2015-04-22 18:54:10', '2015-04-22 18:54:10'),
(190, 'large-xmas14.gif', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\2\\large-AAAGGAeAAuEAAAAxA4AAJAAAF.gif', 121122, 2, 187, 'large', 9999999, '2015-04-22 18:54:10', '2015-04-22 18:54:10'),
(191, 'xmas20.gif', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\2\\AAAlAAbAIJAAAAAAAGAtAA.gif', 139608, 2, NULL, 'full', 9999999, '2015-04-22 18:54:11', '2015-04-22 18:54:11'),
(192, 'small-xmas20.gif', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\2\\small-AAAlAAbAIJAAAAAAAGAtAA.gif', 2606, 2, 191, 'small', 9999999, '2015-04-22 18:54:11', '2015-04-22 18:54:11'),
(193, 'medium-xmas20.gif', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\2\\medium-AAAlAAbAIJAAAAAAAGAtAA.gif', 19926, 2, 191, 'medium', 9999999, '2015-04-22 18:54:12', '2015-04-22 18:54:12'),
(194, 'large-xmas20.gif', '', '', '0000-00-00 00:00:00', '0.00', 'Not for sale', 'C:\\wamp\\www\\zaforwebgallery\\app\\webroot\\files\\gallery\\2\\large-AAAlAAbAIJAAAAAAAGAtAA.gif', 70514, 2, 191, 'large', 9999999, '2015-04-22 18:54:12', '2015-04-22 18:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `details`, `user_id`, `created`, `modified`) VALUES
(1, 'Web Site Launching...', 'The latest news is we are finally going to launch the new Web Art Gallery zWebGallery. I hope you all will enjoy it. Have fun with this website. Please wright some blogs to express your self.\r\n\r\nIt all about the quality of the design and content. Put you comments and contact us. \r\n\r\nWe will surly be glad to see your all contribution towards to our new web gallery.\r\n\r\nBig thanks to the developer Mr. Zafor Iqbal who has put his most valuable time to create this wonderful website. \r\n\r\nRegards,\r\nMr. & Mrs. Sumon.  ', 2, '2015-04-22 02:46:29', '2015-04-22 03:34:21'),
(3, 'Test', 'Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing ', 2, '2015-04-22 01:25:24', '2015-04-22 03:25:24'),
(4, 'test', 'test', 2, '2015-04-24 03:56:25', '2015-04-24 03:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `topic_id`, `user_id`, `body`, `created`, `modified`) VALUES
(2, 2, 2, 'Please add post related to the gallery pictures here.... ', '2015-04-22 20:29:55', '2015-04-22 20:29:55'),
(3, 1, 2, 'Please add post related to the gallery albums here.... ', '2015-04-22 20:30:26', '2015-04-22 20:30:26'),
(4, 3, 2, 'All general posts goes here', '2015-04-22 20:48:34', '2015-04-22 20:48:34'),
(5, 3, 1, 'Hey I like this topics, make some noise...', '2015-04-22 20:50:14', '2015-04-22 20:50:14'),
(7, 2, 3, 'Someone should write about something...', '2015-04-22 21:01:48', '2015-04-22 21:01:48'),
(8, 4, 2, 'Post any events related message here', '2015-04-22 21:51:46', '2015-04-22 21:51:46'),
(9, 4, 1, 'This is my first post in Events posts.. please write more posts...', '2015-04-22 21:57:25', '2015-04-22 21:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `title` varchar(100) NOT NULL,
  `visible` int(1) NOT NULL COMMENT '1 for visible, 2 for hiden',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `user_id`, `title`, `visible`, `created`, `modified`) VALUES
(1, 2, 'Album posts', 1, '2015-04-22 20:16:29', '2015-04-22 20:21:13'),
(2, 2, 'Picture posts', 1, '2015-04-22 20:21:04', '2015-04-22 20:21:04'),
(3, 2, 'General posts', 1, '2015-04-22 20:29:41', '2015-04-22 20:29:41'),
(4, 3, 'Events Posts', 1, '2015-04-22 21:43:00', '2015-04-22 21:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` int(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `type`, `status`, `created`, `modified`) VALUES
(1, 'zafor', '89767f4624e466b05696dd14969df9c25e57bce0', 'Zafor', 'Artist', 0, '2015-03-11 18:51:45', '2015-04-24 04:01:06'),
(2, 'admin', '4b68ac387889b23bb6f3f736a95971ef908f47ff', 'Administrtor', 'Admin', 0, '2015-03-11 18:58:04', '2015-03-11 18:58:04'),
(3, 'sumon', 'c14b46c4c703b5051e4a129cc95ac0d076935650', 'M S I Sumon', 'Artist', 0, '2015-03-11 21:14:53', '2015-03-11 21:14:53'),
(5, 'hazera', '078eef09e8c3227e70730d7e29089b8383912e02', 'Hazera Iqbal', 'Artist', 0, '2015-04-17 15:20:08', '2015-04-17 15:20:08'),
(6, 'zoha', '54f9ac8de9d5a32bbeb9059deda99d15426d677c', 'Zoha Iqbal', 'Buyer', 0, '2015-04-20 16:34:13', '2015-04-20 16:34:13'),
(7, 'sarrena', '82136c5647e25b97492d75bd1a2593220f879c68', 'Sarrena Islam', 'Artist', 0, '2015-04-20 16:44:22', '2015-04-20 16:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `users_contacts`
--

CREATE TABLE IF NOT EXISTS `users_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_contacts`
--

INSERT INTO `users_contacts` (`id`, `user_id`, `type`, `details`, `created`, `modified`) VALUES
(1, 3, 'Email', 'msisumon@hotmail.com', '2015-03-13 02:31:38', '2015-03-13 02:31:38'),
(2, 1, 'Email', 'zaforir2002@hotmail.com', '2015-03-13 02:33:35', '2015-03-13 02:33:35'),
(3, 1, 'Telephone', '07723032493', '2015-03-13 02:34:02', '2015-04-20 15:46:39'),
(4, 1, 'Address', '143 Warrior Square\r\nLondon\r\nE12 5RR', '2015-03-13 02:34:39', '2015-03-13 02:34:39'),
(5, 3, 'Telephone', '07809625194', '2015-03-13 02:35:03', '2015-03-13 02:35:03'),
(6, 3, 'Address', '108 Ann Street\r\nLondon\r\nE13 1BY', '2015-03-13 02:35:54', '2015-03-13 02:35:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
