<?php 

spl_autoload_register(function ($class) {
  require 'model/' .$class .".php";
});


require 'core/Middleware/Middleware.php';
require 'core/Middleware/Guest.php';
require 'Router.php';
$router = new Router();
session_start();
require 'routes.php';


$uri = isset($_GET['url']) ? $_GET['url'] : '/';
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
  $router->route($uri, $method);
} catch (ValidationException $exception) {
  Session::flash('errors', $exception->getErrors());
  Session::flash('old', $exception->getOld());

  $previous_url = $_SERVER['HTTP_REFERER'];
  header("location: $previous_url");
  exit();
}

Session::unflash();

