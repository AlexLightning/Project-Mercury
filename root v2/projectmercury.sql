-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Gazda: localhost
-- Timp de generare: 07 May 2018 la 19:40
-- Versiune server: 5.6.13
-- Versiune PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Bază de date: `projectmercury`
--
CREATE DATABASE IF NOT EXISTS `projectmercury` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projectmercury`;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `anunt`
--

CREATE TABLE IF NOT EXISTS `anunt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(28) CHARACTER SET latin1 NOT NULL,
  `categorie` varchar(100) CHARACTER SET latin1 NOT NULL,
  `descriere` varchar(4096) CHARACTER SET latin1 NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `perioada` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Salvarea datelor din tabel `anunt`
--

INSERT INTO `anunt` (`id`, `titlu`, `categorie`, `descriere`, `data`, `perioada`) VALUES
(37, 'fdsfsd', 'Auto, moto si ambarcatiuni', 'gfgdg', '2018-05-06 15:38:52', 0),
(38, 'ytryr', 'Sport, timp liber, arta', 'gfhfg', '2018-05-06 15:39:02', 23),
(39, 'fdfsf', 'Casa si gradina', '3213', '2018-05-06 15:42:08', 12),
(40, '65654', 'Mama si copilul', '432423', '2018-05-06 15:42:15', 0),
(41, 'tyryr', 'Auto, moto si ambarcatiuni', 'gfhgfh', '2018-05-06 15:42:22', 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `anunturi`
--

CREATE TABLE IF NOT EXISTS `anunturi` (
  `titlu` varchar(100) CHARACTER SET utf8 NOT NULL,
  `autor` varchar(50) CHARACTER SET utf8 NOT NULL,
  `data` datetime NOT NULL,
  `perioada_existenta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `categoria` varchar(50) CHARACTER SET utf8 NOT NULL,
  `link` varchar(200) CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(70) CHARACTER SET utf8 NOT NULL,
  `descriere` varchar(4096) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Salvarea datelor din tabel `categorie`
--

INSERT INTO `categorie` (`id`, `titlu`, `descriere`) VALUES
(1, 'test', 'desc'),
(2, 'abc', 'desc');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `lastname`, `firstname`, `telefon`, `email`, `web`, `admin`) VALUES
(10, 'root', '6db23eee40d34e8290441bd8ff5bd9', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(11, 'qwe', '76d80224611fc919a5d54f0ff9fba4', 'qwe', 'we', 'qwe', 'qwe', 'qwe', 0),
(12, 'qwer', '962012d09b8170d912f0669f6d7d9d07', 'qwer', 'qwer', '121', 'qwer', 'qwer', 1),
(13, 'lightdark', 'a82fd95db10ff25dfad39f07372ebe37', 'Ion', 'Mihai', '0744123123', 'ion@gmail.com', 'www.site.com', 1),
(14, '', '', 'poo', 'poo', '', 'poo', '', 1),
(15, '', '', 'ert', 'ert', '', 'ert', '', NULL),
(16, '', '', 'ert', 'ert', '', 'ert', '', NULL),
(17, '', '', 'rty', 'rty', '', 'rty', '', NULL),
(18, '', '', 'rty', 'rty', '', 'rty', '', NULL),
(19, '', '', 'tyu', 'tyu', '', 'tyu', '', NULL),
(20, '', '', 'tyu', 'tyu', '', 'tyu', '', NULL),
(21, '', '', 'sdf', 'sdf', '', 'sdf', '', NULL),
(22, '', '', 'sdf', 'sdf', '', 'sdf', '', NULL),
(23, '', '', 'dfg', 'dfg', '', 'dfg', '', NULL),
(24, '', '', 'dfg', 'dfg', '', 'dfg', '', NULL),
(25, 'rootaksdlask', '7f1a98a1ee003a586d2af61801fbeae1', 'ndisa', 'disjai', 'daksd', 'nadsn@gmial.com', 'dsladskl', 1),
(26, 'rootasddsa', '908529442345c53a4d7f92284c361194', 'asdasd', 'sdaasd', 'asd', 'asdq', 'asdasd', 1),
(27, 'mihai', '900150983cd24fb0d6963f7d28e17f72', 'Mihai', 'Mihai', '07256256', 'mihai@gmail.com', 'abc.com', 0),
(28, 'TEST', 'e2fc714c4727ee9395f324cd2e7f331f', 'test', 'test', '072525252', 'abc@yahoo.ro', 'test.com', 0),
(29, 'sadas', '252bcff712003984e9fbe7fdbc8e6f7d', 'teodorescu', 'andrei', '543534', 'te@udasfa', 'dsadas', 0),
(30, 'andrei', 'b2d09b73eb5ad0228f9cb2e51485a45f', 'a', 'abcd', '546', 'te@rttr', '452423', 0),
(31, '', '', '', '', '', '', '', NULL),
(32, 'abcd', 'e2fc714c4727ee9395f324cd2e7f331f', 'dsa', 'as', '7567', 'dsad@4324', 'hfgh', 0),
(33, 'dsa', '63347f5d946164a23faca26b78a91e1c', 'fsdfs', 'fdsfsd', '432423', '32321@rerw', 'fdsfsd', 0),
(34, 'dasd', 'af19118d86a4c192442ad8cf59b5d7ad', 'Smith', 'Joe', '123', 'abc@gmail.ro', 'sadas', 0),
(35, 'dfsg', '8e14411d205d3a428ea28feadbdedd79', 'Kardashion', 'Kim', '43242', 'dsad@43245', 'fewrew', 0),
(36, 'fdsfds', '27c36e650f63a42a51aa6dc08a56ec5f', 'baby', 'Kim', '435', '3324@rew', 'rwe', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
