<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ArticlesController extends MainController
{

    public function startMethod()
    {
        $billets = ModelFactory::getModel('Billets')->listData();

        return $this->twig->render('chapters.twig', [
            'billets' => $billets
        ]);
    }

    public function createMethod()
    {
        if (!empty($this->post->postArray())) {
            $data['titre'] = $this->post->postVar('titre');
            $data['contenu'] = $this->post->postVar('contenu');
            $data['date_creation'] = $this->post->postVar('date');

            ModelFactory::getModel('Billets')->createData($data);
            $this->redirect('admin');
        }
        return $this->twig->render('createArticle.twig');
    }

    public function readMethod()
    {
        $billet = Modeactory::getModel('Billets')->readData($this->get->getVar('id'));
        $comments = ModelFactory::getModel('Commentaires')->listData($this->get->getVar('id'), 'id_billet');

        return $this->twig->render('allChapters.twig', [
            'billet' => $billet,
            'comments' => $comments
        ]);

    }

    public function updateMethod()
    {
        var_dump($this->post->postVar('id'));
        if (!empty($this->post->postArray())) {
            $data['id'] = $this->post->postVar('id');
            $data['titre'] = $this->post->postVar('titre');
            $data['contenu'] = $this->post->postVar('contenu');
            $data['updated_date'] = $this->post->postVar('date');

            ModelFactory::getModel('Billets')->updateData($this->get->getVar('id'), $data);
            $this->redirect('admin');
        }

        $billet = ModelFactory::getModel('Billets')->readData($this->get->getVar('id'));
        return $this->twig->render('updateArticle.twig', [
            'billet' => $billet
        ]);


    }

    public function deleteMethod()
    {
        ModelFactory::getModel('Billets')->deleteData($this->get->getVar('titre'));
        $this->redirect('admin');
    }
}