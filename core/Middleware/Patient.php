<?php

class Patient
{
    public function handle(){
        if(($_SESSION["user"]['userRole'] != 3)){

            if($_SESSION["user"]['userRole'] == 2){
                header('location: health_worker');
            } 
            else if($_SESSION["user"]['userRole'] == 1){
                header('location: admin');
            }
            else{
                header('location: /pro_vax_track/');
            }
        }
    }
}