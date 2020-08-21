-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 fév. 2020 à 18:59
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionlicence`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `IdAgent` int(11) NOT NULL,
  `NomAgent` varchar(100) NOT NULL,
  `PrenomAgent` varchar(100) NOT NULL,
  `TelAgent` varchar(20) NOT NULL,
  `EmailAgent` varchar(90) NOT NULL,
  `PasswordAgent` varchar(100) NOT NULL,
  `Admin` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`IdAgent`, `NomAgent`, `PrenomAgent`, `TelAgent`, `EmailAgent`, `PasswordAgent`, `Admin`) VALUES
(6, 'youness', 'admi', '', '', '', ''),
(7, 'aaa', '', '', '', '', ''),
(17, 'youness', 'moumni', '0707129806', 'youness@gmail.com', '20121998', ''),
(1, '', '', '', 'admin', 'admin', 'Admin'),
(5, 'moumni', 'amine', '', 'childeroe12@gmail.com', '2012', 'Admin'),
(10, 'Bourayte', 'Ayoub', '', 'ayoub.bourayte@ihm-technologies.com', 'Ayoub123', ''),
(11, 'Morjane', 'Abderahim', '', 'abderrahim.morjane@ihm-technologies.com', 'Abderahim123', ''),
(12, 'azzouzi', 'Soufiane', '', 'soufiane.azzouzi@ihm-technologies.com', 'Soufiane123', ''),
(13, 'Tahraoui', 'Ahmed', '', 'ahmed.tahraoui@ihm-technologies.com', 'Ahmed123', ''),
(14, 'Elharti', 'Mehdi', '', 'mehdi.elharti@ihm-technologies.com', 'Mehdi123', ''),
(15, 'Zerhouni', 'Adam', '', 'adam.zerhouni@ihm-technologies.com', 'Adam123', ''),
(16, 'Derrou', 'Meriem', '', 'mariam.derrou@ihm-technologies.com', 'Meriem123', '');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `IdClient` int(11) NOT NULL,
  `NomClient` varchar(100) NOT NULL,
  `AdresseClient` varchar(100) NOT NULL,
  `EmailClient` varchar(100) NOT NULL,
  `TelClient` varchar(20) NOT NULL,
  `SiteClient` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`IdClient`, `NomClient`, `AdresseClient`, `EmailClient`, `TelClient`, `SiteClient`) VALUES
(1, 'Amine', '124 chabanat rabat', 'childeroe12@gmail.com', '0707129806', 'www.ihm-technologies.ma'),
(2, 'Amina', 'casablancaaaa', 'aminemoumni1998@gmail.com', '0707129806', 'www.ihm-technologies.ma'),
(3, 'ANLCA', 'ANLCA', 'ANLCA@gmail.com', '0678541236', 'ANLCA.ma'),
(4, 'UniversitÃ© Hassan 2', 'casablancaaaa', 'UniversiteHassan2@gmail.com', '0678541236', 'UniversitÃ©Hassan.ma'),
(5, 'DPM', 'casablancaaaa', 'DPM@gmail.com', '0678541236', 'DPM.ma'),
(6, 'UniversitÃ© Ibno Zoher', 'casablancaaaa', 'UniversiteIbnoZoher@gmail.com', '0678541236', 'UniversiteIbnoZoher.ma'),
(7, 'ADN', 'Rabat', 'karim@gmail.com', '0661235689', 'www.ihm-technologies.ma'),
(12, 'Amine', 'casablancaaaa', '', '', ''),
(13, 'Amin', 'casablancaaaa', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `contactclient`
--

CREATE TABLE `contactclient` (
  `IdContactClient` int(11) NOT NULL,
  `NomContactClient` varchar(100) NOT NULL,
  `TelContactClient` varchar(20) NOT NULL,
  `EmailContactClient` varchar(100) NOT NULL,
  `IdClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contactclient`
--

INSERT INTO `contactclient` (`IdContactClient`, `NomContactClient`, `TelContactClient`, `EmailContactClient`, `IdClient`) VALUES
(1, 'Salaheddine', '0707129806', 'childeroe12@gmail.com', 2),
(6, 'Abde', '0707129806', 'childeroe12@gmail.com', 1),
(7, 'yasmine', '0707129806', 'aminemoumni1998@gmail.com', 1),
(8, 'Oussama Idrissi Oukili', '0678541236', 'OussamaIdrissiOukili@gmail.com', 3),
(9, 'Siham Khalaf', '0678541236', 'SihamKhalaf@gmail.com', 4),
(10, 'Dalal Abida', '0678541236', 'DalalAbida@gmail.com', 5),
(11, 'Adil Laoufi', '0678541236', 'AdilLaoufi@gmail.com', 6),
(13, 'Tahiri', '0707129806', 'karim@gmail.com', 7),
(14, 'Idriss', '', '', 1),
(15, 'Brahim', '', '', 13),
(16, 'yasmine', '', '', 6);

-- --------------------------------------------------------

--
-- Structure de la table `licence`
--

CREATE TABLE `licence` (
  `IdLicence` int(11) NOT NULL,
  `IdProduit` int(11) NOT NULL,
  `IdTypeLicence` int(11) NOT NULL,
  `Garantie` varchar(50) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `NomEnregistrement` varchar(200) NOT NULL,
  `IdAgent` int(11) NOT NULL,
  `Numerodeserie` varchar(500) NOT NULL,
  `IdContactClient` int(11) NOT NULL,
  `ReferenceMarche` varchar(200) NOT NULL,
  `ImageLicence` varchar(255) NOT NULL,
  `Validation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `licence`
--

INSERT INTO `licence` (`IdLicence`, `IdProduit`, `IdTypeLicence`, `Garantie`, `DateDebut`, `DateFin`, `NomEnregistrement`, `IdAgent`, `Numerodeserie`, `IdContactClient`, `ReferenceMarche`, `ImageLicence`, `Validation`) VALUES
(37, 1, 1, '5 ans', '2019-03-23', '2019-04-20', '', 5, 'AXDSERTT', 1, '12554877', '', 'Expire'),
(38, 2, 1, '5 ans', '2019-03-23', '2019-04-20', '', 5, 'AXDSERTT', 1, '12554877', '', 'Expire'),
(39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', '', 5, 'AXDSERTT', 1, '12554877', '', 'Expire'),
(40, 4, 18, '5 ans', '2018-03-23', '2020-04-20', '', 5, 'AXDSERTT', 1, '12554877', '', 'Active'),
(41, 5, 1, '5 ans', '2019-03-23', '2019-04-20', '', 5, 'AXDSERTT', 1, '12554877', '', 'Active'),
(42, 28, 1, '5 ans', '2010-03-23', '2019-05-27', '', 5, 'AXDSERTT', 13, '12554877', '', 'Active'),
(43, 7, 1, '5 ans', '2019-03-23', '2019-04-20', '', 5, 'AXDSERTT', 1, '12554877', '', 'Expire'),
(44, 8, 1, '5 ans', '2019-03-23', '2019-04-20', '', 5, 'AXDSERTT', 1, '12554877', '', 'Expire'),
(45, 9, 1, '5 ans', '2019-03-23', '2019-04-20', '', 5, 'AXDSERTT', 1, '12554877', '', 'Expire'),
(46, 10, 1, '5 ans', '2019-03-23', '2019-04-20', '', 5, 'AXDSERTT', 1, '12554877', '', 'Expire'),
(47, 11, 1, '5 ans', '2019-03-23', '2019-04-20', '', 5, 'AXDSERTT', 1, '12554877', '', 'Expire'),
(48, 10, 6, '5 ans', '2019-03-01', '2019-03-10', '', 5, '222156', 1, 'aaaaa', '', 'Expire'),
(49, 11, 3, '5 ans', '2010-03-22', '2019-04-02', '', 7, 'aaaaa', 6, 'aaaaaa', '', 'Active'),
(50, 9, 18, '5 ans', '2019-03-24', '2019-04-28', '', 6, 'AXKDME5685685', 1, '215489665', '', 'Active'),
(51, 7, 4, '3 ans', '2019-03-26', '2019-03-30', '', 6, '6549874654', 1, '55875511233', '', 'Expire'),
(52, 1, 2, '3 ans', '2019-03-27', '2019-03-30', '', 5, 'XXSSDDE', 1, '24578', '', 'Active'),
(53, 5, 5, '3 ans', '2019-03-22', '2019-03-31', '', 6, '548751', 6, '54878754', '', 'Active'),
(54, 5, 5, '3 ans', '2019-03-22', '2019-03-31', '', 6, '548751', 1, '54878754', '', 'Active'),
(55, 1, 1, '1 an', '2019-03-27', '2019-03-31', 'xkdmo', 5, 'Ã¹mkpokl', 1, '78787', '', 'Active'),
(56, 10, 9, '5 ans', '2019-03-28', '2019-03-31', '', 5, '2458885522', 1, 'AmineMoumni', '', 'Expire'),
(57, 10, 9, '5 ans', '2019-03-28', '2019-03-31', '', 5, '2458885522', 6, 'AmineMoumni', '', 'Active'),
(58, 13, 15, '3 ans', '2019-03-28', '2019-03-31', 'Yassir', 5, 'ajeuuej', 7, '548785545', '', 'Expire'),
(59, 13, 15, '3 ans', '2019-03-28', '2019-03-31', '', 5, 'ajeuuej', 1, '548785545', '', 'Expire'),
(60, 14, 3, '1 an', '2019-03-28', '2019-03-29', '', 5, 'MLEPLZMEI689765;ioizeÃ¹mlzaÃ´67945', 6, '5498463amlhia', '15549101-sablier-sable-horloge-ou-une-minuterie-isolÃ©-sur-fond-blanc.jpg', 'Active'),
(61, 5, 5, '3 ans', '2010-06-12', '2019-07-13', '', 5, '545ze65az1e', 7, '548784512', '', 'Active'),
(62, 15, 1, '3 ans', '2017-03-24', '2020-03-24', 'ANLCA', 10, 'FG200D4Q16812318;\r\nFG200D4Q16812269;', 8, '', '', 'Active'),
(63, 17, 10, '3 ans', '2018-07-23', '2021-07-23', 'abida@mpm.gov.ma', 11, 'Aucune numero de serie;', 10, '', '', 'Expire'),
(64, 18, 8, '3 ans', '2017-08-07', '2020-08-07', 'Universite IBN ZOHR', 13, 'BAR-WF-936290;', 11, '', '', 'Expire'),
(65, 17, 4, '1 an', '2019-02-28', '2020-03-01', 'oussama', 10, '', 7, 'XC23', '', 'Active'),
(66, 17, 17, '4 ans', '2019-05-25', '2019-06-07', '', 10, '', 7, '', '', 'Active'),
(67, 17, 17, '4 ans', '2019-05-25', '2019-06-07', '', 10, '', 7, '', '', 'Active'),
(68, 17, 17, '4 ans', '2019-05-25', '2019-06-07', '', 10, '', 1, '', '', 'Active'),
(69, 4, 18, '2 ans', '2019-03-27', '2019-03-29', '', 16, '', 13, '', '', 'Expire'),
(70, 4, 18, '2 ans', '2019-03-27', '2019-03-29', '', 16, '', 13, '', '5c63f240e995a_30200c0096c1edbd3e625e3133c238b5836ca6f3.pdf', 'Expire'),
(71, 8, 18, '3 ans', '2019-03-28', '2019-03-30', '', 15, '', 13, '', '', 'Active'),
(72, 8, 18, '3 ans', '2019-03-28', '2019-03-30', '', 15, '', 7, '', '', 'Expire'),
(73, 8, 18, '3 ans', '2019-03-28', '2019-03-30', '', 15, '', 8, '', '', 'Active'),
(74, 8, 18, '3 ans', '2019-03-28', '2019-03-30', '', 15, '', 11, '', '', 'Expire'),
(75, 8, 18, '3 ans', '2019-03-28', '2019-03-30', '', 15, '', 10, '', '', 'Expire'),
(76, 9, 17, '3 ans', '2019-04-02', '2019-04-19', '', 15, '', 8, '', '', 'Expire'),
(77, 6, 2, '4 ans', '2019-04-03', '2019-04-28', '', 16, '', 10, '', '', 'Active');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `IdProduit` int(11) NOT NULL,
  `LibelleProduit` varchar(100) NOT NULL,
  `DesignationProduit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`IdProduit`, `LibelleProduit`, `DesignationProduit`) VALUES
(1, 'Photoshop', 'Adobe'),
(2, 'Premier', 'Adobe'),
(3, 'Office', 'Microsoft'),
(4, 'windows', 'microsoft'),
(5, 'League Of Legends', 'Riot'),
(6, 'Dofus', 'Ankama'),
(7, 'HP', 'HP'),
(8, 'Dell', 'Dell'),
(9, 'Galaxy', 'Samsung'),
(10, 'Iphone', 'Apple'),
(11, 'Mac', 'Apple'),
(13, 'Sublime', 'TEXt'),
(14, 'linux', 'OS'),
(15, 'Fortigate 200D', 'Fortigate 200D'),
(16, 'Barracuda WAFÂ 610', 'Barracuda WAFÂ 610'),
(17, 'Veeam', 'Veeam'),
(18, 'Barracuda WAF 660', 'Barracuda WAF 660'),
(24, 'spotify', 'spotify'),
(26, 'Photoshop', 'Photoshop'),
(28, '', 'Ankama');

-- --------------------------------------------------------

--
-- Structure de la table `reference`
--

CREATE TABLE `reference` (
  `IdReference` int(11) NOT NULL,
  `Reference` varchar(150) NOT NULL,
  `IdProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reference`
--

INSERT INTO `reference` (`IdReference`, `Reference`, `IdProduit`) VALUES
(1, '855486', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tracelicence`
--

CREATE TABLE `tracelicence` (
  `IdTraceLicence` int(11) NOT NULL,
  `IdLicence` int(11) NOT NULL,
  `IdProduit` int(11) NOT NULL,
  `IdTypeLicence` int(11) NOT NULL,
  `Garantie` varchar(50) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `NomEnregistrement` varchar(150) NOT NULL,
  `IdAgent` int(11) NOT NULL,
  `Numerodeserie` varchar(500) NOT NULL,
  `IdContactClient` int(11) NOT NULL,
  `ReferenceMarche` varchar(200) NOT NULL,
  `ImageLicence` varchar(255) NOT NULL,
  `Validation` varchar(50) NOT NULL,
  `DateTrace` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tracelicence`
--

INSERT INTO `tracelicence` (`IdTraceLicence`, `IdLicence`, `IdProduit`, `IdTypeLicence`, `Garantie`, `DateDebut`, `DateFin`, `NomEnregistrement`, `IdAgent`, `Numerodeserie`, `IdContactClient`, `ReferenceMarche`, `ImageLicence`, `Validation`, `DateTrace`) VALUES
(1, 41, 5, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(2, 41, 5, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(3, 41, 5, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(5, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(6, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(8, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(9, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(10, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(11, 41, 5, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(12, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(13, 40, 4, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(14, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(15, 40, 4, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(16, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(17, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(18, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(19, 40, 4, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(20, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(21, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(22, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(23, 41, 5, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(24, 40, 4, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(25, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(26, 39, 3, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(66, 77, 13, 2, '4 ans', '2019-04-03', '2019-04-28', '', 16, '', 10, '', '', 'Active', '2019-04-01'),
(65, 42, 6, 1, '5 ans', '2010-03-23', '2019-05-27', '', 5, 'AXDSERTT', 13, '12554877', '', 'Active', '2019-04-01'),
(30, 50, 9, 18, '5 ans', '2019-03-24', '2019-04-28', 'Ayoub', 5, 'AXKDME5685685', 1, '215489665', '', 'Active', ''),
(31, 40, 4, 1, '5 ans', '2019-03-23', '2019-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(32, 42, 6, 1, '5 ans', '2010-03-23', '2019-05-27', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(64, 42, 6, 1, '5 ans', '2010-03-23', '2019-05-27', '', 5, 'AXDSERTT', 13, '12554877', '', 'Active', '2019-04-01'),
(34, 40, 4, 1, '5 ans', '2018-03-23', '2020-04-20', 'Ismail', 5, 'AXDSERTT', 1, '12554877', '', 'Active', ''),
(35, 50, 9, 18, '2 ans', '2019-03-24', '2019-04-27', 'Ayoub', 5, 'AXKDME5685685', 1, '215489665', '', 'Active', ''),
(36, 50, 9, 18, '2 ans', '2019-03-24', '2019-04-27', 'Ayoub', 5, 'AXKDME5685685', 1, '215489665', '', 'Active', ''),
(37, 50, 9, 18, '5 ans', '2019-03-24', '2019-04-27', 'Ayoub', 5, 'AXKDME5685685', 1, '215489665', '', 'Active', ''),
(38, 50, 9, 18, '1 an', '2019-03-24', '2019-04-27', 'Ayoub', 5, 'AXKDME5685685', 1, '215489665', '', 'Active', ''),
(39, 50, 9, 18, '2 ans', '2019-03-24', '2019-04-27', 'Ayoub', 6, 'AXKDME5685685', 1, '215489665', '', 'Active', ''),
(40, 50, 9, 18, '2 ans', '2019-03-24', '2019-04-27', 'Ayoub', 6, 'AXKDME5685685', 1, '215489665', '', 'Active', '2019-03-25'),
(41, 50, 9, 18, '2 ans', '2019-03-24', '2019-04-27', 'Ayoub', 6, 'AXKDME5685685', 1, '215489665', '', 'Active', '2019-03-25'),
(42, 50, 9, 18, '2 ans', '2019-03-24', '2019-04-28', 'Ayoub', 6, 'AXKDME5685685', 1, '215489665', '', 'Active', '2019-03-26'),
(43, 50, 9, 18, '2 ans', '2019-03-24', '2019-04-28', 'Ayoub', 6, 'AXKDME5685685', 1, '215489665', '', 'Active', '2019-03-26'),
(44, 55, 1, 1, '3 ans', '2019-03-27', '2019-03-31', 'xkdmo', 5, 'Ã¹mkpokl', 1, '78787', '', 'Active', '2019-03-27'),
(45, 55, 1, 1, '1 an', '2019-03-27', '2019-03-31', 'xkdmo', 5, 'Ã¹mkpokl', 1, '78787', '', 'Active', '2019-03-27'),
(46, 57, 10, 9, '5 ans', '2019-03-28', '2019-03-31', '', 5, '2458885522', 6, 'AmineMoumni', '', 'Active', '2019-03-27'),
(47, 59, 13, 15, '3 ans', '2019-03-28', '2019-03-31', '', 5, 'ajeuuej', 1, '548785545', '', 'Active', '2019-03-27'),
(48, 58, 13, 15, '3 ans', '2019-03-28', '2019-03-31', 'Ahmad', 5, 'ajeuuej', 6, '548785545', '', 'Active', '2019-03-27'),
(49, 60, 14, 3, '4 ans', '2019-03-28', '2019-03-31', '', 5, 'MLEPLZMEI689765;ioizeÃ¹mlzaÃ´67945', 7, '5498463amlhia', '15549101-sablier-sable-horloge-ou-une-minuterie-isolÃ©-sur-fond-blanc.jpg', 'Active', '2019-03-27'),
(50, 60, 14, 3, '1 an', '2019-03-28', '2019-03-31', '', 5, 'MLEPLZMEI689765;ioizeÃ¹mlzaÃ´67945', 7, '5498463amlhia', '15549101-sablier-sable-horloge-ou-une-minuterie-isolÃ©-sur-fond-blanc.jpg', 'Active', '2019-03-27'),
(51, 57, 10, 9, '5 ans', '2019-03-28', '2019-03-31', '', 5, '2458885522', 6, 'AmineMoumni', '', 'Active', '2019-03-27'),
(52, 55, 1, 1, '1 an', '2019-03-27', '2019-03-31', 'xkdmo', 5, 'Ã¹mkpokl', 1, '78787', '', 'Active', '2019-03-28'),
(53, 61, 5, 5, '3 ans', '2010-06-12', '2019-07-13', '', 5, '545ze65az1e', 7, '548784512', '', 'Active', '2019-03-29'),
(54, 61, 5, 5, '3 ans', '2010-06-12', '2019-07-13', '', 5, '545ze65az1e', 7, '548784512', '', 'Active', '2019-03-29'),
(55, 61, 5, 5, '3 ans', '2010-06-12', '2019-07-13', '', 5, '545ze65az1e', 7, '548784512', '', 'Active', '2019-03-29'),
(56, 60, 14, 3, '1 an', '2019-03-28', '2019-03-31', '', 5, 'MLEPLZMEI689765;ioizeÃ¹mlzaÃ´67945', 7, '5498463amlhia', '15549101-sablier-sable-horloge-ou-une-minuterie-isolÃ©-sur-fond-blanc.jpg', 'Active', '2019-03-29'),
(57, 64, 18, 8, '3 ans', '2017-08-07', '2020-08-07', 'Universite IBN ZOHR', 13, 'BAR-WF-936290;', 11, '', '', 'Active', '2019-03-29'),
(58, 65, 17, 4, '1 an', '2019-03-29', '2020-03-29', 'oussama', 10, '', 13, 'XC23', '', 'Active', '2019-03-29'),
(59, 65, 17, 4, '1 an', '2019-02-28', '2020-03-01', 'oussama', 10, '', 13, 'XC23', '', 'Active', '2019-03-29'),
(60, 67, 17, 17, '4 ans', '2019-05-25', '2019-06-07', '', 10, '', 13, '', '', 'Active', '2019-03-29'),
(61, 42, 6, 1, '5 ans', '2010-03-23', '2019-05-27', '', 5, 'AXDSERTT', 1, '12554877', '', 'Active', '2019-03-29'),
(62, 42, 6, 1, '5 ans', '2010-03-23', '2019-05-27', '', 5, 'AXDSERTT', 13, '12554877', '', 'Active', '2019-03-29'),
(63, 42, 24, 1, '5 ans', '2010-03-23', '2019-05-27', '', 5, 'AXDSERTT', 13, '12554877', '', 'Active', '2019-03-29');

-- --------------------------------------------------------

--
-- Structure de la table `typelicence`
--

CREATE TABLE `typelicence` (
  `IdTypeLicence` int(11) NOT NULL,
  `LibelleTypeLicence` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typelicence`
--

INSERT INTO `typelicence` (`IdTypeLicence`, `LibelleTypeLicence`) VALUES
(1, 'Full Bandle'),
(2, 'Enregize'),
(3, 'Basic'),
(4, 'Nexpose'),
(5, 'Metasploite PRO'),
(6, 'AppSpider'),
(7, 'FortiGuarde'),
(8, 'Mises a Jour Energize'),
(9, 'Standard'),
(10, 'Support'),
(11, 'Security Plus'),
(12, 'Kaspersky Security For Virtualization'),
(13, 'NetVault Backup Enterprise Capacity Edition'),
(14, 'Pro License LIC-00216702'),
(15, 'ProLicense id-00471153'),
(16, 'Standard Plus'),
(17, 'Kaspersky Anti-Virus'),
(18, 'Total protect'),
(21, 'riot');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`IdAgent`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IdClient`);

--
-- Index pour la table `contactclient`
--
ALTER TABLE `contactclient`
  ADD PRIMARY KEY (`IdContactClient`),
  ADD KEY `IdClient` (`IdClient`);

--
-- Index pour la table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`IdLicence`),
  ADD KEY `idAgent` (`IdAgent`),
  ADD KEY `IdProduit` (`IdProduit`),
  ADD KEY `IdContactClient` (`IdContactClient`),
  ADD KEY `IdTypeLicence` (`IdTypeLicence`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`IdProduit`);

--
-- Index pour la table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`IdReference`),
  ADD KEY `IdProduit` (`IdProduit`);

--
-- Index pour la table `tracelicence`
--
ALTER TABLE `tracelicence`
  ADD PRIMARY KEY (`IdTraceLicence`);

--
-- Index pour la table `typelicence`
--
ALTER TABLE `typelicence`
  ADD PRIMARY KEY (`IdTypeLicence`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `IdAgent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `IdClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `contactclient`
--
ALTER TABLE `contactclient`
  MODIFY `IdContactClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `licence`
--
ALTER TABLE `licence`
  MODIFY `IdLicence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `IdProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `reference`
--
ALTER TABLE `reference`
  MODIFY `IdReference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tracelicence`
--
ALTER TABLE `tracelicence`
  MODIFY `IdTraceLicence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `typelicence`
--
ALTER TABLE `typelicence`
  MODIFY `IdTypeLicence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contactclient`
--
ALTER TABLE `contactclient`
  ADD CONSTRAINT `contactclient_ibfk_1` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`);

--
-- Contraintes pour la table `licence`
--
ALTER TABLE `licence`
  ADD CONSTRAINT `licence_ibfk_2` FOREIGN KEY (`IdProduit`) REFERENCES `produit` (`IdProduit`),
  ADD CONSTRAINT `licence_ibfk_3` FOREIGN KEY (`IdContactClient`) REFERENCES `contactclient` (`IdContactClient`),
  ADD CONSTRAINT `licence_ibfk_4` FOREIGN KEY (`IdTypeLicence`) REFERENCES `typelicence` (`IdTypeLicence`);

--
-- Contraintes pour la table `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `reference_ibfk_1` FOREIGN KEY (`IdProduit`) REFERENCES `produit` (`IdProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
