<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ContactController extends MainController
{

    public function startrMethod()
    {
        return $this->twig->render('contact.twig');
    }

}