<?php

namespace App\Model;

use PDO;

/**
 * Class PdoDb
 * @package App\Model
 */

class PdoDb
{
    private $pdo = null;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getData(string $query, array $params = [])
    {
        $PDOStatement = $this->pdo->prepare($query);
        $PDOStatement->execute($params);

        return $PDOStatement->fetch();
    }

    public function getAllData(string $query, array $params = [])
    {
        $PDOStatement = $this->pdo->prepare($query);
        $PDOStatement->execute($params);

        return $PDOStatement->fetchAll();
    }

    public function setData(string $query, array $params = [])
    {
        $PDOStatement = $this->pdo->prepare($query);

        return $PDOStatement->execute($params);
    }
}