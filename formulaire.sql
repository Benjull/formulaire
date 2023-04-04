-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 avr. 2023 à 08:55
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `title` varchar(255) DEFAULT NULL,
  `authors` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` varchar(128) NOT NULL,
  `livre_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`title`, `authors`, `image`, `user_id`, `livre_id`) VALUES
('Industrialiser le test fonctionnel - 2e édition', 'Bruno Legeard', 'http://books.google.com/books/content?id=AhlW0D88CxkC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE711uznOS3wPngUtV7osyeIxWDGYpChWHMZU-g1BQGChA03lj-EUi9UwG6eUTK__BY9GHfM-_Eab4aIwCo5CqnPwAz9jkWyhSI4zSr4Lf7ysy41ZCXcysGBkmZKNUcHgxpC-YOrn&source=gbs_', '6', 'AhlW0D88CxkC'),
('Test des circuits intégrés numériques', 'Unknown', 'http://books.google.com/books/content?id=Cj-ys7PJTZEC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE73HMWRAH0s1G5Kybp_-Vw2uJeW_ix9JkKckWvspLLqWDtkt9mI9Zh0vXWlkWP7nyBTxdLgsFKC81TrDhd7kWKRn_hy7MyiW5cg76W0Lx0QK8g-foZC7_kIPziA8n7S9C2Jfo670&source=gbs_', '1', 'Cj-ys7PJTZEC');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`username`, `password`, `id`, `email`) VALUES
('test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 1, 'test@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
