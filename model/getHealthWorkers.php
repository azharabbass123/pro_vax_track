<?php 

 function loadHealthWorker(){
    try {
        $db = new Database();
        $healthWorkers = $db->query('SELECT * FROM users where role_id = 2')->fetchAll(PDO::FETCH_ASSOC);
        return $healthWorkers;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }
 function loadHealthWorkerWithCity(){
    try {
        $db = new Database();
        $healthWorkers = $db->query('SELECT u.*, c.name AS city_name
        FROM users u
        JOIN cities c ON u.city_id = c.id
        WHERE u.role_id = 2;')->fetchAll(PDO::FETCH_ASSOC);
        return $healthWorkers;
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
 }