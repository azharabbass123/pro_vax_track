<?php 
spl_autoload_register(function ($class) {
    require 'model/' . $class .".php";
});
$patient_Id = Session::get('user')['curUserId'];
$form = AppointmentForm::validate($attributes = [
    'patient_id' => $patient_Id,
    'date' => $_POST['date'],
    'health_worker' => $_POST['health_worker'],
    'status' => $_POST['status']
]);
//  print_r($attributes);
//  exit();
$user = (new Authenticator)->createAppointment(
    $attributes['patient_id'],
    $attributes['date'],
    $attributes['health_worker'],
    $attributes['status'],
);

if(!$user){
    $form->error(
        'msg', 'Failed to schedule appointment'
    )->throw();
} else {
    header('location: patient');
    exit();
}