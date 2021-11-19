<?php

    require_once __DIR__.'/../vendor/autoload.php';
    
    use app\Router;
    use app\controllers\ProductController;

    $router = new Router();

    $router->get('/', [ProductController::class, 'index']);
    $router->get('/products/create', [ProductController::class, 'create']);
    $router->get('/products/update', [ProductController::class, 'update']);
    $router->get('/products/delete', [ProductController::class, 'delete']);

    $router->resolve();
?>