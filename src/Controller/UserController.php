<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class UserController extends MainController
{

    public function startMethod()
    {
        return $this->twig->render('consub.twig');
    }

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

    public function createMethod()
    {
        if (!empty($this->post->postArray())) {
            $data['pseudo'] = $this->post->postVar('pseudo');
            $data['email'] = $this->post->postVar('email');
            $data['password'] = password_hash($this->post->postVar('password'), PASSWORD_DEFAULT);

            ModelFactory::getModel('Utilisateurs')->createData($data);
            $this->redirect('home');
        }
        return $this->twig->render('subscribe.twig');
    }

}