<?php 
spl_autoload_register(function ($class) {
    require 'model/' . $class .".php";
});

$form = RegisterForm::validate($attributes = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'date' => $_POST['date'],
    'role' => $_POST['role'],
    'city' => $_POST['city'],
    'password' => $_POST['password']
]);

$user = (new Authenticator)->checkEmail(
    $attributes['name'],
    $attributes['email'],
    $attributes['date'],
    $attributes['role'],
    $attributes['city'],
    $attributes['password']
);

if($user){
    $form->error(
        'email', 'Email already exists, try with a different one.'
    )->throw();
} else {
    header('location: session');
    exit();
}
