<?php

namespace App\Controller\Extention;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class Extention
 * @package App\Controller\Extention
 */
class Extention extends AbstractExtension
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
     * Extention constructor.
     */
    public function __construct()
    {
        $this->session = filter_var_array($_SESSION);

        if (isset($this->session['user'])){
            $this->user = $this->session['user'];
        }
    }

    /**
     * @return array|TwigFunction[]
     */
    public function getFunctions()
    {
        return array(
            new TwigFunction('url', array($this, 'url')),
            new TwigFunction('hasFlash', array($this, 'hasFlash')),
            new TwigFunction('typeFlash', array($this, 'typeFlash')),
            new TwigFunction('messageFlash', array($this, 'messageFlash'))
        );
    }

    /**
     * @param string $page
     * @param array $params
     * @return string
     */
    public function url(string $page, array $params = [])
    {
        $params['action'] = $page;

        return 'index.php?' . http_build_query($params);
    }

    /**
     * @return bool
     */
    public function hasFlash() {
        return empty($this->session['flash']) == false;
    }

    /**
     *
     */
    public function typeFlash()
    {
        if (isset($this->session['flash'])){
            echo $this->session['flash']['type'];
        }
    }

    /**
     *
     */
    public function messageFlash()
    {
        if (isset($this->session['flash'])){
            echo $this->session['flash']['message'];
            unset($_SESSION['flash']);
        }
    }
}