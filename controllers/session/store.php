<?php 
spl_autoload_register(function ($class) {
    require 'model/' . $class .".php";
});

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

if(! $signedIn){
    $form->error(
        'misMatch', 'No matching account for that email address and password.'
    )->throw();
}

header('location: admin');
exit();