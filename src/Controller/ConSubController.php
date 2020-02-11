<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ConSubController extends MainController
{

    public function controllerMethod()
    {
        return $this->twig->render('consub.twig');
    }

}