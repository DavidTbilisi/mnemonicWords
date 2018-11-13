-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 13, 2018 at 12:11 PM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnwords`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `words_id` int(11) NOT NULL,
  `text` text,
  `images` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `words_id`, `text`, `images`, `created_at`, `edited_at`) VALUES
(5, 170, '<p>asdf</p>', NULL, '2018-10-22 19:13:14', '2018-10-22 19:13:14'),
(6, 169, '<p><span style=\"background-color: rgb(247, 173, 107); font-size: 24px;\">ასდ</span></p>', NULL, '2018-10-23 06:43:19', '2018-10-23 06:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'users', 'მომხმარებლები');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

DROP TABLE IF EXISTS `table1`;
CREATE TABLE IF NOT EXISTS `table1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newWord` varchar(110) NOT NULL,
  `connection` varchar(222) NOT NULL,
  `meaning` varchar(200) NOT NULL,
  `assoc` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `newWord`, `connection`, `meaning`, `assoc`) VALUES
(26, 'remedy', 'რემენი შიმშილის წამალია', 'საშუალება, წამალი', 'რემენი'),
(27, 'david', 'რემენი შიმშილის წამალია', 'სიმაღლე', 'რემენი');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1537475316, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'woody180@rocketmail.com', '$2y$08$sQZVF2qjPeHSA.Z1rNMEz.rSJvhBIT/l4LO0XdSZLp1w92F.Ef.Qm', NULL, 'woody180@rocketmail.com', NULL, NULL, NULL, NULL, 1537473535, 1539244078, 1, 'woody', 'woodpacker', '0', '0'),
(3, '::1', 'david@mail.com', '$2y$08$01LwmTo5Le2kaV9K4n9C3ee1FFuCkcSZ4Dml.Ts8Cnq7e1VBr9jPq', NULL, 'david@mail.com', NULL, NULL, NULL, NULL, 1538736453, NULL, 1, 'woody', 'woodpacker', '0', '0'),
(4, '::1', 'davidchincharashvili@gmail.com', '$2y$08$RNGwSCjskL6x.y5kDaBt/.niMnTBP1WQa8vX2fjBBnbKyy7dt4kR2', NULL, 'davidchincharashvili@gmail.com', NULL, NULL, NULL, NULL, 1539068949, 1542098688, 1, 'david', 'chincharashvili', '', '598588874');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 3),
(6, 2, 3),
(7, 3, 2),
(8, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

DROP TABLE IF EXISTS `words`;
CREATE TABLE IF NOT EXISTS `words` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `new_word` varchar(100) NOT NULL,
  `connection` varchar(100) NOT NULL,
  `meaning` varchar(100) NOT NULL,
  `assoc` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `language` varchar(100) NOT NULL,
  `edited_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=213 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `new_word`, `connection`, `meaning`, `assoc`, `user_id`, `language`, `edited_at`, `created_at`) VALUES
(87, 'semiconductor', 'ბიძია სემი ავტობუსში ხან ატარებს ხალხს ხან არა', 'ნახევრად გამტარი', 'ძია სემი კონდუქტორია', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(88, 'assume', '', 'предполагать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(89, 'coefficient', '', 'коэффициент', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(90, 'In a sense', '', 'В некотором смысле', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(91, 'mutually', '', 'взаимно', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(92, 'tremendously', '', 'чрезвычайно', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(93, 'decent', '', 'приличная', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(94, 'vast', '', 'огромный', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(95, 'disrupt', '', 'срывать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(96, 'sufficient', '', 'достаточно', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(97, 'precedence', '', 'старшинство', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(98, 'implies', '', 'подразумевает', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(99, 'elicit', '', 'вызывать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(100, 'merely', '', 'просто', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(101, 'bestow', '', 'даровать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(102, 'drought', '', 'засуха', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(103, 'infants', '', 'дети', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(104, 'rehearsal', '', 'репетиция', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(105, 'shiver', '', 'дрожать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(106, 'flux', '', 'поток', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(107, 'bulky', '', 'объемистый', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(108, 'patch', '', 'пластырь', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(109, 'dull', '', 'скучный', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(110, 'chuckle', '', 'посмеиваться', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(111, 'rumbling', '', 'урчание', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(112, 'groan', '', 'стон', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(113, 'flapping', '', 'хлопающий', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(114, 'magpie', '', 'болтун', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(115, 'grunting', '', 'хрюканье', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(116, 'furnished', '', 'меблированный', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(117, 'inhabitants', '', 'жителей', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(118, 'submissive', '', 'покорный', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(119, 'merits', '', 'заслуги', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(120, 'diverted', '', 'переадресованы', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(121, 'grain', '', 'зерно', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(122, 'sacred', '', 'священный', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(123, 'storehouse', '', 'кладезь', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(124, 'emphasize', '', 'подчеркивать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(125, 'beneficence', '', 'благодеяние', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(126, 'neglect', '', 'пренебрежение', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(127, 'daunting', '', 'пугающим', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(128, 'haphazard', '', 'бессистемный', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(129, 'funding', '', 'финансирование', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(130, 'tremendous', '', 'огромный', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(131, 'sustain', '', 'поддерживать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(132, 'seize', '', 'воспользоваться', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(133, 'provision', '', 'обеспечение', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(134, 'maintain', '', 'поддерживать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(135, 'grocery', '', 'продуктовый', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(136, 'fiber', '', 'волокно', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(137, 'emphasis', '', 'акцент', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(138, 'eliminate', '', 'Устранить', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(139, 'complain', '', 'жаловаться', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(140, 'exhort', '', 'увещевать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(141, 'urge', '', 'побуждать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(142, 'controversial', '', 'спорный', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(143, 'coal', '', 'уголь', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(144, 'bury', '', 'хоронить', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(145, 'blanket', '', 'одеяло', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(146, 'assumption', '', 'предположение', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(147, 'anticipate', 'წინასწარ ვხედავ ჩემს ანტი სიფათს', 'წინასწარ ხედვა', 'ანტი სიფათი', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(148, 'admission', '', 'вход', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(149, 'abuse', '', 'злоупотребление', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(150, 'helpmeet', '', 'помощник', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(152, 'Crave', '', 'жаждать', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(153, 'ascertain', '', 'определять', '', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(154, 'gruesome', 'გაიზარდა რაღაც საზიზღარი', 'отвратительный', 'გაიზარდა რაღაც', 4, 'Detect language', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(155, 'cherish', 'лелеять черешню', 'лелеять', 'черешня', 4, 'Detect language', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(156, 'oppression', 'ოპერაში პრისიონერას მომღერალი დაიჩაგრება', 'угнетение', 'ოპერა პრისიონერა', 4, 'Detect language', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(157, 'convicted', 'конь виктории осудил ее', 'осужденный', 'конь виктории', 4, 'Detect language', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(158, 'harshly', '', 'უხეშად', '', 4, 'Detect language', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(159, 'denounce', '', 'განკითხვა', '', 4, 'Detect language', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(161, 'beguiling (ბეგაილინგ)', '', 'заманчивый', '', 4, 'Detect language', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(162, 'rabies', 'ბზიკებით დაკბენილი რაბინები ცოფდებიან', 'ცოფიანობა', 'რაბინები, ბზიკები', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(163, 'obtuse', 'ორივე კბილი ჩლუნგი აქვს', 'ჩლუნგი', 'ორივე კბილი (оба tooth) ', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(164, 'mourn', '', 'დატირება', '', 4, 'English', '2018-11-13 11:49:28', '2018-11-13 11:35:45'),
(167, 'nasty', 'ნესტიანი ნასკის სუნი საზიზღარია', 'საზიზღარი', 'ნესტიანი ნასკი', 4, 'English', '2018-11-13 11:47:48', '2018-11-13 11:35:45'),
(169, 'severity', 'строгие оба север и ты', 'строгость', 'север и ты', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45'),
(170, 'exhaustive', 'ყოფილ სახლში ტელევიზორი ამომწურავ ინფოს გვიჩვენებდა', 'ამომწურავი', 'ex სახლი tv', 4, 'English', '2018-11-13 11:35:45', '2018-11-13 11:35:45');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
