-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2016 at 06:11 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(0, 'Bootstrap'),
(2, 'Javascript'),
(3, 'PHP'),
(7, 'Java'),
(11, 'OOP'),
(12, 'PROCEDURAL');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 5, 'Robbie', 'dowaod@adwdw.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquam fringilla tortor at bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam ac tempor justo. Aenean tincidunt egestas tortor blandit hendrerit. Vestibulum nisi mi, porta id laoreet non, elementum ac nibh. Donec viverra turpis eu porta mattis. In auctor libero orci. Nunc felis magna, tempus vitae nunc id, vehicula posuere augue. Nam ut lorem libero. Donec vel dapibus velit. Nam finibus quam non tincidunt vestibulum. In maximus sapien ipsum, quis blandit felis placerat id. Phasellus faucibus erat ac massa interdum, ac blandit mauris porttitor. Nullam eu ipsum ac augue euismod hendrerit varius sit amet nibh.', 'Approved', '2016-04-21'),
(12, 1, 'Robbie', 'Robbie@email.com', 'This is a test comment', 'Approved', '2016-04-21'),
(20, 1, 'Edwin', 'edwin@email.com', 'This is edwins comment', 'Approved', '2016-04-21'),
(35, 1, 'Sandy', 'sandy@email.com', 'This is a comment from Sandy', 'Approved', '2016-04-21'),
(47, 1, 'dwad', 'dwadaw', 'dwadw', 'Approved', '2016-04-21'),
(62, 1, 'FAwd', 'fawfafawfwaf', 'fwafdwafwadf', 'Approved', '2016-04-21'),
(63, 5, 'fwadwa', 'fdwafwaefd', 'wafweafwadwafwafrfgfdesfbsdwa', 'Approved', '2016-04-21'),
(64, 5, 'fwadwa', 'fdwafwaefd', 'wafweafwadwafwafrfgfdesfbsdwa', 'Approved', '2016-04-21'),
(82, 6, 'gafdewadwa', 'hrfdawfwaf', 'gseadfwafwafwafa', 'Approved', '2016-04-21'),
(83, 6, 'fwadwad', 'wafdwfwaf', 'wfwadwfwafwafd', 'Unapproved', '2016-04-21'),
(84, 6, 'ffwadsawd', 'dawdawd', '', 'Unapproved', '2016-04-21'),
(85, 6, 'ffwadsawd', 'dawdawd', 'won''t', 'Unapproved', '2016-04-21'),
(86, 6, 'NEW', 'dwanduowadno', 'geafwadawdafawf', 'Unapproved', '2016-04-21'),
(87, 1, 'gefwaf', 'fwadwadwaf', 'fwadawdwafwafwaa', 'Unapproved', '2016-04-21'),
(88, 1, 'gedeasdwa', 'faafdwagwads', 'fwadwafgwawagfawd', 'Approved', '2016-04-21'),
(89, 1, 'NEw comment', 'egaefdwafd', 'gaefwadawdw', 'Approved', '2016-04-21'),
(90, 1, 'NEw Poster', 'Poster@post.com', 'This is a test post', 'Approved', '2016-05-17'),
(91, 1, 'test', 'test', 'test', 'Approved', '2016-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(3) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 0, 'Tester edit', 'Robbie edit', '2016-05-17', 'social4.png', '<p>This is awesome.<br /><strong>Bold</strong></p>\r\n<p><em>Italic</em></p>\r\n<ul>\r\n<li>list</li>\r\n<li>list</li>\r\n</ul>\r\n<ol>\r\n<li>lsitnumbers</li>\r\n</ol>\r\n<p style="text-align: center;">JUstified sentence</p>', 'Tester edit', 6, 'Published'),
(5, 0, 'This is an edited post', 'Robbie Heygate edit', '2016-04-21', 'spotlight1.png', '                                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget elit sed purus varius placerat auctor vel nisl. Pellentesque porta ipsum non elit malesuada tempor. Fusce blandit odio sed nunc tempus semper. Duis tempus dictum tortor in sollicitudin. Sed egestas dolor sed ipsum rhoncus pharetra. Proin nec dolor vel risus vehicula rhoncus id in lectus. Fusce tristique ligula ac ullamcorper egestas.\r\n\r\nEtiam convallis vehicula lectus vitae facilisis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc quis pretium tellus, ac cursus ligula. Nullam in molestie dui, at pharetra diam. Curabitur commodo, mi id lobortis ultricies, erat massa maximus tellus, at feugiat odio lorem a lacus. Mauris ultricies elit consequat, gravida diam eget, hendrerit purus. Vestibulum ac feugiat mi. Integer et arcu malesuada quam elementum luctus.\r\n\r\nAliquam lobortis bibendum quam, vitae aliquam tellus sodales eget. Nullam blandit massa ac nunc ultrices, non dictum felis lobortis. Mauris blandit viverra lacus, ut commodo magna gravida congue. Donec venenatis placerat euismod. Ut non purus eget nisi faucibus commodo non sit amet libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin nec cursus risus, vel pulvinar enim. Nam lobortis, eros in lacinia hendrerit, sapien dui blandit mi, sed interdum lorem tellus at dolor. In id ante euismod, pulvinar ex id, elementum orci. Aliquam id elementum dui, sit amet egestas eros. Praesent pretium egestas dui id ullamcorper. Nam vel blandit diam, quis pharetra augue. Sed turpis purus, viverra eget scelerisque in, vehicula venenatis risus. Sed elementum lacus tortor, non euismod augue auctor et.\r\n\r\nDuis sit amet eleifend magna, non volutpat nulla. Phasellus metus purus, facilisis vitae nisi non, volutpat ultrices quam. In fermentum, justo vitae dignissim finibus, sapien urna cursus mauris, vel finibus nunc elit at lorem. Phasellus scelerisque nibh vitae congue lacinia. Duis purus felis, sagittis vitae nulla at, luctus imperdiet elit. Quisque massa tortor, vulputate sed lectus ut, tincidunt imperdiet justo. Duis tristique magna sit amet leo ultricies convallis et ut quam. Maecenas posuere turpis in nibh vehicula, eu malesuada libero posuere. Quisque placerat sapien non lectus consectetur, in eleifend augue blandit.\r\n\r\nEtiam sed ante id magna dictum pulvinar. Vestibulum vestibulum lobortis convallis. Vestibulum dignissim, augue ac tempor iaculis, nisl dui ullamcorper ligula, vitae accumsan tortor urna quis sem. Fusce tellus tellus, lacinia nec sapien vel, tincidunt tempus ex. Maecenas vel fringilla leo. Maecenas volutpat porta efficitur. Duis tincidunt varius nibh nec eleifend. Phasellus ullamcorper rutrum euismod. Fusce scelerisque ultricies mi, id aliquam libero egestas id. Vestibulum consectetur ante vitae mollis vehicula. Maecenas a ultrices enim.                            ', 'This is an edited post', 23, 'Published'),
(6, 12, 'PHP course', 'Robbie Heygate ', '2016-04-21', 'article.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquam fringilla tortor at bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam ac tempor justo. Aenean tincidunt egestas tortor blandit hendrerit. Vestibulum nisi mi, porta id laoreet non, elementum ac nibh. Donec viverra turpis eu porta mattis. In auctor libero orci. Nunc felis magna, tempus vitae nunc id, vehicula posuere augue. Nam ut lorem libero. Donec vel dapibus velit. Nam finibus quam non tincidunt vestibulum. In maximus sapien ipsum, quis blandit felis placerat id. Phasellus faucibus erat ac massa interdum, ac blandit mauris porttitor. Nullam eu ipsum ac augue euismod hendrerit varius sit amet nibh.', 'Lorem Ipsum', 9, 'Draft'),
(8, 0, 'New Post', 'Me', '2016-04-21', 'map.png', '              This is an edied          ', 'New Post', 4, 'Published'),
(9, 0, 'Another Post', 'Me2', '2016-04-21', 'homebanner.png', '      This is some dummy content    ', 'Another Post', 4, 'Published'),
(10, 3, 'test2', 'fawd', '2016-05-10', '', 'fwafwadwadwadwd', 'dwadwadwadwa', 4, 'Published'),
(11, 0, 'fweadawsdw', 'dwadwadwd', '2016-05-10', '', 'wadwadwadwddwad', 'dwadwadad', 4, 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_image`, `user_email`, `user_role`, `randSalt`) VALUES
(1, 'Robbie.Heygate', '$1$Zp1.uc/.$IdtFCsI/4.Y6LMDHNZ0nj.', 'Robbie', 'Heygate', 'spotlight2.png', 'r.heygate@gmail.com', 'Admin', ''),
(7, 'Sandy', '$1$Vf2.4.0.$YD1seeYBfZKirpfZIeXO7/', 'Sandy', 'Thompson', 'article.jpg', 'sandy@email.com', 'Editor', ''),
(8, 'sandy.tom', '$1$Lb/.291.$uQaHBHqooyCOx5x9IjYkx/', 'Sandy', 'Tom', 'social.png', 'sandy.tom@gmail.com', 'Editor', ''),
(9, 'Robbie66', '$1$fP..6l1.$aMkHamlcuk0JoIeGzuPt50', 'Robbie', 'Heygate', 'social3.png', 'email@email.com', 'Admin', ''),
(10, 'TestUser', '$1$nl5.kQ1.$otjdXQkZWV.HzI4f83iF9.', 'Robbie', 'Heygate', 'history-header_img.jpg', 'r.heygate@gmail.com', 'Editor', ''),
(15, 'username', 'userpassword', '', '', '', 'user@email.com', '', '$2y$10$iusesomecrazystrings22'),
(16, 'george', '$1$lB0.KJ1.$RmdF7lDZrgMBCg4bbi4Of1', '', '', '', 'george@email.com', '', '$2y$10$iusesomecrazystrings22'),
(17, 'real.robbie', '$1$dy2.iY/.$vIKn8Nj3skRqhQCCtb3hY.', '', '', '', 'Robbie@robbie.com', '', '$2y$10$iusesomecrazystrings22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
