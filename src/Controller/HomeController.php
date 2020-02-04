<?php

namespace App\Controller;

class HomeController extends MainController
{

    public function controllerMethod()
    {
        return $this->twig->render('home.twig');
    }

}