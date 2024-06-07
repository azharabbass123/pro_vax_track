<?php 

 function loadRole(){
    try {
        $db = new Database();
        $roles = $db->query('SELECT * FROM roles')->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }