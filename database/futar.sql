-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2015. Már 31. 11:47
-- Szerver verzió: 5.5.27
-- PHP verzió: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `futar`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csomagok`
--

CREATE TABLE IF NOT EXISTS `csomagok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `felado_id` int(11) NOT NULL,
  `suly` int(11) NOT NULL,
  `cimzett_neve` varchar(60) NOT NULL,
  `szallitasi_pont_id` int(11) NOT NULL,
  `feladas_ideje` datetime NOT NULL,
  `torekeny` tinyint(1) NOT NULL,
  `szalitas_kezdete` datetime DEFAULT NULL,
  `erkezes_ideje` datetime DEFAULT NULL,
  `atvetel_ideje` datetime DEFAULT NULL,
  `azonosito` varchar(20) NOT NULL,
  `szallito_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `felado_id` (`felado_id`),
  KEY `szallitasi_pont_id` (`szallitasi_pont_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- A tábla adatainak kiíratása `csomagok`
--

INSERT INTO `csomagok` (`id`, `felado_id`, `suly`, `cimzett_neve`, `szallitasi_pont_id`, `feladas_ideje`, `torekeny`, `szalitas_kezdete`, `erkezes_ideje`, `atvetel_ideje`, `azonosito`, `szallito_id`) VALUES
(2, 1, 4, 'Nyári Bálint', 1, '2015-02-12 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '123', 0),
(3, 1, 6, 'Jóska pista', 1, '2015-03-25 00:00:00', 1, '2015-03-25 00:00:00', '2015-03-27 00:00:00', '2015-03-27 11:04:01', '123456', 0),
(4, 3, 14, 'Kovács Márk ', 1, '2015-03-11 00:00:00', 1, '2015-03-25 00:00:00', '2015-03-31 00:00:00', '2015-04-07 00:00:00', '123456789', 0),
(5, 1, 12, 'XY', 2, '2015-03-25 11:33:47', 1, '2015-03-27 10:55:40', '2015-03-27 11:03:53', '2015-03-27 11:03:57', '1427279627', 2),
(6, 3, 23, 'Kiss Géza', 1, '2015-03-27 11:09:23', 1, '2015-03-27 11:10:53', '2015-03-27 11:10:57', '2015-03-27 11:11:01', '1427450963', 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `feladok`
--

CREATE TABLE IF NOT EXISTS `feladok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(60) NOT NULL,
  `cegnev` varchar(60) NOT NULL,
  `adoszam` varchar(13) NOT NULL,
  `irszam` varchar(4) NOT NULL,
  `telpules` varchar(60) NOT NULL,
  `utcahaz` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `magánszemély` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- A tábla adatainak kiíratása `feladok`
--

INSERT INTO `feladok` (`id`, `nev`, `cegnev`, `adoszam`, `irszam`, `telpules`, `utcahaz`, `email`, `telefon`, `magánszemély`) VALUES
(1, 'Kovács Márk', 'NyB', '1234567894547', '7458', 'Kiskorpád', 'Petöfi u. 42', 'boor1396@gmail.com', '06201445879', 1),
(3, 'Kovács Ferenc', 'asdasd', '56546546546', '7889', 'Marcali', 'Rákoczi u. 54', 'asdfwe@gmail.com', '06201401476', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `tag` tinyint(4) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `date`, `tag`, `published`) VALUES
(1, 'Tegi nyerte meg az ötös lottó nyereményét!', 'Tegi megvette a Rákóczi FC-t és Ebay-re felrakta őket . \r\nA licit még csak 2 forintnál tart.', '2014-11-11', 1, 1),
(2, 'Real Madrid új átigazolása!', 'A Real Madrid rekord összegért megvette Dzsudzsák Balázs-t 1500Ft-ért!', '2014-11-25', 2, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `realid` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(25) NOT NULL,
  `title` varchar(60) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`realid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `pages`
--

INSERT INTO `pages` (`realid`, `id`, `title`, `text`) VALUES
(1, 'bemutatkozas', 'Bemutatkozás', ' <p>\r\n    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n  </p>\r\n  <p>\r\n    Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.\r\n  </p>\r\n  <p>\r\n    Fusce convallis, mauris imperdiet gravida bibendum, nisl turpis suscipit mauris, sed placerat ipsum urna sed risus. In convallis tellus a mauris. Curabitur non elit ut libero tristique sodales. Mauris a lacus. Donec mattis semper leo. In hac habitasse platea dictumst. Vivamus facilisis diam at odio. Mauris dictum, nisi eget consequat elementum, lacus ligula molestie metus, non feugiat orci magna ac sem. Donec turpis. Donec vitae metus. Morbi tristique neque eu mauris. Quisque gravida ipsum non sapien. Proin turpis lacus, scelerisque vitae, elementum at, lobortis ac, quam. Aliquam dictum eleifend risus. In hac habitasse platea dictumst. Etiam sit amet diam. Suspendisse odio. Suspendisse nunc. In semper bibendum libero.\r\n  </p>\r\n  <p>\r\n    Proin nonummy, lacus eget pulvinar lacinia, pede felis dignissim leo, vitae tristique magna lacus sit amet eros. Nullam ornare. Praesent odio ligula, dapibus sed, tincidunt eget, dictum ac, nibh. Nam quis lacus. Nunc eleifend molestie velit. Morbi lobortis quam eu velit. Donec euismod vestibulum massa. Donec non lectus. Aliquam commodo lacus sit amet nulla. Cras dignissim elit et augue. Nullam non diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Aenean vestibulum. Sed lobortis elit quis lectus. Nunc sed lacus at augue bibendum dapibus.\r\n  </p>'),
(2, 'kapcsolat', 'Kapcsolat', 'Telefon: 80/789-1111');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `id` tinyint(4) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `rights`
--

INSERT INTO `rights` (`id`, `description`) VALUES
(1, 'Adminisztrátor'),
(2, 'Főszerkesztő'),
(3, 'Hírszerkesztő'),
(4, 'Felhasználó');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szalitasi_pontok`
--

CREATE TABLE IF NOT EXISTS `szalitasi_pontok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `megnevezes` varchar(60) NOT NULL,
  `irszam` varchar(4) NOT NULL,
  `varos` varchar(100) NOT NULL,
  `utcahaz` varchar(100) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kapcsolatarto` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `szalitasi_pontok`
--

INSERT INTO `szalitasi_pontok` (`id`, `megnevezes`, `irszam`, `varos`, `utcahaz`, `telefon`, `email`, `kapcsolatarto`) VALUES
(1, 'mol', '7895', 'Nyíregyháza', 'Kosuth u. 47.', '544887898968', 'asdasd@gmail.com', 'julinéni'),
(2, 'asd', '9845', 'Anyádba', 'Fő u. 45', '5464848494', 'asdfasdf@freemail.hu', 'julinéni');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` tinyint(4) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `tags`
--

INSERT INTO `tags` (`id`, `description`) VALUES
(1, 'Tudomány'),
(2, 'IT/Tech'),
(3, 'Film'),
(4, 'Játék');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `rights` tinyint(4) NOT NULL,
  `aktiv` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `uname`, `upass`, `email`, `rights`, `aktiv`) VALUES
(1, 'asdasd', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 0),
(2, 'boor13', 'boor13', '$1$5/5.o/0.$svInTG1E/2lOS7/v.3EjB1', 'boor1396@gmail.com', 1, 0),
(3, 'boor14', 'boor14', '$1$Ra3.Gs0.$nIL5WIw1L2EJp50lJLjX61', 'asdasd@gmail.com', 2, 0),
(4, 'lorvei', 'lorvei', '$1$Xb2.Uz2.$nbQpMNTtw9o8bRKTxe2j4.', 'pentalopo@gmail.com', 0, 0),
(5, 'pentalopo', 'pentalopo', '$1$/...au5.$Yhi/9nfGh413YYE1a3B4j0', 'tard@gmail.com', 0, 0);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `csomagok`
--
ALTER TABLE `csomagok`
  ADD CONSTRAINT `csomagok_ibfk_1` FOREIGN KEY (`felado_id`) REFERENCES `feladok` (`id`),
  ADD CONSTRAINT `csomagok_ibfk_2` FOREIGN KEY (`szallitasi_pont_id`) REFERENCES `szalitasi_pontok` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
