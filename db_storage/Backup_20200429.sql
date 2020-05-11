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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_games: ~7 rows (aproximadamente)
DELETE FROM `esf_games`;
/*!40000 ALTER TABLE `esf_games` DISABLE KEYS */;
INSERT INTO `esf_games` (`id`, `name`, `description`, `media`, `status`, `crossplay`, `platform`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 'CoD Modern Warfare', 'First Person Shooter', 'mw', 'READY', 1, '', 0, '2019-10-07 11:17:58', 0, '2019-11-11 17:57:49', 0),
	(2, 'League Of Legends', 'MOBA', 'lol', 'READY', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-11-08 14:06:30', 0),
	(3, 'Apex Legends', 'Battle Royale', 'apex', 'READY', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2020-01-26 12:08:21', 0),
	(4, 'Fortnite', 'Battle Royale', 'fortnite', 'READY', 1, '', 0, '2019-10-07 11:17:58', 0, '2020-01-16 10:10:21', 0),
	(9, 'CS:GO', 'First Person Shooter', 'csgo', 'READY', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2020-03-02 10:58:42', 0),
	(10, 'Apex Legends', 'Battle Royale', 'apex', 'READY', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2020-02-10 17:40:28', 0),
	(11, 'Apex Legends', 'Battle Royale', 'apex', 'READY', 0, 'XBOX', 0, '2019-10-07 11:17:58', 0, '2020-02-10 17:40:28', 0),
	(12, 'Valorant', 'First Person Shooter', 'valorant', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2020-03-02 10:58:42', 0);
/*!40000 ALTER TABLE `esf_games` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_game_profiles
DROP TABLE IF EXISTS `esf_game_profiles`;
CREATE TABLE IF NOT EXISTS `esf_game_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_team` int(11) DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_game_profiles: ~10 rows (aproximadamente)
DELETE FROM `esf_game_profiles`;
/*!40000 ALTER TABLE `esf_game_profiles` DISABLE KEYS */;
INSERT INTO `esf_game_profiles` (`id`, `id_user`, `id_game`, `id_team`, `name`, `description`, `play_time`, `availability`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 3, 1, 1, 'JoseCalvi1', 'Support', 'Entre dos y cuatro horas', 'Tarde | Noche | ', 3, '2019-11-29 10:50:58', 0, '2020-02-25 12:29:45', 0),
	(2, 2, 1, 0, 'aromeroCoD', 'Slayer', 'Menos de 2 horas', 'Mañana | Tarde | ', 2, '2019-11-29 10:52:28', 0, '2019-12-04 13:39:14', 0),
	(5, 2, 2, 0, 'aromeroLoL', 'Mid Lane', 'Entre 2 y 4 horas', 'Mañana | Tarde | Noche', 2, '2019-12-02 10:55:51', 0, '2019-12-02 10:55:51', 0),
	(9, 6, 1, 2, 'Dani2033', 'Objective', 'Entre dos y cuatro horas', 'Tarde | Noche | ', 6, '2019-12-05 10:42:29', 0, '2019-12-05 12:37:00', 0),
	(10, 3, 2, 3, 'King JoseCalvi', 'Support', 'Menos de dos horas', 'Noche |  | ', 3, '2020-01-08 13:13:39', 0, '2020-01-16 09:08:29', 0),
	(11, 3, 4, 4, 'JoseCalvi1', NULL, 'Entre dos y cuatro horas', 'Mañana |  | ', 3, '2020-01-16 09:11:40', 0, '2020-01-16 09:12:11', 0),
	(13, 3, 3, 5, 'JoseCalvi1', 'Pathfinder', 'Menos de dos horas', 'Tarde |  | ', 3, '2020-01-26 12:08:48', 0, '2020-02-18 11:33:26', 0),
	(14, 6, 3, 0, 'danie', 'Pathfinder', 'Menos de dos horas', 'Mañana |  | ', 6, '2020-01-28 10:47:51', 0, '2020-01-28 10:47:51', 0),
	(15, 6, 4, 0, 'Danie', NULL, 'Menos de dos horas', 'Tarde |  | ', 6, '2020-02-07 10:16:03', 0, '2020-02-07 10:16:03', 0),
	(16, 8, 3, 0, 'JoseCalvi1YT', 'Pathfinder', 'Entre dos y cuatro horas', 'Tarde | Noche | ', 8, '2020-02-24 11:54:50', 0, '2020-02-24 11:54:50', 0),
	(17, 9, 9, 0, 'JoseCalvi1', 'Lurker', 'Menos de dos horas', 'Mañana |  | ', 9, '2020-03-02 09:59:01', 0, '2020-03-02 09:59:01', 0),
	(18, 3, 9, 0, 'JoseCalvi1YT', 'Polivalente', 'Entre dos y cuatro horas', 'Mañana |  | ', 3, '2020-04-29 09:44:37', 0, '2020-04-29 09:44:37', 0);
/*!40000 ALTER TABLE `esf_game_profiles` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_game_roles
DROP TABLE IF EXISTS `esf_game_roles`;
CREATE TABLE IF NOT EXISTS `esf_game_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_game` int(11) NOT NULL,
  `media` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`id_game`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_game_roles: ~25 rows (aproximadamente)
DELETE FROM `esf_game_roles`;
/*!40000 ALTER TABLE `esf_game_roles` DISABLE KEYS */;
INSERT INTO `esf_game_roles` (`id`, `id_game`, `media`, `name`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(6, 1, 'mw', 'Slayer', 0, '2019-11-05 17:28:57', 0, '2020-02-10 17:37:43', 0),
	(7, 1, 'mw', 'Anchor', 0, '2019-11-05 17:29:10', 0, '2020-02-10 17:37:49', 0),
	(8, 1, 'mw', 'Objective', 0, '2019-11-05 17:29:48', 0, '2020-02-10 17:37:50', 0),
	(9, 1, 'mw', 'Support', 0, '2019-11-05 17:30:15', 0, '2020-02-10 17:37:53', 0),
	(10, 2, 'lol', 'Top Lane', 0, '2019-11-05 17:30:40', 0, '2020-02-10 17:37:57', 0),
	(11, 2, 'lol', 'Jungle', 0, '2019-11-05 17:30:42', 0, '2020-02-10 17:37:59', 0),
	(12, 2, 'lol', 'Mid Lane', 0, '2019-11-05 17:30:44', 0, '2020-02-10 17:38:00', 0),
	(13, 2, 'lol', 'Bot Lane', 0, '2019-11-05 17:30:45', 0, '2020-02-10 17:38:00', 0),
	(14, 2, 'lol', 'Support', 0, '2019-11-05 17:30:47', 0, '2020-02-10 17:38:01', 0),
	(15, 3, 'apex', 'Wraith', 0, '2020-01-26 12:04:58', 0, '2020-02-10 17:38:07', 0),
	(16, 3, 'apex', 'Bangalore', 0, '2020-01-26 12:05:26', 0, '2020-02-10 17:38:08', 0),
	(17, 3, 'apex', 'Pathfinder', 0, '2020-01-26 12:05:31', 0, '2020-02-10 17:38:08', 0),
	(18, 3, 'apex', 'Octane', 0, '2020-01-26 12:06:02', 0, '2020-02-10 17:38:09', 0),
	(19, 3, 'apex', 'Mirage', 0, '2020-01-26 12:06:07', 0, '2020-02-10 17:38:09', 0),
	(20, 3, 'apex', 'Lifeline', 0, '2020-01-26 12:06:25', 0, '2020-02-10 17:38:10', 0),
	(21, 3, 'apex', 'Gibraltar', 0, '2020-01-26 12:06:45', 0, '2020-02-10 17:38:10', 0),
	(22, 3, 'apex', 'Cripto', 0, '2020-01-26 12:06:55', 0, '2020-02-10 17:38:11', 0),
	(23, 3, 'apex', 'Bloodhound', 0, '2020-01-26 12:07:36', 0, '2020-02-10 17:38:11', 0),
	(24, 3, 'apex', 'Caustic', 0, '2020-01-26 12:07:50', 0, '2020-02-10 17:38:12', 0),
	(25, 3, 'apex', 'Wattson', 0, '2020-01-26 12:07:54', 0, '2020-02-10 17:38:13', 0),
	(26, 3, 'apex', 'Revenant', 0, '2020-02-10 17:36:11', 0, '2020-02-10 17:38:15', 0),
	(27, 9, 'csgo', 'IGL', 0, '2020-03-02 10:50:33', 0, '2020-03-02 10:50:33', 0),
	(28, 9, 'csgo', 'AWPER', 0, '2020-03-02 10:52:44', 0, '2020-03-02 10:52:44', 0),
	(29, 9, 'csgo', 'Support', 0, '2020-03-02 10:52:44', 0, '2020-03-02 10:52:44', 0),
	(30, 9, 'csgo', 'Entry Fragger', 0, '2020-03-02 10:52:44', 0, '2020-03-02 10:52:44', 0),
	(31, 9, 'csgo', 'Lurker', 0, '2020-03-02 10:52:44', 0, '2020-03-02 10:52:44', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla esportsfinder_v2.esf_messages: ~4 rows (aproximadamente)
DELETE FROM `esf_messages`;
/*!40000 ALTER TABLE `esf_messages` DISABLE KEYS */;
INSERT INTO `esf_messages` (`id`, `id_user_from`, `id_user_to`, `id_game`, `id_team`, `subject`, `message`, `status`, `accepted`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 2, 3, 0, 0, 'Quiero unirme', 'Hola tio que pasa', '', 0, 2, '2019-11-29 10:52:45', 2, '2019-11-29 10:52:45', 0),
	(2, 3, 2, 0, 0, 'Probando desde mensajes', 'te estoy escribiendo a traves del apartado de mensajes', '', 0, 3, '2020-02-10 16:24:36', 3, '2020-02-10 16:24:36', 0),
	(3, 3, 2, 1, 1, 'Invitación a equipo', 'Unete tio', 'INV', 0, 3, '2020-02-10 16:25:43', 0, '2020-02-10 16:25:43', 0),
	(4, 2, 3, 1, 1, 'Invitación a equipo', 'Unete tio', 'INV', 0, 3, '2020-02-10 16:25:43', 0, '2020-04-17 12:22:48', 0);
/*!40000 ALTER TABLE `esf_messages` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_scrims
DROP TABLE IF EXISTS `esf_scrims`;
CREATE TABLE IF NOT EXISTS `esf_scrims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_game` int(11) NOT NULL DEFAULT '0',
  `id_team1` int(11) NOT NULL DEFAULT '0',
  `id_team2` int(11) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `duration` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_scrim` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla esportsfinder_v2.esf_scrims: ~4 rows (aproximadamente)
DELETE FROM `esf_scrims`;
/*!40000 ALTER TABLE `esf_scrims` DISABLE KEYS */;
INSERT INTO `esf_scrims` (`id`, `id_game`, `id_team1`, `id_team2`, `status`, `duration`, `date_scrim`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(6, 1, 1, 0, 'WAITING', 'Entre 2h y 3h', '2020-01-24 17:30:00', 3, '2020-01-22 15:46:09', 0, '2020-01-22 15:46:09', 0),
	(10, 1, 2, 1, 'READY', 'Creo que 3 horas', '2020-01-26 17:30:00', 3, '2020-01-24 19:02:18', 6, '2020-01-24 19:28:01', 0),
	(13, 1, 2, 0, 'WAITING', 'Supongo que entre 2h y 3h', '2020-01-25 23:00:00', 0, '2020-01-24 20:14:41', 0, '2020-01-24 20:14:41', 0),
	(14, 1, 2, 1, 'READY', 'Supongo que entre 2h y 3h', '2020-01-25 23:00:00', 3, '2020-01-24 20:15:06', 6, '2020-01-24 20:15:42', 0),
	(16, 1, 2, 1, 'RESPONSED', 'Supongo que entre 2h y 3h', '2020-01-25 23:00:00', 3, '2020-02-07 10:02:57', 0, '2020-02-07 10:02:57', 0),
	(17, 3, 5, 0, 'WAITING', '4 horas', '2020-03-12 15:30:00', 3, '2020-03-31 10:48:02', 0, '2020-03-31 10:48:02', 0);
/*!40000 ALTER TABLE `esf_scrims` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_teams: ~4 rows (aproximadamente)
DELETE FROM `esf_teams`;
/*!40000 ALTER TABLE `esf_teams` DISABLE KEYS */;
INSERT INTO `esf_teams` (`id`, `id_game`, `id_captain`, `name`, `team_tag`, `description`, `play_time`, `availability`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 1, 3, 'PaVe Gaming', 'PaVe', 'Equipo legendario de CoD WII', 'Más de 4 horas', 'Tarde | Noche | ', 3, '2019-11-29 10:51:55', 0, '2019-11-29 11:26:27', 0),
	(2, 1, 6, 'RGB Master Race', 'ARGB', NULL, 'Menos de dos horas', 'Tarde | Noche | ', 6, '2019-12-05 12:37:00', 0, '2019-12-05 12:37:00', 0),
	(3, 2, 3, 'FNATIC', 'FNTC', NULL, 'Menos de dos horas', 'Tarde | Noche | ', 3, '2020-01-16 09:08:29', 0, '2020-01-16 09:08:29', 0),
	(4, 4, 3, 'For Noche', 'NGHT', NULL, 'Entre dos y cuatro horas', 'Mañana | Tarde | ', 3, '2020-01-16 09:12:11', 0, '2020-01-16 09:12:11', 0),
	(5, 3, 3, 'Champions Club', 'CHMP', NULL, 'Entre dos y cuatro horas', 'Tarde | Noche | ', 3, '2020-02-18 11:33:26', 0, '2020-02-18 11:33:26', 0);
/*!40000 ALTER TABLE `esf_teams` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_trades
DROP TABLE IF EXISTS `esf_trades`;
CREATE TABLE IF NOT EXISTS `esf_trades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_game` int(11) NOT NULL DEFAULT '0',
  `id_team` int(11) NOT NULL DEFAULT '0',
  `action` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`id_user`,`id_team`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla esportsfinder_v2.esf_trades: ~2 rows (aproximadamente)
DELETE FROM `esf_trades`;
/*!40000 ALTER TABLE `esf_trades` DISABLE KEYS */;
INSERT INTO `esf_trades` (`id`, `id_user`, `id_game`, `id_team`, `action`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(3, 2, 1, 1, 'IN', 2, '2019-12-04 09:50:14', 0, '2019-12-04 09:50:14', 0),
	(4, 2, 1, 1, 'OUT', 2, '2019-12-04 10:27:44', 0, '2019-12-04 10:27:44', 0);
/*!40000 ALTER TABLE `esf_trades` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_users
DROP TABLE IF EXISTS `esf_users`;
CREATE TABLE IF NOT EXISTS `esf_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `last_visit_date` datetime NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Índice 2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_users: ~3 rows (aproximadamente)
DELETE FROM `esf_users`;
/*!40000 ALTER TABLE `esf_users` DISABLE KEYS */;
INSERT INTO `esf_users` (`id`, `name`, `email`, `user_name`, `password`, `active`, `last_visit_date`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(2, 'Ángel Romero', 'aromero@tourismoptimizerplatform.com', 'aromero', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0),
	(3, 'Jose Calvillo', 'josecalvilloolmedo@gmail.com', 'jcalvi', '$1$A0qXFu9o$G/IlcOzF0vhNV063Hx75./', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 3, '2020-04-29 08:27:32', 0),
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

-- Volcando datos para la tabla esportsfinder_v2.esf_users_password_link: ~28 rows (aproximadamente)
DELETE FROM `esf_users_password_link`;
/*!40000 ALTER TABLE `esf_users_password_link` DISABLE KEYS */;
INSERT INTO `esf_users_password_link` (`id`, `email`, `date_generated`, `deleted`) VALUES
	('0407be2d-d196-4538-8d45-1e3c85dcf370', 'josecalvilloolmedo@gmail.com', '2020-04-20 11:07:17', 0),
	('0a00ddce-8716-468e-8f82-647e8816ff4e', 'josecalvilloolmedo@gmail.com', '2020-04-20 11:04:13', 0),
	('122924a6-fca6-46cf-b629-02e64bb8e1d9', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:37:38', 0),
	('37b8825b-bb2e-4fe1-a764-ac9ce998b641', 'josecalvilloolmedo@gmail.com', '2020-03-31 09:51:50', 0),
	('45834838-b94e-44db-9812-4a0b902f95b9', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:32:40', 0),
	('49c5d610-cff5-4970-bc97-d3d6a2ffd068', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:15:13', 0),
	('4ee43056-274c-410a-9281-42d24f7537dd', 'josecalvilloolmedo@gmail.com', '2020-01-22 08:08:10', 0),
	('55706f4c-f4e1-450c-b73f-92a67ed7709f', 'josecalvilloolmedo@gmail.com', '2020-04-20 11:10:03', 0),
	('6f078189-9338-4604-988c-ba64ddf1513e', 'josecalvilloolmedo@gmail.com', '2020-03-31 09:35:48', 0),
	('704a4667-5f50-470c-aa00-dee5fc196668', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:23:33', 0),
	('75588fdf-2564-43da-88f4-14acf86d954a', 'josecalvilloolmedo@gmail.com', '2020-04-20 11:09:11', 0),
	('8328f33b-e005-4491-a479-29eb75a4d6b1', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:28:54', 0),
	('9d3269f6-d65d-4bda-b839-82252f671e0d', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:22:49', 0),
	('a2d841a9-3e50-4a56-9a3f-b9eb88adcb8d', 'josecalvilloolmedo@gmail.com', '2020-02-10 16:29:12', 0),
	('a977ec84-0499-40a2-bbca-49c9eb0e3625', 'jcalvi@tourismoptimizerplatform.com', '2020-04-20 10:48:07', 0),
	('aec4ed6d-2eda-427c-8c9e-eb443fa2e9c6', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:31:15', 0),
	('b2e6d926-d7db-42e0-b6ab-696f80842857', 'josecalvilloolmedo@gmail.com', '2020-03-31 09:51:02', 0),
	('b3c27b3b-76ad-487e-ba5c-9119fce56c7d', 'josecalvilloolmedo@gmail.com', '2020-03-31 09:32:46', 0),
	('c4e51cb9-8b3d-4881-8c01-864633088cd5', 'josecalvilloolmedo@gmail.com', '2020-03-31 09:32:19', 0),
	('c7d7d9a4-5dff-45c0-8e8d-5294f5a6eda3', 'esportsfinder.online@gmail.com', '2020-03-02 10:08:01', 0),
	('c9ea8590-b505-4c8f-894a-fc94dac56829', 'jcalvi@tourismoptimizerplatform.com', '2020-04-20 10:52:05', 0),
	('cc731844-35e3-44b3-993e-76356816019e', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:43:15', 0),
	('cdb26a98-b18e-412c-9aa8-16e5f1e3a347', 'josecalvilloolmedo@gmail.com', '2020-02-24 12:14:44', 0),
	('d54a07ef-23ca-4090-9c38-175895175fe8', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:14:51', 0),
	('e4c33fb2-b0f5-4617-a119-a30b26ff1b9e', 'josecalvilloolmedo@gmail.com', '2020-03-31 09:30:27', 0),
	('f2c8ca21-4cbc-4fc2-9f7c-71404fad27cc', 'josecalvilloolmedo@gmail.com', '2020-04-20 11:08:36', 0),
	('f560e217-1b42-4235-8632-2d02e05bb2e3', 'josecalvilloolmedo@gmail.com', '2020-03-31 09:39:38', 0),
	('fcc41e85-8d2d-4201-9f54-0746713b1558', 'josecalvilloolmedo@gmail.com', '2020-04-20 10:55:46', 0);
/*!40000 ALTER TABLE `esf_users_password_link` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
