<?php

$router->get('/', 'controllers/index.php');
$router->get('admin', 'controllers/admin/index.php');
$router->get('health_worker', 'controllers/health_worker/index.php');
$router->get('patient','controllers/patient/index.php');
$router->get('session','controllers/session/create.php')->only('guest');
$router->get('register', 'controllers/register/create.php')->only('guest');