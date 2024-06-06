<?php

$router->get('/', 'controllers/index.php')->only('guest');
$router->get('admin', 'controllers/admin/index.php');
$router->get('health_worker', 'controllers/health_worker/index.php');
$router->get('patient','controllers/patient/index.php');


$router->get('session','controllers/session/create.php')->only('guest');
$router->delete('session','controllers/session/destroy.php');
$router->post('session', 'controllers/session/store.php')->only('guest');


$router->get('register', 'controllers/register/create.php')->only('guest');



// route to create initialize tables
// $router->get('seeder', 'seeder.php')->only('guest');