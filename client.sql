-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 27 nov. 2017 à 23:28
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `client`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `daten` date NOT NULL,
  `adress` varchar(100) NOT NULL,
  `tel` int(100) NOT NULL,
  `id` int(100) NOT NULL,
  `responsable` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`nom`, `prenom`, `daten`, `adress`, `tel`, `id`, `responsable`) VALUES
('OUSSEMA', 'ZAEKJZKN', '2342-04-02', 'SDQDSQ', 2342, 22, '0');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `codeb` float NOT NULL,
  `codeg` float NOT NULL,
  `rib` int(11) NOT NULL,
  `titulaire` varchar(1000) NOT NULL,
  `solde` float NOT NULL,
  `devise` varchar(10) NOT NULL,
  `datecre` date NOT NULL,
  `responsable` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `codeb`, `codeg`, `rib`, `titulaire`, `solde`, `devise`, `datecre`, `responsable`) VALUES
(2, 0, 65701, 33, 'ahmed', 3400, 'EUR', '0042-03-23', ''),
(3, 0, 47322, 33, 'mohamed', 697, 'TND', '0332-02-23', ''),
(6, 0, 27839, 41, 'llll', 0, 'TND', '2432-03-03', 'hanchi Mohamed'),
(7, 0, 14143, 42, 'ppppp', 10000, 'TND', '3333-03-21', 'houcem iset');

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `motdepasse` varchar(100) NOT NULL,
  `poste` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employer`
--

INSERT INTO `employer` (`id`, `nom`, `prenom`, `mail`, `motdepasse`, `poste`) VALUES
(2, 'hanchi', 'ahmed', 'hanchi.ahmed@yahoo.fr', 'hanchi', 'chef'),
(8, 'hanchi', 'Mohamed', 'med@yahoo.fr', 'hhhh', 'employer'),
(9, 'houcem', 'iset', 'houcem@gmail.com', 'iset', '');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `somme` float NOT NULL,
  `benefice` varchar(100) NOT NULL,
  `datedetransaction` datetime NOT NULL,
  `responsable` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`id`, `idclient`, `type`, `somme`, `benefice`, `datedetransaction`, `responsable`) VALUES
(35, 2, 'Virment', 200, 'SO', '2017-11-27 21:51:30', 'hanchi ahmed'),
(36, 0, 'Versment', 2000, 'la banque', '2017-11-27 21:58:34', 'hanchi Mohamed'),
(37, 3, 'Versment', 57, 'la banque', '2017-11-27 21:59:47', 'hanchi Mohamed'),
(38, 5, 'Virement', 690, 'mohamed', '2017-11-27 22:07:08', 'hanchi Mohamed'),
(39, 3, 'Retrait', 300, 'client', '2017-11-27 22:09:44', 'hanchi Mohamed'),
(40, 4, 'Retrait', 200, 'client', '2017-11-27 22:10:12', 'hanchi Mohamed');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
