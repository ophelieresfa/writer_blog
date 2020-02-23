<?php

namespace App\Controller;

abstract class SupGlobController
{
    protected $get = null;
    protected $post =  null;
    private $session = null;
    private $user = null;

    public function __construct()
    {
        $this->get = filter_input_array(INPUT_GET);
        $this->post = filter_input_array(INPUT_POST);
        $this->session = filter_var_array($_SESSION);
        if (isset($this->session['users']))
        {
            $this->user = $this->session['users'];
        }
    }

    public function createSession(int $id, string $pseudo, string $email, string $pass, string $status)
    {
        $_SESSION['users'] = [
            'id' => $id,
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $pass,
            'status' => $status
        ];
    }

    public function deleteSession()
    {
        $_SESSION['users'] = [];
    }

    public function connected()
    {
        if (array_key_exists('users', $this->session)) {
            if (!empty($this->user)) {
                return true;
            }
        }
        return false;
    }

    public function userVar($var)
    {
        if (($this->connected() === false)) {
            $this->user[$var] = null;
        }
        return $this->user[$var];
    }
}