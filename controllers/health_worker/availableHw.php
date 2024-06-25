<?php

require_once('../../model/UserModel.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'])) {
    $date = $_POST['date'];
    
    
    $userModel = new UserModel(); 
    $result = $userModel->avaialbleHealthWorkers($date); 
    echo $result;
}
