<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class CommentsController extends MainController
{

    public function controllerMethod()
    {
        $billets = ModelFactory::getModel('Billets')->listData();
        $comments = ModelFactory::getModel('Commentaires')->listData();

        return $this->twig->render('allChapters.twig', [
            'billets' => $billets,
            'comments' => $comments
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