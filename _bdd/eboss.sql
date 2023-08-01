-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2023 at 07:18 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26
DROP DATABASE IF EXISTS `eboss`;
CREATE DATABASE eboss;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eboss`
--

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--


DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `enseignant_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enseignant_id` (`enseignant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `titre`, `description`, `enseignant_id`) VALUES
(1, 'Algo', 'Algèbre Algorithmique', 1),
(2, 'Methodnum', 'méthode numérique', 2),
(3, 'EDP', 'equation des dérivé paetielle', 3);

-- --------------------------------------------------------

--
-- Table structure for table `devoirs`
--

DROP TABLE IF EXISTS `devoirs`;
CREATE TABLE IF NOT EXISTS `devoirs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cours_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cours_id` (`cours_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etudiant_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiant_id` (`etudiant_id`),
  KEY `cours_id` (`cours_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `etudiant_id`, `cours_id`) VALUES
(1, 4, 2),
(2, 5, 1),
(3, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rendu`
--

DROP TABLE IF EXISTS `rendu`;
CREATE TABLE IF NOT EXISTS `rendu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier` blob,
  `etudiant_id` int(11) NOT NULL,
  `devoir_id` int(11) NOT NULL,
  `date_rendu` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiant_id` (`etudiant_id`),
  KEY `devoir_id` (`devoir_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(150) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `statut` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateurs`
--


DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(150) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `statut` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenoms`, `email`, `mdp`, `statut`) VALUES
(1, 'ANDRIAMIFIDISOA', 'Ramamonjy', 'adriamidysoa@gmail.com', sha1('ramamonjy'), 'enseignants'),
(2, 'ANDRIATAHINY', 'Harinaivo', 'andriatahiny@gmail.com', sha1('harinaivo'), 'enseignants'),
(3, 'RABEFIHAVANANA', 'Luc', 'rabefihavanana@gmail.com', sha1('luc'), 'enseignants'),
(4, 'RAKOTOSON', 'Tendry', 'rakotoson@gmail.com', sha1('tendry'), 'etudiants'),
(5, 'ANDRIANJAKA', 'Antsa', 'andrianjaka@gmail.com', sha1('antsa'), 'etudiants'),
(6, 'ANDRIANARIVELO', 'Jean Désiré', 'andianarivelo@gmail.com', sha1('jeandesire'), 'etudiants'),
(10, 'RAKOTOMANDIMBY', 'Marie Monique', 'malala@gmail.com', '96d53734fc1bd54d848cd30f98069b90333b1bb3', 'etudiants'),
(11, 'RANDRIANARIVELO', 'DEZY', 'dezy@gmail.com', 'ad5bb29d39dfba3a5a11c98c2df79927d93bd2ee', 'etudiants'),
(9, 'Rakotoarivelo', 'Malala', 'malala@gmail.com', '6b46ea323e124c83fe510fcdc99740392679832c', 'etudiants'),
(12, 'BOUMA', 'Marie Jane', 'bouma@gmail.com', '0d1c3cea730614a03811d5ff5a0d526c1767e80f', 'etudiants');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
