<?php

class Patient
{
    public function handle(){
        if($_SESSION["role"] == 'patient'){
            header('location: patient');
        }
        else{
            header('location: /');
        }
    }
}