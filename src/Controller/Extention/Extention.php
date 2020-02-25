<?php

namespace App\Controller\Extention;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Extention extends AbstractExtension
{
    private $session = null;
    private $user = null;

    public function __construct()
    {
        $this->session = filter_var_array($_SESSION);

        if (isset($this->session['user']))
        {
            $this->user = $this->session['user'];
        }
    }

    public function getFunctions()
    {
        return array(
            new TwigFunction('url', array($this, 'url')),
            new TwigFunction('getSessionArray', array($this, 'getSessionArray')),
            new TwigFunction('isLogged', array($this, 'isLogged'))
        );

    }

    public function url(string $page, array $params = [])
    {
        $params['action'] = $page;
        return 'index.php?' . http_build_query($params);
    }

    public function getSessionArray()
    {
        return $this->session;
    }

    public function isLogged()
    {
        if (array_key_exists('user', $this->session))
        {
            if (!empty($this->session['user']))
            {
                return true;
            }
        }
        return false;
    }

    public function getUserVar($var)
    {
        if ($this->isLogged() === false) {
            $this->user[$var] = null;
        }
        return $this->user[$var];
    }
}