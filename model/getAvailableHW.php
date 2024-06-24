<?php

require 'Database.php';
if (isset( $_POST['date'])){
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

        $healthWorkers = $db->query($query, ['appointmentDate' => $_POST['date']])->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($healthWorkers);
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
}