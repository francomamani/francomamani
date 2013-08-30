-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-01-2013 a las 16:02:32
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto_orange`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `cargo` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`cargo`, `id`) VALUES
('kardex', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

CREATE TABLE IF NOT EXISTS `auxiliar` (
  `id` int(11) NOT NULL,
  `categoria` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`id`, `categoria`) VALUES
(14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `sigla`, `nombre`) VALUES
(5, 'MAT1135', 'ESTADISTICA I'),
(6, 'SIS1110', 'METODOLOGIA DE PROGRAMACION I'),
(8, 'INF2310', 'SISTEMAS OPERATIVOS I'),
(9, 'SIS2330', 'METODOLOGIA DE PROGRAMACION III'),
(10, 'FIS1200', 'FISICA III'),
(11, 'FIS1100', 'FISICA I'),
(12, 'MAT1103', 'ALGEBRA II'),
(13, 'FIS1110', 'FISICA I'),
(14, 'MAT1102', 'CALCULO II'),
(15, 'INF2410', 'ESTRUCTURA DE COMPUTADORES I'),
(16, 'FIS1101', 'FISICA Ii'),
(17, 'QMC1100', 'QUIMICA I'),
(18, 'MAT1207', 'ECUACIONES DIFERENCIALES I'),
(19, 'LIN1100', 'INGLES GENERAL'),
(20, 'LIN1102', 'INGLES II'),
(21, 'SIS2220', 'ANALISIS DE BALANCE'),
(22, 'MAT2987', 'PROGRAMACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `id` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `titulo`) VALUES
(16, 'Lic. Idiomas'),
(17, 'Ingeniera de Sistemas'),
(18, 'Ingeniera en Informática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregaevaluacion`
--

CREATE TABLE IF NOT EXISTS `entregaevaluacion` (
  `nota` int(11) NOT NULL DEFAULT '0',
  `idEstudiante` int(11) NOT NULL,
  `idEvaluacion` int(11) NOT NULL,
  KEY `idEstudiante` (`idEstudiante`,`idEvaluacion`),
  KEY `idEvaluacion` (`idEvaluacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregapractica`
--

CREATE TABLE IF NOT EXISTS `entregapractica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEstudiante` int(11) NOT NULL,
  `idPractica` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEstudiante` (`idEstudiante`,`idPractica`),
  KEY `idPractica` (`idPractica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` int(11) NOT NULL,
  `matricula` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `matricula`) VALUES
(14, 'ma575');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `tipo` tinyint(1) NOT NULL,
  `nota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idCurso` int(11) NOT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE IF NOT EXISTS `gestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semestre` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `gestion`
--

INSERT INTO `gestion` (`id`, `semestre`, `anio`) VALUES
(5, 1, 2013),
(7, 3, 2013),
(8, 2, 2013),
(9, 1, 2014),
(10, 2, 2014),
(11, 3, 2014),
(12, 3, 2018),
(13, 1, 2021),
(14, 2, 2021),
(15, 1, 2027),
(16, 1, 2022),
(17, 3, 2019);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paralelo`
--

CREATE TABLE IF NOT EXISTS `paralelo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCurso` int(11) NOT NULL,
  `idGestion` int(5) NOT NULL,
  `paralelo` char(1) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `idAuxiliar` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCurso` (`idCurso`),
  KEY `idGestion` (`idGestion`),
  KEY `idDocente` (`idDocente`,`idAuxiliar`),
  KEY `idAuxiliar` (`idAuxiliar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `paralelo`
--

INSERT INTO `paralelo` (`id`, `idCurso`, `idGestion`, `paralelo`, `idDocente`, `idAuxiliar`) VALUES
(1, 5, 5, 'A', 17, 18),
(2, 11, 5, 'B', 16, 18),
(3, 11, 5, 'D', 16, 18),
(4, 22, 16, 'O', 16, 18),
(5, 11, 15, 'C', 16, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion`
--

CREATE TABLE IF NOT EXISTS `planificacion` (
  `objetivoCurso` text NOT NULL,
  `temas` text NOT NULL,
  `bibliografia` text NOT NULL,
  `idParalelo` int(11) NOT NULL,
  PRIMARY KEY (`idParalelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponderacion`
--

CREATE TABLE IF NOT EXISTS `ponderacion` (
  `examParciales` int(11) NOT NULL,
  `examFinal` int(11) NOT NULL,
  `laboratorio` int(11) NOT NULL,
  `practicas` int(11) NOT NULL,
  `auxiliatura` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE IF NOT EXISTS `practica` (
  `nroPractica` int(11) NOT NULL,
  `fechaEmision` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `tema` varchar(40) NOT NULL,
  `idCurso` int(11) NOT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `texto` text NOT NULL,
  ` idPractica` int(11) NOT NULL,
  PRIMARY KEY (` idPractica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `idEstudiante` int(11) NOT NULL,
  `idParalelo` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  KEY `idUsuario` (`idEstudiante`,`idParalelo`),
  KEY `idCurso` (`idParalelo`),
  KEY `idUsuario_2` (`idEstudiante`),
  KEY `idCurso_2` (`idParalelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
  `texto` text NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  KEY `idEstudiante` (`idEstudiante`,`idPregunta`),
  KEY `idPregunta` (`idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuenta` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `ci` varchar(13) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `prioridad` int(11) NOT NULL DEFAULT '0',
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `cuenta`, `password`, `ci`, `nombres`, `apellidos`, `prioridad`, `email`) VALUES
(12, 'marcelo', '123', '7689654 OR', 'Marcelo', 'Quiroz Alcocer', 3, 'marcelo@gmail.com'),
(14, 'franco', '123', '7275047 OR', 'Franco Jesus', 'Mamani Pozo', 0, 'mamanipozofrancojesus@gmail.com'),
(16, 'alejandra', '123', '7656487 OR', 'Alejandra Emily', 'Martinez Arias', 2, 'alemly@hotmail.co'),
(17, 'ruby', '123', '7654254 OR', 'Ruby', 'Mamani Flores', 2, 'ruby@gmail.com'),
(18, 'ana', '123', '7345637 OR', 'Ana', 'Mauricio Gutierrez', 1, 'anita@hotmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD CONSTRAINT `auxiliar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `estudiante` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregaevaluacion`
--
ALTER TABLE `entregaevaluacion`
  ADD CONSTRAINT `entregaevaluacion_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entregaevaluacion_ibfk_2` FOREIGN KEY (`idEvaluacion`) REFERENCES `evaluacion` (`idCurso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregapractica`
--
ALTER TABLE `entregapractica`
  ADD CONSTRAINT `entregapractica_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entregapractica_ibfk_2` FOREIGN KEY (`idPractica`) REFERENCES `practica` (`idCurso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `evaluacion_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `paralelo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `paralelo`
--
ALTER TABLE `paralelo`
  ADD CONSTRAINT `paralelo_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paralelo_ibfk_2` FOREIGN KEY (`idGestion`) REFERENCES `gestion` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paralelo_ibfk_3` FOREIGN KEY (`idDocente`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paralelo_ibfk_4` FOREIGN KEY (`idAuxiliar`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD CONSTRAINT `planificacion_ibfk_1` FOREIGN KEY (`idParalelo`) REFERENCES `paralelo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ponderacion`
--
ALTER TABLE `ponderacion`
  ADD CONSTRAINT `ponderacion_ibfk_1` FOREIGN KEY (`idcurso`) REFERENCES `paralelo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `practica`
--
ALTER TABLE `practica`
  ADD CONSTRAINT `practica_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `paralelo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (` idPractica`) REFERENCES `practica` (`idCurso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_3` FOREIGN KEY (`idEstudiante`) REFERENCES `evaluacion` (`idCurso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`idPregunta`) REFERENCES `pregunta` (` idPractica`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
