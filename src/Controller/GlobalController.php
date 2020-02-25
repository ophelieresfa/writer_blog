<?php

namespace App\Controller;

use App\Controller\Globals\GetController;
use App\Controller\Globals\PostController;
use App\Controller\Globals\SessionController;

abstract class GlobalController
{
    protected $get = null;
    protected $post = null;
    protected $session = null;

    public function __construct()
    {
        $this->get = new GetController();
        $this->post = new PostController();
        $this->session = new SessionController();
    }
}