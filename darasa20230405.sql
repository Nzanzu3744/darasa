-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `darasa` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `darasa`;

DROP TABLE IF EXISTS `crs_admis`;
CREATE TABLE `crs_admis` (
  `idAdmis` int(11) NOT NULL AUTO_INCREMENT,
  `idCours` int(11) DEFAULT NULL,
  `idClasse` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAdmis`),
  KEY `idClasse` (`idClasse`),
  KEY `idCours` (`idCours`),
  CONSTRAINT `crs_admis_ibfk_1` FOREIGN KEY (`idClasse`) REFERENCES `org_classe` (`idClasse`),
  CONSTRAINT `crs_admis_ibfk_2` FOREIGN KEY (`idCours`) REFERENCES `crs_cours` (`idCours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `crs_annexedevoir`;
CREATE TABLE `crs_annexedevoir` (
  `idAnnexeDevoir` int(11) NOT NULL AUTO_INCREMENT,
  `idDevoir` int(11) DEFAULT NULL,
  `url` text DEFAULT NULL,
  PRIMARY KEY (`idAnnexeDevoir`),
  KEY `idDevoir` (`idDevoir`),
  CONSTRAINT `crs_annexedevoir_ibfk_1` FOREIGN KEY (`idDevoir`) REFERENCES `crs_devoirs` (`idDevoir`),
  CONSTRAINT `crs_annexedevoir_ibfk_2` FOREIGN KEY (`idDevoir`) REFERENCES `crs_devoirs` (`idDevoir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `crs_assertion`;
CREATE TABLE `crs_assertion` (
  `idAssertion` int(11) NOT NULL AUTO_INCREMENT,
  `idQuestion` int(11) NOT NULL,
  `assertion` char(255) DEFAULT NULL,
  `correctAssertion` int(1) DEFAULT 0,
  PRIMARY KEY (`idAssertion`),
  KEY `idQuestion` (`idQuestion`),
  CONSTRAINT `crs_assertion_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `crs_question` (`idQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `crs_assertion` (`idAssertion`, `idQuestion`, `assertion`, `correctAssertion`) VALUES
(126,	77,	'rep a',	1),
(127,	77,	'rep b',	0),
(128,	77,	'rep c',	0),
(129,	77,	'rep d',	0),
(130,	77,	'rep e',	0),
(131,	77,	'rep f',	0);

DROP TABLE IF EXISTS `crs_cours`;
CREATE TABLE `crs_cours` (
  `idCours` int(11) NOT NULL AUTO_INCREMENT,
  `idAffectation` int(11) DEFAULT NULL,
  `idAnneeSco` int(11) DEFAULT NULL,
  `cours` char(30) DEFAULT NULL,
  `url` char(30) DEFAULT NULL,
  `commentaire` char(30) DEFAULT NULL,
  PRIMARY KEY (`idCours`),
  KEY `idAnneeSco` (`idAnneeSco`),
  KEY `idAffectation` (`idAffectation`),
  CONSTRAINT `crs_cours_ibfk_1` FOREIGN KEY (`idAnneeSco`) REFERENCES `org_anneesco` (`idAnneeSco`),
  CONSTRAINT `crs_cours_ibfk_2` FOREIGN KEY (`idAffectation`) REFERENCES `org_affectation` (`idAffectation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `crs_cours` (`idCours`, `idAffectation`, `idAnneeSco`, `cours`, `url`, `commentaire`) VALUES
(7,	1,	4,	'MATHEMATIQUE',	'../images/imgMath.png',	NULL),
(8,	1,	4,	'FRANCAIS',	'../images/imgFR.png',	NULL),
(9,	1,	4,	'ENGLAIS',	'../images/imgENG.png',	NULL),
(10,	57,	4,	'GEOGRAPHIE',	'../images/imgGEO.jpg',	NULL),
(11,	1,	4,	'HISTOIRE',	'../images/imgHIST.png',	NULL),
(13,	57,	4,	'INFORMATIQUE',	'../images/imgINF.jpg',	NULL),
(85,	1,	4,	'LACO',	'../images/imgLC.png',	NULL),
(88,	57,	4,	'ENGLAIS',	'../images/imgENG.png',	NULL),
(89,	1,	4,	'ALGEBRE',	'../images/imgLC.png',	NULL);

DROP TABLE IF EXISTS `crs_devoirs`;
CREATE TABLE `crs_devoirs` (
  `idDevoir` int(11) NOT NULL AUTO_INCREMENT,
  `idCours` int(11) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateRemise` datetime DEFAULT NULL,
  `description` char(255) DEFAULT NULL,
  PRIMARY KEY (`idDevoir`),
  KEY `idCours` (`idCours`),
  CONSTRAINT `crs_devoirs_ibfk_1` FOREIGN KEY (`idCours`) REFERENCES `crs_cours` (`idCours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `crs_devoirs` (`idDevoir`, `idCours`, `dateCreation`, `dateRemise`, `description`) VALUES
(115,	7,	'2023-04-06 00:06:02',	'2023-05-06 00:00:00',	'RAS');

DROP TABLE IF EXISTS `crs_lecon`;
CREATE TABLE `crs_lecon` (
  `idLecon` int(11) NOT NULL AUTO_INCREMENT,
  `idCours` int(11) DEFAULT NULL,
  `titreLecon` varchar(60) DEFAULT NULL,
  `lecon` longtext DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `actif` int(1) DEFAULT 0,
  PRIMARY KEY (`idLecon`),
  KEY `idCours` (`lecon`(1024)),
  KEY `idCours_2` (`idCours`),
  KEY `idUtilisateur` (`idUtilisateur`),
  CONSTRAINT `crs_lecon_ibfk_1` FOREIGN KEY (`idCours`) REFERENCES `crs_cours` (`idCours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `crs_lecon` (`idLecon`, `idCours`, `titreLecon`, `lecon`, `idUtilisateur`, `actif`) VALUES
(229,	7,	'LECON ALGEBRE PARTIE3',	'&lt;p&gt;ok&lt;/p&gt;',	5,	1);

DROP TABLE IF EXISTS `crs_question`;
CREATE TABLE `crs_question` (
  `idQuestion` int(11) NOT NULL AUTO_INCREMENT,
  `idDevoir` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `ponderation` double DEFAULT NULL,
  PRIMARY KEY (`idQuestion`),
  KEY `idDevoir` (`idDevoir`),
  CONSTRAINT `crs_question_ibfk_1` FOREIGN KEY (`idDevoir`) REFERENCES `crs_devoirs` (`idDevoir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `crs_question` (`idQuestion`, `idDevoir`, `question`, `ponderation`) VALUES
(76,	115,	'&lt;p&gt;Q: teST qUESTION TRADI.&lt;/p&gt;',	0),
(77,	115,	'&lt;p&gt;Q: Test question CM.&lt;/p&gt;',	0);

DROP TABLE IF EXISTS `org_affectation`;
CREATE TABLE `org_affectation` (
  `idAffectation` int(11) NOT NULL AUTO_INCREMENT,
  `idClasse` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `idAnneeSco` int(11) DEFAULT NULL,
  `actif` char(1) DEFAULT '0',
  PRIMARY KEY (`idAffectation`),
  KEY `idUtilisateur` (`idUtilisateur`),
  KEY `idClasse` (`idClasse`),
  KEY `idAnneeSco` (`idAnneeSco`),
  CONSTRAINT `org_affectation_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `param_utilisateur` (`idUtilisateur`),
  CONSTRAINT `org_affectation_ibfk_3` FOREIGN KEY (`idClasse`) REFERENCES `org_classe` (`idClasse`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `org_affectation_ibfk_4` FOREIGN KEY (`idAnneeSco`) REFERENCES `org_anneesco` (`idAnneeSco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `org_affectation` (`idAffectation`, `idClasse`, `idUtilisateur`, `idAnneeSco`, `actif`) VALUES
(1,	1,	5,	4,	'1'),
(57,	97,	5,	4,	'1');

DROP TABLE IF EXISTS `org_anneesco`;
CREATE TABLE `org_anneesco` (
  `idAnneeSco` int(11) NOT NULL AUTO_INCREMENT,
  `anneeSco` char(10) DEFAULT NULL,
  `commentaire` char(255) DEFAULT NULL,
  PRIMARY KEY (`idAnneeSco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `org_anneesco` (`idAnneeSco`, `anneeSco`, `commentaire`) VALUES
(1,	'2020-2021',	'UNE ANNEE RENAISSENCE.......'),
(2,	'2021-2022',	'UNE ANNEE RENAISSENCE.......'),
(3,	'2022-2023',	'UNE ANNEE RENAISSENCE.......'),
(4,	'2022-2023',	'UNE ANNEE RENAISSENCE.......');

DROP TABLE IF EXISTS `org_classe`;
CREATE TABLE `org_classe` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT,
  `idSection` int(11) DEFAULT NULL,
  `idPromotion` int(11) DEFAULT NULL,
  `idUnite` int(11) DEFAULT NULL,
  `commentaire` char(255) DEFAULT NULL,
  PRIMARY KEY (`idClasse`),
  KEY `idPromotion` (`idPromotion`),
  KEY `idUnite` (`idUnite`),
  KEY `idSection` (`idSection`),
  CONSTRAINT `org_classe_ibfk_1` FOREIGN KEY (`idPromotion`) REFERENCES `org_promotion` (`idPromotion`),
  CONSTRAINT `org_classe_ibfk_2` FOREIGN KEY (`idUnite`) REFERENCES `org_unite` (`idUnite`),
  CONSTRAINT `org_classe_ibfk_3` FOREIGN KEY (`idSection`) REFERENCES `org_section` (`idSection`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `org_classe` (`idClasse`, `idSection`, `idPromotion`, `idUnite`, `commentaire`) VALUES
(1,	1,	5,	1,	'1'),
(84,	3,	1,	1,	NULL),
(85,	2,	1,	1,	NULL),
(86,	1,	1,	1,	NULL),
(87,	1,	1,	1,	NULL),
(88,	1,	1,	2,	NULL),
(89,	1,	1,	1,	NULL),
(90,	1,	1,	2,	NULL),
(91,	1,	1,	3,	NULL),
(92,	1,	1,	1,	NULL),
(93,	1,	1,	1,	NULL),
(94,	1,	1,	2,	NULL),
(95,	1,	1,	1,	NULL),
(96,	1,	1,	2,	NULL),
(97,	1,	1,	3,	NULL),
(98,	1,	1,	1,	NULL),
(99,	1,	1,	1,	NULL),
(100,	1,	1,	2,	NULL),
(101,	1,	1,	1,	NULL),
(102,	1,	1,	2,	NULL),
(103,	1,	1,	3,	NULL),
(104,	1,	1,	1,	NULL),
(105,	1,	2,	1,	NULL),
(106,	1,	2,	2,	NULL),
(107,	1,	2,	1,	NULL),
(108,	1,	2,	2,	NULL),
(109,	1,	2,	3,	NULL),
(110,	1,	2,	1,	NULL),
(111,	1,	2,	1,	NULL),
(112,	1,	2,	2,	NULL),
(113,	1,	2,	1,	NULL),
(114,	1,	2,	2,	NULL),
(115,	1,	2,	3,	NULL),
(116,	1,	2,	1,	NULL),
(117,	1,	2,	1,	NULL),
(118,	1,	2,	2,	NULL),
(119,	1,	2,	1,	NULL),
(120,	1,	2,	2,	NULL),
(121,	1,	2,	3,	NULL),
(122,	1,	2,	1,	NULL),
(123,	1,	1,	1,	NULL),
(124,	1,	1,	2,	NULL),
(125,	1,	1,	1,	NULL),
(126,	1,	1,	2,	NULL),
(127,	1,	1,	3,	NULL),
(128,	1,	1,	1,	NULL),
(129,	1,	1,	1,	NULL),
(130,	1,	1,	2,	NULL),
(131,	1,	1,	1,	NULL),
(132,	1,	1,	2,	NULL),
(133,	1,	1,	3,	NULL),
(134,	1,	1,	1,	NULL),
(135,	1,	1,	1,	NULL),
(136,	1,	1,	2,	NULL),
(137,	1,	1,	1,	NULL),
(138,	1,	1,	2,	NULL),
(139,	1,	1,	3,	NULL),
(140,	1,	1,	1,	NULL),
(141,	1,	1,	1,	NULL),
(142,	1,	1,	1,	NULL),
(143,	1,	1,	1,	NULL),
(144,	1,	1,	1,	NULL),
(145,	1,	1,	4,	NULL),
(146,	1,	19,	1,	NULL),
(147,	1,	1,	1,	NULL);

DROP TABLE IF EXISTS `org_inscription`;
CREATE TABLE `org_inscription` (
  `idInscription` int(11) NOT NULL AUTO_INCREMENT,
  `idClasse` int(11) DEFAULT NULL,
  `idAnneeSco` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `actif` int(1) DEFAULT 0,
  PRIMARY KEY (`idInscription`),
  KEY `idAnneeSco` (`idAnneeSco`),
  KEY `idClasse` (`idClasse`),
  KEY `idUtilisateur` (`idUtilisateur`),
  CONSTRAINT `org_inscription_ibfk_3` FOREIGN KEY (`idAnneeSco`) REFERENCES `org_anneesco` (`idAnneeSco`),
  CONSTRAINT `org_inscription_ibfk_4` FOREIGN KEY (`idClasse`) REFERENCES `org_classe` (`idClasse`),
  CONSTRAINT `org_inscription_ibfk_5` FOREIGN KEY (`idUtilisateur`) REFERENCES `param_utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `org_inscription` (`idInscription`, `idClasse`, `idAnneeSco`, `idUtilisateur`, `actif`) VALUES
(27,	1,	1,	6,	NULL),
(29,	1,	4,	5,	NULL),
(30,	84,	4,	5,	NULL),
(31,	1,	4,	144,	NULL),
(32,	84,	4,	144,	NULL),
(33,	84,	4,	5,	NULL),
(34,	85,	4,	5,	NULL),
(35,	86,	4,	5,	NULL),
(36,	85,	4,	5,	NULL),
(37,	85,	4,	7,	NULL),
(38,	1,	4,	7,	NULL),
(39,	84,	4,	7,	NULL),
(40,	117,	4,	6,	NULL),
(41,	144,	4,	6,	NULL),
(42,	87,	4,	144,	NULL),
(43,	1,	4,	148,	NULL),
(44,	1,	4,	148,	NULL),
(45,	1,	4,	148,	NULL),
(46,	1,	4,	148,	NULL),
(47,	1,	4,	148,	NULL),
(48,	1,	4,	143,	NULL),
(49,	1,	4,	7,	NULL),
(50,	1,	4,	144,	NULL),
(51,	84,	4,	6,	NULL),
(52,	91,	4,	5,	NULL),
(53,	84,	4,	7,	NULL),
(54,	142,	4,	7,	NULL),
(55,	1,	4,	7,	NULL),
(56,	1,	4,	7,	NULL),
(57,	1,	4,	7,	NULL),
(58,	1,	4,	7,	NULL),
(59,	1,	4,	7,	NULL),
(60,	85,	4,	7,	NULL),
(61,	88,	4,	141,	NULL),
(62,	1,	4,	141,	NULL),
(63,	84,	4,	141,	NULL),
(64,	87,	4,	5,	NULL),
(65,	90,	4,	5,	NULL),
(66,	143,	4,	148,	NULL),
(67,	144,	4,	148,	NULL),
(68,	91,	4,	5,	NULL),
(69,	144,	4,	5,	NULL),
(70,	141,	4,	5,	NULL),
(71,	89,	4,	5,	NULL),
(72,	87,	4,	5,	NULL),
(73,	144,	4,	5,	NULL),
(74,	88,	4,	123,	NULL),
(75,	84,	4,	123,	NULL);

DROP TABLE IF EXISTS `org_promotion`;
CREATE TABLE `org_promotion` (
  `idPromotion` int(11) NOT NULL AUTO_INCREMENT,
  `promotion` char(30) DEFAULT NULL,
  PRIMARY KEY (`idPromotion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `org_promotion` (`idPromotion`, `promotion`) VALUES
(1,	'PRIMAIRE'),
(2,	'MATERNELLE'),
(3,	'EDUCATION DE BASE'),
(4,	'HUMANITE SCIENTIFIQUE'),
(5,	'CENTRE DE FORMATION'),
(19,	'CRECHE');

DROP TABLE IF EXISTS `org_section`;
CREATE TABLE `org_section` (
  `idSection` int(11) NOT NULL AUTO_INCREMENT,
  `section` char(30) DEFAULT NULL,
  PRIMARY KEY (`idSection`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `org_section` (`idSection`, `section`) VALUES
(1,	'1 ERE'),
(2,	'DEUXIEME'),
(3,	'TROISIEME'),
(4,	'QUATRIEME'),
(5,	'CINQUIEME'),
(6,	'SIXIEME'),
(7,	'SEPTIEME'),
(8,	'HUITIEME'),
(15,	''),
(16,	'');

DROP TABLE IF EXISTS `org_unite`;
CREATE TABLE `org_unite` (
  `idUnite` int(11) NOT NULL AUTO_INCREMENT,
  `unite` char(30) DEFAULT NULL,
  PRIMARY KEY (`idUnite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `org_unite` (`idUnite`, `unite`) VALUES
(1,	'A'),
(2,	'B'),
(3,	'C'),
(4,	'D'),
(52,	'');

DROP TABLE IF EXISTS `param_genre`;
CREATE TABLE `param_genre` (
  `idGenre` int(11) NOT NULL AUTO_INCREMENT,
  `genre` char(12) DEFAULT NULL,
  PRIMARY KEY (`idGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `param_genre` (`idGenre`, `genre`) VALUES
(1,	'INDETERMINE'),
(2,	'HOMME'),
(3,	'FEMME');

DROP TABLE IF EXISTS `param_groupe`;
CREATE TABLE `param_groupe` (
  `idGroupe` int(11) NOT NULL AUTO_INCREMENT,
  `groupe` char(30) DEFAULT NULL,
  PRIMARY KEY (`idGroupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `param_groupe` (`idGroupe`, `groupe`) VALUES
(1,	'admin'),
(2,	'RECEPTION'),
(28,	'CAISSIER'),
(29,	'COMPTABLE'),
(30,	'ENSEIGNANT'),
(33,	'CAISSIER'),
(36,	'IT'),
(37,	'ADG');

DROP TABLE IF EXISTS `param_permission`;
CREATE TABLE `param_permission` (
  `idPermission` int(11) NOT NULL AUTO_INCREMENT,
  `nomTable` char(30) DEFAULT NULL,
  `idGroupe` int(11) DEFAULT NULL,
  `ajouter` char(1) DEFAULT '0',
  `modifier` char(1) DEFAULT '0',
  `afficher` char(1) DEFAULT '0',
  `supprimer` char(1) DEFAULT '0',
  PRIMARY KEY (`idPermission`),
  KEY `nomTable` (`nomTable`),
  KEY `idGroupe` (`idGroupe`),
  CONSTRAINT `param_permission_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `param_groupe` (`idGroupe`),
  CONSTRAINT `param_permission_ibfk_2` FOREIGN KEY (`nomTable`) REFERENCES `param_table` (`nomTable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `param_permission` (`idPermission`, `nomTable`, `idGroupe`, `ajouter`, `modifier`, `afficher`, `supprimer`) VALUES
(1,	'param_groupe',	1,	'1',	'1',	'1',	'1'),
(2,	'param_permission',	1,	'1',	'1',	'1',	'1'),
(5,	'param_role',	1,	'1',	'0',	'1',	'0'),
(6,	'param_utilisateur',	1,	'1',	'1',	'1',	'1'),
(9,	'param_groupe',	28,	'1',	'1',	'1',	'1'),
(10,	'param_permission',	28,	'1',	'1',	'1',	'1'),
(11,	'param_role',	28,	'1',	'0',	'1',	'0'),
(12,	'param_utilisateur',	28,	'1',	'0',	'1',	'0'),
(13,	'param_groupe',	29,	'1',	'1',	'1',	'1'),
(14,	'param_permission',	29,	'0',	'0',	'0',	'0'),
(15,	'param_role',	29,	'1',	'1',	'1',	'1'),
(16,	'param_utilisateur',	29,	'1',	'1',	'1',	'1'),
(17,	'param_groupe',	30,	'1',	'1',	'1',	'1'),
(18,	'param_permission',	30,	'0',	'1',	'1',	'0'),
(19,	'param_utilisateur',	30,	'1',	'1',	'1',	'1'),
(20,	'param_groupe',	2,	'1',	'1',	'1',	'1'),
(21,	'param_permission',	2,	'0',	'1',	'1',	'1'),
(22,	'param_utilisateur',	2,	'1',	'1',	'1',	'1'),
(23,	'param_role',	2,	'1',	'1',	'1',	'0'),
(24,	'param_role',	30,	'1',	'1',	'0',	'1'),
(25,	'param_table',	36,	'1',	'1',	'1',	'0'),
(26,	'param_groupe',	36,	'1',	'1',	'1',	'0'),
(27,	'param_role',	36,	'1',	'1',	'1',	'0'),
(28,	'param_utilisateur',	36,	'1',	'1',	'1',	'0'),
(29,	'param_table',	37,	'1',	'1',	'1',	'1'),
(30,	'param_groupe',	37,	'1',	'1',	'0',	'1'),
(31,	'param_role',	37,	'1',	'1',	'0',	'1'),
(32,	'param_utilisateur',	37,	'1',	'1',	'0',	'1'),
(33,	'param_permission',	37,	'1',	'1',	'1',	'1');

DROP TABLE IF EXISTS `param_role`;
CREATE TABLE `param_role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `idGroupe` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRole`),
  KEY `IdGroupe` (`idGroupe`),
  KEY `idUtilisateur` (`idUtilisateur`),
  CONSTRAINT `param_role_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `param_groupe` (`idGroupe`),
  CONSTRAINT `param_role_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `param_utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `param_role` (`idRole`, `idGroupe`, `idUtilisateur`) VALUES
(76,	2,	123),
(77,	1,	5),
(78,	1,	6),
(79,	1,	7),
(80,	1,	124),
(81,	30,	5),
(82,	36,	125),
(83,	36,	126),
(84,	33,	127),
(85,	33,	128),
(86,	33,	129),
(87,	33,	130),
(88,	33,	131),
(89,	33,	132),
(90,	33,	133),
(91,	33,	134),
(92,	33,	135),
(93,	33,	136),
(94,	33,	137),
(95,	33,	138),
(96,	33,	139),
(97,	33,	140),
(98,	33,	141),
(99,	33,	142),
(100,	33,	143),
(101,	1,	144),
(102,	2,	145),
(103,	36,	146),
(104,	36,	147),
(105,	37,	148);

DROP TABLE IF EXISTS `param_table`;
CREATE TABLE `param_table` (
  `nomTable` char(30) NOT NULL,
  `commentaire` char(255) NOT NULL,
  UNIQUE KEY `nomTable` (`nomTable`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `param_table` (`nomTable`, `commentaire`) VALUES
('param_groupe',	'La table regroupant les groupe'),
('param_permission',	'La table regroupant les permis'),
('param_role',	'La table regroupant les roles'),
('param_table',	'La table annuaire des nos tabl'),
('param_utilisateur',	'La table regroupant les utilis'),
('tPatient',	'Liste des patients');

DROP TABLE IF EXISTS `param_utilisateur`;
CREATE TABLE `param_utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` char(30) DEFAULT NULL,
  `postnomUtilisateur` char(30) DEFAULT NULL,
  `prenomUtilisateur` char(30) DEFAULT NULL,
  `mailUtilisateur` char(30) DEFAULT NULL,
  `idGenre` int(11) DEFAULT NULL,
  `photoUtilisateur` char(30) DEFAULT NULL,
  `log` char(30) DEFAULT NULL,
  `pass` char(255) DEFAULT NULL,
  `actif` int(1) DEFAULT 0,
  PRIMARY KEY (`idUtilisateur`),
  KEY `idGenre` (`idGenre`),
  CONSTRAINT `param_utilisateur_ibfk_1` FOREIGN KEY (`idGenre`) REFERENCES `param_genre` (`idGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `param_utilisateur` (`idUtilisateur`, `nomUtilisateur`, `postnomUtilisateur`, `prenomUtilisateur`, `mailUtilisateur`, `idGenre`, `photoUtilisateur`, `log`, `pass`, `actif`) VALUES
(5,	'ADMIN',	'ASINGYA',	'DIEU-MERCI',	'asingydieumerci@gmail.com',	1,	'../images/img1.png',	'ADMIN',	'1234567',	1),
(6,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(7,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(9,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	1,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(10,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	1,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(11,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(12,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(13,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(14,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(15,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(16,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(17,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(19,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(20,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(21,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(22,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(23,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(24,	'NZANZU',	'ASINGYA',	'NZANZU',	'ASINGYADIEUMERCI@GMAIL.COM',	NULL,	'../images/img.jpg',	'ASINGYA',	'1234',	1),
(33,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(34,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(35,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(36,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(37,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(38,	'NZANZU',	'ASINGYA',	'',	'',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(39,	'NZANZU',	'ASINGYA',	'',	'',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(40,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(41,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(42,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(43,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(44,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(45,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(46,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(47,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(48,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(49,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(55,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(59,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(60,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(61,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(62,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(63,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(64,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(65,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(66,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(67,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(68,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(69,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(70,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(71,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(72,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(73,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(74,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(75,	'NZANZU',	'ASINGYA',	'',	'',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(76,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(77,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(78,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(79,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	'undefined',	'undefined',	1),
(80,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	'undefined',	'undefined',	1),
(81,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	'undefined',	'undefined',	1),
(82,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(83,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	'undefined',	'undefined',	1),
(84,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	'undefined',	'undefined',	1),
(85,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	'undefined',	'undefined',	1),
(86,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	'undefined',	'undefined',	1),
(87,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	'undefined',	'undefined',	1),
(88,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	'undefined',	'undefined',	1),
(89,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	'undefined',	'undefined',	1),
(95,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(99,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(100,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(101,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(102,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(103,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(104,	'undefined',	'undefined',	'undefined',	'undefined',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(105,	'',	'',	'',	'',	NULL,	'../images/img.jpg',	'',	'',	1),
(106,	'HHHHHHHHHH-MERCI',	'JO=HON',	'DDDDDDDDDDDDDDD',	'',	NULL,	'../images/img.jpg',	'undefined',	'1234567',	1),
(110,	'DIEU-MERCI',	'JO=HON',	'DDDDDDDDDDDDDDD',	'',	NULL,	'../images/img.jpg',	'undefined',	'1234567',	1),
(111,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(112,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(113,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(114,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(115,	'KAHINDO',	'ASINGYA',	'DIEU-MERCI',	'',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(116,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	NULL,	NULL,	1),
(117,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(118,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(119,	'SIFA',	'MAKURU',	'FELICITE',	'sifa@gmail.com',	NULL,	'../images/img.jpg',	'SIFA',	'SIFA',	1),
(120,	'Dieu-merci ASINGYA',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(121,	'MUFU',	'SAPI',	'CLAUHE',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'MUFU',	'MUFU',	1),
(122,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(123,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(124,	'NZANZU',	'TSHONGO',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(125,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(126,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(127,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(128,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(129,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(130,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(131,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(132,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(133,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(134,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(135,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(136,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(137,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(138,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(139,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(140,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(141,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(142,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(143,	'Dieu-merci ASINGYA',	'ASINGYA',	'JOYS',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(144,	'Dieu-merci ASINGYA',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'Dieu-merci ASINGYA',	'Dieu-merci ASINGYA',	1),
(145,	'MASIKA',	'KATHINA',	'PHILLIPINE',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'MASIKA',	'MASIKA',	1),
(146,	'NZANZU',	'TSHONGO',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1),
(147,	'KAHINDO',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'KAHINDO',	'KAHINDO',	1),
(148,	'NZANZU',	'ASINGYA',	'DIEU-MERCI',	'asingyadieumerci@gmail.com',	NULL,	'../images/img.jpg',	'NZANZU',	'NZANZU',	1);

-- 2023-04-05 22:15:00
