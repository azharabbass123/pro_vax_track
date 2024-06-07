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