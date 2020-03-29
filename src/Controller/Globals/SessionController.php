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
        $_SESSION['alert'] = array(
            'message' => $message,
            'type'    => $type
        );
    }

    public function flash()
    {
        if (isset($_SESSION['alert'])) {
            ?>
            <div class="flash flash-<?php echo $_SESSION['alert']['type']; ?>">
                <?php echo $_SESSION['alert']['message']; ?>
            </div>
            <?php
            unset($_SESSION['alert']);
        }
    }
}