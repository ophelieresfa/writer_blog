<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class AdminController extends MainController
{

    public function startMethod()
    {
        if ($this->session->isLogged()) {
            $pseudo = $this->session->userVar('pseudo');
            $billets = ModelFactory::getModel('Billets')->listData();

            return $this->twig->render('admin.twig', [
                'billets' => $billets,
                'pseudo' => $pseudo
            ]);
        }
        return $this->twig->render('consub.twig');
    }
}

