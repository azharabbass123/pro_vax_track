<?php

require 'Database.php';
$db = new Database();

$id = $_POST['id'];
$db->query("UPDATE users SET
             deleted_at = NOW()
             WHERE id = :id",[
                'id' => $id
             ]);
$db->query("UPDATE health_workers SET
             deleted_at = NOW()
             WHERE userId = :id",[
                'id' => $id
             ]);
echo 1;