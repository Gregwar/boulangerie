-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 03 oct. 2023 à 21:43
-- Version du serveur : 8.0.34-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boulangerie`
--
CREATE DATABASE IF NOT EXISTS `boulangerie` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `boulangerie`;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Délice Mystérieux', 'Une création enigmatique mêlant saveurs de lune et d\'étoiles. Un voyage intergalactique pour vos papilles.', '9.99'),
(2, 'Tourbillon Sucré', 'Un tourbillon sucré de bonheur avec des notes de licorne et de rires d\'enfants. Magique et délicieux !', '12.50'),
(3, 'Éclipse de Chocolat', 'Une éclipse totale de chocolat noir enveloppant des morceaux de comètes croustillantes. À déguster avec précaution !', '14.99'),
(4, 'Chantilly Étoilée', 'Une crème chantilly légère comme l\'air, saupoudrée de poussière de fée et de pétales de roses lunaires. Irrésistible !', '11.75'),
(5, 'Tarte aux Éclairs Arc-en-Ciel', 'Une tarte multicolore aux éclairs enchantés, garnie de crème de licorne et de poudre de rêves. Un festin visuel et gustatif !', '15.25'),
(6, 'Gâteau des Mille Feuilles Magiques', 'Un gâteau envoûtant composé de mille feuilles de bonheur, nappé d\'une cascade de confettis enchantés et de rires d\'elfes. Un délice mystique !', '18.99'),
(7, 'Rêve de Caramel Galactique', 'Un rêve sucré venu des confins de l\'univers, avec des filets de caramel doré coulant comme des étoiles filantes. À savourer les yeux fermés !', '13.50'),
(8, 'Pâtisserie Arcane', 'Une création secrète des alchimistes culinaires, mêlant des ingrédients mystiques et des épices envoûtantes. Une expérience gustative ésotérique !', '16.75'),
(9, 'Château de Chantilly Enchanté', 'Un château fait de chantilly légère et de biscuits magiques, orné de tours de sucre filé et de jardins de bonbons. Un chef-d\'œuvre sucré !', '22.00'),
(10, 'Éclair de Lune', 'Un éclair à la crème de lune, saupoudré de poussière d\'étoiles et de morceaux de météorites en sucre. Une explosion de saveurs cosmiques !', '10.99'),
(11, 'Tarte aux Pommes Ensorcelée', 'Une tarte aux pommes envoûtante, préparée avec des pommes magiques cueillies à la lueur de la pleine lune. Un sortilège de douceur et de saveurs !', '12.99'),
(12, 'Gâteau de l\'Univers', 'Un gâteau représentant l\'univers entier, avec des galaxies en crème et des étoiles en sucre. Un voyage interstellaire dans chaque bouchée !', '19.50'),
(13, 'Magie de Framboise', 'Un dessert ensorcelant à base de framboises fraîches, de magie sucrée et de sourires d\'elfes. Une explosion de fraîcheur et de délice !', '14.25'),
(14, 'Pépite de Licorne', 'Une pépite dorée de bonheur licornesque, enrobée de chocolat magique et de poudre de bonheur. Un trésor sucré à découvrir !', '8.75'),
(15, 'Tartelette aux Rêves Perdus', 'Une tartelette délicate garnie de crème de rêves perdus, de confiture d\'étoiles filantes et de brumes sucrées. Un dessert mélancoliquement délicieux !', '11.25'),
(16, 'Nuage de Vanille Céleste', 'Un nuage moelleux de vanille céleste, flottant sur un océan de crème anglaise et de poussière d\'étoiles. Un paradis sucré dans chaque cuillerée !', '9.50'),
(17, 'Éclair Enchanté au Chocolat', 'Un éclair envoûtant fourré de crème de chocolat magique, saupoudré de poudre de fée et de pétales de roses lunaires. Une gourmandise ensorcelante !', '10.99'),
(18, 'Fleur de Citron Arc-en-Ciel', 'Une fleur de citron aux pétales multicolores, infusée de magie citronnée et de rayons de soleil sucrés. Un dessert ensoleillé et acidulé !', '7.99'),
(19, 'Gâteau des Sirènes', 'Un gâteau éblouissant aux couleurs des sirènes, avec des vagues de crème ondoyantes et des perles de sucre scintillantes. Une merveille sucrée des profondeurs marines !', '21.75'),
(20, 'Tarte aux Fruits de l\'Arc-en-Ciel', 'Une tarte aux fruits éclatante de couleurs, garnie des fruits les plus exotiques des terres arc-en-ciel. Un festival de saveurs fruitées et sucrées !', '16.50');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
