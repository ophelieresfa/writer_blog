<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ConnectionController extends MainController
{
    public function loginMethod()
    {
        if (!empty($this->post->getPostArray())) {
            $user = ModelFactory::getModel('Utilisateurs')->readData($this->post->getPostVar('email'), 'email');

            if (password_verify($this->post->getPostVar('password'), $user['password'])) {
                $this->session->createSession(
                    $user['id'],
                    $user['pseudo'],
                    $user['email'],
                    $user['password'],
                    $user['status']
                );
                $this->redirect('admin');
            }
        }
        return $this->twig->render('connection.twig');
    }

    public function logoutMethod()
    {
        $this->session->destroySession();
        $this->redirect('home');
    }
}