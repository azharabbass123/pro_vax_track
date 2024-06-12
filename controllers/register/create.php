<?php


require 'model/getProvinces.php';
require 'model/getRoles.php';

$prvinces = loadProvince();
$roles = loadRole();

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

view('register/register.view.php', [
    'errors' => $sessionData['errors'] ?? [],
    'provinces' => $provinces,
    'roles' => $roles
]);


//require 'views/register/register.view.php';