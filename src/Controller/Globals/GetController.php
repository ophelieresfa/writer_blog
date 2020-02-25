<?php

namespace App\Controller\Globals;

class GetController
{
    private $get = null;

    public function __construct()
    {
        $this->get = filter_input_array(INPUT_GET);
    }

    public function getGetArray()
    {
        return $this->get;
    }

    public function getGetVar(string $var)
    {
        return $this->get[$var];
    }
}