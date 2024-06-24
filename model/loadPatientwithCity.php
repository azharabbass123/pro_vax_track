<?php 
    require 'Database.php';
    $db = new Database();
    try {
        $healthWorkers = $db->query('SELECT u.*, c.name AS city_name
        FROM users u
        JOIN cities c ON u.city_id = c.id
        WHERE u.role_id = 3 and u.deleted_at is null;')->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($healthWorkers);
        } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
        }
 