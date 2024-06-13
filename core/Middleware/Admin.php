<?php

class Admin
{
    public function handle(){
        if(($_SESSION["user"]['userRole'] != 1)){

            if($_SESSION["user"]['userRole'] == 2){
                header('location: health_worker');
            } 
            else if($_SESSION["user"]['userRole'] == 3){
                header('location: patient');
            }
            else{
                header('location: /pro_vax_track/');
            }
        }
    }
}