<?php 


 function loadPatient(){
    try {
        $db = new Database();
        $patients = $db->query('SELECT * FROM users where role_id = 3 and deleted_at is null')->fetchAll(PDO::FETCH_ASSOC);
        return $patients;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }

 function loadPatientWithCity(){
    try {
        $db = new Database();
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

function trackPatients($p_id){
    try {
        $db = new Database();
        $hw_id = $_SESSION['user']['curUserId'];
        $vaccinations = $db->query("SELECT 
                        u.id AS user_id,
                        u.name AS user_name,
                        u.email AS user_email,
                        c.name AS city_name,
                        p.name AS province_name
                    FROM 
                        patients pat
                    JOIN 
                        users u ON pat.userId = u.id
                    JOIN 
                        cities c ON u.city_id = c.id
                    JOIN 
                        provinces p ON c.province_id = p.id
                    WHERE 
                        pat.id = :patient_id",
                    ['patient_id' => $p_id])->fetchAll(PDO::FETCH_ASSOC);
        return $vaccinations;
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
}