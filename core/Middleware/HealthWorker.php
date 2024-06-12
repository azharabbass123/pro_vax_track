<?php

class HealthWorker 
{
    public function handle(){
        if(($_SESSION["user"]['userRole'] != 2)){
            Session::destroy();
            header('location: /pro_vax_track/');
        }
    }
}