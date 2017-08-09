-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 09 Août 2017 à 13:28
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `pigemedia`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `pnom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `atype` varchar(50) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `pnom`, `email`, `username`, `password`, `atype`, `date_creation`, `date_modification`) VALUES
(1, 'Admin', 'Pigemedia', 'admin@pigemedia.mg', 'admin', '57d49e19a7dac2f7b70815ba390ac271', 'admin', '2017-08-09 09:00:00', '2017-08-09 14:54:31'),
(2, 'qsdqsdq', 'qsdqsd', 'qsdqsdlkqslk@qsdqs.fr', 'test', '098f6bcd4621d373cade4e832627b4f6', 'pigiste', '2017-08-09 13:16:00', '2017-08-09 13:16:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;