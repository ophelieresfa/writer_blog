<?php

namespace App\Controller\Globals;

/**
 * Class PostController
 * @package App\Controller
 */

class PostController
{
    private $post = null;

    public function __construct()
    {
        $this->post = filter_input_array(INPUT_POST);
    }

    public function postArray()
    {
        return $this->post;
    }

    public function postVar(string $var)
    {
        return $this->post[$var];
    }
}