<?php
// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Define controller namespace
$router->setNamespace('\Controllers');

// Define routes
$router->post('/wysiwyg', function () {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
});

$router->get('/', function () {
    $home = new Controllers\HomeController();
    $home->index();
});

$router->get('/music', function () {
    $music = new Controllers\MusicController();
    $music->index();
});

$router->get('/register', function () {
    $register = new Controllers\RegisterController();
    $register->index();
});

$router->post('/register/validateUser', function () {
    $register = new Controllers\RegisterController();
    $register->validateUser();
});

// Run it!
$router->run();
