<?php

require 'Database.php';
function deleteAptRec($id){
   try{
      $db = new Database();
      $db->query("UPDATE appointments SET
                  deleted_at = NOW()
                  WHERE id = :id",[
                     'id' => $id
                  ]);
      echo 1;
   }
   catch (PDOException $e){
      echo "Database Error: " . $e->getMessage();
         exit();
   }
}

function deleteHw($id){
   try{
      $db = new Database();
      $db->query("UPDATE users SET
                  deleted_at = NOW()
                  WHERE id = :id",[
                     'id' => $id
                  ]);
      $db->query("UPDATE health_workers SET
                  deleted_at = NOW()
                  WHERE userId = :id",[
                     'id' => $id
                  ]);
      echo 1;
   }
   catch (PDOException $e){
         echo "Database Error: " . $e->getMessage();
         exit();
   }
}

function deletePatient($id){
   try{
      $db = new Database();
      $db->query("UPDATE users SET
                   deleted_at = NOW()
                   WHERE id = :id",[
                      'id' => $id
                   ]);
      $db->query("UPDATE patients SET
                   deleted_at = NOW()
                   WHERE userId = :id",[
                      'id' => $id
                   ]);
      echo 1;
   }
   catch (PDOException $e){
      echo "Database Error: " . $e->getMessage();
      exit();
   }
   
}

function deleteVaxRec($id){
   try{
      $db = new Database();
      $db->query("UPDATE vaccinations SET
                  deleted_at = NOW()
                  WHERE id = :id",[
                     'id' => $id
                  ]);
      echo 1;
   }
   catch (PDOException $e){
      echo "Database Error: " . $e->getMessage();
      exit();
   }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])){
   $action = $_POST['action'];
   $id = $_POST['id'];

   switch($action){
      case 'deleteAptRec':
         deleteAptRec($id);
         break;
      case 'deleteVaxRec':
         deleteVaxRec($id);
         break;
      case 'deleteHw':
         deleteHw($id);
         break;
      case 'deletePatient':
         deletePatient($id);
         break;
   }
}