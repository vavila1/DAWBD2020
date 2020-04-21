-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-04-2020 a las 22:42:44
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rehabilitacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `id_fisioterapeuta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `usuario`, `contrasena`, `id_fisioterapeuta`) VALUES
(1, 'vavila', '123', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fisioterapeuta`
--

CREATE TABLE `fisioterapeuta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fisioterapeuta`
--

INSERT INTO `fisioterapeuta` (`id`, `nombre`, `apellidop`, `apellidom`) VALUES
(1, 'Karla', 'Larios', 'Olivares'),
(2, 'Laura', 'Hernandez', 'Yañez'),
(3, 'Victor Manuel', 'Avila', 'Eichelmann');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `edad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nombre`, `apellidop`, `apellidom`, `edad`) VALUES
(1, 'Victor Manuel', 'Avila', 'Hernandez', 23),
(2, 'Eduardo Gerardo', 'Rodriguez', 'Hernandez', 25),
(3, 'Leonardo Gabriel', 'Rodriguez', 'Hernandez', 17),
(4, 'Victor Manuel', 'Guzman', 'Lopez', 35),
(10, 'Rodrigo', 'Pliego', 'Salinas', 32),
(11, 'Jose', 'Peralta', 'Mollinedo', 53),
(14, 'Hector', 'Herrera', 'Padilla', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_fisioterapeuta` int(11) NOT NULL,
  `pie` varchar(10) NOT NULL,
  `grado` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`id`, `id_paciente`, `id_fisioterapeuta`, `pie`, `grado`, `created_at`) VALUES
(1, 1, 3, 'derecho', 35, '2020-03-30 00:42:11'),
(2, 1, 1, 'derecho', 45, '2020-03-30 00:42:42'),
(3, 1, 2, 'derecho', 50, '2020-03-30 00:43:14'),
(4, 2, 1, 'izquierdo', 35, '2020-03-30 00:43:43'),
(5, 1, 2, 'izquierdo', 34, '2020-03-30 00:44:39'),
(6, 2, 1, 'izquierdo', 35, '2020-03-30 02:16:58'),
(7, 3, 2, 'derecho', 34, '2020-03-30 02:22:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fisio_id` (`id_fisioterapeuta`);

--
-- Indices de la tabla `fisioterapeuta`
--
ALTER TABLE `fisioterapeuta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_fisioterapeuta` (`id_fisioterapeuta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fisioterapeuta`
--
ALTER TABLE `fisioterapeuta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `fisio_id` FOREIGN KEY (`id_fisioterapeuta`) REFERENCES `fisioterapeuta` (`id`);

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `sesion_id_fisioterapeuta` FOREIGN KEY (`id_fisioterapeuta`) REFERENCES `fisioterapeuta` (`id`),
  ADD CONSTRAINT `sesion_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
