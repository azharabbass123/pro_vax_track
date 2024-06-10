<?php


require 'model/Session.php';
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

view('patient/appointment.view.php', [
    'errors' => $sessionData['errors'] ?? [],
]);

//require 'views/patient/appointment.view.php';