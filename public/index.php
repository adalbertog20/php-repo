<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Router;

$router = new Router();

$router->register('/', [App\Classes\Home::class, 'index']);
$router->register('/invoices', [App\Classes\Invoice::class, 'index']);
$router->register('/invoices/create', [App\Classes\Invoice::class, 'create']);

echo $router->resolve($_SERVER['REQUEST_URI']);
