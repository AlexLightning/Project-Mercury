-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2018 at 04:00 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projectmercury`
--
CREATE DATABASE IF NOT EXISTS `projectmercury` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projectmercury`;

-- --------------------------------------------------------

--
-- Table structure for table `anunt`
--

CREATE TABLE IF NOT EXISTS `anunt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(28) CHARACTER SET latin1 NOT NULL,
  `user` varchar(50) NOT NULL,
  `categorie` varchar(100) CHARACTER SET latin1 NOT NULL,
  `descriere` varchar(4096) CHARACTER SET latin1 NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `perioada` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `anunt`
--

INSERT INTO `anunt` (`id`, `titlu`, `user`, `categorie`, `descriere`, `data`, `perioada`) VALUES
(44, 'asd', '', 'abc', 'asd', '2018-05-07 21:53:21', 0),
(46, 'Titlu de anunt', 'qwer', 'test', 'Descriere de anunt', '2018-05-08 00:46:51', 12),
(47, 'dasdasd', 'qwer', 'test', 'dasdads', '2018-05-08 01:38:30', 1),
(48, 'rqrrw', 'qwer', 'test', 'rwqrqr', '2018-05-08 01:39:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(70) CHARACTER SET utf8 NOT NULL,
  `descriere` varchar(4096) CHARACTER SET utf8 NOT NULL,
  `user` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `titlu`, `descriere`, `user`) VALUES
(1, 'test', 'desc', ''),
(2, 'abc', 'desc', ''),
(4, 'categorietest', 'o categorie test', 'qwer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `telefon` varchar(15) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `web` varchar(30) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `lastname`, `firstname`, `telefon`, `email`, `web`, `admin`) VALUES
(10, 'root', '6db23eee40d34e8290441bd8ff5bd9', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(11, 'qwe', '76d80224611fc919a5d54f0ff9fba4', 'qwe', 'we', 'qwe', 'qwe', 'qwe', 0),
(12, 'qwer', '962012d09b8170d912f0669f6d7d9d07', 'qwer', 'qwer', '121', 'qwer', 'qwer', 1),
(13, 'lightdark', 'a82fd95db10ff25dfad39f07372ebe37', 'Ion', 'Mihai', '0744123123', 'ion@gmail.com', 'www.site.com', 1),
(25, 'rootaksdlask', '7f1a98a1ee003a586d2af61801fbeae1', 'ndisa', 'disjai', 'daksd', 'nadsn@gmial.com', 'dsladskl', 1),
(26, 'rootasddsa', '908529442345c53a4d7f92284c361194', 'asdasd', 'sdaasd', 'asd', 'asdq', 'asdasd', 1),
(27, 'mihai', '900150983cd24fb0d6963f7d28e17f72', 'Mihai', 'Mihai', '07256256', 'mihai@gmail.com', 'abc.com', 0),
(28, 'TEST', 'e2fc714c4727ee9395f324cd2e7f331f', 'test', 'test', '072525252', 'abc@yahoo.ro', 'test.com', 0),
(29, 'sadas', '252bcff712003984e9fbe7fdbc8e6f7d', 'teodorescu', 'andrei', '543534', 'te@udasfa', 'dsadas', 0),
(30, 'andrei', 'b2d09b73eb5ad0228f9cb2e51485a45f', 'a', 'abcd', '546', 'te@rttr', '452423', 0),
(32, 'abcd', 'e2fc714c4727ee9395f324cd2e7f331f', 'dsa', 'as', '7567', 'dsad@4324', 'hfgh', 0),
(33, 'dsa', '63347f5d946164a23faca26b78a91e1c', 'fsdfs', 'fdsfsd', '432423', '32321@rerw', 'fdsfsd', 0),
(34, 'dasd', 'af19118d86a4c192442ad8cf59b5d7ad', 'Smith', 'Joe', '123', 'abc@gmail.ro', 'sadas', 0),
(35, 'dfsg', '8e14411d205d3a428ea28feadbdedd79', 'Kardashion', 'Kim', '43242', 'dsad@43245', 'fewrew', 0),
(36, 'fdsfds', '27c36e650f63a42a51aa6dc08a56ec5f', 'baby', 'Kim', '435', '3324@rew', 'rwe', 0),
(37, 'bdchbkdlsnslca', '6cd9939ecc40b2791b630a04532a1d42', 'adsaddassasdasd', 'dsasdadasdas', '12312302139', 'asdasdad@asidiask.com', 'sacjmkmldcmoal', 0),
(38, 'ionpop', 'cf60bce6e8603f8ad7a3ddc4c4a2b680', 'Popescu', 'Ion', '0744123678', 'ion@yahoo.com', '', 1);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_all_expired` ON SCHEDULE EVERY 10 SECOND STARTS '2018-05-08 04:31:47' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM anunt WHERE DATEDIFF(NOW(),`data`) > `perioada`$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
