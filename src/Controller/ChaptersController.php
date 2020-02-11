<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ChaptersController extends MainController
{

    public function controllerMethod()
    {
        $lastBillet = ModelFactory::getModel('Billets')->listData();
        return $this->twig->render('chapters.twig', ['lastBillet' => $lastBillet]);
    }

}