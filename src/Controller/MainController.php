<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class MainController
{
    protected $twig = null;

    public function __construct()
    {
        $this->twig = new Environment(new FilesystemLoader('../src/View'), array('cache' => false));
    }

    public function redirect(string $page, array $params = [])
    {
        $params['action'] = $page;
        header('Location: index.php?' . http_build_query($params));

        exit;
    }
}