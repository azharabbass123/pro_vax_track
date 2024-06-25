<?php

require_once('../../model/UserModel.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    
    $userModel = new UserModel(); 
    $result = $userModel->getCitiesName($id); 
    echo $result;
}
