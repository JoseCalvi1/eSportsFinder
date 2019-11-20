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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_games: ~4 rows (aproximadamente)
DELETE FROM `esf_games`;
/*!40000 ALTER TABLE `esf_games` DISABLE KEYS */;
INSERT INTO `esf_games` (`id`, `name`, `description`, `media`, `status`, `crossplay`, `platform`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 'Call Of Duty', 'First Person Shooter', 'cod', 'READY', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-10-21 13:07:25', 0),
	(2, 'League Of Legends', 'MOBA', 'lol', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-10-07 12:18:52', 0),
	(3, 'Apex Legends', 'Battle Royale', 'apex', 'PENDING', 0, 'PC', 0, '2019-10-07 11:17:58', 0, '2019-10-07 12:17:28', 0),
	(4, 'Fortnite', 'Battle Royale', 'fortnite', 'PENDING', 1, '', 0, '2019-10-07 11:17:58', 0, '2019-10-07 12:17:35', 0),
	(5, 'Fifa 20', 'Football Simulator', 'fifa', 'PENDING', 0, 'PS4', 0, '2019-10-07 11:17:58', 0, '2019-10-07 12:18:11', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_game_profiles: ~1 rows (aproximadamente)
DELETE FROM `esf_game_profiles`;
/*!40000 ALTER TABLE `esf_game_profiles` DISABLE KEYS */;
INSERT INTO `esf_game_profiles` (`id`, `id_user`, `id_game`, `id_team`, `name`, `description`, `play_time`, `availability`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 2, 1, NULL, 'aromero', 'Slayer', '3h', 'Afternoon', 0, '2019-10-23 14:14:10', 0, '2019-10-23 14:14:10', 0),
	(2, 3, 1, 1, 'jcalvi', 'Objective', '2-4h', 'Afternoon', 0, '0000-00-00 00:00:00', 0, '2019-11-05 16:14:10', 0);
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

-- Volcando datos para la tabla esportsfinder_v2.esf_game_roles: ~0 rows (aproximadamente)
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
  `subject` varchar(255) COLLATE utf8_bin NOT NULL,
  `message` text COLLATE utf8_bin,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Índice 2` (`id_user_from`,`id_user_to`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla esportsfinder_v2.esf_messages: ~3 rows (aproximadamente)
DELETE FROM `esf_messages`;
/*!40000 ALTER TABLE `esf_messages` DISABLE KEYS */;
INSERT INTO `esf_messages` (`id`, `id_user_from`, `id_user_to`, `subject`, `message`, `status`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(5, 2, 2, 'Prueba', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', '0', 0, '2019-10-24 13:39:23', 0, '2019-10-24 13:54:53', 0),
	(6, 2, 3, 'Envio 1', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', '0', 0, '2019-10-24 13:39:23', 0, '2019-10-24 13:54:56', 0),
	(7, 3, 2, 'Prueba 2', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '0', 0, '0000-00-00 00:00:00', 0, '2019-10-24 14:10:10', 0);
/*!40000 ALTER TABLE `esf_messages` ENABLE KEYS */;

-- Volcando estructura para tabla esportsfinder_v2.esf_teams
DROP TABLE IF EXISTS `esf_teams`;
CREATE TABLE IF NOT EXISTS `esf_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_game` int(11) NOT NULL DEFAULT '0',
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
  KEY `Índice 2` (`id_game`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_teams: ~4 rows (aproximadamente)
DELETE FROM `esf_teams`;
/*!40000 ALTER TABLE `esf_teams` DISABLE KEYS */;
INSERT INTO `esf_teams` (`id`, `id_game`, `name`, `description`, `play_time`, `availability`, `created_by`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(1, 1, 'Pain Gaming', 'PAIN', '2h', 'Afternoon', 0, '2019-10-18 11:56:56', 0, '2019-10-18 12:07:36', 0),
	(2, 1, 'Gaints Gaming', 'GIA', '4h', 'Night', 0, '2019-10-18 11:56:56', 0, '2019-10-18 12:07:31', 0),
	(3, 1, 'Team Heretics', 'HTCS', '2h-4h', 'Afternoon', 0, '2019-10-18 11:56:56', 0, '2019-10-18 12:07:28', 0),
	(4, 1, 'Movistar Riders', 'MRDS', '2h', 'Morning', 0, '2019-10-18 11:56:56', 0, '2019-10-18 12:08:26', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla esportsfinder_v2.esf_users: ~0 rows (aproximadamente)
DELETE FROM `esf_users`;
/*!40000 ALTER TABLE `esf_users` DISABLE KEYS */;
INSERT INTO `esf_users` (`id`, `name`, `email`, `user_name`, `password`, `active`, `last_visit_date`, `date_entered`, `modified_by`, `date_modified`, `deleted`) VALUES
	(2, 'Ángel Romero', 'aromero@tourismoptimizerplatform.com', 'aromero', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0),
	(3, 'Jose Calvillo', 'jcalvi@tourismoptimizerplatform.com', 'jcalvi', '$1$wO9zDhUa$2PJt6X31No1o.XMuSgxcz1', 1, '2019-10-04 13:47:13', '2019-10-04 13:47:14', 1, '2019-10-04 13:47:45', 0);
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
