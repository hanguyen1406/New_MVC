<?php
require_once 'core/Router.php';
require_once 'controllers/NewController.php';
require_once 'controllers/AdminController.php';

$router = new Router();
$router->add('/New_MVC/admin', [new AdminController(), 'index']);
$router->dispatch($_SERVER['REQUEST_URI']);

?>