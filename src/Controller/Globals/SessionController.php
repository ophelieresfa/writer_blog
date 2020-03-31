<?php

namespace App\Controller\Globals;

/**
 * Class SessionController
 * @package App\Controller
 */

class SessionController
{
    private $session = null;
    private $user = null;

    public function __construct()
    {
        $this->session = filter_var_array($_SESSION);
        if (isset($this->session['user'])) {
            $this->user = $this->session['user'];
        }
    }

    public function createSession(int $id, string $pseudo, string $email, int $admin)
    {
        $_SESSION['user'] = [
            'id'    => $id,
            'pseudo'  => $pseudo,
            'email' => $email,
            'admin' => $admin
        ];
    }

    public function destroySession()
    {
        $_SESSION['user'] = [];
        session_destroy();
    }

    public function isLogged()
    {
        if (array_key_exists('user', $this->session)) {
            if (!empty($this->user)) {
                return true;
            }
        }
        return false;
    }

    public function sessionArray()
    {
        return $this->session;
    }

    public function userArray()
    {
        if ($this->isLogged() === false)
        {
            $this->user = [];
        }
        return $this->user;
    }

    public function userVar($var)
    {
        if ($this->isLogged() === false)
        {
            $this->user[$var] = null;
        }
        return $this->user[$var];
    }

    public function setFlash(string $message, $type)
    {
        $_SESSION['flash'] = array(
            'message' => $message,
            'type'    => $type
        );
    }

    public function hasFlash() {
        return empty($_SESSION['flash']) == false;
    }

    public function typeFlash()
    {
        if (isset($_SESSION['flash'])) {
            echo $_SESSION['flash']['type'];
        }
    }

    public function messageFlash()
    {
        if (isset($_SESSION['flash'])) {
            echo $_SESSION['flash']['message'];
            unset($_SESSION['flash']);
        }
    }
}