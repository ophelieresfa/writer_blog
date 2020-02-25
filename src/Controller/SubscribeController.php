<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class SubscribeController extends MainController
{
    public function startMethod()
    {
        return $this->twig->render('subscribe.twig');
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