-- phpMyAdmin SQL Dump
-- version 3.1.2deb1ubuntu0.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 28 Octobre 2019 à 10:27
-- Version du serveur: 5.0.75
-- Version de PHP: 5.2.6-3ubuntu4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gfloret`
--

-- --------------------------------------------------------

--
-- Structure de la table `Doc_Section`
--

CREATE TABLE IF NOT EXISTS `Doc_Section` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `project_id` int(10) unsigned NOT NULL,
  `category` varchar(50) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `last_update` date NOT NULL,
  `state` enum('done','todo','deprecated') collate utf8_unicode_ci NOT NULL,
  `files` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Doc_Section`
--


-- --------------------------------------------------------

--
-- Structure de la table `Inside_Project_Role`
--

CREATE TABLE IF NOT EXISTS `Inside_Project_Role` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `project_id` int(10) unsigned NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Inside_Project_Role`
--


-- --------------------------------------------------------

--
-- Structure de la table `Inside_Sprint_Us`
--

CREATE TABLE IF NOT EXISTS `Inside_Sprint_Us` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sprint_id` int(10) unsigned NOT NULL,
  `user_story_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `sprint_id` (`sprint_id`,`user_story_id`),
  KEY `user_story_id` (`user_story_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Inside_Sprint_Us`
--


-- --------------------------------------------------------

--
-- Structure de la table `Project`
--

CREATE TABLE IF NOT EXISTS `Project` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(50) character set latin1 NOT NULL,
  `description` text character set latin1 NOT NULL,
  `visibility` tinyint(1) NOT NULL default '1',
  `release_git` varchar(255) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Project`
--


-- --------------------------------------------------------

--
-- Structure de la table `Project_invitation`
--

CREATE TABLE IF NOT EXISTS `Project_invitation` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `request` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`,`project_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Project_invitation`
--


-- --------------------------------------------------------

--
-- Structure de la table `Project_member`
--

CREATE TABLE IF NOT EXISTS `Project_member` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `role` enum('member','master') collate utf8_unicode_ci NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `project_id` (`project_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Project_member`
--


-- --------------------------------------------------------

--
-- Structure de la table `Sprint`
--

CREATE TABLE IF NOT EXISTS `Sprint` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `project_id` int(10) unsigned NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Sprint`
--


-- --------------------------------------------------------

--
-- Structure de la table `Task`
--

CREATE TABLE IF NOT EXISTS `Task` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sprint_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `predecessor` text collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci,
  `dod` text collate utf8_unicode_ci,
  `state` enum('todo','onGoing','done') collate utf8_unicode_ci NOT NULL,
  `time` enum('0.5','1','1.5','2','2.5','3','3.5','4','4.5','5') collate utf8_unicode_ci NOT NULL,
  `maquette` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`),
  KEY `sprint_id` (`sprint_id`,`member_id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Task`
--


-- --------------------------------------------------------

--
-- Structure de la table `Test`
--

CREATE TABLE IF NOT EXISTS `Test` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `project_id` int(10) unsigned NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `last_run` date NOT NULL,
  `state` enum('passed','deprecated','failed') collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Test`
--


-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `username` varchar(50) collate utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `last_name` varchar(75) collate utf8_unicode_ci NOT NULL,
  `password` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `role` enum('admin','user') collate utf8_unicode_ci NOT NULL,
  `reg_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `User`
--


-- --------------------------------------------------------

--
-- Structure de la table `User_Story`
--

CREATE TABLE IF NOT EXISTS `User_Story` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `project_id` int(10) unsigned NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `priority` int(10) unsigned NOT NULL,
  `effort` int(10) unsigned NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `done` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `project_id` (`project_id`,`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `User_Story`
--


-- --------------------------------------------------------

--
-- Structure de la table `Us_Task`
--

CREATE TABLE IF NOT EXISTS `Us_Task` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `task_id` int(10) unsigned NOT NULL,
  `user_story_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `task_id` (`task_id`,`user_story_id`),
  KEY `user_story_id` (`user_story_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `Us_Task`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Doc_Section`
--
ALTER TABLE `Doc_Section`
  ADD CONSTRAINT `Doc_Section_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`id`);

--
-- Contraintes pour la table `Inside_Project_Role`
--
ALTER TABLE `Inside_Project_Role`
  ADD CONSTRAINT `Inside_Project_Role_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`id`);

--
-- Contraintes pour la table `Inside_Sprint_Us`
--
ALTER TABLE `Inside_Sprint_Us`
  ADD CONSTRAINT `Inside_Sprint_Us_ibfk_2` FOREIGN KEY (`user_story_id`) REFERENCES `User_Story` (`id`),
  ADD CONSTRAINT `Inside_Sprint_Us_ibfk_1` FOREIGN KEY (`sprint_id`) REFERENCES `Sprint` (`id`);

--
-- Contraintes pour la table `Project_invitation`
--
ALTER TABLE `Project_invitation`
  ADD CONSTRAINT `Project_invitation_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `Project` (`id`),
  ADD CONSTRAINT `Project_invitation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Project_member`
--
ALTER TABLE `Project_member`
  ADD CONSTRAINT `Project_member_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`id`),
  ADD CONSTRAINT `Project_member_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Sprint`
--
ALTER TABLE `Sprint`
  ADD CONSTRAINT `Sprint_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`id`);

--
-- Contraintes pour la table `Task`
--
ALTER TABLE `Task`
  ADD CONSTRAINT `Task_ibfk_1` FOREIGN KEY (`sprint_id`) REFERENCES `Sprint` (`id`),
  ADD CONSTRAINT `Task_ibfk_3` FOREIGN KEY (`member_id`) REFERENCES `Project_member` (`id`);

--
-- Contraintes pour la table `Test`
--
ALTER TABLE `Test`
  ADD CONSTRAINT `Test_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`id`);

--
-- Contraintes pour la table `User_Story`
--
ALTER TABLE `User_Story`
  ADD CONSTRAINT `User_Story_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `Inside_Project_Role` (`id`),
  ADD CONSTRAINT `User_Story_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`id`);

--
-- Contraintes pour la table `Us_Task`
--
ALTER TABLE `Us_Task`
  ADD CONSTRAINT `Us_Task_ibfk_2` FOREIGN KEY (`user_story_id`) REFERENCES `User_Story` (`id`),
  ADD CONSTRAINT `Us_Task_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `Task` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
