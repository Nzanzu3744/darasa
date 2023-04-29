<br />
<b>Warning</b>:  Unknown: Input variables exceeded 1000. To increase the limit change max_input_vars in php.ini. in <b>Unknown</b> on line <b>0</b><br />
-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `finance_activiteclient`;
CREATE TABLE `finance_activiteclient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_activiteclient` (`id`, `datecreation`, `code`, `libelle`, `etat`) VALUES
(1,	'2022-10-25 09:58:24',	'ELEVE',	'ELEVE',	'True'),
(2,	'2022-10-25 11:50:58',	'ENSEIGNANT',	'ENSEIGNANT',	'True');

DROP TABLE IF EXISTS `finance_activitefournisseur`;
CREATE TABLE `finance_activitefournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_activitefournisseur` (`id`, `datecreation`, `code`, `libelle`, `etat`) VALUES
(1,	'2023-01-09 11:24:32',	'COMMECIALLE',	'COMMERCIALLE',	'True');

DROP TABLE IF EXISTS `finance_activitemo`;
CREATE TABLE `finance_activitemo` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `idstatus` int(11) DEFAULT NULL,
  `idposte` int(11) DEFAULT NULL,
  `mecanisien` text,
  `commentaire` text,
  `datefin` datetime DEFAULT NULL,
  `idor` bigint(19) DEFAULT NULL,
  `idjob` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_agence`;
CREATE TABLE `finance_agence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `idprovince` int(11) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `fdepot` int(11) DEFAULT NULL,
  `mdepot` varchar(5) DEFAULT NULL,
  `idagencedouaniere` int(11) DEFAULT NULL,
  `idcompteclientdivers` int(11) DEFAULT NULL,
  `idcomptedepense` int(11) DEFAULT NULL,
  `idcompteversement` int(11) DEFAULT NULL,
  `idcompteautresortie` int(11) DEFAULT NULL,
  `telephone` varchar(225) DEFAULT NULL,
  `adresse` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_agence` (`id`, `datecreation`, `code`, `libelle`, `idprovince`, `etat`, `fdepot`, `mdepot`, `idagencedouaniere`, `idcompteclientdivers`, `idcomptedepense`, `idcompteversement`, `idcompteautresortie`, `telephone`, `adresse`) VALUES
(1,	'2022-09-16 10:54:40',	'COMPLEXESCOLAIRENOTREDAME',	'COMPLEXE SCOLAIRE NOTRE DAME DE GRACES',	1,	'True',	0,	'False',	0,	0,	0,	0,	0,	'',	''),
(2,	'2022-09-16 10:57:31',	'CP',	'CAISSE PRINCIPAL',	1,	'True',	0,	'False',	0,	0,	0,	0,	0,	'',	''),
(3,	'2022-09-16 11:24:20',	'DF',	'DEPOT DES FORNITURE',	1,	'True',	0,	'False',	0,	0,	0,	0,	0,	'',	''),
(4,	'2022-09-16 12:01:20',	'REST',	'RESTAURANT ',	1,	'True',	0,	'False',	0,	0,	0,	0,	0,	'',	''),
(5,	'2022-09-16 12:02:44',	'CANT',	'CANTINE',	1,	'True',	0,	'False',	0,	0,	0,	0,	0,	'',	''),
(6,	'2022-09-16 12:04:32',	'DEPU',	'DEPOT UNIFORME',	1,	'True',	0,	'False',	0,	0,	0,	0,	0,	'',	'');

DROP TABLE IF EXISTS `finance_agencebancaire`;
CREATE TABLE `finance_agencebancaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `codeguichet` varchar(50) DEFAULT NULL,
  `codebic` varchar(50) DEFAULT NULL,
  `interlocnon` varchar(225) DEFAULT NULL,
  `interlocpre` varchar(225) DEFAULT NULL,
  `rue` varchar(225) DEFAULT NULL,
  `ville` varchar(225) DEFAULT NULL,
  `complement` varchar(225) DEFAULT NULL,
  `codepostal` varchar(25) DEFAULT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `telecopie` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `siteweb` varchar(50) DEFAULT NULL,
  `idbanque` int(11) DEFAULT NULL,
  `idpays` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_agencedouaniere`;
CREATE TABLE `finance_agencedouaniere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_agencedouaniere` (`id`, `datecreation`, `code`, `libelle`, `etat`) VALUES
(1,	'2023-04-27 11:27:09',	'NOTRE',	'NOTRE DAME',	'True');

DROP TABLE IF EXISTS `finance_agenceinterlocutaire`;
CREATE TABLE `finance_agenceinterlocutaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_amortissement`;
CREATE TABLE `finance_amortissement` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `valeur` varchar(50) DEFAULT NULL,
  `idimmo` bigint(11) DEFAULT NULL,
  `statuscompta` varchar(5) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_application`;
CREATE TABLE `finance_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_attrinterclassesection`;
CREATE TABLE `finance_attrinterclassesection` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `idprofesseur` int(11) DEFAULT NULL,
  `idclasse` int(11) DEFAULT NULL,
  `idsection` int(11) DEFAULT NULL,
  `idunite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_attrintercours`;
CREATE TABLE `finance_attrintercours` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `idprofesseur` int(11) DEFAULT NULL,
  `idcours` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_attrintertitulaire`;
CREATE TABLE `finance_attrintertitulaire` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `idprofesseur` int(11) DEFAULT NULL,
  `idclasse` int(11) DEFAULT NULL,
  `idsection` int(11) DEFAULT NULL,
  `idunite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_autov`;
CREATE TABLE `finance_autov` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_axeanalytique`;
CREATE TABLE `finance_axeanalytique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_banque`;
CREATE TABLE `finance_banque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `codesiret` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_bilan`;
CREATE TABLE `finance_bilan` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idtype` int(11) DEFAULT NULL,
  `iddata` int(11) DEFAULT NULL,
  `libelleactif` varchar(50) DEFAULT NULL,
  `libellepassif` varchar(50) DEFAULT NULL,
  `refactif` varchar(25) DEFAULT NULL,
  `refpassif` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_bilettage`;
CREATE TABLE `finance_bilettage` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `iddevise` int(11) DEFAULT NULL,
  `nombre` int(11) DEFAULT NULL,
  `billet` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_budget`;
CREATE TABLE `finance_budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `datedebut` datetime DEFAULT NULL,
  `datefin` datetime DEFAULT NULL,
  `isstatic` varchar(5) DEFAULT NULL,
  `idniveau` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_budgetdetail`;
CREATE TABLE `finance_budgetdetail` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `idbudget` int(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `iddesignation` int(11) DEFAULT NULL,
  `montant` varchar(50) DEFAULT NULL,
  `typedata` varchar(2) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `iddata1` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbachat`;
CREATE TABLE `finance_carbachat` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `quantite` varchar(50) DEFAULT NULL,
  `keylivraison` varchar(50) DEFAULT NULL,
  `densite` varchar(50) DEFAULT NULL,
  `signe` varchar(5) DEFAULT NULL,
  `pot` varchar(225) DEFAULT NULL,
  `refvehicule` varchar(225) DEFAULT NULL,
  `idproduitrec` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbbonscons`;
CREATE TABLE `finance_carbbonscons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `idjourvente` bigint(19) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `commentaire` text,
  `quantite` bigint(19) DEFAULT NULL,
  `idtypecons` int(11) DEFAULT NULL,
  `idperiode` bigint(19) DEFAULT NULL,
  `idindex` bigint(19) DEFAULT NULL,
  `idcentrecout` int(11) DEFAULT NULL,
  `idmembre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbciterne`;
CREATE TABLE `finance_carbciterne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `capacite` bigint(19) DEFAULT NULL,
  `hauteurutile` varchar(225) DEFAULT NULL,
  `capaciteutile` varchar(225) DEFAULT NULL,
  `hateurtotal` varchar(225) DEFAULT NULL,
  `commentaire` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbdataclientabonne`;
CREATE TABLE `finance_carbdataclientabonne` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `plaque` varchar(50) DEFAULT NULL,
  `beneficiaire` varchar(225) DEFAULT NULL,
  `quantite` bigint(19) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idjourvente` int(11) DEFAULT NULL,
  `idclient` bigint(19) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idperiode` bigint(19) DEFAULT NULL,
  `idindex` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbdatatransfert`;
CREATE TABLE `finance_carbdatatransfert` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `commentaire` varchar(225) DEFAULT NULL,
  `quantite` bigint(19) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idjourvente` int(11) DEFAULT NULL,
  `iddepotexp` int(19) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idperiode` bigint(19) DEFAULT NULL,
  `idindex` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbdaysale`;
CREATE TABLE `finance_carbdaysale` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datedebut` datetime DEFAULT NULL,
  `dadebutfull` datetime DEFAULT NULL,
  `idgerant` int(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idstructureprix` int(11) DEFAULT NULL,
  `datefin` datetime DEFAULT NULL,
  `datefinfull` datetime DEFAULT NULL,
  `commentaire` varchar(225) DEFAULT NULL,
  `statusind` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbgerant`;
CREATE TABLE `finance_carbgerant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datemodification` datetime DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbindex`;
CREATE TABLE `finance_carbindex` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `typeop` varchar(5) DEFAULT NULL,
  `quantite` varchar(225) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idjourvente` bigint(19) DEFAULT NULL,
  `quantitefin` varchar(225) DEFAULT NULL,
  `idperiode` bigint(19) DEFAULT NULL,
  `datecreationfinfull` datetime DEFAULT NULL,
  `quantiteecart` bigint(19) DEFAULT NULL,
  `statusind` varchar(5) DEFAULT NULL,
  `idutilisateurfin` int(11) DEFAULT NULL,
  `idciterne` int(11) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbmesure`;
CREATE TABLE `finance_carbmesure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` text,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbmotifessaiepreaf`;
CREATE TABLE `finance_carbmotifessaiepreaf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idessaiepompe` int(11) DEFAULT NULL,
  `idpreafamort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbmotifremise`;
CREATE TABLE `finance_carbmotifremise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbod`;
CREATE TABLE `finance_carbod` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `typeop` varchar(5) DEFAULT NULL,
  `quantite` bigint(19) DEFAULT NULL,
  `commentaire` varchar(225) DEFAULT NULL,
  `idjourvente` bigint(19) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idperiode` bigint(19) DEFAULT NULL,
  `idindex` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbopenpompe`;
CREATE TABLE `finance_carbopenpompe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `idpompe` int(11) DEFAULT NULL,
  `idpompiste` int(11) DEFAULT NULL,
  `idjourvente` bigint(12) DEFAULT NULL,
  `idouvert` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbpompe`;
CREATE TABLE `finance_carbpompe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `idciterne` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbpompiste`;
CREATE TABLE `finance_carbpompiste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbprevision`;
CREATE TABLE `finance_carbprevision` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `commentaire` varchar(225) DEFAULT NULL,
  `quantite` bigint(19) DEFAULT NULL,
  `idjourvente` bigint(9) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `statusprev` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbreception`;
CREATE TABLE `finance_carbreception` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `idrefblprev` bigint(19) DEFAULT NULL,
  `refbllivreur` varchar(50) DEFAULT NULL,
  `commentaire` varchar(50) DEFAULT NULL,
  `quantite` bigint(19) DEFAULT NULL,
  `idjourvente` bigint(19) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idciterne` bigint(19) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `idagenceexp` int(11) DEFAULT NULL,
  `quantitereel` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbremisecuve`;
CREATE TABLE `finance_carbremisecuve` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `idmotif` int(11) DEFAULT NULL,
  `commentaire` varchar(225) DEFAULT NULL,
  `quantite` bigint(19) DEFAULT NULL,
  `idjourvente` bigint(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idciterne` bigint(19) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbstockod`;
CREATE TABLE `finance_carbstockod` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `quantite` bigint(19) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idciterne` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idjourvente` bigint(19) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `typeop` varchar(5) DEFAULT NULL,
  `quantitereel` bigint(19) DEFAULT NULL,
  `quantitedispo` bigint(19) DEFAULT NULL,
  `tablejaugeage` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbstockreel`;
CREATE TABLE `finance_carbstockreel` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `quantite` bigint(19) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idciterne` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idjourvente` bigint(19) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbtablejaugeage`;
CREATE TABLE `finance_carbtablejaugeage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idciterne` int(11) DEFAULT NULL,
  `cm` varchar(225) DEFAULT NULL,
  `litrage` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbtarif`;
CREATE TABLE `finance_carbtarif` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nopiece` varchar(50) DEFAULT NULL,
  `idindex` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbtransfertstock`;
CREATE TABLE `finance_carbtransfertstock` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `datecreationfull` datetime DEFAULT NULL,
  `iddepotdest` int(11) DEFAULT NULL,
  `commentaire` varchar(225) DEFAULT NULL,
  `quantite` bigint(19) DEFAULT NULL,
  `idjourvente` bigint(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idciterne` bigint(19) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carbventemoyen`;
CREATE TABLE `finance_carbventemoyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `prix` varchar(50) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `idprix` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_carrosseriev`;
CREATE TABLE `finance_carrosseriev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_categoriedepense`;
CREATE TABLE `finance_categoriedepense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `chargerepartie` varchar(5) DEFAULT NULL,
  `idgroupedepense` int(11) DEFAULT NULL,
  `iddeclarationtaxe` int(11) DEFAULT NULL,
  `idprovision` int(11) DEFAULT NULL,
  `statusprovision` varchar(50) DEFAULT NULL,
  `idcomptegeneral` int(11) DEFAULT NULL,
  `idcomptetva` int(11) DEFAULT NULL,
  `idcomptefournisseur` int(11) DEFAULT NULL,
  `iddateecriture` int(11) DEFAULT NULL,
  `etatimputcond` varchar(5) DEFAULT NULL,
  `idsousgroupe` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_categoriedepense` (`id`, `datecreation`, `code`, `libelle`, `etat`, `chargerepartie`, `idgroupedepense`, `iddeclarationtaxe`, `idprovision`, `statusprovision`, `idcomptegeneral`, `idcomptetva`, `idcomptefournisseur`, `iddateecriture`, `etatimputcond`, `idsousgroupe`) VALUES
(1,	'2022-11-28 12:07:01',	'AVANCE_SUR_SALAIRE',	'AVANCE SUR SALAIRE',	'True',	'False',	1,	0,	0,	'0',	0,	0,	0,	0,	'False',	0),
(2,	'2023-01-09 11:28:31',	'ACHAT',	'ACHAT',	'True',	'False',	1,	0,	0,	'0',	0,	0,	0,	0,	'False',	0),
(3,	'2023-01-18 09:34:45',	'ENCOMPTE',	'ENCOMPTE',	'True',	'False',	1,	0,	0,	'0',	0,	0,	0,	0,	'False',	0),
(4,	'2023-01-20 09:50:45',	'AUTRES',	'AUTRES',	'True',	'False',	1,	0,	0,	'0',	0,	0,	0,	0,	'False',	0);

DROP TABLE IF EXISTS `finance_categorieitems`;
CREATE TABLE `finance_categorieitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_categorieproduit`;
CREATE TABLE `finance_categorieproduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `idfamille` int(11) DEFAULT NULL,
  `idachat` int(11) DEFAULT NULL,
  `idvariation` int(11) DEFAULT NULL,
  `idstocks` int(11) DEFAULT NULL,
  `idvente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_categorieproduit` (`id`, `datecreation`, `code`, `libelle`, `etat`, `idfamille`, `idachat`, `idvariation`, `idstocks`, `idvente`) VALUES
(1,	'2022-09-19 10:17:59',	'FRAIS',	'FRAIS',	'True',	0,	0,	0,	0,	0),
(2,	'2022-10-25 09:47:03',	'UNIFORME',	'UNIFORME',	'True',	0,	0,	0,	0,	0);

DROP TABLE IF EXISTS `finance_centreanalytique`;
CREATE TABLE `finance_centreanalytique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `idaxenanalytique` int(11) DEFAULT NULL,
  `idcompteanalytique` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_centrecout`;
CREATE TABLE `finance_centrecout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` text,
  `etat` varchar(5) DEFAULT NULL,
  `idcompte` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_chargeanalytique`;
CREATE TABLE `finance_chargeanalytique` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `idsession` bigint(11) DEFAULT NULL,
  `idsectionanalytique` int(19) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `montant` varchar(50) DEFAULT NULL,
  `iddevise` int(11) DEFAULT NULL,
  `taux` varchar(5) DEFAULT NULL,
  `signetaux` varchar(2) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `statuscompta` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_chargerepartie`;
CREATE TABLE `finance_chargerepartie` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `taux` varchar(50) DEFAULT NULL,
  `montant` varchar(225) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `datedepense` varchar(20) DEFAULT NULL,
  `idcategoriedepense` int(11) DEFAULT NULL,
  `idagencedepense` int(11) DEFAULT NULL,
  `libelledepense` varchar(225) DEFAULT NULL,
  `iddevise` int(11) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `sourcedd` varchar(3) DEFAULT NULL,
  `imputation` varchar(10) DEFAULT NULL,
  `statuscompta` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_chassiblock`;
CREATE TABLE `finance_chassiblock` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `typeblock` varchar(5) DEFAULT NULL,
  `idtypeblock` bigint(19) DEFAULT NULL,
  `commentaire` varchar(225) DEFAULT NULL,
  `chassis` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_classecompte`;
CREATE TABLE `finance_classecompte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_classecomptesyscohada`;
CREATE TABLE `finance_classecomptesyscohada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_classeoption`;
CREATE TABLE `finance_classeoption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_classeoption` (`id`, `datecreation`, `code`, `libelle`, `etat`) VALUES
(1,	'2022-09-20 14:52:39',	'1ER',	'1 ERE     ',	'True'),
(2,	'2022-09-20 14:54:10',	'2E',	'2 EME   ',	'True'),
(3,	'2022-09-20 14:53:59',	'3E',	'3 EME   ',	'True'),
(4,	'2022-09-20 14:53:50',	'7',	'7 EME   ',	'True'),
(5,	'2022-09-20 14:53:42',	'4E',	'4 EME   ',	'True'),
(6,	'2022-09-20 14:53:25',	'5E',	'5 EME   ',	'True'),
(7,	'2022-09-20 14:53:15',	'6E',	'6 EME   ',	'True'),
(8,	'2022-09-20 14:53:06',	'8E',	'8 EME   ',	'True'),
(9,	'2022-09-16 12:21:49',	'D0',	'DEGRE ZERO',	'True');

DROP TABLE IF EXISTS `finance_client`;
CREATE TABLE `finance_client` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `raisonsociale` varchar(225) DEFAULT NULL,
  `titre` varchar(225) DEFAULT NULL,
  `nom` varchar(225) DEFAULT NULL,
  `prenom` varchar(225) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `siteweb` varchar(50) DEFAULT NULL,
  `bp` varchar(225) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `adresse` text,
  `commentaire` text,
  `iddepotpriv` int(11) DEFAULT NULL,
  `idgroupeclient` int(11) DEFAULT NULL,
  `idpays` int(11) DEFAULT NULL,
  `idactivite` int(11) DEFAULT NULL,
  `idcategoriedepense` int(11) DEFAULT NULL,
  `numimpot` varchar(50) DEFAULT NULL,
  `venteprduit` varchar(5) DEFAULT NULL,
  `idcomptegeneral` int(11) DEFAULT NULL,
  `etatcompte` varchar(5) DEFAULT NULL,
  `etatbis` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_client` (`id`, `datecreation`, `etat`, `raisonsociale`, `titre`, `nom`, `prenom`, `phone`, `phone2`, `email`, `siteweb`, `bp`, `ville`, `adresse`, `commentaire`, `iddepotpriv`, `idgroupeclient`, `idpays`, `idactivite`, `idcategoriedepense`, `numimpot`, `venteprduit`, `idcomptegeneral`, `etatcompte`, `etatbis`) VALUES
(1,	'2011-05-30 00:00:00',	'True',	'MUTEBA',	'',	'BAHELANYA',	'DIANE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER YAMBI YAYA, POLICE DE FRONTIERE',	'CHRISTIAN MUTEBA, +243829388897',	1,	6,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(2,	'2018-04-09 00:00:00',	'True',	'SABUNI',	'',	'NGULE',	'KETYA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'JUNIOR SABUNI  ET NISETTE LAYABE 0827232999',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(3,	'1880-07-15 00:00:00',	'True',	'MALILIA',	'',	'LIZA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO',	'0812496747',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(4,	'2008-12-25 00:00:00',	'True',	'KAWANZA ',	'',	'SABWIRA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'0815329876',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(5,	'2010-04-24 00:00:00',	'True',	'ODIA',	'',	'YUMI',	' ',	'',	'',	'',	'',	'',	'KINDU',	'Q. KINDIA, AV. NGUGU',	'MASUDI YUMI, 0810435475, 0814364043\nWHATSAPP: 0993403930',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(6,	'2009-02-04 00:00:00',	'True',	'N’KISA ',	'',	'LEBILYABO',	'JOSEPH',	'',	'',	'',	'',	'',	'BUNIA',	'Q. HOHO, AV. KISANGANI',	'SANYA LEBILYABO, 0819777350, 0815370423, 0990430287',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(7,	'2007-12-12 00:00:00',	'True',	'UPARGIU',	'',	'MUNGU NG’EYO',	' CHARLINE',	'',	'',	'',	'',	'',	'JUPUNYQNGU',	'POLICE DE FRONTIERE',	'0814650526   0825132721   0818494844',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(8,	'1880-01-01 00:00:00',	'True',	'SAFI',	'',	'SHINDANO',	' ',	'',	'',	'',	'',	'',	' ',	'QUARTIER HOHO',	'SHINDANO NICOLAS, NDAYA   082 0756382',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(9,	'2007-12-25 00:00:00',	'True',	'NDONGALA',	'',	'KISULU',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'NDONGALA KISULU, 0815859247; 0997282828',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(10,	'2007-09-05 00:00:00',	'True',	'MOPINDI',	'',	'AGWE',	' ',	'',	'',	'',	'',	'',	'BONGALO',	'YAMBI YAYA',	'8017518232 ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(11,	'2010-12-25 00:00:00',	'True',	'ATOSHA',	'',	'KISULU',	'  ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'NDONGALA KISULU, 0815859247; 0997282828',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(13,	'2008-10-22 00:00:00',	'True',	'CIKURU',	'',	'BISHENGE',	'DIVINE ',	'',	'',	'',	'',	'',	'BUKAVU',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(14,	'2005-02-13 00:00:00',	'True',	'ANJAKAMELI',	'',	'FURAHA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'MATETE CITE',	'0828231844',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(15,	'2006-12-12 00:00:00',	'True',	'ROGAROGA',	'',	'BALEJA',	' ',	'',	'',	'',	'',	'',	'KASAI',	'DELE (TROIS CENT MAISONS)',	'BALEJA BIN MUDIYAY, 0813862359',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(16,	'2007-12-12 00:00:00',	'True',	'KAVIRA ',	'',	'KAMATE',	'GENTILLESSE',	'',	'',	'',	'',	'',	'BUTEMBO',	'HOHO',	'KAKIMBA       RIZIKI',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(18,	'2008-02-22 00:00:00',	'True',	'MANKISA',	'',	'TAGIRABO',	'JOSUE',	'',	'',	'',	'',	'',	'BUNIA',	'Q. HOHO, AV. MONT-CARMEL',	'TAGIRABO, 0811436432',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(19,	'2006-06-17 00:00:00',	'True',	'KATEMBO ',	'',	'KAMBINE',	'GLOIRE',	'',	'',	'',	'',	'',	'BUTEMBO',	'QUARTIER DHELE',	'KAMBALE: 0997899001 \nKAVIRA :  0820742865',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(20,	'2008-10-14 00:00:00',	'True',	'MBELU',	'',	'MPANDANJILA',	' ',	'',	'',	'',	'',	'',	'KINSHASA',	'',	'ABOU MPANDAJILA',	1,	2,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(22,	'2006-04-01 00:00:00',	'True',	'LISEBENI',	'',	'MAGBEGBE',	'JACQUES',	'',	'',	'',	'',	'',	'KINSHASA',	'Q. YAMBI YAYA / POLICE DE FRONTIERE',	'LISEBENI ET JUSTINE. 0827825777; 0814448354',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(24,	'2008-08-25 00:00:00',	'True',	'KABATENDE',	'',	'N’SIMIRE',	'  ',	'',	'',	'',	'',	'',	' ',	'QUARTIER HOHO',	'PERE : KABATENDE J-C;\nMERE:  081374280; 082249',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(25,	'1880-09-19 00:00:00',	'True',	'KAVUGHO',	'',	'MASIVI',	'  ',	'',	'',	'',	'',	'',	'  ',	'POLICE DE FRONTIER',	'KAMBALE MASIVI, 0812650023; 0821496529',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(27,	'2008-07-11 00:00:00',	'True',	'MUGISA',	'',	'KYALIGONZA',	'GLOIRE',	'',	'',	'',	'',	'',	'BENI',	'POLICE DE FRONTIERE',	'KYALIGONZA, 0826868285; 0814565170',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(28,	'2009-01-11 00:00:00',	'True',	'SCHAFRAD',	'',	'KABADAKI',	'MARINA',	'',	'',	'',	'',	'',	'',	'',	'SCHAFRAD CHARLAIS',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(29,	'2010-03-24 00:00:00',	'True',	'SANGBA',	'',	'TENYIMBA',	'  ',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'DESCARTE GERE, 0817432235 / 082022007',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(30,	'1880-09-19 00:00:00',	'True',	'BAKEMWANGA',	'',	'OLAMBABI',	'  ',	'',	'',	'',	'',	'',	'  ',	'POLICE DE FRONTIERE',	'0816953819',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(31,	'2008-03-04 00:00:00',	'True',	'KAYIBA',	'',	'LUVANDE',	'LANGE ',	'',	'',	'',	'',	'',	'LUNGO',	'QUARTIER : POLICE DE FRONTIERE',	'NOM PARENT: YANGO; \nN TEL : 0814792072, 0811879027;\nWHATSAPP: 0814792072\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(32,	'1997-11-24 00:00:00',	'True',	'NEEMA',	'',	'SOKI',	'EDWIN',	'',	'',	'',	'',	'',	' ',	'QUARTIER BANKOKO, AVENUE GETY',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(33,	'1999-10-02 00:00:00',	'True',	'YENGA',	'',	'YAFUNGA',	'SANDRA',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER: BANKOKO;\nAVENUE : MBANDAKA.',	'N Tel : 0813658540; 08230325678',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(34,	'1991-11-25 00:00:00',	'True',	'GANISIKALE',	'',	'KIMAREKE',	'VIRGINIE',	'',	'',	'',	'',	'',	' ',	'ADRESSE D’ORIGINE : ITURI;\nTERITOIRE : IRUMU;\nPREOFESSION : ENSEIGNANT;\nDERNIER TITRE : D6 PEDA;\nADRESSE ACTUELLE : QUARTIER KINDIA.\n',	'GANISIKALE KIMAREKE\nNTel : 0821054456;',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(35,	'1996-12-25 00:00:00',	'True',	'DJENISALINA',	'',	'NGANABO',	'RACHEL',	'',	'',	'',	'',	'',	'IGA BARRIERE',	'PROVINCE D’ORIGINE : ITURI;\nTERRITOIRE : IRUMU;\nDERNIER TITRE SCOLAIRE : DIPLOME EN SCIENCE SOCIALE;\nADRESSE ACTUELLE : Q. BANKOKO; AV. KAKWA1;\nN 15',	'NOM RESPONSABLE : JEAN BAPTISTE MANGAGA;\nN Tel : 0814737147; 0814544086\nWHATSAPP: 0978665875',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(36,	'1990-12-26 00:00:00',	'True',	'AVESI',	'',	'MAVIA',	'WIVINE',	'',	'',	'',	'',	'',	'',	'PROVINCE D’ORIGINE : ITURI;\nTERRITOIRE : IRUMU;\nDERNIER TITRE SCOLAIRE : DIPLOME EN SCIENCE SOCIALE;\nADRESSE ACTUELLE : Q. KINDIA; AV. MATONGE;\n',	'NOM RESPONSABLE : MASUMBUKO;\nN Tel: 0813692641;',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(37,	'2008-02-18 00:00:00',	'True',	'CRISTEL ',	'',	'ABULE',	'  ',	'',	'',	'',	'',	'',	'MUNGBERE',	'PROVINCE D’ORIGINE : HAUT-UELE\nTERRITOIRE D’ORIGNIE: WATSA\nQ. YAMBI YAYA',	'BOKANGA, 0814401672; 0815784785',	1,	2,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(38,	'2010-05-25 00:00:00',	'True',	'ITIELE',	'',	'LINIE',	'ESTHER',	'',	'',	'',	'',	'',	'RETY',	'PROVINCE D’ORIGINE : BAS-CONGO\nTERRITOIRE D’ORIGINE: ......................\nADRESSE ACTUELLE: POLICE DE FRONTIERE\nECOLE DE PROVENANCE:\nAPTITUDE PHYSIQUE:\nDOCUMENTS FORNIS:',	'ITIELE AURELIEN ET MASIKA EUGENIE, 0825092400; 0812639316\nWHATSAPP: 0825092400',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(39,	'2008-12-12 00:00:00',	'True',	'MANKISA',	'',	'MUZI',	'GRACE',	'',	'',	'',	'',	'',	'MAHAGI',	'PROVINCE D’ORIGINE : ITURI;\nTERRITOIRE : IRUMU;\nDERNIER TITRE SCOLAIRE : DIPLOME EN SCIENCE SOCIALE;\nECOLE DE PROVINCENANCE: CS. N. MANDELA;\nDOCUMMENT SCOLAIRE:  BULLET 8e, PALMARES;\nADRESSE ACTUELLE : Q. HOHO; RUE. KOMANDA;',	'NOM PARANT : LUMBABOMOZI;\nN Tel : 0828725952 ;',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(40,	'2008-07-27 00:00:00',	'True',	'KAPALATA',	'',	'JEMIMA',	' ',	'',	'',	'',	'',	'',	'  ARIWARA',	'PROVINCE D’ORIGINE : \nTERRITOIRE D’ORIGINE: \nECOLE DE PROVENANCE: COMPLEXE SCOLAIRE MANDELA\nAPTITUDE PHYSIQUE:\nADRESSE PHYSIQUE: \nDOCUMENTS FOURNIS',	'KAPALATA, 0823238836\nWHATSAPP: 0974319368',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(41,	'2010-08-28 00:00:00',	'True',	'PULU',	'',	'KAPELA',	'AGNES',	'',	'',	'',	'',	'',	'DURBA',	'PROVINCE D’ORIGINE : ITURI\nTERRITOIRE D’IRUMU: IRUMU\nECOLE DE PROVENANCE : \nAPTITUDE PHYSIQUE\nADRESSE PHYSIQUE: Q. YAMBI YAYA, AV. AVO\n',	'AVO EKA, 0816844495 / 0829396308 / 0810079343',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(42,	'2010-01-27 00:00:00',	'True',	'KASONGO',	'',	'ELAMEJI',	'MANSASSE',	'',	'',	'',	'',	'',	'GOMA',	'PROVINCE D’ORIGINE : KASAI ;\n\nADRESSE ACTUELLE : Q. GOUVERNORANT ;AVENUE. MONOBLOCK;\n',	'NOM PARANT PERE : ELAMEJI\nPROFESSION : PASTEUR\nNOM DE LA MERE : PATRICIA FEZA\nPROFESSION : MENAGERE',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(43,	'2008-12-27 00:00:00',	'True',	'KAHAMBU',	'',	'VAGHENI',	' ',	'',	'',	'',	'',	'',	'BUTEMBO',	'PROVINCE D’ORIGINE : NORD-KIVU\nTERRITOIRE D’ORIGINE : LUBERO\nECOLE DE PROVENANCE:\nAPTITUDE PHYSIQUE:\nADRESSE PHYSIQUE: Q. SUKISA 2\n',	'PERE: KAMBALE KOVINE\nPROFESSION:\nMERE: KATUNGU SINDANI\nPROFESSION: MANAGERE',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(44,	'1880-09-19 00:00:00',	'True',	'SCHAFRAD',	'',	'TIBANAGWA',	'ESTHER',	'',	'',	'',	'',	'',	' ',	'PROVINCE D’ORIGINE : \nTERRITOIRE D’ORIGINE : \nECOLE DE PROVENANCE:\nAPTITUDE PHYSIQUE:\nADRESSE PHYSIQUE: ',	'PERE: SCHAFRAD CHARLES \n, 0811502760; PROFESSION: FERMIER\nMERE: UBEMU MELONGOMA; 0829665066; PROFESSION.......',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(45,	'2010-12-25 00:00:00',	'True',	'KAYUTULHA',	'',	'MUSAFIRI',	'PATRICIA',	'',	'',	'',	'',	'',	'BUNIA',	'PROVINCE D’ORIGINE : NORD-KIVU;\nTERRITOIRE : LUBERO;\nECOLE DE PROVINCENANCE: CS. NG;\nDOCUMMENT SCOLAIRE:  BULLET 7e, PALMARES;\nADRESSE ACTUELLE : Q. LUMUMBA; AVENU MAMAN ARAMBA. KOMANDA;\nN 70\n\n',	'NOM DU PERE : MUSAFIRI\nPROFESSION : COMMERCANT;\nNOM DE LA MERE:KAMUHA JENNY\n PROFESSION : SECRETAIRE\nN TEL 0818827898/ 09945952728',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(46,	'2008-04-15 00:00:00',	'True',	'MUHINDO',	'',	'SIVITSOMWA',	'PATRICK',	'',	'',	'',	'',	'',	'BUNIA',	'PROVINCE D’ORIGINE : NORD-KIVU\nTERRITOIRE D’ORIGINE : LUBERO\nECOLE DE PROVENANCE: C.S.NDG\nAPTITUDE PHYSIQUE: \nADRESSE PHYSIQUE: \n\n',	'KASEREKA 0811078430\nKAHINDO: 0819853557',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(47,	'2010-10-04 00:00:00',	'True',	'KAVIRA',	'',	'HANGI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'PROVINCE D’ORIGINE : NORD-KIVU\nTERRITOIRE D’ORIGINE : BUNI\nECOLE DE PROVENANCE: C.S.NDG\nAPTITUDE PHYSIQUE:\nADRESSE PHYSIQUE: POLICE DE FRONTIERE\n\n\n',	'GENINGA ABDALLAH: AGENT DE L’ETAT: 0826420712;\nKAVIRA MAKAMBO: COMMERCANTE',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(49,	'2008-10-02 00:00:00',	'True',	'ASIMWE',	'',	'RUHIGWA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'PROVINCE D’ORIGINE : ITURI\nTERRITOIRE D’ORIGINE : DJUGU\nECOLE DE PROVENANCE: C.S.NDG\nAPTITUDE PHYSIQUE:\nADRESSE PHYSIQUE: POLICE DE FRONTIERE\n\n\n',	'KIZA RUHIGWA: COMMERCANT; 0810130084\nKAHAMBU MAYALA: MENAGERE',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(50,	'2010-08-23 00:00:00',	'True',	'FIOTI ',	'',	'MAMPUYA',	'EMILIE',	'',	'',	'',	'',	'',	'BUNIA',	'PROVINCE D’ORIGINE : BANDUNDU\nTERRITOIRE D’ORIGINE : BULUNGU\nECOLE DE PROVENANCE: C.S.NDG\nAPTITUDE PHYSIQUE:\nADRESSE PHYSIQUE: POLICE DE FRONTIERE\n\n\n',	'DOUDOU MAMPUYA: Ir TECH, 0814444130\n\nMARIE MWAWUKA: MENAGERE, 0812320520521',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(52,	'1880-09-19 00:00:00',	'True',	'UKWIRWOTH',	'',	'ATIMNEDI',	'  ',	'',	'',	'',	'',	'',	' ',	'PROVINCE D’ORIGINE : MAHAGI\nTERRITOIRE D’ORIGINE : \nECOLE DE PROVENANCE: C.S.NDG\nAPTITUDE PHYSIQUE: PROBLEME DE VISION\nADRESSE PHYSIQUE: POLICE DE FRONTIERE\n\n\n',	'AYIKO JEAN PIERRE: INFIRMIER; 0812732188, WHATSAPP: 0973770747\nAMEDOCAN UPANA: ADMINISTRATRICE, 0815810879',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(53,	'2010-10-08 00:00:00',	'True',	'BEYEZA',	'',	'BARAKA',	'  ',	'',	'',	'',	'',	'',	'BUNIA',	'PROVINCE D’ORIGINE : ITURI\nTERRITOIRE D’ORIGINE : IRUMU\nECOLE DE PROVENANCE: C.S.NDG\nAPTITUDE PHYSIQUE:\nADRESSE PHYSIQUE: POLICE DE FRONTIERE\n',	'BARAKA BAHEMUKA: AG. HUMANITAIRE; WHATSAPP: 0812907441\nBAGUMA CAROLINE: MENAGERE, 0822676838',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(54,	'2009-04-23 00:00:00',	'True',	'KATOBE',	'',	'ZENGBA',	' ',	'',	'',	'',	'',	'',	'BENI',	'PROVINCE D’ORIGINE : ITURI;\nTERRITOIRE : IRUMU;\n\nECOLE DE PROVINCENANCE: CS. JEAN MARI DE LA MENAIS;\nDOCUMMENT SCOLAIRE:  BULLET 7e EB/C, PALMARES;\nADRESSE ACTUELLE : Q. POLICE DES FRONTIERES;',	'NOM PARANT : ERICK BAHATI/\nPROFESSION : AGENT DE L’ETAT.\nMERE MWANZI ROSE;\nPROFESSION : MENANGERE;\nN Tel : 0828725952 ;',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(55,	'2008-11-19 00:00:00',	'True',	'NZOKO',	'',	'KIWENGA',	'MARTINE',	'',	'',	'',	'',	'',	'OICHA',	'PROVINCE D’ORIGINE : BANDUNDU\nTERRITOIRE D’ORIGINE : \nECOLE DE PROVENANCE: C.S.NDG\nAPTITUDE PHYSIQUE:\nADRESSE PHYSIQUE: POLICE DE FRONTIERE\n\n\n',	'NZOKO NTAMUMBANA: AG. DE L’ETATA, 0812062828, WHATSAPP: 0997744037',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(56,	'2009-10-09 00:00:00',	'False',	'MASIKA',	'',	'KASOMO',	'DEKILA',	'',	'',	'',	'',	'',	'OICHA',	'QUARTIER : DHELE',	'NOM PERE: KAMBA SAMY \nN TEL : 0813773275\nNOM DE LA MERE : 0991594221',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'False'),
(57,	'2009-08-03 00:00:00',	'True',	'MUMBERE ',	'',	'TSUTSANGA',	'JORDAN',	'',	'',	'',	'',	'',	'  ',	'Q. KINDIA',	'KASEREKA KANYAISI: 0812004378',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(58,	'1880-09-20 00:00:00',	'True',	'MWISA',	'',	'KAHAMBU',	'SEPHORA',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER: HOHO\n',	'NOM DU PERE :MACHOZI MWANARAOL;\nPROFESSION : ENSEIGNANT;\nNOM DE LA MERE: LOVE DZ’ ZU MICHELINE;\nPROFESSION: FONCT SOKIMO\nN TeL : 0823586395',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(59,	'2007-02-07 00:00:00',	'True',	'ATUNDU',	'',	'EYAMO',	'ANDY',	'',	'',	'',	'',	'',	'KINSHASA',	'PROVINCE D’ORIGINE: EQUATEUR\nTERRITOIRE D’ORIGINE: LISALA\nECOLE DE PROVENANCE: C.S.NDG\nAPTITUDE PHYSIQUE:\nADRESSE DES PARENTS: POLICE DE FRONTIERE ',	'PERE: MICHEL EYAMO, 0814804444\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(60,	'2010-05-28 00:00:00',	'True',	'KAKULE ',	'',	'KAKURUSI ',	'RAPHAEL',	'',	'',	'',	'',	'',	'BUTEMBO',	'Q. DELE',	'MUHINDO: 0998386343',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(61,	'2008-07-09 00:00:00',	'True',	'MASIKA',	'',	'PALUKU',	'CECILE',	'',	'',	'',	'',	'',	'GOMA',	'QUARTIER : YAMBI YAYA; AVENUE: POLICE DES FRONTIERS.\nDOCUMENT FOURNIE: BULETIN',	'NOM DU PERE: PALUKU MUMBERE;\nPROFESSION: MILITAIRE\nNOM DE LA MERE: MONIQUE BIRUSHA\nPROFESSION: MENAGERE\nN TeL:\n0813126877;\n+336567723414\n',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(62,	'2009-11-08 00:00:00',	'True',	'KYANGA ',	'',	'KIBONDO',	'GRACE',	'',	'',	'',	'',	'',	'ARIWARA',	'POLICE DES FRONTIERES',	'KYANGA KIBONDO',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(63,	'2008-03-06 00:00:00',	'True',	'MASENGU',	'',	'MPANDANJILA',	'  ',	'',	'',	'',	'',	'',	'KINSHASA',	'PROVINCE D’ORIGINE: KASAI-OCCIDENTAL\nTERRITOIRE D’ORIGINE: LUNGU\nECOLE DE PROVENANCE: C.S.NDG\nAPTITUDE PHYSIQUE: RAS\nADRESSE DES PARENTS: POLICE DE FRONTIERE \n',	'PERE: MPANDANJILA, PROFESSION : PASTEUR, TEL.: 0825624603\nMERE: MASENGU, PROFESSION: MENAGERE, TEL.: 0819348921',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(64,	'2010-03-15 00:00:00',	'True',	'BENEDICTE',	'',	'DHEDHENA',	'  ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER: YAMBI YAYA\nAVENUE: POLICE DE FRONTIERE\n ',	'NOM DU PERE : JEREMIE MUPENZI\nPROFESSION : HUMANITAIRE\nNOM DE LA MERE : LITOKA ANTOSHA\nPROFESSION : MENAGERE\nN TeL : 0815928176\nWhatsapp : 0815928176\nEmail : jeremiemupenzi@gmail.com',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(65,	'2008-04-10 00:00:00',	'True',	'FINAMO',	'',	'BIN ',	'MUDIAYI',	'',	'',	'',	'',	'',	'RWAMPARA',	'PROVINCE D’ORIGINE: KASAI ORIENTAL\nTERRITOIRE: LUPATAPATA\nRESIDENCE: DHELE / 300 MAISONS ',	'BALEDJA \nPROFESSION : MILITAIRE \n0813862359',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(67,	'2008-05-02 00:00:00',	'True',	'OKONGO ',	'',	'MOLISHO ',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'PROVINCE D’ORIGINE : MANIEMA\nTERRITOIRE : LUSAMBA 2\nRESIDENCE: LENGABO ',	'PERE: OKONGO SUMAHILI \nPROFESSION: HUMANITAIRE \nTEL: 0827909383',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(68,	'2008-06-26 00:00:00',	'True',	'BOOTO ',	'',	'LIOMBO ',	'CHANCELLE',	'',	'',	'',	'',	'',	'KAMINA',	'PRONVINCE D’ORIGINE : EQUATEUR \nRESIDENCE: Q. DELE',	'NOM DU PERE: LIOMBO BOLINGO \nPROFESSION: MILITAIRE \nTEL: 0826304386',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(69,	'2008-09-18 00:00:00',	'True',	'KASONGO ',	'',	'DJUNGA ',	'DARRYL',	'',	'',	'',	'',	'',	' KISANGANI',	'RESIDENCE: Q/ YAMBI YAYA \nC/ MBUNYA\n',	'NOM DU PERE: KASONGO OLENGA\nMERE: LOMETCHA POSHO JULIE\nTEL: 0812056208',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(70,	'1880-09-20 00:00:00',	'True',	'AYIKO ',	'',	'ABE',	'ANNE',	'',	'',	'',	'',	'',	'BUNIA',	'PROVINCE D’ORIGINE: ITURI \nTERRITOIRE: ARU \nRESIDENCE: POLICE DES FRONTIERES',	'NOM DU PERE: ABE\nPROFESSION: ENSEIGNANT \nTEL: 0810393131',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(72,	'2010-01-05 00:00:00',	'True',	'LISALAMA',	'',	'BOLAYA',	'GLORIA',	'',	'',	'',	'',	'',	'BUTEMBO',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(73,	'2009-07-26 00:00:00',	'True',	'WASSY',	'',	'MADIRICHA',	'  ',	'',	'',	'',	'',	'',	'BUTEMBO',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(74,	'2010-02-21 00:00:00',	'True',	'BEATRICE',	'',	'KASONGO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(75,	'2008-09-06 00:00:00',	'True',	'FATUMA ',	'',	'KASONGO ',	' ',	'',	'',	'',	'',	'',	'MAHAGI ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(76,	'2008-08-18 00:00:00',	'True',	'ANNIE',	'',	'KIKWAYA',	' ',	'',	'',	'',	'',	'',	'BENI',	'QUARTIER : POLICE DE FRONTIERE\nAVENUE : MAMA ARABA\n',	'NOM DU PERE : \nPROFESSION\nNOM DE LA MERE : \nPROFESSION\n\n',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(77,	'2009-09-19 00:00:00',	'True',	'KAMBALE',	'',	'COSMAS',	' ',	'',	'',	'',	'',	'',	'BUTEMBO ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(78,	'2009-02-07 00:00:00',	'True',	'BONGISE',	'',	'DUABO',	' ',	'',	'',	'',	'',	'',	'NYANKUNDE',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(79,	'2009-05-15 00:00:00',	'True',	'BANZA',	'',	'KAYUMBA',	' ',	'',	'',	'',	'',	'',	'KINSHASA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(80,	'2022-09-20 00:00:00',	'True',	'BAHATI',	'',	'BAKOLETA',	'ESTHER',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(81,	'2008-05-28 00:00:00',	'True',	'FOLO ',	'',	'MOKE',	' ',	'',	'',	'',	'',	'',	'KISANGANI ',	'HOHO \n',	'TEL: 0823653585\n0818426999',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(82,	'2009-12-17 00:00:00',	'True',	'MUYISA ',	'',	'MUGHOLE',	'GRACE',	'',	'',	'',	'',	'',	'BENI',	'RESIDENCE: HOHO',	'TEL: 0824798585\n0824044371',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(83,	'2007-12-22 00:00:00',	'True',	'MIRIAM',	'',	'DAUDA',	'MAKI',	'',	'',	'',	'',	'',	' RETHY',	'RESIDENCE: POLICE DES FRONTIERES ',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(84,	'2008-08-03 00:00:00',	'True',	'SIFA',	'',	'KAKUDJI',	'EVELINE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : POLICE DE FRONTIERE\n',	'NOM DU PERE : KAKUNDI CLAUDE\nPROFESSION : AG. DGRAD\n0814374872',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(85,	'2007-07-20 00:00:00',	'True',	'VAWEKA',	'',	'AMONDO',	' ',	'',	'',	'',	'',	'',	'KASENYI',	'QUARTIER: HOHO',	'NOM DU PERE :UFUNGI VAWEKA\nTeL : 0827739955',	1,	2,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(86,	'2009-07-26 00:00:00',	'True',	'KIKI',	'',	'GEGE',	' ',	'',	'',	'',	'',	'',	'BUTA',	'QUARTIER: HOHO',	'TAMBWE HAMISI\n081379625',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(87,	'2010-11-18 00:00:00',	'True',	'SCHAFRAD ',	'',	'BIANKYA',	'LIONEL ',	'',	'',	'',	'',	'',	'NIOKA',	'RESIDENCE: POLICE DES FRONTIERES \nAV: KICHELE ',	'TEL: 0811502760 / 0819665066',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(88,	'2008-05-15 00:00:00',	'True',	'MUSAFIRI',	'',	'RAFIKI',	'MOISE',	'',	'',	'',	'',	'',	' BUTEMBO',	'QUARTIER : DHELE\n',	'KIZITO MUSAFIRI\n0810275500',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(89,	'2007-12-28 00:00:00',	'True',	'NZIAVAKE ',	'',	'SAWA',	' ',	'',	'',	'',	'',	'',	'BAFWASENDE',	'RESIDENCE: HOHO ',	'TEL: 0822371035 / 0810032695',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(90,	'2011-01-28 00:00:00',	'True',	'ITINDI',	'',	'BOLEKALEKA',	'DAN',	'',	'',	'',	'',	'',	'BUNIA',	'ADRESSE: Q.KINDA, AV. MULUMBE\nNUM. TEL. 0824449888, 0817415000',	'DOMINIQUE BOLEKALEKA ET MUNGWANANGU ANIKANDA',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(91,	'2010-06-19 00:00:00',	'True',	'TAMBWE',	'',	'ADJENGO ',	'ESTHER',	'',	'',	'',	'',	'',	'KINSHASA',	'RESIDENCE: HOHO ',	'TEL: 0813796625 / 0822560642',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(92,	'2010-01-16 00:00:00',	'True',	'KAMBALE ',	'',	'DANIEL',	' MIRACLE',	'',	'',	'',	'',	'',	'',	'QUARTIER : DHELE\n',	'KIZITO MUSAFIRI\n0810275500',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(93,	'2010-07-27 00:00:00',	'True',	'AMISI',	'',	'SIFA',	' ',	'',	'',	'',	'',	'',	'ARU',	'',	'LONGU',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(94,	'2010-03-15 00:00:00',	'True',	'ARUBU',	'',	'RAMAZANI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'Q. KINDIA AU SOURCE',	'AMISI RAMAZANI ET MATOYA GAYANA\nNOM.TEL. 08275048639, 0829162849',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(96,	'2010-06-30 00:00:00',	'True',	'AYIYORWOTH',	'',	'AFOYO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER ;  DHELE\n',	'KYERMUNDE EMMANUEL\n0822076303',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(100,	'2010-12-28 00:00:00',	'True',	'AKOLOYO',	'',	'MUNDUBI',	'JULIE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER/POLICE DE FROTIERE',	'MUNDUBI JOSEPH\n0813711425',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(101,	'2011-02-23 00:00:00',	'True',	'MULINZI',	'',	'KAHWA',	'ELIE',	'',	'',	'',	'',	'',	' ',	'QUARTIER : POLICE DE FRONTIERE',	'JASEPH KAHWA\n0812424340/ 0818367354',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(103,	'2008-08-03 00:00:00',	'True',	'SHAKIRA',	'',	'BINTI',	'  ',	'',	'',	'',	'',	'',	'KASONGO',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(104,	'2006-07-07 00:00:00',	'True',	'KAKULE',	'',	'ISUMU',	'BENJAMIN',	'',	'',	'',	'',	'',	'BENI',	'QUARTIER : POLICE DE FRONTIER',	'KAMBALE  WNZI\nO810201543/ 0823576667',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(105,	'2010-05-21 00:00:00',	'True',	'TAYAYE',	'',	'BISELENGE',	'KENNETH',	'',	'',	'',	'',	'',	'BANDAKA',	'QUARTIER/POLICE DEFROTIERE',	'TAYAYE PATRICK\n0819085052',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(106,	'2011-04-15 00:00:00',	'True',	'KABATENDE',	'',	'BAHIGA',	' ',	'',	'',	'',	'',	'',	'ARU',	'QUARTIER : HOHO',	'KABATENDE J. C.\nBANIGA YVETTE\n0813734280/ 0822494566',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(107,	'2007-11-21 00:00:00',	'True',	'LINGOLI',	'',	'NGONZIKALE',	'OLIVE',	'',	'',	'',	'',	'',	'NYANKUNDE',	'ECOLE DE PROVENANCE: C.S. LEOPOLD-VILLE',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(108,	'2010-10-22 00:00:00',	'True',	'AFOYORWOTH',	'',	'LONEMA   ',	'   JOSUE',	'',	'',	'',	'',	'',	'BENI',	'QUARTIER/HOHO',	'LONEMMA KAKURA JONATHAN\n0825140826',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(109,	'2009-10-26 00:00:00',	'True',	'HEKIMA',	'',	'KANEGA',	'ROLAND',	'',	'',	'',	'',	'',	'GOMA',	'Q. POLICE DE FRONTIERE',	'BAULA SAMUNANE ET KAMALA IMMACULE\nNUM.TEL. O979691438, 0974839655',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(110,	'2008-07-31 00:00:00',	'True',	'BASHIMBE',	'',	'CHIGOHO',	'     ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO',	'BASHIMBE MUHIMUZI\n0812927180 / 0830397380',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(111,	'1880-09-20 00:00:00',	'True',	'ARIDJA',	'',	'MASUDI',	'CHARLOTTE ',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(112,	'2007-12-21 00:00:00',	'True',	'KIFUNA',	'',	'KAGAWA',	'EMMANUEL',	'',	'',	'',	'',	'',	'BENI',	'QUARTIER/POLICE DE FROTIERE',	'ERICK BAHATI\n0810201543',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(113,	'2009-07-29 00:00:00',	'True',	'AZINA',	'',	'DJARI',	' ',	'',	'',	'',	'',	'',	'GETHY',	'Q. HOHO',	'DJARI ET AZEDJI',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(114,	'2011-09-25 00:00:00',	'True',	'KASI',	'',	'CHOFI',	'LAUREINE',	'',	'',	'',	'',	'',	'BUKAVU',	'QUARTIER : POLICE DE FRONTIER',	'EMILE KWAKWA CHOFI\n0820035322/ 0991500077',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(115,	'1880-09-20 00:00:00',	'True',	'NZANZU',	'',	'MUHASA',	'  ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(118,	'2009-06-12 00:00:00',	'True',	'MAKASI',	'',	'MENGE',	'ROLIN',	'',	'',	'',	'',	'',	'G0OMA',	'QUARTIER/ HOHO',	'\nMAKASI\n0825899675',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(119,	'2011-05-05 00:00:00',	'True',	'TSHINSEKA',	'',	'WANZANBI',	'DAVID',	'',	'',	'',	'',	'',	'BENI',	'Q. POLICE DE FRONTIERE',	'WANZANGI DAVID ET KOYAKA MANY\nNUM.TEL.0819631229, 0829296079',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(121,	'2008-10-06 00:00:00',	'True',	'NDASHIMIRWA',	'',	'GLOIRE',	'  ',	'',	'',	'',	'',	'',	'UGANDA',	'Q. POLICE DE FRONTIERE',	'GEBY NDASHIMIRWA ET BIRUNGI\nNUM.TEL. 0824744526',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(122,	'2011-03-08 00:00:00',	'True',	'FAZILI',	'',	'MUGHENI',	'ISABELLE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER/POLICE DE FROTIERE',	'RAIS IRIRYA\n0997707950',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(123,	'1880-01-01 00:00:00',	'True',	'MUGHOLE',	'',	'KAPITENI',	'    ',	'',	'',	'',	'',	'',	'  ',	'QUARTIER : HOHO 1',	'HUGHO KAPITENI\n0994809799 / 0995361218',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(124,	'1880-01-01 00:00:00',	'True',	'MPUTU',	'',	'OFITOM',	'      ',	'',	'',	'',	'',	'',	'KINSHASA',	'QUARTIER/BANKOKO',	'MPUTU OLIVIER  \n0814392556',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(125,	'1880-09-20 00:00:00',	'True',	'VISIKA',	'',	'KYAVUGHA',	'  ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(126,	'1880-09-20 00:00:00',	'True',	'REHEMA',	'',	'NGOMA',	'YOLANDE',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(127,	'1880-09-20 00:00:00',	'True',	'ALESI',	'',	'ASSEA',	'MERVEILLE',	'',	'',	'',	'',	'',	'ARIWARA',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(128,	'2009-04-15 00:00:00',	'True',	'MASUDI',	'',	'SUZANA',	'JEMIMA',	'',	'',	'',	'',	'',	'BENI',	'POLICE DE FRONTIERE',	'NUNDA RACHI\n0813027604 / 0822483273',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(129,	'2011-06-26 00:00:00',	'True',	'BOSONGO',	'',	'YANGOTIKALA ',	'      ',	'',	'',	'',	'',	'',	'  ',	'QUARTIER/HOHO',	'BOSONGO\n0827546614',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(130,	'2010-07-31 00:00:00',	'True',	'FATUMA',	'',	'KIRONGOZI',	'DOUCEUR',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER ; DHELE\n',	'KOMANDA ANTOINE\n0812128666 / 0815911700',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(131,	'1880-01-01 00:00:00',	'True',	'BASAY',	'',	'BOBI',	'CHRISTIANA',	'',	'',	'',	'',	'',	'KISANGANI',	'POLICE DE FRONTIERE',	'BASANENI',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(133,	'2006-06-23 00:00:00',	'True',	'KAVIRA',	'',	'MUHYANI',	'  ',	'',	'',	'',	'',	'',	'BENI',	'QUARTIER HOHO',	'0824449247 / 081195899',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(134,	'2010-06-26 00:00:00',	'True',	'SALAMA',	'',	'NDJABA',	' ',	'',	'',	'',	'',	'',	'BAMBU',	'Q. DHELE',	'NDJABA BAUDJO\n0810611760',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(135,	'2011-07-17 00:00:00',	'True',	'MUSAU',	'',	'MBAYA',	'FLAURENCE',	'',	'',	'',	'',	'',	'BUNIA',	'Q. POLICE DE FRONTIERE',	'UYERA MARACHTHO\nNUM.TEL.0816400502, 0891144279',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(136,	'2011-03-21 00:00:00',	'True',	'OTSHUDIEMA',	'',	'LOKENYE',	'DIEUMERCI',	'',	'',	'',	'',	'',	'MAHAGI',	'PROVINCE D’ORIGINE: KASAI ORIENTAL\nTERRITOIRE: SANKURU\nADRESSE PHYSIQUE: POLICE DE FRONTIERE',	'PERE: OTSHUDIEMA; PROFESSION: MEDECIN; TEL. 0827943974\nMERE: BIBISHA, PROFESSION: MENAGERE\nTEL: 0824812262',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(137,	'1880-09-20 00:00:00',	'True',	'KASONGO',	'',	'OLENGA',	'MORGAN',	'',	'',	'',	'',	'',	'    ',	'YAMBI YAYA ',	'KASONGO OLENG ET LOMETCHA PASHO JULI',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(138,	'2011-07-24 00:00:00',	'True',	'BADIBANGA',	'',	'MUYENGA',	'CHRISTIANT',	'',	'',	'',	'',	'',	'KISANGANI',	'PROVINCE D’ORIGINE: KASAI ORIENTAL\nTERRITOIRE: NIABI\nADRESSE PHYSIQUE: POLICE DE FRONTIERE',	'PERE: BUKASA BADIBANGA; PROFESSION: POLICIER; TEL: 0828586001\nMERE: ZEKA KIVOKA, PROFESSION: MENAGERE; TEL: 0823732082',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(139,	'1980-09-20 00:00:00',	'True',	'KASANGAKI',	'',	'BUGASAKI',	'AIMEDO',	'',	'',	'',	'',	'',	'KASENYI',	'Q. HOHO',	'NYAMA ET MBABAZI\nNUM.TEL. 0820985220, 0818795340',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(140,	'2010-12-24 00:00:00',	'True',	'KERMUNDU  ',	'',	'TUNDURU',	'JEANS NOEL',	'',	'',	'',	'',	'',	'BUTEMBO',	'',	'ALIACON KERMUND\n0813778486 - 0819135018',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(141,	'2010-10-24 00:00:00',	'True',	'ALIFI',	'',	'MBAMBE',	'MERVEILLE',	'',	'',	'',	'',	'',	'BENI',	'GOUVERNORAT',	'ALIFI ET FALANGA\nNOM.TEL. 0819580559, 0818340863',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(142,	'2010-05-10 00:00:00',	'True',	'LUFUNGULA',	'',	'ESSENTIEL',	' MAUWA',	'',	'',	'',	'',	'',	'MAHAGI',	'Q. POLICE DE FRONTIERE',	'LUFUNGULA DALTON',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(143,	'2007-09-11 00:00:00',	'True',	'KAHAMBU',	'',	'VITAVA',	'DIVINE',	'',	'',	'',	'',	'',	'BUTEMBO',	'Q.HOHO/POLICE DE FRONTIERE',	'MBUSA SUMBUKO ET MASIKA KAGHENI\nNOM.TEL.0811705760, 0828880509',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(144,	'2010-06-13 00:00:00',	'True',	'KAVIRA',	'',	'MBAFUMOYA',	' ',	'',	'',	'',	'',	'',	'MAHAGI',	'Q. KINDIA',	'KASEREKA YALALA ET MAGANI LEMABO\nNUM.TEL.0811432760, 0991896754',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(146,	'2009-09-20 00:00:00',	'True',	'MARUNGA',	'',	'RONA',	'ESTHER',	'',	'',	'',	'',	'',	'BENI',	'DHELE BUNIA VILLE',	'RONA KATAWANGA ET ANDRASI TASIMA\n0810253087',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(147,	'1880-01-01 00:00:00',	'True',	'KITAMBO',	'',	'BONYAMBALA',	' DANIELA',	'',	'',	'',	'',	'',	' ',	' ',	'0810162263',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(148,	'2022-09-20 00:00:00',	'True',	'MUGHOLE',	'',	'KAGHENI',	'GRACE',	'',	'',	'',	'',	'',	'',	'Q.HOHO/POLICE DE FRONTIRE',	'MUHINDO VAGHINI ET KAVUGHO\nNUM.TEL.0811705760, 0828880509',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(149,	'2010-03-31 00:00:00',	'True',	'MASIKA',	'',	'MANGALA',	'CHRISTELLA',	'',	'',	'',	'',	'',	'BUNIA',	'Q. HOHO',	'NZANZU PEPURA\n0816234234',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(150,	'2011-01-09 00:00:00',	'True',	'JAEL',	'',	'N’DJULU',	' ',	'',	'',	'',	'',	'',	'BENI',	'Q.BANKOKO,AV.MANIEMA/N 58',	'N’DJULU ALFRED ET BAGAMBESE BIJOUX\nNUM.TEL.0819229559, 0822626493,\n',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(151,	'2008-03-08 00:00:00',	'True',	'ALISA',	'',	'BARUANI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'Q. BANKOKO AVENUE: LOGOII N_55',	'MBUY TSHISUMPA\n0822802502',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(152,	'2008-10-30 00:00:00',	'True',	'MASIKA',	'',	'MITONDANO',	'ESTHER',	'',	'',	'',	'',	'',	'MENGO',	'Q.DELE',	'KAKULE MADIRISHA ET MAMBANYE JULIE\nNUM.TEL.0814200607, 0971560554,0821007444',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(153,	'2011-03-02 00:00:00',	'True',	'ANGBANDA',	'',	'SADY',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'Q. LENGABO, AV.PROCURE BAFOA',	'AMASINDRA SADY ET NGASOBEY WONDY\nNUM.TEL.0815015347, 0813811896,',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(154,	'2010-12-23 00:00:00',	'True',	'SAGE',	'',	'MUKAMA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'BONANE MASIMENGO ET PHARMACIENNE',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(155,	'2009-09-29 00:00:00',	'True',	'MUHINDO',	'',	'MILAVU',	' ',	'',	'',	'',	'',	'',	'ISIRO',	'Q. HOHO/CME NYANKUNDE',	'DIMANCHE KATEMBO\nNUM.TEL.0814575118, 0822777262, 0991019051',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(156,	'2010-01-02 00:00:00',	'True',	'MUMBERE',	'',	'MATHE',	'INNOCENT',	'',	'',	'',	'',	'',	'BUTEMBO',	'QUARTIER KINDYA\n',	'KAMBALE MUTWANGA',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(157,	'2011-09-09 00:00:00',	'True',	'DIPO ',	'',	'LIATA',	'DORCAS',	'',	'',	'',	'',	'',	'BUNIA',	'PROVINCE D’ORIGINE: TSHOPO\nTERRITOIRE: TURUMBU\nAPTITUDE PHYSIQUE: NORMAL\nADRESSE PHYSIQUE: POLICE DE FRONTIERE',	'PERE: DIPO SANTY, AGENT FOND SOCIAL, TEL.: 0825092400\nMERE: CADETTE NTUMBA: AGENT DE L’ETAT, TEL. 0812639316',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(158,	'1880-09-20 00:00:00',	'True',	'LWANZO',	'',	'MWANAMOLO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO',	'MACHOZI MWAMARA\n0823586395',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(160,	'1880-09-20 00:00:00',	'True',	'YUSUFU',	'',	'TSHOMBA',	'OMAR',	'',	'',	'',	'',	'',	'GOMA',	'GOUVERNORAT',	'OTIARI TSHOMBA ET ADIDJA MAHESHE\nNUM.TEL.0819644266, 0815119189',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(161,	'2010-08-31 00:00:00',	'True',	'LUSAKUMUNU',	'',	'BOLUMBU',	'PREFINA',	'',	'',	'',	'',	'',	'KINSHASA',	'Q.POLICE DE FRONTIERE',	'LUSAKUMUN GUY',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'False'),
(162,	'2014-10-29 00:00:00',	'True',	'MUNDURU',	'',	'BAIFA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER; POLICE DE FRONTIERE',	'NZABHA ALPHONSE\n0817688888/ 0811755129',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(163,	'2011-12-01 00:00:00',	'True',	'BI-ABA',	'',	'MUNDAMBO',	'  ',	'',	'',	'',	'',	'',	'GOMA',	'PROVINCE D’ORIGINE: HAUT-UELE\nTERRITOIRE: WAMBA\nAPTITUDE PHYSIQUE: RAS\nADRESSE PHYSIQUE: DELE\n',	'PERE: JEANOT, FONCTION: INGENIEUR, TEL: 0827666677; WHATSAPP 09212152943\nMERE: GLORIA, FONCTION: MANAGERE; TEL 0816539092\n',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(164,	'2009-04-02 00:00:00',	'True',	'MASIKA',	'',	'WANGIVIRO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'MUMBERE KALAHALI\n0815726100 / 0972432707',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(165,	'2007-09-12 00:00:00',	'True',	'BOHULU',	'',	'NYOTA',	'GLORIA',	'',	'',	'',	'',	'',	'OFAY',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(166,	'1880-01-01 00:00:00',	'True',	'KATUNGU ',	'',	'MUVISWA',	'REBECCA',	'',	'',	'',	'',	'',	' ',	'QUARTIER : GOUVERRANT',	'KASEREKA MUKOHYA\n0994497455',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(167,	'2008-12-11 00:00:00',	'True',	'MABWANGO',	'',	'PIMBANI',	' ',	'',	'',	'',	'',	'',	'ISIRO',	'POLICE DE FRONTIERE',	'PIMBANI BIENVENU ET DEBORAH\nNUM.TEL.0813765607',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(168,	'1880-09-20 00:00:00',	'True',	'KASEREKA',	'',	'SAWA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(169,	'2009-05-10 00:00:00',	'True',	'KAMBALE ',	'',	'KIKYO',	' ',	'',	'',	'',	'',	'',	'BUTEMBO',	'RESIDENCE: KINDIA',	'TEL: 0979091089',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(170,	'2012-07-05 00:00:00',	'True',	'AIMEE',	'',	'KILUKA',	' PLAMEDIE',	'',	'',	'',	'',	'',	'BUKAVU',	'QUARTIER : POLICE DE FRONTIERE',	'KILUKA MICHEL\n0812319377 / 0810929163',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(173,	'2007-10-24 00:00:00',	'True',	'LEONI',	'',	'ONDEBACHI',	'MIREILLE',	'',	'',	'',	'',	'',	'KOMANDA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(175,	'2007-03-23 00:00:00',	'True',	'LOVIPALAR',	'',	' ',	'BIENFAIT ',	'',	'',	'',	'',	'',	'DURBA',	'RESIDENCE: Q. BANKOKO',	'TEL: 0817700045',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(176,	'2010-05-23 00:00:00',	'True',	'ZOLA',	'',	'MATONDO',	'EXAUCEE',	'',	'',	'',	'',	'',	'HAUT KATANGA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(177,	'1880-09-20 00:00:00',	'True',	'DAN',	'',	'MUSEKETWA',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(179,	'2009-05-25 00:00:00',	'True',	'ANGAZA ',	'',	'MOTOMUNGU',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'RESIDENCE: POLICE DES FRONTIERES',	'TEL: 0813532678 ; 0823827770\n0998506664',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(180,	'2009-10-25 00:00:00',	'True',	'KAMBALE',	'',	'KIKATI',	' ',	'',	'',	'',	'',	'',	'BUTEMBO',	'POLICE DE FRONTIERE',	'MUKWESO JACKSON ET FATUMA GABRIELLE\nNUM.TEL.0999643464',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(182,	'2010-12-10 00:00:00',	'True',	'NAMALINYA',	'',	'TSHIPANDE',	'LUVANDE',	'',	'',	'',	'',	'',	'LUBU',	'POLICE DE FRONTIERE',	'YAWERO ET ODETTE\nNUM.TEL.0814792072, 0811879027',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(183,	'2011-01-11 00:00:00',	'True',	'LUKOGHO',	'',	'MULAMBO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE\nAV. MWANA',	'KASEREKA MWATI\n0998104362',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(184,	'2011-10-29 00:00:00',	'True',	'KASHINDE',	'',	'ABEDI',	'DIVINE',	'',	'',	'',	'',	'',	'MAMBASA',	'POLICE DE FRONTIERE',	'ABEDI\n0814504087\n0892439581',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(185,	'2011-03-28 00:00:00',	'True',	'OSOKO',	'',	'YAKANGA',	'CHRISTELLE',	'',	'',	'',	'',	'',	'KISANGANI',	'POLICE DE FRONTIERE',	'OSOKO BERNARD',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(187,	'1880-09-20 00:00:00',	'True',	'AISHA',	'',	'YAFILI',	'NANGA',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'NANGA MAPASA\n0816595619',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(188,	'1980-09-20 00:00:00',	'True',	'MASIKA',	'',	'MAHAMBA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'Q. HOHO',	'MUMBERE MUHISA\nNUM.TEL.\n0826865007\n 0999421254',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(189,	'2009-04-05 00:00:00',	'True',	'YANGO',	'',	'LUZOLO',	' ',	'',	'',	'',	'',	'',	'  ',	'POICE DE FRONTIERE',	'YONG ODETTE\n0814792072',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(190,	'2009-10-30 00:00:00',	'True',	'LUPATA',	'',	'MUKENDI',	'OBHAMA',	'',	'',	'',	'',	'',	'KINSHASA',	'Q. DHELE',	'MUKENDI LUPATA',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(193,	'2010-09-29 00:00:00',	'True',	'MOMBILI',	'',	'ETAPE',	'JEAN-MARIE',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(194,	'2011-11-07 00:00:00',	'True',	'MAKPASA',	'',	'ALAMUBANGA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'JUSTIN \n0821725259/ 0810252184',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(195,	'2011-10-10 00:00:00',	'True',	'SALUMU',	'',	'RIZIKI',	'JOYS',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(196,	'2012-07-27 00:00:00',	'True',	'AMINA',	'',	'MASTAKI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'Q. YAMBI YAYA',	'MASTAKI MIHIGO\n0819614131, 0824171571',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(197,	'2012-09-26 00:00:00',	'True',	'HIMBISE',	'',	'DUABO',	'PATRICIAL',	'',	'',	'',	'',	'',	'NYAKUNDE',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(198,	'2010-02-24 00:00:00',	'True',	'MUHUMBURWA',	'',	'KOMBI',	' CLEMENCE',	'',	'',	'',	'',	'',	'BUTEMBO',	'QUARTIER: DHELE\nAVENUE: GAHINDE\n',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(199,	'2012-07-05 00:00:00',	'True',	'LIPO',	'',	'BATIWE',	' ',	'',	'',	'',	'',	'',	'LIPO',	'POLICE DE FRONTIRE',	'LIPO ET LOKAKOLA,\n0815972144, 0819293099',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(202,	'1880-09-20 00:00:00',	'True',	'BOKOLI ',	'',	'ITOKO',	'EXAUCE',	'',	'',	'',	'',	'',	'  ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(204,	'2011-12-05 00:00:00',	'True',	'BORA',	'',	'WALU',	'DIVINE',	'',	'',	'',	'',	'',	'BUNIA',	'Q. YAMBI YAYA/ POLICE DE FRONTIERE',	'NGISALE WALU JOEL ET LOVE JULIENNE\nNUM.TEL. 0813316746',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(205,	'2012-06-06 00:00:00',	'True',	'MOYO',	'',	'WAROME',	'JOHN',	'',	'',	'',	'',	'',	'BENI',	'LENGABO/OKAPI LOGISTIQUE',	'DEBORAH KIRONGOZI\n0825758835',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(206,	'1880-09-20 00:00:00',	'True',	'MELISA ',	'',	'MANZOKI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	2,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(207,	'2011-04-15 00:00:00',	'True',	'KABATENDE',	'',	'MONGANE',	' ',	'',	'',	'',	'',	'',	'ARU',	'HOHO',	'KABATENDE\n0813774280/ 082249494566',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(209,	'2010-07-10 00:00:00',	'True',	'BOSEMO',	'',	'KASOKO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(210,	'2012-11-11 00:00:00',	'True',	'MASIKA',	'',	'YONGEZI',	'PATRICIA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(211,	'2019-01-27 00:00:00',	'True',	'TAYAYE',	'',	'FAFAY',	'OBED',	'',	'',	'',	'',	'',	'KISANGANI',	'BOULEVARD LUMUMBA',	'TAYAYE \n0812085057',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(213,	'2011-08-26 00:00:00',	'True',	'ELIKIA',	'',	'ANGOYO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'ANGOYO BENOIS\n0821064090',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(214,	'2011-11-11 00:00:00',	'True',	'TSHINSEKA ',	'',	'WANZAMBI',	'DURETTE ',	'',	'',	'',	'',	'',	'BENI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(215,	'1880-01-01 00:00:00',	'True',	'ASARA',	'',	'FEZA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(216,	'2012-02-26 00:00:00',	'True',	'KABUNGA',	'',	'NGOY',	'DAN',	'',	'',	'',	'',	'',	'BUNIA',	'Q. KINDYA; AV. MULUMBE',	'KABUNGA EMMANUEL\n0829393550',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(217,	'2010-12-11 00:00:00',	'True',	'AZANGANI',	'',	'PIMBANI',	'BIENVENU',	'',	'',	'',	'',	'',	'ARIWARA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(218,	'2011-07-16 00:00:00',	'True',	'MUSHIDI',	'',	'MUKENDI',	'YAVE',	'',	'',	'',	'',	'',	'KINSHASA',	'Q. DHELE',	'MUKENDI LUPATA\nNUM.TEL.0818515126, 0821997258, 0814699317',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(219,	'2011-12-17 00:00:00',	'True',	'NEDELSHEVA',	'',	'MADIBA',	'ELIELLE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'PERE\n08117539324 / 0824042274',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(220,	'2010-01-17 00:00:00',	'True',	'YASONI',	'',	'LUHAVO',	'JASON',	'',	'',	'',	'',	'',	'BUTEMBO',	'',	'TSONGO BUFFALO',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(221,	'1880-09-20 00:00:00',	'True',	'MUMBA ',	'',	'MONGA-MANGAMBU',	'MERDI',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(222,	'1880-09-20 00:00:00',	'True',	'SERONG',	'',	'TSUMBIRA',	'MUMBERE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(223,	'2011-07-07 00:00:00',	'True',	'KAMBALE ',	'',	'KAPAMBA',	'NATHANAEL',	'',	'',	'',	'',	'',	'BUNIA',	'BUNIA/AV.SALAMA,Q.HOHO,COMM. MBUNIA',	'NGUVI MOISE ET KAVUGHO\nTEL.0817403753, 0822026229, 0994013213, 0859173656',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(224,	'2012-05-13 00:00:00',	'True',	'NDAYA',	'',	'BAKADISUILA',	'DENISE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(225,	'2011-10-10 00:00:00',	'True',	'KAMBALE ',	'',	'VARONDI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(226,	'2012-05-29 00:00:00',	'True',	'KAVIRA',	'',	'SIWAKANYA',	'  ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'0812581406',	1,	2,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(227,	'1880-09-20 00:00:00',	'True',	'MUNGUJAKISA',	'',	'MOKE',	'MARDOCHEE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(230,	'2011-11-25 00:00:00',	'True',	'BAKEMWANGA',	'',	'SAPEKE',	'BEN',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(231,	'2011-06-24 00:00:00',	'True',	'BASANENI',	'',	'BOBI',	'PASCAL',	'',	'',	'',	'',	'',	'KISANGANI',	'POLICE DE FRONTIERE',	'BASENENI BOBI\nTEEL. 0822644206,',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(232,	'2010-09-11 00:00:00',	'True',	'RAMAZANI',	'',	'BIN-BWASHI',	' ',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(233,	'2011-06-15 00:00:00',	'True',	'BUTU',	'',	'BUNDE',	'CHERIBIN',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'BUTU BUNDE\nTEL. 0815605642, 0815194836',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(234,	'2012-02-05 00:00:00',	'True',	'MUHUNGA',	'',	'ELECA',	'DAVID',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(235,	'1880-09-20 00:00:00',	'True',	'BELINDA',	'',	'IMPOKO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(236,	'2012-04-01 00:00:00',	'True',	'BAHATI',	'',	'KALIKULE',	'EXAUCE',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(237,	'2011-06-15 00:00:00',	'True',	'BUTU',	'',	'BUNDE',	'ATHALIE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'BUTU BUNDE ET BUTU NICOLE\nTEL. 0815605642, 0815194836, ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(238,	'2011-09-15 00:00:00',	'True',	'RAMAZANI',	'',	'BWANA ALI',	'JOHN',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(239,	'2011-01-18 00:00:00',	'True',	'NSEYA ',	'',	'TAKILA',	'OLIVE',	'',	'',	'',	'',	'',	'KOLWEZI',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(240,	'2012-08-20 00:00:00',	'True',	'SANGBA',	'',	'MUKALAY',	' ',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'DESCART GERE ET IRENE MOSOLE\nTEL.+243',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(241,	'2012-07-21 00:00:00',	'True',	'SANYA',	'',	'LEBILYABO',	'JAPHET',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(242,	'2012-07-26 00:00:00',	'True',	'LUBWIKA',	'',	'MBOMBO',	'CRISPIN',	'',	'',	'',	'',	'',	'KISANGANI',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(243,	'2011-08-01 00:00:00',	'True',	'OMBA',	'',	'KILOLO',	' ',	'',	'',	'',	'',	'',	'BENI',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(244,	'2011-08-08 00:00:00',	'True',	'SHAKO',	'',	'KILOLO',	' ',	'',	'',	'',	'',	'',	'BENI',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(245,	'2012-07-12 00:00:00',	'True',	'BASSA',	'',	'BESOLO',	'CHRISTEVIE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(246,	'2008-12-12 00:00:00',	'True',	'BARAKA',	'',	'ALFANI',	' ',	'',	'',	'',	'',	'',	'INGOKOLO',	'Q. YAMBI YAYA',	'ALFANI NGOY ET MWAYUMA\nTEL. 0810861661, 0997989730, 0812912606, 0999943355',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(247,	'2012-10-03 00:00:00',	'True',	'MISALE',	'',	'KONGBO',	'LUCIANNA',	'',	'',	'',	'',	'',	'KINSHASA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(248,	'2011-08-25 00:00:00',	'True',	'ACTHAE',	'',	'NIELE',	'JOEL',	'',	'',	'',	'',	'',	'BENI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(249,	'2013-02-09 00:00:00',	'True',	'MUKAMA',	'',	'KAHWA',	'ABRAHAM',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'JAPHET KAHWA ET JEANINE\nTEL.0812424340, 0818867354, 0976599633',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(250,	'1880-09-20 00:00:00',	'True',	'HORTANCE',	'',	'MALIANE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(251,	'2012-03-10 00:00:00',	'True',	'KASONGO',	'',	'MULIMBI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'0817626002',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(252,	'1880-09-20 00:00:00',	'True',	'OSINGA',	'',	'BINI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(253,	'1880-09-20 00:00:00',	'True',	'ABEDI',	'',	'MIZABA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(254,	'1980-09-20 00:00:00',	'True',	'KAVUGHO',	'',	'SIVITSOMWA',	' ',	'',	'',	'',	'',	'',	'',	' 0811078430, 0819853557',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(255,	'1980-09-20 00:00:00',	'True',	'KASEREKA',	'',	'SIVITSOMWA',	' ',	'',	'',	'',	'',	'',	' ',	'0811078430, 0819853557',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(256,	'1980-09-20 00:00:00',	'True',	'MULANGALA',	'',	'M’CENTWALI',	' ',	'',	'',	'',	'',	'',	'',	'0823716686',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(257,	'1980-09-20 00:00:00',	'True',	'ALFANI',	'',	'NGOY',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTRIERE',	'ALFANI NGOY ET MWAYUMA\nTEL. 0812912606, 0810861661, 0997989730',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(258,	'2012-02-11 00:00:00',	'True',	'ZOLA',	'',	'KIESSE',	'GRACE',	'',	'',	'',	'',	'',	'HAUT-KATANGA',	'BUNIA; POLICE DE FRONTIERE',	'ZOLA NDONGA\n081010198',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(259,	'1880-08-21 00:00:00',	'True',	'FAIDA',	'',	'N’SINDI',	' MARIE-CLAIRE',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'0810703420',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(260,	'2012-01-11 00:00:00',	'True',	'ETSONI ',	'',	'EDRAKU',	' ANDRE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	1,	'False',	'True'),
(261,	'2009-08-15 00:00:00',	'True',	'LOKOSA',	'',	'ALEMU',	'DEIU-MERCI',	'',	'',	'',	'',	'',	'ISIRO',	'',	'0824111441 / O820628228',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(262,	'2011-10-13 00:00:00',	'True',	'TOMALO',	'',	'MAMUR',	'GLODIE',	'',	'',	'',	'',	'',	'BUNJIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(263,	'2010-10-09 00:00:00',	'True',	'BAVEMO ',	'',	'IMBAY ',	'JONATHAN',	'',	'',	'',	'',	'',	'BUTEMBO',	'LENGABO',	'MANDEY\n0823059298',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(264,	'2012-12-24 00:00:00',	'True',	'MAHAMBA',	'',	'MUYALI',	'EMMANUEL',	'',	'',	'',	'',	'',	'',	'ECOLE DE PROVINANCE : NDG',	'MUYALI\n0815717165',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(265,	'2022-09-21 00:00:00',	'True',	'BENEDIENNE',	'',	'YUMI',	'THERESE',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(266,	'2017-01-30 00:00:00',	'True',	'MUHIMBO',	'',	'SUNGISHABO',	'JOSUE',	'',	'',	'',	'',	'',	'NYAKUNDE',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(267,	'2016-10-01 00:00:00',	'True',	'KASEMIRE',	'',	'MBABAZI',	'ESTHER',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER: LUMUMBA\nAVENUE : BOGORO\nN13\n',	'MBABAZI\n0827506435',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(268,	'2017-09-20 00:00:00',	'True',	'MUSAVULI',	'',	'KAPINGA',	'DAVY',	'',	'',	'',	'',	'',	'BUNIA',	'Q. LUMUMBA\nAV. SHARI\nN 19',	'GEDEO KAPINGA\n0853134755 / 0812295656',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(269,	'2016-09-25 00:00:00',	'True',	'KAHINDO',	'',	'VALIHALI',	'ELIKYA',	'',	'',	'',	'',	'',	'BUNIA',	'Q. HOHO\nAV. SALAMA\n',	'NGUVI MOISE\n0817403753',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(270,	'2016-07-18 00:00:00',	'True',	'KASIMBA',	'',	'TSUNDE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(271,	'2016-02-16 00:00:00',	'True',	'JULIEN ',	'',	'SIVIHWA ',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(272,	'2017-09-15 00:00:00',	'True',	'BATUMIKE',	'',	'TCHIBULULANDA',	'JORDAN',	'',	'',	'',	'',	'',	'OUGANDAISE',	'POLICE DE FRONTIERE',	'BATUMIKE\n0998298877',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(273,	'2016-04-04 00:00:00',	'True',	'MUMBERE ',	'',	'MALI',	'COHEN',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(274,	'2017-01-01 00:00:00',	'True',	'ALUNGA',	'',	'NDUNDU',	'PROMEDE',	'',	'',	'',	'',	'',	'KISANGANI',	'POLICE DE FRONTIERE',	'LIPO\n0815972144',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(275,	'2017-07-03 00:00:00',	'True',	'SALAMA',	'',	'KAGHUSA',	'DIVINE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARIER : KINDYA\n\nAVENUE : NYAMARAGI',	'KAMBALE KAUSA\n0990172525',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(276,	'1880-09-21 00:00:00',	'True',	'NZOKO',	'',	'TASAWANE',	'DANIEL',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(277,	'2017-07-21 00:00:00',	'True',	'MOPIPI',	'',	'MUSAFIRI',	'OWEN',	'',	'',	'',	'',	'',	'BUNIA',	'YAMBI YAYA\n',	'DJUMA MUSAFIRI\n0814702680',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(278,	'2016-09-07 00:00:00',	'True',	'TAMBWE ',	'',	'KISANE',	'VICKY',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(279,	'2017-04-14 00:00:00',	'True',	'NYAWEZA ',	'',	'MASTAKI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(280,	'2015-02-06 00:00:00',	'True',	'NIYA',	'',	'SHINDANO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(281,	'2016-03-26 00:00:00',	'True',	'AUSSI',	'',	'AFITAHANDE',	'HENRI',	'',	'',	'',	'',	'',	'OFAY',	'Q. LENGABO',	'09938277842',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(283,	'2016-09-06 00:00:00',	'True',	'JAMUGISA',	'',	'UZUNGA',	'ABIMAEL',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(284,	'2016-10-04 00:00:00',	'True',	'FAIDA ',	'',	'KAHASHA ',	'CHRISTVIE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(285,	'1880-09-21 00:00:00',	'True',	'MASUDI ',	'',	'ARIDJA ',	' ',	'',	'',	'',	'',	'',	'MAHAGI ',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(286,	'2016-10-28 00:00:00',	'True',	'JOSEPH',	'',	'KYAMAKYA',	'MIRADIE',	'',	'',	'',	'',	'',	' ',	'QUARTIER : KINDYA \nAVENUE : MULUMBA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(287,	'2015-01-08 00:00:00',	'True',	'TWENGE',	'',	'MELU',	'CHRISTINE',	'',	'',	'',	'',	'',	'OICHA',	'Q. HOHO,AV. MONT CARMEL',	'BOENDE TWENGE ET MELU CHRISTINE\nTEL.0815007599, 0993177834, 0971234730',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(288,	'2016-07-11 00:00:00',	'True',	'SAFARI ',	'',	'MUKOSI',	'JOUISSANCE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(289,	'2022-09-21 00:00:00',	'True',	'NZOKO',	'',	'MUKALA',	'DORCAS',	'',	'',	'',	'',	'',	'',	'POLICE DE FRONTIERE',	'NZOKO LUMESA\n0812062828',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(290,	'2016-07-05 00:00:00',	'True',	'MOLISHO',	'',	'KOKO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : KINDYA\nAVENUE : KANZOLE',	'MOLISHO\n0815713780',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(291,	'2016-04-12 00:00:00',	'True',	'ANDIBO ',	'',	'AFITAHANDE ',	'DALSON',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(292,	'2016-09-10 00:00:00',	'True',	'NKULU',	'',	'KISEMBO',	' JUDITE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : LUMBA \nAVENUE : NYAKUNDI',	'KAHIMBIRA PACIFIQUE\n0817666950',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(293,	'2012-06-06 00:00:00',	'True',	'MASIMANGO',	'',	'SHINDANO',	'JULES',	'',	'',	'',	'',	'',	'BUNIA',	'',	'0820756382',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(294,	'2017-10-30 00:00:00',	'True',	'MIRADI',	'',	'MUHAVUKI',	'DEGRACE',	'',	'',	'',	'',	'',	'BUNIA',	' ',	'0814384704',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(295,	'2015-10-27 00:00:00',	'True',	'NDEKWAMBALI ',	'',	'TAGIRABO ',	'ELISEE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(296,	'2017-04-11 00:00:00',	'True',	'NYIRUMBE',	'',	'UMIRAMBE',	'MARIANA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'UMIRAMBE BENGELE\n0821086424',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(297,	'2016-04-06 00:00:00',	'True',	'SITWASI ',	'',	'KAPINGA ',	'EBEN ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(298,	'1880-09-21 00:00:00',	'True',	'KURBONE',	'',	'RAMAZANI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'0816406984 / 0810649653',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(299,	'2017-06-21 00:00:00',	'True',	'KAHINDO',	'',	'SHAKOLERA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'KINDYA',	'0829887473',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(300,	'2015-06-07 00:00:00',	'True',	'BUTU ',	'',	'BUNDE ',	'EDEN ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(301,	'2016-05-16 00:00:00',	'True',	'TIBASAGA',	'',	'KAHWA',	'JOYCE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'0812424340 0818867354',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(302,	'2016-12-23 00:00:00',	'True',	'EMMANUELLA',	'',	'MANEGABE ',	'JESSICA',	'',	'',	'',	'',	'',	'BUKAVU ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(303,	'2017-05-17 00:00:00',	'True',	'YUMA',	'',	'SAIDI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'BRAZZA',	'0992165169 / 0994506930',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(304,	'2015-02-07 00:00:00',	'True',	'BERNIRWOTH ',	'',	'WAYIK',	'PIERRE-CHANEL ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(305,	'2017-07-01 00:00:00',	'True',	'NGOY',	'',	'LUBWIKA',	'ISAAC',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(306,	'2017-07-03 00:00:00',	'True',	'KARUNGI',	'',	'NGUZUMA',	'DONNELE',	'',	'',	'',	'',	'',	'BUNIA',	'CME',	'DAVID NGUZUMA\n0811285522 / 0823059935',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(307,	'2016-11-20 00:00:00',	'True',	'SABUNI',	'',	'ISSE WANDALA ',	'YEDIDIAH ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(308,	'2017-07-04 00:00:00',	'True',	'TUSIME',	'',	'LOLE',	'WINNER',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'THIERESE BANGA\n081622737',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(309,	'1889-09-21 00:00:00',	'True',	'LISALAMA ',	'',	'KELEKELE ',	'BETSALEEL',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(310,	'2016-10-19 00:00:00',	'True',	'PROMEDI',	'',	'MARDOCHE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(311,	'1880-01-01 00:00:00',	'True',	'SIMEON',	'',	'MUZUNGU',	' ',	'',	'',	'',	'',	'',	'KINSHASA',	'YAMBI YAYA',	'PEPLARE MUZUNGU\n0811626146',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(312,	'2016-08-21 00:00:00',	'True',	'ACTHAE',	'',	'NIELE',	'BAMUENI',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'ACTHAE \n081302654',	1,	2,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(313,	'2016-11-19 00:00:00',	'True',	'LAKURA',	'',	'BINTE',	'BIYU',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'ROBERI LAKURA\n0810047010',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(314,	'2014-11-08 00:00:00',	'True',	'NANA',	'',	'KIRONGOZI',	' ',	'',	'',	'',	'',	'',	'',	'0812128666',	'KOMANDA ET CHARLOTTE',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(316,	'1880-01-01 00:00:00',	'True',	'KAVUGHO',	'',	'KASONIA',	'VANESSA',	'',	'',	'',	'',	'',	' ',	'',	'0815139569',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(317,	'2016-05-26 00:00:00',	'True',	'NYOTA',	'',	'KASONGO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'0817626002',	' ',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(320,	'2022-09-21 00:00:00',	'True',	'OBAMA',	'',	'  SIKIVAHWA',	'JOSAPHAT',	'',	'',	'',	'',	'',	'',	'POLICE DE FRONTIERE',	'0992028226',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(321,	'2016-06-20 00:00:00',	'True',	'MASIKA',	'',	'MANOPI',	'NELLY',	'',	'',	'',	'',	'',	'BUNIA',	'Q. DELE',	'BOBO MANOPI MICHEL ET RACHEL MASIKA\nTEL.0818531757, 0990715831',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(322,	'1880-09-21 00:00:00',	'True',	'IRENGE ',	'',	'MUHEMBA ',	'ASHRAF  ',	'',	'',	'',	'',	'',	'BUNIA',	'HOHO',	'0815',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(323,	'1880-09-21 00:00:00',	'True',	'ABEDI',	'',	'RWOTH',	'Fanny',	'',	'',	'',	'',	'',	' ',	'QUARTIER BANKOKO ',	'JOJO NDALO 0810100666/ 0970453827',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(324,	'2016-09-04 00:00:00',	'True',	'EMILIENNE',	'',	'ARABA',	' ',	'',	'',	'',	'',	'',	' ',	'YAMBI YAYA',	'DELPHIN\n0814373649 / 0858586206',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(325,	'1980-09-21 00:00:00',	'True',	'FAIDA',	'',	'KAKUDJI',	'DAVINA',	'',	'',	'',	'',	'',	' ',	' 0814374872',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(326,	'2017-06-17 00:00:00',	'True',	'AKUZWE',	'',	'KUSINWA',	'NATHANAEL',	'',	'',	'',	'',	'',	'BUKAVU',	'POLICE DE FRONTIERE',	'ALAIN KUSIMWE\n0994332796 / 0990580506',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(327,	'1880-09-21 00:00:00',	'True',	'BENYI',	'',	'DIKUYI',	'  ',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'DIKUYI 0817014926',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(328,	'2015-05-02 00:00:00',	'True',	'KABATENDE',	'',	'OTEPA',	' ',	'',	'',	'',	'',	'',	'ARU',	'QUARTIER HOHO',	'KABATENDE J.C 0813774280/0822494566',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(329,	'2016-09-21 00:00:00',	'True',	'KALUZEYIMOKO',	'',	'NLANDU',	'SUBLIME',	'',	'',	'',	'',	'',	'MATADI',	'POLICE DE FRONTIERE',	'BUKASA BADIBANGA\n0828586001',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(330,	'1980-09-21 00:00:00',	'True',	'WEMBO',	'',	'NGENDO',	'JOACHIM',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'WEMBO ET AMBOYO\nTEL.0815609844, 0817778224',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(331,	'2015-06-06 00:00:00',	'True',	'AMISI',	'',	'LONGULI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'0826969042, 0825555085',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(333,	'2022-09-21 00:00:00',	'True',	'MASIKA',	'',	'NYUNYU',	' ',	'',	'',	'',	'',	'',	'',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(334,	'2014-01-31 00:00:00',	'True',	'LWEMBO',	'',	'MARINOS',	'KETIA',	'',	'',	'',	'',	'',	'BENI',	'',	'0817601285',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(335,	'1880-01-01 00:00:00',	'True',	'MWINJA',	'',	'BASHONGA',	'  ',	'',	'',	'',	'',	'',	' ',	' ',	'Tel ; 0820947227',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(336,	'2015-10-04 00:00:00',	'True',	'MAMBALI',	'',	'SUMBU',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'0810640691',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(337,	'1880-09-21 00:00:00',	'True',	'TCHIWOHA',	'',	'MBAYA',	' ',	'',	'',	'',	'',	'',	'  ',	' ',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(338,	'2015-07-17 00:00:00',	'True',	'AVO ',	'',	'DJURUA',	'CHRISPIN',	'',	'',	'',	'',	'',	'BUNIA',	'AV. AVO/QUARTIER YAMBI YAYA/COUMMUNE DE MBUNYA/POLICE DE FRONTIERE',	'DJURUA ET AVO BUATRE Cecile 0816844495/0819396308/0810079343',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(339,	'2017-12-17 00:00:00',	'True',	'FUMISE',	'',	'BULAMUZI',	'OLIVE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO\n',	'HERABO MBUKALI\n081680002',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(340,	'1980-09-21 00:00:00',	'True',	'LOKANA',	'',	'KYALIGONZA',	' ',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'KYALIGONZA ET ASIMWE\nTEL.0826868285, 0814565170',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(341,	'2014-08-05 00:00:00',	'True',	'MUHASA',	'',	'MARIE',	'MEILLEURE',	'',	'',	'',	'',	'',	'BUTEMBO',	'QUARTIER HOHO',	'MATUMAINI MUMBERE 0994095595/0992135453',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(342,	'1880-09-29 00:00:00',	'True',	'NGENGE',	'',	'MBASE',	'  ',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'MOHITA MBASE\n081275757 / 0816004274',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(343,	'2015-08-22 00:00:00',	'True',	'PALUKU',	'',	'KAMWIRA',	'JASHAR',	'',	'',	'',	'',	'',	'BUTEMBO',	'GOUVERNORAT/ LENGABO/VILLE DE BUNIA/Q.HOHO',	'KAMBALE ET KYAKIMWA\nTEL.0994497455, 0820991890, 0814020257',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(344,	'1880-09-21 00:00:00',	'True',	'LWABOSHI',	'',	'KAWETWE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'0819222078 / 0996969376',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(345,	'1980-09-21 00:00:00',	'True',	'ANGISO BANGE',	'',	'ADIBO',	'PRISCA',	'',	'',	'',	'',	'',	'BUNIA',	'Q. KINDIA',	'TASTAS ADIBO ET KAHINDO\nTEL.0815601782, 0997644156',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(346,	'2015-10-04 00:00:00',	'True',	'NZOKO',	'',	'KAYONGO',	'Blandine',	'',	'',	'',	'',	'',	'KOMANDA',	'BUNIA/ COMMUNE MBUNYA/POLICE DE FRONTIERE',	'NZOKO LUMESA 0812062828/0814787647',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(347,	'2016-12-02 00:00:00',	'True',	'MELLY',	'',	'AMISI',	'MERVEILLE',	'',	'',	'',	'',	'',	'BUNIA',	'HOHO',	'AMISI\n0818725348',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(348,	'2017-06-26 00:00:00',	'True',	'MUNYEREKANA',	'',	'HAMULI',	' SOFIA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'0814021986',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(349,	'2016-06-19 00:00:00',	'True',	'MATSINDE',	'',	'ROMEO',	'RAYAN',	'',	'',	'',	'',	'',	'BUNIA',	'Q. YAMBI YAYA',	'DODO ET NADEGE\nTEL. 0994106199, 0818787421',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(351,	'2015-05-06 00:00:00',	'True',	'MAYALA',	'',	'MABEKA',	'LOIQ VINCENT',	'',	'',	'',	'',	'',	'BENI',	'QUARTIER HOHO',	'LWANZO MABEKA 0971916109/0816005313',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(352,	'2012-09-21 00:00:00',	'True',	'MAGZANDA',	'',	'MBEMBA',	'LAURE',	'',	'',	'',	'',	'',	'GOMA',	'POLICE DE FRONTIERE',	'MBEMBE ET CHRISTELLE\n0820368645',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(353,	'2016-06-30 00:00:00',	'True',	'BASSA',	'',	'WETSOKONDA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'Q.LENGABO',	'BASSA BABLO ET JULLY KATALIKO\nTEL.0810597273, 0810201612',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(354,	'2017-04-17 00:00:00',	'True',	'MUSAFIRI',	'',	'KATUSELE',	'NATHAN',	'',	'',	'',	'',	'',	'BUNIA',	'DHELE',	'KIZITO MUSAFIRI\n0810275500',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(356,	'2015-02-07 00:00:00',	'True',	'LUPETU',	'',	'NZANZA',	'CHERUBIN',	'',	'',	'',	'',	'',	' ',	'MAMAN ARABA 43/ Q. LUMUMBA/C. MBUNYA/BUNIA',	'KIMBUNGU NZANZU ROGER 0823334760/0992279788/0810654488/',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(357,	'2016-06-24 00:00:00',	'True',	'N’KISA',	'',	'KABISABO',	'WINNER',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER KINDYA',	'KABISABO\n0810742725',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(358,	'2015-06-08 00:00:00',	'True',	'ROANE',	'',	'MADIBA',	'PENIEL',	'',	'',	'',	'',	'',	'MONGBWALU',	'0817539324, 0824042274',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(359,	'2014-06-01 00:00:00',	'True',	'MOLISHO',	'',	'FOLO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(360,	'2014-10-15 00:00:00',	'True',	'ISMAEL',	'',	'KAGHENI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO/POLICE DE FRONTIERE',	'MUHINDO VAGHENI 0811705760/ 0828880509',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(362,	'2015-06-28 00:00:00',	'True',	'CHRISTINE',	'',	'NGOY',	'BLESSING',	'',	'',	'',	'',	'',	'BUNIA',	'Q. YAMBI/POLICE DE FRONTIERE',	'ALFANI NGOY ET MWAYUMA MANGAZA\nTEL. 0810861661, 0812912606, 0997989730',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(363,	'2017-05-03 00:00:00',	'True',	'DWANGANI',	'',	'FURABO',	'DIVINE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'FURABO MILET',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(364,	'2017-02-05 00:00:00',	'True',	'MARAVU',	'',	'KAGABA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'KINDYA',	'KAGABA\n0822683163',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(365,	'2016-05-19 00:00:00',	'True',	'KAHINDO',	'',	'KALEMBE',	'PRAISE',	'',	'',	'',	'',	'',	'BUNIA',	'Q. DELE',	'MUHINDO MUTHI ET AMORI ANIKA',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(366,	'2015-07-10 00:00:00',	'True',	'BAMOITO',	'',	'NKASIME',	'BERNICE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO',	'PAPY/ELYSEE KWATEGBAMBI/0816402684 ET 0990004531',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(367,	'2017-07-04 00:00:00',	'True',	'YANGA',	'',	'LUVANDE',	'JOVANIE',	'',	'',	'',	'',	'',	'LUBUMBASHI',	'POLICE DE FRONTIERE',	'0814792072',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(368,	'2017-11-27 00:00:00',	'True',	'SONGA NKUBA',	'',	'KIVUNGANYI',	'DAN',	'',	'',	'',	'',	'',	'BUNIA',	'0821411096',	'MANDE KIVUNGANYI\nTEL. 0821411096',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(369,	'1880-09-21 00:00:00',	'True',	'KASEREKA',	'',	'VARONDI',	'MERVEILLE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'KASEREKA \n08143484704\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(370,	'1880-09-21 00:00:00',	'True',	'SITA',	'',	'TAMBA',	'GENOVIC',	'',	'',	'',	'',	'',	' ',	' ',	'TAMBA NGOMA 099777759/0819600628',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(371,	'1980-09-21 00:00:00',	'True',	'NTANYUNGU',	'',	'MASIALA',	'PRECIEUX',	'',	'',	'',	'',	'',	' ',	'COM. MBUNIA/Q. POLICE DE FRONTIERE',	'NTANYUNGU ET KIKANI\nTEL.0818390193, 0822730765,',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(372,	'2016-08-13 00:00:00',	'True',	'KAPINGA',	'',	'MBANGU',	'PERLA',	'',	'',	'',	'',	'',	'KINSHASA',	'POLICE DE FRONTIERE',	'JONATHAN MBANGU ET LISEBENI\nTEL.0827825777, 0814448354',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(373,	'2016-09-14 00:00:00',	'True',	'JULIA',	'',	'BAZAPA',	' ',	'',	'',	'',	'',	'',	'KISANGANI',	'A FACE DE L’ECOLE',	'BAZAPA ET MWENDA\nTEL.0993680483, 0818340509,',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(374,	'2016-12-15 00:00:00',	'True',	'NEEMA',	'',	'HAMIRIZA',	'PRECIEUSE',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(375,	'2016-01-04 00:00:00',	'True',	'BABONANGENDA',	'',	'UWIMANA',	'GABRIELA',	'',	'',	'',	'',	'',	'BUNIA',	'COM. MBUNIA, Q.BANKOKO,AV.CAMP NDOROMO',	'BABONANGENDA ET BONEBANA\nTEL.0813601480, 0815443821',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(376,	'1880-01-01 00:00:00',	'True',	'KAHINDO',	'',	'MUSAVULI',	'BENEDICTE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(377,	'2016-05-30 00:00:00',	'True',	'DRAZULO',	'',	'VADZA',	'JOY',	'',	'',	'',	'',	'',	'BUNIA',	'Q. YAMBI YAYA',	'VADZA DJENGOKPA ET ACAN MALOSI\nTEL.0819532454, 0829024412',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(378,	'2016-10-25 00:00:00',	'True',	'NKOSO',	'',	'SAIDI',	'JUDICAEL',	'',	'',	'',	'',	'',	'BUNIA',	'0812781913, 0828830305',	'SAIDI RICHARD ET LILYANE \nTEL.0812781913, 0828830305',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(379,	'2016-09-29 00:00:00',	'True',	'CISHIBANJI',	'',	'MUNYERENKANA',	'PRISCILLA',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'CISHIBANJI ET GRACE\nTEL.0815670373, 0997748583',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(380,	'2017-09-20 00:00:00',	'True',	'AMURI',	'',	'MUSAFIRI',	'PAXE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(381,	'1880-09-21 00:00:00',	'True',	'NETANYA',	'',	'AKYEMANE',	'  ',	'',	'',	'',	'',	'',	'  ',	'POLICE DE FRONTIERE',	'AKYEMANE\n0811533520',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(382,	'2015-05-07 00:00:00',	'True',	'MWAYUMA',	'',	'GUDURA',	' ',	'',	'',	'',	'',	'',	'KISANGANI',	'Q.KINDIA/AV. SAGAR',	'OMARI ET MONIC\nTEL.0810867533',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(383,	'2017-09-13 00:00:00',	'True',	'FENI',	'',	'DYOBHO',	'ABEL',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'DYOBHO MAWA\n0819091721',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(384,	'2016-01-15 00:00:00',	'True',	'ETSORA',	'',	'DYOBHO',	'BENIT',	'',	'',	'',	'',	'',	'ARU',	'POLICE DE FRONTIERE',	'DJOBHO ET NICE ESTHER\nTEL. 0815242434, 0819091721',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(385,	'2016-09-05 00:00:00',	'True',	'MUSEME',	'',	'MUTONDO',	'CHANCARD',	'',	'',	'',	'',	'',	'  ',	'POLICE DE FRONTIERE',	'MUSEME\n0828228497 / 0829576412',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(386,	'2016-09-23 00:00:00',	'True',	'NYAINGANDA',	'',	'BASOLE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'Q.LENGABO',	'NYAINGANANDA UYARA',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(387,	'2017-04-13 00:00:00',	'True',	'NYOTA',	'',	'BAHELANYA',	'DONELLE',	'',	'',	'',	'',	'',	' BUNIA',	'POLICE DE FRONTIERE',	'MUTEBA\n0825760835',	1,	6,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(388,	'2017-03-17 00:00:00',	'True',	'ATENO',	'',	'SAMUEL',	'VERLIN',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'ATENO\n0810411198',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(389,	'2016-12-02 00:00:00',	'True',	'MASIKA',	'',	'BAMWITHAGHE',	'SARAH',	'',	'',	'',	'',	'',	'BENI',	'Q.DELE/ROUTE KASENYI',	'PALUKU SIWAKO ET MAYENGA\nTEL.0822858908, 0975231947, 0994110576',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(390,	'1880-09-17 00:00:00',	'True',	'NGUNDU',	'',	'KAYIBA',	'ELNATHANE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(391,	'1980-09-21 00:00:00',	'True',	'BANGAZOLO',	'',	'KANGI',	' ',	'',	'',	'',	'',	'',	' ',	'SOUS REGION',	'TAGOZA JUSTIN\nTEL.0821725259',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(394,	'1880-01-01 00:00:00',	'True',	'ILUNGA',	'',	'LUNGENA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(395,	'2016-12-10 00:00:00',	'True',	'UCOUN',	'',	'KERAURE',	'WILSON',	'',	'',	'',	'',	'',	'KAMPALA',	'YAMBI YAYA FINA',	'WILLY UCOUN\n0810963195',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(396,	'2015-12-07 00:00:00',	'True',	'MASIKA',	'',	'KATSUVA',	'BELLEVIE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'KAMBALE KATSUVA ET GISELE\nTEL.0822305512',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(397,	'2016-11-26 00:00:00',	'True',	'KABUNGA',	'',	'SAFI',	'SHEKINAH',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(398,	'2017-04-17 00:00:00',	'True',	'BUIDO',	'',	'MUSEKETWA',	'PASCAL',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(399,	'2015-11-04 00:00:00',	'True',	'RONJAMUZI',	'',	'MUNGANGA',	'J.ROSTAND',	'',	'',	'',	'',	'',	'KOMANDA',	'Q.KINDIA',	'MUZIABAKU ET OCHAOLA\nTEL.0977012695, 0810753799',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(400,	'2008-07-04 00:00:00',	'True',	'BASOLE',	'',	'OYAKA',	'VERONIQUE',	'',	'',	'',	'',	'',	'BUNIA',	'LENGABO',	'NYAINGANDA\n0827444224',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(401,	'2016-02-17 00:00:00',	'True',	'MUNGULENI',	'',	'DYOBHO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(402,	'1880-01-01 00:00:00',	'True',	'KEYZER',	'',	'KAPIPA',	'  ',	'',	'',	'',	'',	'',	'  ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(403,	'2014-03-08 00:00:00',	'True',	'AZATO',	'',	'AOZE',	'CHRISTIANA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(404,	'2017-07-02 00:00:00',	'True',	'MUMBERE',	'',	'SIVIWE',	'ABDIEL',	'',	'',	'',	'',	'',	'BUNIA',	'HOHO\n',	'DEBORA\n0822799185',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(405,	'2016-06-05 00:00:00',	'True',	'MIRINISURU',	'',	'AGUMA',	'BONIFACE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(406,	'2017-06-09 00:00:00',	'True',	'KOMANDA',	'',	'LIMENGO',	'ELJOY',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(407,	'2015-03-08 00:00:00',	'True',	'BOSSA',	'',	'EDAKO',	'ODETTE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(408,	'2014-06-26 00:00:00',	'True',	'ELISE',	'',	'EGBOMA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(409,	'1880-09-21 00:00:00',	'True',	'MASUDI',	'',	'IMURANI',	'MUSSA',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(410,	'2013-12-21 00:00:00',	'True',	'ALINGI',	'',	'SOLO',	'LINDA',	'',	'',	'',	'',	'',	'LUBUMBASHI',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'False'),
(411,	'2017-01-31 00:00:00',	'True',	'SUCHE',	'',	'BOSEKO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(413,	'1880-09-21 00:00:00',	'True',	'EKALEKALE',	'',	'GEGE',	' ',	'',	'',	'',	'',	'',	'BUTO',	'',	'FRERE : 0814396151',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(415,	'1880-01-01 00:00:00',	'True',	'KATEMBO',	'',	'SIVITSOMWA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(416,	'1880-01-01 00:00:00',	'True',	'RAMAT',	'',	'ABDALLAH',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(417,	'1980-09-21 00:00:00',	'True',	'OTCHO',	'',	'KABISABO',	'BIENFAIT',	'',	'',	'',	'',	'',	' ',	'Q. KINDIA/AV. NGUGU',	'KABISABO ET SIVA MWIRAWAVANGI',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(418,	'2017-11-11 00:00:00',	'True',	'MUGAVU',	'',	'KING',	'AUDRAY',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'MARTIN MUGAVU\n0820692328',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(419,	'2015-04-13 00:00:00',	'True',	'NZANZU',	'',	'KATSAPA',	'MISSION',	'',	'',	'',	'',	'',	'BUNIA',	'Q. HOHO',	'MICHAEL KATEMBO ET CONSOLEE\nTEL.0814505562, 0816695955, 0997405987',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(420,	'1880-01-01 00:00:00',	'True',	'MAYONGO',	'',	'NDOBO',	'DORIANE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(421,	'2017-09-15 00:00:00',	'True',	'JOSUE',	'',	'MATANDIKO',	'  ',	'',	'',	'',	'',	'',	'',	'POLICE DE FRONTIERE',	'KASEREKA\n099866021',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(422,	'1980-09-21 00:00:00',	'True',	'NANGBAMBOLI',	'',	'NDENI',	' ',	'',	'',	'',	'',	'',	'ISIRO',	'Q. RWAMBUZI',	'NDENI ET KANASUNGE\nTEL.0817494383, 0818461993, ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(423,	'2017-06-08 00:00:00',	'True',	'LETUNITA',	'',	'BATULI',	'HERMAN',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO\nAVENE: SALAMA',	'LETUNITA\n0815008470',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(424,	'2015-01-01 00:00:00',	'True',	'BONANE',	'',	'LOGO',	'WINNER',	'',	'',	'',	'',	'',	' ',	'LENGABO',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(425,	'2017-01-28 00:00:00',	'True',	'ATOKI',	'',	'LEBILYABO',	'CLEMENT',	'',	'',	'',	'',	'',	' ',	'QUARTIER : HOHO\nAV. KISANGANI',	'SANYA LEBILYABO\n0819777355',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(426,	'1980-09-21 00:00:00',	'True',	'BAOKA ',	'',	'LOTOTA',	'BONIFACE',	'',	'',	'',	'',	'',	'BUNIA',	'Q.YAMBI YAYA/AV.AVO',	'LOTOTA DANIEL ET NTUMBA\nTEL.0816844495, 0810079343',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(427,	'1880-02-23 00:00:00',	'True',	'MAHAMBA',	'',	'MASHAURI',	'NATHANAEL',	'',	'',	'',	'',	'',	'',	'QUARTIER : BANKOKO;\nAVENUE : MANUEMA',	'MAHAMBA JEAN-DE-DIEU\n0812637739',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(428,	'2022-09-21 00:00:00',	'True',	'LIKOLO',	'',	'NDENI',	' ',	'',	'',	'',	'',	'',	'',	'Q. RWAMBUZI',	'NDENI ET KANASUNGE\nTEL.0817494383, 0818461993',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(429,	'2017-03-20 00:00:00',	'True',	'ARIYE',	'',	' MAMURU',	'GABRIELA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'0824111441 / 0820628228',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(430,	'2017-06-05 00:00:00',	'True',	'MBUSI',	'',	'SHAI',	'BENEDICTE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(431,	'1980-09-21 00:00:00',	'True',	'ABEDI',	'',	'OKAKYO',	' CHANEL',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE/AV. MAMAN ARABA',	'ABEDI RAMAZANI ET BIRUNGI MIMY\nTEL.0810076570, 0812149651',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(432,	'1980-09-21 00:00:00',	'True',	'HONOSAMBA',	'',	'LUBANGO',	' ',	'',	'',	'',	'',	'',	' ',	'0817573005',	'LUBANGO ET BEDIDJO\nTEL.081753005, 0820949460',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(433,	'2017-04-03 00:00:00',	'True',	'GIRAMIA',	'',	'BERO',	'GLADDY',	'',	'',	'',	'',	'',	'NYAKUNDE',	'QUARTIER : KINDIA',	'ADJABU KAKURA\n016595513 / 0827675473',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(434,	'2014-11-07 00:00:00',	'True',	'MOMBAYA',	'',	'NYALIKELE',	'DIVINE',	'',	'',	'',	'',	'',	'BUNIA',	'Q. KINDIA',	'MOMBAYA ET DINA NANA\nTEL.0816616470, 0814620579',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(435,	'2016-01-01 00:00:00',	'True',	'LIPO',	'',	'SOMBO',	' ',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'LIPO\n081592144',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(436,	'2017-02-14 00:00:00',	'True',	'NGISSE',	'',	'KALONDERO',	'CHARMANT',	'',	'',	'',	'',	'',	'  ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(437,	'2022-09-21 00:00:00',	'True',	'KISEMBO',	'',	'KASHALA',	'ESTHER',	'',	'',	'',	'',	'',	'MAMBASA',	'POLICE DE FRONTIERE',	'KISEMBO ET BIRUNGI\nTEL.0820492800',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(438,	'2017-11-03 00:00:00',	'True',	'AITASI',	'',	'ABE',	'CHRISTELLE',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'ABE\n0810393131',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(439,	'2017-03-26 00:00:00',	'True',	'NTUMBA',	'',	'MUSAU',	'ALICIA',	'',	'',	'',	'',	'',	'BUNIA',	'BANKOKO/ MBANDAKA',	'MBUYAMBA\n0814780994',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(440,	'2015-08-16 00:00:00',	'True',	'KISEMBO',	'',	'BANGA',	'NEVILLE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'J.PAUL BANGA ET REBECCA\nTEL.0817502055, 0815684802',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(441,	'2017-09-09 00:00:00',	'True',	'MUGHOLE',	'',	'VIHAMBA',	'EVE MEDIATRICE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER :  HOHO\nPOLICE DE FRONTIERE',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(442,	'2014-12-25 00:00:00',	'True',	'MERVEDI',	'',	'MARDOCHE',	'EMMANUEL',	'',	'',	'',	'',	'',	'BUNIA',	'AV.KASAVUBU/POLICE DE FRONTIERE',	'DEDIER MARDOCHE\nTEL.0898631163, 0813951714',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(443,	'2016-11-26 00:00:00',	'True',	'TSHIBANGU',	'',	'MPANDANJILA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'MPANDA NJILA\n0825624603',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(444,	'2017-06-03 00:00:00',	'True',	'ANIKANDA',	'',	'BOLEKALEKA',	'NDONG-DEVIN',	'',	'',	'',	'',	'',	'',	'QUARTIER : KINDIA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(445,	'2015-01-15 00:00:00',	'True',	'MWENGE',	'',	'KYAVU',	'QUEDIA',	'',	'',	'',	'',	'',	'BUNIA',	'Q.LENGABO',	'MUSUBAO KYAVU ET BAKALE ANUARITE\nTEL.0814615551, 0821301020',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(446,	'2017-02-25 00:00:00',	'True',	'EDHOBO-NI',	'',	'EDHAZU',	'HOPE',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(447,	'2016-06-05 00:00:00',	'True',	'RAMAZANI',	'',	'KILUMBU',	'JUMA',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(448,	'2017-04-25 00:00:00',	'True',	'KAETO',	'',	'ETSHELE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'YAMBI YAYA',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(449,	'2015-11-12 00:00:00',	'True',	'EYENGOLA',	'',	'MPOWA',	'EMMANUELLA',	'',	'',	'',	'',	'',	'BUKAVU',	'Q. LENGABO',	'EYENGOLA NGENDE ET ENKOTI MPOWA\n0819240490, 0999075610, 0815950135',	1,	2,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(450,	'2014-10-08 00:00:00',	'True',	'KAVIRA',	'',	'MAYANI',	'CELINE',	'',	'',	'',	'',	'',	'BENI',	'Q. HOHO',	'KAMBALE FAUSTIN ET KYAKIMWA\nTEL.0824044371, 0824798585',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(451,	'2014-01-26 00:00:00',	'True',	'TUTA',	'',	'KALOKOLA',	' ',	'',	'',	'',	'',	'',	'KINSHASA',	'Q.HOHO',	'JOSEPH TUTA ET BLANDINE\nTEL.0811992889, 0820494859',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(452,	'1880-12-26 00:00:00',	'True',	'DRAMANI',	'',	'MBIDJO',	'BLESSING',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO',	'MBIDJA BARAKA\n0811699966',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(453,	'2015-09-23 00:00:00',	'True',	'KAVIRA',	'',	'MULAHU',	'CARINE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'MOISE MUSARA\n0991736901',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(454,	'1880-01-01 00:00:00',	'True',	'ANASTASIA',	'',	'KAYIBA',	'BERNICE',	'',	'',	'',	'',	'',	'YANGA',	'POLICE DE FRONTIERE',	'BADUNDU\n0811879027',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(455,	'1880-09-22 00:00:00',	'True',	'GANIKALE',	'',	'FUMISE',	'DANIELLA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(456,	'2014-11-11 00:00:00',	'True',	'UPIO',	'',	'UMIPEU',	'MARSHALL',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : YAMBI YAYA',	'WILLY UCOUN KER\n0810963195',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(458,	'2015-01-21 00:00:00',	'True',	'SUTUKE',	'',	'METALOR',	'FREDA',	'',	'',	'',	'',	'',	'KISANGANI',	'GOUVERNORANT',	'WAY METALOR PATRICK\n0813554876',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(460,	'2015-01-21 00:00:00',	'True',	'MUMBERE',	'',	'KINYANGWA',	' BIENVENU',	'',	'',	'',	'',	'',	' ',	'YAMBI YAYA\n',	'MUHINDDO\n0819917476',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(461,	'2014-09-11 00:00:00',	'True',	'ASU',	'',	'BEZIMUNGU',	'DIEU-MERCI',	'',	'',	'',	'',	'',	'BUNIA',	'POLOCE DE FRONTIERE',	'AWULE MUKI\n0819230093',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(462,	'1880-09-22 00:00:00',	'True',	'KABONGO',	'',	'WISLAIRS',	' ',	'',	'',	'',	'',	'',	'KISANGANI',	'POLICE DE FRONTIERE',	'WILLIAM KABONGO\n0810128497',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(463,	'2015-11-07 00:00:00',	'True',	'OMBA',	'',	'RAMAZANI',	' ',	'',	'',	'',	'',	'',	'MAMBASA',	'POLICE DE FRONTIERE',	'RAMAZANI\n0810067933',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(464,	'2015-12-22 00:00:00',	'True',	'KAVIRA',	'',	'VULEMBERA',	'SABRINE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'MUHINDO\n0819902277',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(465,	'2014-08-10 00:00:00',	'True',	'MARIEK',	'',	'MUNGU',	' PIRWOTH',	'',	'',	'',	'',	'',	'MAHANGI',	'QUARTIER LUMUMBA',	'UCHAYI BOBERT\n0822694289',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(466,	'2015-05-21 00:00:00',	'True',	'NEEMA',	'',	'KALIKULE',	' ',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(468,	'2015-03-23 00:00:00',	'True',	'AMURI',	'',	'MAMBOHIZE',	'DOREL',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(469,	'2014-05-08 00:00:00',	'True',	'KAWAYA',	'',	'SALISENGO',	'CHANCE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(471,	'2016-01-26 00:00:00',	'True',	'MARUNGA',	'',	'MUPENZI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(472,	'2015-08-16 00:00:00',	'True',	'AKSANTI',	'',	'MITIMA',	'JASON',	'',	'',	'',	'',	'',	'BUKAVU',	'QUARTIER : LUMUMBA;\nAVENUE : POLICE DE FRONTIERE',	'0828888634',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(473,	'2014-08-21 00:00:00',	'True',	'KAHINDO',	'',	'VARONDI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(474,	'2015-09-07 00:00:00',	'True',	'KANYERE',	'',	'WINGI',	' ',	'',	'',	'',	'',	'',	'KIWANJA',	'',	'0812772666',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(475,	'2015-01-16 00:00:00',	'True',	'AGYAKWA',	'',	'KUNZI',	'EPHRAHME',	'',	'',	'',	'',	'',	'DUNGU',	'POLICE DE FRONTIERE',	'GAGHO SYLVAIN\n0817708876',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(476,	'2015-07-04 00:00:00',	'True',	'RAMAZANI',	'',	'ALIMA',	'LISAH',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(477,	'2015-05-29 00:00:00',	'True',	'MBANGU',	'',	'TSHIMBUNDU',	'DECLAN',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'JONATHAN MBUNGU\n0827825777',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(478,	'2014-10-27 00:00:00',	'True',	'MWAMINI',	'',	'LOGO',	'DAYANA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(479,	'2015-07-11 00:00:00',	'True',	'AMBOKO',	'',	'BOLEKALEKA',	'DORIANE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(480,	'2015-06-01 00:00:00',	'True',	'LUKANDO',	'',	'LUMOGHO',	' ',	'',	'',	'',	'',	'',	'NYANKUNDE',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(481,	'2015-03-26 00:00:00',	'True',	'ALOMBA',	'',	'OKITALUNYI',	'EL-ELYON',	'',	'',	'',	'',	'',	'BUNIA',	'',	'08161112334',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(482,	'2013-11-12 00:00:00',	'True',	'YEKEKA',	'',	'LUKULA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'VICTOIRE',	1,	6,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(483,	'2015-12-25 00:00:00',	'True',	'NSIMIRE ',	'',	'NYENYEZI',	'NATHALIE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(484,	'2014-08-05 00:00:00',	'True',	'MUMBERE',	'',	'KALEMBE',	'WORSHIP',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(485,	'2014-08-18 00:00:00',	'True',	'LAINI',	'',	'KISULU',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(486,	'2014-11-11 00:00:00',	'True',	'MUTEBA',	'',	'BAHELANYA',	'GLODY',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'MUTEBA\n0829388897',	1,	6,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(487,	'2014-10-01 00:00:00',	'True',	'BEYA',	'',	'BUKASA',	'PAPY',	'',	'',	'',	'',	'',	'KISANGANI',	'POLICE DE FRONTIERE',	'BUKASA BADIBANGA\n0828586001',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(488,	'2015-12-24 00:00:00',	'True',	'MAKAMOSI',	'',	'MAMPUYA',	'SION',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'DOUDOU MAMPUYA\n081444130',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(489,	'2015-09-05 00:00:00',	'True',	'NGAMAKAY',	'',	'MUNDAMBO',	'ALVINO',	'',	'',	'',	'',	'',	'BUNIA',	'Q. DHELE / OKAPI LOGISTIQUE',	'0827666677',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(490,	'2015-07-20 00:00:00',	'True',	'BOZENE',	'',	'KASALANDI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(491,	'1880-09-22 00:00:00',	'True',	'MIREMBE',	'',	'TAGHOYA',	' JOSEPHINE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(492,	'2014-10-14 00:00:00',	'True',	'DRAMANI',	'',	'PIMBO',	'TRESORT',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER KIYA; AVENUE : MULUMBE',	'KPAKI PIMBONGE\n081821343437',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(493,	'2014-05-25 00:00:00',	'True',	'NIKITA',	'',	'TAGHOYA',	'GABRIELLA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(494,	'2015-05-28 00:00:00',	'True',	'BERTINE',	'',	'KALONDERO',	'MASIKA',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'MUHINDO KALONDERO\n0997778833',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(495,	'2022-08-30 00:00:00',	'True',	'KOWENE',	'',	'MUSAFIRI',	'LAURA',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : LUMUMBA; AVENUE : ARAMBA',	'MUSAFIRI MECHACK\n0818827898',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(496,	'2016-01-16 00:00:00',	'True',	'LITEKI',	'',	'MBASE',	'JEANPY',	'',	'',	'',	'',	'',	' ',	' ',	'MOHITA MBASE\n0812785757',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(497,	'1880-09-22 00:00:00',	'True',	'KAVUGHO',	'',	'MULAHU',	' ',	'',	'',	'',	'',	'',	' ',	'',	'082142501',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(498,	'1880-09-22 00:00:00',	'True',	'MASIKA',	'',	'WAVENE',	' ROSETYE',	'',	'',	'',	'',	'',	' ',	'',	'0821425601',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(499,	'1880-09-22 00:00:00',	'True',	'MUGOLI',	'',	'SHWEKA',	'  ',	'',	'',	'',	'',	'',	' ',	'',	'081400525',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(500,	'2014-02-19 00:00:00',	'True',	'MUHINDO',	'',	'SIWAKANYA',	'JENOVIC',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	2,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(501,	'1880-01-01 00:00:00',	'True',	'GOPHER',	'',	'TCHILERU',	' FAUSTIN',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(502,	'1880-01-01 00:00:00',	'True',	'BAHATI',	'',	'KAKUDJI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(503,	'2015-04-10 00:00:00',	'True',	'KYANGA ',	'',	'MBUNGU',	'TRINITE',	'',	'',	'',	'',	'',	'MAHAGI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(504,	'1880-09-22 00:00:00',	'True',	'SAFI',	'',	'MFUMU',	'  ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(506,	'1880-09-22 00:00:00',	'True',	'LUNGELA',	'',	'MAYAWA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(507,	'2016-11-17 00:00:00',	'True',	'LAKURA',	'',	'MAFU',	'RUTH',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(509,	'2014-03-20 00:00:00',	'True',	'PACIFIQUE ',	'',	'MAYONGO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(510,	'1880-01-01 00:00:00',	'True',	'KATUNGU',	'',	'KOMANDA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'0821605990',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(511,	'1880-01-01 00:00:00',	'True',	'MPARANYI',	'',	'TWALI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'0823716686',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(512,	'1880-09-22 00:00:00',	'True',	'MOKANGA',	'',	'ILERE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(514,	'2014-03-15 00:00:00',	'True',	'KAMBALE ',	'',	'KASISI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(515,	'1880-01-01 00:00:00',	'True',	'BASELE ',	'',	'ITOKO ',	'PERLA',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(517,	'1880-01-01 00:00:00',	'True',	'BASELE ',	'',	'ITOKO',	'KASANDRA',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(518,	'2016-06-22 00:00:00',	'True',	'BANDOMBE',	'',	'BAHATI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(519,	'1880-09-22 00:00:00',	'True',	'KAKULE ',	'',	'SIVITSOMWA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(520,	'2015-12-25 00:00:00',	'True',	'TCHOMBA',	'',	'ALI',	'ISSA',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(521,	'2015-09-10 00:00:00',	'True',	'NGIKE',	'',	'NZENZE',	'GRACE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO',	'0811357000',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(522,	'2014-11-21 00:00:00',	'True',	'MAKAHNAANA',	'',	'LUCKY',	' ',	'',	'',	'',	'',	'',	'MAHAGI',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(523,	'2014-03-14 00:00:00',	'True',	'MOLA',	'',	'KASONGO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(524,	'2011-12-25 00:00:00',	'True',	'PENZEKOLE',	'',	'DANIEL',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(525,	'2015-02-25 00:00:00',	'True',	'TIMENS',	'',	'BAKEMWANGA',	'SAPEKE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(526,	'2015-04-30 00:00:00',	'True',	'ANIKANDA',	'',	'MAGOMBE',	'GENIAL',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(527,	'2013-01-13 00:00:00',	'True',	'NDASHIMIRWA',	'',	'BAHEKA',	' JOSLIN',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(528,	'1880-01-01 00:00:00',	'True',	'ASSANI',	'',	'YUMI',	'MOISE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(529,	'1880-01-01 00:00:00',	'True',	'NYOTA',	'',	'YUMI',	'DINANE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(530,	'1880-01-01 00:00:00',	'True',	'PAKIS',	'',	'KINZUNZA',	'ISAAC',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(532,	'2013-09-30 00:00:00',	'True',	'KAMBALI ',	'',	'FURABO',	'SANDRINE',	'',	'',	'',	'',	'',	'',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(533,	'2022-09-22 00:00:00',	'True',	'OTSHUDIEMA',	'',	'EHOMBA',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(534,	'2013-11-09 00:00:00',	'True',	'KAHAMBU',	'',	'KAGHOMA',	'LUCIE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'JACQUE KAGHOMA ET ILELI\nTEL.0812219082, 0815459277',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(535,	'2013-11-26 00:00:00',	'True',	'LOKADY',	'',	'MANDUARA',	'ELOGE',	'',	'',	'',	'',	'',	'BUNIA',	'0817539324',	'0817539324, 0824042274',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(536,	'2014-07-29 00:00:00',	'True',	'MUHINDO',	'',	'MUSUBAO',	'ISRAEL',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'KATEMBO MULYAVIERIRE\n0815808900',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(537,	'2015-02-18 00:00:00',	'True',	'MAPITAY',	'',	'SADY',	'MAGUY',	'',	'',	'',	'',	'',	'BUNIA',	'LENGABO',	'AMASIDRA',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(538,	'2012-07-24 00:00:00',	'True',	'OSINGA',	'',	'PAONI',	'JOSE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(539,	'2014-08-04 00:00:00',	'True',	'LUBINDA',	'',	'TSHIKUDI',	'LEX',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO\nAVENUE : SUKISA II',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(540,	'2022-09-22 00:00:00',	'True',	'FUMAMBALI',	'',	'TOBIYE',	'VICTORINE',	'',	'',	'',	'',	'',	'',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(541,	'2013-02-13 00:00:00',	'True',	'NEGOYO',	'',	'AKWEKI',	' MECHACK',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(542,	'1980-09-22 00:00:00',	'True',	'KATEMBO',	'',	'MUHAVUKI',	' SIMEON',	'',	'',	'',	'',	'',	' ',	'0814384704',	'0814384704',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(543,	'2014-08-20 00:00:00',	'True',	'EYENGOLA',	'',	'NKOLIANDO',	'ENZO',	'',	'',	'',	'',	'',	'BUKAVU',	'LENGABO',	'0819240490',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(544,	'2014-01-29 00:00:00',	'True',	'LIWONO',	'',	'MOBA',	'ANAIS',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(545,	'1980-09-22 00:00:00',	'True',	'IKATI',	'',	'MABELE',	'LETITIA',	'',	'',	'',	'',	'',	'BUNIA',	'Q. LUMUMBA',	'TANGI\nTEL.0820359610, 0813000156',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(546,	'2014-01-02 00:00:00',	'True',	'ENZIZU',	'',	'ABE',	'JEMIMA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(547,	'2013-07-31 00:00:00',	'True',	'MUHINDO',	'',	'KASONIA',	'ROCHER',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(548,	'2012-11-02 00:00:00',	'True',	'NAWANGO',	'',	'SHINDANO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'0820756382',	'0820756382',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(549,	'2014-09-23 00:00:00',	'True',	'MWASI MOKE',	'',	'BAHATI',	'EDWIGE',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(550,	'2013-11-16 00:00:00',	'True',	'ASINDRIZA',	'',	'EDRAKU',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	' ',	1,	0,	0,	0,	0,	'',	'False',	1,	'False',	'True'),
(552,	'2013-05-02 00:00:00',	'True',	'KAVIRA',	'',	'KAGHENI',	'ESTHER',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(553,	'2014-04-03 00:00:00',	'True',	'KASEMIRE',	'',	'BATSI',	'BLESSING',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(554,	'2014-02-27 00:00:00',	'True',	'MANOPI',	'',	'MALI',	'GAEL',	'',	'',	'',	'',	'',	'BUNIA',	'Q.DELE',	'0818531757, 0990715831',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(555,	'2014-03-03 00:00:00',	'True',	'NYEMBO',	'',	'LUBWIKA',	' ',	'',	'',	'',	'',	'',	'KISANGANI',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(556,	'2014-06-22 00:00:00',	'True',	'BELOKO',	'',	'SAIDI',	'BRAYAN',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(557,	'2014-06-20 00:00:00',	'True',	'ABEDI',	'',	'SAIDI',	' ',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(558,	'1980-09-22 00:00:00',	'True',	'MWAMIKAZI',	'',	'BIZIMANA',	'LUCIE',	'',	'',	'',	'',	'',	' ',	' 0815827461',	' 0815827461',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(559,	'2014-08-31 00:00:00',	'True',	'KAMBALE',	'',	'VAYILANDA',	'JONATHAN',	'',	'',	'',	'',	'',	'BUTEMBO',	'POLICE DE FRONTIERE',	'KIKWAYA GERARD\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(560,	'2013-09-13 00:00:00',	'True',	'ISHIMWE',	'',	'SANGANYA',	'GAELLE',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(561,	'2014-01-05 00:00:00',	'True',	'NYAZUNGU',	'',	'SIVALINGANA',	'MARY',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(562,	'2022-09-22 00:00:00',	'True',	'KABEYA',	'',	'BINTU',	'ALLEGRESSE',	'',	'',	'',	'',	'',	'SUD AFRIQUE',	'POLICE DE FRONTIERE',	'CHRISTIAN KABEYA ET CONSEILLEUR\nTEL. 0814697585',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(563,	'2013-04-04 00:00:00',	'True',	'AMISI',	'',	'UMA ',	'VICTOIRE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(564,	'2009-12-02 00:00:00',	'True',	'LIPO',	'',	'SOMBOLI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'0815972144',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(565,	'1980-09-22 00:00:00',	'True',	'BIAKETO',	'',	'KAWETE',	' ',	'',	'',	'',	'',	'',	' ',	'0819222078',	'0819222078',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(566,	'1880-09-22 00:00:00',	'True',	'YAKONGBA',	'',	'KANGI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(567,	'1880-09-22 00:00:00',	'True',	'SHARUFA',	'',	'KAPIPA',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(568,	'1880-09-22 00:00:00',	'True',	'KAMBALE ',	'',	'LUVIVI',	'VINCENT',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(569,	'2012-10-19 00:00:00',	'True',	'WEMBO',	'',	'DJAMBA',	'JUBERCIE',	'',	'',	'',	'',	'',	'KISANGANI',	'POLICE DE FRONTIERE',	'WEMBO ET AMBOYO\nTEL.0815609844, 0817778224',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(570,	'2013-04-12 00:00:00',	'True',	'MIRIAM',	'',	'KASALAGHANDO',	' ',	'',	'',	'',	'',	'',	'GOMA',	'KINDYA',	'KATSUVA KAMUHINDA\n0822214203',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(571,	'1880-09-22 00:00:00',	'True',	'ZANDOT',	'',	'TENDE',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	5,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(572,	'1880-04-29 00:00:00',	'True',	'MUSUBI',	'',	'MUZIKALE',	'JOSEPH',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(573,	'2013-06-13 00:00:00',	'True',	'MASIKA',	'',	'AMANI',	'GISEL',	'',	'',	'',	'',	'',	'BAYENGA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(574,	'2014-12-03 00:00:00',	'True',	'NTUMBA',	'',	'MWANA',	'GAEL',	'',	'',	'',	'',	'',	'BUKAVU',	'QUARTIER : BANKOKO; \nAVENUE : MBANDAKA',	'MBUYAMBA\n0814780999 ET 0819610502',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(576,	'2016-05-05 00:00:00',	'True',	'FAZILI ',	'',	'EDRAKU ',	'TENDRESSE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	1,	'False',	'True'),
(577,	'2013-08-08 00:00:00',	'True',	'BARAKA',	'',	'SENGE',	' ',	'',	'',	'',	'',	'',	'BAMBU',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(578,	'2014-03-10 00:00:00',	'True',	'MBIYE',	'',	'KAPINGA',	'JENOVIC',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(579,	'2014-05-03 00:00:00',	'True',	'MUSAFIRI',	'',	'SALAMA',	' MONISKA',	'',	'',	'',	'',	'',	'MAHAGI',	'Q. DELE',	'KIZITO MUSAFIRI ET KYAKIMWA\nTEL.0810275500, 0820869539',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(580,	'1880-09-22 00:00:00',	'True',	'TSHINSEKA',	'',	'WANZAMBI',	'DIEUMERCI',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(581,	'1880-09-22 00:00:00',	'True',	'KASEREKA',	'',	'KIKYO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(583,	'2014-02-03 00:00:00',	'True',	'KEYNES',	'',	'HAMULI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'0814021986',	'0814021986',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(584,	'2014-06-25 00:00:00',	'True',	'NGALULA',	'',	'MUKENDI',	'AIMERENCE',	'',	'',	'',	'',	'',	'KINSHASA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(585,	'2013-05-07 00:00:00',	'True',	'LAURENT',	'',	'MBEMBA',	' ',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(587,	'2014-01-14 00:00:00',	'True',	'REHEMA',	'',	'AMISI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'0814489080',	'0997142774',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(588,	'2010-09-11 00:00:00',	'True',	'YASSE ',	'',	'KONGBO',	'KEREN',	'',	'',	'',	'',	'',	'KINSHASA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(589,	'2014-02-14 00:00:00',	'True',	'ASANTE',	'',	'THASI',	'BARUCH',	'',	'',	'',	'',	'',	'GOMA',	'YAMBI YAYA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(590,	'2013-09-19 00:00:00',	'True',	'BARAKA',	'',	'KALIKULE',	'  ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(591,	'2015-03-28 00:00:00',	'True',	'MUVU ',	'',	'VULEMBERA',	'GLORIA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(592,	'1980-09-22 00:00:00',	'True',	'ANGAZA',	'',	'MAISHA',	' ',	'',	'',	'',	'',	'',	'KINSHASA',	'POLICE DE FRONTIERE',	'AMMANUEL ANGAZA\nTEL.0813532658, 0823847770, 0998506664',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(593,	'1880-09-22 00:00:00',	'True',	'MUDJINGA ',	'',	'MWADI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(594,	'2014-09-22 00:00:00',	'True',	'ASSUMANI',	'',	'BOBI',	'LUCIEN',	'',	'',	'',	'',	'',	'KISANGANI',	'POLICE DE FRONTIERE',	'BASANENI\n0822644206',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(595,	'2016-05-16 00:00:00',	'True',	'MWETE ',	'',	'SANGANYA ',	'ELINOR ',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(596,	'1880-09-22 00:00:00',	'True',	'ASOBEANANGE',	'',	'ADIBO',	'ARCHIPE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(597,	'2014-09-25 00:00:00',	'True',	'KAMWANYA',	'',	'MUYALI',	'EXOCIEL',	'',	'',	'',	'',	'',	'BENI',	'Q.HOHO',	'MUYALI\nTEL. 0815717165, 0999297605',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(598,	'2015-08-04 00:00:00',	'True',	'LUVE',	'',	'TSUNDE',	'IVE',	'',	'',	'',	'',	'',	'BUMBA',	'YAMBI YAYA',	'NGABU TSUNDE',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(599,	'2013-07-04 00:00:00',	'True',	'RAMAZANI',	'',	'MAYENGE',	'ANDRE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(600,	'2016-05-13 00:00:00',	'True',	'BAHATI ',	'',	'KAGAWA',	'MARDOCHEE',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(601,	'2013-08-13 00:00:00',	'True',	'SAMBA',	'',	'SANGARA',	'ZOE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(602,	'2014-09-12 00:00:00',	'True',	'GIKAKA’Y ',	'',	'AGUMA',	'LIONEL',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(603,	'2014-05-15 00:00:00',	'True',	'MUSINGUZI',	'',	'BYARUHANGA',	'PRINCE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'BYERWANGA ET KASEMIRE\nTEL.0813292330, 0826568772',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(604,	'2014-04-14 00:00:00',	'True',	'NDASHIMIRWA',	'',	'RUUSA',	'GABRIELLE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(605,	'2014-01-15 00:00:00',	'True',	'NGOY',	'',	'KAKUDJI',	'SAMUEL',	'',	'',	'',	'',	'',	' ',	'QUARTIER : HOHO;',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(606,	'2012-05-28 00:00:00',	'True',	'KANSIME',	'',	'KYABONE',	'VIVIANE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'0813292330, 0826568772',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(607,	'1880-09-22 00:00:00',	'True',	'KAHINDO ',	'',	'LUVIVI',	'JEMIRA',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(608,	'2014-10-29 00:00:00',	'True',	'MUNDUWA',	'',	'LUTULA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'NZOBHA ALPHONSE\n081768888',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(609,	'1880-09-22 00:00:00',	'True',	'BEDIKERE',	'',	'UBIMO ',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(610,	'2013-06-02 00:00:00',	'True',	'KADHA',	'',	'SHAI',	'MIRIAM',	'',	'',	'',	'',	'',	'KISANGANI',	'Q. HOHO,/COM. BUNIA,/AV/GOUVERNORAT',	'LONU ET BOKILI\nTEL.0820000112, 0853868817, 0811731321',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(611,	'2013-09-26 00:00:00',	'True',	'MUHUNGA',	'',	'ANJELANI',	'JAEL',	'',	'',	'',	'',	'',	'GOMA',	'POLICE DE FRONTIERE',	'MUHINGA',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(612,	'2014-03-14 00:00:00',	'True',	'AGATE ',	'',	'AMULI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIEREQ',	'AMULA JEAN\n0820038291',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(613,	'1880-01-01 00:00:00',	'True',	'GULAIN',	'',	'ABDALLAH',	' ',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(614,	'2014-03-29 00:00:00',	'True',	'TSHISABI',	'',	'MUKENDI',	'BENELTE',	'',	'',	'',	'',	'',	'BUJUMBURA',	'POLICE DE FRONTIERE',	'MUKENDI J.FELIX ET TCHIKWAKIVA',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(615,	'2014-09-25 00:00:00',	'True',	'ABONGI',	'',	'LEBILYABO',	'GEDEON',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO\nAVENUE : KISANGANI',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(616,	'2014-02-16 00:00:00',	'True',	'NTANYUNGU',	'',	'MASIALA',	'DJANA',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'NTANYUNGU ET KIKANI\nTEL. 0818390193, 0822730765',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(617,	'2014-11-11 00:00:00',	'True',	'UDONGO',	'',	'KERAURE',	'MARCEL',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : YAMBI YAYA',	'WILLY UCOUN KER\n08109963195',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(618,	'2014-08-16 00:00:00',	'True',	'ISENGE',	'',	'SIVIHWA',	'SAMUELLA',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO\n0813761019',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(619,	'2014-12-31 00:00:00',	'True',	'NKEBELEDIO',	'',	'ILUNGA',	'JOYCE CHRISTEVIE',	'',	'',	'',	'',	'',	'BUNIA',	'0810606013',	'0812320994',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(620,	'1880-01-01 00:00:00',	'True',	'MASIKA',	'',	'MULAHU',	'JEMIMA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'0991736901, 0817562777',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(621,	'2014-08-06 00:00:00',	'True',	'GUSEMU',	'',	'PIMBANI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICI DE FRONTIERE',	'BIENVENU PIMBANI ET MBUYI\nTEL.0813765607, 0818606719',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(623,	'2012-01-08 00:00:00',	'True',	'MAVE',	'',	'NGABUSI',	'DANIELA',	'',	'',	'',	'',	'',	'MONGWALU',	'QUARTIER: HOHO\n',	'0811699966',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(624,	'1880-01-01 00:00:00',	'True',	'MUGISA',	'',	'RUHIGWA',	'MOISE',	'',	'',	'',	'',	'',	'',	'QUARTIER HOHO',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(625,	'2022-09-22 00:00:00',	'True',	'IHANO',	'',	'RASHIDI',	'JOSEPH',	'',	'',	'',	'',	'',	'BUTEMBO',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(626,	'2012-08-14 00:00:00',	'True',	'TUTA',	'',	'BOFANA',	' ',	'',	'',	'',	'',	'',	' ',	'QUARTIER HOHO',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(627,	'1880-01-01 00:00:00',	'True',	'MAVE ',	'',	'LUSI',	' ',	'',	'',	'',	'',	'',	'LINGA',	'QUARTIER : HOHO',	'NGONA PATRICK\n0815132405',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(628,	'1880-09-22 00:00:00',	'True',	'ALOISE',	'',	'LUBANGO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(629,	'1880-09-22 00:00:00',	'True',	'KISEMBO',	'',	'KASHALA',	'DAVID',	'',	'',	'',	'',	'',	'MAMBASA',	'POLICE DE FRONTIERE',	'KISEMBO\n08204928002',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(630,	'2013-07-22 00:00:00',	'True',	'DIPO',	'',	'WANG’A BAKUNDA',	'DIVIN',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'DIPO\n0825092400',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(631,	'2016-08-01 00:00:00',	'True',	'NYANGI',	'',	'TAMBA',	'GENOFI',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'TAMBA NGOMA\n09977759',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(632,	'1880-09-22 00:00:00',	'True',	'JASMINE',	'',	'TSUMBIRA',	'KAHINDO',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(633,	'2013-01-06 00:00:00',	'True',	'TAMBWE',	'',	'JULES',	'WINNER',	'',	'',	'',	'',	'',	'KINSHASA',	'0813796625',	'0822560642',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(634,	'2013-11-07 00:00:00',	'True',	'AFOYORWOTH',	'',	'UVONA',	'VICTORIEUSE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(635,	'1980-09-22 00:00:00',	'True',	'MATHE',	'',	'SALAMU',	'GAD',	'',	'',	'',	'',	'',	' ',	'0816950348',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(637,	'1880-09-22 00:00:00',	'True',	'NABINTU',	'',	'BUSHENULA',	'RAPHAEL',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(638,	'2010-04-11 00:00:00',	'True',	'LISAMBA',	'',	'GETUMBE',	'JULIA',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(639,	'2013-03-13 00:00:00',	'True',	'OMARI',	'',	'BINSAIDI',	' ',	'',	'',	'',	'',	'',	'ARU',	'',	'0810867533',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(640,	'2013-04-14 00:00:00',	'True',	'MWANZE',	'',	'KABASHA',	'ESTHER',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'MUMBERE KABASHA\nTEL.0820154488, 0811436411',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(641,	'2022-09-24 00:00:00',	'True',	'AFOYO ',	'',	'BEDIDJO ',	' ',	'',	'',	'',	'',	'',	'2016',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(642,	'1980-09-22 00:00:00',	'True',	'NDJANGU',	'',	'KAKUDJI',	'EDMOND',	'',	'',	'',	'',	'',	' ',	'0814374872',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(643,	'2019-04-09 00:00:00',	'True',	'EDHOBO-NI',	'',	'EDHAZU',	'CHRIST',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'EDHOBHONIEDHAZU\n0819249997',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(644,	'2016-04-28 00:00:00',	'True',	'SANGWA ',	'',	'MASCOT',	'JACQUES ',	'',	'',	'',	'',	'',	'UVIRA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(645,	'2015-01-08 00:00:00',	'True',	'TWENGE',	'',	'BOONA',	'CHRIS ',	'',	'',	'',	'',	'',	'OÏCHA',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(646,	'1880-09-22 00:00:00',	'True',	'BOZENE',	'',	'NGANGWE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(647,	'2013-11-28 00:00:00',	'True',	'APYERA',	'',	'NENELING',	' ',	'',	'',	'',	'',	'',	'BUNIA',	' ',	' ',	1,	5,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(648,	'2013-02-19 00:00:00',	'True',	'NZANZU',	'',	'VAYILANDA',	'JEREMIE',	'',	'',	'',	'',	'',	'BUTEMBO',	'POLICE DE FRONTIERE',	'GERARD\n0893016002',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(649,	'1980-09-22 00:00:00',	'True',	'SEYA ',	'',	'TSUMBIRA',	' KAVIRA',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(650,	'2016-01-01 00:00:00',	'True',	'MUYISA',	'',	'KYAVU ',	'KEILAH',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(651,	'2013-02-17 00:00:00',	'True',	'MATHE',	'',	'VALIHALI',	'AMMIEL',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO\nAVENUE SALAMA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(652,	'2013-08-08 00:00:00',	'True',	'DRAVE',	'',	'TSUNDE',	'KEVIN',	'',	'',	'',	'',	'',	'BAMBA',	'POLICE DE FRONTIERE',	'NGABU TSUNDE\n0810164437',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(653,	'2016-09-03 00:00:00',	'True',	'NGIKE ',	'',	'NZENZE',	'GABRIELLA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(654,	'2013-04-21 00:00:00',	'True',	'AHANA',	'',	'BALUME',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'BALUME DESIRE ET MWADJUMA\nTEL.0819000036, 0997769108, 0997720307',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(655,	'2012-09-29 00:00:00',	'True',	'LEMA',	'',	'BUKASA',	'PHILIPE',	'',	'',	'',	'',	'',	'KISANGANI',	'POLICE DE FRONTIER',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(656,	'2016-02-28 00:00:00',	'True',	'MOISE',	'',	'MUNDUBI ',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(657,	'2013-01-01 00:00:00',	'True',	'POMBO',	'',	'KAYIBA',	'WILFREDE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'0812127001',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(659,	'2013-01-18 00:00:00',	'True',	'MAUNA',	'',	'KISULU',	' CHRIST-VIE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'NDONGALA KISULU\n0815859247',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(660,	'2010-07-30 00:00:00',	'True',	'BATINDE',	'',	'ETAPE',	'ELLIANE',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(661,	'1980-09-22 00:00:00',	'True',	'EZUA',	'',	'IMMACULEE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'0811750149',	' ',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(662,	'2013-02-02 00:00:00',	'True',	'PALUKU',	'',	'ZALABO',	'ARIEL',	'',	'',	'',	'',	'',	' ',	'QUARTIER HOHO\nGOUVERNAURAT',	'KAMBALE\n0820997885',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(663,	'2011-10-18 00:00:00',	'True',	'AZIZA',	'',	'SAIDI',	' ',	'',	'',	'',	'',	'',	'MAMBASA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(664,	'2011-08-27 00:00:00',	'True',	'JUMAINI',	'',	'BIN-BWASHI',	' ',	'',	'',	'',	'',	'',	'GOMA',	'QUARTIER : DHELE',	'BARUANI BWASHI\n0815517175',	1,	2,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(665,	'1880-09-22 00:00:00',	'True',	'PLAMEDI',	'',	'SAMOJA',	'CLAUDE',	'',	'',	'',	'',	'',	'BUTEMBO',	'DHELE',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(666,	'2013-05-13 00:00:00',	'True',	'KYANGA',	'',	'MAVINGA',	'DIVINE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(667,	'2017-01-21 00:00:00',	'True',	'MBOLOKO ',	'',	'ETAPE',	'EBEN-EZER',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(668,	'2012-07-30 00:00:00',	'True',	'ZABIBU',	'',	'MBABAZI',	'CHARLENE',	'',	'',	'',	'',	'',	'KISANGANI',	'C/ MBUNYA Q/LUMBA AV/BOGORO N 13',	'MBABAZI BASARA\n0827506435',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(669,	'2012-08-18 00:00:00',	'True',	'WANI',	'',	'METALOR',	'ARON',	'',	'',	'',	'',	'',	' ',	'QUARTIER : HOHO',	'WANI METALOR\n81355476',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(670,	'2016-07-25 00:00:00',	'True',	'BERNADETTE',	'',	'WASUKWA ',	'RAELLA',	'',	'',	'',	'',	'',	'BUTEMBO ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(671,	'1880-09-22 00:00:00',	'True',	'AMBOYO',	'',	'LISUNGI',	'SAFI',	'',	'',	'',	'',	'',	'KISANGANI',	'POLICE DE FRONTIERE',	'WEMBO ET AMBOYO',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(672,	'2012-11-04 00:00:00',	'True',	'NDJANGO',	'',	'MAKI',	'BARUTH',	'',	'',	'',	'',	'',	'LUBUTU',	'QUARTIER : BONKOKO',	'NDJONGO\n0819633124',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(673,	'1880-09-22 00:00:00',	'True',	'MASANZI ',	'',	'YUMI ',	'JEANNETTE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(674,	'2014-09-20 00:00:00',	'True',	'MUKWALI',	'',	'BANDA',	'GEDEON',	'',	'',	'',	'',	'',	'TCHELE',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(675,	'2016-10-14 00:00:00',	'True',	'LUMBAYI',	'',	'LISALAMA',	'MARTIN',	'',	'',	'',	'',	'',	'BUINA`',	'Q. HOHO',	'LISALAMA\n0813874503',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(676,	'1980-09-22 00:00:00',	'True',	'MWISHA ',	'',	'BALUME',	' ',	'',	'',	'',	'',	'',	'GOMA',	'POLICE DE FRONTIERE',	'CHARLE BALUME ET CHRISTINE SIMBA\nTEL.0813686167, 0813517097',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(677,	'1888-09-22 00:00:00',	'True',	'BACIREZE ',	'',	'NTABOBA',	'GERMAIN ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(678,	'2012-10-06 00:00:00',	'True',	'DRAMANI',	'',	'BULO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : YAMBI YAYA\nAVENUE : JALASIGA',	'DEDHA BULO\n0810228810',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(679,	'1880-09-22 00:00:00',	'True',	'ZAWADI',	'',	'PIRWATH',	'PRINCE',	'',	'',	'',	'',	'',	' ',	'QUARTIER : LUMUMBA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(681,	'2017-06-07 00:00:00',	'True',	'KASEREKA',	'',	'MUSAVULI',	'JOSPIN',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : LUMUMBA',	'KAMBALE NGENDO\n0997128456',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(682,	'1880-09-22 00:00:00',	'True',	'KASONGO',	'',	'ODIMBA',	'RHOLYNA',	'',	'',	'',	'',	'',	'',	'QUARTIER : YAMBI YAYA\n',	'KASONGO PAPY\n0812056208',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(683,	'1880-09-22 00:00:00',	'True',	'KERMUNDU',	'',	'MUNGUROMO',	' ',	'',	'',	'',	'',	'',	'BUTEMBO',	'YAMBI YAYA ',	'ALIMACON  KERMUNDU\n0813778486',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(684,	'2014-07-16 00:00:00',	'True',	'ROXANE ',	'',	'MASUDI ',	' ',	'',	'',	'',	'',	'',	'BENI ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(685,	'1889-09-22 00:00:00',	'True',	'BONANA ',	'',	'LIKOMBI ',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(686,	'1880-09-22 00:00:00',	'True',	'LUCAS ',	'',	'HAMULI ',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(687,	'2012-10-07 00:00:00',	'True',	'OKITO',	'',	'OLELA',	' ',	'',	'',	'',	'',	'',	'WALU',	'QUARTIER : KINDYA \nAVENUE : COLENNELLE',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(688,	'2015-06-06 00:00:00',	'True',	'KAVIRA',	'',	'YONGEZI ',	'NERIANA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(690,	'2015-12-15 00:00:00',	'True',	'BATUMIKE',	'',	'BRAYAN',	'BRAYAN',	'',	'',	'',	'',	'',	'BENI',	'POLICE DE FRONTIERE\nAVENUE : MAMAN ARABA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(691,	'1980-09-22 00:00:00',	'True',	'BILOMBE ',	'',	'MAHENGA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(692,	'2013-11-01 00:00:00',	'True',	'SUNDA',	'',	'MIALU’Z',	'TONY',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(693,	'2016-04-15 00:00:00',	'True',	'AYIKORU ',	'',	'ARIKU',	' JENY',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(694,	'1880-12-28 00:00:00',	'True',	'KENDA',	'',	'ADHU',	'GEDEO',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'KKENDA ADHU\n0814804444',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(695,	'2015-07-31 00:00:00',	'True',	'WEMBO ',	'',	'OLOKE',	'KEVIN ',	'',	'',	'',	'',	'',	'KISANGANI ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(696,	'2012-08-05 00:00:00',	'True',	'BILOMBE',	'',	'MOSA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'0822097645',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(697,	'1880-09-22 00:00:00',	'True',	'KASONGO',	'',	'MBOMBO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(699,	'2016-09-08 00:00:00',	'True',	'NESTA ',	'',	'KYANA ',	'LUCKY ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(701,	'1880-09-22 00:00:00',	'True',	'AHADI',	'',	'NGOMA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(702,	'2016-05-26 00:00:00',	'True',	'DAVID ',	'',	'BOSANGA ',	'JERIEL ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(703,	'2012-10-10 00:00:00',	'True',	'BAHATI',	'',	'MULIMBI',	' ',	'',	'',	'',	'',	'',	'DURBA',	' ',	'0824447366',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(704,	'2012-08-20 00:00:00',	'True',	'LIWONO',	'',	'MISSO',	'EVA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(705,	'2013-05-29 00:00:00',	'True',	'LUFUNGULA',	'',	'MUKEINA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'0810086687',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(706,	'2016-08-14 00:00:00',	'True',	'BONGILO ',	'',	'SUMBA',	'JOELLE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(707,	'1880-01-01 00:00:00',	'True',	'BARAKA',	'',	'SHWEKA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(708,	'1880-09-22 00:00:00',	'True',	'KOYALE',	'',	'LIENGO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(709,	'2012-01-12 00:00:00',	'True',	'VEINARD',	'',	'MABWENE',	' ',	'',	'',	'',	'',	'',	'BUTEMBO',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(710,	'2015-08-13 00:00:00',	'True',	'ASIFIWE',	'',	'ANGOYO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(711,	'1880-09-22 00:00:00',	'True',	'AKAU',	'',	'KOY',	'CHRISTIAN',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'AKAV\n0812009048',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(712,	'2013-03-14 00:00:00',	'True',	'MUMBERE',	'',	'MAHASANI',	'MICHAEL',	'',	'',	'',	'',	'',	'OICHA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(713,	'1880-09-22 00:00:00',	'True',	'MALONGA',	'',	'KAPUKU',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(714,	'2010-06-16 00:00:00',	'True',	'MUGISA',	'',	'MUNGENYI',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(715,	'2012-04-09 00:00:00',	'True',	'MUMBERE',	'',	'KASISI',	'DONDIVINE',	'',	'',	'',	'',	'',	'BUNIA',	'DHELE',	'KATEMBO KASISI\n0810194312',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(716,	'1880-09-22 00:00:00',	'True',	'BAVINZA ',	'',	'LEKI ',	'BIENVENU ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(718,	'2011-10-21 00:00:00',	'True',	'MENGE',	'',	'MUSANGU',	'ANDRE',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(719,	'2015-01-11 00:00:00',	'True',	'BARAKA ',	'',	'LUHAVO ',	'STEVEN ',	'',	'',	'',	'',	'',	'BUTEMBO ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(720,	'2013-06-07 00:00:00',	'True',	'NZOKO',	'',	'LUMANA',	'RACHEL',	'',	'',	'',	'',	'',	'  ',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(721,	'2011-02-14 00:00:00',	'True',	'LETUNITA',	'',	'SAIDI',	'URSULA',	'',	'',	'',	'',	'',	'KISANGANI',	'QUARTIER : HOHO\nAVENUE : SALAMA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(722,	'2019-10-30 00:00:00',	'True',	'ANYUTO',	'',	'MATATA',	'RHEANE',	'',	'',	'',	'',	'',	'GOMA',	'Q.HOHO/AV.MANGUTU',	'UYEWA MATATA ET BAHIZIRE\nTEL.0825781079, 0973725976, 0994241439',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(723,	'1880-09-22 00:00:00',	'True',	'SHAKO',	'',	'KANDA',	'MIGRA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'KANDA MBANZA\n0816642800\n0825032187',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(725,	'2019-11-29 00:00:00',	'True',	'WEMBO ',	'',	'MUKWANI',	'ALAIN',	'',	'',	'',	'',	'',	'BUNIA',	'YAMBI YAYA',	'WEMBO ET OKITO\nTEL.0818433793',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(726,	'1880-09-22 00:00:00',	'True',	'MAVE',	'',	'SHAKO',	'PRISKA',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO',	'0811699966',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(727,	'2019-11-23 00:00:00',	'True',	'YAMBOKOTE',	'',	'KAYIBA',	'JOLINA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'YETEKU KAYIBA ET SYLVIE\nTEL. 0812127001, 0820065151, 0994342505',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(728,	'2019-05-11 00:00:00',	'True',	'SARAH',	'',	'KAGHENI',	'NICLETTE',	'',	'',	'',	'',	'',	'BUNIA',	'Q. HOHO/POLICE DE FRONTIERE',	'MUHINDO\nTEL.0811705760, 0828880509',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(729,	'1880-09-22 00:00:00',	'True',	'AMBALI',	'',	'KABISABO',	'CHRISTIVIE',	'',	'',	'',	'',	'',	' ',	'QUARTIER KINDYA',	'KABISA ET SIVA MWIRAWAVANGI\n0997120512/ 0810742725\n',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(730,	'2019-12-27 00:00:00',	'True',	'MUSAU',	'',	'MBANGU',	'ANNAELLE-CHIMENE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'JONATHAN ET LISEBENI\nTEL. 0827825777, 0814448354',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(731,	'2019-02-23 00:00:00',	'True',	'WEMBO',	'',	'ALAKOY',	'JORDAN',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'WEMBA\n0815609844',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(732,	'2019-08-02 00:00:00',	'True',	'NDJAMBA',	'',	'KASONGO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'KASONGO MULIMBI\n0817626002',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(734,	'2019-09-02 00:00:00',	'True',	'ESIMILI',	'',	'LATUKA',	'KENDALL',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'AENOLD LATUKA\n0821424687',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(736,	'2019-08-22 00:00:00',	'True',	'LUKOKOMA',	'',	'NZENZE',	'GLADIS',	'',	'',	'',	'',	'',	'BUNIA',	'HOHO',	'BUELOR NGIKE\n09782111111',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(737,	'2019-10-16 00:00:00',	'True',	'ABUBAKAR ',	'',	'SADIKI ',	'CHANCE',	'',	'',	'',	'',	'',	'BUNIA',	'LENGABO',	'SADIKI ABUBAKARE\n0810117626',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(738,	'2019-09-08 00:00:00',	'True',	'MUHINDO',	'',	'KIKENE',	'FESTON',	'',	'',	'',	'',	'',	'BUNIA',	'Q. KINDIA',	'KAKULE FISTON ET KAHINDO\nTEL. 0813848520, 0813992538, 0999408819',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(739,	'2019-03-29 00:00:00',	'True',	'MUSAVULI',	'',	'NGENDO',	'MIRYAM',	'',	'',	'',	'',	'',	'',	'POLICE DE FRONTIERE\n',	'JOHN\n0992094088\n0821174502',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(740,	'2019-05-29 00:00:00',	'True',	'N’KISA',	'',	'MBULEY',	'VAINQUEUR',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO',	'MBULEY MALEBISABO\n0822804339',	1,	2,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(741,	'2019-06-16 00:00:00',	'True',	'AMURI',	'',	'WAMUKUNGA',	'ARIEL',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'AMURI MUSAFIRI ET ANGEL YUMA\nTEL. 0813834534, 0813520010',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(742,	'2019-09-10 00:00:00',	'True',	'MATA',	'',	'MOBONDA',	'BOLUNZA',	'',	'',	'',	'',	'',	'',	'POLICE DE FRONTIERE',	'MATA MOWANGI\n0819034527',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(743,	'2019-10-09 00:00:00',	'True',	'MULEMA',	'',	'MAKARI',	'VIANEY',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : BANKOKO',	'DRAMANI PILO\n0822279785',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(744,	'2019-11-08 00:00:00',	'True',	'MUHINDO',	'',	'KASEREKA',	'GLODY',	'',	'',	'',	'',	'',	'BENI',	'POLICE DE FRONTIERE',	'MUHINDO KASERAKA ET BAHILONGANZA\nTEL. 0827710010, 0816649177',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(745,	'2022-09-23 00:00:00',	'True',	'OSOKO',	'',	'KUMBIA',	'CLAUDIA',	'',	'',	'',	'',	'',	'BUNIA',	'AVENUE : MAMA ARAMBA POLICE DE FRONTIERE',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(746,	'2019-10-12 00:00:00',	'True',	'MATERANY',	'',	'RUKAZA',	'ENZO',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO; AVENUE SALAMA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(747,	'2019-07-05 00:00:00',	'True',	'AYILE',	'',	'KALEMBE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'Q. DELE',	'MUHINDO MOTHI ET AMORI ANIKA\nTEL. 0815357791, 0994307088, 0818002026, 0978212662',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(748,	'2019-10-20 00:00:00',	'True',	'UGEN',	'',	'PIRWOTH',	'JENOVIC',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : LUMUMBA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(749,	'2022-09-23 00:00:00',	'True',	'ABDALLAH',	'',	'PENEMBAKA',	'PRINCE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'RAMAZANI OMBA ET KAPINGA NGONGO\nTEL.0810067933, 0973767901, 0823888960',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(750,	'2019-07-15 00:00:00',	'True',	'ELIYA',	'',	'KALIKULE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO\nAVENUE : GOUVERNORAT',	'PAPA : 0826638438',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(751,	'2019-08-24 00:00:00',	'True',	'BOZENE',	'',	'BIKUMU',	'ELOHIM',	'',	'',	'',	'',	'',	'AFRIQUE DU SUD',	'QUARTIER : HOHO\nPOLICE DE FRONTIERE',	'BOZENE BIKUMU\n0811477152',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(752,	'2019-01-12 00:00:00',	'True',	'NIANZILI',	'',	'MUNDUBI',	'ROSE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'0813711425',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(753,	'2019-08-07 00:00:00',	'True',	'LWANZO',	'',	'KYAVU',	'KEREN',	'',	'',	'',	'',	'',	'BUNIA',	'Q. LENGABO',	'MUSUBA0 KYAVU ET BAKALE\nTEL. 0814615551, 0821301020\n',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(754,	'2019-07-02 00:00:00',	'True',	'BAMUGARA',	'',	'KYANGA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'Q. YAMBI YAYA',	'KYANGA HERITIER ET BAMUGARA GRACE\nTEL.0815104566, 0811927782',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(755,	'2019-11-22 00:00:00',	'True',	'AMBIMANI',	'',	'ANJATEPE',	'VICTOIRE',	'',	'',	'',	'',	'',	'BUNIA',	'LENGABO',	'AMBIMANI \n0815015347',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(756,	'2019-10-20 00:00:00',	'True',	'SALAMA',	'',	'KANSIME',	'ELSA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'ANNA JINGA TIBAMWENDA\n0821041231',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(757,	'2019-06-01 00:00:00',	'True',	'NGABUSI',	'',	'MAVE',	'ROSETTE',	'',	'',	'',	'',	'',	'BUNIA',	'Q.KINDIA/AV.MULUMBE',	'NJANGUSI MAVE\nTEL.0818213437, 0812140410, 0892807802',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(758,	'2019-06-25 00:00:00',	'True',	'NYADAWA',	'',	'PRINCESSE',	' ',	'',	'',	'',	'',	'',	'GOMA',	'QUARTIER : HOHO\nAVENUE : OASIS',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(759,	'2022-11-06 00:00:00',	'True',	'KAVIRA',	'',	'MUGHASU',	'WINNER',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE\nN*69',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(760,	'2019-01-13 00:00:00',	'True',	'MUNYAMPARA',	'',	'GRADY',	'BRADEL',	'',	'',	'',	'',	'',	' ',	'QUARTIER : HOHO\nAVENUE ; SALAMA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(761,	'2019-08-10 00:00:00',	'True',	'LWANZO',	'',	'MUSAFIRI',	'OLIVIA',	'',	'',	'',	'',	'',	'BUNIA',	'Q.LUMUMBA/AV.MAMAN ARABA N-70',	'MUSAFIRI MESHACK ET KAMUHA\nTEL. 0818827898, 0994952728',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(762,	'2019-04-08 00:00:00',	'True',	'JELISSA',	'',	'KOVINE',	'MBUYIRO',	'',	'',	'',	'',	'',	'BUNIA',	'DHELE',	'JOEL MBUYIRO\n0977715179',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(763,	'2019-12-25 00:00:00',	'True',	'ELIANE',	'',	'ALINGI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'ELISHA ALINGI ET JOYCE MAOMBI\nTEL.0816169005, 0993003113, 0821886308',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(764,	'2019-02-22 00:00:00',	'True',	'MAMBAMBU',	'',	'ALISON',	'ZALO',	'',	'',	'',	'',	'',	'BENI',	'POLICE DE FRONTIERE',	'YYE MAMBAMBU ET NICKY\nTEL.0998394919 et 0998298877.',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(765,	'2013-06-15 00:00:00',	'True',	'EKODI',	'',	'MAMPUYA',	'EBEN-EZER',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(766,	'2019-01-04 00:00:00',	'True',	'NDOVYA',	'',	'VALIHALI',	'MIKA',	'',	'',	'',	'',	'',	'BUNIA',	'Q.HOHO/AV.SALAMA',	'NGUVI MOISE ET KAVUGHO\nTEL.0817403753, 0822026229, 0859173656',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'False'),
(767,	'2019-01-04 00:00:00',	'True',	'NGURU',	'',	'KAPAMBA',	'MECHAC',	'',	'',	'',	'',	'',	'BUNIA',	'Q.HOHO/AV.SALAMA',	'NGUV MOISE ET KAVUGHO KISENGE\nTEL.0817403753, 0822026229, 0994013213',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'False'),
(769,	'1880-09-23 00:00:00',	'True',	'AKILIMALI',	'',	'BILI',	'OBED',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(770,	'2012-09-17 00:00:00',	'True',	'UUCA',	'',	'DJATHO',	'SAMUEL',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(771,	'2013-10-09 00:00:00',	'True',	'AYIKO',	'',	'DYOBHO',	'ISRAEL',	'',	'',	'',	'',	'',	'ARIWARA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(772,	'2014-06-26 00:00:00',	'True',	'SHARON',	'',	'ARABA',	'AZIO',	'',	'',	'',	'',	'',	'BUKAVU',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(774,	'2012-08-16 00:00:00',	'True',	'ALITASIA',	'',	'YOBE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(775,	'2013-05-01 00:00:00',	'True',	'CISHIBANJI',	'',	'ANDEMA',	' KEREN',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(776,	'2022-07-20 00:00:00',	'True',	'KABUNGA',	'',	'JOY',	'INNES',	'',	'',	'',	'',	'',	'13',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(777,	'2010-07-08 00:00:00',	'True',	'NTOKO',	'',	'SAIDI',	' ',	'',	'',	'',	'',	'',	'BAFWASENDE',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(778,	'2011-10-23 00:00:00',	'True',	'MUHIMBO',	'',	'BAINGA',	'JOSUE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(779,	'2012-04-23 00:00:00',	'True',	'N’KISA',	'',	'MUHITO',	'SAMUEL',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(780,	'2013-03-02 00:00:00',	'True',	'ASSANI',	'',	'NZANZA',	'RAFAELI',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(782,	'1880-09-23 00:00:00',	'True',	'RAMAZANI',	'',	'NZANZU',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(783,	'2019-10-18 00:00:00',	'True',	'LENI',	'',	'MUNDUA',	'PHANUELA',	'',	'',	'',	'',	'',	'ARIWARA',	'Q.HOHO',	'BILA BENJAMIN ET VALERIE MUNDUA\nTEL.0812940768, 0972226747',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(784,	'2010-07-20 00:00:00',	'True',	'LUBANBO',	'',	'SHINDANO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(785,	'2012-06-16 00:00:00',	'True',	'SHABANI',	'',	'LWINDA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(786,	'2011-08-08 00:00:00',	'True',	'TWENGE',	'',	'BIONA ',	'MOISE',	'',	'',	'',	'',	'',	'OICHA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(787,	'2019-09-04 00:00:00',	'True',	'ODIA',	'',	'ILUNGA',	'CHRISTIAN JUNIOR',	'',	'',	'',	'',	'',	'BUNIA',	'0810606013',	'TEL.0810606013, 0812320994',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(788,	'2009-06-23 00:00:00',	'True',	'TWENGE',	'',	'PENZEKOLE',	'PASCAL',	'',	'',	'',	'',	'',	'OICHA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(789,	'2019-07-02 00:00:00',	'True',	'BIRUNGI',	'',	'CHOFI',	'LEANA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'EMILE KWOKWO ET SIFA NTABALA\nTEL.0993354971, 0820035322, 0991500077',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(790,	'2019-10-08 00:00:00',	'True',	'PACURWOTH',	'',	'THOWA',	'ABITHAL',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE/AV.GONZANA',	'MICAN THOWA ET TIKO NICOLE\nTEL.0822729242, 0813731616',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(791,	'2019-09-27 00:00:00',	'True',	'WANI',	'',	'MUGISHO',	'JOHONNA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'GAEL MUGISHO\n0813575979',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(792,	'2019-02-09 00:00:00',	'True',	'KATSHUNGA',	'',	'MUNGUFENI',	'CORNEILLE',	'',	'',	'',	'',	'',	'BUNIA',	'0816427842, 0978719075',	'KATSHUNGA JOHN ET ALESI OMVITI\nTEL.0816427842, 0978719075',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(793,	'2019-08-02 00:00:00',	'True',	'OMBALA',	'',	'VICTORINE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'Q.HOHO',	'OMBALA ET BOLEMBO\nTEL.0820666877, 0810394045',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(794,	'2019-12-12 00:00:00',	'True',	'NDASHIMIRWA',	'',	'BIDETWA',	'SUZANA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'GABRIEL NDASHIMIRWA ET TUMAINI BIRUNGI\nTEL.0820095978, 0824744526',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(795,	'2019-01-06 00:00:00',	'True',	'WICUCUMIA',	'',	'AKYAMBA',	' CHRISTIAN',	'',	'',	'',	'',	'',	'M’SUNGUCCI',	'POLICE DE FRONTIERE',	'M’SUNGUMIA AKYAMBA \n0811962450',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(796,	'2019-09-18 00:00:00',	'True',	'MABEKA',	'',	'LAURANT',	'GARCIA',	'',	'',	'',	'',	'',	'BUNIA',	'Q.HOHO',	'LWANZO MABEKA ET KAVIRA MATHE\nTEL.0971916109, 0816005313',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(797,	'2019-04-21 00:00:00',	'True',	'MUHIMBO',	'',	'N’KISA',	'PASCAL',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER KINYA\nAVENUE : SANGARA',	'SINENO \n0829198357',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(798,	'2019-10-25 00:00:00',	'True',	'GILEFA',	'',	'MUYALI',	'ELCIEL',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO\n',	'MUYALI\n0815717165',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(799,	'2018-12-13 00:00:00',	'True',	'MAFUKO',	'',	'IZUBA',	'AKIBA',	'',	'',	'',	'',	'',	'GOMA',	'POLICE DE FRONTIERE',	'MAFUKO JUSTIN ET KASHINDI JUDITH\nTEL.0979351885, 0971249642',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(800,	'2019-12-26 00:00:00',	'True',	'DRAMANI',	'',	'KOPE',	'EPHRAIM',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER KINYA\nAVENUE MAMBA',	'DRAMANI\n0829785193',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(801,	'2013-01-12 00:00:00',	'True',	'AMURI',	'',	'KIBALO',	'PIANA ILDE',	'',	'',	'',	'',	'',	'KINSHASA',	'',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(802,	'2019-08-02 00:00:00',	'True',	'NZAKUE',	'',	'SEFU',	'ALANDRA',	'',	'',	'',	'',	'',	'KASENYI',	'Q.KINDIA',	'NZAKUE DHEDA ET FEZA SEFU\nTEL.0814538861,0821242279',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(803,	'2019-04-05 00:00:00',	'True',	'PALUKU',	'',	'SIKULIHINGA ',	'LUC',	'',	'',	'',	'',	'',	'BUNIA',	'Q.HOHO',	'ELI MOROTSO ET DELVIT KISOLU\nTEL. 0828611420, 0994562090',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(804,	'2019-07-03 00:00:00',	'True',	'FRANCKLINE',	'',	'KAKOME',	' ',	'',	'',	'',	'',	'',	' ',	'QUARTIERE : HOHO',	'NZANZU PAPURA \n0816234234',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(805,	'2019-08-04 00:00:00',	'True',	'BASHONGA',	'',	'SIMIRE',	'ANAELLE',	'',	'',	'',	'',	'',	'MAHAGI',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(808,	'2019-10-19 00:00:00',	'True',	'MUHINDO',	'',	'KAGHOMA',	'ANTONIO',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'KAGHOMA THOMAS\n0815752795',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(809,	'2019-08-31 00:00:00',	'True',	'NABINDJI',	'',	'BUSHENULA ',	' NABIDJA',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(810,	'2019-04-12 00:00:00',	'True',	'KUINIRWOTH',	'',	'AYIYO',	' CHRISNELLE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(811,	'2019-08-18 00:00:00',	'True',	'CIGOHA',	'',	'KWOKWO',	'DJOEN',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(812,	'2019-08-13 00:00:00',	'True',	'TUMSIME',	'',	'NGUZUMA',	'DISCHANE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(813,	'2020-04-18 00:00:00',	'True',	'ELONGA ',	'',	'LOSIMBA',	'JOSE',	'',	'',	'',	'',	'',	'BUNIA',	'Q.KINDIA',	'NZANGAWA KAMIMBAYA ET LUSI UCANDA\nTEL. 0815870102, 0813562069',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(815,	'2018-06-12 00:00:00',	'True',	'PREMICE',	'',	'KIMINYWA',	'STEPHANE',	'',	'',	'',	'',	'',	'BUTEMBO',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(816,	'2018-10-26 00:00:00',	'True',	'VISIKA',	'',	'VIVUYA',	'LUCRETIAN',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(817,	'2018-05-20 00:00:00',	'True',	'KAHINDO',	'',	'MATHE',	'PETRONELA',	'',	'',	'',	'',	'',	'M',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(818,	'2018-08-25 00:00:00',	'True',	'TAMIRI',	'',	'AGUMA',	'CHANCE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(819,	'2020-02-28 00:00:00',	'True',	'NTUMBA',	'',	'KANDA',	'ARIEL',	'',	'',	'',	'',	'',	'BUNIA',	'Q.BANKOKO',	'MBUYAMBA ET BRIGITTE\nTEL.0814780999, 0819610502, 0976929732',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(820,	'2019-04-07 00:00:00',	'True',	'AMANI',	'',	'THASI',	'ANAEL',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(821,	'2018-12-16 00:00:00',	'True',	'SAFARI',	'',	'MUKWALE',	'TYCHIQUE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(822,	'2019-06-20 00:00:00',	'True',	'AFOYORWOTH',	'',	'RACIU',	'FORTUNE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'YENYI BOUTROS\n0825132721',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(824,	'2018-10-01 00:00:00',	'True',	'CHANCE',	'',	'ALINGI',	'JEAN MARC',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(825,	'2018-12-03 00:00:00',	'True',	'TAYAYE',	'',	'ZAINA',	'ELIANNA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(826,	'2018-03-03 00:00:00',	'True',	'MAUNA',	'',	'KISULU',	' ARMAELLE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(827,	'2018-07-07 00:00:00',	'True',	'KERMUNDU',	'',	'MATHIDIRWOT',	'RAOUL',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(828,	'2018-02-06 00:00:00',	'True',	'MASIKA',	'',	'MUGHASU',	'JEANNETTE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(829,	'2019-08-27 00:00:00',	'True',	'ZOLA',	'',	'CHRIS',	'ELIHU',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(830,	'2018-10-17 00:00:00',	'True',	'LISALAMA',	'',	'LOFO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(831,	'2019-01-07 00:00:00',	'True',	'RUTH',	'',	'KYAMAKYA',	'CHRISTELLA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(832,	'2019-05-21 00:00:00',	'True',	'ANDISA',	'',	'MUSOLE',	'PRISCILLA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(833,	'2019-03-19 00:00:00',	'True',	'MUHANI',	'',	'VIHAMBA',	'ABIEL-JOSEPH',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(834,	'1880-09-23 00:00:00',	'True',	'KAWETE',	'',	'JOSUE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	' ',	'KAWETE ZIHALIRWA\n08192222078',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(835,	'2020-02-28 00:00:00',	'True',	'KASEREKA',	'',	'MALIYAMUKONO',	'  BLESSING',	'',	'',	'',	'',	'',	'',	'POLICE DE FRONTIERE',	'KAMBALE KABONWA ET MASIKA KAMABU\nTEL.0822268050, 0820562914',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(836,	'2019-01-04 00:00:00',	'True',	'KAPEND',	'',	'BUKASA',	'HENRY',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(837,	'2018-09-30 00:00:00',	'True',	'SONGOLI',	'',	'BAENGANGA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(838,	'2018-05-28 00:00:00',	'True',	'WINGI',	'',	'SINDANI',	'CHANCELIVIME',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(839,	'1980-09-23 00:00:00',	'True',	'BASHONGA',	'',	'MONGOLI',	'ARIANE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'OLIVIER MASUDI ET ANNI RAPANI',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(840,	'2019-04-14 00:00:00',	'True',	'KANSIME',	'',	'RUHIGWA',	'CHRISTIVIE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(841,	'2019-08-08 00:00:00',	'True',	'MUGISHO',	'',	'KABALE',	'DAVID',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : LUMUMBA',	'MURHOBOMANGA KABALE\n081462597',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(842,	'2018-07-06 00:00:00',	'True',	'JOSUE',	'',	'SIVIHWA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(843,	'2018-08-02 00:00:00',	'True',	'MAKASI',	'',	'MENGE',	'EVELINE',	'',	'',	'',	'',	'',	'ALIMBONGO',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(844,	'2019-04-04 00:00:00',	'True',	'KAHINDO',	'',	'WASINGYA',	'ALAIGRIA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(845,	'2019-08-13 00:00:00',	'True',	'OFRANNEL',	'',	'AMUNDALA',	'BILUGE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(846,	'2019-03-28 00:00:00',	'True',	'NYAKERU',	'',	'VAWEKA',	'DIANE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(847,	'2019-02-23 00:00:00',	'True',	'NZANZU',	'',	'MAPOLI',	'PACIFIQUE',	'',	'',	'',	'',	'',	'BUTEMBO',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(848,	'2018-05-29 00:00:00',	'True',	'MUSAFIRI',	'',	'MISONGA',	' ELIOR',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(849,	'2020-01-19 00:00:00',	'True',	'UPENDJI',	'',	'UPAR',	'RAYAN',	'',	'',	'',	'',	'',	'BUNIA',	'Q. KINDIA',	'UPAR ET REBECCA\nTEL.0813850060, 0819837274',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(851,	'2017-07-29 00:00:00',	'True',	'AFOYORWOTH',	'',	'MUNGURYEK',	'ADRIELLA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(852,	'2020-04-10 00:00:00',	'True',	'MADIBA',	'',	'TABAY',	'CARENE',	'',	'',	'',	'',	'',	'BUNIA',	'YAMBIYAYA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(853,	'2020-12-28 00:00:00',	'True',	'KAVIRA',	'',	'KALEMBE',	'YOUSTRAH',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'MUHINDO ET MALOSI\nTEL.0821614225',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(854,	'2018-05-27 00:00:00',	'True',	'OSINGA',	'',	'LIFOA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(855,	'2020-01-11 00:00:00',	'True',	'DWONG’NIRWOTH',	'',	'BALONGE',	'EL-JIREH',	'',	'',	'',	'',	'',	'',	'POLICE DE FRONTIERE\nKASUKU',	'NGINJINI BALONGE\n0828482277\n0821786988',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(856,	'2018-04-18 00:00:00',	'True',	'NGANDU',	'',	'OLELA',	'AARON',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(857,	'2020-02-28 00:00:00',	'True',	'NTIRU',	'',	'KARERE',	'JULIO',	'',	'',	'',	'',	'',	' ',	'Q.LUMUMBA',	'NTIRU ET MBUYI KATALAYI\nTEL.0812730008, 0820360646',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(858,	'1980-09-23 00:00:00',	'True',	'KEMIGISA  ',	'',	'KAHWA',	'AGAR',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'JAPHET KAHWA ET JEANNINE MUSAU\nTEL.0812424340, 0818867354, 0976599633',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(859,	'2018-05-07 00:00:00',	'True',	'MWAMBANZAMBI',	'',	'NKUNDA',	'BLESSING',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(860,	'2010-01-29 00:00:00',	'True',	'AVO',	'',	'MBUYI',	'NICOLE',	'',	'',	'',	'',	'',	'KISANGANI',	'YAMBI YAYA',	'AVO OLEYA JEAN-PAUL\n0816844495',	1,	2,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(861,	'1980-09-23 00:00:00',	'True',	'MWIMBA',	'',	'KIVUNGANYI',	'BRYAN',	'',	'',	'',	'',	'',	'BUNIA',	'Q.LENGABO',	'MANDE KIVUNGANYI ET BRIGITTE MBOMBE\nTEL.0821411096, 0815036912',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(862,	'2018-06-21 00:00:00',	'True',	'MUYISA',	'',	'BAMWITHAGHE',	'SAMUEL',	'',	'',	'',	'',	'',	'BENI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'False'),
(863,	'2020-09-30 00:00:00',	'True',	'KAMBALE',	'',	'MUSAVULI',	'BIENFAIT',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	' KAMBALE\n0812052216',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(864,	'2019-08-11 00:00:00',	'True',	'USHINDI',	'',	'LOVI PALAR',	'VICTOIRE',	'',	'',	'',	'',	'',	'BUNIA',	'Q. BANKOKO',	'ASIFIWE ET IBAITE UMO\nTEL.0817700045, 0816095584',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(865,	'2019-12-05 00:00:00',	'True',	'EYENGOLA',	'',	'NGENDE',	'ETHAN',	'',	'',	'',	'',	'',	'KISANGANI',	'Q. LENGABO',	'EYENGOLA ET ENKOTI MPOWA\nTEL. 0819240490, 0815950135,',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(866,	'2022-01-04 00:00:00',	'True',	'ASSANI',	'',	'MUKOKO',	'ETHAN',	'',	'',	'',	'',	'',	' ',	'QUARTIER BANKOKO',	'JDOJDO NDALO\n0810100666\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(867,	'2019-02-11 00:00:00',	'True',	'AKSANTE',	'',	'SENGE',	'ROMEO',	'',	'',	'',	'',	'',	'BAMBU',	'Q.KINDIA',	'KIZA SENGE ET FURAHA JUSTINE\nTEL.0812394628, 0826843915',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(868,	'2020-03-23 00:00:00',	'True',	'MAKIBONGA',	'',	'LEBILYABO',	'ALEX',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO;\nAVENUE KISANGANI',	'SANYA LEBILYABO\n0819177350',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(869,	'1980-09-23 00:00:00',	'True',	'NDJANGUSI',	'',	'ANNE',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(871,	'2020-05-17 00:00:00',	'True',	'MADINGAKA',	'',	'BANZALA',	'TRIOPHE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER KINDYA',	'MADINGAKA \n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(872,	'2020-01-19 00:00:00',	'True',	'JACOB',	'',	'BARAKA',	'BAMBINOGAMA',	'',	'',	'',	'',	'',	'',	'',	'EMMANUEL IFUNGULA\n0823059298\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(873,	'2019-01-15 00:00:00',	'True',	'MUNGULENI',	'',	'ABE',	'KALEB',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'ABE ET PATIENCE ONDJIA\nTEL.0810393131, 0814827694',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(874,	'2020-01-18 00:00:00',	'True',	'KASONDOLI',	'',	'ULDEPHONSE',	'WINNER',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER KINDYA',	'JEAN MUNGUNDU\n0814169698',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(875,	'2019-01-19 00:00:00',	'True',	'KONDONGA',	'',	'EUPHRAHIM',	' ',	'',	'',	'',	'',	'',	'RETHY',	'POLICE DE FRONTIERE',	'MARCELIN KONDONGA ET LOTS JUDICAELLE\nTEL.0820870039',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(876,	'2018-10-25 00:00:00',	'True',	'NGEVE',	'',	'TERYA',	'GABRIEL',	'',	'',	'',	'',	'',	'BUNIA',	'Q.DHELE',	'MWANAMPENZI ET KAVUGHO KIMAREKI\nTEL.0824794124, 0994759831',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(877,	'2019-02-11 00:00:00',	'True',	'VICTORINE ',	'',	'MWADI',	'NGOY',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO\nOASIS',	'KASAMBA PATRICK\n',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(878,	'2018-03-13 00:00:00',	'True',	'MUNGUETSONI',	'',	'DYOBHO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(879,	'1880-09-23 00:00:00',	'True',	'MUMBA',	'',	'LIFINO',	'JOHANNA',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(880,	'2019-03-05 00:00:00',	'True',	'DRANI',	'',	'DUNDJI',	' EBENEZER',	'',	'',	'',	'',	'',	'MONGBWALU',	'QUARTIER KINDYA',	'DIDJO NGULO\n0819559896',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(881,	'2018-08-17 00:00:00',	'True',	'MUNYIRAGI',	'',	'NYAMWABA',	'ABIGAEL',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(882,	'2018-03-30 00:00:00',	'True',	'MOMBAYA',	'',	'YAMOKOLO',	'VAINQUEUR',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(883,	'2018-05-07 00:00:00',	'True',	'MANZELA',	'',	'ALESI',	'DJANITRA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(884,	'2018-06-18 00:00:00',	'True',	'ZAWADI',	'',	'KANDAPE',	'EVODIE',	'',	'',	'',	'',	'',	'BUNIA',	'Q.KINDIA',	'KANDAPE ET ANDROSI\nTEL.0822791639, 0815293385',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(885,	'2017-09-11 00:00:00',	'True',	'MAFUKO',	'',	'IMIGISHA',	'TUZO',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(886,	'2018-10-06 00:00:00',	'True',	'MUHAMBU',	'',	'MUPENZI',	'BRYAN',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'JEREMIE MUPENZI\n0815928176',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(887,	'2018-03-02 00:00:00',	'True',	'MADIBA',	'',	'MOMB',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(888,	'2019-03-08 00:00:00',	'True',	'KAISIRIRYA',	'',	'MATHE',	'NEHEMIE',	'',	'',	'',	'',	'',	'BUNIA',	'0994031077',	'0994031077',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(889,	'2018-03-05 00:00:00',	'True',	'KATUSI',	'',	'LOMALISA',	'GAEL',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(890,	'2018-09-12 00:00:00',	'True',	'SAFI',	'',	'MUTCHAPA',	'DIVINE',	'',	'',	'',	'',	'',	'',	'',	'NASIBU TCHIBEMBA',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(891,	'2019-01-06 00:00:00',	'True',	'IYONGI',	'',	'FUMU',	'CONSOLDIE',	'',	'',	'',	'',	'',	'KINSHASA',	'POLICE DE FRONTIERE',	'IYONGI ET FUMU',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(893,	'2018-07-27 00:00:00',	'True',	'KATEKERE',	'',	'LAELE',	'ANAIS',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(894,	'2017-08-23 00:00:00',	'True',	'UTAJIRI',	'',	'RWAMO',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(895,	'2019-02-17 00:00:00',	'True',	'MAHAMBA',	'',	'ASIFIWE',	'GENEVIEVE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER BANKOKO\nAVENUE MANIEMA',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(896,	'2017-12-30 00:00:00',	'True',	'TSHITEGETE',	'',	'ELONGA',	'GABRIELLA',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(897,	'2018-04-17 00:00:00',	'True',	'MITOPAMUNGU',	'',	'WAYIK',	'JIROD',	'',	'',	'',	'',	'',	'BUNIA',	' ',	'J.DE DIEU WAYIK ET HORTANCE BIWAGA AYENYA\nTEL.0815133197, 0822888536',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(898,	'2017-07-13 00:00:00',	'True',	'TUHIMBIRANE',	'',	'TERYA',	'MICHAEL',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(899,	'2017-07-22 00:00:00',	'True',	'YOSHUA',	'',	'KALIKULE',	' ',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(900,	'2018-08-08 00:00:00',	'True',	'AFOYO',	'',	'MELLY',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(901,	'1880-09-23 00:00:00',	'True',	'AMIRA ',	'',	'MASUDI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(902,	'1980-09-23 00:00:00',	'True',	'MALKYA',	'',	'MURHULA',	'GLADISSE',	'',	'',	'',	'',	'',	'BUNIA',	'0995373277',	'0829683332, 0814852805',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(903,	'2019-04-28 00:00:00',	'True',	'MADITHRWOTH-UVONA',	'',	'UVONA',	'DAVIDO',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO\n',	'UVONA KERMUNDI\n0815607319\n0813736989',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(904,	'2017-11-27 00:00:00',	'True',	'BOKANGA',	'',	'KOFUNDA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(905,	'2018-02-25 00:00:00',	'True',	'AGISHA',	'',	'BULO',	'JOSUE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER KINDYA',	'MAKI BULO\n0823180671',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(906,	'2019-01-31 00:00:00',	'True',	'MPARANYI',	'',	'BULANGALIRE',	'ELIE',	'',	'',	'',	'',	'',	'BUNIA',	'Q.BANKOKO/AV.MANIEMA',	'MPARANYI CENTWALI ET MALOLO GLOIRIA\nTEL.0816461121, 0997717720',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(907,	'2017-12-20 00:00:00',	'True',	'BUKASA',	'',	'MUKENDI',	'DIVIN',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(908,	'2019-01-02 00:00:00',	'True',	'KOBUSINGE',	'',	'BANGA',	'ORCHIDEE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'JEAN PAUL BANGA\n0817502055',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(909,	'2019-08-20 00:00:00',	'True',	'DRAMANI',	'',	'TSUNDE',	'FLORENT',	'',	'',	'',	'',	'',	'BUNIA',	'Q.YAMBI YAYA/POLICE DE FRONTIERE',	'NGABU TSUNDE ET KASIMBA\nTEL.0810164437, 0817598393',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(910,	'2018-01-03 00:00:00',	'True',	'BOKYOMBANGO',	'',	'BOBI',	'BENNI',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(911,	'2018-08-13 00:00:00',	'True',	'MUMBERE',	'',	'TERYA',	'ARTUR',	'',	'',	'',	'',	'',	'BUTEMBO',	'QUARTIER HOHO\nGOUVERNAURAT',	'KAKULE THERYA FABRICE\nCHAUFFEUR\n0810748089',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(913,	'2018-07-09 00:00:00',	'True',	'HONORA',	'',	'IVANA',	'KATEMBO',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(914,	'2018-10-10 00:00:00',	'True',	'MATIME',	'',	'ABDALLAH',	'RYAN',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'ABDALLAH KEBE\n0818801479',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(915,	'2019-04-20 00:00:00',	'True',	'CHRIST VIE',	'',	'NDINDA',	'TOUSSAINT',	'',	'',	'',	'',	'',	'BUKAVU',	'POLICE DE FRONTIERE',	'ALAIN KUSIMWA ET NATHALIE\nTEL.0994332796, 0990580596, 0894369022',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(916,	'2020-01-27 00:00:00',	'True',	'PRINCESSE',	'',	'ARABA',	' ',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE/Q. YAMBI YAYA',	'DELPHIN ETULA ETKIZA RUTH\nTEL.0814373649, 0858586206',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(917,	'2018-05-17 00:00:00',	'True',	'DRAMANI',	'',	'SHALO',	'LUCIE',	'',	'',	'',	'',	'',	'BAMBU',	'QUARTIER KINDYA\nAVENUE KANZALE',	'BATSI SHALO CLAUDE\n0810790389\n0826030919',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(918,	'2019-03-12 00:00:00',	'True',	'UYUNGI',	'',	'RWOTH',	'JALUM',	'',	'',	'',	'',	'',	'DURBA',	'Q.DHELE',	'COBIDONGO JACQUES ET ANZOYO\nTEL.0812691975, 0814809708, 0997230774',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(919,	'2019-02-10 00:00:00',	'True',	'ZAINABU',	'',	'SAIDI',	'JOYCE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO\n',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(920,	'2019-01-07 00:00:00',	'True',	'N’KISA',	'',	'DUABO',	'TIMOTHEE',	'',	'',	'',	'',	'',	'NYAKUNDE',	'LENGABO',	'DUABO\n0816952966',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(921,	'2019-04-12 00:00:00',	'True',	'KAVOTA',	'',	'TENDEMA',	'MICHELINE',	'',	'',	'',	'',	'',	'BUNIA',	'Q.HOHO',	'MICHAEL KATEMBO ET BARAKA VAGHENI\nTEL.0814505562, 0816695955',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(922,	'2018-07-19 00:00:00',	'True',	'MOGHOLI',	'',	'BALUME',	'MELINA',	'',	'',	'',	'',	'',	'GOMA',	'POLICE DE FRONTIERE',	'BALUME DESIRE\n0819000036',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(923,	'2018-10-24 00:00:00',	'True',	'KAHINDO',	'',	'SIVIWE',	' LOIS',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(924,	'2018-07-07 00:00:00',	'True',	'KOMBI',	'',	'KABASHA',	'CYRILLE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'MUMBERE ET YEMBA\nTEL.0811436411',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(925,	'1880-01-01 00:00:00',	'True',	'N’KISA',	'',	'KIBONGA',	'VICTOIRE',	'',	'',	'',	'',	'',	'',	'POLICE DE FRONTIERE ',	'SIMBILYABO PASCAL\n0814897308',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(926,	'2018-05-31 00:00:00',	'True',	'RAMAZANI',	'',	'KAFULA',	'MICHEL',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(927,	'2018-11-03 00:00:00',	'True',	'MUSEME',	'',	'MAKENE',	'GIFT',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'LE CLEMENT ET GISELE\nTEL.0828228497, 0829576412',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(928,	'2018-05-10 00:00:00',	'True',	'SIXHOMME',	'',	'MUYALI',	'EZECHIEL',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIERE : HOHO',	'MUYALI\n0815717165',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(929,	'2018-01-18 00:00:00',	'True',	'METALOR',	'',	'WAY',	'JACOB',	'',	'',	'',	'',	'',	'BUNIA',	'Q.GOUVERNORAT',	'WAY METALOR ET NEMBUSU\nTEL.0813554876, 0816250105',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(930,	'2018-11-12 00:00:00',	'True',	'LAKURA',	'',	'SIFA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'ROBERT LAKURA\n',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(931,	'2018-03-08 00:00:00',	'True',	'MATA MOWANGI',	'',	'MOBONDA',	'RYAN',	'',	'',	'',	'',	'',	'KINSHASA',	'POLICE DE FRONTIERE',	'MATAMOWANGI\n0819034527',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(932,	'2017-09-13 00:00:00',	'True',	'KAPINGA',	'',	'MADIBA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'YAMBI YAYA',	'LAISA MADIBA\n081753924',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(933,	'1980-09-23 00:00:00',	'True',	'VIVUYA',	'',	'KIVATHERA',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(934,	'2017-06-06 00:00:00',	'True',	'KAKULE ',	'',	'KASISI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER :  DHELE',	'KATEMBO\n0810194317/ 0825740339',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(935,	'2017-03-23 00:00:00',	'True',	'WEMBO',	'',	'ODIMBA',	'JUNIOR',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'WEMBO ET AMBOYO\nTEL.0815609844, 0817778224',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(936,	'2018-01-11 00:00:00',	'True',	'NGHUMUDHU',	'',	'TABANI',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'YAMBI YAYA\nPOLICE DE FRONTIERE ',	'TABANI DIEU-DONNEE\n0820114422\n0826131311(Whatsapp)',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(937,	'2018-10-08 00:00:00',	'True',	'TSHINSEKA',	'',	'WANZAMBI',	'DEV',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'TSHINSEKA WANZAMBI ET MAMY OYAKA\nTEL.0829296079, 0819631229',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(938,	'2017-07-18 00:00:00',	'True',	'ELIOR',	'',	'ALINGI',	'BRYAN',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(939,	'2018-09-01 00:00:00',	'True',	'DRAJIMA',	'',	'PILO',	'THEOPHILE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER BANKOKO\nAVENUE ZELANGA NA POKWA',	'DRAMANI PILO\n0822279785',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(940,	'2018-03-01 00:00:00',	'True',	'AFOYO',	'',	'MARACTHO',	'DANIELLA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(942,	'2020-01-25 00:00:00',	'True',	'MUMBERE',	'',	'MUSARA',	'OBED',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'False'),
(943,	'2018-02-24 00:00:00',	'True',	'NTIRU',	'',	'BARAKA ',	'JUVE',	'',	'',	'',	'',	'',	' ',	'Q.LUMUMBA/AV.BOULEVARD DE LIBERATION N-08',	'NTIRU ET MBUYI\nTEL. 0812730003, 0820360646',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(944,	'2018-05-05 00:00:00',	'True',	'HESHIMA',	'',	'HAMIRIZA',	' ',	'',	'',	'',	'',	'',	'',	'POLICE DE FRONTIERE',	'JACQUE HAMIRIZA\n0818769203',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(945,	'2018-03-08 00:00:00',	'True',	'AISHA',	'',	'BINTI',	'BWASHI',	'',	'',	'',	'',	'',	'BUNIA',	'Q.DHELE',	'BARUANE BWASHI ET SIFA DJUMAINI\nTEL.0815517175',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(946,	'2018-06-06 00:00:00',	'True',	'GAELLE',	'',	'NZENZE',	'VAHISALIRE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER : HOHO\n',	'BGWALI NGIKE\n0811357000\n0972226598',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(947,	'2017-12-10 00:00:00',	'True',	'UWORMUNGU',	'',	'THOWA',	'ABISHUA',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER ; POLICE DE FRONTIERE',	'MICAN THOWA\n0822729242\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(948,	'2018-04-25 00:00:00',	'True',	'ALITASIA',	'',	'BISELENGE',	'WINNIE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'ALITASIA ET BISECENGE\nTEL.0811711120, 0991370937',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(949,	'2018-02-12 00:00:00',	'True',	'MUYISA',	'',	'MATHE ',	'EMVIE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(950,	'2018-08-30 00:00:00',	'True',	'ADAM ',	'',	'ABUBAKAR',	'BELAMIE',	'',	'',	'',	'',	'',	'BUNIA',	'LENGABO',	'SADIKI ABUBAKAR\n0810117626',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(951,	'2018-05-23 00:00:00',	'True',	'IRENGE',	'',	'NVANAMILIYO ',	'VAINQUEUR ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(952,	'2018-05-10 00:00:00',	'True',	'YONESI',	'',	'MUYALI',	'AIMECIEL',	'',	'',	'',	'',	'',	'BUNIA',	'Q.HOHO',	'MUYALI ET AIMEE\nTEL.0815717165, 0999297605, ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(953,	'2018-05-21 00:00:00',	'True',	'MUMBERE',	'',	'MATHE',	'OBRIGADE',	'',	'',	'',	'',	'',	'BUTEMBO',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(955,	'2018-08-27 00:00:00',	'True',	'SIMARD',	'',	'MUZUNGU',	' ISRAEL',	'',	'',	'',	'',	'',	'BUNIA',	'Q. YAMBI YAYA',	'TEPLARE MUZUNNGU ET CECILIA\nTEL.0811626146, 0818218084, 0829364452',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(957,	'2017-05-08 00:00:00',	'True',	'KASOKI',	'',	'KIKENE',	'SINTYA',	'',	'',	'',	'',	'',	'MONGBWALU',	'QUARTIER KINDYA',	'KAKULE FISTON\n0813848520',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(958,	'1980-09-23 00:00:00',	'True',	'LYDI',	'',	'SALAMA',	' ',	'',	'',	'',	'',	'',	' ',	'POLICE DE FRONTIERE',	'NGOMA PATRIKE',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(959,	'2018-04-15 00:00:00',	'True',	'DRAMANI ',	'',	'MAKI ',	' ',	'',	'',	'',	'',	'',	'MONGBWALU ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(960,	'2018-04-15 00:00:00',	'True',	'JESSE',	'',	'CHRISNOVIC',	'TSHISUNGU',	'',	'',	'',	'',	'',	'BUNIA',	'',	'CHRISTIAN\n0810606013',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(961,	'2018-01-04 00:00:00',	'True',	'DRAJIRO',	'',	'MBIDJO',	'ELI',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER HOHO',	' MBIDJO BARAKA\n0811699966\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(962,	'2018-04-18 00:00:00',	'True',	'BILUNGE',	'',	'CHOFI',	'LEATITIA',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'EMILE KWOKWO ET SIFA\nTEL.0820035322, 0993354971,0991500077',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(963,	'2018-06-30 00:00:00',	'True',	'KALOMBO ',	'',	'MEJI ',	'RUBIN ',	'',	'',	'',	'',	'',	'KINSHASA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(964,	'2018-07-11 00:00:00',	'True',	'ZONA',	'',	'MALEKA ',	'JULIENNA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(965,	'1880-01-01 00:00:00',	'True',	'LATIFA ',	'',	'ABDALLAH',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(966,	'2018-06-24 00:00:00',	'True',	'ANSIMA',	'',	'MITIMA',	'AURORE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(967,	'1880-01-01 00:00:00',	'True',	'BARAKA',	'',	'MUKATAMALI',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(968,	'2019-08-28 00:00:00',	'True',	'BILOMBE ',	'',	'NGOY',	'JACQUE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(969,	'1880-09-23 00:00:00',	'True',	'NZEBA',	'',	'KANYINDA',	'DJONILA',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(970,	'1889-09-23 00:00:00',	'True',	'AKITAMUNGU ',	'',	'ELY',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(971,	'1880-09-23 00:00:00',	'True',	'KAVIRA',	'',	'KASONIA',	'REBECCA',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(972,	'1880-09-23 00:00:00',	'True',	'MAKISANZA',	'',	'LEBILYABO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(973,	'1880-09-24 00:00:00',	'True',	'MIRINDI',	'',	'BOLAMBA',	'CHRISTELLE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(975,	'1880-09-24 00:00:00',	'True',	'KASEREKA',	'',	'KAVUNO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(976,	'1880-09-24 00:00:00',	'True',	'MUHINDO ',	'',	'MAKALA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(977,	'1880-09-24 00:00:00',	'True',	'N’KISA ',	'',	'MUZIKALE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(978,	'1880-09-24 00:00:00',	'True',	'RAISSAN',	'',	'HAMULI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(979,	'1880-01-01 00:00:00',	'True',	'LONJIRINGA',	'',	'DRAMANI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(980,	'1880-01-01 00:00:00',	'True',	'ALIMA',	'',	'KABEMBA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(981,	'1880-01-01 00:00:00',	'True',	'KIWEKU',	'',	'MBANGU',	' ',	'',	'',	'',	'',	'',	' ',	'Q. HOHO VERS NZAMBEMALAMU',	' KIWEKU KILUNDU ET NDAYA\nNUM. TEL.0820756382\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(982,	'1880-09-24 00:00:00',	'True',	'OKITO',	'',	'WAYU ',	'FIDELE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(985,	'1880-01-01 00:00:00',	'True',	'CHRISTINE',	'',	'WAMUNGU',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(986,	'2009-11-21 00:00:00',	'True',	'N’SEYA',	'',	'BOMBETO',	'ESTHER',	'',	'',	'',	'',	'',	' KISANGANI',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'False'),
(987,	'1880-09-24 00:00:00',	'True',	'MASIKA ',	'',	'KASONIA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(989,	'1880-09-26 00:00:00',	'True',	'MUGHOLE',	'',	'NYUNYU',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(990,	'1880-09-26 00:00:00',	'True',	'AKONKWA',	'',	'MASTAKI',	'  ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(992,	'1880-09-26 00:00:00',	'True',	'MUGHUNDA',	'',	'AIMERENCE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(993,	'2022-09-26 00:00:00',	'True',	'MUHIMBO',	'',	'LONDJAMUZI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(994,	'1880-09-26 00:00:00',	'True',	'OLELA',	'',	'WOMBO',	'ALFRED',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(995,	'1880-09-26 00:00:00',	'True',	'KISAINA',	'',	'MUSAFIRI',	'LISA',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(997,	'2016-06-05 00:00:00',	'True',	'FARAJA',	'',	'SENGE',	'MARDOCHE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(998,	'1880-09-26 00:00:00',	'True',	'MUSAVULI',	'',	'NGENDO',	'MOISE',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(999,	'1880-09-26 00:00:00',	'True',	'MIKOMBO',	'',	'NKUNDA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1001,	'1880-09-26 00:00:00',	'True',	'DHELO',	'',	'BULO',	'DANI',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1002,	'1880-09-26 00:00:00',	'True',	'ONDEBACHI',	'',	'AFITAHINDE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1003,	'1880-09-26 00:00:00',	'True',	'BINJA',	'',	'MUSOLE',	'ANGELANIE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	2,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1004,	'2022-09-26 00:00:00',	'True',	'KAHINDO',	'',	'VAYILANDA',	'GAELLE',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1005,	'1880-09-26 00:00:00',	'True',	'BOYIBATO',	'',	'MUNDAMBO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1006,	'1880-09-26 00:00:00',	'True',	'LIPO',	'',	'LOKAKOLA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1007,	'1880-09-26 00:00:00',	'True',	'ALITASIA',	'',	'NYOME',	' ',	'',	'',	'',	'',	'',	' ',	'',	'0811711120',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1008,	'1880-09-26 00:00:00',	'True',	'OTSHUDIEMA',	'',	'WEMOKESE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'0827943974',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1009,	'1880-09-26 00:00:00',	'True',	'TSHIBOLA',	'',	'DIKUYI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'0817014926',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1010,	'2022-09-26 00:00:00',	'True',	'VIVUYA',	'',	'KYANA',	'CALEB',	'',	'',	'',	'',	'',	'',	'',	'0990012936',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1011,	'1880-09-26 00:00:00',	'True',	'AFOYORWOTH',	'',	'BALONGE',	' ',	'',	'',	'',	'',	'',	'',	'',	'082`786988',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1012,	'1880-09-26 00:00:00',	'True',	'KAVUGHO',	'',	'MALIYAMUKONO',	' ',	'',	'',	'',	'',	'',	'',	'',	'082268050',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1013,	'1880-09-26 00:00:00',	'True',	'KALONDA',	'',	'TAGOZA',	'MERDI',	'',	'',	'',	'',	'',	' ',	'',	'0821725259',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1014,	'1880-09-26 00:00:00',	'True',	'GENDO',	'',	'LEBILYABO',	'ISRAEL',	'',	'',	'',	'',	'',	' ',	'',	'08119777350',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1015,	'1880-09-26 00:00:00',	'True',	'MUMBERE',	'',	'MATSIPA',	' ELIE',	'',	'',	'',	'',	'',	' ',	'',	'0827435655',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1016,	'1880-09-26 00:00:00',	'True',	'IGNACE',	'',	'AMULI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'0813547905',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1017,	'2022-09-26 00:00:00',	'True',	'ELONGA',	'',	'NONGO',	'NORALIE',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1018,	'1880-09-26 00:00:00',	'True',	'MUHASA',	'',	'LWANZO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'0813547905',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1019,	'1880-09-26 00:00:00',	'True',	'CIGOHA',	'',	'ASHUZA',	'JOSHUA',	'',	'',	'',	'',	'',	' ',	'',	'0815096050',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1020,	'1880-09-26 00:00:00',	'True',	'KASEREKA',	'',	'KASISI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1021,	'1880-09-26 00:00:00',	'True',	'MUGISHO',	'',	'BUSHENULA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1022,	'1880-09-26 00:00:00',	'True',	'AHADI',	'',	'KAKOBA',	'GABRIEL',	'',	'',	'',	'',	'',	' ',	'',	'0812891634',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1023,	'1880-09-26 00:00:00',	'True',	'KASONGO',	'',	'SALAMABILA',	' MBOMBO',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1024,	'2022-09-26 00:00:00',	'True',	'TSHINSEKA',	'',	'WANZAMBI',	'JOYCE',	'',	'',	'',	'',	'',	' ',	'',	'0829296079',	1,	1,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1025,	'1880-09-26 00:00:00',	'True',	'NDWENGA',	'',	'BIBANGE',	'CHARLOTTE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1026,	'1880-09-26 00:00:00',	'True',	'ANKOKWA',	'',	'CHIZA',	' ADONAI',	'',	'',	'',	'',	'',	'',	'',	'0816293620',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1027,	'1880-09-26 00:00:00',	'True',	'WIDIA',	'',	' LATUKA',	'DAVE',	'',	'',	'',	'',	'',	' BUNIA',	'POLICE DE FROMTIERE',	'0817422989;\n0817810139',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1028,	'1880-09-26 00:00:00',	'True',	'ZIMAMOTO',	'',	'NGOMA',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1030,	'1880-09-26 00:00:00',	'True',	'DORCAS',	'',	'BOMBETO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'0816417130',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'False'),
(1031,	'1880-09-26 00:00:00',	'True',	'NKUNDA',	'',	'MVULUYI',	'WINNER',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1034,	'1880-09-26 00:00:00',	'True',	'EDHOBO-NI',	'',	'EDHAZU',	'ARMAND',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1035,	'1880-09-26 00:00:00',	'True',	'DRAJIMA',	'',	'VADZA',	'TRIOMPHE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1036,	'2014-05-03 00:00:00',	'True',	'VUHESE',	'',	'MATHE',	' EMMANE',	'',	'',	'',	'',	'',	'BUNIA',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1038,	'1880-09-26 00:00:00',	'True',	'LWEMBO',	'',	'MARINOS',	' CHARMAKE',	'',	'',	'',	'',	'',	'',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1039,	'1880-09-26 00:00:00',	'True',	'KOMBI',	'',	'KAZI',	'JESSICA',	'',	'',	'',	'',	'',	'  ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1041,	'1880-09-26 00:00:00',	'True',	'LIFOKO',	'',	'MAHENGA',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1042,	'1880-09-26 00:00:00',	'True',	'LUBWIKA',	'',	'BOMBETO',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'False'),
(1043,	'1880-09-26 00:00:00',	'True',	'KILENA',	'',	'KAGAWA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1045,	'1880-09-26 00:00:00',	'True',	'BASELE ',	'',	'ITOKO',	'PHILIENNE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	1,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1046,	'1880-09-26 00:00:00',	'True',	'ADIZO',	'',	'KATOBE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1048,	'1880-09-26 00:00:00',	'True',	'KERMUNDU',	'',	'JALAURE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1050,	'1880-09-26 00:00:00',	'True',	'TANYA',	'',	'VONGO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1052,	'1880-09-26 00:00:00',	'True',	'BASELE  ',	'',	'ITOKO',	'BENEDICTE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1054,	'1880-09-26 00:00:00',	'True',	'NTUMBA',	'',	'KANYINDA',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1057,	'2022-09-26 00:00:00',	'True',	'MARTHA',	'',	'MUHAVUKI ',	' DEGRACE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1058,	'1880-09-26 00:00:00',	'True',	'MBUSESE',	'',	'TAGIRABO',	'ISAAC',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1060,	'1880-09-26 00:00:00',	'True',	'EDHOBO-NI',	'',	'EDHAZU',	'TIME',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1062,	'1880-09-26 00:00:00',	'True',	'BANDILISI',	'',	'MUNZEMBA',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1064,	'1880-09-27 00:00:00',	'True',	'N’SIMIRE',	'',	'TCHUBAKA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1066,	'1880-09-27 00:00:00',	'True',	'ADELARD MITHEO',	'',	'MAKI',	'WHELOSI',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1067,	'1880-09-27 00:00:00',	'True',	'LETUNITA',	'',	'EKOME',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1071,	'1880-09-28 00:00:00',	'True',	'ASIMWE',	'',	'BATSI',	'ELIANE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1072,	'2022-09-28 00:00:00',	'True',	'AMURI',	'',	'BIN-ABEDI',	'EBEN',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1073,	'1880-09-28 00:00:00',	'True',	'BALUME',	'',	'KATEO',	'JOSEPH',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1074,	'1880-09-28 00:00:00',	'True',	'MWILAMBWE',	'',	'KAKUDJI',	' PROVIDENCE',	'',	'',	'',	'',	'',	'BUNIA ',	'POLICE DE FRONTIERE',	'MALOBI KAKUDJI ET BATIBUKA\nTEL.0814374872, 0826250462',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1075,	'1880-09-28 00:00:00',	'True',	'MUHISA',	'',	'KATEMBO',	'ETHAN',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1076,	'1880-09-28 00:00:00',	'True',	'NSEYI',	'',	'MBAKI',	'PREFINA',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1080,	'1880-09-28 00:00:00',	'True',	'SHAMA',	'',	'KANSIME',	'ELIANA',	'',	'',	'',	'',	'',	'  ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1081,	'2022-01-01 00:00:00',	'True',	'MUMBESA',	'',	'KASEMIRE',	'GLOCHAR',	'',	'',	'',	'',	'',	' MONGBWALU',	' ',	' ',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1082,	'1880-09-28 00:00:00',	'True',	'MALI',	'',	'FURAHA',	'HAPPINESS',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1083,	'1880-09-28 00:00:00',	'True',	'KOMO',	'',	'KANYINDA',	' MAZAMBA',	'',	'',	'',	'',	'',	'',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1084,	'1880-09-28 00:00:00',	'True',	'KALETA',	'',	'KABEMBA',	'SYNTICHE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1085,	'1880-09-28 00:00:00',	'True',	'NGALULA',	'',	'ILUNGA',	'PROVIDENCE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1086,	'1880-09-28 00:00:00',	'True',	'MBOMBE',	'',	' ',	'BENEDICTE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1087,	'1880-09-28 00:00:00',	'True',	'BYARWANGA',	'',	'KAMESO',	'CARMELO',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1088,	'1880-09-28 00:00:00',	'True',	'MAMBELA',	'',	'NADY',	'MALCOM',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1089,	'1880-09-28 00:00:00',	'True',	'ANGAZA',	'',	'MUSHIKA',	'GAD',	'',	'',	'',	'',	'',	' ',	'',	'EMMANUEL ANGAZA ET ANNY MUSHIKA\nTEL.0813532658, 0823847770, 0998506664\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1090,	'1880-09-28 00:00:00',	'True',	'MAVE',	'',	'DRAJIMA',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1091,	'1880-09-28 00:00:00',	'True',	'JACK',	'',	'SAGWA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1092,	'2011-10-14 00:00:00',	'True',	'TAMBWE',	'',	'MALOBIA',	'MANASSE',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1094,	'2011-08-22 00:00:00',	'True',	'MANGAYANI',	'',	'HAMULI',	'IZABELLE',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1095,	'1880-09-28 00:00:00',	'True',	'BONGOMA',	'',	'BALEBOTI',	' MARTINE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1097,	'1880-09-28 00:00:00',	'True',	'APUMA',	'',	'BELENGO',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1098,	'1880-09-28 00:00:00',	'True',	'BYANZAMBI',	'',	'ILUNGA',	' ',	'',	'',	'',	'',	'',	' ',	'\n ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1099,	'2010-08-03 00:00:00',	'True',	'LUKANGA',	'',	'LOPEPE',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1100,	'2019-04-23 00:00:00',	'True',	'KIDIABANA',	'',	'KIABA',	'GAUTHIANA-PREMICES-J',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	2,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1102,	'1880-09-29 00:00:00',	'True',	'MWADI',	'',	'NGOY',	' VICTOIRE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1104,	'1880-09-29 00:00:00',	'True',	'BUSHIE',	'',	'HAMULI',	'GEORGINE',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1106,	'1880-09-29 00:00:00',	'True',	'MUHINDO',	'',	'KIRERE',	' ',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1107,	'2018-12-29 00:00:00',	'True',	'KAVUGHO',	'',	'SIWAKANYA',	' LELYA',	'',	'',	'',	'',	'',	' ',	' ',	' ',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1108,	'2002-04-15 00:00:00',	'True',	'OPISI',	'',	'EDYOA',	' ',	'',	'',	'',	'',	'',	'OFAA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1109,	'1880-04-03 00:00:00',	'True',	'BAKOBU',	'',	'LAKO',	'MIREILLE',	'',	'',	'',	'',	'',	'MONGBWALU',	'',	'',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1110,	'1989-05-17 00:00:00',	'True',	'KASIMBA',	'',	'LIMENGO',	'SOLANGE',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1111,	'1989-06-29 00:00:00',	'True',	'MUNGWANANGU ',	'',	'ANIKANDA',	'BENEDICTE',	'',	'',	'',	'',	'',	'LAYBO',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1112,	'1974-12-30 00:00:00',	'True',	'KITABOY',	'',	'KISSI',	'CHANTAL',	'',	'',	'',	'',	'',	'BAMBU',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1113,	'1985-11-04 00:00:00',	'True',	'ESPERANCE ',	'',	'MOVE',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1114,	'1991-12-14 00:00:00',	'True',	'KAVUGHO',	'',	'LUSASA',	'ANUARITE',	'',	'',	'',	'',	'',	'OICHA',	'',	'',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1115,	'1999-02-16 00:00:00',	'True',	'BERIU',	'',	'MWAMBE',	'SARAH',	'',	'',	'',	'',	'',	'LODJO',	'',	'',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1116,	'1999-11-25 00:00:00',	'True',	'LOVE',	'',	'LATIWA',	'FABIENNE',	'',	'',	'',	'',	'',	'WATSA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'False'),
(1117,	'2000-11-26 00:00:00',	'True',	'KELEKINA',	'',	'NDJABU',	'GRATIANA',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1120,	'1880-10-01 00:00:00',	'True',	'NEEMA',	'',	'KAZII',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1121,	'1880-10-01 00:00:00',	'True',	'MASIKA',	'',	'MUKANDIRWA',	'JUDITH',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1122,	'1880-10-01 00:00:00',	'True',	'KASEREKA',	'',	'TSONGO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1123,	'2022-10-01 00:00:00',	'True',	'DEMA',	'',	'NGODJA',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1124,	'1880-10-01 00:00:00',	'True',	'KABANGA',	'',	'DJULIA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1125,	'1880-10-01 00:00:00',	'True',	'KATUNGU',	'',	'SHABIHANGO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1126,	'2022-10-01 00:00:00',	'True',	'KANDAYO ',	'',	'KITUDRI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1127,	'1880-10-01 00:00:00',	'True',	'NDUNGA',	'',	'PELENGO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1128,	'2022-10-29 00:00:00',	'True',	'KAHINDO',	'',	'SIVIHWA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1129,	'1880-10-01 00:00:00',	'True',	'MUGISA',	'',	'KYALINGONZI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1130,	'1880-10-01 00:00:00',	'True',	'KAWAYA',	'',	'EDMOND',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1131,	'1880-10-01 00:00:00',	'True',	'AMANI',	'',	'KAWETE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1132,	'1880-10-01 00:00:00',	'True',	'KITETE',	'',	'OMEONGA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1134,	'1880-10-01 00:00:00',	'True',	'LUBUNDU',	'',	'SARAH',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1135,	'1880-10-01 00:00:00',	'True',	'KAMA',	'',	'ANNIE',	'  ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1136,	'1880-10-01 00:00:00',	'True',	'NEEMA',	'',	'KAZIYE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1137,	'2022-10-01 00:00:00',	'True',	'PALUKU',	'',	'NYONDO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1138,	'1880-10-01 00:00:00',	'True',	'KWEKINAYI',	'',	'GRACE',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1139,	'2022-10-01 00:00:00',	'True',	'MUHANI ',	'',	'MUNAVA',	' ',	'',	'',	'',	'',	'',	'  ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1140,	'1880-10-01 00:00:00',	'True',	'NGALUMA',	'',	'YAMALA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1141,	'1880-10-01 00:00:00',	'True',	'TINDADRA',	'',	'IMANI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1142,	'1880-10-01 00:00:00',	'True',	'NAOMIE',	'',	'KALONGO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1143,	'1880-10-01 00:00:00',	'True',	'BITHUM ',	'',	'UZELE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1144,	'1880-10-01 00:00:00',	'True',	'LINDJANDJA',	'',	'BOSAESAE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1145,	'1880-10-01 00:00:00',	'True',	'BULONZA',	'',	'BACIGALE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1146,	'2022-10-01 00:00:00',	'True',	'KABEZYA',	'',	'SHINDANO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1147,	'1880-10-01 00:00:00',	'True',	'MAVE',	'',	'LIKANA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1148,	'1880-10-01 00:00:00',	'True',	'MOKIMOMBONGO',	'',	'LIHANDA',	'RACHIDI',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1149,	'1880-10-01 00:00:00',	'True',	'MAVE',	'',	'LONESI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1150,	'2022-10-01 00:00:00',	'True',	'BASAI',	'',	'BATENDE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1151,	'1880-10-01 00:00:00',	'True',	'TSHAMBELEUME',	'',	'MACHANDE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1152,	'1880-10-01 00:00:00',	'True',	'SHINDANO',	'',	'MUNOSA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1153,	'2022-10-01 00:00:00',	'True',	'MUHINDO',	'',	'MUMAVA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1154,	'1880-10-01 00:00:00',	'True',	'OKAUME',	'',	'BESHILI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1155,	'1880-10-01 00:00:00',	'True',	'BOTONGE',	'',	'KABATONGO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1156,	'1880-10-01 00:00:00',	'True',	'KASEREKA',	'',	'MUHONGYA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1157,	'1880-10-01 00:00:00',	'True',	'BARAKA',	'',	'LUHAVO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1158,	'1880-10-01 00:00:00',	'True',	'MULIMBI',	'',	'MOLA',	'KASONGO',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1159,	'1880-10-01 00:00:00',	'True',	'KAMBALI',	'',	'KIMBABO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1160,	'2022-10-01 00:00:00',	'True',	'KAVIRA',	'',	'YONGEZI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1161,	'1880-10-01 00:00:00',	'True',	'HEKIMA',	'',	'MUSAFIRI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1162,	'2022-10-01 00:00:00',	'True',	'MBISA',	'',	'OKAUME',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1163,	'1880-10-01 00:00:00',	'True',	'NEGBE',	'',	'BATEYA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1164,	'2022-10-01 00:00:00',	'True',	'KASEREKA',	'',	'KASISI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1165,	'1880-10-01 00:00:00',	'True',	'BACISEZE',	'',	'NTABOBA',	'  ',	'',	'',	'',	'',	'',	'  ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1166,	'1880-10-01 00:00:00',	'True',	'LAKURA',	'',	'MAFU',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1168,	'1880-10-01 00:00:00',	'True',	'NZUKO',	'',	'KAGHOMA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1169,	'1880-10-01 00:00:00',	'True',	'MYEMBO',	'',	'LUBWIKA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1170,	'1880-10-01 00:00:00',	'True',	'BOTUNGAKA',	'',	'BOSAESAE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1171,	'1880-10-01 00:00:00',	'True',	'ACHEMA',	'',	'KASENDE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1172,	'1880-10-01 00:00:00',	'True',	'ABEDI',	'',	'ARADJABU',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1173,	'1880-10-01 00:00:00',	'True',	'DAVID',	'',	'SHISHA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1174,	'1880-10-01 00:00:00',	'True',	'WEMBO',	'',	'NGENDO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1176,	'1880-07-20 00:00:00',	'True',	'BASAY',	'',	'BATENDE',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1177,	'1880-10-01 00:00:00',	'True',	'BONGILO',	'',	'SUMBA',	'JOELLE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1178,	'1880-10-01 00:00:00',	'True',	'KEREN',	'',	'TSHUMBIRA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1179,	'1880-10-01 00:00:00',	'True',	'BASEME',	'',	'KAMATE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1180,	'1880-10-01 00:00:00',	'True',	'MBOKO',	'',	'DAVID',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1181,	'1880-10-01 00:00:00',	'True',	'KETYA',	'',	'TSHUMBIRA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1182,	'2022-10-01 00:00:00',	'True',	'NDWENGA',	'',	'ABIBANGE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1183,	'1880-10-01 00:00:00',	'True',	'MOLIMA',	'',	'EGBENDE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1184,	'1880-10-01 00:00:00',	'True',	'MOLIMA',	'',	'MOSEKA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1185,	'1880-10-01 00:00:00',	'True',	'WEMBO',	'',	'ODIMBA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1187,	'2022-10-02 00:00:00',	'True',	'LAREINE',	'',	'OKAUME',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1188,	'1880-10-03 00:00:00',	'True',	'PALUKU',	'',	'MUSIKI',	' JASON',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1190,	'1880-10-04 00:00:00',	'True',	'ABAPE',	'',	' GENEGBATA',	'CHRISTELLE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1191,	'1880-10-05 00:00:00',	'True',	'LUBUNDU',	'',	'MAYONGO',	'SARAH',	'',	'',	'',	'',	'',	'  ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'False'),
(1192,	'1880-10-05 00:00:00',	'True',	'AJOMBI',	'',	'PIMBANI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1193,	'1880-10-05 00:00:00',	'True',	'MAVE ',	'',	'DRASI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1194,	'1880-10-05 00:00:00',	'True',	'FUMAMBALI',	'',	'LEBILYABO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1195,	'1880-10-06 00:00:00',	'True',	'NSEYA',	'',	'TAKILA',	' BENICIEL',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1196,	'1880-10-06 00:00:00',	'True',	'ATAYO',	'',	'TATI',	'FRANCINE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1197,	'1880-10-06 00:00:00',	'True',	'BANGAJUMA',	'',	'MUSANZI',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1198,	'1880-10-06 00:00:00',	'True',	'MUKENDI',	'',	'MBULAYI',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1199,	'1880-10-04 00:00:00',	'True',	'KONGOLO ',	'',	'BASIMIKA',	'BRAYANE',	'',	'',	'',	'',	'',	' ',	'QUARTIER HOHO; SUKISA II',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1201,	'1880-10-07 00:00:00',	'True',	'BASEMBANJA',	'',	'BUKUMU',	'JOSEPHINE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1202,	'2022-10-07 00:00:00',	'True',	'MAKENGO',	'',	'ELANGA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1203,	'1880-10-07 00:00:00',	'True',	'ETSONI',	'',	'ABE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1204,	'2022-10-07 00:00:00',	'True',	'BARAKA',	'',	'DRABU ',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1205,	'1880-10-07 00:00:00',	'False',	'OLENJA',	'',	'ESEA',	'  ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'False'),
(1206,	'2019-12-05 00:00:00',	'True',	'ANZALUMONO',	'',	'BABAJA',	'TRIOMPHE',	'',	'',	'',	'',	'',	'KISANGANI',	'Q.YAMBI YAYA/AV.SALAMA',	'BANAMUSONGA ET ETOTI EKENDAKA\nTEL.0823766253',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1208,	'1880-10-09 00:00:00',	'True',	'KASOKI',	'',	'SIWAKANYA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	2,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1209,	'2022-10-10 00:00:00',	'True',	'KALYANZU',	'',	'MASTAKI',	'GEFTE',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1210,	'1800-10-10 00:00:00',	'True',	'TAYAYE ',	'',	'EMMANUALA',	' REDA',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1211,	'2011-11-20 00:00:00',	'True',	'SALUMU',	'',	'VAVALA',	'MOISE',	'',	'',	'',	'',	'',	'KINSHASA',	'QUARTIER HOHO;\nPOLICE DE FRONTIERE',	'TEL : 0998606478\n          0824375616',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1212,	'1880-10-11 00:00:00',	'True',	'AFOYO',	'',	'LERO',	'MERVEILLE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1213,	'1880-10-11 00:00:00',	'True',	'KASONGO',	'',	'KASEBA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1214,	'1880-10-11 00:00:00',	'True',	'SITA ',	'',	'ALFANI ',	'EUGENIE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1215,	'1880-10-11 00:00:00',	'True',	'MADITUKA',	'',	'BIFINYOLE',	'EMMANUEL',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1216,	'1880-10-11 00:00:00',	'True',	'MWENYEMALI',	'',	'SHWEKA',	'  ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1217,	'2020-06-03 00:00:00',	'True',	'MUMBERE',	'',	' KABAKI',	'CHARLY',	'',	'',	'',	'',	'',	'BUTEMBO',	'Q SUKISA 2',	'PERE  KASEREKA KASONDOLI   0811755462   MERE KAVIRA MAGNIFIQUE  0997327130',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1218,	'1880-10-13 00:00:00',	'True',	'ASMAHAN',	'',	'KANSIME',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1219,	'1880-10-13 00:00:00',	'True',	'AMBOKO',	'',	'NAPO',	' JUNIOR',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1220,	'1880-10-13 00:00:00',	'True',	'KASEREKA ',	'',	'KAMUTSERE',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1221,	'1880-10-14 00:00:00',	'True',	'NZOKO',	'',	'NDUNGU',	'DEBORAH',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1222,	'1880-10-14 00:00:00',	'True',	'ROSY',	'',	'MWISA',	'PHILEMON',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'False'),
(1223,	'1880-10-15 00:00:00',	'True',	'LUKANGA',	'',	'NYEMENGA',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1224,	'1880-10-15 00:00:00',	'True',	'JEDIDA',	'',	'MAHENGA',	'NAOMIE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1225,	'1880-10-15 00:00:00',	'True',	'MWAMBA',	'',	'NZAMBI',	'ALLEGRESSE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1226,	'2022-10-17 00:00:00',	'True',	'JEROME',	'',	'BOMBETO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'False'),
(1227,	'2022-10-17 00:00:00',	'True',	'BENEDICTE',	'',	'BOMBETO',	' ',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1228,	'2022-10-17 00:00:00',	'True',	'KAVIRA',	'',	'LUVIVI',	' ESPERANCE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1229,	'2022-10-25 00:00:00',	'True',	'LANGALANGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1230,	'2022-10-25 00:00:00',	'True',	'FAMILLE MUTEBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1231,	'2022-10-26 00:00:00',	'True',	'FAMILLE BOLEKALEKA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1232,	'2022-10-26 00:00:00',	'True',	'FAMILLE KITABOY KISSI CHANTAL',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1233,	'2022-10-26 00:00:00',	'True',	'FAMILLE SANDRA ZANTIYL',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1234,	'2022-10-26 00:00:00',	'True',	'FAMILLE KAHAMBU ONIQUE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1235,	'2022-10-26 00:00:00',	'True',	'FAMILLE BOTOWAMUNGU CLARICE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1236,	'2022-10-26 00:00:00',	'True',	'FAMILLE NDENI JEAN CLAUDE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1237,	'2022-10-26 00:00:00',	'True',	'FAMILLE KAMBALE MUSAVULI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1238,	'2022-10-26 00:00:00',	'True',	'FAMILLE AMANI BATONDO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1239,	'2022-10-26 00:00:00',	'True',	'FAMILLE ESPERANCE MOVE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1240,	'2022-10-26 00:00:00',	'True',	'ESPERANCE MAVE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1241,	'2022-10-26 00:00:00',	'True',	'KOMUGISA',	'',	'AKIKI',	'CHRISTINE',	'',	'',	'',	'',	'',	' ',	'',	'',	1,	5,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1242,	'2022-10-27 00:00:00',	'True',	'LOUIS KALEMBEKO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1243,	'2022-10-27 00:00:00',	'True',	'KAVUGHO LUSASA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1244,	'2022-10-16 00:00:00',	'True',	'GUDURA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1245,	'2022-10-27 00:00:00',	'True',	'VICTOIRE BOTIMA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1246,	'2022-10-16 00:00:00',	'True',	'FAMILLE ALO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1247,	'2022-10-27 00:00:00',	'True',	'BARAKA VAGHENI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1248,	'2022-10-27 00:00:00',	'True',	'FAMILLE VADZA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1249,	'2022-10-27 00:00:00',	'True',	'FAMILLE BEDIKERE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1250,	'2022-10-27 00:00:00',	'True',	'FAMILLE MUNDUMBI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1251,	'2022-10-27 00:00:00',	'True',	'AGISHA BULO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1252,	'2022-10-27 00:00:00',	'True',	'JEAN DE DIEU WAYKE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1253,	'2022-10-27 00:00:00',	'True',	'FAMILLE SHAI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1254,	'2022-10-27 00:00:00',	'True',	'MOIKIMA JEEF',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1255,	'2022-10-27 00:00:00',	'True',	'LUSSI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1256,	'2022-10-27 00:00:00',	'True',	'UPENTO MAKI MICHEL',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	3,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1257,	'2022-10-27 00:00:00',	'True',	'FAMILLE PIRWOTH',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1258,	'2022-10-27 00:00:00',	'False',	'BANDILISI MUZEMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1259,	'2022-10-27 00:00:00',	'True',	'KATSHUNGA MUNGUFENI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1260,	'2022-10-27 00:00:00',	'True',	'FAMILLE KALEMBE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1261,	'2022-10-27 00:00:00',	'True',	'FAMILLE NTIRU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1262,	'2022-10-16 00:00:00',	'True',	'SIRILE KOMBI KABASHA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1263,	'2022-10-27 00:00:00',	'True',	'BANDILISI MUZEMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1264,	'2022-10-27 00:00:00',	'True',	'FAMILLE SIFA MUTCHAPA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1265,	'2022-10-27 00:00:00',	'True',	'FAMILLE BULO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1266,	'2022-10-27 00:00:00',	'True',	'KATEMBO KAMBINO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1267,	'2022-10-16 00:00:00',	'True',	'NSIMIRE NYINYIZI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1268,	'2022-10-27 00:00:00',	'True',	'KASEREKA MUSAVULI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1269,	'2022-10-16 00:00:00',	'True',	'KASONGO ELAMAJI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1270,	'2022-10-27 00:00:00',	'True',	'AMISI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1271,	'2022-10-27 00:00:00',	'True',	'METALOR WAY JACOB',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1272,	'2022-10-16 00:00:00',	'True',	'FAMILLE BOZENE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1273,	'2022-10-27 00:00:00',	'True',	'FAMILLE MAMUR',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1274,	'2022-10-16 00:00:00',	'True',	'SALAMA KAHUSA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1275,	'2022-10-27 00:00:00',	'True',	'SALUMU RIZIKI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1276,	'2022-10-27 00:00:00',	'True',	'CIGOHA DJOEN',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1277,	'2022-10-27 00:00:00',	'True',	'FAMILLE KAMBALE COSMAS',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1278,	'2022-10-27 00:00:00',	'True',	'FAMILLE ',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1279,	'2022-10-27 00:00:00',	'True',	'FAMILLE KOMGBO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1280,	'2022-10-27 00:00:00',	'True',	'BYARWANGA KAMESO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1281,	'2022-10-27 00:00:00',	'True',	'FAMILLE MARUKO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1282,	'2022-10-27 00:00:00',	'True',	'BANAMUSONGA BABAJA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1283,	'2022-10-27 00:00:00',	'True',	'MUSINGUZI ET KANSIME RYABONE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1284,	'2022-10-27 00:00:00',	'True',	'MUKENDI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1285,	'2022-10-27 00:00:00',	'True',	'FAMILLE MOLISHO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1286,	'2022-10-27 00:00:00',	'True',	'MAMPUYA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1287,	'2022-10-27 00:00:00',	'True',	'FAMILLE MUYALI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1288,	'2022-10-27 00:00:00',	'True',	'FAMILLE LAKURA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1289,	'2022-10-27 00:00:00',	'True',	'FAMILLE MICHAN',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1290,	'2022-10-27 00:00:00',	'True',	'KAPINGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1291,	'2022-10-27 00:00:00',	'True',	'GIRAMIYA BERO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1292,	'2022-10-27 00:00:00',	'True',	'FAMILLE IMBAY',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1293,	'2022-10-27 00:00:00',	'True',	'NTUMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	' BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1294,	'2022-10-27 00:00:00',	'True',	'FAMILLE BASOLE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1295,	'2022-10-27 00:00:00',	'True',	'FAMILLE MAHAMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1296,	'2022-10-27 00:00:00',	'True',	'BAZAPA JULYA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1297,	'2022-10-27 00:00:00',	'True',	'MUKENDI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1298,	'2022-10-27 00:00:00',	'True',	'FAMILLE OLILA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1299,	'2022-10-27 00:00:00',	'True',	'AFOYORWOTH LOMIMA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1300,	'2022-10-27 00:00:00',	'True',	'AOZE AZATO CHRISTIANA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1301,	'2022-10-27 00:00:00',	'True',	'NIKULU KISEMBO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1302,	'2022-10-27 00:00:00',	'True',	'MASIKA KYAVUGHA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1303,	'2022-10-27 00:00:00',	'True',	'FAMILLE BAINGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1304,	'2022-10-27 00:00:00',	'True',	'NGUVI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1305,	'2022-10-27 00:00:00',	'True',	'FAMILLE NVOCI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1306,	'2022-10-27 00:00:00',	'True',	'ESIMILI LATURA KENDA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1307,	'2022-10-27 00:00:00',	'True',	'BUTU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1308,	'2017-01-28 00:00:00',	'True',	'APUMA',	'',	'HELENE',	'DANIELLA',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1309,	'2022-10-27 00:00:00',	'True',	'TSUNDE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1310,	'2022-10-27 00:00:00',	'True',	'FAMILLE OMBALA VICTORINE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1311,	'2022-10-27 00:00:00',	'True',	'NZANZU MUHASA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1312,	'2022-10-27 00:00:00',	'True',	'BUKASA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1313,	'2022-10-27 00:00:00',	'True',	'FAMILLE UVONA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1314,	'2022-10-27 00:00:00',	'True',	'MARUNGA ROMA ESTHER',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1315,	'2022-10-27 00:00:00',	'True',	'FAMILLE BASOLE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1316,	'2022-10-27 00:00:00',	'True',	'ISENGE SIVIHWA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1317,	'2022-10-27 00:00:00',	'True',	'SANGANYA',	'',	'',	'',	'',	'',	'',	'',	'0',	'UNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1318,	'2022-10-27 00:00:00',	'True',	'MUMBERE SIVIHWE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1319,	'2022-10-27 00:00:00',	'True',	'CISHIBANJI ',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1320,	'2022-10-27 00:00:00',	'True',	'ZALO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	107,	1,	0,	'',	'False',	0,	'False',	'True'),
(1321,	'2022-10-27 00:00:00',	'True',	'TSHITEGETE ELONGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1322,	'2022-10-27 00:00:00',	'True',	'KAHIMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1323,	'2022-10-27 00:00:00',	'True',	'ZALO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIQ',	'',	'',	4,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1324,	'2022-10-27 00:00:00',	'True',	'KANSEMIRE BATSI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1325,	'2022-10-27 00:00:00',	'True',	'FOLO MOKA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1326,	'2022-10-27 00:00:00',	'True',	'PALUKU MUSIKI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1327,	'2022-10-27 00:00:00',	'True',	'MADIBA TABANI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1328,	'2022-10-27 00:00:00',	'True',	'FAMILLE KATOBE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1329,	'2022-10-27 00:00:00',	'True',	'KALEMBO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1330,	'2022-10-27 00:00:00',	'True',	'FAMILLE MANZELA KENDA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1331,	'2022-10-27 00:00:00',	'True',	'FAMILLE ZOLA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1332,	'2022-10-27 00:00:00',	'True',	'KIVUNGANYI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1333,	'2022-10-27 00:00:00',	'True',	'FAMILLE NZANZA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1334,	'2022-10-27 00:00:00',	'True',	'KABUNGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1335,	'2022-10-27 00:00:00',	'True',	'FAMILLE TAYAYE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1336,	'2022-10-27 00:00:00',	'True',	'PALUKU ZALABO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1337,	'2022-10-27 00:00:00',	'True',	'FAMILLE SAIDI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1338,	'2022-10-27 00:00:00',	'True',	'AKITAMUNGU ET BEZIMUNGU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1339,	'2022-10-27 00:00:00',	'True',	'FAMILLE ALITASIA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1340,	'2022-10-27 00:00:00',	'True',	'NEHEMI MATHE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1341,	'2022-10-27 00:00:00',	'True',	'VIVUYA KIVATHERA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1342,	'2022-10-27 00:00:00',	'True',	'NKUNDA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1343,	'2022-10-27 00:00:00',	'True',	'GAUTHIANA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1344,	'2022-10-27 00:00:00',	'True',	'ABDALAM PENEBAKA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1345,	'2022-10-27 00:00:00',	'True',	'FAMILLE ALITASIA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1346,	'2022-10-27 00:00:00',	'True',	'KASONGO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1347,	'2022-10-27 00:00:00',	'True',	'KAVUGHO MASIVI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1348,	'2022-10-27 00:00:00',	'True',	'KAVIRA MATHE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1349,	'2022-10-27 00:00:00',	'True',	'ANGAZA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1350,	'2022-10-27 00:00:00',	'True',	'OMBOLA VICTORINE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1351,	'2022-10-27 00:00:00',	'True',	'KAVUGHO MASIVI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1352,	'2022-10-27 00:00:00',	'True',	'ABEDI RWOTHE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1353,	'2022-10-27 00:00:00',	'True',	'FAMILLE KANGI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1354,	'2022-10-27 00:00:00',	'True',	'FAMILLE SHWEKA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1355,	'2022-10-27 00:00:00',	'True',	'KAVUGHO MULAHO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1356,	'2022-10-27 00:00:00',	'True',	'AFOYO BADIDJO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1357,	'2022-10-27 00:00:00',	'True',	'NZANZU MAPOLI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1358,	'2022-10-27 00:00:00',	'True',	'BAHATI MULIMBI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1359,	'2022-10-27 00:00:00',	'True',	'FAMILLE LUVIVI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1360,	'2022-10-27 00:00:00',	'True',	'FAMILLE KANYINDA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1361,	'2022-10-27 00:00:00',	'True',	'FAMILLE MATHE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1362,	'2022-10-27 00:00:00',	'True',	'FAMILLE MUSAFIRI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1363,	'2022-10-27 00:00:00',	'True',	'TUSIME LOLE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1364,	'2022-10-27 00:00:00',	'True',	'FAMILLE TAMBWE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1365,	'2022-10-27 00:00:00',	'True',	'KAVUGHO MASIVI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1366,	'2022-10-27 00:00:00',	'True',	'ODETTE BOSSA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1367,	'2022-10-27 00:00:00',	'True',	'MPUTU OFITOM',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1368,	'2022-10-27 00:00:00',	'True',	'AYIYO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1369,	'2022-10-27 00:00:00',	'True',	'FAMILLE KISULU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1370,	'2022-10-27 00:00:00',	'True',	'SENG',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1371,	'2022-10-27 00:00:00',	'True',	'FAMILLE MABAKA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1372,	'2022-10-27 00:00:00',	'True',	'FAMILLE MASUDI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1373,	'2022-10-27 00:00:00',	'True',	'ALIFI MBAMBE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1374,	'2022-10-27 00:00:00',	'True',	'FAMILLE ANGAZA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1375,	'2022-10-27 00:00:00',	'True',	'LUTUNGULA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1376,	'2022-10-27 00:00:00',	'True',	'MADIBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1377,	'2022-10-27 00:00:00',	'True',	'AVDRNY MUGAVU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1378,	'2022-10-27 00:00:00',	'True',	'FAMILLE LATUTA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1379,	'2022-10-27 00:00:00',	'True',	'FAMILLE ILUNGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1380,	'2022-10-27 00:00:00',	'True',	'BOSEMO KASONGO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1381,	'2022-10-27 00:00:00',	'True',	'NITIMA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1382,	'2022-10-27 00:00:00',	'True',	'FAMILLE MAVE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1383,	'2022-10-27 00:00:00',	'True',	'NGUZUMA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1384,	'2022-10-27 00:00:00',	'True',	'FAMILLE EYENGOLA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1385,	'2022-10-27 00:00:00',	'True',	'FAMILLE LIPO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1386,	'2022-10-27 00:00:00',	'True',	'FAMILLE SAMUEL',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1387,	'2022-10-27 00:00:00',	'True',	'BANDILISI MULEBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1388,	'2022-10-27 00:00:00',	'True',	'FAMILLE BAKE MWANGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1389,	'2022-10-27 00:00:00',	'True',	'ATENO MUNDAMBO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1390,	'2022-10-27 00:00:00',	'True',	'KALOMBO MEDJI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1391,	'2022-10-27 00:00:00',	'True',	'KATEMBO KAMBINO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1392,	'2022-10-27 00:00:00',	'True',	'FAMILLE SAFARI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1393,	'2022-10-27 00:00:00',	'True',	'SONGOLI BAHENGENGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1394,	'2022-10-27 00:00:00',	'True',	'FAMILLE KASONGO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1395,	'2022-10-27 00:00:00',	'True',	'FAMILLE KASONGO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1396,	'2022-10-27 00:00:00',	'True',	'ROGAROGA BALEJA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1397,	'2022-10-27 00:00:00',	'True',	'CIGOHA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1398,	'2022-10-27 00:00:00',	'True',	'MAKENGO ELANGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1399,	'2022-10-27 00:00:00',	'True',	'UTAJIRI RWAMO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1400,	'2022-10-27 00:00:00',	'True',	'FAMILLE KYAVU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1401,	'2022-10-27 00:00:00',	'True',	'UYUMU RWOTH DJALUM',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1402,	'2022-10-27 00:00:00',	'True',	'FAMILLE DRAMANI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1403,	'2022-10-27 00:00:00',	'True',	'VAWEKA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1404,	'2022-10-27 00:00:00',	'True',	'KONDONGA EUPRAHIM',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1405,	'2022-10-27 00:00:00',	'True',	'FAMILLE MBIDJO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1406,	'2022-10-27 00:00:00',	'True',	'KASEREKA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1407,	'2022-10-27 00:00:00',	'True',	'FAMILLE TAMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1408,	'2022-10-27 00:00:00',	'True',	'KAKULE  KAKURUSI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1409,	'2022-10-27 00:00:00',	'True',	'FAMILLE KABISABO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1410,	'2022-10-27 00:00:00',	'True',	'WICUCUMA AKYAMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1411,	'2022-10-27 00:00:00',	'True',	'MAPITAYI SADY',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1412,	'2022-10-27 00:00:00',	'True',	'MUKANDIWA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1413,	'2022-10-27 00:00:00',	'True',	'ASIMWE ET KASEMIRE BATSI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1414,	'2022-10-27 00:00:00',	'True',	'ABE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1415,	'2022-10-28 00:00:00',	'True',	'FAMILLE MUNDAMBO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1416,	'2022-10-28 00:00:00',	'True',	'FAMILLE DIPO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1417,	'2022-10-28 00:00:00',	'True',	'FAMILLE LAKURA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1418,	'2022-10-28 00:00:00',	'True',	'FAMILLE EDHOBO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1419,	'2022-10-28 00:00:00',	'True',	'DRAMANI KOPE EPHRAHIM',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1420,	'2022-10-28 00:00:00',	'True',	'FAMILLE AGUMA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1421,	'2022-10-28 00:00:00',	'True',	'FAMILLE MBIDJO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1422,	'2022-10-28 00:00:00',	'True',	'KAVIRA MBAFUMOJA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1423,	'2022-10-28 00:00:00',	'True',	'FAIDA N’SINDI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1424,	'2022-10-28 00:00:00',	'True',	'WICUCUMA AKYAMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1425,	'2022-10-28 00:00:00',	'True',	'FAMILLE FURABO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1426,	'2022-10-28 00:00:00',	'True',	'EVE MEDIATRICE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1427,	'2022-10-28 00:00:00',	'True',	'BAMOITO NKASIME',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1428,	'2022-10-28 00:00:00',	'True',	'BASEBANJA BUKASA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1429,	'2022-10-17 00:00:00',	'True',	'WICUCU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1430,	'2022-10-17 00:00:00',	'True',	'MUMBERE MATSHIPA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1431,	'2022-10-28 00:00:00',	'True',	'MARAVU KAGABA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1432,	'2022-10-28 00:00:00',	'True',	'VICTOIRE FUMAMBALI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1433,	'2022-10-28 00:00:00',	'True',	'FAMILLE THASI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1434,	'2022-10-28 00:00:00',	'True',	'ABAPE CHRISTELLE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1435,	'2022-10-28 00:00:00',	'True',	'CHICHIBANGU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1436,	'2022-10-28 00:00:00',	'True',	'FAMILLE ALFANI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1437,	'2022-10-28 00:00:00',	'True',	'ASIMWE BAHATI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1438,	'2022-10-28 00:00:00',	'True',	'BONGILO SUMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1439,	'2022-10-28 00:00:00',	'True',	'MUHUMBULA ',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1440,	'2022-10-28 00:00:00',	'True',	'TAMIPPE BUSHEMULA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1441,	'2022-10-28 00:00:00',	'True',	'MUHASU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1442,	'2022-10-28 00:00:00',	'True',	'ELIANE ASIMWE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1443,	'2022-10-28 00:00:00',	'True',	'ELIANEN ASIMWE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1444,	'2022-10-28 00:00:00',	'True',	'MOMPINDI AGWE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1445,	'2022-10-28 00:00:00',	'True',	'IKATI MAMBE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1446,	'2022-10-28 00:00:00',	'True',	'MUZUNGU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1447,	'2022-10-28 00:00:00',	'True',	'MUZIKALE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1448,	'2022-10-28 00:00:00',	'True',	'VEINARD MAMBWENE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1449,	'2022-10-28 00:00:00',	'True',	'BASHANGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1450,	'2022-10-28 00:00:00',	'True',	'MBASE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1451,	'2022-10-28 00:00:00',	'True',	'MADIGAKA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1452,	'2022-10-28 00:00:00',	'True',	'MARINOS',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1453,	'2022-10-28 00:00:00',	'True',	'MATANDIKO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1454,	'2022-10-28 00:00:00',	'True',	'DYOBHO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1455,	'2022-10-28 00:00:00',	'True',	'MUHEMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1456,	'2022-10-28 00:00:00',	'True',	'KAGAWA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1457,	'2022-10-28 00:00:00',	'True',	'FAMILLE SHINDANO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	50,	1,	0,	'',	'False',	0,	'False',	'True'),
(1458,	'2022-10-28 00:00:00',	'True',	'MUKINESO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1459,	'2022-10-28 00:00:00',	'True',	'ITOKO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1460,	'2022-10-28 00:00:00',	'True',	'MAKANA LUCK',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1461,	'2022-10-28 00:00:00',	'True',	'PROMOTRICE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1462,	'2022-10-28 00:00:00',	'True',	'FAMILLE MUHAVUKI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1463,	'2022-10-28 00:00:00',	'True',	'AMUNDARA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1464,	'2022-10-28 00:00:00',	'True',	'SADY',	'',	'',	'',	'',	'',	'',	'',	'0',	' BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1465,	'2022-10-28 00:00:00',	'True',	'BINBWASHI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1466,	'2022-10-28 00:00:00',	'True',	'FAMILLE MUHAVUKI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1467,	'2022-10-28 00:00:00',	'True',	'BEDIDJO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1468,	'2022-10-28 00:00:00',	'True',	'KAHINDO SHAKOLERA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1469,	'2022-10-28 00:00:00',	'True',	'DAUDA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1470,	'2022-10-28 00:00:00',	'True',	'FAMILLE MATA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1471,	'2022-10-28 00:00:00',	'True',	'BUMBETO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1472,	'2022-10-28 00:00:00',	'True',	'NZAKUE SEFU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1473,	'2022-10-28 00:00:00',	'True',	'MUSARA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1474,	'2022-10-28 00:00:00',	'True',	'ABUMA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1475,	'2022-10-28 00:00:00',	'True',	'NGONZIKALE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1476,	'2022-10-28 00:00:00',	'True',	'DHOBO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1477,	'2022-10-28 00:00:00',	'True',	'KADEMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1478,	'2022-10-28 00:00:00',	'True',	'KAGHUSA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1479,	'2022-10-28 00:00:00',	'True',	'FAMILLE NKISA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1480,	'2022-10-28 00:00:00',	'True',	'AMULI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1481,	'2022-10-28 00:00:00',	'True',	'GBONGO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA ',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1482,	'2022-10-28 00:00:00',	'True',	'FAMILLE MAFUKO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1483,	'2022-10-28 00:00:00',	'True',	'BANDOMBE BAHATI ET NETANYA AKYEMANE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1484,	'2022-10-28 00:00:00',	'True',	'KAHINDO MATHE ET MUMBERE MATHE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1485,	'2022-10-28 00:00:00',	'True',	'FAMILLE NYUNYU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1486,	'2022-10-28 00:00:00',	'True',	'MIRINDI BOLAMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1487,	'2022-10-28 00:00:00',	'True',	'FAMILLE NKANDA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1488,	'2022-10-28 00:00:00',	'True',	'CANPITAINI',	'',	'',	'',	'',	'',	'',	'',	'0',	' BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1489,	'2022-10-28 00:00:00',	'True',	'KONGOLO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1490,	'2022-10-17 00:00:00',	'True',	'ZAWADI KANDAPE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1491,	'2022-10-28 00:00:00',	'True',	'MALERA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1492,	'2022-10-28 00:00:00',	'True',	'FAMILLE ABDALAH',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1493,	'2022-10-28 00:00:00',	'True',	'PACAR',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1494,	'2022-10-17 00:00:00',	'True',	'GLADIS NZENZE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1495,	'2022-10-28 00:00:00',	'True',	'ELONGA MONGO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1496,	'2022-10-28 00:00:00',	'True',	'TAGIRABO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1497,	'2022-10-28 00:00:00',	'True',	'FAMILLE LUVIVI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1498,	'2022-10-17 00:00:00',	'True',	'FAMILLE KYAMAKYA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1499,	'2022-10-28 00:00:00',	'True',	'KABAKI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1500,	'2022-10-17 00:00:00',	'True',	'FAMILLE BALONGE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1501,	'2022-10-17 00:00:00',	'True',	'FAMILLE BAHATI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1502,	'2022-10-28 00:00:00',	'True',	'FAMILLE BATENDE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1503,	'2022-10-17 00:00:00',	'True',	'FAMILLE KATEMBO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1504,	'2022-10-28 00:00:00',	'True',	'MBEMBA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1505,	'2022-10-17 00:00:00',	'True',	'KAKULE ISUMU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1506,	'2022-10-28 00:00:00',	'True',	'VISIKA VIVUYA ',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1507,	'2022-10-17 00:00:00',	'True',	'FAMILLE MAWA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1508,	'2022-10-28 00:00:00',	'True',	'FAMILLE AMULI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1509,	'2022-10-17 00:00:00',	'True',	'LUBINDA TSHIKUDI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1510,	'2022-10-28 00:00:00',	'True',	'MUSISI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1511,	'2022-10-17 00:00:00',	'True',	'FAMILLE MULAHU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1512,	'2022-10-28 00:00:00',	'True',	'DRAMANI SHALO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1513,	'2022-10-17 00:00:00',	'True',	'FAMILLE RUHIGWA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1514,	'2022-10-28 00:00:00',	'True',	'PAKIS KIZUNZA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1515,	'2022-10-28 00:00:00',	'True',	'KAHETO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1516,	'2022-10-28 00:00:00',	'True',	'NZULO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1517,	'2022-10-28 00:00:00',	'True',	'MUNDAMBO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1518,	'2022-10-28 00:00:00',	'True',	'FAMILLE ABUBAKAR',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1519,	'2022-10-28 00:00:00',	'True',	'FAMILLE ABUBAKAR',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1520,	'2022-10-28 00:00:00',	'True',	'MASIKA PALUKU',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1521,	'2022-10-28 00:00:00',	'True',	'FAMILLE MUSAFIRI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1522,	'2022-10-28 00:00:00',	'True',	'ANYUTO MATATA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1523,	'2022-10-28 00:00:00',	'True',	'FRANC KINE KAKOME',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1524,	'2022-10-28 00:00:00',	'True',	'FAMILLE LUBANGA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1525,	'2017-10-02 00:00:00',	'True',	'KAHINDO',	'',	'KIHIMBA',	'BIENFAISANTE',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1526,	'2009-11-10 00:00:00',	'True',	'UGENRWOTH',	'',	'DESIRE',	' ',	'',	'',	'',	'',	'',	'RETHY',	'',	'',	1,	3,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1527,	'1986-09-10 00:00:00',	'True',	'ADJISU',	'',	'HERE',	'JUSTIN',	'',	'',	'',	'',	'',	'GETY',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1528,	'1880-11-02 00:00:00',	'True',	'LWEMBO',	'',	'MARINOS',	'KARIM',	'',	'',	'',	'',	'',	'BENI',	'HOHO',	'LWEMBO MARINOS MICHEL',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1529,	'2022-11-08 00:00:00',	'True',	'FAMILLE NDEKWAMBALI TAGIRABO',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUINA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1530,	'2022-11-08 00:00:00',	'True',	'FAMALLE VIVUYA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1531,	'2022-11-08 00:00:00',	'True',	'LA PROMOTRICE',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1532,	'2022-11-08 00:00:00',	'True',	'FAMILLE SABUNI KETYA ET KETYA',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1533,	'2019-04-24 00:00:00',	'False',	'ALIKA',	'',	'BUSARUKE',	'ANGEL RAYAN',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'False'),
(1534,	'2022-11-03 00:00:00',	'True',	'FAMILLE BARAKA JACOB',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1535,	'2022-11-03 00:00:00',	'True',	'FAMILLE ALIKA BUSARUKE, ',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1536,	'2022-11-03 00:00:00',	'True',	'FAMILLE MASUDI',	'',	'',	'',	'',	'',	'',	'',	'0',	'BUNIA',	'',	'',	6,	4,	35,	1,	0,	'',	'False',	0,	'False',	'True'),
(1537,	'2013-01-28 00:00:00',	'True',	'KITIMA',	'',	'ZAWADI',	'ANGE',	'',	'',	'',	'',	'',	'GOMA',	'',	'Q. POLICE DE FRONTIERE\n0997764570',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1538,	'2016-03-13 00:00:00',	'True',	'BARAKA',	'',	'KITIMA',	'HANDEL',	'',	'',	'',	'',	'',	'GOMA',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1539,	'2014-04-14 00:00:00',	'True',	'ANSIMA',	'',	'BUKOMBE',	'PATRICIEN',	'',	'',	'',	'',	'',	'MUSHENY',	'Q. POLICE DE FRONTIER',	'0828228497',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1540,	'2008-10-22 00:00:00',	'True',	'ABANGENAYE',	'',	'KASEPAE',	'NATHALIE',	'',	'',	'',	'',	'',	'BENI',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1541,	'2010-06-16 00:00:00',	'True',	'ABDUL',	'',	'MULONGOY',	'CHRISTOMS',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'0811704151',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1545,	'2020-12-06 00:00:00',	'True',	'KIDIABANA',	'',	'LUBWA-LAINI',	'SECONDINE-CELESTE',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER OPAS, AVENUE LOBIKO',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1546,	'2008-09-04 00:00:00',	'True',	'MBOMBO',	'',	'AVO',	'ESTHER',	'',	'',	'',	'',	'',	'KINSHASA',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1547,	'1880-12-01 00:00:00',	'True',	'BENEDICTE',	'',	'ANIKANDA',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1548,	'2022-12-03 00:00:00',	'True',	'KATYA',	'',	'MWENGE',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1549,	'2022-12-03 00:00:00',	'True',	'SAFI',	'',	'BUDJIRIRI',	' ',	'',	'',	'',	'',	'',	'',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1550,	'1880-01-01 00:00:00',	'True',	'KATSONGO',	'',	'MUGHUNDA',	' ',	'',	'',	'',	'',	'',	'BUNIA',	'',	'',	1,	3,	0,	1,	0,	'',	'False',	0,	'False',	'True'),
(1551,	'2021-01-02 00:00:00',	'True',	'MAHAMBA',	'',	'VICTOIRE',	'ADRIEL',	'',	'',	'',	'',	'',	'BUNIA',	'Q. BANKOKO/ AV. MANIEME 1',	'MAMAN 0827130604\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1552,	'2020-07-02 00:00:00',	'True',	'ZONA',	'',	'KULELE',	'DOMINIQUE',	'',	'',	'',	'',	'',	'BUNIA',	'Q. POLICE DE FRONTIERE',	'MAMAN 0818256564',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1553,	'2021-02-07 00:00:00',	'True',	'DOXA SALEME',	'',	'PURIM MAKI',	'DOXA',	'',	'',	'',	'',	'',	'BUTEMBO',	'Q. POLICE DE FRONTIERE',	'NOM PAPA BENEDICT MAKI MASINI\nTEL 0819246908\nTEL WHAT 0977107068\n\nNOM MAMAN QBIGAL TSONGO FARIALA\n\nTEL 0975168726\nTEL 0823986433\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1554,	'2022-05-07 00:00:00',	'True',	'KAMATHE',	'',	'KOMBI',	'VAINQUAIRE',	'',	'',	'',	'',	'',	'BUNIA',	'POLICE DE FRONTIERE',	'MAMAN: 0816414200',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1555,	'2010-10-15 00:00:00',	'True',	'BOZENE',	'',	'TANZAKO',	'NEFTALIE',	'',	'',	'',	'',	'',	'KINSHASA',	'Q,YAMBI YAYA- POLICE DE FRONTIER',	'BOSELE BIKUMU\n0821187557',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1556,	'2021-05-31 00:00:00',	'True',	'PALUKU',	'',	'VAKATSURAKI',	'GAD',	'',	'',	'',	'',	'',	'BUNIA',	'QUARTIER; DELE',	'Mere; DIANE MAKASI\nTel; 0816289360',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1557,	'2019-09-12 00:00:00',	'True',	'AMPIRE',	'',	'MWALUNGWE',	'CHARMANT',	'',	'',	'',	'',	'',	'MUGWALU',	'',	'Q YAMBI YAYA\nPERE TEL 0820261280\nMERE TEL 0829226699',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1558,	'2016-06-16 00:00:00',	'True',	'HADASSA',	'',	'NKUSU',	'MATOTO',	'',	'',	'',	'',	'',	'BUNIA',	'VILLE DE BUNIA',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1559,	'2020-10-28 00:00:00',	'True',	'ASIMWE',	'',	'KYAVU',	'KEMUEL',	'',	'',	'',	'',	'',	'BUNIA',	'LENGABO',	'Mere :0821301020\nPere :0814615551\n',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True'),
(1560,	'2019-11-06 00:00:00',	'True',	'LIKULA',	'',	'WOTE',	' WYNDI',	'',	'',	'',	'',	'',	'KISANGANI',	'',	'',	1,	0,	0,	0,	0,	'',	'False',	0,	'False',	'True');

DROP TABLE IF EXISTS `finance_codebarre`;
CREATE TABLE `finance_codebarre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `typecode` varchar(10) DEFAULT NULL,
  `valeur` varchar(100) DEFAULT NULL,
  `quantitedefault` bigint(19) DEFAULT NULL,
  `encodage` varchar(25) DEFAULT NULL,
  `version` int(11) DEFAULT NULL,
  `correction` varchar(25) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `valeurdouchette` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_commandeproduit`;
CREATE TABLE `finance_commandeproduit` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `idfournisseur` int(11) DEFAULT NULL,
  `idadresselivraison` int(11) DEFAULT NULL,
  `datelivraison` datetime DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `commentaire` text,
  `idcmd` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_commandeproduit` (`id`, `datecreation`, `status`, `idfournisseur`, `idadresselivraison`, `datelivraison`, `idutilisateur`, `commentaire`, `idcmd`) VALUES
(1,	'2023-04-27 00:00:00',	0,	1,	1,	'2023-04-27 00:00:00',	1,	'',	0);

DROP TABLE IF EXISTS `finance_commentaire`;
CREATE TABLE `finance_commentaire` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `typesource` varchar(50) DEFAULT NULL,
  `commentaire` text,
  `url` varchar(225) DEFAULT NULL,
  `idsource` bigint(19) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_commercial`;
CREATE TABLE `finance_commercial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` text,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_commercial` (`id`, `datecreation`, `code`, `libelle`, `etat`) VALUES
(1,	'2022-10-27 13:52:49',	'ZALO',	'ZALO',	'False');

DROP TABLE IF EXISTS `finance_comptaecriture`;
CREATE TABLE `finance_comptaecriture` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `idcompte` int(11) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `sens` int(11) DEFAULT NULL,
  `montant` varchar(50) DEFAULT NULL,
  `iddevise` int(11) DEFAULT NULL,
  `taux` varchar(50) DEFAULT NULL,
  `source` varchar(25) DEFAULT NULL,
  `idsource` bigint(19) DEFAULT NULL,
  `idpiece` bigint(19) DEFAULT NULL,
  `tauxsigne` varchar(5) DEFAULT NULL,
  `idtiers` int(11) DEFAULT NULL,
  `sourcetiers` varchar(5) DEFAULT NULL,
  `dateecheance` datetime DEFAULT NULL,
  `idmodereglement` int(11) DEFAULT NULL,
  `idprofiltva` int(11) DEFAULT NULL,
  `db` varchar(225) DEFAULT NULL,
  `indexligne` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_comptalot`;
CREATE TABLE `finance_comptalot` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `idtype` int(11) DEFAULT NULL,
  `originelot` varchar(50) DEFAULT NULL,
  `idutilisateur` int(11) DEFAULT NULL,
  `idperiode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_comptaparamettre`;
CREATE TABLE `finance_comptaparamettre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `longeurcompte` int(11) DEFAULT NULL,
  `systemeohada` varchar(5) DEFAULT NULL,
  `idpreferenceprixrevient` int(11) DEFAULT NULL,
  `idformatgestioncomm` int(11) DEFAULT NULL,
  `idvariationstock` int(11) DEFAULT NULL,
  `idstatusvente` int(11) DEFAULT NULL,
  `statusvalidation` varchar(5) DEFAULT NULL,
  `statusupdatetarif` varchar(5) DEFAULT NULL,
  `statusverificationcodebarre` varchar(5) DEFAULT NULL,
  `idmethodestock` int(11) DEFAULT NULL,
  `impressiondevise` varchar(5) DEFAULT NULL,
  `saisiemultiproduit` varchar(5) DEFAULT NULL,
  `idmaindefaut` int(11) DEFAULT NULL,
  `validationmanuel` varchar(5) DEFAULT NULL,
  `ecarttolerable` varchar(225) DEFAULT NULL,
  `nombredecimal` int(11) DEFAULT NULL,
  `encaissementdirect` varchar(5) DEFAULT NULL,
  `surplusencaissement` varchar(5) DEFAULT NULL,
  `idinstitution` int(11) DEFAULT NULL,
  `verificationsoldeclient` varchar(5) DEFAULT NULL,
  `interdictionvente` varchar(5) DEFAULT NULL,
  `validationfactureauto` varchar(5) DEFAULT NULL,
  `refpiece` varchar(5) DEFAULT NULL,
  `bondiplucata` varchar(5) DEFAULT NULL,
  `statusvaliddepenseind` varchar(5) DEFAULT NULL,
  `statusbloquedependind` varchar(5) DEFAULT NULL,
  `statusvalidstock` varchar(5) DEFAULT NULL,
  `urlupdate` varchar(225) DEFAULT NULL,
  `urlupdatenote` varchar(225) DEFAULT NULL,
  `serveursecond` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `finance_comptaparamettre` (`id`, `datecreation`, `longeurcompte`, `systemeohada`, `idpreferenceprixrevient`, `idformatgestioncomm`, `idvariationstock`, `idstatusvente`, `statusvalidation`, `statusupdatetarif`, `statusverificationcodebarre`, `idmethodestock`, `impressiondevise`, `saisiemultiproduit`, `idmaindefaut`, `validationmanuel`, `ecarttolerable`, `nombredecimal`, `encaissementdirect`, `surplusencaissement`, `idinstitution`, `verificationsoldeclient`, `interdictionvente`, `validationfactureauto`, `refpiece`, `bondiplucata`, `statusvaliddepenseind`, `statusbloquedependind`, `statusvalidstock`, `urlupdate`, `urlupdatenote`, `serveursecond`) VALUES
(1,	'2022-09-16 00:00:00',	6,	'False',	0,	0,	0,	0,	'True',	'False',	'False',	0,	'False',	'False',	4,	'True',	'0,01',	2,	'False',	'False',	0,	'False',	'False',	'True',	'True',	'True',	'True',	'False',	'True',	'http://192.168.1.144:81/update/gfe.zip',	'http://gestionfacile.info/update/gfenoteupdate.zip',	'False');

DROP TABLE IF EXISTS `finance_comptapiece`;
CREATE TABLE `finance_comptapiece` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `nopiece` varchar(50) DEFAULT NULL,
  `typepiece` varchar(50) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `iddevise` int(11) DEFAULT NULL,
  `idjournal` int(11) DEFAULT NULL,
  `idlot` bigint(19) DEFAULT NULL,
  `isreport` varchar(5) DEFAULT NULL,
  `lettrage` varchar(225) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_comptaproduitinteragencedouaniere`;
CREATE TABLE `finance_comptaproduitinteragencedouaniere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idcompteachat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_comptaproduitinterdepot`;
CREATE TABLE `finance_comptaproduitinterdepot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idcomptestock` int(11) DEFAULT NULL,
  `idcomptevariation` int(11) DEFAULT NULL,
  `idcomptevente` int(11) DEFAULT NULL,
  `idcomptetransfert` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_comptasettingaffectauto`;
CREATE TABLE `finance_comptasettingaffectauto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(10) DEFAULT NULL,
  `idcategorie` int(11) DEFAULT NULL,
  `idnature` int(11) DEFAULT NULL,
  `debut` varchar(50) DEFAULT NULL,
  `fin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_comptebancaire`;
CREATE TABLE `finance_comptebancaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `typecompte` varchar(50) DEFAULT NULL,
  `libellecompte` varchar(225) DEFAULT NULL,
  `nocompte` varchar(225) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  `idagencebancaire` int(11) DEFAULT NULL,
  `iddevise` int(11) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `idcomptegeneral` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_compteresultatone`;
CREATE TABLE `finance_compteresultatone` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idtype` int(11) DEFAULT NULL,
  `iddata` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_compteresultattree`;
CREATE TABLE `finance_compteresultattree` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idtype` int(11) DEFAULT NULL,
  `iddata` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_compteresultattwo`;
CREATE TABLE `finance_compteresultattwo` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idtype` int(11) DEFAULT NULL,
  `iddata` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_comptesgeneraux`;
CREATE TABLE `finance_comptesgeneraux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(225) DEFAULT NULL,
  `idclassecompte` int(11) DEFAULT NULL,
  `typecompte` int(11) DEFAULT NULL,
  `reportanouveau` int(11) DEFAULT NULL,
  `iddevise` int(11) DEFAULT NULL,
  `typegroupe` varchar(5) DEFAULT NULL,
  `idjournal` int(11) DEFAULT NULL,
  `idnature` int(11) DEFAULT NULL,
  `idbase` int(11) DEFAULT NULL,
  `idtypetva` int(11) DEFAULT NULL,
  `idcomptetva` int(11) DEFAULT NULL,
  `idsens` int(11) DEFAULT NULL,
  `refcompte` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_compteurpiece`;
CREATE TABLE `finance_compteurpiece` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  `idformat` int(11) DEFAULT NULL,
  `iddirection` int(11) DEFAULT NULL,
  `compteurmoment` varchar(5) DEFAULT NULL,
  `compteurreset` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_conduite`;
CREATE TABLE `finance_conduite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_conduitedata`;
CREATE TABLE `finance_conduitedata` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `idetudiant` bigint(19) DEFAULT NULL,
  `idannee` int(11) DEFAULT NULL,
  `idperiode` int(11) DEFAULT NULL,
  `idconduite` int(11) DEFAULT NULL,
  `commentaire` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configresultatbis`;
CREATE TABLE `finance_configresultatbis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nopiece` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configresultatcharge`;
CREATE TABLE `finance_configresultatcharge` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configresultatproduit`;
CREATE TABLE `finance_configresultatproduit` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configtafirecafg`;
CREATE TABLE `finance_configtafirecafg` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configtafirecontrole`;
CREATE TABLE `finance_configtafirecontrole` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configtafirecreance`;
CREATE TABLE `finance_configtafirecreance` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configtafiredette`;
CREATE TABLE `finance_configtafiredette` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configtafireexcedent`;
CREATE TABLE `finance_configtafireexcedent` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configtafirepartiedeux`;
CREATE TABLE `finance_configtafirepartiedeux` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configtafirepartiedeuxresource`;
CREATE TABLE `finance_configtafirepartiedeuxresource` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_configtafirestock`;
CREATE TABLE `finance_configtafirestock` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `idclasse1` int(11) DEFAULT NULL,
  `idclasse2` int(11) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_couleurv`;
CREATE TABLE `finance_couleurv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `libelle` varchar(225) DEFAULT NULL,
  `etat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_coutacquisition`;
CREATE TABLE `finance_coutacquisition` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `datecreation` datetime DEFAULT NULL,
  `prix` varchar(50) DEFAULT NULL,
  `idproduit` int(11) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `idagence` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_custumbudget`;
CREATE TABLE `finance_custumbudget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtype` int(11) DEFAULT NULL,
  `iddata` int(11) DEFAULT NULL,
  `idbudget` bigint(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `finance_custumbudgetrecette`;
CREATE TABLE `finance_custumbudgetrecette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtype` int(11) DEFAULT NULL,
  `iddata` int(11) DEFAULT NULL,
  `idbudget` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- MySQL server has gone away

-- 
