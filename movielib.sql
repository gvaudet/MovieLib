-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 29 sep. 2022 à 15:55
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `movielib`
--

-- --------------------------------------------------------

--
-- Structure de la table `attendees`
--

CREATE TABLE `attendees` (
  `id` int(11) NOT NULL,
  `film_id` int(11) DEFAULT NULL,
  `people_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Aventure'),
(2, 'Guerre'),
(3, 'Action'),
(4, 'Comédie'),
(5, 'Drame'),
(6, 'Comédie dramatique'),
(7, 'Fiction jeunesse'),
(8, 'Musical'),
(9, 'Policier'),
(10, 'Espionnage'),
(11, 'Science fiction'),
(12, 'Fantastique'),
(13, 'Horreur'),
(14, 'Western'),
(15, 'Documentaire');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220929084757', '2022-09-29 08:50:30', 136),
('DoctrineMigrations\\Version20220929092228', '2022-09-29 09:26:36', 291),
('DoctrineMigrations\\Version20220929103227', '2022-09-29 10:33:25', 135),
('DoctrineMigrations\\Version20220929120445', '2022-09-29 12:05:34', 81),
('DoctrineMigrations\\Version20220929144927', '2022-09-29 14:50:31', 85);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `title`, `release_date`, `poster`, `description`, `duration`) VALUES
(1, 'Bienvenue à Zombiland', '2009-11-25', 'zombiland.jpg', 'Suite à une mutation du virus de la vache folle, les humains sont transformés en zombies. Deux survivants que tout oppose, sillonnent les routes et affrontent les zombies qui grouillent aux quatre coins du pays.', '01:28:00'),
(2, 'Mon nom est personne ', '2022-09-29', NULL, NULL, '01:17:00'),
(3, 'Dieu pardonne... moi pas! ', '1967-09-29', NULL, NULL, '01:49:00'),
(4, 'On l\'appelle Trinita', '1970-09-29', NULL, NULL, '01:13:00'),
(5, 'Deux super-flics', '1977-09-29', NULL, NULL, '01:55:00');

-- --------------------------------------------------------

--
-- Structure de la table `film_category`
--

CREATE TABLE `film_category` (
  `id` int(11) NOT NULL,
  `film_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `label` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `job`
--

INSERT INTO `job` (`id`, `label`) VALUES
(1, 'Acteur'),
(2, 'Réalisateur'),
(3, 'Accessoiriste'),
(4, 'Chef décorateur'),
(5, 'Cascadeur');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`id`, `lastname`, `firstname`, `birth_date`, `picture`, `biography`) VALUES
(1, 'Hill', 'Terence', '1939-03-29', 'terenceHill.jpg', 'Mario Girotti, dit Terence Hill, est un acteur, réalisateur, scénariste et producteur italo-américain, né le 29 mars 1939 à Venise. Il a débuté au cinéma sous son vrai nom, Mario Girotti, avant d\'adopter son nom de scène Terence Hill en 1967.'),
(2, 'Spencer', 'Bud', '1929-10-31', 'budSpencer.jpg', NULL),
(3, 'Harrelson', 'Woody', '1961-07-23', 'woodyHarrelson.jpg', NULL),
(4, 'Eisenberg', 'Jesse', '1983-10-05', 'jesseEisenberg.jpg', NULL),
(5, 'Stone ', 'Emma', '1988-11-06', 'emmaStone.jpg', NULL),
(6, 'frev', 'cec', '2018-02-02', 'vqcsd', 'zdsc');

-- --------------------------------------------------------

--
-- Structure de la table `people_jobs`
--

CREATE TABLE `people_jobs` (
  `id` int(11) NOT NULL,
  `people_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C8C96B25567F5183` (`film_id`),
  ADD KEY `IDX_C8C96B253147C936` (`people_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `film_category`
--
ALTER TABLE `film_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A4CBD6A8567F5183` (`film_id`),
  ADD KEY `IDX_A4CBD6A812469DE2` (`category_id`);

--
-- Index pour la table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `people_jobs`
--
ALTER TABLE `people_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AA5AA1753147C936` (`people_id`),
  ADD KEY `IDX_AA5AA175BE04EA9` (`job_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `film_category`
--
ALTER TABLE `film_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `people_jobs`
--
ALTER TABLE `people_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `FK_C8C96B253147C936` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `FK_C8C96B25567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Contraintes pour la table `film_category`
--
ALTER TABLE `film_category`
  ADD CONSTRAINT `FK_A4CBD6A812469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_A4CBD6A8567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Contraintes pour la table `people_jobs`
--
ALTER TABLE `people_jobs`
  ADD CONSTRAINT `FK_AA5AA1753147C936` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `FK_AA5AA175BE04EA9` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
