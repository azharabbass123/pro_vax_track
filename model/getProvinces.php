<?php 
 
try {
    $db = new Database();
    $provinces = $db->query('SELECT * FROM provinces')->fetchAll(PDO::FETCH_ASSOC);
    return $provinces;
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
    exit();
    
}
 
 function loadProvince(){
    try {
        $db = new Database();
        $provinces = $db->query('SELECT * FROM provinces')->fetchAll(PDO::FETCH_ASSOC);
        return $provinces;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }