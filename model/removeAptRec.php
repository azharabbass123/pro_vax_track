<?php

require 'Database.php';
$db = new Database();



    global $db;
    $id = $_POST['id'];
    $db->query("UPDATE appointments SET
             deleted_at = NOW()
             WHERE id = :id",[
                'id' => $id
             ]);
    echo 1;