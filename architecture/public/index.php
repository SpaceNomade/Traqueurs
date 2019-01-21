<?php
define('ROOT', dirname(__DIR__));
var_dump(ROOT);

require '../vendor/autoload.php';

$router = new Bramus\Router\Router();

$router->get('/', 'App\Controller\HomeController@show');


$router->mount('/persos', function() use ($router) {
    $router->get('/(\d+)', 'App\Controller\PersoController@show');
});

$router->set404(function(){
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo "404, route not found";
});

var_dump($router);
$router->run();
