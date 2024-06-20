<?php

require 'model/getData.php';

$id = $_GET['id'];

$prvinces = loadProvince();
$userData = loadUser($id);

$sessionData = Session::get('_flash');
function old($key, $default = '')
{
    return  Session::get('_flash')['old'][$key] ?? $default;
}
function view($path, $attributes = [])
{
    extract($attributes);

    require 'views/' . $path;
}

view('register/updateProfile.view.php', [
    'errors' => $sessionData['errors'] ?? [],
    'userData' => $userData,
    'provinces' => $provinces
]);
