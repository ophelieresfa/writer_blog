<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ConsubController extends MainController
{

    public function controllerMethod()
    {
        return $this->twig->render('consub.twig');
    }

}