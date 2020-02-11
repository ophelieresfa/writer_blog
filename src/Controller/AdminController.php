<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class AdminController extends MainController
{

    public function controllerMethod()
    {
        return $this->twig->render('admin.twig');
    }

}