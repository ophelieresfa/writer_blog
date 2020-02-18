<?php

namespace App\Controller;

use App\Controller\Extention\Extention;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class MainController
{
    protected $twig = null;

    public function __construct()
    {
        $this->twig = new Environment(new FilesystemLoader('../src/View'), array('cache' => false));

        $this->twig->addExtension(new Extention());
    }

    public function url(string $page, array $params = [])
    {
        $params['action'] = $page;

        return 'index.php?' . http_build_query($params);
    }

    public function redirect(string $page, array $params = [])
    {
        $params['action'] = $page;
        header('Location: index.php?' . http_build_query($params));

        exit;
    }

    public function render(string $view, array $params = [])
    {
        return $this->twig->render($view, $params);
    }
}