<?php

class Guest
{
    public function handle(){
        if(isset($_SESSION["user"])){
            if($_SESSION["user"]['userRole'] == 2){
                header('location: health_worker');
            } 
            else if($_SESSION["user"]['userRole'] == 3){
                header('location: patient');
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