<?php

class HealthWorker 
{
    public function handle(){
        if($_SESSION["role"] == 'health_worker'){
            header('location: health_worker');
        }
        else{
            header('location: /');
        }
    }
}