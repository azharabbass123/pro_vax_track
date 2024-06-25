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

 function loadAvailableHealthWorker($appointmentDate) {
    $db = new Database();
    try {
        $query = 'SELECT u.*
                  FROM users u
                  WHERE u.role_id = 2
                    AND u.deleted_at IS NULL
                    AND NOT EXISTS (
                        SELECT 1
                        FROM appointments a
                        WHERE a.hw_id = u.id
                          AND DATE(a.apt_Date) = :appointmentDate
                    )';

        $healthWorkers = $db->query($query, ['appointmentDate' => $appointmentDate])->fetchAll(PDO::FETCH_ASSOC);
        return $healthWorkers;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
}
 

 function loadUser($user_id){
    $db = new Database();
    try {
        $user = $db->query('
            SELECT u.*, c.province_id, p.name as province_name
            FROM users u
            LEFT JOIN cities c ON u.city_id = c.id
            LEFT JOIN provinces p ON c.province_id = p.id
            WHERE u.id = :id', [
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

 function getProvince($userId) {
    $db = new Database();
    try {
        $result = $db->query("
            SELECT 
                c.province_id AS province_id
            FROM 
                users u
            LEFT JOIN 
                cities c ON u.city_id = c.id
            WHERE 
                u.id = :userId
            LIMIT 1",[
                ':userId' => $userId
            ])->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['province_id'];
        } else {
            return null; // Or handle the case where user doesn't exist
        }
        
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
                prov.name AS province_name,
                v.vax_Date AS vaccination_date,
                v.vax_Status AS vaccination_status
            FROM 
                patients p
            JOIN 
                users pu ON p.userId = pu.id
            JOIN 
                cities c ON pu.city_id = c.id
            JOIN 
                provinces prov ON c.province_id = prov.id
            LEFT JOIN 
                vaccinations v ON p.id = v.patient_id
            WHERE 
                prov.id = :province_id
            AND 
                pu.deleted_at IS NULL
            AND 
                v.vax_Status = 'schedule'
            AND 
                v.vax_Date IS NOT NULL;
        ", ['province_id' => $province_id])->fetchAll(PDO::FETCH_ASSOC);
        
        return $patients;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
}

function getDeletedUsers(){
    $db = new Database();
    try {
    $users= $db->query(
        'SELECT * FROM users WHERE deleted_at IS NOT NULL;'
    )->fetchAll(PDO::FETCH_ASSOC);
    return $users;
    }
    catch (PDOException $e){
        echo "Databse Error" . $e->getMessage();
    }
}