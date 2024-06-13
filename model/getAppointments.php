<?php
function loadAppoitments(){
    try {
        $db = new Database();
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
        return $appointments;
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
 }