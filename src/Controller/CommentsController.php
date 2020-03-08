<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class CommentsController extends MainController
{
    public function createMethod()
    {
        $pseudo = $_SESSION['user']['pseudo'];
        if (!empty($this->post->postArray())) {
            $data['contenu'] = $this->post->postVar('contenu');
            $data['auteur'] = $this->post->postVar('auteur');
            $data['date_commentaire'] = $this->post->postVar('date');

            ModelFactory::getModel('Commentaires')->createData($data);
            $this->redirect('admin');
        }
        return $this->twig->render('createComment.twig', [
            'pseudo' => $pseudo
        ]);
    }

    public function deleteMethod()
    {
        ModelFactory::getModel('Commentaires')->deleteData($this->get->getVar('id'));
        $this->redirect('admin');
    }
}