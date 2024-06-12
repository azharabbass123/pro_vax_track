<?php

spl_autoload_register(function ($class) {
    require 'model/' . $class .".php";
});
require 'core/AppointmentForm.php';

$prevUrl = $_POST['prevUrl'];

$form = AppointmentForm::validate($attributes = [
    'appointment_id' => $_POST['id'],
    'date' => $_POST['date'],
    'health_worker' => $_POST['health_worker'],
    'status' => $_POST['status']
]);
//  print_r($attributes);
//  exit();
$user = (new Authenticator)->updateAppointment(
    $attributes['appointment_id'],
    $attributes['date'],
    $attributes['status'],
);

if(!$user){
    $form->error(
        'msg', 'Failed to schedule appointment'
    )->throw();
} else {
    header("location: $prevUrl");
    exit();
}
