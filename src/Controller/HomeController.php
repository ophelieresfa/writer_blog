<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class HomeController extends MainController
{

    public function startMethod()
    {
        $lastBillet = ModelFactory::getModel('Billets')->listData();

        return $this->twig->render('home.twig', [
            'lastBillet' => $lastBillet
        ]);
    }
}