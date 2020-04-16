<?php

namespace App\Controller\Globals;

/**
 * Class GetController
 * @package App\Controller\Globals
 */
class GetController
{
    /**
     * @var mixed|null
     */
    private $get = null;

    /**
     * GetController constructor.
     */
    public function __construct()
    {
        $this->get = filter_input_array(INPUT_GET);
    }

    /**
     * @return mixed|null
     */
    public function getArray()
    {
        return $this->get;
    }

    /**
     * @param string $var
     * @return mixed
     */
    public function getVar(string $var)
    {
        return $this->get[$var];
    }
}