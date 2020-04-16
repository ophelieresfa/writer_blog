<?php

namespace App;

/**
 * Class Router
 * @package App
 */

class Router
{

    /**
     *
     */
    const PATH_CONTROLLER   = 'App\Controller\\';
    /**
     *
     */
    const HOME_CONTROLLER   = 'HomeController';
    /**
     *
     */
    const METHOD_CONTROLLER = 'startMethod';

    /**
     * @var string
     */
    private $controller = self::HOME_CONTROLLER;
    /**
     * @var string
     */
    private $method     = self::METHOD_CONTROLLER;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->parseUrl();
        $this->setController();
        $this->setMethod();
    }

    /**
     *
     */
    public function parseUrl()
    {
        $action = filter_input(INPUT_GET, 'action');

        if (!isset($action)){
            $action = 'home';
        }

        $action           = explode('!', $action);
        $this->controller = $action[0];
        $this->method     = count($action) == 1 ? 'start' : $action[1];
    }

    /**
     *
     */
    public function setController()
    {
        $this->controller = ucfirst(strtolower($this->controller)) . 'Controller';
        $this->controller = self::PATH_CONTROLLER . $this->controller;

        if (!class_exists($this->controller)){
            $this->controller = self::PATH_CONTROLLER . self::HOME_CONTROLLER;
        }
    }

    /**
     *
     */
    public function setMethod()
    {
        $this->method = strtolower($this->method) . 'Method';

        if (!method_exists($this->controller, $this->method)){
            $this->method = self::METHOD_CONTROLLER;
        }
    }

    /**
     *
     */
    public function run()
    {
        $this->controller = new $this->controller();
        $response         = call_user_func([$this->controller, $this->method]);

        echo filter_var($response);
    }
}