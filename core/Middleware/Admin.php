<?php

class Admin
{
    public function handle(){
        if($_SESSION["role"] == 'role'){
            header('location: admin');
        }
        else{
            header('location: /');
        }
    }
}