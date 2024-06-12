<?php 
spl_autoload_register(function ($class) {
    require 'model/' . $class .".php";
});

require 'core/UpdateProfileForm.php';

$prevUrl = $_POST['prevUrl'];
$id = $_POST['id'];

$form = UpdateProfileForm::validate($attributes = [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'date' => $_POST['date'],
    'city' => $_POST['city'],
]);
print_r($attributes);

$user = (new Authenticator)->updateProfile(
    $attributes['id'],
    $attributes['name'],
    $attributes['date'],
    $attributes['city'],
);

header("location: $prevUrl");
