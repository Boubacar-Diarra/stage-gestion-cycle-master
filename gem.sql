-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 06 Septembre 2019 à 14:17
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gem`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(15) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`username`, `mdp`) VALUES
('bd36', '69237420a');

-- --------------------------------------------------------

--
-- Structure de la table `anneeuniversitaire`
--

CREATE TABLE IF NOT EXISTS `anneeuniversitaire` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `annee` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `anneeuniversitaire`
--

INSERT INTO `anneeuniversitaire` (`id`, `annee`) VALUES
(1, '2018/2019');

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE IF NOT EXISTS `appartenir` (
  `annee` varchar(15) NOT NULL,
  `cneEtudiant` varchar(15) NOT NULL,
  `idSemestre` int(5) NOT NULL,
  PRIMARY KEY (`cneEtudiant`,`idSemestre`),
  KEY `idSemestre` (`idSemestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `appartenir`
--

INSERT INTO `appartenir` (`annee`, `cneEtudiant`, `idSemestre`) VALUES
('2018/2019', '581843', 1),
('2018/2019', '581869', 1),
('2018/2019', '581893', 1),
('2018/2019', '581944', 1),
('2018/2019', '581946', 1),
('2018/2019', '581972', 1),
('2018/2019', '581973', 1),
('2018/2019', '581984', 1),
('2018/2019', '581995', 1),
('2018/2019', '585347', 1),
('2018/2019', '585368', 1),
('2018/2019', '586026', 1);

-- --------------------------------------------------------

--
-- Structure de la table `compose`
--

CREATE TABLE IF NOT EXISTS `compose` (
  `annee` varchar(15) NOT NULL,
  `idModule` int(5) NOT NULL,
  `idSemestre` int(5) NOT NULL,
  PRIMARY KEY (`idSemestre`,`idModule`),
  KEY `idModule` (`idModule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compose`
--

INSERT INTO `compose` (`annee`, `idModule`, `idSemestre`) VALUES
('2018/2019', 1, 1),
('2018/2019', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `coordinateur`
--

CREATE TABLE IF NOT EXISTS `coordinateur` (
  `cne` varchar(15) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `dn` date NOT NULL,
  `grade` varchar(100) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `departement` varchar(100) NOT NULL,
  `etablissement` varchar(100) NOT NULL,
  PRIMARY KEY (`cne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `coordinateur`
--

INSERT INTO `coordinateur` (`cne`, `nom`, `prenom`, `dn`, `grade`, `specialite`, `departement`, `etablissement`) VALUES
('111213', 'HACHIMI', 'ALAOUI MY ALI', '2019-09-02', 'PA', 'Informatique', 'Informatique', 'INSEA'),
('121314', 'OUAZZANI', 'TOUHAMI AZIZ', '2019-09-02', 'PA', 'Informatique', 'Informatique', 'INSEA'),
('131415', 'KAOUTAR', 'ELHARI', '2019-09-02', 'Docteur-Ingenieur', '--', 'Informatique', 'INSEA'),
('141516', 'FAZOUANE', 'ABDESSELAM', '2019-09-02', 'PES', 'STATISTIQUE, DEMOGRAPHIE', 'Statistique, Demographie et Actuariat', 'INSEA'),
('151617', 'BERROUYNE', 'ABDESSELAM', '2019-09-02', 'Ingenieur', 'STATISTIQUE, DEMOGRAPHIE', 'Statistique, Demographie et Actuariat', 'INSEA');

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

CREATE TABLE IF NOT EXISTS `enseigner` (
  `annee` varchar(15) NOT NULL,
  `natureIntervention` varchar(15) NOT NULL,
  `cneProfesseur` varchar(15) NOT NULL,
  `idMatiere` int(5) NOT NULL,
  PRIMARY KEY (`cneProfesseur`,`idMatiere`),
  KEY `idMatiere` (`idMatiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enseigner`
--

INSERT INTO `enseigner` (`annee`, `natureIntervention`, `cneProfesseur`, `idMatiere`) VALUES
('2018/2019', 'Cours', '141516', 5);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `cne` varchar(15) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `dn` date NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`cne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`cne`, `nom`, `prenom`, `dn`, `status`) VALUES
('581843', 'ALALACH', 'HAMZA', '2019-09-02', '1ere annee'),
('581869', 'AIT MHA', 'Younes', '2019-09-02', '1ere annee'),
('581893', 'BAQQAL', 'CHAYMAE', '2019-09-02', '1ere annee'),
('581944', 'BOUYARMANE', 'FATIMA ZAHRA', '2019-09-02', '1ere annee'),
('581946', 'BOUZELAMD', 'TAQY-EDDINE', '2019-09-02', '1ere annee'),
('581972', 'BENSATI', 'KAWTAR', '2019-09-02', '1ere annee'),
('581973', 'BOUSHINE', 'IMANE', '2019-09-02', '1ere annee'),
('581984', 'BOUKILI', 'SABAH', '2019-09-02', '1ere annee'),
('581995', 'BOUZID', 'AMINA', '2019-09-02', '1ere annee'),
('585347', 'ATTAOUIL', 'BOUTAINA', '2019-09-02', '1ere annee'),
('585368', 'DANI', 'FADWA', '2019-09-02', '1ere annee'),
('586026', 'DIARRA', 'BOUBACAR', '2019-09-02', '1ere annee');

-- --------------------------------------------------------

--
-- Structure de la table `etudier`
--

CREATE TABLE IF NOT EXISTS `etudier` (
  `note` decimal(5,5) DEFAULT NULL,
  `annee` varchar(15) DEFAULT NULL,
  `cneEtudiant` varchar(15) NOT NULL,
  `idModule` int(5) NOT NULL,
  PRIMARY KEY (`cneEtudiant`,`idModule`),
  KEY `idModule` (`idModule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudier`
--

INSERT INTO `etudier` (`note`, `annee`, `cneEtudiant`, `idModule`) VALUES
(NULL, '2018/2019', '586026', 1);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) NOT NULL,
  `volumeHoraireCours` int(5) NOT NULL,
  `nombreEvaluation` int(5) NOT NULL,
  `volumeHoraireTd` int(5) NOT NULL,
  `volumeHoraireTp` int(5) NOT NULL,
  `activitePratique` varchar(100) DEFAULT NULL,
  `pourcentageNote` varchar(5) NOT NULL,
  `idModule` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idModule` (`idModule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`id`, `intitule`, `volumeHoraireCours`, `nombreEvaluation`, `volumeHoraireTd`, `volumeHoraireTp`, `activitePratique`, `pourcentageNote`, `idModule`) VALUES
(1, 'Algorithme', 21, 2, 12, 0, 'Aucun', '50.00', 1),
(2, 'Programmation', 21, 2, 0, 12, 'Aucun', '50.00', 1),
(3, 'Architecture des ordinateurs', 30, 2, 8, 0, 'Aucun', '70.00', NULL),
(4, 'Programmation Assembleur', 6, 2, 0, 8, 'Aucun', '30.00', NULL),
(5, 'Statistique Descriptif', 18, 2, 10, 0, 'Aucun', '70.00', 4),
(6, 'Pratique sur Logiciel', 0, 2, 0, 16, 'Aucun', '30.00', 4);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) NOT NULL,
  `departement` varchar(25) NOT NULL,
  `nature` varchar(25) NOT NULL,
  `semestre` int(2) NOT NULL,
  `objectif` varchar(100) NOT NULL,
  `pre_requisPedagogique` varchar(100) DEFAULT NULL,
  `descriptif` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`id`, `intitule`, `departement`, `nature`, `semestre`, `objectif`, `pre_requisPedagogique`, `descriptif`) VALUES
(1, 'Algorithme Et Programmation', 'Informatique', 'Scientifique et technique', 1, 'Apprendre la programmation en C', 'Aucun', 'Aucun'),
(3, 'Architecture des ordinateurs', 'Informatique', 'Scientifique et technique', 1, 'Connaitre la structure d''un ordinateur', 'Aucun', 'Aucun'),
(4, 'Statistique Descriptif et Pratique sur Logiciel', 'Statistique', 'Scientifique et technique', 1, 'Pouvoir determiner  et interpreter les donnees statistiques', 'Aucun', 'Aucun');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE IF NOT EXISTS `professeur` (
  `cne` varchar(15) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `dn` date NOT NULL,
  `grade` varchar(100) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `departement` varchar(100) NOT NULL,
  `etablissement` varchar(100) NOT NULL,
  PRIMARY KEY (`cne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`cne`, `nom`, `prenom`, `dn`, `grade`, `specialite`, `departement`, `etablissement`) VALUES
('111213', 'HACHIMI', 'ALAOUI MY ALI', '2019-09-02', 'PA', 'Informatique', 'Informatique', 'INSEA'),
('121314', 'OUAZZANI', 'TOUHAMIN AZIZ', '2019-09-02', 'PA', 'Informatique', 'Informatique', 'Insea'),
('131415', 'KAOUTAR', 'ELHARI', '2019-09-02', 'Docteur-Ingenieur', '--', 'Informatique', 'INSEA'),
('141516', 'FAZOUANE', 'ABDESSELAM', '2019-09-02', 'PES', 'STATISTIQUE, DEMOGRAPHIE', 'Statistique,', 'INSEA'),
('151617', 'BERROUYNE', 'ABDESSELAM', '2019-09-02', 'Ingenieur', 'STATISTIQUE, DEMOGRAPHIE', '--', 'INSEA');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
  `annee` varchar(15) NOT NULL,
  `cneCoordinateur` varchar(15) NOT NULL,
  `idModule` int(5) NOT NULL,
  PRIMARY KEY (`cneCoordinateur`,`idModule`),
  KEY `idModule` (`idModule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `responsable`
--

INSERT INTO `responsable` (`annee`, `cneCoordinateur`, `idModule`) VALUES
('2018/2019', '111213', 1);

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE IF NOT EXISTS `semestre` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `numero` int(2) NOT NULL,
  `idAnnee` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idAnnee` (`idAnnee`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `semestre`
--

INSERT INTO `semestre` (`id`, `numero`, `idAnnee`) VALUES
(1, 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`cneEtudiant`) REFERENCES `etudiant` (`cne`) ON DELETE CASCADE,
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`idSemestre`) REFERENCES `semestre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `compose_ibfk_1` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `compose_ibfk_2` FOREIGN KEY (`idSemestre`) REFERENCES `semestre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD CONSTRAINT `enseigner_ibfk_1` FOREIGN KEY (`cneProfesseur`) REFERENCES `professeur` (`cne`) ON DELETE CASCADE,
  ADD CONSTRAINT `enseigner_ibfk_2` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etudier`
--
ALTER TABLE `etudier`
  ADD CONSTRAINT `etudier_ibfk_1` FOREIGN KEY (`cneEtudiant`) REFERENCES `etudiant` (`cne`) ON DELETE CASCADE,
  ADD CONSTRAINT `etudier_ibfk_2` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_ibfk_1` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `responsable_ibfk_1` FOREIGN KEY (`idModule`) REFERENCES `module` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `responsable_ibfk_2` FOREIGN KEY (`cneCoordinateur`) REFERENCES `coordinateur` (`cne`) ON DELETE CASCADE;

--
-- Contraintes pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `semestre_ibfk_1` FOREIGN KEY (`idAnnee`) REFERENCES `anneeuniversitaire` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
