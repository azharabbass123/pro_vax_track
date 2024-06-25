<?php

require 'Database.php';

class UserModel {
    
    // Example method to unblock user
    public function unblockUser($id) {
        try {
            $db = new Database();
            $db->query(
                "UPDATE users SET deleted_at = NULL WHERE id = :id",[
                    ':id' => $id
                ]);
                $role = $db->query("SELECT role_id from users WHERE id = :id",[':id' => $id])->fetch(PDO::FETCH_ASSOC);
                if ($role == 3) {
                //Insert into patients table
                $db->query("UPDATE patients SET deleted_at = NULL WHERE userId = :id",[
                    ':id' => $id
                ]);
                } elseif ($role == 2) {
                // Insert into health_worker table
                $db->query("UPDATE health_workers SET deleted_at = NULL WHERE userId = :id",[
                    ':id' => $id
                ]);
                }
                return 1;
    
        } catch (PDOException $e){
            echo "Database Error" . $e;
        }
    }

    public function getCitiesName($prv_id){
        try{
            $db = new Database();
            $stm = $db->query('SELECT * FROM cities WHERE province_id = ' . $prv_id. ' ORDER BY name');
            $cities = $stm->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($cities);
        } catch (PDOException $e){
            echo "Database Error" . $e;
        }
    }


 public function avaialbleHealthWorkers($date){
    $db = new Database();
    try {
        $query = 'SELECT u.*
                  FROM users u
                  WHERE u.role_id = 2
                    AND u.deleted_at IS NULL
                    AND NOT EXISTS (
                        SELECT *
                        FROM appointments a
                        WHERE a.hw_id = u.id
                          AND DATE(a.apt_Date) = :appointmentDate
                    )';

        $healthWorkers = $db->query($query, [':appointmentDate' => $date])->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($healthWorkers);
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
}
}