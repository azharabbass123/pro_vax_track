<?php 
 
 function loadPatient(){
    try {
        $db = new Database();
        $patients = $db->query('SELECT * FROM users where role_id = 3')->fetchAll(PDO::FETCH_ASSOC);
        return $patients;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }