<?php

namespace App;

use Exception;
use App\Controller\BilletController;
use App\Controller\HomeController;

require_once 'Controller/HomeController.php';
require_once 'Controller/BilletController.php';

class Router {

    private $homeController;
    private $billetController;

    public function __construct()
    {
        $this->homeController = new HomeController();
        $this->billetController = new BilletController();
    }

    public function run()
    {
        try {
            if (isset($_GET['access'])) {
                switch ($_GET['access']) {
                    case 'billet':
                        $this->billetController->post();
                        break;

                    default:
                        $this->homeController->home();
                }
            }
            else
            {
                $this->homeController->home();
            }
        }

        catch (Exception $e)
        {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

}
