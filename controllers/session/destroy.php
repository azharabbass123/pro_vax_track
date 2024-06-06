<?php 

spl_autoload_register(function ($class) {
    require 'model/' . $class .".php";
});

Session::destroy();
header('location: /pro_vax_track/');
exit();