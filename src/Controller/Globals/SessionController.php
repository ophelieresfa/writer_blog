<?php

namespace App\Controller\Globals;

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

    public function createSession(int $id, string $pseudo, string $email, string $password, string $status)
    {
        $_SESSION['user'] = [
            'id'    => $id,
            'pseudo'  => $pseudo,
            'email' => $email,
            'password' => $password,
            'status' => $status
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

    public function getSessionArray()
    {
        return $this->session;
    }

    public function getUserArray()
    {
        if ($this->isLogged() === false)
        {
            $this->user = [];
        }
        return $this->user;
    }

    public function getUserVar($var)
    {
        if ($this->isLogged() === false)
        {
            $this->user[$var] = null;
        }
        return $this->user[$var];
    }
}