-- Adminer 4.8.1 MySQL 8.1.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `list_of_scholarships`;
CREATE TABLE `list_of_scholarships` (
  `id` int NOT NULL AUTO_INCREMENT,
  `auth_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint NOT NULL,
  `semester` int NOT NULL,
  `ipk` double NOT NULL,
  `type_of_scholarship` int NOT NULL,
  `file` varchar(255) NOT NULL,
  `verifikasi` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `list_of_scholarships` (`id`, `auth_id`, `name`, `email`, `phone`, `semester`, `ipk`, `type_of_scholarship`, `file`, `verifikasi`) VALUES
(2,	1,	'Ivy Warner',	'tejaje@mailinator.com',	17,	8,	4,	2,	'21092023121757setifikat.pdf',	1),
(5,	2,	'Hedda Wall',	'vavuxuk@mailinator.com',	89,	5,	3.5,	2,	'21092023123440CloudPractitionerEssentials(BelajarDasarAWSCloud).pdf',	0);

-- 2023-09-21 12:47:07
