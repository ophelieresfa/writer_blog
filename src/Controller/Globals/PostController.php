<?php

namespace App\Controller\Globals;

/**
 * Class PostController
 * @package App\Controller\Globals
 */
class PostController
{
    /**
     * @var mixed|null
     */
    private $post = null;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->post = filter_input_array(INPUT_POST);
    }

    /**
     * @return mixed|null
     */
    public function postArray()
    {
        return $this->post;
    }

    /**
     * @param string $var
     * @return mixed
     */
    public function postVar(string $var)
    {
        return $this->post[$var];
    }
}