<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ArticlesController extends MainController
{

    public function startMethod()
    {
        $billets = ModelFactory::getModel('Billets')->listData();

        return $this->twig->render('chapters.twig', [
            'billets' => $billets
        ]);
    }

    public function readMethod()
    {
        $billet = ModelFactory::getModel('Billets')->readData($this->get->getVar('id'));
        $comments = ModelFactory::getModel('Commentaires')->listData($this->get->getVar('id'), 'id_billet');

        return $this->twig->render('allChapters.twig', [
            'billet' => $billet,
            'comments' => $comments
        ]);

    }
}