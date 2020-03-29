<?php

namespace App\Controller\Globals;

/**
 * Class GetController
 * @package App\Controller
*/

class GetController
{
    private $get = null;

    public function __construct()
    {
        $this->get = filter_input_array(INPUT_GET);
    }

    public function getArray()
    {
        return $this->get;
    }

    public function getVar(string $var)
    {
        return $this->get[$var];
    }
}