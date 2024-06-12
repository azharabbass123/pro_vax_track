<?php

class Admin
{
    public function handle(){
        if(($_SESSION["user"]['userRole'] != 1)){
            Session::destroy();
            header('location: /pro_vax_track/');
        }
    }
}