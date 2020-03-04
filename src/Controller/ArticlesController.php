<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ArticlesController extends MainController
{

    public function startMethod()
    {
        $lastBillet = ModelFactory::getModel('Billets')->listData();

        return $this->twig->render('chapters.twig', ['lastBillet' => $lastBillet]);
    }
}