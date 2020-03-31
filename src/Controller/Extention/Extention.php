<?php

namespace App\Controller\Extention;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class Extention
 * @package App\Controller
 */

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
            new TwigFunction('hasFlash', array($this, 'hasFlash')),
            new TwigFunction('typeFlash', array($this, 'typeFlash')),
            new TwigFunction('messageFlash', array($this, 'messageFlash'))
        );
    }

    public function url(string $page, array $params = [])
    {
        $params['action'] = $page;
        return 'index.php?' . http_build_query($params);
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