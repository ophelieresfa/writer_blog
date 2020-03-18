<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class CommentsController extends MainController
{
    public function createMethod()
    {
        if (!empty($this->post->postArray())) {
            $data['auteur'] = $this->post->postVar('pseudo');
            $data['contenu'] = $this->post->postVar('content');
            $data['date_commentaire'] = $this->post->postVar('date');
            $data['id_billet'] = $this->get->getVar('id');
            $data['id_utilisateur'] = 0;

            ModelFactory::getModel('Commentaires')->createData($data);

            $this->redirect('articles!read', ['id' => $this->get->getVar('id')]);
        }
        return $this->twig->render('allChapters.twig');
    }

    public function deleteMethod()
    {
        ModelFactory::getModel('Commentaires')->deleteData($this->get->getVar('id_comment'));
        $this->redirect('articles');
    }

    public function reportMethod()
    {
        $data['report'] = 1;

        ModelFactory::getModel('Commentaires')->updateData($this->get->getVar('id_comment'), $data);

        $this->redirect('articles');
    }

    public function notreportMethod()
    {
        $data['report'] = 0;

        ModelFactory::getModel('Commentaires')->updateData($this->get->getVar('id_comment'), $data);

        $this->redirect('admin');
    }
}