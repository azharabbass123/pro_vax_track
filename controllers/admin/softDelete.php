<?php

require_once('../../model/AdminModel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])){
    $action = $_POST['action'];
    $id = $_POST['id'];
    
    $adminModel = new AdminModel();
    
    switch($action){
       case 'deleteAptRec':
          echo ($adminModel->deleteAptRec($id) == 1) ? 1 : 0;
          break;
       case 'deleteVaxRec':
          echo ($adminModel->deleteVaxRec($id) == 1) ? 1 : 0;
          break;
       case 'deleteHw':
          echo ($adminModel->deleteHw($id) == 1) ? 1 : 0;
          break;
       case 'deletePatient':
          echo ($adminModel->deletePatient($id) == 1) ? 1 : 0;
          break;
    }
 }