-- phpMyAdmin SQL Dump
-- version 3.1.2deb1ubuntu0.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 30 Octobre 2019 à 14:28
-- Version du serveur: 5.0.75
-- Version de PHP: 5.2.6-3ubuntu4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `Cdp`
--

-- --------------------------------------------------------

--
-- Structure de la table `doc_section`
--

CREATE TABLE IF NOT EXISTS `doc_section` (
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
-- Contenu de la table `doc_section`
--


-- --------------------------------------------------------

--
-- Structure de la table `inside_project_role`
--

CREATE TABLE IF NOT EXISTS `inside_project_role` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `project_id` int(10) unsigned NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `inside_project_role`
--


-- --------------------------------------------------------

--
-- Structure de la table `inside_sprint_us`
--

CREATE TABLE IF NOT EXISTS `inside_sprint_us` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sprint_id` int(10) unsigned NOT NULL,
  `user_story_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `sprint_id` (`sprint_id`,`user_story_id`),
  KEY `user_story_id` (`user_story_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `inside_sprint_us`
--


-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(50) character set latin1 NOT NULL,
  `description` text character set latin1 NOT NULL,
  `visibility` tinyint(1) NOT NULL default '1',
  `release_git` varchar(255) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `project`
--


-- --------------------------------------------------------

--
-- Structure de la table `project_invitation`
--

CREATE TABLE IF NOT EXISTS `project_invitation` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) unsigned NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `request` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`,`project_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `project_invitation`
--


-- --------------------------------------------------------

--
-- Structure de la table `project_member`
--

CREATE TABLE IF NOT EXISTS `project_member` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `role` enum('member','master') collate utf8_unicode_ci NOT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `project_id` (`project_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `project_member`
--


-- --------------------------------------------------------

--
-- Structure de la table `sprint`
--

CREATE TABLE IF NOT EXISTS `sprint` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `project_id` int(10) unsigned NOT NULL,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `sprint`
--


-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
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
-- Contenu de la table `task`
--


-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
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
-- Contenu de la table `test`
--


-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `username` varchar(50) collate utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `last_name` varchar(75) collate utf8_unicode_ci NOT NULL,
  `password` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `role` enum('admin','user') collate utf8_unicode_ci NOT NULL,
  `reg_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `role`, `reg_date`) VALUES
(1, 'admin1', 'admin1prenom', 'admin1nom', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'admin1mail@mail.com', 'user', '2019-10-30 14:12:40');

-- --------------------------------------------------------

--
-- Structure de la table `user_story`
--

CREATE TABLE IF NOT EXISTS `user_story` (
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
-- Contenu de la table `user_story`
--


-- --------------------------------------------------------

--
-- Structure de la table `us_task`
--

CREATE TABLE IF NOT EXISTS `us_task` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `task_id` int(10) unsigned NOT NULL,
  `user_story_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `task_id` (`task_id`,`user_story_id`),
  KEY `user_story_id` (`user_story_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `us_task`
--


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `doc_section`
--
ALTER TABLE `doc_section`
  ADD CONSTRAINT `doc_section_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `inside_project_role`
--
ALTER TABLE `inside_project_role`
  ADD CONSTRAINT `inside_project_role_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `inside_sprint_us`
--
ALTER TABLE `inside_sprint_us`
  ADD CONSTRAINT `inside_sprint_us_ibfk_1` FOREIGN KEY (`sprint_id`) REFERENCES `sprint` (`id`),
  ADD CONSTRAINT `inside_sprint_us_ibfk_2` FOREIGN KEY (`user_story_id`) REFERENCES `user_story` (`id`);

--
-- Contraintes pour la table `project_invitation`
--
ALTER TABLE `project_invitation`
  ADD CONSTRAINT `project_invitation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `project_invitation_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `project_member`
--
ALTER TABLE `project_member`
  ADD CONSTRAINT `project_member_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `project_member_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `sprint`
--
ALTER TABLE `sprint`
  ADD CONSTRAINT `sprint_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`sprint_id`) REFERENCES `sprint` (`id`),
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`member_id`) REFERENCES `project_member` (`id`);

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `user_story`
--
ALTER TABLE `user_story`
  ADD CONSTRAINT `user_story_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `user_story_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `inside_project_role` (`id`);

--
-- Contraintes pour la table `us_task`
--
ALTER TABLE `us_task`
  ADD CONSTRAINT `us_task_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`),
  ADD CONSTRAINT `us_task_ibfk_2` FOREIGN KEY (`user_story_id`) REFERENCES `user_story` (`id`);
