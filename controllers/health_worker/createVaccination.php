<?php 
spl_autoload_register(function ($class) {
    require 'model/' . $class .".php";
});
require 'core/VaccinationForm.php';
$form = VaccinationForm::validate($attributes = [
    'date' => $_POST['date'],
    'patient' => $_POST['patient'],
    'status' => $_POST['status']
]);
// print_r($attributes);
// exit();
$user = (new Authenticator)->createVaccination(
    $attributes['date'],
    $attributes['status'],
    $attributes['patient']
);

if(!$user){
    $form->error(
        'msg', 'Failed to create vaccination schedule'
    )->throw();
} else {
    header('location: health_worker');
    exit();
}