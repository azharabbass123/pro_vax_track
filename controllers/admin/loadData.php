<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once('../../model/AdminModel.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action'])){
    $action = $_GET['action'];
    
    $adminModel = new AdminModel();
    
    switch($action){
       case 'hw':
          $result = $adminModel->loadHealthWorkers();
          header('Content-Type: application/json');
          echo $result;
          break;
       case 'patient':
          $result = $adminModel->loadPatients();
          header('Content-Type: application/json');
          echo $result;
          break;
       case 'apt':
          $result = $adminModel->loadAppointments();
          header('Content-Type: application/json');
          echo $result;
          break;
       case 'vax':
          $result = $adminModel->loadVaccination();
          header('Content-Type: application/json');
          echo $result;
          break;
    }
 }