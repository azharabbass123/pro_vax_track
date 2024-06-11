<?php
function loadVaccinations(){
    try {
        $db = new Database();
        $vaccinations = $db->query('SELECT 
    vaccinations.id AS vaccination_id,
    patient_user.name AS patient_name,
    vaccinations.vax_Date AS vaccination_date,
    vaccinations.vax_Status AS vaccination_status
FROM 
    vaccinations
JOIN 
    patients ON vaccinations.patient_id = patients.id
JOIN 
    users AS patient_user ON patients.userId = patient_user.id;')->fetchAll(PDO::FETCH_ASSOC);
        return $vaccinations;
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
 }