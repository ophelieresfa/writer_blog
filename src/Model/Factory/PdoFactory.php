<?php

namespace App\Model\Factory;

use PDO;

class PdoFactory
{
    private static $pdo = null;

    public static function getPDO()
    {
        require_once '../config/db.php';

        if (self::$pdo === null) {
            self::$pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
            self::$pdo->exec('SET NAMES UTF8');
        }

        return self::$pdo;
    }
}