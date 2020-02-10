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
	(4, 'Fortnite', 'Battle Royale', 'fortnite', 'READY', 1, '', 0, '2019-10-07 11:17:58', 0, '2020-01-16 10:10:21', 0),
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_game_profiles: ~6 rows (aproximadamente)
DELETE FROM `esf_game_profiles`;
/*!40000 ALTER TABLE `esf_game_profiles` DISABLE KEYS */;
INSERT INTO `esf_game_profiles` (`id`, `id_user`, `id_game`, `id_team`, `name`, `description`, `play_time`, `availability`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 3, 1, 1, 'JoseCalvi1', 'Objective', 'Menos de dos horas', 'Mañana | Tarde | ', 3, '2019-11-29 10:50:58', 0, '2019-12-05 12:39:46', 0),
	(2, 2, 1, 0, 'aromeroCoD', 'Slayer', 'Menos de 2 horas', 'Mañana | Tarde | ', 2, '2019-11-29 10:52:28', 0, '2019-12-04 13:39:14', 0),
	(5, 2, 2, 0, 'aromeroLoL', 'Mid Lane', 'Entre 2 y 4 horas', 'Mañana | Tarde | Noche', 2, '2019-12-02 10:55:51', 0, '2019-12-02 10:55:51', 0),
	(9, 6, 1, 2, 'Dani2033', 'Objective', 'Entre dos y cuatro horas', 'Tarde | Noche | ', 6, '2019-12-05 10:42:29', 0, '2019-12-05 12:37:00', 0),
	(10, 3, 2, 3, 'King JoseCalvi', 'Support', 'Menos de dos horas', 'Noche |  | ', 3, '2020-01-08 13:13:39', 0, '2020-01-16 09:08:29', 0),
	(11, 3, 4, 4, 'JoseCalvi1', NULL, 'Entre dos y cuatro horas', 'Mañana |  | ', 3, '2020-01-16 09:11:40', 0, '2020-01-16 09:12:11', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla esportsfinder_v2.esf_messages: ~1 rows (aproximadamente)
DELETE FROM `esf_messages`;
/*!40000 ALTER TABLE `esf_messages` DISABLE KEYS */;
INSERT INTO `esf_messages` (`id`, `id_user_from`, `id_user_to`, `id_game`, `id_team`, `subject`, `message`, `status`, `accepted`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 2, 3, 0, 0, 'Quiero unirme', 'Hola tio que pasa', '', 0, 2, '2019-11-29 10:52:45', 2, '2019-11-29 10:52:45', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_teams: ~4 rows (aproximadamente)
DELETE FROM `esf_teams`;
/*!40000 ALTER TABLE `esf_teams` DISABLE KEYS */;
INSERT INTO `esf_teams` (`id`, `id_game`, `id_captain`, `name`, `team_tag`, `description`, `play_time`, `availability`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 1, 3, 'PaVe Gaming', 'PaVe', 'Equipo legendario de CoD WII', 'Más de 4 horas', 'Tarde | Noche | ', 3, '2019-11-29 10:51:55', 0, '2019-11-29 11:26:27', 0),
	(2, 1, 6, 'RGB Master Race', 'ARGB', NULL, 'Menos de dos horas', 'Tarde | Noche | ', 6, '2019-12-05 12:37:00', 0, '2019-12-05 12:37:00', 0),
	(3, 2, 3, 'FNATIC', 'FNTC', NULL, 'Menos de dos horas', 'Tarde | Noche | ', 3, '2020-01-16 09:08:29', 0, '2020-01-16 09:08:29', 0),
	(4, 4, 3, 'For Noche', 'NGHT', NULL, 'Entre dos y cuatro horas', 'Mañana | Tarde | ', 3, '2020-01-16 09:12:11', 0, '2020-01-16 09:12:11', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_users: ~3 rows (aproximadamente)
DELETE FROM `esf_users`;
/*!40000 ALTER TABLE `esf_users` DISABLE KEYS */;
INSERT INTO `esf_users` (`id`, `name`, `email`, `user_name`, `password`, `active`, `last_visit_date`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(2, 'Ángel Romero', 'aromero@tourismoptimizerplatform.com', 'aromero', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0),
	(3, 'Jose Calvillo', 'jcalvi@tourismoptimizerplatform.com', 'jcalvi', '$1$3oKqSifj$LFNg3nITAptaJ3pZZX5tX0', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0),
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

-- Volcando datos para la tabla esportsfinder_v2.esf_users_password_link: ~8 rows (aproximadamente)
DELETE FROM `esf_users_password_link`;
/*!40000 ALTER TABLE `esf_users_password_link` DISABLE KEYS */;
INSERT INTO `esf_users_password_link` (`id`, `email`, `date_generated`, `deleted`) VALUES
	('122924a6-fca6-46cf-b629-02e64bb8e1d9', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:37:38', 0),
	('45834838-b94e-44db-9812-4a0b902f95b9', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:32:40', 0),
	('49c5d610-cff5-4970-bc97-d3d6a2ffd068', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:15:13', 0),
	('704a4667-5f50-470c-aa00-dee5fc196668', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:23:33', 0),
	('8328f33b-e005-4491-a479-29eb75a4d6b1', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:28:54', 0),
	('9d3269f6-d65d-4bda-b839-82252f671e0d', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:22:49', 0),
	('aec4ed6d-2eda-427c-8c9e-eb443fa2e9c6', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:31:15', 0),
	('cc731844-35e3-44b3-993e-76356816019e', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:43:15', 0),
	('d54a07ef-23ca-4090-9c38-175895175fe8', 'josecalvilloolmedo@gmail.com', '2020-01-21 11:14:51', 0);
/*!40000 ALTER TABLE `esf_users_password_link` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
