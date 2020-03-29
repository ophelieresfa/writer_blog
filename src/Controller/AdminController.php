<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class AdminController extends MainController
{

    public function startMethod()
    {
        if ($this->session->isLogged()) {
            if ($this->session->userVar('admin') !== NULL) {
                $pseudo = $this->session->userVar('pseudo');
                $comments = ModelFactory::getModel('Commentaires')->listData();

                return $this->twig->render('admin.twig', [
                    'pseudo' => $pseudo,
                    'comments' => $comments
                ]);
            }
        }
        $this->session->flash();
        return $this->twig->render('consub.twig');
    }
}

