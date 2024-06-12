<?php


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
]);


//require 'views/register/register.view.php';