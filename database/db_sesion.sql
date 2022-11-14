-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 00:56:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sesion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeones`
--

CREATE TABLE `campeones` (
  `id_campeones` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_juego` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `campeones`
--

INSERT INTO `campeones` (`id_campeones`, `nombre`, `id_juego`, `duracion`, `fecha`) VALUES
(29, 'Franco', 28, 30, '2022-10-15'),
(33, 'Daniela', 27, 14, '2022-09-29'),
(34, 'Julian', 28, 132, '2022-09-25'),
(35, 'Camilo', 30, 587, '2022-09-21'),
(37, 'Tomas', 27, 1234, '2022-10-12'),
(38, 'Nicolas', 28, 23, '2022-09-28'),
(40, 'Rocio', 28, 142, '2022-09-27'),
(42, 'Camilo', 33, 78, '2022-09-28'),
(43, 'Daniela', 34, 15, '2022-10-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesadejuego`
--

CREATE TABLE `mesadejuego` (
  `id_mesadejuego` int(11) NOT NULL,
  `juego` varchar(100) NOT NULL,
  `director` varchar(50) DEFAULT NULL,
  `cantidadJugadores` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesadejuego`
--

INSERT INTO `mesadejuego` (`id_mesadejuego`, `juego`, `director`, `cantidadJugadores`) VALUES
(27, 'Catan', 'Ladron', 8),
(28, 'La vida', 'La Suerte', 1),
(30, 'Cobra', 'La Cobra', 4),
(33, 'Chanco', 'no', 8),
(34, 'Ajedrez', 'no', 2),
(35, 'Truco', 'no', 6),
(36, 'Policias y Ladrones', 'Dios', 15),
(37, 'Truco', '123', 123),
(38, '123', '123', 123),
(39, 'AAA', 'AAA', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `name_usuario` varchar(15) NOT NULL,
  `password_usuario` varchar(255) NOT NULL,
  `log_usuario` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `name_usuario`, `password_usuario`, `log_usuario`) VALUES
(4, 'marianoadmin', '$2y$10$AP0cnhS7ZX/byGZJto2lg.OZ5wjwmfp0eMX8l.07lNp1LlBzbaNYu', NULL),
(5, 'danielaadmin', '$2y$10$QOBVsT/XetdOMjqBWLZLHOpW9jJuh1Sy7nuCvmZaEDI4SmJWf5Fna', NULL),
(6, 'PedroPetersen', '$2y$10$g./cqKD1l9JhaYC9c8gdb.Kp2uVtQd7axm4twXDLhmEbfpQPBezMu', 1),
(7, 'PedroFava', '$2y$10$a7A//o7gu5oVgycqyJb9zOUwbU41H6hzXVC6U1Zwx7iBTnw2XnpG2', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campeones`
--
ALTER TABLE `campeones`
  ADD PRIMARY KEY (`id_campeones`),
  ADD KEY `id_juego` (`id_juego`);

--
-- Indices de la tabla `mesadejuego`
--
ALTER TABLE `mesadejuego`
  ADD PRIMARY KEY (`id_mesadejuego`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campeones`
--
ALTER TABLE `campeones`
  MODIFY `id_campeones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `mesadejuego`
--
ALTER TABLE `mesadejuego`
  MODIFY `id_mesadejuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campeones`
--
ALTER TABLE `campeones`
  ADD CONSTRAINT `campeones_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `mesadejuego` (`id_mesadejuego`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
