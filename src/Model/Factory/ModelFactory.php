<?php

namespace App\Model\Factory;

use App\Model\PdoDb;

/**
 * Class ModelFactory
 * @package App\Model
 */

class ModelFactory
{
    /**
     * @var array
     */
    private static $models = [];

    /**
     * @param string $table
     * @return mixed
     */
    public static function getModel(string $table)
    {
        if (array_key_exists($table, self::$models)){
            return self::$models[$table];
        }

        $class = 'App\Model\\' .ucfirst($table) . 'Model';

        self::$models[$table] = new $class(new PdoDb(PdoFactory::getPDO()));

        return self::$models[$table];
    }
}