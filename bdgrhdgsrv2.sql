-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 27 déc. 2019 à 12:11
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdgrhdgsrv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectations_personnels`
--

DROP TABLE IF EXISTS `affectations_personnels`;
CREATE TABLE IF NOT EXISTS `affectations_personnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annulation_id` int(11) DEFAULT NULL,
  `fonction_id` int(11) DEFAULT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `decision_affectation_id` int(11) DEFAULT NULL,
  `date_affectation` date NOT NULL,
  `date_disponibilite` date DEFAULT NULL,
  `reference_disponibilite` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_reference_disponibilite` date DEFAULT NULL,
  `motif_affectation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situation` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motif_annulation` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unite_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8183605FC7E10D1C` (`annulation_id`),
  KEY `IDX_8183605F57889920` (`fonction_id`),
  KEY `IDX_8183605F1C109075` (`personnel_id`),
  KEY `IDX_8183605FBD502D07` (`decision_affectation_id`),
  KEY `IDX_8183605FEC4A74AB` (`unite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `affectations_personnels`
--

INSERT INTO `affectations_personnels` (`id`, `annulation_id`, `fonction_id`, `personnel_id`, `decision_affectation_id`, `date_affectation`, `date_disponibilite`, `reference_disponibilite`, `date_reference_disponibilite`, `motif_affectation`, `situation`, `motif_annulation`, `unite_id`) VALUES
(1, NULL, 1, 1, 1, '2019-12-10', '2019-12-10', '10/dgsr/dt/sit/19', '2019-12-10', 'renforcement d\'équipe', NULL, 'NA', 1);

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

DROP TABLE IF EXISTS `communes`;
CREATE TABLE IF NOT EXISTS `communes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `commune` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5C5EE2A5C54C8C93` (`type_id`),
  KEY `IDX_5C5EE2A5B08FA272` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `communes`
--

INSERT INTO `communes` (`id`, `type_id`, `district_id`, `commune`) VALUES
(1, 1, 1, 'ANTANANARIVO I');

-- --------------------------------------------------------

--
-- Structure de la table `conjoints`
--

DROP TABLE IF EXISTS `conjoints`;
CREATE TABLE IF NOT EXISTS `conjoints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commune_id` int(11) DEFAULT NULL,
  `personnel_id` int(11) DEFAULT NULL,
  `rang` int(11) NOT NULL,
  `nom` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_pere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_mere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `date_mariage` date NOT NULL,
  `numero_cin` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_cin` date NOT NULL,
  `lieu_cin` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_autorisation_mariage` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_reference_autorisation_mariage` date DEFAULT NULL,
  `lieu_mariage` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_officiel_mariage` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_reference_officiel_mariage` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_65902217131A4F72` (`commune_id`),
  KEY `IDX_659022171C109075` (`personnel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `decisions_affectations`
--

DROP TABLE IF EXISTS `decisions_affectations`;
CREATE TABLE IF NOT EXISTS `decisions_affectations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_decision` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_decision` date NOT NULL,
  `genre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `decisions_affectations`
--

INSERT INTO `decisions_affectations` (`id`, `reference_decision`, `date_decision`, `genre`) VALUES
(1, '048/DGDSR/DT/SIT', '2019-12-10', 'affectation de renforcement d\'équipe');

-- --------------------------------------------------------

--
-- Structure de la table `decisions_promotions`
--

DROP TABLE IF EXISTS `decisions_promotions`;
CREATE TABLE IF NOT EXISTS `decisions_promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_decision` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_decision` date NOT NULL,
  `genre_decision` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `decisions_radiations_controles`
--

DROP TABLE IF EXISTS `decisions_radiations_controles`;
CREATE TABLE IF NOT EXISTS `decisions_radiations_controles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_decision` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_reference` date NOT NULL,
  `reference_journal_officiel` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_journal_officiel` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `decorations`
--

DROP TABLE IF EXISTS `decorations`;
CREATE TABLE IF NOT EXISTS `decorations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `decorations`
--

INSERT INTO `decorations` (`id`, `libelle`, `abbreviation`, `ordre`) VALUES
(1, 'officier de l\'ordre national', 'OON', 6);

-- --------------------------------------------------------

--
-- Structure de la table `decorations_personnels`
--

DROP TABLE IF EXISTS `decorations_personnels`;
CREATE TABLE IF NOT EXISTS `decorations_personnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnel_id` int(11) DEFAULT NULL,
  `decoration_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `reference` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_reference` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F88E70D31C109075` (`personnel_id`),
  KEY `IDX_F88E70D33446DFC4` (`decoration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `details_motifs_radiations_controles`
--

DROP TABLE IF EXISTS `details_motifs_radiations_controles`;
CREATE TABLE IF NOT EXISTS `details_motifs_radiations_controles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_motif_radiation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

DROP TABLE IF EXISTS `diplomes`;
CREATE TABLE IF NOT EXISTS `diplomes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine_id` int(11) NOT NULL,
  `niveau_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_diplome_militaire` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8A81EFD14272FC9F` (`domaine_id`),
  KEY `IDX_8A81EFD1B3E9C81` (`niveau_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `diplomes_personnels`
--

DROP TABLE IF EXISTS `diplomes_personnels`;
CREATE TABLE IF NOT EXISTS `diplomes_personnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diplome_id` int(11) NOT NULL,
  `personnel_id` int(11) NOT NULL,
  `numero` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A26590CA26F859E2` (`diplome_id`),
  KEY `IDX_A26590CA1C109075` (`personnel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `district` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_68E318DC98260155` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `districts`
--

INSERT INTO `districts` (`id`, `region_id`, `district`) VALUES
(1, 1, 'ANTANANARIVO RENIVOHITRA');

-- --------------------------------------------------------

--
-- Structure de la table `domaine_diplome`
--

DROP TABLE IF EXISTS `domaine_diplome`;
CREATE TABLE IF NOT EXISTS `domaine_diplome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domaine_diplome`
--

INSERT INTO `domaine_diplome` (`id`, `libelle`) VALUES
(1, 'INFORMATIQUE');

-- --------------------------------------------------------

--
-- Structure de la table `droits_pensions`
--

DROP TABLE IF EXISTS `droits_pensions`;
CREATE TABLE IF NOT EXISTS `droits_pensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `droits_pensions`
--

INSERT INTO `droits_pensions` (`id`, `libelle`) VALUES
(1, 'pension alimentaire');

-- --------------------------------------------------------

--
-- Structure de la table `enfants`
--

DROP TABLE IF EXISTS `enfants`;
CREATE TABLE IF NOT EXISTS `enfants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnel_id` int(11) DEFAULT NULL,
  `rang` int(11) NOT NULL,
  `nom` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `qualite` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_decede` tinyint(1) NOT NULL,
  `date_dece` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23E2BAC31C109075` (`personnel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ex_conjoints`
--

DROP TABLE IF EXISTS `ex_conjoints`;
CREATE TABLE IF NOT EXISTS `ex_conjoints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conjoint_id` int(11) NOT NULL,
  `motif_rupture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_rupture` date NOT NULL,
  `reference_rupture` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_reference_rupture` date NOT NULL,
  `adresse_veuve` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_444385BD5E8D7836` (`conjoint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

DROP TABLE IF EXISTS `fonctions`;
CREATE TABLE IF NOT EXISTS `fonctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hierarchie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fonctions`
--

INSERT INTO `fonctions` (`id`, `libelle`, `abbreviation`, `hierarchie`) VALUES
(1, 'developpeur informatique et administrateur réseaux', 'DIAR', 1);

-- --------------------------------------------------------

--
-- Structure de la table `fonctions_conjoints`
--

DROP TABLE IF EXISTS `fonctions_conjoints`;
CREATE TABLE IF NOT EXISTS `fonctions_conjoints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_contrat_id` int(11) DEFAULT NULL,
  `conjoint_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu_travail` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_employeur` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_fonctionnaire` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F5A902C0520D03A` (`type_contrat_id`),
  KEY `IDX_F5A902C05E8D7836` (`conjoint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rang` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `abbreviation`, `rang`) VALUES
(1, 'GENDARME DE DEUXIèME CLASS', 'G2C', 1);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191203075429', '2019-12-03 07:54:48'),
('20191203080019', '2019-12-03 08:00:27'),
('20191203080612', '2019-12-03 08:06:22'),
('20191203081202', '2019-12-03 08:12:11'),
('20191203081634', '2019-12-03 08:16:52'),
('20191203082802', '2019-12-03 08:28:29'),
('20191203085226', '2019-12-03 08:52:34'),
('20191203100022', '2019-12-03 10:00:31'),
('20191203100138', '2019-12-03 10:01:45'),
('20191203100958', '2019-12-03 10:10:05'),
('20191203101723', '2019-12-03 10:17:32'),
('20191203102453', '2019-12-03 10:25:14'),
('20191203103307', '2019-12-03 10:33:24'),
('20191203104228', '2019-12-03 10:42:39'),
('20191203104549', '2019-12-03 10:45:56'),
('20191203105104', '2019-12-03 10:51:30'),
('20191203105447', '2019-12-03 10:55:24'),
('20191203110829', '2019-12-03 11:08:51'),
('20191203111252', '2019-12-03 11:13:05'),
('20191203111546', '2019-12-03 11:15:57'),
('20191203112148', '2019-12-03 11:22:05'),
('20191203113140', '2019-12-03 11:33:20'),
('20191203114532', '2019-12-03 11:45:42'),
('20191203115309', '2019-12-03 11:53:20'),
('20191203115801', '2019-12-03 11:58:08'),
('20191203120258', '2019-12-03 12:03:21'),
('20191203121214', '2019-12-03 12:12:25'),
('20191203122006', '2019-12-03 12:20:24'),
('20191203122521', '2019-12-03 12:25:32'),
('20191203122837', '2019-12-03 12:28:45'),
('20191203123331', '2019-12-03 12:33:39'),
('20191203123531', '2019-12-03 12:35:39'),
('20191203124434', '2019-12-03 12:44:49'),
('20191203125521', '2019-12-03 12:55:34'),
('20191203130300', '2019-12-03 13:03:16'),
('20191206114330', '2019-12-06 11:43:48'),
('20191209102835', '2019-12-09 10:28:50'),
('20191210112942', '2019-12-10 11:30:18'),
('20191210115338', '2019-12-10 11:53:53'),
('20191210125432', '2019-12-10 12:54:46'),
('20191211060851', '2019-12-11 06:09:09');

-- --------------------------------------------------------

--
-- Structure de la table `motifs_radiations_controles`
--

DROP TABLE IF EXISTS `motifs_radiations_controles`;
CREATE TABLE IF NOT EXISTS `motifs_radiations_controles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau_diplome`
--

DROP TABLE IF EXISTS `niveau_diplome`;
CREATE TABLE IF NOT EXISTS `niveau_diplome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveau_diplome`
--

INSERT INTO `niveau_diplome` (`id`, `libelle`) VALUES
(1, 'BACC +2');

-- --------------------------------------------------------

--
-- Structure de la table `nominations_personnels`
--

DROP TABLE IF EXISTS `nominations_personnels`;
CREATE TABLE IF NOT EXISTS `nominations_personnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `personnel_id` int(11) NOT NULL,
  `decision_id` int(11) NOT NULL,
  `date_nomination` date NOT NULL,
  `rang` int(11) NOT NULL,
  `echelon` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `indice` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_18D5F23EFE19A1A8` (`grade_id`),
  KEY `IDX_18D5F23E1C109075` (`personnel_id`),
  KEY `IDX_18D5F23EBDEE7539` (`decision_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notes_personnels`
--

DROP TABLE IF EXISTS `notes_personnels`;
CREATE TABLE IF NOT EXISTS `notes_personnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnel_id` int(11) NOT NULL,
  `date_note` date NOT NULL,
  `note` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appreciation_global` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_note` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_reference` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_220A7DAF1C109075` (`personnel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notes_pos`
--

DROP TABLE IF EXISTS `notes_pos`;
CREATE TABLE IF NOT EXISTS `notes_pos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnels_id` int(11) DEFAULT NULL,
  `annee` date NOT NULL,
  `qf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `potentiel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appreciation_complet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personnel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_69F92C0BC7022806` (`personnels_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnel_id` int(11) NOT NULL,
  `annee` date NOT NULL,
  `date_depart` date NOT NULL,
  `date_fin` date NOT NULL,
  `duree` int(11) NOT NULL,
  `reliquat` int(11) NOT NULL,
  `type_permission` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu_jouissance` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2DEDCC6F1C109075` (`personnel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `personnel_id`, `annee`, `date_depart`, `date_fin`, `duree`, `reliquat`, `type_permission`, `lieu_jouissance`) VALUES
(1, 1, '2019-12-16', '2019-12-15', '2019-12-15', 5, 10, 'congé annuelle', 'antananarivo');

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

DROP TABLE IF EXISTS `personnels`;
CREATE TABLE IF NOT EXISTS `personnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenoms` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_pere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_mere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_cin` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_cin` date NOT NULL,
  `lieu_cin` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `est_marie` tinyint(1) NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_ice` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_embauche` date NOT NULL,
  `matricule` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cnaps` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `est_militaire` tinyint(1) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `contrat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7AC38C2B1823061F` (`contrat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnels`
--

INSERT INTO `personnels` (`id`, `nom`, `prenoms`, `date_naissance`, `lieu_naissance`, `nom_pere`, `nom_mere`, `num_cin`, `date_cin`, `lieu_cin`, `sexe`, `est_marie`, `adresse`, `telephone`, `telephone_ice`, `date_embauche`, `matricule`, `numero_cnaps`, `est_militaire`, `actif`, `contrat_id`) VALUES
(1, 'ANDRIANTSOA', 'Husayn Mozart', '1988-01-30', 'Ivato Aéroport', 'ANDRIANTSOA Thierry Florent', 'RAVELONORO Honorine', '10311010867', '2006-11-06', 'AMBOHIDRATRIMO', 0, 0, '154/K3 Ivato Aéroport', '0343112324', '0324231065', '2019-03-03', NULL, NULL, 0, 1, 1),
(2, 'RAKOTOMALALA', 'Jean Freddy', '1973-12-13', 'ambovombe', 'aaaaa', 'bbbbb', '102547896325', '2019-12-10', 'AMBOHIDRATRIMO', 0, 1, 'fgdsgdfgsdf', '0236985478', '0365488555', '2019-12-10', NULL, NULL, 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnel_id` int(11) NOT NULL,
  `photo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_876E0D91C109075` (`personnel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id`, `personnel_id`, `photo`) VALUES
(1, 1, 'moz-5def433200c0e.jpeg'),
(2, 2, 'teste_image-5defa92fd14a6.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provinces`
--

INSERT INTO `provinces` (`id`, `province`) VALUES
(1, 'ANTANANARIVO');

-- --------------------------------------------------------

--
-- Structure de la table `punitions`
--

DROP TABLE IF EXISTS `punitions`;
CREATE TABLE IF NOT EXISTS `punitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnel_id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_reference` date NOT NULL,
  `date_effet` date DEFAULT NULL,
  `sanction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3DED35911C109075` (`personnel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `radiations_personnels`
--

DROP TABLE IF EXISTS `radiations_personnels`;
CREATE TABLE IF NOT EXISTS `radiations_personnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnel_id` int(11) NOT NULL,
  `motif_radiation_id` int(11) DEFAULT NULL,
  `detail_motif_radiation_id` int(11) DEFAULT NULL,
  `decision_radiation_id` int(11) DEFAULT NULL,
  `droit_pension_id` int(11) DEFAULT NULL,
  `date_notification` date NOT NULL,
  `lieu_repli` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_radiation` date NOT NULL,
  `date_prevu_radiation` date DEFAULT NULL,
  `reference_mrc_radiation` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_mrc_radiation` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9E9D70DE1C109075` (`personnel_id`),
  KEY `IDX_9E9D70DEA0039483` (`motif_radiation_id`),
  KEY `IDX_9E9D70DE855EBC40` (`detail_motif_radiation_id`),
  KEY `IDX_9E9D70DE4CB75E69` (`decision_radiation_id`),
  KEY `IDX_9E9D70DEBE088238` (`droit_pension_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `region` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A26779F3E946114A` (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `province_id`, `region`) VALUES
(1, 1, 'ANALAMANGA');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'ADMINISTRATEUR'),
(2, 'SUPERVISEUR'),
(3, 'MILITAIRE'),
(4, 'CIVIL');

-- --------------------------------------------------------

--
-- Structure de la table `types_communes`
--

DROP TABLE IF EXISTS `types_communes`;
CREATE TABLE IF NOT EXISTS `types_communes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `types_communes`
--

INSERT INTO `types_communes` (`id`, `type`) VALUES
(1, 'URBAINE'),
(2, 'SUB-URBAINE'),
(3, 'RURALE');

-- --------------------------------------------------------

--
-- Structure de la table `types_contrats`
--

DROP TABLE IF EXISTS `types_contrats`;
CREATE TABLE IF NOT EXISTS `types_contrats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `types_contrats`
--

INSERT INTO `types_contrats` (`id`, `type`) VALUES
(1, 'CDI');

-- --------------------------------------------------------

--
-- Structure de la table `unites`
--

DROP TABLE IF EXISTS `unites`;
CREATE TABLE IF NOT EXISTS `unites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commune_id` int(11) NOT NULL,
  `unite_superieur_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localite` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_87F339C131A4F72` (`commune_id`),
  KEY `IDX_87F339CCBAC5C92` (`unite_superieur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `unites`
--

INSERT INTO `unites` (`id`, `commune_id`, `unite_superieur_id`, `libelle`, `abbreviation`, `localite`, `email`, `phone`) VALUES
(1, 1, NULL, 'service informatique et télécommunication', 'SIT', 'Alarobia ivandry', 'dgsrsit@gmail.com', '0341539347');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rolesimple` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  KEY `IDX_8D93D649FB88E14F` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `rolesimple`, `utilisateur_id`) VALUES
(1, 'superadmin@srh.mg', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$OE5RVC5uMWxwS2JjdHFaMA$qbdyqIayVKWnQ2R/BZdnKVBpTMEtDKS9Tfq5FISkXDM', 'ADMIN', 1),
(2, 'teste', '[\"ROLE_CIVIL\"]', '$argon2id$v=19$m=65536,t=4,p=1$MWY0RWdSaURCejJEQjZzZw$zqs1Sp7K1/evPFMYDlkOOGf2rCGfWuyQZvGKiwc0UfU', 'CIVIL', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectations_personnels`
--
ALTER TABLE `affectations_personnels`
  ADD CONSTRAINT `FK_8183605F1C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`),
  ADD CONSTRAINT `FK_8183605F57889920` FOREIGN KEY (`fonction_id`) REFERENCES `fonctions` (`id`),
  ADD CONSTRAINT `FK_8183605FBD502D07` FOREIGN KEY (`decision_affectation_id`) REFERENCES `decisions_affectations` (`id`),
  ADD CONSTRAINT `FK_8183605FC7E10D1C` FOREIGN KEY (`annulation_id`) REFERENCES `decisions_affectations` (`id`),
  ADD CONSTRAINT `FK_8183605FEC4A74AB` FOREIGN KEY (`unite_id`) REFERENCES `unites` (`id`);

--
-- Contraintes pour la table `communes`
--
ALTER TABLE `communes`
  ADD CONSTRAINT `FK_5C5EE2A5B08FA272` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `FK_5C5EE2A5C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `types_communes` (`id`);

--
-- Contraintes pour la table `conjoints`
--
ALTER TABLE `conjoints`
  ADD CONSTRAINT `FK_65902217131A4F72` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`),
  ADD CONSTRAINT `FK_659022171C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `decorations_personnels`
--
ALTER TABLE `decorations_personnels`
  ADD CONSTRAINT `FK_F88E70D31C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`),
  ADD CONSTRAINT `FK_F88E70D33446DFC4` FOREIGN KEY (`decoration_id`) REFERENCES `decorations` (`id`);

--
-- Contraintes pour la table `diplomes`
--
ALTER TABLE `diplomes`
  ADD CONSTRAINT `FK_8A81EFD14272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine_diplome` (`id`),
  ADD CONSTRAINT `FK_8A81EFD1B3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau_diplome` (`id`);

--
-- Contraintes pour la table `diplomes_personnels`
--
ALTER TABLE `diplomes_personnels`
  ADD CONSTRAINT `FK_A26590CA1C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`),
  ADD CONSTRAINT `FK_A26590CA26F859E2` FOREIGN KEY (`diplome_id`) REFERENCES `diplomes` (`id`);

--
-- Contraintes pour la table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `FK_68E318DC98260155` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD CONSTRAINT `FK_23E2BAC31C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `ex_conjoints`
--
ALTER TABLE `ex_conjoints`
  ADD CONSTRAINT `FK_444385BD5E8D7836` FOREIGN KEY (`conjoint_id`) REFERENCES `conjoints` (`id`);

--
-- Contraintes pour la table `fonctions_conjoints`
--
ALTER TABLE `fonctions_conjoints`
  ADD CONSTRAINT `FK_F5A902C0520D03A` FOREIGN KEY (`type_contrat_id`) REFERENCES `types_contrats` (`id`),
  ADD CONSTRAINT `FK_F5A902C05E8D7836` FOREIGN KEY (`conjoint_id`) REFERENCES `conjoints` (`id`);

--
-- Contraintes pour la table `nominations_personnels`
--
ALTER TABLE `nominations_personnels`
  ADD CONSTRAINT `FK_18D5F23E1C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`),
  ADD CONSTRAINT `FK_18D5F23EBDEE7539` FOREIGN KEY (`decision_id`) REFERENCES `decisions_promotions` (`id`),
  ADD CONSTRAINT `FK_18D5F23EFE19A1A8` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`);

--
-- Contraintes pour la table `notes_personnels`
--
ALTER TABLE `notes_personnels`
  ADD CONSTRAINT `FK_220A7DAF1C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `notes_pos`
--
ALTER TABLE `notes_pos`
  ADD CONSTRAINT `FK_69F92C0BC7022806` FOREIGN KEY (`personnels_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `FK_2DEDCC6F1C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD CONSTRAINT `FK_7AC38C2B1823061F` FOREIGN KEY (`contrat_id`) REFERENCES `types_contrats` (`id`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `FK_876E0D91C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `punitions`
--
ALTER TABLE `punitions`
  ADD CONSTRAINT `FK_3DED35911C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `radiations_personnels`
--
ALTER TABLE `radiations_personnels`
  ADD CONSTRAINT `FK_9E9D70DE1C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`),
  ADD CONSTRAINT `FK_9E9D70DE4CB75E69` FOREIGN KEY (`decision_radiation_id`) REFERENCES `decisions_radiations_controles` (`id`),
  ADD CONSTRAINT `FK_9E9D70DE855EBC40` FOREIGN KEY (`detail_motif_radiation_id`) REFERENCES `details_motifs_radiations_controles` (`id`),
  ADD CONSTRAINT `FK_9E9D70DEA0039483` FOREIGN KEY (`motif_radiation_id`) REFERENCES `motifs_radiations_controles` (`id`),
  ADD CONSTRAINT `FK_9E9D70DEBE088238` FOREIGN KEY (`droit_pension_id`) REFERENCES `droits_pensions` (`id`);

--
-- Contraintes pour la table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `FK_A26779F3E946114A` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Contraintes pour la table `unites`
--
ALTER TABLE `unites`
  ADD CONSTRAINT `FK_87F339C131A4F72` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`),
  ADD CONSTRAINT `FK_87F339CCBAC5C92` FOREIGN KEY (`unite_superieur_id`) REFERENCES `unites` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `personnels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
