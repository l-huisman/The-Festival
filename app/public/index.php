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
    $home = new Views\Home();
    $home->render();
});

$router->get('/music', function () {
    $music = new Views\Music();
    $music->render();
});

$router->get('/yummy', function () {
    $yummy = new Controllers\YummyController();
    $yummy->yummyOverview();
});

$router->get('/yummyDetail', function () {
    $yummy = new Controllers\YummyController();
    $yummy->yummyDetail();
});

$router->run();
