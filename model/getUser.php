<?php

function loadUser($user_id){
    try {
        $db = new Database();
        $user = $db->query('SELECT * FROM users WHERE id = :id',[
            'id' => $user_id
        ])->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
 }