<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class CommentsController extends MainController
{

    public function controllerMethod()
    {
        $lastBillet = ModelFactory::getModel('Billets')->listData();
        $lastComment = ModelFactory::getModel('Commentaires')->listData();

        return $this->twig->render('comments.twig', [
            'lastBillet' => $lastBillet,
            'lastComment' => $lastComment
        ]);
    }

    public function readMethod()
    {
        $lastBillet = ModelFactory::getModel('Billets')->readData($this->get['id']);
        $lastComment = ModelFactory::getModel('Commentaires')->listData($this->get['id'], 'id_billet');

        return $this->twig->render('comments.twig', [
            'lastBillet' => $lastBillet,
            'lastComment' => $lastComment
        ]);
    }
}