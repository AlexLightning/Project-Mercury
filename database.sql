SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `projectmercury` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projectmercury`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

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
(26, 'rootasddsa', '908529442345c53a4d7f92284c361194', 'asdasd', 'sdaasd', 'asd', 'asdq', 'asdasd', 1);
