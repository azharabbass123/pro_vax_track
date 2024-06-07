<?php 
spl_autoload_register(function ($class) {
    require 'model/' . $class .".php";
});

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'role' => $_POST['role']
]);

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password'],
    $attributes['role']
);

if(! $signedIn){
    $form->error(
        'misMatch', 'No matching account for that email and password.'
    )->throw();
}
$userRoleId = (int) Session::get('user')['userRole'];
switch ($userRoleId){
    case 1:
        header('location: admin');
        break;
    case 2:
        header('location: health_worker');
        break;
    default:
        header('location: patient');
        break;
}

exit();