<?php

function goBack(){
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
 ?>
 <h1 class="text-center mt-4">404 Page Not Found</h1>
 <button class="btn btn-primary" onclick="<?=goBack()?>">Go Back</button>
