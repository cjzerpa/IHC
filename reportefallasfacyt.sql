-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2015 a las 05:55:35
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `reportefallasfacyt`
--
CREATE DATABASE IF NOT EXISTS `reportefallasfacyt` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `reportefallasfacyt`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE IF NOT EXISTS `reporte` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `Asunto` varchar(30) NOT NULL,
  `Descrip` varchar(120) NOT NULL,
  `Estado` varchar(15) NOT NULL DEFAULT 'En Progreso',
  `Depto` varchar(15) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico_atiende_reporte`
--

CREATE TABLE IF NOT EXISTS `tecnico_atiende_reporte` (
  `Id_repor_tecn` int(11) NOT NULL AUTO_INCREMENT,
  `User_repor_tecn` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_repor_tecn`,`User_repor_tecn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userrealizarepor`
--

CREATE TABLE IF NOT EXISTS `userrealizarepor` (
  `User_usuar` varchar(30) NOT NULL,
  `Email_usuar` varchar(30) NOT NULL,
  `Telefono_usuar` varchar(15) DEFAULT NULL,
  `Id_repor` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `Asunto` varchar(30) NOT NULL,
  `Descrip` varchar(120) NOT NULL,
  `Estado` varchar(15) NOT NULL DEFAULT 'En Progreso',
  `Depto` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_repor`),
  KEY `User_usuar` (`User_usuar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Escuela` varchar(30) NOT NULL,
  `User_usuar` varchar(30) NOT NULL,
  `Pass_usuar` varchar(100) NOT NULL,
  `Email_usuar` varchar(30) NOT NULL,
  `Telefono_usuar` varchar(15) DEFAULT NULL,
  `verf_tecnico` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`User_usuar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nombre`, `Apellido`, `Escuela`, `User_usuar`, `Pass_usuar`, `Email_usuar`, `Telefono_usuar`, `verf_tecnico`) VALUES
('Carlos', 'Zerpa', 'Computacion', 'czerpa', '$2a$07$KE7098G8508CJF80KEHFAuNSnS2DxQ2KhLhNJPfznNushmynsvtSW', 'czerpa@correo.com', '61634665', 1),
('Daniel', 'Gazcon', 'Computacion', 'dgazcon', '$2a$07$/0DBBE114F3/61D2K3960usQoNLfj1alEEN/8vBC3pA/IlH.MM.Pq', 'dgazcon@correo.com', '123456789', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `userrealizarepor`
--
ALTER TABLE `userrealizarepor`
  ADD CONSTRAINT `userrealizarepor_ibfk_1` FOREIGN KEY (`User_usuar`) REFERENCES `usuario` (`User_usuar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userrealizarepor_ibfk_2` FOREIGN KEY (`Id_repor`) REFERENCES `reporte` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
