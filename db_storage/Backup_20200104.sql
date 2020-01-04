-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2020 a las 12:12:51
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.2.25

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
(1, 'CoD Modern Warfare', 'First Person Shooter', 'mw', 'READY', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2020-01-04 11:34:51', 0),
(2, 'League Of Legends', 'MOBA', 'lol', 'READY', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-11-08 14:06:30', 0),
(3, 'Apex Legends', 'Battle Royale', 'apex', 'READY', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2020-01-04 11:52:24', 0),
(4, 'Fortnite', 'Battle Royale', 'fortnite', 'READY', 1, '', 0, '2019-10-07 11:17:58', 0, '2020-01-04 12:00:02', 0),
(5, 'Fifa 20', 'Football Simulator', 'fifa', 'PENDING', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-10-07 12:18:11', 0),
(6, 'CoD Black Ops 4', 'First Person Shooter', 'bo4', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:25', 0),
(7, 'CoD Black Ops 4', 'First Person Shooter', 'bo4', 'PENDING', 0, 'XBOX', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:27', 0),
(8, 'CoD Black Ops 4', 'First Person Shooter', 'bo4', 'PENDING', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:26', 0),
(9, 'CS:GO', 'First Person Shooter', 'csgo', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:24', 0),
(10, 'Apex Legends', 'Battle Royale', 'apex', 'PENDING', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:21:28', 0),
(11, 'Apex Legends', 'Battle Royale', 'apex', 'PENDING', 0, 'XBOX', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:21:33', 0),
(12, 'CoD Modern Warfare', 'First Person Shooter', 'mw', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2020-01-04 11:52:09', 0),
(13, 'CoD Modern Warfare', 'First Person Shooter', 'mw', 'PENDING', 0, 'XBOX', 0, '2019-10-07 11:17:58', 0, '2020-01-04 11:52:15', 0);

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
(1, 3, 1, 1, 'JoseCalvi1', 'SMG Objective', 'Menos de dos horas', 'Mañana | Tarde | ', 3, '2019-11-29 10:50:58', 0, '2019-12-02 15:28:14', 0),
(2, 2, 1, 0, 'aromeroCoD', 'Slayer', 'Menos de 2 horas', 'Mañana | Tarde | ', 2, '2019-11-29 10:52:28', 0, '2019-12-04 10:27:44', 0),
(5, 2, 2, 0, 'aromeroLoL', 'Mid Lane', 'Entre 2 y 4 horas', 'Mañana | Tarde | Noche', 2, '2019-12-02 10:55:51', 0, '2019-12-02 10:55:51', 0),
(6, 3, 2, 0, 'King JoseCalvi', 'Top Lane', 'Menos de dos horas', 'Noche |  | ', 3, '2019-12-03 07:52:33', 0, '2019-12-03 07:52:33', 0),
(7, 3, 4, 0, 'JoseCalvi1', NULL, 'Menos de dos horas', 'Mañana |  | ', 3, '2020-01-04 12:00:29', 0, '2020-01-04 12:00:29', 0);

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
(14, 2, 'Support', 0, '2019-11-05 17:30:47', 0, '2019-11-05 17:31:30', 0),
(23, 3, 'Bangalore', 0, '2019-11-05 17:28:57', 0, '2019-11-05 17:28:57', 0),
(24, 3, 'Bloodhound', 0, '2019-11-05 17:28:57', 0, '2019-11-05 17:28:57', 0),
(25, 3, 'Caustic', 0, '2020-01-04 11:50:32', 0, '2020-01-04 11:50:32', 0),
(26, 3, 'Crypto', 0, '2020-01-04 11:50:32', 0, '2020-01-04 11:50:32', 0),
(27, 3, 'Gibraltar', 0, '2020-01-04 11:50:32', 0, '2020-01-04 11:50:32', 0),
(28, 3, 'Lifeline', 0, '2020-01-04 11:50:32', 0, '2020-01-04 11:50:32', 0),
(29, 3, 'Mirage', 0, '2020-01-04 11:50:32', 0, '2020-01-04 11:50:32', 0),
(30, 3, 'Octane', 0, '2020-01-04 11:50:32', 0, '2020-01-04 11:50:32', 0),
(31, 3, 'Pathfinder', 0, '2020-01-04 11:50:32', 0, '2020-01-04 11:50:32', 0),
(32, 3, 'Wattson', 0, '2020-01-04 11:50:32', 0, '2020-01-04 11:50:32', 0),
(33, 3, 'Wraith', 0, '2020-01-04 11:50:32', 0, '2020-01-04 11:50:32', 0);

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
(1, 1, 3, 'PaVe Gaming', 'PaVe', 'Equipo legendario de CoD WII', 'Más de 4 horas', 'Tarde | Noche | ', 3, '2019-11-29 10:51:55', 0, '2019-11-29 11:26:27', 0);

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
  `active` tinyint(4) NOT NULL DEFAULT 1,
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
(3, 'Jose Calvillo', 'jcalvi@tourismoptimizerplatform.com', 'jcalvi', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0),
(6, 'Daniel Rubio', 'daniel.rubio@tourismoptimizerplatform.com', 'danie', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-11-28 13:33:37', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `esf_game_profiles`
--
ALTER TABLE `esf_game_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `esf_game_roles`
--
ALTER TABLE `esf_game_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `esf_messages`
--
ALTER TABLE `esf_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `esf_teams`
--
ALTER TABLE `esf_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `esf_trades`
--
ALTER TABLE `esf_trades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `esf_users`
--
ALTER TABLE `esf_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
