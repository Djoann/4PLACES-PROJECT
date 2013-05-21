-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 16 Mai 2013 à 13:19
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projecthome`
--

-- --------------------------------------------------------

--
-- Structure de la table `announce`
--

CREATE TABLE IF NOT EXISTS `announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `type` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `solved` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_announce_category1_idx` (`category_id`),
  KEY `fk_announce_user1_idx` (`user_id`),
  KEY `Lat` (`lat`,`lng`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Contenu de la table `announce`
--

INSERT INTO `announce` (`id`, `content`, `type`, `created`, `address`, `lat`, `lng`, `solved`, `category_id`, `user_id`) VALUES
(15, 'Bonjours ! Je recois une correspondante tout droit venue d''Angleterre dans un mois, inutile de vous dire que mon Anglais n''est pas au point, que ce soit en franc parler ou meme pour la drague. Je cherche par conséquent quelqu''un de mon voisinage pour m''apprendre quelque peu le langage ! Je rémunère. bonne soirée', 'asking', '2013-04-10 22:12:29', '18 boulevard Flandrin 75016 Paris', 0, 0, 0, NULL, 0),
(14, 'Hello i''m selling smthng', 'asking', '2013-04-10 22:10:32', '42 rue Miromesnil 75008 Paris', 0, 0, 0, NULL, 0),
(16, 'Bonjours je cherche une tondeuse à gazon pour ce weekend, mon jardin ne ressemble plus a rien et ca devient genant ! Je rémunère !', 'asking', '2013-04-10 22:13:18', '34 rue des nouvelles 92150 Suresnes', 0, 0, 0, NULL, 0),
(17, 'Salut, je cherche une blouse blanche de medecin s''il vous plait, je suis en laboratoire demain et la mienne est déchiquetée !!', 'asking', '2013-04-10 22:13:44', '11 rue des petites écuries 75010 Paris', 0, 0, 0, NULL, 0),
(18, 'Hello premiere annonce yahou', 'asking', '2013-04-11 12:19:18', '42 Rue Miromesnil 75008 Paris', 0, 0, 0, NULL, 0),
(19, '34 rue ba lba ', 'asking', '2013-04-12 01:31:39', 'hello ', 0, 0, 0, NULL, 0),
(20, 'Hello new mvc', 'asking', '2013-04-12 01:30:44', '31 rue faubourg st antoine', 0, 0, 0, NULL, 0),
(21, 'hello there mvc', 'asking', '2013-04-12 01:34:38', '31 rue faubourg st antoine', 0, 0, 0, NULL, 0),
(24, NULL, NULL, NULL, NULL, 0, 0, -1, NULL, NULL),
(23, 'Lored ipsum', 'asking', '2013-04-12 01:36:44', '31 rue faubourg paris', 0, 0, 0, NULL, 0),
(25, 'coucou', 'asking', '2013-04-12 13:01:29', '42 Rue Miromesnil 75008 Paris', 0, 0, 0, NULL, 0),
(26, 'je cherche un canon 5D à louer pour un week end.\r\nMerci ', 'asking', '2013-04-13 11:28:52', '42 Rue Miromesnil 75008 Paris', 0, 0, 0, NULL, 0),
(27, 'salut salut micha', 'asking', '2013-04-26 12:26:01', '24 rue miromesnil 75008 Paris', 0, 0, 0, NULL, 0),
(28, 'zrvrzvrvzvzrvzrvz', 'asking', '2013-04-26 12:51:11', 'zrvrzvetbzetbetb', 0, 0, 0, NULL, 0),
(29, 'Hello Micha, thanks u so much ! ', 'asking', '2013-04-26 13:06:23', '', 47.99646977212288, 2.2889328002929688, 0, NULL, 0),
(30, 'zrgrzgzrg', 'asking', '2013-04-26 13:24:47', '', 48.03516702702949, 2.2758865356445312, 0, NULL, 0),
(31, 'mimi ', 'asking', '2013-04-26 23:35:13', 'puy du fou', 48.019324184801185, 2.0221710205078125, 0, NULL, 0),
(32, 'zrgrgzgzrsgzsbzbzthargarga\r\nzrgrgzgzrsgzsbzbzthargarga\r\nzrgrgzgzrsgzsbzbzthargarga', 'asking', '2013-04-27 23:36:09', '', 48.50204750525715, -357.7313232421875, 0, NULL, 0),
(33, 'blablablablablablablablablablablablablablablablablablablablablabla', 'asking', '2013-04-27 23:38:01', '', 49.081062364320736, 2.384033203125, 0, NULL, 0),
(34, 'Ici, dans ce tout petit endroit de la terre, j''y ai rencontré, un ange.\r\n\r\n<3', 'asking', '2013-04-27 23:43:39', '', 43.11481556666945, 5.939183235168457, 0, NULL, 0),
(35, 'Couilles à vendre pour pas cher !!', 'asking', '2013-05-01 12:16:21', '', 48.88007028454358, 1.6355895996093748, 0, NULL, 0),
(36, 'Accra', 'asking', '2013-05-01 23:49:08', '', 5.62691931174213, -0.032958984375, 0, NULL, 0),
(37, 'Lomé', 'asking', '2013-05-01 23:49:28', '', 6.156939470946367, 1.2359619140625, 0, NULL, 0),
(38, 'Cotonou', 'asking', '2013-05-01 23:49:58', '', 6.390365729026048, 2.4444580078125, 0, NULL, 0),
(39, 'Abidjan', 'asking', '2013-05-01 23:50:29', '', 5.380866756582382, -3.96881103515625, 0, NULL, 0),
(40, 'Lagos', 'asking', '2013-05-01 23:50:55', '', 6.500899137995968, 3.416748046875, 0, NULL, 0),
(41, 'zrgethbqetdbqetjomvbnqzrkv', 'asking', '2013-05-14 11:11:31', '', 46.5286346952717, 2.5048828125, 0, NULL, 0),
(42, 'Salut je m''appelle Djoann', 'asking', '2013-05-14 11:15:22', '', 48.89722676235673, 2.4355316162109375, 0, NULL, 0),
(43, 'Hello paris', 'asking', '2013-05-14 11:22:31', '', 48.85522811385678, 2.3531341552734375, 0, NULL, 0),
(44, 'zrgzrvzrsvrzsv', 'asking', '2013-05-14 11:27:00', '', 48.85116185716921, 2.3184585571289062, 0, NULL, 0),
(45, 'zrsvzrsvsebetb', 'asking', '2013-05-14 11:27:11', '', 48.843819168321446, 2.3447227478027344, 0, NULL, 0),
(46, 'salut monsieur', 'asking', '2013-05-14 11:29:55', '', 48.84686933903632, 2.3293590545654297, 0, NULL, 0),
(58, 'gtrf', 'asking', '2013-05-16 09:51:33', NULL, 48.869005749964536, 2.3895263671875, 0, NULL, 1),
(57, 'trgf', 'asking', '2013-05-16 09:51:31', NULL, 48.8573740606269, 2.3012924194335938, 0, NULL, 1),
(56, 'ytgrfe', 'asking', '2013-05-16 09:51:30', NULL, 48.86697322249135, 2.328929901123047, 0, NULL, 1),
(61, 'trgfe', 'asking', '2013-05-16 09:51:39', NULL, 48.83658839192869, 2.3009490966796875, 0, NULL, 1),
(62, 'tgrf', 'asking', '2013-05-16 09:51:42', NULL, 48.87453832314776, 2.3011207580566406, 0, NULL, 1),
(63, 'tgrfe', 'asking', '2013-05-16 09:51:44', NULL, 48.87769951885709, 2.347126007080078, 0, NULL, 1),
(64, 'tgre', 'asking', '2013-05-16 09:51:47', NULL, 48.85872934803138, 2.381458282470703, 0, NULL, 1),
(65, 'tgrfe', 'asking', '2013-05-16 09:51:49', NULL, 48.87871557505334, 2.3230934143066406, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `announce_media`
--

CREATE TABLE IF NOT EXISTS `announce_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announce_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_announce_media_media1_idx` (`media_id`),
  KEY `fk_announce_media_announce1_idx` (`announce_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `announce_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_user1_idx` (`user_id`),
  KEY `fk_comment_announce1_idx` (`announce_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` text,
  `alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`id`, `name`, `value`, `alias`) VALUES
(1, 'perpageannounce', '3', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contact_user1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) DEFAULT NULL,
  `filemin` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `user_id` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_message_user1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `bio` text,
  `mail` varchar(255) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `online` int(11) DEFAULT NULL,
  `activated` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_media_idx` (`media_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `firstname`, `lastname`, `address`, `lat`, `lng`, `bio`, `mail`, `token`, `online`, `activated`, `media_id`) VALUES
(1, 'djoan', '8aa61d8bd260942521bb1ba82cd4cce2324fdbee', 'Djoan', 'Fal', 'France', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, -1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
