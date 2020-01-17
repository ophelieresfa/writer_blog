<?php

class Database {

    const DB_HOST = 'mysql:host=localhost;port=8000,dbname=writer_blog,charset=utf8';
    const DB_USER = 'root';
    const DB_PASSWORD = '';


    public function getConnexion()
    {
        try {
            $connection = new PDO(self::DB_HOST,self::DB_USER,self::DB_PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return 'Connexion avec la base de donnée établie';
        }

        catch (Exception$errorConnection) {
            die('Erreur de connection à la base de donnée :' . $errorConnection->getMessage());
        }

    }

}