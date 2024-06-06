<?php 
 
require 'Database.php';
try {
    $db = new Database();
    $provinces = $db->query('SELECT * FROM provinces')->fetchAll(PDO::FETCH_ASSOC);
    return $provinces;
} catch (PDOException $e) {
    // Handle database connection or query errors
    echo "Database Error: " . $e->getMessage();
    exit();
    // Optionally, log the error for debugging purposes
    // error_log("Database Error: " . $e->getMessage());
}
 
 function loadProvince(){
    try {
        $db = new Database();
        $provinces = $db->query('SELECT * FROM provinces')->fetchAll(PDO::FETCH_ASSOC);
        print_r($provinces);
        return $provinces;
    } catch (PDOException $e) {
        // Handle database connection or query errors
        echo "Database Error: " . $e->getMessage();
        exit();
        // Optionally, log the error for debugging purposes
        // error_log("Database Error: " . $e->getMessage());
    }
 }