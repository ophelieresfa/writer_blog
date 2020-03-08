<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ContactController extends MainController
{

    public function startMethod()
    {
        return $this->twig->render('contact.twig');
    }

    public function sendMethod()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom    = htmlentities($this->post['nom']);
            $prenom     = htmlentities($this->post['prenom']);
            $email        = htmlentities($this->post['email']);
            $objet  = htmlentities($this->post['objet']);
            $message      = $this->post['message'];

            $from = $email;
            $to = "resfa.ophelie@yahoo.fr";

            $sujet = 'Message de ' . $nom . $prenom . '<'. $email . '>';
            $contenu = $message;

            $header  = 'MIME-Version: 1.0'."\r\n";
            $header .= 'Content-type: text/html; charset=utf-8'."\r\n";
            $header .= 'From: '.$from."\r\n";

            mail($to,$sujet,$contenu,$header);

            $this->redirect('contact');
        }
        return $this->twig->render('home.twig');
    }

}