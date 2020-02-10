DROP DATABASE IF EXISTS `writer_blog`;
CREATE DATABASE `writer_blog` CHARACTER SET utf8;

USE `writer_blog`;

CREATE TABLE `Billets`
(
    `id`               SMALLINT         UNSIGNED     PRIMARY KEY     AUTO_INCREMENT,
    `titre`            VARCHAR(255)     NOT NULL     UNIQUE,
    `contenu`          TEXT             NOT NULL,
    `date_creation`    DATETIME         NOT NULL
)
    ENGINE=INNODB  DEFAULT CHARSET=utf8;

INSERT INTO `Billets` (`titre`, `contenu`, `date_creation`) VALUES
(
 'Bienvenue sur mon blog !',
 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de mon dernier livre Billet pour l''Alaska',
 '2010-03-25 16:28:41'
 ),

(
 'Le PHP à la conquête du monde !',
 'C''est officiel, l''éléPHPant a annoncé à la radio hier soir "J''ai l''intention de conquérir le monde !".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu''il n''en fallait pour dire "éléPHPant". Pas dur, ceci dit entre nous...',
 '2010-03-27 18:31:11'
 );

CREATE TABLE `Utilisateurs`
(
    `id`        SMALLINT        UNSIGNED    PRIMARY KEY     AUTO_INCREMENT,
    `name`      VARCHAR(50)     NOT NULL,
    `email`     VARCHAR(100)    NOT NULL    UNIQUE,
    `pass`      VARCHAR(60)     NOT NULL
)
    ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE `Commentaires`
(
    `id`                   SMALLINT     UNSIGNED     PRIMARY KEY     AUTO_INCREMENT,
    `contenu`              TEXT         NOT NULL,
    `date_commentaire`     DATETIME     NOT NULL,
    `id_billet`            SMALLINT     NOT NULL,
    `id_utilisateur`       SMALLINT     NOT NULL
)
    ENGINE=INNODB  DEFAULT CHARSET=utf8;

INSERT INTO `Commentaires` (`contenu`, `date_commentaire` , `id_billet`, `id_utilisateur`) VALUES
(
 'Un peu court ce billet !',
 '2010-03-25 16:49:53',
 1,
 2
 ),

(
 'Oui, ça commence pas très fort ce blog...',
 '2010-03-25 16:57:16',
 2,
 1
 ),

(
 '+1 !',
 '2010-03-25 17:12:52',
 1,
 2
 ),

(
 'Preums !',
 '2010-03-27 18:59:49',
 1,
 2
 ),

(
 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu''on ne le pense !',
 '2010-03-27 22:02:13',
 2,
 1
 );