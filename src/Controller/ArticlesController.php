<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

class ArticlesController extends MainController
{

    public function startMethod()
    {
        $session = $this->session->isLogged();
        $admin = $this->session->userVar('admin') == 1;
        $billets = ModelFactory::getModel('Billets')->listData();

        $this->session->flash();

        return $this->twig->render('chapters.twig', [
            'billets' => $billets,
            'session' => $session,
            'admin' => $admin
        ]);
    }

    public function createMethod()
    {
        if (!empty($this->post->postArray())) {
            $data['titre'] = $this->post->postVar('titre');
            $data['contenu'] = $this->post->postVar('contenu');
            $data['date_creation'] = $this->post->postVar('date');

            $this->session->setFlash('Chapitre ajouté avec succès');

            ModelFactory::getModel('Billets')->createData($data);
            $this->redirect('articles');
        }
        return $this->twig->render('createArticle.twig');
    }

    public function readMethod()
    {
        $session = $this->session->isLogged();
        $admin = $this->session->userVar('admin') == 1;
        $comments = ModelFactory::getModel('Commentaires')->listData($this->get->getVar
        ('id'), 'id_billet');
        $billet = ModelFactory::getModel('Billets')->readData($this->get->getVar('id'));

        $this->session->flash();

        return $this->twig->render('allChapters.twig', [
            'billet' => $billet,
            'comments' => $comments,
            'session' =>$session,
            'admin' => $admin
        ]);
    }

    public function updateMethod()
    {
        if (!empty($this->post->postArray())) {
            $data['titre'] = $this->post->postVar('titre');
            $data['contenu'] = $this->post->postVar('contenu');
            $data['date_creation'] = $this->post->postVar('date');

            ModelFactory::getModel('Billets')->updateData($this->get->getVar('id'), $data);

            $this->session->setFlash('Chapitre Modifié avec succès');

            $this->redirect('articles!read', ['id' => $this->get->getVar('id')]);

        }

        $billet = ModelFactory::getModel('Billets')->readData($this->get->getVar('id'));
        return $this->twig->render('updateArticle.twig', [
            'billet' => $billet
        ]);
    }

    public function deleteMethod()
    {
        $this->session->setFlash('Chapitre supprimé');
        ModelFactory::getModel('Billets')->deleteData($this->get->getVar('id'));
        $this->redirect('articles');
    }
}