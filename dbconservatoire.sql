-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2023 at 12:08 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conservatoire`
--

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `IDELEVE` int(11) NOT NULL,
  `BOURSE` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDELEVE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`IDELEVE`, `BOURSE`) VALUES
(1, 200),
(2, 200),
(3, 0),
(4, 150);

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `login`, `pw`) VALUES
(1, 'Thomas', 'David', 'david123', 'mdp1'),
(2, 'Winston', 'Elaine', 'elaine321', 'mdp2');

-- --------------------------------------------------------

--
-- Table structure for table `heure`
--

DROP TABLE IF EXISTS `heure`;
CREATE TABLE IF NOT EXISTS `heure` (
  `TRANCHE` varchar(32) NOT NULL,
  PRIMARY KEY (`TRANCHE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heure`
--

INSERT INTO `heure` (`TRANCHE`) VALUES
('10h-11h'),
('11h-12h'),
('13h-14h'),
('14h-15h'),
('15h-16h'),
('16h-17h'),
('17h-18h'),
('18h-19h'),
('19h-20h'),
('20h-21h'),
('21h-22h'),
('9h-10h');

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `IDPROF` int(11) NOT NULL,
  `IDELEVE` int(11) NOT NULL,
  `NUMSEANCE` int(11) NOT NULL,
  `DATEINSCRIPTION` date DEFAULT NULL,
  PRIMARY KEY (`IDPROF`,`IDELEVE`,`NUMSEANCE`),
  KEY `I_FK_INSCRIPTION_ELEVE` (`IDELEVE`),
  KEY `I_FK_INSCRIPTION_SEANCE` (`IDPROF`,`NUMSEANCE`),
  KEY `fk_numSeance` (`NUMSEANCE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`IDPROF`, `IDELEVE`, `NUMSEANCE`, `DATEINSCRIPTION`) VALUES
(5, 1, 1, '2023-01-09'),
(5, 2, 1, '2023-04-09'),
(6, 1, 3, '2023-04-04'),
(6, 2, 2, '2023-02-15'),
(6, 4, 1, '2023-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE IF NOT EXISTS `instrument` (
  `LIBELLE` varchar(32) NOT NULL,
  PRIMARY KEY (`LIBELLE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instrument`
--

INSERT INTO `instrument` (`LIBELLE`) VALUES
('Accordéon'),
('Basse'),
('Batterie'),
('Flûte'),
('Guitare'),
('Harpe'),
('Piano'),
('Saxophone'),
('Trompette'),
('Violon');

-- --------------------------------------------------------

--
-- Table structure for table `jour`
--

DROP TABLE IF EXISTS `jour`;
CREATE TABLE IF NOT EXISTS `jour` (
  `JOUR` varchar(32) NOT NULL,
  PRIMARY KEY (`JOUR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jour`
--

INSERT INTO `jour` (`JOUR`) VALUES
('dimanche'),
('jeudi'),
('lundi'),
('mardi'),
('mercredi'),
('samedi'),
('vendredi');

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `NIVEAU` int(11) NOT NULL,
  PRIMARY KEY (`NIVEAU`),
  KEY `NIVEAU` (`NIVEAU`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `niveau`
--

INSERT INTO `niveau` (`NIVEAU`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `payer`
--

DROP TABLE IF EXISTS `payer`;
CREATE TABLE IF NOT EXISTS `payer` (
  `IDPROF` int(11) NOT NULL,
  `IDELEVE` int(11) NOT NULL,
  `NUMSEANCE` int(11) NOT NULL,
  `LIBELLE` varchar(32) NOT NULL,
  `DATEPAIEMENT` date DEFAULT '0001-01-01',
  `PAYE` int(11) DEFAULT '0',
  PRIMARY KEY (`IDPROF`,`IDELEVE`,`NUMSEANCE`,`LIBELLE`),
  KEY `I_FK_PAYER_INSCRIPTION` (`IDPROF`,`IDELEVE`,`NUMSEANCE`),
  KEY `I_FK_PAYER_TRIM` (`LIBELLE`),
  KEY `fk_paye_eleve` (`IDELEVE`),
  KEY `fk_paye_numSeance` (`NUMSEANCE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payer`
--

INSERT INTO `payer` (`IDPROF`, `IDELEVE`, `NUMSEANCE`, `LIBELLE`, `DATEPAIEMENT`, `PAYE`) VALUES
(5, 1, 1, 'trimestre1', '0001-01-01', -1),
(5, 1, 1, 'trimestre2', '0001-01-01', 345),
(5, 1, 1, 'trimestre3', '2023-04-02', -1),
(6, 2, 2, 'trimestre1', '0001-01-01', -1),
(6, 2, 2, 'trimestre2', '0001-01-01', -1),
(6, 2, 2, 'trimestre3', '2023-04-06', -1);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(32) DEFAULT NULL,
  `PRENOM` varchar(32) DEFAULT NULL,
  `TEL` varchar(11) DEFAULT NULL,
  `MAIL` varchar(32) DEFAULT NULL,
  `ADRESSE` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`ID`, `NOM`, `PRENOM`, `TEL`, `MAIL`, `ADRESSE`) VALUES
(1, 'Dupont', 'Jean', '123456789', 'jean.dupont@example.com', '12 rue de la Paix'),
(2, 'Martin', 'Marie', '234567890', 'marie.martin@example.com', '24 avenue des Champs-Élysées'),
(3, 'Durand', 'Pierre', '345678901', 'pierre.durand@example.com', '36 rue du Faubourg Saint-Honoré'),
(4, 'Lefebvre', 'Sophie', '456789012', 'sophie.lefebvre@example.com', '48 boulevard Haussmann'),
(5, 'Leroy', 'Antoine', '567890123', 'antoine.leroy@example.com', '60 avenue Montaigne'),
(6, 'Moreau', 'Isabelle', '678901234', 'isabelle.moreau@example.com', '72 rue de Rivoli'),
(7, 'Petit', 'François', '789012345', 'francois.petit@example.com', '84 boulevard des Invalides'),
(8, 'Roux', 'Émilie', '890123456', 'emilie.roux@example.com', '96 rue de la Pompe'),
(9, 'Sauvage', 'Thierry', '901234567', 'thierry.sauvage@example.com', '108 avenue des Ternes'),
(10, 'Simon', 'Camille', '123456789', 'camille.simon@example.com', '120 rue de la Roquette'),
(11, 'Tanguy', 'Lucie', '234567890', 'lucie.tanguy@example.com', '132 avenue des Gobelins'),
(12, 'Thomas', 'Guillaume', '345678901', 'guillaume.thomas@example.com', '144 rue Saint-Antoine'),
(13, 'Vidal', 'Caroline', '456789012', 'caroline.vidal@example.com', '156 boulevard Saint-Germain'),
(14, 'Boucher', 'Alexandre', '567890123', 'alexandre.boucher@example.com', '168 avenue de Clichy'),
(15, 'Chevalier', 'Sophie', '678901234', 'sophie.chevalier@example.com', '180 rue de la Convention');

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

DROP TABLE IF EXISTS `prof`;
CREATE TABLE IF NOT EXISTS `prof` (
  `IDPROF` int(11) NOT NULL,
  `INSTRUMENT` varchar(32) NOT NULL,
  `SALAIRE` double(10,4) DEFAULT NULL,
  `LOGIN` varchar(32) NOT NULL,
  `MDP` varchar(32) NOT NULL,
  PRIMARY KEY (`IDPROF`),
  KEY `I_FK_PROF_INSTRUMENT` (`INSTRUMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prof`
--

INSERT INTO `prof` (`IDPROF`, `INSTRUMENT`, `SALAIRE`, `LOGIN`, `MDP`) VALUES
(5, 'Accordéon', 1000.0000, 'lantoine', 'monmdp1'),
(6, 'Basse', 1500.0000, 'isaMoreau', 'monmdp2'),
(7, 'Guitare', 900.0000, '', ''),
(8, 'Trompette', 1280.0000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `IDPROF` int(11) NOT NULL,
  `NUMSEANCE` int(11) NOT NULL,
  `TRANCHE` varchar(32) NOT NULL,
  `JOUR` varchar(32) NOT NULL,
  `NIVEAU` int(11) NOT NULL,
  `CAPACITE` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDPROF`,`NUMSEANCE`),
  KEY `I_FK_SEANCE_JOUR` (`JOUR`),
  KEY `I_FK_SEANCE_NIVEAU` (`NIVEAU`),
  KEY `I_FK_SEANCE_PROF` (`IDPROF`),
  KEY `fk_tranche` (`TRANCHE`),
  KEY `NUMSEANCE` (`NUMSEANCE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seance`
--

INSERT INTO `seance` (`IDPROF`, `NUMSEANCE`, `TRANCHE`, `JOUR`, `NIVEAU`, `CAPACITE`) VALUES
(5, 1, '9h-10h', 'mardi', 1, 7),
(6, 1, '16h-17h', 'jeudi', 2, 13),
(6, 2, '18h-19h', 'lundi', 1, 7),
(6, 3, '19h-20h', 'lundi', 3, 5),
(7, 1, '10h-11h', 'mercredi', 1, 10),
(7, 2, '14h-15h', 'lundi', 1, 12),
(8, 1, '15h-16h', 'vendredi', 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `trim`
--

DROP TABLE IF EXISTS `trim`;
CREATE TABLE IF NOT EXISTS `trim` (
  `LIBELLE` varchar(32) NOT NULL,
  `DATEFIN` date DEFAULT NULL,
  PRIMARY KEY (`LIBELLE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trim`
--

INSERT INTO `trim` (`LIBELLE`, `DATEFIN`) VALUES
('trimestre1', '0001-11-30'),
('trimestre2', '0001-02-28'),
('trimestre3', '0001-05-31');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `fk_idEleve` FOREIGN KEY (`IDELEVE`) REFERENCES `personne` (`ID`);

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `fk_insc_eleve` FOREIGN KEY (`IDELEVE`) REFERENCES `eleve` (`IDELEVE`),
  ADD CONSTRAINT `fk_inscr_prof` FOREIGN KEY (`IDPROF`) REFERENCES `prof` (`IDPROF`),
  ADD CONSTRAINT `fk_numSeance` FOREIGN KEY (`NUMSEANCE`) REFERENCES `seance` (`NUMSEANCE`),
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`IDPROF`,`NUMSEANCE`) REFERENCES `seance` (`IDPROF`, `NUMSEANCE`);

--
-- Constraints for table `payer`
--
ALTER TABLE `payer`
  ADD CONSTRAINT `fk_paye_lib` FOREIGN KEY (`LIBELLE`) REFERENCES `trim` (`LIBELLE`),
  ADD CONSTRAINT `fk_paye_prof` FOREIGN KEY (`IDPROF`,`IDELEVE`,`NUMSEANCE`) REFERENCES `inscription` (`IDPROF`, `IDELEVE`, `NUMSEANCE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prof`
--
ALTER TABLE `prof`
  ADD CONSTRAINT `fk_idProf` FOREIGN KEY (`IDPROF`) REFERENCES `personne` (`ID`),
  ADD CONSTRAINT `fk_refInstrument` FOREIGN KEY (`INSTRUMENT`) REFERENCES `instrument` (`LIBELLE`);

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fk_jour` FOREIGN KEY (`JOUR`) REFERENCES `jour` (`JOUR`),
  ADD CONSTRAINT `fk_prof` FOREIGN KEY (`IDPROF`) REFERENCES `prof` (`IDPROF`),
  ADD CONSTRAINT `fk_tranche` FOREIGN KEY (`TRANCHE`) REFERENCES `heure` (`TRANCHE`),
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`NIVEAU`) REFERENCES `niveau` (`NIVEAU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
