-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 21 mai 2023 à 09:28
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `twixer`
--

-- --------------------------------------------------------

--
-- Structure de la table `tweets`
--

CREATE TABLE `tweets` (
  `tweet_id` int NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tweets`
--

INSERT INTO `tweets` (`tweet_id`, `content`, `created_at`, `user_id`) VALUES
(68, 'j\'ai adopté 6 chatons', '2023-05-18 20:17:27', 1),
(69, 'chat', '2023-05-18 20:17:35', 1),
(71, 'Elon Musk est très riche', '2023-05-19 22:14:07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `photo`) VALUES
(1, 'Inès', 'VarelaDaVeiga', 'vareladaveigaines@hotmail.com', 'dqqcqqc', ''),
(2, 'Billie', 'Eilish', 'billie@gmail.com', 'efhezoifh', 'https://picsum.photos/200'),
(9, 'john', 'BigJ', 'john@gmail.com', 'egerg', 'https://picsum.photos/200'),
(10, 'john', 'BigJ', 'john@gmail.com', 'egerg', 'https://picsum.photos/200'),
(11, 'john', 'BigJ', 'johndoe@gmail.com', 'thhrth', 'https://picsum.photos/200'),
(12, 'john', 'BigJ', 'johndoe@gmail.com', 'thhrth', 'https://picsum.photos/200'),
(13, 'john', 'BigJ', 'johndoe@gmail.com', 'fefref', 'https://picsum.photos/200'),
(14, 'In&#232;s', 'VarelaDaVeiga', 'vareladaveigaines@hotmail.com', 'dzadaz', 'https://picsum.photos/200'),
(15, 'john', 'BigJ', 'johndoe@gmail.com', 'grgreg', 'https://picsum.photos/200');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`tweet_id`),
  ADD KEY `tweets_ibfk_1` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `tweet_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
