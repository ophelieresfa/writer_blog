<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class AdminController extends MainController
{
    public function startMethod()
    {
        if ($this->session->isLogged()) {
            $users = ModelFactory::getModel('Utilisateurs')->listData();
            return $this->twig->render('admin.twig', [
                'users' => $users
            ]);
        }
        $this->redirect('user!login');
    }

    public function readMethod()
    {
        $user = ModelFactory::getModel('Utilisateurs')->readData($this->get->getVar('id'));

        return $this->twig->render('admin.twig', [
            'user' => $user
        ]);
    }
}