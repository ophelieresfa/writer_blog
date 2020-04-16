<?php

namespace App\Model;

use PDO;

/**
 * Class PdoDb
 * @package App\Model
 */

class PdoDb
{
    /**
     * @var PDO|null
     */
    private $pdo = null;

    /**
     * PdoDb constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param string $query
     * @param array $params
     * @return mixed
     */
    public function getData(string $query, array $params = [])
    {
        $PDOStatement = $this->pdo->prepare($query);
        $PDOStatement->execute($params);

        return $PDOStatement->fetch();
    }

    /**
     * @param string $query
     * @param array $params
     * @return array
     */
    public function getAllData(string $query, array $params = [])
    {
        $PDOStatement = $this->pdo->prepare($query);
        $PDOStatement->execute($params);

        return $PDOStatement->fetchAll();
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     */
    public function setData(string $query, array $params = [])
    {
        $PDOStatement = $this->pdo->prepare($query);

        return $PDOStatement->execute($params);
    }
}