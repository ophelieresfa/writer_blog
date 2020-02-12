<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class CommentsController extends MainController
{

    public function controllerMethod()
    {
        $lastComment = ModelFactory::getModel('Commentaires')->listData();

        return $this->twig->render('comments.twig', ['lastComment' => $lastComment]);
    }
}