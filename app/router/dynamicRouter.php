<?php
// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Define controller namespace
$router->setNamespace('\Controllers');

$router->get('/', function () {
    require_once __DIR__ . "/../views/home.php";
});

/**
 * Handle dynamic routing based on the controller and action parameters.
 *
 * @param string $controller The name of the controller.
 * @param string $action The name of the function called within the router.
 * @return void
 */
$router->get('/{controller}(/[a-z0-9_-]+)?', function ($controller, $action) {
    $controller = ucfirst($controller); // Capitalize the first letter
    $controller = "\\Controllers\\{$controller}Controller"; // Append 'Controller' to the controller name and prepend the namespace

    if (class_exists($controller)) {
        $controllerInstance = new $controller();
        if ($action !== null && method_exists($controllerInstance, $action)) {
            $controllerInstance->action();
        } else if (method_exists($controllerInstance, 'index')) {
            $controllerInstance->index();
        } else {
            require_once __DIR__ . '/../views/404.php';
        }
    } else {
        require_once __DIR__ . '/../views/404.php';
    }
});

/**
 * Handles dynamic routing for POST requests.
 *
 * @param string $controller The name of the controller.
 * @param string $action The name of the action.
 * @return void
 */
$router->post('/{controller}/{action}', function ($controller, $action) {
    $controller = ucfirst($controller); // Capitalize the first letter
    $controller = "\\Controllers\\{$controller}Controller"; // Append 'Controller' to the controller name and prepend the namespace

    if (class_exists($controller)) {
        $controllerInstance = new $controller();

        if (method_exists($controllerInstance, $action)) {
            $controllerInstance->$action();
        } else {
            require_once __DIR__ . '/../views/404.php';
        }
    } else {
        require_once __DIR__ . '/../views/404.php';
    }
});

$router->run();
