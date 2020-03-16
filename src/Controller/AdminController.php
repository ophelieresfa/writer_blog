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

                return $this->twig->render('admin.twig', [
                    'pseudo' => $pseudo
                ]);
            }
        }
        return $this->twig->render('consub.twig');
    }
}

