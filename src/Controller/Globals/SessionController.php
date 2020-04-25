<?php

namespace App\Controller\Globals;

/**
 * Class SessionController
 * @package App\Controller\Globals
 */
class SessionController
{
    /**
     * @var mixed|null
     */
    private $session = null;
    /**
     * @var |null
     */
    private $user    = null;

    /**
     * SessionController constructor.
     */
    public function __construct()
    {
        $this->session = filter_var_array($_SESSION);

        if (isset($this->session['user'])){
            $this->user = $this->session['user'];
        }
    }

    /**
     * @param int $id
     * @param string $pseudo
     * @param string $email
     * @param int $admin
     */
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

    /**
     * @return bool
     */
    public function isLogged()
    {
        if (array_key_exists('user', $this->session)){
            if (!empty($this->user)){
                return true;
            }
        }

        return false;
    }

    /**
     * @return mixed|null
     */
    public function sessionArray()
    {
        return $this->session;
    }

    /**
     * @return array|null
     */
    public function userArray()
    {
        if ($this->isLogged() === false){
            $this->user = [];
        }

        return $this->user;
    }

    /**
     * @param $var
     * @return mixed
     */
    public function userVar($var)
    {
        if ($this->isLogged() === false){
            $this->user[$var] = null;
        }

        return $this->user[$var];
    }

    /**
     * @param string $message
     * @param $type
     */
    public function setFlash(string $message, $type)
    {
        $_SESSION['flash'] = array(
            'message' => $message,
            'type'    => $type
        );
    }

    /**
     * @return bool
     */
    public function hasFlash() {
        return empty($this->session['flash']) == false;
    }

    public function typeFlash()
    {
        if (isset($this->session['flash'])){
            return $this->session['flash']['type'];
        }
    }

    public function messageFlash()
    {
        if (isset($this->session['flash'])){
            echo filter_var($this->session['flash']['message']);
            unset($_SESSION['flash']);
        }
    }
}