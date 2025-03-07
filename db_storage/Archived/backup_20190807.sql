-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2019 a las 18:53:11
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `esports_finder`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod`
--

CREATE TABLE `cod` (
  `id_cod` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modo_pref` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tiempo_juego` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `disponibilidad` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modified_by` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date_entered` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_equipo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cod`
--

INSERT INTO `cod` (`id_cod`, `nombre`, `rol`, `modo_pref`, `descripcion`, `tiempo_juego`, `disponibilidad`, `created_by`, `modified_by`, `date_entered`, `date_modified`, `id_equipo`, `id_usuario`) VALUES
(2, 'usuario', 'usuario', 'Punto Caliente', '', 'Menos de 2 horas', 'Tarde', 'usuario@usuario', 'usuario@usuario', '2019-06-01 16:27:19', '2019-06-01 17:08:27', NULL, NULL),
(3, 'JoseCalvi1', 'Slayer', 'Punto Caliente', '', 'Menos de 2 horas', 'Noche', 'josecalvilloolmedo@gmail.com', 'josecalvilloolmedo@gmail.com', '2019-06-09 19:19:42', '2019-06-09 19:19:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_cod`
--

CREATE TABLE `equipo_cod` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `team_tag` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_jugadores` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tiempo_juego` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `disponibilidad` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modified_by` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date_entered` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_capitan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `send_from` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `send_to` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `send_from`, `send_to`, `mensaje`) VALUES
(1, 'josecalvilloolmedo@gmail.com', 'usuario@usuario', 'sdfsdfsdf'),
(2, 'josecalvilloolmedo@gmail.com', 'usuario@usuario', 'sdfsdfsdf'),
(3, 'josecalvilloolmedo@gmail.com', 'usuario@usuario', 'Buenas! Me gustaría hablar contigo.'),
(4, 'josecalvilloolmedo@gmail.com', 'josecalvilloolmedo@gmail.com', 'Buenas! Me gustaría hablar contigo.'),
(5, 'josecalvilloolmedo@gmail.com', 'josecalvilloolmedo@gmail.com', 'Buenas! Me gustaría hablar contigo.'),
(6, 'josecalvilloolmedo@gmail.com', 'josecalvilloolmedo@gmail.com', 'Buenas! Me gustaría hablar contigo.'),
(7, 'josecalvilloolmedo@gmail.com', 'josecalvilloolmedo@gmail.com', 'Buenas! Me gustaría hablar contigo.'),
(8, 'josecalvilloolmedo@gmail.com', 'josecalvilloolmedo@gmail.com', 'Hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_scrim_cod`
--

CREATE TABLE `team_scrim_cod` (
  `id_teamscrim` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_equipo` int(11) NOT NULL,
  `created_by` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modified_by` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date_entered` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `acepted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modified_by` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date_entered` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_cod` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `correo`, `usuario`, `clave`, `created_by`, `modified_by`, `date_entered`, `date_modified`, `id_cod`) VALUES
(2, 'usuario', 'usuario@usuario', 'usuario', '122b738600a0f74f7c331c0ef59bc34c', 'usuario@usuario', 'usuario@usuario', '2019-06-01 16:27:02', '2019-06-01 16:27:20', 2),
(3, 'Jose Calvillo', 'josecalvilloolmedo@gmail.com', 'JoseCalvi1', '09bde05b8f6b9272fea2fe773d50cffb', 'josecalvilloolmedo@gmail.com', 'josecalvilloolmedo@gmail.com', '2019-06-09 19:19:26', '2019-06-09 19:19:42', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cod`
--
ALTER TABLE `cod`
  ADD PRIMARY KEY (`id_cod`),
  ADD UNIQUE KEY `created_by` (`created_by`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `equipo_cod`
--
ALTER TABLE `equipo_cod`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `fk_capitan` (`id_capitan`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `fk_emisor` (`send_from`);

--
-- Indices de la tabla `team_scrim_cod`
--
ALTER TABLE `team_scrim_cod`
  ADD PRIMARY KEY (`id_teamscrim`),
  ADD KEY `fk_equipo` (`id_equipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cod`
--
ALTER TABLE `cod`
  MODIFY `id_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `equipo_cod`
--
ALTER TABLE `equipo_cod`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `team_scrim_cod`
--
ALTER TABLE `team_scrim_cod`
  MODIFY `id_teamscrim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cod`
--
ALTER TABLE `cod`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `equipo_cod`
--
ALTER TABLE `equipo_cod`
  ADD CONSTRAINT `fk_capitan` FOREIGN KEY (`id_capitan`) REFERENCES `cod` (`id_cod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_emisor` FOREIGN KEY (`send_from`) REFERENCES `cod` (`created_by`);

--
-- Filtros para la tabla `team_scrim_cod`
--
ALTER TABLE `team_scrim_cod`
  ADD CONSTRAINT `fk_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo_cod` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
