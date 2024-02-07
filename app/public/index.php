<?php

require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->setNamespace('\Controllers');

$router->post('/wysiwyg', function () {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
});

$router->get('/', function () {
    $wysiqyg = new Services\Wysiqyg();
    $wysiqyg->render("echo 'Hello World!';", "content", "/wysiwyg");
});

$router->run();
