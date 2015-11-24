-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-11-2015 a las 15:05:59
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
  `up_vote` int(10) NOT NULL,
  `down_vote` int(10) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `R_2` (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_post`, `username`, `comment`, `date`, `up_vote`, `down_vote`) VALUES
(15, 292, 'admin', 'hola', '0000-00-00 00:00:00', 2, 1),
(20, 294, 'lili', 'Que la tierra es redonda Ok!!', '0000-00-00 00:00:00', 0, 1),
(21, 292, 'admin', 'test 2', '0000-00-00 00:00:00', 1, 1),
(22, 295, 'admin', 'test11', '2015-11-08 04:29:11', 0, 0),
(23, 295, 'albu', 'si', '2015-11-08 04:33:22', 0, 0),
(24, 296, 'admin', 'La grafica de una parabola es como una U, depende del coeficiente de ella.', '2015-11-11 04:23:20', 0, 0),
(25, 292, 'admin', 'no', '2015-11-11 04:25:17', 0, 0),
(26, 292, 'admin', 'test67', '2015-11-11 04:26:59', 0, 0),
(27, 292, 'lili', 'test28', '2015-11-12 08:42:13', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_muro`
--

CREATE TABLE IF NOT EXISTS `comentario_muro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `user` varchar(25) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `comentario_muro`
--

INSERT INTO `comentario_muro` (`id`, `id_post`, `comentario`, `user`, `date`) VALUES
(21, 37, 'test15', 'admin', '2015-11-08 05:02:14'),
(22, 37, 'test 16', 'admin', '2015-11-08 05:02:24'),
(23, 37, 'si', 'admin', '2015-11-08 05:07:24'),
(24, 36, 'yo', 'albu', '2015-11-08 05:13:55'),
(25, 0, 'lilit645', 'admin', '2015-11-08 05:25:29'),
(26, 0, 'lili', 'admin', '2015-11-08 05:25:45'),
(27, 0, 'albu', 'admin', '2015-11-08 05:25:51'),
(28, 36, 'hi', 'admin', '2015-11-10 09:54:28'),
(29, 37, 'h', 'admin', '2015-11-10 09:58:46'),
(30, 36, 'comentario\nhi\n', 'albu', '2015-11-10 10:10:11'),
(31, 37, 'si', 'admin', '2015-11-10 10:10:40'),
(32, 36, 'comentariono\n\n', 'albu', '2015-11-10 10:10:49'),
(33, 36, 'hi\n\n', 'albu', '2015-11-10 10:11:00'),
(34, 37, 'gi', 'admin', '2015-11-10 10:11:17'),
(35, 36, 'g\n\n\n', 'albu', '2015-11-10 10:13:15'),
(36, 38, 'g', 'albu', '2015-11-10 10:13:49'),
(37, 37, 'h', 'admin', '2015-11-10 10:14:13'),
(38, 37, 'si', 'admin', '2015-11-11 04:18:56'),
(39, 31, 'si', 'admin', '2015-11-11 04:19:19'),
(40, 37, 'si', 'lili', '2015-11-11 04:19:38'),
(41, 37, 'Hola como estas, me parece muy bien este aporte que estes bien. Otra prueba que tenemos', 'lili', '2015-11-11 04:20:38'),
(42, 0, 'luz', 'admin', '2015-11-12 07:05:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friend_requests`
--

CREATE TABLE IF NOT EXISTS `friend_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `aceptada` tinyint(1) NOT NULL DEFAULT '0',
  `enviada` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_from`, `user_to`, `aceptada`, `enviada`) VALUES
(1, 'albu', 'admin', 1, 1),
(11, 'lili', 'admin', 1, 1),
(20, 'admin', 'luz', 0, 1),
(21, 'luz', 'lili', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeInterno`
--

CREATE TABLE IF NOT EXISTS `mensajeInterno` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `toUser` varchar(40) DEFAULT NULL,
  `fromUser` varchar(40) DEFAULT NULL,
  `leido` varchar(40) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `mensajeInterno`
--

INSERT INTO `mensajeInterno` (`id`, `toUser`, `fromUser`, `leido`, `fecha`, `texto`) VALUES
(10, 'admin', 'albu', 'no', '2015-11-08 04:13:49', 'hola'),
(11, 'admin', 'albu', 'si', '2015-11-08 04:23:48', 'que mas'),
(12, 'lili', 'admin', 'si', '2015-11-11 04:28:02', 'saludos a todos');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `muro`
--

INSERT INTO `muro` (`id`, `body`, `date_added`, `username`, `up_vote`, `down_vote`) VALUES
(21, 'hola 11222', '2015-09-17 13:44:29', 'admin', 12, 2),
(25, 'test1 dos', '2015-09-27 04:22:41', 'admin', 1, 1),
(23, 'hi', '2015-09-27 04:13:51', 'admin', 2, 4),
(28, 'Bienvenidos', '0000-00-00 00:00:00', 'lilit645', 1, 1),
(31, 'hi ls', '0000-00-00 00:00:00', 'lili', 5, 1),
(32, 'gh', '0000-00-00 00:00:00', 'lili', 1, 0),
(33, 'ggg\n', '0000-00-00 00:00:00', 'lili', 0, 0),
(34, 'Me gusta la pagina', '0000-00-00 00:00:00', 'admin', 4, 4),
(37, 'test13', '2015-11-08 04:30:56', 'admin', 1, 1),
(36, 'si', '2015-11-08 04:09:40', 'albu', 1, 0),
(38, 'gg', '2015-11-10 09:58:28', 'albu', 1, 0),
(39, 'mi primera publicacion', '2015-11-11 06:00:34', 'luz', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=297 ;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `date`, `categoria`, `title`, `description`, `pos`, `neg`, `count_comments`) VALUES
(292, 1, '0000-00-00 00:00:00', 'matematicas', 'Regresion', 'Que es regresion', NULL, NULL, NULL),
(294, 6, '2015-10-10 21:05:41', 'fisica', 'Por que la tierra es redonda?', 'En este espacio quiero hacer incapie en el hecho de que la tierra no es redonda, tiene forma de elipsoide!!!', NULL, NULL, NULL),
(295, 1, '2015-11-08 04:26:44', 'matematicas', 'PDE', 'Que es una ecuacion diferencial', NULL, NULL, NULL),
(296, 6, '2015-11-11 04:21:20', 'matematicas', 'Reflexiones', 'Como es la grafica de la parabola', NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `uploads`
--

INSERT INTO `uploads` (`id`, `username`, `img_name`, `upload_date`) VALUES
(4, 'admin', '16.jpg', ''),
(5, 'lili', '15.jpg', ''),
(6, 'albu', 'uno.gif', ''),
(7, 'lilit645', 'uno.gif', ''),
(8, 'luz', 'uno.gif', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `sign_up_date`, `type`) VALUES
(1, 'admin', 'Alcibiades', 'Zarate', 'alcy1@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00', 'administrador'),
(6, 'lili', 'Liz', 'Teran', 'lili_t6@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-09-20 14:30:03', ''),
(9, 'albu', 'ant', 'Zarate', 'albu@yahoo.com', 'd93591bdf7860e1e4ee2fca799911215', '2015-09-25 17:26:51', ''),
(10, 'lilit645', 'Liz ', 'teran herrera', 'teran.liz@hotmail.com', 'a64dcad23ae0b287f7bcb6d9010fa2cb', '0000-00-00 00:00:00', ''),
(11, 'luz', 'Luz', 'Santos', 'luz@yahoo.com', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
