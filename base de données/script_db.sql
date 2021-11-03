-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2020 at 09:10 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db_pdw`
--

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

CREATE TABLE `activite` (
  `idactivite` int(11) NOT NULL auto_increment,
  `titreactivite` varchar(50) NOT NULL,
  `da` date NOT NULL,
  `ha` time NOT NULL,
  `idtache` int(11) NOT NULL,
  `commentaire` varchar(50) NOT NULL,
  PRIMARY KEY  (`idactivite`),
  KEY `idtache` (`idtache`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `activite`
--

INSERT INTO `activite` (`idactivite`, `titreactivite`, `da`, `ha`, `idtache`, `commentaire`) VALUES
(1, 'Practice test', '2020-07-09', '09:45:00', 2, 'preparation to pass Oracle certificatied Associate'),
(2, 'Gestion des activitÃ©es', '2020-07-08', '11:38:00', 4, 'gestion d''activites ');

-- --------------------------------------------------------

--
-- Table structure for table `affectation`
--

CREATE TABLE `affectation` (
  `idaffectation` int(11) NOT NULL auto_increment,
  `idemploye` int(11) NOT NULL,
  `idservice` varchar(10) NOT NULL,
  `dda` date NOT NULL,
  `dfa` date NOT NULL,
  `fonction` varchar(50) NOT NULL,
  PRIMARY KEY  (`idaffectation`),
  KEY `idemploye` (`idemploye`,`idservice`),
  KEY `idservice` (`idservice`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `affectation`
--

INSERT INTO `affectation` (`idaffectation`, `idemploye`, `idservice`, `dda`, `dfa`, `fonction`) VALUES
(1, 5, 'COM', '1995-06-15', '2020-07-10', 'IngÃ©nieur');

-- --------------------------------------------------------

--
-- Table structure for table `avoirmission`
--

CREATE TABLE `avoirmission` (
  `idam` int(11) NOT NULL auto_increment,
  `idmission` int(11) NOT NULL,
  `idchefservice` int(11) NOT NULL,
  PRIMARY KEY  (`idam`),
  KEY `idmission` (`idmission`,`idchefservice`),
  KEY `idchefservice` (`idchefservice`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `avoirmission`
--

INSERT INTO `avoirmission` (`idam`, `idmission`, `idchefservice`) VALUES
(2, 4, 3),
(3, 6, 1),
(4, 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `chefservice`
--

CREATE TABLE `chefservice` (
  `idchefservice` int(11) NOT NULL auto_increment,
  `idservice` varchar(10) NOT NULL,
  `idemploye` int(11) NOT NULL,
  `ddc` date NOT NULL,
  `dfc` date NOT NULL,
  PRIMARY KEY  (`idchefservice`),
  KEY `idservice` (`idservice`,`idemploye`),
  KEY `idemploye` (`idemploye`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `chefservice`
--

INSERT INTO `chefservice` (`idchefservice`, `idservice`, `idemploye`, `ddc`, `dfc`) VALUES
(1, 'PERS', 4, '2020-04-01', '2026-06-04'),
(3, 'COM', 7, '2009-09-01', '2025-08-01'),
(5, 'CLT', 9, '2015-06-03', '2020-06-24'),
(7, 'DET', 10, '2022-06-06', '2025-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `idemploye` int(11) NOT NULL auto_increment,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `ddn` date NOT NULL,
  `addresse` varchar(100) NOT NULL,
  `ville` varchar(10) NOT NULL,
  `email` text NOT NULL,
  `ddr` date NOT NULL,
  `specialite` text NOT NULL,
  `login` text NOT NULL,
  `motdepasse` text NOT NULL,
  PRIMARY KEY  (`idemploye`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`idemploye`, `nom`, `prenom`, `cin`, `ddn`, `addresse`, `ville`, `email`, `ddr`, `specialite`, `login`, `motdepasse`) VALUES
(4, 'ES-SARAOUI', 'MOUNIM', 'LK123123', '1996-06-03', 'ben hmad', 'stat', 'moun.im_essaraoui@gmail.com', '2020-06-09', 'Informaticien', 'sous admin', 'SOUS_ADMIN'),
(5, 'BERIAHI', 'BRAHIM', 'BR234467', '1993-10-12', 'boulvard alkhamiss rue 32 darb gandaoui', 'kenetra', 'beriahi_brahmi@gmail.com', '2123-12-31', 'SITEL', 'sous admin', 'SOUS_ADMIN'),
(7, 'AJANA', 'LATIFA', 'P213423', '2002-06-03', 'ti3zite', 'bnimalal', 'latifa_hbibtti@brahim.loveyou', '2020-06-10', 'rabat bayt', 'sous admin', 'SOUS_ADMIN'),
(8, 'MOUSLIM', 'ELKHADAR', 'MP123412', '2020-06-02', 'boulvard ebdelkhalaq torres wilaya', 'tetouan', 'Mr.mouslim_elkhadar@hotmail.com', '1982-09-22', 'developpeur', 'admin', 'ADMIN_GENERAL'),
(9, 'ERRACHIDI', 'MOHAMED', 'p23445634', '1989-06-05', 'zawyat ghassate', 'ouarzazate', 'med.errachidi@gmail.com', '2003-06-10', 'technicien', 'public', 'PUBLIC'),
(10, 'BALCHITI', 'RACHID', 'P34245', '1988-06-02', 'lahssoun skoura', 'ouarazate', 'balchiti_rachid@gmail.fr', '2022-07-01', 'EspaÃ±ola ', 'sous admin', 'SOUS_ADMIN'),
(11, 'ELBANAJI', 'BRAHIM', 'PO23443', '2020-07-23', 'ghassate', 'ouarzazate', 'elbanaji.brahim@gmail.com', '2020-07-17', 'technicien', 'admin', 'ADMIN_GENERAL'),
(12, 'ELBANAJI', 'BRAHIM', 'PO23443', '2020-07-23', 'ghassate', 'ouarzazate', 'elbanaji.brahim@gmail.com', '2020-07-17', 'technicien', 'admin', 'ADMIN_GENERAL'),
(13, 'ELBANAJI', 'BRAHIM', 'PO23443', '2020-07-23', 'ghassate', 'ouarzazate', 'elbanaji.brahim@gmail.com', '2020-07-17', 'technicien', 'admin', 'ADMIN_GENERAL'),
(14, 'HAMID', 'KARIM', 'ER23443', '1990-04-13', 'BEZOU', 'BNIMALA', 'hamid_bzou@gmail.com', '2000-03-12', 'informaticien', 'admin', 'SOUS_ADMIN'),
(15, 'MOUSL', 'ELKHARM', 'P141', '2020-04-22', 'boulvard ebdelhalaq ', 'chaouan', 'Mr.mouslim_elkhadar@hotmail.com', '1982-09-22', 'developpeur', 'admin', 'ADMIN_GENERAL'),
(16, 'MOUSAID', 'KARIM ', 'LO12312', '2002-11-03', 'buvad edelhalq  Tores you write more this will be saved incha allah', 'tetouan ', 'r.supisi@hotmail.com', '2004-11-12', 'developpeur', 'admin', 'SOUS_ADMIN'),
(17, 'KADOUR', 'KALSKE', 'DF24345', '1233-12-09', 'hay zarktoiuni', 'taroudant', 'ghra.kjerhkzer@gmail.com', '2020-07-08', 'developpeur', 'public', 'public'),
(18, 'JAOUAD', 'KAHOUCJF', 'PL44334', '2020-06-30', 'bojaozej jdida', 'jdida', 'belle_ville@gmail.com', '2020-07-05', 'SITEL', 'user', 'user'),
(19, 'AIMAD', 'ACHMARKI', 'PO35345546', '2020-07-01', 'hay bosakob taza', 'taza ville', 'borj_milha@gmail.com', '2020-06-28', 'technicien', 'user', 'user'),
(20, 'BABA', 'TORI', 'ACAM11341', '2200-12-02', 'rue najah boso', 'marzgan ci', 'r.mom_elkar@hotmail.com', '1990-12-22', 'technicien', 'fofo', 'FOFOFAFA'),
(21, 'AZakflafazlazea', 'azejazejaze', 'majzjekaze', '2020-07-17', 'lamlkzemlkazem', 'mkmlkmlaze', 'kmazjemmlkaze', '2020-08-07', 'technicien', 'amin', 'suuosuas');

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `idmission` int(11) NOT NULL auto_increment,
  `titremission` varchar(50) NOT NULL,
  `ddm` date NOT NULL,
  `dftm` date NOT NULL,
  `dfrm` date NOT NULL,
  PRIMARY KEY  (`idmission`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`idmission`, `titremission`, `ddm`, `dftm`, `dfrm`) VALUES
(1, 'projet de developpement web', '2020-06-01', '2020-07-07', '2020-08-08'),
(2, 'OCA', '2019-01-10', '2020-06-11', '2020-07-10'),
(4, 'Mindset', '2020-06-01', '2020-06-10', '2020-06-26'),
(6, 'AI', '2020-06-02', '2020-06-27', '2020-06-30'),
(8, 'CCNA4', '2020-06-25', '2020-07-09', '2020-07-11'),
(9, 'JavaScript', '2020-06-11', '2020-06-18', '2020-06-25'),
(10, 'VB.NET', '2020-06-04', '2020-06-25', '2020-07-09'),
(11, 'PHP&MYSQL', '2020-06-01', '2020-07-07', '2020-07-07'),
(12, 'UML', '2020-06-05', '2020-06-20', '2020-06-27'),
(13, 'ENGLISH B1', '2020-06-25', '2020-07-02', '2020-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `idservice` varchar(10) NOT NULL,
  `nomservice` varchar(50) NOT NULL,
  PRIMARY KEY  (`idservice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`idservice`, `nomservice`) VALUES
('CLT', 'CLIENT'),
('COM', 'COMERCE'),
('DET', 'DETECTION'),
('ENTR', 'ENTRETIEN'),
('INFO', 'INFORMATIQUE'),
('MAN', 'MAINTENANCE'),
('PERS', 'PERSONNELS'),
('PROF', 'PROFFESSEUR'),
('SANT', 'SANTE'),
('SEC', 'SECURITE'),
('TRANS', 'TRANSMISSION');

-- --------------------------------------------------------

--
-- Table structure for table `tache`
--

CREATE TABLE `tache` (
  `idtache` int(11) NOT NULL auto_increment,
  `titretache` varchar(50) NOT NULL,
  `ddt` date NOT NULL,
  `dftt` date NOT NULL,
  `dfrt` date NOT NULL,
  `idmission` int(11) NOT NULL,
  `idemploye` int(11) NOT NULL,
  PRIMARY KEY  (`idtache`),
  KEY `idmission` (`idmission`,`idemploye`),
  KEY `idemploye` (`idemploye`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tache`
--

INSERT INTO `tache` (`idtache`, `titretache`, `ddt`, `dftt`, `dfrt`, `idmission`, `idemploye`) VALUES
(2, 'chapter I java data type', '2020-07-01', '2020-07-07', '2020-07-16', 2, 4),
(4, 'table in bootstrap', '2020-07-08', '2020-07-23', '2020-07-30', 1, 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`idtache`) REFERENCES `tache` (`idtache`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `affectation`
--
ALTER TABLE `affectation`
  ADD CONSTRAINT `affectation_ibfk_2` FOREIGN KEY (`idemploye`) REFERENCES `employe` (`idemploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affectation_ibfk_3` FOREIGN KEY (`idservice`) REFERENCES `services` (`idservice`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `avoirmission`
--
ALTER TABLE `avoirmission`
  ADD CONSTRAINT `avoirmission_ibfk_1` FOREIGN KEY (`idmission`) REFERENCES `mission` (`idmission`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avoirmission_ibfk_2` FOREIGN KEY (`idchefservice`) REFERENCES `chefservice` (`idchefservice`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chefservice`
--
ALTER TABLE `chefservice`
  ADD CONSTRAINT `chefservice_ibfk_1` FOREIGN KEY (`idservice`) REFERENCES `services` (`idservice`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chefservice_ibfk_2` FOREIGN KEY (`idemploye`) REFERENCES `employe` (`idemploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`idmission`) REFERENCES `mission` (`idmission`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tache_ibfk_2` FOREIGN KEY (`idemploye`) REFERENCES `employe` (`idemploye`) ON DELETE CASCADE ON UPDATE CASCADE;
