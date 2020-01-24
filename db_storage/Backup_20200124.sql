-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2020 a las 20:24:50
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `esportsfinder_v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esf_games`
--

CREATE TABLE `esf_games` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin DEFAULT NULL,
  `media` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'PENDING',
  `crossplay` tinyint(4) NOT NULL DEFAULT 0,
  `platform` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `esf_games`
--

INSERT INTO `esf_games` (`id`, `name`, `description`, `media`, `status`, `crossplay`, `platform`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
(1, 'CoD Modern Warfare', 'First Person Shooter', 'mw', 'READY', 1, '', 0, '2019-10-07 11:17:58', 0, '2019-11-11 17:57:49', 0),
(2, 'League Of Legends', 'MOBA', 'lol', 'READY', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-11-08 14:06:30', 0),
(3, 'Apex Legends', 'Battle Royale', 'apex', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-10-07 12:17:28', 0),
(4, 'Fortnite', 'Battle Royale', 'fortnite', 'READY', 1, '', 0, '2019-10-07 11:17:58', 0, '2020-01-16 10:10:21', 0),
(5, 'Fifa 20', 'Football Simulator', 'fifa', 'PENDING', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-10-07 12:18:11', 0),
(6, 'CoD Black Ops 4', 'First Person Shooter', 'bo4', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:25', 0),
(7, 'CoD Black Ops 4', 'First Person Shooter', 'bo4', 'PENDING', 0, 'XBOX', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:27', 0),
(8, 'CoD Black Ops 4', 'First Person Shooter', 'bo4', 'PENDING', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:26', 0),
(9, 'CS:GO', 'First Person Shooter', 'csgo', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:24', 0),
(10, 'Apex Legends', 'Battle Royale', 'apex', 'PENDING', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:21:28', 0),
(11, 'Apex Legends', 'Battle Royale', 'apex', 'PENDING', 0, 'XBOX', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:21:33', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esf_game_profiles`
--

CREATE TABLE `esf_game_profiles` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_team` int(11) DEFAULT 0,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `play_time` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `availability` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `esf_game_profiles`
--

INSERT INTO `esf_game_profiles` (`id`, `id_user`, `id_game`, `id_team`, `name`, `description`, `play_time`, `availability`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
(1, 3, 1, 1, 'JoseCalvi1', 'Objective', 'Menos de dos horas', 'Mañana | Tarde | ', 3, '2019-11-29 10:50:58', 0, '2019-12-05 12:39:46', 0),
(2, 2, 1, 0, 'aromeroCoD', 'Slayer', 'Menos de 2 horas', 'Mañana | Tarde | ', 2, '2019-11-29 10:52:28', 0, '2019-12-04 13:39:14', 0),
(5, 2, 2, 0, 'aromeroLoL', 'Mid Lane', 'Entre 2 y 4 horas', 'Mañana | Tarde | Noche', 2, '2019-12-02 10:55:51', 0, '2019-12-02 10:55:51', 0),
(9, 6, 1, 2, 'Dani2033', 'Objective', 'Entre dos y cuatro horas', 'Tarde | Noche | ', 6, '2019-12-05 10:42:29', 0, '2019-12-05 12:37:00', 0),
(10, 3, 2, 3, 'King JoseCalvi', 'Support', 'Menos de dos horas', 'Noche |  | ', 3, '2020-01-08 13:13:39', 0, '2020-01-16 09:08:29', 0),
(11, 3, 4, 4, 'JoseCalvi1', NULL, 'Entre dos y cuatro horas', 'Mañana |  | ', 3, '2020-01-16 09:11:40', 0, '2020-01-16 09:12:11', 0),
(12, 7, 1, 0, 'elking', 'Support', 'Menos de dos horas', 'Tarde |  | ', 7, '2020-01-22 07:39:51', 0, '2020-01-22 07:39:51', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esf_game_roles`
--

CREATE TABLE `esf_game_roles` (
  `id` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `esf_game_roles`
--

INSERT INTO `esf_game_roles` (`id`, `id_game`, `name`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
(6, 1, 'Slayer', 0, '2019-11-05 17:28:57', 0, '2019-11-05 17:28:57', 0),
(7, 1, 'Anchor', 0, '2019-11-05 17:29:10', 0, '2019-11-05 17:29:41', 0),
(8, 1, 'Objective', 0, '2019-11-05 17:29:48', 0, '2019-11-05 17:30:02', 0),
(9, 1, 'Support', 0, '2019-11-05 17:30:15', 0, '2019-11-05 17:30:15', 0),
(10, 2, 'Top Lane', 0, '2019-11-05 17:30:40', 0, '2019-11-05 17:30:57', 0),
(11, 2, 'Jungle', 0, '2019-11-05 17:30:42', 0, '2019-11-05 17:31:10', 0),
(12, 2, 'Mid Lane', 0, '2019-11-05 17:30:44', 0, '2019-11-05 17:31:14', 0),
(13, 2, 'Bot Lane', 0, '2019-11-05 17:30:45', 0, '2019-11-05 17:31:26', 0),
(14, 2, 'Support', 0, '2019-11-05 17:30:47', 0, '2019-11-05 17:31:30', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esf_messages`
--

CREATE TABLE `esf_messages` (
  `id` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL DEFAULT 0,
  `id_user_to` int(11) NOT NULL DEFAULT 0,
  `id_game` int(11) NOT NULL DEFAULT 0,
  `id_team` int(11) NOT NULL DEFAULT 0,
  `subject` varchar(255) COLLATE utf8_bin NOT NULL,
  `message` text COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `accepted` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `esf_messages`
--

INSERT INTO `esf_messages` (`id`, `id_user_from`, `id_user_to`, `id_game`, `id_team`, `subject`, `message`, `status`, `accepted`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
(1, 2, 3, 0, 0, 'Quiero unirme', 'Hola tio que pasa', '', 0, 2, '2019-11-29 10:52:45', 2, '2019-11-29 10:52:45', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esf_scrims`
--

CREATE TABLE `esf_scrims` (
  `id` int(11) NOT NULL,
  `id_game` int(11) NOT NULL DEFAULT 0,
  `id_team1` int(11) NOT NULL DEFAULT 0,
  `id_team2` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `duration` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_scrim` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `esf_scrims`
--

INSERT INTO `esf_scrims` (`id`, `id_game`, `id_team1`, `id_team2`, `status`, `duration`, `date_scrim`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
(6, 1, 1, 0, 'WAITING', 'Entre 2h y 3h', '2020-01-24 17:30:00', 3, '2020-01-22 15:46:09', 0, '2020-01-22 15:46:09', 0),
(10, 1, 2, 1, 'READY', 'Creo que 3 horas', '2020-01-26 17:30:00', 3, '2020-01-24 19:02:18', 6, '2020-01-24 19:28:01', 0),
(12, 1, 1, 2, 'RESPONSED', 'Entre 2h y 3h', '2020-01-24 17:30:00', 6, '2020-01-24 19:36:17', 0, '2020-01-24 19:36:17', 0),
(13, 1, 2, 0, 'WAITING', 'Supongo que entre 2h y 3h', '2020-01-25 23:00:00', 0, '2020-01-24 20:14:41', 0, '2020-01-24 20:14:41', 0),
(14, 1, 2, 1, 'READY', 'Supongo que entre 2h y 3h', '2020-01-25 23:00:00', 3, '2020-01-24 20:15:06', 6, '2020-01-24 20:15:42', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esf_teams`
--

CREATE TABLE `esf_teams` (
  `id` int(11) NOT NULL,
  `id_game` int(11) NOT NULL DEFAULT 0,
  `id_captain` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `team_tag` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `play_time` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `availability` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `esf_teams`
--

INSERT INTO `esf_teams` (`id`, `id_game`, `id_captain`, `name`, `team_tag`, `description`, `play_time`, `availability`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
(1, 1, 3, 'PaVe Gaming', 'PaVe', 'Equipo legendario de CoD WII', 'Más de 4 horas', 'Tarde | Noche | ', 3, '2019-11-29 10:51:55', 0, '2019-11-29 11:26:27', 0),
(2, 1, 6, 'RGB Master Race', 'ARGB', NULL, 'Menos de dos horas', 'Tarde | Noche | ', 6, '2019-12-05 12:37:00', 0, '2019-12-05 12:37:00', 0),
(3, 2, 3, 'FNATIC', 'FNTC', NULL, 'Menos de dos horas', 'Tarde | Noche | ', 3, '2020-01-16 09:08:29', 0, '2020-01-16 09:08:29', 0),
(4, 4, 3, 'For Noche', 'NGHT', NULL, 'Entre dos y cuatro horas', 'Mañana | Tarde | ', 3, '2020-01-16 09:12:11', 0, '2020-01-16 09:12:11', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esf_trades`
--

CREATE TABLE `esf_trades` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `id_game` int(11) NOT NULL DEFAULT 0,
  `id_team` int(11) NOT NULL DEFAULT 0,
  `action` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `esf_trades`
--

INSERT INTO `esf_trades` (`id`, `id_user`, `id_game`, `id_team`, `action`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
(3, 2, 1, 1, 'IN', 2, '2019-12-04 09:50:14', 0, '2019-12-04 09:50:14', 0),
(4, 2, 1, 1, 'OUT', 2, '2019-12-04 10:27:44', 0, '2019-12-04 10:27:44', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esf_users`
--

CREATE TABLE `esf_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `last_visit_date` datetime NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `esf_users`
--

INSERT INTO `esf_users` (`id`, `name`, `email`, `user_name`, `password`, `active`, `last_visit_date`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
(2, 'Ángel Romero', 'aromero@tourismoptimizerplatform.com', 'aromero', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0),
(3, 'Jose Calvillo', 'jcalvi@tourismoptimizerplatform.com', 'jcalvi', '$1$3oKqSifj$LFNg3nITAptaJ3pZZX5tX0', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0),
(6, 'Daniel Rubio', 'daniel.rubio@tourismoptimizerplatform.com', 'danie', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-11-28 13:33:37', 0),
(7, 'Jose Calvillo Olmedo', 'josecalvilloolmedo@gmail.com', 'josecalvi', '$1$ce8acBoa$7NXfQ0myU04TBN.0l64Ur.', 1, '0000-00-00 00:00:00', '2020-01-22 07:38:11', 0, '2020-01-22 07:39:14', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esf_users_password_link`
--

CREATE TABLE `esf_users_password_link` (
  `id` char(36) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date_generated` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `esf_users_password_link`
--

INSERT INTO `esf_users_password_link` (`id`, `email`, `date_generated`, `deleted`) VALUES
('122924a6-fca6-46cf-b629-02e64bb8e1d9', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:37:38', 0),
('45834838-b94e-44db-9812-4a0b902f95b9', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:32:40', 0),
('49c5d610-cff5-4970-bc97-d3d6a2ffd068', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:15:13', 0),
('4ee43056-274c-410a-9281-42d24f7537dd', 'josecalvilloolmedo@gmail.com', '2020-01-22 08:08:10', 0),
('704a4667-5f50-470c-aa00-dee5fc196668', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:23:33', 0),
('8328f33b-e005-4491-a479-29eb75a4d6b1', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:28:54', 0),
('9d3269f6-d65d-4bda-b839-82252f671e0d', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:22:49', 0),
('aec4ed6d-2eda-427c-8c9e-eb443fa2e9c6', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:31:15', 0),
('cc731844-35e3-44b3-993e-76356816019e', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:43:15', 0),
('d54a07ef-23ca-4090-9c38-175895175fe8', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:14:51', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `esf_games`
--
ALTER TABLE `esf_games`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `esf_game_profiles`
--
ALTER TABLE `esf_game_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Índice 2` (`id_user`,`id_game`),
  ADD KEY `Índice 3` (`id_team`);

--
-- Indices de la tabla `esf_game_roles`
--
ALTER TABLE `esf_game_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Índice 2` (`id_game`);

--
-- Indices de la tabla `esf_messages`
--
ALTER TABLE `esf_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Índice 2` (`id_user_from`,`id_user_to`);

--
-- Indices de la tabla `esf_scrims`
--
ALTER TABLE `esf_scrims`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `esf_teams`
--
ALTER TABLE `esf_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Índice 2` (`id_game`);

--
-- Indices de la tabla `esf_trades`
--
ALTER TABLE `esf_trades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Índice 2` (`id_user`,`id_team`);

--
-- Indices de la tabla `esf_users`
--
ALTER TABLE `esf_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Índice 2` (`email`);

--
-- Indices de la tabla `esf_users_password_link`
--
ALTER TABLE `esf_users_password_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_username` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `esf_games`
--
ALTER TABLE `esf_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `esf_game_profiles`
--
ALTER TABLE `esf_game_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `esf_game_roles`
--
ALTER TABLE `esf_game_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `esf_messages`
--
ALTER TABLE `esf_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `esf_scrims`
--
ALTER TABLE `esf_scrims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `esf_teams`
--
ALTER TABLE `esf_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `esf_trades`
--
ALTER TABLE `esf_trades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `esf_users`
--
ALTER TABLE `esf_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
