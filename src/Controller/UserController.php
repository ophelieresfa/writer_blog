<?php

namespace App\Controller;

use App\Model\Factory\ModelFactory;

/**
 * Class UserController
 * @package App\Controller
 */

class UserController extends MainController
{

    public function startMethod()
    {
        if (!empty($this->session->isLogged())) {
            return $this->twig->render('admin.twig');
        }
        return $this->twig->render('consub.twig');
    }

    public function loginMethod()
    {
        if (!empty($this->post->postArray())) {
            $user = ModelFactory::getModel('Utilisateurs')->readData($this->post->postVar('email'), 'email');

            if (password_verify($this->post->postVar('password'), $user['password'])) {
                $this->session->createSession(
                    $user['id'],
                    $user['pseudo'],
                    $user['email'],
                    $user['admin']
                );
                $this->redirect('admin');
            }
            $this->session->setFlash('Connexion échouée : Email ou mot de passe invalide', 'error');
            $this->redirect('admin');
        }
        return $this->twig->render('connection.twig');
    }


    public function logoutMethod()
    {
        $this->session->destroySession();
        $this->redirect('user');
    }

    public function createMethod()
    {
        if (!empty($this->post->postArray())) {
            $data['pseudo'] = $this->post->postVar('pseudo');
            $data['email'] = $this->post->postVar('email');
            $data['password'] = password_hash($this->post->postVar('password'), PASSWORD_DEFAULT);
            $data['admin'] = 0;

            $user = ModelFactory::getModel('Utilisateurs')->readData($this->post->postVar('email'), 'email');

            if ($this->post->postVar('email') !== $user['email']) {
                ModelFactory::getModel('Utilisateurs')->createData($data);
                $this->session->setFlash('Votre inscription a été enregistrée, vous pouvez dès à présent vous connecter', 'success');
                $this->redirect('user!login');
            }
            $this->session->setFlash('Votre inscription n\'a pas été enregistrée car vous avez déjà un compte avec cette adresse mail', 'error');
            $this->redirect('admin');
        }
        return $this->twig->render('subscribe.twig');
    }

    public function deleteMethod()
    {
        $comment = ModelFactory::getModel('Commentaires')->listData($this->get->getVar('id_user'), 'id_utilisateur');

        if (!empty($comment)) {
            ModelFactory::getModel('Commentaires')->deleteData($this->get->getVar('id_user'), 'id_utilisateur');
        }

        ModelFactory::getModel('Utilisateurs')->deleteData($this->get->getVar('id_user'));
        $_SESSION['user'] = [];
        $this->session->setFlash('Votre compte a été supprimé', 'error');

        $this->redirect('home');
    }
}