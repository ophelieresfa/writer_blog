<?php

require_once '../vendor/autoload.php';

$router = new AltoRouter();

// map homepage
$router->map( 'GET', '/index', function() {
    require __DIR__ . '../src/View/index.php';
});