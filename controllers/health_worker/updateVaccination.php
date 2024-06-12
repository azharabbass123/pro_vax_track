<?php 
spl_autoload_register(function ($class) {
    require 'model/' . $class .".php";
});

$prevUrl = $_POST['prevUrl'];

$attributes = [
    'vaccination_id' => $_POST['id'],
     'date' => $_POST['date'],
     'status' => $_POST['status']
];

$user = (new Authenticator)->updateVaccination(
    $attributes['vaccination_id'],
    $attributes['date'],
    $attributes['status'],
);

if(!$user){
    $form->error(
        'msg', 'Failed to create vaccination schedule'
    )->throw();
} else {
    header("location: $prevUrl");
    exit();
}