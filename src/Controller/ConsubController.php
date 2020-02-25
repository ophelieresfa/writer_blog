<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ConsubController extends MainController
{

    public function startMethod()
    {
        return $this->twig->render('consub.twig');
    }

}