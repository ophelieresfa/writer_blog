<?php

namespace App\Model\Factory;

use PDO;

/**
 * Class PdoFactory
 * @package App\Model
 */

class PdoFactory
{
    /**
     * @var null
     */
    private static $pdo = null;

    /**
     * @return PDO|null
     */
    public static function getPDO()
    {
        require_once '../config/db.php';

        if (self::$pdo === null){
            self::$pdo = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
            self::$pdo->exec('SET NAMES UTF8');
        }

        return self::$pdo;
    }
}