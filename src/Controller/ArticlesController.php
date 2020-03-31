<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

/**
 * Class ArticlesController
 * @package App\Controller
 */

class ArticlesController extends MainController
{

    public function startMethod()
    {
        $session = $this->session->isLogged();
        $admin = $this->session->userVar('admin') == 1;
        $posts = ModelFactory::getModel('Billets')->listData();

        $this->session->flash();

        return $this->twig->render('chapters.twig', [
            'posts' => $posts,
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

            $this->session->setFlash('Le chapitre a été ajouté avec succès.', 'success');

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
        $post = ModelFactory::getModel('Billets')->readData($this->get->getVar('id'));

        $this->session->flash();

        return $this->twig->render('allChapters.twig', [
            'post' => $post,
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

            $this->session->setFlash('Le chapitre a été modifié avec succès', 'success');

            $this->redirect('articles!read', ['id' => $this->get->getVar('id')]);

        }

        $post = ModelFactory::getModel('Billets')->readData($this->get->getVar('id'));
        return $this->twig->render('updateArticle.twig', [
        'post' => $post
    ]);
    }

    public function deleteMethod()
    {
        $comments = new CommentsController();
        $comments->deleteMethod();

        ModelFactory::getModel('Billets')->deleteData($this->get->getVar('id'));
        $this->session->setFlash('Le chapitre a été supprimé', 'success');

        $this->redirect('articles');
    }
}