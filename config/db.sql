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

('Chapitre 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu nibh ornare, feugiat elit vel, vehicula eros. Aenean id orci ut justo auctor feugiat. Pellentesque eu posuere dui. Nam luctus ante ut finibus pretium. Phasellus suscipit hendrerit turpis in placerat. Suspendisse sit amet tincidunt tellus. Sed faucibus cursus odio sed cursus. Quisque mattis auctor vestibulum. Morbi nec eros metus. Praesent vitae purus massa. Cras pretium condimentum interdum. Pellentesque elit dui, malesuada in turpis in, porta consectetur erat. Duis tempus nisl sed sagittis dignissim. Cras maximus hendrerit arcu vel rhoncus.Suspendisse potenti. Cras lobortis velit vulputate tortor finibus, a ornare ipsum ultricies. Nam pulvinar dolor sit amet sapien suscipit, molestie dapibus augue interdum. Aenean vel ornare enim. Aliquam hendrerit, urna a tincidunt eleifend, nisl velit suscipit urna, in euismod turpis lorem id lacus. Suspendisse blandit ex mauris, ut consectetur quam lacinia at. Vestibulum euismod nisl eu eros blandit, in sodales elit convallis. Suspendisse lacinia lectus in ipsum euismod, a convallis nulla tincidunt. Etiam vulputate tincidunt dui, in convallis dolor iaculis in. Aliquam ultricies dignissim leo, sit amet eleifend ligula ultrices eget. ', '2010-03-25 16:28:41'),

('Chapitre 2', 'Pellentesque vitae mi eget orci tincidunt blandit. Ut hendrerit dignissim massa a posuere. Sed vitae orci vitae odio semper congue vitae sit amet nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut commodo risus ut blandit rhoncus. In maximus, nulla quis tristique convallis, tortor neque volutpat urna, ac faucibus tortor purus interdum risus. Integer non sapien enim. Aliquam sapien dolor, tempus eu congue id, interdum ut sapien. Mauris non eros ac velit iaculis maximus. Vivamus ante nulla, dictum sit amet faucibus et, ultricies ac urna. Sed urna mauris, cursus et porttitor nec, pretium at urna. Pellentesque magna elit, condimentum eget diam eu, scelerisque rutrum urna. In eget elementum purus, eu pulvinar ex. Suspendisse congue malesuada lectus, id maximus orci bibendum at. Nam laoreet est eu augue pharetra porta. Maecenas vitae est vel augue auctor pulvinar in nec nulla. Nunc porta, nisl ut sodales commodo, mauris felis placerat ante, eget consectetur orci sapien id justo. Suspendisse eu mauris bibendum, tempor nibh tempus, mollis urna. Sed quis dui nec dolor ornare tincidunt et nec odio. Nunc et gravida velit. Integer sodales ligula eu sodales accumsan. Etiam vulputate consectetur egestas. Fusce quis blandit ante, id mollis massa. Nullam suscipit varius erat, id porta sem ullamcorper vitae. Proin id ligula a massa aliquam porttitor ac id tellus. Curabitur imperdiet ipsum a sem faucibus bibendum. Aenean fermentum, orci eu varius molestie, mi lacus ullamcorper metus, ac dapibus diam enim at neque. Etiam interdum pellentesque lacus vitae egestas. ', '2010-03-27 18:31:11');

CREATE TABLE `Utilisateurs`
(
    `id`        SMALLINT        UNSIGNED    PRIMARY KEY     AUTO_INCREMENT,
    `pseudo`    VARCHAR(50)     NOT NULL,
    `email`     VARCHAR(100)    NOT NULL    UNIQUE,
    `password`  VARCHAR(60)     NOT NULL,
    `admin`     SMALLINT(1)     NOT NULL
)
    ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO `Utilisateurs` (`pseudo`, `email`, `password`, `admin`) VALUES

('Jean', 'jean.forteroche@gmail.com', '$2y$10$pUjRCJyfmb/wcnM.hzahu.dQWdXiEpj3ZXI7cnEzFB/DHy5JoZ3mq', 1),

('Invité', 'invite@gmail.com', '$2y$10$TqTeEGu2guIwfLZdmywpUOcBywujdBfK6HIXrIZ2Vp5E1tGXlcWbK', 0);

CREATE TABLE `Commentaires`
(
    `id`                   SMALLINT       UNSIGNED     PRIMARY KEY     AUTO_INCREMENT,
    `contenu`              TEXT           NOT NULL,
    `auteur`               VARCHAR(50)    NOT NULL,
    `date_commentaire`     DATETIME       NOT NULL,
    `id_billet`            SMALLINT       NOT NULL,
    `id_utilisateur`       SMALLINT       NOT NULL
)
    ENGINE=INNODB  DEFAULT CHARSET=utf8;

INSERT INTO `Commentaires` (`contenu`, `auteur`, `date_commentaire`, `id_billet`, `id_utilisateur`) VALUES

('+1 !', 'Invité', '2010-03-25 17:12:52', 1, 2),

('Excellente analyse de la situation !
Il y arrivera plus tôt qu\'on ne le pense !', 'Jean Forteroche', '2010-03-27 22:02:13', 2, 1),

('Oui, ça commence pas très fort ce blog...', 'Jean Forteroche', '2010-03-25 16:57:16', 2, 1),

('Preums !', 'Invité', '2010-03-27 18:59:49', 1, 2),

('Un peu court ce billet !', 'Invité', '2010-03-25 16:49:53', 1, 2);