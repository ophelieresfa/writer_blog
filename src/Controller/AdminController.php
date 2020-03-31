<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

/**
 * Class AdminController
 * @package App\Controller
 */

class AdminController extends MainController
{

    public function startMethod()
    {
        if ($this->session->isLogged()) {
            if ($this->session->userVar('admin') !== NULL) {
                $pseudo = $this->session->userVar('pseudo');
                $user = $this->session->userVar('id');
                $comments = ModelFactory::getModel('Commentaires')->listData();

                return $this->twig->render('admin.twig', [
                    'pseudo' => $pseudo,
                    'user' => $user,
                    'comments' => $comments
                ]);
            }
        }
        return $this->twig->render('consub.twig');
    }
}

