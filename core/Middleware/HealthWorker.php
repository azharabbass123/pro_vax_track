<?php

class HealthWorker 
{
    public function handle(){
        if(($_SESSION["user"]['userRole'] != 2)){

            if($_SESSION["user"]['userRole'] == 1){
                header('location: admin');
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