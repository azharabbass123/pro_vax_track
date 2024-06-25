<?php

require 'Database.php';

class AdminModel {

 public function deleteAptRec($id){
   try{
      $db = new Database();
      $db->query("UPDATE appointments SET
                  deleted_at = NOW()
                  WHERE id = :id",[
                     'id' => $id
                  ]);
      return 1;
   }
   catch (PDOException $e){
      echo "Database Error: " . $e->getMessage();
         exit();
   }
}

 public function deleteHw($id){
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
      return 1;
   }
   catch (PDOException $e){
         echo "Database Error: " . $e->getMessage();
         exit();
   }
}

public function deletePatient($id){
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
      return 1;
   }
   catch (PDOException $e){
      echo "Database Error: " . $e->getMessage();
      exit();
   }
   
}

public function deleteVaxRec($id){
   try{
      $db = new Database();
      $db->query("UPDATE vaccinations SET
                  deleted_at = NOW()
                  WHERE id = :id",[
                     'id' => $id
                  ]);
      return 1;
   }
   catch (PDOException $e){
      echo "Database Error: " . $e->getMessage();
      exit();
   }
}

public function loadAppointments(){
   $db = new Database();
    try {
        $appointments = $db->query('SELECT 
        appointments.id AS appointment_id,
        patient_user.name AS patient_name,
        health_worker_user.name AS health_worker_name,
        appointments.apt_Date AS appointment_date,
        appointments.apt_Status AS appointment_status
        FROM 
        appointments
        JOIN 
        patients ON appointments.patient_id = patients.id
        JOIN 
        users AS patient_user ON patients.userId = patient_user.id
        JOIN 
        health_workers ON appointments.hw_id = health_workers.id
        JOIN 
        users AS health_worker_user ON health_workers.userId = health_worker_user.id
        WHERE 
        appointments.deleted_at IS NULL;')->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($appointments);
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
}

public function loadVaccination(){
   $db = new Database();
    try {
        $vaccinations = $db->query('SELECT 
    vaccinations.id AS vaccination_id,
    vaccinations.patient_id As patient_id,
    patient_user.name AS patient_name,
    vaccinations.vax_Date AS vaccination_date,
    vaccinations.vax_Status AS vaccination_status
FROM 
    vaccinations
JOIN 
    patients ON vaccinations.patient_id = patients.id
JOIN 
    users AS patient_user ON patients.userId = patient_user.id
    WHERE 
    vaccinations.deleted_at IS NULL;')->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($vaccinations);
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
}
public function loadPatients(){
   $db = new Database();
    try {
        $healthWorkers = $db->query('SELECT u.*, c.name AS city_name
        FROM users u
        JOIN cities c ON u.city_id = c.id
        WHERE u.role_id = 3 and u.deleted_at is null;')->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($healthWorkers);
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
 
}
public function loadHealthWorkers() {
   $db = new Database();
    try {
        $healthWorkers = $db->query('SELECT u.*, c.name AS city_name
        FROM users u
        JOIN cities c ON u.city_id = c.id
        WHERE u.role_id = 2 and u.deleted_at is null;')->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($healthWorkers);
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
      }

}