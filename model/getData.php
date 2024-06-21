<?php 

$db = new Database();
try {
    $provinces = $db->query('SELECT * FROM provinces')->fetchAll(PDO::FETCH_ASSOC);
    return $provinces;
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
    exit();
    
}
 
 function loadProvince(){
    $db = new Database();
    try {
        $provinces = $db->query('SELECT * FROM provinces')->fetchAll(PDO::FETCH_ASSOC);
        return $provinces;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }

 function loadRole(){
    $db = new Database();
    try {
        $roles = $db->query('SELECT * FROM roles')->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }
 function loadPatient(){
    $db = new Database();
    try {
        $patients = $db->query('SELECT * FROM users where role_id = 3 and deleted_at is null')->fetchAll(PDO::FETCH_ASSOC);
        return $patients;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }

 function loadPatientWithCity(){
    $db = new Database();
    try {
        $healthWorkers = $db->query('SELECT u.*, c.name AS city_name
        FROM users u
        JOIN cities c ON u.city_id = c.id
        WHERE u.role_id = 3 and u.deleted_at is null;')->fetchAll(PDO::FETCH_ASSOC);
        return $healthWorkers;
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
 }

function loadAppoitments(){
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
        return $appointments;
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
 }

 function loadHealthWorker(){
    $db = new Database();
    try {
        $healthWorkers = $db->query('SELECT * FROM users where role_id = 2 and deleted_at is null')->fetchAll(PDO::FETCH_ASSOC);
        return $healthWorkers;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }
 function loadHealthWorkerWithCity(){
    $db = new Database();
    try {
        $healthWorkers = $db->query('SELECT u.*, c.name AS city_name
        FROM users u
        JOIN cities c ON u.city_id = c.id
        WHERE u.role_id = 2 and u.deleted_at is null;')->fetchAll(PDO::FETCH_ASSOC);
        return $healthWorkers;
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
 }

 function loadUser($user_id){
    $db = new Database();
    try {
        $user = $db->query('SELECT * FROM users WHERE id = :id',[
            'id' => $user_id
        ])->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }

 function loadVaccinations(){
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
        return $vaccinations;
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
 }

 function getPatientsByProvince() {
    $db = new Database();
    try {
        $patient = $db->query("SELECT 
        prov.id AS province_id,
        prov.name AS province_name,
        COUNT(p.id) AS number_of_patients
    FROM 
        provinces prov
    LEFT JOIN 
        cities c ON prov.id = c.province_id
    LEFT JOIN 
        users u ON c.id = u.city_id
    LEFT JOIN 
        patients p ON u.id = p.userId
    GROUP BY 
        prov.id, prov.name;"
)->fetchAll(PDO::FETCH_ASSOC);
        return $patient;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
}

function trackPatientsByProvince($province_id) {
    $db = new Database();
    try {
        $patients = $db->query("
            SELECT 
                pu.id AS patient_id,
                pu.name AS patient_name,
                pu.email AS patient_email,
                c.name AS city_name,
                prov.name AS province_name
            FROM 
                patients p
            JOIN 
                users pu ON p.userId = pu.id
            JOIN 
                cities c ON pu.city_id = c.id
            JOIN 
                provinces prov ON c.province_id = prov.id
            WHERE 
                prov.id = :province_id
            AND 
                pu.deleted_at IS NULL;
        ",['province_id' => $province_id])->fetchAll(PDO::FETCH_ASSOC);
        return $patients;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
}