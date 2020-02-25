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
            new TwigFunction('url', array($this, 'url'))
        );

    }

    public function url(string $page, array $params = [])
    {
        $params['action'] = $page;
        return 'index.php?' . http_build_query($params);
    }
}