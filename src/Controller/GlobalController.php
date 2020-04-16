<?php

namespace App\Controller;

use App\Controller\Globals\GetController;
use App\Controller\Globals\PostController;
use App\Controller\Globals\SessionController;

/**
 * Class GlobalController
 * @package App\Controller
 */

abstract class GlobalController
{
    /**
     * @var GetController|null
     */
    protected $get     = null;
    /**
     * @var PostController|null
     */
    protected $post    = null;
    /**
     * @var SessionController|null
     */
    protected $session = null;

    /**
     * GlobalController constructor.
     */
    public function __construct()
    {
        $this->get     = new GetController();
        $this->post    = new PostController();
        $this->session = new SessionController();
    }
}