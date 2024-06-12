<?php

class Patient
{
    public function handle(){
        if(($_SESSION["user"]['userRole'] != 3)){
            Session::destroy();
            header('location: /pro_vax_track/');
        }
    }
}