-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-10-2015 a las 21:27:27
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `choteando`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `R_2` (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_post`, `username`, `comment`, `date`) VALUES
(15, 292, 'admin', 'hola', '0000-00-00 00:00:00'),
(20, 294, 'lili', 'Que la tierra es redonda Ok!!', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_muro`
--

CREATE TABLE IF NOT EXISTS `comentario_muro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `comentario_muro`
--

INSERT INTO `comentario_muro` (`id`, `id_post`, `comentario`) VALUES
(1, 31, 'sss'),
(2, 31, 'mas'),
(3, 31, 'mas'),
(4, 32, 'hi'),
(5, 21, 'hola'),
(6, 21, 'como estan todos'),
(7, 25, 'este es un poscomentario'),
(8, 31, 'otro comentario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friend_requests`
--

CREATE TABLE IF NOT EXISTS `friend_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `aceptada` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_from`, `user_to`, `aceptada`) VALUES
(1, 'albu', 'admin', 1),
(10, 'admin', 'lili', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muro`
--

CREATE TABLE IF NOT EXISTS `muro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `date_added` datetime NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `up_vote` int(10) unsigned NOT NULL,
  `down_vote` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `muro`
--

INSERT INTO `muro` (`id`, `body`, `date_added`, `username`, `up_vote`, `down_vote`) VALUES
(21, 'hola 11222', '2015-09-17 13:44:29', 'admin', 12, 2),
(25, 'test1 dos', '2015-09-27 04:22:41', 'admin', 1, 1),
(23, 'hi', '2015-09-27 04:13:51', 'admin', 2, 4),
(28, 'Bienvenidos', '0000-00-00 00:00:00', 'lilit645', 1, 1),
(31, 'hi ls', '0000-00-00 00:00:00', 'lili', 5, 0),
(32, 'gh', '0000-00-00 00:00:00', 'lili', 1, 0),
(33, 'ggg\n', '0000-00-00 00:00:00', 'lili', 0, 0),
(34, 'Me gusta la pagina', '0000-00-00 00:00:00', 'admin', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(20) NOT NULL,
  `date` datetime NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `pos` int(11) DEFAULT NULL,
  `neg` int(11) DEFAULT NULL,
  `count_comments` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=295 ;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `date`, `categoria`, `title`, `description`, `pos`, `neg`, `count_comments`) VALUES
(292, 1, '0000-00-00 00:00:00', 'matematicas', 'Regresion', 'Que es regresion', NULL, NULL, NULL),
(294, 6, '2015-10-10 21:05:41', 'fisica', 'Por que la tierra es redonda?', 'En este espacio quiero hacer incapie en el hecho de que la tierra no es redonda, tiene forma de elipsoide!!!', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `img_name` varchar(32) NOT NULL,
  `upload_date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `uploads`
--

INSERT INTO `uploads` (`id`, `username`, `img_name`, `upload_date`) VALUES
(4, 'admin', '16.jpg', ''),
(5, 'lili', '15.jpg', ''),
(6, 'albu', 'uno.gif', ''),
(7, 'lilit645', 'uno.gif', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `sign_up_date` datetime NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `sign_up_date`, `type`) VALUES
(1, 'admin', 'Alcibiades', 'Zarate', 'alcy1@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00', 'administrador'),
(6, 'lili', 'Liz', 'Teran', 'lili_t6@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-09-20 14:30:03', ''),
(9, 'albu', 'ant', 'Zarate', 'albu@yahoo.com', 'd93591bdf7860e1e4ee2fca799911215', '2015-09-25 17:26:51', ''),
(10, 'lilit645', 'Liz ', 'teran herrera', 'teran.liz@hotmail.com', 'a64dcad23ae0b287f7bcb6d9010fa2cb', '0000-00-00 00:00:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
