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
<<<<<<< HEAD
    $home = new Controllers\HomeController();
    $home->index();
=======
    require_once __DIR__ . '/../views/home.php';
>>>>>>> 9c069d5 (Warning: Cannot modify header information - headers already sent)
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

$router->get('/register/loginView', function () {
    $register = new Controllers\RegisterController();
    $register->loginView();
});

$router->post('/register/login', function () {
    $register = new Controllers\RegisterController();
    $register->login();
});

$router->get('/register/logout', function () {
    $register = new Controllers\RegisterController();
    $register->logout();
});


// Run it!
$router->run();
