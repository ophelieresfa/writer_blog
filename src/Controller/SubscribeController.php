<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class SubscribeController extends MainController
{

    public function controllerMethod()
    {
        return $this->twig->render('subscribe.twig');
    }

}