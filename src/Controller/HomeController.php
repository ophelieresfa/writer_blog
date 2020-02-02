<?php

namespace App\Controller;

use Exception;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController extends MainController
{

    public function home()
    {
        try {
            return $this->twig->render('home.twig');
        }
        catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }

}