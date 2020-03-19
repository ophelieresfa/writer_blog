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
        if (!empty($this->post->postArray())) {
            $nom = htmlentities($this->post->postVar('nom'));
            $prenom = htmlentities($this->post->postVar('prenom'));
            $content = htmlentities($this->post->postVar('content'));
            $object = htmlentities($this->post->postVar('object'));

            $to      = 'resfa.ophelie@yahoo.fr';
            $subject = 'Message de ' . $nom . ' ' . $prenom;
            $message = $content;

            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';

            $headers[] = 'From: Blog - Jean Forteroche <blog@forteroche.com>';
            $headers[] = 'Cc: ' . $object;

            mail($to, $subject, $message, implode("\r\n", $headers));

            $this->redirect('contact');
        }
        return $this->twig->render('home.twig');
    }
}