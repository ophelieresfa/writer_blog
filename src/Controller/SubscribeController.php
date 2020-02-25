<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class SubscribeController extends MainController
{

    public function controllerMethod()
    {
        return $this->twig->render('subscribe.twig');
    }

    public function createMethod()
    {
        if (!empty($this->post->getPostArray())) {
            $user = ModelFactory::getModel('Utilisateurs')->readData($this->post->getPostVar('email'),'email');

            if (empty($user) == false) {
                $data = password_hash($this->post->getPostVar('password'), PASSWORD_DEFAULT);

                ModelFactory::getModel('Utilisateurs')->createData($data);
                $this->redirect('home');
            }
            return $this->twig->render('subscribe.twig');
        }
    }
}