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

view('health_worker/vaccination.view.php', [
    'errors' => $sessionData['errors'] ?? [],
]);


//require 'views/health_worker/vaccination.view.php';