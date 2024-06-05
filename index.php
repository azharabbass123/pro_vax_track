<?php 

require 'Router.php';
$router = new Router();
require 'routes.php';


$uri = isset($_GET['url']) ? $_GET['url'] : '/';
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// echo($uri);
// die();
  $router->route($uri, $method);
//require 'controllers/admin/index.php';

