<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class CommentsController
 * @package App\Controller
 */

class CommentsController extends MainController
{

    private function idArticle()
    {
        $id_comment     = $this->get->getVar('id_comment');
        $comment        = ModelFactory::getModel('Commentaires')->readData($id_comment);
        $id_article     = $comment['id_billet'];

        return $id_article;
    }

    /**
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function createMethod()
    {
        if (!empty($this->post->postArray())){
            $data['auteur']           = $this->post->postVar('pseudo');
            $data['contenu']          = $this->post->postVar('content');
            $data['date_commentaire'] = $this->post->postVar('date');
            $data['id_billet']        = $this->get->getVar('id');
            $data['id_utilisateur']   = $this->session->userVar('id');

            ModelFactory::getModel('Commentaires')->createData($data);
            $this->session->setFlash('Le commentaire a été ajouté avec succès', 'success');

            $this->redirect('articles!read', ['id' => $this->get->getVar('id')]);
        }

        return $this->twig->render('allChapters.twig');
    }

    public function deleteMethod()
    {
        $id_comment = $this->get->getVar('id_comment');
        $comment    = ModelFactory::getModel('Commentaires')->readData($id_comment);
        $id_article = $comment['id_billet'];

        ModelFactory::getModel('Commentaires')->deleteData($id_comment);
        $this->session->setFlash('Le commentaire a été supprimé', 'success');

        $this->redirect('articles!read', ['id' => $id_article]);
    }

    public function reportMethod()
    {
        $id_comment     = $this->get->getVar('id_comment');
        $comment        = ModelFactory::getModel('Commentaires')->readData($id_comment);
        $id_article     = $comment['id_billet'];
        $data['report'] = 1;

        ModelFactory::getModel('Commentaires')->updateData($id_comment, $data);
        $this->session->setFlash('Le commentaire a été signalé', 'success');

        $this->redirect('articles!read', ['id' => $id_article]);
    }

    public function notreportMethod()
    {
        $id_comment     = $this->get->getVar('id_comment');
        $comment        = ModelFactory::getModel('Commentaires')->readData($id_comment);
        $id_article     = $comment['id_billet'];
        $data['report'] = 0;

        ModelFactory::getModel('Commentaires')->updateData($id_comment, $data);
        $this->session->setFlash('Le commentaire a été autorisé', 'success');

        $this->redirect('articles!read', ['id' => $id_article]);
    }
}