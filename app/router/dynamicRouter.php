<?php
// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

// Define controller namespace
$router->setNamespace('\Controllers');

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

    $controller = explode('/', $controller);
    if(count($controller) > 1){
        //Luke je kut controller werkte niet als je naar /register/loginview ging zocht hij naar een controller genaamd register/loginviewController 
        //maar hij moest zoeken naar een controller genaamd registerController en dan de functie loginview wat hij nu doet
        $action = $controller[1];
        $action = str_replace('Controller', '', $action);
        $controller = $controller[0].'Controller';
    } else {
        $controller = $controller[0];
    }
    
    if (class_exists($controller)) {
        $controllerInstance = new $controller();
        if ($action !== null && method_exists($controllerInstance, $action)) {
            $controllerInstance->$action();
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
