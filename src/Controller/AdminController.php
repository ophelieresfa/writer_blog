<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class AdminController extends MainController
{
    public function startMethod()
    {
        $pseudo = $_SESSION['user']['pseudo'];
        return $this->twig->render('admin.twig', [
            'pseudo' => $pseudo
        ]);
    }
}

