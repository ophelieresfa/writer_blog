<?php

namespace App\Controller;

use App\Controller\Extention\Extention;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Class MainController
 * @package App\Controller
 */

abstract class MainController extends GlobalController
{
    /**
     * @var Environment|null
     */
    protected $twig = null;

    /**
     * MainController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->twig = new Environment(new FilesystemLoader('../src/View'), array('cache' => false));
        $this->twig->addExtension(new Extention());
        $this->twig->addGlobal('session', $_SESSION);
    }

    /**
     * @param string $page
     * @param array $params
     * @return string
     */
    public function url(string $page, array $params = [])
    {
        $params['action'] = $page;

        return 'index.php?' . http_build_query($params);
    }

    /**
     * @param string $page
     * @param array $params
     */
    public function redirect(string $page, array $params = [])
    {
        $params['action'] = $page;
        header('Location: index.php?' . http_build_query($params));

        exit;
    }
}