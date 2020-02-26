<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ConnectionController extends MainController
{
    public function loginMethod()
    {
        if (!empty($this->session->isLogged())) {
            return $this->twig->render('admin.twig');
        }

        if (!empty($this->post->postArray())) {
            $user = ModelFactory::getModel('Utilisateurs')->readData($this->post->postVar('email'), 'email');

            if (password_verify($this->post->postVar('password'), $user['password'])) {
                $this->session->createSession(
                    $user['id'],
                    $user['pseudo'],
                    $user['email'],
                    $user['password']
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