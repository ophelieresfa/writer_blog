<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ContactController extends MainController
{

    public function startMethod()
    {
        $this->session->flash();
        return $this->twig->render('contact.twig');
    }

    public function sendMethod()
    {
        if (!empty($this->post->postArray())) {
            $name = htmlentities($this->post->postVar('nom'));
            $firstname  = htmlentities($this->post->postVar('prenom'));
            $content = htmlentities($this->post->postVar('content'));
            $object  = htmlentities($this->post->postVar('object'));
            $email  = htmlentities($this->post->postVar('email'));

            $to      = 'resfa.ophelie@yahoo.fr';
            $subject = 'Message de ' . $name . ' ' . $firstname;

            $message = nl2br("Object : $object \n Contenu du message : $content");

            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'From: Blog - Jean Forteroche <ophelie.resfa@gmail.com>';
            $headers[] = 'To: ' . $name . $firstname . '<' . $email .'>';

            mail($to, $subject, $message, implode("\r\n", $headers));

            $this->session->setFlash('Votre message a été envoyé avec succès', 'success');

            $this->redirect('contact');
        }
        return $this->twig->render('home.twig');
    }
}