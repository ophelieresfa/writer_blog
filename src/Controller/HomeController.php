<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

/**
 * Class HomeController
 * @package App\Controller
 */

class HomeController extends MainController
{

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function startMethod()
    {
        $lastBillet = ModelFactory::getModel('Billets')->listData();

        return $this->twig->render('home.twig', [
            'lastBillet' => $lastBillet
        ]);
    }
}