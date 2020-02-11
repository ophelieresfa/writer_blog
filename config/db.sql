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