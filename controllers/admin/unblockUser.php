<?php

require_once('../../model/UserModel.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    
    $userModel = new UserModel(); 
    $result = $userModel->unblockUser($id); 

    if ($result == 1) {
        echo 1; 
    } else if ($result == 0) {
        echo 0; 
    } else {
        echo 'Error';
    }
} else {
    echo 'Invalid request'; 
}