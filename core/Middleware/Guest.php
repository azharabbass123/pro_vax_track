<?php

class Guest
{
    public function handle(){
        if(isset($_SESSION["role"])){
            header('location: /pro_vax_track/');
        }
    }
}