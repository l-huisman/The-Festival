<?php

require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/hello', function () {
    echo 'Hello world!';
});

$router->$router->run();
