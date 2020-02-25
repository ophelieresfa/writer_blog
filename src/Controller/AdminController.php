<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class AdminController extends MainController
{
    public function startrMethod()
    {
        if ($this->session->isLogged()) {
            $users = ModelFactory::getModel('Utilisateurs')->readData('id');
            return $this->twig->render('admin.twig', [
                'users' => $users
            ]);
        }
        $this->redirect('user!login');
    }
}