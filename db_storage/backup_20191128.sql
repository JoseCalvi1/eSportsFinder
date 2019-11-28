-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla esportsfinder_v2.esf_games
DROP TABLE IF EXISTS `esf_games`;
CREATE TABLE IF NOT EXISTS `esf_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  `media` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'PENDING',
  `crossplay` tinyint(4) NOT NULL DEFAULT '0',
  `platform` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_games: ~10 rows (aproximadamente)
DELETE FROM `esf_games`;
/*!40000 ALTER TABLE `esf_games` DISABLE KEYS */;
INSERT INTO `esf_games` (`id`, `name`, `description`, `media`, `status`, `crossplay`, `platform`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 'CoD Modern Warfare', 'First Person Shooter', 'mw', 'READY', 1, '', 0, '2019-10-07 11:17:58', 0, '2019-11-11 17:57:49', 0),
	(2, 'League Of Legends', 'MOBA', 'lol', 'READY', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-11-08 14:06:30', 0),
	(3, 'Apex Legends', 'Battle Royale', 'apex', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-10-07 12:17:28', 0),
	(4, 'Fortnite', 'Battle Royale', 'fortnite', 'PENDING', 1, '', 0, '2019-10-07 11:17:58', 0, '2019-10-07 12:17:35', 0),
	(5, 'Fifa 20', 'Football Simulator', 'fifa', 'PENDING', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-10-07 12:18:11', 0),
	(6, 'CoD Black Ops 4', 'First Person Shooter', 'bo4', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:25', 0),
	(7, 'CoD Black Ops 4', 'First Person Shooter', 'bo4', 'PENDING', 0, 'XBOX', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:27', 0),
	(8, 'CoD Black Ops 4', 'First Person Shooter', 'bo4', 'PENDING', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:26', 0),
	(9, 'CS:GO', 'First Person Shooter', 'csgo', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:02:24', 0),
	(10, 'Apex Legends', 'Battle Royale', 'apex', 'PENDING', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:21:28', 0),
	(11, 'Apex Legends', 'Battle Royale', 'apex', 'PENDING', 0, 'XBOX', 0, '2019-10-07 11:17:58', 0, '2019-11-11 18:21:33', 0);
/*!40000 ALTER TABLE `esf_games` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_game_profiles
DROP TABLE IF EXISTS `esf_game_profiles`;
CREATE TABLE IF NOT EXISTS `esf_game_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_team` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `play_time` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `availability` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Índice 2` (`id_user`,`id_game`),
  KEY `Índice 3` (`id_team`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_game_profiles: ~5 rows (aproximadamente)
DELETE FROM `esf_game_profiles`;
/*!40000 ALTER TABLE `esf_game_profiles` DISABLE KEYS */;
INSERT INTO `esf_game_profiles` (`id`, `id_user`, `id_game`, `id_team`, `name`, `description`, `play_time`, `availability`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 2, 1, 0, 'aromeroCoD', 'Slayer', '3h', 'Afternoon', 2, '2019-10-23 14:14:10', 0, '2019-11-21 12:48:16', 0),
	(2, 3, 1, 31, 'jcalviCoD', 'Objective', '2-4h', 'Afternoon', 3, '0000-00-00 00:00:00', 0, '2019-11-28 11:01:40', 0),
	(5, 6, 1, 31, 'danieCoD', 'Objective', '2-4h', 'Afternoon', 6, '0000-00-00 00:00:00', 0, '2019-11-28 13:33:08', 0),
	(6, 3, 2, 0, 'jcalviLoL', 'Support', '2-4h', 'Afternoon', 5, '0000-00-00 00:00:00', 0, '2019-11-19 17:23:00', 0),
	(8, 2, 2, 0, 'aromeroLoL', 'Slayer', '3h', 'Afternoon', 2, '2019-10-23 14:14:10', 0, '2019-11-28 10:39:54', 0);
/*!40000 ALTER TABLE `esf_game_profiles` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_game_roles
DROP TABLE IF EXISTS `esf_game_roles`;
CREATE TABLE IF NOT EXISTS `esf_game_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_game` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`id_game`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_game_roles: ~9 rows (aproximadamente)
DELETE FROM `esf_game_roles`;
/*!40000 ALTER TABLE `esf_game_roles` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `esf_game_roles` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_messages
DROP TABLE IF EXISTS `esf_messages`;
CREATE TABLE IF NOT EXISTS `esf_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_from` int(11) NOT NULL DEFAULT '0',
  `id_user_to` int(11) NOT NULL DEFAULT '0',
  `id_game` int(11) NOT NULL DEFAULT '0',
  `id_team` int(11) NOT NULL DEFAULT '0',
  `subject` varchar(255) COLLATE utf8_bin NOT NULL,
  `message` text COLLATE utf8_bin,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `accepted` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`id_user_from`,`id_user_to`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla esportsfinder_v2.esf_messages: ~13 rows (aproximadamente)
DELETE FROM `esf_messages`;
/*!40000 ALTER TABLE `esf_messages` DISABLE KEYS */;
INSERT INTO `esf_messages` (`id`, `id_user_from`, `id_user_to`, `id_game`, `id_team`, `subject`, `message`, `status`, `accepted`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(5, 2, 2, 0, 0, 'Prueba', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', '', 0, 0, '2019-10-24 13:39:23', 0, '2019-11-07 10:20:59', 0),
	(6, 2, 3, 0, 0, 'Envio 1', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', '', 0, 0, '2019-10-24 13:39:23', 0, '2019-11-07 10:20:58', 0),
	(7, 3, 2, 0, 0, 'Prueba 2', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '', 0, 0, '0000-00-00 00:00:00', 0, '2019-11-07 10:20:57', 0),
	(8, 2, 3, 0, 0, 'Invitacion', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', 'INV', 0, 0, '2019-11-07 10:12:55', 0, '2019-11-11 16:20:01', 0),
	(9, 3, 2, 0, 0, 'Invitacion a aromero', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', 'INV', 0, 0, '2019-11-07 10:12:55', 0, '2019-11-07 10:12:59', 0),
	(17, 3, 5, 0, 0, 'Mensaje desde el listado', 'Hola, te estoy escribiendo este mensaje desde el listado para ver si funciona bien o tengo que cambiar algo mas vale crack?', '', 0, 3, '2019-11-07 13:23:33', 3, '2019-11-07 13:23:33', 0),
	(18, 3, 2, 0, 0, 'Prueba de mensaje definitiva', 'Vale, esto ya tiene que funcionar bien, que ya he hecho demasiadas pruebas por favor.', '', 0, 3, '2019-11-07 13:27:19', 3, '2019-11-07 13:27:19', 0),
	(19, 2, 3, 0, 0, 'RE: Prueba de mensaje definitiva', 'Te estoy contestando al mensaje, si esto funciona lo dejo ya porque estoy hasta el nabo', '', 0, 2, '2019-11-07 13:28:11', 2, '2019-11-07 13:28:11', 0),
	(20, 3, 2, 0, 0, 'Prueba desde equipo', 'Estoy intentando enviar un mensaje al capitan del equipo', '', 0, 3, '2019-11-12 16:44:49', 3, '2019-11-12 16:44:49', 0),
	(21, 3, 2, 0, 0, 'RE: RE: Prueba de mensaje definitiva', 'Hijo de puta', '', 0, 3, '2019-11-19 10:28:38', 3, '2019-11-19 10:28:38', 0),
	(22, 3, 2, 0, 0, 'Asunto importante', 'Que pasa crack, dani deja de tocar callcenter.produccion que te lo cargas', '', 0, 3, '2019-11-19 13:12:18', 3, '2019-11-19 13:12:18', 0),
	(23, 2, 3, 0, 0, 'RE: Asunto importante', 'OK fiera ya lo dejo', '', 0, 2, '2019-11-19 13:12:54', 2, '2019-11-19 13:12:54', 0),
	(24, 3, 6, 0, 0, 'Mensaje importante', 'Hola tonto', '', 0, 3, '2019-11-22 12:23:53', 3, '2019-11-22 12:23:53', 0),
	(25, 3, 6, 0, 0, 'sfasfasfa', 'sfasfasfasf', '', 0, 3, '2019-11-28 09:27:43', 3, '2019-11-28 09:27:43', 0),
	(27, 3, 0, 0, 0, '', NULL, 'INV', 0, 3, '2019-11-28 11:11:08', 0, '2019-11-28 11:11:08', 0),
	(28, 3, 0, 0, 0, '', NULL, 'INV', 0, 3, '2019-11-28 11:12:04', 0, '2019-11-28 11:12:04', 0),
	(29, 3, 0, 0, 0, '', NULL, 'INV', 0, 3, '2019-11-28 11:12:11', 0, '2019-11-28 11:12:11', 0),
	(30, 3, 0, 0, 0, '', NULL, 'INV', 0, 3, '2019-11-28 11:13:24', 0, '2019-11-28 11:13:24', 0),
	(31, 7, 3, 0, 0, 'im so goood', 'contract me plox\r\n', '', 0, 7, '2019-11-28 12:21:41', 7, '2019-11-28 12:21:41', 0),
	(32, 7, 2, 1, 0, 'Invitación a equipo', 'paentro', 'INV', 0, 7, '2019-11-28 12:22:58', 0, '2019-11-28 12:22:58', 0),
	(33, 7, 3, 0, 0, 'you in', 'pipio, you in', '', 0, 7, '2019-11-28 12:24:50', 7, '2019-11-28 12:24:50', 0),
	(34, 7, 3, 1, 0, 'Invitación a equipo', NULL, 'INV', 0, 7, '2019-11-28 12:24:57', 0, '2019-11-28 12:24:57', 0),
	(35, 7, 3, 1, 37, 'Invitación a equipo', 'paentro', 'INV', 0, 7, '2019-11-28 12:28:40', 0, '2019-11-28 12:28:40', 0);
/*!40000 ALTER TABLE `esf_messages` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_teams
DROP TABLE IF EXISTS `esf_teams`;
CREATE TABLE IF NOT EXISTS `esf_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_game` int(11) NOT NULL DEFAULT '0',
  `id_captain` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `team_tag` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `play_time` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `availability` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`id_game`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_teams: ~8 rows (aproximadamente)
DELETE FROM `esf_teams`;
/*!40000 ALTER TABLE `esf_teams` DISABLE KEYS */;
INSERT INTO `esf_teams` (`id`, `id_game`, `id_captain`, `name`, `team_tag`, `description`, `play_time`, `availability`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 1, 3, 'Pain Gaming', 'PAIN', '', '2h', 'Afternoon', 3, '2019-10-18 11:56:56', 2, '2019-11-21 09:35:21', 0),
	(3, 1, 0, 'Team Heretics', 'HTCS', '', '2h-4h', 'Afternoon', 0, '2019-10-18 11:56:56', 3, '2019-11-19 13:45:22', 0),
	(4, 1, 0, 'Movistar Riders', 'MRDS', '', '2h', 'Morning', 0, '2019-10-18 11:56:56', 3, '2019-11-19 13:45:23', 0),
	(5, 2, 3, 'FNATIC', 'FNTC', '', '5h', 'Afternoon', 3, '2019-10-18 11:56:56', 2, '2019-11-21 09:35:25', 0),
	(6, 2, 0, 'G2 Esports', 'G2', '', '6h', 'Morning', 0, '2019-10-18 11:56:56', 3, '2019-11-19 13:45:25', 0),
	(31, 1, 3, 'PaVe Gaming Plus', 'PaVe', 'Este equipo mola un montón', 'Entre 2 y 4 horas', NULL, 2, '2019-11-19 16:23:38', 0, '2019-11-28 11:25:24', 0);
/*!40000 ALTER TABLE `esf_teams` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_users
DROP TABLE IF EXISTS `esf_users`;
CREATE TABLE IF NOT EXISTS `esf_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `last_visit_date` datetime NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Índice 2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_users: ~0 rows (aproximadamente)
DELETE FROM `esf_users`;
/*!40000 ALTER TABLE `esf_users` DISABLE KEYS */;
INSERT INTO `esf_users` (`id`, `name`, `email`, `user_name`, `password`, `active`, `last_visit_date`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(2, 'Ángel Romero', 'aromero@tourismoptimizerplatform.com', 'aromero', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0),
	(3, 'Jose Calvillo', 'jcalvi@tourismoptimizerplatform.com', 'jcalvi', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0),
	(5, 'Jose Calvillo', 'jcalvi2@tourismoptimizerplatform.com', 'jcalvi2', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0),
	(6, 'Daniel Rubio', 'daniel.rubio@tourismoptimizerplatform.com', 'danie', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-11-28 13:33:37', 0);
/*!40000 ALTER TABLE `esf_users` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_users_password_link
DROP TABLE IF EXISTS `esf_users_password_link`;
CREATE TABLE IF NOT EXISTS `esf_users_password_link` (
  `id` char(36) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date_generated` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_username` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_users_password_link: ~0 rows (aproximadamente)
DELETE FROM `esf_users_password_link`;
/*!40000 ALTER TABLE `esf_users_password_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `esf_users_password_link` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
