<?php

$router->get('/', 'controllers/index.php')->only('guest');
$router->get('admin', 'controllers/admin/index.php')->only('admin');


$router->get('session','controllers/session/create.php')->only('guest');
$router->delete('session','controllers/session/destroy.php');
$router->post('session', 'controllers/session/store.php')->only('guest');


$router->get('register', 'controllers/register/create.php')->only('guest');
$router->post('register', 'controllers/register/store.php')->only('guest');


$router->get('health_worker', 'controllers/health_worker/index.php')->only('health_worker');
$router->get('vaccination', 'controllers/health_worker/vaccination.php')->only('health_worker');
$router->post('vaccination', 'controllers/health_worker/createVaccination.php');
$router->get('editVaccination', 'controllers/health_worker/editVaccination.php');
$router->patch('editVaccination', 'controllers/health_worker/updateVaccination.php');


$router->get('patient','controllers/patient/index.php')->only('patient');
$router->get('appointment','controllers/patient/appointment.php')->only('patient');
$router->post('appointment','controllers/patient/createAppointment.php');
$router->get('editAppointment','controllers/patient/editAppointment.php');
$router->patch('editAppointment','controllers/patient/updateAppointment.php');
$router->get('editProfile', 'controllers/register/updateProfile.php');
$router->post('editProfile', 'controllers/register/storeUpdatedProfile.php');

// route to create initialize tables
// $router->get('seeder', 'seeder.php')->only('guest');