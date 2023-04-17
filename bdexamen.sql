-- phpMyAdmin SQL Dump
-- version 5.2.2-dev+20230301.4c79495c87
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2023 a las 09:16:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdexamen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripciom` int(11) NOT NULL,
  `sigla` varchar(20) DEFAULT NULL,
  `nota1` int(11) DEFAULT NULL,
  `nota2` int(11) DEFAULT NULL,
  `nota3` int(11) DEFAULT NULL,
  `notafinal` int(11) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id_inscripciom`, `sigla`, `nota1`, `nota2`, `nota3`, `notafinal`, `ci`) VALUES
(1, 'MAT', 50, 50, 50, 50, 68536189),
(2, 'MAT', 100, 50, 50, 67, 6853659),
(5, 'INF', 100, 43, 80, 74, 685361834),
(6, 'INF', 60, 43, 80, 61, 2147483647),
(7, 'INF', 60, 60, 80, 67, 3523541),
(8, 'QMC', 50, 68, 50, 59, 68536189),
(9, 'MAT', 100, 43, 80, 74, 5213423);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `departamento` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `fecha_nacimiento`, `telefono`, `departamento`) VALUES
(3523541, 'Juan Pedro2', '1997-09-19', '72522419', 'SC'),
(5213423, 'Juan Pedro 3', '1997-12-28', '(591)7859465', 'PT'),
(6812589, 'Leonel Lima 3', '0000-00-00', '(591)75757575', 'CB'),
(6853618, 'Leonel Lima', '1997-04-22', '63217504', 'LP'),
(6853659, 'Leonel Lima 2', '0000-00-00', '(591)75757575', 'LP'),
(56536189, 'Leonel Lima 4', '0000-00-00', '(591)75757575', 'PT'),
(66236189, 'Leonel Lima 5', '0000-00-00', '(591)75757575', 'PT'),
(68536174, 'Lian Maceda', '2013-04-22', '63217504', 'LP'),
(68536189, 'Leonel Lima 1', '0000-00-00', '(591)75757575', 'LP'),
(685361834, 'Juan Pedro', '1997-09-19', '72522419', ''),
(974166206, 'Luis Pedro', '1997-01-02', '8795465', 'TJ'),
(2147483647, 'Juan Pedro', '1997-09-19', '72522419', 'SC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_usuario` int(11) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_usuario`, `rol`, `ci`) VALUES
(1, 'Director', 6853618),
(2, 'Estudiante', 68536189),
(3, 'Estudiante', 6853659),
(4, 'Estudiante', 6812589),
(5, 'Estudiante', 56536189),
(6, 'Estudiante', 66236189);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `password`, `id_usuario`, `ci`) VALUES
('director123', '123', 1, 6853618),
('estudiante1', '123', 2, 68536189);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_inscripciom`),
  ADD KEY `R_1` (`ci`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `R_3` (`ci`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `R_2` (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id_inscripciom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `R_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `R_3` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `R_2` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
