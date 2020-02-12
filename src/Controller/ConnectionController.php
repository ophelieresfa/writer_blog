<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ConnectionController extends MainController
{

    public function controllerMethod()
    {
        return $this->twig->render('connection.twig');
    }

}